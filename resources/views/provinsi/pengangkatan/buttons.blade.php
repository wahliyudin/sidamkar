<div class="d-flex align-items-cen">
    <button class="btn btn-dark-reverse me-2 tolak">
        <i class="fas fa-xmark"></i>
    </button>
    <button class="btn btn-green-reverse me-2" data-bs-toggle="modal" data-bs-target="#pengangkatan{{ $row->id }}">
        <i class="fas fa-check"></i>
    </button>
    <div class="modal fade" id="pengangkatan{{ $row->id }}" tabindex="-1" role="dialog"
        aria-labelledby="pengangkatan{{ $row->id }}Title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered" role="document">
            <div class="modal-content relative">
                <div class="bg-spin" style="display: none;">
                    <img class="spin" src="{{ asset('assets/images/template/spinner.gif') }}"
                        style="height: 3rem; object-fit: cover;" alt="" srcset="">
                </div>
                <div class="modal-header">
                    <h6 style="color: red;"><i class="fa-solid fa-bookmark me-2" style="font-size: 16px;"></i>Kenaikan
                        Pangkat/Jenjang
                        Jabatan
                    </h6>
                </div>
                <div class="modal-body">
                    <div class="text-center swal2-contentwrapper">
                        <h2 class="swal2-title" id="swal2-title">Apakah Anda Yakin?</h2>
                    </div>
                    <div class="form-group">
                        <p class="mt-3">
                            {{ $row->nama }} / {{ $row->jabatan }} / {{ $row->pangkat }} mendapatkan Rekomendasi
                            Kenaikan
                            Pangkat/Jenjang
                            Jabatan Menjadi
                            {{ $jenjangNaik }} / {{ $pangkatNaik }}</p>
                    </div>
                    <div class="note">
                        <p style="color: #898989; font-size: 14px;" class="text-center">*Pastikan sudah dicek kembali
                            dengan baik</p>
                    </div>
                    <div class="text-center mt-4">
                        <button class="btn btn-danger px-5 py-2" data-bs-dismiss="modal"
                            style="text-transform: capitalize; background-color: rgb(136, 136, 136); border: 0 !important;">Batal</button>
                        <button type="button" class="btn btn-blue px-4 verifikasi py-2"
                            style="text-transform: capitalize; border: 0 !important; width: 142px;">
                            <img class="spin" src="{{ asset('assets/images/template/spinner.gif') }}"
                                style="height: 25px; object-fit: cover;display: none;" alt="" srcset="">
                            <span>Ya, Verifikasi</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
