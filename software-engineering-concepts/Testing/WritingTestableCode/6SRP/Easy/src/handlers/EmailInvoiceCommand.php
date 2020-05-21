<?php

namespace App\Handlers;

use Exception;

class EmailInvoiceCommand
{
  private $database;
  private $emailer;
  public function __construct(IDatabase $iDatabase, IInvoiceEmailer $iInvoiceEmailer)
  {
    $this->database = $iDatabase;
    $this->emailer = $iInvoiceEmailer;
  }

  public function execute(int $invoiceId)
  {
    $invoice = $this->database->getInvoice($invoiceId);
    if ($invoice->emailAddress == null) {
      throw new Exception("Blank Email");
    }
    $this->emailer->email($invoice);
  }
}
