<div class="container py-5">
    <h1 class="h3 mb-4">Compare Products</h1>
    @if($products->count())
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead><tr><th>Feature</th>@foreach($products as $p)<th>{{ $p->name }}</th>@endforeach</tr></thead>
                <tbody>
                    <tr><td>Price</td>@foreach($products as $p)<td>₹{{ number_format($p->effectivePrice(), 2) }}</td>@endforeach</tr>
                    <tr><td>Brand</td>@foreach($products as $p)<td>{{ $p->brand?->name }}</td>@endforeach</tr>
                    <tr><td>Category</td>@foreach($products as $p)<td>{{ $p->category?->name }}</td>@endforeach</tr>
                    <tr><td>Stock</td>@foreach($products as $p)<td>{{ $p->stock_quantity }}</td>@endforeach</tr>
                </tbody>
            </table>
        </div>
    @else
        <p class="text-muted">No products to compare. Add products from the shop.</p>
    @endif
</div>
