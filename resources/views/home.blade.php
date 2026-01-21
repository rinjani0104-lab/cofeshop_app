@extends('layouts.app')

@section('content')




<!-- HERO SECTION -->
 <div class="container-fluid p-0"
 style="
 background: linear-gradient(rgba(62,39,35,0.6), rgba(62,39,35,0.6)),
 url('/images/coffe-bg.jpg');
 background-size: cover;
 background-position: center;
 height: 100vh;
 ">
<div class="d-flex h-100 align-items-center justify-content-center">
    <div class="text-center text-white">
        <h1 class="fw-bold display-4">Cafein Holic</h1>
        <p class="lead">Modern Coffe Shop with Warm Experience</p>

        <a harf="/menu">
            class="btn btn-lg mt-3
            style='background-color:#d7ccc8; color:#3e2723;">
            Explore Menu
        </a>
        </div>
    </div>
</div>

<!-- ABOUT SECTION -->
 <div class="container py-5">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h2 class="fw-bold" style="color:#4e342e;">Tentang Cafein Holic</h2>
            <p class="text-muted";> 
                Cafein Holic adalah coffe shop modern yang menyajikan kopi berkualitas tinggi dengan suasana hangat dan nyaman.
                Cocok untuk bekerja, bersantai, dan berbagi cerita.
                </p>
        </div>

        <div class="col-md-6">
            <img src="/images/about-coffe.jpg"
            class="img-fluid rounded shadow">
        </div>
    </div>
 </div>
 <!-- FEATURE SECTION -->
  <div class="container-fluid py-5" style="background-color:#f5efe6;">
    <div class="container text-center">
        <div class="row">
            <div class="col-md-4">
                <h5 class="fw-bold">☕ Premium Beans</h5>
                <p class="text-muted">Biji kopi pilihan terbaik</p>
            </div>
            <div class="col-md-4">
                <h5 class="fw-bold">🌿 Cozy Place</h5>
                <p class="text-muted"> Nyaman untuk kerja & nongkrong</p>
            </div>
            <div class="col-md-4">
                <h5 class="fw-bold">🍰 Best Dessert</h5>
                <p class="text-muted">Dessert manis peneman kopi</p>
        </div>
    </div>
  </div>
  <!-- BEST MENU -->
   <div class="container py-5">
    <h2 class="text-center fw-bold mb-4" style="color:#4e342e;">
        Best Seller
    </h2>

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card-shadow-sm">
                <img src="/images/latte.jpg" class="card-img-top">
                <div class="card-body text-center">
                    <h5 class="card-tittle">Caffe Latte</h5>
                    <p class="text-muted">Rp.28.000</p>
                </div>
           </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <img src="/images/americano.jpg" class="card-img-top">
                <div class="card-body text-center">
                    <h5 class="card-tittle">Americano</h5>
                    <p class="text-muted">Rp.25.000</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <img src="/images/cappuccino.jpg" class="card-img-top">
                <div class="card-body text-center">
                    <h5 class="card-tittle">Cappuccino</h5>
                    <p class="text-muted">Rp. 30.000</p>
                </div>
            </div>
        </div>
    </div>
   </div>
        @endsection