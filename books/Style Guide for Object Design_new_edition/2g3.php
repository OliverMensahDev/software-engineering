<?php 
final class Money{
  public function convert(ExchangeRate $exchangeRate): Money{
    Assertion::equals($this->currency,$exchangeRate->fromCurrency());
    return new Money(
      $exchangeRate->rate()->applyTo($this->amount),
      $exchangeRate->targetCurrency()
    );
  }
}

$money = new Money();
$exchangeRate = $exchangeRateProvider->getRateFor($money->currency(),$targetCurrency);
$converted = $money->convert($exchangeRate);