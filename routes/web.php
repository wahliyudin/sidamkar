<?php

use App\Http\Controllers\Aparatur\DaftarKegiatanController;
use App\Http\Controllers\Aparatur\DataSayaController;
use App\Http\Controllers\Aparatur\LaporanKegiatanController;
use App\Http\Controllers\Aparatur\OverviewController;
use App\Http\Controllers\Aparatur\TabelKegiatanController;
use App\Http\Controllers\Api\KabKotaController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\KabKota\OverviewController as KabKotaOverviewController;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});
Auth::routes(['verify' => true]);

Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:damkar,analis_kebakaran'])->group(function () {
        Route::get('/overview', [OverviewController::class, 'index'])->name('overview');
        Route::get('/data-saya', [DataSayaController::class, 'index'])->name('data-saya');
        Route::get('/daftar-kegiatan', [DaftarKegiatanController::class, 'index'])->name('daftar-kegiatan');
        Route::get('/tabel-kegiatan', [TabelKegiatanController::class, 'index'])->name('tabel-kegiatan');
        Route::get('/laporan-kegiatan', [LaporanKegiatanController::class, 'index'])->name('laporan-kegiatan');


        Route::get('/login-revisi', function () {
            return view('login-revisi');
        })->name('login-revisi');
        Route::get('/daftar-laporan-kegiatan', function () {
            return view('daftar-laporan-kegiatan');
        })->name('daftar-laporan-kegiatan');
        Route::get('/butir-kegiatan', function () {
            return view('butir-kegiatan');
        })->name('butir-kegiatan');
        Route::get('/revisi-laporan-kegiatan', function () {
            return view('revisi-laporan-kegiatan');
        })->name('revisi-laporan-kegiatan');
        Route::get('/verifikasi-data', function () {
            return view('verifikasi-data');
        })->name('verifikasi-data');
        Route::get('/detail-data-aparatur', function () {
            return view('detail-data-aparatur');
        })->name('detail-data-aparatur');
        Route::get('/data-aparatur', function () {
            return view('data-aparatur');
        })->name('data-aparatur');
        Route::get('/data-pejabat-struktural', function () {
            return view('data-pejabat-struktural');
        })->name('data-pejabat-struktural');
        Route::get('/detail-data-pejabat-struktural', function () {
            return view('detail-data-pejabat-struktural');
        })->name('detail-data-pejabat-struktural');
        Route::get('/lampiran-kegiatan', function () {
            return view('lampiran-kegiatan');
        })->name('lampiran-kegiatan');
        Route::get('/data-pengajuan-laporan-kegiatan', function () {
            return view('data-pengajuan-laporan-kegiatan');
        })->name('data-pengajuan-laporan-kegiatan');
    });
    Route::middleware(['role:kab_kota'])->group(function () {
        Route::get('kab-kota/overview', [KabKotaOverviewController::class, 'index'])->name('kab-kota.overview');
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('api/kab-kota/{provinsi_id}', [KabKotaController::class, 'byProvinsiId']);
