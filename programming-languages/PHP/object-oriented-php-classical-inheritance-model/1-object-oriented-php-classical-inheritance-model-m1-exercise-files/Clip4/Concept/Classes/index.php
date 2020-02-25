<?php
/**
 * Index File
 */
require 'VehicleBase.php';
require 'Car.php';
require 'Train.php';
require 'Plane.php';

$car = new Car('red', 'sedan', 1);
$carData  = 'The ' . strtolower(get_class($car));
$carData .= ' is ' . $car->color;
$carData .= ', type is ' . $car->type;
$carData .= ($car->hasTrunk)? ' and it has a trunk.' . PHP_EOL: ' without a trunk.' . PHP_EOL;

$train = new Train('blue', 'freight', 200);
$trainData  = 'The ' . strtolower(get_class($train));
$trainData .= ' is ' . $train->color;
$trainData .= ', type is ' . $train->type;
$trainData .= ($train->carCount) ? " with $train->carCount cars." . PHP_EOL : ' with no cars.' . PHP_EOL;

$airliner = new Plane('silver', 'airliner', 4);
$planeData  = 'The ' . strtolower(get_class($airliner));
$planeData .= ' is ' . $airliner->color;
$planeData .= ', type is ' . $airliner->type;
$planeData .= ($airliner->engineCount > 1) ? " with $airliner->engineCount engines." : ' and has a single engine.';

echo "$carData $trainData $planeData";