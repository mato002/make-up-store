<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $productCount = Product::count();
        $categoryCount = Category::count();
        $orderCount = Order::count();

        // Dynamic total revenue
        $totalRevenue = DB::table('order_items')
            ->select(DB::raw('SUM(quantity * price) as total'))
            ->value('total') ?? 0;

        // Latest 5 orders
        $recentOrders = Order::latest()->take(5)->get();

        // Top 5 sold products
        $topProducts = DB::table('order_items')
            ->select('product_id', DB::raw('SUM(quantity) as total_sold'))
            ->groupBy('product_id')
            ->orderByDesc('total_sold')
            ->take(5)
            ->get();

        // Low stock products (e.g. stock <= 5)
        $lowStockProducts = Product::where('stock', '<=', 5)->get();

        return view('admin.dashboard', compact(
            'productCount',
            'categoryCount',
            'orderCount',
            'totalRevenue',
            'recentOrders',
            'topProducts',
            'lowStockProducts'
        ));
    }
}
