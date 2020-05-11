<?php

require "../vendor/autoload.php";

use App\Handlers\PrintInvoiceCommandFactory;

$invoiceId = 1;

 $command = PrintInvoiceCommandFactory::create();
 $command->execute($invoiceId);