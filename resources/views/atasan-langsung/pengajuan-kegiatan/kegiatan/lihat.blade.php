<div class="modal fade" id="lihat{{ $rencanaButirKegiatan->id }}" tabindex="-1" role="dialog" aria-labelledby="lihatTitle"
    aria-hidden="true">
    <div class="modal-dialog {{ count($rencanaButirKegiatan->dokumenKegiatanPokoks) >= 1 ? 'modal-lg' : '' }} modal-dialog-centered modal-dialog-centered"
        role="document">
        <div class="modal-content">
            <div class="modal-body px-4">
                @if (count($rencanaButirKegiatan->dokumenKegiatanPokoks) >= 1)
                    <div class="row">
                        <div class="col-md-12">
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
                                        <textarea class="form-control catatan" name="" rows="3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore cupiditate odio ea consectetur quia. Perferendis eligendi quisquam exercitationem laudantium minima animi accusantium, autem neque? Facere in voluptatum dicta soluta. Velit.</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex wrapper-btn justify-content-end align-items-center mt-4">
                        <button type="button" data-id="{{ $rencanaButirKegiatan->id }}"
                            class="btn btn-red px-4 btn-sm tolak-kegiatan ms-2">
                            <img class="spin" src="{{ asset('assets/images/template/spinner.gif') }}"
                                style="height: 25px; object-fit: cover;display: none;" alt="" srcset="">
                            <span>Tolak</span>
                        </button>
                        <button type="button" data-id="{{ $rencanaButirKegiatan->id }}"
                            class="btn btn-gray px-4 revisi-kegiatan ms-2">
                            <img class="spin" src="{{ asset('assets/images/template/spinner.gif') }}"
                                style="height: 25px; object-fit: cover;display: none;" alt="" srcset="">
                            <span>Revisi</span>
                        </button>
                        <button type="button" data-id="{{ $rencanaButirKegiatan->id }}"
                            class="btn btn-blue px-4 btn-sm verifikasi-kegiatan ms-2">
                            <img class="spin" src="{{ asset('assets/images/template/spinner.gif') }}"
                                style="height: 25px; object-fit: cover;display: none;" alt="" srcset="">
                            <span>Verifikasi</span>
                        </button>
                    </div>
                @else
                    <div class="d-flex justify-content-center align-items-center py-4">
                        <h3 style="color: #000000;">Belum ada laporan</h3>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
