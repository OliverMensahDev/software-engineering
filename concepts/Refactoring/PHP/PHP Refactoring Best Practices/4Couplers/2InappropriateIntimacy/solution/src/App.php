<?php

use app\entities\Voucher;

require_once "../vendor/autoload.php";


$voucher = new Voucher();
$voucher->setCode(1111);
echo $voucher->getCode();
