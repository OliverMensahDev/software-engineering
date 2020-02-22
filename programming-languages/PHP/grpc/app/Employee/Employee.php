<?php

declare(strict_types=1);

namespace App\Employee;
use App\GeneratedCode\Employee\GetByBadgeNumberRequest;
use App\GeneratedCode\Employee\GetAllRequest;
use App\GeneratedCode\Employee\EmployeeRequest;
use App\GeneratedCode\Employee\EmployeeResponse;
use App\GeneratedCode\Employee\EmployeeServiceInterface;

class Employee implements EmployeeServiceInterface
{
    /**
     * Method <code>getByBadgeNumber</code>
     *
     * @param \App\Employee\GetByBadgeNumberRequest $request
     * @return \App\Employee\EmployeeResponse
     */
  public function getByBadgeNumber(GetByBadgeNumberRequest $request)
  {
    return null;
  }

  public function getAll(GetAllRequest $request)
  {
    return null;
  }

  public function save(EmployeeRequest $request)
  {
    $em = $request->getEmployee();
    return (new EmployeeResponse())->setEmployee($em);
  }

  public function saveAll(EmployeeRequest $request)
  {
    return null;
  }

}