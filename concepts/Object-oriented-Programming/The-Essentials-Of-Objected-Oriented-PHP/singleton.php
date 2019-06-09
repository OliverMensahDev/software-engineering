<?php
// Singleton to connect db.
class ConnectDb {
  // Hold the class instance.
  private static $instance = null;
  private $conn;
  
  private $host = 'localhost';
  private $user = 'db user-name';
  private $pass = 'db password';
  private $name = 'db name';
   
  // The db connection is established in the private constructor.
  private function __construct()
  {
    $this->conn = new PDO("mysql:host={$this->host};
    dbname={$this->name}", $this->user,$this->pass,
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
  }
  
  public static function getInstance()
  {
    if(!self::$instance)
    {
      self::$instance = new ConnectDb();
    }
   
    return self::$instance;
  }
  
  public function getConnection()
  {
    return $this->conn;
  }
}


$instance = ConnectDb::getInstance();
$conn = $instance->getConnection();
var_dump($conn);

$instance = ConnectDb::getInstance();
$conn = $instance->getConnection();
var_dump($conn);

$instance = ConnectDb::getInstance();
$conn = $instance->getConnection();
var_dump($conn);
