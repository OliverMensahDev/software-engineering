<?php
namespace testapp\services;

use App\Shared\Person;
use testapp\datastores\Data;
use testapp\sharedObjects\Person as SharedObjectsPerson;

final class PersonService
{
  public function getPeople(): array
  {
    return Data::retrieve();
  }

  public function addPerson(SharedObjectsPerson
  
  $newPerson)
  {
    $dataStore[] = $newPerson;
  }
}



