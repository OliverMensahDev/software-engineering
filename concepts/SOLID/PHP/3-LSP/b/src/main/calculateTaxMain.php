<?php

use app\logging\ConsoleLogger;
use app\persistence\EmployeeRepository;
use app\persistence\EmployeeFileSerializer;
use app\persistence\FileStore;
use app\taxes\TaxCalculatorFactory;

require_once '../../vendor/autoload.php';

$repository = new EmployeeRepository(new EmployeeFileSerializer(), new FileStore());
$employees = $repository->findAll();
$logger = new ConsoleLogger();
$totalTax = 0;
foreach($employees as $employee){
  try {
    $taxCalculator = TaxCalculatorFactory::create($employee);
    $tax = $taxCalculator->calculate($employee);
    $totalTax += $tax;
    $logger->writeInfo("Employee {$employee->getFullName()} tax: {$tax} \n");
  } catch (\Exception $e) {
     $logger->writeError("Error Saving employee", $e);
  }
}

$logger->writeInfo("Total Tax: {$totalTax} \n");
