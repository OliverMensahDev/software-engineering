<?php

namespace App\Handlers;


class PrintInvoiceCommand
{
  private $database;
  private $writer;

  public function __construct(IDatabase $database, IInvoiceWriter $writer)
  {
    $this->database = $database;
    $this->writer = $writer;
  }

  public function execute(int $invoiceId)
  {
   $invoice = $this->database->getInvoice($invoiceId);
   $this->writer->write($invoice);
  }
}

