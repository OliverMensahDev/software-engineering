<?php 

namespace App\Handlers;

class IdentityService implements IIdentityService
{
  public function getUserName(): string
  {
    return "me";
  }
}