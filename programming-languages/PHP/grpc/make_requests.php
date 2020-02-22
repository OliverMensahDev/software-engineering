<?php

use App\GeneratedCode\Employee\Employee;
use App\GeneratedCode\Employee\EmployeeRequest;
use App\Employee\EmployeeClient;

require __DIR__ . '/vendor/autoload.php';

$calculator = new EmployeeClient();

$req   = (new EmployeeRequest())->setEmployee(
  (new Employee())
    ->setId(1)
    ->setBadgeNumber(45)
    ->setFirstName("Oliver")
  );
$reply = $calculator->save($req);