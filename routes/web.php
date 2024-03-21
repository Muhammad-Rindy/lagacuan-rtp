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
// Route::get('/home', [PasaranController::class, 'index_pasaran_home'])->name('index-pasaran-home');
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

Route::get('/testing', function () {
    $rtp = getRtp()->map(function($e) {
        if (stripos($e->url, "peler")) {
            $e->url = "jder.com";
        }
        return $e;
    });

    $data = json_encode($rtp, JSON_PRETTY_PRINT);
    Storage::put("json/data_rtp.json", $data);

    return getRtp();
});
