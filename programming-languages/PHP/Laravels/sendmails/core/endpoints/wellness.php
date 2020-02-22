<?php
namespace core\endpoints;

use core\entities\wellness;
use core\helpers\ArrObject;
use core\helpers\request;
use core\helpers\response;

trait wellnessEndpoint
{
    /**
     * List all available wellness sessions.
     * @param
     * @ACL protected
     */
    public function getAllWellnessSessions($payload = [])
    {
        $payload = new ArrObject($payload);
        $request = new Request($payload);
        $response = new Response(1001, 'Failed to fetch wellness sessions', null);
        $wellness = new Wellness($request);
        $sessions = $wellness->all($payload);
        $count = count($sessions['results']);
        if ($count >= 0) {
            if ($count == 0) {
                $sessions = null;
            }
            $response->setResponse(1000, 'Got list of wellness sessions successfully', $sessions);
        }

        return $response->getResponse();
    }

    /**
     * Get a specific wellness session.
     * @param
     * @ACL protected
     */
    public function getAWellnessSession($payload = [])
    {
        $payload = new ArrObject($payload);
        $request = new Request($payload);
        $response = new Response(1001, 'Failed to fetch session', null);
        $wellness = new Wellness($request);
        $session = $wellness->get($payload);
        $count = count($session);
        if ($count >= 0) {
            if ($count == 0) {
                $session = null;
            }
            $response->setResponse(1000, 'Got session successfully', $session);
        }

        return $response->getResponse();
    }
    /**
     * book to join a session.
     * @param
     * @ACL protected
     */
    public function bookAWellnessSession($payload = [])
    {
        $payload = new ArrObject($payload);
        $request = new Request($payload);
        $response = new Response(1001, 'Failed to book session', null);
        $wellness = new Wellness($request);
        $output = $wellness->book($payload);
        if ($output >= 0) {
            $response->setResponse(1000, 'Booked session successfully', null);
        }

        return $response->getResponse();
    }
}
