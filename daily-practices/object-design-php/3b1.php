<?php 
final class Integer
{
  private $integer;

  public function __construct(int $integer)
  {
    $this->integer = $integer;
  }

  public function plus(Integer $other)
  {
    return new self($this->integer +  $other->integer);
  }
}

$int = new Integer(5);
var_dump($int);
$b = $int->plus(new Integer(5));
var_dump($b);
var_dump($int);