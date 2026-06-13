<div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h4 mb-0">Product Management</h2>
        @can('products.create')
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Add Product</a>
        @endcan
    </div>
    <div class="card border-0 shadow-sm mb-3">
        <div class="card-body row g-2">
            <div class="col-md-6">
                <input type="search" wire:model.live.debounce.300ms="search" class="form-control" placeholder="Search name or SKU...">
            </div>
            <div class="col-md-3">
                <select wire:model.live="status" class="form-select">
                    <option value="">All Status</option>
                    @foreach(\App\Enums\ProductStatus::cases() as $s)
                        <option value="{{ $s->value }}">{{ $s->label() }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="card border-0 shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr><th>Name</th><th>SKU</th><th>Category</th><th>Price</th><th>Stock</th><th>Status</th><th></th></tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->sku }}</td>
                        <td>{{ $product->category?->name }}</td>
                        <td>₹{{ number_format($product->effectivePrice(), 2) }}</td>
                        <td>
                            <span class="badge {{ $product->isLowStock() ? 'bg-danger' : 'bg-success' }}">{{ $product->stock_quantity }}</span>
                        </td>
                        <td>{{ $product->status?->label() }}</td>
                        <td class="text-end">
                            @can('products.edit')
                            <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">{{ $products->links('pagination::custom-admin') }}</div>
    </div>
</div>
