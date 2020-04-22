<?php

use app\handlers\SimpleCurrencyConverter;

require_once "../vendor/autoload.php";


$converter = new SimpleCurrencyConverter("EUR");
echo $converter->convertTo(12);