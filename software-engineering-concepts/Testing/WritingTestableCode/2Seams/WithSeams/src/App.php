<?php

use App\Handlers\DateTimeWrapper;
use App\Handlers\Printer;
use App\Handlers\PrintInvoiceCommand;
use App\Services\Database;

require "../vendor/autoload.php";

$printInvoiceCommand = new PrintInvoiceCommand(new Database(), new Printer(), new DateTimeWrapper());
$printInvoiceCommand->execute(1);
