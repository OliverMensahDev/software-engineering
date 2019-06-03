<?php 
/*
* We introduce `FixerApi::exchangeRateFor()` to represent the
* question being asked: "What's the current exchange rate for
* converting from ... to ...?"
*/

final class FixerApi
{
  public function exchangeRateFor(Currency $from, Currency $to): ExchangeRate
  {
    $httpClient = new CurlHttpClient();
    $response  = $httpClient->get(
      'http://data.fixer.io/api/latest?access_key=...' .
      '&base=' . $from>asString() .
      '&symbols=' . $to->asString()
    );
    $decoded = json_decode($response->getBody());
    $rate  = (float) $decoded->rates->{$to->asString()};
    return ExchangeRate::from($from, to, $rate);
  }
}

/*
* This is a new class that will represent the answer to the
* question "What's the current exchange rate for ... to ...
* currency conversion?".
*/

final class ExchangeRate
{
  public static function from(Currency $from,Currency $to,float $rate): ExchangeRate 
  {
    // ...
  }
}

/*
* `CurrencyConverter` will get an `ExchangeRates` instance
* injected, so it can find out the current exchange rate
* when it needs to:
*/
final class CurrencyConverter {
  private $fixerApi;
  public function __construct(FixerApi $fixerApi)
  {
    $this->fixerApi = $fixerApi;
  }
  public function convert(Money $money, Currency $to): Money
  {
    $exchangeRate = $this->fixerApi->exchangeRateFor($money->currency(), $to);
    return $money->convert($exchangeRate);
  }
}