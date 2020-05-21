<?php

namespace App\Services;

use PDO;

class DatabaseRepository implements Repository
{
  private $dbCon;
  public function __construct(PDO  $dbCon)
  {
    $this->dbCon = $dbCon;
  }
  public function getPersons(): array 
  {
    $sql = "SELECT * FROM people";
    $query = $this->dbCon->prepare($sql);
    $query -> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
    return $results;
  }
}