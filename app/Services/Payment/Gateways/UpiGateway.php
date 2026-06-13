<?php

namespace App\Services\Payment\Gateways;

use App\Models\Order;
use App\Services\Payment\PaymentGatewayInterface;

class UpiGateway implements PaymentGatewayInterface
{
    public function charge(Order $order): array
    {
        return [
            'success' => true,
            'gateway' => 'upi',
            'transaction_id' => 'upi_'.uniqid(),
            'upi_id' => config('services.upi.vpa', 'rrgems@upi'),
        ];
    }
}
