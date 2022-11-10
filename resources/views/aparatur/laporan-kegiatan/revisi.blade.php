<div class="modal fade" id="revisi{{ $rencanaButirKegiatan->id }}" tabindex="-1" role="dialog"
    aria-labelledby="revisiTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body px-4 py-0">
                <form action="" class="form-kegiatan{{ $rencanaButirKegiatan->id }}" method="post">
                    <div class="row">
                        <div class="col-md-6 py-4" style="border-right: 2px solid rgba(0, 0, 0, 0.125);">
                            <div class="d-flex flex-column">
                                <h4>Laporan Kegiatan</h4>
                                <hr>
                                <input type="hidden" name="current_date">
                                <div class="d-flex flex-column">
                                    <h6>File Dokumen</h6>
                                    <div class="form-group col-md-12">
                                        <label>File Dokumen</label>
                                        <input type="file" name="doc_kegiatan_tmp[]" multiple
                                            data-max-file-size="2MB" data-max-files="3" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Detail Kegiatan</label>
                                        <textarea class="form-control" name="keterangan" rows="3">{{ $rencanaButirKegiatan->laporanKegiatanJabatan->detail_kegiatan }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 py-4">
                            <div class="d-flex justify-content-between align-items-center pb-3">
                                <h5 class="text-center mb-0">Riwayat
                                    Laporan
                                    Kegiatan</h5>

                                @switch($rencanaButirKegiatan->laporanKegiatanJabatan->status)
                                    @case(1)
                                        <button class="btn btn-yellow px-3 btn-sm text-sm">Validasi</button>
                                    @break

                                    @case(2)
                                        <button class="btn btn-red px-3 btn-sm text-sm">Revisi</button>
                                    @break

                                    @case(3)
                                        <button class="btn btn-black px-3 btn-sm text-sm">Tolak</button>
                                    @break

                                    @case(4)
                                        <button class="btn btn-green-dark px-3 btn-sm text-sm">Selesai</button>
                                    @break
                                @endswitch
                            </div>
                            <div class="timeline-vertical" data-simplebar
                                style="max-height: 74vh; overflow-y: auto; overflow-x: hidden;">
                                @foreach ($rencanaButirKegiatan->laporanKegiatanJabatan->historyButirKegiatans as $historyButirKegiatan)
                                    <div class="timeline-item">
                                        @switch($historyButirKegiatan->icon)
                                            @case(1)
                                                <div class="timeline-icon icon-item icon-item-lg border-300">
                                                    <i class="text-yellow fa-solid fa-spinner"></i>
                                                </div>
                                            @break

                                            @case(2)
                                                <div class="timeline-icon icon-item icon-item-lg border-300">
                                                    <i class="text-red fa-solid fa-file-pen"></i>
                                                </div>
                                            @break

                                            @case(3)
                                                <div class="timeline-icon icon-item icon-item-lg border-300">
                                                    <i class="text-black fa-solid fa-x"></i>
                                                </div>
                                            @break

                                            @case(4)
                                                <div class="timeline-icon icon-item icon-item-lg border-300">
                                                    <i class="text-green fa-solid fa-check"></i>
                                                </div>
                                            @break

                                            @case(5)
                                                <div class="timeline-icon icon-item icon-item-lg border-300">
                                                    <i class="text-red-terang fa-solid fa-paper-plane"></i>
                                                </div>
                                            @break

                                            @case(6)
                                                <div class="timeline-icon icon-item icon-item-lg border-300">
                                                    <i class="text-red-terang fa-solid fa-keyboard"></i>
                                                </div>
                                            @break
                                        @endswitch
                                        <div class="row">
                                            <div class="col-lg-12 timeline-item-time">
                                                <div>
                                                    @switch($historyButirKegiatan->status)
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
                                                            <span class="btn btn-green py-1 px-3"
                                                                style="font-size: 12px !important;">Selesai</span>
                                                        @break

                                                        @case(5)
                                                            <span class="btn btn-red-terang py-1 px-3"
                                                                style="font-size: 12px !important;">Laporkan</span>
                                                        @break
                                                    @endswitch
                                                    <p class="fs--1 mb-0 fw-semi-bold text-600">
                                                        {{ $historyButirKegiatan->keterangan }}
                                                    </p>
                                                    <p class="fs--2 text-600">
                                                        {{ $historyButirKegiatan->created_at->format('H:i:s') }} WIB,
                                                        {{ $historyButirKegiatan->created_at->format('d F Y') }}
                                                    </p>
                                                </div>
                                            </div>
                                            @if (isset($historyButirKegiatan->dokumenHistoryButirKegiatans) &&
                                                count($historyButirKegiatan->dokumenHistoryButirKegiatans) > 0)
                                                <div class="col-lg-12">
                                                    <div class="timeline-item-content">
                                                        <div class="timeline-item-card">
                                                            @foreach ($historyButirKegiatan->dokumenHistoryButirKegiatans as $dokumenHistoryButirKegiatan)
                                                                <img src="{{ $dokumenHistoryButirKegiatan->file }}"
                                                                    style="width: 48%; max-height: 400px; object-fit: contain; border-radius: 10px; overflow: hidden;"
                                                                    alt="">
                                                            @endforeach
                                                            <p class="fs--1 mb-0 text-gray mt-2">
                                                                {{ $historyButirKegiatan->detail_kegiatan }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if (isset($historyButirKegiatan?->catatan))
                                                <div class="col-lg-12">
                                                    <div class="timeline-item-content">
                                                        <div class="timeline-item-card">
                                                            <p class="fs--1 mb-0 text-gray">
                                                                {{ $historyButirKegiatan->catatan }}</p>
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
                    <div class="text-center my-4">
                        <button class="btn btn-danger px-5" data-bs-dismiss="modal">Batal</button>
                        <button type="button" data-rencana="{{ $rencanaButirKegiatan->id }}"
                            class="btn btn-blue px-5 revisi-kegiatan">
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
