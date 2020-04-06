<?php 
final class Fraction
{
  private $numerator;
  private $denominator;
  public function __construct(int $numerator, int $denominator)
  {
    Assertion::notEq($denominator,0,'The denominator of a fraction cannot be 0');
    $this->numerator = $numerator;
    $this->denominator = $denominator;
  }
  public function withDenominator($newDenominator): Fraction
  {
    /*
    * Forwarding the call to the constructor will also trigger
    Manipulating objects 110
    * any of its assertion errors.
    */
    return new self($this->numerator, $newDenominator);
  }
}
$fraction = new Fraction(1, 2);
expectException(
  InvalidArgumentException::class,
  'denominator',
  function () use ($fraction) {
    $fraction->withDenominator(0);
  }
);