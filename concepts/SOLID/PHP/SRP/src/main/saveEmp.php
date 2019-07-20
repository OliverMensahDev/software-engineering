<?php 
use app\persistence\EmployeeRepository;
use app\persistence\EmployeeFileSerializer;
use app\persistence\FileStore;

require_once '../../vendor/autoload.php';

$repository = new EmployeeRepository(new EmployeeFileSerializer(), new FileStore());
$employees = $repository->findAll();

foreach($employees as $employee){
  $repository->save($employee);
}