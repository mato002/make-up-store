<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'MakeUp Store')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">MakeUp Store</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('cart.index') }}">Cart</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container py-4">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-light text-dark border-top mt-4">
        <div class="container py-5">
            <div class="row">
                <!-- About -->
                <div class="col-md-4 mb-3">
                    <h5 class="fw-bold">About Us</h5>
                    <p class="small">
                        MakeUp Store is your trusted online destination for premium beauty products. We offer a wide range of cosmetics to enhance your natural glow.
                    </p>
                </div>

                <!-- Quick Links -->
                <div class="col-md-4 mb-3">
                    <h5 class="fw-bold">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('/') }}" class="text-decoration-none text-dark">Home</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-decoration-none text-dark">Products</a></li>
<li><a href="{{ route('pages.terms') }}" class="text-decoration-none text-dark">Terms & Conditions</a></li>
<li><a href="{{ route('pages.privacy') }}" class="text-decoration-none text-dark">Privacy Policy</a></li>
                    </ul>
                </div>

                <!-- Social Media -->
                <div class="col-md-4 mb-3">
                    <h5 class="fw-bold">Follow Us</h5>
                    <a href="#" class="text-dark me-3"><i class="bi bi-facebook"></i> Facebook</a><br>
                    <a href="#" class="text-dark me-3"><i class="bi bi-instagram"></i> Instagram</a><br>
                    <a href="#" class="text-dark"><i class="bi bi-twitter-x"></i> Twitter</a>
                </div>
            </div>
        </div>

        <div class="text-center bg-secondary text-white py-2">
            <small>&copy; {{ date('Y') }} MakeUp Store. All rights reserved.</small>
        </div>
    </footer>

    <!-- Bootstrap JS + Icons -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</body>
</html>
