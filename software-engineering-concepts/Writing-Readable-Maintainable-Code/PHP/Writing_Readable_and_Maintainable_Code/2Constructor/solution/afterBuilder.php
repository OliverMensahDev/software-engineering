<?php

class PizzaBuilder
{
  //mandatory
  public $size;

  // default is false
  public $cheese;
  public $ham;

  public function __construct(int $size)
  {
    $this->size = $size;
  }

  public function cheese(bool $value): PizzaBuilder
  {
    $this->cheese = $value;
    return $this;
  }

  public function ham(bool $value): PizzaBuilder
  {
    $this->ham = $value;
    return $this;
  }

  public function build(): Pizza
  {
    return new Pizza($this);
  }
}


class Pizza
{
  public function __construct(PizzaBuilder $builder)
  {
    $this->size = $builder->size;
    $this->cheese = $builder->cheese;
    $this->ham = $builder->ham;
  }

  public function deliver()
  {
    echo "Pizza with sze {$this->size}, cheese: {$this->cheese} is being delivered";
  }
}


$pizza = (new PizzaBuilder(12))
          ->cheese(true)
          ->ham(true)
          ->build();
          // deliver pizza
$pizza->deliver();          
