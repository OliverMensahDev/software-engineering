<?php 
final class SalesInvoice
{
    /**
     * @var Line[]
     */
    private array lines = [];
    private bool finalized = false;
    public static function create(/* ... */): SalesInvoice
    {
        // ...
    }

    public function addLine(/* ... */): void
    {
        if (this.finalized) {
            throw new RuntimeException(/* ... */);
        }
        this.lines[] = Line.create(/* ... */);
    }

    public function finalize(): void
    {
        this.finalized = true;
        // ...
    }

    public function totalNetAmount(): Money
    {
        // ...
    }

    public function totalAmountIncludingTaxes(): Money
    {
        // ...
    }
}

