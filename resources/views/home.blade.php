@extends('layouts.app')

@section('title', 'Home - Premium Coffee Experience')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 fade-in">
                    <h1 class="display-4 fw-bold mb-4">Experience Coffee Perfection</h1>
                    <p class="lead mb-4">At Cafein Holic, we craft exceptional coffee experiences using the finest beans sourced from sustainable farms around the world.</p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="{{ url('/menu') }}" class="btn btn-brown rounded-pill px-4 py-3">
                            <i class="bi bi-cup-hot me-2"></i> Explore Menu
                        </a>
                        <a href="{{ url('/reservation') }}" class="btn btn-outline-light rounded-pill px-4 py-3">
                            <i class="bi bi-calendar-check me-2"></i> Book a Table
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 text-center fade-in">
                    <img src="https://images.unsplash.com/photo-1511920170033-f8396924c348?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                         alt="Artisan Coffee" class="img-fluid rounded-3 shadow-lg">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5 bg-cream">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4 text-center fade-in">
                    <div class="p-4">
                        <div class="icon-wrapper bg-brown text-cream rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 70px; height: 70px;">
                            <i class="bi bi-tree fs-3"></i>
                        </div>
                        <h4 class="fw-bold mb-2">Sustainable Sourcing</h4>
                        <p>Ethically sourced beans from certified sustainable farms worldwide.</p>
                    </div>
                </div>
                <div class="col-md-4 text-center fade-in">
                    <div class="p-4">
                        <div class="icon-wrapper bg-brown text-cream rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 70px; height: 70px;">
                            <i class="bi bi-award fs-3"></i>
                        </div>
                        <h4 class="fw-bold mb-2">Award Winning</h4>
                        <p>Recognized for excellence in coffee preparation and service.</p>
                    </div>
                </div>
                <div class="col-md-4 text-center fade-in">
                    <div class="p-4">
                        <div class="icon-wrapper bg-brown text-cream rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 70px; height: 70px;">
                            <i class="bi bi-heart fs-3"></i>
                        </div>
                        <h4 class="fw-bold mb-2">Crafted with Love</h4>
                        <p>Every cup is prepared with passion and attention to detail.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Menu -->
    <section>
        <div class="container">
            <h2 class="text-center section-title">Featured <span class="text-brown">Specialties</span></h2>
            <p class="text-center text-muted mb-5">Discover our signature creations crafted by expert baristas</p>
            
            <div class="row g-4">
                @foreach($featuredItems as $item)
                <div class="col-lg-3 col-md-6 fade-in">
                    <div class="menu-card shadow-sm">
                        <div class="position-relative overflow-hidden">
                            <img src="{{ $item->image }}" class="card-img-top" alt="{{ $item->name }}">
                            @if($item->is_new)
                            <span class="card-badge">NEW</span>
                            @endif
                        </div>
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="card-title fw-bold mb-0">{{ $item->name }}</h5>
                                <span class="text-brown fw-bold">${{ number_format($item->price, 2) }}</span>
                            </div>
                            <p class="card-text text-muted small mb-3">{{ Str::limit($item->description, 80) }}</p>
                            <a href="{{ url('/menu/' . $item->id) }}" class="btn btn-outline-brown btn-sm rounded-pill">
                                View Details <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="text-center mt-5">
                <a href="{{ url('/menu') }}" class="btn btn-brown rounded-pill px-5 py-3">
                    View Full Menu <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-brown-dark text-cream">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h2 class="fw-bold mb-3">Ready for your coffee experience?</h2>
                    <p class="mb-0">Join us today for exceptional coffee in a cozy, modern atmosphere.</p>
                </div>
                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                    <a href="{{ url('/order/form') }}" class="btn btn-cream rounded-pill px-5 py-3">
                        Order Online <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script>
    // Sample featured items data - replace with your actual data
    const featuredItems = [
        {
            id: 1,
            name: "Artisan Cold Brew",
            description: "Smooth cold brew with notes of chocolate and caramel",
            price: 5.50,
            image: "https://images.unsplash.com/photo-1461023058943-07fcbe16d735?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
            is_new: true
        },
        {
            id: 2,
            name: "Hazelnut Latte",
            description: "Rich espresso with steamed milk and hazelnut syrup",
            price: 4.75,
            image: "https://images.unsplash.com/photo-1568901346375-23c9450c58cd?ixlib=rb-4.0.3&auto=format&fit=crop&w-800&q=80",
            is_new: false
        },
        {
            id: 3,
            name: "Matcha Frappé",
            description: "Premium matcha blended with ice and cream",
            price: 6.25,
            image: "https://images.unsplash.com/photo-1515823064-d6e0c04616a7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
            is_new: true
        },
        {
            id: 4,
            name: "Caramel Macchiato",
            description: "Vanilla syrup, steamed milk, espresso and caramel drizzle",
            price: 5.00,
            image: "https://images.unsplash.com/photo-1570196911496-66bd58a5b7b4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
            is_new: false
        }
    ];
</script>
@endsection