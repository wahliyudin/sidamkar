@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-md-12 p-0">
                <div class="row">
                    <div class="col-md-4 px-2">
                        <div class="card mb-3">
                            <div class="card-body py-2 px-3" style="height: 80px;">
                                <div class="d-flex align-items-center h-100">
                                    <div class="circle circle-green">
                                        <i class="fa-solid fafa
                                        fa-stopwatch"></i>
                                    </div>
                                    <div class="d-flex flex-column ms-2">
                                        <p
                                            style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                            Periode
                                        </p>
                                        <h2 style="font-family: 'Roboto'; font-size: 13px; color: #06152B;" class="target">
                                            {{ $periode != null ? Carbon\Carbon::make($periode->awal)->translatedFormat('F Y') . ' - ' . Carbon\Carbon::make($periode->akhir)->translatedFormat('F Y') : '-' }}
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 px-2">
                        <div class="card">
                            <div class="card-body py-3 px-3" style="height: 80px;">
                                <div class="d-flex align-items-center h-100">
                                    <div class="circle circle-green">
                                        <i class="fa-solid fa-envelope"></i>
                                    </div>
                                    <div class="d-flex flex-column ms-2" style="flex-grow: 1;">
                                        <p
                                            style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                            Email Info Penetapan
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h2 style="font-family: 'Roboto';color: #06152B; font-size: 16px"
                                                class="target">
                                                {{-- {{ $user->email ?? '-' }} --}}
                                            </h2>
                                            <button class="btn-email" data-bs-toggle="modal" data-bs-target="#modalEmail">
                                                <i class="fa-solid fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 px-2">
                        <div class="card mb-3">
                            <div class="card-body py-2 px-3 "style="height: 80px;">
                                <div class="d-flex align-items-center h-100">
                                    <div class="circle circle-green">
                                        <i style="font-size: 20px;" class="fa-solid fafa fa-user-group"></i>
                                    </div>
                                    <div class="d-flex flex-column ms-3">
                                        <p
                                            style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                            Jumlah Aparatur
                                        </p>
                                        <h4 style="font-family: 'Roboto';color: #06152B;" class="target">
                                            {{ $total['aparatur'] }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 px-2">
                        <div class="card mb-3">
                            <div class="card-body py-2 px-3" style="height: 80px;">
                                <div class="d-flex align-items-center h-100">
                                    <div class="circle circle-yellow">
                                        <i style="font-size: 20px;" class="fa-solid fafa fa-user-large"></i>
                                    </div>
                                    <div class="d-flex flex-column ms-3">
                                        <p
                                            style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                            Pejabat Struktural
                                        </p>
                                        <h4 style="font-family: 'Roboto';color: #06152B;" class="target">
                                            {{ $total['struktural'] }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-4 px-2">
                        <div class="card mb-3 ">
                            <div class="card-body py-2 px-3" style="height: 80px;">
                                <div class="d-flex align-items-center h-100">
                                    <div class="circle circle-yellow">
                                        <i style="font-size: 20px;" class="fa-regular fafa fa-user"></i>
                                    </div>
                                    <div class="d-flex flex-column ms-3">
                                        <p
                                            style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                            Fungsional Damkar
                                        </p>
                                        <h4 style="font-family: 'Roboto';color: #06152B;" class="target">
                                            {{ $total['damkar'] }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 px-2">
                        <div class="card mb-3">
                            <div class="card-body py-2 px-3" style="height: 80px;">
                                <div class="d-flex align-items-center h-100">
                                    <div class="circle circle-blue">
                                        <i style="font-size: 20px;" class="fa-solid fafa fa-user-tie"></i>
                                    </div>
                                    <div class="d-flex flex-column ms-3">
                                        <p
                                            style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                            Fungsional Analisis
                                        </p>
                                        <h4 style="font-family: 'Roboto';color: #06152B;" class="target">
                                            {{ $total['analisis'] }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 px-2">
                        <div class="card mb-3">
                            <div class="card-body py-2 px-3" style="height: 80px;">
                                <div class="d-flex align-items-center h-100">
                                    <div class="circle circle-green">
                                        <i style="font-size: 20px;" class="fa-solid fafa fa-user-gear"></i>
                                    </div>
                                    <div class="d-flex flex-column ms-3">
                                        <p
                                            style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                            User Admin Kab/Kota
                                        </p>
                                        <h4 style="font-family: 'Roboto';color: #06152B;" class="target">
                                            {{ $total['kab_kota'] }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 px-2">
                        <div class="card mb-3">
                            <div class="card-body py-2 px-3" style="height: 80px;">
                                <div class="d-flex align-items-center h-100">
                                    <div class="circle circle-blue">
                                        <i style="font-size: 20px;" class="fa-solid fafa fa-user-pen"></i>
                                    </div>
                                    <div class="d-flex flex-column ms-3">
                                        <p
                                            style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                            User Admin Provinsi
                                        </p>
                                        <h4 style="font-family: 'Roboto';color: #06152B;" class="target">
                                            {{ $total['provinsi'] }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 px-2">
                        <div class="card mb-3">
                            <div class="card-body py-2 px-3" style="height: 80px;">
                                <div class="d-flex align-items-center h-100">
                                    <div class="circle circle-green">
                                        <i style="font-size: 20px;" class="fa-solid fafa fa-users"></i>
                                    </div>
                                    <div class="d-flex flex-column ms-3">
                                        <p
                                            style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                            Pengajuan Akun Kab/Kota
                                        </p>
                                        <h4 style="font-family: 'Roboto';color: #06152B;" class="target">
                                            {{ $total['pengajuan_kab_kota'] }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 px-2">
                        <div class="card mb-3">
                            <div class="card-body py-2 px-3" style="height: 80px;">
                                <div class="d-flex align-items-center h-100">
                                    <div class="circle circle-yellow">
                                        <i style="font-size: 20px;" class="fa-solid fafa fa-users-between-lines"></i>
                                    </div>
                                    <div class="d-flex flex-column ms-3">
                                        <p
                                            style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                            Pengajuan Akun Provinsi
                                        </p>
                                        <h4 style="font-family: 'Roboto';color: #06152B;" class="target">
                                            {{ $total['pengajuan_provinsi'] }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
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
