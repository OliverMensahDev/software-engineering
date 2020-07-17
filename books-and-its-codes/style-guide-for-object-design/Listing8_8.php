<?
final class ReceiveItems
{
    // ...

    public function receiveItems(int purchaseOrderId): void
    {
        purchaseOrder = this.repository.getById(
             PurchaseOrderId.fromInt(purchaseOrderId)
        );

        purchaseOrder.markAsReceived();
        this.repository.save(purchaseOrder);
    }
}