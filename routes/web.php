<?php

use App\Http\Controllers\AnggotaKeluargaController;
use App\Http\Controllers\DatangController;
use App\Http\Controllers\KelahiranController;
use App\Http\Controllers\KematianController;
use App\Http\Controllers\KkController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\PindahController;
use App\Http\Controllers\UserController;
use App\Models\AnggotaKeluarga;
use App\Models\Kelahiran;
use App\Models\Kematian;
use App\Models\Kk;
use App\Models\Pegawai;
use App\Models\Penduduk;
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

    // pegawai
    Route::get('pegawai', [PegawaiController::class, 'index'])->name('pegawai');
    Route::post('tambah_pegawai', [PegawaiController::class, 'create'])->name('tambah_pegawai');
    Route::post('edit_pegawai', [PegawaiController::class, 'update'])->name('edit_pegawai');
    Route::get('/hapus_pegawai/{id}', [PegawaiController::class, 'destroy'])->name('hapus_pegawai');

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

    // anggota keluarga
    Route::get('anggota_keluarga', [AnggotaKeluargaController::class, 'index'])->name('anggota_keluarga');
    Route::post('tambah_anggota_keluarga', [AnggotaKeluargaController::class, 'create'])->name('tambah_anggota_keluarga');
    Route::post('edit_anggota_keluarga', [AnggotaKeluargaController::class, 'update'])->name('edit_anggota_keluarga');
    Route::get('/hapus_anggota_keluarga/{id}', [AnggotaKeluargaController::class, 'destroy'])->name('hapus_anggota_keluarga');

    // kelahiran
    Route::get('kelahiran', [KelahiranController::class, 'index'])->name('kelahiran');
    Route::post('tambah_kelahiran', [KelahiranController::class, 'create'])->name('tambah_kelahiran');
    Route::post('edit_kelahiran', [KelahiranController::class, 'update'])->name('edit_kelahiran');
    Route::get('/hapus_kelahiran/{id}', [KelahiranController::class, 'destroy'])->name('hapus_kelahiran');

    // kematian
    Route::get('kematian', [KematianController::class, 'index'])->name('kematian');
    Route::post('tambah_kematian', [KematianController::class, 'create'])->name('tambah_kematian');
    Route::post('edit_kematian', [KematianController::class, 'update'])->name('edit_kematian');
    Route::get('/hapus_kematian/{id}', [KematianController::class, 'destroy'])->name('hapus_kematian');

    // Pindah
    Route::get('pindah', [PindahController::class, 'index'])->name('pindah');
    Route::post('tambah_pindah', [PindahController::class, 'create'])->name('tambah_pindah');
    Route::post('edit_pindah', [PindahController::class, 'update'])->name('edit_pindah');
    Route::get('/hapus_pindah/{id}', [PindahController::class, 'destroy'])->name('hapus_pindah');

    // datang
    Route::get('datang', [DatangController::class, 'index'])->name('datang');
    Route::post('tambah_datang', [DatangController::class, 'create'])->name('tambah_datang');
    Route::post('edit_datang', [DatangController::class, 'update'])->name('edit_datang');
    Route::get('/hapus_datang/{id}', [DatangController::class, 'destroy'])->name('hapus_datang');
    
    // laporan
    Route::get('lapPegawai', [LaporanController::class, 'lapPegawai'])->name('lapPegawai');
    Route::get('save_lapPegawai', [LaporanController::class, 'save_lapPegawai'])->name('save_lapPegawai');

    Route::get('lapPenduduk', [LaporanController::class, 'lapPenduduk'])->name('lapPenduduk');
    Route::post('save_lapPenduduk', [LaporanController::class, 'save_lapPenduduk'])->name('save_lapPenduduk');
    
    Route::get('lapKk', [LaporanController::class, 'lapKk'])->name('lapKk');
    Route::post('save_lapKk', [LaporanController::class, 'save_lapKk'])->name('save_lapKk');

    Route::get('lapAnggotaKeluarga', [LaporanController::class, 'lapAnggotaKeluarga'])->name('lapAnggotaKeluarga');
    Route::post('save_lapAnggotaKeluarga', [LaporanController::class, 'save_lapAnggotaKeluarga'])->name('save_lapAnggotaKeluarga');

    Route::get('lapKelahiran/{jenis}', [LaporanController::class, 'lapKelahiran'])->name('lapKelahiran');
    Route::post('save_lapKelahiran', [LaporanController::class, 'save_lapKelahiran'])->name('save_lapKelahiran');

    Route::get('lapDatang/{jenis}', [LaporanController::class, 'lapDatang'])->name('lapDatang');
    Route::post('save_lapDatang', [LaporanController::class, 'save_lapDatang'])->name('save_lapDatang');

});


Route::get('/dashboard', function () {
    
    $data = [
        'title' => 'Dashboard',
        'datas' => [
            'Pegawai' => [
                'title' => 'Data Pegawai',
                'icon' => 'bi-people',
                'count' => Pegawai::count()
            ],
            'Penduduk' => [
                'title' => 'Data Penduduk',
                'icon' => 'bi-person-lines-fill',
                'count' => Penduduk::count()
            ],
            'Kk' => [
                'title' => 'Data KK',
                'icon' => 'bi-person-square',
                'count' => Kk::count()
            ],
            'Anggota Keluarga' => [
                'title' => 'Anggota Keluarga',
                'icon' => 'bi-house',
                'count' => AnggotaKeluarga::count()
            ],
            'Kelahiran' => [
                'title' => 'Data Kelahiran',
                'icon' => 'bi-envelope-heart',
                'count' => Kelahiran::count()
            ],
            'Kematian' => [
                'title' => 'Data Kematian',
                'icon' => 'bi-exclamation-octagon',
                'count' => Kematian::count()
            ],
        ]
    ];
    return view('dashboard.dashboard', $data);
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
