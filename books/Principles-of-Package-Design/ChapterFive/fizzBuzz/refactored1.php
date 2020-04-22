<?php 
class FizzRule 
{
  public function matches(int $number): bool
  {
    return $number % 3 === 0;
  }

  public function getReplacement(): string
  {
    return 'Fizz';
  }
}

class BuzzRule 
{
  public function matches(int $number): bool
  {
    return $number % 5 === 0;
  }

  public function getReplacement(): string
  {
    return 'Buzz';
  }
}

class FizzBuzzRule 
{
  public function matches(int $number): bool
  {
    return $number % 3 === 0 && $number % 5 === 0;
  }

  public function getReplacement(): string
  {
    return 'FizzBuzz';
  }
}

class FizzBuzz
{
  public function generateList(int $limit): array 
  {
    $list = [];
    for($number = 1; $number <= $limit; $number++){
      $list[] = $this->generateElement($number);
    }
    return $list;
  }

  private function generateElement(int $number): string
  {
    $fizzBuzzRule = new FizzBuzzRule();
    if($fizzBuzzRule->matches($number)){
      return $fizzBuzzRule->getReplacement();
    }
    $fizzRule = new FizzRule();
    if($fizzRule->matches($number)){
      return $fizzRule->getReplacement();
    }
    $buzzRule = new BuzzRule();
    if($buzzRule->matches($number)){
      return $buzzRule->getReplacement();
    }
    return (string)$number;
  }
}

$fizzBuzz = new FizzBuzz();
$list = $fizzBuzz->generateList(100);
var_dump($list);
