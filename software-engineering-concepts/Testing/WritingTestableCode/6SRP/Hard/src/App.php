<?php

use App\Handlers\Database;
use App\Handlers\InvoiceEmailer;
use App\Handlers\InvoiceWriter;
use App\Handlers\PageLayout;
use App\Handlers\Printer;
use App\Handlers\PrintOrEmailInvoiceCommand;
use App\Handlers\Security;

require "../vendor/autoload.php";

$invoiceId = 1;

$commandInstance = new PrintOrEmailInvoiceCommand(new Database(), new InvoiceWriter(new Printer(), new PageLayout()), new InvoiceEmailer(), new Security());
try {
  $commandInstance->execute($invoiceId, false);
} catch (\Throwable $th) {
  echo $th->getMessage();
}
