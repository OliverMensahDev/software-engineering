<?php 
final class SalesInvoice 
{
  /**
  * @var Line[]
  */
  private $lines = [];
  private $finalized = false;

    // You can create a sales invoice
  private $salesInvoiceId;
  public static function create(SalesInvoiceId $salesInvoiceId): SalesInvoice{
    $object = new Self();
    $object->salesInvoiceId = $salesInvoiceId;
    return $object;
  }

  // You can manipulate its state, e.g. by adding lines to it,
  public function addLine(/* ... */): void
  {
    if ($this->finalized) {
      throw new RuntimeException(/* ... */);
    }
    $this->lines[] = Line::create(/* ... */);
  }

  // You can finalize it,
  public function finalize(): void
  {
    $this->finalized = true;
    // ...
  }
  // And it exposes some useful information about itself
  public function totalNetAmount(): Money
  {
    // ...
  }
  public function totalVatAmount(): Money
  {
   // ...
  }
}



// First we create the `SalesInvoice` and save it:
$salesInvoiceId = $this->salesInvoiceRepository->nextIdentity();
$salesInvoice = SalesInvoice::create($salesInvoiceId);
$this->salesInvoiceRepository->save($salesInvoice);
/*
* At a later moment, we may retrieve it again to make further changes
* to it:
*/
$salesInvoice = $this->salesInvoiceRepository->getBy($salesInvoiceId);
$salesInvoice->addLine(/* ... */);
$this->salesInvoiceRepository->save($salesInvoice);

