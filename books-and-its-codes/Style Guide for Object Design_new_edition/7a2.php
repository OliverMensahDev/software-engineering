<?php 
final class PurchaseOrderForStockReport 
{
  private $productId;
  private $orderedQuantity;
  private $wasReceived;

  public function __construct(int $productId, int $orderedQuantity,bool $wasReceived)
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

//first client of the entity
final class ReceiveItems
{
  private $repository;

  public function __construct(PurchaseOrderRepository $repository)
  {
    $this->repository = $repository;
  }

  public function receiveItems(int $purchaseOrderId): void 
  {
    $purchaseOrder = $this->repository->getById($purchaseOrderId);
    $purchaseOrder->markAsReceived();
    $this->repository->save($purchaseOrder);
  }
}

//second client
final class StockReportController 
{
  private $repository;

  public function __construct(PurchaseOrderRepository $repository)
  {
    $this->repository = $repository;
  }
  
  public function __invoke(Request $request): Response
  {
    // For now, we still load `PurchaseOrder` entities:
    $allPurchaseOrders = $this->repository->findAll();
    /*
    * But we immediately convert them to
    * `PurchaseOrderForStockReport` instances:
    */
    $forStockReport = array_map(
      function (PurchaseOrder $purchaseOrder) {
        return $purchaseOrder->forStockReport();
      },
      $allPurchaseOrders
    );

    return new JsonResponse($forStockReport);
  }
}