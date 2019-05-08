<?php 
final class DecimalValue{
  private $value;
  private $precision;

  private function __construct(int $value, int $precision){
    $this->value = $value;
    Assertion::greaterOrEqualThan($precision, 0);
    $this->precision = $precision;
  }

  public static function fromInt(int $value, int $precision): DecimalValue{
    return new self($value, $precision);
  }

  public static function fromFloat(float $value, float $precision): DecimalValue{
    return new self((int) round($value * pow(10, $precision)), $precision);
  }

  public static function fromString(int $value): DecimalValue{
   ///;
  }
}