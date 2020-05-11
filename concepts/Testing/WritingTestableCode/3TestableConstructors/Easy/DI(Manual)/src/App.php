<?php

require "../vendor/autoload.php";

use App\Handlers\Database;
use App\Handlers\InvoiceWriter;
use App\Handlers\PageLayout;
use App\Handlers\Printer;
use App\Handlers\PrintInvoiceCommand;

$invoiceId = 1;

 $command = new PrintInvoiceCommand(
   new Database(), 
   new InvoiceWriter(
     new Printer(),
     new PageLayout()
    )
  );
 $command->execute($invoiceId);