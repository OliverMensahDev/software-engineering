<?php 

namespace App\Services;

// DB credentials.
define('DB_HOST','localhost');
define('DB_USER','root');//database username
define('DB_PASS','');// database passord
define('DB_NAME','abstract_art'); //database name


final class Database {
  // The PDO object.
  private $dbh;
  // Establish database connection
  // or display an error message.
  function __construct()
  {
    try
    {
      $this->dbh = new \PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,
      DB_USER, DB_PASS,
      array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    }
    catch (\PDOException $e)
    {
      exit("Error: " . $e->getMessage());
    }
  }
  // We need a method to get the database handler
  // so it can be used outside of this class.
  function get(): \PDO
  {
    return $this->dbh;
  }
  // Set the PDO object to null to close the connection.
  function close()
  {
    $this->dbh = null;
  }
}
