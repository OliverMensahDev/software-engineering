<?php

namespace app\handlers;

use app\entities\Customer;

class DeliveryManager
{

  public function addDeliveryFee(Customer $customer, $total)
  {
    // handle delivery fee
    if ($this->isEligibleForFreeDelivery($customer->getMembership())) {
      // do nothing
    } else {
      if ($this->isUSAddress($customer->getAddress())) {
        echo "Adding flat delivery fee of 5 USD";
        $total = $total + 5;
      } else {
        echo "Adding flat global delivery fee of 10 USD";
        $$total = $total + 10;
      }
    }
    return $total;
  }
  private function isUSAddress($address)
  {
    return preg_match("/US$/", $address);
  }

  private function isEligibleForFreeDelivery($membership)
  {
    return strtoupper($membership) === "GOLD";
  }
}
