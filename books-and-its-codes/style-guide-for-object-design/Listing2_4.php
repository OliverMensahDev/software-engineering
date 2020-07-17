<?php
final class Credentials
{
  private $username;
  private $password;
  public function __construct(string $username, string $password)
  {
    if (empty($username)) {
      throw new InvalidArgumentException(
        'username cannot be empty'
      );
    }
    $this->username = $username;
    if (empty($password)) {
      throw new InvalidArgumentException(
        'password cannot be empty'
      );
    }
    $this->password = $password;
  }
  public function username(): string
  {
    return $this->username;
  }
  public function password(): string
  {
    return $this->password;
  }
}

final class ApiClient
{
  private $credentials;
  public function __construct(Credentials $credentials)
  {
    $this->credentials = $credentials;
  }
}
