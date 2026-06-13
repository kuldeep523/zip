<div>
    <div class="d-flex justify-content-between mb-4">
        <h2 class="h4">Order {{ $order->order_number }}</h2>
        <div>
            <a href="{{ route('admin.orders.invoice', $order) }}" class="btn btn-outline-secondary"><i class="bi bi-file-pdf"></i> Invoice PDF</a>
            <a href="{{ route('admin.orders.index') }}" class="btn btn-link">Back</a>
        </div>
    </div>
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header">Items</div>
                <table class="table mb-0">
                    <thead><tr><th>Product</th><th>Qty</th><th>Price</th><th>Total</th></tr></thead>
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
                        <tr><td colspan="3" class="text-end">Subtotal</td><td>₹{{ number_format($order->subtotal, 2) }}</td></tr>
                        <tr><td colspan="3" class="text-end">Shipping</td><td>₹{{ number_format($order->shipping_amount, 2) }}</td></tr>
                        <tr><td colspan="3" class="text-end fw-bold">Total</td><td class="fw-bold">₹{{ number_format($order->total, 2) }}</td></tr>
                    </tfoot>
                </table>
            </div>
            <div class="card border-0 shadow-sm mt-3">
                <div class="card-header">Status History</div>
                <ul class="list-group list-group-flush">
                    @foreach($order->statusHistories as $history)
                        <li class="list-group-item">
                            <strong>{{ $history->status?->label() ?? $history->status }}</strong>
                            <small class="text-muted">{{ $history->created_at->diffForHumans() }}</small>
                            @if($history->comment)<p class="mb-0 small">{{ $history->comment }}</p>@endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header">Update Status</div>
                <div class="card-body">
                    <form wire:submit="updateStatus">
                        <select wire:model="newStatus" class="form-select mb-2">
                            @foreach($statuses as $s)<option value="{{ $s->value }}">{{ $s->label() }}</option>@endforeach
                        </select>
                        <textarea wire:model="statusComment" class="form-control mb-2" placeholder="Comment (optional)"></textarea>
                        <button class="btn btn-primary w-100">Update Status</button>
                    </form>
                </div>
            </div>
            @if($order->tracking_number)
            <div class="card border-0 shadow-sm mt-3">
                <div class="card-body">
                    <p class="mb-1"><strong>Tracking:</strong> {{ $order->tracking_number }}</p>
                    <p class="mb-0"><strong>Carrier:</strong> {{ $order->carrier }}</p>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
