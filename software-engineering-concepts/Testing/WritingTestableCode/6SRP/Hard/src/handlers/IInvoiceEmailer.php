<?php 

namespace App\Handlers;

use App\Entities\Invoice;

interface IInvoiceEmailer
{
  public function email(Invoice $invoice);
}