<?php 
use app\persistence\EmployeeRepository;

require_once '../../vendor/autoload.php';

$repository = new EmployeeRepository();
$employees = $repository->findAll();

foreach($employees as $employee){
  $employee::save($employee);
}