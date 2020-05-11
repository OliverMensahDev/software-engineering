<?php

namespace App\Handlers;

use App\Entities\Invoice;

class InvoiceWriter
{
  private $printer;
  private $layout;

  public function __construct(IPrinter $printer, IPageLayout $layout)
  {
    $this->printer = $printer;
    $this->layout = $layout;
  }

  public function write(Invoice $invoice)
  {
    $this->printer->setPageLayout($this->layout);
    if ($invoice->isOverdue)
      $this->printer->setInkColor("Red");
    $this->printer->writeLine("Invoice ID: " . $invoice->id);

    // Remaining print statements would go here
  }
}
