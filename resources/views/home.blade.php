@extends('layout.app')

@section('content')

<div class="mb-4">
    <h3>Home - Data Peserta Kursus</h3>
</div>

<div class="row mb-4">

    <!-- Peserta -->
    <div class="col-md-4">
        <a href="{{ route('peserta.index') }}" class="text-decoration-none">
            <div class="card text-white bg-primary shadow">
                <div class="card-body text-center">
                    <h5>Total Peserta</h5>
                    <h2>{{ $totalPeserta }}</h2>
                </div>
            </div>
        </a>
    </div>

    <!-- Jurusan -->
    <div class="col-md-4">
        <a href="{{ route('jurusan.index') }}" class="text-decoration-none">
            <div class="card text-white bg-success shadow">
                <div class="card-body text-center">
                    <h5>Total Jurusan</h5>
                    <h2>{{ $totalJurusan }}</h2>
                </div>
            </div>
        </a>
    </div>

    <!-- Pendaftaran -->
    <div class="col-md-4">
        <a href="{{ route('pendaftaran.index') }}" class="text-decoration-none">
            <div class="card text-white bg-warning shadow">
                <div class="card-body text-center">
                    <h5>Total Pendaftaran</h5>
                    <h2>{{ $totalPendaftaran }}</h2>
                </div>
            </div>
        </a>
    </div>

</div>

<!-- FORM SEARCH -->
<div class="card mb-3">
    <div class="card-body">
        <form method="GET" action="/">
            <div class="row g-2">
                <div class="col-md-10">
                    <input type="text" name="q" class="form-control"
                           placeholder="Cari nama peserta..."
                           value="{{ request('q') }}">
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary w-100">Cari</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- TABEL DATA PESERTA -->
<div class="card">
    <div class="card-body">

        <table class="table table-bordered table-striped">
            <thead class="table-dark text-center">
                <tr>
                    <th>No</th>
                    <th>ID Peserta</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Jurusan</th>
                    <th>No HP</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($pesertas as $index => $peserta)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $peserta->id_peserta }}</td>
                        <td>{{ $peserta->nm_peserta }}</td>
                        <td class="text-center">
                            @if($peserta->jekel == 'L')
                                <span class="badge bg-primary">Laki-laki</span>
                            @else
                                <span class="badge bg-danger">Perempuan</span>
                            @endif
                        </td>
                        <td>{{ $peserta->jurusan->nm_jurusan ?? '-' }}</td>
                        <td>{{ $peserta->no_hp }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">
                            Data peserta tidak ditemukan
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>

    </div>
</div>

@endsection