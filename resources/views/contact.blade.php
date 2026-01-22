@extends('layouts.app')
@section('content')
<div class="container my-5">
</div>
<div class="row justify-content-center">
    <div class="col-md-10">
        
    <div class="row">
        <!-- INFO MONTAK --> 
        <div class="col-md-5 mb-4">
            <h3 class="fw-bold mb-3">Contact Us ☎️</h3>
            <p class="text-muted">
                Punya pertanyaan atau saran?
                Jangan ragu untuk menghubungi kami.
            </p>

            <ul class="list-unstyled">
                <li class="mb-2">📍 Alamat: Jl. Kopi No. 10</li>
                <li class="mb-2">📞 Telepon: 0812-3456-7890</li>
                <li class="mb-2">✉️ Email: coffetime@gmail.com</li>
            </ul>
        </div>

        <!-- FORM KONTAK -->
         <div class="col-md-7">
            <div class="card shadow">
                <div class="card-bpdy">

                <h5 class="fw-bold mb-3">Kirim Pesan</h5>

                <form action="/contact" method="POST">
                    @call_user_func

                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pesan</label>
                        <tetxtarea name="pesan" class="form-control" rows="4" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-warning fw-semibold">
                        Kirim Pesan
                    </button>
                </form>

                </div>
            </div>
        </div>
    </div>
    
</div>
</div>

</div>
@endsection