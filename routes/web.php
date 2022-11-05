<?php

use App\Http\Controllers\Aparatur\ChangePasswordController;
use App\Http\Controllers\Aparatur\DaftarKegiatanController;
use App\Http\Controllers\Aparatur\DaftarPenunjangController;
use App\Http\Controllers\Aparatur\DataSayaController;
use App\Http\Controllers\Aparatur\Kegiatan\KegiatanJabatanController as KegiatanKegiatanJabatanController;
use App\Http\Controllers\Aparatur\LaporanJabatanController;
use App\Http\Controllers\Aparatur\LaporanKegiatan\KegiatanJabatanController as LaporanKegiatanKegiatanJabatanController;
use App\Http\Controllers\Aparatur\LaporanKegiatanController;
use App\Http\Controllers\Aparatur\OverviewController;
use App\Http\Controllers\Aparatur\TabelKegiatanController;
use App\Http\Controllers\Aparatur\tabelPenunjangController;
use App\Http\Controllers\Api\FilePondController;
use App\Http\Controllers\Api\KabKotaController;
use App\Http\Controllers\AtasanLangsung\KegiatanLangsungController;
use App\Http\Controllers\AtasanLangsung\KegiatanPengajuanController;
use App\Http\Controllers\AtasanLangsung\OverviewController as AtasanLangsungOverviewController;
use App\Http\Controllers\AtasanLangsung\PengajuanKegiatanController;
use App\Http\Controllers\PenilaiAk\OverviewController as PenilaiAkOverviewController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\KabKota\ChatboxController;
use App\Http\Controllers\KabKota\DataAparatur\PejabatstrukturalController as KabKotaPejabatStrukturalController;
use App\Http\Controllers\KabKota\DataAparatur\DataAparaturController as KabKotaPejabatFungsionalController;
use App\Http\Controllers\KabKota\DataMenteController;
use App\Http\Controllers\KabKota\MenteController;
use App\Http\Controllers\KabKota\OverviewController as KabKotaOverviewController;
use App\Http\Controllers\KabKota\VerifikasiAparatur\PejabatFungsionalController;
use App\Http\Controllers\KabKota\VerifikasiAparatur\PejabatStrukturalController;
use App\Http\Controllers\KabKota\VerifikasiAparatur\VerifikasiAparaturController;
use App\Http\Controllers\Kemendagri\CMS\KegiatanJabatanController;
use App\Http\Controllers\Kemendagri\CMS\KegiatanProfesiController;
use App\Http\Controllers\Kemendagri\DataAdminDaerah\AdminKabKotaController as DataAdminDaerahAdminKabKotaController;
use App\Http\Controllers\Kemendagri\DataAdminDaerah\AdminProvinsiController as DataAdminDaerahAdminProvinsiController;
use App\Http\Controllers\Kemendagri\DataProvKabKotaController;
use App\Http\Controllers\Kemendagri\OverviewController as KemendagriOverviewController;
use App\Http\Controllers\Kemendagri\PejabatStrukturalController as KemendagriPejabatStrukturalController;
use App\Http\Controllers\Kemendagri\VerifikasiData\AdminKabKotaController;
use App\Http\Controllers\Kemendagri\VerifikasiData\AdminProvinsiController;
use App\Http\Controllers\Kemendagri\VerifikasiData\AparaturController as KemendagriAparaturController;
use App\Http\Controllers\PenilaiAk\DataPengajuan\DataPengajuanController;
use App\Http\Controllers\PenilaiAk\KegiatanSelesai\KegiatanSelesaiController;
use App\Http\Controllers\PenilaiAk\ProfesiPenunjangController;
use App\Http\Controllers\PenilaiAk\ProfesiPenunjangShowController;
use App\Http\Controllers\Kemendagri\CMS\InformasiController;
use App\Http\Controllers\Kemendagri\CMS\PeriodeController;
use App\Http\Controllers\provinsi\Chatbox;
use App\Http\Controllers\Provinsi\DataAparaturController as ProvinsiDataAparaturController;
use App\Http\Controllers\Provinsi\OverviewController as ProvinsiOverviewController;
use App\Http\Controllers\Provinsi\PejabatStrukturalController as ProvinsiPejabatStrukturalController;
use App\Http\Controllers\provinsi\ChatboxController as ProvinsiChatboxController;
use App\Models\KabKota;
use App\Models\Mente;
use App\Models\Provinsi;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
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
Route::get('coba', function(){
    return view('timeline');
});
Route::redirect('/', 'login');
Auth::routes(['verify' => true]);
Route::post('register/file', [RegisterController::class, 'storeFile']);
Route::delete('register/revert', [RegisterController::class, 'revert']);
Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:damkar_pemula|damkar_terampil|damkar_mahir|damkar_penyelia|analis_kebakaran_ahli_pertama|analis_kebakaran_ahli_muda|analis_kebakaran_ahli_madya'])->group(function () {
        Route::get('/overview', [OverviewController::class, 'index'])->name('overview');

        Route::controller(DataSayaController::class)->group(function () {
            Route::get('/data-saya', 'index')->name('data-saya');
            Route::post('/datasaya-store', [DataSayaController::class, 'store'])->name('datasaya-store');
            Route::get('data-saya/show-dockepeg/{id}', 'showDocKepeg')->name('data-saya.show-doc-kepeg');
            Route::post('data-saya/store-dockepeg', 'storeDocKepeg')->name('data-saya.store-doc-kepeg');
            Route::post('data-saya/store-dockom', 'storeDocKom')->name('data-saya.store-doc-kom');
            Route::delete('data-saya/destroy-dockepeg/{id}', 'destroyDocKepeg')->name('data-saya.destroy-doc-kepeg');
            Route::delete('data-saya/destroy-dockom/{id}', 'destroyDocKom')->name('data-saya.destroy-doc-kom');
        });

        Route::controller(KegiatanKegiatanJabatanController::class)->group(function () {
            Route::get('kegiatan/jabatan', 'index')->name('kegiatan.jabatan');
            Route::post('kegiatan/jabatan/search', 'search')->name('kegiatan.jabatan.search');
            Route::post('kegiatan/jabatan/rencana-kinerja/store', 'store')->name('kegiatan.jabatan.rencana-kinerja.store');
        });

        Route::controller(LaporanKegiatanKegiatanJabatanController::class)->group(function () {
            Route::get('laporan-kegiatan/jabatan', 'index')->name('laporan-kegiatan.jabatan');
            Route::post('laporan-kegiatan/jabatan', 'storeLaporan')->name('laporan-kegiatan.jabatan.store-laporan');
            Route::post('laporan-kegiatan/jabatan/{id}/edit', 'edit')->name('laporan-kegiatan.jabatan.edit');
            Route::post('laporan-kegiatan/jabatan/{id}/update', 'update')->name('laporan-kegiatan.jabatan.update');
            Route::post('laporan-kegiatan/jabatan/tmp-file', 'tmpFile')->name('laporan-kegiatan.jabatan.tmp-file');
            Route::delete('laporan-kegiatan/jabatan/revert', 'revert')->name('laporan-kegiatan.jabatan.revert');
        });

        Route::get('ubah-password', [ChangePasswordController::class, 'index'])->name('ubah-password');
        Route::post('ubah-password', [ChangePasswordController::class, 'update'])->name('ubah-password.update');
        Route::get('/daftar-kegiatan', [DaftarKegiatanController::class, 'index'])->name('daftar-kegiatan');
        Route::get('/daftar-penunjang', [DaftarPenunjangController::class, 'index'])->name('daftar-penunjang');
        Route::get('/tabel-kegiatan', [TabelKegiatanController::class, 'index'])->name('tabel-kegiatan');
        Route::get('/tabel-penunjang', [tabelPenunjangController::class, 'index'])->name('tabel-penunjang');
        Route::get('/laporan-kegiatan', [LaporanKegiatanController::class, 'index'])->name('laporan-kegiatan');
        Route::get('/laporan-jabatan', [LaporanJabatanController::class, 'index'])->name('laporan-jabatan');
    });

    Route::middleware(['role:kab_kota'])->group(function () {
        Route::get('kab-kota/overview', [KabKotaOverviewController::class, 'index'])->name('kab-kota.overview');

        Route::get('kab-kota/verifikasi-aparatur/pejabat-fungsional', [PejabatFungsionalController::class, 'index'])->name('kab-kota.verifikasi-aparatur.pejabat-fungsional.index');
        Route::get('kab-kota/verifikasi-aparatur/pejabat-fungsional/{id}/show', [PejabatFungsionalController::class, 'show'])->name('kab-kota.verifikasi-aparatur.pejabat-fungsional.show');

        Route::get('kab-kota/verifikasi-aparatur/pejabat-struktural', [PejabatStrukturalController::class, 'index'])->name('kab-kota.verifikasi-aparatur.pejabat-struktural.index');
        Route::get('kab-kota/verifikasi-aparatur/pejabat-struktural/{id}/show', [PejabatStrukturalController::class, 'show'])->name('kab-kota.verifikasi-aparatur.pejabat-struktural.show');

        Route::post('kab-kota/verifikasi-aparatur/{id}/verified', [VerifikasiAparaturController::class, 'verified'])->name('kab-kota.verifikasi-aparatur.verified');
        Route::post('kab-kota/verifikasi-aparatur/{id}/reject', [VerifikasiAparaturController::class, 'reject'])->name('kab-kota.verifikasi-aparatur.reject');

        Route::get('kab-kota/data-aparatur/pejabat-fungsional', [KabKotaPejabatFungsionalController::class, 'index'])->name('kab-kota.data-aparatur.pejabat-fungsional.index');
        Route::get('kab-kota/data-aparatur/pejabat-fungsional/{id}/show', [KabKotaPejabatFungsionalController::class, 'show'])->name('kab-kota.data-aparatur.pejabat-fungsional.show');

        Route::get('kab-kota/data-aparatur/pejabat-struktural', [KabKotaPejabatStrukturalController::class, 'index'])->name('kab-kota.data-aparatur.pejabat-struktural.index');

        Route::get('kab-kota/data-mente', [MenteController::class, 'index'])->name('kab-kota.data-mente');
        Route::post('kab-kota/data-mente/store', [MenteController::class, 'store'])->name('kab-kota.data-mente.store');
        Route::get('kab-kota/data-mente/{id}/show', [MenteController::class, 'show'])->name('kab-kota.data-mente.show');
        Route::get('kab-kota/data-mente/{id}/edit', [MenteController::class, 'edit'])->name('kab-kota.data-mente.edit');
        Route::put('kab-kota/data-mente/{id}/update', [MenteController::class, 'update'])->name('kab-kota.data-mente.update');

        Route::get('kab-kota/chatbox', [ChatboxController::class, 'index'])->name('kab-kota.chatbox');
    });

    Route::middleware(['role:atasan_langsung'])->group(function () {
        Route::get('atasan-langsung/overview', [AtasanLangsungOverviewController::class, 'index'])->name('atasan-langsung.overview.index');
        Route::get('atasan-langsung/pengajuan-kegiatan', [PengajuanKegiatanController::class, 'index'])->name('atasan-langsung.pengajuan-kegiatan.index');
        Route::get('atasan-langsung/pengajuan-kegiatan/{id}/show', [PengajuanKegiatanController::class, 'show'])->name('atasan-langsung.pengajuan-kegiatan.show');
        Route::post('atasan-langsung/pengajuan-kegiatan/{id}/tolak', [PengajuanKegiatanController::class, 'tolak'])->name('atasan-langsung.pengajuan-kegiatan.tolak');
        Route::post('atasan-langsung/pengajuan-kegiatan/{id}/revisi', [PengajuanKegiatanController::class, 'revisi'])->name('atasan-langsung.pengajuan-kegiatan.revisi');
        Route::post('atasan-langsung/pengajuan-kegiatan/{id}/verifikasi', [PengajuanKegiatanController::class, 'verifikasi'])->name('atasan-langsung.pengajuan-kegiatan.verifikasi');
        Route::get('atasan-langsung/kegiatan-selesai', [KegiatanLangsungController::class, 'index'])->name('atasan-langsung.kegiatan-selesai');
    });

    Route::middleware(['role:penilai_ak'])->group(function () {
        Route::get('penilai-ak/overview', [PenilaiAkOverviewController::class, 'index'])->name('penilai-ak.overview');
        Route::get('penilai-ak/kegiatan-profesi/profesi-penunjang', [ProfesiPenunjangController::class, 'index'])->name('penilai-ak.kegiatan-profesi.profesi-penunjang');
        Route::get('penilai-ak/kegiatan-profesi/show', [ProfesiPenunjangShowController::class, 'index'])->name('penilai-ak.kegiatan-profesi.show');
        Route::get('penilai-ak/data-penunjang/data-pengajuan', [DataPengajuanController::class, 'index'])->name('penilai-ak.data-penunjang.data-pengajuan');
        Route::get('penilai-ak/kegiatan-selesai/kegiatan-selesai', [KegiatanSelesaiController::class, 'index'])->name('penilai-ak.kegiatan-selesai.kegiatan-selesai');
    });

    Route::middleware(['role:provinsi'])->group(function () {
        Route::get('provinsi/overview', [ProvinsiOverviewController::class, 'index'])->name('provinsi.overview.index');
        Route::get('provinsi/aparatur/data-aparatur', [ProvinsiDataAparaturController::class, 'index'])->name('provinsi.aparatur.data-aparatur');
        Route::get('provinsi/kabkota', [ProvinsiPejabatStrukturalController::class, 'index'])->name('provinsi.kabkota');
        Route::get('provinsi/chatbox', [ProvinsiChatboxController::class, 'index'])->name('provinsi.chatbox');
    });

    Route::middleware(['role:kemendagri'])->group(function () {
        Route::get('kemendagri/overview', [KemendagriOverviewController::class, 'index'])->name('kemendagri.overview.index');
        Route::controller(AdminKabKotaController::class)->group(function () {
            Route::get('kemendagri/verifikasi-data/admin-kabkota', 'index')->name('kemendagri.verifikasi-data.admin-kabkota.index');
            Route::get('kemendagri/verifikasi-data/admin-kabkota/{id}/document', 'showDoc')->name('kemendagri.verifikasi-data.admin-kabkota.showdoc');
            Route::post('kemendagri/verifikasi-data/admin-kabkota/{id}/verified', 'verified')->name('kemendagri.verifikasi-data.admin-kabkota.verified');
            Route::post('kemendagri/verifikasi-data/admin-kabkota/{id}/reject', 'reject')->name('kemendagri.verifikasi-data.admin-kabkota.reject');
        });

        Route::controller(AdminProvinsiController::class)->group(function () {
            Route::get('kemendagri/verifikasi-data/admin-provinsi', 'index')->name('kemendagri.verifikasi-data.admin-provinsi.index');
            Route::get('kemendagri/verifikasi-data/admin-provinsi/{id}/document', 'showDoc')->name('kemendagri.verifikasi-data.admin-provinsi.showdoc');
            Route::post('kemendagri/verifikasi-data/admin-provinsi/{id}/verified', 'verified')->name('kemendagri.verifikasi-data.admin-provinsi.verified');
            Route::post('kemendagri/verifikasi-data/admin-provinsi/{id}/reject', 'reject')->name('kemendagri.verifikasi-data.admin-provinsi.reject');
        });

        Route::controller(KemendagriAparaturController::class)->group(function () {
            Route::get('kemendagri/verifikasi-data/aparatur', 'index')->name('kemendagri.verifikasi-data.aparatur.aparatur');
            // Route::get('kemendagri/verifikasi-data/admin-provinsi/{id}/document', 'showDoc')->name('kemendagri.verifikasi-data.admin-provinsi.showdoc');
        });

        Route::controller(KemendagriPejabatStrukturalController::class)->group(function () {
            Route::get('kemendagri/pejabat-struktural', 'index')->name('kemendagri.pejabat-struktural.index');
            Route::get('kemendagri/pejabat-struktural/{id}/show', 'show')->name('kemendagri.pejabat-struktural.show');
            Route::post('kemendagri/pejabat-struktural/{id}/active', 'active')->name('kemendagri.pejabat-struktural.active');
            Route::post('kemendagri/pejabat-struktural/{id}/non-active', 'nonActive')->name('kemendagri.pejabat-struktural.non-active');
        });

        Route::controller(DataProvKabKotaController::class)->group(function () {
            Route::get('kemendagri/data-prov-kab-kota', 'index')->name('kemendagri.data-prov-kab-kota.index');
        });

        Route::controller(DataAdminDaerahAdminKabKotaController::class)->group(function () {
            Route::get('kemendagri/data-admin-daerah/admin-kabkota', 'index')->name('kemendagri.data-admin-daerah.admin-kabkota.index');
            Route::get('kemendagri/data-admin-daerah/admin-kabkota/{id}/document', 'showDoc')->name('kemendagri.data-admin-daerah.admin-kabkota.showdoc');
        });

        Route::controller(DataAdminDaerahAdminProvinsiController::class)->group(function () {
            Route::get('kemendagri/data-admin-daerah/admin-provinsi', 'index')->name('kemendagri.data-admin-daerah.admin-provinsi.index');
            Route::get('kemendagri/data-admin-daerah/admin-provinsi/{id}/document', 'showDoc')->name('kemendagri.data-admin-daerah.admin-provinsi.showdoc');
        });

        Route::controller(KegiatanJabatanController::class)->group(function () {
            Route::get('kemendagri/cms/kegiatan-jabatan', 'index')->name('kemendagri.cms.kegiatan-jabatan.index');
            Route::post('kemendagri/cms/kegiatan-jabatan', 'store')->name('kemendagri.cms.kegiatan-jabatan.store');
            Route::get('kemendagri/cms/kegiatan-jabatan/{id}/edit', 'edit')->name('kemendagri.cms.kegiatan-jabatan.edit');
            Route::put('kemendagri/cms/kegiatan-jabatan/{id}/update', 'update')->name('kemendagri.cms.kegiatan-jabatan.update');
            Route::post('kemendagri/cms/kegiatan-jabatan/import', 'import')->name('kemendagri.cms.kegiatan-jabatan.import');
            Route::get('kemendagri/cms/kegiatan-jabatan/download', 'downloadTemplate')->name('kemendagri.cms.kegiatan-jabatan.download');
            Route::delete('kemendagri/cms/kegiatan-jabatan/{id}/destroy', 'destroy')->name('kemendagri.cms.kegiatan-jabatan.destroy');
        });

        Route::controller(KegiatanProfesiController::class)->group(function () {
            Route::get('kemendagri/cms/kegiatan-profesi', 'index')->name('kemendagri.cms.kegiatan-profesi.index');
            Route::post('kemendagri/cms/kegiatan-profesi', 'store')->name('kemendagri.cms.kegiatan-profesi.store');
            Route::get('kemendagri/cms/kegiatan-profesi/{id}/edit', 'edit')->name('kemendagri.cms.kegiatan-profesi.edit');
            Route::put('kemendagri/cms/kegiatan-profesi/{id}/update', 'update')->name('kemendagri.cms.kegiatan-profesi.update');
            Route::post('kemendagri/cms/kegiatan-profesi/import', 'import')->name('kemendagri.cms.kegiatan-profesi.import');
            Route::get('kemendagri/cms/kegiatan-profesi/download', 'downloadTemplate')->name('kemendagri.cms.kegiatan-profesi.download');
            Route::delete('kemendagri/cms/kegiatan-profesi/{id}/destroy', 'destroy')->name('kemendagri.cms.kegiatan-profesi.destroy');
        });
        Route::controller(InformasiController::class)->group(function () {
            Route::get('kemendagri/cms/informasi', 'index')->name('kemendagri.cms.informasi.index');
        });
        Route::controller(PeriodeController::class)->group(function () {
            Route::get('kemendagri/cms/periode', 'index')->name('kemendagri.cms.periode.index');
            Route::post('kemendagri/cms/periode/store', 'store')->name('kemendagri.cms.periode.store');
        });
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('api/kab-kota/{provinsi_id}', [KabKotaController::class, 'byProvinsiId']);
Route::post('filepond', [FilePondController::class, 'store'])->name('filepond.store');
Route::delete('filepond', [FilePondController::class, 'destroy'])->name('filepond.destroy');
