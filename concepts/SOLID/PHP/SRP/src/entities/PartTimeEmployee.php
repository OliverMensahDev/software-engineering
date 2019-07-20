<?php 
namespace app\entities;

class PartTimeEmployee extends Employee {
    public function __construct(string $fullName, int $monthlyIncome) {
        parent::__construct($fullName, $monthlyIncome);
        parent::setNbHoursPerWeek(20);
    }
}