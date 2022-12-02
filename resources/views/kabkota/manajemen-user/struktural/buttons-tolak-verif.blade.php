<div class="d-flex align-items-center">
    @if ($user->status_akun == 2)
        <button class="btn btn-red text-sm px-3" style="width: 102px;"
            onclick="hapus('{{ $user->id }}')">Hapus</button>
    @elseif ($user->status_akun == 1)
        <button class="btn btn-blue text-sm px-3" style="width: 102px;">Edit</button>
        <button class="btn btn-red text-sm px-3 ms-2" style="width: 102px;"
            onclick="hapus('{{ $user->id }}')">Hapus</button>
    @else
        <button class="btn btn-black text-sm px-3" style="width: 102px;"
            onclick="tolak('{{ $user->id }}')">Tolak</button>
        <button class="btn btn-green text-sm px-3 ms-2" style="width: 102px;" data-bs-toggle="modal"
            data-bs-target="#verifikasi{{ $user->id }}">Verfikasi</button>
        <div class="modal fade" id="verifikasi{{ $user->id }}" tabindex="-1" role="dialog"
            aria-labelledby="verifikasiTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-centered" role="document">
                <div class="modal-content relative">
                    <div class="bg-spin" style="display: none;">
                        <img class="spin" src="{{ asset('assets/images/template/spinner.gif') }}"
                            style="height: 3rem; object-fit: cover;" alt="" srcset="">
                    </div>
                    <div class="modal-body">
                        <div class="swal2-icon swal2-warning" style="display: block;">!</div>
                        <div class="text-center swal2-contentwrapper">
                            <h2 class="swal2-title" id="swal2-title">Verifikasi?</h2>
                            <div id="swal2-content" class="swal2-content"
                                style="display: block; font-size: 18px !important;">
                                Silahkan Pilih Jabatan!
                            </div>
                        </div>
                        <form class="form-verifikasi d-flex flex-column ps-5 mt-2">
                            <label>
                                <input type="checkbox" class="form-check-input" name="jabatans[]"
                                    value="atasan_langsung" id="">
                                Atasan Langsung
                            </label>
                            <label class="mt-1">
                                <input type="checkbox" class="form-check-input" name="jabatans[]"
                                    value="penilai_ak_damkar" id="">
                                Penilai Angka Kredit Damkar
                            </label>
                            <label class="mt-1">
                                <input type="checkbox" class="form-check-input" name="jabatans[]"
                                    value="penilai_ak_analis" id="">
                                Penilai Angka Kredit Analis
                            </label>
                            <label class="mt-1">
                                <input type="checkbox" class="form-check-input" name="jabatans[]"
                                    value="penetap_ak_damkar" id="">
                                Penetap Angka Kredit Damkar
                            </label>
                            <label class="mt-1">
                                <input type="checkbox" class="form-check-input" name="jabatans[]"
                                    value="penetap_ak_analis" id="">
                                Penetap Angka Kredit Analis
                            </label>
                        </form>
                        <div class="text-center mt-4">
                            <button class="btn btn-danger px-5 py-2" data-bs-dismiss="modal"
                                style="text-transform: capitalize; background-color: rgb(136, 136, 136); border: 0 !important;">Batal</button>
                            <button type="button" data-user="{{ $user->id }}"
                                class="btn btn-blue px-4 verifikasi py-2"
                                style="text-transform: capitalize; border: 0 !important; width: 142px;">
                                <img class="spin" src="{{ asset('assets/images/template/spinner.gif') }}"
                                    style="height: 25px; object-fit: cover;display: none;" alt=""
                                    srcset="">
                                <span>Ya, Verifikasi</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
