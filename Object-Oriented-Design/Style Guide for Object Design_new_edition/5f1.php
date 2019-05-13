<?php 
final class Currency
{
    public $symbol;
    public function __construct($symbol)
    {
        $this->symbol =$symbol;
    }
}

final class Money{
  public function __construct(int $amount, Currency $currency){
    $this->amount = $amount;
    $this->currency = $currency;
  }

  function getCurrency(){
    return $this->currency;
  }

  function getAmount(){
    return $this->amount;
  }
}

final class ExchangeRate
{
  public static function from(Currency $from,Currency $to,float $rate): ExchangeRate 
  { 
    return 2;
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

/**
 * This is a fake implementation of the ExchangeRate services
 * which we can set up to return  whatever exchange rates we provide 
 * it with;
 */

interface ExchangeRates
{
  public function exchangeRateFor(Currency $from,Currency $to): ExchangeRate;
}

 final class ExchangeRatesFake implements ExchangeRates
 {
   private  $rates = [];

   public function __construct(Currency $from, Currency $to, float $rate)
   {
     $this->rates[$from->asString()][$to->asString()] = ExchangeRate::from($from, $to, $rate);
   }

   public function exchangeRateFor(Currency $from,Currency $to): ExchangeRate
   {
    if (!isset($this->rates[$from->asString()][$to->asString()])) {
      throw new RuntimeException(
        sprintf('Could not determine exchange rate from %s to %s',
          $from->asString(),
          $to->asString()
        )
      );
    }
    return $this->rates[$from->asString()][$to->asString()];
   }

   

   /*
    * We can then use this fake in the unit test for `CurrencyConverter`:
    */
  /**
  * @test
  */
  public function it_converts_an_amount_using_the_exchange_rate(): void
  {
    // Set up the fake `ExchangeRates` service:
    $exchangeRates = new ExchangeRatesFake(new Currency('USD'), new Currency('EUR'),  0.8);
    // Inject the fake service into the `CurrencyConverter`:
    $currencyConverter = new CurrencyConverter($exchangeRates);
    $converted = $currencyConverter->convert(new Money(1000, new Currency('USD')));
    var_dump($converted);
  }
}