<div class="modal fade" id="riwayatKegiatan{{ $rencanaButirKegiatan->id }}" tabindex="-1" role="dialog"
    aria-labelledby="riwayatKegiatanTitle" aria-hidden="true">
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
                                    @foreach ($rencanaButirKegiatan->laporanKegiatanJabatan->dokumenKegiatanPokoks as $dokumenKegiatanPokok)
                                        <img src="{{ $dokumenKegiatanPokok->file }}"
                                            style="width: 100%; max-height: 400px; object-fit: contain; border-radius: 10px; overflow: hidden;"
                                            alt="">
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <label>Detail Kegiatan</label>
                                    <textarea class="form-control" readonly name="keterangan" rows="3">{{ $rencanaButirKegiatan->laporanKegiatanJabatan->detail_kegiatan }}</textarea>
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
                                    <button class="btn btn-yellow px-3 btn-sm text-sm">Prosess</button>
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
                                                <i class="fa-solid fa-paper-plane"></i>
                                            </div>
                                        @break

                                        @case(6)
                                            <div class="timeline-icon icon-item icon-item-lg border-300">
                                                <i class="text-gray fa-solid fa-keyboard"></i>
                                            </div>
                                        @break
                                    @endswitch
                                    <div class="row">
                                        <div class="col-lg-12 timeline-item-time">
                                            <div>
                                                <p class="fs--1 mb-0 fw-semi-bold text-600">
                                                    {{ $historyButirKegiatan->keterangan }}
                                                </p>
                                                <p class="fs--2 text-600">
                                                    {{ $historyButirKegiatan->created_at->format('H:i:s') }} WIB,
                                                    {{ $historyButirKegiatan->created_at->format('d F Y') }}
                                                </p>
                                            </div>
                                        </div>
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
            </div>
        </div>
    </div>
</div>
