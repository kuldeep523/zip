<div>
    <!-- Cart Drawer Backdrop -->
    <div class="cart-drawer-backdrop" :class="{ 'show': cartOpen }" @click="cartOpen = false"></div>

    <!-- Cart Slide Drawer -->
    <div class="cart-drawer" :class="{ 'show': cartOpen }">
        <!-- Drawer Header -->
        <div class="cart-drawer-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0 text-white cinzel-font"><i class="bi bi-bag-check me-2"></i>Your Gem Cart</h4>
            <button type="button" class="btn-close btn-close-white" @click="cartOpen = false" aria-label="Close"></button>
        </div>

        <!-- Drawer Body -->
        <div class="cart-drawer-body">
            @if(count($cartItems) > 0)
                <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
                    <span class="text-muted small">{{ count($cartItems) }} Gemstone(s)</span>
                    <button class="btn btn-link text-danger btn-sm p-0 text-decoration-none" wire:click="clearCart">
                        <i class="bi bi-trash"></i> Clear Cart
                    </button>
                </div>

                <div class="cart-list">
                    @foreach($cartItems as $id => $item)
                        <div class="card mb-3 border-0 border-bottom rounded-0 pb-3">
                            <div class="row g-0 align-items-center">
                                <div class="col-3">
                                    <img src="{{ !empty($item['image_path']) ? asset('storage/' . $item['image_path']) : asset('images/placeholder.jpg') }}" class="img-fluid rounded-3 border" alt="{{ $item['name'] }}">
                                </div>
                                <div class="col-9 ps-3">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <h5 class="h6 mb-1 text-dark fw-bold">{{ $item['name'] }}</h5>
                                        <button type="button" class="btn-close fs-7" wire:click="removeItem('{{ $id }}')" aria-label="Remove"></button>
                                    </div>
                                    <p class="text-muted small mb-1">{{ $item['weight'] }} {{ $item['weight_unit'] }} &bull; {{ $item['certification'] }}</p>
                                    
                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                        <!-- Qty Counter -->
                                        <div class="input-group input-group-sm" style="width: 90px;">
                                            <button class="btn btn-outline-secondary py-0" type="button" wire:click="updateQuantity('{{ $id }}', {{ $item['qty'] - 1 }})">-</button>
                                            <input type="text" class="form-control text-center py-0 px-1 bg-light border-secondary" value="{{ $item['qty'] }}" readonly>
                                            <button class="btn btn-outline-secondary py-0" type="button" wire:click="updateQuantity('{{ $id }}', {{ $item['qty'] + 1 }})">+</button>
                                        </div>
                                        <span class="fw-bold text-navy">₹{{ number_format($item['price'] * $item['qty'], 2) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-5">
                    <i class="bi bi-bag-x fs-1 text-muted d-block mb-3"></i>
                    <p class="text-muted">Your cart is empty.</p>
                    <button class="btn btn-navy mt-3" @click="cartOpen = false">Continue Shopping</button>
                </div>
            @endif
        </div>

        <!-- Drawer Footer -->
        @if(count($cartItems) > 0)
            <div class="cart-drawer-footer">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="fw-bold text-uppercase text-muted">Subtotal:</span>
                    <span class="fs-4 fw-bold text-navy">₹{{ number_format($subtotal, 2) }}</span>
                </div>
                <p class="text-muted small mb-4"><i class="bi bi-info-circle me-1"></i>GST & Lab Certificate cost included in the price.</p>
                <div class="d-grid gap-2">
                    <a href="{{ url('/checkout') }}" class="btn btn-gold py-2" @click="cartOpen = false">
                        <i class="bi bi-credit-card me-2"></i>Secure Checkout
                    </a>
                    <button class="btn btn-outline-secondary py-2" @click="cartOpen = false">
                        Continue Shopping
                    </button>
                </div>
            </div>
        @endif
    </div>
</div>
