@extends('layout.app')

@section('content')

<div class="card">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Tambah Data Jurusan</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('jurusan.store') }}" method="POST">
            @csrf

            <!-- Nama Jurusan -->
            <div class="mb-3">
                <label class="form-label">Nama Jurusan</label>
                <input type="text" name="nm_jurusan" class="form-control"
                       value="{{ old('nm_jurusan') }}" required>
            </div>

            <!-- Durasi -->
            <div class="mb-3">
                <label class="form-label">Durasi</label>
                <input type="text" name="durasi" class="form-control"
                       placeholder="Contoh: 3 Bulan"
                       value="{{ old('durasi') }}" required>
            </div>

            <!-- Biaya -->
            <div class="mb-3">
                <label class="form-label">Biaya</label>
                <input type="number" name="biaya" class="form-control"
                       value="{{ old('biaya') }}" required>
            </div>

            <!-- Tombol -->
            <div class="d-flex justify-content-between">
                <a href="{{ route('jurusan.index') }}" class="btn btn-secondary">
                    Kembali
                </a>

                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>
            </div>

        </form>
    </div>
</div>

@endsection