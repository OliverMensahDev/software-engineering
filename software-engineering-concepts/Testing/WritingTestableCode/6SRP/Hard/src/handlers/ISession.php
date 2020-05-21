<?php 

namespace App\Handlers;

interface ISession
{
  public function getLogin(): Login;
}