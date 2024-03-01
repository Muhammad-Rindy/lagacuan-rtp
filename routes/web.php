<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\PasaranController;
use App\Http\Controllers\ProfileController;
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
    return view('pasaran');

});


Route::get('/', [PasaranController::class, 'index_pasaran'])->name('index-pasaran');
Route::get('/live-draw', [PasaranController::class, 'index_live'])->name('index-live');
Route::get('/prediksi-togel', [PasaranController::class, 'index_prediksi'])->name('index-prediksi');
Route::get('/jadwal-togel', [PasaranController::class, 'index_jadwal'])->name('index-jadwal');
Route::get('/data-result', [PasaranController::class, 'index_result'])->name('index-result');
Route::get('/bukti-jackpot', [PasaranController::class, 'index_bukti'])->name('index-bukti');
Route::get('/buku-mimpi', [PasaranController::class, 'index_buku'])->name('index-buku');
Route::get('/promosi', [PasaranController::class, 'index_promosi'])->name('index-promosi');
Route::get('/keluhan', [PasaranController::class, 'index_keluhan'])->name('index-keluhan');
Route::get('/paito', [PasaranController::class, 'index_paito'])->name('index-paito');

Route::get('/index-data', [DataController::class, 'index_data']);

Route::get('/dashboard', function () {
    return view('dashboards.index-pasaran');

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
