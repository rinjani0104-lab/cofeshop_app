<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cafein Holic - Premium Coffee Experience">
    <title>Cafein Holic - Welcome</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <style>
        /* Cafein Holic Color Theme */
        :root {
            --brown-dark: #3C2A21;
            --brown: #5C3D2E;
            --brown-light: #B85C38;
            --beige: #E0C097;
            --cream: #F7F3E9;
            --cream-light: #FFFBF5;
            --transition: all 0.3s ease;
        }

        /* Base Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--cream-light);
            color: var(--brown-dark);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Typography */
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Georgia', 'Times New Roman', serif;
            font-weight: 600;
        }

        .text-brown { color: var(--brown) !important; }
        .text-brown-dark { color: var(--brown-dark) !important; }
        .text-cream { color: var(--cream) !important; }
        .text-beige { color: var(--beige) !important; }

        .bg-brown { background-color: var(--brown) !important; }
        .bg-brown-dark { background-color: var(--brown-dark) !important; }
        .bg-cream { background-color: var(--cream) !important; }
        .bg-beige { background-color: var(--beige) !important; }

        /* Button Styles */
        .btn-brown {
            background-color: var(--brown);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            transition: var(--transition);
        }

        .btn-brown:hover {
            background-color: var(--brown-light);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(92, 61, 46, 0.2);
        }

        .btn-outline-brown {
            border: 2px solid var(--brown);
            color: var(--brown);
            background: transparent;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            transition: var(--transition);
        }

        .btn-outline-brown:hover {
            background-color: var(--brown);
            color: white;
            transform: translateY(-2px);
        }

        /* Hero Section */
        .hero-section {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, 
                rgba(92, 61, 46, 0.9) 0%, 
                rgba(60, 42, 33, 0.8) 100%),
                url('https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: white;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23F7F3E9' fill-opacity='0.05' fill-rule='evenodd'/%3E%3C/svg%3E");
            opacity: 0.3;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .logo {
            font-family: 'Georgia', serif;
            font-size: 3.5rem;
            font-weight: 700;
            color: var(--cream);
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            margin-bottom: 1rem;
        }

        .logo-subtitle {
            font-size: 1.2rem;
            color: var(--beige);
            letter-spacing: 3px;
            margin-bottom: 2rem;
        }

        /* Features Section */
        .feature-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            height: 100%;
            transition: var(--transition);
            border: 1px solid var(--cream);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(92, 61, 46, 0.1);
        }

        .feature-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, var(--brown), var(--brown-light));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: white;
            font-size: 1.8rem;
        }

        /* Menu Preview */
        .menu-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: var(--transition);
            background: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .menu-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(92, 61, 46, 0.15);
        }

        .menu-card img {
            height: 200px;
            object-fit: cover;
            transition: var(--transition);
        }

        .menu-card:hover img {
            transform: scale(1.05);
        }

        /* Animations */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .float-animation {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, var(--brown-dark), var(--brown));
            color: white;
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
            background-size: 30px 30px;
            animation: moveBackground 20s linear infinite;
        }

        @keyframes moveBackground {
            0% {
                transform: translate(0, 0);
            }
            100% {
                transform: translate(30px, 30px);
            }
        }

        /* Footer */
        .welcome-footer {
            background-color: var(--brown-dark);
            color: var(--cream);
            padding: 3rem 0;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .logo {
                font-size: 2.5rem;
            }
            
            .hero-section {
                background-attachment: scroll;
                min-height: 90vh;
            }
            
            .display-4 {
                font-size: 2.2rem;
            }
            
            .feature-card {
                margin-bottom: 20px;
            }
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: var(--cream);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--beige);
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--brown-light);
        }

        /* Welcome Page Specific */
        .welcome-nav {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            padding: 20px 0;
            z-index: 1000;
        }

        .welcome-nav .navbar-brand {
            color: white;
            font-weight: 700;
            font-size: 1.5rem;
        }

        .welcome-nav .nav-link {
            color: rgba(255, 255, 255, 0.9);
            margin: 0 10px;
            font-weight: 500;
            transition: var(--transition);
        }

        .welcome-nav .nav-link:hover {
            color: white;
        }

        .enter-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 1000;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(92, 61, 46, 0.7);
            }
            70% {
                box-shadow: 0 0 0 15px rgba(92, 61, 46, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(92, 61, 46, 0);
            }
        }

        .coffee-bean {
            position: absolute;
            width: 20px;
            height: 20px;
            background: var(--beige);
            border-radius: 50%;
            opacity: 0.3;
            animation: float 6s ease-in-out infinite;
        }

        .coffee-bean:nth-child(1) {
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .coffee-bean:nth-child(2) {
            top: 40%;
            right: 15%;
            animation-delay: 1s;
        }

        .coffee-bean:nth-child(3) {
            bottom: 30%;
            left: 20%;
            animation-delay: 2s;
        }

        .coffee-bean:nth-child(4) {
            bottom: 20%;
            right: 25%;
            animation-delay: 3s;
        }
    </style>
</head>
<body>
    <!-- Floating Coffee Beans Animation -->
    <div class="coffee-bean"></div>
    <div class="coffee-bean"></div>
    <div class="coffee-bean"></div>
    <div class="coffee-bean"></div>

    <!-- Navigation -->
    <nav class="welcome-nav">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <a class="navbar-brand" href="#">
                    <i class="bi bi-cup-hot-fill me-2"></i>Cafein Holic
                </a>
                <div class="d-none d-md-flex align-items-center">
                    <a href="#about" class="nav-link">About</a>
                    <a href="#menu" class="nav-link">Menu</a>
                    <a href="#features" class="nav-link">Features</a>
                    <a href="#contact" class="nav-link">Contact</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 mx-auto text-center">
                    <div class="hero-content">
                        <h1 class="logo fade-in">Cafein Holic</h1>
                        <p class="logo-subtitle fade-in" style="animation-delay: 0.2s">PREMIUM COFFEE EXPERIENCE</p>
                        
                        <h2 class="display-4 fw-bold mb-4 fade-in" style="animation-delay: 0.4s">
                            Where Every Cup<br>
                            <span class="text-beige">Tells a Story</span>
                        </h2>
                        
                        <p class="lead mb-5 fade-in" style="animation-delay: 0.6s">
                            Experience the perfect blend of premium coffee, artisanal craftsmanship, 
                            and cozy ambiance at Cafein Holic. We're not just serving coffee, 
                            we're creating moments.
                        </p>
                        
                        <div class="d-flex flex-wrap justify-content-center gap-3 fade-in" style="animation-delay: 0.8s">
                            <a href="{{ url('/home') }}" class="btn btn-brown">
                                <i class="bi bi-door-open me-2"></i> Enter Cafe
                            </a>
                            <a href="#menu" class="btn btn-outline-light">
                                <i class="bi bi-cup-hot me-2"></i> View Menu
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-5 bg-cream">
        <div class="container py-5">
            <div class="row mb-5">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="display-5 fw-bold text-brown-dark mb-3">Why Choose Cafein Holic</h2>
                    <p class="lead text-muted">Discover what makes our coffee experience exceptional</p>
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card fade-in">
                        <div class="feature-icon">
                            <i class="bi bi-tree"></i>
                        </div>
                        <h4 class="fw-bold text-center mb-3">Ethically Sourced</h4>
                        <p class="text-center text-muted">We partner with sustainable farms worldwide to bring you the finest quality beans while supporting local communities.</p>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card fade-in" style="animation-delay: 0.2s">
                        <div class="feature-icon">
                            <i class="bi bi-award"></i>
                        </div>
                        <h4 class="fw-bold text-center mb-3">Artisan Crafted</h4>
                        <p class="text-center text-muted">Our expert baristas craft each cup with precision and passion, ensuring perfect extraction and presentation every time.</p>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card fade-in" style="animation-delay: 0.4s">
                        <div class="feature-icon">
                            <i class="bi bi-heart"></i>
                        </div>
                        <h4 class="fw-bold text-center mb-3">Cozy Ambiance</h4>
                        <p class="text-center text-muted">Experience our thoughtfully designed space that combines modern aesthetics with warm, welcoming comfort.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Menu Preview -->
    <section id="menu" class="py-5">
        <div class="container py-5">
            <div class="row mb-5">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="display-5 fw-bold text-brown-dark mb-3">Signature Specialties</h2>
                    <p class="lead text-muted">A glimpse of our most beloved creations</p>
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="menu-card fade-in">
                        <img src="https://images.unsplash.com/photo-1461023058943-07fcbe16d735?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             class="card-img-top" 
                             alt="Artisan Cold Brew">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-2">Artisan Cold Brew</h5>
                            <p class="text-muted small mb-3">Smooth cold brew with notes of chocolate and caramel</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-brown fw-bold">$5.50</span>
                                <span class="badge bg-brown-light">Popular</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="menu-card fade-in" style="animation-delay: 0.2s">
                        <img src="https://images.unsplash.com/photo-1568901346375-23c9450c58cd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             class="card-img-top" 
                             alt="Hazelnut Latte">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-2">Hazelnut Latte</h5>
                            <p class="text-muted small mb-3">Rich espresso with steamed milk and hazelnut syrup</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-brown fw-bold">$4.75</span>
                                <span class="badge bg-beige text-brown-dark">New</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="menu-card fade-in" style="animation-delay: 0.4s">
                        <img src="https://images.unsplash.com/photo-1515823064-d6e0c04616a7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             class="card-img-top" 
                             alt="Matcha Frappé">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-2">Matcha Frappé</h5>
                            <p class="text-muted small mb-3">Premium matcha blended with ice and cream</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-brown fw-bold">$6.25</span>
                                <span class="badge bg-brown-light">Seasonal</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="menu-card fade-in" style="animation-delay: 0.6s">
                        <img src="https://images.unsplash.com/photo-1570196911496-66bd58a5b7b4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             class="card-img-top" 
                             alt="Caramel Macchiato">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-2">Caramel Macchiato</h5>
                            <p class="text-muted small mb-3">Vanilla syrup, steamed milk, espresso and caramel drizzle</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-brown fw-bold">$5.00</span>
                                <span class="badge bg-brown-light">Best Seller</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-5 fade-in" style="animation-delay: 0.8s">
                <a href="{{ url('/menu') }}" class="btn btn-outline-brown px-5">
                    View Full Menu <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-5 bg-brown-dark text-cream">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h2 class="display-5 fw-bold mb-4">Our Story</h2>
                    <p class="lead mb-4">
                        Founded in 2015, Cafein Holic began as a passion project between two coffee enthusiasts. 
                        What started as a small neighborhood cafe has grown into a beloved destination for 
                        coffee lovers seeking exceptional quality and warm hospitality.
                    </p>
                    <p class="mb-4">
                        We believe that great coffee is more than just a beverage—it's an experience. 
                        From the moment our beans are harvested to the final pour, every step is 
                        carefully curated to deliver perfection in your cup.
                    </p>
                    <div class="d-flex gap-3">
                        <div class="text-center">
                            <h3 class="fw-bold text-beige">8+</h3>
                            <p>Years of Excellence</p>
                        </div>
                        <div class="text-center">
                            <h3 class="fw-bold text-beige">50+</h3>
                            <p>Premium Blends</p>
                        </div>
                        <div class="text-center">
                            <h3 class="fw-bold text-beige">10k+</h3>
                            <p>Happy Customers</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="position-relative">
                        <img src="https://images.unsplash.com/photo-1445116572660-236099ec97a0?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             class="img-fluid rounded-3 shadow-lg float-animation" 
                             alt="Coffee Shop Interior">
                        <div class="position-absolute top-0 start-0 bg-brown p-3 rounded-3 shadow" 
                             style="transform: translate(-20px, -20px);">
                            <i class="bi bi-star-fill text-beige fs-4"></i>
                            <h4 class="fw-bold mb-0 mt-2">4.9/5</h4>
                            <small>Customer Rating</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section py-5">
        <div class="container py-5">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h2 class="display-5 fw-bold mb-4">Ready to Experience Perfection?</h2>
                    <p class="lead mb-5">Join us for an unforgettable coffee journey. Whether you're here to work, meet friends, or simply enjoy a moment of peace, we've got the perfect spot for you.</p>
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="{{ url('/reservation') }}" class="btn btn-light text-brown px-5 py-3">
                            <i class="bi bi-calendar-check me-2"></i> Book a Table
                        </a>
                        <a href="{{ url('/order/form') }}" class="btn btn-outline-light px-5 py-3">
                            <i class="bi bi-cart3 me-2"></i> Order Online
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="welcome-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h3 class="fw-bold mb-3">
                        <i class="bi bi-cup-hot-fill me-2"></i>Cafein Holic
                    </h3>
                    <p class="mb-4">Premium coffee experiences crafted with passion since 2015.</p>
                    <div class="social-links">
                        <a href="#" class="text-cream me-3"><i class="bi bi-facebook fs-5"></i></a>
                        <a href="#" class="text-cream me-3"><i class="bi bi-instagram fs-5"></i></a>
                        <a href="#" class="text-cream me-3"><i class="bi bi-twitter fs-5"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h5 class="fw-bold mb-3">Visit Us</h5>
                    <p class="mb-2"><i class="bi bi-geo-alt me-2"></i> 123 Coffee Street, Jakarta</p>
                    <p class="mb-2"><i class="bi bi-telephone me-2"></i> (021) 555-7890</p>
                    <p class="mb-2"><i class="bi bi-envelope me-2"></i> hello@cafeinholic.com</p>
                </div>
                <div class="col-lg-4">
                    <h5 class="fw-bold mb-3">Opening Hours</h5>
                    <p class="mb-2">Mon-Fri: 7:00 AM - 10:00 PM</p>
                    <p class="mb-2">Saturday: 8:00 AM - 11:00 PM</p>
                    <p class="mb-2">Sunday: 8:00 AM - 9:00 PM</p>
                </div>
            </div>
            <hr class="my-4 border-cream-light">
            <div class="text-center pt-2">
                <p class="mb-0">&copy; 2023 Cafein Holic. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Fixed Enter Button -->
    <div class="enter-btn">
        <a href="{{ url('/home') }}" class="btn btn-brown rounded-pill px-4 py-3 shadow-lg">
            <i class="bi bi-door-open me-2"></i> Enter Cafe
        </a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Fade-in animation on scroll
            const fadeElements = document.querySelectorAll('.fade-in');
            
            const fadeInOnScroll = function() {
                fadeElements.forEach(element => {
                    const elementTop = element.getBoundingClientRect().top;
                    const elementVisible = 100;
                    
                    if (elementTop < window.innerHeight - elementVisible) {
                        element.classList.add('visible');
                    }
                });
            };
            
            // Initial check
            fadeInOnScroll();
            
            // Check on scroll
            window.addEventListener('scroll', fadeInOnScroll);
            
            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    if (targetId === '#') return;
                    
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 80,
                            behavior: 'smooth'
                        });
                    }
                });
            });
            
            // Navbar background on scroll
            const navbar = document.querySelector('.welcome-nav');
            window.addEventListener('scroll', function() {
                if (window.scrollY > 100) {
                    navbar.style.background = 'rgba(60, 42, 33, 0.95)';
                    navbar.style.backdropFilter = 'blur(10px)';
                } else {
                    navbar.style.background = 'transparent';
                    navbar.style.backdropFilter = 'none';
                }
            });
            
            // Coffee beans animation
            const coffeeBeans = document.querySelectorAll('.coffee-bean');
            coffeeBeans.forEach((bean, index) => {
                bean.style.animationDelay = `${index * 1.5}s`;
            });
            
            // Typing effect for subtitle
            const subtitle = document.querySelector('.logo-subtitle');
            const originalText = subtitle.textContent;
            subtitle.textContent = '';
            
            let i = 0;
            const typeWriter = () => {
                if (i < originalText.length) {
                    subtitle.textContent += originalText.charAt(i);
                    i++;
                    setTimeout(typeWriter, 50);
                }
            };
            
            // Start typing after hero loads
            setTimeout(typeWriter, 1000);
            
            // Parallax effect for hero background
            window.addEventListener('scroll', function() {
                const scrolled = window.pageYOffset;
                const hero = document.querySelector('.hero-section');
                const rate = scrolled * 0.5;
                hero.style.transform = `translate3d(0px, ${rate}px, 0px)`;
            });
            
            // Add hover effect to menu cards
            const menuCards = document.querySelectorAll('.menu-card');
            menuCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-10px)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
            
            // Initialize tooltips
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
            
            // Add click animation to buttons
            const buttons = document.querySelectorAll('.btn');
            buttons.forEach(button => {
                button.addEventListener('click', function(e) {
                    // Create ripple effect
                    const ripple = document.createElement('span');
                    const rect = this.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    const x = e.clientX - rect.left - size / 2;
                    const y = e.clientY - rect.top - size / 2;
                    
                    ripple.style.cssText = `
                        position: absolute;
                        border-radius: 50%;
                        background: rgba(255, 255, 255, 0.7);
                        transform: scale(0);
                        animation: ripple 0.6s linear;
                        width: ${size}px;
                        height: ${size}px;
                        left: ${x}px;
                        top: ${y}px;
                    `;
                    
                    this.appendChild(ripple);
                    
                    setTimeout(() => {
                        ripple.remove();
                    }, 600);
                });
            });
            
            // Add CSS for ripple effect
            const style = document.createElement('style');
            style.textContent = `
                @keyframes ripple {
                    to {
                        transform: scale(4);
                        opacity: 0;
                    }
                }
                
                .btn {
                    position: relative;
                    overflow: hidden;
                }
            `;
            document.head.appendChild(style);
        });
    </script>
</body>
</html>