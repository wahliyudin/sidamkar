@extends('layouts.master')

@section('content')
    <div class="section">
        <div class="row">
            <div class="col-md-3 px-2">
                <div class="card">
                    <div class="card-body py-3 px-3" style="height: 100px;">
                        <div class="d-flex align-items-center h-100">
                            <div class="circle circle-blue">
                                <i class="fa-solid fa-copy"></i>
                            </div>
                            <div class="d-flex flex-column ms-2">
                                <p style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                    Angka Kredit Minimal
                                </p>
                                <h2 style="font-family: 'Roboto';color: #06152B;" class="target">100</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 px-2">
                <div class="card">
                    <div class="card-body py-3 px-3" style="height: 100px;">
                        <div class="d-flex align-items-center h-100">
                            <div class="circle circle-purple">
                                <i class="fa-solid fa-copy"></i>
                            </div>
                            <div class="d-flex flex-column ms-2">
                                <p style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                    Angka Kredit diterima
                                </p>
                                <h2 style="font-family: 'Roboto';color: #06152B;" class="target">100</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 px-2">
                <div class="card">
                    <div class="card-body py-3 px-3" style="height: 100px;">
                        <div class="d-flex align-items-center h-100">
                            <div class="circle circle-green">
                                <i class="fa-solid
                                fa-stopwatch"></i>
                            </div>
                            <div class="d-flex flex-column ms-2">
                                <p style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                    Periode
                                </p>
                                <h2 style="font-family: 'Roboto'; font-size: 20px; color: #06152B;" class="target">
                                    {{ Carbon\Carbon::make($periode->awal)->translatedFormat('F Y') . ' - ' . Carbon\Carbon::make($periode->akhir)->translatedFormat('F Y') }}
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h3>Kegiatan Jabatan</h3>
                    </div>
                    <hr>
                    <div class="row align-items-center justify-content-between">
                        <div class="form-group col-md-2">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" value="{{ now()->format('Y-m-d') }}"
                                max="{{ Carbon\Carbon::make($periode->akhir)->format('Y-m-d') }}"
                                min="{{ Carbon\Carbon::make($periode->awal)->format('Y-m-d') }}" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Search</label>
                            <input type="text" name="search" placeholder="Search..." class="form-control">
                        </div>
                    </div>
                </div>

                <div class="card-body px-0 rencana-container">

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="laporkan" tabindex="-1" role="dialog" aria-labelledby="laporkanTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Laporan Kegiatan Jabatan</h5>
                </div>
                <div class="modal-body">
                    <form class="d-flex flex-column form-kegiatan" enctype="multipart/form-data">
                        <input type="hidden" name="rencana_butir_kegiatan">
                        <input type="hidden" name="current_date">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>File Dokumen</label>
                                <input type="file" name="doc_kegiatan_tmp[]" multiple data-max-file-size="2MB"
                                    data-max-files="3" required />
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Detail Kegiatan</label>
                                <textarea name="keterangan" id="" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button class="btn btn-danger px-5" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-blue px-5 simpan-kegiatan">
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
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/extensions/toastify-js/src/toastify.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/filepond/filepond.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/filepond.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/choices.js/public/assets/styles/choices.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/shared/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/kemendagri.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/aparatur/kegiatan.css') }}">
@endsection
@section('js')
    <script src="{{ asset('assets/js/auth/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-element-select.js') }}"></script>
    <script src="{{ asset('assets/extensions/toastify-js/src/toastify.js') }}"></script>
    <script src="{{ asset('assets/extensions/filepond/filepond.js') }}"></script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}">
    </script>
    <script
        src="{{ asset('assets/extensions/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.js') }}">
    </script>
    <script src="{{ asset('assets/extensions/filepond/filepond.jquery.js') }}"></script>
    <script
        src="{{ asset('assets/extensions/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.js') }}">
    </script>
    <script src="{{ asset('assets/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $.fn.filepond.registerPlugin(FilePondPluginImagePreview);
            $.fn.filepond.registerPlugin(FilePondPluginFileValidateType);
            $.fn.filepond.registerPlugin(FilePondPluginFileValidateSize);
            pond = FilePond.create(document.querySelector('input[type="file"]'), {
                chunkUploads: true
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
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('click', '.laporkan', function(e) {
                e.preventDefault();
                $('input[name="rencana_butir_kegiatan"]').val($(this).data('rencana'));
                $('input[name="current_date"]').val($('input[name="tanggal"]').val());
            });

            $('.simpan-kegiatan').click(function(e) {
                e.preventDefault();
                var postData = new FormData($(".form-kegiatan")[0]);
                $('.simpan-kegiatan span').hide();
                $('.simpan-kegiatan .spin').show();
                // $.ajax({
                //     xhr: function() {
                //         var xhr = new window.XMLHttpRequest();

                //         // Upload progress
                //         xhr.upload.addEventListener("progress", function(evt) {
                //             if (evt.lengthComputable) {
                //                 var percentComplete = evt.loaded / evt.total;
                //                 //Do something with upload progress
                //                 console.log(percentComplete);
                //             }
                //         }, false);

                //         // Download progress
                //         xhr.addEventListener("progress", function(evt) {
                //             if (evt.lengthComputable) {
                //                 var percentComplete = evt.loaded / evt.total;
                //                 // Do something with download progress
                //                 console.log(percentComplete);
                //             }
                //         }, false);

                //         return xhr;
                //     },
                //     type: 'POST',
                //     url: "{{ route('laporan-kegiatan.jabatan.store-laporan') }}",
                //     processData: false,
                //     contentType: false,
                //     data: postData,
                //     success: function(data) {
                //         $('.simpan-kegiatan span').show();
                //         $('.simpan-kegiatan .spin').hide();
                //         if (response.status == 200) {
                //             swal("Selesai!", response.message, "success").then(() => {
                //                 location.reload();
                //             });
                //         } else {
                //             swal("Error!", response.message, "error");
                //         }
                //     },
                //     error: ajaxError
                // });
                $.ajax({
                    type: 'POST',
                    url: "{{ route('laporan-kegiatan.jabatan.store-laporan') }}",
                    processData: false,
                    contentType: false,
                    data: postData,
                    success: function(response) {
                        $('.simpan-kegiatan span').show();
                        $('.simpan-kegiatan .spin').hide();
                        if (response.status == 200) {
                            swal("Selesai!", response.message, "success").then(() => {
                                location.reload();
                            });
                        } else {
                            swal("Error!", response.message, "error");
                        }
                    },
                    error: ajaxError
                });
            });
            $("#laporkan").on('hide.bs.modal', function() {
                pond.removeFiles();
            });
            $("#laporkan").on('hide.bs.modal', function() {
                pond.removeFiles();
            });
            $(document).on('click', '.btn-revisi', function(e) {
                e.preventDefault();
                pondEdit = FilePond.create(document.querySelector(
                    'input[name="doc_kegiatan_tmp[]"]'), {
                    chunkUploads: true
                });
                pondEdit.setOptions({
                    server: {
                        process: '/laporan-kegiatan/jabatan/tmp-file',
                        revert: '/laporan-kegiatan/jabatan/revert',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                'content')
                        }
                    },
                });
                $('input[name="current_date"]').val($('input[name="tanggal"]').val());
                $('#revisi' + $(this).data('rencana')).modal('show');
                $.ajax({
                    type: "POST",
                    url: url("/laporan-kegiatan/jabatan/" + $(this).data('rencana') + "/" + $(
                        'input[name="tanggal"]').val() + "/edit"),
                    dataType: "json",
                    success: function(response) {
                        pondEdit.removeFile();
                        response.data.laporan_kegiatan_jabatan.dokumen_kegiatan_pokoks.forEach((
                            element,
                            i) => {
                            pondEdit.addFile(element.file, {
                                index: i
                            });
                        });
                    }
                });
            });

            $(document).on('click', '.revisi-kegiatan', function(e) {
                e.preventDefault();
                var postData = new FormData($(".form-kegiatan" + $(this).data('rencana'))[
                    0]);
                $('.revisi-kegiatan span').hide();
                $('.revisi-kegiatan .spin').show();
                $.ajax({
                    type: 'POST',
                    url: url("/laporan-kegiatan/jabatan/" + $(this).data('rencana') +
                        "/update"),
                    processData: false,
                    contentType: false,
                    data: postData,
                    success: function(response) {
                        $('.revisi-kegiatan span').show();
                        $('.revisi-kegiatan .spin').hide();
                        if (response.status == 200) {
                            swal("Selesai!", response.message, "success").then(
                                () => {
                                    location.reload();
                                });
                        } else {
                            swal("Error!", response.message, "error");
                        }
                    },
                    error: ajaxError
                });
            });

            var ajaxError = function(jqXHR, xhr, textStatus, errorThrow, exception) {
                if (jqXHR.status === 0) {
                    swal("Error!", 'Not connect.\n Verify Network.', "error");
                    $('.simpan-kegiatan span').show();
                    $('.simpan-kegiatan .spin').hide();
                } else if (jqXHR.status == 400) {
                    swal("Peringatan!", jqXHR['responseJSON'].message, "warning");
                    $('.simpan-kegiatan span').show();
                    $('.simpan-kegiatan .spin').hide();
                } else if (jqXHR.status == 404) {
                    swal('Error!', 'Requested page not found. [404]', "error");
                    $('.simpan-kegiatan span').show();
                    $('.simpan-kegiatan .spin').hide();
                } else if (jqXHR.status == 500) {
                    swal('Error!', 'Internal Server Error [500].' + jqXHR['responseJSON'].message, "error");
                    $('.simpan-kegiatan span').show();
                    $('.simpan-kegiatan .spin').hide();
                } else if (exception === 'parsererror') {
                    swal('Error!', 'Requested JSON parse failed.', "error");
                    $('.simpan-kegiatan span').show();
                    $('.simpan-kegiatan .spin').hide();
                } else if (exception === 'timeout') {
                    swal('Error!', 'Time out error.', "error");
                    $('.simpan-kegiatan span').show();
                    $('.simpan-kegiatan .spin').hide();
                } else if (exception === 'abort') {
                    swal('Error!', 'Ajax request aborted.', "error");
                    $('.simpan-kegiatan span').show();
                    $('.simpan-kegiatan .spin').hide();
                } else if (jqXHR.status == 422) {
                    swal('Warning!', JSON.parse(jqXHR.responseText).message, "warning");
                    $('.simpan-kegiatan span').show();
                    $('.simpan-kegiatan .spin').hide();
                } else {
                    swal('Error!', jqXHR.responseText, "error");
                    $('.simpan-kegiatan span').show();
                    $('.simpan-kegiatan .spin').hide();
                }
            };
        });
    </script>
    <script src="{{ asset('assets/js/pages/aparatur/laporan-kegiatan.js') }}"></script>
@endsection
