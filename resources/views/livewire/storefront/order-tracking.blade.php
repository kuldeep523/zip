<div class="container py-5">
    <h1 class="h3 mb-4">Track Your Order</h1>
    <form wire:submit="track" class="row g-2 mb-4">
        <div class="col-md-6"><input wire:model="orderNumber" class="form-control" placeholder="Order number e.g. ORD-20260530-ABC123" required></div>
        <div class="col-md-2"><button class="btn btn-navy w-100">Track</button></div>
    </form>
    @if($order)
        <div class="card">
            <div class="card-body">
                <p><strong>Status:</strong> {{ $order->status?->label() }}</p>
                @if($order->tracking_number)<p><strong>Tracking:</strong> {{ $order->tracking_number }} ({{ $order->carrier }})</p>@endif
                <h5 class="mt-3">Timeline</h5>
                <ul class="list-group">
                    @foreach($order->statusHistories as $h)
                        <li class="list-group-item">{{ $h->status?->label() }} — {{ $h->created_at->format('d M Y H:i') }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @elseif($orderNumber)
        <div class="alert alert-warning">Order not found.</div>
    @endif
</div>
