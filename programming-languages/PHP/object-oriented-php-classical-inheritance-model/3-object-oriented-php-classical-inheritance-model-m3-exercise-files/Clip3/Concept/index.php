<?php
/**
 * Index File
 */

require 'Loader.php';
Loader::init();

$airliner = new Plane('Airliner');
$airliner->setOperator('World Airlines');
$airliner->setHasFirstClass(true)
    ->setHasBusinessClass(true)
    ->setCountry('Australia')
    ->setEngineCount(4)
    ->setMake('Boeing')
    ->setModel('747-8i');

echo $airliner->operator;

