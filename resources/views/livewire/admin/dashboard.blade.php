<div>
    <div class="row g-3 mb-4">
        <div class="col-md-3 col-sm-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="text-muted small mb-1">Total Sales</p>
                            <h3 class="mb-0">₹{{ number_format($totalSales, 2) }}</h3>
                        </div>
                        <span class="badge bg-success-subtle text-success p-3 rounded-circle"><i class="bi bi-currency-rupee fs-4"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <p class="text-muted small mb-1">Total Orders</p>
                    <h3 class="mb-0">{{ number_format($totalOrders) }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <p class="text-muted small mb-1">Customers</p>
                    <h3 class="mb-0">{{ number_format($totalCustomers) }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <p class="text-muted small mb-1">Products</p>
                    <h3 class="mb-0">{{ number_format($totalProducts) }}</h3>
                    <span class="badge bg-warning text-dark mt-2">{{ $pendingOrders }} pending orders</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white"><h5 class="mb-0">Monthly Revenue ({{ now()->year }})</h5></div>
                <div class="card-body">
                    <canvas id="revenueChart" height="120"
                        data-labels='@json($revenueChartLabels)'
                        data-values='@json($revenueChartValues)'>
                    </canvas>
                </div>
            </div>
            <div class="card border-0 shadow-sm mt-4">
                <div class="card-header bg-white d-flex justify-content-between">
                    <h5 class="mb-0">Recent Orders</h5>
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-primary">View All</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0 admin-datatable">
                        <thead><tr><th>Order #</th><th>Customer</th><th>Status</th><th>Total</th><th>Date</th></tr></thead>
                        <tbody>
                        @forelse($recentOrders as $order)
                            <tr>
                                <td><a href="{{ route('admin.orders.show', $order) }}">{{ $order->order_number }}</a></td>
                                <td>{{ $order->user?->name ?? 'Guest' }}</td>
                                <td><span class="badge bg-secondary">{{ $order->status?->label() ?? $order->status }}</span></td>
                                <td>₹{{ number_format($order->total, 2) }}</td>
                                <td>{{ $order->created_at->format('d M Y') }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="text-center text-muted">No orders yet</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white"><h5 class="mb-0 text-danger"><i class="bi bi-exclamation-triangle"></i> Low Stock</h5></div>
                <ul class="list-group list-group-flush">
                    @forelse($lowStockProducts as $product)
                        <li class="list-group-item d-flex justify-content-between">
                            <span>{{ Str::limit($product->name, 30) }}</span>
                            <span class="badge bg-danger">{{ $product->stock_quantity }} left</span>
                        </li>
                    @empty
                        <li class="list-group-item text-muted">All products well stocked</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const el = document.getElementById('revenueChart');
    if (el && typeof Chart !== 'undefined') {
        new Chart(el, {
            type: 'bar',
            data: {
                labels: JSON.parse(el.dataset.labels || '[]'),
                datasets: [{ label: 'Revenue (₹)', data: JSON.parse(el.dataset.values || '[]'), backgroundColor: '#0d6efd' }]
            },
            options: { responsive: true, plugins: { legend: { display: false } } }
        });
    }
    if ($.fn.DataTable) { $('.admin-datatable').DataTable({ pageLength: 5, order: [] }); }
});
</script>
@endpush
