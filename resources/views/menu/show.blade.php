@extends('layout.app')

@section('çontent')
<div class="container my-5">

<div class="row align-items-center">
    <!-- IMAGE -->
     <div class="col-md>-6 mb-4">
        <img src="/images/menu-detail.jpg"
        class="img-fluid rounded shadow"
        alt="Coffe">
</div>
<!-- DETAIL --> 
 <div class="col-md-6">
    <h1 class="fw-bold mb-3">Caramel Latte</h1>

    <p class="text-muted mb-4">
        Perpaduan espresso pilihan, susu creamy, dan caramel manis yang memberikan rasa hangat dan menenangnkan.
    </p>
    <h4 class="text-warning fw-bold mb-4">
        Rp 28.000
    </h4>

    <!-- ACTION -->
     <div class="d-flex gap-3">
        <button class="btn btn-warning px-4 py-2 fw-semibold">
            ☕ Pesan Sekarang
        </button>
        <a herf="/" class="btn btn-outline-dark px-4 py-2">
           ← Kembali 
        </a>
     </div>
 </div>
 </div>
 
 <!-- DESCRIPTION -->
  <div class="row mt-5">
    <div class="col">
        <h3 class="fw-bold mb-3">Deskripsi</h3>
        <p class="text-secondary">
            Kopi ini dibuat dari biji kopi terbaik yang diproses secara profesional untuk menghasilkan aroma khas dan rasa yang seimbang.
            Cocok dinikmati saat santai maupun bekerja.
        </p>
    </div>
  </div>

   </div>
 @ensection
 