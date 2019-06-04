<?php
namespace testapp\presentation;

use testapp\repositories\PersonRepository;


final class UserModel
{
  public function __construct()
  {
    $this->personRepository = new PersonRepository();
  }

  public function getPeople(): array
  {
    return $this->personRepository->getPeople();
  }
}