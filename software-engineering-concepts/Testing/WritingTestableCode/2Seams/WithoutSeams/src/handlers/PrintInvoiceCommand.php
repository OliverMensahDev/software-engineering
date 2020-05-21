<?php

namespace App\Handlers;

use App\Services\Database;
use DateTime;

class PrintInvoiceCommand
{
  public function execute()
  {

    $database = new Database();
    $invoice = $database->getInvoiceById(1);
    echo "Invoice ID: {$invoice->id}\n";
    echo "Total : {$invoice->total}\n";

    $dateTime = new DateTime('NOW');
    echo "Printed: {$dateTime->format("d-m-Y")}\n";
  }
}
