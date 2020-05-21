<?php 
class Car {
  protected $driver;
  public function __construct(Driver $driver)
  {
    $this -> driver = $driver;
  }
}
class Driver {}
$driver1 = new Driver();
$car1 = new Car($driver1);