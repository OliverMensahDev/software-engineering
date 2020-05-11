<?php

use App\Entities\Invoice;
use App\Handlers\DateTimeWrapper;
use App\Handlers\IDateTimeWrapper;
use App\Handlers\IPrinter;
use App\Handlers\Printer;
use App\Handlers\PrintInvoiceCommand;
use App\Services\Database;
use App\Services\IDatabase;
use PHPUnit\Framework\TestCase;

class PrintInvoiceCommandTest extends TestCase
{
  private $command;
  private $invoiceId = 1;
  private $total = 500;
  private $invoice;
  private $mockDatabase;
  private $mockDateTime;
  private $mockPrinter;

  protected function setUp(): void
  {
    $this->invoice = new Invoice($this->invoiceId, $this->total);
    $date = new DateTime();

    $this->mockDatabase = $this->createMock(Database::class);
    $this->mockDatabase
        ->method('getInvoice')
        ->willReturn($this->invoice);

    $this->mockDateTime = $this->createMock(DateTimeWrapper::class);
    $this->mockDateTime
        ->method('getNow')
        ->willReturn($date);

    $this->mockPrinter = $this->createMock(Printer::class);
    $this->command = new PrintInvoiceCommand($this->mockDatabase, $this->mockPrinter, $this->mockDateTime);
  }

  public function testShouldPrintTotalPrice()
  {
    $this->command->execute($this->invoiceId);
  }
}