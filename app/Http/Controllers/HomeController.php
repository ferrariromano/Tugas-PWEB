<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('home');
    }

    public function jadwal_home()
    {
        $jadwals = Jadwal::with('dokter')->get();
        return view('jadwal');
    }
}
