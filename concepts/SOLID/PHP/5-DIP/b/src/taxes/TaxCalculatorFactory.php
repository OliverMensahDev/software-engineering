<?php 

namespace app\taxes;

use app\personnel\Employee;
use app\personnel\FullTimeEmployee;
use app\personnel\Intern;
use app\personnel\PartTimeEmployee;
use RuntimeException;

class TaxCalculatorFactory
{
  public static function create(Employee $employee): TaxCalculator
  {
    if($employee instanceof FullTimeEmployee){
      return new FullTimeTaxCalculator();
    }
    if($employee instanceof PartTimeEmployee){
      return new PartTimeTaxCalculator();
    }
    if($employee instanceof Intern){
      return new InternTaxCalculator();
    }

    throw new RuntimeException("Invalid Employee Type");
  }
}