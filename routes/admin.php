<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BannerController;
use App\Http\Controllers\BuktiController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PredictionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\KeluhanController;

Route::get('/dashboard', function () {
    return redirect()->route('index-data');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // Dashboard
    // Pasaran Togel
    Route::get('/', [DataController::class, 'index_data'])->name('index-data');
    Route::post('/store-data', [DataController::class, 'store_data']);
    Route::post('/destroy', [DataController::class, 'destroy_data']);
    Route::get('/get-data/{id}', [DataController::class, 'getData']);
    Route::post('/update-data', [DataController::class, 'updateData']);

    // Result Togel
    Route::get('/index-result', [ResultController::class, 'index_result'])->name('index-result');
    Route::post('/store-result', [ResultController::class, 'store_result']);
    Route::post('/destroy-result', [ResultController::class, 'destroy_result']);
    Route::get('/get-data-result/{id}', [ResultController::class, 'getData']);
    Route::post('/update-result', [ResultController::class, 'updateData']);

    // Prediksi Togel
    Route::get('/index-prediksi', [PredictionController::class, 'index_prediksi'])->name('index-prediksi');
    Route::post('/store-prediksi', [PredictionController::class, 'store_prediksi']);
    Route::post('/destroy-prediksi', [PredictionController::class, 'destroy_prediksi']);
    Route::get('/get-data-prediksi/{id}', [PredictionController::class, 'getData']);
    Route::post('/update-prediksi', [PredictionController::class, 'updateData']);

    // Bukti Togel
    Route::get('/index-bukti', [BuktiController::class, 'index_bukti'])->name('index-bukti');
    Route::post('/store-bukti', [BuktiController::class, 'store_bukti']);
    Route::post('/destroy-bukti', [BuktiController::class, 'destroy_bukti']);
    Route::get('/get-data-bukti/{id}', [BuktiController::class, 'getData']);
    Route::post('/update-bukti', [BuktiController::class, 'updateData']);

    // Schedule Togel
    Route::get('/index-jadwal', [JadwalController::class, 'index_jadwal'])->name('index-jadwal');
    Route::post('/store-jadwal', [JadwalController::class, 'store_jadwal']);
    Route::post('/destroy-jadwal', [JadwalController::class, 'destroy_jadwal']);
    Route::get('/get-data-jadwal/{id}', [JadwalController::class, 'getData']);
    Route::post('/update-jadwal', [JadwalController::class, 'updateData']);

    // Dream Book
    Route::get('/index-buku', [BukuController::class, 'index_buku'])->name('index-buku');
    Route::post('/store-buku', [BukuController::class, 'store_buku']);
    Route::post('/destroy-buku', [BukuController::class, 'destroy_buku']);
    Route::get('/get-data-buku/{id}', [BukuController::class, 'getData']);
    Route::post('/update-buku', [BukuController::class, 'updateData']);

    // Keluhan Togel
    Route::get('/index-keluhan', [KeluhanController::class, 'index_keluhan'])->name('index-keluhan');
    Route::post('/destroy-keluhan', [KeluhanController::class, 'destroy_keluhan']);


    // Banner
    Route::get('/index-banner', [BannerController::class, 'index_banner'])->name('index-banner');
    Route::post('/store-banner', [BannerController::class, 'store_banner']);
    Route::post('/destroy-banner', [BannerController::class, 'destroy_banner']);

    // RTP Slot

    Route::post('/admin/rand-rtp', [RtpController::class, 'update'])->name('admin-rtp');

    // Pola rtp
    Route::get('/index-pola', [BannerController::class, 'index_pola_rtp'])->name('index-pola-rtp');

    // Profile
    Route::get('/my-profile', [ProfileController::class, 'index_profile'])->name('index-profile');
    Route::post('/update-profile', [ProfileController::class, 'updateData'])->name('update-profile');


});


require __DIR__.'/auth.php';
