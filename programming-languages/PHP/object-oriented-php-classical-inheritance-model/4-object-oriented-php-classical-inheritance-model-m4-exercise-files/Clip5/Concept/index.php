<?php
/**
 * Index File
 */
declare(strict_types=1);
require 'Loader.php';
Loader::init();

$airplane = new Plane('Airliner');
$airplane->setOperator('World Airlines');
echo $airplane->getOperator();
