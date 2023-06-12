<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\SpesialisasiController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ----------------------------- Login ------------------------------//
Route::get('/', function () {
    return view('login');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});


// ----------------------------- Home ------------------------------//
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ----------------------------- Pasien ------------------------------//
Route::get('/pasien', [PasienController::class, 'index'])->name('pasien.index');
Route::get('/pasien/create', [PasienController::class, 'create'])->name('pasien.create');
Route::post('/pasien', [PasienController::class, 'store'])->name('pasien.store');
Route::get('/pasien/{id}', [PasienController::class, 'show'])->name('pasien.show');
Route::get('/pasien/{id}/edit', [PasienController::class, 'edit'])->name('pasien.edit');
Route::put('/pasien/{id}', [PasienController::class, 'update'])->name('pasien.update');
Route::delete('/pasien/{id}', [PasienController::class, 'destroy'])->name('pasien.destroy');

// ----------------------------- Dokter ------------------------------//
Route::get('/dokter', [DokterController::class, 'index'])->name('dokter.index');
Route::get('/dokter/create', [DokterController::class, 'create'])->name('dokter.create');
Route::post('/dokter', [DokterController::class, 'store'])->name('dokter.store');
Route::get('/dokter/{id}', [DokterController::class, 'show'])->name('dokter.show');
Route::get('/dokter/{id}/edit', [DokterController::class, 'edit'])->name('dokter.edit');
Route::put('/dokter/{id}', [DokterController::class, 'update'])->name('dokter.update');
Route::delete('/dokter/{id}', [DokterController::class, 'destroy'])->name('dokter.destroy');





// Menampilkan daftar spesialisasi
Route::get('/spesialisasi', [SpesialisasiController::class,'index'])->name('spesialisasi.index');

// Menampilkan formulir untuk menambahkan spesialisasi baru
Route::get('/spesialisasi/create',  [SpesialisasiController::class,'create'])->name('spesialisasi.create');

// Menyimpan spesialisasi baru ke database
Route::post('/spesialisasi',  [SpesialisasiController::class,'store'])->name('spesialisasi.store');

// Menampilkan detail dari spesialisasi tertentu
Route::get('/spesialisasi/{id}',  [SpesialisasiController::class,'show'])->name('spesialisasi.show');

// Menampilkan formulir untuk mengubah data spesialisasi tertentu
Route::get('/spesialisasi/{id}/edit',  [SpesialisasiController::class,'edit'])->name('spesialisasi.edit');

// Mengupdate data spesialisasi tertentu di database
Route::put('/spesialisasi/{id}',  [SpesialisasiController::class,'update'])->name('spesialisasi.update');

// Menghapus data spesialisasi tertentu di database
Route::delete('/spesialisasi/{id}',  [SpesialisasiController::class,'destroy'])->name('spesialisasi.destroy');
