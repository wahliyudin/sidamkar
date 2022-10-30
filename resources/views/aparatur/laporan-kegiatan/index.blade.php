@extends('layouts.master')

@section('content')
    <div class="section">
        <div class="row">
            <div class="col-md-4 px-2">
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
            <div class="col-md-4 px-2">
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
            <div class="col-md-4 px-2">
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
                                <h2 style="font-family: 'Roboto'; font-size: 20px; color: #06152B;" class="target">Januari
                                    2022 - Juli 2022</h2>
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
                            <input type="date" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Search</label>
                            <input type="text" placeholder="Search..." class="form-control">
                        </div>
                    </div>
                </div>

                <div class="card-body px-0">
                    @foreach ($rencanas as $rencana)
                        <div class="row">
                            <div class="form-group col-md-4">
                                <input class="form-control" type="text" value="{{ $rencana->nama }}"
                                    name="rencana_kinerja">
                            </div>
                        </div>
                        <div class="card-body accordion-container">
                            <div class="accordion" id="accordion-parent">
                                @foreach ($rencana->rencanaUnsurs as $rencanaUnsur)
                                    <div class="accordion-item">
                                        <div class="d-flex justify-content-between accordion-header py-3 px-2"
                                            id="unsur{{ $rencanaUnsur->id . $rencanaUnsur->unsur->id }}">
                                            <div class="d-flex align-items-center justify-content-between w-100"
                                                style="color: #000000;">
                                                <p class="accordion-title">
                                                    {{ $rencanaUnsur->unsur->nama }}
                                                </p>
                                            </div>
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#contentUnsur{{ $rencanaUnsur->id . $rencanaUnsur->unsur->id }}"
                                                aria-expanded="false"
                                                aria-controls="contentUnsur{{ $rencanaUnsur->id . $rencanaUnsur->unsur->id }}">
                                            </button>
                                        </div>
                                        <div id="contentUnsur{{ $rencanaUnsur->id . $rencanaUnsur->unsur->id }}"
                                            class="accordion-collapse collapse"
                                            aria-labelledby="unsur{{ $rencanaUnsur->id . $rencanaUnsur->unsur->id }}"
                                            style="">
                                            <div class="accordion-body">
                                                <div class="accordion" id="accordion-child">
                                                    @foreach ($rencanaUnsur->rencanaSubUnsurs as $rencanaSubUnsur)
                                                        <div class="accordion-item">
                                                            <div class="d-flex justify-content-between accordion-header py-1 px-1"
                                                                id="subUnsur{{ $rencanaSubUnsur->subUnsur->id }}">
                                                                <div class="d-flex align-items-center"
                                                                    style="color: #000000;">
                                                                    <h6 class="accordian-title">
                                                                        {{ $rencanaSubUnsur->subUnsur->nama }}
                                                                    </h6>
                                                                </div>
                                                                <button class="accordion-button collapsed" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#contentchildSubUnsur{{ $rencanaSubUnsur->subUnsur->id }}"
                                                                    aria-expanded="false"
                                                                    aria-controls="contentchildSubUnsur{{ $rencanaSubUnsur->subUnsur->id }}">
                                                                </button>
                                                            </div>
                                                            <div id="contentchildSubUnsur{{ $rencanaSubUnsur->subUnsur->id }}"
                                                                class="accordion-collapse collapse"
                                                                aria-labelledby="subUnsur{{ $rencanaSubUnsur->subUnsur->id }}"
                                                                style="">
                                                                <div class="accordion-body">
                                                                    <ul class="ms-0">
                                                                        @foreach ($rencanaSubUnsur->rencanaButirKegiatans as $rencanaButirKegiatan)
                                                                            <li class="accordian-list">
                                                                                <div
                                                                                    class="d-flex align-items-center justify-content-between">
                                                                                    <h6 class="accordian-title">
                                                                                        {{ $rencanaButirKegiatan->butirKegiatan->nama }}
                                                                                    </h6>
                                                                                    <div class="d-flex align-items-center">
                                                                                        <button
                                                                                            data-rencana="{{ $rencanaButirKegiatan->id }}"
                                                                                            class="btn btn-purple-reverse ms-3 px-3 tindak-lanjut"
                                                                                            data-bs-toggle="modal"
                                                                                            data-bs-target="#tindakLanjut"
                                                                                            type="button">tindak
                                                                                            lanjut</button>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tindakLanjut" tabindex="-1" role="dialog" aria-labelledby="tindakLanjutTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Laporan Kegiatan Jabatan</h5>
                </div>
                <div class="modal-body">
                    <form class="d-flex flex-column form-kegiatan" enctype="multipart/form-data">
                        <input type="hidden" name="rencana_butir_kegiatan">
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
                            <button type="button" class="btn btn-blue px-5 kirim-kegiatan">
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
        $(function() {
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
            $('.tindak-lanjut').each(function(index, element) {
                $(element).click(function(e) {
                    e.preventDefault();
                    $('input[name="rencana_butir_kegiatan"]').val($(this).data('rencana'));
                });
            });
            $('.kirim-kegiatan').click(function(e) {
                e.preventDefault();
                var postData = new FormData($(".form-kegiatan")[0]);
                $('.kirim-kegiatan span').hide();
                $('.kirim-kegiatan .spin').show();
                $.ajax({
                    type: 'POST',
                    url: "{{ route('laporan-kegiatan.jabatan.store-laporan') }}",
                    processData: false,
                    contentType: false,
                    data: postData,
                    success: function(response) {
                        $('.kirim-kegiatan span').show();
                        $('.kirim-kegiatan .spin').hide();
                        if (response.status == 200) {
                            swal("Selesai!", response.message, "success").then(() => {
                                location.reload();
                            });
                        } else {
                            swal("Error!", response.message, "error");
                        }
                    },
                    error: function(err) {
                        $('.kirim-kegiatan span').show();
                        $('.kirim-kegiatan .spin').hide();
                    }
                });
            });
            $("#tindakLanjut").on('hide.bs.modal', function() {
                pond.removeFiles();
            });
        });
    </script>
@endsection
