@extends('layout.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Data Jurusan</h3>
    <a href="{{ route('jurusan.create') }}" class="btn btn-primary">
        + Tambah Jurusan
    </a>
</div>

<div class="card">
    <div class="card-body">

        <table class="table table-bordered table-striped">
            <thead class="table-dark text-center">
                <tr>
                    <th>No</th>
                    <th>Kode Jurusan</th>
                    <th>Nama Jurusan</th>
                    <th>Durasi</th>
                    <th>Biaya</th>
                    <th width="150px">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($jurusans as $index => $jurusan)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>JRS-{{ str_pad($jurusan->kd_jurusan, 3, '0', STR_PAD_LEFT) }}</td>
                        <td>{{ $jurusan->nm_jurusan }}</td>
                        <td>{{ $jurusan->durasi }} Bulan</td>
                        <td>Rp {{ number_format($jurusan->biaya, 0, ',', '.') }}</td>
                        <td class="text-center">

                            <!-- EDIT -->
                            <a href="{{ route('jurusan.edit', $jurusan->kd_jurusan) }}" 
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <!-- DELETE -->
                            <form action="{{ route('jurusan.destroy', $jurusan->kd_jurusan) }}" 
                                  method="POST" 
                                  class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm">
                                    Hapus
                                </button>
                            </form>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">
                            Data jurusan belum tersedia
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>

    </div>
</div>

@endsection