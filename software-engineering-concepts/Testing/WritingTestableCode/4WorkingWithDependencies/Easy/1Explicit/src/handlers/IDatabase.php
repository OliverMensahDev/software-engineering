<?php 

namespace App\Handlers;

use App\Entities\Invoice;

interface IDatabase 
{
  public function getInvoice(int $invoiceId): Invoice;

  public function save();

}