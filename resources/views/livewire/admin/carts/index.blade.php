<div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cart Data (Abandoned Carts)</h1>
    </div>

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-white border-0 py-3 d-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Carts</h6>
            <div style="width: 250px;">
                <input type="text" wire:model.live.debounce.300ms="search" class="form-control form-control-sm" placeholder="Search by email or session...">
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>User Email</th>
                            <th>Session ID</th>
                            <th>Total (₹)</th>
                            <th>Cart Data</th>
                            <th>Abandoned At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($carts as $cart)
                            <tr>
                                <td>#{{ $cart->id }}</td>
                                <td>{{ $cart->email ?? 'Guest' }}</td>
                                <td>
                                    <span class="badge bg-secondary" style="font-size: 0.75rem;">
                                        {{ \Illuminate\Support\Str::limit($cart->session_id, 10) }}
                                    </span>
                                </td>
                                <td>₹{{ number_format($cart->total, 2) }}</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-info" type="button" data-bs-toggle="collapse" data-bs-target="#cartData-{{ $cart->id }}" aria-expanded="false" aria-controls="cartData-{{ $cart->id }}">
                                        View Data
                                    </button>
                                    <div class="collapse mt-2" id="cartData-{{ $cart->id }}">
                                        <div class="card card-body bg-light p-2" style="font-size: 0.8rem; max-height: 200px; overflow-y: auto;">
                                            <pre class="mb-0">{{ json_encode(json_decode($cart->cart_data), JSON_PRETTY_PRINT) }}</pre>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($cart->abandoned_at ?? $cart->created_at)->format('d M, Y H:i') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">
                                    <i class="fas fa-shopping-cart fa-2x mb-3 d-block text-gray-300"></i>
                                    No cart data found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @if($carts->hasPages())
        <div class="card-footer bg-white border-0 py-3">
            {{ $carts->links() }}
        </div>
        @endif
    </div>
</div>
