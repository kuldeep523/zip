<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice {{ $order->order_number }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background: #f5f5f5; }
        .header { margin-bottom: 30px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>RR Gems Udaipur</h1>
        <p>Invoice: <strong>{{ $order->order_number }}</strong></p>
        <p>Date: {{ $order->created_at->format('d M Y') }}</p>
        <p>Customer: {{ $order->user?->name ?? 'Guest' }}</p>
    </div>
    <table>
        <thead>
            <tr><th>Product</th><th>Qty</th><th>Unit Price</th><th>Total</th></tr>
        </thead>
        <tbody>
        @foreach($order->items as $item)
            <tr>
                <td>{{ $item->product_name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>₹{{ number_format($item->unit_price, 2) }}</td>
                <td>₹{{ number_format($item->total, 2) }}</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr><td colspan="3" align="right"><strong>Total</strong></td><td><strong>₹{{ number_format($order->total, 2) }}</strong></td></tr>
        </tfoot>
    </table>
</body>
</html>
