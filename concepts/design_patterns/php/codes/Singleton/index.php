<?php

include 'db_connection.php';

$objectA = DBConnection::getInstance();

var_dump($objectA->getUser());