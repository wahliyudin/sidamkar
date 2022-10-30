@extends('layouts.master')

@section('content')
    <div class="section">
        <div class="row">
            <div class="col-md-3 px-2">
                <div class="card">
                    <div class="card-body py-3 px-3" style="height: 100px;">
                        <div class="d-flex align-items-center h-100">
                            <div class="circle circle-blue">
                                <i class="fa-solid fa-user-tie"></i>
                            </div>
                            <div class="d-flex flex-column ms-2">
                                <p style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                    Angka Kredit Sebelumnya
                                </p>
                                <h2 style="font-family: 'Roboto';color: #06152B;" class="target">44</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 px-2">
                <div class="card">
                    <div class="card-body py-3 px-3" style="height: 100px;">
                        <div class="d-flex align-items-center h-100">
                            <div class="circle circle-green">
                                <i class="fa-solid fa-user-tie"></i>
                            </div>
                            <div class="d-flex flex-column ms-2">
                                <p style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                    Angka Kredit Sebelumnya
                                </p>
                                <h2 style="font-family: 'Roboto';color: #06152B;" class="target">44</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <a href="" class="btn btn-primary px-3 py-2 mt-4 " data-bs-toggle="modal"
                    data-bs-target="#tentukan"><i class="fa-solid fa-right-to-bracket"></i>
                    Tentukan
                    Penilai dan Penetap</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" style="color: #17181A; font-family: 'Roboto';">Table Data Aparatur Fungsional
                        </h4>
                    </div>
                    <div class="card-body" style="overflow: auto;">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Nomor Karpeg</th>
                                    <th>Jabatan</th>
                                    <th>Golongan</th>
                                    <th>Pendidikan</th>
                                    <th>File Pernyataan</th>
                                    <th>Angka Kredit</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <a href="" style="color: #06152B;">Iqbal</a>
                                    </td>
                                    <td>
                                        432290
                                    </td>
                                    <td>
                                        Damkar Pemula
                                    </td>
                                    <td>III A</td>
                                    <td>SMA/Sedrajat</td>
                                    <td><i class="fa-solid fa-file-lines "></i></td>
                                    <td style="color: green">+100</td>
                                    <td>
                                        <a class="btn btn-primary btn-status px-3 text-sm"
                                            href="{{ route('atasan-langsung.show') }}">Kirim</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="tentukan" tabindex="-1" role="dialog" aria-labelledby="tindakLanjutTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Tentukan Penetap & Penilai</h5>
                </div>
                <div class="modal-body">
                    <div class="d-flex flex-column">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Pilih Atasan Langsung</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Pilih Penetap AK</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button class="btn btn-danger px-5" data-bs-dismiss="modal">Batal</button>
                            <a class="btn btn-blue px-5">Kirim</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection

@section('css')
@endsection
