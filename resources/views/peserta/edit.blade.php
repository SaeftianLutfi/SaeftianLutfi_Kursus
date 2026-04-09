@extends('layout.app')

@section('content')

<div class="card">
    <div class="card-header bg-warning text-dark">
        <h5 class="mb-0">Edit Data Peserta</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('peserta.update', $peserta->id_peserta) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- ID Peserta (readonly) -->
            <div class="mb-3">
                <label class="form-label">ID Peserta</label>
                <input type="text" class="form-control"
                       value="{{ $peserta->id_peserta }}" readonly>
            </div>

            <!-- Nama Peserta -->
            <div class="mb-3">
                <label class="form-label">Nama Peserta</label>
                <input type="text" name="nm_peserta" class="form-control"
                       value="{{ old('nm_peserta', $peserta->nm_peserta) }}" required>
            </div>

            <!-- Jenis Kelamin -->
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <select name="jekel" class="form-control" required>
                    <option value="">-- Pilih --</option>
                    <option value="L" {{ old('jekel', $peserta->jekel) == 'L' ? 'selected' : '' }}>
                        Laki-laki
                    </option>
                    <option value="P" {{ old('jekel', $peserta->jekel) == 'P' ? 'selected' : '' }}>
                        Perempuan
                    </option>
                </select>
            </div>

            <!-- Alamat -->
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" rows="3" required>{{ old('alamat', $peserta->alamat) }}</textarea>
            </div>

            <!-- No HP -->
            <div class="mb-3">
                <label class="form-label">No HP</label>
                <input type="text" name="no_hp" class="form-control"
                       value="{{ old('no_hp', $peserta->no_hp) }}" required>
            </div>

            <!-- Tombol -->
            <div class="d-flex justify-content-between">
                <a href="{{ route('peserta.index') }}" class="btn btn-secondary">
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