<?php

use app\handlers\HttpHelper;
use app\handlers\SimpleCurrencyConverter;

require_once "../vendor/autoload.php";

try {
  $converter = SimpleCurrencyConverter::getInstance("USD");
  $body =  $converter->printRates1("EUR");
  echo $body;
} catch (\Throwable $th) {
  echo $th->getMessage();
}
