@extends('layouts.app')

@section('content')




<!-- HERO SECTION -->
 <section class="bg-[url'('/images/coffe-bg.jpg')] bg-cover bg-center h-[80vh] flex items-center">
    <div class="bg-black/60 w-full h-full flex items-center">
        <div class="container mx-auto px-6 text-white">

            <h1 class="text-4xl md:text-6xl font-bold mb-4">
                Fresh Coffe, <br> Better Mood ☕
                </h1>
                <p class="text-lg md:text-xl ml-6 max-w-xl">
                    Nikmati kopi terbaik dengan cita rasa autentik dan suasana hangat.
                </p>
                <a herf="#menu"
                class="bg-amer-600 hover:bg-amber-700 px-6 py-3 rounded-full text-white font-semibold transition">
                Lihat Menu 
            </a>
        </div>
    </div>
 </section>

 <!-- ABOUT -->
  <section class="py-16 bg-white">
      <div class="container mx-auoto px-6 grid md:grid-cols-2 gap-10 items-center">
        <img src="/images/about-coffe.jpg" class="rounded-xl shadow-lg" alt="coffe">
      </div>
<h2 class=" text-3xl font-bold mb-4">Tentang Kami</h2>
<p class="text-gray-600 leading-relaxed">
    Kami menyajikan kopi pilihan dari biji terbaik yang diracik dengan penuh perhatian untuk menghadirkan pengalaman minum kopi yang berkesan.
</p>
  </section> 

  <!-- MENU -->
   <section id="menu" class="py-6 bg-gray-100">
    <div class="container mx-auto px-6">
       <h2 class="text-3xl font-bold text-center mb-10">Menu Favorit</h2>
       
       <div class="grid md:grid-cols3-3 gap-8">
        @for ($i = 1; $i <= 3; $i++)
        <div class="bg-white rounded-xl shadow hover:shadow-xl tarnsition overflow-hidden">
            <img src="/images/menu{{ $i }}.jpg" class="h-56 w-full object-cover">
            <div class="p-6"></div>
                <h3 class="text-xl font-semibold mb-2">Coffe Latte</h3>
                <p class="text-gray-600 mb-4">
                    Perpaduan espresso dan susu yang lembut.
                </p>
                <span class="text-amber-600 font-bold">Rp 25.000</span>
            </div>
        </div>
@endfor
</div>
</div>
   </section>

   <!-- CTA -->
    <section class="py-16 bg-amber-600 text-white text-center">
        <h2 class="text-3xl font-bold mb-4">Siap Menikmati Kopi Hari Ini?</h2>
        <p class="mb-6">Datang dan rasakan sendiri kehangatannya</p>    
        <a herf="#"
        class="bg-white text-amber-600 px-6 py-3 rounded-full font-semibold hover:bg-gray-100 transition">
    Kunjungi Kami
    </a>
    </section>
    @endsection