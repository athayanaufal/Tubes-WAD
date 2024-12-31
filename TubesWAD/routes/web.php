<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MilihKamarController;
use App\Http\Controllers\RiwayatMedisController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\JanjiTemuController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\KonsulController;
use App\Http\Controllers\PuskesmasTerdekatController;
use App\Http\Controllers\RujukanTerdekatController;
use App\Http\Controllers\KetersediaanDokterController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('janji_temu', JanjiTemuController::class);

Route::get('/ketersediaandokter', [KetersediaanDokterController::class, 'index'])->name('ketersediaandokter');
Route::post('/ketersediaandokter/filter', [KetersediaanDokterController::class, 'filter'])->name('filter-ketersediaandokter');

Route::get('/', [KamarController::class, 'index'])->name('pilihkamar.index');
Route::post('/pilihkamar', [KamarController::class, 'assignKamar'])->name('pilihkamar.store');

Route::prefix('riwayat-medis')->group(function () {
    Route::get('/', [RiwayatMedisController::class, 'index'])->name('riwayatmedis.index');
    Route::post('/', [RiwayatMedisController::class, 'store'])->name('riwayatmedis.store');
    Route::put('/{riwayatMedis}', [RiwayatMedisController::class, 'update'])->name('riwayatmedis.update');
    Route::delete('/{riwayatMedis}', [RiwayatMedisController::class, 'destroy'])->name('riwayatmedis.destroy');
});

Route::prefix('kamar')->group(function () {
    Route::get('/', [KamarController::class, 'index'])->name('kamar.index'); // Menampilkan daftar kamar
    Route::get('/create', [KamarController::class, 'create'])->name('kamar.create'); // Form tambah kamar
    Route::post('/', [KamarController::class, 'store'])->name('kamar.store'); // Simpan data kamar
    Route::get('/{id}/edit', [KamarController::class, 'edit'])->name('kamar.edit'); // Form edit kamar
    Route::put('/{id}', [KamarController::class, 'update'])->name('kamar.update'); // Update data kamar
    Route::delete('/{id}', [KamarController::class, 'destroy'])->name('kamar.destroy'); // Hapus kamar
});

Route::get('/register', function () {
    return view('register');
});

Route::post('/register', [RegisterController::class, 'store']);

// punya depi
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [SessionController::class, 'login'])->name('login.post');

Route::middleware(['auth'])->group(function () {
    Route::get('/janji-temu', [JanjiTemuController::class, 'index'])->name('janji_temu.index');
});

Route::get('/dokter-umum', [KonsulController::class, 'indexDokter'])->name('dokter.umum');
Route::get('/jadwalkan/{dokter_id}', [KonsulController::class, 'create'])->name('jadwalkan');
Route::post('/jadwalkan', [KonsulController::class, 'store'])->name('jadwalkan.store');
Route::get('/jadwal-janji-temu', [KonsulController::class, 'indexJadwal'])->name('jadwal.janji_temu.index');
Route::get('/jadwal-janji-temu/{id}/edit', [KonsulController::class, 'edit'])->name('janji_temu.edit');
Route::put('/jadwal-janji-temu/{id}', [KonsulController::class, 'update'])->name('janji_temu.update');
Route::delete('/jadwal-janji-temu/{id}', [KonsulController::class, 'destroy'])->name('janji_temu.destroy');
Route::get('/chat/{konsul_id}', [KonsulController::class, 'chat'])->name('chat');
Route::post('/sudahi-percakapan/{konsul_id}', [KonsulController::class, 'sudahiPercakapan'])->name('sudahi.percakapan');

//nico
Route::get('/puskesmasterdekat', [PuskesmasTerdekatController::class, 'index'])->name('puskesmasterdekat.index');
Route::get('/puskesmasterdekat/create', [PuskesmasTerdekatController::class, 'create'])->name('puskesmasterdekat.create');
Route::post('/puskesmasterdekat', [PuskesmasTerdekatController::class, 'store'])->name('puskesmasterdekat.store');
Route::get('/puskesmasterdekat/{puskesmas}', [PuskesmasTerdekatController::class, 'show'])->name('puskesmasterdekat.show');
Route::get('/puskesmasterdekat/{p}/edit', [PuskesmasTerdekatController::class, 'edit'])->name('puskesmasterdekat.edit');
Route::delete('/puskesmasterdekat/{p}', [PuskesmasTerdekatController::class, 'destroy'])->name('puskesmasterdekat.destroy');
Route::put('/puskesmasterdekat', [PuskesmasTerdekatController::class, 'update'])->name('puskesmasterdekat.update');

Route::get('/rujukanterdekat', [RujukanTerdekatController::class, 'index'])->name('rujukanterdekat.index');
Route::get('/rujukanterdekat/create', [RujukanTerdekatController::class, 'create'])->name('rujukanterdekat.create');
Route::post('/rujukanterdekat', [RujukanTerdekatController::class, 'store'])->name('rujukanterdekat.store');
Route::get('/rujukanterdekat/{rujukan}', [RujukanTerdekatController::class, 'show'])->name('rujukanterdekat.show');
Route::get('/rujukanterdekat/{p}/edit', [RujukanTerdekatController::class, 'edit'])->name('rujukanterdekat.edit');
Route::delete('/rujukanterdekat/{p}', [RujukanTerdekatController::class, 'destroy'])->name('rujukanterdekat.destroy');
Route::put('/rujukanterdekat', [RujukanTerdekatController::class, 'update'])->name('rujukanterdekat.update');
