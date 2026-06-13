<div class="container py-5">
    <h1 class="h3 mb-4">My Wishlist</h1>
    @if($wishlist?->items->count())
        <div class="row g-4">
            @foreach($wishlist->items as $item)
                <div class="col-md-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->product->name }}</h5>
                            <p class="text-primary">₹{{ number_format($item->product->effectivePrice(), 2) }}</p>
                            <a href="{{ route('storefront.product', $item->product->slug) }}" class="btn btn-sm btn-navy">View</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-muted">Your wishlist is empty.</p>
        <a href="{{ route('storefront.shop') }}" class="btn btn-navy">Browse Shop</a>
    @endif
</div>
