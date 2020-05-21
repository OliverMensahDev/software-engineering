<?php

use app\logging\ConsoleLogger;
use app\persistence\EmployeeRepository;
use app\persistence\EmployeeFileSerializer;
use app\persistence\FileStore;

require_once '../../vendor/autoload.php';

$repository = new EmployeeRepository(new 
EmployeeFileSerializer(), new FileStore());
$employees = $repository->findAll();
$logger = new ConsoleLogger();

foreach($employees as $employee){
  try {
    $repository->save($employee);
    $logger->writeInfo("Saved Employee {$employee->getFullName()} \n");
  } catch (\Exception $e) {
     $logger->writeError("Error Saving employee", $e);
  }
}