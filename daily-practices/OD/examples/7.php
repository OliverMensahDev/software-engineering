<?php

class Cache{
    private static $data = array('post' => "Data is the new Gold", 'recent_post' => "Together we are building the tech scene in Ghana, one meetup at a time");


    public static function has($key){
        return isset(self::$data[$key]);
    }

    public static function get($key){
        return self::$data[$key];
    }
}

// final class DashboardController {
//     public function getPost(){
        
//         if (Cache::has('recent_post')) {
//             echo Cache::get('recent_post');
//         }else{
//             echo "No Recent posts";
//         }
//     }
// }


// $ctrl = new DashboardController();
// $ctrl->getPost();





final class DashboardController{

    public function __construct(Cache $cache){
        $this->cache = $cache;
    }
    public function getPost(){
        // $recentPosts = [];
        if ($this->cache->has('recent_post')) {
            // $recentPosts = Cache::get('recent_posts');
            echo $this->cache->get('recent_post');
        }else{
            echo "No Recent posts";
        }
    }
    
}

$ctrl = new DashboardController(new Cache());
$ctrl->getPost();