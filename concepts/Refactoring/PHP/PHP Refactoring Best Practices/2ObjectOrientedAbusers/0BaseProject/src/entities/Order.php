<?php 

namespace app\entities;

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
      if($item->isAgeRestrictedBeverage()){
          if($this->customer->getAge() < 21) {
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
    public function addWithCheck(Item $item){
      $country = $this->customer->getAddress()->getCountry();
      if($item->isAgeRestrictedBeverage()){
          $age = $this->customer->getAge();
          if($age < 21 && $country->toString() === "US"){
              echo "Cannot add age restricted item to order\n";
              return false;
          }

          if($this->customer->getAge() < 18 && $country->toString() === "France" ||
             $this->customer->getAge() < 18 && $country->toString() === "Spain") {
              // the list goes on and on for all countries with legal age of 18
              echo "Cannot add age restricted item to order \n";
              return false;
          }

          if($country->toString() === "Canada"){
              $province = $this->customer->getAddress()->getProvince();
              if($age >=18 &&  "Quebec" === $province || "Alberta" == $province){
                  $this->items[] = $item;
                  return true;
              } else if($age >= 19) {
                  $this->items[] = $item;
                  return true;
              } else {
                  echo "Sorry, you're under age\n";
                  return false;
              }
          }
      }
      $items[] = $item;
      return true;
  }
} 