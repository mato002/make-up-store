@extends('layouts.app')

@section('title', 'Your Cart')

@section('content')
    <h2 class="mb-4">Your Shopping Cart</h2>

    @if (session('cart') && count(session('cart')) > 0)
        <!-- Coupon Form -->
        <form action="{{ route('cart.coupon') }}" method="POST" class="mb-4">
            @csrf
            <div class="input-group w-50">
                <input type="text" name="coupon_code" class="form-control" placeholder="Enter coupon code">
                <button class="btn btn-outline-secondary" type="submit">Apply</button>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach ($cart as $item)
                        @php $subtotal = $item['price'] * $item['quantity']; $total += $subtotal; @endphp
                        <tr>
                            <td><img src="{{ $item['image_url'] ?? '/images/default.jpg' }}" alt="{{ $item['name'] }}" style="width: 50px;"></td>
                            <td>{{ $item['name'] }}</td>
                            <td>
                                <form action="{{ route('cart.update', $item['id']) }}" method="POST" class="d-flex">
                                    @csrf
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="form-control form-control-sm me-2" style="width: 70px;">
                                    <button type="submit" class="btn btn-sm btn-success">Update</button>
                                </form>
                            </td>
                            <td>${{ number_format($item['price'], 2) }}</td>
                            <td>${{ number_format($subtotal, 2) }}</td>
                            <td>
                                <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    <!-- Tax and Total -->
                    <tr>
                        <td colspan="4" class="text-end">Tax (10%)</td>
                        <td colspan="2">${{ number_format($total * 0.10, 2) }}</td>
                    </tr>
                    <tr class="fw-bold">
                        <td colspan="4" class="text-end">Grand Total</td>
                        <td colspan="2">${{ number_format($total * 1.10, 2) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Continue Shopping</a>
            <div>
                @guest
                    <p class="text-muted">You need to <a href="{{ route('login') }}">login</a> to proceed to checkout.</p>
                @else
                    <a href="#" class="btn btn-primary">Proceed to Checkout</a>
                @endguest
            </div>
        </div>

        <p class="mt-3 text-muted">Estimated delivery: {{ now()->addDays(3)->toFormattedDateString() }}</p>
        <img src="/images/secure-checkout.png" alt="Secure Checkout" style="height: 30px;">
    @else
        <p>Your cart is empty.</p>
        <a href="{{ route('products.index') }}" class="btn btn-primary mt-3">Browse Products</a>
    @endif
@endsection
