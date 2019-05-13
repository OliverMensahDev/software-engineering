<?php
class FuelEconomy {
  // Calculate the fuel efficiency
  public function calculate($distance, $gas)
  {
    if($gas <= 0 )
    {
    // Throw custom error message, instead of an error
      throw new Exception("The gas consumption cannot be less than   or equal to zero. You better drink coffee or take a break.");
    }
    return $distance/$gas;
  }
}

// The data to feed the class with
$dataFromCars = array(
  array(50,10),
  array(50,0),
  array(50,-3),
  array(30,5)
);
foreach($dataFromCars as $data => $value)
{
  // Try block handles the normal data
  try
  {
    $fuelEconomy = new FuelEconomy();
    echo $fuelEconomy -> calculate($value[0],$value[1]) . "<br />";
  }
  // Catch block handles the exceptions
  catch (Exception $e)
  {
    // Echo the custom error message
    echo "Message: " . $e -> getMessage() . "<br />";
    // Write the error into a log file
    error_log($e -> getMessage());
    error_log($e -> getFile());
    error_log($e -> getLine());
  }
}