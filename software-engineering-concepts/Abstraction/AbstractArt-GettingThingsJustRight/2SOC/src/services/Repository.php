<?php

namespace App\Services;

interface Repository
{
  public function getPersons(): array;
}