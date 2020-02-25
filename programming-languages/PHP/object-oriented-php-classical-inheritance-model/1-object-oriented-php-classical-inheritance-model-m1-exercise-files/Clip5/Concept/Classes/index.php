<?php
/**
 * Index File
 */
require 'VehicleBase.php';
require 'Car.php';
require 'Train.php';
require 'Plane.php';

$car = new Car('sedan', 1);
$car->setColor('red');
$carData  = ucfirst($car->getColor());

$train = new Train('blue', 'freight', 200);
$train->setOperator('Northwestern');
$trainData = $train->getOperator();

$airliner = new Plane('silver', 'airliner', 4);
$airliner->setOperator('Antartica Airlines');
$planeData = $airliner->getOperator();

echo "$carData car. Train operator: $trainData. My next flight is on $planeData.";