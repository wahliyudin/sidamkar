<div class="d-flex align-items-center">
    <button class="btn btn-red text-sm px-3" data-bs-toggle="modal"
        data-bs-target="#rejectModal-{{ $user->id }}">Tolak</button>
    <div class="modal fade" id="rejectModal-{{ $user->id }}" tabindex="-1" role="dialog"
        aria-labelledby="rejectModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rejectModalTitle">
                        Peringatan
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="{{ $route }}" method="post">
                    <div class="modal-body">
                        <p>
                            Apakah anda yakin tolak akun ini?
                        </p>
                        <input type="hidden" name="_token" value="'.csrf_token().'">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger text-sm" data-bs-dismiss="modal">
                            <i class="bx bx-x"></i>
                            <span>Batal</span>
                        </button>

                        <button type="submit" class="btn btn-green text-sm ml-1">
                            <i class="bx bx-check"></i>
                            <span>Ya, yakin</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <button class="btn btn-green text-sm px-3 ms-2" data-bs-toggle="modal"
        data-bs-target="#verifModal-{{ $user->id }}">Verifikasi</button>
    <div class="modal fade" id="verifModal-{{ $user->id }}" tabindex="-1" role="dialog"
        aria-labelledby="verifModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verifModalTitle">
                        Peringatan
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        Apakah anda yakin memperifikasi akun ini?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger text-sm" data-bs-dismiss="modal">
                        <i class="bx bx-x"></i>
                        <span>Batal</span>
                    </button>
                    <form action="{{ $route }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-green text-sm ml-1">
                            <i class="bx bx-check"></i>
                            <span>Ya, yakin</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
