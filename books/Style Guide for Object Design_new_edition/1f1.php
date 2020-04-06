<?php 
class Cache{
    private static $data = array('post' => "Me", 'recent_post' => 4);
    // public static function init($value){
    //     self::$data = $value;
    // }

    public static function has($key){
        return isset(self::$data[$key]);
    }

    public static function get($key){
        return self::$data[$key];
    }
}

// final class DashboardController {
//     public function getPost(){
//         // $recentPosts = [];
//         if (Cache::has('recent_posts')) {
//             // $recentPosts = Cache::get('recent_posts');
//             echo Cache::get('recent_posts');
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