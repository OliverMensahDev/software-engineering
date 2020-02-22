<?php
namespace core\entities;

use App\Helpers\DataStore as DS;
use App\Helpers\Helper;
use core\entities\log;
use core\entities\workspace;
use core\helpers\actions;
use core\helpers\querybuilder;
use core\resources\payment;

require_once config('devless')['system_class'];

class Eatry
{
    private $jsonFields = ['images'];
    private $userProfile = null;

    public function __construct($request)
    {
        $this->userProfile = $request->requestPayload['profile'];
    }
    public function all($payload = [])
    {
        $query = \DB::table('core_eatry');
        if ($this->userProfile) {
            $profile = $this->userProfile;
            $query = QueryBuilder::fetchBasedOnWorkspace($query, $profile);
        }
        $type = $payload->get('type');
        if ($type) {
            $query = $query->where('type', $type);
        }
        $allLabels = \DB::table('core_eatry_specials')->get();
        $currentTime = date('H:i');
        $currentLabels = [];
        foreach ($allLabels as $labelObj) {
            $timeRange = Range(str_replace(':', '', $labelObj->from), str_replace(':', '', $labelObj->to));
            if (in_array(str_replace(':', '', $currentTime), $timeRange)) {
                $currentLabels[] = $labelObj->label;
            }
        }
        $query = $query->leftJoin('core_eatry_specials', 'core_eatry_specials.id', '=', 'core_eatry.core_eatry_specials_id')
            ->select('*', 'core_eatry_specials.description as special_description', 'core_eatry.id as id', 'core_eatry.description as description')
            ->whereNull('core_eatry.disable')->whereIn('core_eatry_specials.label', $currentLabels);
        $totalCount = $query->count();
        $query = QueryBuilder::mainPaginate($query, $payload);
        $foods = $query->get();
        if (!$foods) {
            return null;
        }
        $foods = QueryBuilder::defineJsonFields(
            $foods,
            $this->jsonFields
        );

        return ['results' => $foods, 'properties' => ['current_count' => count($foods), 'total_count' => $totalCount]];
    }

    public function get($payload)
    {
        $profile = $this->userProfile;
        $query = DS::service('core', 'eatry');

        if ($profile) {
            $foods = QueryBuilder::fetchBasedOnWorkspace($query, $profile);
        }
        $eatryId = $payload->get('eatry_id');
        $eatry = $query->where('id', $eatryId)->getData();
        $eatry = QueryBuilder::clenseData($eatry);
        $eatry['results'] = QueryBuilder::defineJsonFields(
            $eatry['results'],
            $this->jsonFields
        );

        return $eatry;
    }

    public function checkOrderValidility($payload)
    {
        return true;
    }

    public function order($payload)
    {
        if (!$this->userProfile) {
            Helper::interrupt(1001, 'Sorry you need to be logged in to make reservations');
        }

        $eatryId = $payload->get('eatry_id');
        $quantity = $payload->get('quantity');
        $tableNumber = $payload->get('table_number');
        $notes = $payload->get('notes');
        $time = $payload->get('time');
        $eatry = \DB::table('core_eatry')->where('id', $eatryId)->first();
        if (!$eatry) {
            Helper::interrupt(1001, 'Sorry no such eatry exists');
        }
        if (!Actions::checkTimeFormat($time)) {
            Helper::interrupt(1001, 'Sorry the provided time format is unknown');
        }
        $payment = new Payment();
        $workspace = new Workspace($eatry->core_workspace_id);
        $totalPrice = $eatry->price * ($quantity);
        $currency = $workspace->get('currency');
        $charged = $payment->chargeCard(
            $totalPrice,
            $currency,
            $this->userProfile['payment_token'],
            'Payment of ' . strtoupper($currency) . ' ' . $totalPrice . ' made for ' . $quantity . ' portions of ' . $eatry->name,
            $this->userProfile['email'],
            $payload->get('payment_token')
        );
        $userId = $this->userProfile['id'];
        if (!$charged) {
            Log::write(['code' => 'failed_eatry_order', 'message' => 'A customer tried ordering an eatry but his/her card could not be charged', 'type' => 'error', 'workspace_id' => $eatry->core_workspace_id, 'users_id' => $userId]);
            Helper::interrupt(1001, 'Sorry but your card could not be charged');
        }
        $output = \DB::table('core_eatry_orders')->insert(['users_id' => $userId, 'core_eatry_id' => $eatryId,
            'time' => $time, 'quantity' => $quantity, 'timestamp' => time(), 'status' => null, 'table_number' => $tableNumber, 'notes' => $notes, "core_workspace_id" => $eatry->core_workspace_id]);

        $output = (!$output) ?
        Log::write(['code' => 'failed_eatry_order', 'message' => 'An attempt to purchase a meal failed', 'type' => 'error', 'workspace_id' => $eatry->core_workspace_id, 'users_id' => $userId]) :
        Log::write(['code' => 'eatry_order', 'message' => 'A customer just purchased an eatry', 'type' => 'eatry_order', 'workspace_id' => $eatry->core_workspace_id, 'users_id' => $userId]);

        return $output;
    }
}
