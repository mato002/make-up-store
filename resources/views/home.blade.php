@extends('layouts.app')

@section('title', 'Welcome to MakeUp Store')

@section('content')
    <!-- Hero Section -->
    <div class="text-center mb-5" data-aos="fade-down">
        <h1 class="fw-bold display-5">Welcome to MakeUp Store</h1>
        <p class="lead text-muted">Explore our latest beauty products and add your favorites to the cart.</p>
        <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg mt-3 px-5 py-2">Shop Now</a>
    </div>

    <!-- Products Section -->
    <div class="mb-5">
        <h2 class="text-center fw-bold mb-4">Latest Products</h2>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4 mb-4" data-aos="zoom-in">
                    <div class="card shadow-sm h-100 border-0 rounded-4 hover-scale">
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top rounded-top-4" alt="{{ $product->name }}" style="height: 280px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h5 class="card-title fw-semibold">{{ $product->name }}</h5>
                            <p class="text-muted small mb-1">{{ $product->category->name ?? 'Uncategorized' }}</p>
                            <p class="fw-bold text-primary fs-5">${{ number_format($product->price, 2) }}</p>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-outline-primary btn-sm">View</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Features Section -->
    <div class="mb-5">
        <h2 class="text-center fw-bold mb-4">Why Shop With Us</h2>
        <div class="row text-center" data-aos="fade-up">
            <div class="col-md-4">
                <div class="p-4 shadow-sm rounded-4">
                    <i class="bi bi-truck display-4 text-primary"></i>
                    <h5 class="fw-bold mt-3">Fast Shipping</h5>
                    <p class="text-muted">We deliver quickly and reliably to your doorstep.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 shadow-sm rounded-4">
                    <i class="bi bi-stars display-4 text-primary"></i>
                    <h5 class="fw-bold mt-3">Top Quality</h5>
                    <p class="text-muted">Our products are carefully selected for top-tier quality.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 shadow-sm rounded-4">
                    <i class="bi bi-shield-check display-4 text-primary"></i>
                    <h5 class="fw-bold mt-3">Secure Payment</h5>
                    <p class="text-muted">Pay safely through our encrypted checkout process.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Newsletter Section -->
    <div class="bg-light rounded-4 p-5 text-center mb-5" data-aos="fade-up">
        <h2 class="fw-bold mb-3">Stay Updated</h2>
        <p class="text-muted">Subscribe to our newsletter for updates on new arrivals and offers.</p>
        <form class="row g-2 justify-content-center">
            <div class="col-md-4">
                <input type="email" class="form-control" placeholder="Your email" required>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary px-4">Subscribe</button>
            </div>
        </form>
    </div>
@endsection

@push('styles')
    <!-- Animate on Scroll CSS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <style>
        .hover-scale {
            transition: transform 0.3s ease;
        }
        .hover-scale:hover {
            transform: scale(1.05);
        }
    </style>
@endpush

@push('scripts')
    <!-- Animate on Scroll JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true
        });
    </script>
@endpush
