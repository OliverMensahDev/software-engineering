<?php

namespace App\Entities;

class User
{
  private $userName;

  public function  __construct(string $userName)
  {
    $this->userName = $userName;
  }

  public function getUserName()
  {
    return $this->userName;
  }
}
