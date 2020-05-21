<?php 

namespace app\entities;

class Order 
{
  private $items;
  private $voucher;
  private $customer;

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
  public function setVoucher($voucher)
  {
    $this->voucher = $voucher;
  }
  public function getCustomer()
  {
    return $this->customer;
  }
  public function setCustomer($customer)
  {
    $this->customer = $customer;
  }
}