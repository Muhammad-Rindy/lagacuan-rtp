<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PasaranController;
use App\Http\Controllers\RtpController;
use App\Http\Controllers\KeluhanController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BuktiController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PredictionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\ShioController;

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

// Front end
Route::get('/', [PasaranController::class, 'index_pasaran_home'])->name('index-pasaran-home');
Route::get('/live-draw', [PasaranController::class, 'index_live_home'])->name('index-live-home');
Route::get('/prediksi-togel', [PasaranController::class, 'index_prediksi_home'])->name('index-prediksi-home');
Route::get('/jadwal-togel', [PasaranController::class, 'index_jadwal_home'])->name('index-jadwal-home');
Route::get('/data-result', [PasaranController::class, 'index_result_home'])->name('index-result-home');
Route::get('/bukti-jackpot', [PasaranController::class, 'index_bukti_home'])->name('index-bukti-home');
Route::get('/buku-mimpi', [PasaranController::class, 'index_buku_home'])->name('index-buku-home');
Route::get('/promosi', [PasaranController::class, 'index_promosi_home'])->name('index-promosi-home');
Route::get('/keluhan', [PasaranController::class, 'index_keluhan_home'])->name('index-keluhan-home');
Route::get('/paito', [PasaranController::class, 'index_paito_home'])->name('index-paito-home');
Route::get('/rtpslot', [RtpController::class, 'index'])->name('index-rtp');
Route::get('/rtpslot/{provider_name}', [RtpController::class, 'providerRtp']);
Route::post('/store-keluhan', [KeluhanController::class, 'store_keluhan']);

// Route::get('/dashboard', function () {
//     return redirect()->route('index-data');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {

//     // Dashboard
//     // Pasaran Togel
//     Route::get('/', [DataController::class, 'index_data'])->name('index-data');
//     Route::post('/store-data', [DataController::class, 'store_data']);
//     Route::post('/destroy', [DataController::class, 'destroy_data']);
//     Route::get('/get-data/{id}', [DataController::class, 'getData']);
//     Route::post('/update-data', [DataController::class, 'updateData']);

//     // Result Togel
//     Route::get('/index-result', [ResultController::class, 'index_result'])->name('index-result');
//     Route::post('/store-result', [ResultController::class, 'store_result']);
//     Route::post('/destroy-result', [ResultController::class, 'destroy_result']);
//     Route::get('/get-data-result/{id}', [ResultController::class, 'getData']);
//     Route::post('/update-result', [ResultController::class, 'updateData']);

//     // Prediksi Togel
//     Route::get('/index-prediksi', [PredictionController::class, 'index_prediksi'])->name('index-prediksi');
//     Route::post('/store-prediksi', [PredictionController::class, 'store_prediksi']);
//     Route::post('/destroy-prediksi', [PredictionController::class, 'destroy_prediksi']);
//     Route::get('/get-data-prediksi/{id}', [PredictionController::class, 'getData']);
//     Route::post('/update-prediksi', [PredictionController::class, 'updateData']);

//     // Bukti Togel
//     Route::get('/index-bukti', [BuktiController::class, 'index_bukti'])->name('index-bukti');
//     Route::post('/store-bukti', [BuktiController::class, 'store_bukti']);
//     Route::post('/destroy-bukti', [BuktiController::class, 'destroy_bukti']);
//     Route::get('/get-data-bukti/{id}', [BuktiController::class, 'getData']);
//     Route::post('/update-bukti', [BuktiController::class, 'updateData']);

//     // Schedule Togel
//     Route::get('/index-jadwal', [JadwalController::class, 'index_jadwal'])->name('index-jadwal');
//     Route::post('/store-jadwal', [JadwalController::class, 'store_jadwal']);
//     Route::post('/destroy-jadwal', [JadwalController::class, 'destroy_jadwal']);
//     Route::get('/get-data-jadwal/{id}', [JadwalController::class, 'getData']);
//     Route::post('/update-jadwal', [JadwalController::class, 'updateData']);

//     // Dream Book
//     Route::get('/index-buku', [BukuController::class, 'index_buku'])->name('index-buku');
//     Route::post('/store-buku', [BukuController::class, 'store_buku']);
//     Route::post('/destroy-buku', [BukuController::class, 'destroy_buku']);
//     Route::get('/get-data-buku/{id}', [BukuController::class, 'getData']);
//     Route::post('/update-buku', [BukuController::class, 'updateData']);

//     // Keluhan Togel
//     Route::get('/index-keluhan', [KeluhanController::class, 'index_keluhan'])->name('index-keluhan');
//     Route::post('/destroy-keluhan', [KeluhanController::class, 'destroy_keluhan']);


//     // Banner
//     Route::get('/index-banner', [BannerController::class, 'index_banner'])->name('index-banner');
//     Route::post('/store-banner', [BannerController::class, 'store_banner']);
//     Route::post('/destroy-banner', [BannerController::class, 'destroy_banner']);

//     // RTP Slot

//     Route::post('/admin/rand-rtp', [RtpController::class, 'update'])->name('admin-rtp');
//     Route::post('/admin/input-url', [RtpController::class, 'updateUrl'])->name('url-rtp');

//     // Pola rtp
//     Route::get('/index-pola', [BannerController::class, 'index_pola_rtp'])->name('index-pola-rtp');

//     // Profile
//     Route::get('/my-profile', [ProfileController::class, 'index_profile'])->name('index-profile');
//     Route::post('/update-profile', [ProfileController::class, 'updateData'])->name('update-profile');

//     // My Contact
//     Route::get('/index-contact', [ContactController::class, 'index_contact'])->name('index-contact');
//     Route::post('/store-contact', [ContactController::class, 'store_contact']);
//     Route::post('/destroy-contact', [ContactController::class, 'destroy_contact']);
//     Route::get('/get-data-contact/{id}', [ContactController::class, 'getData']);
//     Route::post('/update-contact', [ContactController::class, 'updateData']);

//     // Shio Lottery
//     Route::get('/index-shio', [ShioController::class, 'index_shio'])->name('index-shio');
//     Route::post('/store-shio', [ShioController::class, 'store_shio']);
//     Route::post('/destroy-shio', [ShioController::class, 'destroy_shio']);
//     Route::get('/get-data-shio/{id}', [ShioController::class, 'getData']);
//     Route::post('/update-shio', [ShioController::class, 'updateData']);
//     Route::post('/generate-shio', [ShioController::class, 'generateShio']);

// });


// require __DIR__.'/auth.php';
