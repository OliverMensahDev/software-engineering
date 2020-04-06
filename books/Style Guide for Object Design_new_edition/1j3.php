<?php 
final class Router {
  private $controllers;
  private $notFoundController;

  public function __construct(array $controllers, string $notFoundController){
    $this->controllers = $controllers;
    $this->notFoundController = $notFoundController;
  }

  public function match($uri) : string{
    foreach($this->controllers as $pattern  => $contoller){
      if($this->matches($uri, $pattern)) return $contoller;
    }
    return $this->notFoundController;
  }

  private function matches($uri, $pattern): bool{
    return $uri==$pattern;
  }

}


$controllers = array(
  "/" => 'HomeController'
);
$router = new Router($controllers, "Not-Found");
echo $router->match("/dafds");