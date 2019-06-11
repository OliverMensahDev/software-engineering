<?php
namespace testapp\services;

// use testapp\datastores\Data;
use testapp\sharedObjects\Person;


final class PersonService 
{
  public function getPeople(): array
  {
    // return Data::retrieve();
    return [
      new Person("Oliver Mensah", "Male", 27),
      new Person("Olivia Ennin", "Female", 22),
    ];
  }

  public function addPerson(Person $newPerson)
  {
    
  }
}



