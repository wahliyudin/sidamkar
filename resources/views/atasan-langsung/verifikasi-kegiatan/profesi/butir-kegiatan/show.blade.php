@extends('layouts.master')

@section('content')
    <div class="section">
        <div class="d-flex px-4 mb-4 container-control justify-content-between align-items-center">
            <div class="d-flex">
                <div class="icon-back mb-2"><i class="fa-solid fa-arrow-left-long" style="cursor: pointer"></i>
                </div>
                <div class="ms-2">
                </div>
            </div>
            <div class="form-group mb-0">
                <input class="form-control" type="date" value="{{ now()->format('Y-m-d') }}"
                    max="{{ Carbon\Carbon::make($periode->akhir)->format('Y-m-d') }}"
                    min="{{ Carbon\Carbon::make($periode->awal)->format('Y-m-d') }}" name="tanggal">
            </div>
        </div>
        <div class="row d-flex flex-row flex-nowrap overflow-auto">
            <div class="card col-sm-6 mx-3">
                <div class="card">
                    <div class="card-header py-2 d-flex justify-content-between align-items-center"
                        style="border-bottom: 1px solid rgba(0, 0, 0, 0.125);">
                        <h4 class="m-0  text-uppercase">Validasi</h4>
                        <p class="m-0" style="font-style: italic;">Total :
                            {{ count($laporanKegiatanPenunjangProfesiStatusValidasis) }}</p>
                    </div>
                    <div class="card-body mx-0 my-2 container-laporan">
                        @forelse ($laporanKegiatanPenunjangProfesiStatusValidasis as $laporanKegiatanPenunjangProfesiStatusValidasi)
                            <div class="laporan-item pb-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <p class="m-0" style="font-weight: 600;">
                                        {{ $laporanKegiatanPenunjangProfesiStatusValidasi->created_at->translatedFormat('H:i') . ' WIB, ' . $laporanKegiatanPenunjangProfesiStatusValidasi->created_at->translatedFormat('d M Y') }}
                                    </p>
                                    <button class="btn btn-yellow btn-sm text-sm px-3">Validasi</button>
                                </div>
                                @if (count($laporanKegiatanPenunjangProfesiStatusValidasi->dokumenPenunjangProfesis) > 0)
                                    <div class="swiper mySwiper">
                                        <div class="swiper-wrapper">
                                            @foreach ($laporanKegiatanPenunjangProfesiStatusValidasi->dokumenPenunjangProfesis as $dokumenKegiatanJabatan)
                                                @if (!str($dokumenKegiatanJabatan->link)->contains(['.pdf', '.docx']))
                                                    <div class="swiper-slide">
                                                        <img src="{{ $dokumenKegiatanJabatan->link }}" alt="">
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="swiper-pagination"></div>
                                    </div>
                                @endif
                                <div class="d-flex flex-column mt-3">
                                    <div class="d-flex align-items-start item-attr">
                                        <i class="fa-solid fa-address-card" style="font-size: 1.3rem; width: 27px;"></i>
                                        <p class="m-0 ms-3" style="font-weight: 600; max-width: 370px;">
                                            {{ $laporanKegiatanPenunjangProfesiStatusValidasi->kode }}
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-start item-attr">
                                        <i class="fa-solid fa-user" style="font-size: 1.3rem; width: 27px;"></i>
                                        <p class="m-0 ms-3" style="font-weight: 600; max-width: 370px;">
                                            {{ $laporanKegiatanPenunjangProfesiStatusValidasi->user->userAparatur->nama }}
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-start item-attr">
                                        <i class="fa-solid fa-person-running" style="font-size: 1.3rem; width: 27px;"></i>
                                        <p class="m-0 ms-3" style="font-weight: 600; max-width: 370px;">
                                            {{ $laporanKegiatanPenunjangProfesiStatusValidasi->butirKegiatan->nama }}
                                        </p>
                                    </div>
                                </div>
                                <button class="btn btn-gray w-100 py-2 mt-3" data-bs-toggle="modal"
                                    data-bs-target="#riwayatKegiatan{{ $laporanKegiatanPenunjangProfesiStatusValidasi->id }}">Detail
                                    Laporan</button>
                            </div>
                            @include('atasan-langsung.verifikasi-kegiatan.profesi.butir-kegiatan.riwayat', [
                                'laporanKegiatanPenunjangProfesi' => $laporanKegiatanPenunjangProfesiStatusValidasi,
                            ])
                        @empty
                            <div class="d-flex justify-content-center mt-3">
                                <p class="m-0" style="font-style: italic;">Tidak ada data untuk ditampilkan</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="card col-sm-6 mx-3">
                <div class="card">
                    <div class="card-header py-2 d-flex justify-content-between align-items-center"
                        style="border-bottom: 1px solid rgba(0, 0, 0, 0.125);">
                        <h4 class="m-0 text-uppercase">Revisi</h4>
                        <p class="m-0" style="font-style: italic;">Total :
                            {{ count($laporanKegiatanPenunjangProfesiStatusRevisis) }}</p>
                    </div>
                    <div class="card-body mx-0 my-2 container-laporan">
                        @forelse ($laporanKegiatanPenunjangProfesiStatusRevisis as $laporanKegiatanPenunjangProfesiStatusRevisi)
                            <div class="laporan-item pb-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <p class="m-0" style="font-weight: 600;">
                                        {{ $laporanKegiatanPenunjangProfesiStatusRevisi->created_at->translatedFormat('H:i') . ' WIB, ' . $laporanKegiatanPenunjangProfesiStatusRevisi->created_at->translatedFormat('d M Y') }}
                                    </p>
                                    <button class="btn btn-red-dark btn-sm text-sm px-3">Revisi</button>
                                </div>
                                @if (count($laporanKegiatanPenunjangProfesiStatusRevisi->dokumenPenunjangProfesis) > 0)
                                    <div class="swiper mySwiper">
                                        <div class="swiper-wrapper">
                                            @foreach ($laporanKegiatanPenunjangProfesiStatusRevisi->dokumenPenunjangProfesis as $dokumenKegiatanJabatan)
                                                @if (!str($dokumenKegiatanJabatan->link)->contains(['.pdf', '.docx']))
                                                    <div class="swiper-slide">
                                                        <img src="{{ $dokumenKegiatanJabatan->link }}" alt="">
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="swiper-pagination"></div>
                                    </div>
                                @endif
                                <div class="d-flex flex-column mt-3">
                                    <div class="d-flex align-items-start item-attr">
                                        <i class="fa-solid fa-address-card" style="font-size: 1.3rem; width: 27px;"></i>
                                        <p class="m-0 ms-3" style="font-weight: 600; max-width: 370px;">
                                            {{ $laporanKegiatanPenunjangProfesiStatusRevisi->kode }}
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-start item-attr">
                                        <i class="fa-solid fa-person-running" style="font-size: 1.3rem; width: 27px;"></i>
                                        <p class="m-0 ms-3" style="font-weight: 600; max-width: 370px;">
                                            {{ $laporanKegiatanPenunjangProfesiStatusRevisi->butirKegiatan->nama }}
                                        </p>
                                    </div>
                                </div>
                                <button class="btn btn-gray w-100 py-2 mt-3 detail-revisi"
                                    data-laporan="{{ $laporanKegiatanPenunjangProfesiStatusRevisi->id }}"
                                    data-bs-toggle="modal"
                                    data-bs-target="#riwayatKegiatan{{ $laporanKegiatanPenunjangProfesiStatusRevisi->id }}">Detail
                                    Laporan</button>
                            </div>
                            @include('atasan-langsung.verifikasi-kegiatan.profesi.butir-kegiatan.riwayat', [
                                'laporanKegiatanPenunjangProfesi' => $laporanKegiatanPenunjangProfesiStatusRevisi,
                            ])
                        @empty
                            <div class="d-flex justify-content-center mt-3">
                                <p class="m-0" style="font-style: italic;">Tidak ada data untuk ditampilkan</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="card col-sm-6 mx-3">
                <div class="card">
                    <div class="card-header py-2 d-flex justify-content-between align-items-center"
                        style="border-bottom: 1px solid rgba(0, 0, 0, 0.125);">
                        <h4 class="m-0 text-uppercase">Selesai</h4>
                        <p class="m-0" style="font-style: italic;">Total :
                            {{ count($laporanKegiatanPenunjangProfesiStatusSelesais) }}</p>
                    </div>
                    <div class="card-body mx-0 my-2 container-laporan">
                        @forelse ($laporanKegiatanPenunjangProfesiStatusSelesais as $laporanKegiatanPenunjangProfesiStatusSelesai)
                            <div class="laporan-item pb-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <p class="m-0" style="font-weight: 600;">
                                        {{ $laporanKegiatanPenunjangProfesiStatusSelesai->created_at->translatedFormat('H:i') . ' WIB, ' . $laporanKegiatanPenunjangProfesiStatusSelesai->created_at->translatedFormat('d M Y') }}
                                    </p>
                                    <button class="btn btn-green btn-sm text-sm px-3">Selesai</button>
                                </div>
                                @if (count($laporanKegiatanPenunjangProfesiStatusSelesai->dokumenPenunjangProfesis) > 0)
                                    <div class="swiper mySwiper">
                                        <div class="swiper-wrapper">
                                            @foreach ($laporanKegiatanPenunjangProfesiStatusSelesai->dokumenPenunjangProfesis as $dokumenKegiatanJabatan)
                                                @if (!str($dokumenKegiatanJabatan->link)->contains(['.pdf', '.docx']))
                                                    <div class="swiper-slide">
                                                        <img src="{{ $dokumenKegiatanJabatan->link }}" alt="">
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="swiper-pagination"></div>
                                    </div>
                                @endif
                                <div class="d-flex flex-column mt-3">
                                    <div class="d-flex align-items-start item-attr">
                                        <i class="fa-solid fa-address-card" style="font-size: 1.3rem; width: 27px;"></i>
                                        <p class="m-0 ms-3" style="font-weight: 600; max-width: 370px;">
                                            {{ $laporanKegiatanPenunjangProfesiStatusSelesai->kode }}
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-start item-attr">
                                        <i class="fa-solid fa-user" style="font-size: 1.3rem; width: 27px;"></i>
                                        <p class="m-0 ms-3" style="font-weight: 600; max-width: 370px;">
                                            {{ $laporanKegiatanPenunjangProfesiStatusSelesai->user->userAparatur->nama }}
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-start item-attr">
                                        <i class="fa-solid fa-person-running" style="font-size: 1.3rem; width: 27px;"></i>
                                        <p class="m-0 ms-3" style="font-weight: 600; max-width: 370px;">
                                            {{ $laporanKegiatanPenunjangProfesiStatusSelesai->butirKegiatan->nama }}
                                        </p>
                                    </div>
                                </div>
                                <button class="btn btn-gray w-100 py-2 mt-3" data-bs-toggle="modal"
                                    data-bs-target="#riwayatKegiatan{{ $laporanKegiatanPenunjangProfesiStatusSelesai->id }}">Detail
                                    Laporan</button>
                            </div>
                            @include('atasan-langsung.verifikasi-kegiatan.profesi.butir-kegiatan.riwayat', [
                                'laporanKegiatanPenunjangProfesi' => $laporanKegiatanPenunjangProfesiStatusSelesai,
                            ])
                        @empty
                            <div class="d-flex justify-content-center mt-3">
                                <p class="m-0" style="font-style: italic;">Tidak ada data untuk ditampilkan</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="card col-sm-6 mx-3">
                <div class="card">
                    <div class="card-header py-2 d-flex justify-content-between align-items-center"
                        style="border-bottom: 1px solid rgba(0, 0, 0, 0.125);">
                        <h4 class="m-0 text-uppercase">Ditolak</h4>
                        <p class="m-0" style="font-style: italic;">Total :
                            {{ count($laporanKegiatanPenunjangProfesiStatusTolaks) }}</p>
                    </div>
                    <div class="card-body mx-0 my-2 container-laporan">
                        @forelse ($laporanKegiatanPenunjangProfesiStatusTolaks as $laporanKegiatanPenunjangProfesiStatusTolak)
                            <div class="laporan-item pb-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <p class="m-0" style="font-weight: 600;">
                                        {{ $laporanKegiatanPenunjangProfesiStatusTolak->created_at->translatedFormat('H:i') . ' WIB, ' . $laporanKegiatanPenunjangProfesiStatusTolak->created_at->translatedFormat('d M Y') }}
                                    </p>
                                    <button class="btn btn-black btn-sm text-sm px-3">DITOLAK</button>
                                </div>
                                @if (count($laporanKegiatanPenunjangProfesiStatusTolak->dokumenPenunjangProfesis) > 0)
                                    <div class="swiper mySwiper">
                                        <div class="swiper-wrapper">
                                            @foreach ($laporanKegiatanPenunjangProfesiStatusTolak->dokumenPenunjangProfesis as $dokumenKegiatanJabatan)
                                                @if (!str($dokumenKegiatanJabatan->link)->contains(['.pdf', '.docx']))
                                                    <div class="swiper-slide">
                                                        <img src="{{ $dokumenKegiatanJabatan->link }}" alt="">
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="swiper-pagination"></div>
                                    </div>
                                @endif
                                <div class="d-flex flex-column mt-3">
                                    <div class="d-flex align-items-start item-attr">
                                        <i class="fa-solid fa-address-card" style="font-size: 1.3rem; width: 27px;"></i>
                                        <p class="m-0 ms-3" style="font-weight: 600; max-width: 370px;">
                                            {{ $laporanKegiatanPenunjangProfesiStatusTolak->kode }}
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-start item-attr">
                                        <i class="fa-solid fa-user" style="font-size: 1.3rem; width: 27px;"></i>
                                        <p class="m-0 ms-3" style="font-weight: 600; max-width: 370px;">
                                            {{ $laporanKegiatanPenunjangProfesiStatusTolak->user->userAparatur->nama }}
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-start item-attr">
                                        <i class="fa-solid fa-person-running" style="font-size: 1.3rem; width: 27px;"></i>
                                        <p class="m-0 ms-3" style="font-weight: 600; max-width: 370px;">
                                            {{ $laporanKegiatanPenunjangProfesiStatusTolak->butirKegiatan->nama }}
                                        </p>
                                    </div>
                                </div>
                                <button class="btn btn-gray w-100 py-2 mt-3" data-bs-toggle="modal"
                                    data-bs-target="#riwayatKegiatan{{ $laporanKegiatanPenunjangProfesiStatusTolak->id }}">Detail
                                    Laporan</button>
                            </div>
                            @include('atasan-langsung.verifikasi-kegiatan.profesi.butir-kegiatan.riwayat', [
                                'laporanKegiatanPenunjangProfesi' => $laporanKegiatanPenunjangProfesiStatusTolak,
                            ])
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
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/pages/aparatur/laporan-kegiatan/jabatan/show.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/pages/atasan-langsung/verifikasi-kegiatan/jabatan.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/pages/aparatur/timeline.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/shared/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/swiper/swiper-bundle.min.css') }}" />
@endsection
@section('js')
    <script src="{{ asset('assets/js/auth/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/aparatur/laporan-kegiatan/simplebar.js') }}"></script>
    <script src="{{ asset('assets/plugins/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/atasan-langsung/verifikasi-kegiatan/profesi.js') }}"></script>
@endsection
