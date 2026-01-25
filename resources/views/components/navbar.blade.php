@php
    // Current route untuk active state
    $currentRoute = request()->route()->getName() ?? '';
    
    // Navigation items dengan icon dan URL
    $navItems = [
        'home' => [
            'name' => 'Home',
            'url' => url('/home'),
            'icon' => 'bi-house',
            'order' => 1
        ],
        'menu' => [
            'name' => 'Menu',
            'url' => url('/menu'),
            'icon' => 'bi-cup-hot',
            'order' => 2
        ],
        'order.form' => [
            'name' => 'Order',
            'url' => url('/order/form'),
            'icon' => 'bi-cart3',
            'order' => 3
        ],
        'reservation' => [
            'name' => 'Reservation',
            'url' => url('/reservation'),
            'icon' => 'bi-calendar-check',
            'order' => 4
        ],
        'about' => [
            'name' => 'About',
            'url' => url('/about'),
            'icon' => 'bi-info-circle',
            'order' => 5
        ],
        'contact' => [
            'name' => 'Contact',
            'url' => url('/contact'),
            'icon' => 'bi-telephone',
            'order' => 6
        ]
    ];
    
    // Sort by order
    uasort($navItems, function($a, $b) {
        return $a['order'] <=> $b['order'];
    });
    
    // Cart items count (simulated)
    $cartCount = 3;
@endphp

<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNavbar">
    <div class="container">
        <!-- Logo / Brand -->
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
            <div class="d-flex align-items-center">
                <div class="logo-icon me-2">
                    <i class="bi bi-cup-hot-fill"></i>
                </div>
                <div>
                    <span class="brand-name">Cafein Holic</span>
                    <small class="brand-subtitle d-none d-md-block">Premium Coffee</small>
                </div>
            </div>
        </a>

        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarContent" aria-controls="navbarContent" 
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Content -->
        <div class="collapse navbar-collapse" id="navbarContent">
            <!-- Navigation Menu -->
            <ul class="navbar-nav mx-auto">
                @foreach($navItems as $key => $item)
                    @php
                        $isActive = request()->is($key) || 
                                    request()->is($key . '/*') || 
                                    $currentRoute === $key ||
                                    (isset($activePage) && $activePage === $key);
                    @endphp
                    <li class="nav-item mx-1">
                        <a class="nav-link px-3 py-2 rounded {{ $isActive ? 'active' : '' }}" 
                           href="{{ $item['url'] }}"
                           data-nav="{{ $key }}">
                            <i class="bi {{ $item['icon'] }} d-lg-none d-xl-inline me-1"></i>
                            <span>{{ $item['name'] }}</span>
                            @if($isActive)
                                <span class="visually-hidden">(current)</span>
                            @endif
                        </a>
                    </li>
                @endforeach
            </ul>

            <!-- Action Buttons -->
            <div class="navbar-actions d-flex align-items-center">
                <!-- Cart with Dropdown -->
                <div class="nav-cart dropdown me-3">
                    <a href="#" class="nav-link-cart position-relative" 
                       data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-cart3 fs-5"></i>
                        @if($cartCount > 0)
                        <span class="cart-badge">{{ $cartCount }}</span>
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-end cart-dropdown">
                        <div class="cart-header p-3">
                            <h6 class="mb-0 fw-bold">Your Cart</h6>
                            <small class="text-muted">{{ $cartCount }} items - $24.50</small>
                        </div>
                        <div class="cart-items p-3">
                            <!-- Cart item example -->
                            <div class="cart-item d-flex align-items-center mb-3">
                                <div class="item-icon me-3">
                                    <div class="bg-brown-light rounded-2 p-2">
                                        <i class="bi bi-cup-hot text-white"></i>
                                    </div>
                                </div>
                                <div class="item-details flex-grow-1">
                                    <h6 class="mb-0">Artisan Cold Brew</h6>
                                    <small class="text-muted">Qty: 1 • $5.50</small>
                                </div>
                            </div>
                        </div>
                        <div class="cart-footer p-3 border-top">
                            <a href="{{ url('/order/form') }}" class="btn btn-brown w-100">
                                <i class="bi bi-cart-check me-2"></i> Checkout
                            </a>
                        </div>
                    </div>
                </div>

                <!-- User / Login -->
                @auth
                    <div class="nav-user dropdown">
                        <a href="#" class="d-flex align-items-center text-decoration-none" 
                           data-bs-toggle="dropdown">
                            <div class="user-avatar me-2">
                                <div class="avatar-circle">
                                    <i class="bi bi-person-fill"></i>
                                </div>
                            </div>
                            <span class="user-name d-none d-lg-inline">Hi, {{ auth()->user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ url('/admin/dashboard') }}">
                                <i class="bi bi-speedometer2 me-2"></i> Dashboard</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <div class="d-flex gap-2">
                        <a href="{{ route('login') }}" class="btn btn-outline-brown btn-sm">
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
    /* === NAVBAR STYLES === */
    :root {
        --navbar-height: 70px;
        --transition-speed: 0.3s;
    }
    
    /* Base Navbar */
    #mainNavbar {
        height: var(--navbar-height);
        background: rgba(255, 251, 245, 0.98);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border-bottom: 1px solid rgba(224, 192, 151, 0.2);
        box-shadow: 0 2px 15px rgba(60, 42, 33, 0.08);
        transition: all var(--transition-speed) ease;
        padding: 0;
    }
    
    #mainNavbar.scrolled {
        height: 60px;
        box-shadow: 0 5px 20px rgba(60, 42, 33, 0.12);
    }
    
    /* Logo/Brand */
    .navbar-brand {
        padding: 0;
        color: var(--brown-dark) !important;
    }
    
    .logo-icon {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, var(--brown), var(--brown-light));
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.3rem;
    }
    
    .brand-name {
        font-size: 1.4rem;
        font-weight: 700;
        letter-spacing: -0.5px;
    }
    
    .brand-subtitle {
        font-size: 0.75rem;
        color: var(--brown-light);
        display: block;
        line-height: 1;
        margin-top: -2px;
    }
    
    /* Navigation Links */
    .navbar-nav {
        gap: 2px;
    }
    
    .nav-link {
        color: var(--brown-dark) !important;
        font-weight: 500;
        font-size: 0.95rem;
        position: relative;
        transition: all var(--transition-speed) ease;
        border-radius: 8px;
        margin: 0 2px;
    }
    
    .nav-link:hover {
        color: var(--brown-light) !important;
        background: rgba(92, 61, 46, 0.05);
        transform: translateY(-1px);
    }
    
    .nav-link.active {
        color: var(--brown-light) !important;
        font-weight: 600;
        background: rgba(92, 61, 46, 0.08);
    }
    
    .nav-link.active::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 50%;
        transform: translateX(-50%);
        width: 5px;
        height: 5px;
        background: var(--brown-light);
        border-radius: 50%;
    }
    
    /* Cart */
    .nav-cart {
        position: relative;
    }
    
    .nav-link-cart {
        color: var(--brown-dark) !important;
        padding: 8px !important;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all var(--transition-speed) ease;
    }
    
    .nav-link-cart:hover {
        background: rgba(92, 61, 46, 0.05);
        color: var(--brown-light) !important;
    }
    
    .cart-badge {
        position: absolute;
        top: -5px;
        right: -5px;
        background: var(--brown-light);
        color: white;
        font-size: 0.7rem;
        min-width: 18px;
        height: 18px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0 4px;
        animation: badgePulse 2s infinite;
    }
    
    @keyframes badgePulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.1); }
    }
    
    .cart-dropdown {
        min-width: 280px;
        border: 1px solid rgba(224, 192, 151, 0.3);
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(60, 42, 33, 0.1);
        margin-top: 10px;
    }
    
    /* User Avatar */
    .user-avatar {
        display: flex;
        align-items: center;
    }
    
    .avatar-circle {
        width: 36px;
        height: 36px;
        background: var(--cream);
        border: 2px solid var(--beige);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--brown);
        font-size: 1rem;
        transition: all var(--transition-speed) ease;
    }
    
    .user-name {
        font-weight: 500;
        color: var(--brown-dark);
    }
    
    /* Action Buttons */
    .btn-brown, .btn-outline-brown {
        padding: 8px 16px;
        font-size: 0.9rem;
        border-radius: 8px;
    }
    
    /* Dropdown Menu */
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
        color: var(--brown-dark);
        transition: all 0.2s ease;
    }
    
    .dropdown-item:hover {
        background: var(--cream);
        color: var(--brown);
    }
    
    /* === RESPONSIVE STYLES === */
    
    /* Tablet (768px - 991px) */
    @media (max-width: 991.98px) {
        .navbar-nav {
            margin: 20px 0;
            gap: 5px;
        }
        
        .nav-link {
            padding: 12px 20px !important;
            margin: 5px 0;
            border-radius: 10px;
        }
        
        .navbar-actions {
            padding-top: 20px;
            border-top: 1px solid rgba(224, 192, 151, 0.2);
            margin-top: 20px;
            width: 100%;
            justify-content: center;
        }
        
        .navbar-collapse {
            background: white;
            padding: 20px;
            border-radius: 0 0 20px 20px;
            box-shadow: 0 10px 30px rgba(60, 42, 33, 0.1);
            position: absolute;
            top: var(--navbar-height);
            left: 0;
            right: 0;
            z-index: 1000;
        }
    }
    
    /* Mobile (≤ 767px) */
    @media (max-width: 767.98px) {
        #mainNavbar {
            padding: 0 10px;
        }
        
        .navbar-brand {
            font-size: 1.2rem;
        }
        
        .logo-icon {
            width: 35px;
            height: 35px;
            font-size: 1.1rem;
        }
        
        .nav-link {
            font-size: 1rem;
            padding: 14px 20px !important;
        }
        
        .navbar-actions {
            flex-direction: column;
            gap: 15px;
        }
        
        .nav-cart {
            margin-bottom: 10px;
        }
        
        .btn-brown, .btn-outline-brown {
            width: 100%;
            justify-content: center;
        }
    }
    
    /* Small Mobile (≤ 375px) */
    @media (max-width: 375px) {
        .brand-name {
            font-size: 1.2rem;
        }
        
        .logo-icon {
            width: 30px;
            height: 30px;
            font-size: 1rem;
        }
        
        .nav-link {
            font-size: 0.95rem;
            padding: 12px 16px !important;
        }
    }
    
    /* Dark Mode Support */
    @media (prefers-color-scheme: dark) {
        #mainNavbar {
            background: rgba(30, 25, 20, 0.98);
            border-bottom-color: rgba(92, 61, 46, 0.3);
        }
        
        .nav-link, .navbar-brand, .user-name, .nav-link-cart {
            color: var(--cream) !important;
        }
        
        .avatar-circle {
            background: var(--brown);
            border-color: var(--brown-light);
            color: var(--cream);
        }
        
        .navbar-collapse {
            background: var(--brown-dark);
        }
        
        .dropdown-menu {
            background: var(--brown-dark);
            border-color: var(--brown);
        }
        
        .dropdown-item {
            color: var(--cream);
        }
        
        .dropdown-item:hover {
            background: var(--brown);
        }
    }
    
    /* Animation for navbar items */
    .nav-item {
        opacity: 0;
        animation: fadeInNav 0.5s ease forwards;
    }
    
    @keyframes fadeInNav {
        to {
            opacity: 1;
        }
    }
    
    /* Stagger delay */
    .nav-item:nth-child(1) { animation-delay: 0.1s; }
    .nav-item:nth-child(2) { animation-delay: 0.15s; }
    .nav-item:nth-child(3) { animation-delay: 0.2s; }
    .nav-item:nth-child(4) { animation-delay: 0.25s; }
    .nav-item:nth-child(5) { animation-delay: 0.3s; }
    .nav-item:nth-child(6) { animation-delay: 0.35s; }
    
    /* Hover effects for desktop */
    @media (min-width: 992px) {
        .nav-link::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 2px;
            background: var(--brown-light);
            border-radius: 2px;
            transition: width var(--transition-speed) ease;
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
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navbar = document.getElementById('mainNavbar');
        let lastScrollTop = 0;
        
        // Scroll effect - hide/show navbar
        window.addEventListener('scroll', function() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            // Add scrolled class
            if (scrollTop > 20) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
            
            // Hide on scroll down, show on scroll up
            if (scrollTop > lastScrollTop && scrollTop > 100) {
                // Scrolling down
                navbar.style.transform = 'translateY(-100%)';
            } else {
                // Scrolling up
                navbar.style.transform = 'translateY(0)';
            }
            
            lastScrollTop = scrollTop;
            
            // Update active nav link
            updateActiveNavLink();
        });
        
        // Update active nav link based on scroll position
        function updateActiveNavLink() {
            const sections = document.querySelectorAll('section[id], main[id], div[id]');
            const navLinks = document.querySelectorAll('.nav-link[data-nav]');
            const scrollPosition = window.scrollY + 100;
            
            let currentSection = '';
            
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                
                if (scrollPosition >= sectionTop && 
                    scrollPosition < sectionTop + sectionHeight) {
                    currentSection = section.getAttribute('id');
                }
            });
            
            navLinks.forEach(link => {
                link.classList.remove('active');
                const navKey = link.getAttribute('data-nav');
                
                // Check if current section matches nav key
                if (currentSection && currentSection.includes(navKey)) {
                    link.classList.add('active');
                }
            });
        }
        
        // Mobile menu handling
        const navbarToggler = document.querySelector('.navbar-toggler');
        const navbarCollapse = document.querySelector('.navbar-collapse');
        
        if (navbarToggler && navbarCollapse) {
            navbarToggler.addEventListener('click', function() {
                const isExpanded = this.getAttribute('aria-expanded') === 'true';
                
                if (!isExpanded) {
                    // Animate in nav items
                    const navItems = document.querySelectorAll('.nav-item');
                    navItems.forEach((item, index) => {
                        item.style.animationDelay = (index * 0.05) + 's';
                        item.style.animation = 'fadeInNav 0.3s ease forwards';
                    });
                }
            });
            
            // Close mobile menu when clicking a link
            document.querySelectorAll('.nav-link').forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth < 992) {
                        navbarCollapse.classList.remove('show');
                        navbarToggler.setAttribute('aria-expanded', 'false');
                    }
                });
            });
        }
        
        // Initialize active link
        updateActiveNavLink();
        
        // Add hover effect for dropdowns on desktop
        if (window.innerWidth >= 992) {
            const dropdowns = document.querySelectorAll('.dropdown');
            
            dropdowns.forEach(dropdown => {
                dropdown.addEventListener('mouseenter', function() {
                    const toggle = this.querySelector('[data-bs-toggle="dropdown"]');
                    if (toggle) {
                        const bsDropdown = bootstrap.Dropdown.getInstance(toggle) || 
                                          new bootstrap.Dropdown(toggle);
                        bsDropdown.show();
                    }
                });
                
                dropdown.addEventListener('mouseleave', function() {
                    const toggle = this.querySelector('[data-bs-toggle="dropdown"]');
                    if (toggle) {
                        const bsDropdown = bootstrap.Dropdown.getInstance(toggle);
                        if (bsDropdown) {
                            setTimeout(() => {
                                if (!this.matches(':hover')) {
                                    bsDropdown.hide();
                                }
                            }, 100);
                        }
                    }
                });
            });
        }
        
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
        
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                
                if (href !== '#' && href.startsWith('#') && document.querySelector(href)) {
                    e.preventDefault();
                    
                    const target = document.querySelector(href);
                    const navbarHeight = navbar.offsetHeight;
                    const targetPosition = target.offsetTop - navbarHeight;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
        
        // Handle window resize
        let resizeTimer;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                if (window.innerWidth >= 992) {
                    // Ensure mobile menu is closed on desktop
                    if (navbarCollapse) {
                        navbarCollapse.classList.remove('show');
                    }
                    if (navbarToggler) {
                        navbarToggler.setAttribute('aria-expanded', 'false');
                    }
                }
            }, 250);
        });
        
        // Initialize navbar animation
        setTimeout(() => {
            navbar.style.opacity = '1';
        }, 100);
    });
</script>