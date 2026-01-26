@php
    $currentYear = date('Y');
    $openingHours = [
        ['day' => 'Monday - Friday', 'time' => '7:00 AM - 10:00 PM'],
        ['day' => 'Saturday', 'time' => '8:00 AM - 11:00 PM'],
        ['day' => 'Sunday', 'time' => '8:00 AM - 9:00 PM']
    ];
    
    $socialLinks = [
        ['icon' => 'bi-facebook', 'url' => '#', 'name' => 'Facebook'],
        ['icon' => 'bi-instagram', 'url' => '#', 'name' => 'Instagram'],
        ['icon' => 'bi-twitter', 'url' => '#', 'name' => 'Twitter'],
        ['icon' => 'bi-tiktok', 'url' => '#', 'name' => 'TikTok']
    ];
    
    $quickLinks = [
        ['name' => 'Home', 'url' => url('/home')],
        ['name' => 'Menu', 'url' => url('/menu')],
        ['name' => 'Order Online', 'url' => url('/order/form')],
        ['name' => 'Reservation', 'url' => url('/reservation')],
        ['name' => 'About Us', 'url' => url('/about')],
        ['name' => 'Contact', 'url' => url('/contact')]
    ];
@endphp

<footer class="footer bg-brown-dark text-cream">
    <div class="container">
        <!-- Main Footer Content -->
        <div class="footer-main py-5">
            <div class="row">
                <!-- Brand & Description -->
                <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
                    <div class="footer-brand mb-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="footer-logo-icon me-3">
                                <i class="bi bi-cup-hot-fill"></i>
                            </div>
                            <h3 class="fw-bold mb-0">Cafein Holic</h3>
                        </div>
                        <p class="footer-description mb-4">
                            Premium coffee experiences crafted with passion since 2015. 
                            We source the finest beans and create moments worth savoring.
                        </p>
                        <div class="footer-social">
                            <h6 class="fw-bold mb-3">Follow Us</h6>
                            <div class="social-icons">
                                @foreach($socialLinks as $social)
                                <a href="{{ $social['url'] }}" 
                                   class="social-icon" 
                                   title="{{ $social['name'] }}"
                                   target="_blank" 
                                   rel="noopener noreferrer">
                                    <i class="bi {{ $social['icon'] }}"></i>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-lg-2 col-md-6 mb-5 mb-md-0">
                    <h5 class="footer-title mb-4 fw-bold">Quick Links</h5>
                    <ul class="footer-links list-unstyled">
                        @foreach($quickLinks as $link)
                        <li class="mb-3">
                            <a href="{{ $link['url'] }}" class="footer-link">
                                <i class="bi bi-chevron-right me-2"></i>{{ $link['name'] }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Contact Info -->
                <div class="col-lg-3 col-md-6 mb-5 mb-md-0">
                    <h5 class="footer-title mb-4 fw-bold">Contact Info</h5>
                    <ul class="footer-contact list-unstyled">
                        <li class="mb-3 d-flex align-items-start">
                            <i class="bi bi-geo-alt me-3 mt-1"></i>
                            <div>
                                <span class="d-block fw-medium">Our Location</span>
                                <small>123 Coffee Street, Central Jakarta 10110</small>
                            </div>
                        </li>
                        <li class="mb-3 d-flex align-items-start">
                            <i class="bi bi-telephone me-3 mt-1"></i>
                            <div>
                                <span class="d-block fw-medium">Phone Number</span>
                                <small>(021) 555-7890</small>
                            </div>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="bi bi-envelope me-3 mt-1"></i>
                            <div>
                                <span class="d-block fw-medium">Email Address</span>
                                <small>hello@cafeinholic.com</small>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Opening Hours -->
                <div class="col-lg-3 col-md-6">
                    <h5 class="footer-title mb-4 fw-bold">Opening Hours</h5>
                    <ul class="footer-hours list-unstyled">
                        @foreach($openingHours as $hour)
                        <li class="mb-3 d-flex justify-content-between">
                            <span class="fw-medium">{{ $hour['day'] }}</span>
                            <span>{{ $hour['time'] }}</span>
                        </li>
                        @endforeach
                    </ul>
                    
                    <!-- Newsletter -->
                    <div class="footer-newsletter mt-4">
                        <h6 class="fw-bold mb-3">Newsletter</h6>
                        <p class="small mb-3">Subscribe for updates & promotions</p>
                        <form class="newsletter-form">
                            <div class="input-group">
                                <input type="email" 
                                       class="form-control" 
                                       placeholder="Your email" 
                                       required>
                                <button class="btn btn-brown" type="submit">
                                    <i class="bi bi-send"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom py-4 border-top border-cream-light">
            <div class="row align-items-center">
                <div class="col-md-6 mb-3 mb-md-0">
                    <p class="mb-0">
                        &copy; {{ $currentYear }} Cafein Holic. All rights reserved.
                    </p>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="footer-legal">
                        <a href="{{ url('/privacy') }}" class="footer-legal-link me-3">Privacy Policy</a>
                        <a href="{{ url('/terms') }}" class="footer-legal-link me-3">Terms of Service</a>
                        <a href="{{ url('/sitemap') }}" class="footer-legal-link">Sitemap</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Back to Top Button -->
    <button class="back-to-top btn btn-brown" id="backToTop" aria-label="Back to top">
        <i class="bi bi-chevron-up"></i>
    </button>
</footer>

<style>
    /* ===== FOOTER STYLES ===== */
    .footer {
        position: relative;
        overflow: hidden;
    }
    
    .footer::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 20% 80%, rgba(184, 92, 56, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 80% 20%, rgba(224, 192, 151, 0.05) 0%, transparent 50%);
        z-index: 0;
    }
    
    .footer > .container {
        position: relative;
        z-index: 1;
    }
    
    /* Footer Brand */
    .footer-logo-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, var(--brown-light), var(--beige));
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--brown-dark);
        font-size: 1.5rem;
    }
    
    .footer-description {
        color: rgba(247, 243, 233, 0.8);
        line-height: 1.6;
        max-width: 300px;
    }
    
    /* Social Icons */
    .social-icons {
        display: flex;
        gap: 15px;
    }
    
    .social-icon {
        width: 40px;
        height: 40px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--cream);
        font-size: 1.1rem;
        transition: all 0.3s ease;
        text-decoration: none;
    }
    
    .social-icon:hover {
        background: var(--brown-light);
        transform: translateY(-3px);
        color: white;
    }
    
    /* Footer Links */
    .footer-title {
        position: relative;
        padding-bottom: 10px;
        color: var(--cream);
    }
    
    .footer-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 40px;
        height: 2px;
        background: var(--beige);
    }
    
    .footer-link {
        color: rgba(247, 243, 233, 0.7);
        text-decoration: none;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
    }
    
    .footer-link:hover {
        color: var(--cream);
        transform: translateX(5px);
    }
    
    /* Contact Info */
    .footer-contact i {
        color: var(--beige);
        font-size: 1.1rem;
    }
    
    .footer-contact span {
        color: var(--cream);
        font-weight: 500;
    }
    
    .footer-contact small {
        color: rgba(247, 243, 233, 0.7);
        display: block;
        margin-top: 2px;
    }
    
    /* Opening Hours */
    .footer-hours span:first-child {
        color: rgba(247, 243, 233, 0.9);
    }
    
    .footer-hours span:last-child {
        color: var(--beige);
        font-weight: 500;
    }
    
    /* Newsletter */
    .newsletter-form .form-control {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(224, 192, 151, 0.3);
        color: var(--cream);
        border-radius: 8px 0 0 8px;
        border-right: none;
        padding: 10px 15px;
    }
    
    .newsletter-form .form-control:focus {
        background: rgba(255, 255, 255, 0.15);
        box-shadow: 0 0 0 0.25rem rgba(224, 192, 151, 0.25);
        border-color: var(--beige);
        color: var(--cream);
    }
    
    .newsletter-form .form-control::placeholder {
        color: rgba(247, 243, 233, 0.5);
    }
    
    .newsletter-form .btn {
        border-radius: 0 8px 8px 0;
        padding: 10px 20px;
    }
    
    /* Footer Bottom */
    .footer-legal-link {
        color: rgba(247, 243, 233, 0.6);
        text-decoration: none;
        font-size: 0.9rem;
        transition: color 0.3s ease;
    }
    
    .footer-legal-link:hover {
        color: var(--cream);
        text-decoration: underline;
    }
    
    /* Back to Top Button */
    .back-to-top {
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1000;
        opacity: 0;
        visibility: hidden;
        transform: translateY(20px);
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(60, 42, 33, 0.2);
    }
    
    .back-to-top.visible {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }
    
    .back-to-top:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(60, 42, 33, 0.3);
    }
    
    /* Responsive Styles */
    @media (max-width: 768px) {
        .footer-main {
            padding: 40px 0;
        }
        
        .footer-title {
            font-size: 1.1rem;
        }
        
        .social-icons {
            justify-content: flex-start;
        }
        
        .footer-legal {
            text-align: center !important;
            margin-top: 10px;
        }
        
        .footer-legal-link {
            display: block;
            margin: 5px 0;
        }
        
        .back-to-top {
            bottom: 20px;
            right: 20px;
            width: 45px;
            height: 45px;
        }
    }
    
    /* Animation */
    .footer-brand,
    .footer-links li,
    .footer-contact li,
    .footer-hours li {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.6s ease forwards;
    }
    
    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    /* Stagger animation */
    .footer-links li:nth-child(1) { animation-delay: 0.1s; }
    .footer-links li:nth-child(2) { animation-delay: 0.2s; }
    .footer-links li:nth-child(3) { animation-delay: 0.3s; }
    .footer-links li:nth-child(4) { animation-delay: 0.4s; }
    .footer-links li:nth-child(5) { animation-delay: 0.5s; }
    .footer-links li:nth-child(6) { animation-delay: 0.6s; }
    
    .footer-contact li:nth-child(1) { animation-delay: 0.2s; }
    .footer-contact li:nth-child(2) { animation-delay: 0.3s; }
    .footer-contact li:nth-child(3) { animation-delay: 0.4s; }
    
    .footer-hours li:nth-child(1) { animation-delay: 0.3s; }
    .footer-hours li:nth-child(2) { animation-delay: 0.4s; }
    .footer-hours li:nth-child(3) { animation-delay: 0.5s; }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Back to Top Button
        const backToTop = document.getElementById('backToTop');
        
        window.addEventListener('scroll', function() {
            if (window.scrollY > 300) {
                backToTop.classList.add('visible');
            } else {
                backToTop.classList.remove('visible');
            }
        });
        
        backToTop.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
        
        // Newsletter Form
        const newsletterForm = document.querySelector('.newsletter-form');
        if (newsletterForm) {
            newsletterForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const emailInput = this.querySelector('input[type="email"]');
                const email = emailInput.value;
                
                if (email) {
                    // Show success message
                    const button = this.querySelector('button');
                    const originalHTML = button.innerHTML;
                    
                    button.innerHTML = '<i class="bi bi-check-lg"></i>';
                    button.disabled = true;
                    
                    setTimeout(() => {
                        button.innerHTML = originalHTML;
                        button.disabled = false;
                        emailInput.value = '';
                        
                        // Show toast notification
                        showToast('Thank you for subscribing!', 'success');
                    }, 2000);
                }
            });
        }
        
        // Toast notification function
        function showToast(message, type) {
            const toast = document.createElement('div');
            toast.className = `toast-notification toast-${type}`;
            toast.innerHTML = `
                <div class="toast-content">
                    <i class="bi ${type === 'success' ? 'bi-check-circle' : 'bi-info-circle'}"></i>
                    <span>${message}</span>
                </div>
            `;
            
            document.body.appendChild(toast);
            
            // Remove after 3 seconds
            setTimeout(() => {
                toast.remove();
            }, 3000);
        }
        
        // Initialize animations
        setTimeout(() => {
            const animatedElements = document.querySelectorAll('.footer-brand, .footer-links li, .footer-contact li, .footer-hours li');
            animatedElements.forEach((el, index) => {
                el.style.animationDelay = (index * 0.1) + 's';
                el.style.animation = 'fadeInUp 0.6s ease forwards';
            });
        }, 500);
        
        // Smooth scroll for footer links
        document.querySelectorAll('.footer-link[href^="#"]').forEach(link => {
            link.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href.startsWith('#')) {
                    e.preventDefault();
                    const target = document.querySelector(href);
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                }
            });
        });
    });
</script>