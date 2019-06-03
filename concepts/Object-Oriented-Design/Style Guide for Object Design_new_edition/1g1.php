<?php 
final class User {
  private $name;
  private $password;
  private $gender;
  private $age;

  public function __construct(String $name, String $password, String $gender, Int $age){
    $this->name = $name;
    $this->password = $password;
    $this->gender = $gender;
    $this->age = $age;
  }
  
  public function getData(){
    $data = array();
    $data['name'] = $this->name;
    $data['gender'] = $this->gender;
    $data['age'] = $this->age;
    return json_encode($data);
  }
}
final class EntityManager {
  
  private $entity;
  private $dataStore;
  
  public function __construct(object $entity){
    $this->entity = $entity;
    $this->dataStore = array();
  }
  
  public function save(): void {
    $this->dataStore[] =  $this->entity->getData();
  }

  public function getSaveData(){
    return $this->dataStore;
  }
}


$user = new User("Oliver", "111", "Male", 26);
$entityManager = new EntityManager($user);
$entityManager->save();
var_dump($entityManager->getSaveData());