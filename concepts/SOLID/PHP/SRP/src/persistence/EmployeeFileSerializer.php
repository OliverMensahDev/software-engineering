<?php 
namespace app\persistence;

use app\entities\Employee;

class EmployeeFileSerializer {
  public function serialize(Employee $employee): string{
    $sb = "### EMPLOYEE RECORD ####";
    $sb .= PHP_EOL;
    $sb .= "NAME: ";
    $sb .= PHP_EOL;
    $sb .= $employee->getFullName();
    $sb .= PHP_EOL;
    $sb .="POSITION: ";
    $sb .= PHP_EOL;
    $sb .= get_class($employee);
    $sb .= PHP_EOL;
    $sb .="EMAIL: ";
    $sb .= $employee->getEmail();
    $sb .= PHP_EOL;
    $sb .="MONTHLY WAGE: ";
    $sb .= PHP_EOL;
    $sb .= $employee->getMonthlyIncome();
    return $sb;
  }
}