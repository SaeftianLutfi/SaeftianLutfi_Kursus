<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Jurusan;
use App\Models\Peserta;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index()
    {
        $pendaftarans = Pendaftaran::with('peserta', 'jurusan')->get();
        return view('pendaftaran.index', compact('pendaftarans'));
    }

    public function create()
    {
        $pesertas = Peserta::all();
        $jurusans = Jurusan::all();
        return view('pendaftaran.create', compact('pesertas', 'jurusans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_peserta' => 'required|exists:t_peserta,id_peserta',
            'kd_jurusan' => 'required|exists:t_jurusan,kd_jurusan',
            'tgl_daftar' => 'required|date',
            'status' => 'required|in:Aktif,Selesai,Batal',
        ]);

        Pendaftaran::create([
            'id_peserta' => $request->id_peserta,
            'kd_jurusan' => $request->kd_jurusan,
            'tgl_daftar' => $request->tgl_daftar,
            'status' => $request->status,
        ]);

        return redirect()->route('pendaftaran.index')
            ->with('success', 'Data pendaftaran berhasil ditambahkan');
    }

    public function edit(string $id_daftar)
    {
        $pendaftaran = Pendaftaran::findOrFail($id_daftar);
        $pesertas = Peserta::all();
        $jurusans = Jurusan::all();
        return view('pendaftaran.edit', compact('pendaftaran', 'pesertas', 'jurusans'));
    }

    public function update(Request $request, string $id_daftar)
    {
        $request->validate([
            'id_peserta' => 'required|exists:t_peserta,id_peserta',
            'kd_jurusan' => 'required|exists:t_jurusan,kd_jurusan',
            'tgl_daftar' => 'required|date',
            'status' => 'required|in:Aktif,Selesai,Batal',
        ]);

        $pendaftaran = Pendaftaran::findOrFail($id_daftar);
        $pendaftaran->update([
            'id_peserta' => $request->id_peserta,
            'kd_jurusan' => $request->kd_jurusan,
            'tgl_daftar' => $request->tgl_daftar,
            'status' => $request->status,
        ]);

        return redirect()->route('pendaftaran.index')
            ->with('success', 'Data pendaftaran berhasil diubah');
    }

    public function destroy(string $id_daftar)
    {
        $pendaftaran = Pendaftaran::findOrFail($id_daftar);
        $pendaftaran->delete();
        return redirect()->route('pendaftaran.index')
            ->with('success', 'Data pendaftaran berhasil dihapus');
    }
}
