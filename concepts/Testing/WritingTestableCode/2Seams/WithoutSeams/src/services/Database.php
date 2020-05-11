<?php

namespace App\Services;

use PDO;
use PDOException;
use Throwable;

class Database
{
  private $host = 'localhost';
  private $user = 'root';
  private $pass = '';
  private $name = 'seams_ent';

  private $dbh;
  private $stmt;

  public function __construct()
  {
    try {
      $this->dbh = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->name, $this->user, $this->pass);
    } catch (PDOException $e) {
      echo '<div class="alert alert-danger">' . get_class($e) . ' on line ' . $e->getLine() . ' of ' . $e->getFile() . ': ' . $e->getMessage() . '</div>';
    }
  }

  private function query($query)
  {
    try {
      $this->stmt = $this->dbh->prepare($query);
    } catch (Throwable $e) {
      echo '<div class="alert alert-danger">' . get_class($e) . ' on line ' . $e->getLine() . ' of ' . $e->getFile() . ': ' . $e->getMessage() . '</div>';
    }
  }

  private function bind($param, $value, $type = null)
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

  private function execute()
  {
    try {
      return $this->stmt->execute();
    } catch (Throwable $e) {
      echo '<div class="alert alert-danger">' . get_class($e) . ' on line ' . $e->getLine() . ' of ' . $e->getFile() . ': ' . $e->getMessage() . '</div>';
    }
  }

  private function resultSet(): array
  {
    try {
      $this->execute();
      return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    } catch (Throwable $e) {
      echo '<div class="alert alert-danger">' . get_class($e) . ' on line ' . $e->getLine() . ' of ' . $e->getFile() . ': ' . $e->getMessage() . '</div>';
    }
  }

  private function single()
  {
    try {
      $this->execute();
      return $this->stmt->fetch(PDO::FETCH_OBJ);
    } catch (Throwable $e) {
      echo '<div class="alert alert-danger">' . get_class($e) . ' on line ' . $e->getLine() . ' of ' . $e->getFile() . ': ' . $e->getMessage() . '</div>';
    }
  }
  private function rowCount()
  {
    return $this->stmt->rowCount();
  }

  public function getInvoiceById($id)
  {
    $this->query("SELECT * FROM invoices WHERE id=:id");
    $this->bind(":id", $id);
    return $this->single();
  }
}
