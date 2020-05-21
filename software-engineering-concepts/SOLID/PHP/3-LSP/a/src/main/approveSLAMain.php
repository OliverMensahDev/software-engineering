<?php

use app\logging\ConsoleLogger;
use app\persistence\EmployeeRepository;
use app\persistence\EmployeeFileSerializer;
use app\persistence\FileStore;
use app\personnel\ServiceLicenseAgreement;
use app\personnel\Subcontractor;

require_once '../../vendor/autoload.php';

//dependencies 
$repository = new EmployeeRepository(new EmployeeFileSerializer(), new FileStore());
$employees = $repository->findAll();
$logger = new ConsoleLogger();

//Define SLA
$minTimeOutPercent = 98;
$maxResolutionDays = 2;
$companySLA = new ServiceLicenseAgreement($minTimeOutPercent, $maxResolutionDays);

foreach($employees as $employee){

  if($employee instanceof Subcontractor){
    $employee->approveSLA($companySLA);
  }
}

