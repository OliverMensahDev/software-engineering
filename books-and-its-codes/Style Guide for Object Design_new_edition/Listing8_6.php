<?

final class StockReportController 
{
  private $repository;

  public function __construct(PurchaseOrderRepository $repository)
  {
    $this->repository = $repository;
  }
  
  public function execute(Request $request): Response
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