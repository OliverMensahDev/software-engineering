<?php
namespace core\entities;

use App\Helpers\DataStore as DS;
use App\Helpers\Helper;
use core\entities\log;
use core\entities\workspace;
use core\helpers\actions;
use core\helpers\auth as authHelper;
use core\helpers\ArrObject;
use core\helpers\querybuilder;
use core\resources\payment;

class Restaurant
{
    private $jsonFields = ['images', 'amenities'];
    private $tableName = 'core_restaurant';
    private $userProfile = null;

    public function __construct($request)
    {
        $this->userProfile = $request->requestPayload['profile'];
    }
    public function all($payload)
    {
        $query = DS::service('core', 'restaurant');

        if ($this->userProfile) {
            $profile = $this->userProfile;
            $query = QueryBuilder::fetchBasedOnWorkspace($query, $profile);
        }

        $restaurants = QueryBuilder::paginate($query, $payload);
        $restaurants = QueryBuilder::resolveRelations($query, $payload);
        $restaurants = $query->getData();
        $restaurants = QueryBuilder::clenseData($restaurants);
        if (!$restaurants) {
            return null;
        }
        $restaurants['results'] = QueryBuilder::defineJsonFields(
            $restaurants['results'],
            $this->jsonFields
        );

        return $restaurants;
    }

    public function get($payload)
    {
        $restaurantId = $payload->get('restaurant_id');
        $query = DS::service('core', 'restaurant')->where('id', $restaurantId);
        $openings = \DB::table('core_restaurant_opening_days')
            ->where('core_restaurant_id', $restaurantId)->get();
        $restaurant = QueryBuilder::resolveRelations($query, $payload);
        $restaurant = $query->getData();
        $restaurant = QueryBuilder::clenseData($restaurant);
        $restaurant['results'] = QueryBuilder::defineJsonFields(
            $restaurant['results'],
            $this->jsonFields
        );
        if (isset($restaurant['results'][0])) {
            $restaurant['results'][0]->schedules = $openings;
        }
        return $restaurant;
    }

    public function reserve($payload)
    {
        if (!$this->userProfile) {
            Helper::interrupt(1001, 'Sorry you need to be logged in to make reservations');
        }
        $userId = $this->userProfile['id'];
        $date = $payload->get('date');
        $from = $payload->get('from');
        $to = $payload->get('to');
        $seats = $payload->get('seats');
        $restaurant_id = $payload->get('restaurant_id');
        $restaurant = $this->get((new ArrObject(['restaurant_id' => $restaurant_id])));
        if (!$restaurant) {
            Helper::interrupt(1001, 'Sorry no such restaurant exists');
        }

        $restaurant = ($restaurant['results'][0]);

        $this->checkAvailability($date, $from, $to, $restaurant, $seats);
        $payment = new Payment();
        $workspace = new Workspace($restaurant->core_workspace_id);
        $price = $restaurant->reservation_fee;
        $currency = $workspace->get('currency');
        $charged = $payment->chargeCard(
            $price,
            $currency,
            $this->userProfile['payment_token'],
            "Payment of " . strtoupper($currency) . " $price for reservation at a restaurant ($restaurant->name)",
            $this->userProfile['email'],
            $payload->get('payment_token')
        );
        if (!$charged) {
            Log::write(['code' => 'failed_restaurant_reservation', 'message' => 'An attempt to reserver seat(s) failed', 'type' => 'error', 'workspace_id' => $restaurant->core_workspace_id, 'users_id' => $userId]);
            Helper::interrupt(1001, 'Sorry but your card could not be charged');
        }
        $output = \DB::table('core_restaurant_reservations')->insert(['core_workspace_id' => $restaurant->core_workspace_id, 'core_restaurant_id' => $restaurant_id, 'seats' => $seats,
            'date' => $date, 'from' => $from, 'to' => $to, 'created_on' => time(), 'users_id' => $userId, 'charge' => (isset($charged->id)) ? $charged->id : null]);
        (!$output) ? Log::write(['code' => 'failed_restaurant_reservation', 'message' => 'An attempt to reserver seat(s) failed but customers card was charged', 'type' => 'error', 'workspace_id' => $restaurant->core_workspace_id, 'users_id' => $userId])
        : Log::write(['code' => 'restaurant_reservation', 'message' => 'A customer has reserved a seat', 'type' => 'restaurant_reservation', 'workspace_id' => $restaurant->core_workspace_id, 'users_id' => $userId]);
        return $output;
    }

    public function cancelReservation($payload)
    {
        if (!$this->userProfile) {
            return false;
        }
        $now = \Carbon\Carbon::now();
        $authHelper = new authHelper();
        $reservationId = $payload->get('reservation_id');
        $reservation = \DB::table('core_restaurant_reservations')->where('id', $reservationId)->first();
        if (!$reservation) {
            Helper::interrupt(1001, 'Sorry no such reservation exists');
        }
        if ($this->userProfile['id'] != $reservation->users_id && $authHelper->getLoggedInUserRole() != 1) {
            Helper::interrupt(1001, 'Sorry you have no such reservation');
        }
        $restaurant = \DB::table('core_restaurant')->where('id', $reservation->core_restaurant_id)->first();
        $reservationDate = \Carbon\Carbon::parse(actions::getSystemDateFormat($reservation->date));
        if (!$reservationDate->isToday() && $reservationDate->isPast()) {
            Helper::interrupt(1001, 'Sorry you can only cancel upcoming reservations');
        }
        if ($restaurant->minutes_till_cancelation) {
            $reservationDate = \Carbon\Carbon::createFromTimestamp($reservation->created_on);
            $diff = $now->diffInMinutes($reservationDate);
            $cancelMinutes = $restaurant->minutes_till_cancelation;
            if ($diff > (int) $cancelMinutes && $authHelper->getLoggedInUserRole() != 1) {
                Helper::interrupt(1001, 'Sorry but you can only cancel reservations ' . $cancelMinutes . ' minutes after booking');
            }
        }
        if ($reservation->charge) {
            $payment = new Payment();
            $refunded = $payment->refund($reservation->charge);
            $reservation = \DB::table('core_restaurant_reservations')->where('id', $reservationId)->first();
            if (!$refunded) {
                Log::write(['code' => 'failed_reservation_refund', 'message' => 'An attempt to refund a reservation failed', 'type' => 'actionable', 'workspace_id' => $reservation->core_workspace_id, 'users_id' => $reservation->users_id]);
                Helper::interrupt(1001, 'Sorry but an automatic refund could not be done, Please reach out to your admin to resolve this');
            }
        }
        $output = \DB::table('core_restaurant_reservations')->where('id', $reservationId)->delete();
        (!$output) ? Log::write(['code' => 'failed_reservation_refund', 'message' => 'A customer recieved a refund for a reservation but records still persist please contact system admin to rectify this', 'type' => 'actionable', 'workspace_id' => $reservation->core_workspace_id, 'users_id' => $reservation->users_id])
        : Log::write(['code' => 'reservation_refund', 'message' => 'A customer received a  refund for a resturant seat reservation', 'type' => 'reservation_refund', 'workspace_id' => $reservation->core_workspace_id, 'users_id' => $reservation->users_id]);
        return true;
    }

    public function checkRestaurantAvailability($payload)
    {
        $date = $payload->get('date');
        $from = $payload->get('from');
        $to = $payload->get('to');
        $seats = $payload->get('seats');
        $restaurant_id = $payload->get('restaurant_id');
        if (!$date && !$from && !$to && !$seats && !$restaurant_id) {
            Helper::interrupt("Sorry but you need to provide
             the date , time , restaurant_id, seats");
        }
        $restaurant = $this->get((new ArrObject(['restaurant_id' => $restaurant_id])));
        if (!isset($restaurant['results'][0])) {
            Helper::interrupt("Sorry no such restaurant exists");
        }
        $restaurant = $restaurant['results'][0];
        if (!$restaurant) {
            Helper::interrupt(1001, 'Sorry no such restaurant exists');
        }

        return $this->checkAvailability($date, $from, $to, $restaurant, $seats);
    }

    public function fetchReservations($payload)
    {
        if (!$payload->get('date') && !$payload->get('restaurant_id')) {
            Helper::interrupt(1001, "Sorry but you need to provide both the `date` and `restaurant_id`");
        }
        $date = $payload->get('date');
        $restaurant_id = $payload->get('restaurant_id');
        $restaurant = $this->get((new ArrObject(['restaurant_id' => $restaurant_id])));
        if (!$restaurant) {
            Helper::interrupt(1001, 'Sorry no such restaurant exists');
        }

        $restaurant = ($restaurant['results'][0]);

        return $this->getReservations($date, $restaurant);
    }
    private function getReservations($date, $restaurant)
    {
        $reservations = \DB::table('core_restaurant_reservations')->where('date', $date)->get();
        $day = Actions::getDayFromDate($date);
        $schedule = \DB::table('core_restaurant_opening_days')->where('day', $day)->first();
        $bookingLength = 2;

        $start_time = $schedule->open_from;
        $end_time = $schedule->open_to;
        $time_range = range($this->compTime($start_time), $this->compTime($end_time));
        $slots = [];
        $slot_init = '';
        $count = 0;
        $capacityCount = function ($value, $slot_init, $time_count) {
            $from = (int) $this->compTime($value->from);
            $to = (int) $this->compTime($value->to);
            $time_range = range($slot_init, $time_count);
            if (in_array($from, $time_range) && in_array($to, $time_range)) {
                return true;
            }
            return false;
        };
        foreach ($time_range as $time_count) {
            if ($count == 0) {
                $slot_init = $time_count;
                $count++;
            } elseif (($count % ($bookingLength * 100)) == 0 && $count != 0) {
                $slots[] = ['from' => $this->padTime($slot_init), 'to' => $this->padTime($time_count),
                    'booked_seats' => collect($reservations)->filter(function ($value) use ($slot_init, $time_count, $capacityCount) {
                        return $capacityCount($value, $slot_init, $time_count);
                    })->count(),
                ];
                $slot_init = $time_count;
                $count = 0;
            } else {
                $count++;
            }
        }
        $lastSlot = end($slots);
        $lastTo = $this->compTime($lastSlot['to']);
        if ($lastTo != $this->compTime($end_time)) {
            $toValue = $end_time;
            $fromValue = $lastTo;
            $slots[] = ['from' => $this->padTime($fromValue),
                'to' => $toValue,
                'booked_seats' => collect($reservations)->filter(function ($value) use ($fromValue, $toValue, $capacityCount) {
                    $time_count = $toValue;
                    $slot_init = $fromValue;
                    return $capacityCount($value, $slot_init, $time_count);
                })->count(),
            ];
        }
        return [
            'start_time' => $start_time,
            'end_time' => $end_time,
            'sitting_capacity' => (int) $restaurant->sitting_capacity,
            'booked_seats' => $slots,
        ];
    }

    private function checkAvailability($date, $from, $to, $restaurant, $seats)
    {
        $validStartTime = Actions::checkTimeFormat($from);
        $validEndTime = Actions::checkTimeFormat($to);
        if (!$validStartTime || !$validEndTime) {
            Helper::interrupt(1001, 'Sorry but the time format is invalid. (HH:MM)');
        }

        $getCapacity = function ($booked_seats, $from, $to) {
            foreach ($booked_seats as $singleSeat) {
                $booked_from = $this->compTime($singleSeat['from']);
                $booked_to = $this->compTime($singleSeat['to']);
                $from = $this->compTime($from);
                $to = $this->compTime($to);
                $booked_number = $singleSeat['booked_seats'];
                $time_range = range($booked_from, $booked_to);
                if (in_array($from, $time_range) && in_array($to, $time_range)) {
                    return $booked_number;
                }
            }
            return 0;
        };

        if (!$restaurant->allow_over_reservation) {
            $reservations = $this->getReservations($date, $restaurant);
            $sitting_capacity = $reservations['sitting_capacity'];
            $booked_seats = $reservations['booked_seats'];
            $existingReservations = $getCapacity($booked_seats, $from, $to);
            $sitting_capacity = $restaurant->sitting_capacity;
            if (($existingReservations + $seats) > $sitting_capacity) {
                $availableSeats = $sitting_capacity - $existingReservations;
                Helper::interrupt(1001, 'Sorry we have ' . $availableSeats . ' seats available during those hours');
            }
        }
        $reservationLimits = $restaurant->reservation_limit;
        if ($seats > $reservationLimits) {
            Helper::interrupt(1001, 'Sorry but you can only make reservations for ' . $reservationLimits);
        }

        $dateSplit = explode('/', $date);
        $dateSplit = new ArrObject($dateSplit);
        $day = $dateSplit->get(0);
        $month = $dateSplit->get(1);
        $year = $dateSplit->get(2);
        //date is within current year
        $currentYr = Date('Y');
        $currentMonth = Date('m');
        $currentDay = Date('d');
        $nextMonth = $nextMonth = ($currentMonth == 12) ? '01' : '0' . ($currentMonth + 1);

        if ($currentYr != $year) {
            Helper::interrupt(1001, 'Sorry but all reservations have to be within ' . $currentYr);
        }
        //date is within current month
        if ($currentMonth != $month && $month != $nextMonth) {
            Helper::interrupt(1001, 'Sorry but all reservations have to be within the current month (' . $currentMonth . ') or the following month (' . $nextMonth . '). thus ' . Date('M') . ' or ' . Date('M', mktime(0, 0, 0, $nextMonth, 10)) . ' respectively');
        }

        //date is above current day
        if ($currentDay > $day) {
            if ($nextMonth < $currentMonth || ($currentMonth == 12 && $nextMonth == 01)) {
                Helper::interrupt(1001, 'Sorry but you can only reserve days ahead');
            }
        }
        $day = Actions::getDayFromDate($date);
        $schedule = \DB::table('core_restaurant_opening_days')->where('day', $day)->first();
        if (!$schedule) {
            Helper::interrupt(1001, 'Sorry the restaurant is not opened on ' . $day . 's');
        }
        if ($schedule->closed) {
            Helper::interrupt(1001, 'Sorry the restaurant is not opened on ' . $day . 's');
        }
        $opens_from = $schedule->open_from;
        $opens_to = $schedule->open_to;

        $min = $this->compTime($opens_from);
        $max = $this->compTime($opens_to);
        $from = $this->compTime($from);
        $to = $this->compTime($to);
        $time_frame = range($min, $max);
        if (!in_array($from, $time_frame) && !in_array($to, $time_frame)) {
            Helper::interrupt(1001, 'Sorry but the restaurant opens from ' . $opens_from . ' to ' . $opens_to);
        }
        return true;
    }

    private function compTime($time)
    {
        return str_replace(':', '', $time);
    }

    private function padTime($time)
    {
        return substr_replace($time, ":" . substr($time, -2), -2, strlen($time));
    }
}
