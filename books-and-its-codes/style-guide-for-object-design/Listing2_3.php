<?php 
//Before

final class ApiClient
{
  private $username;
  private $password;
  public function __construct(string $username, string $password)
  {
    $this->username = $username;
    $this->password = $password;
  }
}