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
                                <div class="d-flex flex-column">
                                    <h6>File Dokumen</h6>
                                    <div class="form-group col-md-12">
                                        <label>File Dokumen</label>
                                        <input type="file" name="doc_kegiatan_tmp[]" multiple
                                            data-max-file-size="2MB" data-max-files="3" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Detail Kegiatan</label>
                                        <textarea class="form-control" name="keterangan" rows="3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore cupiditate odio ea consectetur quia. Perferendis eligendi quisquam exercitationem laudantium minima animi accusantium, autem neque? Facere in voluptatum dicta soluta. Velit.</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">

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
{{-- @section('js')
    <script>
        $(document).ready(function() {
            $.fn.filepond.registerPlugin(FilePondPluginImagePreview);
            $.fn.filepond.registerPlugin(FilePondPluginFileValidateType);
            $.fn.filepond.registerPlugin(FilePondPluginFileValidateSize);
            pond = FilePond.create(document.querySelector('input[name="doc_kegiatan_edit_tmp"]'), {
                chunkUploads: true,
                files: [{
                    // the server file reference
                    source: '',

                    // set type to local to indicate an already uploaded file
                    options: {
                        type: 'local',
                    },
                }]
            });
            pond.setOptions({
                server: {
                    process: '/laporan-kegiatan/jabatan/tmp-file',
                    revert: '/laporan-kegiatan/jabatan/revert',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                },
            });
        });
    </script>
@endsection --}}
