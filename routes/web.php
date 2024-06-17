<?php

use App\Http\Controllers\BahanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

// Formulir Umum Registrasi Permohonan Pengujian
Route::get('/registrasi/permohonan-pengujian', [HomeController::class, 'registasi_pengujian'])->name('registrasi.pengujian');
// Kirim Formulir Umum Registrasi Permohonan Pengujian
Route::post('registrasi/permohonan-pengujian/store', [HomeController::class, 'registasi_pengujian_store'])->name('registrasi.pengujian.store');
// Ticket Permohonan
Route::get('/ticket/permohonan-pengujian/{code_form}', [HomeController::class, 'ticket_permohonan_pengujian'])->name('ticket.permohonan.pengujian');


Route::middleware(['auth'])->prefix('auth')->group(function () {
    // Dashboard View
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // Route Bahan Controller
    Route::resource('bahan', BahanController::class);
});
