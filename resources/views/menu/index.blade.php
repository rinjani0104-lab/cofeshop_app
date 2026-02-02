@extends('layouts.app')

@section('title', 'Menu - Cafein Holic')

@section('content')
    <!-- Menu Hero -->
    <section class="hero-section" style="background-image: linear-gradient(rgba(60, 42, 33, 0.85), rgba(60, 42, 33, 0.85)), url('https://images.unsplash.com/photo-1554118811-1e0d58224f24?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80'); padding: 6rem 0;">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-3 text-white">Our Coffee Menu</h1>
                    <p class="lead mb-0 text-beige">Discover our carefully curated selection of specialty coffees, teas, and pastries</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Menu Navigation -->
    <div class="sticky-top" style="top: 76px; z-index: 1020;">
        <div class="bg-cream-light py-3 border-bottom border-beige">
            <div class="container">
                <div class="d-flex flex-wrap justify-content-center gap-2">
                    <a class="btn btn-outline-brown btn-sm rounded-pill px-4 active" href="#coffee">
                        <i class="bi bi-cup-hot me-1"></i> Coffee
                    </a>
                    <a class="btn btn-outline-brown btn-sm rounded-pill px-4" href="#tea">
                        <i class="bi bi-cup-straw me-1"></i> Tea
                    </a>
                    <a class="btn btn-outline-brown btn-sm rounded-pill px-4" href="#pastries">
                        <i class="bi bi-cake2 me-1"></i> Pastries
                    </a>
                    <a class="btn btn-outline-brown btn-sm rounded-pill px-4" href="#specialty">
                        <i class="bi bi-star me-1"></i> Specialty
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Coffee Menu -->
    <section id="coffee" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <div class="section-icon mb-3">
                    <i class="bi bi-cup-hot-fill text-brown fs-1"></i>
                </div>
                <h2 class="fw-bold mb-3 text-brown-dark">Coffee Selection</h2>
                <p class="text-muted mb-0">Expertly brewed from premium Arabica beans</p>
            </div>
            
            <div class="row g-4">
                @foreach($coffeeItems ?? [] as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="menu-card border-0 shadow-sm hover-lift">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <h5 class="fw-bold mb-1 text-brown-dark">{{ $item->name }}</h5>
                                        <span class="text-brown fw-bold fs-5">${{ number_format($item->price, 2) }}</span>
                                    </div>
                                    <p class="text-muted small mt-2 mb-0">{{ $item->description }}</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">
                                <div>
                                    @if($item->is_popular)
                                    <span class="badge bg-brown-light text-white me-2">
                                        <i class="bi bi-fire me-1"></i>Popular
                                    </span>
                                    @endif
                                    @if($item->is_new)
                                    <span class="badge bg-beige text-brown-dark">
                                        <i class="bi bi-star me-1"></i>New
                                    </span>
                                    @endif
                                </div>
                                <a href="{{ url('/menu/' . $item->id) }}" class="btn btn-brown btn-sm rounded-pill px-3">
                                    View <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Tea Menu -->
    <section id="tea" class="py-5 bg-cream">
        <div class="container">
            <div class="text-center mb-5">
                <div class="section-icon mb-3">
                    <i class="bi bi-cup-straw text-brown fs-1"></i>
                </div>
                <h2 class="fw-bold mb-3 text-brown-dark">Tea & Infusions</h2>
                <p class="text-muted mb-0">Soothing blends from around the world</p>
            </div>
            
            <div class="row g-4">
                @foreach($teaItems ?? [] as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="menu-card border-0 bg-white shadow-sm">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <h5 class="fw-bold mb-1 text-brown-dark">{{ $item->name }}</h5>
                                        <span class="text-brown fw-bold fs-5">${{ number_format($item->price, 2) }}</span>
                                    </div>
                                    <p class="text-muted small mt-2 mb-0">{{ $item->description }}</p>
                                </div>
                            </div>
                            <div class="text-end mt-3 pt-3 border-top">
                                <a href="{{ url('/menu/' . $item->id) }}" class="btn btn-outline-brown btn-sm rounded-pill px-3">
                                    Details <i class="bi bi-chevron-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Additional Sections (Placeholder) -->
    <section id="pastries" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <div class="section-icon mb-3">
                    <i class="bi bi-cake2 text-brown fs-1"></i>
                </div>
                <h2 class="fw-bold mb-3 text-brown-dark">Fresh Pastries</h2>
                <p class="text-muted mb-0">Daily baked treats to complement your drink</p>
            </div>
            <div class="text-center">
                <p class="text-muted">Coming soon...</p>
            </div>
        </div>
    </section>

    <section id="specialty" class="py-5 bg-cream">
        <div class="container">
            <div class="text-center mb-5">
                <div class="section-icon mb-3">
                    <i class="bi bi-star-fill text-brown fs-1"></i>
                </div>
                <h2 class="fw-bold mb-3 text-brown-dark">Specialty Drinks</h2>
                <p class="text-muted mb-0">Unique creations from our master baristas</p>
            </div>
            <div class="text-center">
                <p class="text-muted">Coming soon...</p>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Smooth scroll for menu navigation
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    const href = this.getAttribute('href');
                    
                    if (href === '#') return;
                    
                    const target = document.querySelector(href);
                    if (target) {
                        e.preventDefault();
                        
                        // Update active state
                        document.querySelectorAll('.btn-outline-brown').forEach(btn => {
                            btn.classList.remove('active');
                        });
                        this.classList.add('active');
                        
                        // Smooth scroll
                        const navbarHeight = document.getElementById('mainNavbar')?.offsetHeight || 76;
                        const targetPosition = target.offsetTop - navbarHeight;
                        
                        window.scrollTo({
                            top: targetPosition,
                            behavior: 'smooth'
                        });
                    }
                });
            });
            
            // Highlight active section on scroll
            window.addEventListener('scroll', function() {
                const sections = document.querySelectorAll('section[id]');
                const navButtons = document.querySelectorAll('.btn-outline-brown[href^="#"]');
                const scrollPosition = window.scrollY + 100;
                
                let currentSection = '';
                
                sections.forEach(section => {
                    const sectionTop = section.offsetTop;
                    const sectionHeight = section.clientHeight;
                    
                    if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                        currentSection = section.getAttribute('id');
                    }
                });
                
                navButtons.forEach(button => {
                    button.classList.remove('active');
                    const href = button.getAttribute('href');
                    
                    if (href === '#' + currentSection) {
                        button.classList.add('active');
                    }
                });
            });
        });
    </script>
    
    <style>
        .menu-card {
            transition: all 0.3s ease;
            border-radius: 12px;
            height: 100%;
        }
        
        .menu-card.hover-lift:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(92, 61, 46, 0.1) !important;
        }
        
        .section-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 70px;
            height: 70px;
            background: rgba(184, 92, 56, 0.1);
            border-radius: 50%;
        }
        
        .btn-outline-brown.active {
            background-color: var(--brown);
            color: white;
            border-color: var(--brown);
        }
        
        .btn-outline-brown.active:hover {
            background-color: var(--brown-light);
            border-color: var(--brown-light);
        }
        
        @media (max-width: 768px) {
            .hero-section {
                padding: 4rem 0 !important;
            }
            
            .sticky-top {
                position: static;
            }
        }
    </style>
@endsection