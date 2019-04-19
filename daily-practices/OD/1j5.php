<?php

final class Router {

  private $controllers = [];

  public function __construct(array $controllers) {
    /*
    * Don't assign `$controllers` directly, but let
    * `addController()` take care of that:
    */
    foreach ($controllers as $pattern => $controller) {
      $this->addController($pattern, $controller);
    }
  }

  private function addController(string $pattern,string $controller): void {
    /*
    * This private method should only be called by the
    * constructor.
    *
    * Because it has explicit `string` types for its arguments,
    * calling this method on every key/value pair in the
    * provided `$controllers` array will be the equivalent of
    * asserting that all keys and values in the array are
    * strings.
    */
    $this->controllers[$pattern] = $controller;
  }
}

$controllers = array(
  "/" => 56565
);
$router = new Router($controllers);