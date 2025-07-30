@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded" alt="{{ $product->name }}">
        </div>
        <div class="col-md-6">
            <h2>{{ $product->name }}</h2>
            <p class="text-muted">{{ $product->category->name ?? 'Uncategorized' }}</p>
            <p>{{ $product->description }}</p>
            <h4 class="text-primary">${{ number_format($product->price, 2) }}</h4>

            <form id="addToCartForm" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" name="quantity" id="quantity" value="1" min="1" class="form-control w-25">
                </div>
                <button type="submit" class="btn btn-success">Add to Cart</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('addToCartForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const quantity = document.getElementById('quantity').value;
            const token = '{{ csrf_token() }}';
            const url = '{{ route('cart.add', $product->id) }}';

            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                body: JSON.stringify({ quantity: quantity })
            })
            .then(response => {
                if (response.ok) {
                    window.location.href = '{{ route('cart.index') }}';
                } else {
                    return response.json().then(data => {
                        alert(data.message || 'Something went wrong.');
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while adding to cart.');
            });
        });
    </script>
@endsection
