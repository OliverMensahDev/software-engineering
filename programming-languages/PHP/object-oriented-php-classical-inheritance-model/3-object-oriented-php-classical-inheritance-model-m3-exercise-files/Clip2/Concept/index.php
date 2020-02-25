<?php
/**
 * Index File
 */

require 'Loader.php';
Loader::init();

$airliner1 = new Plane('Airliner');
$airliner1->setOperator('World Airlines')
    ->setHasFirstClass(true)
    ->setHasBusinessClass(true)
    ->setCountry('Australia')
    ->setEngineCount(4)
    ->setMake('Boeing')
    ->setModel('747-8i');

$airliner2 = new Plane('Airliner');
$airliner2->setOperator('National Airlines')
    ->setHasFirstClass(true)
    ->setCountry('USA')
    ->setEngineCount(2)
    ->setMake('Boeing')
    ->setModel('787');

$businessJet = new Plane('BusinessJet');
$businessJet->setOperator('Executive Courier')
    ->setCountry('Japan')
    ->setEngineCount(2)
    ->setMake('Gulfstream')
    ->setModel('5');

echo $airliner1->getCountry(). PHP_EOL,
     $airliner2->getMake(). PHP_EOL,
     $businessJet->getModel();

