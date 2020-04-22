<?php

final class Connection
{
  private static $instance = null;

  private $host = 'localhost';
  private $user = 'root';
  private $pass = '';
  private $name = 'job_order';

  private $dbh;
  private $stmt;

  private function __construct()
  {
    try {
      $this->dbh = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->name, $this->user, $this->pass);
    } catch (PDOException $e) {
      echo '<div class="alert alert-danger">' . get_class($e) . ' on line ' . $e->getLine() . ' of ' . $e->getFile() . ': ' . $e->getMessage() . '</div>';
    }
  }

  public static function getInstance()
  {
    if (!self::$instance) {
      self::$instance = new Connection();
    }

    return self::$instance;
  }

  public function query($query)
  {
    try {
      $this->stmt = $this->dbh->prepare($query);
    } catch (Throwable $e) {
      echo '<div class="alert alert-danger">' . get_class($e) . ' on line ' . $e->getLine() . ' of ' . $e->getFile() . ': ' . $e->getMessage() . '</div>';
    }
  }

  public function bind($param, $value, $type = null)
  {
    try {
      if (is_null($type)) {
        switch (true) {
          case is_int($value):
            $type = PDO::PARAM_INT;
            break;
          case is_bool($value):
            $type = PDO::PARAM_BOOL;
            break;
          case is_null($value):
            $type = PDO::PARAM_NULL;
            break;
          default:
            $type = PDO::PARAM_STR;
        }
      }
      $this->stmt->bindValue($param, $value, $type);
    } catch (Throwable $e) {
      echo '<div class="alert alert-danger">' . get_class($e) . ' on line ' . $e->getLine() . ' of ' . $e->getFile() . ': ' . $e->getMessage() . '</div>';
    }
  }

  public function execute()
  {
    try {
      return $this->stmt->execute();
    } catch (Throwable $e) {
      echo '<div class="alert alert-danger">' . get_class($e) . ' on line ' . $e->getLine() . ' of ' . $e->getFile() . ': ' . $e->getMessage() . '</div>';
    }
  }

  public function resultSet(): array
  {
    try {
      $this->execute();
      return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    } catch (Throwable $e) {
      echo '<div class="alert alert-danger">' . get_class($e) . ' on line ' . $e->getLine() . ' of ' . $e->getFile() . ': ' . $e->getMessage() . '</div>';
    }
  }

  public function lastInsertId()
  {
    return $this->dbh->lastInsertId();
  }

  public function single()
  {
    try {
      $this->execute();
      return $this->stmt->fetch(PDO::FETCH_OBJ);
    } catch (Throwable $e) {
      echo '<div class="alert alert-danger">' . get_class($e) . ' on line ' . $e->getLine() . ' of ' . $e->getFile() . ': ' . $e->getMessage() . '</div>';
    }
  }
  public function rowCount()
  {
    return $this->stmt->rowCount();
  }
}

class Authentication
{
  private $connection;
  
  public function __construct(Connection $connection)
  {
    $this->connection = $connection;
  }

  public function checkCredentials(string $username, string $password): bool
  {
    $this->connection->query("SELECT * FROM  users  WHERE username = :username");
    $this->connection->bind(":email", $username);
    $user = $this->connection->single(); 
    if($user === null){
      throw new Exception("User not found");
    }
    if (!password_verify($password, $user->password)) {
      throw new Exception("User not found");
    }
    return true;
  }
}