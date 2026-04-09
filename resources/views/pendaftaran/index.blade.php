@extends('layout.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Data Pendaftaran</h3>
    <a href="{{ route('pendaftaran.create') }}" class="btn btn-primary">
        + Tambah Pendaftaran
    </a>
</div>

<div class="card">
    <div class="card-body">

        <table class="table table-bordered table-striped">
            <thead class="table-dark text-center">
                <tr>
                    <th>No</th>
                    <th>ID Daftar</th>
                    <th>Peserta</th>
                    <th>Jurusan</th>
                    <th>Tanggal Daftar</th>
                    <th>Status</th>
                    <th width="150px">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($pendaftarans as $index => $p)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $p->id_daftar }}</td>
                        <td>{{ $p->peserta->nm_peserta ?? '-' }}</td>
                        <td>{{ $p->jurusan->nm_jurusan ?? '-' }}</td>
                        <td>{{ $p->tgl_daftar }}</td>
                        <td class="text-center">

                            @if($p->status == 'Aktif')
                                <span class="badge bg-success">Aktif</span>
                            @elseif($p->status == 'Selesai')
                                <span class="badge bg-primary">Selesai</span>
                            @else
                                <span class="badge bg-danger">Batal</span>
                            @endif

                        </td>
                        <td class="text-center">

                            <!-- EDIT -->
                            <a href="{{ route('pendaftaran.edit', $p->id_daftar) }}" 
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <!-- DELETE -->
                            <form action="{{ route('pendaftaran.destroy', $p->id_daftar) }}" 
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
                        <td colspan="7" class="text-center">
                            Data pendaftaran belum tersedia
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>

    </div>
</div>

@endsection