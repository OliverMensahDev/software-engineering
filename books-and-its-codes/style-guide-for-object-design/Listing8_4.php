<?php

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
    foreach ($allPurchaseOrders as $purchaseOrder) {
      if (!$purchaseOrder->wasReceived()) {
        /*
          * We didn't receive the items yet, so we
          * shouldn't add them to the quantity-in-stock.
          */
        continue;
      }
      if (!isset($stockReport[$purchaseOrder->productId()])) {
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
