<?php
namespace core\entities;

use App\Helpers\Helper;
use core\entities\log;
use core\entities\workspace;
use core\helpers\actions;
use core\helpers\auth as authHelper;
use core\helpers\queryBuilder;
use core\resources\payment;

class Wellness
{
    private $jsonFields = ['images', 'slots'];
    private $tableName = 'core_wellness_sessions';
    private $userProfile = null;
    private $dataStore = null;

    public function __construct($request)
    {
        $this->userProfile = $request->requestPayload['profile'];
    }

    public function all($payload)
    {
        if (!$this->userProfile) {
            return false;
        }

        $profile = $this->userProfile;
        $query = \DB::table('core_wellness_sessions');
        $query = QueryBuilder::fetchBasedOnWorkspace($query, $profile);
        $total_count = $query->count();
        $sessions = QueryBuilder::mainPaginate($query, $payload);
        $sessions = $sessions->leftJoin('core_wellness_categories', 'core_wellness_sessions.core_wellness_categories_id', '=', 'core_wellness_categories.id')
            ->select('*', 'core_wellness_sessions.id as id', 'core_wellness_sessions.description as description')->get();

        if (!$sessions) {
            return null;
        }
        $sessions = QueryBuilder::defineJsonFields(
            $sessions,
            $this->jsonFields
        );
        $sessions = $this->returnCurrentSessions($sessions);
        return ['results' => $sessions, 'properties' => ['current_count' => count($sessions), 'total_count' => $total_count]];
    }

    public function get($payload)
    {
        $sessionId = $payload->get('session_id');
        $profile = $this->userProfile;
        $query = \DB::table('core_wellness_sessions');
        $query = QueryBuilder::fetchBasedOnWorkspace($query, $profile);
        $sessions = QueryBuilder::mainPaginate($query, $payload);
        $sessions = $sessions->where('core_wellness_sessions.id', $sessionId)->leftJoin('core_wellness_categories', 'core_wellness_sessions.core_wellness_categories_id', '=', 'core_wellness_categories.id')
            ->select('*', 'core_wellness_sessions.id as id', 'core_wellness_sessions.description as description')->get();

        if (!$sessions) {
            return null;
        }
        $sessions = QueryBuilder::defineJsonFields(
            $sessions,
            $this->jsonFields
        );
        $sessions = $this->returnCurrentSessions($sessions);
        return $sessions;
        if (count($session) > 0) {
            $updatedSlotList = [];
            $slotList = json_decode($session[0]->slots);
            foreach ($slotList as $slot) {
                if (!\Carbon\Carbon::parse(Actions::getSystemDateFormat($slot->date)
                    . '' . $slot->time)->isPast()) {
                    $updatedSlotList[] = $slot;
                }
            }
            $updatedSlotList = (!count($updatedSlotList)) ? null : $updatedSlotList;
            $session[0]->slots = json_encode($updatedSlotList);
        }
        $session = QueryBuilder::defineJsonFields(
            $session,
            $this->jsonFields
        );
        $session = $this->returnCurrentSessions($session);

        return $session;
    }

    public function book($payload)
    {
        $authHelper = new authHelper();
        if (!$this->userProfile) {
            return null;
        }
        if ($authHelper->getLoggedInUserRole() == 1 && $payload->get('client_id')) {
            $userId = $payload->get('client_id');
            $payment_token = \DB::table('devless_user_profile')->where('users_id', $userId)
                ->value('payment_token');

            if (!$payment_token) {
                Helper::interrupt(1001, 'Sorry but there is no billing record for the customer you provided');
            }
        } else {
            $userId = $this->userProfile['id'];
            $payment_token = ($payload->get('payment_token')) ? $payload->get('payment_token') : $this->userProfile['payment_token'];
        }

        $sessionId = $payload->get('session_id');
        $date = $payload->get('date');
        $time = $payload->get('time');
        $session = \DB::table($this->tableName)->where('id', $sessionId)->first();
        if (!$session) {
            Helper::interrupt(1001, 'Sorry but no such session exists');
        }
        $slotAvailable = $this->checkSlotAvailability($session, $date, $time);
        if (!$slotAvailable) {
            return null;
        }
        $workspace = new Workspace($session->core_workspace_id);
        $payment = new Payment();
        $currency = $workspace->get('currency');
        $price = $session->price;
        $charged = $payment->chargeCard($price, $currency, $payment_token, 'Payment of ' . strtoupper($currency) . ' ' . $price . ' to join a wellness session (' . $session->title . ')', $this->userProfile['email'], $payload->get('payment_token'));
        if (!$charged) {
            Log::write(['code' => 'failed_wellness_booking', 'message' => 'A customer tried booking for a session but his/her card could not be charged', 'type' => 'error', 'workspace_id' => $session->core_workspace_id, 'users_id' => $userId]);

            Helper::interrupt(1001, 'Your card could not be charged');
        }

        $output = \DB::table('core_wellness_bookings')
            ->insert(['users_id' => $userId, 'date' => $date, 'time' => $time, 'core_wellness_sessions_id' => $sessionId, 'core_workspace_id' => $session->core_workspace_id]);
        (!$output) ? Log::write(['code' => 'failed_wellness_booking', 'message' => 'A customer paid to join a wellness but their sessions could not be booked', 'type' => 'error', 'workspace_id' => $session->core_workspace_id, 'users_id' => $userId])
        : Log::write(['code' => 'wellness_booking', 'message' => 'A customer just booked to join a wellness session', 'type' => 'wellness_booking', 'workspace_id' => $session->core_workspace_id, 'users_id' => $userId]);
        return $output;
    }

    private function returnCurrentSessions($sessionList)
    {
        $sessionList = array_values($sessionList);
        if (!isset($sessionList[0])) {
            return $sessionList;
        }
        foreach ($sessionList as $session) {
            if ($session->slots == null) {
                continue;
            }
            $slotList = $session->slots;
            $session->slots = [];
            foreach ($slotList as $slot) {
                if (!\Carbon\Carbon::parse(Actions::getSystemDateFormat($slot->date) . '' . $slot->time)->isPast()) {
                    $session->slots[] = $slot;
                }
            }
            if (empty($session->slots)) {
                $session->slots = null;
            }
        }
        return $sessionList;
    }

    private function checkSlotAvailability($session, $date, $time)
    {
        $dateIsValid = Actions::checkDateFormat($date);
        if (!$dateIsValid) {
            Helper::interrupt(1001, 'The date is not valid');
        }
        $slots = json_decode($session->slots);
        if (!is_array($slots)) {
            Helper::interrupt(1001, 'There are no available slots at this time');
        }
        $sessionCapacity = 0;
        foreach ($slots as $slot) {
            if ($slot->date == $date && $slot->time == $time) {
                if (\Carbon\Carbon::parse(Actions::getSystemDateFormat($slot->date) . '' . $slot->time)->isPast()) {
                    Helper::interrupt(1001, 'Sorry but the session you are trying to book is past (' . $slot->date . ' ' . $slot->time . ')');
                }

                $sessionCapacity = $slot->capacity;
            }
        }
        if (!$sessionCapacity) {
            Helper::interrupt(1001, 'Sorry there is no such slot');
        }
        $totalBookings = \DB::table('core_wellness_bookings')->where('core_wellness_sessions_id', $session->id)->where('time', $time)->where('date', $date)->count();

        if (!$totalBookings) {
            return true;
        }

        if ($sessionCapacity == $totalBookings) {
            Helper::interrupt(1001, 'Sorry the session has reached its booking limits');
        }
        return true;
    }
}
