<?php
/**
 * Index File
 */
require 'Classes/VehicleBase.php';
require 'Classes/Car.php';
require 'Classes/OrderedList.php';

$car = new Car('sedan', 1);
$car->setColor('red');

$suv = clone $car;
echo $suv->getType();