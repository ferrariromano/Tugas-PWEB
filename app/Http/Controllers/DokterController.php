<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokterController extends Controller
{
    public function index()
    {
        $dokter = DB::table('dokter')->get();
        return view('dokter.index', ['dokter' => $dokter]);
    }

    public function create()
    {
        return view('dokter.create');
    }

    public function store(Request $request)
    {
        $data = [
            'nama' => $request->nama,
            'spesialisasi' => $request->spesialisasi,
            'jenis_kelamin' => $request->jenis_kelamin,
            'umur' => $request->umur
        ];

        DB::table('dokter')->insert($data);
        return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil ditambahkan.');
    }

    public function show($id)
    {
        $dokter = DB::table('dokter')->where('id', $id)->first();
        return view('dokter.show', ['dokter' => $dokter]);
    }

    public function edit($id)
    {
        $dokter = DB::table('dokter')->where('id', $id)->first();
        return view('dokter.edit', ['dokter' => $dokter]);
    }

    public function update(Request $request, $id)
    {
        $data = [
            'nama' => $request->nama,
            'spesialisasi' => $request->spesialisasi,
            'jenis_kelamin' => $request->jenis_kelamin,
            'umur' => $request->umur
        ];

        DB::table('dokter')->where('id', $id)->update($data);
        return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil diperbarui.');
    }

    public function destroy($id)
    {
        DB::table('dokter')->where('id', $id)->delete();
        return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil dihapus.');
    }
}
