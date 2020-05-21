<?php 

namespace App\Handlers;

use App\Entities\Invoice;
use Exception;

class Database implements IDatabase
{
  public function getInvoice(int $invoiceId) : Invoice
  {
    // throw new Exception("Not Implemented Yet");
    return new Invoice(1, 500);
  }

  public function save()
  {
    
  }
}