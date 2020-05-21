<?php

use app\entities\Customer;
use app\entities\Membership;
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
        $this->goldCustomer = new Customer(Membership::GOLD, "MyStreet 123, US");
        $this->silverCustomer = new Customer(Membership::SILVER, "MyStreet 123, US");
    }

    // "All is good, free delivery with gold membership")
    public function testCalculateTotalValidVoucherGoldMembership()
    {
        $order = new Order($this->shoppingList, "GIMME_DISCOUNT");
        $order->setCustomer($this->goldCustomer);
        $total = $this->checkout->calculateTotal($order);
        $this->assertEquals($total, 4.275);
    }

    // "invalid voucher")
    public function testCalculateTotalInValidVoucherGoldMembership()
    {
        $order = new Order($this->shoppingList, "DummyVoucher");
        $order->setCustomer($this->goldCustomer);
        $total = $this->checkout->calculateTotal($order);
        $this->assertEquals($total, 4.5);
    }

    // "invalid voucher, non-gold membership incurs US delivery fee")
    public function testCalculateTotalInValidVoucherNonGoldMembership()
    {
        $order = new Order($this->shoppingList, "DummyVoucher");
        $order->setCustomer($this->silverCustomer);
        $total = $this->checkout->calculateTotal($order);
        $this->assertEquals($total, 9.5);
    }

    //"invalid voucher, non-gold membership incurs Global delivery fee")
    public function testCalculateTotalInValidVoucherNonGoldMembershipNonUs()
    {
        $order = new Order($this->shoppingList, "DummyVoucher");
        $order->setCustomer(new Customer(Membership::SILVER, "MyStreet 123, France"));
        $total = $this->checkout->calculateTotal($order);
        $this->assertEquals($total, 4.5);
    }

    protected function tearDown(): void
    {
        $this->checkout = null;
        $this->shoppingList = null;
    }
}
