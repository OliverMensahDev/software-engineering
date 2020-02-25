<?php
/**
 * Index File
 */
require 'VehicleBase.php';
require 'Car.php';

$car = new Car('red', 'sedan', 1);
$carData  = 'The ' . strtolower(get_class($car));
$carData .= ' is ' . $car->color;
$carData .= ', type is ' . $car->type;
$carData .= ($car->hasTrunk)? ' and it has a trunk.' . PHP_EOL: ' without a trunk.' . PHP_EOL;

echo "$carData";