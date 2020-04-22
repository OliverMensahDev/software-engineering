<?php

use app\entities\Customer;
use app\entities\Order;
use app\handlers\CheckoutHandler;
use app\items\Cheese;
use app\items\Chocolate;
use PHPUnit\Framework\TestCase;

class CheckoutHandlerTest extends TestCase
{

    private $checkout;
    private $shoppingList;
    private $goldCustomer;
    private $silverCustomer;

    protected function setup(): void
    {
        $this->shoppingList = array(new Chocolate(), new Chocolate(), new Cheese());
        $this->checkout = new CheckoutHandler();
        $this->goldCustomer = new Customer("GOLD", "MyStreet 123, US");
        $this->silverCustomer = new Customer("SILVER", "MyStreet 123, US");
    }

    // "All is good, free delivery with gold membership")
    public function testCalculateTotalValidVoucherGoldMembership()
    {

        $total = $this->checkout->calculateTotal(new Order($this->shoppingList, "GIMME_DISCOUNT"), $this->goldCustomer);
        $this->assertEquals($total, 4.275);
    }

    // "invalid voucher")
    public function testCalculateTotalInValidVoucherGoldMembership()
    {

        $total = $this->checkout->calculateTotal(new Order($this->shoppingList, "DummyVoucher"), $this->goldCustomer);
        $this->assertEquals($total, 4.5);
    }

    // "invalid voucher, non-gold membership incurs US delivery fee")
    public function testCalculateTotalInValidVoucherNonGoldMembership()
    {
        $total = $this->checkout->calculateTotal(new Order($this->shoppingList, "DummyVoucher"), $this->silverCustomer);
        $this->assertEquals($total, 9.5);
    }

    //"invalid voucher, non-gold membership incurs Global delivery fee")
    public function testCalculateTotalInValidVoucherNonGoldMembershipNonUs()
    {
        $total = $this->checkout->calculateTotal(new Order($this->shoppingList, "DummyVoucher"), new Customer("SILVER", "MyStreet 123, France"));
        $this->assertEquals($total, 4.5);
    }

    protected function tearDown(): void
    {
        $this->checkout = null;
        $this->shoppingList = null;
    }
}
