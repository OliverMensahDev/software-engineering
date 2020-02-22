<?php
namespace core\entities;

use App\Helpers\DataStore as DS;
use App\Helpers\Helper;
use Carbon\carbon;
use core\entities\workspace;
use core\helpers\actions;
use core\Helpers\Auth as authHelper;
use core\helpers\ArrObject;
use core\helpers\queryBuilder;
use core\resources\payment;

class Room
{
    private $jsonFields = ['images', 'amenities'];
    private $tableName = 'core_rooms';
    private $userProfile = null;

    public function __construct($request)
    {
        $this->userProfile = $request->requestPayload['profile'];
    }

    public function all($payload)
    {
        $query = \DB::table('core_rooms');

        if ($this->userProfile) {
            $profile = $this->userProfile;
            $query = QueryBuilder::fetchBasedOnWorkspace($query, $profile);
        }
        $total_count = $query->count();
        $query = QueryBuilder::mainPaginate($query, $payload);
        $rooms = $query->leftJoin('core_room_categories', 'core_room_categories_id', '=', 'core_room_categories.id')
            ->select(
                '*',
                'core_room_categories.name as category',
                'core_rooms.description as description',
                'core_rooms.name as name',
                'core_rooms.id as id'
            )->get();
        if (!$rooms) {
            return null;
        }
        $rooms = QueryBuilder::defineJsonFields(
            $rooms,
            $this->jsonFields
        );
        $current_count = count($rooms);
        $rooms = ['results' => $rooms, 'properties' => ['current_count' => $current_count, 'total_count' => $total_count]];
        return $rooms;
    }

    public function get($payload)
    {
        $roomId = $payload->get('room_id');
        $query = DS::service('core', 'rooms')->where('id', $roomId);
        $openings = \DB::table('core_room_opening_days')
            ->where('core_rooms_id', $roomId)->get();
        $rooms = QueryBuilder::paginate($query, $payload);
        $room = QueryBuilder::resolveRelations($query, new ArrObject(['resolve_relations' => true]));
        $room = $query->getData();
        $room = QueryBuilder::clenseData($room);
        $room['results'] = QueryBuilder::defineJsonFields(
            $room['results'],
            $this->jsonFields
        );
        $category = "";
        if (isset($room['results'][0])) {
            if (isset($room['results'][0]->related['room_categories'][0])) {
                $category = $room['results'][0]->related['room_categories'][0]->name;
            }
            $room['results'][0]->category = $category;
            $room['results'][0]->schedules = $openings;
            unset($room['results'][0]->related);
        }

        return $room;
    }

    public function getMyBookings($payload)
    {
        if (!$this->userProfile) {
            Helper::interrupt(1001, 'Sorry you need to be logged in to book a room');
        }
        $user_id = $this->userProfile['id'];
        $query = DS::service('core', 'room_bookings');
        $query = QueryBuilder::paginate($query, $payload);
        $rooms = $query->where('users_id', $user_id)->orderBy('id')->getData();
        $rooms = QueryBuilder::clenseData($rooms);
        $rooms['results'] = QueryBuilder::defineJsonFields(
            $rooms['results'],
            $this->jsonFields
        );
        return $rooms;
    }

    public function bookARoom($payload)
    {
        $authHelper = new authHelper();
        if (!$this->userProfile) {
            Helper::interrupt(1001, 'Sorry you need to be logged in to book a room');
        }
        if ($authHelper->getLoggedInUserRole() == 1 && $payload->get('client_id')) {
            $user_id = $payload->get('client_id');
            $payment_token = \DB::table('devless_user_profile')->where('users_id', $user_id)
                ->value('payment_token');
            $payment_token = ($payload->get('payment_token')) ? $payload->get('payment_token') : $this->userProfile['payment_token'];
            if (!$payment_token) {
                Helper::interrupt(1001, 'Sorry but there is no billing record for the customer you provided');
            }
        } else {
            $user_id = $this->userProfile['users_id'];
            $payment_token = $this->userProfile['payment_token'];
        }

        $payment = new Payment();
        $purpose = $payload->get('purpose');
        $when = $payload->get('when');
        $from = $payload->get('from');
        $to = $payload->get('to');
        $room_id = $payload->get('room_id');
        $roomParam = new ArrObject(['room_id' => $room_id]);
        $room = $this->get($roomParam);
        if (!isset($room['results'][0]->id)) {
            Helper::interrupt(1001, 'Sorry no such room exists');
        }

        $room = ($room['results'][0]);
        $workspace = new Workspace($room->core_workspace_id);
        $dateIsValid = $this->validateDate($when, $from, $to, $room);
        if (!$dateIsValid) {
            return null;
        }
        $hourly_rate = $room->price_per_hour;
        $payingPrice = $this->getHourlyPrice($from, $to, $hourly_rate);
        $currency = $workspace->get('currency');
        $charged = $payment->chargeCard(
            $payingPrice,
            $currency,
            $payment_token,
            'Payment of ' . strtoupper($currency) . ' ' . $payingPrice . ' to use a room (' . $room->name . ')',
            $this->userProfile['email'],
            $payload->get('payment_token')
        );
        if (!$charged) {
            Log::write(['code' => 'failed_room_booking', 'message' => 'A user could not book to use a room', 'type' => 'actionable', 'workspace_id' => $room->core_workspace_id, 'users_id' => $user_id]);
            Helper::interrupt(1001, 'Your card could not be charged');
        }
        $output = \DB::table('core_room_bookings')
            ->insert(['purpose' => $purpose, 'when' => $when,
                'from' => $from, 'to' => $to, 'users_id' => $user_id, 'core_rooms_id' => $room_id, 'core_workspace_id' => $room->core_workspace_id]);

        (!$output) ? Log::write(['code' => 'failed_room_booking', 'message' => 'A user could not book to use a room but customers card was charged', 'type' => 'actionable', 'workspace_id' => $room->core_workspace_id, 'users_id' => $user_id]) :
        Log::write(['code' => 'room_booking', 'message' => 'A user  booked to use a room', 'type' => 'room_booking', 'workspace_id' => $room->core_workspace_id, 'users_id' => $user_id]);
        return $output;
    }

    public function checkRoomAvailability($payload)
    {
        $when = $payload->get('when');
        $book_from = $payload->get('from');
        $book_to = $payload->get('to');
        $room_id = $payload->get('room_id');

        if (!$when && !$book_from && !$book_to && $room_id) {
            Helper::interrupt("Sorry you need to provide values for the when, book_from, book_to and room_id keys");
        }

        $roomParam = new ArrObject(['room_id' => $room_id]);
        $room = $this->get($roomParam);
        if (!isset($room['results'][0]->id)) {
            Helper::interrupt(1001, 'Sorry no such room exists');
        }

        $room = ($room['results'][0]);

        return $this->validateDate($when, $book_from, $book_to, $room);
    }

    public function getBookedHours($payload)
    {
        $profile = $this->userProfile;
        $date = $payload->get('date');
        if (!$this->userProfile) {
            Helper::interrupt(1001, 'Sorry you need to be logged in to fetch bookings');
        }

        if (!$date) {
            Helper::interrupt(1001, "Sorry you need to provide a date to fetch bookings");
        }
        $formattedDate = actions::getSystemDateFormat($date);
        $day = Date('l', strtotime($formattedDate));
        $dayObj = \DB::table('core_room_opening_days')->where('day', $day)->whereNull('closed')->first();
        if (!$dayObj) {
            Helper::interrupt(1001, "Sorry the room is not available on " . $day . "s");
        }
        $query = \DB::table('core_room_bookings');
        $query = QueryBuilder::fetchBasedOnWorkSpace($query, $profile);
        $query = $query->where('when', $date);
        $total_count = $query->count();
        $query = QueryBuilder::mainPaginate($query, $payload);
        $bookings = $query->select("to", "from")->get();
        $count = count($bookings);
        $bookingsPayload = [
            'start_time' => $dayObj->open_from,
            'end_time' => $dayObj->open_to,
            'booked_slots' => $bookings,
        ];
        return ['results' => $bookingsPayload];
    }
    public function getAvailableRoomSlots($payload)
    {
        Helper::interrupt(1001, "Endpoint is currently disabled");
        $duration = $payload->get('duration');
        $room_id = $payload->get('room_id');
        $date = $payload->get('date');
        $interval = 100;

        if (!$duration || !$room_id || !$date) {
            Helper::interrupt(1001, "You need to provide both the `duration`, `room_id` and `date`");
        }
        $bookedHours = $this->getBookedHours($payload);
        $bookedHrs = $bookedHours['results']['booked_slots'];
        $timestamp = strtotime(Actions::getSystemDateFormat($date));
        $day = date('l', $timestamp);
        $opening = \DB::table('core_room_opening_days')->where('core_rooms_id', $room_id)->where('day', $day)->first();
        $openingTime = $this->compTime($opening->open_from);
        $closingTime = $this->compTime($opening->open_to);
        $systemSlots = $this->generateSlots($openingTime, $closingTime, $interval);
        $unbookedSlots = $this->getAvailableSlots((array) $systemSlots, $bookedHrs);
        $bookingSimulations = $this->getBookingSimulations($systemSlots, $duration);
        $validSlots = $this->getValidSlots($bookingSimulations, $unbookedSlots);
        $flattendSlots = $this->flattenBookings($validSlots);
        $total_count = $count = count($flattendSlots);
        return ['results' => $flattendSlots, 'properties' => ['total_count' => $total_count, 'current_count' => $count]];
    }

    private function validateDate($when, $book_from, $book_to, $room)
    {
        //@TODO: check if date is within correct hours , check if day is not passed
        if (!Actions::checkTimeFormat($book_from) || !Actions::checkTimeFormat($book_to)) {
            Helper::interrupt(1001, 'Sorry but the time you provided is not valid');
        }
        if (!Actions::checkValidTimeDiff($book_from, $book_to)) {
            Helper::interrupt(1001, 'Sorry but the time you provided is not valid');
        }
        $dateSplit = explode('/', $when);

        $dateSplit = new ArrObject($dateSplit);
        $day = $dateSplit->get(0);
        $month = $dateSplit->get(1);
        $year = $dateSplit->get(2);
        //date is within current year
        $currentDay = Date('d');
        $currentYr = Date('Y');
        $currentMonth = Date('m');
        $nextMonth = $nextMonth = ($currentMonth == 12) ? '01' : '0' . ($currentMonth + 1);
        if ($currentYr != $year) {
            Helper::interrupt(1001, 'Sorry but all bookings have to be within ' . $currentYr);
        }
        //date is within current month
        if ($currentMonth != $month && $month != $nextMonth) {
            Helper::interrupt(1001, 'Sorry but all bookings have to be within the current month (' . $currentMonth . ') or the following month (' . $nextMonth . '). thus ' . Date('M') . ' or ' . Date('M', mktime(0, 0, 0, $nextMonth, 10)) . ' respectively');
        }
        //date is above current day
        if ($currentDay > $day && $month != $nextMonth) {
            Helper::interrupt(1001, 'Sorry but you can only reserve days ahead');
        }

        //time is within open hours
        $day = Actions::getDayFromDate($when);
        $schedule = \DB::table('core_room_opening_days')->where('day', $day)->first();
        if (!$schedule) {
            Helper::interrupt(1001, 'Sorry the room is not opened on ' . $day . 's');
        }

        if ($schedule->closed) {
            Helper::interrupt(1001, 'Sorry the room is not opened on ' . $day . 's');
        }
        $room_opens_from = $schedule->open_from;
        $room_opens_till = $schedule->open_to;
        if (!($this->compTime($room_opens_from) <= $this->compTime($book_from))) {
            Helper::interrupt(1001, 'Sorry but the ' . $room->name . ' opens at ' . $room_opens_from);
        }
        if (!($this->compTime($room_opens_till) >= $this->compTime($book_to))) {
            Helper::interrupt(1001, 'Sorry but the ' . $room->name . ' closes at ' . $room_opens_till);
        }

        //check if there are any books made for that day
        $bookingsWithinTheSameDay = \DB::table('core_room_bookings')->where('when', $when)->get();
        if (count($bookingsWithinTheSameDay) == 0) {
            return true;
        }
        foreach ($bookingsWithinTheSameDay as $booking) {
            $min = $this->compTime($booking->from);
            $max = $this->compTime($booking->to);
            $book_from = $this->compTime($book_from);
            $book_to = $this->compTime($book_to);
            $newMeetingHrs = range($book_from, $book_to);
            $existingMeetingHrs = range($min, $max);
            if (array_intersect($newMeetingHrs, $existingMeetingHrs)) {
                Helper::interrupt(1001, 'Sorry but there is a meeting from ' . $booking->from . ' to ' . $booking->to);
            }
        }
        return true;
    }

    private function compTime($time)
    {
        return str_replace(':', '', $time);
    }

    private function getHourlyPrice($from, $to, $hrRate)
    {
        $startTime = carbon::parse($from);
        $finishTime = carbon::parse($to);
        $timeDifference = $startTime->diff($finishTime);
        $amountToPay = ($timeDifference->h) * $hrRate;
        $amountToPay += (((float) ('0.' . $timeDifference->i)) * $hrRate);
        return $amountToPay;
    }

    private function generateSlots($start, $end, $interval = 100)
    {
        $slots = [];
        $i = $start;
        while ($i < $end) {
            if ($i == $start) {
                $st = (int) $start;
            } else {
                $st = $i;
            }
            $cl = $st + $interval;
            $i = $cl;
            $slots[] = ['from' => $st, 'to' => $cl];
        }
        return $slots;
    }

    private function getAvailableSlots($slotList, $bookingList)
    {
        $bookedSlots = [];
        $returnList = $slotList;
        foreach ($bookingList as $booking) {
            $booking = (array) $booking;
            $timeRange = range($this->compTime($booking['from']), $this->compTime($booking['to']));
            foreach ($slotList as $index => $slot) {
                if (in_array($slot['from'], $timeRange) &&
                    in_array($slot['to'], $timeRange)) {
                    unset($returnList[$index]);
                }
            }
        }
        $returnList = array_values($returnList);
        return $returnList;
    }
    private function getValidSlots($slots, $unbookedSlots)
    {
        $validSlots = [];
        foreach ($slots as $slotgrp) {
            $valid = true;
            foreach ($slotgrp as $slot) {
                if (!in_array($slot, $unbookedSlots)) {
                    $valid = false;
                    break;
                }
            }
            if ($valid) {
                $validSlots[] = $slotgrp;
            }
        }
        return $validSlots;
    }

    private function flattenBookings($bookings)
    {
        $slots = [];
        foreach ($bookings as $booking) {
            $endCount = count($booking) - 1;
            $slots[] = ['start' => $booking[0]['from'], 'end' => $booking[$endCount]['to']];
        }
        return $slots;
    }

    private function getBookingSimulations($systemSlots, $hours)
    {
        $slots = [];
        $count = 0;
        while (count($systemSlots)) {
            for ($i = 0; $i < $hours; $i++) {
                $possibleSlots = [];
                foreach (range(0, $hours - 1) as $slotCount) {
                    if (!isset($systemSlots[$slotCount])) {
                        $possibleSlots = [];
                        break;
                    }
                    $possibleSlots[] = $systemSlots[$slotCount];
                }
                if (count($possibleSlots)) {
                    $slots[$count] = $possibleSlots;
                }

                array_shift($systemSlots);
            }
            $count++;
        }
        return $slots;
    }
}
