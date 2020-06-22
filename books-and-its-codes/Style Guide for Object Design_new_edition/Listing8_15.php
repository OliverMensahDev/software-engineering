<?php
final class StockReportSqlRepository implements StockReportRepository
{
  public function getStockReport(): StockReport
  {
    result = this . connection . execute(
      'SELECT * FROM stock_report'
    );

    data = result . fetchAll();

    return new StockReport(data);
  }
}
