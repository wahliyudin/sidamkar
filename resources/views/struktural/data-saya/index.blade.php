@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="card">
            <div class="card-body" style="padding-top: 3rem;">
                <form action="" method="post" class="form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="container">
                                <input id="avatar" type="file" style="display: none;" name="avatar" id="">
                                <label for="avatar">
                                    <img src="{{ isset($user->userPejabatStruktural?->foto_pegawai) ? $user->userPejabatStruktural?->foto_pegawai : asset('assets/images/faces/3.jpg') }}"
                                        alt="Avatar" class="image preview-avatar"
                                        style="min-width:145px; min-height: 145px; max-width:145px; max-height: 145px; object-fit: cover; border-radius: 50%;">
                                    <span class="middle">
                                        <div class="text" style="cursor: pointer;"><i
                                                class="fa-regular fa-pen-to-square fa-xl"></i>
                                        </div>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="row col-md-8 justify-content-center">
                            <div class="row col-md-12" style="border: 2px solid #E5E5E5;border-radius: 6px;padding: 4px;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="basicInput">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama"
                                            value="{{ old('nama', $user->userPejabatStruktural?->nama) }}">
                                        @error('nama')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Tempat Tanggal Lahir</label>
                                        <div class="row">
                                            <div class="col-md-6" style="padding-right: .3rem !important;">
                                                <input type="text" class="form-control w-100" name="tempat_lahir"
                                                    value="{{ old('tempat_lahir', $user->userPejabatStruktural?->tempat_lahir) }}"
                                                    placeholder="" style="width: 50%">
                                                @error('tempat_lahir')
                                                    <span class="text-danger text-sm">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6" style="padding-left: .3rem !important;">
                                                <input type="date" class="form-control w-100" name="tanggal_lahir"
                                                    value="{{ old('tanggal_lahir', $user->userPejabatStruktural?->tanggal_lahir) }}"
                                                    placeholder="" style="width: 50%">
                                                @error('tanggal_lahir')
                                                    <span class="text-danger text-sm">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="basicInput">Provinsi</label>
                                        <select class="form-select provinsi2" disabled data-id=".provinsi2"
                                            name="provinsi_id">
                                            <option disabled selected>- Pilih Privinsi -</option>
                                            @foreach ($provinsis as $prov)
                                                <option value="{{ $prov->id }}" @selected(old('provinsi_id', $user->userPejabatStruktural?->provinsi_id) == $prov->id)>
                                                    {{ $prov->nama }}</option>
                                            @endforeach
                                        </select>
                                        @error('provinsi_id')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    @if ($user->userPejabatStruktural?->tingkat_aparatur == 'kab_kota')
                                        <div class="form-group">
                                            <label for="basicInput">Kabupaten / Kota</label>
                                            <select class="kab_kota_id form-select" disabled name="kab_kota_id"
                                                id="kab_kota_id">
                                                <option disabled selected>- Pilih Kabupaten / Kota -</option>
                                                @foreach ($kab_kota as $kabkota)
                                                    <option value="{{ $kabkota->id }}" @selected(old('kab_kota_id', $user->userPejabatStruktural?->kab_kota_id) == $kabkota->id)>
                                                        {{ $kabkota->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('kab_kota_id')
                                                <span class="text-danger text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="basicInput">Pendidikan Terakhir</label>
                                        <select class="pen_terakhir form-select" name="pendidikan_terakhir">
                                            <option disabled selected>- Pilih Pendidikan Terakhir -</option>
                                            <option @selected(old('pendidikan_terakhir', $user->userPejabatStruktural?->pendidikan_terakhir) == '1') value="1">SMA/SMK/Sederajat</option>
                                            <option @selected(old('pendidikan_terakhir', $user->userPejabatStruktural?->pendidikan_terakhir) == '2') value="2">D3</option>
                                            <option @selected(old('pendidikan_terakhir', $user->userPejabatStruktural?->pendidikan_terakhir) == '3') value="3">S1/D4</option>
                                            <option @selected(old('pendidikan_terakhir', $user->userPejabatStruktural?->pendidikan_terakhir) == '4') value="4">S2</option>
                                            <option @selected(old('pendidikan_terakhir', $user->userPejabatStruktural?->pendidikan_terakhir) == '5') value="5">S3</option>
                                        </select>
                                        @error('pendidikan_terakhir')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="basicInput">Jenis Kelamin</label>
                                        <select class="jenis_kelamin form-select" name="jenis_kelamin">
                                            <option disabled selected>- Pilih Jenis Kelamin -</option>
                                            <option @selected(old('jenis_kelamin', $user->userPejabatStruktural?->jenis_kelamin) == 'L') value="L">Laki - Laki</option>
                                            <option @selected(old('jenis_kelamin', $user->userPejabatStruktural?->jenis_kelamin) == 'P') value="P">Perempuan</option>
                                        </select>
                                        @error('jenis_kelamin')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="form-group">
                                                <div class="container d-flex justify-content-center">
                                                    <input id="ttd" type="file" accept="image/png, image/jpeg"
                                                        style="display: none;" name="ttd" id="">
                                                    <label for="ttd">
                                                        <img src="{{ isset($user->userPejabatStruktural?->file_ttd) ? $user->userPejabatStruktural?->file_ttd : asset('assets/images/faces/3.jpg') }}"
                                                            alt="ttd" class="image preview-ttd"
                                                            style="min-width:290px; min-height: 145px; max-width:290px; max-height: 145px; object-fit: cover; border-radius: 10px;">
                                                        <span class="middle">
                                                            <div class="text" style="cursor: pointer;"><i
                                                                    class="fa-regular fa-pen-to-square fa-xl"></i>
                                                            </div>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row col-md-12"
                                style="border: 2px solid #E5E5E5;border-radius: 6px;padding: 4px;margin-top: 19px;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="basicInput">NIP</label>
                                        <input type="number" class="form-control" name="nip"
                                            value="{{ old('nip', $user->userPejabatStruktural?->nip) }}">
                                        @error('nip')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="basicInput">Nomor Karpeg</label>
                                        <input type="number" name="nomor_karpeg" class="form-control"
                                            value="{{ old('nomor_karpeg', $user->userPejabatStruktural?->nomor_karpeg) }}">
                                        @error('nomor_karpeg')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="basicInput">Jabatan TMT</label>
                                        <input type="date" name="jabatan_tmt" class="form-control"
                                            value="{{ old('jabatan_tmt', $user->userPejabatStruktural?->jabatan_tmt) }}">
                                        @error('jabatan_tmt')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="basicInput">GOLONGAN TMT</label>
                                        <input type="date" name="golongan_tmt" class="form-control"
                                            value="{{ old('golongan_tmt', $user->userPejabatStruktural?->golongan_tmt) }}">
                                        @error('golongan_tmt')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="basicInput">Unit Kerja </label>
                                        <select class="nomenklatur_perangkat_daerah form-select"
                                            name="nomenklatur_perangkat_daerah_id" name="nomenklatur">
                                            <option disabled selected>- Pilih Unit Kerja -</option>
                                            @foreach ($nomenklatur as $unit_kerja)
                                                <option @selected(old('nomenklatur_perangkat_daerah_id', $user->userPejabatStruktural?->nomenklatur_perangkat_daerah_id) == $unit_kerja->id) value="{{ $unit_kerja->id }}">
                                                    {{ $unit_kerja->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('nomenklatur_perangkat_daerah_id')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="basicInput">Jabatan</label>
                                        <ul>
                                            @foreach (Auth::user()->roles as $role)
                                                <li>{{ $role->display_name }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="basicInput">Pangkat / Golongan </label>
                                        <select class="pangkat_golongan form-select" name="pangkat_golongan_tmt_id"
                                            name="pangkat">
                                            <option disabled selected>- Pilih Pangkat / Golongan -</option>
                                            @foreach ($pangkats as $pangkat)
                                                <option @selected(old('pangkat_golongan_tmt_id', $user->userPejabatStruktural?->pangkat_golongan_tmt_id) == $pangkat->id) value="{{ $pangkat->id }}">
                                                    {{ $pangkat->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('pangkat_golongan_tmt_id')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="mt-2 text-end btn-bwh">
            <button type="reset" class="btn btn-gray text-sm px-5 reset-data" id="reset">Reset</button>
            <button class="btn btn-blue text-sm ms-3 px-5 simpan-data" id="simpan">Simpan</button>
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
                                    <a href="{{ route('data-atasan-langsung.show-doc-kepeg', $docKepeg->id) }}"
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
                            <img src="{{ asset('assets/images/template/kompetensi.png') }}" alt=""
                                srcset="">
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
    <link rel="stylesheet" href="{{ asset('assets/css/shared/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/aparatur/data-saya.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <style>
        @media screen and (max-width: 422px) {
            .simpan-data {
                margin-top: 10px;
            }
        }

        .simpan-data {
            width: 140px;
            text-align: center;
        }

        .swal2-title {
            font-size: 23px !important;
        }
    </style>
@endsection
@section('js')
    <script src="{{ asset('assets/js/auth/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/aparatur/data-saya.js') }}"></script>

    <script src="{{ asset('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-element-select.js') }}"></script>
    <script src="{{ asset('assets/extensions/toastify-js/src/toastify.js') }}"></script>
    <script src="{{ asset('assets/extensions/filepond/filepond.js') }}"></script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}">
    </script>
    <script src="{{ asset('assets/extensions/filepond/filepond.jquery.js') }}"></script>
    <script src="{{ asset('assets/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script>
        $('#reset').click(function(e) {
            e.preventDefault();
            location.reload()
        });
        $('#simpan').click(function(e) {
            e.preventDefault();
            var postData = new FormData($(".form-data")[0]);
            swal({
                title: "Apakah Data Yang Anda Masukkan Sudah Benar?",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Ya, Sudah Benar!",
                cancelButtonText: "Batal",
                reverseButtons: !0,
                showLoaderOnConfirm: true,
                preConfirm: async () => {
                    return new Promise(function(resolve) {
                        $.ajax({
                                type: 'POST',
                                url: url("/data-struktural-store"),
                                processData: false,
                                contentType: false,
                                data: postData
                            })
                            .done(function(myAjaxJsonResponse) {
                                swal("Berhasil!", myAjaxJsonResponse.message, "success")
                                    .then(function() {
                                        location.reload();
                                    });
                            })
                            .fail(function(erordata) {
                                console.log(erordata);
                                if (erordata.status == 422) {
                                    swal('Warning!', erordata.responseJSON.message,
                                        'warning');
                                } else {
                                    swal('Error!', erordata.responseJSON.message, 'error');
                                }
                            })
                    })
                },
            })
        });
        $('select[name="provinsi_id"]').each(function(index, element) {
            $(element).change(function(e) {
                e.preventDefault();
                window.localStorage.setItem('provinsi', $(element).data('id'));
                loadKabKota(this.value, $(element.parentElement.parentElement.parentElement)
                    .find('#kab_kota_id'))
            });
        });

        function loadKabKota(val, kabupaten, kabupaten_id = null) {
            return new Promise(resolve => {
                $(kabupaten).html('<option value="">Memuat...</option>');
                fetch('/api/kab-kota/' + val)
                    .then(res => res.json())
                    .then(res => {
                        $(kabupaten).html(
                            '<option selected disabled>- Pilih Kabupaten / Kota -</option>');
                        res.forEach(model => {
                            var selected = kabupaten_id == model.id ? 'selected=""' : '';
                            $(kabupaten).append('<option value="' + model.id + '" ' +
                                selected + '>' + model.nama + '</option>');
                        })
                        resolve()
                    })
            })
        }
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
                        url: "{{ route('data-struktural.store-doc-kepeg') }}",
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
                        url: "{{ route('data-struktural.store-doc-kom') }}",
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
                            url: "{{ url('data-struktural.destroy-doc-kepeg') }}/" +
                                $(this)
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
                            url: "{{ url('data-struktural.destroy-doc-kom') }}/" +
                                $(this)
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

        $('#avatar').change(function(e) {
            e.preventDefault();
            previewImage(this, document.querySelector('.preview-avatar'))
        });
        $('#ttd').change(function(e) {
            e.preventDefault();
            previewImage(this, document.querySelector('.preview-ttd'))
        });


        function previewImage(image, imgPreview) {
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
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
