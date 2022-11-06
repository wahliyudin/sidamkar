<div class="modal fade" id="revisi{{ $rencanaButirKegiatan->id }}" tabindex="-1" role="dialog"
    aria-labelledby="revisiTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body px-4">
                <form action="" class="form-kegiatan{{ $rencanaButirKegiatan->id }}" method="post">
                    <div class="row">
                        <div class="col-md-7">
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
                    <div class="text-center mt-4">
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
