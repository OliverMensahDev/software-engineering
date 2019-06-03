<?php 
namespace testapp\repositories;

use testapp\services\PersonService;

final class PersonRepository
{
  public function __construct()
  {
    $this->personService = new PersonService();
  }

  public function getPeople(): array 
  {
    return $this->personService->getPeople();
  }
}