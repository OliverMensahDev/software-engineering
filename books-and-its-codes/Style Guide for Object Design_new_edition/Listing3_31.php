<?php
final class ProductCreated
{
  public function __construct(
    ProductId $productId,
    Description $description,
    StockValuation $stockValuation,
    Timestamp $createdAt,
    UserId $createdBy
  ) {
  }
}

$this->recordThat(new ProductCreated(
  /** */
));
