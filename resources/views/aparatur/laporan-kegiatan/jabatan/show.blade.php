@extends('layouts.master')

@section('content')
    <div class="section">
        <div class="d-flex px-4 mb-4 container-control justify-content-between align-items-center">
            <div class="form-group mb-0">
                <input class="form-control" type="date" value="{{ now()->format('Y-m-d') }}" name="tanggal">
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
                    <div class="card-body mx-0 my-2" data-simplebar style="max-height: 540px;">
                        @forelse ($laporanKegiatanJabatanStatusValidasis as $laporanKegiatanJabatanStatusValidasi)
                            <div class="laporan-item pb-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <p class="m-0" style="font-weight: 600;">
                                        {{ $laporanKegiatanJabatanStatusValidasi->created_at->translatedFormat('H:i') . ' WIB, ' . $laporanKegiatanJabatanStatusValidasi->created_at->translatedFormat('d M Y') }}
                                    </p>
                                    <button class="btn btn-yellow btn-sm text-sm px-3">Validasi</button>
                                </div>
                                <div class="swiper mySwiper">
                                    <div class="swiper-wrapper">
                                        @foreach ($laporanKegiatanJabatanStatusValidasi->dokumenKegiatanJabatans as $dokumenKegiatanJabatan)
                                            <div class="swiper-slide">
                                                <img src="{{ $dokumenKegiatanJabatan->link }}" alt="">
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
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
                                        <i class="fa-solid fa-person-running" style="font-size: 1.3rem; width: 27px;"></i>
                                        <p class="m-0 ms-3" style="font-weight: 600;">
                                            {{ $laporanKegiatanJabatanStatusValidasi->butirKegiatan->nama }}
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-center item-attr">
                                        <i class="fa-solid fa-list-ul" style="font-size: 1.3rem; width: 27px;"></i>
                                        <p class="m-0 ms-3" style="font-weight: 600;">
                                            {{ $laporanKegiatanJabatanStatusValidasi->rencana->nama }}
                                        </p>
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
                    <div class="card-body mx-0 my-2" data-simplebar style="max-height: 540px;">
                        @forelse ($laporanKegiatanJabatanStatusRevisis as $laporanKegiatanJabatanStatusRevisi)
                            <div class="laporan-item pb-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <p class="m-0" style="font-weight: 600;">
                                        {{ $laporanKegiatanJabatanStatusRevisi->created_at->translatedFormat('H:i') . ' WIB, ' . $laporanKegiatanJabatanStatusRevisi->created_at->translatedFormat('d M Y') }}
                                    </p>
                                    <button class="btn btn-red btn-sm text-sm px-3">Revisi</button>
                                </div>
                                <div class="swiper mySwiper">
                                    <div class="swiper-wrapper">
                                        @foreach ($laporanKegiatanJabatanStatusRevisi->dokumenKegiatanJabatans as $dokumenKegiatanJabatan)
                                            <div class="swiper-slide">
                                                <img src="{{ $dokumenKegiatanJabatan->link }}" alt="">
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
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
                                            {{ $laporanKegiatanJabatanStatusRevisi->rencana->user->userAparatur->nama }}
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-center item-attr">
                                        <i class="fa-solid fa-person-running" style="font-size: 1.3rem; width: 27px;"></i>
                                        <p class="m-0 ms-3" style="font-weight: 600;">
                                            {{ $laporanKegiatanJabatanStatusRevisi->butirKegiatan->nama }}
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-center item-attr">
                                        <i class="fa-solid fa-list-ul" style="font-size: 1.3rem; width: 27px;"></i>
                                        <p class="m-0 ms-3" style="font-weight: 600;">
                                            {{ $laporanKegiatanJabatanStatusRevisi->rencana->nama }}
                                        </p>
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
                    <div class="card-body mx-0 my-2" data-simplebar style="max-height: 540px;">
                        @forelse ($laporanKegiatanJabatanStatusSelesais as $laporanKegiatanJabatanStatusSelesai)
                            <div class="laporan-item pb-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <p class="m-0" style="font-weight: 600;">
                                        {{ $laporanKegiatanJabatanStatusSelesai->created_at->translatedFormat('H:i') . ' WIB, ' . $laporanKegiatanJabatanStatusSelesai->created_at->translatedFormat('d M Y') }}
                                    </p>
                                    <button class="btn btn-green btn-sm text-sm px-3">Selesai</button>
                                </div>
                                <div class="swiper mySwiper">
                                    <div class="swiper-wrapper">
                                        @foreach ($laporanKegiatanJabatanStatusSelesai->dokumenKegiatanJabatans as $dokumenKegiatanJabatan)
                                            <div class="swiper-slide">
                                                <img src="{{ $dokumenKegiatanJabatan->link }}" alt="">
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
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
                                        <i class="fa-solid fa-person-running" style="font-size: 1.3rem; width: 27px;"></i>
                                        <p class="m-0 ms-3" style="font-weight: 600;">
                                            {{ $laporanKegiatanJabatanStatusSelesai->butirKegiatan->nama }}
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-center item-attr">
                                        <i class="fa-solid fa-list-ul" style="font-size: 1.3rem; width: 27px;"></i>
                                        <p class="m-0 ms-3" style="font-weight: 600;">
                                            {{ $laporanKegiatanJabatanStatusSelesai->rencana->nama }}
                                        </p>
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
                    <div class="card-body mx-0 my-2" data-simplebar style="max-height: 540px;">
                        @forelse ($laporanKegiatanJabatanStatusTolaks as $laporanKegiatanJabatanStatusTolak)
                            <div class="laporan-item pb-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <p class="m-0" style="font-weight: 600;">
                                        {{ $laporanKegiatanJabatanStatusTolak->created_at->translatedFormat('H:i') . ' WIB, ' . $laporanKegiatanJabatanStatusTolak->created_at->translatedFormat('d M Y') }}
                                    </p>
                                    <button class="btn btn-black btn-sm text-sm px-3">DITOLAK</button>
                                </div>
                                <div class="swiper mySwiper">
                                    <div class="swiper-wrapper">
                                        @foreach ($laporanKegiatanJabatanStatusTolak->dokumenKegiatanJabatans as $dokumenKegiatanJabatan)
                                            <div class="swiper-slide">
                                                <img src="{{ $dokumenKegiatanJabatan->link }}" alt="">
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
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
                                        <i class="fa-solid fa-person-running" style="font-size: 1.3rem; width: 27px;"></i>
                                        <p class="m-0 ms-3" style="font-weight: 600;">
                                            {{ $laporanKegiatanJabatanStatusTolak->butirKegiatan->nama }}
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-center item-attr">
                                        <i class="fa-solid fa-list-ul" style="font-size: 1.3rem; width: 27px;"></i>
                                        <p class="m-0 ms-3" style="font-weight: 600;">
                                            {{ $laporanKegiatanJabatanStatusTolak->rencana->nama }}
                                        </p>
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
                        <input type="hidden" name="butir_kegiatan" value="{{ $butirKegiatan->id }}">
                        <input type="hidden" name="rencana_count" value="{{ $laporanKegiatanJabatanCount }}">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Tanggal</label>
                                <input class="form-control" type="date" value="{{ now()->format('Y-m-d') }}"
                                    name="current_date">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Rencana</label>
                                <select name="rencana_id" class="form-select">
                                    <option selected disabled>- Pilih Rencana -</option>
                                    @foreach ($rencanas as $rencana)
                                        <option value="{{ $rencana->id }}">{{ $rencana->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label>File Dokumen</label>
                                <input type="file" name="doc_kegiatan_tmp[]" multiple data-max-file-size="2MB"
                                    data-max-files="3" required />
                            </div>
                            <div class="form-group col-md-12">
                                <label>Detail Kegiatan</label>
                                <textarea name="detail_kegiatan" rows="3" class="form-control"></textarea>
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
    <link rel="stylesheet" href="{{ asset('assets/css/shared/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/swiper/swiper-bundle.min.css') }}" />
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
    <script src="{{ asset('assets/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/aparatur/laporan-kegiatan/simplebar.js') }}"></script>
    <script src="{{ asset('assets/plugins/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/aparatur/laporan-kegiatan/jabatan/show.js') }}"></script>
@endsection
