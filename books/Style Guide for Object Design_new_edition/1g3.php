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
  
  private $dataStore;
  
  public function __construct(){
    $this->dataStore = array();
  }
  
  public function save(object $entity): void {
    $this->dataStore[] =  $entity->getData();
  }

  public function getSaveData(){
    return $this->dataStore;
  }
}


$user = new User("Oliver", "111", "Male", 26);
$user1 = new User("Olivia", "111", "Male", 30);
$user2 = new User("Oliviera", "111", "Male", 40);

$entityManager = new EntityManager();
$entityManager->save($user);
$entityManager->save($user1);
$entityManager->save($user2);
var_dump($entityManager->getSaveData());