@extends('layouts.master')

@section('content')
    <div class="section">
        <div class="row">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between align-items-center head-butir">
                        <h5 class="my-0">{{ $butirKegiatan->nama }}</h5>
                        <button class="btn btn-gray" data-bs-toggle="modal" data-bs-target="#laporkan">Laporkan</button>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between container-date">
                        <div class="form-group">
                            <input class="form-control" type="date" value="{{ now()->format('Y-m-d') }}" name="">
                        </div>
                        <p class="m-0">{{ $laporanKegiatanJabatans->first()?->rencana->nama }}</p>
                    </div>
                </div>
                <div class="card-body px-0">
                    <div class="row justify-content-between align-items-start m-0 p-0">
                        <div class="col-md-3">
                            @if (count($laporanKegiatanJabatans) > 0)
                                <div class="d-flex flex-column list-laporan">
                                    @foreach ($laporanKegiatanJabatans as $laporanKegiatan)
                                        <a class="list-laporan-item {{ request()->get('kode') == $laporanKegiatan->kode ? 'active' : '' }}"
                                            href="{{ url('laporan-kegiatan/jabatan/' . $butirKegiatan->id . '/show?kode=' . $laporanKegiatan->kode) }}">
                                            Laporan {{ $laporanKegiatan->kode }}
                                        </a>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        <div class="row col-md-9 align-items-start">
                            <div class="col-md-6 py-4" style="border-right: 2px solid rgba(0, 0, 0, 0.125);">
                                @if (isset($laporanKegiatanJabatan))
                                    <div class="d-flex flex-column">
                                        <h6 class="pb-2">Laporan
                                            Kegiatan</h6>
                                        <div class="d-flex flex-column pe-3 ps-1" data-simplebar
                                            style="max-height: 74vh; overflow-y: auto; overflow-x: hidden;">
                                            <h6>File Dokumen</h6>
                                            <div class="d-flex flex-wrap gap-3 justify-content-center">
                                                @foreach ($laporanKegiatanJabatan->dokumenKegiatanJabatans as $dokumenKegiatanJabatan)
                                                    <img src="{{ $dokumenKegiatanJabatan->file }}"
                                                        style="width: 100%; max-height: 400px; object-fit: contain; border-radius: 10px; overflow: hidden;"
                                                        alt="">
                                                @endforeach
                                            </div>
                                            {{-- <div class="form-group">
                                            <div class="d-flex flex-column mt-3">
                                                <span style="color: #000; font-weight: 700;">Lorem ipsum dolor sit
                                                    amet.</span>
                                                <span style="color: #000; margin-left: 1rem;">Lorem ipsum, dolor sit amet
                                                    consectetur adipisicing elit. A, molestiae.</span>
                                                <ul style="margin-left: 1.5rem;">
                                                    <li style="color: #000;">
                                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reiciendis
                                                        tenetur pariatur quibusdam.
                                                    </li>
                                                </ul>
                                            </div>
                                            <label>Detail Kegiatan</label>
                                            <textarea class="form-control" readonly name="keterangan" rows="3">{{ $laporanKegiatanJabatan->detail_kegiatan }}</textarea>
                                        </div> --}}
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-6 py-4">
                                @if (isset($laporanKegiatanJabatan))
                                    <div class="d-flex justify-content-between align-items-center pb-3">
                                        <h6 class="mb-0">Riwayat
                                            Laporan
                                            Kegiatan</h6>

                                        @switch($laporanKegiatanJabatan->status)
                                            @case(1)
                                                <button class="btn btn-yellow px-3 btn-sm text-sm">Prosess</button>
                                            @break

                                            @case(2)
                                                <button class="btn btn-red px-3 btn-sm text-sm">Revisi</button>
                                            @break

                                            @case(3)
                                                <button class="btn btn-black px-3 btn-sm text-sm">Ditolak</button>
                                            @break

                                            @case(4)
                                                <button class="btn btn-green-dark px-3 btn-sm text-sm">Selesai</button>
                                            @break
                                        @endswitch
                                    </div>

                                    <div class="timeline-vertical" data-simplebar
                                        style="max-height: 74vh; overflow-y: auto; overflow-x: hidden;">
                                        @foreach ($laporanKegiatanJabatan->historyKegiatanJabatans as $historyKegiatanJabatan)
                                            <div class="timeline-item">
                                                @switch($historyKegiatanJabatan->icon)
                                                    @case(1)
                                                        <div class="timeline-icon icon-item  border-300">
                                                            <i class="text-yellow fa-solid fa-spinner"></i>
                                                        </div>
                                                    @break

                                                    @case(2)
                                                        <div class="timeline-icon icon-item  border-300">
                                                            <i class="text-red fa-solid fa-file-pen"></i>
                                                        </div>
                                                    @break

                                                    @case(3)
                                                        <div class="timeline-icon icon-item  border-300">
                                                            <i class="text-black fa-solid fa-x"></i>
                                                        </div>
                                                    @break

                                                    @case(4)
                                                        <div class="timeline-icon icon-item  border-300">
                                                            <i class="text-green fa-solid fa-check"></i>
                                                        </div>
                                                    @break

                                                    @case(5)
                                                        <div class="timeline-icon icon-item  border-300">
                                                            <i class="text-red-terang fa-solid fa-paper-plane"></i>
                                                        </div>
                                                    @break

                                                    @case(6)
                                                        <div class="timeline-icon icon-item  border-300">
                                                            <i class="text-red-terang fa-solid fa-keyboard"></i>
                                                        </div>
                                                    @break
                                                @endswitch
                                                <div class="row">
                                                    <div class="col-lg-12 timeline-item-time">
                                                        <div>
                                                            @switch($historyKegiatanJabatan->status)
                                                                @case(1)
                                                                    <span class="btn btn-yellow py-1 px-3"
                                                                        style="font-size: 12px !important;">Validasi</span>
                                                                @break

                                                                @case(2)
                                                                    <span class="btn btn-red-dark py-1 px-3"
                                                                        style="font-size: 12px !important;">Revisi</span>
                                                                @break

                                                                @case(3)
                                                                    <span class="btn btn-black py-1 px-3"
                                                                        style="font-size: 12px !important;">Ditolak</span>
                                                                @break

                                                                @case(4)
                                                                    <span class="btn btn-green-dark py-1 px-3"
                                                                        style="font-size: 12px !important;">Selesai</span>
                                                                @break

                                                                @case(5)
                                                                    <span class="btn btn-red-terang py-1 px-3"
                                                                        style="font-size: 12px !important;">Laporkan</span>
                                                                @break
                                                            @endswitch

                                                            <p class="fs--1 mb-0 fw-semi-bold text-600">
                                                                {{ $historyKegiatanJabatan->keterangan }}
                                                            </p>
                                                            <p class="fs--2 text-600">
                                                                {{ $historyKegiatanJabatan->created_at->format('H:i:s') }}
                                                                WIB,
                                                                {{ $historyKegiatanJabatan->created_at->format('d F Y') }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    @if (isset($historyKegiatanJabatan->historyDokumenKegiatanJabatans) &&
                                                        count($historyKegiatanJabatan->historyDokumenKegiatanJabatans) > 0)
                                                        <div class="col-lg-12">
                                                            <div class="timeline-item-content">
                                                                <div class="timeline-item-card">
                                                                    @foreach ($historyKegiatanJabatan->historyDokumenKegiatanJabatans as $historyDokumenKegiatanJabatan)
                                                                        <img src="{{ $historyDokumenKegiatanJabatan->file }}"
                                                                            style="width: 48%; max-height: 400px; object-fit: contain; border-radius: 10px; overflow: hidden;"
                                                                            alt="">
                                                                    @endforeach
                                                                    <p style="font-size: .9rem;"
                                                                        class="mb-0 text-gray mt-2">
                                                                        {{ $historyKegiatanJabatan->detail_kegiatan }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if (isset($historyKegiatanJabatan?->catatan))
                                                        <div class="col-lg-12">
                                                            <div class="timeline-item-content">
                                                                <div class="timeline-item-card">
                                                                    <p class="fs--1 mb-0 text-gray">
                                                                        {{ $historyKegiatanJabatan->catatan }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                        {{-- <div class="timeline-item">
                                        <div class="timeline-icon icon-item  border-300">
                                            <i class="text-gray fa-solid fa-clipboard-list"></i>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 timeline-item-time">
                                                <div>
                                                    <span class="btn btn-gray py-1 px-3"
                                                        style="font-size: 12px !important;">Rencana Kinerja</span>
                                                    <p class="fs--1 mb-0 fw-semi-bold text-600">
                                                        Rencana Kinerja Berhasil Disusun Oleh
                                                        {{ $user->userAparatur?->nama }}
                                                        - {{ $user->roles()->first()->display_name }}
                                                    </p>
                                                    <p class="fs--2 text-600">
                                                        {{ $created_at->format('H:i:s') }} WIB,
                                                        {{ $created_at->format('d F Y') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    </div>
                                @endif
                            </div>
                        </div>
                        {{-- <div class="row col-md-9 m-0 p-0 container-laporan">
                            <div class="col-md-6 bg-green">
                                @if (isset($laporanKegiatanJabatan))
                                    <h4>{{ $laporanKegiatanJabatan->detail_kegiatan }}</h4>
                                @endif
                            </div>
                            <div class="col-md-6 bg-yellow">

                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="laporkan" tabindex="-1" role="dialog" aria-labelledby="laporkanTitle" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Laporan Kegiatan Jabatan</h5>
                </div>
                <div class="modal-body">
                    <form class="d-flex flex-column form-kegiatan" enctype="multipart/form-data">
                        <input type="hidden" name="butir_kegiatan" value="{{ $butirKegiatan->id }}">
                        <input type="hidden" name="rencana_id"
                            value="{{ $laporanKegiatanJabatans->first()?->rencana->id }}">
                        <input type="hidden" name="rencana_count" value="{{ $laporanKegiatanJabatans->count() }}">
                        <div class="row">
                            <ul class="ms-4">
                                <li>
                                    <p class="butir text-gray m-0 p-0">{{ $butirKegiatan->nama }}</p>
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
                            @if (!isset($laporanKegiatanJabatans->first()?->rencana))
                                <div class="form-group">
                                    <label>Rencana</label>
                                    <select name="rencana_id" id="" class="form-select">
                                        <option selected disabled>- Pilih Rencana -</option>
                                        @foreach ($rencanas as $rencana)
                                            <option value="{{ $rencana->id }}">{{ $rencana->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
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
    <link rel="stylesheet" href="{{ asset('assets/extensions/filepond/filepond.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/filepond.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/shared/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/aparatur/timeline.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/aparatur/laporan-kegiatan/jabatan.css') }}">
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
    <script src="{{ asset('assets/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/aparatur/kegiatan/jabatan/show.js') }}"></script>
    <script src="{{ asset('assets/js/pages/aparatur/laporan-kegiatan/simplebar.js') }}"></script>
@endsection
