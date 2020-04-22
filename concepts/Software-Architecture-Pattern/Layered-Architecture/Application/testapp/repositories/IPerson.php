<?php 
namespace testapp\repositories;


use testapp\sharedObjects\Person;

interface IPerson  
{
  public function getPeople(): array;

  public function addPerson(Person $newPerson);
}