<?php
final class SalesOrder
{
  private function __construct()
  {
  }

  public static function place(/*....*/): SaleOrder
  {

    return new SalesOrder();
  }
}


$saleOrder = SalesOrder::place(/*...*/);
