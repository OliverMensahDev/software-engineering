<?php 
//entity
final class PurchaseOrder 
{
  private $purchasedOrderId;
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

  public function purchaseOrderId(): int
  {
    return $this->purchaseOrderId;
  }

  public function productId(): int
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


//second client of the entity 

final class StockReportController
{
  private $repository;

  public function __construct(PurchaseOrderRepository $repository)
  {
    $this->repository = $repository;
  }

  public function __invoke(Request $request): Response 
  {
    $allPurchaseOrders = $this->repository->findAll();
    $stockReport = [];
    foreach ( $allPurchaseOrders as $purchaseOrder){
      if(!$purchaseOrder->wasReceived()){
        /*
          * We didn't receive the items yet, so we
          * shouldn't add them to the quantity-in-stock.
          */
        continue;
      }
      if (!isset($stockReport[$purchaseOrder->productId()] )) {
        // We didn't see this product before...
        $stockReport[$purchaseOrder->productId()] = 0;
      }

      /*
        * Add the ordered (and received) quantity to the
        * quantity-in-stock:
        */
      $stockReport[$purchaseOrder->productId()] 
        += $purchaseOrder->orderedQuantity;
    }

    return new JsonResponse($stockReport);
  }
}