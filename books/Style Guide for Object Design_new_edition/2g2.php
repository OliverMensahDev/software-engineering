<?php
final class ExchangeRate
{
  public function __construct(Currency $from,Currency $to,Rate $rate) {
    // ...
  }
  public function convert(Amount $amount): Money
  {
    // ...
  }
}

$money = new Money();
// We retrieve the `ExchangeRate` upfront,
$exchangeRate = $exchangeRateProvider->getRateFor($money->currency(),$targetCurrency);
// Then use it to convert the amount we have:
$converted = $exchangeRate->convert($money->amount());