<div class="modal fade" id="riwayatKegiatan{{ $rencanaButirKegiatan->id }}" tabindex="-1" role="dialog"
    aria-labelledby="riwayatKegiatanTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body px-4">
                <div class="row">
                    <div class="col-md-7">
                        <div class="d-flex flex-column">
                            <h4>Laporan Kegiatan</h4>
                            <hr>
                            <div class="d-flex flex-column">
                                <h6>File Dokumen</h6>
                                <div class="d-flex flex-wrap gap-3 justify-content-center">
                                    @foreach ($rencanaButirKegiatan->laporanKegiatanJabatan->dokumenKegiatanPokoks as $dokumenKegiatanPokok)
                                        <img src="{{ $dokumenKegiatanPokok->file }}"
                                            style="max-width: 300px; max-height: 400px; object-fit: contain; border-radius: 10px; overflow: hidden;"
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
                    <div class="col-md-5">
                        <h4>Riwayat Laporan Kegiatan</h4>
                        <hr>
                        <div class="history">
                            @foreach ($rencanaButirKegiatan->historyButirKegiatans as $historyButirKegiatan)
                                <div class="history-item">
                                    <span
                                        class="history-item-date">{{ $historyButirKegiatan->created_at->format('d-m-Y') }}</span>
                                    <div class="history-item-wrapper">
                                        <div class="point-wrapper">
                                            <span class="point"></span>
                                        </div>
                                        <p>{{ $historyButirKegiatan->keterangan }}</p>
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
