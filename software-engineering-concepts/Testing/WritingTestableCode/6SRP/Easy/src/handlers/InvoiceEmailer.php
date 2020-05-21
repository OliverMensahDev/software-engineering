<?php 

namespace App\Handlers;

use App\Entities\Invoice;

class InvoiceEmailer implements IInvoiceEmailer
{
  public function email(Invoice $invoice)
  {
    echo "Emailed Invoice ID:  {$invoice->id} \n";
  }
}
