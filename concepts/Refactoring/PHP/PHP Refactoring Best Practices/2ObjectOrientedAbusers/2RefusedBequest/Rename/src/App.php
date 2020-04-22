<?php

use app\entities\CustomerRepo;
use app\entities\Order;
use app\items\Cheese;
use app\items\Wine;

require_once "../vendor/autoload.php";


$order = Order::create()->setCustomer(CustomerRepo::getUsCustomer());
$order->add(new Wine());
$order->add(new Cheese());
echo "Items added for US Customer: ". outputClass($order->getItems()) . "\n";


$order2 = Order::create()->setCustomer(CustomerRepo::getUsUnderAgeCustomer());
$order2->addWithCheck(new Wine());
$order2->addWithCheck(new Cheese());
echo "Items added for underage US Customer: ". outputClass($order2->getItems()) . "\n";


$order3 = Order::create()->setCustomer(CustomerRepo::getCanadianCustomer());
$order3->addWithCheck(new Wine());
$order3->addWithCheck(new Cheese());
echo "Items added for Canadian customer: ". outputClass($order3->getItems()) . "\n";


function outputClass($data)
{
  $res = "";
  foreach($data as $d){
    $class = explode( '\\', get_class($d));
    end( $class );
    $last = key( $class );
    $res .= $class[ $last ] . ", ";  
   }
  return $res;
}