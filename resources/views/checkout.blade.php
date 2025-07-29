@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
    <h2>Checkout</h2>

    <p>Please pay the total amount to the following till number:</p>
    <div class="alert alert-info">
        <strong>Till Number:</strong> 123456 <br>
        <strong>Amount:</strong> KES {{ number_format($grandTotal, 2) }}
    </div>

    <p>After payment, click the confirm button below:</p>

    <form action="{{ route('checkout.confirm') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success">I Have Paid</button>
    </form>

    <p class="mt-3 text-muted">Once we verify the payment, your order will be processed.</p>
@endsection
