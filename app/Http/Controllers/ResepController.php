<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Resep;
use App\Models\RekamMedis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResepController extends Controller
{
    //
    public function index()
    {
        $reseps = Resep::with(['obat', 'rekam_medis.pasien'])->get();
        return view('reseps.index', compact('reseps'));
    }

    public function create()
    {
        $obats = Obat::all();
        $rekam_medis = RekamMedis::where('status_pembayaran', 0)->get();
        return view('reseps.create', compact('obats', 'rekam_medis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rekam_medis_id' => 'required',
            'obat_ids' => 'required'
        ]);

        $resep = new Resep;
        $resep->rekam_medis_id = $request->rekam_medis_id;
        $resep->save();

        foreach ($request->obat_ids as $obat_id) {
            $resep->obat()->attach($obat_id);
        }

        return redirect()->route('reseps.index')
            ->with('success', 'Resep berhasil ditambahkan.');
    }

    public function edit(Resep $resep)
    {
        $obats = Obat::all();
        $rekam_medis = RekamMedis::where('status_pembayaran', 0)->get();
        return view('reseps.edit', compact('resep', 'obats', 'rekam_medis'));
    }

    public function update(Request $request, Resep $resep)
    {
        $request->validate([
            'rekam_medis_id' => 'required',
            'obat_ids' => 'required'
        ]);

        $resep->rekam_medis_id = $request->rekam_medis_id;
        $resep->save();

        $resep->obat()->detach();
        foreach ($request->obat_ids as $obat_id) {
            $resep->obat()->attach($obat_id);
        }

        return redirect()->route('reseps.index')
            ->with('success', 'Resep berhasil diupdate.');
    }

    public function destroy(Resep $resep)
    {
        $resep->delete();

        return redirect()->route('reseps.index')
            ->with('success', 'Resep berhasil dihapus.');
    }
}
