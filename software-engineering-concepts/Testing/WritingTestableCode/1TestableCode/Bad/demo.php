<?php

$parts    = $argv[1];
$service  = $argv[2];
$discount = $argv[3];
$total    = $parts + $service - $discount;
echo "Total Price: $$total\n";