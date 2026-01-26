@php
    // Current path untuk active state
    $currentPath = request()->path();
    $currentRoute = request()->route()->getName() ?? '';
    
    // Navigation items - SUSUNAN RAPIH
    $navItems = [
        [
            'name' => 'Home',
            'url' => url('/home'),
            'route' => 'home',
            'icon' => 'bi-house',
            'is_active' => $currentPath === 'home' || $currentRoute === 'home'
        ],
        [
            'name' => 'Menu',
            'url' => url('/menu'),
            'route' => 'menu.index',
            'icon' => 'bi-cup-hot',
            'is_active' => str_contains($currentPath, 'menu') || $currentRoute === 'menu.index'
        ],
        [
            'name' => 'Order',
            'url' => url('/order/form'),
            'route' => 'order.form',
            'icon' => 'bi-cart3',
            'is_active' => str_contains($currentPath, 'order') || $currentRoute === 'order.form'
        ],
        [
            'name' => 'Reservation',
            'url' => url('/reservation'),
            'route' => 'reservation',
            'icon' => 'bi-calendar-check',
            'is_active' => $currentPath === 'reservation' || $currentRoute === 'reservation'
        ],
        [
            'name' => 'About',
            'url' => url('/about'),
            'route' => 'about',
            'icon' => 'bi-info-circle',
            'is_active' => $currentPath === 'about' || $currentRoute === 'about'
        ],
        [
            'name' => 'Contact',
            'url' => url('/contact'),
            'route' => 'contact',
            'icon' => 'bi-telephone',
            'is_active' => $currentPath === 'contact' || $currentRoute === 'contact'
        ]
    ];
    
    // Cart count (temporary data)
    $cartCount = 3;
    $cartTotal = 24.50;
@endphp

<nav class="navbar navbar-expand-lg fixed-top" id="mainNavbar">
    <div class="container">
        <!-- Logo/Brand - KIRI -->
        <a class="navbar-brand" href="{{ url('/home') }}">
            <div class="d-flex align-items-center">
                <div class="logo-wrapper me-2">
                    <i class="bi bi-cup-hot-fill"></i>
                </div>
                <div>
                    <span class="brand-text">Cafein Holic</span>
                    <small class="brand-subtitle">Premium Coffee</small>
                </div>
            </div>
        </a>

        <!-- Mobile Toggle Button - KANAN -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarContent" aria-controls="navbarContent" 
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Content - TENGAH -->
        <div class="collapse navbar-collapse" id="navbarContent">
            <!-- Navigation Menu - TENGAH -->
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                @foreach($navItems as $item)
                <li class="nav-item">
                    <a class="nav-link {{ $item['is_active'] ? 'active' : '' }}" 
                       href="{{ $item['url'] }}"
                       title="{{ $item['name'] }}">
                        <i class="bi {{ $item['icon'] }} d-lg-none me-1"></i>
                        {{ $item['name'] }}
                        @if($item['is_active'])
                        <span class="visually-hidden">(current)</span>
                        @endif
                    </a>
                </li>
                @endforeach
            </ul>

            <!-- Action Buttons - KANAN -->
            <div class="navbar-actions d-flex align-items-center">
                <!-- Cart Icon -->
                <div class="nav-item dropdown me-3">
                    <a href="#" class="nav-link position-relative" 
                       data-bs-toggle="dropdown" aria-expanded="false"
                       title="Shopping Cart">
                        <i class="bi bi-cart3 fs-5"></i>
                        @if($cartCount > 0)
                        <span class="cart-badge">{{ $cartCount }}</span>
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-end cart-dropdown">
                        <div class="dropdown-header bg-light py-3 px-4">
                            <h6 class="mb-0 fw-bold">Your Cart</h6>
                            <small class="text-muted">{{ $cartCount }} items • ${{ number_format($cartTotal, 2) }}</small>
                        </div>
                        <div class="dropdown-body p-3">
                            <div class="cart-item d-flex align-items-center mb-3">
                                <div class="item-icon bg-brown text-white rounded-2 p-2 me-3">
                                    <i class="bi bi-cup-hot"></i>
                                </div>
                                <div class="item-details flex-grow-1">
                                    <h6 class="mb-0 fw-bold">Artisan Cold Brew</h6>
                                    <small class="text-muted d-block">Qty: 1 × $5.50</small>
                                </div>
                                <div class="item-price fw-bold text-brown">
                                    $5.50
                                </div>
                            </div>
                            <div class="cart-item d-flex align-items-center mb-3">
                                <div class="item-icon bg-brown text-white rounded-2 p-2 me-3">
                                    <i class="bi bi-cake2"></i>
                                </div>
                                <div class="item-details flex-grow-1">
                                    <h6 class="mb-0 fw-bold">Croissant</h6>
                                    <small class="text-muted d-block">Qty: 2 × $4.00</small>
                                </div>
                                <div class="item-price fw-bold text-brown">
                                    $8.00
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-footer p-3 border-top">
                            <div class="d-flex justify-content-between mb-3">
                                <span class="fw-bold">Total:</span>
                                <span class="fw-bold text-brown">${{ number_format($cartTotal, 2) }}</span>
                            </div>
                            <a href="{{ url('/order/form') }}" class="btn btn-brown w-100">
                                <i class="bi bi-cart-check me-2"></i> Checkout Now
                            </a>
                        </div>
                    </div>
                </div>

                <!-- User/Login -->
                @auth
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link d-flex align-items-center" 
                       data-bs-toggle="dropdown" aria-expanded="false"
                       title="My Account">
                        <div class="user-avatar me-2">
                            <i class="bi bi-person-circle fs-4"></i>
                        </div>
                        <span class="d-none d-lg-inline">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="{{ url('/admin/dashboard') }}">
                                <i class="bi bi-speedometer2 me-2"></i> Dashboard
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ url('/profile') }}">
                                <i class="bi bi-person me-2"></i> My Profile
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ url('/orders') }}">
                                <i class="bi bi-receipt me-2"></i> My Orders
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="dropdown-item p-0">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger w-100 text-start border-0 bg-transparent">
                                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
                @else
                <div class="d-flex gap-2">
                    <a href="{{ url('/login') }}" class="btn btn-outline-brown btn-sm">
                        <i class="bi bi-box-arrow-in-right me-1"></i> Login
                    </a>
                    <a href="{{ url('/order/form') }}" class="btn btn-brown btn-sm">
                        <i class="bi bi-cart3 me-1"></i> Order Now
                    </a>
                </div>
                @endauth
            </div>
        </div>
    </div>
</nav>

<style>
    /* ===== VARIABLES ===== */
    :root {
        --navbar-height: 70px;
        --navbar-bg: rgba(255, 251, 245, 0.98);
        --navbar-shadow: 0 2px 15px rgba(60, 42, 33, 0.08);
        --nav-link-color: #3C2A21;
        --nav-link-active: #B85C38;
        --nav-link-hover: #5C3D2E;
        --transition: all 0.3s ease;
    }

    /* ===== NAVBAR BASE ===== */
    #mainNavbar {
        height: var(--navbar-height);
        background: var(--navbar-bg);
        backdrop-filter: blur(10px);
        border-bottom: 1px solid rgba(224, 192, 151, 0.2);
        box-shadow: var(--navbar-shadow);
        transition: var(--transition);
        padding: 0;
        z-index: 1030;
    }

    body {
        padding-top: var(--navbar-height);
    }

    /* ===== LOGO/BRAND ===== */
    .navbar-brand {
        padding: 0;
        text-decoration: none;
    }

    .logo-wrapper {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, #5C3D2E, #B85C38);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.2rem;
        transition: var(--transition);
    }

    .navbar-brand:hover .logo-wrapper {
        transform: rotate(15deg);
    }

    .brand-text {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--nav-link-color);
        display: block;
        line-height: 1.2;
    }

    .brand-subtitle {
        font-size: 0.75rem;
        color: var(--nav-link-active);
        display: block;
        line-height: 1;
        margin-top: -2px;
        font-weight: 500;
    }

    /* ===== NAVIGATION LINKS ===== */
    .navbar-nav {
        gap: 5px;
    }

    .nav-link {
        color: var(--nav-link-color) !important;
        font-weight: 500;
        font-size: 0.95rem;
        padding: 8px 16px !important;
        border-radius: 8px;
        margin: 0 2px;
        transition: var(--transition);
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 80px;
    }

    .nav-link:hover {
        color: var(--nav-link-hover) !important;
        background: rgba(92, 61, 46, 0.05);
        transform: translateY(-1px);
    }

    .nav-link.active {
        color: var(--nav-link-active) !important;
        font-weight: 600;
        background: rgba(184, 92, 56, 0.08);
    }

    .nav-link.active::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 50%;
        transform: translateX(-50%);
        width: 5px;
        height: 5px;
        background: var(--nav-link-active);
        border-radius: 50%;
    }

    /* ===== CART ===== */
    .cart-badge {
        position: absolute;
        top: -5px;
        right: -5px;
        background: var(--nav-link-active);
        color: white;
        font-size: 0.7rem;
        min-width: 18px;
        height: 18px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0 4px;
        font-weight: 600;
        animation: badgePulse 2s infinite;
    }

    @keyframes badgePulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.1); }
    }

    .cart-dropdown {
        min-width: 320px;
        border: 1px solid rgba(224, 192, 151, 0.3);
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(60, 42, 33, 0.1);
        margin-top: 10px;
    }

    .cart-item {
        transition: var(--transition);
    }

    .cart-item:hover {
        background: rgba(247, 243, 233, 0.5);
        border-radius: 8px;
        padding: 5px;
        margin-left: -5px;
        margin-right: -5px;
    }

    /* ===== USER AVATAR ===== */
    .user-avatar {
        color: var(--nav-link-color);
        transition: var(--transition);
    }

    .nav-link:hover .user-avatar {
        color: var(--nav-link-hover);
    }

    /* ===== BUTTONS ===== */
    .btn-brown, .btn-outline-brown {
        padding: 8px 16px;
        font-size: 0.9rem;
        border-radius: 8px;
        font-weight: 500;
        transition: var(--transition);
    }

    .btn-brown {
        background: linear-gradient(135deg, #5C3D2E, #B85C38);
        border: none;
        color: white;
    }

    .btn-brown:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(92, 61, 46, 0.2);
        color: white;
    }

    .btn-outline-brown {
        border: 2px solid #5C3D2E;
        color: #5C3D2E;
        background: transparent;
    }

    .btn-outline-brown:hover {
        background: #5C3D2E;
        color: white;
        transform: translateY(-2px);
    }

    /* ===== DROPDOWN MENUS ===== */
    .dropdown-menu {
        border: 1px solid rgba(224, 192, 151, 0.3);
        border-radius: 12px;
        padding: 8px 0;
        margin-top: 10px;
        animation: slideDown 0.2s ease;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .dropdown-item {
        padding: 10px 20px;
        font-size: 0.9rem;
        border-radius: 6px;
        margin: 2px 8px;
        color: var(--nav-link-color);
        transition: var(--transition);
        display: flex;
        align-items: center;
    }

    .dropdown-item:hover {
        background: rgba(247, 243, 233, 0.8);
        color: var(--nav-link-hover);
    }

    /* ===== MOBILE RESPONSIVE ===== */
    @media (max-width: 991.98px) {
        #mainNavbar {
            padding: 0 15px;
        }

        .navbar-collapse {
            background: white;
            padding: 20px;
            border-radius: 0 0 15px 15px;
            box-shadow: 0 10px 25px rgba(60, 42, 33, 0.1);
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            z-index: 1000;
        }

        .navbar-nav {
            margin-bottom: 20px;
            gap: 10px;
        }

        .nav-link {
            padding: 12px 20px !important;
            margin: 5px 0;
            justify-content: flex-start;
            border-radius: 10px;
        }

        .nav-link i {
            width: 20px;
            margin-right: 10px;
        }

        .navbar-actions {
            padding-top: 20px;
            border-top: 1px solid rgba(224, 192, 151, 0.2);
            flex-direction: column;
            gap: 15px;
            width: 100%;
        }

        .cart-dropdown {
            position: fixed !important;
            top: 50% !important;
            left: 50% !important;
            transform: translate(-50%, -50%) !important;
            width: 90%;
            max-width: 350px;
        }
    }

    /* ===== DESKTOP ENHANCEMENTS ===== */
    @media (min-width: 992px) {
        .nav-link {
            position: relative;
            overflow: hidden;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 2px;
            background: var(--nav-link-active);
            border-radius: 2px;
            transition: var(--transition);
        }

        .nav-link:hover::before {
            width: 20px;
        }

        .nav-link.active::before {
            width: 20px;
        }

        .nav-link.active::after {
            display: none;
        }

        /* Dropdown hover for desktop */
        .dropdown:hover .dropdown-menu {
            display: block;
            margin-top: 0;
        }
    }

    /* ===== ANIMATIONS ===== */
    .nav-item {
        opacity: 0;
        transform: translateY(-10px);
        animation: navItemFadeIn 0.5s ease forwards;
    }

    @keyframes navItemFadeIn {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Stagger animation */
    .nav-item:nth-child(1) { animation-delay: 0.1s; }
    .nav-item:nth-child(2) { animation-delay: 0.15s; }
    .nav-item:nth-child(3) { animation-delay: 0.2s; }
    .nav-item:nth-child(4) { animation-delay: 0.25s; }
    .nav-item:nth-child(5) { animation-delay: 0.3s; }
    .nav-item:nth-child(6) { animation-delay: 0.35s; }

    /* ===== SCROLL EFFECTS ===== */
    #mainNavbar.scrolled {
        height: 60px;
        box-shadow: 0 5px 20px rgba(60, 42, 33, 0.12);
    }

    .scrolled .logo-wrapper {
        width: 35px;
        height: 35px;
        font-size: 1rem;
    }

    .scrolled .brand-text {
        font-size: 1.2rem;
    }

    /* ===== ACCESSIBILITY ===== */
    .nav-link:focus,
    .btn:focus,
    [data-bs-toggle="dropdown"]:focus {
        outline: 2px solid var(--nav-link-active);
        outline-offset: 2px;
        box-shadow: 0 0 0 3px rgba(184, 92, 56, 0.1);
    }

    /* ===== DARK MODE SUPPORT ===== */
    @media (prefers-color-scheme: dark) {
        #mainNavbar {
            background: rgba(30, 25, 20, 0.98);
            border-bottom-color: rgba(92, 61, 46, 0.3);
        }

        .nav-link,
        .brand-text,
        .user-avatar {
            color: #F7F3E9 !important;
        }

        .navbar-collapse {
            background: #3C2A21;
        }

        .dropdown-menu {
            background: #3C2A21;
            border-color: #5C3D2E;
        }

        .dropdown-item {
            color: #F7F3E9;
        }

        .dropdown-item:hover {
            background: #5C3D2E;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navbar = document.getElementById('mainNavbar');
        const navbarCollapse = document.getElementById('navbarContent');
        const navbarToggler = document.querySelector('.navbar-toggler');
        
        // Scroll effect
        window.addEventListener('scroll', function() {
            if (window.scrollY > 20) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
            
            // Close mobile menu on scroll
            if (window.innerWidth < 992 && navbarCollapse.classList.contains('show')) {
                navbarCollapse.classList.remove('show');
                navbarToggler.setAttribute('aria-expanded', 'false');
            }
        });
        
        // Mobile menu handling
        if (navbarToggler && navbarCollapse) {
            navbarToggler.addEventListener('click', function() {
                const isExpanded = this.getAttribute('aria-expanded') === 'true';
                
                if (!isExpanded) {
                    // Animate nav items in
                    const navItems = document.querySelectorAll('.nav-item');
                    navItems.forEach((item, index) => {
                        item.style.animationDelay = (index * 0.05) + 's';
                        item.style.animation = 'navItemFadeIn 0.3s ease forwards';
                    });
                }
            });
            
            // Close menu when clicking a link
            document.querySelectorAll('.nav-link').forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth < 992) {
                        navbarCollapse.classList.remove('show');
                        navbarToggler.setAttribute('aria-expanded', 'false');
                    }
                });
            });
        }
        
        // Close dropdowns when clicking outside
        document.addEventListener('click', function(event) {
            if (!event.target.closest('.dropdown')) {
                document.querySelectorAll('.dropdown-menu').forEach(menu => {
                    menu.classList.remove('show');
                });
            }
        });
        
        // Cart badge animation
        const cartBadge = document.querySelector('.cart-badge');
        if (cartBadge) {
            setInterval(() => {
                cartBadge.style.animation = 'none';
                setTimeout(() => {
                    cartBadge.style.animation = 'badgePulse 2s infinite';
                }, 10);
            }, 4000);
        }
        
        // Initialize navbar
        setTimeout(() => {
            navbar.style.opacity = '1';
        }, 100);
        
        // Handle window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 992 && navbarCollapse.classList.contains('show')) {
                navbarCollapse.classList.remove('show');
                if (navbarToggler) {
                    navbarToggler.setAttribute('aria-expanded', 'false');
                }
            }
        });
        
        // Active link highlighting
        function updateActiveLinks() {
            const currentPath = window.location.pathname;
            document.querySelectorAll('.nav-link').forEach(link => {
                link.classList.remove('active');
                const href = link.getAttribute('href');
                if (href && currentPath.includes(href.replace(/.*\/\/[^\/]+/, ''))) {
                    link.classList.add('active');
                }
            });
        }
        
        updateActiveLinks();
    });
</script>