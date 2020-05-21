<?php

namespace app\payment;

use app\notification\EmailSender;
use app\persistence\EmployeeFileSerializer;
use app\persistence\EmployeeRepository;

class PaymentProcessor
{

  private $employeeRepository;

  public function __construct(){
    $this->employeeRepository = new EmployeeRepository(new EmployeeFileSerializer());
  }

  public function sendPayments(){
      $employees = $this->employeeRepository->findAll();
      $totalPayments = 0;

      foreach ($employees as $employee) {
        $totalPayments += $employee->getMonthlyIncome();
        EmailSender::notify($employee);
      }
      return $totalPayments;
  }
}