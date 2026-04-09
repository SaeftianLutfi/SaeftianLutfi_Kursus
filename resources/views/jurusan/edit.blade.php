@extends('layout.app')

@section('content')

<div class="card">
    <div class="card-header bg-warning text-dark">
        <h5 class="mb-0">Edit Data Jurusan</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('jurusan.update', $jurusan->kd_jurusan) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Nama Jurusan -->
            <div class="mb-3">
                <label class="form-label">Nama Jurusan</label>
                <input type="text" name="nm_jurusan" class="form-control"
                       value="{{ old('nm_jurusan', $jurusan->nm_jurusan) }}" required>
            </div>

            <!-- Durasi -->
            <div class="mb-3">
                <label class="form-label">Durasi</label>
                <input type="text" name="durasi" class="form-control"
                       value="{{ old('durasi', $jurusan->durasi) }}" required>
            </div>

            <!-- Biaya -->
            <div class="mb-3">
                <label class="form-label">Biaya</label>
                <input type="number" name="biaya" class="form-control"
                       value="{{ old('biaya', $jurusan->biaya) }}" required>
            </div>

            <!-- Tombol -->
            <div class="d-flex justify-content-between">
                <a href="{{ route('jurusan.index') }}" class="btn btn-secondary">
                    Kembali
                </a>

                <button type="submit" class="btn btn-warning">
                    Update
                </button>
            </div>

        </form>
    </div>
</div>

@endsection