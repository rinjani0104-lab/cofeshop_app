@extends('layouts.app')

@section('title', 'About Us - Cafein Holic')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section" style="background-image: linear-gradient(rgba(60, 42, 33, 0.9), rgba(60, 42, 33, 0.9)), url('https://images.unsplash.com/photo-1445116572660-236099ec97a0?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-3">Our Story</h1>
                    <p class="lead mb-0">Discover the passion behind every cup at Cafein Holic</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Journey -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <h2 class="fw-bold text-brown-dark mb-4">From Humble Beginnings</h2>
                    <p class="lead mb-4">Founded in 2015 by two college friends with a shared passion for exceptional coffee, Cafein Holic started as a small corner shop in Jakarta.</p>
                    <p class="mb-4">What began as a dream to serve the perfect cup of coffee has evolved into a beloved community hub where coffee lovers gather to connect, create, and enjoy.</p>
                    <p class="mb-0">Today, we continue to honor our roots while innovating to bring you the best coffee experience possible.</p>
                </div>
                <div class="col-lg-6">
                    <div class="position-relative">
                        <img src="https://images.unsplash.com/photo-1516733968668-dbdce39c4651?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             class="img-fluid rounded-3 shadow-lg" 
                             alt="Cafein Holic Beginnings">
                        <div class="position-absolute top-0 start-0 bg-brown text-cream p-3 rounded-3 shadow" 
                             style="transform: translate(-20px, -20px);">
                            <h3 class="fw-bold mb-0">2015</h3>
                            <small>Our Journey Begins</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Values -->
    <section class="py-5 bg-cream">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="display-5 fw-bold text-brown-dark mb-3">Our Core Values</h2>
                    <p class="lead text-muted">The principles that guide everything we do</p>
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 bg-white shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="value-icon mb-4">
                                <div class="bg-brown text-cream rounded-circle d-flex align-items-center justify-content-center" 
                                     style="width: 70px; height: 70px;">
                                    <i class="bi bi-tree fs-3"></i>
                                </div>
                            </div>
                            <h4 class="fw-bold mb-3">Sustainability</h4>
                            <p class="text-muted">We're committed to environmentally responsible practices, from sourcing to serving.</p>
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="bi bi-check-circle text-brown me-2"></i> Ethically sourced beans</li>
                                <li class="mb-2"><i class="bi bi-check-circle text-brown me-2"></i> Compostable packaging</li>
                                <li><i class="bi bi-check-circle text-brown me-2"></i> Energy-efficient equipment</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 bg-white shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="value-icon mb-4">
                                <div class="bg-brown text-cream rounded-circle d-flex align-items-center justify-content-center" 
                                     style="width: 70px; height: 70px;">
                                    <i class="bi bi-award fs-3"></i>
                                </div>
                            </div>
                            <h4 class="fw-bold mb-3">Quality</h4>
                            <p class="text-muted">Every cup is crafted with precision and care, using only the finest ingredients.</p>
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="bi bi-check-circle text-brown me-2"></i> Premium Arabica beans</li>
                                <li class="mb-2"><i class="bi bi-check-circle text-brown me-2"></i> Fresh daily preparation</li>
                                <li><i class="bi bi-check-circle text-brown me-2"></i> Expert barista training</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 bg-white shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="value-icon mb-4">
                                <div class="bg-brown text-cream rounded-circle d-flex align-items-center justify-content-center" 
                                     style="width: 70px; height: 70px;">
                                    <i class="bi bi-people fs-3"></i>
                                </div>
                            </div>
                            <h4 class="fw-bold mb-3">Community</h4>
                            <p class="text-muted">We believe in building connections and supporting our local community.</p>
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="bi bi-check-circle text-brown me-2"></i> Local artists showcase</li>
                                <li class="mb-2"><i class="bi bi-check-circle text-brown me-2"></i> Community events</li>
                                <li><i class="bi bi-check-circle text-brown me-2"></i> Supporting local suppliers</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Team -->
    <section class="py-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="display-5 fw-bold text-brown-dark mb-3">Meet Our Team</h2>
                    <p class="lead text-muted">The passionate people behind your perfect cup</p>
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="team-card text-center">
                        <div class="team-img mb-4">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                 class="img-fluid rounded-circle" 
                                 alt="Alex Chen" 
                                 style="width: 150px; height: 150px; object-fit: cover;">
                        </div>
                        <h4 class="fw-bold mb-1">Alex Chen</h4>
                        <p class="text-brown mb-2">Founder & Head Barista</p>
                        <p class="text-muted small">Certified Q Grader with 10+ years of specialty coffee experience</p>
                        <div class="social-links mt-3">
                            <a href="#" class="text-brown me-2"><i class="bi bi-linkedin"></i></a>
                            <a href="#" class="text-brown me-2"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="text-brown"><i class="bi bi-twitter"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="team-card text-center">
                        <div class="team-img mb-4">
                            <img src="https://images.unsplash.com/photo-1609226283320-e88231dfcbb6?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8U2FyYWglMjBNaWxsZXJ8ZW58MHx8MHx8fDA%3D" 
                                 class="img-fluid rounded-circle" 
                                 alt="Sarah Miller" 
                                 style="width: 150px; height: 150px; object-fit: cover;">
                        </div>
                        <h4 class="fw-bold mb-1">Sarah Miller</h4>
                        <p class="text-brown mb-2">Co-Founder & Operations</p>
                        <p class="text-muted small">Hospitality expert with a passion for creating memorable experiences</p>
                        <div class="social-links mt-3">
                            <a href="#" class="text-brown me-2"><i class="bi bi-linkedin"></i></a>
                            <a href="#" class="text-brown me-2"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="text-brown"><i class="bi bi-twitter"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="team-card text-center">
                        <div class="team-img mb-4">
                            <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                 class="img-fluid rounded-circle" 
                                 alt="David Park" 
                                 style="width: 150px; height: 150px; object-fit: cover;">
                        </div>
                        <h4 class="fw-bold mb-1">David Park</h4>
                        <p class="text-brown mb-2">Pastry Chef</p>
                        <p class="text-muted small">Award-winning pastry chef specializing in artisanal baked goods</p>
                        <div class="social-links mt-3">
                            <a href="#" class="text-brown me-2"><i class="bi bi-linkedin"></i></a>
                            <a href="#" class="text-brown me-2"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="text-brown"><i class="bi bi-twitter"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="team-card text-center">
                        <div class="team-img mb-4">
                            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                 class="img-fluid rounded-circle" 
                                 alt="Lisa Wong" 
                                 style="width: 150px; height: 150px; object-fit: cover;">
                        </div>
                        <h4 class="fw-bold mb-1">Lisa Wong</h4>
                        <p class="text-brown mb-2">Coffee Roaster</p>
                        <p class="text-muted small">Master roaster with expertise in single-origin and specialty blends</p>
                        <div class="social-links mt-3">
                            <a href="#" class="text-brown me-2"><i class="bi bi-linkedin"></i></a>
                            <a href="#" class="text-brown me-2"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="text-brown"><i class="bi bi-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Milestones -->
    <section class="py-5 bg-brown-dark text-cream">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="display-5 fw-bold mb-3">Our Milestones</h2>
                    <p class="lead text-beige">Celebrating our journey of growth and achievement</p>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center mb-4">
                    <div class="milestone-item">
                        <h2 class="display-4 fw-bold text-beige mb-2">8+</h2>
                        <p class="mb-0">Years of Excellence</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center mb-4">
                    <div class="milestone-item">
                        <h2 class="display-4 fw-bold text-beige mb-2">50+</h2>
                        <p class="mb-0">Premium Coffee Blends</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center mb-4">
                    <div class="milestone-item">
                        <h2 class="display-4 fw-bold text-beige mb-2">10k+</h2>
                        <p class="mb-0">Happy Customers</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center mb-4">
                    <div class="milestone-item">
                        <h2 class="display-4 fw-bold text-beige mb-2">15+</h2>
                        <p class="mb-0">Industry Awards</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="display-5 fw-bold text-brown-dark mb-3">What Our Customers Say</h2>
                    <p class="lead text-muted">Don't just take our word for it</p>
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="rating mb-3">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </div>
                            <p class="mb-4">"The best coffee in Jakarta! I come here every morning before work. The cold brew is absolutely perfect."</p>
                            <div class="d-flex align-items-center">
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" 
                                     class="rounded-circle me-3" 
                                     alt="John Doe" 
                                     style="width: 50px; height: 50px; object-fit: cover;">
                                <div>
                                    <h6 class="fw-bold mb-0">Michael Chen</h6>
                                    <small class="text-muted">Regular Customer</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="rating mb-3">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-half text-warning"></i>
                            </div>
                            <p class="mb-4">"Perfect ambiance for working or catching up with friends. The matcha latte and croissants are my go-to combination!"</p>
                            <div class="d-flex align-items-center">
                                <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" 
                                     class="rounded-circle me-3" 
                                     alt="Jane Smith" 
                                     style="width: 50px; height: 50px; object-fit: cover;">
                                <div>
                                    <h6 class="fw-bold mb-0">Sarah Johnson</h6>
                                    <small class="text-muted">Remote Worker</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="rating mb-3">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </div>
                            <p class="mb-4">"Their commitment to sustainability and quality is impressive. Plus, the staff is incredibly friendly and knowledgeable."</p>
                            <div class="d-flex align-items-center">
                                <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" 
                                     class="rounded-circle me-3" 
                                     alt="David Lee" 
                                     style="width: 50px; height: 50px; object-fit: cover;">
                                <div>
                                    <h6 class="fw-bold mb-0">Robert Davis</h6>
                                    <small class="text-muted">Coffee Enthusiast</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-5 bg-brown text-cream">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h2 class="fw-bold mb-3">Want to Join Our Team?</h2>
                    <p class="mb-0">We're always looking for passionate individuals who share our love for coffee and community.</p>
                </div>
                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                    <a href="{{ url('/contact') }}" class="btn btn-cream rounded-pill px-5">
                        Careers <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Team card hover effect
            const teamCards = document.querySelectorAll('.team-card');
            teamCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-10px)';
                    this.style.transition = 'all 0.3s ease';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
            
            // Animate milestones on scroll
            const milestones = document.querySelectorAll('.milestone-item h2');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const target = entry.target;
                        const finalValue = target.textContent;
                        const duration = 2000;
                        const startValue = 0;
                        const increment = finalValue.replace('+', '') / (duration / 16);
                        let current = startValue;
                        
                        const timer = setInterval(() => {
                            current += increment;
                            if (current >= finalValue) {
                                target.textContent = finalValue;
                                clearInterval(timer);
                            } else {
                                target.textContent = Math.floor(current) + '+';
                            }
                        }, 16);
                        
                        observer.unobserve(target);
                    }
                });
            }, { threshold: 0.5 });
            
            milestones.forEach(milestone => observer.observe(milestone));
        });
    </script>
@endsection