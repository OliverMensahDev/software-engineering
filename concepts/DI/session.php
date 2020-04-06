<?php 

namespace container;

class SessionStorage
{
  private $data;
  public function __construct()
  {
    $this->data = [];
  }

  public function set($key, $value)
  {
    $this->data[$key] = $value;
  }

  public function get($key)
  {
    return $this->data[$key];
  }
}