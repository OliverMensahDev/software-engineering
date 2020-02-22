<?php
namespace core\endpoints;

use core\helpers\ArrObject;
use core\helpers\request;
use core\helpers\response;
use core\users\customer;

trait customers
{
    /**
     * Register a new Customers.
     * @param
     * @ACL public
     */
    public function registerCustomer($payload)
    {
        $response = new Response(1001, 'Failed to Register new user', null);
        $request = new Request($payload);
        $customer = new Customer($request);
        $registered = $customer->register($payload);
        if ($registered) {
            $response->setResponse(1000, 'User account created successfully', $registered);
        }
        return $response->getResponse();
    }

    /**
     * Accept invite to join Shack15.
     * @param
     * @ACL public
     */

    public function acceptInvitation($payload)
    {
        $response = new Response(1001, 'Sorry but invitation could not be verified', null);
        $request = new Request($payload);
        $customer = new Customer($request);
        $output = $customer->acceptInvitation($payload);
        if ($output) {
            $response->setResponse(1000, 'Registration completed successfully', null);
        }
        return $response->getResponse();
    }

    /**
     * Get a users profile.
     * @param
     * @ACL public
     */
    public function getUserProfile($payload = [])
    {
        $response = new Response(1001, 'User profile could not be fetched', null);
        $request = new Request($payload);
        $customer = new Customer($request);
        $output = $customer->getUserProfile($payload);
        if ($output) {
            $response->setResponse(1000, 'Fetched user profile successfully', ['results' => $output,
                'properties' => ['current_count' => 1, 'total_count' => 1]]);
        }
        return $response->getResponse();
    }

    /**
     * Get a users player IDs.
     * @param
     * @ACL protected
     */
    public function getUserPlayerIds($payload = [])
    {
        $payload = new ArrObject($payload);
        $response = new Response(1001, 'User player ids could not be fetched', null);
        $request = new Request($payload);
        $customer = new Customer($request);
        $output = $customer->getUserPlayerIds($payload);
        if ($output) {
            if (!isset($output[0])) {
                $output = null;
            }
            $response->setResponse(1000, 'Fetched user player id successfully', $output);
        }
        return $response->getResponse();
    }

    public function getAllPlayerIds($payload = [])
    {
        $payload = new ArrObject($payload);
        $response = new Response(1001, 'All player ids could not be fetched', null);
        $request = new Request($payload);
        $customer = new Customer($request);
        $output = $customer->getAllPlayerIds($payload);
        if ($output) {
            if (!isset($output[0])) {
                $output = null;
            }

            $response->setResponse(1000, 'Fetched all  player ids successfully', $output);
        }
        return $response->getResponse();
    }

    /**
     * Add user player ids.
     * @param
     * @ACL protected
     */

    public function addUserPlayerIds($payload = [])
    {
        $payload = new ArrObject($payload);
        $response = new Response(1001, 'User player ids could not be stored', null);
        $request = new Request($payload);
        $customer = new Customer($request);
        $output = $customer->addUserPlayerIds($payload);
        if ($output) {
            $response->setResponse(1000, 'User player ids stored successfully', null);
        }
        return $response->getResponse();
    }

    /**
     * Get all users.
     * @param
     * @ACL protected
     */
    public function getAllUsers($payload = [])
    {
        $payload = new ArrObject($payload);
        $response = new Response(1001, 'Failed to fetch users', null);
        $request = new Request($payload);
        $customer = new Customer($request);
        $output = $customer->getUsers($payload);
        if ($output) {
            if (!isset($output[0])) {
                $output = null;
            }
            $response->setResponse(1000, 'Got users successfully', $output);
        }
        return $response->getResponse();
    }

    /**
     * search users.
     * @param
     * @ACL protected
     */
    public function searchUser($payload = [])
    {
        $payload = new ArrObject($payload);
        $response = new Response(1001, 'Failed to fetched user profiles', null);
        $request = new Request($payload);
        $customer = new Customer($request);
        $output = $customer->searchUser($payload);
        if ($output) {
            if (!isset($output[0])) {
                $output = null;
            }

            $response->setResponse(1000, 'Got response successfully', ['results' => $output, 'properties' => ['total_count' => count($output), 'current_count' => count($output)]]);
        }
        return $response->getResponse();
    }

    /**
     * Get a user profile.
     * @param
     * @ACL protected
     */
    public function getAUserProfile($payload = [])
    {
        $payload = new ArrObject($payload);
        $response = new Response(1001, 'Failed to fetch user profile', null);
        $request = new Request($payload);
        $customer = new Customer($request);
        $output = $customer->getAUserProfile($payload);
        if ($output) {
            if (!isset($output[0])) {
                $output = null;
            }

            $response->setResponse(1000, 'Fetched user profile successfully', ['results' => $output, 'properties' => ['total_count' => 1, 'current_count' => 1,
            ]]);
        }
        return $response->getResponse();
    }

    /**
     * Get a user profile.
     * @param
     * @ACL protected
     */
    public function getUserByTag($payload)
    {
        $payload = new ArrObject($payload);
        $response = new Response(1001, 'Failed to fetch user by tags', null);
        $request = new Request($payload);
        $customer = new Customer($request);
        $output = $customer->getUserByTag($payload);
        if ($output['results']) {
            $response->setResponse(1000, 'Fetched user profile successfully', ['results' => $output['results'], 'properties' => $output['properties'],
            ]);
        }
        return $response->getResponse();
    }

    /**
     * Get a user profile by invitation.
     * @param
     * @ACL public
     */
    public function getProfileByInvitation($payload)
    {
        $payload = new ArrObject($payload);
        $response = new Response(1001, 'Failed to fetch user', null);
        $request = new Request($payload);
        $customer = new Customer($request);
        $output = $customer->getProfileByInvitation($payload);
        if ($output) {
            $response->setResponse(1000, 'Fetched user profile successfully', ['results' => $output, 'properties' => ['current_count' => 1, 'total_count' => 1]]);
        }
        return $response->getResponse();
    }

    /**
     * check user in.
     * @param
     * @ACL protected
     */
    public function toggleCheckIn()
    {
        $payload = new ArrObject([]);
        $response = new Response(1001, 'Failed to perform requested action', null);
        $request = new Request($payload);
        $customer = new Customer($request);
        $output = $customer->toggleCheckIn($payload);
        if ($output) {
            $response->setResponse(1000, 'Requested action performed', null);
        }
        return $response->getResponse();
    }

    /**
     * Get user upcoming activities.
     * @param
     * @ACL protected
     */
    public function upcomingUserActivities($payload = [])
    {
        $payload = new ArrObject([]);
        $response = new Response(1001, 'Failed to fetch user activities', null);
        $request = new Request($payload);
        $customer = new Customer($request);
        $output = $customer->upcomingUserActivities($payload);
        if ($output) {
            $response->setResponse(1000, 'Fetched user upcoming activities', $output);
        }
        return $response->getResponse();
    }

    /**
     * Get old users.
     * @param
     * @ACL protected
     */
    public function getOldUsers($payload = [])
    {
        $payload = new ArrObject($payload);
        $response = new Response(1001, 'Failed to fetch old users', null);
        $request = new Request($payload);
        $customer = new Customer($request);
        $output = $customer->getOldUsers($payload);
        if ($output) {
            $response->setResponse(1000, 'Fetched old users successfully', $output);
        }
        return $response->getResponse();
    }

    /**
     * Get new users.
     * @param
     * @ACL protected
     */
    public function getNewUsers($payload = [])
    {
        $payload = new ArrObject($payload);
        $response = new Response(1001, 'Failed to fetch new users', null);
        $request = new Request($payload);
        $customer = new Customer($request);
        $output = $customer->getNewUsers($payload);
        if ($output) {
            $response->setResponse(1000, 'Fetched new users successfully', $output);
        }
        return $response->getResponse();
    }
}
