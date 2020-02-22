<?php
namespace core\endpoints;

use core\entities\options;
use core\helpers\response;

trait optionsEndpoint
{
    /**
     * List of give back options.
     * @param
     * @ACL public
     */
    public function getGiveBackOptions()
    {
        $response = new Response(1001, 'Failed to list options', null);
        $options = new Options();
        $options = $options->giveBackOptions();
        $count = count($options);
        if ($count >= 0) {
            if ($count == 0) {
                $options = null;
            }
            $response->setResponse(1000, 'Got list of options successfully', ['results' => $options,
                'properties' => ['current_count' => $count, 'total_count' => $count]]);
        }
        return $response->getResponse();
    }

    /**
     * List of membership packages.
     * @param
     * @ACL public
     */
    public function getMembershipPackages()
    {
        $response = new Response(1001, 'Failed to list packages', []);
        $options = new Options();
        $options = $options->membershipPackages();
        $count = count($options);
        if ($count >= 0) {
            $response->setResponse(1000, 'Got list of packages successfully', ['results' => $options,
                'properties' => ['current_count' => $count, 'total_count' => $count]]);
        }
        return $response->getResponse();
    }

    /**
     * List of workspace locations.
     * @param
     * @ACL public
     */
    public function getWorkSpaces()
    {
        $response = new Response(1001, 'Failed to list locations', []);
        $options = new Options();
        $options = $options->workspaces();
        $count = count($options);
        if ($count >= 0) {
            $response->setResponse(1000, 'Got list of locations successfully', ['results' => $options,
                'properties' => ['current_count' => $count, 'total_count' => $count]]);
        }
        return $response->getResponse();
    }

    /**
     * get list of tags
     * @ACL public
     */
    public function getAllTags()
    {
        $response = new Response(1001, 'Failed to list tags', []);
        $options = new Options();
        $tags = $options->tags();
        $count = count($tags);
        if ($count >= 0) {
            $response->setResponse(1000, 'Got list of tags successfully', ['results' => $tags,
                'properties' => ['current_count' => $count, 'total_count' => $count]]);
        }
        return $response->getResponse();
    }
}
