<?php 
namespace App\Handlers;

use App\Entities\Invoice;

interface IInvoiceWriter 
{
  public function write(Invoice $invoice);

}