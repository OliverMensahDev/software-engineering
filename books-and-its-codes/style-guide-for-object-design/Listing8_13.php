<?php 
final class ReceiveItems
{
    // ...

    public function receiveItems(int purchaseOrderId): void
    {
        // ...

        this.repository.save(purchaseOrder);

        this.eventDispatcher.dispatchAll(
            purchaseOrder.recordedEvents()
        );
    }
}