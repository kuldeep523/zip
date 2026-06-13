<div>
    <h2 class="h4 mb-4">Shipping Management</h2>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header">Shipping Zones</div>
                <div class="card-body">
                    <form wire:submit="saveZone" class="input-group mb-3">
                        <input wire:model="zoneForm.name" class="form-control" placeholder="Zone name">
                        <button class="btn btn-primary">Add</button>
                    </form>
                    <ul class="list-group list-group-flush">
                        @foreach($zones as $zone)
                            <li class="list-group-item">{{ $zone->name }} ({{ $zone->rates->count() }} rates)</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header">Shipping Rates</div>
                <div class="card-body">
                    <form wire:submit="saveRate" class="row g-2">
                        <select wire:model="rateForm.shipping_zone_id" class="form-select">
                            <option value="">Zone</option>
                            @foreach($zones as $z)<option value="{{ $z->id }}">{{ $z->name }}</option>@endforeach
                        </select>
                        <input wire:model="rateForm.name" class="form-control" placeholder="Rate name">
                        <input type="number" wire:model="rateForm.rate" class="form-control" placeholder="Amount">
                        <button class="btn btn-primary">Add Rate</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header">Free Shipping Rules</div>
                <div class="card-body">
                    <form wire:submit="saveFreeRule" class="row g-2">
                        <input wire:model="freeForm.name" class="form-control" placeholder="Rule name">
                        <input type="number" wire:model="freeForm.min_order_amount" class="form-control" placeholder="Min order">
                        <button class="btn btn-primary">Add Rule</button>
                    </form>
                    <ul class="list-group list-group-flush mt-3">
                        @foreach($freeRules as $rule)
                            <li class="list-group-item">{{ $rule->name }} — min ₹{{ $rule->min_order_amount }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
