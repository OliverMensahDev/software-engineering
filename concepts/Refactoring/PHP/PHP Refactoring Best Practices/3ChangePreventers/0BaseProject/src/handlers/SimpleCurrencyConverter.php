<?php

namespace app\handlers;

use Exception;
use GuzzleHttp\Client;

class SimpleCurrencyConverter
{
  private $currencyTo;

  public function __construct($currencyTo)
  {
    $this->currencyTo = $currencyTo;
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
    $rates = $this->getCurrencyRate("USD");
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

  private function getCurrencyRate(string $baseCurrency)
  {
    $client = new Client(['base_uri' => 'https://api.exchangeratesapi.io/']);
    $response = $client->request('GET', "latest?base=$baseCurrency");
    return $response->getBody();
  }

  //new requirement: print rates : sol1 & 2
  public function printRates(string $currencyTo)
  {
    $rates = $this->getCurrencyRate("USD");
    if ($currencyTo === "EUR") {
      echo $this->getRate($rates, "EUR");
    } else if ($currencyTo === "CAD") {
      echo $this->getRate($rates, "CAD");;
    } else
      throw new Exception("Unrecognized currency: $this->currencyTo");
  }
  public function printRates1(string $currencyTo)
  {
    $rates = $this->getCurrencyRate("USD");
    echo $this->getRate($rates, $currencyTo);

  }
}
