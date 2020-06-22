<?php 
final class SalesInvoice
{
    private SalesInvoiceId salesInvoiceId;

    public static function create(
        SalesInvoiceId salesInvoiceId
    ): SalesInvoice {
        object = new SalesInvoice();

        object.salesInvoiceId = salesInvoiceId;

        return object;
    }
}