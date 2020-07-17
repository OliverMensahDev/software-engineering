<?
final class StockReportController
{
    private StockReportRepository repository;

    public function __construct(StockReportRepository repository)
    {
        this.repository = repository;
    }
    public function execute(Request request): Response
    {
        stockReport = this.repository.getStockReport();

        return new JsonResponse(stockReport.asArray());
    }
}