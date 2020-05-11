<?php

namespace App\Handlers;

use App\Entities\User;

class Login
{
  private $user;

  public function __construct(User $user)
  {
    $this->user = $user;
  }

  public function getUser()
  {
    return $this->user;
  }
}
