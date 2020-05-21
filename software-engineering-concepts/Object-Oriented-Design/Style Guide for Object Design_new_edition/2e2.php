<?php 
final class Amount
{   
    public $value ;
    public function __construct($value)
    {
        $this->value = $value;
    }
}

final class Currency
{
    public $symbol;
    public function __construct($symbol)
    {
        $this->symbol =$symbol;
    }
}

final class Money{
  public function __construct(Amount $amount, Currency $currency){
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


final class Product
{   
    private $price;
    public function setPrice(Money $money): void 
    {
        $this->price = $money->getCurrency()->symbol. " ". $money->getAmount()->value;
    }

    public function getPrice(){
        return $this->price;
    }
}

final class Converter
{
    public function convert(Money $money,Currency $targetCurrency): Amount
    {
        switch($targetCurrency->symbol)
        {
            case 'USD':
                return new Amount($money->getAmount()->value * 4.5);

        }
    }
}

$localAmount = new Amount(59.00);
$localCurrency = new Currency("GHS");
$foreignCurrency = new Currency("USD");

$product = new Product;
$product->setPrice(new Money($localAmount, $localCurrency));
echo $product->getPrice() . "\n";

$converter = new Converter();
$newAmount = $converter->convert(new Money($localAmount, $localCurrency), $foreignCurrency);
$product->setPrice(new Money($newAmount, $localCurrency));
echo $product->getPrice();


