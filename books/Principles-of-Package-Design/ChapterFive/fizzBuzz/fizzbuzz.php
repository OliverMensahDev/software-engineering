<?php 
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
    if($number % 3 === 0 && $number % 5 === 0){
      return "FizzBuzz";
    }
    if($number % 3 === 0){
      return "Fizz";
    }
    if($number % 5 === 0){
      return "Buzz";
    }
    return (string)$number;
  }
}

$fizzBuzz = new FizzBuzz();
$list = $fizzBuzz->generateList(100);
var_dump($list);
