<?php

namespace App\Handlers;

use App\Container;

class PrintInvoiceCommand
{
  private $container;

  public function __construct(Container $container)
  {
    $this->container = $container;
  }

  public function execute(int $invoiceId)
  {
   $invoice = $this->container->get(Database::class)->getInvoice($invoiceId);
   $this->container->get(InvoiceWriter::class)->write($invoice);
  }
}