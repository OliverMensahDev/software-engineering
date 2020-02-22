<?php
namespace core\endpoints;

use core\entities\room;
use core\helpers\ArrObject;
use core\helpers\request;
use core\helpers\response;

trait rooms
{
    /**
     * Get all rooms .
     * @param
     * @ACL public
     */
    public function getAllRooms($payload = [])
    {
        $payload = new ArrObject($payload);
        $response = new Response(1001, 'Failed to get rooms', null);
        $request = new Request($payload);
        $room = new Room($request);
        $rooms = $room->all($payload);
        $count = count($rooms);
        if ($count >= 0) {
            if ($count == 0) {
                $rooms = null;
            }
            $response->setResponse(1000, 'Fetched rooms successfully', $rooms);
        }
        return $response->getResponse();
    }

    /**
     * Get a specific room .
     * @param
     * @ACL public
     */
    public function getARoom($payload = [])
    {
        $payload = new ArrObject($payload);
        $response = new Response(1001, 'Failed to get room', null);
        $request = new Request($payload);
        $room = new Room($request);
        $room = $room->get($payload);
        $count = count($room);
        if ($count) {
            $response->setResponse(1000, 'Fetched room successfully', $room);
        }
        return $response->getResponse();
    }

    /**
     * Book a room.
     * @param
     * @ACL protected
     */
    public function bookARoom($payload)
    {
        $payload = new ArrObject($payload);
        $response = new Response(1001, 'Failed to book room', null);
        $request = new Request($payload);
        $room = new Room($request);
        $output = $room->bookARoom($payload);
        if ($output) {
            $response->setResponse(1000, 'Booked room successfully', null);
        }
        return $response->getResponse();
    }

    /**
     * Get a users bookings.
     * @param
     * @ACL protected
     */
    public function getMyBookings($payload = [])
    {
        $payload = new ArrObject($payload);
        $response = new Response(1001, 'Failed to fetch bookings', null);
        $request = new Request($payload);
        $room = new Room($request);
        $output = $room->getMyBookings($payload);
        if (count($output) >= 0) {
            if (empty($output['results'])) {
                $output = null;
            }

            $response->setResponse(1000, 'fetched bookings successfully', $output);
        }
        return $response->getResponse();
    }

    /**
     * Check room availability.
     * @param
     * @ACL protected
     */
    public function checkRoomAvailability($payload)
    {
        $payload = new ArrObject($payload);
        $response = new Response(1001, 'Booking is invalid', null);
        $request = new Request($payload);
        $room = new Room($request);
        $output = $room->checkRoomAvailability($payload);
        $response->setResponse(1000, 'Booking is valid', $output);
        return $response->getResponse();
    }

    /**
     * Get all booking times for a particular day.
     * @param
     * @ACL protected
     */
    public function getBookedRoomHours($payload)
    {
        $payload = new ArrObject($payload);
        $response = new Response(1001, 'Bookings could not be fetched', null);
        $request = new Request($payload);
        $room = new Room($request);
        $output = $room->getBookedHours($payload);
        $response->setResponse(1000, 'Bookings fetched successfully', $output);
        return $response->getResponse();
    }

    /**
     * Get all booking times for a particular day.
     * @param
     * @ACL protected
     */
    public function getAvailableRoomSlots($payload)
    {
        $payload = new ArrObject($payload);
        $response = new Response(1001, 'No available slots where found', null);
        $request = new Request($payload);
        $room = new Room($request);
        $output = $room->getAvailableRoomSlots($payload);
        if (count($output['results']) > 0) {

            $response->setResponse(1000, 'Found slots successfully', $output);
        }
        return $response->getResponse();

    }
}
