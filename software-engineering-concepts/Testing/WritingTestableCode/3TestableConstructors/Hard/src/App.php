<?php

require "../vendor/autoload.php";

use App\Handlers\Database;
use App\Handlers\Printer;
use App\Handlers\PrintInvoiceCommand;

$invoiceId = 1;

 $command = new PrintInvoiceCommand(new Database(), new Printer());
 $command->execute($invoiceId);