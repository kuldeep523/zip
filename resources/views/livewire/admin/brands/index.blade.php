<div>
    <h2 class="h4 mb-4">Brand Management</h2>
    <form wire:submit="save" class="card border-0 shadow-sm mb-4">
        <div class="card-body row g-2">
            <div class="col-md-4"><input wire:model="form.name" class="form-control" placeholder="Brand Name"></div>
            <div class="col-md-6"><input wire:model="form.description" class="form-control" placeholder="Description"></div>
            <div class="col-md-2"><button class="btn btn-primary w-100">Add Brand</button></div>
        </div>
    </form>
    <div class="card border-0 shadow-sm">
        <table class="table mb-0">
            <thead><tr><th>Name</th><th>Slug</th><th>Status</th></tr></thead>
            <tbody>
            @foreach($brands as $brand)
                <tr><td>{{ $brand->name }}</td><td>{{ $brand->slug }}</td><td>{{ $brand->is_active ? 'Active' : 'Inactive' }}</td></tr>
            @endforeach
            </tbody>
        </table>
        <div class="card-footer">{{ $brands->links('pagination::custom-admin') }}</div>
    </div>
</div>
