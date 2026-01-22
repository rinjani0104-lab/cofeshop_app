<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cafein Holic - Modern Coffee Shop Experience">
    <title>Cafein Holic - @yield('title', 'Premium Coffee Shop')</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    
    @yield('head')
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-white shadow-sm py-3" id="mainNavbar">
        <div class="container">
            <a class="navbar-brand fw-bold fs-3 text-brown-dark" href="{{ url('/') }}">
                <i class="bi bi-cup-hot-fill me-2 text-brown"></i>Cafein Holic
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/menu') }}">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/order/form') }}">Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/reservation') }}">Reservation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
                    </li>
                </ul>
                <div class="d-flex ms-lg-4 mt-3 mt-lg-0">
                    <a href="{{ url('/order/form') }}" class="btn btn-brown rounded-pill px-4">
                        <i class="bi bi-cart3 me-1"></i> Order Now
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-brown-dark text-cream pt-5 pb-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h3 class="fw-bold mb-3">
                        <i class="bi bi-cup-hot-fill me-2"></i>Cafein Holic
                    </h3>
                    <p class="mb-4">Premium coffee experiences crafted with passion since 2015. We source the finest beans and create moments worth savoring.</p>
                    <div class="social-links">
                        <a href="#" class="text-cream me-3"><i class="bi bi-facebook fs-5"></i></a>
                        <a href="#" class="text-cream me-3"><i class="bi bi-instagram fs-5"></i></a>
                        <a href="#" class="text-cream me-3"><i class="bi bi-twitter fs-5"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-4 mb-md-0">
                    <h5 class="fw-bold mb-3">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ url('/') }}" class="text-cream text-decoration-none">Home</a></li>
                        <li class="mb-2"><a href="{{ url('/menu') }}" class="text-cream text-decoration-none">Menu</a></li>
                        <li class="mb-2"><a href="{{ url('/order/form') }}" class="text-cream text-decoration-none">Order</a></li>
                        <li class="mb-2"><a href="{{ url('/reservation') }}" class="text-cream text-decoration-none">Reservation</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-4 mb-4 mb-md-0">
                    <h5 class="fw-bold mb-3">Contact Info</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="bi bi-geo-alt me-2"></i> 123 Coffee Street, Jakarta</li>
                        <li class="mb-2"><i class="bi bi-telephone me-2"></i> (021) 555-7890</li>
                        <li class="mb-2"><i class="bi bi-envelope me-2"></i> hello@cafeinholic.com</li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-4">
                    <h5 class="fw-bold mb-3">Opening Hours</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2">Mon-Fri: 7:00 AM - 10:00 PM</li>
                        <li class="mb-2">Saturday: 8:00 AM - 11:00 PM</li>
                        <li class="mb-2">Sunday: 8:00 AM - 9:00 PM</li>
                    </ul>
                </div>
            </div>
            <hr class="my-4 border-cream-light">
            <div class="text-center pt-2">
                <p class="mb-0">&copy; 2023 Cafein Holic. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    
    @yield('scripts')
</body>
</html>