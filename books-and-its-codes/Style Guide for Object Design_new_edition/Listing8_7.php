<?php
final class PurchaseOrder
{
    private int purchaseOrderId
    private int productId;
    private int orderedQuantity;
    private bool wasReceived;

    private function __construct()
    {
    }

    public static function place(
        int purchaseOrderId,
        int productId,
        int orderedQuantity
    ): PurchaseOrder {
        purchaseOrder = new PurchaseOrder();

        purchaseOrder.productId = productId;
        purchaseOrder.orderedQuantity = orderedQuantity;

        return purchaseOrder;
    }

    public function markAsReceived(): void
    {
        this.wasReceived = true;
    }
}