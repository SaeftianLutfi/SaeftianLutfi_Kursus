<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Jurusan;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function home(Request $request)
    {
        $q = $request->q;

        $pesertas = Peserta::with('jurusan')
            ->when($q, function ($query) use ($q) {
                $query->where('nm_peserta', 'like', '%' . $q . '%');
            })
            ->get();

        // 🔥 Tambahan statistik
        $totalPeserta = Peserta::count();
        $totalJurusan = Jurusan::count();
        $totalPendaftaran = Pendaftaran::count();

        return view('home', compact(
            'pesertas',
            'totalPeserta',
            'totalJurusan',
            'totalPendaftaran'
        ));
    }

    public function index()
    {
        $pesertas = Peserta::with('jurusan')->get();
        return view('peserta.index', compact('pesertas'));
    }

    public function create()
    {
        $jurusans = Jurusan::all();
        return view('peserta.create', compact('jurusans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kd_jurusan' => 'required|exists:t_jurusan,kd_jurusan',
            'nm_peserta' => 'required',
            'jekel' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);

        Peserta::create([
            'kd_jurusan' => $request->kd_jurusan,
            'nm_peserta' => $request->nm_peserta,
            'jekel' => $request->jekel,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
        ]);

        return redirect()->route('peserta.index')
            ->with('success', 'Data peserta berhasil ditambahkan');
    }

    public function edit(string $id_peserta)
    {
        $peserta = Peserta::findOrFail($id_peserta);
        $jurusans = Jurusan::all();
        return view('peserta.edit', compact('peserta', 'jurusans'));
    }

    public function update(Request $request, string $id_peserta)
    {
        $request->validate([
            'kd_jurusan' => 'required|exists:t_jurusan,kd_jurusan',
            'nm_peserta' => 'required',
            'jekel' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);

        $peserta = Peserta::findOrFail($id_peserta);
        $peserta->update([
            'kd_jurusan' => $request->kd_jurusan,
            'nm_peserta' => $request->nm_peserta,
            'jekel' => $request->jekel,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
        ]);

        return redirect()->route('peserta.index')
            ->with('success', 'Data peserta berhasil diubah');
    }

    public function destroy(string $id_peserta)
    {
        $peserta = Peserta::findOrFail($id_peserta);
        $peserta->delete();
        return redirect()->route('peserta.index')
            ->with('success', 'Data peserta berhasil dihapus');
    }
}
