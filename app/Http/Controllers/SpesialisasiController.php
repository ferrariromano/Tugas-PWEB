<?php

namespace App\Http\Controllers;

use App\Models\Spesialisasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SpesialisasiController extends Controller
{
    //
    /**
     * Menampilkan daftar spesialisasi.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spesialisasi = Spesialisasi::paginate(10);
        return view('spesialisasi.index', compact('spesialisasi'));
    }

    /**
     * Menampilkan formulir untuk menambahkan spesialisasi baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('spesialisasi.create');
    }

    /**
     * Menyimpan spesialisasi baru ke database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $spesialisasi = Spesialisasi::create([
            'nama' => $request->nama
        ]);

        return redirect()->route('spesialisasi.index')->with('success', 'Spesialisasi berhasil ditambahkan.');
    }

    /**
     * Menampilkan formulir untuk mengubah data spesialisasi tertentu.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $spesialisasi = Spesialisasi::findOrFail($id);
        return view('spesialisasi.edit', compact('spesialisasi'));
    }

    /**
     * Mengupdate data spesialisasi tertentu di database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $spesialisasi = Spesialisasi::findOrFail($id);
        $spesialisasi->nama = $request->nama;
        $spesialisasi->save();

        return redirect()->route('spesialisasi.index')->with('success', 'Data spesialisasi berhasil diubah.');
    }

    /**
     * Menghapus data spesialisasi tertentu di database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $spesialisasi = Spesialisasi::findOrFail($id);
        $spesialisasi->delete();

        return redirect()->route('spesialisasi.index')->with('success', 'Spesialisasi berhasil dihapus.');
    }
}
