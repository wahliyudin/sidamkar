@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="row">
            <div class="row">
                <div class="col-md-12 px-2">
                    <div class="card overflow-auto mb-3">
                        <div class="card-header">
                            <h4 class="card-title" style="color: #17181A; font-family: 'Roboto';">Table Data Penetap AK</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Periode</th>
                                        <th>Jabatan</th>
                                        <th>Golongan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="" style="color: #06152B;">Lukman</a>
                                        </td>
                                        <td>
                                            <div>
                                                Januari 2020 - Juli 2020
                                            </div>
                                        </td>
                                        <td>
                                            <a href="" style="color: #06152B;">Damkar Pemula</a>
                                        </td>
                                        <td>
                                            <a href="" style="color: #06152B;">JF II</a>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-wrap">
                                                <button class="btn btn-dark-reverse me-2">
                                                    <i class="fas fa-xmark"></i>
                                                </button>
                                                <button class="btn btn-green-reverse me-2" data-bs-toggle="modal"
                                                    data-bs-target="#verifikasi">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="verifikasi" tabindex="-1" role="dialog" aria-labelledby="verifikasiTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-centered" role="document">
                <div class="modal-content relative">
                    <div class="bg-spin" style="display: none;">
                        <img class="spin" src="{{ asset('assets/images/template/spinner.gif') }}"
                            style="height: 3rem; object-fit: cover;" alt="" srcset="">
                    </div>
                    <div class="modal-header">
                        <h6 style="color: red;"><i class="fa-solid fa-bookmark me-2" style="font-size: 16px;"></i>Kenaikan
                            Pangkat/Jenjang
                            Jabatan
                        </h6>
                    </div>
                    <div class="modal-body">
                        <div class="text-center swal2-contentwrapper">
                            <h2 class="swal2-title" id="swal2-title">Apakah Anda Yakin?</h2>
                        </div>
                        <div class="form-group">
                            <p class="mt-3">
                                Bayu / Damkar pemula / IIA mendapatkan Rekomendasi Kenaikan Pangkat/Jenjang Jabatan Menjadi
                                Damkar Penyelia / IIIA</p>
                        </div>
                        <div class="note">
                            <p style="color: #898989; font-size: 14px;" class="text-center">*Pastikan sudah dicek kembali
                                dengan baik</p>
                        </div>
                        <div class="text-center mt-4">
                            <button class="btn btn-danger px-5 py-2" data-bs-dismiss="modal"
                                style="text-transform: capitalize; background-color: rgb(136, 136, 136); border: 0 !important;">Batal</button>
                            <button type="button" class="btn btn-blue px-4 verifikasi py-2"
                                style="text-transform: capitalize; border: 0 !important; width: 142px;">
                                <img class="spin" src="{{ asset('assets/images/template/spinner.gif') }}"
                                    style="height: 25px; object-fit: cover;display: none;" alt="" srcset="">
                                <span>Ya, Verifikasi</span>
                            </button>
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

            .card .card-body {
                padding: 1rem 2rem !important;
            }
        }
    </style>
@endsection
