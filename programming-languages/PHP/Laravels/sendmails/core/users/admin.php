<?php
namespace core\users;

use App\Helpers\Helper;
use core\helpers\queryBuilder;
use core\helpers\response;

class Admin
{
    protected $actions = [
        'create' => 'insert',
        'update' => 'update',
        'destroy' => 'delete',
        'read' => 'get',
    ];
    private $userFields = ["users.id",
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
        "devless_user_profile.second_reference_email",
        "devless_user_profile.second_reference_name",
        "devless_user_profile.give_back_option",
        "devless_user_profile.invited",
        "devless_user_profile.bio",
        "devless_user_profile.devless_companies_id",
        "devless_user_profile.rejected",
        "devless_user_profile.payment_token",
        "devless_user_profile.membership_package_id",
        "devless_user_profile.last_membership_payment"];
    public function runQuery($payload)
    {
        $queries = $payload->get('queries');
        $records = $payload->get('records');
        $action = $payload->get('action');
        $table = $payload->get('table');
        if (!isset($table)) {
            Helper::interrupt(1001, 'You need to set a table name ');
        }
        if (!isset($this->actions[$action])) {
            Helper::interrupt(1001, 'Such action cannot be run');
        }
        $initQuery = ($table != 'users') ? \DB::table($table) :
        \DB::table($table)->join('devless_user_profile', 'users.id', '=', 'devless_user_profile.users_id');

        $completeQuery = $this->queryBuilder($initQuery, $queries);
        $actualAction = $this->actions[$action];
        try {
            $output = $completeQuery->$actualAction($records);
        } catch (\Exception $e) {
            Helper::interrupt(1001, 'Failed to run query ' . json_encode($e->getTrace()));
        }
        $output = $this->postClensing($output, $table, $action);
        if ($table == 'users') {
            $output = QueryBuilder::defineJsonFields(
                $output,
                ['tags', 'settings']
            );
        }
        return (new Response(1000, 'Query executed successfully', $output))->getResponse();
    }

    private function queryBuilder($partialQuery, $inputQueries)
    {
        if (!$inputQueries) {
            return $partialQuery;
        }
        foreach ($inputQueries as $query) {
            foreach ($query as $key => $params) {
                $partialQuery = $partialQuery->$key(...$params);
            }
        }
        return $partialQuery;
    }

    public function postClensing($output, $table, $action)
    {
        $newDat = [];
        if ($table == 'users' && $action == 'read') {
            foreach ($output as $dat) {
                $dat->password = null;
                $newDat[] = $dat;
            }
            return $newDat;
        }
        return $output;
    }
    public function hashValue($payload)
    {
        $value = $payload->get('value');
        return (new Response(1000, 'Run query successfully', \Hash::make($value)))->getResponse();
    }
}
