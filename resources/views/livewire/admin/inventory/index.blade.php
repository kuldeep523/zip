<div>
    <h2 class="h4 mb-4">Inventory Management</h2>
    <form wire:submit="adjust" class="card border-0 shadow-sm mb-4">
        <div class="card-body row g-2">
            <div class="col-md-4">
                <select wire:model="product_id" class="form-select">
                    <option value="">Select Product</option>
                    @foreach($products->groupBy(fn($p) => $p->category?->name ?? 'Other') as $categoryName => $groupProducts)
                        <optgroup label="{{ $categoryName }}">
                            @foreach($groupProducts as $p)
                                <option value="{{ $p->id }}">{{ $p->name }} ({{ $p->stock_quantity }})</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <select wire:model="type" class="form-select">
                    @foreach($types as $t)<option value="{{ $t->value }}">{{ $t->label() }}</option>@endforeach
                </select>
            </div>
            <div class="col-md-2"><input type="number" wire:model="quantity" class="form-control" placeholder="Qty" min="1"></div>
            <div class="col-md-2"><input wire:model="notes" class="form-control" placeholder="Notes"></div>
            <div class="col-md-1"><button class="btn btn-primary w-100">Apply</button></div>
        </div>
    </form>
    <div class="card border-0 shadow-sm">
        <div class="card-header">Recent Movements</div>
        <table class="table mb-0">
            <thead><tr><th>Product</th><th>Type</th><th>Qty</th><th>Before</th><th>After</th><th>Date</th></tr></thead>
            <tbody>
            @foreach($movements as $m)
                <tr>
                    <td>{{ $m->product?->name }}</td>
                    <td>{{ $m->type?->label() }}</td>
                    <td>{{ $m->quantity }}</td>
                    <td>{{ $m->stock_before }}</td>
                    <td>{{ $m->stock_after }}</td>
                    <td>{{ $m->created_at->format('d M Y') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
