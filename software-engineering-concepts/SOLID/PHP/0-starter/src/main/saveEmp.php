<?php 

require_once '../../vendor/autoload.php';

use app\persistence\EmployeeRepository;


$repository = new EmployeeRepository();
$employees = $repository->findAll();

foreach($employees as $employee){
  $employee::save($employee);
}