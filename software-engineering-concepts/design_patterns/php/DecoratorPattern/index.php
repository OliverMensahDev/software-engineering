<?php

// Base Component
interface Pizza
{
    public function getDesc(): string;
}

// Concrete Component
class Margherita implements Pizza
{

    public function getDesc(): string
    {
        return "Margherita ";
    }
}

class VeggieParadise implements Pizza
{

    public function getDesc(): string
    {
        return "Veggie Paradise ";
    }
}

// Base Decorator
class PizzaToppings implements Pizza
{
    protected $pizza;

    public function __construct(Pizza $pizza)
    {
        $this->pizza = $pizza;
    }

    public function getDesc(): string
    {
        return $this->pizza->getDesc();
    }
}

// Concrete Decorator
class ExtraCheese extends PizzaToppings
{

    public function getDesc(): string
    {
        return parent::getDesc() . "Extra Cheese ";
    }
}

class Jalapeno extends PizzaToppings
{

    public function getDesc(): string
    {
        return parent::getDesc() . "Jalapeno ";
    }
}

function makePizza(Pizza $pizza)
{
    echo "Your Order: " . $pizza->getDesc();
}

$pizza = new Margherita();
$pizza = new ExtraCheese($pizza);
$pizza = new Jalapeno($pizza);
makePizza($pizza);


// Coffee
interface Coffee
{
    public function getCost();
    public function getDescription();
    public function print();
}

class SimpleCoffee implements Coffee
{
    public function getCost()
    {
        return 10;
    }
    public function getDescription()
    {
        return 'Simple Coffee';
    }

    public function print()
    {
        echo $this->getDescription() . ' ' . $this->getCost();
        echo PHP_EOL;
    }
}

class MilkCoffee implements Coffee
{
    protected $coffee;
    public function __construct(Coffee $coffee)
    {
        $this->coffee = $coffee;
    }
    public function getCost()
    {
        return $this->coffee->getCost() + 2;
    }
    public function getDescription()
    {
        return $this->coffee->getDescription() . ', milk';
    }
    public function print()
    {
        echo $this->getDescription() . ' ' . $this->getCost();
        echo PHP_EOL;
    }
}

class WhipCoffee implements Coffee
{
    protected $coffee;
    public function __construct(Coffee $coffee)
    {
        $this->coffee = $coffee;
    }
    public function getCost()
    {
        return $this->coffee->getCost() + 5;
    }
    public function getDescription()
    {
        return $this->coffee->getDescription() . ', whip';
    }
    public function print()
    {
        echo $this->getDescription() . ' ' . $this->getCost();
        echo PHP_EOL;
    }
}

class VanillaCoffee implements Coffee
{
    protected $coffee;
    public function __construct(Coffee $coffee)
    {
        $this->coffee = $coffee;
    }
    public function getCost()
    {
        return $this->coffee->getCost() + 5;
    }
    public function getDescription()
    {
        return $this->coffee->getDescription() . ', vanilla';
    }
    public function print()
    {
        echo $this->getDescription() . ' ' . $this->getCost();
        echo PHP_EOL;
    }
}

$someCoffee = new SimpleCoffee();
$someCoffee->print();

$someCoffee = new MilkCoffee($someCoffee);
$someCoffee->print();


$someCoffee = new WhipCoffee($someCoffee);
$someCoffee->print();


$someCoffee = new VanillaCoffee($someCoffee);
$someCoffee->print();


class Decorator implements Coffee
{
    private $cost;
    private $description;
    private $coffee;

    public function __construct(int $cost, string $description,  Coffee $coffee)
    {
        $this->cost = $cost;
        $this->description = $description;
        $this->coffee = $coffee;
    }
    public function getCost()
    {
        return $this->coffee->getCost() + $this->cost;
    }

    public function getDescription()
    {
        return $this->coffee->getDescription() . ', ' . $this->description;
    }
    public function print()
    {
        $this->coffee->print();
        echo  $this->getDescription() . ' ' . $this->getCost();
        echo PHP_EOL;
    }
}

$decorator = new Decorator(5, 'Vanilla', new Decorator(5, 'Whip', new Decorator(2, 'Milk', new SimpleCoffee())));
$decorator->print();



//FizzBuzz
interface Rule
{
    function print(int $number, bool $isMatch);
}


class NonMatchedRule implements Rule
{
    public function print(int $number, bool $isMatched)
    {
        if (!$isMatched) {
            echo $number;
        }
        echo PHP_EOL;
    }
}

class MatchedRule implements Rule
{
    private $name;
    private $number;
    private $nested_rule;

    public function __construct(int $number, string $name, Rule $rule)
    {
        $this->number = $number;
        $this->name = $name;
        $this->nested_rule = $rule;
    }

    public function print(int $number, bool $isMatched)
    {
        if ($number % $this->number == 0) {
            echo $this->name;
            $this->nested_rule->print($number, true);
        } else {
            $this->nested_rule->print($number, $isMatched);
        }
    }
}

$FizzBuzzBazz = new MatchedRule(
    3,
    'Fizz',
    new MatchedRule(
        5,
        "Buzz",
        new MatchedRule(
            7,
            "Bazz",
            new NonMatchedRule()
        )
    )
);

for ($i = 1; $i < 100; $i++) {
    $FizzBuzzBazz->print($i, false);
}
