<div class="modal fade" id="revisiKegiatan{{ $laporanKegiatanPenunjangProfesi->id }}" data-bs-backdrop="static"
    tabindex="-1" role="dialog" aria-labelledby="revisiKegiatanTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body px-4 py-0">
                <form class="form-kegiatan{{ $laporanKegiatanPenunjangProfesi->id }}" method="post">
                    <div class="row">
                        <div class="col-md-6 py-4" style="border-right: 2px solid rgba(0, 0, 0, 0.125);">
                            <div class="d-flex flex-column">
                                <h5 class="text-center pb-2">Laporan
                                    Kegiatan</h5>
                                <div class="d-flex flex-column pe-3 ps-1" data-simplebar
                                    style="max-height: 74vh; overflow-y: auto; overflow-x: hidden;">
                                    <div class="d-flex flex-column">
                                        <div class="form-group col-md-12">
                                            <label>File Dokumen</label>
                                            <input type="file" name="doc_kegiatan_tmp[]" multiple
                                                data-max-file-size="2MB" data-max-files="3" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Detail Kegiatan</label>
                                            <textarea class="form-control" name="detail_kegiatan" rows="3">{{ $laporanKegiatanPenunjangProfesi->detail_kegiatan }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex flex-column mt-3">
                                            <span
                                                style="color: #000; font-weight: 700;">{{ $laporanKegiatanPenunjangProfesi->butirKegiatan->subUnsur->unsur->nama }}</span>
                                            <span
                                                style="color: #000; margin-left: 1rem;">{{ $laporanKegiatanPenunjangProfesi->butirKegiatan->subUnsur->nama }}</span>
                                            <ul style="margin-left: 1.5rem;">
                                                <li style="color: #000;">
                                                    {{ $laporanKegiatanPenunjangProfesi->butirKegiatan->nama }}
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

                                @switch($laporanKegiatanPenunjangProfesi->status)
                                    @case(1)
                                        <button class="btn btn-yellow px-3 btn-sm text-sm">Valdasi</button>
                                    @break

                                    @case(2)
                                        <button class="btn btn-red-dark px-3 btn-sm text-sm">Revisi</button>
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
                                @include('aparatur.laporan-kegiatan.jabatan.history_rekapitulasi',
                                    compact('historyRekapitulasiKegiatans'))
                                @foreach ($laporanKegiatanPenunjangProfesi->historyPenunjangProfesis()->orderBy('id', 'desc')->get() as $historyPenunjangProfesi)
                                    <div class="timeline-item">
                                        @switch($historyPenunjangProfesi->icon)
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
                                                    @switch($historyPenunjangProfesi->status)
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
                                                        {{ $historyPenunjangProfesi->keterangan }}
                                                    </p>
                                                    <p class="fs--2 text-600">
                                                        {{ $historyPenunjangProfesi->created_at->format('H:i') }} WIB,
                                                        {{ $historyPenunjangProfesi->created_at->format('d F Y') }}
                                                    </p>
                                                </div>
                                            </div>
                                            @if (isset($historyPenunjangProfesi->historyDokumenPenunjangProfesis) &&
                                                count($historyPenunjangProfesi->historyDokumenPenunjangProfesis) > 0)
                                                <div class="col-lg-12">
                                                    <ul>
                                                        @if (count($historyPenunjangProfesi->historyDokumenPenunjangProfesis) > 0 &&
                                                            str($historyPenunjangProfesi?->historyDokumenPenunjangProfesis[0]?->link ?? '')->contains(['.pdf', '.docx']))
                                                            @foreach ($historyPenunjangProfesi->historyDokumenPenunjangProfesis as $historyDokumenPenunjangProfesi)
                                                                @if (str($historyDokumenPenunjangProfesi->link)->contains(['.pdf', '.docx']))
                                                                    <li>
                                                                        <a
                                                                            href="{{ $historyDokumenPenunjangProfesi->link }}">{{ $historyDokumenPenunjangProfesi->name }}</a>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </ul>
                                                    <div class="timeline-item-content">
                                                        <div class="timeline-item-card">
                                                            @if (count($historyPenunjangProfesi->historyDokumenPenunjangProfesis) > 0)
                                                                <div class="swiper mySwiper">
                                                                    <div class="swiper-wrapper">
                                                                        @foreach ($historyPenunjangProfesi->historyDokumenPenunjangProfesis as $historyDokumenPenunjangProfesi)
                                                                            @if (!str($historyDokumenPenunjangProfesi->link)->contains(['.pdf', '.docx']))
                                                                                <div class="swiper-slide">
                                                                                    <img src="{{ $historyDokumenPenunjangProfesi->link }}"
                                                                                        alt="">
                                                                                </div>
                                                                            @endif
                                                                        @endforeach
                                                                    </div>
                                                                    <div class="swiper-pagination"></div>
                                                                </div>
                                                            @endif
                                                            <p class="fs--1 mb-0 text-gray mt-2">
                                                                {{ $historyPenunjangProfesi->detail_kegiatan }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif (count($historyPenunjangProfesi->historyDokumenPenunjangProfesis) <= 0 &&
                                                isset($historyPenunjangProfesi->detail_kegiatan))
                                                <div class="col-lg-12">
                                                    <div class="timeline-item-content">
                                                        <div class="timeline-item-card">
                                                            <p class="fs--1 mb-0 text-gray">
                                                                {{ $laporanKegiatanPenunjangProfesi->detail_kegiatan }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if (isset($historyPenunjangProfesi?->catatan))
                                                <div class="col-lg-12">
                                                    <div class="timeline-item-content">
                                                        <div class="timeline-item-card">
                                                            <p class="fs--1 mb-0 text-gray">
                                                                {{ $historyPenunjangProfesi->catatan }}</p>
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
                    <div class="text-end mb-4 mt-0">
                        <button type="button" class="btn btn-danger btn-sm px-5" data-bs-dismiss="modal">Batal</button>
                        <button type="button" data-laporan="{{ $laporanKegiatanPenunjangProfesi->id }}"
                            class="btn btn-blue btn-sm px-5 revisi-kegiatan">
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
