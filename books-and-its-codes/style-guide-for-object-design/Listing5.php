<?php

try {
} catch (SomeEXception $e) {
}

final class CouldNotDeliverOrder extends RuntimeException
{
  public static function itWasAlreadyDelivered(): CouldNotDeliverOrder
  {
    // ...
  }
  public static function insufficientQuantitiesInStock(): CouldNotDeliverOrder
  {
    // ...
  }
}


final class CouldNotFindProduct extends RuntimeException
{
  public static function withId(ProductId $productId): CouldNotFindProduct
  {
    return new self(sprintf(
      'Could not find a product with ID "%s"',
      $productId
    ));
  }
}
throw CouldNotFindProduct::forId();
