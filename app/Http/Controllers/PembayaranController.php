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
        $pembayarans = Pembayaran::with(['rekamMedis'])->get();
        return view('pembayarans.index', compact('pembayarans'));
    }

    public function create()
    {
        $rekamMedis = RekamMedis::all();
        return view('pembayarans.create', compact('rekamMedis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rekam_medis_id' => 'required',
            'jumlah_bayar' => 'required',
            'metode_pembayaran' => 'required'
        ]);

        Pembayaran::create($request->all());

        // Update status pembayaran pada rekam medis
        $rekamMedis = RekamMedis::findOrFail($request->rekam_medis_id);
        $rekamMedis->status_pembayaran = 1;
        $rekamMedis->save();

        return redirect()->route('pembayarans.index')
            ->with('success', 'Pembayaran berhasil ditambahkan.');
    }

    public function edit(Pembayaran $pembayaran)
    {
        $rekamMedis = RekamMedis::all();
        return view('pembayarans.edit', compact('pembayaran', 'rekamMedis'));
    }

    public function update(Request $request, Pembayaran $pembayaran)
    {
        $request->validate([
            'rekam_medis_id' => 'required',
            'jumlah_bayar' => 'required',
            'metode_pembayaran' => 'required'
        ]);

        $pembayaran->update($request->all());

        // Update status pembayaran pada rekam medis
        $rekamMedis = RekamMedis::findOrFail($request->rekam_medis_id);
        $rekamMedis->status_pembayaran = 1;
        $rekamMedis->save();

        return redirect()->route('pembayarans.index')
            ->with('success', 'Pembayaran berhasil diubah.');
    }

    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();

        // Reset status pembayaran pada rekam medis
        $rekamMedis = RekamMedis::findOrFail($pembayaran->rekam_medis_id);
        $rekamMedis->status_pembayaran = 0;
        $rekamMedis->save();

        return redirect()->route('pembayarans.index')
            ->with('success', 'Pembayaran berhasil dihapus.');
    }
        public function show(Pembayaran $pembayaran)
    {
        return view('pembayarans.show', compact('pembayaran'));
    }
}
