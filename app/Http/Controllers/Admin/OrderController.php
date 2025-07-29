<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
{
    $orders = Order::with('orderItems.product', 'user')->latest()->get();
    return view('admin.orders.index', compact('orders'));
}

}
