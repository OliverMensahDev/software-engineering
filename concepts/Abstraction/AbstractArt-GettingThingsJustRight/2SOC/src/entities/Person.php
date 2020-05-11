<?php 
namespace App\Entities;

final class Person
{
  public $name;
  public $gender;
  public $age;

  public function __construct(string $name, string $gender, string $age)
  {
    $this->name = $name;
    $this->gender = $gender;
    $this->age  = $age;
  }
}