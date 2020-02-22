<?php
namespace core\endpoints;

use core\entities\restaurant;
use core\helpers\ArrObject;
use core\helpers\request;
use core\helpers\response;

trait restaurants
{
    /**
     * List restaurants belonging to a space.
     * @param
     * @ACL protected
     */
    public function getAllRestaurants($payload = [])
    {
        $payload = new ArrObject($payload);
        $request = new Request($payload);
        $response = new Response(1001, 'Failed to list restaurants', null);
        $restaurant = new Restaurant($request);
        $restaurants = $restaurant->all($payload);
        $count = count($restaurants);
        if ($count >= 0) {
            if (empty($restaurants['results'])) {
                $restaurants = null;
            }

            $response->setResponse(1000, 'Got list of restaurants successfully', $restaurants);
        }

        return $response->getResponse();
    }

    /**
     * Get a particular restaurant.
     * @param
     * @ACL protected
     */
    public function getARestaurant($payload = [])
    {
        $payload = new ArrObject($payload);
        $request = new Request($payload);
        $response = new Response(1001, 'Failed to fetch restaurant', []);
        $restaurant = new Restaurant($request);
        $restaurant = $restaurant->get($payload);
        $count = count($restaurant);
        if ($count >= 0) {
            if ($count == 0) {
                $restaurant = null;
            }
            $response->setResponse(1000, 'Got restaurant successfully', $restaurant);
        }

        return $response->getResponse();
    }
    /**
     * make a reservation.
     * @param
     * @ACL protected
     */
    public function reserveRestaurantSeats($payload)
    {
        $payload = new ArrObject($payload);
        $request = new Request($payload);
        $response = new Response(1001, 'Failed to make reservations', null);
        $restaurant = new Restaurant($request);
        $output = $restaurant->reserve($payload);
        if ($output >= 0) {
            $response->setResponse(1000, 'Reservation made successfully', null);
        }

        return $response->getResponse();
    }

    /**
     * make a reservation.
     * @param
     * @ACL protected
     */
    public function getRestaurantReservedSeats($payload)
    {
        $payload = new ArrObject($payload);
        $request = new Request($payload);
        $response = new Response(1001, 'Failed to fetch reservations', null);
        $restaurant = new Restaurant($request);
        $output = $restaurant->fetchReservations($payload);
        if ($output >= 0) {
            $response->setResponse(1000, 'Reservations fetched successfully', $output);
        }

        return $response->getResponse();
    }

    /**
     * cancel a reservation.
     * @param
     * @ACL protected
     */
    public function cancelRestaurantReservation($payload)
    {
        $payload = new ArrObject($payload);
        $request = new Request($payload);
        $response = new Response(1001, 'Failed to cancel the reservation', null);
        $restaurant = new Restaurant($request);
        $output = $restaurant->cancelReservation($payload);
        if ($output >= 0) {
            $response->setResponse(1000, 'Reservation cancelled successfully', null);
        }

        return $response->getResponse();
    }

    /**
     * Check restaurant availability
     * @param
     * @ACL public
     */
    public function checkRestaurantAvailability($payload)
    {
        $payload = new ArrObject($payload);
        $request = new Request($payload);
        $response = new Response(1001, 'Reservation is invalid', null);
        $restaurant = new Restaurant($request);
        $output = $restaurant->checkRestaurantAvailability($payload);
        if ($output >= 0) {
            $response->setResponse(1000, 'Reservation is valid', null);
        }

        return $response->getResponse();
    }
}
