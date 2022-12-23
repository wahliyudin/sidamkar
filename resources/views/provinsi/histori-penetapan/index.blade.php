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
                                        <th>Nama Penetap</th>
                                        <th>Periode</th>
                                        <th>Nama JF</th>
                                        <th>Jenis JF</th>
                                        <th>Tanggal TTD</th>
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
                                            <div class="periode border border-primary " style="text-align: center;">
                                                Januari 2020 - Juli 2020
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
