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
oute::get('/puskesmas', [PuskesmasTerdekatController::class, 'index'])->name('puskesmas.index');
Route::get('/puskesmas/create', [PuskesmasTerdekatController::class, 'create'])->name('puskesmas.create');
Route::post('/puskesmas', [PuskesmasTerdekatController::class, 'store'])->name('puskesmas.store');
Route::get('/puskesmas/{puskesmas}', [PuskesmasTerdekatController::class, 'show'])->name('puskesmas.show');
Route::get('/puskesmas/{puskesmas}/edit', [PuskesmasTerdekatController::class, 'edit'])->name('puskesmas.edit');
Route::put('/puskesmas/{puskesmas}', [PuskesmasTerdekatController::class, 'update'])->name('puskesmas.update');
Route::delete('/puskesmas/{puskesmas}', [PuskesmasTerdekatController::class, 'destroy'])->name('puskesmas.destroy');

Route::get('/puskesmas/search/terdekat', [PuskesmasTerdekatController::class, 'search'])->name('puskesmas.search');

Route::get('/rujukan/terdekat', [RujukanTerdekatController::class, 'index'])->name('rujukan.index');


Route::get('/rujukan/create', [RujukanTerdekatController::class, 'create'])->name('rujukan.create');
Route::post('/rujukan', [RujukanTerdekatController::class, 'store'])->name('rujukan.store');
Route::get('/rujukan/{rujukan}', [RujukanTerdekatController::class, 'show'])->name('rujukan.show');
Route::get('/rujukan/{rujukan}/edit', [RujukanTerdekatController::class, 'edit'])->name('rujukan.edit');
Route::put('/rujukan/{rujukan}', [RujukanTerdekatController::class, 'update'])->name('rujukan.update');
Route::delete('/rujukan/{rujukan}', [RujukanTerdekatController::class, 'destroy'])->name('rujukan.destroy');
