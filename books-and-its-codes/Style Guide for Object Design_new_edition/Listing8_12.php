<?php
final class PurchaseOrderReceived
{
    private int purchaseOrderId;
    private int productId;
    private int receivedQuantity;

    public function __construct(
        int purchaseOrderId,
        int productId,
        int receivedQuantity) {
        this.purchaseOrderId = purchaseOrderId;
        this.productId = productId;
        this.receivedQuantity = receivedQuantity;
    }

    public function productId(): int
    {
        return this.productId;
    }

    public function receivedQuantity(): int
    {
        return this.receivedQuantity;
    }
}

final class PurchaseOrder
{
    private array events = [];

    // ...

    public function markAsReceived(): void
    {
        this.wasReceived = true;

        this.events[] = new PurchaseOrderReceived(
            this.purchaseOrderId,
            this.productId,
            this.orderedQuantity
        );
    }

    public function recordedEvents(): array
    {
        return this.events;
    }
}

