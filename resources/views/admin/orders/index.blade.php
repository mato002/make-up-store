@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Manage Orders</h2>

    @if($orders->count())
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Order #</th>
                <th>User</th>
                <th>Contact</th>
                <th>Address</th>
                <th>Status</th>
                <th>Items</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>#{{ $order->id }}</td>
                <td>{{ $order->name }}</td>
                <td>
                    Email: {{ $order->email }}<br>
                    Phone: {{ $order->phone }}
                </td>
                <td>{{ $order->address }}</td>
                <td>
                    <span class="badge bg-warning text-dark">{{ ucfirst($order->status) }}</span>
                </td>
                <td>
                    <ul>
                        @foreach($order->orderItems as $item)
                        <li>
                            {{ $item->product->name ?? 'N/A' }} x {{ $item->quantity }}
                            (Ksh {{ number_format($item->price, 2) }})
                        </li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    Ksh {{ number_format($order->orderItems->sum(fn($i) => $i->price * $i->quantity), 2) }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>No orders found.</p>
    @endif
</div>
@endsection
@section('title', 'Orders')