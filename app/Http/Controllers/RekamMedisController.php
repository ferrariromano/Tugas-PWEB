<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\RekamMedis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RekamMedisController extends Controller
{
    //
    public function index()
    {
        $rekam_medis = RekamMedis::with(['pasien', 'dokter'])->get();
        return view('rekam-medis.index', compact('rekam_medis'));
    }

    public function create()
    {
        $pasien = Pasien::all();
        $dokter = Dokter::all();
        return view('rekam-medis.create', compact('pasien', 'dokter'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pasien_id' => 'required',
            'dokter_id' => 'required',
            'diagnosa' => 'required'
        ]);

        $rekamMedis = new RekamMedis();
        $rekamMedis->pasien_id = $request->pasien_id;
        $rekamMedis->dokter_id = $request->dokter_id;
        $rekamMedis->tanggal = now();
        $rekamMedis->diagnosa = $request->diagnosa;
        $rekamMedis->keterangan = $request->keterangan ?? null;
        $rekamMedis->status_pembayaran = $request->status_pembayaran ?? false;
        $rekamMedis->save();

        return redirect()->route('rekam-medis.index')
            ->with('success', 'Rekam medis berhasil ditambahkan.');
    }

    public function edit(RekamMedis $rekam_medis)
    {
        $pasien = Pasien::all();
        $dokter = Dokter::all();
        return view('rekam-medis.edit', compact('rekam_medis', 'pasien', 'dokter'));
    }

    public function update(Request $request, RekamMedis $rekam_medis)
    {
        $request->validate([
            'pasien_id' => 'required',
            'dokter_id' => 'required',
            'keluhan' => 'required'
        ]);

        $rekam_medis->update($request->all());

        return redirect()->route('rekam-medis.index')
            ->with('success', 'Rekam medis berhasil diupdate.');
    }

    public function destroy(RekamMedis $rekam_medis)
    {
        $rekam_medis->delete();

        return redirect()->route('rekam-medis.index')
            ->with('success', 'Rekam medis berhasil dihapus.');
    }
}
