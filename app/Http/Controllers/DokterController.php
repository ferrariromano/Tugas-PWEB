<?php

namespace App\Http\Controllers;
use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index()
    {
        $dokters = Dokter::all();

        return view('dokters.index', compact('dokters'));
    }

    public function create()
    {
        return view('dokters.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'spesialisasi' => 'required',
            'telepon' => 'required'
        ]);

        Dokter::create([
            'nama' => $request->nama,
            'spesialisasi' => $request->spesialisasi,
            'telepon' => $request->telepon
        ]);

        return redirect()->route('dokters.index')
            ->with('success', 'Dokter berhasil ditambahkan.');
    }

    public function edit(Dokter $dokter)
    {
        return view('dokters.edit', compact('dokter'));
    }

    public function update(Request $request, Dokter $dokter)
    {
        $request->validate([
            'nama' => 'required',
            'spesialisasi' => 'required',
            'telepon' => 'required'
        ]);

        $dokter->update([
            'nama' => $request->nama,
            'spesialisasi' => $request->spesialisasi,
            'telepon' => $request->telepon
        ]);

        return redirect()->route('dokters.index')
            ->with('success', 'Dokter berhasil diperbaharui.');
    }

    public function destroy(Dokter $dokter)
    {
        $dokter->delete();

        return redirect()->route('dokters.index')
            ->with('success', 'Dokter berhasil dihapus.');
    }
}
