<div>
    <h2 class="h4 mb-4">Order Management</h2>
    <select wire:model.live="status" class="form-select w-auto mb-3">
        <option value="">All Statuses</option>
        @foreach($statuses as $s)<option value="{{ $s->value }}">{{ $s->label() }}</option>@endforeach
    </select>
    <div class="card border-0 shadow-sm table-responsive">
        <table class="table table-hover mb-0 admin-datatable">
            <thead><tr><th>Order #</th><th>Customer</th><th>Status</th><th>Payment</th><th>Total</th><th>Date</th><th></th></tr></thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->order_number }}</td>
                    <td>{{ $order->user?->name ?? 'Guest' }}</td>
                    <td><span class="badge bg-secondary">{{ $order->status?->label() }}</span></td>
                    <td>{{ $order->payment_method?->label() ?? '-' }}</td>
                    <td>₹{{ number_format($order->total, 2) }}</td>
                    <td>{{ $order->created_at->format('d M Y H:i') }}</td>
                    <td><a href="{{ route('admin.orders.show', $order) }}" class="btn btn-sm btn-primary">View</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="card-footer">{{ $orders->links('pagination::custom-admin') }}</div>
    </div>
</div>
