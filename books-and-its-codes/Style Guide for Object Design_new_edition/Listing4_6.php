<?php 
final class Quantity
{
    private int quantity;
    private int precision;

    private function __construct(
        int quantity,
        int precision
    ) {
        this.quantity = quantity;
        this.precision = precision;
    }

    public static function fromInt(
        int quantity,
        int precision
    ): Quantity {
        return new Quantity(quantity, precision);
    }

    public function add(Quantity other): Quantity
    {
        Assertion.same(this.precision, other.precision);

        return new Quantity(
            this.quantity + other.quantity,
            this.precision
        );
    }
}

originalQuantity = Quantity.fromInt(1500, 2);
 
newQuantity = originalQuantity.add(Quantity.fromInt(500, 2));

