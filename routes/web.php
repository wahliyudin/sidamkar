<?php

use App\Http\Controllers\Aparatur\DaftarKegiatanController;
use App\Http\Controllers\Aparatur\DataSayaController;
use App\Http\Controllers\Aparatur\LaporanKegiatanController;
use App\Http\Controllers\Aparatur\OverviewController;
use App\Http\Controllers\Aparatur\TabelKegiatanController;
use App\Http\Controllers\Api\KabKotaController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\KabKota\DataAparaturController;
use App\Http\Controllers\KabKota\OverviewController as KabKotaOverviewController;
use App\Http\Controllers\KabKota\VerifikasiAparatur\PejabatFungsionalController;
use App\Http\Controllers\KabKota\VerifikasiAparatur\PejabatStrukturalController;
use App\Http\Controllers\KabKota\VerifikasiAparaturController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
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
// Route::get('/', [CobaController::class, 'index']);
// Route::post('/store', [CobaController::class, 'store'])->name('coba.store');
Route::get('/', function () {
    return redirect()->route('login');
});
Auth::routes(['verify' => true]);

Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:damkar|analis_kebakaran'])->group(function () {
        Route::get('/overview', [OverviewController::class, 'index'])->name('overview');
        Route::get('/data-saya', [DataSayaController::class, 'index'])->name('data-saya');
        Route::get('/daftar-kegiatan', [DaftarKegiatanController::class, 'index'])->name('daftar-kegiatan');
        Route::get('/tabel-kegiatan', [TabelKegiatanController::class, 'index'])->name('tabel-kegiatan');
        Route::get('/laporan-kegiatan', [LaporanKegiatanController::class, 'index'])->name('laporan-kegiatan');
    });
    Route::middleware(['role:kab_kota'])->group(function () {
        Route::get('kab-kota/overview', [KabKotaOverviewController::class, 'index'])->name('kab-kota.overview');

        Route::get('kab-kota/verifikasi-aparatur/pejabat-fungsional', [PejabatFungsionalController::class, 'index'])->name('kab-kota.verifikasi-aparatur.pejabat-fungsional.index');
        Route::get('kab-kota/verifikasi-aparatur/pejabat-fungsional/{id}/show', [PejabatFungsionalController::class, 'show'])->name('kab-kota.verifikasi-aparatur.pejabat-fungsional.show');
        Route::put('kab-kota/verifikasi-aparatur/pejabat-fungsional/{id}/verified', [PejabatFungsionalController::class, 'verified'])->name('kab-kota.verifikasi-aparatur.pejabat-fungsional.verified');

        Route::get('kab-kota/verifikasi-aparatur/pejabat-struktural', [PejabatStrukturalController::class, 'index'])->name('kab-kota.verifikasi-aparatur.pejabat-struktural.index');
        Route::get('kab-kota/verifikasi-aparatur/pejabat-struktural/{id}/show', [PejabatStrukturalController::class, 'show'])->name('kab-kota.verifikasi-aparatur.pejabat-struktural.show');
        Route::put('kab-kota/verifikasi-aparatur/pejabat-struktural/{id}/verified', [PejabatStrukturalController::class, 'verified'])->name('kab-kota.verifikasi-aparatur.pejabat-struktural.verified');

        Route::get('kab-kota/data-aparatur', [DataAparaturController::class, 'index'])->name('kab-kota.data-aparatur.index');
        Route::get('kab-kota/data-aparatur/{id}/show', [DataAparaturController::class, 'show'])->name('kab-kota.data-aparatur.show');

        Route::get('kab-kota/detail-data-aparatur', [DataAparaturController::class, 'show'])->name('kab-kota.detail-data-aparatur');
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('api/kab-kota/{provinsi_id}', [KabKotaController::class, 'byProvinsiId']);
