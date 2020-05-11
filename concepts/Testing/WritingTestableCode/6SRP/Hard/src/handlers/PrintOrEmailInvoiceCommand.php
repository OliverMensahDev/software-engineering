<?php

namespace App\Handlers;

use Exception;

class PrintOrEmailInvoiceCommand
{
  private $database;
  private $writer;
  private $security;
  private $emailer;

  public function __construct(
    IDatabase $database,
    IInvoiceWriter $writer,
    IInvoiceEmailer $emailer,
    ISecurity $security
  ) {
    $this->database = $database;
    $this->writer = $writer;
    $this->emailer = $emailer;
    $this->security = $security;
  }

  public function execute(int $invoiceId, bool $shouldEmail)
  {
    $invoice = $this->database->getInvoice($invoiceId);
    if ($shouldEmail) {
      if ($invoice->emailAddress == null) {
        throw new Exception("Blank Email");
      }
      $this->emailer->email($invoice);
    } else {
      if (!$this->security->isAdmin()) {
        throw new Exception("Not authorized\n");
      }
      $this->writer->write($invoice);
    }
  }
}
