@extends('layouts.master')

@section('content')
    <div class="section">
        <div class="d-flex px-4 mb-4 container-control justify-content-between align-items-center">
            <div class="form-group mb-0">
                <input class="form-control" type="date" value="{{ now()->format('Y-m-d') }}" name="current_date">
            </div>
            <button class="btn btn-gray" data-bs-toggle="modal" data-bs-target="#laporkan">Laporkan</button>
        </div>
        <div class="row justify-content-evenly align-items-start gap-2">
            <div class="col-md-5 p-0">
                <div class="card">
                    <div class="card-header py-2 d-flex justify-content-between align-items-center"
                        style="border-bottom: 1px solid rgba(0, 0, 0, 0.125);">
                        <h4 class="m-0 text-yellow text-uppercase">Validasi</h4>
                        <p class="m-0" style="font-style: italic;">Total :
                            {{ count($laporanKegiatanJabatanStatusValidasis) }}</p>
                    </div>
                    <div class="card-body mx-0 my-2" data-simplebar style="max-height: 580px;">
                        @forelse ($laporanKegiatanJabatanStatusValidasis as $laporanKegiatanJabatanStatusValidasi)
                            <div class="laporan-item pb-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <p class="m-0" style="font-weight: 600;">02 Nov 2022</p>
                                    <button class="btn btn-yellow btn-sm text-sm px-3">Validasi</button>
                                </div>
                                <img src="{{ asset('storage/bi.jpg') }}"
                                    style="width: 100%; object-fit: cover; border-radius: 5px;" alt="">
                                <div class="d-flex flex-column mt-3">
                                    <div class="d-flex align-items-center item-attr">
                                        <i class="fa-solid fa-address-card" style="font-size: 1.3rem; width: 27px;"></i>
                                        <p class="m-0 ms-3" style="font-weight: 600;">
                                            {{ $laporanKegiatanJabatanStatusValidasi->kode }}
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-center item-attr">
                                        <i class="fa-solid fa-user" style="font-size: 1.3rem; width: 27px;"></i>
                                        <p class="m-0 ms-3" style="font-weight: 600;">
                                            {{ $laporanKegiatanJabatanStatusValidasi->rencana->user->userAparatur->nama }}
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-center item-attr">
                                        <i class="fa-solid fa-comments" style="font-size: 1.3rem; width: 27px;"></i>
                                        <p class="m-0 ms-3" style="font-weight: 600;">JAKI</p>
                                    </div>
                                    <div class="d-flex align-items-center item-attr">
                                        <i class="fa-solid fa-rectangle-list" style="font-size: 1.3rem; width: 27px;"></i>
                                        <p class="m-0 ms-3" style="font-weight: 600;">
                                            {{ $laporanKegiatanJabatanStatusValidasi->rencana->user->roles()->first()->display_name }}
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-center item-attr">
                                        <i class="fa-solid fa-right-left" style="font-size: 1.3rem; width: 27px;"></i>
                                        <p class="m-0 ms-3" style="font-weight: 600;">KELURAHAN GAMBIR</p>
                                    </div>
                                </div>
                                <button class="btn btn-gray w-100 py-2 mt-3">Detail Laporan</button>
                            </div>
                        @empty
                            <div class="d-flex justify-content-center mt-3">
                                <p class="m-0" style="font-style: italic;">Tidak ada data untuk ditampilkan</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="col-md-5 p-0">
                <div class="card">
                    <div class="card-header py-2 d-flex justify-content-between align-items-center"
                        style="border-bottom: 1px solid rgba(0, 0, 0, 0.125);">
                        <h4 class="m-0 text-red text-uppercase">Revisi</h4>
                        <p class="m-0" style="font-style: italic;">Total :
                            {{ count($laporanKegiatanJabatanStatusRevisis) }}</p>
                    </div>
                    <div class="card-body mx-0 my-2" data-simplebar style="max-height: 580px;">
                        @forelse ($laporanKegiatanJabatanStatusRevisis as $laporanKegiatanJabatanStatusRevisi)
                            <div class="laporan-item pb-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <p class="m-0" style="font-weight: 600;">02 Nov 2022</p>
                                    <button class="btn btn-red btn-sm text-sm px-3">Revisi</button>
                                </div>
                                <img src="{{ asset('storage/bi.jpg') }}"
                                    style="width: 100%; object-fit: cover; border-radius: 5px;" alt="">
                                <div class="d-flex flex-column mt-3">
                                    <div class="d-flex align-items-center item-attr">
                                        <i class="fa-solid fa-address-card" style="font-size: 1.3rem; width: 27px;"></i>
                                        <p class="m-0 ms-3" style="font-weight: 600;">
                                            {{ $laporanKegiatanJabatanStatusRevisi->kode }}
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-center item-attr">
                                        <i class="fa-solid fa-user" style="font-size: 1.3rem; width: 27px;"></i>
                                        <p class="m-0 ms-3" style="font-weight: 600;">
                                            {{ $laporanKegiatanJabatanStatusRevisi->rencana->user->userAparatur->nama }}</p>
                                    </div>
                                    <div class="d-flex align-items-center item-attr">
                                        <i class="fa-solid fa-comments" style="font-size: 1.3rem; width: 27px;"></i>
                                        <p class="m-0 ms-3" style="font-weight: 600;">JAKI</p>
                                    </div>
                                    <div class="d-flex align-items-center item-attr">
                                        <i class="fa-solid fa-rectangle-list" style="font-size: 1.3rem; width: 27px;"></i>
                                        <p class="m-0 ms-3" style="font-weight: 600;">
                                            {{ $laporanKegiatanJabatanStatusRevisi->rencana->user->roles()->first()->display_name }}
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-center item-attr">
                                        <i class="fa-solid fa-right-left" style="font-size: 1.3rem; width: 27px;"></i>
                                        <p class="m-0 ms-3" style="font-weight: 600;">KELURAHAN GAMBIR</p>
                                    </div>
                                </div>
                                <button class="btn btn-gray w-100 py-2 mt-3">Detail Laporan</button>
                            </div>
                        @empty
                            <div class="d-flex justify-content-center mt-3">
                                <p class="m-0" style="font-style: italic;">Tidak ada data untuk ditampilkan</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-evenly align-items-start gap-2 mt-2">
            <div class="col-md-5 p-0">
                <div class="card">
                    <div class="card-header py-2 d-flex justify-content-between align-items-center"
                        style="border-bottom: 1px solid rgba(0, 0, 0, 0.125);">
                        <h4 class="m-0 text-green text-uppercase">Selesai</h4>
                        <p class="m-0" style="font-style: italic;">Total :
                            {{ count($laporanKegiatanJabatanStatusSelesais) }}</p>
                    </div>
                    <div class="card-body mx-0 my-2" data-simplebar style="max-height: 580px;">
                        @forelse ($laporanKegiatanJabatanStatusSelesais as $laporanKegiatanJabatanStatusSelesai)
                            <div class="laporan-item pb-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <p class="m-0" style="font-weight: 600;">02 Nov 2022</p>
                                    <button class="btn btn-green btn-sm text-sm px-3">Selesai</button>
                                </div>
                                <img src="{{ asset('storage/bi.jpg') }}"
                                    style="width: 100%; object-fit: cover; border-radius: 5px;" alt="">
                                <div class="d-flex flex-column mt-3">
                                    <div class="d-flex align-items-center item-attr">
                                        <i class="fa-solid fa-address-card" style="font-size: 1.3rem; width: 27px;"></i>
                                        <p class="m-0 ms-3" style="font-weight: 600;">
                                            {{ $laporanKegiatanJabatanStatusSelesai->kode }}
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-center item-attr">
                                        <i class="fa-solid fa-user" style="font-size: 1.3rem; width: 27px;"></i>
                                        <p class="m-0 ms-3" style="font-weight: 600;">
                                            {{ $laporanKegiatanJabatanStatusSelesai->rencana->user->userAparatur->nama }}
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-center item-attr">
                                        <i class="fa-solid fa-comments" style="font-size: 1.3rem; width: 27px;"></i>
                                        <p class="m-0 ms-3" style="font-weight: 600;">JAKI</p>
                                    </div>
                                    <div class="d-flex align-items-center item-attr">
                                        <i class="fa-solid fa-rectangle-list" style="font-size: 1.3rem; width: 27px;"></i>
                                        <p class="m-0 ms-3" style="font-weight: 600;">
                                            {{ $laporanKegiatanJabatanStatusSelesai->rencana->user->roles()->first()->display_name }}
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-center item-attr">
                                        <i class="fa-solid fa-right-left" style="font-size: 1.3rem; width: 27px;"></i>
                                        <p class="m-0 ms-3" style="font-weight: 600;">KELURAHAN GAMBIR</p>
                                    </div>
                                </div>
                                <button class="btn btn-gray w-100 py-2 mt-3">Detail Laporan</button>
                            </div>
                        @empty
                            <div class="d-flex justify-content-center mt-3">
                                <p class="m-0" style="font-style: italic;">Tidak ada data untuk ditampilkan</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="col-md-5 p-0">
                <div class="card">
                    <div class="card-header py-2 d-flex justify-content-between align-items-center"
                        style="border-bottom: 1px solid rgba(0, 0, 0, 0.125);">
                        <h4 class="m-0 text-black text-uppercase">Ditolak</h4>
                        <p class="m-0" style="font-style: italic;">Total :
                            {{ count($laporanKegiatanJabatanStatusTolaks) }}</p>
                    </div>
                    <div class="card-body mx-0 my-2" data-simplebar style="max-height: 580px;">
                        @forelse ($laporanKegiatanJabatanStatusTolaks as $laporanKegiatanJabatanStatusTolak)
                            <div class="laporan-item pb-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <p class="m-0" style="font-weight: 600;">02 Nov 2022</p>
                                    <button class="btn btn-black btn-sm text-sm px-3">DITOLAK</button>
                                </div>
                                <img src="{{ asset('storage/bi.jpg') }}"
                                    style="width: 100%; object-fit: cover; border-radius: 5px;" alt="">
                                <div class="d-flex flex-column mt-3">
                                    <div class="d-flex align-items-center item-attr">
                                        <i class="fa-solid fa-address-card" style="font-size: 1.3rem; width: 27px;"></i>
                                        <p class="m-0 ms-3" style="font-weight: 600;">
                                            {{ $laporanKegiatanJabatanStatusTolak->kode }}
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-center item-attr">
                                        <i class="fa-solid fa-user" style="font-size: 1.3rem; width: 27px;"></i>
                                        <p class="m-0 ms-3" style="font-weight: 600;">
                                            {{ $laporanKegiatanJabatanStatusTolak->rencana->user->userAparatur->nama }}</p>
                                    </div>
                                    <div class="d-flex align-items-center item-attr">
                                        <i class="fa-solid fa-comments" style="font-size: 1.3rem; width: 27px;"></i>
                                        <p class="m-0 ms-3" style="font-weight: 600;">JAKI</p>
                                    </div>
                                    <div class="d-flex align-items-center item-attr">
                                        <i class="fa-solid fa-rectangle-list" style="font-size: 1.3rem; width: 27px;"></i>
                                        <p class="m-0 ms-3" style="font-weight: 600;">
                                            {{ $laporanKegiatanJabatanStatusTolak->rencana->user->roles()->first()->display_name }}
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-center item-attr">
                                        <i class="fa-solid fa-right-left" style="font-size: 1.3rem; width: 27px;"></i>
                                        <p class="m-0 ms-3" style="font-weight: 600;">KELURAHAN GAMBIR</p>
                                    </div>
                                </div>
                                <button class="btn btn-gray w-100 py-2 mt-3">Detail Laporan</button>
                            </div>
                        @empty
                            <div class="d-flex justify-content-center mt-3">
                                <p class="m-0" style="font-style: italic;">Tidak ada data untuk ditampilkan</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="laporkan" tabindex="-1" role="dialog" aria-labelledby="laporkanTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Laporan Kegiatan Jabatan</h5>
                </div>
                <div class="modal-body">
                    <form class="d-flex flex-column form-kegiatan" enctype="multipart/form-data">
                        <input type="hidden" name="rencana_butir_kegiatan">
                        <input type="hidden" name="current_date">
                        <div class="row">
                            <ul class="ms-4">
                                <li>
                                    <p class="butir text-gray m-0 p-0">Lorem ipsum dolor sit amet.</p>
                                </li>
                            </ul>
                            <div class="form-group col-md-12">
                                <label>File Dokumen</label>
                                <input type="file" name="doc_kegiatan_tmp[]" multiple data-max-file-size="2MB"
                                    data-max-files="3" required />
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Detail Kegiatan</label>
                                <textarea name="keterangan" id="" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button type="button" class="btn btn-danger px-5" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-blue px-5 simpan-kegiatan">
                                <img class="spin" src="{{ asset('assets/images/template/spinner.gif') }}"
                                    style="height: 25px; object-fit: cover;display: none;" alt="" srcset="">
                                <span>Kirim</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/pages/aparatur/laporan-kegiatan/jabatan/show.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/aparatur/timeline.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/filepond/filepond.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/filepond.css') }}">
    <link href="{{ asset('assets/extensions/filepond-plugin-file-poster/dist/filepond-plugin-file-poster.css') }}"
        rel="stylesheet" />
@endsection
@section('js')
    <script src="{{ asset('assets/js/auth/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/filepond/filepond.js') }}"></script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}">
    </script>
    <script
        src="{{ asset('assets/extensions/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.js') }}">
    </script>
    <script src="{{ asset('assets/extensions/filepond/filepond.jquery.js') }}"></script>
    <script
        src="{{ asset('assets/extensions/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.js') }}">
    </script>
    <script src="{{ asset('assets/extensions/filepond-plugin-file-poster/dist/filepond-plugin-file-poster.js') }}">
    </script>
    <script src="{{ asset('assets/js/pages/aparatur/laporan-kegiatan/simplebar.js') }}"></script>
    <script src="{{ asset('assets/js/pages/aparatur/laporan-kegiatan/jabatan/show.js') }}"></script>
@endsection
