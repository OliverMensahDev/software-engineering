<?php

use app\entities\Customer;
use app\entities\CustomerRepo;
use app\handlers\HttpHelper;
use app\handlers\SimpleCurrencyConverter;

require_once "../vendor/autoload.php";

try {
  $customer = CustomerRepo::getCanadianCustomer();
  if(!$customer->getAddress()->getCountry()->toString()=== "US"){
    $converter = SimpleCurrencyConverter::getInstance("USD");
    $body =  $converter->printRates1("EUR");
    echo $body;
  }

} catch (\Throwable $th) {
  echo $th->getMessage();
}
