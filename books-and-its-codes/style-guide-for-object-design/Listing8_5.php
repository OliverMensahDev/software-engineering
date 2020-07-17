<?php
final class PurchaseOrderForStockReport
{
  private $productId;
  private $orderedQuantity;
  private $wasReceived;

  public function __construct(int $productId, int $orderedQuantity, bool $wasReceived)
  {
    $this->productId = $productId;
    $this->orderedQuantity = $orderedQuantity;
    $this->wasReceived = $wasReceived;
  }
  public function productId(): ProductId
  {
    return $this->productId;
  }

  public function orderedQuantity(): int
  {
    return $this->orderedQuantity;
  }

  public function wasReceived(): bool
  {
    return $this->wasReceived;
  }
}


final class PurchaseOrder
{
  private $purchaseOrderId;
  private $productId;
  private $orderedQuantity;
  private $wasReceived;

  private function __construct()
  {
  }

  public static function place(int $purchaseOrderId, int $productId, int $orderedQuantity): PurchaseOrder
  {
    $purchaseOrder = new self();
    $purchaseOrder->productId = $productId;
    $purchaseOrder->orderedQuantity = $orderedQuantity;
    $purchaseOrder->wasReceived = false;
    return $purchaseOrder;
  }

  public function markAsReceived(): void
  {
    $this->wasReceived = true;
  }

  public function forStockReport(): PurchaseOrderForStockReport
  {
    return new PurchaseOrderForStockReport(
      $this->productId,
      $this->orderedQuantity,
      $this->wasReceived
    );
  }
}
