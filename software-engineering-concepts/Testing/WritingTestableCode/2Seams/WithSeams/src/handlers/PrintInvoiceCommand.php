<?php

namespace App\Handlers;

use App\Services\IDatabase;

class PrintInvoiceCommand
{
  private $iDatabase, $iDateTimeWrapper, $iPrinter;
  public function __construct(IDatabase $iDatabase, IPrinter $iPrinter, IDateTimeWrapper $iDateTimeWrapper)
  {
    $this->iDatabase = $iDatabase;
    $this->iPrinter = $iPrinter;
    $this->iDateTimeWrapper = $iDateTimeWrapper;
  }
  public function execute(int $invoiceId)
  {
    $invoice = $this->iDatabase->getInvoice($invoiceId);
    $this->iPrinter->print("Invoice ID: {$invoice->id}\n");
    $this->iPrinter->print("Total: {$invoice->total}\n");
    $this->iPrinter->print("Printed: {$this->iDateTimeWrapper->getNow()->format("d-m-Y")}\n");
  }
}
