<?php
namespace core\endpoints;

use core\entities\auth;
use core\helpers\request;
use core\helpers\response;

trait Authentication
{
    /**
     * Login as either Admin or normal user.
     * @param
     * @ACL public
     */
    public function login($payload)
    {
        $response = new Response(1001, 'Invalid credentials', null);
        $request = new Request($payload);
        $auth = new auth($request);
        $profile = $auth->login($payload);
        if ($profile) {
            $response->setResponse(1000, 'Logged in Successfully', $profile);
        }
        return $response->getResponse();
    }

    /**
     * log a user out.
     * @param
     * @ACL protected
     */
    public function logout()
    {
        $response = new Response(1001, 'Failed to log user out', null);
        $request = new Request([]);
        $auth = new auth($request);
        $status = $auth->logout();
        if ($status) {
            $response->setResponse(1000, 'Logged out Successfully', $status);
        }
        return $response->getResponse();
    }

    /**
     * Generate reset password code and forward via email.
     * @param
     * @ACL public
     */

    public function sendPasswordResetCode($payload)
    {
        $response = new Response(1000, 'Reset Code generated successfully', null);
        $request = new Request($payload);
        $auth = new auth($request);
        $auth->sendPasswordResetCode($payload);
        return $response->getResponse();
    }

    /**
     * Reset user password using reset code.
     * @param
     * @ACL public
     */

    public function resetPasswordUsingResetCode($payload)
    {
        $response = new Response(1000, 'Password reset attempted successfully', null);
        $request = new Request($payload);
        $auth = new auth($request);
        $auth->resetPasswordUsingResetCode($payload);
        return $response->getResponse();
    }

    /**
     * Update user profile.
     * @param
     * @ACL public
     */
    public function updateProfile($payload)
    {
        $response = new Response(1001, 'Failed to update profile', null);
        $request = new Request($payload);
        $auth = new auth($request);
        $updated = $auth->updateProfile($payload);
        if ($updated) {
            $response->setResponse(1000, 'User profile updated successfully', null);
        }
        return $response->getResponse();
    }
}
