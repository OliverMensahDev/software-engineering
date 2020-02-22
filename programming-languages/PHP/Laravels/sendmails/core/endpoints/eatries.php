<?php
namespace core\endpoints;

use core\entities\eatry;
use core\helpers\ArrObject;
use core\helpers\request;
use core\helpers\response;

trait eatries
{
    /**
     * List all available dishes.
     * @param
     * @ACL protected
     */
    public function getAllFoods($payload = [])
    {
        $payload = new ArrObject($payload);
        $request = new Request($payload);
        $response = new Response(1001, 'Failed to fetch all foods', null);
        $eatry = new Eatry($request);
        $foods = $eatry->all($payload);
        $count = count($foods);
        if ($count >= 0) {
            if ($count == 0) {
                $foods = null;
            }
            $response->setResponse(1000, 'Got list of foods successfully', $foods);
        }

        return $response->getResponse();
    }

    /**
     * List all available drinks.
     * @param
     * @ACL protected
     */
    public function getAllDrinks($payload = [])
    {
        $payload = new ArrObject($payload);
        $payload->set('type', 'drink');
        $request = new Request($payload);
        $response = new Response(1001, 'Failed to fetch all drinks', null);
        $eatry = new Eatry($request);
        $drinks = $eatry->all($payload);
        $count = count($drinks);
        if ($count >= 0) {
            if ($count == 0) {
                $drinks = null;
            }
            $response->setResponse(1000, 'Got list of foods successfully', $drinks);
        }

        return $response->getResponse();
    }

    /**
     * List all eatries.
     * @param
     * @ACL protected
     */
    public function getAllEatries($payload = [])
    {
        $payload = new ArrObject($payload);
        $request = new Request($payload);
        $response = new Response(1001, 'Failed to fetch all eatries', null);
        $eatry = new Eatry($request);
        $eatries = $eatry->all($payload);
        $count = count($eatries);
        if ($count >= 0) {
            if ($count == 0) {
                $eatries = null;
            }
            $response->setResponse(1000, 'Got list of eatries successfully', $eatries);
        }

        return $response->getResponse();
    }
    /**
     * Get a dish.
     * @param
     * @ACL protected
     */
    public function getFood($payload = [])
    {
        $payload = new ArrObject($payload);
        $request = new Request($payload);
        $response = new Response(1001, 'Failed to fetch food', null);
        $eatry = new Eatry($request);
        $food = $eatry->get($payload);
        $count = count($food);
        if ($count >= 0) {
            if ($count == 0) {
                $food = null;
            }
            $response->setResponse(1000, 'Got food successfully', $food);
        }

        return $response->getResponse();
    }

    /**
     * Get a drink.
     * @param
     * @ACL protected
     */
    public function getADrink($payload = [])
    {
        $payload = new ArrObject($payload);
        $request = new Request($payload);
        $response = new Response(1001, 'Failed to fetch drink', null);
        $eatry = new Eatry($request);
        $food = $eatry->get($payload);
        $count = count($food);
        if ($count >= 0) {
            if ($count == 0) {
                $food = null;
            }
            $response->setResponse(1000, 'Got drink successfully', $food);
        }

        return $response->getResponse();
    }

    /**
     * check if order is valid.
     * @param
     * @ACL public
     */
    public function checkOrderValidility($payload)
    {
        $payload = new ArrObject($payload);
        $request = new Request($payload);
        $response = new Response(1001, 'order is invalid', null);
        $eatry = new Eatry($request);
        $output = $eatry->checkOrderValidility($payload);
        if ($output) {
            $response->setResponse(1000, 'Order is valid', null);
        }
        return $response->getResponse();
    }
    /**
     * order food or drinks.
     * @param
     * @ACL protected
     */
    public function orderAnEatry($payload)
    {
        $payload = new ArrObject($payload);
        $request = new Request($payload);
        $response = new Response(1001, 'Failed to place order', null);
        $eatry = new Eatry($request);
        $output = $eatry->order($payload);
        if ($output >= 0) {
            $response->setResponse(1000, 'Placed order successfully', null);
        }

        return $response->getResponse();
    }
}
