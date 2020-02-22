<?php
namespace core\entities;

use App\Helpers\Helper;
use core\entities\workspace;
use core\helpers\auth as authHelper;
use core\helpers\ArrObject;
use core\resources\email;
use core\resources\payment;
use core\users\customer;
use Illuminate\Support\Facades\Hash;

require_once config('devless')['system_class'];

class Auth
{
    public function login($payload)
    {
        $systemClass = new \devless();
        $payload = new ArrObject($payload);
        $auth = new authHelper();
        $payment = new Payment();
        $email = $payload->get('email');
        $password = $payload->get('password');
        $auth->checkLoginClearance($email);
        $output = $systemClass->login(null, $email, null, $password);
        if (!$output) {
            return null;
        }
        $profile = new ArrObject($output['profile']);
        $customer = new Customer(new ArrObject(['profile' => $profile]));
        $workspace = new Workspace();
        $paymentisDue = $customer->hasMembershipExpired();
        $isAdmin = in_array(1, (array) $auth->getUserRole(['userId' => $profile->get('id')]));

        if (!$isAdmin) {
            if ($paymentisDue) {
                $customer->renewMembership();
            }
        }

        $membership = new Membership($profile->get('membership_package_id'));
        $output['profile']['settings'] = json_decode($profile->get('settings'), true);
        $output['profile']['tags'] = json_decode($profile->get('tags'), true);
        $output['profile']['workspace_id'] = $membership->get('workspaceID');
        $output['profile']['workspace'] = $workspace->getWorkspace($membership->get('workspaceID'));
        return $output;
    }

    public function logout()
    {
        $systemClass = new \devless();
        return $systemClass->logout();
    }

    public function sendPasswordResetCode($payload)
    {
        $payload = new ArrObject($payload);
        $emailer = new Email();
        $email = $payload->get('email');
        $resetCode = \uniqid();
        $updated = \DB::table('devless_password_reset')->where('email', $email)->update(['reset_code' => $resetCode]);
        $output = $emailer->send($email, 'password_reset', ['password_reset' => $resetCode]);
        if ($updated) {
            return true;
        }
        \DB::table('devless_password_reset')->insert(['email' => $email, 'reset_code' => $resetCode, 'devless_user_id' => 1]);
        return true;
    }

    public function resetPasswordUsingResetCode($payload)
    {
        $payload = new ArrObject($payload);
        $passwordHash = Hash::make($payload->get('new_password'));
        $resetCode = $payload->get('reset_code');
        $resetRecord = \DB::table('devless_password_reset')->where('reset_code', $resetCode)->first();
        if (!$resetRecord) {
            return false;
        }
        $output = \DB::table('users')->where('email', $resetRecord->email)->update(['password' => $passwordHash]);
        if (!$output) {
            return false;
        }
        \DB::table('devless_password_reset')->where('email', $resetRecord->email)->delete();
        return true;
    }

    public function updateProfile($payload)
    {
        $systemClass = new \devless();
        $payload = new ArrObject($payload);
        if ($payload->get('phone_number') && !$payload->get('country_code')) {
            Helper::interrupt(1001, 'Sorry but you need to set the `country_code` key eg: 123');
        }
        $country_code = $payload->get('country_code');
        $complete_phone_number = '(' . $country_code . ')' . (int) $payload->get('phone_number');
        $output = $systemClass->updateProfile(
            $email = $payload->get('email'),
            $password = $payload->get('password'),
            $username = uniqid(),
            $phone_number = $complete_phone_number,
            $first_name = $payload->get('first_name'),
            $last_name = $payload->get('last_name'),
            $remember_token = null,
            $extraParams = [
                ['profile_pic' => $payload->get('profile_pic')],
                ['bio' => $payload->get('bio')],
                ['tags' => json_encode($payload->get('tags'))],
                ['settings' => json_encode($payload->get('settings'))],
                ['twitter' => $payload->get('twitter')],
                ['linkedin' => $payload->get('linkedin')],
                ['mailing_address' => $payload->get('mailing_address')],
                ['date_of_birth' => $payload->get('date_of_birth')],
                ['company' => $payload->get('company')],
                ['job_title' => $payload->get('job_title')],
                ['city' => $payload->get('city')],
                ['website' => $payload->get('website')],
                ['system_update' => (string) time()],
            ]
        );
        return $output;
    }
}
