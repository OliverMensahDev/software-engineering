<?php 
namespace app\handlers;

use Exception;

class CheckoutHandler 
{

    private $deliveryWindowStart;
    private $deliveryWindowEnd;

    private function sumItemPrices($items)
    {
        $baseTotal = 0;

        // sum up the prices
        $prices = array();
        foreach($items as $item){
            $prices[] = $item->price();
        }

        foreach($prices  as $price){
            $baseTotal = $baseTotal + $price;
        }
        return $baseTotal;
    }

    private function applyVouchers($voucher, $price)
    {
         // check if voucher is valid
         if($voucher === "GIMME_DISCOUNT" || $voucher === "CHEAPER_PLEASE"){
            $price = $price * 0.95;
       } else {
           // throw new Exception("Voucher invalid");
           echo "Voucher invalid";
       }
       return $price;
    }

    private function addDeliveryFee($membership,$address, $total)
    {
        // handle delivery fee
        if(strtoupper($membership) === "GOLD"){
            // do nothing
        } else {
            if(preg_match("/US$/", $address)){
                echo "Adding flat delivery fee of 5 USD";
                $total = $total + 5;
            } else {
                echo "Adding flat global delivery fee of 10 USD";
                $$total = $total + 10;
            }
        }
        return $total;
    }

    public function calculateTotal($items, $voucher, $membership, $address)
    {
        $baseTotal = $this->sumItemPrices($items);
        $baseTotal = $this->applyVouchers($voucher, $baseTotal);
        $baseTotal = $this->addDeliveryFee($membership, $address, $baseTotal);
        return $baseTotal;
    }



    public function setDeliveryTimeWindow($deliveryStart, $deliveryEnd){
        $this->deliveryWindowStart = $deliveryStart;
        $this->deliveryWindowEnd = $deliveryEnd;
        echo"Your Order will delivered some time between $this->deliveryWindowStart and $this->deliveryWindowEnd \n";
    }

}
