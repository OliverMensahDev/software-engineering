<?php
/**
 * Index File
 */
require 'Loader.php';
Loader::init();

//Get a new train instance and set data
$freighter = new TrainEngine('Freight');
$freighter->setMake('General Electric');
$freighter->setModel('ET44C4');
$freighter->setOperator('BNSF');
$freighter->setCountry('USA');

//Get a new view instance and call render
$view = new View($freighter);
$view->render();