<?php 

namespace App\Handlers;

interface IIdentityService
{
  public function getUserName(): string;
}