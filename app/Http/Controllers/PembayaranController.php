<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use App\Models\Pembayaran;
use App\Models\RekamMedis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PembayaranController extends Controller
{
    //
    public function index()
    {
        $pembayarans = Pembayaran::with(['resep.obat', 'rekam_medis.pasien'])->get();
        return view('pembayarans.index', compact('pembayarans'));
    }

    public function create()
    {
        $reseps = Resep::with(['obat', 'rekam_medis.pasien'])->get();
        return view('pembayarans.create', compact('reseps'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'resep_id' => 'required',
            'jumlah_bayar' => 'required'
        ]);

        $pembayaran = new Pembayaran;
        $pembayaran->resep_id = $request->resep_id;
        $pembayaran->jumlah_bayar = $request->jumlah_bayar;
        $pembayaran->save();

        // Update status pembayaran pada rekam medis
        $rekam_medis = RekamMedis::where('id', $pembayaran->resep->rekam_medis->id)->firstOrFail();
        $rekam_medis->status_pembayaran = 1;
        $rekam_medis->save();

        return redirect()->route('pembayarans.index')
            ->with('success', 'Pembayaran berhasil ditambahkan.');
    }

    public function edit(Pembayaran $pembayaran)
    {
        $reseps = Resep::with(['obat', 'rekam_medis.pasien'])->get();
        return view('pembayarans.edit', compact('pembayaran', 'reseps'));
    }

    public function update(Request $request, Pembayaran $pembayaran)
    {
        $request->validate([
            'resep_id' => 'required',
            'jumlah_bayar' => 'required'
        ]);

        $pembayaran->resep_id = $request->resep_id;
        $pembayaran->jumlah_bayar = $request->jumlah_bayar;
        $pembayaran->save();

        // Update status pembayaran pada rekam medis
        $rekam_medis = RekamMedis::where('id', $pembayaran->resep->rekam_medis->id)->firstOrFail();
        $rekam_medis->status_pembayaran = 1;
        $rekam_medis->save();

        return redirect()->route('pembayarans.index')
            ->with('success', 'Pembayaran berhasil diupdate.');
    }

    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();

        // Reset status pembayaran pada rekam medis
        $rekam_medis = RekamMedis::where('id', $pembayaran->resep->rekam_medis->id)->firstOrFail();
        $rekam_medis->status_pembayaran = 0;
        $rekam_medis->save();

        return redirect()->route('pembayarans.index')
            ->with('success', 'Pembayaran berhasil dihapus.');
    }
}
