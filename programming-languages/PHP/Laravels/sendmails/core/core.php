<?php
// namespace core;
/**
 * Created by Devless.
 * Author: Eddymens
 * Date Created: 6th of November 2018 03:00:56 PM
 * Service: core
 * Version: 1.3.7
 */
use App\Helpers\ActionClass;
use App\Helpers\Helper;

//Action method for serviceName
class core
{
    use \core\endpoints\customers;
    use \core\endpoints\optionsEndpoint;
    use \core\endpoints\Authentication;
    use \core\endpoints\admin;
    use \core\endpoints\rooms;
    use \core\endpoints\restaurants;
    use \core\endpoints\eatries;
    use \core\endpoints\wellnessEndpoint;
    use \core\endpoints\events;
    use \core\endpoints\general;
    use \core\endpoints\logs;
    public $serviceName = 'core';

    public function __construct()
    {
        $authCred = Helper::get_authenticated_user_cred(false);
        if (!$authCred) {
            return;
        }
        $userId = $authCred['id'];
        $userTimezone = \DB::table('devless_user_profile')->where('devless_user_profile.users_id', $userId)
            ->join('core_membership_packages', 'devless_user_profile.membership_package_id', '=', 'core_membership_packages.id')
            ->join('core_workspace', 'core_membership_packages.core_workspace_id', '=', 'core_workspace.id')
            ->value('core_workspace.timezone');
        date_default_timezone_set($userTimezone);
    }
    /**
     * List out all possible callbale methods as well as get docs on specific method
     * @param $methodToGetDocsFor
     * @return $this;
     */
    public function help($methodToGetDocsFor = null)
    {
        $serviceInstance = $this;
        $actionClass = new ActionClass();
        return $actionClass->help($serviceInstance, $methodToGetDocsFor = null);
    }

    /**
     * This method will execute on service importation
     * @ACL private
     */
    public function __onImport()
    {
        //add code here
    }

    /**
     * This method will execute on service exportation
     * @ACL private
     */
    public function __onDelete()
    {
        dd('Delete Lock');
    }
}
