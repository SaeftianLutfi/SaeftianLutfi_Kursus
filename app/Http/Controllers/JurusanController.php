<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusans = Jurusan::all();
        return view('jurusan.index', compact('jurusans'));
    }

    public function create()
    {
        return view('jurusan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nm_jurusan' => 'required',
            'durasi' => 'required',
            'biaya' => 'required',
        ]);

        Jurusan::create([
            'nm_jurusan' => $request->nm_jurusan,
            'durasi' => $request->durasi,
            'biaya' => $request->biaya
        ]);

        return redirect()->route('jurusan.index')
                ->with('success', 'Data jurusan berhasil ditambahkan');
    }

    public function edit(string $kd_jurusan)
    {
        $jurusan = Jurusan::findOrFail($kd_jurusan);
        return view('jurusan.edit', compact('jurusan'));
    }

    public function update(Request $request, string $kd_jurusan)
    {
        $request->validate([
            'nm_jurusan' => 'required',
            'durasi' => 'required',
            'biaya' => 'required',
        ]);

        $jurusan = Jurusan::findOrFail($kd_jurusan);
        $jurusan->update([
            'nm_jurusan' => $request->nm_jurusan,
            'durasi' => $request->durasi,
            'biaya' => $request->biaya
        ]);

        return redirect()->route('jurusan.index')
                ->with('success', 'Data jurusan berhasil diubah');
    }

    public function destroy(string $kd_jurusan)
    {
        $jurusan = Jurusan::findOrFail($kd_jurusan);
        $jurusan->delete();
        return redirect()->route('jurusan.index')
                ->with('success', 'Data jurusan berhasil dihapus');
    }
}