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
    return view('butir-kegiatan');
});
Route::get('/my-data', function () {
    return view('my-data');
})->name('my-data');
Route::get('/tabel-kegiatan', function () {
    return view('tabel-kegiatan');
})->name('tabel-kegiatan');
Route::get('/laporan-kegiatan', function () {
    return view('laporan-kegiatan');
})->name('laporan-kegiatan');
Route::get('/riwayat-kegiatan', function () {
    return view('riwayat-kegiatan');
})->name('riwayat-kegiatan');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
