<?php 

namespace App\Handlers;

use App\Entities\Invoice;

interface IInvoiceEmail
{
  public function email(Invoice $invoice);
}