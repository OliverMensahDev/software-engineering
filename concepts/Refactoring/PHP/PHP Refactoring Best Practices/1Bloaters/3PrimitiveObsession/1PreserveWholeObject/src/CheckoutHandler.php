<?php 
namespace app\handlers;

use app\entities\Customer;
use Exception;

class CheckoutHandler 
{

    private $deliveryWindowStart;
    private $deliveryWindowEnd;

    private function sumItemPrices($items)
    {
        $sum = 0;
        foreach($items as $item){
            $sum += $item->price();
        }
        return $sum;
    }

    private function applyVouchers($voucher, $price)
    {
         if($this->isValidVoucher($voucher)){
            $price = $price * 0.95;
       } else {
           // throw new Exception("Voucher invalid");
           echo "Voucher invalid";
       }
       return $price;
    }

    private function isValidVoucher($voucher)
    {
        return $voucher === "GIMME_DISCOUNT" || $voucher === "CHEAPER_PLEASE";
    }

    private function isUSAddress($address)
    {
        return preg_match("/US$/", $address);
    }

    private function isEligibleForFreeDelivery($membership)
    {
        return strtoupper($membership) === "GOLD";
    }


    private function addDeliveryFee(Customer $customer, $total)
    {
        // handle delivery fee
        if($this->isEligibleForFreeDelivery($customer->getMembership())){
            // do nothing
        } else {
            if($this->isUSAddress($customer->getAddress())){
                echo "Adding flat delivery fee of 5 USD";
                $total = $total + 5;
            } else {
                echo "Adding flat global delivery fee of 10 USD";
                $$total = $total + 10;
            }
        }
        return $total;
    }

    public function calculateTotal($items, $voucher, Customer $customer)
    {
        $baseTotal = $this->sumItemPrices($items);
        $baseTotal = $this->applyVouchers($voucher, $baseTotal);
        $baseTotal = $this->addDeliveryFee($customer, $baseTotal);
        return $baseTotal;
    }



    public function setDeliveryTimeWindow($deliveryStart, $deliveryEnd){
        $this->deliveryWindowStart = $deliveryStart;
        $this->deliveryWindowEnd = $deliveryEnd;
        echo"Your Order will delivered some time between $this->deliveryWindowStart and $this->deliveryWindowEnd \n";
    }

}
