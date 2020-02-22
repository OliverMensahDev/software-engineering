<?php
namespace core\endpoints;

use core\entities\log;
use core\helpers\auth;
use core\helpers\ArrObject;
use core\helpers\request;
use core\helpers\response;

trait logs
{
    /**
     * get activity logs.
     * @param
     * @ACL public
     */
    public function getLogs($payload = [])
    {
        $payload = new ArrObject($payload);
        $authHelper = new Auth();
        $authHelper->guardAndAllow(['allowedRoles' => [1]]);
        $response = new Response(1001, 'Failed to get activity logs', null);
        $request = new Request($payload);
        $log = new Log($request);
        $logs = $log->get();
        if (count($logs) >= 0) {
            $response->setResponse(1000, 'Fetched activity logs successfully', $logs);
        }
        return $response->getResponse();
    }
}
