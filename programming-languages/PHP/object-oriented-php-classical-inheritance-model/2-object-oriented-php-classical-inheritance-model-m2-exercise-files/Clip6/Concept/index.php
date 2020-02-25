<?php
/**
 * Index File
 */
require 'Classes/VehicleBase.php';
require 'Classes/Car.php';

$car = new Car('sedan', 1);
$car->hasThirdRowSeats = true;