<?php
final class Money
{
  private $amount;
  private $currency;
  public function __construct(Amount $amount, Currency $currency)
  {
    $this->amount = $amount;
    $this->curency = $currency;
  }

  public function convert(ExchangeRateProvider $exchangeRateProvider,Currency $targetCurrency): Money {
    /*
    * `ExchangeRateProvider` is a method argument, not a
    * constructor argument.
    */
    $exchangeRate = $exchangeRateProvider->getRateFor($this->currency,$targetCurrency);
    return $exchangeRate->convert($this->amount);
  }
}