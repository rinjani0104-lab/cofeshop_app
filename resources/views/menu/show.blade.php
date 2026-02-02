@extends('layouts.app')

@section('title', $menuItem->name . ' - Cafein Holic')

@section('content')
    <!-- Breadcrumb -->
    <div class="bg-cream py-3 border-bottom border-beige">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}" class="text-brown text-decoration-none">
                            <i class="bi bi-house me-1"></i>Home
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('/menu') }}" class="text-brown text-decoration-none">
                            <i class="bi bi-cup-hot me-1"></i>Menu
                        </a>
                    </li>
                    <li class="breadcrumb-item active text-brown-dark" aria-current="page">
                        {{ $menuItem->name }}
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Product Detail -->
    <section class="py-5">
        <div class="container">
            <div class="row g-5">
                <!-- Image Column -->
                <div class="col-lg-6">
                    <div class="position-relative">
                        <div class="main-image-wrapper rounded-3 overflow-hidden shadow-sm mb-4">
                            <img src="{{ $menuItem->image }}" 
                                 alt="{{ $menuItem->name }}" 
                                 class="img-fluid w-100" 
                                 id="mainImage"
                                 style="height: 400px; object-fit: cover;">
                        </div>
                        
                        @if(isset($menuItem->gallery) && count($menuItem->gallery) > 0)
                        <div class="gallery-wrapper">
                            <h6 class="fw-semibold mb-3 text-brown-dark">More Views</h6>
                            <div class="d-flex gap-2">
                                @foreach($menuItem->gallery as $index => $image)
                                <div class="gallery-thumb-wrapper">
                                    <img src="{{ $image }}" 
                                         alt="{{ $menuItem->name }} - View {{ $index + 1 }}"
                                         class="img-fluid rounded border cursor-pointer"
                                         data-image="{{ $image }}"
                                         style="width: 80px; height: 80px; object-fit: cover;">
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                
                <!-- Details Column -->
                <div class="col-lg-6">
                    <div class="product-details">
                        <!-- Header -->
                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h1 class="fw-bold text-brown-dark mb-0">{{ $menuItem->name }}</h1>
                                <div class="text-end">
                                    <h2 class="fw-bold text-brown mb-0">${{ number_format($menuItem->price, 2) }}</h2>
                                    <div class="rating small">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= floor($menuItem->rating))
                                                <i class="bi bi-star-fill text-warning"></i>
                                            @elseif($i <= $menuItem->rating)
                                                <i class="bi bi-star-half text-warning"></i>
                                            @else
                                                <i class="bi bi-star text-warning"></i>
                                            @endif
                                        @endfor
                                        <span class="text-muted ms-1">({{ $menuItem->review_count }})</span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Badges -->
                            <div class="d-flex flex-wrap gap-2 mb-3">
                                @if($menuItem->is_popular)
                                <span class="badge bg-brown-light text-white px-3 py-2">
                                    <i class="bi bi-fire me-1"></i> Most Popular
                                </span>
                                @endif
                                @if($menuItem->is_new)
                                <span class="badge bg-beige text-brown-dark px-3 py-2">
                                    <i class="bi bi-star me-1"></i> New Arrival
                                </span>
                                @endif
                                @if($menuItem->is_seasonal)
                                <span class="badge bg-brown text-white px-3 py-2">
                                    <i class="bi bi-tree me-1"></i> Seasonal Special
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <!-- Description -->
                        <div class="mb-5">
                            <h5 class="fw-semibold mb-3 text-brown-dark">
                                <i class="bi bi-info-circle me-2"></i>Description
                            </h5>
                            <p class="text-muted">{{ $menuItem->description }}</p>
                        </div>
                        
                        <!-- Details Grid -->
                        <div class="row mb-5">
                            <div class="col-md-6 mb-4">
                                <h6 class="fw-semibold mb-3 text-brown-dark">
                                    <i class="bi bi-tag me-2"></i>Product Details
                                </h6>
                                <ul class="list-unstyled">
                                    @if($menuItem->category)
                                    <li class="mb-2 d-flex align-items-center">
                                        <i class="bi bi-grid text-brown me-2"></i>
                                        <span class="text-muted">Category:</span>
                                        <span class="ms-2 fw-medium">{{ $menuItem->category }}</span>
                                    </li>
                                    @endif
                                    @if($menuItem->size)
                                    <li class="mb-2 d-flex align-items-center">
                                        <i class="bi bi-arrows-angle-expand text-brown me-2"></i>
                                        <span class="text-muted">Size:</span>
                                        <span class="ms-2 fw-medium">{{ $menuItem->size }}</span>
                                    </li>
                                    @endif
                                    @if($menuItem->calories)
                                    <li class="mb-2 d-flex align-items-center">
                                        <i class="bi bi-fire text-brown me-2"></i>
                                        <span class="text-muted">Calories:</span>
                                        <span class="ms-2 fw-medium">{{ $menuItem->calories }} kcal</span>
                                    </li>
                                    @endif
                                    @if($menuItem->preparation_time)
                                    <li class="d-flex align-items-center">
                                        <i class="bi bi-clock text-brown me-2"></i>
                                        <span class="text-muted">Prep Time:</span>
                                        <span class="ms-2 fw-medium">{{ $menuItem->preparation_time }} mins</span>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                            
                            @if($menuItem->ingredients && count($menuItem->ingredients) > 0)
                            <div class="col-md-6 mb-4">
                                <h6 class="fw-semibold mb-3 text-brown-dark">
                                    <i class="bi bi-basket me-2"></i>Ingredients
                                </h6>
                                <div class="d-flex flex-wrap gap-2">
                                    @foreach($menuItem->ingredients as $ingredient)
                                    <span class="badge bg-cream text-brown-dark border border-beige px-3 py-2">
                                        {{ $ingredient }}
                                    </span>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                        </div>
                        
                        <!-- Customization (if available) -->
                        @if($menuItem->customizations && count($menuItem->customizations) > 0)
                        <div class="customization-section mb-5">
                            <h5 class="fw-semibold mb-3 text-brown-dark">
                                <i class="bi bi-sliders me-2"></i>Customize Your Order
                            </h5>
                            
                            @foreach($menuItem->customizations as $customization)
                            <div class="mb-4">
                                <label class="form-label fw-medium mb-2">{{ $customization->name }}</label>
                                <div class="d-flex flex-wrap gap-3">
                                    @foreach($customization->options as $option)
                                    <div class="form-check">
                                        <input class="form-check-input" 
                                               type="{{ $customization->type === 'single' ? 'radio' : 'checkbox' }}" 
                                               name="{{ Str::slug($customization->name) }}" 
                                               id="option-{{ Str::slug($option->name) }}"
                                               {{ $option->is_default ? 'checked' : '' }}>
                                        <label class="form-check-label" for="option-{{ Str::slug($option->name) }}">
                                            {{ $option->name }}
                                            @if($option->price > 0)
                                            <span class="text-brown fw-medium ms-1">+${{ number_format($option->price, 2) }}</span>
                                            @endif
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                        
                        <!-- Add to Cart -->
                        <div class="card bg-cream border-0 rounded-3 p-4 mb-5">
                            <div class="row align-items-center">
                                <div class="col-md-4 mb-3 mb-md-0">
                                    <div class="quantity-control d-flex align-items-center">
                                        <button class="btn btn-outline-brown px-3" id="decreaseQty">
                                            <i class="bi bi-dash"></i>
                                        </button>
                                        <input type="text" class="form-control text-center mx-2 border-brown" 
                                               value="1" id="quantity" readonly style="max-width: 60px;">
                                        <button class="btn btn-outline-brown px-3" id="increaseQty">
                                            <i class="bi bi-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                
                                <div class="col-md-8">
                                    <button class="btn btn-brown w-100 py-3 rounded-pill" id="addToCart">
                                        <i class="bi bi-cart-plus me-2"></i> Add to Cart - 
                                        <span id="totalPrice">${{ number_format($menuItem->price, 2) }}</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Additional Info -->
                        <div class="additional-info">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="info-card p-3 border rounded-3 text-center">
                                        <i class="bi bi-truck text-brown fs-4 mb-2"></i>
                                        <p class="mb-0 small fw-medium">Free delivery on orders over $20</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-card p-3 border rounded-3 text-center">
                                        <i class="bi bi-clock-history text-brown fs-4 mb-2"></i>
                                        <p class="mb-0 small fw-medium">Ready in {{ $menuItem->preparation_time ?? 10 }} minutes</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Related Items -->
            @if(isset($relatedItems) && count($relatedItems) > 0)
            <div class="mt-5 pt-5 border-top">
                <div class="text-center mb-5">
                    <h3 class="fw-bold mb-3 text-brown-dark">You Might Also Like</h3>
                    <p class="text-muted">Discover similar items from our menu</p>
                </div>
                
                <div class="row g-4">
                    @foreach($relatedItems as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="related-card border-0 rounded-3 overflow-hidden shadow-sm">
                            <div class="related-image">
                                <img src="{{ $item->image }}" 
                                     class="img-fluid w-100" 
                                     alt="{{ $item->name }}"
                                     style="height: 180px; object-fit: cover;">
                            </div>
                            <div class="related-body p-3">
                                <h6 class="fw-bold mb-1 text-brown-dark">{{ $item->name }}</h6>
                                <p class="text-muted small mb-2">{{ Str::limit($item->description, 60) }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-brown fw-bold">${{ number_format($item->price, 2) }}</span>
                                    <a href="{{ url('/menu/' . $item->id) }}" class="btn btn-outline-brown btn-sm rounded-pill">
                                        View <i class="bi bi-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Gallery image switcher
            const galleryThumbs = document.querySelectorAll('.gallery-thumb-wrapper img');
            const mainImage = document.getElementById('mainImage');
            
            galleryThumbs.forEach(thumb => {
                thumb.addEventListener('click', function() {
                    const newImage = this.getAttribute('data-image');
                    mainImage.src = newImage;
                    
                    // Update active state
                    galleryThumbs.forEach(t => {
                        t.classList.remove('border-brown');
                        t.classList.add('border');
                    });
                    this.classList.remove('border');
                    this.classList.add('border-brown');
                    this.style.borderWidth = '2px';
                });
            });
            
            // Quantity controls
            const quantityInput = document.getElementById('quantity');
            const decreaseBtn = document.getElementById('decreaseQty');
            const increaseBtn = document.getElementById('increaseQty');
            const basePrice = {{ $menuItem->price }};
            const totalPriceElement = document.getElementById('totalPrice');
            
            decreaseBtn.addEventListener('click', function() {
                let quantity = parseInt(quantityInput.value);
                if (quantity > 1) {
                    quantity--;
                    quantityInput.value = quantity;
                    updateTotalPrice(quantity);
                }
            });
            
            increaseBtn.addEventListener('click', function() {
                let quantity = parseInt(quantityInput.value);
                quantity++;
                quantityInput.value = quantity;
                updateTotalPrice(quantity);
            });
            
            function updateTotalPrice(quantity) {
                const totalPrice = basePrice * quantity;
                totalPriceElement.textContent = `$${totalPrice.toFixed(2)}`;
            }
            
            // Add to cart functionality
            const addToCartBtn = document.getElementById('addToCart');
            
            addToCartBtn.addEventListener('click', function() {
                const quantity = parseInt(quantityInput.value);
                
                // Show loading state
                const originalText = this.innerHTML;
                this.innerHTML = `
                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                    Adding...
                `;
                this.disabled = true;
                
                // Simulate API call
                setTimeout(() => {
                    // Show success state
                    this.innerHTML = `
                        <i class="bi bi-check-circle me-2"></i> Added to Cart
                    `;
                    this.classList.remove('btn-brown');
                    this.classList.add('btn-success');
                    
                    // Reset after 2 seconds
                    setTimeout(() => {
                        this.innerHTML = originalText;
                        this.disabled = false;
                        this.classList.remove('btn-success');
                        this.classList.add('btn-brown');
                    }, 2000);
                }, 1000);
            });
            
            // Update total price when customizations change
            document.querySelectorAll('input[type="radio"], input[type="checkbox"]').forEach(input => {
                input.addEventListener('change', function() {
                    const quantity = parseInt(quantityInput.value);
                    updateTotalPrice(quantity);
                });
            });
            
            // Initialize first gallery thumb as active
            if (galleryThumbs.length > 0) {
                galleryThumbs[0].classList.remove('border');
                galleryThumbs[0].classList.add('border-brown');
                galleryThumbs[0].style.borderWidth = '2px';
            }
        });
    </script>
    
    <style>
        .breadcrumb-item + .breadcrumb-item::before {
            color: var(--brown);
        }
        
        .main-image-wrapper {
            transition: transform 0.3s ease;
        }
        
        .main-image-wrapper:hover {
            transform: scale(1.01);
        }
        
        .gallery-thumb-wrapper img {
            transition: all 0.3s ease;
            cursor: pointer;
            border: 1px solid transparent;
        }
        
        .gallery-thumb-wrapper img:hover {
            transform: scale(1.05);
        }
        
        .quantity-control .btn {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .quantity-control .form-control {
            font-weight: 600;
            background: white;
        }
        
        .customization-section .form-check-input:checked {
            background-color: var(--brown);
            border-color: var(--brown);
        }
        
        .customization-section .form-check-label {
            cursor: pointer;
            padding-left: 0.25rem;
        }
        
        .related-card {
            transition: all 0.3s ease;
        }
        
        .related-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(92, 61, 46, 0.1) !important;
        }
        
        .related-image {
            overflow: hidden;
        }
        
        .related-card img {
            transition: transform 0.5s ease;
        }
        
        .related-card:hover img {
            transform: scale(1.05);
        }
        
        .info-card {
            transition: all 0.3s ease;
            background: white;
        }
        
        .info-card:hover {
            background: var(--cream);
            transform: translateY(-2px);
        }
        
        @media (max-width: 768px) {
            .main-image-wrapper img {
                height: 300px !important;
            }
            
            .gallery-thumb-wrapper img {
                width: 60px !important;
                height: 60px !important;
            }
        }
    </style>
@endsection