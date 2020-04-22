<?php 
require_once "../vendor/autoload.php";

use app\entities\Customer;
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
$total = $checkout->calculateTotal($shoppingList, "GIMME_DISCOUNT", "GOLD", "MyStreet 123, US");
echo "Total price for goods: $total \n";

$date = new DateTime(date("Y-m-d"));
$checkout->setDeliveryTimeWindow($date->modify('+1 day')->format("Y-m-d"), $date->modify('+2 day')->format("Y-m-d"));

       