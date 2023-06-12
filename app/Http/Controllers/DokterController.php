<?php

namespace App\Http\Controllers;
use App\Models\Dokter;
use App\Models\Spesialisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokterController extends Controller
{
    /**
     * Menampilkan daftar dokter.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokter = Dokter::with('spesialisasi')->paginate(10);
        return view('dokter.index', compact('dokter'));
    }

    /**
     * Menampilkan formulir untuk menambahkan dokter baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $spesialisasi = Spesialisasi::all();
        return view('dokter.create', compact('spesialisasi'));
    }

    /**
     * Menyimpan dokter baru ke database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'spesialisasi_id' => 'required|exists:spesialisasi,id',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $dokter = Dokter::create([
            'nama' => $request->nama,
            'spesialisasi_id' => $request->spesialisasi_id,
            'jenis_kelamin' => $request->jenis_kelamin
        ]);

        return redirect()->route('dokter.index')->with('success', 'Dokter berhasil ditambahkan.');
    }

    /**
     * Menampilkan formulir untuk mengubah data dokter tertentu.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dokter = Dokter::findOrFail($id);
        $spesialisasi = Spesialisasi::all();
        return view('dokter.edit', compact('dokter', 'spesialisasi'));
    }

    /**
     * Mengupdate data dokter tertentu di database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'spesialisasi_id' => 'required|exists:spesialisasi,id',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $dokter = Dokter::findOrFail($id);
        $dokter->nama = $request->nama;
        $dokter->spesialisasi_id = $request->spesialisasi_id;
        $dokter->jenis_kelamin = $request->jenis_kelamin;
        $dokter->save();

        return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil diubah.');
    }

    /**
     * Menghapus data dokter tertentu di database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dokter = Dokter::findOrFail($id);
        $dokter->delete();

        return redirect()->route('dokter.index')->with('success', 'Dokter berhasil dihapus.');
    }
}
