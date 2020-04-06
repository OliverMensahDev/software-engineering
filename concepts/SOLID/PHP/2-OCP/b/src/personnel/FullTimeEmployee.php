<?php 
namespace app\personnel;

class FullTimeEmployee extends Employee {
  public function __construct(string $fullName, int $monthlyIncome) {
    parent::__construct($fullName, $monthlyIncome);
    parent::setNbHoursPerWeek(40);
  }
}
