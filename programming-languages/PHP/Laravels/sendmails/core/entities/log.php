<?php

namespace core\entities;

use core\helpers\ArrObject;
use core\Helpers\Querybuilder;

class Log
{
    private $jsonFields = ['tags'];

    public function __construct($request)
    {
        $this->userProfile = $request->get('profile');
        $this->payload = $request->get('args');
    }
    public static function write($payload)
    {
        $payload = new ArrObject($payload);
        return \DB::table('core_activity_log')->insert([
            'message' => $payload->get('message'),
            'code' => $payload->get('code'),
            'formatted_date' => Date('d-m-Y H:m:s'),
            'tags' => json_encode($payload->get('tags')),
            'type' => $payload->get('type'),
            'core_workspace_id' => $payload->get('workspace_id'),
            'timestamp' => time(),
            'users_id' => $payload->get('users_id'),
        ]);
    }

    public function get()
    {
        $payload = $this->payload;
        $query = \DB::table('core_activity_log');
        $total_count = \DB::table('core_activity_log')->count();
        if ($this->userProfile) {
            $profile = $this->userProfile;
            $query = QueryBuilder::fetchBasedOnWorkspace($query, $profile);
        } else {
            return null;
        }

        $activities = QueryBuilder::mainPaginate($query, $payload);
        $activities = $query->get();
        if (!$activities) {
            return null;
        }
        $output = [];
        $output = QueryBuilder::defineJsonFields(
            $activities,
            $this->jsonFields
        );
        return ['results' => $output, 'properties' => ['current_count' => count($output), 'total_count' => $total_count]];
    }
}
