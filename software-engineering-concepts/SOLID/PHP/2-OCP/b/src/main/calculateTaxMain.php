<?php

use app\logging\ConsoleLogger;
use app\persistence\EmployeeRepository;
use app\persistence\EmployeeFileSerializer;
use app\persistence\FileStore;
use app\taxes\TaxCalculator;

require_once '../../vendor/autoload.php';

$repository = new EmployeeRepository(new 
EmployeeFileSerializer(), new FileStore());
$employees = $repository->findAll();
$taxCalculator = new TaxCalculator();
$logger = new ConsoleLogger();

foreach($employees as $employee){
  try {
    $tax = $taxCalculator->calculate($employee);
    $logger->writeInfo("Employee {$employee->getFullName()} tax: {$tax} \n");
  } catch (\Exception $e) {
     $logger->writeError("Error Saving employee", $e);
  }
}