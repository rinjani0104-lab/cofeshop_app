<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Cafein Holic Admin</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <style>
        :root {
            --brown-dark: #3C2A21;
            --brown: #5C3D2E;
            --brown-light: #B85C38;
            --beige: #E0C097;
            --cream: #F7F3E9;
            --cream-light: #FFFBF5;
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, 
                rgba(247, 243, 233, 0.9) 0%, 
                rgba(255, 251, 245, 0.9) 100%),
                url('https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            max-width: 420px;
            width: 100%;
            animation: fadeIn 0.8s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(60, 42, 33, 0.1);
            border: none;
        }

        .login-header {
            background: linear-gradient(135deg, var(--brown-dark), var(--brown));
            padding: 40px 30px;
            text-align: center;
            color: white;
        }

        .login-header .logo {
            font-family: 'Georgia', serif;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .login-header .subtitle {
            color: var(--beige);
            font-size: 0.9rem;
            letter-spacing: 2px;
        }

        .login-body {
            padding: 40px 30px;
        }

        .form-control {
            border: 2px solid var(--cream);
            border-radius: 10px;
            padding: 12px 15px;
            transition: var(--transition);
        }

        .form-control:focus {
            border-color: var(--brown);
            box-shadow: 0 0 0 0.25rem rgba(92, 61, 46, 0.25);
        }

        .input-group-text {
            background: var(--cream);
            border: 2px solid var(--cream);
            border-right: none;
            color: var(--brown);
        }

        .form-control:focus + .input-group-text {
            border-color: var(--brown);
        }

        .btn-brown {
            background-color: var(--brown);
            color: white;
            border: none;
            padding: 12px;
            border-radius: 10px;
            font-weight: 600;
            transition: var(--transition);
            width: 100%;
        }

        .btn-brown:hover {
            background-color: var(--brown-light);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(92, 61, 46, 0.2);
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .form-check-input:checked {
            background-color: var(--brown);
            border-color: var(--brown);
        }

        .forgot-link {
            color: var(--brown);
            text-decoration: none;
            font-size: 0.9rem;
            transition: var(--transition);
        }

        .forgot-link:hover {
            color: var(--brown-light);
            text-decoration: underline;
        }

        .divider {
            text-align: center;
            margin: 25px 0;
            position: relative;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: var(--cream);
        }

        .divider span {
            background: white;
            padding: 0 15px;
            color: var(--brown-dark);
            font-size: 0.9rem;
        }

        .social-login {
            display: flex;
            gap: 15px;
            margin-bottom: 25px;
        }

        .social-btn {
            flex: 1;
            padding: 10px;
            border: 2px solid var(--cream);
            border-radius: 10px;
            background: white;
            color: var(--brown-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: var(--transition);
            text-decoration: none;
        }

        .social-btn:hover {
            border-color: var(--brown);
            background: var(--cream);
            transform: translateY(-2px);
        }

        .login-footer {
            text-align: center;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid var(--cream);
        }

        .login-footer a {
            color: var(--brown);
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
        }

        .login-footer a:hover {
            color: var(--brown-light);
            text-decoration: underline;
        }

        .back-home {
            position: fixed;
            top: 20px;
            left: 20px;
        }

        .back-home a {
            color: var(--brown);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: var(--transition);
        }

        .back-home a:hover {
            color: var(--brown-light);
        }

        /* Animations */
        .floating {
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        /* Responsive */
        @media (max-width: 576px) {
            .login-header {
                padding: 30px 20px;
            }
            
            .login-body {
                padding: 30px 20px;
            }
            
            .social-login {
                flex-direction: column;
            }
            
            .back-home {
                position: relative;
                top: 0;
                left: 0;
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Back to Home -->
    <div class="back-home">
        <a href="{{ url('/') }}">
            <i class="bi bi-arrow-left"></i> Back to Cafein Holic
        </a>
    </div>

    <!-- Login Container -->
    <div class="login-container">
        <div class="login-card">
            <!-- Header -->
            <div class="login-header">
                <div class="logo floating">
                    <i class="bi bi-cup-hot-fill me-2"></i>Cafein Holic
                </div>
                <div class="subtitle">ADMIN PANEL</div>
            </div>

            <!-- Body -->
            <div class="login-body">
                <h4 class="text-center mb-4 fw-bold text-brown-dark">Welcome Back</h4>
                <p class="text-center text-muted mb-4">Please sign in to your account</p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    
                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-envelope"></i>
                            </span>
                            <input type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email') }}" 
                                   placeholder="admin@cafeinholic.com" 
                                   required 
                                   autofocus>
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-lock"></i>
                            </span>
                            <input type="password" 
                                   class="form-control @error('password') is-invalid @enderror" 
                                   id="password" 
                                   name="password" 
                                   placeholder="••••••••" 
                                   required>
                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Remember & Forgot -->
                    <div class="remember-forgot">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                Remember me
                            </label>
                        </div>
                        <a href="#" class="forgot-link">
                            Forgot Password?
                        </a>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-brown mb-3">
                        <i class="bi bi-box-arrow-in-right me-2"></i> Sign In
                    </button>
                </form>

                <!-- Divider -->
                <div class="divider">
                    <span>Or continue with</span>
                </div>

                <!-- Social Login -->
                <div class="social-login">
                    <a href="#" class="social-btn">
                        <i class="bi bi-google"></i>
                        <span>Google</span>
                    </a>
                    <a href="#" class="social-btn">
                        <i class="bi bi-facebook"></i>
                        <span>Facebook</span>
                    </a>
                </div>

                <!-- Footer -->
                <div class="login-footer">
                    <p class="mb-2">Don't have an account? <a href="{{ route('register') }}">Sign up</a></p>
                    <small class="text-muted">© 2023 Cafein Holic. All rights reserved.</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle Password Visibility
            const togglePassword = document.getElementById('togglePassword');
            const password = document.getElementById('password');
            
            togglePassword.addEventListener('click', function() {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                this.innerHTML = type === 'password' ? '<i class="bi bi-eye"></i>' : '<i class="bi bi-eye-slash"></i>';
            });
            
            // Form validation
            const form = document.querySelector('form');
            const email = document.getElementById('email');
            const passwordInput = document.getElementById('password');
            
            form.addEventListener('submit', function(e) {
                let isValid = true;
                
                // Email validation
                if (!email.value || !email.value.includes('@')) {
                    showError(email, 'Please enter a valid email address');
                    isValid = false;
                } else {
                    removeError(email);
                }
                
                // Password validation
                if (!passwordInput.value || passwordInput.value.length < 6) {
                    showError(passwordInput, 'Password must be at least 6 characters');
                    isValid = false;
                } else {
                    removeError(passwordInput);
                }
                
                if (!isValid) {
                    e.preventDefault();
                }
            });
            
            function showError(input, message) {
                const formGroup = input.closest('.mb-3');
                let errorDiv = formGroup.querySelector('.error-message');
                
                if (!errorDiv) {
                    errorDiv = document.createElement('div');
                    errorDiv.className = 'error-message text-danger small mt-1';
                    formGroup.appendChild(errorDiv);
                }
                
                errorDiv.textContent = message;
                input.classList.add('is-invalid');
            }
            
            function removeError(input) {
                const formGroup = input.closest('.mb-3');
                const errorDiv = formGroup.querySelector('.error-message');
                
                if (errorDiv) {
                    errorDiv.remove();
                }
                
                input.classList.remove('is-invalid');
            }
            
            // Real-time validation
            email.addEventListener('input', function() {
                if (this.value && this.value.includes('@')) {
                    removeError(this);
                }
            });
            
            passwordInput.addEventListener('input', function() {
                if (this.value.length >= 6) {
                    removeError(this);
                }
            });
            
            // Add floating animation to coffee icon
            const coffeeIcon = document.querySelector('.logo i');
            coffeeIcon.classList.add('floating');
            
            // Auto-focus email field
            email.focus();
        });
    </script>
</body>
</html>