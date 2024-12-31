<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MilihKamarController;
use App\Http\Controllers\RiwayatMedisController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\KonsulController;
use App\Http\Controllers\AmbulanceController;
use App\Http\Controllers\JanjiTemuController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return view('register');
})->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/ambulance', function () {
    return view('ambulance');
})->name('ambulance');
Route::post('/ambulance', [AmbulanceController::class, 'store']);

Route::get('/janji_temu', [JanjiTemuController::class, 'index'])->name('janji_temu.index');

Route::get('/kamar', [MilihKamarController::class, 'index'])->name('pemilihan_kamar.index');
Route::post('/kamar/pilih', [MilihKamarController::class, 'store'])->name('pemilihan_kamar.store');

Route::middleware('dokter')->group(function () {
    Route::get('pasien/{pasien_id}/riwayat-medis', [RiwayatMedisController::class, 'index'])->name('riwayat_medis.index');
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


// punya depi

// Login route
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login', [SessionController::class, 'login']);

Route::post('/logout', [SessionController::class, 'logout'])->name('logout');


// Login handling (POST)
Route::middleware(['auth'])->get('/dashboard', function () {
    return view('dashboard'); 
})->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/janji-temu', [JanjiTemuController::class, 'index'])->name('janji_temu.index');
});

Route::get('/dokter-umum', [KonsulController::class, 'indexDokter'])->name('dokter.umum');

Route::post('/jadwalkan/store/{dokter_id}', [KonsulController::class, 'store'])->name('jadwalkan.store');

Route::post('/jadwalkan', [KonsulController::class, 'store'])->name('jadwalkan.store');
Route::get('/jadwal-janji-temu', [KonsulController::class, 'indexJadwal'])->name('jadwal.janji_temu.index');
Route::get('/jadwal-janji-temu/{id}/edit', [KonsulController::class, 'edit'])->name('janji_temu.edit');
Route::put('/jadwal-janji-temu/{id}', [KonsulController::class, 'update'])->name('janji_temu.update');
Route::delete('/jadwal-janji-temu/{id}', [KonsulController::class, 'destroy'])->name('janji_temu.destroy');

Route::get('/chat/{konsul_id}', [KonsulController::class, 'chat'])->name('chat');
Route::post('/sudahi-percakapan/{konsul_id}', [KonsulController::class, 'sudahiPercakapan'])->name('sudahi.percakapan');