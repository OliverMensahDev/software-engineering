<?php
declare(strict_types=1);

use app\payment\PaymentProcessor;
use PHPUnit\Framework\TestCase;

class PaymentProcessorTest extends TestCase
{
    public function testSendPaymentShouldPayAllEmployeeSalaries()
    {
        $paymentProcessor = new PaymentProcessor();
        $result = $paymentProcessor->sendPayments();        
        $this->assertEquals(5440, $result);
    }
}
