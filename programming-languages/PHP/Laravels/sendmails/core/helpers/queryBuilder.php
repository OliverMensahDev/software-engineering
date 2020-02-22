<?php
namespace core\helpers;

use core\entities\membership;

class queryBuilder
{
    public static function paginate($query, $payload)
    {
        $size = $payload->get('size');

        if ($payload->get('offset')) {
            $payload->set('size', 1);
            $query = $query->offset($payload->get('offset'));
        }
        if ($payload->get('size')) {
            $query = $query->size((int) $size);
        }
        return $query;
    }

    public static function mainPaginate($query, $payload)
    {
        $size = $payload->get('size');

        if ($payload->get('offset')) {
            $payload->set('size', 1);
            $query = $query->skip($payload->get('offset'));
        }
        if ($payload->get('size')) {
            $query = $query->take((int) $size);
        }
        return $query;
    }

    public static function defineJsonFields($dataSet, $fieldList)
    {
        $dataSet = (array) $dataSet;
        $newDataSet = [];
        foreach ($dataSet as $datum) {
            foreach ($fieldList as $field) {
                if (isset($datum->$field)) {
                    // if (!gettype($datum->$field) == 'object') {

                        $datum->$field = json_decode($datum->$field);
                    // }
                } elseif (is_array($datum) && isset($datum[$field])) {
                    // if (!gettype($datum[$field]) == 'object') {
                        $datum[$field] = json_decode($datum[$field]);
                    // }
                }
            }
            $newDataSet[] = $datum;
        }
        return $newDataSet;
    }

    public static function fetchBasedOnWorkspace($query, $profile)
    {
        $membership = new Membership($profile['membership_package_id']);
        $workspaceId = $membership->get('workspaceID');
        return $query->where('core_workspace_id', $workspaceId);
    }

    public static function clenseData($data)
    {
        if (isset($data['status_code'])) {
            unset($data['status_code']);
        }
        if (isset($data['message'])) {
            unset($data['message']);
        }
        if (isset($data['payload']['results']) & isset($data['payload']['properties'])) {
            return $data['payload'];
        } else {
            return null;
        }
    }

    public static function resolveRelations($query, $payload)
    {
        if ($payload->get('resolve_relations')) {
            return $query->related('*');
        }
        return $query;
    }
}
