<?php

use App\Handlers\Database;
use App\Handlers\EmailInvoiceCommand;
use App\Handlers\InvoiceEmailer;
use App\Handlers\InvoiceWriter;
use App\Handlers\PageLayout;
use App\Handlers\Printer;
use App\Handlers\PrintInvoiceCommand;
use App\Handlers\Security;

require "../vendor/autoload.php";

$invoiceId = 1;

$print = new PrintInvoiceCommand(new Database(), new InvoiceWriter(new Printer(), new PageLayout()), new Security());
try {
  $print->execute($invoiceId);
} catch (\Throwable $th) {
  echo $th->getMessage();
}


$email = new EmailInvoiceCommand(new Database(), new InvoiceEmailer());
try {
  $email->execute($invoiceId);
} catch (\Throwable $th) {
  echo $th->getMessage();
}
