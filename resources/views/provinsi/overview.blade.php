@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-md-4 px-2">
                <div class="card mb-3">
                    <div class="card-body py-2 px-3">
                        <div class="d-flex align-items-center h-100">
                            <div class="circle circle-green">
                                <i style="font-size: 20px;"
                                    class="fa-solid
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
                                <p style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
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
                    <div class="card-body py-2 px-3">
                        <div class="d-flex align-items-center h-100">
                            <div class="circle circle-yellow">
                                <i style="font-size: 20px;" class="fa-solid fa-user-large"></i>
                            </div>
                            <div class="d-flex flex-column ms-3">
                                <p style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
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
        <div class="row">
            <div class="col-md-4 px-2">
                <div class="card mb-3">
                    <div class="card-body py-2 px-3">
                        <div class="d-flex align-items-center h-100">
                            <div class="circle circle-yellow">
                                <i style="font-size: 20px;" class="fa-regular fa-user"></i>
                            </div>
                            <div class="d-flex flex-column ms-3">
                                <p style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                    Pejabat Fungsional
                                </p>
                                <h4 style="font-family: 'Roboto';color: #06152B;" class="target">
                                    {{ $total['fungsional'] }}</h4>
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
                                <p style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
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
                    <div class="card-body py-2 px-3">
                        <div class="d-flex align-items-center h-100">
                            <div class="circle circle-blue">
                                <i style="font-size: 20px;" class="fa-solid fa-user-tie"></i>
                            </div>
                            <div class="d-flex flex-column ms-3">
                                <p style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                    Fungsional Analis
                                </p>
                                <h4 style="font-family: 'Roboto';color: #06152B;" class="target">
                                    {{ $total['analis'] }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 informasi-wrapper">
                <div class="card" style="overflow: auto; height: 550px">
                    <div class="card-header">
                        <h4 class="card-title text-center" style="color: #17181A; font-family: 'Roboto';">
                            INFORMASI
                        </h4>
                    </div>
                    <div class="card-body">
                        <ul>
                            @forelse ($informasi as $informasis)
                                <li>
                                    <h4 style="margin: 0 !important;" class="header-information"> {{ $informasis->judul }} (
                                        <a href="#" data-id="{{ $informasis->informasi_id }}" class="detail-informasi"
                                            style="font-size: 18px;">Klik
                                            Disini</a> )
                                    </h4>
                                    <div class="footer-information">
                                        <p style="font-size: 14px; margin-top: 10px; color: red;" class="tgl-info">
                                            {{ $informasis->created_at }}</p>
                                    </div>
                                </li>
                            @empty
                                Data tidak tersedia
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="informasi" tabindex="-1" role="dialog" aria-labelledby="informasiTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-centered" role="document">
            <div class="modal-content relative">
                <div class="bg-spin" style="display: none;">
                    <img class="spin" src="{{ asset('assets/images/template/spinner.gif') }}"
                        style="height: 3rem; object-fit: cover;" alt="" srcset="">
                </div>
                <div class="modal-header">
                    <h5 class="modal-title" id="informasiTitle">
                        INFORMASI
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" class="container-unsur">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">

                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-10">
                                <div class="form-group">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        <span>Tutup</span>
                    </button>
                    {{--  <button class="btn btn-green ml-1 simpan-kegiatan">
                    <img class="spin" src="{{ asset('assets/images/template/spinner.gif') }}"
                        style="height: 25px; object-fit: cover;display: none;" alt="" srcset="">
                    <span>Simpan</span>
                </button>  --}}
                </div>
            </div>
        </div>
    </div>
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

        .bg-spin {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 99;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #00000075;
        }
    </style>
@endsection
@section('js')
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(".detail-informasi").click(function() {
                $('#informasi').modal('show');

                $('#informasi .bg-spin').show();
                const id = $(this).data('id');
                $.ajax({
                    type: "get",
                    url: url('/informasi/' + id),
                    success: function(response) {
                        $('#informasi .modal-title').html(response[0].judul);
                        $('#informasi .bg-spin').hide();
                        $('#informasi .modal-body').html(response[0].deskripsi);
                    }
                })
            });
        });
    </script>
@endsection
