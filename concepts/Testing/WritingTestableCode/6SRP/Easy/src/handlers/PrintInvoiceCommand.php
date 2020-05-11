<?php

namespace App\Handlers;

use Exception;

class PrintInvoiceCommand
{
  private $database;
  private $writer;
  private $security;

  public function __construct(
    IDatabase $database,
    IInvoiceWriter $writer,
    ISecurity $security
  ) {
    $this->database = $database;
    $this->writer = $writer;
    $this->security = $security;
  }

  public function execute(int $invoiceId)
  {
    $invoice = $this->database->getInvoice($invoiceId);
    if (!$this->security->isAdmin()) {
        throw new Exception("Not authorized\n");
      }
      $this->writer->write($invoice);
  }
}
