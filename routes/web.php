<?php

use App\Http\Controllers\BahanController;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GeneratePdfController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KotakMasukController;
use App\Http\Controllers\PermohonanController;
use App\Http\Controllers\TemplateSuratController;
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


// Cetak Output Permohonan Pengujian
Route::get('/cetak/permohonan-pengujian/{code_form}', [GeneratePdfController::class, 'generatePermohonanPengujian'])->name('generate.permohonan.pengujian');



Route::middleware(['auth'])->prefix('auth')->group(function () {
    // Dashboard View
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // Route Bahan Controller
    Route::resource('/bahan', BahanController::class);

    // List / Daftar Permohonan Yang Masuk
    Route::get('/permohonan-pengujian', [PermohonanController::class, 'permohonan_pengujian_index'])->name('permohonan.pengujian.index');
    // Update Status Permohonan
    Route::patch('permohonan-pengujian/update/status/{code_form}', [PermohonanController::class, 'permohonan_update_status'])->name('permohonan.update.status');

    // Buat Checklist
    Route::get('/checklist', [ChecklistController::class, 'index'])->name('checklist.index');
    Route::get('/checklist/create/{code_form}', [ChecklistController::class, 'create'])->name('checklist.create');
    Route::post('/checklist/store', [ChecklistController::class, 'store'])->name('checklist.store');

    // Tambah Materials
    Route::get('/checklist/tambah-material/{code_form}', [ChecklistController::class, 'create_material'])->name('material.create');
    // Store Material
    Route::post('/checklist/tambah-material/store', [ChecklistController::class, 'store_material'])->name('store.material');
    // Delete Material
    Route::delete('/checklist/tambah-material/delete/{id}', [ChecklistController::class, 'delete_material'])->name('delete.material');

    // Kotak Masuk
    Route::get('/kotak-masuk/verifikasi', [KotakMasukController::class, 'index'])->name('kotak.masuk.index');
    Route::get('/kotak-masuk/verifikasi/show/{code_form}', [KotakMasukController::class, 'show'])->name('kotak.masuk.show');

    // Update Disetujui Pengujian
    Route::patch('/update/setujui/{code_form}', [PermohonanController::class, 'update_setujui_permohonan'])->name('update.setujui.permohonan');
});
