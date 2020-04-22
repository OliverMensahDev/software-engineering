<?php

use app\handlers\CheckoutHandler;
use app\items\Cheese;
use app\items\Chocolate;
use PHPUnit\Framework\TestCase;

class CheckoutHandlerTest extends TestCase
{

    private $checkout;
    private $shoppingList;

    protected function setup(): void
    {
        $this->shoppingList = array(new Chocolate(), new Chocolate(), new Cheese());
        $this->checkout = new CheckoutHandler();
    }

    // "All is good, free delivery with gold membership")
    public function testCalculateTotalValidVoucherGoldMembership()
    {

        $total = $this->checkout->calculateTotal($this->shoppingList, "GIMME_DISCOUNT", "GOLD", "MyStreet 123, US");
        $this->assertEquals($total, 4.275);
    }

    // "invalid voucher")
    public function testCalculateTotalInValidVoucherGoldMembership()
    {

        $total = $this->checkout->calculateTotal($this->shoppingList, "DummyVoucher", "GOLD", "MyStreet 123, US");
        $this->assertEquals($total, 4.5);
    }

    // "invalid voucher, non-gold membership incurs US delivery fee")
    public function testCalculateTotalInValidVoucherNonGoldMembership()
    {
        $total = $this->checkout->calculateTotal($this->shoppingList, "DummyVoucher", "SILVER", "MyStreet 123, US");
        $this->assertEquals($total, 9.5);
    }

    //"invalid voucher, non-gold membership incurs Global delivery fee")
    public function testCalculateTotalInValidVoucherNonGoldMembershipNonUs()
    {
        $total = $this->checkout->calculateTotal($this->shoppingList, "DummyVoucher", "SILVER", "MyStreet 123, France");
        $this->assertEquals($total, 14.5);
    }

    protected function tearDown(): void
    {
        $this->checkout = null;
        $this->shoppingList = null;
    }
}
