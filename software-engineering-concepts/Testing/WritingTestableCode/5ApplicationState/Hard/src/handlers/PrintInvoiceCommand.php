<?php

namespace App\Handlers;

use Exception;

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
   $security = Security::getInstance();
   if(!$security->isAdmin()){
     throw new Exception("Not authorized\n");
   }
   $this->writer->write($invoice);
  }
}

