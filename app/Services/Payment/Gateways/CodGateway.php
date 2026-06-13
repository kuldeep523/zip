<?php

namespace App\Services\Payment\Gateways;

use App\Models\Order;
use App\Services\Payment\PaymentGatewayInterface;

class CodGateway implements PaymentGatewayInterface
{
    public function charge(Order $order): array
    {
        return [
            'success' => true,
            'gateway' => 'cod',
            'transaction_id' => 'cod_'.$order->order_number,
            'payment_status' => 'pending',
        ];
    }
}
