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
        $rekam_medis = RekamMedis::all();

        return view('rekam-medis.index', compact('rekam_medis'));
    }

    public function create()
    {
        $pasiens = Pasien::all();
        $dokters = Dokter::all();

        return view('rekam-medis.create', compact('pasiens', 'dokters'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pasien_id' => 'required',
            'dokter_id' => 'required',
            'tanggal' => 'required|date',
            'diagnosa' => 'required',
            'tindakan' => 'required'
        ]);

        RekamMedis::create($validatedData);

        return redirect('/rekam-medis')->with('success', 'Rekam medis berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $rekam_medis = RekamMedis::findOrFail($id);
        $pasiens = Pasien::all();
        $dokters = Dokter::all();

        return view('rekam-medis.edit', compact('rekam_medis', 'pasiens', 'dokters'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'pasien_id' => 'required',
            'dokter_id' => 'required',
            'tanggal' => 'required|date',
            'diagnosa' => 'required',
            'tindakan' => 'required'
        ]);

        $rekam_medis = RekamMedis::findOrFail($id);
        $rekam_medis->update($validatedData);

        return redirect('/rekam-medis')->with('success', 'Rekam medis berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $rekam_medis = RekamMedis::findOrFail($id);
        $rekam_medis->delete();

        return redirect('/rekam-medis')->with('success', 'Rekam medis berhasil dihapus!');
    }
}
