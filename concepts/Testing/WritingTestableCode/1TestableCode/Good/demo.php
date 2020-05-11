<?php
include "./Calculator.php";

$parts    = $argv[1];
$service  = $argv[2];
$discount = $argv[3];
$calculator = new Calculator();
$total    = $calculator->getTotal($parts, $service, $discount);
echo "Total Price: $$total\n";