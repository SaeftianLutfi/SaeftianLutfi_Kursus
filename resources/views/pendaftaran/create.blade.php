@extends('layout.app')

@section('content')

<div class="card">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Tambah Data Pendaftaran</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('pendaftaran.store') }}" method="POST">
            @csrf

            <!-- Peserta -->
            <div class="mb-3">
                <label class="form-label">Peserta</label>
                <select name="id_peserta" class="form-control" required>
                    <option value="">-- Pilih Peserta --</option>
                    @foreach($pesertas as $peserta)
                        <option value="{{ $peserta->id_peserta }}"
                            {{ old('id_peserta') == $peserta->id_peserta ? 'selected' : '' }}>
                            {{ $peserta->nm_peserta }}
                        </option>
                    @endforeach
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

            <!-- Tanggal Daftar -->
            <div class="mb-3">
                <label class="form-label">Tanggal Daftar</label>
                <input type="date" name="tgl_daftar" class="form-control"
                       value="{{ old('tgl_daftar') }}" required>
            </div>

            <!-- Status -->
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-control" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="Selesai" {{ old('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                    <option value="Batal" {{ old('status') == 'Batal' ? 'selected' : '' }}>Batal</option>
                </select>
            </div>

            <!-- Tombol -->
            <div class="d-flex justify-content-between">
                <a href="{{ route('pendaftaran.index') }}" class="btn btn-secondary">
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