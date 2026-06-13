<?php

namespace App\Livewire\Admin;

use App\Enums\OrderStatus;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class Dashboard extends Component
{
    public function render()
    {
        $totalSales = Order::whereIn('status', [
            OrderStatus::Delivered,
            OrderStatus::Shipped,
            OrderStatus::Confirmed,
            OrderStatus::Processing,
            OrderStatus::Packed,
        ])->sum('total');

        $monthlyRevenue = Order::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('YEAR(created_at) as year'),
            DB::raw('SUM(total) as revenue')
        )
            ->whereYear('created_at', now()->year)
            ->whereNotIn('status', [OrderStatus::Cancelled, OrderStatus::Refunded])
            ->groupBy('year', 'month')
            ->orderBy('month')
            ->get();

        $revenueChartLabels = $monthlyRevenue->map(function ($row) {
            return date('M', mktime(0, 0, 0, (int) $row->month, 1));
        })->values()->all();

        $revenueChartValues = $monthlyRevenue->pluck('revenue')->map(fn ($v) => (float) $v)->values()->all();

        return view('livewire.admin.dashboard', [
            'totalSales' => $totalSales,
            'totalOrders' => Order::count(),
            'totalCustomers' => User::role('Customer')->count() ?: User::where('is_admin', false)->count(),
            'totalProducts' => Product::count(),
            'pendingOrders' => Order::where('status', OrderStatus::Pending)->count(),
            'monthlyRevenue' => $monthlyRevenue,
            'revenueChartLabels' => $revenueChartLabels,
            'revenueChartValues' => $revenueChartValues,
            'recentOrders' => Order::with('user')->latest()->limit(10)->get(),
            'lowStockProducts' => Product::whereColumn('stock_quantity', '<=', 'low_stock_threshold')
                ->orderBy('stock_quantity')
                ->limit(10)
                ->get(),
        ]);
    }
}
