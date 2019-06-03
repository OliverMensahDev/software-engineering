<?php 
namespace testapp\repositories;

use testapp\sharedObjects\Person;
use testapp\datastores\Database;
use \PDO;

final class PersonSQLRepository implements IPerson
{ 
  private $tableName = 'users';
  private $dbCon;


  public function __construct(PDO $dbCon)
  {
    $this->dbCon = $dbCon;
  }
  
  private function insert(Person $person)
  {  
    try
    {
      $sql = "INSERT INTO `{$this->tableName}` (`name`,`gender`, `age`) VALUES (:name,:gender,:age)";
      $query = $this->dbCon->prepare($sql);
      $query->bindParam(':name',$person->name,PDO::PARAM_STR);
      $query->bindParam(':gender',$person->gender,PDO::PARAM_STR);
      $query->bindParam(':age',$person->age,PDO::PARAM_INT);
      $query -> execute();
    } catch(\PDOException $e){
      echo $e->getMessage();
    }
  }

  private function getAll(): array
  {
    $sql = "SELECT * FROM `{$this->tableName}` WHERE 1";
    $query = $this->dbCon->prepare($sql);
    $query -> bindParam(':id', $id, PDO::PARAM_INT);
    $query -> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
    return $results;
  }

  public function getPeople(): array 
  {
    return $this->getAll();
  }

  public function addPerson(Person $person)
  {
    $this->insert($person);
  }
}