<?php

namespace App\Handlers;

use App\Entities\Invoice;

class InvoiceWriter
{
  private $printer;
  private $invoice;

  public function __construct(IPrinter $printer, Invoice $invoice)
  {
    $this->printer = $printer;
    $this->invoice = $invoice;

    $this->printer->setPageLayout(new PageLayout());

    if ($this->invoice->isOverdue)
      $this->printer->setInkColor("Red");
  }

  public function write()
  {
    $this->printer->writeLine("Invoice ID: " . $this->invoice->id);

    // Remaining print statements would go here
  }
}
