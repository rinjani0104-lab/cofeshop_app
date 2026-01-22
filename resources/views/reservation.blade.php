@extends('layouts.app')

@section('title', 'Reservation - Cafein Holic')

@section('head')
    <!-- Flatpickr for date/time picker -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        .time-slot {
            padding: 10px 15px;
            border: 2px solid var(--beige);
            border-radius: 10px;
            text-align: center;
            cursor: pointer;
            transition: var(--transition);
            margin-bottom: 10px;
        }
        
        .time-slot:hover {
            border-color: var(--brown);
            background-color: rgba(92, 61, 46, 0.05);
        }
        
        .time-slot.selected {
            background-color: var(--brown);
            color: white;
            border-color: var(--brown);
        }
        
        .table-type-card {
            border: 2px solid var(--cream);
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: var(--transition);
            height: 100%;
        }
        
        .table-type-card:hover {
            transform: translateY(-5px);
            border-color: var(--beige);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        
        .table-type-card.selected {
            border-color: var(--brown);
            background-color: rgba(92, 61, 46, 0.05);
        }
        
        .table-icon {
            font-size: 2.5rem;
            color: var(--brown);
            margin-bottom: 15px;
        }
    </style>
@endsection

@section('content')
    <!-- Reservation Hero -->
    <section class="hero-section" style="background-image: linear-gradient(rgba(60, 42, 33, 0.9), rgba(60, 42, 33, 0.9)), url('https://images.unsplash.com/photo-1414235077428-338989a2e8c0?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80'); padding: 6rem 0;">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-3">Book Your Table</h1>
                    <p class="lead mb-0">Reserve your spot for an exceptional coffee experience</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Reservation Form -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card border-0 shadow-lg rounded-3 overflow-hidden">
                        <div class="card-body p-4 p-md-5">
                            <div class="text-center mb-5">
                                <h2 class="fw-bold text-brown mb-3">Make a Reservation</h2>
                                <p class="text-muted">Fill in the details below to secure your table</p>
                            </div>
                            
                            <form class="needs-validation" novalidate>
                                <!-- Step 1: Basic Info -->
                                <div class="reservation-step active" id="step1">
                                    <h4 class="fw-bold mb-4 text-brown"><span class="step-number">1</span> Contact Information</h4>
                                    
                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <label for="resName" class="form-label">Full Name *</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-cream border-end-0">
                                                    <i class="bi bi-person text-brown"></i>
                                                </span>
                                                <input type="text" class="form-control border-start-0" id="resName" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label for="resPhone" class="form-label">Phone Number *</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-cream border-end-0">
                                                    <i class="bi bi-phone text-brown"></i>
                                                </span>
                                                <input type="tel" class="form-control border-start-0" id="resPhone" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label for="resEmail" class="form-label">Email Address *</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-cream border-end-0">
                                                    <i class="bi bi-envelope text-brown"></i>
                                                </span>
                                                <input type="email" class="form-control border-start-0" id="resEmail" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label for="resGuests" class="form-label">Number of Guests *</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-cream border-end-0">
                                                    <i class="bi bi-people text-brown"></i>
                                                </span>
                                                <select class="form-select border-start-0" id="resGuests" required>
                                                    <option value="" selected disabled>Select guests</option>
                                                    <option value="1">1 Person</option>
                                                    <option value="2">2 People</option>
                                                    <option value="3">3 People</option>
                                                    <option value="4">4 People</option>
                                                    <option value="5">5 People</option>
                                                    <option value="6">6 People</option>
                                                    <option value="7">7+ People</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="d-flex justify-content-between mt-5">
                                        <div></div>
                                        <button type="button" class="btn btn-brown rounded-pill px-5 next-step" data-next="step2">
                                            Next <i class="bi bi-arrow-right ms-2"></i>
                                        </button>
                                    </div>
                                </div>
                                
                                <!-- Step 2: Date & Time -->
                                <div class="reservation-step" id="step2" style="display: none;">
                                    <h4 class="fw-bold mb-4 text-brown"><span class="step-number">2</span> Date & Time</h4>
                                    
                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <label for="resDate" class="form-label">Select Date *</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-cream border-end-0">
                                                    <i class="bi bi-calendar text-brown"></i>
                                                </span>
                                                <input type="text" class="form-control border-start-0" id="resDate" placeholder="Select date" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="form-label">Select Time *</label>
                                            <div class="time-slots mt-2">
                                                <div class="row">
                                                    <div class="col-6 col-md-4">
                                                        <div class="time-slot" data-time="08:00">8:00 AM</div>
                                                    </div>
                                                    <div class="col-6 col-md-4">
                                                        <div class="time-slot" data-time="09:00">9:00 AM</div>
                                                    </div>
                                                    <div class="col-6 col-md-4">
                                                        <div class="time-slot" data-time="10:00">10:00 AM</div>
                                                    </div>
                                                    <div class="col-6 col-md-4">
                                                        <div class="time-slot" data-time="11:00">11:00 AM</div>
                                                    </div>
                                                    <div class="col-6 col-md-4">
                                                        <div class="time-slot" data-time="12:00">12:00 PM</div>
                                                    </div>
                                                    <div class="col-6 col-md-4">
                                                        <div class="time-slot" data-time="13:00">1:00 PM</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" id="selectedTime" required>
                                        </div>
                                    </div>
                                    
                                    <div class="d-flex justify-content-between mt-5">
                                        <button type="button" class="btn btn-outline-brown rounded-pill px-5 prev-step" data-prev="step1">
                                            <i class="bi bi-arrow-left me-2"></i> Back
                                        </button>
                                        <button type="button" class="btn btn-brown rounded-pill px-5 next-step" data-next="step3">
                                            Next <i class="bi bi-arrow-right ms-2"></i>
                                        </button>
                                    </div>
                                </div>
                                
                                <!-- Step 3: Table Selection -->
                                <div class="reservation-step" id="step3" style="display: none;">
                                    <h4 class="fw-bold mb-4 text-brown"><span class="step-number">3</span> Table Preference</h4>
                                    
                                    <div class="row g-4">
                                        <div class="col-md-4">
                                            <div class="table-type-card" data-type="window">
                                                <div class="table-icon">
                                                    <i class="bi bi-columns-gap"></i>
                                                </div>
                                                <h5 class="fw-bold">Window Table</h5>
                                                <p class="text-muted small">Natural light with street view</p>
                                                <div class="availability">
                                                    <span class="badge bg-success">Available</span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="table-type-card" data-type="cozy">
                                                <div class="table-icon">
                                                    <i class="bi bi-lamp"></i>
                                                </div>
                                                <h5 class="fw-bold">Cozy Corner</h5>
                                                <p class="text-muted small">Quiet area for intimate conversations</p>
                                                <div class="availability">
                                                    <span class="badge bg-success">Available</span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="table-type-card" data-type="bar">
                                                <div class="table-icon">
                                                    <i class="bi bi-cup-straw"></i>
                                                </div>
                                                <h5 class="fw-bold">Bar Counter</h5>
                                                <p class="text-muted small">Watch our baristas in action</p>
                                                <div class="availability">
                                                    <span class="badge bg-warning">Limited</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-4">
                                        <label for="specialRequests" class="form-label">Special Requests</label>
                                        <textarea class="form-control" id="specialRequests" rows="3" placeholder="Any special requirements or occasions..."></textarea>
                                    </div>
                                    
                                    <div class="d-flex justify-content-between mt-5">
                                        <button type="button" class="btn btn-outline-brown rounded-pill px-5 prev-step" data-prev="step2">
                                            <i class="bi bi-arrow-left me-2"></i> Back
                                        </button>
                                        <button type="submit" class="btn btn-brown rounded-pill px-5">
                                            <i class="bi bi-check-circle me-2"></i> Confirm Reservation
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <!-- Reservation Info -->
                    <div class="row mt-5">
                        <div class="col-md-4 text-center mb-4">
                            <div class="p-4 bg-cream rounded-3 h-100">
                                <i class="bi bi-clock fs-1 text-brown mb-3"></i>
                                <h5 class="fw-bold">Opening Hours</h5>
                                <p class="mb-2">Mon-Fri: 7:00 AM - 10:00 PM</p>
                                <p class="mb-2">Weekend: 8:00 AM - 11:00 PM</p>
                            </div>
                        </div>
                        
                        <div class="col-md-4 text-center mb-4">
                            <div class="p-4 bg-cream rounded-3 h-100">
                                <i class="bi bi-telephone fs-1 text-brown mb-3"></i>
                                <h5 class="fw-bold">Need Help?</h5>
                                <p class="mb-2">Call us at (021) 555-7890</p>
                                <p>or email hello@cafeinholic.com</p>
                            </div>
                        </div>
                        
                        <div class="col-md-4 text-center mb-4">
                            <div class="p-4 bg-cream rounded-3 h-100">
                                <i class="bi bi-info-circle fs-1 text-brown mb-3"></i>
                                <h5 class="fw-bold">Cancellation Policy</h5>
                                <p class="mb-0">Please notify us at least 2 hours before your reservation for any changes or cancellations.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Date picker
            const datePicker = flatpickr("#resDate", {
                minDate: "today",
                dateFormat: "Y-m-d",
                disable: [
                    function(date) {
                        // Disable Sundays
                        return date.getDay() === 0;
                    }
                ]
            });
            
            // Time slot selection
            const timeSlots = document.querySelectorAll('.time-slot');
            const selectedTimeInput = document.getElementById('selectedTime');
            
            timeSlots.forEach(slot => {
                slot.addEventListener('click', function() {
                    // Remove selected class from all slots
                    timeSlots.forEach(s => s.classList.remove('selected'));
                    
                    // Add selected class to clicked slot
                    this.classList.add('selected');
                    
                    // Update hidden input
                    selectedTimeInput.value = this.getAttribute('data-time');
                });
            });
            
            // Table type selection
            const tableCards = document.querySelectorAll('.table-type-card');
            
            tableCards.forEach(card => {
                card.addEventListener('click', function() {
                    // Remove selected class from all cards
                    tableCards.forEach(c => c.classList.remove('selected'));
                    
                    // Add selected class to clicked card
                    this.classList.add('selected');
                });
            });
            
            // Multi-step form navigation
            const nextButtons = document.querySelectorAll('.next-step');
            const prevButtons = document.querySelectorAll('.prev-step');
            
            nextButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const currentStep = this.closest('.reservation-step');
                    const nextStepId = this.getAttribute('data-next');
                    
                    // Validate current step
                    if (validateStep(currentStep)) {
                        currentStep.style.display = 'none';
                        document.getElementById(nextStepId).style.display = 'block';
                        
                        // Scroll to top of form
                        document.querySelector('.card-body').scrollIntoView({ 
                            behavior: 'smooth', 
                            block: 'start' 
                        });
                    }
                });
            });
            
            prevButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const currentStep = this.closest('.reservation-step');
                    const prevStepId = this.getAttribute('data-prev');
                    
                    currentStep.style.display = 'none';
                    document.getElementById(prevStepId).style.display = 'block';
                    
                    // Scroll to top of form
                    document.querySelector('.card-body').scrollIntoView({ 
                        behavior: 'smooth', 
                        block: 'start' 
                    });
                });
            });
            
            // Step validation
            function validateStep(step) {
                const inputs = step.querySelectorAll('[required]');
                let isValid = true;
                
                inputs.forEach(input => {
                    if (!input.value.trim()) {
                        input.classList.add('is-invalid');
                        isValid = false;
                    } else {
                        input.classList.remove('is-invalid');
                    }
                });
                
                return isValid;
            }
            
            // Form submission
            const reservationForm = document.querySelector('.needs-validation');
            
            reservationForm.addEventListener('submit', function(event) {
                event.preventDefault();
                event.stopPropagation();
                
                if (this.checkValidity()) {
                    // Show success message
                    const successHTML = `
                        <div class="text-center py-5">
                            <i class="bi bi-check-circle-fill text-success fs-1 mb-3"></i>
                            <h3 class="fw-bold mb-3">Reservation Confirmed!</h3>
                            <p class="mb-4">Thank you for your reservation. We've sent a confirmation email with all the details.</p>
                            <a href="{{ url('/') }}" class="btn btn-brown rounded-pill px-5">
                                <i class="bi bi-house me-2"></i> Back to Home
                            </a>
                        </div>
                    `;
                    
                    reservationForm.innerHTML = successHTML;
                }
                
                this.classList.add('was-validated');
            }, false);
        });
    </script>
@endsection