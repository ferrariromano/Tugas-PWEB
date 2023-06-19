<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\ResepController;



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

Route::get('/', function () {
    return view('homepage');
});

Route::group(['middleware'=>'auth'],function()
{
    Route::get('home',function()
    {
        return view('home');
    });
    Route::get('home',function()
    {
        return view('home');
    });
});


Auth::routes();

// ----------------------------- home dashboard ------------------------------//
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// -----------------------------login----------------------------------------//
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'authenticate']);
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// ----------------------------- lock screen --------------------------------//
Route::get('lock_screen', [App\Http\Controllers\LockScreen::class, 'lockScreen'])->middleware('auth')->name('lock_screen');
Route::post('unlock', [App\Http\Controllers\LockScreen::class, 'unlock'])->name('unlock');

// ------------------------------ register ---------------------------------//
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'storeUser'])->name('register');

// ----------------------------- forget password ----------------------------//
Route::get('forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'getEmail'])->name('forget-password');
Route::post('forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'postEmail'])->name('forget-password');

// ----------------------------- reset password -----------------------------//
Route::get('reset-password/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'getPassword']);
Route::post('reset-password', [App\Http\Controllers\Auth\ResetPasswordController::class, 'updatePassword']);

// Route untuk Dokter
Route::get('dokters', [DokterController::class, 'index'])->name('dokters.index');
Route::get('dokters/create', [DokterController::class, 'create'])->name('dokters.create');
Route::post('dokters', [DokterController::class, 'store'])->name('dokters.store');
Route::get('dokters/{dokter}/edit', [DokterController::class, 'edit'])->name('dokters.edit');
Route::put('dokters/{dokter}', [DokterController::class, 'update'])->name('dokters.update');
Route::delete('dokters/{dokter}', [DokterController::class, 'destroy'])->name('dokters.destroy');

// Route untuk Pasien
Route::get('pasiens', [PasienController::class, 'index'])->name('pasiens.index');
Route::get('pasiens/create', [PasienController::class, 'create'])->name('pasiens.create');
Route::post('pasiens', [PasienController::class, 'store'])->name('pasiens.store');
Route::get('pasiens/{pasien}/edit', [PasienController::class, 'edit'])->name('pasiens.edit');
Route::put('pasiens/{pasien}', [PasienController::class, 'update'])->name('pasiens.update');
Route::delete('pasiens/{pasien}', [PasienController::class, 'destroy'])->name('pasiens.destroy');



// ----------------------------- Jadwal ------------------------------//
Route::get('jadwals', [JadwalController::class, 'index'])->name('jadwals.index');
Route::get('jadwals/create', [JadwalController::class, 'create'])->name('jadwals.create');
Route::post('jadwals', [JadwalController::class, 'store'])->name('jadwals.store');
Route::get('jadwals/{jadwal}/edit', [JadwalController::class, 'edit'])->name('jadwals.edit');
Route::put('jadwals/{jadwal}', [JadwalController::class, 'update'])->name('jadwals.update');
Route::delete('jadwals/{jadwal}', [JadwalController::class, 'destroy'])->name('jadwals.destroy');

// ----------------------------- obat ------------------------------//
Route::get('obats', [ObatController::class, 'index'])->name('obats.index');
Route::get('obats/create', [ObatController::class, 'create'])->name('obats.create');
Route::post('obats', [ObatController::class, 'store'])->name('obats.store');
Route::get('obats/{obat}/edit', [ObatController::class, 'edit'])->name('obats.edit');
Route::put('obats/{obat}', [ObatController::class, 'update'])->name('obats.update');
Route::delete('obats/{obat}', [ObatController::class, 'destroy'])->name('obats.destroy');

// ----------------------------- pembayaran ------------------------------//
Route::get('pembayarans', [PembayaranController::class, 'index'])->name('pembayarans.index');
Route::get('pembayarans/create', [PembayaranController::class, 'create'])->name('pembayarans.create');
Route::post('pembayarans', [PembayaranController::class, 'store'])->name('pembayarans.store');
Route::get('pembayarans/{pembayaran}/edit', [PembayaranController::class, 'edit'])->name('pembayarans.edit');
Route::put('pembayarans/{pembayaran}', [PembayaranController::class, 'update'])->name('pembayarans.update');
Route::delete('pembayarans/{pembayaran}', [PembayaranController::class, 'destroy'])->name('pembayarans.destroy');

// ----------------------------- rekam medis ------------------------------//
Route::get('rekam-medis', [RekamMedisController::class, 'index'])->name('rekam-medis.index');
Route::get('rekam-medis/create', [RekamMedisController::class, 'create'])->name('rekam-medis.create');
Route::post('rekam-medis', [RekamMedisController::class, 'store'])->name('rekam-medis.store');
Route::get('rekam-medis/{rekam_medis}/edit', [RekamMedisController::class, 'edit'])->name('rekam-medis.edit');
Route::put('rekam-medis/{rekam_medis}', [RekamMedisController::class, 'update'])->name('rekam-medis.update');
Route::delete('rekam-medis/{rekam_medis}', [RekamMedisController::class, 'destroy'])->name('rekam-medis.destroy');



Route::get('reseps', [ResepController::class, 'index'])->name('reseps.index');
Route::get('reseps/create', [ResepController::class, 'create'])->name('reseps.create');
Route::post('reseps', [ResepController::class, 'store'])->name('reseps.store');
Route::get('reseps/{resep}/edit', [ResepController::class, 'edit'])->name('reseps.edit');
Route::put('reseps/{resep}', [ResepController::class, 'update'])->name('reseps.update');
Route::delete('reseps/{resep}', [ResepController::class, 'destroy'])->name('reseps.destroy');

