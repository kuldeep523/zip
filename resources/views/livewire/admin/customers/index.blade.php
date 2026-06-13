<div>
    <h2 class="h4 mb-4">Customer Management</h2>
    <input type="search" wire:model.live.debounce.300ms="search" class="form-control mb-3 w-50" placeholder="Search customers...">
    <div class="card border-0 shadow-sm table-responsive">
        <table class="table mb-0">
            <thead><tr><th>Name</th><th>Email</th><th>Phone</th><th>Orders</th><th>Reward Points</th></tr></thead>
            <tbody>
            @foreach($customers as $customer)
                <tr>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone ?? '-' }}</td>
                    <td>{{ $customer->orders_count }}</td>
                    <td>{{ $customer->reward_points }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="card-footer">{{ $customers->links('pagination::custom-admin') }}</div>
    </div>
</div>
