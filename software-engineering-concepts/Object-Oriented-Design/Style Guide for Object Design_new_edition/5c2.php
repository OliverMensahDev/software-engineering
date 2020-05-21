<?php 
final class Product
{
  /**
   * A product has a setting that defines if a 
   * discout percentage should be applied to it.
   * If there's not discuount percentage, there 
   * can still be a fixed discount.
   */


  public function shouldDiscountPercentageBeApplied(): bool
  {
    //..
  }

  public function discountPercentage(): Percentage 
  {
    //..
  }

  public  function fixedDiscountAmount(): Money 
  {
    //..
  }
}


/*
* Clients of `Product` can calculate a net amount
* by calling `applyDiscountPercentage()` first, and
* using its answer to either apply a discount percentage
* or a fixed discount:
*/
$amount = new Money(/* ... */);
if ($product->shouldDiscountPercentageBeApplied()) {
  $netAmount = $product->discountPercentage()->applyTo($amount);
} else {
  $netAmount = $amount->subtract($product->fixedDiscountAmount());
}

