<?php
namespace core\entities;

use App\Helpers\Helper;
use core\Helpers\Querybuilder;

class General
{
    private $jsonFields = ['amenities', 'pics', 'images', 'slots'];
    public function __construct($request)
    {
        $this->userProfile = $request->requestPayload['profile'];
    }
    public function searchAmenity($payload = [])
    {
        $resourceList = [
            'event' => ['table' => 'core_events', 'key' => 'title', 'query' => function ($query) {
                return $query->leftJoin('core_event_categories', 'core_event_categories_id', '=', 'core_event_categories.id')
                    ->select(
                        '*',
                        'core_event_categories.id as category_id',
                        "core_event_categories.name as category",
                        "core_events.description as description",
                        "core_events.title as name",
                        "core_events.id as id"
                    );
            }],
            'room' => ['table' => 'core_rooms', 'key' => 'core_rooms.name', 'query' => function ($query) {
                return $query->leftJoin('core_room_categories', 'core_room_categories_id', '=', 'core_room_categories.id')
                    ->select(
                        '*',
                        'core_room_categories.name as category',
                        'core_rooms.description as description',
                        'core_rooms.name as name'
                    );
            }],
            'eatry' => ['table' => 'core_eatry', 'key' => 'name'],
            'wellness' => ['table' => 'core_wellness_sessions', 'key' => 'title'],
        ];

        if (!$resourceList[$payload->get('resource')] && !$payload->get('search_word')) {
            Helper::interrupt(1001, 'Sorry but you need to provide the resource name to query');
        }
        $resourceObj = $resourceList[$payload->get('resource')];
        $searchWord = $payload->get('search_word');
        $searchKey = $resourceObj['key'];
        $query = \DB::table($resourceObj['table'])->orWhere($searchKey, "LIKE", "%$searchWord%");
        if ($this->userProfile) {
            $profile = $this->userProfile;
            $query = QueryBuilder::fetchBasedOnWorkspace($query, $profile);
        }
        if (isset($resourceObj['query'])) {
            $specialQuery = $resourceObj['query'];
            $query = $specialQuery($query);
        }
        $total_count = $query->count();
        $size = ($payload->get('size')) ? $payload->get('size') : $total_count;
        $offset = ($payload->get('offset')) ? $payload->get('offset') : 0;
        $query = $query->take($size)->skip($offset);
        $results = $query->get();
        $current_count = count($query);
        $results = QueryBuilder::defineJsonFields(
            $results,
            $this->jsonFields
        );
        return ['results' => $results, 'properties' => ['current_count' => $current_count, 'total_count' => $total_count]];
    }
}
