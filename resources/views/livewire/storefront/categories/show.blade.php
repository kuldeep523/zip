<div class="container py-5">
    <h1 class="h3">{{ $category->name }}</h1>
    <p class="text-muted">{{ $category->description }}</p>
    <div class="row g-4 mt-2">
        @foreach($products as $product)
            <div class="col-md-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h5><a href="{{ route('storefront.product', $product->slug) }}">{{ $product->name }}</a></h5>
                        <p class="text-primary mb-0">₹{{ number_format($product->effectivePrice(), 2) }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-4">{{ $products->links() }}</div>
</div>
