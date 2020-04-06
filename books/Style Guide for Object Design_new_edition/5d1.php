<?php 
final class CurrencyConverter 
{
  public function convert(Money $money, Currency $to): Money 
  {
    $httpClient = new CurlHttpClient();
    $response  = $httpClient->get(
      'http://data.fixer.io/api/latest?access_key=...' .
      '&base=' . $money->currency()->asString() .
      '&symbols=' . $to->asString()
    );
    $decoded = json_decode($response->getBody());
    $rate  = (float) $decoded->rates->{$to->asString()};
    return $money->convert($to, $rate);
  }
}