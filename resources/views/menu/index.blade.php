@extends('layouts.app')

@section('title', 'Menu - Cafein Holic')

@section('content')
    <!-- Menu Hero -->
    <section class="hero-section" style="background-image: linear-gradient(rgba(60, 42, 33, 0.85), rgba(60, 42, 33, 0.85)), url('https://images.unsplash.com/photo-1554118811-1e0d58224f24?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80'); padding: 6rem 0;">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-3">Our Coffee Menu</h1>
                    <p class="lead mb-0">Discover our carefully curated selection of specialty coffees, teas, and pastries</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Menu Navigation -->
    <section class="sticky-top bg-cream-light py-3 shadow-sm" style="top: 76px; z-index: 1020;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-auto">
                    <nav class="nav nav-pills">
                        <a class="nav-link rounded-pill mx-1 active" href="#coffee">Coffee</a>
                        <a class="nav-link rounded-pill mx-1" href="#tea">Tea</a>
                        <a class="nav-link rounded-pill mx-1" href="#pastries">Pastries</a>
                        <a class="nav-link rounded-pill mx-1" href="#specialty">Specialty</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Coffee Menu -->
    <section id="coffee" class="pt-5">
        <div class="container">
            <h2 class="section-title text-center mb-5"><i class="bi bi-cup-hot me-2"></i> Coffee Selection</h2>
            
            <div class="row g-4">
                @foreach($coffeeItems as $item)
                <div class="col-lg-4 col-md-6 fade-in">
                    <div class="menu-card hover-lift">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div>
                                    <h5 class="fw-bold mb-1">{{ $item->name }}</h5>
                                    <p class="text-muted small mb-0">{{ $item->description }}</p>
                                </div>
                                <span class="text-brown fw-bold fs-5">${{ number_format($item->price, 2) }}</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    @if($item->is_popular)
                                    <span class="badge bg-brown-light text-white me-2">Popular</span>
                                    @endif
                                    @if($item->is_new)
                                    <span class="badge bg-beige text-brown-dark">New</span>
                                    @endif
                                </div>
                                <a href="{{ url('/menu/' . $item->id) }}" class="btn btn-brown btn-sm rounded-pill">
                                    Details <i class="bi bi-chevron-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Tea Menu -->
    <section id="tea" class="bg-cream pt-5">
        <div class="container">
            <h2 class="section-title text-center mb-5"><i class="bi bi-cup-straw me-2"></i> Tea & Infusions</h2>
            
            <div class="row g-4">
                @foreach($teaItems as $item)
                <div class="col-lg-4 col-md-6 fade-in">
                    <div class="menu-card">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div>
                                    <h5 class="fw-bold mb-1">{{ $item->name }}</h5>
                                    <p class="text-muted small mb-0">{{ $item->description }}</p>
                                </div>
                                <span class="text-brown fw-bold fs-5">${{ number_format($item->price, 2) }}</span>
                            </div>
                            <div class="text-end">
                                <a href="{{ url('/menu/' . $item->id) }}" class="btn btn-outline-brown btn-sm rounded-pill">
                                    Details <i class="bi bi-chevron-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection