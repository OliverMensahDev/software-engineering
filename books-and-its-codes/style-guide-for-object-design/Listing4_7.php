<?php
final class CreateSalesInvoice
{
    /**
     * @final
     */
    public string date;

    /**
     * @var Line[]
     * @final
     */
    public array lines = [];
}

final class Line
{
    /**
     * @final
     */
    public int productId;

    /**
     * @final
     */
    public int quantity;
}