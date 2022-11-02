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
                                    @foreach ($rencanaButirKegiatan->dokumenKegiatanPokoks as $dokumenKegiatanPokok)
                                        <img src="{{ $dokumenKegiatanPokok->file }}"
                                            style="max-width: 300px; max-height: 400px; object-fit: contain; border-radius: 10px; overflow: hidden;"
                                            alt="">
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <label>Detail Kegiatan</label>
                                    <textarea class="form-control" name="" rows="3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore cupiditate odio ea consectetur quia. Perferendis eligendi quisquam exercitationem laudantium minima animi accusantium, autem neque? Facere in voluptatum dicta soluta. Velit.</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
