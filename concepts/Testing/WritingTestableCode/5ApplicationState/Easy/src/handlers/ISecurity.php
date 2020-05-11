<?php 

namespace App\Handlers;

interface ISecurity
{
  public function setUser(string $userName, bool $isAdmin);
  public function getUserName();
  public function isAdmin();
}