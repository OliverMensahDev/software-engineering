<?php

namespace App\Services;

use App\Entities\Person;
use App\Services\Repository;

final class InternalDataRepository
{
  public function getPersons(): array
  {
    return [
      new Person("Oliver Mensah", "Male", 27),
    ];
  }
}
