@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="card">
            <div class="card-body" style="padding-top: 3rem;">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-4 d-flex justify-content-center">
                            <div class="avatar avatar-xl me-3">
                                <img style="width: 180px; height: 180px;" src="{{ asset('assets/images/faces/3.jpg') }}"
                                    alt="" srcset="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Nama Lengkap</label>
                                <input type="text" class="form-control" value="{{ $user->userAparatur?->nama }}">
                            </div>
                            <div class="form-group">
                                <label>Tempat Tanggal Lahir</label>
                                <input type="text" class="form-control"
                                    value="{{ $user->userAparatur?->tempat_lahir }} {{ $user->userAparatur?->tempat_lahir }}"
                                    placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="basicInput">Kabupaten / Kota</label>
                                <select class="choices form-select">
                                    <option value="square">Square</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="basicInput">NIP</label>
                                <input type="number" class="form-control" value="{{ $user->userAparatur?->nip }}">
                            </div>
                            <div class="form-group">
                                <label for="basicInput">Jabatan</label>
                                <input type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Jenis Kelamin</label>
                                <select class="choices form-select">
                                    <option disabled selected>- Pilih Jenis Kelamin -</option>
                                    <option @selected($user->userAparatur?->jenis_kelamin == 'L') value="L">Laki - Laki</option>
                                    <option @selected($user->userAparatur?->jenis_kelamin == 'P') value="P">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="basicInput">Privinsi</label>
                                <select class="choices form-select">
                                    <option value="square">Square</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="basicInput">Pendidikan Terakhir</label>
                                <select class="choices form-select">
                                    <option value="square">Square</option>
                                    <option value="rectangle">Rectangle</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nomor KerPeg</label>
                                <input type="number" class="form-control"
                                    value="{{ $user->userAparatur?->nomor_kerpeg }} placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="basicInput">Pangkat / Golongan / TMT</label>
                                <select class="choices form-select">
                                    <option value="square">Square</option>
                                    <option value="rectangle">Rectangle</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-2">
                        <button type="reset" class="btn btn-gray text-sm px-5">Reset</button>
                        <button type="submit" class="btn btn-blue text-sm ms-3 px-5">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 style="color:#000000; margin: 0 !important;">Dokumen Kepegawaian</h4>
                        <span class="custom-badge custom-badge-purple-light">
                            <img src="{{ asset('assets/images/template/Vector.png') }}" alt="" srcset="">
                        </span>
                    </div>
                    <div class="card-body">
                        <ul class="doc-wrapper">
                            @foreach ($user->dokKepegawaians as $docKepeg)
                                <li class="doc-item">
                                    <a href="{{ route('data-saya.show-doc-kepeg', $docKepeg->id) }}"
                                        class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/template/icon-dokumen-png-0 1.png') }}"
                                            alt="">
                                        <p>{{ $docKepeg->nama }}</p>
                                        <i class="fa-regular fa-trash-can text-danger text-xl ms-3 del-kepeg"
                                            data-id="{{ $docKepeg->id }}"></i>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-red text-sm" data-bs-toggle="modal"
                                data-bs-target="#tambahDocModal">Tambah Dokumen</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 style="color: #000000; margin: 0 !important;">Kompetensi</h4>
                        <span class="custom-badge custom-badge-green">
                            <img src="{{ asset('assets/images/template/kompetensi.png') }}" alt="" srcset="">
                        </span>
                    </div>
                    <div class="card-body">
                        <ul class="doc-wrapper">
                            @foreach ($user->dokKompetensis as $docKom)
                                <li class="doc-item">
                                    <a href="" class="d-flex align-items-center">
                                        <span
                                            class="custom-badge-sm custom-badge-blue-light">{{ $loop->iteration >= 10 ? $loop->iteration : "0$loop->iteration" }}</span>
                                        <p>{{ $docKom->nama }}</p>
                                        <i class="fa-regular fa-trash-can text-danger text-xl ms-3 del-kom"
                                            data-id="{{ $docKom->id }}"></i>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-red text-sm" data-bs-toggle="modal"
                                data-bs-target="#tambahKomModal">Tambah Kompetensi</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="tambahDocModal" tabindex="-1" role="dialog" aria-labelledby="tambahDocModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahDocModalTitle">
                        Input File
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-kepeg" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Nama File</label>
                            <input class="form-control" type="text" name="nama">
                        </div>
                        <div class="form-group">
                            <label>File Dokumen</label>
                            <input type="file" name="doc_kepegawaian_tmp" required />
                            <input type="file" name="doc_kepegawaian" style="display: none;" required />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        <span>Batal</span>
                    </button>
                    <button class="btn btn-green ml-1 btn-simpan-doc-kep">
                        <img class="spin" src="{{ asset('assets/images/template/spinner.gif') }}"
                            style="height: 25px; object-fit: cover;display: none;" alt="" srcset="">
                        <span>Simpan</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="tambahKomModal" tabindex="-1" role="dialog" aria-labelledby="tambahKomModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahKomModalTitle">
                        Tambah Kompetensi
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-kom" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Nama Kompetensi</label>
                            <input class="form-control" type="text" name="nama">
                        </div>
                        <div class="form-group">
                            <label>File Kompetensi</label>
                            <input type="file" name="doc_kompetensi_tmp" required />
                            <input type="file" name="doc_kompetensi" style="display: none;" required />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        <span>Batal</span>
                    </button>
                    <button class="btn btn-green ml-1 btn-simpan-doc-kom">
                        <img class="spin" src="{{ asset('assets/images/template/spinner.gif') }}"
                            style="height: 25px; object-fit: cover;display: none;" alt="" srcset="">
                        <span>Simpan</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/pages/my-data.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/choices.js/public/assets/styles/choices.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/toastify-js/src/toastify.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/filepond/filepond.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/filepond.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
@endsection
@section('js')
    <script src="{{ asset('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-element-select.js') }}"></script>
    <script src="{{ asset('assets/js/auth/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/toastify-js/src/toastify.js') }}"></script>
    <script src="{{ asset('assets/extensions/filepond/filepond.js') }}"></script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}">
    </script>
    <script src="{{ asset('assets/extensions/filepond/filepond.jquery.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <script>
        $(function() {
            $.fn.filepond.registerPlugin(FilePondPluginImagePreview);
            FilePond.create(document.querySelector('input[name="doc_kepegawaian_tmp"]')).setOptions({
                server: {
                    process: (fieldName, file, metadata, load, error, progress, abort, transfer,
                        options) => {
                        message = '';
                        if (file.size / 1000 >= 2000) {
                            error('file kegedean')
                            message = "File tidak bole lebih dari 2MB";
                        }
                        if (file.type == 'application/pdf') {
                            const fileInput = document.querySelector('input[name="doc_kepegawaian"]');
                            const myFile = new File([file], file.name, {
                                type: file.type,
                                lastModified: new Date(),
                            });
                            const dataTransfer = new DataTransfer();
                            dataTransfer.items.add(myFile);
                            fileInput.files = dataTransfer.files;
                            load(file.name);
                        } else {
                            error('file kegedean')
                            message = message + ", File tidak sesuai";
                        }
                        if (message) {
                            Toastify({
                                text: message,
                                duration: 5000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                backgroundColor: "rgba(234, 58, 61, 0.9)",
                            }).showToast();
                        }
                    }
                },
            });
            FilePond.create(document.querySelector('input[name="doc_kompetensi_tmp"]')).setOptions({
                server: {
                    process: (fieldName, file, metadata, load, error, progress, abort, transfer,
                        options) => {
                        message = '';
                        if (file.size / 1000 >= 2000) {
                            error('file kegedean')
                            message = "File tidak bole lebih dari 2MB";
                        }
                        if (file.type == 'application/pdf') {
                            const fileInput = document.querySelector('input[name="doc_kompetensi"]');
                            const myFile = new File([file], file.name, {
                                type: file.type,
                                lastModified: new Date(),
                            });
                            const dataTransfer = new DataTransfer();
                            dataTransfer.items.add(myFile);
                            fileInput.files = dataTransfer.files;
                            load(file.name);
                        } else {
                            error('file kegedean')
                            message = message + ", File tidak sesuai";
                        }
                        if (message) {
                            Toastify({
                                text: message,
                                duration: 5000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                backgroundColor: "rgba(234, 58, 61, 0.9)",
                            }).showToast();
                        }
                    }
                },
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.btn-simpan-doc-kep').click(function(e) {
                e.preventDefault();
                if (!$('#form-kepeg input[name="nama"]').val() || !$(
                        '#form-kepeg input[name="doc_kepegawaian_tmp"]').val()) {
                    Toastify({
                        text: "Semua inputan harus diisi!",
                        duration: 5000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "#EA3A3D",
                    }).showToast();
                } else {
                    var postData = new FormData($("#form-kepeg")[0]);
                    $('.btn-simpan-doc-kep span').hide();
                    $('.btn-simpan-doc-kep .spin').show();
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('data-saya.store-doc-kepeg') }}",
                        processData: false,
                        contentType: false,
                        data: postData,
                        success: function(response) {
                            $('.btn-simpan-doc-kep span').show();
                            $('.btn-simpan-doc-kep .spin').hide();
                            if (response.status == 200) {
                                Toastify({
                                    text: response.message,
                                    duration: 5000,
                                    close: true,
                                    gravity: "top",
                                    position: "right",
                                    backgroundColor: "#18b882",
                                }).showToast();
                                location.reload();
                            }
                        },
                        error: function(err) {

                        }
                    });
                }
            });
            $('.btn-simpan-doc-kom').click(function(e) {
                e.preventDefault();
                var postData = new FormData($("#form-kom")[0]);
                if (!$('#form-kom input[name="nama"]').val() || !$(
                        '#form-kom input[name="doc_kompetensi_tmp"]').val()) {
                    Toastify({
                        text: "Semua inputan harus diisi!",
                        duration: 5000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "#EA3A3D",
                    }).showToast();
                } else {
                    $('.btn-simpan-doc-kom span').hide();
                    $('.btn-simpan-doc-kom .spin').show();
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('data-saya.store-doc-kom') }}",
                        processData: false,
                        contentType: false,
                        data: postData,
                        success: function(response) {
                            $('.btn-simpan-doc-kom span').show();
                            $('.btn-simpan-doc-kom .spin').hide();
                            if (response.status == 200) {
                                Toastify({
                                    text: response.message,
                                    duration: 5000,
                                    close: true,
                                    gravity: "top",
                                    position: "right",
                                    backgroundColor: "#18b882",
                                }).showToast();
                                location.reload();
                            }
                        },
                        error: function(err) {

                        }
                    });
                }
            });

            $('.del-kepeg').click(function(e) {
                e.preventDefault();
                swal({
                    title: "Yakin ingin menghapus?",
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Ya, yakin!",
                    cancelButtonText: "Batal",
                    reverseButtons: !0,
                    showLoaderOnConfirm: true,
                    preConfirm: async () => {
                        return await $.ajax({
                            type: 'DELETE',
                            url: "{{ url('data-saya/destroy-dockepeg') }}/" + $(this)
                                .data('id'),
                            dataType: 'JSON'
                        });
                    },
                }).then(function(e) {
                    if (e.value.status == 200) {
                        swal("Selesai!", e.value.message, "success").then(() => {
                            location.reload();
                        });
                    } else {
                        swal("Error!", e.value.message, "error");
                    }
                }, function(dismiss) {
                    return false;
                })
            });
            $('.del-kom').click(function(e) {
                e.preventDefault();
                swal({
                    title: "Yakin ingin menghapus?",
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Ya, yakin!",
                    cancelButtonText: "Batal",
                    reverseButtons: !0,
                    showLoaderOnConfirm: true,
                    preConfirm: async () => {
                        return await $.ajax({
                            type: 'DELETE',
                            url: "{{ url('data-saya/destroy-dockom') }}/" + $(this)
                                .data('id'),
                            dataType: 'JSON'
                        });
                    },
                }).then(function(e) {
                    if (e.value.status == 200) {
                        swal("Selesai!", e.value.message, "success").then(() => {
                            location.reload();
                        });
                    } else {
                        swal("Error!", e.value.message, "error");
                    }
                }, function(dismiss) {
                    return false;
                })
            });
        });
    </script>
    @if (session('resent'))
        <script>
            Toastify({
                text: "Silahkan cek email kamu",
                duration: 5000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "#EDE40C",
            }).showToast();
        </script>
    @endif
@endsection
