<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function show()
    {
        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $grandTotal = $total * 1.10; // Including 10% tax

        return view('checkout', compact('cart', 'total', 'grandTotal'));
    }

    public function confirm(Request $request)
    {
        // You can store order here in DB if needed
        session()->forget('cart');

        return redirect()->route('products.index')->with('success', 'Order received. We will confirm once payment is verified.');
    }
}
