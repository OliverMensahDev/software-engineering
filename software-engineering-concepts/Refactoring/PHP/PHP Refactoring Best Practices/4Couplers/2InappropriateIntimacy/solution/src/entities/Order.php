<?php

namespace app\entities;

use app\country\Canada;

class Order
{
  private $items;
  private $voucher;
  private $customer;

  public function __construct()
  {
    $this->items = [];
  }

  public static function create()
  {
    $instance = new self();
    return $instance;
  }

  public function size()
  {
    return count($this->items);
  }

  public function setItems($items)
  {
    $this->items = $items;
    return $this;
  }

  public function setCustomer($customer)
  {
    $this->customer = $customer;
    return $this;
  }

  public function setVoucher($voucher)
  {
    $this->voucher = $voucher;
    return $this;
  }


  public function getItems()
  {
    return $this->items;
  }

  public function getVoucher()
  {
    return $this->voucher;
  }

  public function getCustomer()
  {
    return $this->customer;
  }


  /**
   * Simple.. if sold only in the US
   */
  public function add(Item $item)
  {
    if ($item->isAgeRestrictedItem()) {
      if ($this->customer->getAge() < 21) {
        // echo "Cannot add age restricted item to order \n";
        return false;
      }
    }
    $this->items[] = $item;
    return true;
  }

  /**
   * More complex version of the same method with more business logic
   * OO is not used
   */
  public function addWithCheck(Item $item)
  {
    if ($item->isAgeRestrictedItem()) {
      $age = $this->customer->getAge();
      if ($age < $this->getLegalAgeFor($this->customer)) {
        echo "Sorry\n";
        return false;
      }
      $items[] = $item;
      return true;
    }
  }

  private function getLegalAgeFor(Customer $customer)
  {
    $country = $customer->getAddress()->getCountry();
    if ($country instanceof Canada) {
      $country->getLegalDrinkingAge($customer->getAddress()->getProvince());
    }
    return $country->getMinimumLegalDrinkingAge();
  }
}
