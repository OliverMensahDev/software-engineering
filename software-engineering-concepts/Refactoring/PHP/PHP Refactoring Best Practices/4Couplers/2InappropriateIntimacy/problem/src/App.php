<?php

use app\entities\Voucher;

require_once "../vendor/autoload.php";


$voucher = new Voucher();
$voucher->code = 11111;
echo $voucher->code;
