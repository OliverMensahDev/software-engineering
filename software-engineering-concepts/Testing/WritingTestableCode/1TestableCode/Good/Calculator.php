<?php 

class Calculator 
{
  public function getTotal($parts, $service, $discount)
  {
    return $parts + $service - $discount;
  }
}