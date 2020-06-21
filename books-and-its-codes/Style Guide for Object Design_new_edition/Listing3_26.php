<?php
final class ExchangeService
{
  private $exchangeRateProvider;
  public function __construct(
    ExchangeRateProvider $exchangeRateProvider
  ) {
    $this->exchangeRateProvider = $exchangeRateProvider;
  }
  public function convert(
    Money $money,
    Currency $targetCurrency
  ): Money {
    $exchangeRate = $this->exchangeRateProvider
      ->getRateFor($money->currency(), $targetCurrency);
    return new Money(
      $exchangeRate->rate()->applyTo($money->amount()),
      $targetCurrency
    );
  }
}
