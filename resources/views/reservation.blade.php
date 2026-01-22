@extends('layouts.app')

@section('content')
<div class="container my-5">

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-0">Reservasi Meja ☕</h4>
                </div>

                <div class="card-body">
                    <form action="/reservation" method="POST">
                        @csrf

                        <!-- NAMA -->
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan nama" required>
                        </div>

                        <!-- EMAIL -->
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Masukkan email" required>
                        </div>

                        <!-- TANGGAL -->
                        <div class="mb-3">
                            <label class="form-label">Tanggal Reservasi</label>
                            <input type="date" name="tanggal" class="form-control" required>
                        </div>

                        <!-- JAM -->
                        <div class="mb-3">
                            <label class="form-label">Jam</label>
                            <input type="time" name="jam" class="form-control" required>
                        </div>

                        <!-- JUMLAH -->
                        <div class="mb-3">
                            <label class="form-label">Jumlah Orang</label>
                            <input type="number" name="jumlah_orang" class="form-control" min="1" required>
                        </div>

                        <!-- CATATAN -->
                        <div class="mb-3">
                            <label class="form-label">Catatan (opsional)</label>
                            <textarea name="catatan" class="form-control" rows="3"
                                      placeholder="Contoh: dekat jendela"></textarea>
                        </div>

                        <!-- BUTTON -->
                        <div class="d-flex justify-content-between">
                            <a href="/" class="btn btn-outline-dark">← Kembali</a>
                            <button type="submit" class="btn btn-warning fw-semibold">
                                Kirim Reservasi
                            </button>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>

</div>
@endsection
