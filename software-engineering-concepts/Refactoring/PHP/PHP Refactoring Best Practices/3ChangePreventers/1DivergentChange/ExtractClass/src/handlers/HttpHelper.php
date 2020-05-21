<?php
namespace app\handlers;

use GuzzleHttp\Client;

class HttpHelper
{
  public function getCurrencyRate(string $baseCurrency)
  {
    $client = new Client(['base_uri' => 'https://api.exchangeratesapi.io/']);
    $response = $client->request('GET', "latest?base=$baseCurrency");
    return $response->getBody();
  }
}