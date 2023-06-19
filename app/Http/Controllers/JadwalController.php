<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JadwalController extends Controller
{
    //
    public function index()
    {

        $jadwals = Jadwal::all();
        return view('jadwals.index', compact('jadwals'));
    }

    public function create()
    {
        $dokters = Dokter::all();
        return view('jadwals.create', compact('dokters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'dokter_id' => 'required',
            'tanggal' => 'required|date',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required'
        ]);

        Jadwal::create($request->all());

        return redirect()->route('jadwals.index')
            ->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function edit(Jadwal $jadwal)
    {
        $dokters = Dokter::all();
        return view('jadwals.edit', compact('jadwal', 'dokters'));
    }

    public function update(Request $request, Jadwal $jadwal)
    {
        $request->validate([
            'dokter_id' => 'required',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required'
        ]);

        $jadwal->update($request->all());

        return redirect()->route('jadwals.index')
            ->with('success', 'Jadwal berhasil diupdate.');
    }

    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();

        return redirect()->route('jadwals.index')
            ->with('success', 'Jadwal berhasil dihapus.');
    }
}
