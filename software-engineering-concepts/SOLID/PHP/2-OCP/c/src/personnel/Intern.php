<?php 
namespace app\personnel;

class Intern extends Employee {
  public function __construct(string $fullName, int $monthlyIncome, int $nbHours) {
    parent::__construct($fullName, $monthlyIncome);
    parent::setNbHoursPerWeek($nbHours);
  }
}
