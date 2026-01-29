@extends('layouts.app')

@section('title', 'Register - Cafein Holic')

@section('content')
<div class="auth-container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-8 col-lg-6">
            <div class="auth-card card shadow-lg border-0">
                <!-- Register Header -->
                <div class="auth-header card-header bg-brown text-white text-center py-4 border-0">
                    <div class="auth-logo mb-3">
                        <i class="bi bi-cup-hot-fill fs-1"></i>
                    </div>
                    <h2 class="fw-bold mb-0">Join Cafein Holic</h2>
                    <p class="mb-0 text-beige">Create your account</p>
                </div>

                <!-- Register Form -->
                <div class="card-body p-4 p-md-5">
                    <form method="POST" action="{{ route('register') }}" class="auth-form">
                        @csrf

                        <!-- Name -->
                        <div class="form-group mb-3">
                            <label for="name" class="form-label fw-medium">
                                <i class="bi bi-person me-2"></i>Full Name
                            </label>
                            <input id="name" type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   name="name" value="{{ old('name') }}" 
                                   placeholder="John Doe" 
                                   required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="form-group mb-3">
                            <label for="email" class="form-label fw-medium">
                                <i class="bi bi-envelope me-2"></i>Email Address
                            </label>
                            <input id="email" type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   name="email" value="{{ old('email') }}" 
                                   placeholder="you@example.com" 
                                   required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Phone -->
                        <div class="form-group mb-3">
                            <label for="phone" class="form-label fw-medium">
                                <i class="bi bi-phone me-2"></i>Phone Number
                            </label>
                            <input id="phone" type="tel" 
                                   class="form-control @error('phone') is-invalid @enderror" 
                                   name="phone" value="{{ old('phone') }}" 
                                   placeholder="+62 812 3456 7890" 
                                   required>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="form-group mb-3">
                            <label for="password" class="form-label fw-medium">
                                <i class="bi bi-lock me-2"></i>Password
                            </label>
                            <div class="input-group">
                                <input id="password" type="password" 
                                       class="form-control @error('password') is-invalid @enderror" 
                                       name="password" 
                                       placeholder="••••••••" 
                                       required autocomplete="new-password">
                                <button class="btn btn-outline-brown password-toggle" type="button">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                            <small class="form-text text-muted">
                                Minimum 8 characters with letters and numbers
                            </small>
                            @error('password')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-group mb-4">
                            <label for="password-confirm" class="form-label fw-medium">
                                <i class="bi bi-lock me-2"></i>Confirm Password
                            </label>
                            <div class="input-group">
                                <input id="password-confirm" type="password" 
                                       class="form-control" 
                                       name="password_confirmation" 
                                       placeholder="••••••••" 
                                       required autocomplete="new-password">
                                <button class="btn btn-outline-brown password-toggle" type="button">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Terms & Conditions -->
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" name="terms" 
                                   id="terms" {{ old('terms') ? 'checked' : '' }} required>
                            <label class="form-check-label" for="terms">
                                I agree to the 
                                <a href="{{ url('/terms') }}" class="text-brown">Terms & Conditions</a>
                                and 
                                <a href="{{ url('/privacy') }}" class="text-brown">Privacy Policy</a>
                            </label>
                            @error('terms')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Newsletter -->
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" name="newsletter" 
                                   id="newsletter" {{ old('newsletter') ? 'checked' : '' }}>
                            <label class="form-check-label" for="newsletter">
                                Subscribe to newsletter for updates and promotions
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid mb-4">
                            <button type="submit" class="btn btn-brown btn-lg">
                                <i class="bi bi-person-plus me-2"></i>Create Account
                            </button>
                        </div>

                        <!-- Login Link -->
                        <div class="text-center">
                            <p class="mb-0">Already have an account?
                                <a href="{{ route('login') }}" class="text-brown fw-medium text-decoration-none">
                                    Sign in here
                                </a>
                            </p>
                        </div>
                    </form>
                </div>

                <!-- Footer -->
                <div class="card-footer bg-transparent border-0 text-center py-3">
                    <a href="{{ route('home') }}" class="text-brown text-decoration-none">
                        <i class="bi bi-arrow-left me-2"></i>Back to Cafein Holic
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Password toggle
        document.querySelectorAll('.password-toggle').forEach(toggle => {
            toggle.addEventListener('click', function() {
                const input = this.closest('.input-group').querySelector('input');
                const icon = this.querySelector('i');
                
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.remove('bi-eye');
                    icon.classList.add('bi-eye-slash');
                } else {
                    input.type = 'password';
                    icon.classList.remove('bi-eye-slash');
                    icon.classList.add('bi-eye');
                }
            });
        });

        // Form validation
        const form = document.querySelector('.auth-form');
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('password-confirm');

        form.addEventListener('submit', function(e) {
            let isValid = true;

            // Password validation
            if (password.value.length < 8) {
                showError(password, 'Password must be at least 8 characters');
                isValid = false;
            } else if (!/(?=.*[a-zA-Z])(?=.*\d)/.test(password.value)) {
                showError(password, 'Password must contain letters and numbers');
                isValid = false;
            } else {
                clearError(password);
            }

            // Confirm password
            if (password.value !== confirmPassword.value) {
                showError(confirmPassword, 'Passwords do not match');
                isValid = false;
            } else {
                clearError(confirmPassword);
            }

            // Terms check
            const terms = document.getElementById('terms');
            if (!terms.checked) {
                showError(terms, 'You must agree to the terms and conditions');
                isValid = false;
            } else {
                clearError(terms);
            }

            if (!isValid) {
                e.preventDefault();
            }
        });

        function showError(input, message) {
            const formGroup = input.closest('.form-group') || input.closest('.form-check');
            let errorDiv = formGroup.querySelector('.error-message');
            
            if (!errorDiv) {
                errorDiv = document.createElement('div');
                errorDiv.className = 'error-message text-danger small mt-1';
                formGroup.appendChild(errorDiv);
            }
            
            errorDiv.textContent = message;
            input.classList.add('is-invalid');
        }

        function clearError(input) {
            const formGroup = input.closest('.form-group') || input.closest('.form-check');
            const errorDiv = formGroup.querySelector('.error-message');
            
            if (errorDiv) {
                errorDiv.remove();
            }
            
            input.classList.remove('is-invalid');
        }

        // Real-time validation
        password.addEventListener('input', function() {
            if (this.value.length >= 8 && /(?=.*[a-zA-Z])(?=.*\d)/.test(this.value)) {
                clearError(this);
            }
        });

        confirmPassword.addEventListener('input', function() {
            if (this.value === password.value) {
                clearError(this);
            }
        });
    });
</script>
@endsection