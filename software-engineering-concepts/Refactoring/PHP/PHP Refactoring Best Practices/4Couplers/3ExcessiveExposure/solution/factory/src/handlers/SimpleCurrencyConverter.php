<?php 
namespace app\handlers;

use Exception;

class SimpleCurrencyConverter
{
  private $currencyTo;
  private $httpHelper;
  private function __construct($currencyTo, HttpHelper $httpHelper)
  {
    $this->currencyTo = $currencyTo;
    $this->httpHelper = $httpHelper;
  }

  public function convert($price)
  {
    if ($this->currencyTo === "EUR") {
      return $price * 0.9;
    } else if ($this->currencyTo === "CAD") {
      return $price * 1.35;
    } else
      throw new Exception("Unrecognized currency: $this->currencyTo");
  }


  public function convertWithWebService($price)
  {
    $rates = $this->httpHelper->getCurrencyRate("USD");
    if ($this->currencyTo === "EUR") {
      return $price * $this->getRate($rates, "EUR");
    } else if ($this->currencyTo === "CAD") {
      return $price * $this->getRate($rates, "CAD");;
    } else
      throw new Exception("Unrecognized currency: $this->currencyTo");
  }
  private function getRate(string $rates, string $currencyTo)
  {
    $data = json_decode($rates);
    return $data->rates->$currencyTo;
  }
  //new requirement: print rates : sol1 & 2
  public function printRates(string $currencyTo)
  {
    $rates = $this->httpHelper->getCurrencyRate("USD");
    if ($currencyTo === "EUR") {
      echo $this->getRate($rates, "EUR");
    } else if ($currencyTo === "CAD") {
      echo $this->getRate($rates, "CAD");;
    } else
      throw new Exception("Unrecognized currency: $this->currencyTo");
  }
  public function printRates1(string $currencyTo)
  {
    $rates = $this->httpHelper->getCurrencyRate("USD");
    echo $this->getRate($rates, $currencyTo);

  }

  public static function getInstance($currencyTo): SimpleCurrencyConverter
  {
    return new SimpleCurrencyConverter($currencyTo, new HttpHelper());
  }
}
