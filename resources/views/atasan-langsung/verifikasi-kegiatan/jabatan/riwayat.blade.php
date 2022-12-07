<div class="modal fade" id="riwayatKegiatan{{ $laporanKegiatanJabatan->id }}" data-bs-backdrop="static" tabindex="-1"
    role="dialog" aria-labelledby="riwayatKegiatanTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body px-4 py-0">
                <div class="row">
                    <div class="col-md-6 py-4" style="border-right: 2px solid rgba(0, 0, 0, 0.125);">
                        <div class="d-flex flex-column">
                            <h5 class="text-center pb-2">Laporan
                                Kegiatan</h5>
                            <div class="d-flex flex-column pe-3 ps-1" data-simplebar
                                style="max-height: 74vh; overflow-y: auto; overflow-x: hidden;">
                                <h6>File Dokumen</h6>
                                <div class="d-flex flex-wrap gap-3 justify-content-center">
                                    @if (count($laporanKegiatanJabatan->dokumenKegiatanJabatans) > 0 &&
                                        !str($laporanKegiatanJabatan?->dokumenKegiatanJabatans[0]?->link ?? '')->contains(['.pdf', '.docx']))
                                        <div class="swiper mySwiper">
                                            <div class="swiper-wrapper">
                                                @foreach ($laporanKegiatanJabatan->dokumenKegiatanJabatans as $dokumenKegiatanJabatan)
                                                    @if (!str($dokumenKegiatanJabatan->link)->contains(['.pdf', '.docx']))
                                                        <div class="swiper-slide">
                                                            <img src="{{ $dokumenKegiatanJabatan->link }}"
                                                                alt="">
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="swiper-pagination"></div>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <div class="d-flex flex-column mt-3">
                                        <span
                                            style="color: #000; font-weight: 700;">{{ $laporanKegiatanJabatan->butirKegiatan->subUnsur->unsur->nama }}</span>
                                        <span
                                            style="color: #000; margin-left: 1rem;">{{ $laporanKegiatanJabatan->butirKegiatan->subUnsur->nama }}</span>
                                        <ul style="margin-left: 1.5rem;">
                                            <li style="color: #000;">{{ $laporanKegiatanJabatan->butirKegiatan->nama }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 py-4">
                        <div class="d-flex justify-content-between align-items-center pb-3">
                            <h5 class="text-center mb-0">Riwayat
                                Laporan
                                Kegiatan</h5>

                            @switch($laporanKegiatanJabatan->status)
                                @case(1)
                                    <button class="btn btn-yellow px-3 btn-sm text-sm">Valdasi</button>
                                @break

                                @case(2)
                                    <button class="btn btn-red px-3 btn-sm text-sm">Revisi</button>
                                @break

                                @case(3)
                                    <button class="btn btn-green-dark px-3 btn-sm text-sm">Selesai</button>
                                @break

                                @case(4)
                                    <button class="btn btn-black px-3 btn-sm text-sm">Ditolak</button>
                                @break
                            @endswitch
                        </div>

                        <div class="timeline-vertical" data-simplebar
                            style="max-height: 74vh; overflow-y: auto; overflow-x: hidden;">
                            @foreach ($laporanKegiatanJabatan->historyKegiatanJabatans()->orderBy('id', 'desc')->get() as $historyKegiatanJabatan)
                                <div class="timeline-item">
                                    @switch($historyKegiatanJabatan->icon)
                                        @case(1)
                                            <div class="timeline-icon icon-item icon-item-lg border-300">
                                                <i class="text-red-terang fa-solid fa-keyboard"></i>
                                            </div>
                                        @break

                                        @case(2)
                                            <div class="timeline-icon icon-item icon-item-lg border-300">
                                                <i class="text-yellow fa-solid fa-spinner"></i>
                                            </div>
                                        @break

                                        @case(3)
                                            <div class="timeline-icon icon-item icon-item-lg border-300">
                                                <i class="text-red fa-solid fa-file-pen"></i>
                                            </div>
                                        @break

                                        @case(4)
                                            <div class="timeline-icon icon-item icon-item-lg border-300">
                                                <i class="text-red-terang fa-solid fa-paper-plane"></i>
                                            </div>
                                        @break

                                        @case(5)
                                            <div class="timeline-icon icon-item icon-item-lg border-300">
                                                <i class="text-black fa-solid fa-x"></i>
                                            </div>
                                        @break

                                        @case(6)
                                            <div class="timeline-icon icon-item icon-item-lg border-300">
                                                <i class="text-green fa-solid fa-check"></i>
                                            </div>
                                        @break
                                    @endswitch
                                    <div class="row">
                                        <div class="col-lg-12 timeline-item-time">
                                            <div>
                                                @switch($historyKegiatanJabatan->status)
                                                    @case(1)
                                                        <span class="btn btn-red-terang py-1 px-3"
                                                            style="font-size: 12px !important;">Laporkan</span>
                                                    @break

                                                    @case(2)
                                                        <span class="btn btn-yellow py-1 px-3"
                                                            style="font-size: 12px !important;">Validasi</span>
                                                    @break

                                                    @case(3)
                                                        <span class="btn btn-red-dark py-1 px-3"
                                                            style="font-size: 12px !important;">Revisi</span>
                                                    @break

                                                    @case(4)
                                                        <span class="btn btn-green-dark py-1 px-3"
                                                            style="font-size: 12px !important;">Selesai</span>
                                                    @break

                                                    @case(5)
                                                        <span class="btn btn-black py-1 px-3"
                                                            style="font-size: 12px !important;">Ditolak</span>
                                                    @break
                                                @endswitch

                                                <p class="fs--1 mb-0 fw-semi-bold text-600">
                                                    {{ $historyKegiatanJabatan->keterangan }}
                                                </p>
                                                <p class="fs--2 text-600">
                                                    {{ $historyKegiatanJabatan->created_at->format('H:i') }} WIB,
                                                    {{ $historyKegiatanJabatan->created_at->format('d F Y') }}
                                                </p>
                                            </div>
                                        </div>
                                        @if (isset($historyKegiatanJabatan->historyDokumenKegiatanJabatans) &&
                                            count($historyKegiatanJabatan->historyDokumenKegiatanJabatans) > 0)
                                            <div class="col-lg-12">
                                                <div class="timeline-item-content">
                                                    <div class="timeline-item-card">
                                                        <div class="swiper mySwiper">
                                                            <div class="swiper-wrapper">
                                                                @foreach ($historyKegiatanJabatan->historyDokumenKegiatanJabatans as $historyDokumenKegiatanJabatan)
                                                                    <div class="swiper-slide">
                                                                        <img src="{{ $historyDokumenKegiatanJabatan->link }}"
                                                                            alt="">
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                            <div class="swiper-pagination"></div>
                                                        </div>
                                                        <p class="fs--1 mb-0 text-gray mt-2">
                                                            {{ $historyKegiatanJabatan->detail_kegiatan }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif (count($historyKegiatanJabatan->historyDokumenKegiatanJabatans) <= 0 &&
                                            isset($historyKegiatanJabatan->detail_kegiatan))
                                            <div class="col-lg-12">
                                                <div class="timeline-item-content">
                                                    <div class="timeline-item-card">
                                                        <p class="fs--1 mb-0 text-gray">
                                                            {{ $laporanKegiatanJabatan->detail_kegiatan }}</p>
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
                        </div>
                    </div>
                </div>
                <div class="d-flex wrapper-btn justify-content-end align-items-center mt-0 pb-2">
                    <button type="button" class="btn btn-danger btn-sm px-4" data-bs-dismiss="modal">Tutup</button>
                    @if (in_array($laporanKegiatanJabatan->status, [1]))
                        <button type="button" data-laporan="{{ $laporanKegiatanJabatan->id }}"
                            class="btn btn-black px-4 btn-sm tolak-kegiatan ms-2">
                            <img class="spin" src="{{ asset('assets/images/template/spinner.gif') }}"
                                style="height: 25px; object-fit: cover;display: none;" alt="" srcset="">
                            <span>Tolak</span>
                        </button>
                        <button type="button" data-user="{{ $laporanKegiatanJabatan->rencana->user->id }}"
                            data-laporan="{{ $laporanKegiatanJabatan->id }}"
                            class="btn btn-red-dark px-4 revisi-kegiatan ms-2">
                            <img class="spin" src="{{ asset('assets/images/template/spinner.gif') }}"
                                style="height: 25px; object-fit: cover;display: none;" alt="" srcset="">
                            <span>Revisi</span>
                        </button>
                        <button type="button" data-laporan="{{ $laporanKegiatanJabatan->id }}"
                            class="btn btn-green-dark px-4 btn-sm verifikasi-kegiatan ms-2">
                            <img class="spin" src="{{ asset('assets/images/template/spinner.gif') }}"
                                style="height: 25px; object-fit: cover;display: none;" alt="" srcset="">
                            <span>Verifikasi</span>
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
