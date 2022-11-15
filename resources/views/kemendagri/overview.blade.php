@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-md-9 p-0">
                <div class="row">
                    <div class="col-md-4 px-2">
                        <div class="card">
                            <div class="card-body py-3 px-3" style="height: 80px;">
                                <div class="d-flex align-items-center h-100">
                                    <div class="circle circle-green">
                                        <i class="fa-solid
                                        fa-stopwatch"></i>
                                    </div>
                                    <div class="d-flex flex-column ms-2">
                                        <p style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                            Periode
                                        </p>
                                        <h2 style="font-family: 'Roboto'; font-size: 16px; color: #06152B;" class="target">
                                            {{ $periode != null ? Carbon\Carbon::make($periode->awal)->translatedFormat('F Y') . ' - ' . Carbon\Carbon::make($periode->akhir)->translatedFormat('F Y') : '-' }}
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 px-2">
                        <div class="card mb-3">
                            <div class="card-body py-2 px-3">
                                <div class="d-flex align-items-center h-100">
                                    <div class="circle circle-green">
                                        <i style="font-size: 20px;" class="fa-solid fa-user-group"></i>
                                    </div>
                                    <div class="d-flex flex-column ms-3">
                                        <p
                                            style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                            Jumlah Aparatur
                                        </p>
                                        <h4 style="font-family: 'Roboto';color: #06152B;" class="target">{{$total['aparatur']}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 px-2">
                        <div class="card mb-3">
                            <div class="card-body py-2 px-3">
                                <div class="d-flex align-items-center h-100">
                                    <div class="circle circle-yellow">
                                        <i style="font-size: 20px;" class="fa-solid fa-user-large"></i>
                                    </div>
                                    <div class="d-flex flex-column ms-3">
                                        <p
                                            style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                            Pejabat Struktural
                                        </p>
                                        <h4 style="font-family: 'Roboto';color: #06152B;" class="target">{{$total['struktural']}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 px-2">
                        <div class="card mb-3">
                            <div class="card-body py-2 px-3">
                                <div class="d-flex align-items-center h-100">
                                    <div class="circle circle-yellow">
                                        <i style="font-size: 20px;" class="fa-regular fa-user"></i>
                                    </div>
                                    <div class="d-flex flex-column ms-3">
                                        <p
                                            style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                            Fungsional Damkar
                                        </p>
                                        <h4 style="font-family: 'Roboto';color: #06152B;" class="target">{{$total['damkar']}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 px-2">
                        <div class="card mb-3">
                            <div class="card-body py-2 px-3">
                                <div class="d-flex align-items-center h-100">
                                    <div class="circle circle-blue">
                                        <i style="font-size: 20px;" class="fa-solid fa-user-tie"></i>
                                    </div>
                                    <div class="d-flex flex-column ms-3">
                                        <p
                                            style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                            Fungsional Analisis
                                        </p>
                                        <h4 style="font-family: 'Roboto';color: #06152B;" class="target">{{$total['analisis']}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 px-2">
                        <div class="card mb-3">
                            <div class="card-body py-2 px-3">
                                <div class="d-flex align-items-center h-100">
                                    <div class="circle circle-green">
                                        <i style="font-size: 20px;" class="fa-solid fa-user-gear"></i>
                                    </div>
                                    <div class="d-flex flex-column ms-3">
                                        <p
                                            style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                            User Admin Kab/Kota
                                        </p>
                                        <h4 style="font-family: 'Roboto';color: #06152B;" class="target">{{$total['kab_kota']}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 px-2">
                        <div class="card mb-3">
                            <div class="card-body py-2 px-3">
                                <div class="d-flex align-items-center h-100">
                                    <div class="circle circle-blue">
                                        <i style="font-size: 20px;" class="fa-solid fa-user-pen"></i>
                                    </div>
                                    <div class="d-flex flex-column ms-3">
                                        <p
                                            style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                            User Admin Provinsi
                                        </p>
                                        <h4 style="font-family: 'Roboto';color: #06152B;" class="target">{{$total['provinsi']}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 px-2">
                        <div class="card mb-3">
                            <div class="card-body py-2 px-3">
                                <div class="d-flex align-items-center h-100">
                                    <div class="circle circle-green">
                                        <i style="font-size: 20px;" class="fa-solid fa-users"></i>
                                    </div>
                                    <div class="d-flex flex-column ms-3">
                                        <p
                                            style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                            Pengajuan Akun Kab/Kota
                                        </p>
                                        <h4 style="font-family: 'Roboto';color: #06152B;" class="target">100</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 px-2">
                        <div class="card mb-3">
                            <div class="card-body py-2 px-3">
                                <div class="d-flex align-items-center h-100">
                                    <div class="circle circle-yellow">
                                        <i style="font-size: 20px;" class="fa-solid fa-users-between-lines"></i>
                                    </div>
                                    <div class="d-flex flex-column ms-3">
                                        <p
                                            style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                            Pengajuan Akun Provinsi
                                        </p>
                                        <h4 style="font-family: 'Roboto';color: #06152B;" class="target">100</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 px-2">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h4 class="card-title" style="color: #17181A; font-family: 'Roboto';">Tabel Data Pejabat Fungsional</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Pangkat</th>
                                            <th>Provisi</th>
                                            <th>Kab/Kota</th>
                                            <th>Score Credit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <a href="" style="color: #06152B;">Runggu Manalu</a>
                                            </td>
                                            <td>
                                               <p>Laki-laki</p>
                                            </td>
                                            <td>
                                               <p>Juru Muda (I/a)</p>
                                            </td>
                                            <td>
                                               <p>Sumatera Utara</p>
                                            </td>
                                            <td>
                                               <p>HUmbang Hasundutan</p>
                                            </td>
                                            <td>
                                               <p>43.7</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="" style="color: #06152B;">Ari Ferdiansyah</a>
                                            </td>
                                            <td>
                                               <p>Laki-Laki</p>
                                            </td>
                                            <td>
                                               <p>Juru Muda Tingkat I (I/b)</p>
                                            </td>
                                            <td>
                                               <p>Jawa Barat</p>
                                            </td>
                                            <td>
                                               <p>Kota Bogor</p>
                                            </td>
                                            <td>
                                               <p>67,6</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="" style="color: #06152B;">Wahliyudin</a>
                                            </td>
                                            <td>
                                                <p>Laki-laki</p>
                                            </td>
                                            <td>
                                                <p>Juru (I/c)</p>
                                            </td>
                                            <td>
                                                <p>Jawa Barat</p>
                                            </td>
                                            <td>
                                                <p>Kota Karawang</p>
                                            </td>
                                            <td>
                                                <p>90.6</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 informasi-wrapper">
                <div class="card mb-3" style="min-height: 68vh;">
                    <div class="card-body">
                        <h1 class="card-title text-center" style="color: #17181A; font-family: 'Roboto';">INFORMATION</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('css')
    <style>
        @media screen and (max-width:750px) {
            .informasi-wrapper {
                padding: 0 !important;
            }

            .card .card-body {
                padding: 1rem 2rem !important;
            }
        }
    </style>
@endsection
