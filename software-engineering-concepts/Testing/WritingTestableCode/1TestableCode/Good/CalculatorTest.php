<?php 
include "./Calculator.php";

class CalculatorTest
{
  public static function test_get_total()
  {
    $calculator = new Calculator();
    $total = $calculator->getTotal(1, 20, 5);
    $expect = 16;
    echo assert("$expect == $total");
  }
}

$calculatorTest = CalculatorTest::test_get_total();
