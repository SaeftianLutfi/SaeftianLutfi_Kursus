@extends('layout.app')

@section('content')

<div class="card">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Tambah Data Peserta</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('peserta.store') }}" method="POST">
            @csrf

            <!-- Nama Peserta -->
            <div class="mb-3">
                <label class="form-label">Nama Peserta</label>
                <input type="text" name="nm_peserta" class="form-control"
                       value="{{ old('nm_peserta') }}" required>
            </div>

            <!-- Jenis Kelamin -->
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <select name="jekel" class="form-control" required>
                    <option value="">-- Pilih --</option>
                    <option value="L" {{ old('jekel') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ old('jekel') == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <!-- Jurusan -->
            <div class="mb-3">
                <label class="form-label">Jurusan</label>
                <select name="kd_jurusan" class="form-control" required>
                    <option value="">-- Pilih Jurusan --</option>
                    @foreach($jurusans as $jurusan)
                        <option value="{{ $jurusan->kd_jurusan }}"
                            {{ old('kd_jurusan') == $jurusan->kd_jurusan ? 'selected' : '' }}>
                            {{ $jurusan->nm_jurusan }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Alamat -->
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" rows="3" required>{{ old('alamat') }}</textarea>
            </div>

            <!-- No HP -->
            <div class="mb-3">
                <label class="form-label">No HP</label>
                <input type="text" name="no_hp" class="form-control"
                       value="{{ old('no_hp') }}" required>
            </div>

            <!-- Tombol -->
            <div class="d-flex justify-content-between">
                <a href="{{ route('peserta.index') }}" class="btn btn-secondary">
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