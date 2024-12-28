<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MilihKamarController;
use App\Http\Controllers\RiwayatMedisController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\JanjiTemuController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return view('register');
});

Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/register-success', function () {
    return view('register-success');
});

Route::resource('janji_temu', JanjiTemuController::class);

Route::get('/kamar', [MilihKamarController::class, 'index'])->name('pemilihan_kamar.index');
Route::post('/kamar/pilih/{pasien_id}', [MilihKamarController::class, 'pilihKamar'])->name('pemilihan_kamar.pilih');

Route::middleware('dokter')->group(function () {
    Route::get('/pasien/{pasien_id}/riwayat-medis', [RiwayatMedisController::class, 'index'])->name('riwayat_medis.index');
    Route::post('/pasien/{pasien_id}/riwayat-medis', [RiwayatMedisController::class, 'store'])->name('riwayat_medis.store');
});

Route::prefix('kamar')->group(function () {
    Route::get('/', [KamarController::class, 'index'])->name('kamar.index'); // Menampilkan daftar kamar
    Route::get('/create', [KamarController::class, 'create'])->name('kamar.create'); // Form tambah kamar
    Route::post('/', [KamarController::class, 'store'])->name('kamar.store'); // Simpan data kamar
    Route::get('/{id}/edit', [KamarController::class, 'edit'])->name('kamar.edit'); // Form edit kamar
    Route::put('/{id}', [KamarController::class, 'update'])->name('kamar.update'); // Update data kamar
    Route::delete('/{id}', [KamarController::class, 'destroy'])->name('kamar.destroy'); // Hapus kamar
});
