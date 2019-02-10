<?php 
class Alerting{
    private $minimumLevel;
    
    public function __construct(int $minimumLevel){
        if($minimumLevel <= 0){
            throw new InvalidArgumentException("Min");
        }
        $this->minimumLevel = $minimumLevel;
    }
}

// This will throw an `InvalidArgumentException`
// $alerting = new Alerting(-99999999);

class Router{
    private $controllers;
    private $notFoundController;

    public function _construct(array $controllers, string $notFoundController){
        $this->controllers = $controllers;
        $this->notFoundController = $notFoundController;
    }

    public function match(string $uri): string{
        foreach ($this->controllers as $pattern => $controller) {
            if($this->matches($uri, $controller)){
                return $controller;
            }
        }
        return $this->notFoundController;
    }

    private function matches(string $uri, string $pattern): bool{
        return $uri == $pattern ? true : false;
    }
}

$router = new Router(
    [
    '/' => 'homepage_controller'
    ],
    'not-found'
);
    // This will return 'homepage_controller':
echo $router->match('/');