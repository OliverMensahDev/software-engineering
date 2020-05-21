<?php

use App\Handlers\PrintInvoiceCommand;

require "../vendor/autoload.php";

$printInvoiceCommand = new PrintInvoiceCommand();
$printInvoiceCommand->execute();