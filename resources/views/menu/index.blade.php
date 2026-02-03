@extends('layouts.app')

@section('title', 'Menu - Cafein Holic')

@section('content')

<!-- HERO -->
<section class="hero-section"
    style="background-image: linear-gradient(rgba(60,42,33,.85), rgba(60,42,33,.85)),
    url('https://images.unsplash.com/photo-1554118811-1e0d58224f24?auto=format&fit=crop&w=1920&q=80');
    padding:6rem 0;">
    <div class="container text-center">
        <h1 class="display-4 fw-bold text-white mb-3">Our Menu</h1>
        <p class="lead text-beige mb-0">
            Discover our carefully curated coffee & tea selections
        </p>
    </div>
</section>

<!-- NAVIGATION -->
<div class="sticky-top bg-cream-light py-3 border-bottom" style="top:76px; z-index:1020;">
    <div class="container d-flex justify-content-center gap-2 flex-wrap">
        <a href="#coffee" class="btn btn-outline-brown btn-sm rounded-pill px-4 active">
            ☕ Coffee
        </a>
        <a href="#tea" class="btn btn-outline-brown btn-sm rounded-pill px-4">
            🍵 Tea
        </a>
    </div>
</div>

<!-- COFFEE -->
<section id="coffee" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-brown-dark">Coffee Selection</h2>
            <p class="text-muted">Expertly brewed from premium Arabica beans</p>
        </div>

        <div class="row g-4">
            @foreach($coffeeItems as $item)
            <div class="col-lg-4 col-md-6">
                <div class="menu-card shadow-sm h-100">

                    @if($item->image)
                    <img src="{{ $item->image }}"
                         class="card-img-top"
                         alt="{{ $item->name }}"
                         style="height:200px; object-fit:cover;">
                    @endif

                    <div class="card-body p-4 d-flex flex-column">
                        <h5 class="fw-bold text-brown-dark">{{ $item->name }}</h5>

                        <p class="text-muted small flex-grow-1">
                            {{ $item->description }}
                        </p>

                        <div class="fw-bold text-brown fs-5 mb-2">
                            Rp {{ number_format($item->price, 0, ',', '.') }}
                        </div>

                        <div class="mb-3">
                            @if($item->is_popular)
                                <span class="badge bg-brown me-1">🔥 Popular</span>
                            @endif
                            @if($item->is_new)
                                <span class="badge bg-warning text-dark">⭐ New</span>
                            @endif
                        </div>

                        <a href="{{ url('/menu/'.$item->id) }}"
                           class="btn btn-brown btn-sm rounded-pill mt-auto">
                            View Details →
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- TEA -->
<section id="tea" class="py-5 bg-cream">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-brown-dark">Tea & Infusions</h2>
            <p class="text-muted">Soothing blends from around the world</p>
        </div>

        <div class="row g-4">
            @foreach($teaItems as $item)
            <div class="col-lg-4 col-md-6">
                <div class="menu-card shadow-sm h-100 bg-white">

                    @if($item->image)
                    <img src="{{ $item->image }}"
                         class="card-img-top"
                         alt="{{ $item->name }}"
                         style="height:200px; object-fit:cover;">
                    @endif

                    <div class="card-body p-4 d-flex flex-column">
                        <h5 class="fw-bold text-brown-dark">{{ $item->name }}</h5>

                        <p class="text-muted small flex-grow-1">
                            {{ $item->description }}
                        </p>

                        <div class="fw-bold text-brown fs-5 mb-3">
                            Rp {{ number_format($item->price, 0, ',', '.') }}
                        </div>

                        <a href="{{ url('/menu/'.$item->id) }}"
                           class="btn btn-outline-brown btn-sm rounded-pill mt-auto">
                            View Details →
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection

@section('styles')
<style>
.menu-card{
    border-radius:14px;
    overflow:hidden;
    transition:.3s;
}
.menu-card:hover{
    transform:translateY(-5px);
    box-shadow:0 10px 25px rgba(92,61,46,.15);
}
.btn-outline-brown.active{
    background:var(--brown);
    color:#fff;
    border-color:var(--brown);
}
@media(max-width:768px){
    .hero-section{padding:4rem 0!important;}
    .sticky-top{position:static;}
}
</style>
@endsection
