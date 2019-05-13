<?php 
interface Driver {
  public function sayYourName($name);
}
class HumanDriver implements Driver {
  public function sayYourName($name)
  {
    return $name;
  }
}
// The RobotDriver implements the interface
class RobotDriver implements Driver {
  public function sayYourName($name)
  {
    return $name;
  }
}

class Car {
  protected $driver;
  // The constructor sets the value of the $driver
  public function __construct(Driver $driver)
  {
    $this -> driver = $driver;
  }

  // The setDriver method sets
  // the value for the driver property
  public function setDriver(Driver $driver)
  {
    $this -> driver = $driver;
  }

  // A getter method that returns the driver object
  // from within the car object
  public function getDriver()
  {
    return $this -> driver;
  }
}


$driver = new HumanDriver();
$car = new Car(new RobotDriver());
// Inject the driver to the car object
$car -> setDriver($driver);
echo $car -> getDriver() -> sayYourName("Bob");