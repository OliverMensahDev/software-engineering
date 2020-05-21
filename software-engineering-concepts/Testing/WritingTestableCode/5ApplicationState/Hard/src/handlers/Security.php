<?php 

namespace App\Handlers;

class Security
{
  private static $instance = null;
  private $userName;
  private $isAdmin;

  public static function getInstance(){
    if(!self::$instance)
    {
      self::$instance = new Security();
    }
    return self::$instance;
  }

  private function __construct(){}

  public function setUser(string $userName, bool $isAdmin)
  {
    $this->userName = $userName;
    $this->isAdmin = $isAdmin;
  }

  public function getUserName()
  {
    return $this->userName;
  }

  public function isAdmin()
  {
    return $this->isAdmin;
  }
}