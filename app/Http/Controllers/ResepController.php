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
        $reseps = Resep::all();

        return view('reseps.index', compact('reseps'));
    }

        public function create()
    {
        $obats = Obat::all();
        $rekam_medises = RekamMedis::all();

        return view('reseps.create', compact('obats', 'rekam_medises'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rekam_medis_id' => 'required|exists:rekam_medis,id',
            'obat_id' => 'required|exists:obats,id',
            'jumlah' => 'required|integer|min:1'
        ]);

        Resep::create($request->all());

        return redirect()->route('reseps.index')->with('success', 'Resep berhasil ditambahkan');
    }

    public function show(Resep $resep)
    {
        return view('reseps.show', compact('resep'));
    }

    public function edit(Resep $resep)
    {
        return view('reseps.edit', compact('resep'));
    }

    public function update(Request $request, Resep $resep)
    {
        $request->validate([
            'rekam_medis_id' => 'required|exists:rekam_medis,id',
            'obat_id' => 'required|exists:obats,id',
            'jumlah' => 'required|integer|min:1'
        ]);

        $resep->update($request->all());

        return redirect()->route('reseps.index')->with('success', 'Resep berhasil diupdate');
    }

    public function destroy(Resep $resep)
    {
        $resep->delete();

        return redirect()->route('reseps.index')->with('success', 'Resep berhasil dihapus');
    }
}
