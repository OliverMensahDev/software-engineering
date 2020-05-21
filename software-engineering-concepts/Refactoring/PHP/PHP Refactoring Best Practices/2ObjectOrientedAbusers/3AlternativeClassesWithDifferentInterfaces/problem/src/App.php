<?php

use app\handlers\CheckoutHandler;
use app\handlers\SimpleCurrencyConverter;

require_once "../vendor/autoload.php";

echo (new CheckoutHandler())->convertToCurrency(12, "EUR");

$converter = new SimpleCurrencyConverter("EUR");
echo $converter->convertTo(12);