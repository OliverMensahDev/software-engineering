<?php

final class SalesOrder
{
  // ...
  public function markAsDeliverable(): void
  {
  // ...
  }
  public function markAsDelivered(Timestamp $deliveredAt): void
  {
  /*
  * You can only deliver the order if it has been "marked as
  * deliverable" earlier.
  */
  }
  public function cancel(Timestamp $cancelledAt): void
  {
  /*
  * You can't cancel an order if it has already been
  * delivered.
  */
  }
  // and so on...
}


$deliveredSalesOrder =  1;
$deliveredSalesOrder->markAsDelivered();
expectException(
LogicException::class,
'delivered',
function () use ($deliveredSalesOrder) {
$deliveredSalesOrder->cancel();
}
);