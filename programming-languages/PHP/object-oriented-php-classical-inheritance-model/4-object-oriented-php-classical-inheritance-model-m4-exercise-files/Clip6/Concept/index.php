<?php
/**
 * Index File
 */
declare(strict_types=1);
require 'Loader.php';
Loader::init();

//Get a new plane instance and set the operator
$airliner = new Plane('Airliner');
$airliner->setMake('Boeing');
$airliner->setModel('787');
$airliner->setOperator('World Airlines');
$airliner->setCountry('Antartica');

//Get a new view instance and call render
$view = new View($airliner);
echo $view->render();