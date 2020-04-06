<?php 

namespace app\taxes;

use app\personnel\Employee;
use app\personnel\FullTimeEmployee;
use app\personnel\Intern;
use app\personnel\PartTimeEmployee;

class TaxCalculator
{

  private const RETIREMENT_TAX_PERCENTAGE = 10;
  private const INCOME_TAX_PERCENTAGE = 16;
  private const BASE_HEALTH_INSURANCE = 100;

  public function calculate(Employee $employee)
  {
    $monthlyIncome = $employee->getMonthlyIncome();
    if($employee instanceof FullTimeEmployee){
      return self::BASE_HEALTH_INSURANCE + 
      ($monthlyIncome * self::RETIREMENT_TAX_PERCENTAGE)/ 100 +
      ($monthlyIncome * self::INCOME_TAX_PERCENTAGE) / 100 ;
    }

    if($employee instanceof PartTimeEmployee){
      return self::BASE_HEALTH_INSURANCE + 
      ($monthlyIncome * 10)/ 100 +
      ($monthlyIncome * self::INCOME_TAX_PERCENTAGE) / 100 ;
    }

    if($employee instanceof Intern){
      if($monthlyIncome < 350){
        return 0;
      }else {
        return ($monthlyIncome * self::INCOME_TAX_PERCENTAGE) /100;
      }
    }
    return 0;   
  }
}