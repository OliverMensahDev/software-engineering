<?php 
interface HttpClient
{
  public function get($url): Response;
}

final class CurlHttpClient implements HttpClient
{
  public function get($url): Response
  {
    $httpClient = new CurlHttpClient();
    $response  = $httpClient->get($url);
  }
}

interface ExchangeRates
{
  public function exchangeRateFor(Currency $from,Currency $to): ExchangeRate;
}


final class FixerApi implements ExchangeRates
{
  /*
  * Now we inject the interface, not the concrete class:
  */
  public function __construct(HttpClient $httpClient)
  {
    $this->httpClient = $httpClient;
  }
  public function exchangeRateFor(  Currency $from,  Currency $to  ): ExchangeRate
  {
    /*
    * We have to change the code a bit to use the new interface
    * and its `get()` method:
    */
    $response = $this->httpClient->get('http://data.fixer.io/api/latest?access_key=...' .
      '&base=' . $from>asString() .
      '&symbols=' . $to->asString()
    );
    $decoded = json_decode($response->getBody());
    $rate = (float)$decoded->rates->{$to->asString()};
    return ExchangeRate::from($from, $to, $rate);
  }
}


final class CurrencyConverter
{
  private $exchangeRates;
  /*
  * Instead of a `Fixer` object, we can now inject an
  * `ExchangeRates` instance:
  */
  public function __construct(ExchangeRates $exchangeRates)
  {
    $this->exchangeRates = $exchangeRates;
  }
  // ...
  private function exchangeRateFor(Currency $from, Currency $to ): ExchangeRate {
    /*
    * We use the new service here, to get the answer we're
    * looking for:
    */
    return $this->exchangeRates->exchangeRateFor($from, $to);
  }


  public function convert(Money $money, Currency $to): Money
  {
    $exchangeRate = $this->exchangeRateFor($money->currency(), $to);
    return $money->convert($exchangeRate);
  }
}