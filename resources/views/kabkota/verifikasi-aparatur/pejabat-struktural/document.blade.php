<div class="modal fade" id="fileSK{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="fileSKTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fileSKTitle">
                    File SK
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <iframe src="{{ $user->userPejabatStruktural?->file_sk }}"
                    style="border-radius: 10px; overflow: hidden;" width="100%" height="500px"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                    <span>Tutup</span>
                </button>
            </div>
        </div>
    </div>
</div>
