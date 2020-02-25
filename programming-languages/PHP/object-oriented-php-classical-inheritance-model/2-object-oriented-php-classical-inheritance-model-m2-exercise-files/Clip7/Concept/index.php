<?php
/**
 * Index File
 */
require 'Classes/VehicleBase.php';
require 'Classes/Car.php';

$car = new Car('sedan', 1);

//Set the model property via the __set() magic method
$car->model = 'Blaze';

//Check the model property via the __isset() magic method
if(isset($car->model)){
    echo "Model: $car->model";
    unset($car->model);
}

