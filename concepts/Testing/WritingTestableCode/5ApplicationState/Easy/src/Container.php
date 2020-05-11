<?php 
namespace App;

class Container
{
  private $bindings = [];

  public function set($abstract, callable $factory)
  {
    $this->bindings[$abstract] = $factory;
  }

  public function get($abstract)
  {
    return $this->bindings[$abstract]($this);
  }
}