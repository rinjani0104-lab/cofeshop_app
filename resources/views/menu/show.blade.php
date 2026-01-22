@extends('layouts.app')

@section('title', 'Menu Item - Cafein Holic')

@section('content')
    <!-- Menu Detail -->
    <section class="py-5">
        <div class="container">
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-brown text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/menu') }}" class="text-brown text-decoration-none">Menu</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $menuItem->name }}</li>
                </ol>
            </nav>
            
            <div class="row g-5">
                <!-- Product Image & Gallery -->
                <div class="col-lg-6">
                    <div class="product-image-main mb-4">
                        <img src="{{ $menuItem->image }}" 
                             alt="{{ $menuItem->name }}" 
                             class="img-fluid rounded-3 shadow-lg w-100" 
                             id="mainImage"
                             style="height: 400px; object-fit: cover;">
                    </div>
                    
                    @if(isset($menuItem->gallery) && count($menuItem->gallery) > 0)
                    <div class="product-gallery">
                        <h5 class="fw-bold mb-3">Gallery</h5>
                        <div class="row g-2">
                            @foreach($menuItem->gallery as $index => $image)
                            <div class="col-3">
                                <img src="{{ $image }}" 
                                     alt="{{ $menuItem->name }} - Image {{ $index + 1 }}"
                                     class="img-fluid rounded cursor-pointer gallery-thumb"
                                     data-image="{{ $image }}"
                                     style="height: 80px; width: 100%; object-fit: cover;">
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
                
                <!-- Product Details -->
                <div class="col-lg-6">
                    <div class="product-details">
                        <!-- Badges -->
                        <div class="d-flex gap-2 mb-3">
                            @if($menuItem->is_popular)
                            <span class="badge bg-brown-light text-white">Popular</span>
                            @endif
                            @if($menuItem->is_new)
                            <span class="badge bg-beige text-brown-dark">New</span>
                            @endif
                            @if($menuItem->is_seasonal)
                            <span class="badge bg-brown text-white">Seasonal</span>
                            @endif
                        </div>
                        
                        <!-- Title & Price -->
                        <h1 class="fw-bold text-brown-dark mb-3">{{ $menuItem->name }}</h1>
                        <div class="d-flex align-items-center mb-4">
                            <h2 class="fw-bold text-brown me-3 mb-0">${{ number_format($menuItem->price, 2) }}</h2>
                            <div class="rating">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= floor($menuItem->rating))
                                        <i class="bi bi-star-fill text-warning"></i>
                                    @elseif($i <= $menuItem->rating)
                                        <i class="bi bi-star-half text-warning"></i>
                                    @else
                                        <i class="bi bi-star text-warning"></i>
                                    @endif
                                @endfor
                                <span class="text-muted ms-2">({{ $menuItem->review_count }} reviews)</span>
                            </div>
                        </div>
                        
                        <!-- Description -->
                        <div class="mb-4">
                            <h5 class="fw-bold mb-2">Description</h5>
                            <p class="text-muted">{{ $menuItem->description }}</p>
                        </div>
                        
                        <!-- Details -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h5 class="fw-bold mb-2">Details</h5>
                                <ul class="list-unstyled">
                                    @if($menuItem->category)
                                    <li class="mb-1">
                                        <i class="bi bi-tag me-2 text-brown"></i>
                                        <strong>Category:</strong> {{ $menuItem->category }}
                                    </li>
                                    @endif
                                    @if($menuItem->size)
                                    <li class="mb-1">
                                        <i class="bi bi-arrows-fullscreen me-2 text-brown"></i>
                                        <strong>Size:</strong> {{ $menuItem->size }}
                                    </li>
                                    @endif
                                    @if($menuItem->calories)
                                    <li class="mb-1">
                                        <i class="bi bi-fire me-2 text-brown"></i>
                                        <strong>Calories:</strong> {{ $menuItem->calories }} kcal
                                    </li>
                                    @endif
                                    @if($menuItem->preparation_time)
                                    <li class="mb-1">
                                        <i class="bi bi-clock me-2 text-brown"></i>
                                        <strong>Prep Time:</strong> {{ $menuItem->preparation_time }} mins
                                    </li>
                                    @endif
                                </ul>
                            </div>
                            
                            @if($menuItem->ingredients && count($menuItem->ingredients) > 0)
                            <div class="col-md-6">
                                <h5 class="fw-bold mb-2">Ingredients</h5>
                                <div class="d-flex flex-wrap gap-2">
                                    @foreach($menuItem->ingredients as $ingredient)
                                    <span class="badge bg-cream text-brown-dark">{{ $ingredient }}</span>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                        </div>
                        
                        <!-- Customization Options -->
                        @if($menuItem->customizations && count($menuItem->customizations) > 0)
                        <div class="customization-options mb-4">
                            <h5 class="fw-bold mb-3">Customize Your Order</h5>
                            
                            @foreach($menuItem->customizations as $customization)
                            <div class="mb-3">
                                <label class="form-label fw-bold">{{ $customization->name }}</label>
                                <div class="d-flex flex-wrap gap-2">
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
                                            <small class="text-brown">+${{ number_format($option->price, 2) }}</small>
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
                        <div class="card border-0 bg-cream p-4 rounded-3 mb-4">
                            <div class="row align-items-center">
                                <div class="col-md-4 mb-3 mb-md-0">
                                    <div class="input-group">
                                        <button class="btn btn-outline-brown quantity-btn" type="button" data-action="decrease">
                                            <i class="bi bi-dash"></i>
                                        </button>
                                        <input type="text" class="form-control text-center border-brown" 
                                               value="1" id="quantity" readonly style="max-width: 60px;">
                                        <button class="btn btn-outline-brown quantity-btn" type="button" data-action="increase">
                                            <i class="bi bi-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                
                                <div class="col-md-8">
                                    <button type="button" class="btn btn-brown w-100 py-3 rounded-pill add-to-cart-btn">
                                        <i class="bi bi-cart-plus me-2"></i> Add to Cart - 
                                        <span id="totalPrice">${{ number_format($menuItem->price, 2) }}</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Additional Info -->
                        <div class="additional-info">
                            <div class="row g-3">
                                <div class="col-6">
                                    <div class="text-center p-3 border rounded-3">
                                        <i class="bi bi-truck text-brown fs-4 mb-2"></i>
                                        <p class="mb-0 small">Free delivery on orders over $20</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-center p-3 border rounded-3">
                                        <i class="bi bi-clock-history text-brown fs-4 mb-2"></i>
                                        <p class="mb-0 small">Ready in {{ $menuItem->preparation_time ?? 10 }} minutes</p>
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
                <h3 class="fw-bold text-center mb-5">You Might Also Like</h3>
                
                <div class="row g-4">
                    @foreach($relatedItems as $item)
                    <div class="col-lg-3 col-md-6">
                        <div class="menu-card hover-lift">
                            <img src="{{ $item->image }}" class="card-img-top" alt="{{ $item->name }}">
                            <div class="card-body p-3">
                                <h5 class="card-title fw-bold mb-1">{{ $item->name }}</h5>
                                <p class="card-text text-muted small mb-2">{{ Str::limit($item->description, 50) }}</p>
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
            const galleryThumbs = document.querySelectorAll('.gallery-thumb');
            const mainImage = document.getElementById('mainImage');
            
            galleryThumbs.forEach(thumb => {
                thumb.addEventListener('click', function() {
                    const newImage = this.getAttribute('data-image');
                    mainImage.src = newImage;
                    
                    // Update active state
                    galleryThumbs.forEach(t => t.classList.remove('active'));
                    this.classList.add('active');
                    this.style.border = '2px solid var(--brown)';
                });
            });
            
            // Quantity controls
            const quantityInput = document.getElementById('quantity');
            const quantityButtons = document.querySelectorAll('.quantity-btn');
            const basePrice = {{ $menuItem->price }};
            const totalPriceElement = document.getElementById('totalPrice');
            
            quantityButtons.forEach(button => {
                button.addEventListener('click', function() {
                    let quantity = parseInt(quantityInput.value);
                    const action = this.getAttribute('data-action');
                    
                    if (action === 'increase') {
                        quantity++;
                    } else if (action === 'decrease' && quantity > 1) {
                        quantity--;
                    }
                    
                    quantityInput.value = quantity;
                    updateTotalPrice(quantity);
                });
            });
            
            function updateTotalPrice(quantity) {
                const totalPrice = basePrice * quantity;
                totalPriceElement.textContent = `$${totalPrice.toFixed(2)}`;
            }
            
            // Add to cart functionality
            const addToCartBtn = document.querySelector('.add-to-cart-btn');
            
            addToCartBtn.addEventListener('click', function() {
                const quantity = parseInt(quantityInput.value);
                const customizations = [];
                
                // Gather customization options (simplified version)
                document.querySelectorAll('input[type="radio"]:checked, input[type="checkbox"]:checked').forEach(input => {
                    customizations.push({
                        name: input.name,
                        value: input.id.replace('option-', '').replace(/-/g, ' ')
                    });
                });
                
                // Show success feedback
                const originalText = this.innerHTML;
                
                this.innerHTML = `
                    <i class="bi bi-check-circle me-2"></i> Added to Cart!
                    <span class="small d-block">${quantity} x {{ $menuItem->name }}</span>
                `;
                this.disabled = true;
                this.classList.remove('btn-brown');
                this.classList.add('btn-success');
                
                // Reset button after 3 seconds
                setTimeout(() => {
                    this.innerHTML = originalText;
                    this.disabled = false;
                    this.classList.remove('btn-success');
                    this.classList.add('btn-brown');
                }, 3000);
                
                // In a real application, you would send this data to your server
                console.log('Added to cart:', {
                    itemId: {{ $menuItem->id }},
                    name: '{{ $menuItem->name }}',
                    quantity: quantity,
                    customizations: customizations,
                    totalPrice: basePrice * quantity
                });
            });
            
            // Update total price when customizations change
            document.querySelectorAll('input[type="radio"], input[type="checkbox"]').forEach(input => {
                input.addEventListener('change', function() {
                    const quantity = parseInt(quantityInput.value);
                    updateTotalPrice(quantity);
                });
            });
        });
    </script>
    
    <style>
        .gallery-thumb {
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .gallery-thumb:hover {
            transform: scale(1.05);
        }
        
        .gallery-thumb.active {
            border: 2px solid var(--brown) !important;
        }
        
        .quantity-btn {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        #quantity {
            font-weight: bold;
            background-color: white;
        }
        
        .form-check-input:checked {
            background-color: var(--brown);
            border-color: var(--brown);
        }
    </style>
@endsection