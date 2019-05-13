<?php 
class Car 
{
  public $tank;

  public function fill(float $fuel)
  {
    $this->tank += $fuel;

    return $this;
  }

  public function ride(float $fuel)
  {
    $miles = $fuel;
    $gallons = $miles / 50 ;
    $this->tank -= $gallons;

    return $this;
  }
}


// Create an object from the Car class
$bmw = new Car();
// Add 10 gallons of fuel, then ride 40 miles
// and get the number of gallons in the tank
$tank = $bmw -> fill(10) -> ride(40) -> tank;
// Print the results to the screen
echo "The number of gallons left in the tank: " . $tank . " gal.";