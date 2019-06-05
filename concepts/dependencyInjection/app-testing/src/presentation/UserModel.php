<?php
namespace testapp\presentation;

use testapp\repositories\IPerson;
use testapp\sharedObjects\Person;


final class UserModel
{
  public function __construct(IPerson $repository)
  {
    $this->repository = $repository;
  }

  public function getPeople(): array
  {
    return $this->repository->getPeople();
  }

  public function addPerson(Person $person)
  {
    $this->repository->addPerson($person);
  }
}