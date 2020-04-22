<?php 
namespace testapp\repositories;

use testapp\services\PersonService;
use testapp\sharedObjects\Person;

final class PersonRepository implements IPerson
{
  public function __construct(PersonService $personService)
  {
    $this->personService = $personService;
  }

  public function getPeople(): array 
  {
    return $this->personService->getPeople();
  }

  public function addPerson(Person $person)
  {

  }
}