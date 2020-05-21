<?php
//Define a path constants for requires
define('CLASSES', __DIR__ . '/Classes/');
define('LAYOUTS', __DIR__ . '/Layouts/');
require 'Controllers/AppController.php';

$controller = AppController::getInstance();
$controller->init();

$controller = AppController::getInstance();
$controller->init();

