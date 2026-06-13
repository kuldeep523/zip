<?php

namespace App\Services\Payment\Gateways;

use App\Models\Order;
use App\Services\Payment\PaymentGatewayInterface;

class PayPalGateway implements PaymentGatewayInterface
{
    public function charge(Order $order): array
    {
        return ['success' => true, 'gateway' => 'paypal', 'transaction_id' => 'pp_'.uniqid()];
    }
}
