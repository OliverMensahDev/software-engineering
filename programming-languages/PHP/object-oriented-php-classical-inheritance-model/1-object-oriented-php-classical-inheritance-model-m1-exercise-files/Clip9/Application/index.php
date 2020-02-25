<?php
//Define a path constants for requires
define('DS', DIRECTORY_SEPARATOR);
define('CLASSES', __DIR__ . DS . 'Classes' . DS);
define('CONFIG', __DIR__ . DS . 'Config' . DS);
define('LAYOUTS', __DIR__ . DS . 'Layouts' . DS);
if(!class_exists('Session')){
    require CLASSES . 'Session.php';
};

require CLASSES . DS . 'Controllers' . DS . 'AppController.php';
$controller = new AppController();
$controller->init();