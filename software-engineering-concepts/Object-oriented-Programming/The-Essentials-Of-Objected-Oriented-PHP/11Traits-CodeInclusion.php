<?php 
trait Price {
  public function changePriceByDollars($price, $change)
  {
    return $price + $change;
  }
}


trait SpecialSell {
  public function annonunceSpecialSell ()
  {
    return __CLASS__ . " on special sell";
  }
}

// The Mercedes class uses both traits
class Mercedes {
  use Price;
  use SpecialSell;
}
$mercedes1 = new Mercedes();
// Subtract 2100$
echo $mercedes1 -> changePriceByDollars(42000, -2100);
echo $mercedes1 -> annonunceSpecialSell();
