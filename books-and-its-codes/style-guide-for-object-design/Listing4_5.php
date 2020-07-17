<?php 
final class SalesInvoiceId
{
    // ...
}

final class Date
{
    // ...
}
final class Quantity
{
    public static function fromInt(
        int quantity,
        int precision
    ): Quantity {
        // ...
    }
}
final class ProductId
{
    public static function fromInt(int productId): ProductId
    {
        // ...
    }
}

final class SalesInvoice
{
    public static function create(
        SalesInvoiceId salesInvoiceId,
        Date invoiceDate
    ): SalesInvoice {
        // ...
    }

    public function addLine(
        ProductId productId,
        Quantity quantity
    ): void {
        this.lines[] = Line.create(
            productId,
            quantity
        );
    }
}