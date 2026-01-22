@extends('layouts.app')

@section('title', 'Contact - Cafein Holic')

@section('content')
    <!-- Contact Hero -->
    <section class="hero-section" style="background-image: linear-gradient(rgba(60, 42, 33, 0.9), rgba(60, 42, 33, 0.9)), url('https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80'); padding: 6rem 0;">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-3">Get in Touch</h1>
                    <p class="lead mb-0">We'd love to hear from you. Reach out with any questions or feedback.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Content -->
    <section class="py-5">
        <div class="container">
            <div class="row g-5">
                <!-- Contact Info -->
                <div class="col-lg-4">
                    <div class="sticky-top" style="top: 100px;">
                        <h2 class="fw-bold text-brown mb-4">Contact Information</h2>
                        
                        <div class="contact-info mb-5">
                            <div class="d-flex mb-4">
                                <div class="icon-wrapper bg-brown text-cream rounded-circle d-flex align-items-center justify-content-center me-3" 
                                     style="width: 50px; height: 50px;">
                                    <i class="bi bi-geo-alt"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-1">Our Location</h5>
                                    <p class="mb-0">123 Coffee Street<br>Central Jakarta 10110</p>
                                </div>
                            </div>
                            
                            <div class="d-flex mb-4">
                                <div class="icon-wrapper bg-brown text-cream rounded-circle d-flex align-items-center justify-content-center me-3" 
                                     style="width: 50px; height: 50px;">
                                    <i class="bi bi-telephone"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-1">Phone Number</h5>
                                    <p class="mb-0">(021) 555-7890<br>Mon-Sun, 8 AM - 10 PM</p>
                                </div>
                            </div>
                            
                            <div class="d-flex mb-4">
                                <div class="icon-wrapper bg-brown text-cream rounded-circle d-flex align-items-center justify-content-center me-3" 
                                     style="width: 50px; height: 50px;">
                                    <i class="bi bi-envelope"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-1">Email Address</h5>
                                    <p class="mb-0">hello@cafeinholic.com<br>inquiries@cafeinholic.com</p>
                                </div>
                            </div>
                            
                            <div class="d-flex">
                                <div class="icon-wrapper bg-brown text-cream rounded-circle d-flex align-items-center justify-content-center me-3" 
                                     style="width: 50px; height: 50px;">
                                    <i class="bi bi-clock"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-1">Opening Hours</h5>
                                    <p class="mb-0">Monday - Friday: 7 AM - 10 PM<br>
                                    Saturday: 8 AM - 11 PM<br>
                                    Sunday: 8 AM - 9 PM</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="social-section">
                            <h5 class="fw-bold mb-3">Follow Us</h5>
                            <div class="d-flex gap-3">
                                <a href="#" class="social-icon bg-brown text-cream rounded-circle d-flex align-items-center justify-content-center text-decoration-none" 
                                   style="width: 45px; height: 45px;">
                                    <i class="bi bi-facebook"></i>
                                </a>
                                <a href="#" class="social-icon bg-brown text-cream rounded-circle d-flex align-items-center justify-content-center text-decoration-none" 
                                   style="width: 45px; height: 45px;">
                                    <i class="bi bi-instagram"></i>
                                </a>
                                <a href="#" class="social-icon bg-brown text-cream rounded-circle d-flex align-items-center justify-content-center text-decoration-none" 
                                   style="width: 45px; height: 45px;">
                                    <i class="bi bi-twitter"></i>
                                </a>
                                <a href="#" class="social-icon bg-brown text-cream rounded-circle d-flex align-items-center justify-content-center text-decoration-none" 
                                   style="width: 45px; height: 45px;">
                                    <i class="bi bi-tiktok"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Form & Map -->
                <div class="col-lg-8">
                    <div class="row g-4">
                        <!-- Contact Form -->
                        <div class="col-12">
                            <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                                <div class="card-body p-4 p-md-5">
                                    <h3 class="fw-bold text-brown mb-4">Send us a Message</h3>
                                    
                                    <form class="needs-validation" novalidate>
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label for="contactName" class="form-label">Your Name *</label>
                                                <input type="text" class="form-control" id="contactName" required>
                                                <div class="invalid-feedback">
                                                    Please enter your name.
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label for="contactEmail" class="form-label">Email Address *</label>
                                                <input type="email" class="form-control" id="contactEmail" required>
                                            </div>
                                            
                                            <div class="col-12">
                                                <label for="contactSubject" class="form-label">Subject *</label>
                                                <select class="form-select" id="contactSubject" required>
                                                    <option value="" selected disabled>Select a subject</option>
                                                    <option value="general">General Inquiry</option>
                                                    <option value="reservation">Reservation Question</option>
                                                    <option value="feedback">Feedback & Suggestions</option>
                                                    <option value="event">Event Booking</option>
                                                    <option value="partnership">Partnership Opportunity</option>
                                                    <option value="other">Other</option>
                                                </select>
                                            </div>
                                            
                                            <div class="col-12">
                                                <label for="contactMessage" class="form-label">Message *</label>
                                                <textarea class="form-control" id="contactMessage" rows="5" required placeholder="Type your message here..."></textarea>
                                            </div>
                                            
                                            <div class="col-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="contactNewsletter">
                                                    <label class="form-check-label" for="contactNewsletter">
                                                        Subscribe to our newsletter for updates and promotions
                                                    </label>
                                                </div>
                                            </div>
                                            
                                            <div class="col-12 mt-3">
                                                <button type="submit" class="btn btn-brown rounded-pill px-5 py-3">
                                                    <i class="bi bi-send me-2"></i> Send Message
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Map -->
                        <div class="col-12">
                            <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                                <div class="card-body p-0">
                                    <div class="ratio ratio-16x9">
                                        <iframe 
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.8195613506864!3d-6.194741395493371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5390917b759%3A0x6b45e67356080477!2sJakarta%2C%20Indonesia!5e0!3m2!1sen!2sus!4v1648031010933!5m2!1sen!2sus" 
                                            style="border:0;" 
                                            allowfullscreen="" 
                                            loading="lazy">
                                        </iframe>
                                    </div>
                                    <div class="p-4">
                                        <h5 class="fw-bold mb-2">How to Find Us</h5>
                                        <p class="mb-0">We're located in the heart of Central Jakarta, just a 5-minute walk from the main subway station. Look for our signature brown awning!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- FAQ Section -->
                        <div class="col-12 mt-4">
                            <h3 class="fw-bold text-brown mb-4">Frequently Asked Questions</h3>
                            
                            <div class="accordion" id="faqAccordion">
                                <div class="accordion-item border-0 mb-3">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button bg-cream text-brown fw-bold rounded-3 collapsed" 
                                                type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                            Do you offer takeaway and delivery?
                                        </button>
                                    </h2>
                                    <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body bg-cream-light rounded-bottom-3">
                                            Yes! We offer both takeaway and delivery services through our website and popular delivery apps. Delivery is available within a 5km radius.
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="accordion-item border-0 mb-3">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button bg-cream text-brown fw-bold rounded-3 collapsed" 
                                                type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                            Do you have vegan or dairy-free options?
                                        </button>
                                    </h2>
                                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body bg-cream-light rounded-bottom-3">
                                            Absolutely! We offer almond milk, oat milk, and soy milk alternatives for all our drinks. We also have a selection of vegan pastries.
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="accordion-item border-0 mb-3">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button bg-cream text-brown fw-bold rounded-3 collapsed" 
                                                type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                            Can I host an event at Cafein Holic?
                                        </button>
                                    </h2>
                                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body bg-cream-light rounded-bottom-3">
                                            Yes, we have a private area that can accommodate up to 30 people for events. Please contact us through the form above for event inquiries.
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="accordion-item border-0">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button bg-cream text-brown fw-bold rounded-3 collapsed" 
                                                type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                            Do you sell coffee beans?
                                        </button>
                                    </h2>
                                    <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body bg-cream-light rounded-bottom-3">
                                            Yes, we sell our premium coffee beans both in-store and online. We offer several single-origin and blended options.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Contact form submission
            const contactForm = document.querySelector('.needs-validation');
            
            contactForm.addEventListener('submit', function(event) {
                event.preventDefault();
                event.stopPropagation();
                
                if (this.checkValidity()) {
                    // Show success message
                    const submitButton = this.querySelector('button[type="submit"]');
                    const originalText = submitButton.innerHTML;
                    
                    submitButton.innerHTML = '<i class="bi bi-check-circle me-2"></i> Message Sent!';
                    submitButton.disabled = true;
                    submitButton.classList.remove('btn-brown');
                    submitButton.classList.add('btn-success');
                    
                    // Reset form after 3 seconds
                    setTimeout(() => {
                        this.reset();
                        submitButton.innerHTML = originalText;
                        submitButton.disabled = false;
                        submitButton.classList.remove('btn-success');
                        submitButton.classList.add('btn-brown');
                        this.classList.remove('was-validated');
                        
                        // Show temporary success message
                        const successAlert = document.createElement('div');
                        successAlert.className = 'alert alert-success alert-dismissible fade show mt-3';
                        successAlert.innerHTML = `
                            <i class="bi bi-check-circle me-2"></i>
                            Thank you for your message! We'll get back to you within 24 hours.
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        `;
                        
                        this.parentNode.insertBefore(successAlert, this.nextSibling);
                        
                        // Auto-dismiss alert after 5 seconds
                        setTimeout(() => {
                            if (successAlert.parentNode) {
                                const bsAlert = new bootstrap.Alert(successAlert);
                                bsAlert.close();
                            }
                        }, 5000);
                    }, 3000);
                }
                
                this.classList.add('was-validated');
            }, false);
        });
    </script>
@endsection