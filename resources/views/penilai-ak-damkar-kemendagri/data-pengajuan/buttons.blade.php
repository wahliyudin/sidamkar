<div class="d-flex align-items-center">
    <buttun class="btn {{ in_array($row->status_mekanisme, [2, 3, 4]) ? 'btn-blue' : 'btn-green' }} text-sm me-1"
        data-bs-toggle="modal" data-bs-target="#mekanisme{{ $row->user_id }}">
        Mekanisme</buttun>
    <a href="{{ route('penilai-ak-damkar-kemendagri.data-pengajuan.show', $row->user_id) }}"
        {{ $row->status_mekanisme != 3 ? 'disabled' : '' }} class="btn btn-blue btn-sm">Detail</a>
    <div class="modal fade" id="mekanisme{{ $row->user_id }}" data-bs-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="mekanismeTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body px-4 pb-0 pt-4">
                    <h5 class="text-center">Verifikasi Mekanisme Pengangkatan</h5>
                    <div class="pt-2 pb-3">
                        <div class="form-group">
                            <label>Mekanisme Pengangkatan</label>
                            <input type="text" value="{{ $row?->mekanisme }}" disabled class="form-control"
                                placeholder="">
                        </div>
                        <div class="form-group">
                            <label>Nilai</label>
                            <input type="number" value="{{ $row?->angka_mekanisme }}" disabled class="form-control"
                                placeholder="">
                        </div>
                        <div class="d-flex wrapper-btn justify-content-end align-items-center mt-0 pb-2">
                            <button type="button" class="btn btn-danger btn-sm px-4"
                                data-bs-dismiss="modal">Tutup</button>
                            @if ($row->status_mekanisme == 1)
                                <button type="button" data-id="{{ $row->user_id }}"
                                    class="btn btn-black px-4 btn-sm tolak ms-2">
                                    <img class="spin" src="{{ asset('assets/images/template/spinner.gif') }}"
                                        style="height: 25px; object-fit: cover;display: none;" alt=""
                                        srcset="">
                                    <span>Tolak</span>
                                </button>
                                <button type="button" data-id="{{ $row->user_id }}"
                                    class="btn btn-red-dark px-4 btn-sm revisi ms-2">
                                    <img class="spin" src="{{ asset('assets/images/template/spinner.gif') }}"
                                        style="height: 25px; object-fit: cover;display: none;" alt=""
                                        srcset="">
                                    <span>Revisi</span>
                                </button>
                                <button type="button" data-id="{{ $row->user_id }}"
                                    class="btn btn-green-dark px-4 btn-sm verifikasi ms-2">
                                    <img class="spin" src="{{ asset('assets/images/template/spinner.gif') }}"
                                        style="height: 25px; object-fit: cover;display: none;" alt=""
                                        srcset="">
                                    <span>Verifikasi</span>
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
