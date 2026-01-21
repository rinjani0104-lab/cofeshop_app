@extends('layouts.app')

@section('content')
<div class="container my-5">

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-0">Form Pemesanan ☕</h4>
                </div>

                <div class="card-body">

                    <form action="/order" method="POST">
                        @csrf

                        <!-- NAMA -->
                        <div class="mb-3">
                            <label class="form-label">Nama Pemesan</label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan nama" required>
                        </div>

                        <!-- MENU -->
                        <div class="mb-3">
                            <label class="form-label">Pilih Menu</label>
                            <select name="menu" class="form-select" required>
                                <option value="">-- Pilih Menu --</option>
                                <option value="Caramel Latte">Caramel Latte</option>
                                <option value="Americano">Americano</option>
                                <option value="Cappuccino">Cappuccino</option>
                            </select>
                        </div>

                        <!-- JUMLAH -->
                        <div class="mb-3">
                            <label class="form-label">Jumlah</label>
                            <input type="number" name="jumlah" class="form-control" min="1" value="1" required>
                        </div>

                        <!-- CATATAN -->
                        <div class="mb-3">
                            <label class="form-label">Catatan (opsional)</label>
                            <textarea name="catatan" class="form-control" rows="3"
                                      placeholder="Contoh: kurang gula"></textarea>
                        </div>

                        <!-- BUTTON -->
                        <div class="d-flex justify-content-between">
                            <a href="/menu" class="btn btn-outline-dark">
                                ← Kembali
                            </a>

                            <button type="submit" class="btn btn-warning fw-semibold">
                                Pesan Sekarang
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection
