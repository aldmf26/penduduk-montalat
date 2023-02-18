<?php

use App\Http\Controllers\KkController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
   
    
    Route::get('user', [UserController::class, 'index'])->name('user');
    Route::post('tambah_user', [UserController::class, 'create'])->name('tambah_user');
    Route::post('edit_user', [UserController::class, 'update'])->name('edit_user');
    Route::get('/hapus_user/{id}', [UserController::class, 'destroy'])->name('hapus_user');

    // penduduk
    Route::get('penduduk', [PendudukController::class, 'index'])->name('penduduk');
    Route::post('tambah_penduduk', [PendudukController::class, 'create'])->name('tambah_penduduk');
    Route::post('edit_penduduk', [PendudukController::class, 'update'])->name('edit_penduduk');
    Route::get('/hapus_penduduk/{id}', [PendudukController::class, 'destroy'])->name('hapus_penduduk');

    // kartu keluarga
    Route::get('kk', [KkController::class, 'index'])->name('kk');
    Route::post('tambah_kk', [KkController::class, 'create'])->name('tambah_kk');
    Route::post('edit_kk', [KkController::class, 'update'])->name('edit_kk');
    Route::get('/hapus_kk/{id}', [KkController::class, 'destroy'])->name('hapus_kk');
    
    // laporan
    Route::get('lap_masuk/{jenis}', [LaporanController::class, 'suratMasuk'])->name('lap_masuk');
    Route::get('saveLapMasuk', [LaporanController::class, 'saveLapMasuk'])->name('saveLapMasuk');


});


Route::get('/dashboard', function () {
    $data = [
        'title' => 'Dashboard',
    ];
    return view('dashboard.dashboard', $data);
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
