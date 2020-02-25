<?php
/**
 * Chaining Example
 */
require 'VehicleBase.php';
require 'Plane.php';

$airliner = new Plane('airliner');
$airliner->setOperator('Antartica Airlines')
    ->setColor('silver')
    ->setColorNumber(1)
    ->setCountry('Antartica')
    ->setEngineCount(4);

$planeData = $airliner->getOperatorData();

echo "My next flight is on $planeData.";