@extends('layouts.app')

@section('title', 'Order Online - Cafein Holic')

@section('content')
    <!-- Order Hero -->
    <section class="hero-section" style="background-image: linear-gradient(rgba(60, 42, 33, 0.9), rgba(60, 42, 33, 0.9)), url('https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80'); padding: 6rem 0;">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-3">Order Online</h1>
                    <p class="lead mb-0">Get your favorite coffee delivered or ready for pickup</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Order Form -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card border-0 shadow-lg rounded-3 overflow-hidden">
                        <div class="row g-0">
                            <!-- Order Summary Sidebar -->
                            <div class="col-lg-5 bg-brown-dark text-cream p-4">
                                <h3 class="fw-bold mb-4"><i class="bi bi-cart3 me-2"></i> Your Order</h3>
                                
                                <div class="order-items mb-4">
                                    <!-- Sample order items -->
                                    <div class="order-item d-flex justify-content-between mb-3 pb-3 border-bottom border-cream-light">
                                        <div>
                                            <h6 class="fw-bold mb-1">Artisan Cold Brew</h6>
                                            <small class="text-beige">Quantity: 1</small>
                                        </div>
                                        <span class="fw-bold">$5.50</span>
                                    </div>
                                    <div class="order-item d-flex justify-content-between mb-3 pb-3 border-bottom border-cream-light">
                                        <div>
                                            <h6 class="fw-bold mb-1">Croissant</h6>
                                            <small class="text-beige">Quantity: 2</small>
                                        </div>
                                        <span class="fw-bold">$8.00</span>
                                    </div>
                                </div>
                                
                                <div class="order-summary">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Subtotal</span>
                                        <span>$13.50</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Delivery Fee</span>
                                        <span>$2.50</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3 fw-bold fs-5">
                                        <span>Total</span>
                                        <span>$16.00</span>
                                    </div>
                                </div>
                                
                                <div class="mt-4">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="deliveryOption" id="pickup" checked>
                                        <label class="form-check-label" for="pickup">
                                            <i class="bi bi-shop me-2"></i> Pickup in Store
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="deliveryOption" id="delivery">
                                        <label class="form-check-label" for="delivery">
                                            <i class="bi bi-truck me-2"></i> Home Delivery
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Form Section -->
                            <div class="col-lg-7 p-4">
                                <h3 class="fw-bold mb-4 text-brown">Delivery Information</h3>
                                
                                <form class="needs-validation" novalidate>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="firstName" class="form-label">First Name *</label>
                                            <input type="text" class="form-control" id="firstName" required>
                                            <div class="invalid-feedback">
                                                Please enter your first name.
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="lastName" class="form-label">Last Name *</label>
                                            <input type="text" class="form-control" id="lastName" required>
                                        </div>
                                        
                                        <div class="col-12">
                                            <label for="phone" class="form-label">Phone Number *</label>
                                            <input type="tel" class="form-control" id="phone" required>
                                        </div>
                                        
                                        <div class="col-12">
                                            <label for="email" class="form-label">Email Address *</label>
                                            <input type="email" class="form-control" id="email" required>
                                        </div>
                                        
                                        <div class="col-12">
                                            <label for="address" class="form-label">Delivery Address</label>
                                            <textarea class="form-control" id="address" rows="2"></textarea>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label for="date" class="form-label">Preferred Date</label>
                                            <input type="date" class="form-control" id="date">
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label for="time" class="form-label">Preferred Time</label>
                                            <select class="form-select" id="time">
                                                <option selected>Select time</option>
                                                <option>8:00 AM</option>
                                                <option>9:00 AM</option>
                                                <option>10:00 AM</option>
                                                <option>11:00 AM</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-12">
                                            <label for="notes" class="form-label">Special Instructions</label>
                                            <textarea class="form-control" id="notes" rows="3" placeholder="Any special requests or dietary restrictions..."></textarea>
                                        </div>
                                        
                                        <div class="col-12 mt-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="terms" required>
                                                <label class="form-check-label" for="terms">
                                                    I agree to the <a href="#" class="text-brown">terms and conditions</a>
                                                </label>
                                                <div class="invalid-feedback">
                                                    You must agree before submitting.
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12 mt-4">
                                            <button type="submit" class="btn btn-brown w-100 py-3 rounded-pill">
                                                <i class="bi bi-check-circle me-2"></i> Place Order
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection