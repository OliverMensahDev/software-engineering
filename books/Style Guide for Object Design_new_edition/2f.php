<?php 
class Data{
  public function __construct($value, $limit, $lowerLimit, $upperLimit){
    Assertion::greaterThan($value, $limit);
    Assertion::isCallable($value);
    Assertion::between($value, $lowerLimit,$upperLimit);
  }
}