<?php 

namespace App\Handlers;

class PrintInvoiceCommandFactory
{
  public static function create(): PrintInvoiceCommand
  {
    return new PrintInvoiceCommand(
      new Database(), 
      new InvoiceWriter(
        new Printer(),
        new PageLayout()
       )
     );
  }
}