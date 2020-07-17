<?
namespace Application\ExchangeRates;

interface ExchangeRateProvider
{
    public function getRateFor(
        Currency from,
        Currency to
    ): ExchangeRate;
}

final ExchangeRate
{
    // ...
}