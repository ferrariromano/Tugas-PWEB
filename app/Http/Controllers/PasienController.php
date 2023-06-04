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

        DB::table('pasien')->insert($data);
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

        DB::table('pasien')->where('id', $id)->update($data);
        return redirect()->route('pasien.index')->with('success', 'Pasien berhasil diperbarui.');
    }

    public function destroy($id)
    {
        DB::delete("DELETE FROM pasien WHERE id = ?", [$id]);
        return redirect()->route('pasien.index')->with('success', 'Pasien berhasil dihapus.');
    }
}
