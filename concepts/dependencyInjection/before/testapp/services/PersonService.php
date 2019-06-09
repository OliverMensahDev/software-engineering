<?php
namespace testapp\services;

use testapp\datastores\Data;

final class PersonService 
{
  public function getPeople(): array
  {
    return Data::retrieve();
  }

  public function addPerson(Person $newPerson)
  {
    
  }
}



