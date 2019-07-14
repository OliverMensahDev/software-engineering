<?php 
namespace App\DataStorage;

use App\Shared\Person;
use DataProvider;

final class StaticPeopleProvider
{
  function __construct(){
    echo json_encode($this->getPeople());
  }
  function getPeople(): array
  {
    $list = array (
      new Person(1, "Oliver", "Mensah", "12-09-1992", 4),
      new Person(2, "Eva", "Mensah", "29-02-2004", 5),
      new Person(2, "Pat", "Easy", "23-02-2004", 2)
    );
    return $list;
  }
}

