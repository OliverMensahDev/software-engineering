<?php
namespace core\endpoints;

use core\helpers\auth;
use core\helpers\ArrObject;
use core\helpers\request;
use core\helpers\response;
use core\users\admin as adminEnt;
use core\users\customer;

trait admin
{
    /**
     * list accounts waiting for invitation.
     * @param
     * @ACL public
     */
    public function listPendingAccounts($payload = [])
    {
        $authHelper = new Auth();
        $authHelper->guardAndAllow(['allowedRoles' => [1]]);
        $response = new Response(1001, 'Failed to get pending accounts', null);
        $request = new Request($payload);
        $customer = new customer($request);
        $pendingAccounts = $customer->pendingAccounts($payload);
        if (count($pendingAccounts) >= 0) {
            $response->setResponse(1000, 'Fetched pending accounts successfully', $pendingAccounts);
        }
        return $response->getResponse();
    }

    /**
     * approve pending accounts.
     * @param
     * @ACL public
     */
    public function approveAccounts($payload)
    {
        $authHelper = new Auth();
        $authHelper->guardAndAllow(['allowedRoles' => [1]]);
        $response = new Response(1001, 'Failed to approve accounts', null);
        $request = new Request($payload);
        $customer = new customer($request);
        $output = $customer->approveAccounts($payload);
        if ($output) {
            $response->setResponse(1000, 'approved accounts successfully', null);
        }
        return $response->getResponse();
    }

    /**
     * disapprove pending accounts.
     * @param
     * @ACL public
     */
    public function disapproveAccounts($payload)
    {
        $authHelper = new Auth();
        $authHelper->guardAndAllow(['allowedRoles' => [1]]);
        $response = new Response(1001, 'Failed to disapprove accounts', null);
        $request = new Request($payload);
        $customer = new customer($request);
        $output = $customer->disapproveAccounts($payload);
        if ($output) {
            $response->setResponse(1000, 'disapproved accounts successfully', null);
        }
        return $response->getResponse();
    }

    /**
     * get dissaproved accounts.
     * @param
     * @ACL public
     */
    public function getDisapprovedAccounts($payload = [])
    {
        $authHelper = new Auth();
        $authHelper->guardAndAllow(['allowedRoles' => [1]]);
        $response = new Response(1001, 'Failed to get disapproved accounts', null);
        $request = new Request($payload);
        $customer = new customer($request);
        $output = $customer->disapprovedAccounts($payload);
        if ($output) {
            $response->setResponse(1000, 'List of disapproved accounts', $output);
        }
        return $response->getResponse();
    }

    /**
     * toggle user checkIn status.
     * @param
     * @ACL public
     */
    public function adminToggleCheckIn($payload = [])
    {
        $payload = new ArrObject($payload);
        $authHelper = new Auth();
        $authHelper->guardAndAllow(['allowedRoles' => [1]]);
        $response = new Response(1001, 'Failed to get toggle user check in status', null);
        $request = new Request($payload);
        $customer = new customer($request);
        $output = $customer->toggleCheckInAdmin($payload);
        if ($output) {
            $response->setResponse(1000, 'Toggled user check in status', null);
        }
        return $response->getResponse();
    }

    /**
     * Super api for admin activities
     * @param
     * @ACL protected
     */
    public function superAPI($payload)
    {
        $authHelper = new Auth();
        $payload = new ArrObject($payload);
        $authHelper->guardAndAllow(['allowedRoles' => [1]]);
        $admin = new adminEnt($payload);
        $output = $admin->runQuery($payload);

        return $output;
    }

    /**
     * Super api for admin activities
     * @param
     * @ACL protected
     */
    public function hashValue($payload)
    {
        $authHelper = new Auth();
        $payload = new ArrObject($payload);
        $authHelper->guardAndAllow(['allowedRoles' => [1]]);
        $admin = new adminEnt($payload);
        $output = $admin->hashValue($payload);

        return $output;
    }
}
