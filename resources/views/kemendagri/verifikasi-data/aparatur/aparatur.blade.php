@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row justify-content-between">
                            <div class="col-md-3">
                                <h4 class="card-title" style="color: #17181A; font-family: 'Roboto';">Table Data Aparatur
                                    Fungsional
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="overflow: auto;">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>NIP</th>
                                    <th>Provinsi</th>
                                    <th>Kab/Kota</th>
                                    <th>Jabatan</th>
                                    <th>Golongan</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <a href="" style="color: #06152B;">Iqbal</a>
                                    </td>
                                    <td>
                                        15615151115
                                    </td>
                                    <td>
                                        DKI Jakarta
                                    </td>
                                    <td>
                                        Jakarta Barat
                                    </td>
                                    <td>
                                        Seksi Prasarana
                                    </td>
                                    <td>
                                        III A
                                    </td>
                                    <td style="color: #1cd926">Aktif</td>
                                    <td>
                                        <a class="btn btn-primary btn-status px-3 text-sm">Detail</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
@endsection

@section('css')
@endsection
