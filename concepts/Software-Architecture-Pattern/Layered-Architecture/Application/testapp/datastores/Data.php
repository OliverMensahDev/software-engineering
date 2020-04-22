<?php
namespace testapp\datastores;

use testapp\sharedObjects\Person;

final class Data
{
  public static function retrieve(): array
  {
    return [
      new Person("Oliver Mensah", "Male", 27),
      new Person("Olivia Ennin", "Female", 22),
    ];
  }
}