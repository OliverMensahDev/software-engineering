<?php
/**
 * Index File
 */

require 'Loader.php';
Loader::init();

$airplane = new Plane('Airliner');

echo $airplane->getType();
