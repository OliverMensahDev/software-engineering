<?php 
namespace app\handlers;

use app\entities\DeliveryTimeWindow;
use app\entities\Order;
use Exception;

class CheckoutHandler 
{

    private $deliveryWindowStart;
    private $deliveryWindowEnd;
    private $discountManager; 
    private $deliveryManager;

    public function __construct()
    {
        $this->discountManager = new DiscountManager();
        $this->deliveryManager = new DeliveryManager();
    }
    
    private function sumItemPrices($items)
    {
        $sum = 0;
        foreach($items as $item){
            $sum += $item->price();
        }
        return $sum;
    }
   
    public function calculateTotal(Order $order)
    {
        $baseTotal = $this->sumItemPrices($order->getItems());
        $baseTotal = $this->discountManager->applyVouchers($order->getVoucher(), $baseTotal);
        $baseTotal = $this->deliveryManager->addDeliveryFee($order->getCustomer(), $baseTotal);
        return $baseTotal;
    }

    public function setDeliveryTimeWindow(DeliveryTimeWindow $deliveryTimeWindow){
        $this->deliveryWindowStart = $deliveryTimeWindow->getStart();
        $this->deliveryWindowEnd = $deliveryTimeWindow->getEnd();
        echo"Your Order will delivered some time between $this->deliveryWindowStart and $this->deliveryWindowEnd \n";
    }

}
