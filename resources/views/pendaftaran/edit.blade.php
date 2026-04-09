@extends('layout.app')

@section('content')

<div class="card">
    <div class="card-header bg-warning text-dark">
        <h5 class="mb-0">Edit Data Pendaftaran</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('pendaftaran.update', $pendaftaran->id_daftar) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- ID Daftar (readonly) -->
            <div class="mb-3">
                <label class="form-label">ID Daftar</label>
                <input type="text" class="form-control"
                       value="{{ $pendaftaran->id_daftar }}" readonly>
            </div>

            <!-- Peserta -->
            <div class="mb-3">
                <label class="form-label">Peserta</label>
                <select name="id_peserta" class="form-control" required>
                    <option value="">-- Pilih Peserta --</option>
                    @foreach($pesertas as $peserta)
                        <option value="{{ $peserta->id_peserta }}"
                            {{ old('id_peserta', $pendaftaran->id_peserta) == $peserta->id_peserta ? 'selected' : '' }}>
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
                            {{ old('kd_jurusan', $pendaftaran->kd_jurusan) == $jurusan->kd_jurusan ? 'selected' : '' }}>
                            {{ $jurusan->nm_jurusan }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Tanggal Daftar -->
            <div class="mb-3">
                <label class="form-label">Tanggal Daftar</label>
                <input type="date" name="tgl_daftar" class="form-control"
                       value="{{ old('tgl_daftar', $pendaftaran->tgl_daftar) }}" required>
            </div>

            <!-- Status -->
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-control" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="Aktif" {{ old('status', $pendaftaran->status) == 'Aktif' ? 'selected' : '' }}>
                        Aktif
                    </option>
                    <option value="Selesai" {{ old('status', $pendaftaran->status) == 'Selesai' ? 'selected' : '' }}>
                        Selesai
                    </option>
                    <option value="Batal" {{ old('status', $pendaftaran->status) == 'Batal' ? 'selected' : '' }}>
                        Batal
                    </option>
                </select>
            </div>

            <!-- Tombol -->
            <div class="d-flex justify-content-between">
                <a href="{{ route('pendaftaran.index') }}" class="btn btn-secondary">
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