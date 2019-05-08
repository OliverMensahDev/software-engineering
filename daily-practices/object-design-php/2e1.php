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

final class Product
{   
    private $price;
    public function setPrice(Amount $amount, Currency $currency): void 
    {
        $this->price = $currency->symbol. " ". $amount->value;
    }

    public function getPrice(){
        return $this->price;
    }
}

final class Converter
{
    public function convert(Amount $localAmount,Currency $localCurrency,Currency $targetCurrency): Amount
    {
        switch($targetCurrency->symbol)
        {
            case 'USD':
                return new Amount($localAmount->value * 4.5);

        }
    }
}

$localAmount = new Amount(59.00);
$localCurrency = new Currency("GHS");
$foreignCurrency = new Currency("USD");

$product = new Product;
$product->setPrice($localAmount, $localCurrency);
echo $product->getPrice() . "\n";

$converter = new Converter();
$newAmount = $converter->convert($localAmount, $localCurrency, $foreignCurrency);
$product->setPrice($newAmount, $localCurrency);
echo $product->getPrice();


