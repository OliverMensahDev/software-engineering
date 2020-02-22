<?php
namespace core\helpers;

use App\Helpers\DataStore as DS;
use App\Helpers\Helper;
use core\helpers\ArrObject;

class Auth
{
    public function guardAndAllow($payload)
    {
        $payload = new ArrObject($payload);
        $userId = ($payload->get('userId')) ?
        $payload->get('userId') : $this->getLoggedInUserRole();
        (!in_array($userId, $payload->get('allowedRoles'))) ?
        Helper::interrupt(1001, 'Sorry you are not authorised to access this endpoint', []) : '';
    }

    public function getUserRole($payload)
    {
        $payload = new ArrObject($payload);
        $dataStore = new DS();
        $userRole = $dataStore->service('devless', 'admin_role')
            ->where('users_id', $payload->get('userId'))->getData()['payload'];
        if (!$userRole) {
            return null;
        }
        $userPayload = new ArrObject($userRole);
        $userPayload = $userPayload->get('results');
        $userPayload = new ArrObject($userPayload);
        return $userPayload->get(0);
    }

    public function getLoggedInUserRole()
    {
        $userPayload = Helper::get_authenticated_user_cred(false);
        $object = new ArrObject($userPayload);
        $userId = $object->get('id');
        $userRole = $this->getUserRole(['userId' => $userId]);
        $userRole = new ArrObject($userRole);
        $role = $userRole->get('role');
        return $role;
    }

    public function checkLoginClearance($email)
    {
        $user = \DB::table('users')->where('email', $email)->first();
        if (!$user) {
            Helper::interrupt(1001, 'No such account exists');
        }
        $userId = $user->id;
        $userExtendedProfile = \DB::table('devless_user_profile')->where('users_id', $userId)->first();
        if ($userExtendedProfile->invited != 1 || $userExtendedProfile->invited != "1") {
            Helper::interrupt(1001, 'Sorry but your account is not active');
        }
        return true;
    }
}
