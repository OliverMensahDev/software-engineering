<?php

namespace App\Handlers;


class PrintInvoiceCommand
{
  private $database;
  private $printer;

  public function __construct(IDatabase $database, IPrinter $printer)
  {
    $this->database = $database;
    $this->printer = $printer;
  }

  public function execute(int $invoiceId)
  {
    $invoice = $this->database->getInvoice($invoiceId);

    $writer = new InvoiceWriter($this->printer, $invoice);

    $writer->write();
  }
}
