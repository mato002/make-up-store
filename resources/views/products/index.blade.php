@extends('layouts.app')

@section('title', 'Browse Products')

@section('content')
    <h2 class="mb-4">All Products</h2>

    <!-- Filter + Search Form -->
    <form action="{{ route('products.index') }}" method="GET" class="row g-2 mb-4">
        <div class="col-md-4">
            <input type="text" name="search" class="form-control" placeholder="Search products..." value="{{ request('search') }}">
        </div>
        <div class="col-md-3">
            <select name="category" class="form-select" onchange="this.form.submit()">
                <option value="">All Categories</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Filter</button>
        </div>
    </form>

    <!-- Products Grid -->
    <div class="row">
        @forelse ($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" style="height: 250px; object-fit: cover;" alt="{{ $product->name }}">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="text-muted small">{{ $product->category->name ?? 'Uncategorized' }}</p>
                        <p class="fw-bold text-primary">${{ number_format($product->price, 2) }}</p>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-outline-primary">View Product</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-info text-center">No products found.</div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $products->withQueryString()->links() }}
    </div>
@endsection
