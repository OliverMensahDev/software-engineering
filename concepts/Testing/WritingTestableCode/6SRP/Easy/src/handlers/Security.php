<?php 

namespace App\Handlers;

class Security implements ISecurity
{
  private $userName;
  private $isAdmin;

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