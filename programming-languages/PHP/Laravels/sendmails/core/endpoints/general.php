<?php
namespace core\endpoints;

use core\entities\bookings;
use core\entities\general as GeneralEntity;
use core\helpers\auth;
use core\helpers\ArrObject;
use core\helpers\request;
use core\helpers\response;

trait general
{
    /**
     * get all bookings.
     * @param
     * @ACL protected
     */
    public function getAllBookings($payload)
    {
        $payload = new ArrObject($payload);
        $authHelper = new Auth();
        $authHelper->guardAndAllow(['allowedRoles' => [1]]);
        $response = new Response(1001, 'Failed to list books', null);
        $bookings = new Bookings();
        $allBookings = $bookings->getAllBookings($payload);
        $count = count($allBookings);
        if ($count >= 0) {
            if ($count == 0) {
                $allBookings = null;
            }
            $response->setResponse(1000, 'Got list of bookings successfully', ['results' => $allBookings,
                'properties' => ['current_count' => $count, 'total_count' => $count]]);
        }
        return $response->getResponse();
    }

    /**
     * Get a users bookings by date.
     * @param
     * @ACL protected
     */
    public function getUsersBookingSchedules($payload = [])
    {
        $payload = new ArrObject($payload);
        $request = new Request($payload);
        $response = new Response(1001, 'Failed to fetch user bookings', null);
        $bookings = new Bookings($request);
        $usersBookings = $bookings->getUsersBookingSchedules($payload);
        $count = count($usersBookings);
        if ($count >= 0) {
            if ($count == 0) {
                $usersBookings = null;
            }
            $response->setResponse(1000, 'Got users bookings successfully', $usersBookings);
        }

        return $response->getResponse();
    }

    /**
     * Search through amenities.
     * @param
     * @ACL protected
     */
    public function searchAmenity($payload = [])
    {
        $payload = new ArrObject($payload);
        $request = new Request($payload);
        $type = $payload->get('resource');
        $response = new Response(1001, 'Failed to ' . $type . ' bookings', null);
        $general = new GeneralEntity($request);
        $amenities = $general->searchAmenity($payload);
        $count = count($amenities);
        if ($count >= 0) {
            if ($count == 0) {
                $amenities = null;
            }
            $response->setResponse(1000, 'Got ' . $type . ' successfully', $amenities);
        }

        return $response->getResponse();
    }
}
