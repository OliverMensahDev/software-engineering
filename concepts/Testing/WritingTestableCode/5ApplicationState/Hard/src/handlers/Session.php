<?php 

namespace App\Handlers;

class Session implements ISession
{

  private $login;

  public function __construct(Login $login)
  {
      $this->login = $login;
  }

  public function getLogin(): Login
  {
    return $this->login;
  }
}