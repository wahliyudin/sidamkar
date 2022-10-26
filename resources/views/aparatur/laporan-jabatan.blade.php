@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="row">
            <div class="card">
                <div class="row justify-content-evenly mt-4">
                    <div class="col-md-3 col-6 py-2">
                        <div class="d-flex align-items-center">
                            <button class="btn btn-purple-reverse ms-3 px-3 text-sm" type="button">tindak
                                lanjut</button>
                            <span class="text-xl mx-2">:</span>
                            <span class="text-xl">1</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 py-2">
                        <div class="d-flex align-items-center">
                            <button class="btn btn-yellow-reverse btn-status ms-3 px-3 text-sm"
                                type="button">diproses</button>
                            <span class="text-xl mx-2">:</span>
                            <span class="text-xl">1</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 py-2">
                        <div class="d-flex align-items-center">
                            <button class="btn btn-red-reverse btn-status ms-3 px-3 text-sm" type="button">revisi</button>
                            <span class="text-xl mx-2">:</span>
                            <span class="text-xl">1</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 py-2">
                        <div class="d-flex align-items-center">
                            <button class="btn btn-green-reverse btn-status ms-3 px-3 text-sm"
                                type="button">selesai</button>
                            <span class="text-xl mx-2">:</span>
                            <span class="text-xl">12</span>
                        </div>
                    </div>
                </div>
                <div class="card-header">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Tanggal Kegiatan</label>
                                <input type="date" placeholder="Search..." class="form-control"
                                    style="width: 50% !important;">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Search</label>
                                <input type="text" placeholder="Search..." class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="">
                        <div class="timeline">
                            <div class="title-timeline">
                                <label class="title-wrapper">
                                    <span class="check check-success">
                                        <i class="fa-solid fa-check"></i>
                                    </span>
                                    <p>Kesiapsiagaan petugas pemadam kebakaran dan penyelamatan;</p>
                                </label>
                            </div>
                            <div class="area-timeline">
                                <div class="area-wrapper">
                                    <label style=" cursor: pointer;">
                                        <input type="checkbox" checked id="checkbox1" class="form-check-input">
                                        <p>Apel pagi sebagai peserta dan serah terima tugas jaga;</p>
                                    </label>
                                    <div class="d-flex align-items-center btn-wrapper">
                                        <button class="btn btn-purple-reverse ms-3 px-3" data-bs-toggle="modal"
                                            data-bs-target="#tindakLanjut" type="button">tindak lanjut</button>
                                    </div>
                                </div>
                                <div class="area-wrapper">
                                    <label style=" cursor: pointer;">
                                        <span class="check check-warning">
                                            <i class="fa-solid fa-spinner"></i>
                                        </span>
                                        <p>Tugas piket jaga;</p>
                                    </label>
                                    <div class="d-flex align-items-center btn-wrapper">
                                        <button class="btn btn-yellow-reverse btn-status ms-3 px-3" data-bs-toggle="modal"
                                            data-bs-target="#riwayat" type="button">diproses</button>
                                    </div>
                                </div>
                                <div class="area-wrapper">
                                    <label style=" cursor: pointer;">
                                        <span class="check check-danger">
                                            <i class="fa-solid fa-xmark"></i>
                                        </span>
                                        <p>Apel malam sebagai peserta;</p>
                                    </label>
                                    <div class="d-flex align-items-center btn-wrapper">
                                        <button class="btn btn-red-reverse btn-status ms-3 px-3" data-bs-toggle="modal"
                                            data-bs-target="#revisi" type="button">revisi</button>
                                    </div>
                                </div>
                                <div class="area-wrapper">
                                    <label style=" cursor: pointer;">
                                        <span class="check check-success">
                                            <i class="fa-solid fa-check"></i>
                                        </span>
                                        <p>kegiatan rutin latihan ketrampilan;</p>
                                    </label>
                                    <div class="d-flex align-items-center btn-wrapper">
                                        <button class="btn btn-green-reverse btn-status ms-3 px-3" data-bs-toggle="modal"
                                            data-bs-target="#riwayat" type="button">selesai</button>
                                    </div>
                                </div>
                            </div>

                            <div class="title-timeline">
                                <label class="title-wrapper">
                                    <span class="check check-success">
                                        <i class="fa-solid fa-check"></i>
                                    </span>
                                    <p>Pelaksanaan prosedur pelaporan informasi kejadian kebakaran;</p>
                                </label>
                            </div>
                            <div class="area-timeline">
                                <div class="area-wrapper">
                                    <label style=" cursor: pointer;">
                                        <span class="check check-success">
                                            <i class="fa-solid fa-check"></i>
                                        </span>
                                        <p>Informasi kejadian kebakaran; dan</p>
                                    </label>
                                    <div class="d-flex align-items-center btn-wrapper">
                                        <button class="btn btn-green-reverse btn-status ms-3 px-3" data-bs-toggle="modal"
                                            data-bs-target="#riwayat" type="button">selesai</button>
                                    </div>
                                </div>
                                <div class="area-wrapper">
                                    <label style=" cursor: pointer;">
                                        <span class="check check-success">
                                            <i class="fa-solid fa-check"></i>
                                        </span>
                                        <p>koordinasi dengan Kepala Regu terkait informasi kejadian kebakaran;
                                        </p>
                                    </label>
                                    <div class="d-flex align-items-center btn-wrapper">
                                        <button class="btn btn-green-reverse btn-status ms-3 px-3" data-bs-toggle="modal"
                                            data-bs-target="#riwayat" type="button">selesai</button>
                                    </div>
                                </div>
                            </div>

                            <div class="title-timeline">
                                <label class="title-wrapper">
                                    <span class="check check-success">
                                        <i class="fa-solid fa-check"></i>
                                    </span>
                                    <p>Pelaksanaan operasional pemadaman kebakaran;</p>
                                </label>
                            </div>
                            <div class="area-timeline">
                                <div class="area-wrapper">
                                    <label style=" cursor: pointer;">
                                        <span class="check check-success">
                                            <i class="fa-solid fa-check"></i>
                                        </span>
                                        <p>Informasi kejadian kebakaran; dan</p>
                                    </label>
                                    <div class="d-flex align-items-center btn-wrapper">
                                        <button class="btn btn-green-reverse btn-status ms-3 px-3" data-bs-toggle="modal"
                                            data-bs-target="#riwayat" type="button">selesai</button>
                                    </div>
                                </div>
                                <div class="area-wrapper">
                                    <label style=" cursor: pointer;">
                                        <span class="check check-success">
                                            <i class="fa-solid fa-check"></i>
                                        </span>
                                        <p>Keberangkatan menuju tempat kejadian kebakaran;</p>
                                    </label>
                                    <div class="d-flex align-items-center btn-wrapper">
                                        <button class="btn btn-green-reverse btn-status ms-3 px-3" data-bs-toggle="modal"
                                            data-bs-target="#riwayat" type="button">selesai</button>
                                    </div>
                                </div>
                                <div class="area-wrapper">
                                    <label style=" cursor: pointer;">
                                        <span class="check check-success">
                                            <i class="fa-solid fa-check"></i>
                                        </span>
                                        <p>Pemadaman kebakaran;</p>
                                    </label>
                                    <div class="d-flex align-items-center btn-wrapper">
                                        <button class="btn btn-green-reverse btn-status ms-3 px-3" data-bs-toggle="modal"
                                            data-bs-target="#riwayat" type="button">selesai</button>
                                    </div>
                                </div>
                                <div class="area-wrapper">
                                    <label style=" cursor: pointer;">
                                        <span class="check check-success">
                                            <i class="fa-solid fa-check"></i>
                                        </span>
                                        <p>Proses pendinginan;</p>
                                    </label>
                                    <div class="d-flex align-items-center btn-wrapper">
                                        <button class="btn btn-green-reverse btn-status ms-3 px-3" data-bs-toggle="modal"
                                            data-bs-target="#riwayat" type="button">selesai</button>
                                    </div>
                                </div>
                                <div class="area-wrapper">
                                    <label style=" cursor: pointer;">
                                        <span class="check check-success">
                                            <i class="fa-solid fa-check"></i>
                                        </span>
                                        <p>persiapan kembali ke pos pemadam kebakaran dan
                                            penyelamatan;</p>
                                    </label>
                                    <div class="d-flex align-items-center btn-wrapper">
                                        <button class="btn btn-green-reverse btn-status ms-3 px-3" data-bs-toggle="modal"
                                            data-bs-target="#riwayat" type="button">selesai</button>
                                    </div>
                                </div>
                            </div>

                            <div class="title-timeline">
                                <label class="title-wrapper">
                                    <span class="check check-success">
                                        <i class="fa-solid fa-check"></i>
                                    </span>
                                    <p>Pelaksanaan prosedur pelaporan informasi kejadian
                                        evakuasi dan penyelamatan;</p>
                                </label>
                            </div>
                            <div class="area-timeline">
                                <div class="area-wrapper">
                                    <label style=" cursor: pointer;">
                                        <span class="check check-success">
                                            <i class="fa-solid fa-check"></i>
                                        </span>
                                        <p>Informasi kejadian evakuasi dan penyelamatan;
                                        </p>
                                    </label>
                                    <div class="d-flex align-items-center btn-wrapper">
                                        <button class="btn btn-green-reverse btn-status ms-3 px-3" data-bs-toggle="modal"
                                            data-bs-target="#riwayat" type="button">selesai</button>
                                    </div>
                                </div>
                                <div class="area-wrapper">
                                    <label style=" cursor: pointer;">
                                        <span class="check check-success">
                                            <i class="fa-solid fa-check"></i>
                                        </span>
                                        <p>Koordinasi dengan Kepala Regu terkait
                                            informasi kejadian evakuasi dan
                                            penyelamatan;</p>
                                    </label>
                                    <div class="d-flex align-items-center btn-wrapper">
                                        <button class="btn btn-green-reverse btn-status ms-3 px-3" data-bs-toggle="modal"
                                            data-bs-target="#riwayat" type="button">selesai</button>
                                    </div>
                                </div>
                                <div class="area-wrapper">
                                    <label style=" cursor: pointer;">
                                        <span class="check check-success">
                                            <i class="fa-solid fa-check"></i>
                                        </span>
                                        <p>evakuasi dan penyelamatan; dan</p>
                                    </label>
                                    <div class="d-flex align-items-center btn-wrapper">
                                        <button class="btn btn-green-reverse btn-status ms-3 px-3" data-bs-toggle="modal"
                                            data-bs-target="#riwayat" type="button">selesai</button>
                                    </div>
                                </div>
                                <div class="area-wrapper">
                                    <label style=" cursor: pointer;">
                                        <span class="check check-success">
                                            <i class="fa-solid fa-check"></i>
                                        </span>
                                        <p>melaporkan kejadian evakuasi dan
                                            penyelamatan;</p>
                                    </label>
                                    <div class="d-flex align-items-center btn-wrapper">
                                        <button class="btn btn-green-reverse btn-status ms-3 px-3" data-bs-toggle="modal"
                                            data-bs-target="#riwayat" type="button">selesai</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
    <div class="modal fade" id="tindakLanjut" tabindex="-1" role="dialog" aria-labelledby="tindakLanjutTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="d-flex flex-column">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Files</label>
                                    <input type="file" class="with-validation-files" required multiple
                                        data-max-file-size="1MB" data-max-files="3">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Gambar Kegiatan</label>
                                    <input type="file" class="with-validation-images" required multiple
                                        data-max-file-size="1MB" data-max-files="3">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Detail Kegiatan</label>
                                    <textarea name="" id="" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button class="btn btn-danger px-5" data-bs-dismiss="modal">Batal</button>
                            <a class="btn btn-blue px-5" href="{{ route('laporan-kegiatan') }}">Kirim</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="riwayat" tabindex="-1" role="dialog" aria-labelledby="riwayatTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="d-flex flex-column">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Files</label>
                                    <input type="file" class="with-validation-files" required multiple
                                        data-max-file-size="1MB" data-max-files="3">
                                </div>
                                <div class="form-group">
                                    <label for="">Gambar Kegiatan</label>
                                    <input type="file" class="with-validation-images" required multiple
                                        data-max-file-size="1MB" data-max-files="3">
                                </div>
                                <div class="form-group">
                                    <label for="">Detail Kegiatan</label>
                                    <textarea name="" id="" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5 style="font-size: 16px !important; color: black;">Riwayat Laporan kegiatan Agus
                                    Syamsudin</h5>

                                <div class="history">
                                    <div class="history-item">
                                        <span class="history-item-date">07-08-2022</span>
                                        <div class="history-item-wrapper">
                                            <div class="point-wrapper">
                                                <span class="point"></span>
                                            </div>
                                            <p>Input Laporan Kegiatan</p>
                                        </div>
                                    </div>
                                    <div class="history-item">
                                        <span class="history-item-date">07-08-2022</span>
                                        <div class="history-item-wrapper">
                                            <div class="point-wrapper">
                                                <span class="point"></span>
                                            </div>
                                            <p>Laporan kegiatan di terima Pejabat Struktural</p>
                                        </div>
                                    </div>
                                    <div class="history-item">
                                        <span class="history-item-date">07-08-2022</span>
                                        <div class="history-item-wrapper">
                                            <div class="point-wrapper">
                                                <span class="point"></span>
                                            </div>
                                            <p>Laporan di verifikasi Pejabat Struktural</p>
                                        </div>
                                    </div>
                                    <div class="history-item">
                                        <span class="history-item-date">07-08-2022</span>
                                        <div class="history-item-wrapper">
                                            <div class="point-wrapper">
                                                <span class="point"></span>
                                            </div>
                                            <p>Laporan kegiatan diterima Oleh Kasi</p>
                                        </div>
                                    </div>
                                    <div class="history-item">
                                        <span class="history-item-date">07-08-2022</span>
                                        <div class="history-item-wrapper">
                                            <div class="point-wrapper">
                                                <span class="point"></span>
                                            </div>
                                            <p>Laporan diverifikasi Oleh Kasi</p>
                                        </div>
                                    </div>
                                    <div class="history-item">
                                        <span class="history-item-date">07-08-2022</span>
                                        <div class="history-item-wrapper">
                                            <div class="point-wrapper">
                                                <span class="point"></span>
                                            </div>
                                            <p>Selesai ditanda tangan</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-danger px-5 mt-4" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="revisi" tabindex="-1" role="dialog" aria-labelledby="revisiTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="d-flex flex-column">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Files</label>
                                    <input type="file" class="with-validation-files" required multiple
                                        data-max-file-size="1MB" data-max-files="3">
                                </div>
                                <div class="form-group">
                                    <label for="">Gambar Kegiatan</label>
                                    <input type="file" class="with-validation-images" required multiple
                                        data-max-file-size="1MB" data-max-files="3">
                                </div>
                                <div class="form-group">
                                    <label for="">Detail Kegiatan</label>
                                    <textarea name="" id="" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5 style="font-size: 16px !important; color: black;">Riwayat Laporan kegiatan Agus
                                    Syamsudin</h5>

                                <div class="history">
                                    <div class="history-item">
                                        <span class="history-item-date">07-08-2022</span>
                                        <div class="history-item-wrapper">
                                            <div class="point-wrapper">
                                                <span class="point"></span>
                                            </div>
                                            <p>Input Laporan Kegiatan</p>
                                        </div>
                                    </div>
                                    <div class="history-item">
                                        <span class="history-item-date">07-08-2022</span>
                                        <div class="history-item-wrapper">
                                            <div class="point-wrapper">
                                                <span class="point"></span>
                                            </div>
                                            <p>Laporan kegiatan di terima Pejabat Struktural</p>
                                        </div>
                                    </div>
                                    <div class="history-item">
                                        <span class="history-item-date">07-08-2022</span>
                                        <div class="history-item-wrapper">
                                            <div class="point-wrapper">
                                                <span class="point"></span>
                                            </div>
                                            <p>Laporan di verifikasi Pejabat Struktural</p>
                                        </div>
                                    </div>
                                    <div class="history-item">
                                        <span class="history-item-date">07-08-2022</span>
                                        <div class="history-item-wrapper">
                                            <div class="point-wrapper">
                                                <span class="point"></span>
                                            </div>
                                            <p>Laporan kegiatan diterima Oleh Kasi</p>
                                        </div>
                                    </div>
                                    <div class="history-item">
                                        <span class="history-item-date">07-08-2022</span>
                                        <div class="history-item-wrapper">
                                            <div class="point-wrapper">
                                                <span class="point"></span>
                                            </div>
                                            <p>Laporan diverifikasi Oleh Kasi</p>
                                        </div>
                                    </div>
                                    <div class="history-item">
                                        <span class="history-item-date">07-08-2022</span>
                                        <div class="history-item-wrapper">
                                            <div class="point-wrapper">
                                                <span class="point"></span>
                                            </div>
                                            <p>Selesai ditanda tangan</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button class="btn btn-danger px-5" data-bs-dismiss="modal">Batal</button>
                            <a class="btn btn-blue px-5" href="{{ route('laporan-kegiatan') }}">Kirim</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/pages/timeline.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/laporan-kegiatan.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/filepond/filepond.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/filepond.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/toastify-js/src/toastify.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/choices.js/public/assets/styles/choices.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsglobal_assets/css/icons/icomoon/styles.min.css') }}">
@endsection
@section('js')
    <!-- Core JS files -->
    <script src="../../../../global_assets/js/main/jquery.min.js"></script>
    <script src="../../../../global_assets/js/main/bootstrap.bundle.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{ asset('assets/global_assets/js/plugins/ui/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/global_assets/js/plugins/pickers/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/global_assets/js/plugins/pickers/pickadate/picker.js') }}"></script>
    <script src="{{ asset('assets/global_assets/js/plugins/pickers/pickadate/picker.date.js') }}"></script>
    <script src="{{ asset('assets/global_assets/js/plugins/pickers/pickadate/picker.time.js') }}"></script>
    <script src="{{ asset('assets/obal_assets/js/plugins/pickers/pickadate/legacy.js') }}gl"></script>
    <script src="{{ asset('assets/global_assets/js/plugins/notifications/jgrowl.min.js') }}"></script>

    {{--  <script src="assets/js/app.js"></script>  --}}
    <script src="{{ asset('assets/global_assets/js/demo_pages/picker_date.js') }}"></script>
    <!-- /theme JS files -->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>

    <script src="{{ asset('assets/extensions/filepond/filepond.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}">
    </script>
    <script src="{{ asset('assets/extensions/filepond/filepond.jquery.js') }}"></script>
    <script>
        $(function() {

            // First register any plugins
            $.fn.filepond.registerPlugin(FilePondPluginImagePreview);

            // Turn input element into a pond
            $('.with-validation-images').filepond();

            // Set allowMultiple property to true
            $('.with-validation-images').filepond('allowMultiple', true);

            // Listen for addfile event
            $('.with-validation-images').on('FilePond:addfile', function(e) {
                console.log('file added event', e);
            });

            // Manually add a file using the addfile method
            // $('.my-pond').first().filepond('addFile', 'index.html').then(function(file) {
            //     console.log('file added', file);
            // });

            // Turn input element into a pond
            $('.with-validation-files').filepond();

            // Set allowMultiple property to true
            $('.with-validation-files').filepond('allowMultiple', true);

            // Listen for addfile event
            $('.with-validation-files').on('FilePond:addfile', function(e) {
                console.log('file added event', e);
            });
        });
    </script>
    <script src="{{ asset('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-element-select.js') }}"></script>
@endsection
