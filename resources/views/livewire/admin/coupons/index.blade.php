<div>
    <h2 class="h4 mb-4">Coupon Management</h2>
    <form wire:submit="save" class="card border-0 shadow-sm mb-4">
        <div class="card-body row g-2">
            <div class="col-md-2"><input wire:model="form.code" class="form-control" placeholder="Code"></div>
            <div class="col-md-3"><input wire:model="form.name" class="form-control" placeholder="Name"></div>
            <div class="col-md-3">
                <select wire:model="form.type" class="form-select">
                    @foreach($types as $t)<option value="{{ $t->value }}">{{ $t->label() }}</option>@endforeach
                </select>
            </div>
            <div class="col-md-2"><input type="number" wire:model="form.value" class="form-control" placeholder="Value"></div>
            <div class="col-md-2"><button class="btn btn-primary w-100">Add Coupon</button></div>
        </div>
    </form>
    <div class="card border-0 shadow-sm">
        <table class="table mb-0">
            <thead><tr><th>Code</th><th>Type</th><th>Value</th><th>Used</th><th>Active</th></tr></thead>
            <tbody>
            @foreach($coupons as $coupon)
                <tr>
                    <td><code>{{ $coupon->code }}</code></td>
                    <td>{{ $coupon->type?->label() }}</td>
                    <td>{{ $coupon->value }}</td>
                    <td>{{ $coupon->used_count }}</td>
                    <td>{{ $coupon->is_active ? 'Yes' : 'No' }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
