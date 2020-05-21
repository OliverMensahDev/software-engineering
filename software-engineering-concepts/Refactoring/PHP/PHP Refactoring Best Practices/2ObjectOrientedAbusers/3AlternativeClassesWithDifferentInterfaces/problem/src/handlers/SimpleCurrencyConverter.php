<?php 

namespace app\handlers;

class SimpleCurrencyConverter
{
  private $currencyTo;

  public function __construct($currencyTo)
  {
    $this->currencyTo = $currencyTo;
  }

  public function convertTo($price)
  {
      if($this->currencyTo === "EUR"){
          return $price * 0.9;
      }
      else if ($this->currencyTo === "CAD"){
          return $price * 1.35;
      }
      else
      throw new Exception("Unrecognized currency: $this->currencyTo");
  }
}