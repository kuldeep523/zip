<div class="container py-5">
    @if($brand)
        <h1 class="h3">{{ $brand->name }}</h1>
        <p>{{ $brand->description }}</p>
        <div class="row g-3 mt-3">
            @foreach($brand->products as $product)
                <div class="col-md-3">
                    <a href="{{ route('storefront.product', $product->slug) }}">{{ $product->name }}</a>
                </div>
            @endforeach
        </div>
    @else
        <h1 class="h3 mb-4">Our Brands</h1>
        <div class="row g-4">
            @foreach($brands as $b)
                <div class="col-md-3 text-center">
                    <a href="{{ route('storefront.brand', $b->slug) }}" class="text-decoration-none">
                        <div class="card p-4"><h5>{{ $b->name }}</h5><small>{{ $b->products_count }} products</small></div>
                    </a>
                </div>
            @endforeach
        </div>
    @endif
</div>
