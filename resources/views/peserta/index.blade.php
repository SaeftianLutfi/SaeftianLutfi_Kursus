@extends('layout.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Data Peserta</h3>
    <a href="{{ route('peserta.create') }}" class="btn btn-primary">
        + Tambah Peserta
    </a>
</div>

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
                    <th width="150px">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($pesertas as $index => $peserta)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $peserta->id_peserta }}</td>
                        <td>{{ $peserta->nm_peserta }}</td>
                        <td>{{ $peserta->jekel }}</td>
                        <td>
                            @forelse($peserta->pendaftarans as $p)
                                <span class="badge bg-success">
                                    {{ $p->jurusan->nm_jurusan }}
                                </span>
                            @empty
                                -
                            @endforelse
                        </td>
                        <td>{{ $peserta->no_hp }}</td>
                        <td class="text-center">

                            <!-- EDIT -->
                            <a href="{{ route('peserta.edit', $peserta->id_peserta) }}" 
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <!-- DELETE -->
                            <form action="{{ route('peserta.destroy', $peserta->id_peserta) }}" 
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
                            Data peserta belum tersedia
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>

    </div>
</div>

@endsection