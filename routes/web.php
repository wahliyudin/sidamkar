<?php

use App\Http\Controllers\Aparatur\DaftarKegiatanController;
use App\Http\Controllers\Aparatur\DataSayaController;
use App\Http\Controllers\Aparatur\LaporanKegiatanController;
use App\Http\Controllers\Aparatur\OverviewController;
use App\Http\Controllers\Aparatur\TabelKegiatanController;
use App\Http\Controllers\Api\FilePondController;
use App\Http\Controllers\Api\KabKotaController;
use App\Http\Controllers\AtasanLangsung\OverviewController as AtasanLangsungOverviewController;
use App\Http\Controllers\AtasanLangsung\PengajuanKegiatanController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\KabKota\DataAparaturController;
use App\Http\Controllers\KabKota\OverviewController as KabKotaOverviewController;
use App\Http\Controllers\KabKota\VerifikasiAparatur\PejabatFungsionalController;
use App\Http\Controllers\KabKota\VerifikasiAparatur\PejabatStrukturalController;
use App\Http\Controllers\KabKota\VerifikasiAparatur\VerifikasiAparaturController;
use App\Http\Controllers\Kemendagri\DataProvKabKotaController;
use App\Http\Controllers\Kemendagri\OverviewController as KemendagriOverviewController;
use App\Http\Controllers\Kemendagri\PejabatStrukturalController as KemendagriPejabatStrukturalController;
use App\Http\Controllers\Kemendagri\VerifikasiData\AdminKabKotaController;
use App\Http\Controllers\Kemendagri\VerifikasiData\AdminProvinsiController;
use App\Http\Controllers\Provinsi\OverviewController as ProvinsiOverviewController;
use App\Models\KabKota;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder;
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

Route::get('/', function () {
    $data = KabKota::query()
        ->whereHas('provinsi', function($query){
            $query->where('nama', '=', 'ACEH');
        })
        ->with('provinsi')
        ->get();
    return $data;
    return redirect()->route('login');
});
Auth::routes(['verify' => true]);

Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:damkar_pemula|damkar_terampil|damkar_mahir|damkar_penyelia|analis_kebakaran_ahli_pertama|analis_kebakaran_ahli_muda|analis_kebakaran_ahli_madya'])->group(function () {
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

        Route::get('kab-kota/verifikasi-aparatur/pejabat-struktural', [PejabatStrukturalController::class, 'index'])->name('kab-kota.verifikasi-aparatur.pejabat-struktural.index');
        Route::get('kab-kota/verifikasi-aparatur/pejabat-struktural/{id}/show', [PejabatStrukturalController::class, 'show'])->name('kab-kota.verifikasi-aparatur.pejabat-struktural.show');

        Route::post('kab-kota/verifikasi-aparatur/{id}/verified', [VerifikasiAparaturController::class, 'verified'])->name('kab-kota.verifikasi-aparatur.verified');
        Route::post('kab-kota/verifikasi-aparatur/{id}/reject', [VerifikasiAparaturController::class, 'reject'])->name('kab-kota.verifikasi-aparatur.reject');

        Route::get('kab-kota/data-aparatur', [DataAparaturController::class, 'index'])->name('kab-kota.data-aparatur.index');
        Route::get('kab-kota/data-aparatur/{id}/show', [DataAparaturController::class, 'show'])->name('kab-kota.data-aparatur.show');
    });

    Route::middleware(['role:atasan_langsung'])->group(function () {
        Route::get('atasan-langsung/overview', [AtasanLangsungOverviewController::class, 'index'])->name('atasan-langsung.overview.index');
        Route::get('atasan-langsung/pengajuan-kegiatan', [PengajuanKegiatanController::class, 'index'])->name('atasan-langsung.pengajuan-kegiatan.index');
    });

    Route::middleware(['role:provinsi'])->group(function () {
        Route::get('provinsi/overview', [ProvinsiOverviewController::class, 'index'])->name('provinsi.overview.index');
    });

    Route::middleware(['role:kemendagri'])->group(function () {
        Route::get('kemendagri/overview', [KemendagriOverviewController::class, 'index'])->name('kemendagri.overview.index');
        Route::get('kemendagri/verifikasi-data/admin-kabkota', [AdminKabKotaController::class, 'index'])->name('kemendagri.verifikasi-data.admin-kabkota.index');
        Route::get('kemendagri/verifikasi-data/admin-provinsi', [AdminProvinsiController::class, 'index'])->name('kemendagri.verifikasi-data.admin-provinsi.index');

        Route::controller(KemendagriPejabatStrukturalController::class)->group(function () {
            Route::get('kemendagri/pejabat-struktural', 'index')->name('kemendagri.pejabat-struktural.index');
            Route::get('kemendagri/pejabat-struktural/{id}/show', 'show')->name('kemendagri.pejabat-struktural.show');
        });

        Route::controller(DataProvKabKotaController::class)->group(function () {
            Route::get('kemendagri/data-prov-kab-kota', 'index')->name('kemendagri.data-prov-kab-kota.index');
            // Route::get('kemendagri/data-prov-kab-kota/{id}/show', 'show')->name('kemendagri.data-prov-kab-kota.show');
        });
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('api/kab-kota/{provinsi_id}', [KabKotaController::class, 'byProvinsiId']);
Route::post('filepond', [FilePondController::class, 'store'])->name('filepond.store');
Route::delete('filepond', [FilePondController::class, 'destroy'])->name('filepond.destroy');
