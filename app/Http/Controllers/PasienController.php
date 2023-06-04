<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PasienController extends Controller
{
    public function index()
    {
        $pasien = DB::select("SELECT * FROM pasien");
        return view('pasien.index', ['pasien' => $pasien]);
    }

    public function create()
    {
        return view('pasien.create');
    }

    public function store(Request $request)
    {
        $data = [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon
        ];

        DB::insert("INSERT INTO pasien (nama, alamat, no_telepon) VALUES (?, ?, ?)", [$data['nama'], $data['alamat'], $data['no_telepon']]);
        return redirect()->route('pasien.index')->with('success', 'Pasien berhasil ditambahkan.');
    }

    public function show($id)
    {
        $pasien = DB::select("SELECT * FROM pasien WHERE id = ?", [$id])[0];
        return view('pasien.show', ['pasien' => $pasien]);
    }

    public function edit($id)
    {
        $pasien = DB::select("SELECT * FROM pasien WHERE id = ?", [$id])[0];
        return view('pasien.edit', ['pasien' => $pasien]);
    }

    public function update(Request $request, $id)
    {
        $data = [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon
        ];

        DB::update("UPDATE pasien SET nama = ?, alamat = ?, no_telepon = ? WHERE id = ?", [$data['nama'], $data['alamat'], $data['no_telepon'], $id]);
        return redirect()->route('pasien.index')->with('success', 'Pasien berhasil diperbarui.');
    }

    public function destroy($id)
    {
        DB::delete("DELETE FROM pasien WHERE id = ?", [$id]);
        return redirect()->route('pasien.index')->with('success', 'Pasien berhasil dihapus.');
    }
}
