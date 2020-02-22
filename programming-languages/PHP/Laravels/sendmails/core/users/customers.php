<?php
namespace core\users;

require_once config('devless')['system_class'];
use App\Helpers\ActionClass;
use App\Helpers\DataStore as DS;
use App\Helpers\Helper;
use core\entities\log;
use core\entities\membership;
use core\helpers\auth;
use core\helpers\ArrObject;
use core\helpers\QueryBuilder;
use core\resources\email;
use core\resources\payment;
use core\resources\pusher;
use Hash;

class Customer
{
    private $request;
    private $profile;
    private $dataStore;
    private $selectionList = ["users.id",
        "users.email",
        "users.first_name",
        "users.last_name",
        "users.phone_number",
        "users.created_at",
        "users.updated_at",
        "devless_user_profile.company",
        "devless_user_profile.website",
        "devless_user_profile.city",
        "devless_user_profile.profile_pic",
        "devless_user_profile.job_title",
        "devless_user_profile.date_of_birth",
        "devless_user_profile.mailing_address",
        "devless_user_profile.linkedin",
        "devless_user_profile.twitter",
        "devless_user_profile.first_reference_name",
        "devless_user_profile.first_reference_email",
        "devless_user_profile.second_reference_name",
        "devless_user_profile.second_reference_email",
        "devless_user_profile.give_back_option",
        "devless_user_profile.invited",
        "devless_user_profile.bio",
        "devless_user_profile.devless_companies_id",
        "devless_user_profile.rejected",
        "devless_user_profile.tags",
        "devless_user_profile.registered_on",
        "devless_user_profile.settings",
        "devless_user_profile.payment_token",
        "devless_user_profile.check_in",
        "devless_user_profile.member_id",
        "devless_user_profile.last_checkin_date",
        "devless_user_profile.membership_package_id",
        "devless_user_profile.last_membership_payment"];
    public function __construct($request)
    {
        $this->request = $request->get('args');
        $this->profile = $request->get('profile');
        $this->dataStore = new DS();
        return $this;
    }

    public function register($profile)
    {
        $devless = new \devless();
        $profile = new ArrObject($profile);
        if (!$profile->get('membership_package_id')) {
            Helper::interrupt(1001, 'Sorry but you need to set the `membership_package_id`');
        }
        $membership = new Membership($profile->get('membership_package_id'));
        $workspaceId = $membership->get('workspaceID');
        if (!$workspace = \DB::table('core_workspace')->where('id', $workspaceId)->first()) {
            Helper::interrupt(1001, 'Sorry but there is no such workspace');
        }
        $workspace_key = $workspace->name[0];

        date_default_timezone_set($workspace->timezone);
        $profile->set('password', 'password');
        if (!$profile->get('email')) {
            return null;
        }
        if ($profile->get('invited')) {
            return null;
        }
        if (!$profile->get('country_code')) {
            Helper::interrupt(1001, 'Sorry but you need to set the `country_code` key eg: 123');
        }
        $country_code = $profile->get('country_code');
        $complete_phone_number = null;
        if ($profile->get('phone_number')) {
            $complete_phone_number = '(' . $country_code . ')' . (int) $profile->get('phone_number');
        }
        $output = $devless->signUp(
            $profile->get('email'),
            $profile->get('password'),
            null,
            $complete_phone_number,
            $profile->get('first_name'),
            $profile->get('last_name'),
            null,
            null,
            [
                ['profile_pic' => $profile->get('profile_pic')],
                ['bio' => $profile->get('bio')],
                ['linkedin' => $profile->get('linkedin')],
                ['twitter' => $profile->get('twitter')],
                ['job_title' => $profile->get('job_title')],
                ['date_of_birth' => $profile->get('date_of_birth')],
                ['mailing_address' => $profile->get('mailing_address')],
                ['membership_package_id' => $profile->get('membership_package_id')],
                ['first_reference_name' => $profile->get('first_reference_name')],
                ['first_reference_email' => $profile->get('first_reference_email')],
                ['second_reference_name' => $profile->get('second_reference_name')],
                ['second_reference_email' => $profile->get('second_reference_email')],
                ['give_back_option' => $profile->get('give_back_option')],
                ['devless_companies_id' => $profile->get('devless_companies_id')],
                ['company' => $profile->get('company')],
                ['city' => $profile->get('city')],
                ['registered_on' => date('Y-m-d h:i:s', time())],
                ['website' => $profile->get('website')],
                ['invited' => null],
                ['is_admin' => null],
            ]
        );
        unset($output['token']);
        $userId = $output['profile']->id;
        $memberId = $workspace_key . str_repeat("0", 8 - strlen($userId . '')) . $userId;
        \DB::table('devless_user_profile')->where('users_id', $userId)->update(['member_id' => $memberId]);

        $output = ($output) ? Log::write(['code' => 'new_user_registration', 'message' => 'A new user registered to join the space ', 'type' => 'actionable', 'workspace_id' => $workspaceId, 'users_id' => $userId]) : '';
        return ($output) ? $output : null;
    }

    public function pendingAccounts($payload)
    {
        $payload = new ArrObject($payload);
        $adminIds = \DB::table('devless_admin_role')->lists('users_id');
        $query = \DB::table('users')
            ->join('devless_user_profile', 'users.id', '=', 'devless_user_profile.users_id')
            ->where('invited', null)
            ->where('rejected', null)
            ->whereNotIn('users.id', $adminIds)
            ->select(...$this->selectionList)
            ->orderBy('created_at', 'desc');
        if ($sizeValue = $payload->get('size')) {
            $query->take($sizeValue);
        }
        if ($offsetValue = $payload->get('offset')) {
            $query->offset($offsetValue);
        }
        $users = $query->get();
        $users = QueryBuilder::defineJsonFields(
            $users,
            ['tags', 'settings']
        );

        return $users;
    }
    public function update($profile = null)
    {
        $devless = new \devless();
        $profile = new ArrObject($profile);

        return $output = $devless->updateUserProfile(
            $id,
            $email = $profile->get('email'),
            $password = $profile->get('password'),
            $username = '',
            $phone_number = '',
            $first_name = '',
            $last_name = '',
            $remember_token = '',
            $status = ''
        );
    }

    public function approveAccounts($payload)
    {
        $payload = new ArrObject($payload);
        $email = new Email();
        $userIdList = $payload->get('account_ids');
        $userIdList = (gettype($userIdList) != 'array') ? [$userIdList] : $userIdList;
        foreach ($userIdList as $userId) {
            $code = uniqid();
            $user = \DB::table('users')->where('id', $userId)->first();
            if (!$user) {
                return false;
            }
            $emailAddr = $user->email;
            $first_name = $user->first_name;
            $last_name = $user->last_name;
            $user = \DB::table('devless_user_profile')->where('users_id', $userId)->first();
            if ($user && $user->invited == 1) {
                return false;
            }
            $output = \DB::table('devless_user_profile')->where('users_id', $userId)->update(['invited' => $code, 'rejected' => null]);
            if (!$output) {
                return false;
            }
            $email->send($emailAddr, 'invitation', ['invitation' => $code, 'first_name' => $first_name, 'last_name' => $last_name]);
        }
        return true;
    }

    public function disapproveAccounts($payload)
    {
        $payload = new ArrObject($payload);
        $userIdList = $payload->get('account_ids');
        $userIdList = (gettype($userIdList) != 'array') ? [$userIdList] : $userIdList;
        foreach ($userIdList as $userId) {
            $user = \DB::table('devless_user_profile')->where('users_id', $userId)->first();
            if (!$user) {
                return false;
            }

            if ($user && $user->invited == 1) {
                return false;
            }
            $output = \DB::table('devless_user_profile')->where('users_id', $userId)->update(['rejected' => 1]);
            if (!$output) {
                return false;
            }
        }
        return true;
    }

    public function disapprovedAccounts()
    {
        $query = \DB::table('users')
            ->join('devless_user_profile', 'users.id', '=', 'devless_user_profile.users_id')
            ->where('rejected', 1);

        $users = $query->select($this->selectionList)->orderBy('created_at', 'desc')->get();
        $users = QueryBuilder::defineJsonFields(
            $users,
            ['tags', 'settings']
        );
        return $users;
    }
    public function acceptInvitation($payload)
    {
        $payload = new ArrObject($payload);
        $payment = new Payment();
        $userExtendedProfile = \DB::table('devless_user_profile')->where('invited', $payload->get('invitation_code'))->first();
        if (!$userExtendedProfile || !$payload->get('password') || $userExtendedProfile->invited == 1 || $userExtendedProfile->invited == null) {
            Helper::interrupt(1001, 'Failed to register your account. Be sure you have not already used the link');
        }
        $userId = $userExtendedProfile->users_id;
        $membershipId = $userExtendedProfile->membership_package_id;
        $membership = new Membership($membershipId);
        $paymentToken = $payload->get('payment_token');
        $paymentConfirmation = $payment->addPaymentToken($paymentToken);
        if (!$paymentConfirmation) {
            Helper::interrupt(1001, 'Invalid payment_token.');
        }
        $user = \DB::table('users')->where('id', $userId)->select('email')->first();
        $email = $user->email;
        $charged = $payment->chargeCard($membership->get('price'), $membership->get('currency'), $payload->get('payment_token'), 'Membership payment for user with email ' . $email, $email);
        if (!$charged) {
            Helper::interrupt(1001, 'Sorry but you card could not be charged.');
        }
        $dt = new \DateTime();

        $allowedFieldList = str_replace(['users.', 'devless_user_profile.'], '', $this->selectionList);
        $whitelistedUserProfile = array_intersect_key($payload->all(), array_flip($allowedFieldList));
        $dbUpdates = array_combine(array_map(
            function ($key) {
                return (in_array($key, ['email', 'phone_number', 'first_name', 'last_name'])) ? 'users.' . $key : 'devless_user_profile.' . $key;
            },
            array_keys($whitelistedUserProfile)
        ), $whitelistedUserProfile);
        $dbUpdates['users.password'] = Hash::make($payload->get('password'));
        $dbUpdates['devless_user_profile.last_membership_payment'] = $dt->getTimestamp();
        $dbUpdates['invited'] = 1;
        $output = \DB::table('devless_user_profile')->join('users', 'users.id', '=', 'devless_user_profile.users_id')->where('devless_user_profile.users_id', $userId)
            ->update($dbUpdates);

        $membership = new Membership($membershipId);
        $workspaceId = $membership->get('workspaceID');

        ($output) ? Log::write(['code' => 'invitation_acceptance', 'message' => 'A user accepted the invitation to join the space', 'type' => 'info', 'workspace_id' => $workspaceId, 'users_id' => $userId]) :
        Log::write(['code' => 'failed_invitation_acceptance', 'message' => 'A user could not accept their invitation to join the space', 'type' => 'error', 'workspace_id' => $workspaceId, 'users_id' => $userId]);

        return (gettype($output) == 'integer' && $output > 0);
    }

    public function changeAccountCompletionState()
    {
    }

    public function setProfile($profile)
    {
        $this->profile = $profile;
    }

    public function getUserProfile()
    {
        if (!$this->profile) {
            return null;
        }
        unset($this->profile['password']);
        $tags = json_decode($this->profile['tags'], true);
        $settings = json_decode($this->profile['settings'], true);
        $this->profile['tags'] = $tags;
        $this->profile['settings'] = $settings;
        $membership = new Membership($this->profile['membership_package_id']);
        $this->profile['workspace_id'] = $membership->get('workspaceID');
        return $this->profile;
    }

    public function getAllPlayerIds($payload)
    {
        $query = DS::service('core', 'player_ids');

        if ($this->userProfile) {
            $profile = $this->userProfile;
            $query = QueryBuilder::fetchBasedOnWorkspace($query, $profile);
        }

        $playerIds = QueryBuilder::paginate($query, $payload);
        $playerIds = QueryBuilder::resolveRelations($query, $payload);
        $playerIds = $query->getData();
        $playerIds = QueryBuilder::clenseData($playerIds);
        if (!$playerIds) {
            return null;
        }
        return $playerIds;
    }

    public function getUserPlayerIds($payload)
    {
        if (!$this->profile) {
            return null;
        }
        $userId = $this->profile['id'];
        $resolveRelations = $payload->get('resolve_relations');
        $query = DS::service('core', 'player_ids')->where('users_id', $userId);
        $userId = QueryBuilder::resolveRelations($query, $payload);
        $playerIds = $query->getData();
        $playerIds = QueryBuilder::clenseData($playerIds);

        return $playerIds;
    }

    public function addUserPlayerIds($payload)
    {
        if (!$this->profile) {
            return null;
        }
        $userId = $this->profile['id'];
        $player_id_list = $payload->get('player_ids');
        foreach ($player_id_list as $player_id) {
            $output = DS::service('core', 'player_ids')->addData([['users_id' => $userId, 'player_id' => (string) $player_id]]);
            $output = ($output['status_code'] == 609) ? true : false;
            if (!$output) {
                return null;
            }
        }
        return $output;
    }

    public function getAUserProfile($payload)
    {
        if (!$this->profile) {
            return null;
        }
        $auth = new Auth();
        $isAdmin = ($auth->getLoggedInUserRole() == 1) ? true : false;
        $loggedUserId = $this->profile['id'];
        $userId = $payload->get('user_id');
        if (!$userId) {
            return null;
        }
        //this is not  adding data but getting users
        $user = DS::service('core', 'users')->addData([['get_user_where_id_is' => $userId]]);
        if (!isset($user['payload']) || !count($user['payload'])) {
            return null;
        }
        $user = $user['payload'];
        $user['password'] = null;
        if ($user && !$isAdmin) {
            $user['payment_token'] = null;
        }
        $data[] = $user;
        $user = QueryBuilder::defineJsonFields(
            $data,
            ['tags', 'settings']
        );

        return $user;
    }

    public function searchUser($payload)
    {
        if (!$this->profile) {
            return null;
        }
        $auth = new Auth();
        $isAdmin = ($auth->getLoggedInUserRole() == 1) ? true : false;
        $loggedUserId = $this->profile['id'];
        $searchWord = $payload->get('search_word');
        if (!$searchWord) {
            return null;
        }
        $users = \DB::table('users')
            ->where('status', 1)
            ->join('devless_user_profile', 'devless_user_profile.users_id', '=', 'users.id', 'users')
            ->get();
        if (!$users) {
            return null;
        }
        foreach ($users as $user) {
            $user = (array) $user;
            $user['password'] = null;
            $user['session_token'] = null;
            $user['session_time'] = null;
            if (!$isAdmin) {
                $user['payment_token'] = null;
            }
            if ($user['last_membership_payment']) {
                $duePayment = $this->hasMembershipExpired($user['last_membership_payment']);
                if (!$duePayment) {
                    $newUserArr[] = $user;
                }
            }
        }

        $users = QueryBuilder::defineJsonFields(
            $newUserArr,
            ['tags', 'settings']
        );
        ActionClass::execute('algolia', 'setDataSet', ['user_list', $users]);
        $output = ActionClass::execute('algolia', 'searchDataSet', ['user_list', $searchWord]);
        return $output['hits'];
    }

    public function getUsers($payload)
    {
        if (!$this->profile) {
            return null;
        }
        $auth = new Auth();
        $isAdmin = ($auth->getLoggedInUserRole() == 1) ? true : false;
        $loggedUserId = $this->profile['id'];
        $workspaceId = $payload->get('workspace_id');
        if ($workspaceId) {
            $data = [];
            $users = $this->getUsersFromWorkspace($workspaceId);
        } else {
            //this is not  adding data but getting users
            $usersPayload = DS::service('core', 'users')->addData([['get_all_users' => 0]]);
            $users = $usersPayload['payload'];
        }
        if (!$users) {
            return null;
        }

        $newUserArr = [];
        if ($users) {
            foreach ($users as $user) {
                $user = (array) $user;
                $user['password'] = null;
                if (!$isAdmin) {
                    $user['payment_token'] = null;
                }
                if ($user['last_membership_payment']) {
                    $duePayment = $this->hasMembershipExpired($user['last_membership_payment']);
                    if (!$duePayment) {
                        $newUserArr[] = $user;
                    }
                }
            }
        }
        $newUserArr = QueryBuilder::defineJsonFields(
            $newUserArr,
            ['tags', 'settings']
        );
        return $newUserArr;
    }

    public function getOldUsers($payload = [])
    {
        if (!$this->profile) {
            return null;
        }
        $size = ($payload->get('size')) ? $payload->get('size') : 10;
        $offset = ($payload->get('offset')) ? $payload->get('offset') : 0;

        $month = (Date('m') == 1) ? 12 : Date('m') - 1;
        $year = (Date('m') == 1) ? Date('Y') - 1 : Date('Y');
        $date = $year . '-' . $month;
        $membership = new Membership($this->profile['membership_package_id']);
        $workspaceId = $membership->get('workspaceID');
        $membershipPackages = \DB::table('core_membership_packages')->where('core_workspace_id', $workspaceId)->lists('id');
        $query = \DB::table('users')
            ->join('devless_user_profile', 'users.id', '=', 'devless_user_profile.users_id')
            ->where('invited', "1")->where('rejected', null)
            ->where('registered_on', '<', $date . '-1 00:00:00')
            ->whereIn('devless_user_profile.membership_package_id', $membershipPackages);

        $total_count = $query->count();
        $users = $query
            ->take($size)->skip($offset)
            ->select(...$this->selectionList)->orderBy('created_at', 'desc')->get();
        $users = QueryBuilder::defineJsonFields(
            $users,
            ['tags', 'settings']
        );

        return ['results' => $users,
            'properties' => ['total_count' => $total_count, 'current_count' => count($users)]];
    }

    public function getNewUsers($payload = [])
    {
        if (!$this->profile) {
            return null;
        }
        $size = ($payload->get('size')) ? $payload->get('size') : 10;
        $offset = ($payload->get('offset')) ? $payload->get('offset') : 0;
        $month = (Date('m') == 1) ? 12 : Date('m') - 1;
        $year = (Date('m') == 1) ? Date('Y') - 1 : Date('Y');
        $date = $year . '-' . $month;
        $membership = new Membership($this->profile['membership_package_id']);
        $workspaceId = $membership->get('workspaceID');
        $membershipPackages = \DB::table('core_membership_packages')->where('core_workspace_id', $workspaceId)->lists('id');
        $query = \DB::table('users')
            ->join('devless_user_profile', 'users.id', '=', 'devless_user_profile.users_id')
            ->where('invited', "1")->where('rejected', null)
            ->where('registered_on', '>', $date . '-1 00:00:00')
            ->whereIn('devless_user_profile.membership_package_id', $membershipPackages);
        $total_count = $query->count();
        $users = $query
            ->take($size)->skip($offset)
            ->select(...$this->selectionList)->orderBy('created_at', 'desc')->get();
        $users = QueryBuilder::defineJsonFields(
            $users,
            ['tags', 'settings']
        );
        return ['results' => $users,
            'properties' => ['total_count' => $total_count, 'current_count' => count($users)]];
    }

    private function getUsersFromWorkspace($workspaceId)
    {
        $membership = new Membership($this->profile['membership_package_id']);
        $workspaceId = $membership->get('workspaceID');
        $membershipPackages = \DB::table('core_membership_packages')->where('core_workspace_id', $workspaceId)->lists('id');

        $users = \DB::table('users')
            ->join('devless_user_profile', 'users.id', '=', 'devless_user_profile.users_id')
            ->where('invited', "1")->where('rejected', null)
            ->whereIn('devless_user_profile.membership_package_id', $membershipPackages)
            ->select(...$this->selectionList)->orderBy('created_at', 'desc')->get();

        return $users;
    }

    public function getUserByCompany($payload)
    {
        $company_id = $payload->get('company_id');
        if (!$company_id) {
            return false;
        }
        $users = \DB::table('users')
            ->join('devless_user_profile', 'users.id', '=', 'devless_user_profile.users_id')
            ->where('devless_company_id', $company_id)->where('invited', '1')->where('rejected', null)
            ->select(...$this->selectionList)->orderBy('created_at', 'desc')->get();

        $users = QueryBuilder::defineJsonFields(
            $users,
            ['tags', 'settings']
        );
        return $users;
    }

    public function allTags()
    {
        return \DB::table('devless_tags')->get();
    }

    public function getUserByTag($payload)
    {
        if (!$this->profile) {
            return false;
        }
        $usersPayload = [];
        $membership = new Membership($this->profile['membership_package_id']);
        $workspaceId = $membership->get('workspaceID');
        $tags = $payload->get('tags');
        $membershipPackages = \DB::table('core_membership_packages')->where('core_workspace_id', $workspaceId)->lists('id');
        $baseQuery = \DB::table('users')
            ->join('devless_user_profile', 'users.id', '=', 'devless_user_profile.users_id');
        foreach ($tags as $tag) {
            $baseQuery = $baseQuery->where('tags', 'like', "%{$tag}%");
        }
        $activeQuery = $this->getActiveUserQuery();
        $total_count = $activeQuery->where('tags', 'like', "%{$tag}%")->count();
        $query = $baseQuery
            ->whereIn('devless_user_profile.membership_package_id', $membershipPackages)->where('devless_user_profile.rejected', null)
            ->where('devless_user_profile.invited', 1)
            ->select(...$this->selectionList)->orderBy('created_at', 'desc');
        $users = QueryBuilder::mainPaginate($query, $payload)->get();
        $users = QueryBuilder::defineJsonFields(
            $users,
            ['tags', 'settings']
        );
        return ['results' => $users, 'properties' => ['current_count' => count($users), 'total_count' => $total_count]];
    }

    public function getActiveUserQuery()
    {
        $count = \DB::table('users')
            ->join('devless_user_profile', 'users.id', '=', 'devless_user_profile.users_id')
            ->where('devless_user_profile.rejected', null)->where('devless_user_profile.invited', 1);

        return $count;
    }

    public function hasMembershipExpired($lastPayment = null)
    {
        if (!$this->profile && !$lastPayment) {
            Helper::intebutrrupt(1001, 'Sorry but the users profile needs to be set');
        }
        $profile = $this->profile;
        $lastPayment = ($lastPayment) ? $lastPayment : $profile->get('last_membership_payment');
        $lastPayment = (int) $lastPayment;
        $date = \Carbon\Carbon::parse(date('Y-m-d H:i:s', $lastPayment));
        $now = \Carbon\Carbon::now();

        $diff = $date->diff($now);
        if ($diff->days > 366) {
            return true;
        }
        return false;
    }

    public function renewMembership()
    {
        if (!$this->profile) {
            return false;
        }
        $profile = $this->profile;

        $membership = new Membership($profile->get('membership_package_id'));
        $payment = new Payment();
        $email = $this->profile['email'];
        $charged = $payment->chargeCard(
            $membership->get('price'),
            $membership->get('currency'),
            $profile->get('payment_token'),
            'Payment made for membership renewal by user with email' . $email,
            $email
        );
        if (!$charged) {
            Helper::interrupt(1001, 'Your subscription expired and your card could not be charged');
        }
        \DB::table('devless_user_profile')->where('users_id', $profile->get('id'))
            ->update(['last_membership_payment' => time()]);
        return $charged;
    }

    public function getProfileByInvitation($payload)
    {
        if ($payload->get('invitation_link') == 1 || $payload->get('invitation_link') == 0 ||
            $payload->get('invitation_link') == null) {
            return null;
        }
        $profile = \DB::table('users')->where('invited', $payload->get('invitation_link'))
            ->join('devless_user_profile', 'users.id', '=', 'devless_user_profile.users_id')
            ->select($this->selectionList)->first();
        if ($profile) {
            return QueryBuilder::defineJsonFields(
                [$profile],
                ['tags', 'settings']
            );
        }
        return null;
    }

    public function toggleCheckIn()
    {
        if (!$this->profile) {
            return false;
        }
        $userId = $this->profile['id'];
        $checkIn = $this->profile['check_in'];
        $statusCode = ($checkIn == null) ? 'user_check_in' : 'user_check_out';
        $checkInMessage = ($checkIn == null) ? 'sent a check in request' : 'checked out';
        $membership = new Membership($this->profile['membership_package_id']);
        $workspaceId = $membership->get('workspaceID');
        $name = $this->profile['first_name'] . ' ' . $this->profile['last_name'];
        if ($checkIn) {
            $output = \DB::table('devless_user_profile')->where('users_id', $userId)
                ->update(['check_in' => null]);
        } else {
            $output = Pusher::push(['status_code' => $statusCode, 'users_id' => (int) $userId, 'workspace_id' => (int) $workspaceId], 'main', 'checkIn');
        }
        Log::write(['code' => $statusCode, 'message' => 'A user ' . $checkInMessage . ' (' . $name . ')',
            'type' => 'actionable', 'workspace_id' => $workspaceId, 'users_id' => $userId]);
        return true;
    }

    public function toggleCheckInAdmin($payload)
    {
        if (!$userId = $payload->get('user_id')) {
            Helper::interrupt(1001, 'Sorry you need to provide the `user_id`');
        }
        $emailer = new Email();
        $user = \DB::table('devless_user_profile')->join('users', 'users.id', '=', 'devless_user_profile.users_id')
            ->select('*', 'users.id as id')->where('users_id', $userId)->first();
        if (!$user) {
            Helper::interrupt(1001, "Sorry no user exists with the id " . $userId);
        }
        $name = $user->first_name . ' ' . $user->last_name;
        $checkIn = $user->check_in;
        $newCheckIn = ($checkIn) ? null : 1;
        $output = \DB::table('devless_user_profile')->where('users_id', $userId)
            ->update(['check_in' => $newCheckIn, 'last_checkin_date' => time()]);
        if (($admin_id = $user->assigned_admin) && $newCheckIn) {
            $admin_profile = \DB::table('users')->where('id', $admin_id)->first();
            if ($admin_profile) {
                $output = $emailer->send($admin_profile->email, 'check_in_notification', ['body' => "$name just checked into the space"]);
            }
        }
        return $output;
    }
}
