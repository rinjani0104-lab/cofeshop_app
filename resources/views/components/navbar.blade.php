@php
    // Get current route for active state
    $currentRoute = request()->route()->getName();
    
    // Navigation items
    $navItems = [
        'home' => [
            'name' => 'Home',
            'url' => url('/home'),
            'icon' => 'bi-house'
        ],
        'menu' => [
            'name' => 'Menu',
            'url' => url('/menu'),
            'icon' => 'bi-menu-button-wide'
        ],
        'order' => [
            'name' => 'Order Online',
            'url' => url('/order/form'),
            'icon' => 'bi-cart3'
        ],
        'reservation' => [
            'name' => 'Reservation',
            'url' => url('/reservation'),
            'icon' => 'bi-calendar-check'
        ],
        'about' => [
            'name' => 'About Us',
            'url' => url('/about'),
            'icon' => 'bi-info-circle'
        ],
        'contact' => [
            'name' => 'Contact',
            'url' => url('/contact'),
            'icon' => 'bi-telephone'
        ]
    ];
@endphp

<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-white shadow-sm py-3" id="mainNavbar">
    <div class="container">
        <!-- Logo/Brand -->
        <a class="navbar-brand fw-bold fs-3 text-brown-dark" href="{{ url('/') }}">
            <i class="bi bi-cup-hot-fill me-2 text-brown"></i>Cafein Holic
        </a>

        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
            <span class="visually-hidden">Toggle navigation</span>
        </button>

        <!-- Navigation Items -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @foreach($navItems as $key => $item)
                    @php
                        $isActive = request()->is($key) || request()->is($key . '/*') || 
                                    (isset($activePage) && $activePage === $key) ||
                                    ($currentRoute === $key);
                    @endphp
                    <li class="nav-item" data-nav-item="{{ $key }}">
                        <a class="nav-link {{ $isActive ? 'active' : '' }}" 
                           href="{{ $item['url'] }}"
                           data-nav-link="{{ $key }}">
                            @if(isset($item['icon']))
                                <i class="bi {{ $item['icon'] }} d-lg-none d-xl-inline me-2"></i>
                            @endif
                            {{ $item['name'] }}
                            @if($isActive)
                                <span class="visually-hidden">(current)</span>
                            @endif
                        </a>
                    </li>
                @endforeach
            </ul>

            <!-- Action Buttons -->
            <div class="d-flex ms-lg-4 mt-3 mt-lg-0">
                <!-- Cart Icon with Badge -->
                <div class="dropdown me-3">
                    <a href="#" class="position-relative text-brown-dark" 
                       data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-cart3 fs-5"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-brown-light">
                            3
                            <span class="visually-hidden">items in cart</span>
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0" 
                        style="min-width: 300px;">
                        <li class="dropdown-header bg-cream py-3">
                            <h6 class="mb-0 fw-bold">Your Cart</h6>
                            <small>3 items - $24.50</small>
                        </li>
                        <li>
                            <div class="dropdown-item-text">
                                <div class="d-flex align-items-center py-2">
                                    <div class="flex-shrink-0">
                                        <div class="bg-brown-light text-white rounded-2 p-2">
                                            <i class="bi bi-cup-hot"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-0">Artisan Cold Brew</h6>
                                        <small class="text-muted">Qty: 1</small>
                                    </div>
                                    <div class="text-end">
                                        <span class="fw-bold">$5.50</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <div class="px-3 py-2">
                                <a href="{{ url('/order/form') }}" class="btn btn-brown w-100 rounded-pill">
                                    <i class="bi bi-cart-check me-2"></i> Checkout
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- User Account / Login -->
                @if(auth()->check())
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" 
                           data-bs-toggle="dropdown">
                            <div class="avatar me-2">
                                <div class="bg-brown text-cream rounded-circle d-flex align-items-center justify-content-center" 
                                     style="width: 36px; height: 36px;">
                                    <i class="bi bi-person-fill"></i>
                                </div>
                            </div>
                            <span class="d-none d-md-inline">Welcome, {{ auth()->user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                            <li>
                                <a class="dropdown-item" href="{{ url('/admin/dashboard') }}">
                                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('profile') }}">
                                    <i class="bi bi-person me-2"></i> My Profile
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('orders') }}">
                                    <i class="bi bi-receipt me-2"></i> My Orders
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}" class="dropdown-item p-0">
                                    @csrf
                                    <button type="submit" class="btn btn-link text-decoration-none text-danger w-100 text-start">
                                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-brown rounded-pill px-4 me-2">
                        <i class="bi bi-box-arrow-in-right me-1"></i> Login
                    </a>
                    <a href="{{ url('/order/form') }}" class="btn btn-brown rounded-pill px-4">
                        <i class="bi bi-cart3 me-1"></i> Order Now
                    </a>
                @endif
            </div>
        </div>
    </div>

    <!-- Progress Bar Indicator -->
    <div class="nav-progress" id="navProgress"></div>
</nav>

<!-- Mobile Menu Overlay -->
<div class="mobile-menu-overlay" id="mobileMenuOverlay"></div>

<style>
    /* Navbar Specific Styles */
    #mainNavbar {
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
        background-color: rgba(255, 251, 245, 0.95) !important;
        z-index: 1030;
    }

    #mainNavbar.scrolled {
        box-shadow: 0 5px 20px rgba(60, 42, 33, 0.1);
        padding-top: 0.8rem;
        padding-bottom: 0.8rem;
        background-color: rgba(255, 251, 245, 0.98) !important;
    }

    /* Navigation Links */
    .navbar-nav .nav-link {
        color: var(--brown-dark) !important;
        font-weight: 500;
        margin: 0 0.5rem;
        position: relative;
        padding: 0.5rem 1rem !important;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .navbar-nav .nav-link:hover {
        color: var(--brown-light) !important;
        background-color: rgba(92, 61, 46, 0.05);
    }

    .navbar-nav .nav-link.active {
        color: var(--brown-light) !important;
        font-weight: 600;
    }

    .navbar-nav .nav-link.active::before {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 20px;
        height: 3px;
        background: var(--brown-light);
        border-radius: 2px;
        transition: all 0.3s ease;
    }

    /* Progress Bar */
    .nav-progress {
        position: absolute;
        bottom: 0;
        left: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--brown-light), var(--beige));
        width: 0%;
        transition: width 0.3s ease;
        z-index: 1031;
    }

    /* Cart Badge */
    .badge.bg-brown-light {
        font-size: 0.6rem;
        padding: 0.25rem 0.4rem;
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% {
            box-shadow: 0 0 0 0 rgba(184, 92, 56, 0.7);
        }
        70% {
            box-shadow: 0 0 0 5px rgba(184, 92, 56, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(184, 92, 56, 0);
        }
    }

    /* Dropdown Styles */
    .dropdown-menu {
        border-radius: 15px;
        border: 1px solid var(--cream);
        margin-top: 10px;
        animation: slideDown 0.3s ease;
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
        padding: 0.75rem 1.25rem;
        transition: all 0.2s ease;
        border-radius: 8px;
        margin: 0.1rem 0.5rem;
        width: auto;
    }

    .dropdown-item:hover {
        background-color: var(--cream);
        color: var(--brown-dark);
    }

    /* Mobile Menu */
    .mobile-menu-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(60, 42, 33, 0.5);
        backdrop-filter: blur(5px);
        z-index: 1029;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
    }

    .mobile-menu-overlay.show {
        opacity: 1;
        visibility: visible;
    }

    /* Mobile Navbar Collapse */
    @media (max-width: 991.98px) {
        #navbarNav {
            position: fixed;
            top: 0;
            right: -100%;
            width: 80%;
            max-width: 320px;
            height: 100vh;
            background: white;
            padding: 80px 20px 20px;
            box-shadow: -5px 0 15px rgba(0, 0, 0, 0.1);
            transition: right 0.3s ease;
            z-index: 1030;
            overflow-y: auto;
        }

        #navbarNav.show {
            right: 0;
        }

        .navbar-nav {
            margin-bottom: 2rem;
        }

        .navbar-nav .nav-link {
            margin: 0.5rem 0;
            padding: 1rem !important;
            border-radius: 10px;
            display: flex;
            align-items: center;
        }

        .navbar-nav .nav-link i {
            width: 24px;
            margin-right: 10px;
        }

        .mobile-menu-overlay.show + #navbarNav {
            right: 0;
        }

        /* Mobile Cart & Actions */
        .d-flex.ms-lg-4 {
            flex-direction: column;
            gap: 1rem;
            padding-top: 1rem;
            border-top: 1px solid var(--cream);
        }

        .dropdown-menu {
            position: fixed !important;
            top: 50% !important;
            left: 50% !important;
            transform: translate(-50%, -50%) !important;
            width: 90%;
            max-width: 350px;
        }
    }

    /* Desktop Enhancements */
    @media (min-width: 992px) {
        .navbar-nav .nav-link {
            position: relative;
            overflow: hidden;
        }

        .navbar-nav .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background: var(--brown-light);
            left: 50%;
            bottom: 0;
            transform: translateX(-50%);
            transition: width 0.3s ease;
        }

        .navbar-nav .nav-link:hover::after {
            width: 80%;
        }

        .navbar-nav .nav-link.active::after {
            width: 80%;
        }
    }

    /* Animation for navbar items */
    .nav-item {
        opacity: 0;
        transform: translateY(-10px);
        animation: fadeInDown 0.5s ease forwards;
    }

    @keyframes fadeInDown {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Stagger animation for nav items */
    .nav-item:nth-child(1) { animation-delay: 0.1s; }
    .nav-item:nth-child(2) { animation-delay: 0.2s; }
    .nav-item:nth-child(3) { animation-delay: 0.3s; }
    .nav-item:nth-child(4) { animation-delay: 0.4s; }
    .nav-item:nth-child(5) { animation-delay: 0.5s; }
    .nav-item:nth-child(6) { animation-delay: 0.6s; }

    /* Focus styles for accessibility */
    .nav-link:focus,
    .dropdown-toggle:focus,
    .btn:focus {
        outline: 2px solid var(--brown-light);
        outline-offset: 2px;
        box-shadow: 0 0 0 3px rgba(92, 61, 46, 0.1);
    }

    /* Dark mode support */
    @media (prefers-color-scheme: dark) {
        #mainNavbar {
            background-color: rgba(30, 25, 20, 0.95) !important;
            color: var(--cream);
        }
        
        #mainNavbar.scrolled {
            background-color: rgba(30, 25, 20, 0.98) !important;
        }
        
        .navbar-nav .nav-link {
            color: var(--cream) !important;
        }
        
        .dropdown-menu {
            background-color: var(--brown-dark);
            border-color: var(--brown);
        }
        
        .dropdown-item {
            color: var(--cream);
        }
        
        .dropdown-item:hover {
            background-color: var(--brown);
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navbar = document.getElementById('mainNavbar');
        const navProgress = document.getElementById('navProgress');
        const mobileOverlay = document.getElementById('mobileMenuOverlay');
        const navToggler = document.querySelector('.navbar-toggler');
        const navbarCollapse = document.getElementById('navbarNav');
        
        // Scroll effect with progress indicator
        let lastScrollTop = 0;
        
        window.addEventListener('scroll', function() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            const docHeight = document.documentElement.scrollHeight - window.innerHeight;
            const scrollPercent = (scrollTop / docHeight) * 100;
            
            // Navbar background on scroll
            if (scrollTop > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
            
            // Hide/show navbar on scroll direction
            if (scrollTop > lastScrollTop && scrollTop > 100) {
                // Scrolling down
                navbar.style.transform = 'translateY(-100%)';
            } else {
                // Scrolling up
                navbar.style.transform = 'translateY(0)';
            }
            
            lastScrollTop = scrollTop;
            
            // Update progress bar
            if (navProgress) {
                navProgress.style.width = scrollPercent + '%';
            }
            
            // Highlight active section
            highlightActiveNavLink();
        });
        
        // Mobile menu handling
        if (navToggler && navbarCollapse && mobileOverlay) {
            navToggler.addEventListener('click', function() {
                const isExpanded = this.getAttribute('aria-expanded') === 'true';
                
                if (!isExpanded) {
                    // Opening mobile menu
                    navbarCollapse.classList.add('show');
                    mobileOverlay.classList.add('show');
                    document.body.style.overflow = 'hidden';
                    
                    // Animate in nav items
                    const navItems = document.querySelectorAll('.nav-item');
                    navItems.forEach((item, index) => {
                        item.style.animationDelay = (index * 0.1) + 's';
                        item.classList.remove('animated');
                        setTimeout(() => {
                            item.classList.add('animated');
                        }, 10);
                    });
                } else {
                    // Closing mobile menu
                    closeMobileMenu();
                }
            });
            
            // Close mobile menu when clicking overlay
            mobileOverlay.addEventListener('click', closeMobileMenu);
            
            // Close mobile menu when clicking a link
            document.querySelectorAll('.nav-link').forEach(link => {
                link.addEventListener('click', function(e) {
                    if (window.innerWidth < 992) {
                        if (!this.classList.contains('dropdown-toggle')) {
                            closeMobileMenu();
                        }
                    }
                });
            });
            
            // Close on escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && navbarCollapse.classList.contains('show')) {
                    closeMobileMenu();
                }
            });
        }
        
        function closeMobileMenu() {
            navbarCollapse.classList.remove('show');
            mobileOverlay.classList.remove('show');
            document.body.style.overflow = '';
            
            // Reset toggler state
            const toggler = document.querySelector('.navbar-toggler');
            if (toggler) {
                toggler.setAttribute('aria-expanded', 'false');
            }
        }
        
        // Highlight active nav link based on scroll position
        function highlightActiveNavLink() {
            const sections = document.querySelectorAll('section[id], main[id], div[id]');
            const navLinks = document.querySelectorAll('.nav-link');
            
            let currentSection = '';
            const scrollPosition = window.scrollY + 100;
            
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
                const href = link.getAttribute('href');
                
                if (href && href.includes('#')) {
                    const targetId = href.split('#')[1];
                    if (targetId === currentSection) {
                        link.classList.add('active');
                    }
                } else if (currentSection === '' && 
                          (href === '/' || href.includes('home'))) {
                    link.classList.add('active');
                }
            });
        }
        
        // Initialize active link on page load
        highlightActiveNavLink();
        
        // Dropdown hover effect for desktop
        if (window.innerWidth >= 992) {
            const dropdowns = document.querySelectorAll('.dropdown');
            
            dropdowns.forEach(dropdown => {
                dropdown.addEventListener('mouseenter', function() {
                    const toggle = this.querySelector('.dropdown-toggle');
                    if (toggle) {
                        const bsDropdown = new bootstrap.Dropdown(toggle);
                        bsDropdown.show();
                    }
                });
                
                dropdown.addEventListener('mouseleave', function() {
                    const toggle = this.querySelector('.dropdown-toggle');
                    if (toggle) {
                        const bsDropdown = new bootstrap.Dropdown(toggle);
                        bsDropdown.hide();
                    }
                });
            });
        }
        
        // Add smooth scroll to anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                
                if (href !== '#' && document.querySelector(href)) {
                    e.preventDefault();
                    
                    const target = document.querySelector(href);
                    const navbarHeight = navbar.offsetHeight;
                    const targetPosition = target.offsetTop - navbarHeight;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                    
                    // Update URL without page reload
                    history.pushState(null, null, href);
                }
            });
        });
        
        // Update cart badge count (example)
        function updateCartBadge(count) {
            const badge = document.querySelector('.badge.bg-brown-light');
            if (badge) {
                badge.textContent = count;
                
                // Animation
                badge.style.transform = 'scale(1.2)';
                setTimeout(() => {
                    badge.style.transform = 'scale(1)';
                }, 300);
            }
        }
        
        // Example: Update cart when adding items
        document.querySelectorAll('.add-to-cart-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const currentCount = parseInt(document.querySelector('.badge.bg-brown-light').textContent);
                updateCartBadge(currentCount + 1);
            });
        });
        
        // Handle window resize
        let resizeTimer;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                if (window.innerWidth >= 992) {
                    // Reset mobile menu state on desktop
                    document.body.style.overflow = '';
                    if (mobileOverlay) mobileOverlay.classList.remove('show');
                    if (navbarCollapse) navbarCollapse.classList.remove('show');
                }
            }, 250);
        });
        
        // Add animation class to navbar on load
        setTimeout(() => {
            navbar.style.opacity = '1';
            navbar.style.transform = 'translateY(0)';
        }, 100);
    });
</script>