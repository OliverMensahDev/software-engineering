<?php 
namespace app\handlers;

use Exception;

class CheckoutHandler 
{

    private $deliveryWindowStart;
    private $deliveryWindowEnd;

    public function calculateTotal($items, $voucher, $membership, $address)
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

        // check if voucher is valid
        if($voucher === "GIMME_DISCOUNT" || $voucher === "CHEAPER_PLEASE"){
             $baseTotal = $baseTotal * 0.95;
        } else {
            // throw new Exception("Voucher invalid");
            echo "Voucher invalid";

        }

        // handle delivery fee
        if(strtoupper($membership) === "GOLD"){
            // do nothing
        } else {
            if(preg_match("/US$/", $address)){
                echo "Adding flat delivery fee of 5 USD";
                $baseTotal = $baseTotal + 5;
            } else {
                echo "Adding flat global delivery fee of 10 USD";
                $baseTotal = $baseTotal + 10;
            }
        }
        return $baseTotal;
    }



    public function setDeliveryTimeWindow($deliveryStart, $deliveryEnd){
        $this->deliveryWindowStart = $deliveryStart;
        $this->deliveryWindowEnd = $deliveryEnd;
        echo"Your Order will delivered some time between $this->deliveryWindowStart and $this->deliveryWindowEnd \n";
    }

}
