<?php

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
    return view('coba');
});
Route::get('/overview', function () {
    return view('overview');
})->name('overview');
Route::get('/data-saya', function () {
    return view('data-saya');
})->name('data-saya');
Route::get('/daftar-kegiatan', function () {
    return view('daftar-kegiatan');
})->name('daftar-kegiatan');
Route::get('/tabel-kegiatan', function () {
    return view('tabel-kegiatan');
})->name('tabel-kegiatan');
Route::get('/daftar-laporan-kegiatan', function () {
    return view('daftar-laporan-kegiatan');
})->name('daftar-laporan-kegiatan');
Route::get('/laporan-kegiatan', function () {
    return view('laporan-kegiatan');
})->name('laporan-kegiatan');
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
