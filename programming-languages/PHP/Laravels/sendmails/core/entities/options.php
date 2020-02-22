<?php
namespace core\entities;

use App\Helpers\DataStore as DS;
use core\entities\membership;
use core\entities\workspace;
use core\helpers\ArrObject;
use core\users\customer;

class Options
{
    public function giveBackOptions()
    {
        $dataStore = new DS();
        $options = $dataStore->service('core', 'give_back_options')->getData();
        return $options['payload']['results'];
    }

    public function membershipPackages()
    {
        $membership = new Membership();
        return $membership->all();
    }

    public function workspaces()
    {
        $workspace = new Workspace();
        return $workspace->all();
    }

    public function tags()
    {
        $payload = new ArrObject([]);
        $customer = new Customer($payload);
        return $customer->allTags();
    }
}
