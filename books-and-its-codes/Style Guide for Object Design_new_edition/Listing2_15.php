<?php
class Cache
{
    private static $data = array('post' => "Me", 'recent_post_id' => 4);

    public static function has($key)
    {
        return isset(self::$data[$key]);
    }

    public static function get($key)
    {
        return self::$data[$key];
    }
}

final class DashboardController
{
    public function getPost()
    {
        if (Cache::has('recent_post__id')) {
            echo Cache::get('recent_post_id');
        } else {
            echo "No Recent post";
        }
    }
}

$ctrl = new DashboardController();
$ctrl->getPost();



final class DashboardController1
{

    public function __construct(Cache $cache)
    {
        $this->cache = $cache;
    }
    public function getPost()
    {
        if ($this->cache->has('recent_post')) {
            echo $this->cache->get('recent_post');
        } else {
            echo "No Recent post";
        }
    }
}

$ctrl = new DashboardController1(new Cache());
$ctrl->getPost();
