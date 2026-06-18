<div class="py-5">
    <div class="container">
        
        @if($isSuccess)
            <!-- Success Order Screen -->
            <div class="row justify-content-center text-center">
                <div class="col-lg-7">
                    <div class="card border-success border-2 shadow-lg p-5 rounded-3 bg-white">
                        <div class="text-success fs-1 mb-3"><i class="bi bi-shield-fill-check"></i></div>
                        <h2 class="h3 fw-bold cinzel-font text-navy mb-2">Order Confirmed Successfully!</h2>
                        <p class="text-muted mb-4">Your order ID is <strong>{{ $orderId }}</strong>. We have sent the confirmation invoice details to your email.</p>

                        <div class="alert alert-warning text-start small border border-warning" role="alert">
                            <h4 class="h6 alert-heading fw-bold mb-2"><i class="bi bi-clock-history me-2"></i>Purification & Vedic Energization Process:</h4>
                            Our astrologer will perform the Vedic purification and energization rituals on your gemstone in your name before dispatch. Please allow 24-48 hours for dispatch.
                        </div>

                        <div class="card bg-light border-0 p-4 text-start mb-4">
                            <h4 class="h6 fw-bold text-navy mb-3"><i class="bi bi-truck me-2"></i>Shipping Summary</h4>
                            <p class="small text-muted mb-1"><strong>Name:</strong> {{ $name }}</p>
                            <p class="small text-muted mb-1"><strong>Contact Phone:</strong> {{ $phone }}</p>
                            <p class="small text-muted mb-1"><strong>Address:</strong> {{ $address }}, {{ $city }}, {{ $state }} - {{ $pincode }}</p>
                            <p class="small text-muted mb-0"><strong>Payment Type:</strong> {{ strtoupper($paymentMethod) }}</p>
                        </div>

                        <div class="d-grid gap-2">
                            <a href="https://wa.me/919876543210?text=Hi! I have placed order {{ $orderId }} for a certified gemstone. Please share dispatch update." target="_blank" class="btn btn-success py-2">
                                <i class="bi bi-whatsapp me-2"></i>Share Order on WhatsApp
                            </a>
                            <a href="{{ url('/') }}" class="btn btn-navy py-2">Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <!-- Checkout Form & Order Summary -->
            <div class="row mb-4">
                <div class="col-12 border-bottom pb-3">
                    <h2 class="h2 cinzel-font text-navy">Secure Checkout</h2>
                    <p class="text-muted mb-0">Complete your shipping details below to place your order.</p>
                </div>
            </div>

            <div class="row g-4">
                <!-- Shipping Details Form -->
                <div class="col-lg-7">
                    <div class="card border-0 shadow-sm p-4 p-md-5 rounded-3 bg-white">
                        <h3 class="h5 cinzel-font text-navy fw-bold mb-4 pb-2 border-bottom"><i class="bi bi-truck text-warning me-2"></i>Shipping Details</h3>
                        
                        <form wire:submit.prevent="placeOrder">
                            <div class="row g-3">
                                <!-- Name -->
                                <div class="col-12">
                                    <label class="form-label small fw-bold text-navy">Recipient Full Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model.blur="name" placeholder="John Doe">
                                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <!-- Phone -->
                                <div class="col-md-6 col-12">
                                    <label class="form-label small fw-bold text-navy">Contact Number</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" wire:model.blur="phone" placeholder="10 Digit Mobile No.">
                                    @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <!-- Pincode -->
                                <div class="col-md-6 col-12">
                                    <label class="form-label small fw-bold text-navy">Pincode</label>
                                    <input type="text" class="form-control @error('pincode') is-invalid @enderror" wire:model.blur="pincode" placeholder="6 Digit Area Code">
                                    @error('pincode') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <!-- Street Address -->
                                <div class="col-12">
                                    <label class="form-label small fw-bold text-navy">Full Street Address</label>
                                    <textarea class="form-control @error('address') is-invalid @enderror" rows="3" wire:model.blur="address" placeholder="House No, Apartment, Landmark, Street..."></textarea>
                                    @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <!-- City -->
                                <div class="col-md-6 col-12">
                                    <label class="form-label small fw-bold text-navy">City</label>
                                    <input type="text" class="form-control @error('city') is-invalid @enderror" wire:model.blur="city" placeholder="Udaipur">
                                    @error('city') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <!-- State -->
                                <div class="col-md-6 col-12">
                                    <label class="form-label small fw-bold text-navy">State</label>
                                    <input type="text" class="form-control @error('state') is-invalid @enderror" wire:model.blur="state" placeholder="Rajasthan">
                                    @error('state') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <h3 class="h5 cinzel-font text-navy fw-bold mt-5 mb-4 pb-2 border-bottom"><i class="bi bi-wallet2 text-warning me-2"></i>Select Payment Method</h3>
                            
                            <div class="row g-3">
                                <!-- Cash on Delivery -->
                                <div class="col-md-6 col-12">
                                    <div class="card p-3 border-secondary rounded-3 position-relative">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="paymentRadio" id="radioCod" value="cod" wire:model="paymentMethod" checked>
                                            <label class="form-check-label fw-bold text-navy fs-7" for="radioCod">
                                                Cash On Delivery (COD)
                                            </label>
                                            <small class="text-muted d-block fs-8 mt-1">Pay with cash when package is delivered.</small>
                                        </div>
                                    </div>
                                </div>

                                <!-- UPI / Online Payment -->
                                <div class="col-md-6 col-12">
                                    <div class="card p-3 border rounded-3 position-relative">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="paymentRadio" id="radioUpi" value="online" wire:model="paymentMethod">
                                            <label class="form-check-label fw-bold text-navy fs-7" for="radioUpi">
                                                UPI / Card / Netbanking
                                            </label>
                                            <small class="text-muted d-block fs-8 mt-1">Simulated instant online checkout (Free).</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid mt-5">
                                <button type="submit" class="btn btn-gold py-3 fs-6">
                                    <i class="bi bi-shield-lock-fill me-2"></i>Place Secure Order (₹{{ number_format($total, 2) }})
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Order Summary Sidebar -->
                <div class="col-lg-5">
                    <div class="card border-0 shadow-sm p-4 rounded-3 bg-white">
                        <h3 class="h5 cinzel-font text-navy fw-bold mb-4 pb-2 border-bottom"><i class="bi bi-bag-check-fill text-warning me-2"></i>Order Summary</h3>

                        <div class="mb-4">
                            @foreach($cartItems as $item)
                                <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="{{ !empty($item['image_path']) ? asset('storage/' . $item['image_path']) : asset('images/placeholder.jpg') }}" class="img-fluid rounded border bg-light" style="width: 50px; height: 50px; object-fit: cover;" alt="{{ $item['name'] }}">
                                        <div>
                                            <h4 class="h6 mb-0 text-navy fw-bold">{{ $item['name'] }}</h4>
                                            <small class="text-muted">{{ $item['weight'] }} {{ $item['weight_unit'] }} &bull; Qty: {{ $item['qty'] }}</small>
                                        </div>
                                    </div>
                                    <span class="fw-bold text-navy">₹{{ number_format($item['price'] * $item['qty'], 2) }}</span>
                                </div>
                            @endforeach
                        </div>

                        <div class="mb-3 d-flex justify-content-between">
                            <span class="text-muted">Item Subtotal:</span>
                            <span class="text-navy fw-bold">₹{{ number_format($subtotal, 2) }}</span>
                        </div>
                        <div class="mb-3 d-flex justify-content-between">
                            <span class="text-muted">Shipping Charges:</span>
                            <span class="text-success fw-bold">FREE SHIPPING</span>
                        </div>
                        <div class="mb-4 d-flex justify-content-between">
                            <span class="text-muted">GST (Included):</span>
                            <span class="text-navy">3% GST Included</span>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between align-items-center mt-3 pt-2 mb-2">
                            <span class="fw-bold text-navy h5 mb-0">Grand Total:</span>
                            <span class="fw-bold text-navy h4 mb-0">₹{{ number_format($total, 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>
</div>
