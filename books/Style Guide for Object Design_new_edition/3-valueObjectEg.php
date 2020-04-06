<?php 
final class Quantity 
{
  private $quantity;
  private $precision;

  private function __construct(int $quantity, int $precision){
    $this->quantity = $quantity;
    $this->precision = $precision;
  }

  public static function fromInt(int $quantity, int $precision): Quantity{
    return new self($quantity, $precision);
  }

  public function add(Quantity $other): Quantity
  {
    // Assertion::same($this->precision, $other->precision);
    return new self(
      $this->quantity + $other->quantity,
      $this->precision
    );
  }
}


// A quantity of 1500 with a precision of 2 represents 15.00
$originalQuantity = Quantity::fromInt(1500, 2);
// The modified quantity represents 15.00 + 5.00 = 20.00
$newQuantity = $originalQuantity->add(Quantity::fromInt(500, 2));

var_dump( $originalQuantity, $newQuantity );