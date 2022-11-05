@extends('layouts.master')

@section('content')
    <div class="section">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-between">
                        <div class="col-md-3">
                            <div class="form-group">
                                <h3 class="mt-4">Kegiatan Iqbal</h3>
                                <input class="form-control" value="{{ now()->format('Y-m-d') }}" type="date" name=""
                                    id="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Search</label>
                                <input type="text" placeholder="Search..." class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0">
                    @foreach ($rencanas as $rencana)
                        <div class="row">
                            <div class="form-group col-md-4">
                                <h5>{{ $rencana->nama }}</h5>
                            </div>
                        </div>
                        <div class="card-body accordion-container">
                            <div class="accordion" id="accordion-parent">
                                @foreach ($rencana->rencanaUnsurs as $rencanaUnsur)
                                    <div class="accordion-item">
                                        <div class="d-flex justify-content-between accordion-header py-3 px-2"
                                            id="unsur{{ $rencanaUnsur->id . $rencanaUnsur->unsur->id }}">
                                            <div class="d-flex align-items-center justify-content-between w-100"
                                                style="color: #000000;">
                                                <p class="accordion-title">
                                                    {{ $rencanaUnsur->unsur->nama }}
                                                </p>
                                            </div>
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#contentUnsur{{ $rencanaUnsur->id . $rencanaUnsur->unsur->id }}"
                                                aria-expanded="false"
                                                aria-controls="contentUnsur{{ $rencanaUnsur->id . $rencanaUnsur->unsur->id }}">
                                            </button>
                                        </div>
                                        <div id="contentUnsur{{ $rencanaUnsur->id . $rencanaUnsur->unsur->id }}"
                                            class="accordion-collapse collapse"
                                            aria-labelledby="unsur{{ $rencanaUnsur->id . $rencanaUnsur->unsur->id }}"
                                            style="">
                                            <div class="accordion-body">
                                                <div class="accordion" id="accordion-child">
                                                    @foreach ($rencanaUnsur->rencanaSubUnsurs as $rencanaSubUnsur)
                                                        <div class="accordion-item">
                                                            <div class="d-flex justify-content-between accordion-header py-1 px-1"
                                                                id="subUnsur{{ $rencanaSubUnsur->subUnsur->id }}">
                                                                <div class="d-flex align-items-center"
                                                                    style="color: #000000;">
                                                                    <h6 class="accordian-title">
                                                                        {{ $rencanaSubUnsur->subUnsur->nama }}
                                                                    </h6>
                                                                </div>
                                                                <button class="accordion-button collapsed" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#contentchildSubUnsur{{ $rencanaSubUnsur->subUnsur->id }}"
                                                                    aria-expanded="false"
                                                                    aria-controls="contentchildSubUnsur{{ $rencanaSubUnsur->subUnsur->id }}">
                                                                </button>
                                                            </div>
                                                            <div id="contentchildSubUnsur{{ $rencanaSubUnsur->subUnsur->id }}"
                                                                class="accordion-collapse collapse"
                                                                aria-labelledby="subUnsur{{ $rencanaSubUnsur->subUnsur->id }}"
                                                                style="">
                                                                <div class="accordion-body">
                                                                    <ul class="ms-0">
                                                                        @foreach ($rencanaSubUnsur->rencanaButirKegiatans as $rencanaButirKegiatan)
                                                                            <li class="accordian-list">
                                                                                <div
                                                                                    class="d-flex align-items-center justify-content-between">
                                                                                    <h6 class="accordian-title">
                                                                                        {{ $rencanaButirKegiatan->butirKegiatan->nama }}
                                                                                    </h6>
                                                                                    <div class="d-flex align-items-center">
                                                                                        @if ($rencanaButirKegiatan->status == 2)
                                                                                            <button
                                                                                                class="btn btn-red ms-3 px-3"
                                                                                                data-bs-toggle="modal"
                                                                                                data-bs-target="#lihat{{ $rencanaButirKegiatan->id }}"
                                                                                                type="button">Revisi</button>
                                                                                        @elseif($rencanaButirKegiatan->status == 3)
                                                                                            <button
                                                                                                class="btn btn-black ms-3 px-3"
                                                                                                data-bs-toggle="modal"
                                                                                                data-bs-target="#lihat{{ $rencanaButirKegiatan->id }}"
                                                                                                type="button">Ditolak</button>
                                                                                        @elseif($rencanaButirKegiatan->status == 4)
                                                                                            <button
                                                                                                class="btn btn-green-dark ms-3 px-3"
                                                                                                data-bs-toggle="modal"
                                                                                                data-bs-target="#lihat{{ $rencanaButirKegiatan->id }}"
                                                                                                type="button">Selesai</button>
                                                                                        @else
                                                                                            <button
                                                                                                data-rencana="{{ $rencanaButirKegiatan->id }}"
                                                                                                class="btn btn-blue ms-3 px-4 btn-sm laporkan"
                                                                                                data-bs-toggle="modal"
                                                                                                data-bs-target="#lihat{{ $rencanaButirKegiatan->id }}"
                                                                                                type="button">Lihat</button>
                                                                                            @include('atasan-langsung.pengajuan-kegiatan.kegiatan.lihat',
                                                                                                compact(
                                                                                                    'rencanaButirKegiatan'
                                                                                                ))
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="revisi" tabindex="-1" role="dialog" aria-labelledby="revisiTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h3 class="modal-title" style="color: red;" id="revisiTitle">
                        <i class="fa-solid fa-book fa-2xl"></i>CATATAN REVISI
                    </h3>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" class="container-unsur">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <h6>Tuliskan Catatan</h6>
                                    <textarea name="" id="" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        <span>Batal</span>
                    </button>
                    <button class="btn btn-green ml-1 simpan-kegiatan">
                        <img class="spin" src="{{ asset('assets/images/template/spinner.gif') }}"
                            style="height: 25px; object-fit: cover;display: none;" alt="" srcset="">
                        <span>Simpan</span>
                    </button>
                </div>
            </div>
        </div>
    </div>>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/extensions/toastify-js/src/toastify.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/filepond/filepond.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/filepond.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/choices.js/public/assets/styles/choices.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/shared/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/kemendagri.css') }}">
@endsection
@section('js')
    <script src="{{ asset('assets/js/auth/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-element-select.js') }}"></script>
    <script src="{{ asset('assets/extensions/toastify-js/src/toastify.js') }}"></script>
    <script src="{{ asset('assets/extensions/filepond/filepond.js') }}"></script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}">
    </script>
    <script
        src="{{ asset('assets/extensions/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.js') }}">
    </script>
    <script src="{{ asset('assets/extensions/filepond/filepond.jquery.js') }}"></script>
    <script src="{{ asset('assets/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/atasan-langsung/pengajuan-kegiatan.js') }}"></script>
@endsection
