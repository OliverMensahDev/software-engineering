<?php
/**
 * Index File
 */
require 'Classes/VehicleBase.php';
require 'Classes/Car.php';

$car = new Car('sedan', 1);

$serializedObj =  serialize($car);

$restoredCar = unserialize($serializedObj);

echo "Type is: {$restoredCar->getType()}";