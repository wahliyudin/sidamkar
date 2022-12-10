<?php

use App\Http\Controllers\Aparatur\ChangePasswordController;
use App\Http\Controllers\Aparatur\DaftarKegiatanController;
use App\Http\Controllers\Aparatur\DaftarPenunjangController;
use App\Http\Controllers\Aparatur\DataKegiatanController;
use App\Http\Controllers\Aparatur\DataSayaController;
use App\Http\Controllers\Aparatur\Kegiatan\KegiatanJabatanController as KegiatanKegiatanJabatanController;
use App\Http\Controllers\Aparatur\LaporanJabatanController;
use App\Http\Controllers\Aparatur\LaporanKegiatan\KegiatanJabatanController as LaporanKegiatanKegiatanJabatanController;
use App\Http\Controllers\Aparatur\LaporanKegiatan\KegiatanProfesiController as LaporanKegiatanKegiatanProfesiController;
use App\Http\Controllers\Aparatur\LaporanKegiatanController;
use App\Http\Controllers\Aparatur\OverviewController;
use App\Http\Controllers\Aparatur\TabelKegiatanController;
use App\Http\Controllers\Aparatur\tabelPenunjangController;
use App\Http\Controllers\Api\FilePondController;
use App\Http\Controllers\Api\KabKotaController;
use App\Http\Controllers\AtasanLangsung\DataAtasanLangsungController;
use App\Http\Controllers\AtasanLangsung\KegiatanLangsungController;
use App\Http\Controllers\AtasanLangsung\KegiatanSelesaiController as AtasanLangsungKegiatanSelesaiController;
use App\Http\Controllers\AtasanLangsung\OverviewController as AtasanLangsungOverviewController;
use App\Http\Controllers\AtasanLangsung\PengajuanKegiatanController;
use App\Http\Controllers\AtasanLangsung\VerifikasiKegiatanController as AtasanLangsungVerifikasiKegiatanController;
use App\Http\Controllers\PenilaiAk\OverviewController as PenilaiAkOverviewController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\KabKota\ChatboxController;
use App\Http\Controllers\KabKota\ManajemenUser\FungsionalController as KabKotaFungsionalController;
use App\Http\Controllers\KabKota\ManajemenUser\FungsionalUmumController as KabKotaFungsionalUmumController;
use App\Http\Controllers\KabKota\ManajemenUser\StrukturalController as KabKotaStrukturalController;
use App\Http\Controllers\KabKota\MenteController as KabKotaMenteController;
use App\Http\Controllers\KabKota\OverviewController as KabKotaOverviewController;
use App\Http\Controllers\Kemendagri\CMS\KegiatanJabatanController;
use App\Http\Controllers\Kemendagri\CMS\KegiatanProfesiController;
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
use App\Http\Controllers\Kemendagri\CMS\KegiatanPenunjangController;
use App\Http\Controllers\PenetapAK\OverviewPenetapAk;
use App\Http\Controllers\PenetapAK\DataPengajuan\KabKotaExternal;
use App\Http\Controllers\PenetapAK\DataPengajuan\KabKotaInternal;
use App\Http\Controllers\PenetapAK\DataPenetapAKController;
use App\Http\Controllers\PenilaiAK\DataPenilaiAKController;
use App\Http\Controllers\Kemendagri\CMS\PeriodeController;
use App\Http\Controllers\PenilaiAk\DataPengajuan\ExternalController;
use App\Http\Controllers\PenilaiAk\DataPengajuan\InternalController;
use App\Http\Controllers\PenilaiAk\KegiatanSelesai\ShowController;
use App\Http\Controllers\PenilaiAk\KegiatanSelesaiController as PenilaiAkKegiatanSelesaiController;
use App\Http\Controllers\provinsi\Chatbox;
use App\Http\Controllers\Provinsi\DataAparaturController as ProvinsiDataAparaturController;
use App\Http\Controllers\Provinsi\OverviewController as ProvinsiOverviewController;
use App\Http\Controllers\provinsi\ChatboxController as ProvinsiChatboxController;
use App\Http\Controllers\Provinsi\ManajemenUser\FungsionalController as ProvinsiFungsionalController;
use App\Http\Controllers\Provinsi\ManajemenUser\FungsionalUmumController as ProvinsiFungsionalUmumController;
use App\Http\Controllers\Provinsi\ManajemenUser\StrukturalController as ProvinsiStrukturalController;
use App\Http\Controllers\Provinsi\ManajemenUser\UserKabKotaController;
use App\Http\Controllers\Provinsi\MenteController as ProvinsiMenteController;
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

Route::get('coba', [CobaController::class, 'index']);
Route::redirect('/', 'login');
Auth::routes(['verify' => true]);
Route::post('register/file', [RegisterController::class, 'storeFile']);
Route::delete('register/revert', [RegisterController::class, 'revert']);
Route::get('ubah-password', [ChangePasswordController::class, 'index'])->name('ubah-password');
Route::post('ubah-password', [ChangePasswordController::class, 'update'])->name('ubah-password.update');
Route::middleware(['auth'])->group(function () {

    Route::middleware(['role:damkar_pemula|damkar_terampil|damkar_mahir|damkar_penyelia|analis_kebakaran_ahli_pertama|analis_kebakaran_ahli_muda|analis_kebakaran_ahli_madya'])->group(function () {
        Route::get('/overview', [OverviewController::class, 'index'])->name('overview');
        Route::get('/data-kegiatan', [DataKegiatanController::class, 'index'])->name('data-saya.data-kegiatan');

        Route::controller(DataSayaController::class)->group(function () {
            Route::get('/data-saya', 'index')->name('data-saya');
            Route::post('/datasaya-store', 'store')->name('datasaya-store');
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
            Route::get('kegiatan/jabatan/rencana-kinerja/{id}/edit', 'edit')->name('kegiatan.jabatan.rencana-kinerja.edit');
            Route::put('kegiatan/jabatan/rencana-kinerja/{id}/update', 'update')->name('kegiatan.jabatan.rencana-kinerja.update');
            Route::delete('kegiatan/jabatan/rencana-kinerja/{id}/destroy', 'destroy')->name('kegiatan.jabatan.rencana-kinerja.destroy');
        });

        Route::controller(LaporanKegiatanKegiatanJabatanController::class)->group(function () {
            Route::get('laporan-kegiatan/jabatan', 'index')->name('laporan-kegiatan.jabatan');
            Route::post('laporan-kegiatan/jabatan/load-data', 'loadData')->name('laporan-kegiatan.jabatan.load-data');
            Route::get('laporan-kegiatan/jabatan/{butir_kegiatan}/show', 'show')->name('laporan-kegiatan.jabatan.show');
            Route::post('laporan-kegiatan/jabatan/{butir_kegiatan}/store', 'storeLaporan')->name('laporan-kegiatan.jabatan.store-laporan');
            Route::get('laporan-kegiatan/jabatan/{laporan_kegiatan_jabatan}/edit', 'edit')->name('laporan-kegiatan.jabatan.edit');
            Route::post('laporan-kegiatan/jabatan/{laporan_kegiatan_jabatan}/update', 'update')->name('laporan-kegiatan.jabatan.update');
            Route::post('laporan-kegiatan/jabatan/tmp-file', 'storeTmpFile')->name('laporan-kegiatan.jabatan.tmp-file');
            Route::delete('laporan-kegiatan/jabatan/revert', 'revertTmpFile')->name('laporan-kegiatan.jabatan.revert');

            Route::post('laporan-kegiatan/jabatan/rekapitulasi', 'rekapitulasi')->name('laporan-kegiatan.jabatan.rekapitulasi');
            Route::post('laporan-kegiatan/jabatan/rekapitulasi/send-rekap', 'sendRekap')->name('laporan-kegiatan.jabatan.rekapitulasi.send-rekap');

            Route::post('laporan-kegiatan/jabatan/send-skp', 'sendSKP')->name('laporan-kegiatan.jabatan.send-skp');
        });

        Route::controller(LaporanKegiatanKegiatanProfesiController::class)->group(function () {
            Route::get('laporan-kegiatan/profesi', 'index')->name('laporan-kegiatan.profesi');
            Route::post('laporan-kegiatan/profesi/load-data', 'loadData')->name('laporan-kegiatan.profesi.load-data');
        });

        Route::get('/daftar-kegiatan', [DaftarKegiatanController::class, 'index'])->name('daftar-kegiatan');
        Route::get('/daftar-penunjang', [DaftarPenunjangController::class, 'index'])->name('daftar-penunjang');
        Route::get('/tabel-kegiatan', [TabelKegiatanController::class, 'index'])->name('tabel-kegiatan');
        Route::get('/tabel-penunjang', [tabelPenunjangController::class, 'index'])->name('tabel-penunjang');
        Route::get('/laporan-kegiatan', [LaporanKegiatanController::class, 'index'])->name('laporan-kegiatan');
        Route::get('/laporan-jabatan', [LaporanJabatanController::class, 'index'])->name('laporan-jabatan');
    });

    Route::middleware(['role:kab_kota'])->group(function () {
        Route::get('kab-kota/overview', [KabKotaOverviewController::class, 'index'])->name('kab-kota.overview');

        Route::get('kab-kota/manajemen-user/struktural', [KabKotaStrukturalController::class, 'index'])->name('kab-kota.manajemen-user.struktural');
        Route::post('kab-kota/manajemen-user/struktural/{id}/reject', [KabKotaStrukturalController::class, 'reject'])->name('kab-kota.manajemen-user.struktural.reject');
        Route::post('kab-kota/manajemen-user/struktural/{id}/verification', [KabKotaStrukturalController::class, 'verification'])->name('kab-kota.manajemen-user.struktural.verification');
        Route::delete('kab-kota/manajemen-user/struktural/{id}/destroy', [KabKotaStrukturalController::class, 'destroy'])->name('kab-kota.manajemen-user.struktural.destroy');

        Route::get('kab-kota/manajemen-user/fungsional', [KabKotaFungsionalController::class, 'index'])->name('kab-kota.manajemen-user.fungsional');
        Route::post('kab-kota/manajemen-user/fungsional/{id}/reject', [KabKotaFungsionalController::class, 'reject'])->name('kab-kota.manajemen-user.fungsional.reject');
        Route::post('kab-kota/manajemen-user/fungsional/{id}/verification', [KabKotaFungsionalController::class, 'verification'])->name('kab-kota.manajemen-user.fungsional.verification');
        Route::delete('kab-kota/manajemen-user/fungsional/{id}/destroy', [KabKotaFungsionalController::class, 'destroy'])->name('kab-kota.manajemen-user.fungsional.destroy');

        Route::get('kab-kota/manajemen-user/umum', [KabKotaFungsionalUmumController::class, 'index'])->name('kab-kota.manajemen-user.fungsional-umum');
        Route::post('kab-kota/manajemen-user/umum/{id}/reject', [KabKotaFungsionalUmumController::class, 'reject'])->name('kab-kota.manajemen-user.fungsional-umum.reject');
        Route::post('kab-kota/manajemen-user/umum/{id}/verification', [KabKotaFungsionalUmumController::class, 'verification'])->name('kab-kota.manajemen-user.fungsional-umum.verification');
        Route::delete('kab-kota/manajemen-user/umum/{id}/destroy', [KabKotaFungsionalUmumController::class, 'destroy'])->name('kab-kota.manajemen-user.fungsional-umum.destroy');

        Route::get('kab-kota/data-mente', [KabKotaMenteController::class, 'index'])->name('kab-kota.data-mente');
        Route::post('kab-kota/data-mente/store', [KabKotaMenteController::class, 'store'])->name('kab-kota.data-mente.store');
        Route::get('kab-kota/data-mente/{id}/show', [KabKotaMenteController::class, 'show'])->name('kab-kota.data-mente.show');
        Route::get('kab-kota/data-mente/{id}/edit', [KabKotaMenteController::class, 'edit'])->name('kab-kota.data-mente.edit');
        Route::put('kab-kota/data-mente/{id}/update', [KabKotaMenteController::class, 'update'])->name('kab-kota.data-mente.update');
        Route::post('kab-kota/data-mente/{kab_kota_id}/tingkat-kabkota', [KabKotaMenteController::class, 'tingkatKabKota'])->name('kab-kota.data-mente.tingkat-kabkota');
        Route::post('kab-kota/data-mente/{provinsi_id}/tingkat-provinsi', [KabKotaMenteController::class, 'tingkatProvinsi'])->name('kab-kota.data-mente.tingkat-provinsi');
        Route::post('kab-kota/data-mente/store-penilai-penetap', [KabKotaMenteController::class, 'storePenilaiAndPenetap'])->name('kab-kota.data-mente.store-penilai-penetap');

        Route::get('kab-kota/chatbox', [ChatboxController::class, 'index'])->name('kab-kota.chatbox');
    });

    Route::middleware(['role:atasan_langsung'])->group(function () {
        Route::get('data-atasan-langsung', [DataAtasanLangsungController::class, 'index'])->name('data-atasan-langsung');
        Route::post('data-atasan-langsung-store', [DataAtasanLangsungController::class, 'store'])->name('data-atasan-langsung-store');
        Route::get('data-atasan-langsung/show-dockepeg/{id}', [DataAtasanLangsungController::class, 'showDocKepeg'])->name('data-atasan-langsung.show-doc-kepeg');
        Route::post('data-atasan-langsung/store-dockepeg', [DataAtasanLangsungController::class, 'storeDocKepeg'])->name('data-atasan-langsung.store-doc-kepeg');
        Route::post('data-atasan-langsung/store-dockom', [DataAtasanLangsungController::class, 'storeDocKom'])->name('data-atasan-langsung.store-doc-kom');
        Route::delete('data-atasan-langsung/destroy-dockepeg/{id}', [DataAtasanLangsungController::class, 'destroyDocKepeg'])->name('data-atasan-langsung.destroy-doc-kepeg');
        Route::delete('data-atasan-langsung/destroy-dockom/{id}', [DataAtasanLangsungController::class, 'destroyDocKom'])->name('data-atasan-langsung.destroy-doc-kom');
        Route::get('atasan-langsung/overview', [AtasanLangsungOverviewController::class, 'index'])->name('atasan-langsung.overview.index');
        Route::get('atasan-langsung/pengajuan-kegiatan', [PengajuanKegiatanController::class, 'index'])->name('atasan-langsung.pengajuan-kegiatan.index');
        Route::post('atasan-langsung/pengajuan-kegiatan/{id}/load-data', [PengajuanKegiatanController::class, 'loadData'])->name('atasan-langsung.pengajuan-kegiatan.load-data');
        Route::get('atasan-langsung/pengajuan-kegiatan/{id}/show', [PengajuanKegiatanController::class, 'show'])->name('atasan-langsung.pengajuan-kegiatan.show');
        Route::post('atasan-langsung/pengajuan-kegiatan/{id}/{current_date}/tolak', [PengajuanKegiatanController::class, 'tolak'])->name('atasan-langsung.pengajuan-kegiatan.tolak');
        Route::post('atasan-langsung/pengajuan-kegiatan/{id}/{current_date}/revisi', [PengajuanKegiatanController::class, 'revisi'])->name('atasan-langsung.pengajuan-kegiatan.revisi');
        Route::post('atasan-langsung/pengajuan-kegiatan/{id}/{current_date}/verifikasi', [PengajuanKegiatanController::class, 'verifikasi'])->name('atasan-langsung.pengajuan-kegiatan.verifikasi');
        Route::get('atasan-langsung/kegiatan-selesai', [AtasanLangsungKegiatanSelesaiController::class, 'index'])->name('atasan-langsung.kegiatan-selesai');
        Route::get('atasan-langsung/kegiatan-selesai/{id}/show', [AtasanLangsungKegiatanSelesaiController::class, 'show'])->name('atasan-langsung.kegiatan-selesai.show');
        Route::post('atasan-langsung/kegiatan-selesai/{id}/ttd', [AtasanLangsungKegiatanSelesaiController::class, 'ttd'])->name('atasan-langsung.kegiatan-selesai.ttd');

        Route::get('atasan-langsung/verifikasi-kegiatan', [AtasanLangsungVerifikasiKegiatanController::class, 'index'])->name('atasan-langsung.verifikasi-kegiatan');
        Route::get('atasan-langsung/verifikasi-kegiatan/{id}/kegiatan-jabatan', [AtasanLangsungVerifikasiKegiatanController::class, 'kegiatanJabatan'])->name('atasan-langsung.verifikasi-kegiatan.kegiatan-jabatan');
        Route::post('atasan-langsung/verifikasi-kegiatan/kegiatan-jabatan/{id}/load-unsurs', [AtasanLangsungVerifikasiKegiatanController::class, 'loadUnsurs'])->name('atasan-langsung.verifikasi-kegiatan.kegiatan-jabatan.load-unsurs');
        Route::get('atasan-langsung/verifikasi-kegiatan/{user}/kegiatan-jabatan/{butir}/show', [AtasanLangsungVerifikasiKegiatanController::class, 'kegiatanJabatanShow'])->name('atasan-langsung.verifikasi-kegiatan.kegiatan-jabatan.show');
        Route::post('atasan-langsung/verifikasi-kegiatan/{id}/kegiatan-jabatan/verifikasi', [AtasanLangsungVerifikasiKegiatanController::class, 'verifikasi'])->name('atasan-langsung.verifikasi-kegiatan.kegiatan-jabatan.verifikasi');
        Route::post('atasan-langsung/verifikasi-kegiatan/{laporan_id}/{user_id}/kegiatan-jabatan/revisi', [AtasanLangsungVerifikasiKegiatanController::class, 'revisi'])->name('atasan-langsung.verifikasi-kegiatan.kegiatan-jabatan.revisi');
        Route::post('atasan-langsung/verifikasi-kegiatan/{id}/kegiatan-jabatan/tolak', [AtasanLangsungVerifikasiKegiatanController::class, 'tolak'])->name('atasan-langsung.verifikasi-kegiatan.kegiatan-jabatan.tolak');
    });

    Route::middleware(['role:penilai_ak'])->group(function () {
        Route::get('penilai-ak/overview', [PenilaiAkOverviewController::class, 'index'])->name('penilai-ak.overview');
        Route::get('data-penilai-ak', [DataPenilaiAKController::class, 'index'])->name('data-penilai-ak');
        Route::post('/data-penilai-ak-store', [DataPenilaiAKController::class, 'store'])->name('data-penilai-ak-store');
        Route::get('data-penilai-ak/show-dockepeg/{id}', [DataAtasanLangsungController::class, 'showDocKepeg'])->name('data-penilai-ak.show-doc-kepeg');
        Route::post('data-penilai-ak/store-dockepeg', [DataAtasanLangsungController::class, 'storeDocKepeg'])->name('data-penilai-ak.store-doc-kepeg');
        Route::post('data-penilai-ak/store-dockom', [DataAtasanLangsungController::class, 'storeDocKom'])->name('data-penilai-ak.store-doc-kom');
        Route::delete('data-penilai-ak/destroy-dockepeg/{id}', [DataAtasanLangsungController::class, 'destroyDocKepeg'])->name('data-penilai-ak.destroy-doc-kepeg');
        Route::delete('data-penilai-ak/destroy-dockom/{id}', [DataAtasanLangsungController::class, 'destroyDocKom'])->name('data-penilai-ak.destroy-doc-kom');

        Route::get('penilai-ak/data-pengajuan/internal', [InternalController::class, 'index'])->name('penilai-ak.data-pengajuan.internal');
        Route::get('penilai-ak/data-pengajuan/internal/{id}/show', [InternalController::class, 'show'])->name('penilai-ak.data-pengajuan.internal.show');
        Route::get('penilai-ak/data-pengajuan/external', [ExternalController::class, 'index'])->name('penilai-ak.data-pengajuan.external');
        Route::get('penilai-ak/kegiatan-selesai', [PenilaiAkKegiatanSelesaiController::class, 'index'])->name('penilai-ak.kegiatan-selesai');
    });
    Route::middleware(['role:penetap_ak'])->group(function () {
        Route::get('penetap-ak/overview', [OverviewPenetapAk::class, 'index'])->name('penetap-ak.overview');
        Route::get('penetap-ak/data-pengajuan/kabkota-external/kabKota-external', [KabKotaExternal::class, 'index'])->name('penetap-ak.data-pengajuan.kabkota-external.kabKota-external');
        Route::get('penetap-ak/data-pengajuan/kabkota-internal/kabKota-internal', [KabKotaInternal::class, 'index'])->name('penetap-ak.data-pengajuan.kabkota-internal.kabKota-internal');
        // Route::get('penetap_ak/overview', [PenilaiAkOverviewController::class, 'index'])->name('penetap_ak.overview');
        Route::get('data-penetap-ak', [DataPenetapAKController::class, 'index'])->name('data-penetap-ak');
        Route::post('/data-penetap-ak-store', [DataPenetapAKController::class, 'store'])->name('data-penetap-ak-store');
        Route::get('data-penetap-ak/show-dockepeg/{id}', [DataPenetapAKController::class, 'showDocKepeg'])->name('data-penetap-ak.show-doc-kepeg');
        Route::post('data-penetap-ak/store-dockepeg', [DataAtasanLangsungController::class, 'storeDocKepeg'])->name('data-penetap-ak.store-doc-kepeg');
        Route::post('data-penetap-ak/store-dockom', [DataAtasanLangsungController::class, 'storeDocKom'])->name('data-penetap-ak.store-doc-kom');
        Route::delete('data-penetap-ak/destroy-dockepeg/{id}', [DataAtasanLangsungController::class, 'destroyDocKepeg'])->name('data-penetap-ak.destroy-doc-kepeg');
        Route::delete('data-penetap-ak/destroy-dockom/{id}', [DataAtasanLangsungController::class, 'destroyDocKom'])->name('data-penetap-ak.destroy-doc-kom');
    });

    Route::middleware(['role:provinsi'])->group(function () {
        Route::get('provinsi/overview', [ProvinsiOverviewController::class, 'index'])->name('provinsi.overview.index');
        Route::get('provinsi/chatbox', [ProvinsiChatboxController::class, 'index'])->name('provinsi.chatbox');


        Route::get('provinsi/manajemen-user/struktural', [ProvinsiStrukturalController::class, 'index'])->name('provinsi.manajemen-user.struktural');
        Route::post('provinsi/manajemen-user/struktural/{id}/reject', [ProvinsiStrukturalController::class, 'reject'])->name('provinsi.manajemen-user.struktural.reject');
        Route::post('provinsi/manajemen-user/struktural/{id}/verification', [ProvinsiStrukturalController::class, 'verification'])->name('provinsi.manajemen-user.struktural.verification');
        Route::delete('provinsi/manajemen-user/struktural/{id}/destroy', [ProvinsiStrukturalController::class, 'destroy'])->name('provinsi.manajemen-user.struktural.destroy');

        Route::get('provinsi/manajemen-user/fungsional', [ProvinsiFungsionalController::class, 'index'])->name('provinsi.manajemen-user.fungsional');
        Route::post('provinsi/manajemen-user/fungsional/{id}/reject', [ProvinsiFungsionalController::class, 'reject'])->name('provinsi.manajemen-user.fungsional.reject');
        Route::post('provinsi/manajemen-user/fungsional/{id}/verification', [ProvinsiFungsionalController::class, 'verification'])->name('provinsi.manajemen-user.fungsional.verification');
        Route::delete('provinsi/manajemen-user/fungsional/{id}/destroy', [ProvinsiFungsionalController::class, 'destroy'])->name('provinsi.manajemen-user.fungsional.destroy');

        Route::get('provinsi/manajemen-user/umum', [ProvinsiFungsionalUmumController::class, 'index'])->name('provinsi.manajemen-user.fungsional-umum');
        Route::post('provinsi/manajemen-user/umum/{id}/reject', [ProvinsiFungsionalUmumController::class, 'reject'])->name('provinsi.manajemen-user.fungsional-umum.reject');
        Route::post('provinsi/manajemen-user/umum/{id}/verification', [ProvinsiFungsionalUmumController::class, 'verification'])->name('provinsi.manajemen-user.fungsional-umum.verification');
        Route::delete('provinsi/manajemen-user/umum/{id}/destroy', [ProvinsiFungsionalUmumController::class, 'destroy'])->name('kab-kota.manajemen-user.fungsional-umum.destroy');

        Route::get('provinsi/manajemen-user/user-kab-kota', [UserKabKotaController::class, 'index'])->name('provinsi.manajemen-user.user-kab-kota');

        Route::get('provinsi/data-mente', [ProvinsiMenteController::class, 'index'])->name('provinsi.data-mente');
        Route::post('provinsi/data-mente/store', [ProvinsiMenteController::class, 'store'])->name('provinsi.data-mente.store');
        Route::get('provinsi/data-mente/{id}/show', [ProvinsiMenteController::class, 'show'])->name('provinsi.data-mente.show');
        Route::get('provinsi/data-mente/{id}/edit', [ProvinsiMenteController::class, 'edit'])->name('provinsi.data-mente.edit');
        Route::put('provinsi/data-mente/{id}/update', [ProvinsiMenteController::class, 'update'])->name('provinsi.data-mente.update');
        Route::post('provinsi/data-mente/{kab_kota_id}/tingkat-kabkota', [ProvinsiMenteController::class, 'tingkatKabKota'])->name('provinsi.data-mente.tingkat-kabkota');
        Route::post('provinsi/data-mente/{provinsi_id}/tingkat-provinsi', [ProvinsiMenteController::class, 'tingkatProvinsi'])->name('provinsi.data-mente.tingkat-provinsi');
        Route::post('provinsi/data-mente/store-penilai-penetap', [ProvinsiMenteController::class, 'storePenilaiAndPenetap'])->name('provinsi.data-mente.store-penilai-penetap');
    });

    Route::middleware(['role:kemendagri'])->group(function () {
        Route::get('kemendagri/overview', [KemendagriOverviewController::class, 'index'])->name('kemendagri.overview.index');
        Route::controller(AdminKabKotaController::class)->group(function () {
            Route::get('kemendagri/verifikasi-data/admin-kabkota', 'index')->name('kemendagri.verifikasi-data.admin-kabkota.index');
            Route::get('kemendagri/verifikasi-data/admin-kabkota/{id}/document', 'showDoc')->name('kemendagri.verifikasi-data.admin-kabkota.showdoc');
            Route::post('kemendagri/verifikasi-data/admin-kabkota/{id}/verified', 'verified')->name('kemendagri.verifikasi-data.admin-kabkota.verified');
            Route::post('kemendagri/verifikasi-data/admin-kabkota/{id}/reject', 'reject')->name('kemendagri.verifikasi-data.admin-kabkota.reject');
            Route::post('kemendagri/verifikasi-data/admin-kabkota/{id}/hapus', 'hapus')->name('kemendagri.verifikasi-data.admin-kabkota.hapus');
        });

        Route::controller(AdminProvinsiController::class)->group(function () {
            Route::get('kemendagri/verifikasi-data/admin-provinsi', 'index')->name('kemendagri.verifikasi-data.admin-provinsi.index');
            Route::get('kemendagri/verifikasi-data/admin-provinsi/{id}/document', 'showDoc')->name('kemendagri.verifikasi-data.admin-provinsi.showdoc');
            Route::post('kemendagri/verifikasi-data/admin-provinsi/{id}/verified', 'verified')->name('kemendagri.verifikasi-data.admin-provinsi.verified');
            Route::post('kemendagri/verifikasi-data/admin-provinsi/{id}/reject', 'reject')->name('kemendagri.verifikasi-data.admin-provinsi.reject');
            Route::post('kemendagri/verifikasi-data/admin-provinsi/{id}/hapus', 'hapus')->name('kemendagri.verifikasi-data.admin-provinsi.hapus');
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

        Route::controller(KegiatanPenunjangController::class)->group(function () {
            Route::get('kemendagri/cms/kegiatan-penunjang', 'index')->name('kemendagri.cms.kegiatan-penunjang.index');
            Route::post('kemendagri/cms/kegiatan-penunjang', 'store')->name('kemendagri.cms.kegiatan-penunjang.store');
            Route::get('kemendagri/cms/kegiatan-penunjang/{id}/edit', 'edit')->name('kemendagri.cms.kegiatan-penunjang.edit');
            Route::put('kemendagri/cms/kegiatan-penunjang/{id}/update', 'update')->name('kemendagri.cms.kegiatan-penunjang.update');
            Route::post('kemendagri/cms/kegiatan-penunjang/import', 'import')->name('kemendagri.cms.kegiatan-penunjang.import');
            Route::get('kemendagri/cms/kegiatan-penunjang/download', 'downloadTemplate')->name('kemendagri.cms.kegiatan-penunjang.download');
            Route::delete('kemendagri/cms/kegiatan-penunjang/{id}/destroy', 'destroy')->name('kemendagri.cms.kegiatan-penunjang.destroy');
        });

        Route::controller(InformasiController::class)->group(function () {
            Route::get('kemendagri/cms/informasi', 'index')->name('kemendagri.cms.informasi.index');
            Route::post('kemendagri/cms/informasi', 'store')->name('kemendagri.cms.informasi.store');
            Route::get('kemendagri/cms/informasi/{id}/edit', 'edit')->name('kemendagri.cms.informasi.edit');
            Route::put('kemendagri/cms/informasi/{id}/update', 'update')->name('kemendagri.cms.informasi.update');
            Route::delete('kemendagri/cms/informasi/{id}/destroy', 'destroy')->name('kemendagri.cms.informasi.destroy');
        });
        Route::controller(PeriodeController::class)->group(function () {
            Route::get('kemendagri/cms/periode', 'index')->name('kemendagri.cms.periode.index');
            Route::post('kemendagri/cms/periode/store', 'store')->name('kemendagri.cms.periode.store');
            Route::post('kemendagri/cms/periode/{id}/switch', 'switch')->name('kemendagri.cms.periode.switch');
        });
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('api/kab-kota/{provinsi_id}', [KabKotaController::class, 'byProvinsiId']);
Route::post('filepond', [FilePondController::class, 'store'])->name('filepond.store');
Route::delete('filepond', [FilePondController::class, 'destroy'])->name('filepond.destroy');

//tess