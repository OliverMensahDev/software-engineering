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
