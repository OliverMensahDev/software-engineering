<?php
//entity for read
final class StockReport
{
  private $productId;
  private $orderedQuantity;
  private $wasReceived;

  public function __construct(array $data)
  {
    $this->productId = $data->productId;
    $this->orderedQuantity = $data->orderedQuantity;
    $this->wasReceived = true;
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

interface  StockReportRepository
{
  public function getStockReport(): StockReport;
}

final class StockReportSqlRepository implements StockReportRepository
{
  public function getStockReport(): StockReport
  {
    $result = $this->connection->execute(
      'SELECT ' .
        ' product_id, ' .
        ' SUM(ordered_quantity) as quantity_in_stock ' .
        'FROM purchase_orders ' .
        'WHERE was_received = 1 ' .
        'GROUP BY product_id'
    );
    $data = $result->fetchAll();
    return new StockReport($data);
  }
}

//client
final class StockReportController
{
  private $repository;

  public function __construct(StockReportRepository $repository)
  {
    $this->repository = $repository;
  }

  public function __invoke(Request $request): Response
  {
    $stockReport = $this->repository->getStockReport();
    /*
    * `asArray()` is expected to return an array like we the
    * one we created manually before:
    */
    return new JsonResponse($stockReport->asArray());
  }
}
