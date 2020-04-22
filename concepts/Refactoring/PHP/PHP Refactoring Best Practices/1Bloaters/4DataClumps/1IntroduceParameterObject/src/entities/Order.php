<?php 

namespace app\entities;

class Order 
{
  private $items;
  private $voucher;

  public function __construct($items, $voucher)
  {
    $this->items = $items;
    $this->voucher = $voucher;
  }
  public function getItems()
  {
    return $this->items;
  }
  public function setItems($items)
  {
    $this->items = $items;
  }
  public function getVoucher()
  {
    return $this->voucher;
  }
  public function setIVoucher($voucher)
  {
    $this->voucher = $voucher;
  }
}