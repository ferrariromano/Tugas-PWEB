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
        // Mengambil semua data rekam medis dan obat dari model masing-masing
        $rekam_medis = RekamMedis::all();
        $obats = Obat::all();

        return view('reseps.create', compact('rekam_medis', 'obats'));
    }

    public function store(Request $request)
    {
        // Validasi inputan form
        $validatedData = $request->validate([
            'rekam_medis_id' => 'required',
            'obat_id' => 'required',
            'jumlah' => 'required|numeric'
        ]);

        // Membuat record baru pada tabel reseps
        $resep = Resep::create($validatedData);

        return redirect()->route('reseps.show', $resep->id)->with('success', 'Resep berhasil dibuat');
    }

}
