@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-md-3 px-2">
                <div class="card">
                    <div class="card-body py-3 px-3" style="height: 100px;">
                        <div class="d-flex align-items-center h-100">
                            <div class="circle circle-red-light">
                                <i class="fa-solid fa-circle-exclamation"></i>
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
                                    <th>Jenis Kelamin</th>
                                    <th>Kab/Kot</th>
                                    <th>Jabatan</th>
                                    <th>Golongan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <a href="" style="color: #06152B;">Iqbal</a>
                                    </td>
                                    <td>
                                        Laki - Laki
                                    </td>
                                    <td>
                                        Bogor
                                    </td>
                                    <td>
                                        Damkar Pemula
                                    </td>
                                    <td>III A</td>
                                    <td>
                                        <a class="btn btn-primary btn-status px-3 text-sm"
                                            href="{{ route('atasan-langsung.show') }}">Detail</a>
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
