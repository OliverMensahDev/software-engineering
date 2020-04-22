<?php 
require_once "../vendor/autoload.php";

use app\entities\Customer;
use app\entities\DeliveryTimeWindow;
use app\entities\Order;
use app\handlers\CheckoutHandler;
use app\items\Cheese;
use app\items\Chocolate;

// Create customer
$customer1 = new Customer("GOLD", "MyStreet 123, US");
$membership = $customer1->getMembership();
$address = $customer1->getAddress();

// add items to list
$shoppingList = array(new Chocolate(), new Chocolate(), new Cheese());

$checkout = new CheckoutHandler();
// calculate total
$total = $checkout->calculateTotal(new Order($shoppingList, "GIMME_DISCOUNT"), $customer1);
echo "Total price for goods: $total \n";

$date = new DateTime(date("Y-m-d"));
$checkout->setDeliveryTimeWindow(new DeliveryTimeWindow( $date->modify('+1 day')->format("Y-m-d"), $date->modify('+2 day')->format("Y-m-d")));

       