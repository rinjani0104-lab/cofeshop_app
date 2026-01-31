@extends('layouts.app')

@section('title', 'Login - Cafein Holic')

@section('content')
<div class="auth-container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-8 col-lg-6">
            <div class="auth-card card shadow-lg border-0">
                <!-- Login Header -->
                <div class="auth-header card-header bg-brown text-white text-center py-4 border-0">
                    <div class="auth-logo mb-3">
                        <i class="bi bi-cup-hot-fill fs-1"></i>
                    </div>
                    <h2 class="fw-bold mb-0">Welcome Back</h2>
                    <p class="mb-0 text-beige">Sign in to your account</p>
                </div>

                <!-- Login Form -->
                <div class="card-body p-4 p-md-5">
                    <form method="POST" action="{{ route('login') }}" class="auth-form">
                        @csrf

                        <!-- Email Input -->
                        <div class="form-group mb-4">
                            <label for="email" class="form-label fw-medium">
                                <i class="bi bi-envelope me-2"></i>Email Address
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-cream border-end-0">
                                    <i class="bi bi-person text-brown"></i>
                                </span>
                                <input id="email" type="email" 
                                       class="form-control @error('email') is-invalid @enderror border-start-0" 
                                       name="email" value="{{ old('email') }}" 
                                       placeholder="you@example.com" 
                                       required autocomplete="email" autofocus>
                            </div>
                            @error('email')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Password Input -->
                        <div class="form-group mb-4">
                            <label for="password" class="form-label fw-medium">
                                <i class="bi bi-lock me-2"></i>Password
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-cream border-end-0">
                                    <i class="bi bi-key text-brown"></i>
                                </span>
                                <input id="password" type="password" 
                                       class="form-control @error('password') is-invalid @enderror border-start-0" 
                                       name="password" 
                                       placeholder="••••••••" 
                                       required autocomplete="current-password">
                                <button class="btn btn-outline-brown border-start-0 password-toggle" type="button">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                            @error('password')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Remember & Forgot -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" 
                                       id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    Remember me
                                </label>
                            </div>
                            @if (Route::has('password.request'))
                                <a class="text-brown text-decoration-none" href="{{ route('password.request') }}">
                                    Forgot Password?
                                </a>
                            @endif
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid mb-4">
                            <button type="submit" class="btn btn-brown btn-lg">
                                <i class="bi bi-box-arrow-in-right me-2"></i>Sign In
                            </button>
                        </div>

                        <!-- Register Link -->
                        <div class="text-center">
                            <p class="mb-0">Don't have an account?
                                <a href="{{ route('register') }}" class="text-brown fw-medium text-decoration-none">
                                    Sign up here
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
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');

        form.addEventListener('submit', function(e) {
            let isValid = true;

            // Email validation
            if (!emailInput.value || !isValidEmail(emailInput.value)) {
                showError(emailInput, 'Please enter a valid email address');
                isValid = false;
            } else {
                clearError(emailInput);
            }

            // Password validation
            if (!passwordInput.value || passwordInput.value.length < 6) {
                showError(passwordInput, 'Password must be at least 6 characters');
                isValid = false;
            } else {
                clearError(passwordInput);
            }

            if (!isValid) {
                e.preventDefault();
            }
        });

        function isValidEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }

        function showError(input, message) {
            const formGroup = input.closest('.form-group');
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
            const formGroup = input.closest('.form-group');
            const errorDiv = formGroup.querySelector('.error-message');
            
            if (errorDiv) {
                errorDiv.remove();
            }
            
            input.classList.remove('is-invalid');
        }

        // Real-time validation
        emailInput.addEventListener('input', function() {
            if (this.value && isValidEmail(this.value)) {
                clearError(this);
            }
        });

        passwordInput.addEventListener('input', function() {
            if (this.value.length >= 6) {
                clearError(this);
            }
        });
    });
</script>

<style>
    .auth-container {
        min-height: 100vh;
        background: linear-gradient(135deg, 
            rgba(247, 243, 233, 0.9) 0%, 
            rgba(255, 251, 245, 0.9) 100%),
            url('https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
        background-size: cover;
        background-position: center;
        padding: 20px;
    }

    .auth-card {
        border-radius: 20px;
        overflow: hidden;
        border: 1px solid rgba(224, 192, 151, 0.3);
    }

    .auth-header {
        border-radius: 20px 20px 0 0 !important;
    }

    .auth-logo {
        width: 70px;
        height: 70px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        backdrop-filter: blur(5px);
    }

    .form-group {
        position: relative;
    }

    .input-group-text {
        background: var(--cream) !important;
        border-color: var(--beige) !important;
    }

    .form-control {
        border-color: var(--beige);
        padding: 12px 15px;
        border-radius: 8px;
    }

    .form-control:focus {
        border-color: var(--brown);
        box-shadow: 0 0 0 0.25rem rgba(92, 61, 46, 0.25);
    }

    .password-toggle {
        border-color: var(--beige);
        border-left: none;
    }

    .password-toggle:hover {
        background: var(--cream);
        color: var(--brown);
    }

    .divider {
        position: relative;
        text-align: center;
    }

    .divider::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        height: 1px;
        background: var(--beige);
    }

    .divider span {
        position: relative;
        background: white;
        padding: 0 15px;
    }

    @media (max-width: 768px) {
        .auth-container {
            padding: 10px;
        }
        
        .auth-card {
            margin: 20px 0;
        }
    }
</style>
@endsection