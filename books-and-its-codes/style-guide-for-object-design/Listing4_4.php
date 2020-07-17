<?php
final class SalesInvoice
{
    /**
     * @var object[]
     */
    private array events = [];
    private bool finalized = false;
    public function finalize(): void
    {
        this.finalized = true;

        this.events[] = new SalesInvoiceFinalized(/* ... */);
    }

    /**
     * @return object[]
     */
    public function recordedEvents(): array
    {
        return this.events;
    }
}

salesInvoice = SalesInvoice.create(/* ... */);
salesInvoice.finalize();

assertEquals(
    [
        new SalesInvoiceFinalized(/* ... */)
    ],
    salesInvoice.recordedEvents()
);

salesInvoice = this.salesInvoiceRepository.getBy(salesInvoiceId);
salesInvoice.finalize(/* ... */);
this.salesInvoiceRepository.save(salesInvoice);

this.eventDispatcher.dispatchAll(
    salesInvoice.recordedEvents()
);

