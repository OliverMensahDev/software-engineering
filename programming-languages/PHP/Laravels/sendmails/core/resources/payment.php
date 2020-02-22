<?php
namespace core\resources;

use App\Helpers\ActionClass;

class Payment
{
    public function addPaymentToken($token)
    {
        $actionClass = new ActionClass();
        return $actionClass->execute('stripe', 'addCard', [['customer_id' => $token]]);
    }

    public function chargeCard($amount, $currency, $customerID = null, $description = null, $receipt_email = null, $source = null)
    {
        if ($amount == 0) {
            return true;
        }
        $charge_type = ($source) ? 'source' : 'customer';
        $charge_token = ($source) ? $source : $customerID;
        $description = ($description) ?: 'Payment made for a service worth ' . $currency . ' ' . $amount;
        $actionClass = new ActionClass();
        $amountInCents = ((int) $amount) * 100;
        $payload = ['amount' => $amountInCents, 'currency' => $currency,
            'description' => $description, 'receipt_email' => $receipt_email];
        $payload[$charge_type] = $charge_token;
        return $actionClass->execute('stripe', 'chargeCard', [$payload]);
    }

    public function refund($charge)
    {
        $actionClass = new ActionClass();
        return $actionClass->execute('stripe', 'refund', [['charge' => $charge]]);
    }
}
