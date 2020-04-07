<?php

use app\payment\PaymentProcessor;

require_once '../../vendor/autoload.php';


$paymentProcessor = new PaymentProcessor();
$totalPayments = $paymentProcessor->sendPayments();
 echo "Total payments " .  $totalPayments;