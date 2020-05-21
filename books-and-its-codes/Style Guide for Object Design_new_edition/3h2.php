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

  public function cancel()
  {
    if ($this->status->equals(Status::cancelled())) {
      // just ignore the request
      return;
    }
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