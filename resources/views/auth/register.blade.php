<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Daftar</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/template/logo.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/template/logo.png') }}" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('assets/css/auth/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/auth/all.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('assets/css/auth/fontawesome/styles.min.css') }}" rel="stylesheet" type="text/css">
    <style>
        .card-header {
            border-bottom: 0;

        }

        .nav-tabs .nav-item.show .nav-link,
        .nav-tabs .nav-link.active {
            color: #fff;
            background-color: rgba(234, 58, 61, 0.9);

            border-color: #ddd #ddd #fff;
        }

        .form-wrapper {
            padding: 0 10px !important;
        }

        @media screen and (max-width: 750px) {
            .nav-item a h6 {
                font-size: 14px !important;
            }

            .header-regist {
                font-size: 30px !important;
            }

            .nav-item .nav-link {
                padding: 7px 7px !important;
            }

            .form-wrapper {
                padding: 0 !important;
            }

            .link-login {
                position: relative !important;
                margin-top: 1rem;
                align-self: center;
            }
        }

        .nav-tabs .nav-link {
            background-color: rgba(234, 58, 61, 0.5);
            color: white;
        }

        .nav-tabs .nav-link:hover {
            color: white;
        }

        .input-file {
            width: 100%;
            min-height: 70px;
            background-color: rgba(128, 128, 128, 0.205);
            border-radius: 10px;
            overflow: hidden;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            max-height: 300px !important;
        }

        .input-file .icon {
            display: flex;
            flex-direction: column;
        }

        .file_ttd-priview {
            width: 100% !important;
            object-fit: cover;
            object-position: center;
        }
    </style>

    <link rel="stylesheet" href="{{ asset('assets/extensions/filepond/filepond.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/filepond.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/fontawesome/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/extensions/toastify-js/src/toastify.css') }}">
</head>

<body>
    <div class="page-content">
        <div class="content-wrapper">
            <div class="content-inner">
                <div class="content pt-0">
                    <div class="w-100 content-header d-flex flex-column align-items-center mt-4">
                        <h1 class="header-regist text-center mt-1"
                            style="font-size: 40px; font-family: sans-serif; font-weight: 700; ">DAFTAR
                        </h1>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="page-content login-cover" style="z-index: 99;">
                        <!-- Content area -->
                        <div class="form-wrapper d-flex justify-content-center align-items-center">
                            <!-- Login form -->
                            <div class="card mb-0 overflow-hidden" style="border-radius: 10px; position: relative;">
                                <ul class="nav nav-tabs nav-justified bg-light rounded-top mb-0">
                                    <li class="nav-item">
                                        <a href="#login-tab1"
                                            class="h-100 nav-link border-y-0 border-left-0 active d-flex justify-content-center align-items-center"
                                            data-toggle="tab" data-id="login-tab1">
                                            <h6 class="my-1">Daftar Aparatur</h6>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#login-tab2"
                                            class="h-100 nav-link border-y-0 border-right-0 d-flex justify-content-center align-items-center"
                                            data-toggle="tab" data-id="login-tab2">
                                            <h6 class="my-1">Daftar Admin Prov & Kab/kota</h6>
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="login-tab1">
                                        <!-- Wizard with validation -->
                                        <div class="header-wizard-form">
                                            <form class="wizard-form steps-validation" method="POST"
                                                action="{{ route('register') }}" data-fouc>
                                                @csrf

                                                <h6>Admin Level</h6>
                                                <fieldset>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Provinsi<span
                                                                        class="text-danger">*</span></label>
                                                                <select name="provinsi_id" data-id=".provinsi1" required
                                                                    id="provinsi_id" class="custom-select provinsi1">
                                                                    <option selected disabled>- Pilih Provinsi -
                                                                    </option>
                                                                    @foreach ($provinsis as $provinsi)
                                                                        <option @selected(old('provinsi_id') == $provinsi->id)
                                                                            value="{{ $provinsi->id }}">
                                                                            {{ $provinsi->nama }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('provinsi_id')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Kabupaten / Kota<span
                                                                        class="text-danger">*</span></label>
                                                                <select name="kab_kota_id" required id="kab_kota_id"
                                                                    class="custom-select">
                                                                    <option value="">- Pilih Provinsi Terlebih
                                                                        Dahulu -</option>
                                                                </select>
                                                                @error('kab_kota_id')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Jenis Aparatur<span
                                                                        class="text-danger">*</span></label>
                                                                <select name="jenis_aparatur" required
                                                                    class="custom-select">
                                                                    <option selected disabled value="">- Pilih
                                                                        Jabatan -</option>
                                                                    <option value="fungsional">Pejabat Fungsional
                                                                    </option>
                                                                    <option value="struktural">Pejabat Struktural
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>

                                                <h6>Personal Data</h6>
                                                <fieldset>
                                                    <div class="row justify-content-center">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Nama Lengkap<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" required
                                                                    value="{{ old('nama') }}" class="form-control"
                                                                    name="nama">
                                                                @error('nama')
                                                                    <strong
                                                                        style="color: red;">{{ $message }}</strong>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 wrapper-select" style="display: none;">
                                                            <div class="form-group">
                                                                <label>Jenis Jabatan<span
                                                                        class="text-danger">*</span></label>
                                                                <select name="jenis_jabatan"
                                                                    class="custom-select select-fungsional"
                                                                    style="display: none;" required>
                                                                    <option selected disabled>- Pilih Jabatan -</option>
                                                                    <option value="damkar_pemula">Damkar Pemula
                                                                    </option>
                                                                    <option value="damkar_terampil">Damkar Terampil
                                                                    </option>
                                                                    <option value="damkar_mahir">Damkar Mahir
                                                                    </option>
                                                                    <option value="damkar_penyelia">Damkar Penyelia
                                                                    </option>
                                                                    <option value="analis_kebakaran_ahli_pertama">
                                                                        Analis Kebakaran Ahli
                                                                        Pertama
                                                                    </option>
                                                                    <option value="analis_kebakaran_ahli_muda">Analis
                                                                        Kebakaran Ahli
                                                                        Muda
                                                                    </option>
                                                                    <option value="analis_kebakaran_ahli_madya">Analis
                                                                        Kebakaran Ahli
                                                                        Madya
                                                                    </option>
                                                                </select>
                                                                <select name="jenis_jabatan"
                                                                    class="custom-select select-struktural"
                                                                    style="display: none;" required>
                                                                    <option selected disabled>- Pilih Jabatan -</option>
                                                                    <option value="atasan_langsung">Atasan Langsung
                                                                    </option>
                                                                    <option value="penilai_ak">Penilai Angka Kredit
                                                                    </option>
                                                                    <option value="penetap_ak">Penetap Angka Kredit
                                                                    </option>
                                                                </select>
                                                                @error('jenis_jabatan')
                                                                    <strong style="color: red;">adffsdf</strong>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        {{-- Struktural --}}
                                                        <div class="col-md-4 struktural" style="display: none;">
                                                            <div class="form-group">
                                                                <label>File SK<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="file" data-max-file-size="2MB"
                                                                    name="file_sk" required />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>

                                                <h6>Akses Login</h6>
                                                <fieldset>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Email<span class="text-danger">*</span></label>
                                                                <input type="email" name="email"
                                                                    placeholder="example@gmail.com"
                                                                    class="form-control" value="{{ old('email') }}">
                                                                @error('email')
                                                                    <strong
                                                                        style="color: red;">{{ $message }}</strong>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Username<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" value="{{ old('username') }}"
                                                                    name="username" class="form-control">
                                                            </div>
                                                            @error('username')
                                                                <strong style="color: red;">{{ $message }}</strong>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Password<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="password" name="password"
                                                                    placeholder="password" class="form-control">
                                                                @error('password')
                                                                    <strong
                                                                        style="color: red;">{{ $message }}</strong>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Konfirmasi Password<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="password" name="password_confirmation"
                                                                    placeholder="password" class="form-control">
                                                                @error('password_confirmation')
                                                                    <strong
                                                                        style="color: red;">{{ $message }}</strong>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>
                                        <!-- /wizard with validation -->
                                    </div>

                                    <div class="tab-pane fade" id="login-tab2">
                                        <!-- Wizard with validation -->
                                        <div class="header-wizard-form">
                                            <form class="wizard-form steps-validation" method="POST"
                                                action="{{ route('register') }}" data-fouc>
                                                @csrf
                                                <h6>Admin Level</h6>
                                                <fieldset>
                                                    <div class="row justify-content-center">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Tingkat Admin<span
                                                                        class="text-danger">*</span></label>
                                                                <select name="jenis_jabatan" required
                                                                    class="custom-select jenis-jabatan-kabkota">
                                                                    <option selected disabled>- Pilih Tingkat -</option>
                                                                    <option value="kab_kota">Kab Kota
                                                                    </option>
                                                                    <option value="provinsi">Provinsi
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Provinsi<span
                                                                        class="text-danger">*</span></label>
                                                                <select name="provinsi_id" data-id=".provinsi2"
                                                                    required id="provinsi_id"
                                                                    class="custom-select provinsi2">
                                                                    <option selected disabled>- Pilih Provinsi -
                                                                    </option>
                                                                    @foreach ($provinsis as $provinsi)
                                                                        <option @selected(old('provinsi_id') == $provinsi->id)
                                                                            value="{{ $provinsi->id }}">
                                                                            {{ $provinsi->nama }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('provinsi_id')
                                                                    <strong
                                                                        style="color: red;">{{ $message }}</strong>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 kabkota-kabkota" style="display: none;">
                                                            <div class="form-group">
                                                                <label>Kabupaten / Kota<span
                                                                        class="text-danger">*</span></label>
                                                                <select required name="kab_kota_id" id="kab_kota_id" name="kab_kota_id"
                                                                    class="custom-select">
                                                                    <option value="">- Pilih Provinsi Terlebih
                                                                        Dahulu -</option>
                                                                </select>
                                                                @error('kab_kota_id')
                                                                    <strong
                                                                        style="color: red;">{{ $message }}</strong>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Nomenklatur Perangkat Daerah<span
                                                                        class="text-danger">*</span></label>
                                                                <select class="custom-select"
                                                                    name="nomenklatur_perangkat_daerah_id"
                                                                    id="">
                                                                    <option selected disabled>- Pilih Nomenklatur -
                                                                    </option>
                                                                    @foreach ($nomenklaturs as $nomenklatur)
                                                                        <option @selected(old('nomenklatur_perangkat_daerah_id') == $nomenklatur->id)
                                                                            value="{{ $nomenklatur->id }}">
                                                                            {{ $nomenklatur->nama }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('nomenklatur_perangkat_daerah')
                                                                    <strong
                                                                        style="color: red;">{{ $message }}</strong>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row justify-content-center">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Surat Permohonan<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="file" data-max-file-size="2MB"
                                                                    required name="file_permohonan" required />
                                                                @error('file_permohonan')
                                                                    <strong
                                                                        style="color: red;">{{ $message }}</strong>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>

                                                <h6>Akses Login</h6>
                                                <fieldset>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Email<span class="text-danger">*</span></label>
                                                                <input type="email" value="{{ old('email') }}"
                                                                    name="email" placeholder="example@gmail.com"
                                                                    class="form-control">
                                                                @error('email')
                                                                    <strong
                                                                        style="color: red;">{{ $message }}</strong>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Username<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" value="{{ old('username') }}"
                                                                    name="username" class="form-control">
                                                            </div>
                                                            @error('username')
                                                                <strong style="color: red;">{{ $message }}</strong>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Password<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="password" name="password"
                                                                    placeholder="password" class="form-control">
                                                                @error('password')
                                                                    <strong
                                                                        style="color: red;">{{ $message }}</strong>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Konfirmasi Password<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="password" name="password_confirmation"
                                                                    placeholder="password" class="form-control">
                                                                @error('password_confirmation')
                                                                    <strong
                                                                        style="color: red;">{{ $message }}</strong>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>
                                        <!-- /wizard with validation -->
                                    </div>
                                </div>
                                <div class="px-4 link-login" style="position: absolute; bottom: 1rem;">
                                    <p>Sudah memiliki akun?<a href="{{ route('login') }}"> Masuk </a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img style="position: absolute; bottom: 0; z-index: -1; max-width: 100vw;"
            src="{{ asset('assets/images/template/glombang-2.png') }}"alt="">
        <img style="position: absolute; bottom: 0; z-index: -1; max-width: 100vw;"
            src="{{ asset('assets/images/template/glombang-1.png') }}" alt="">
    </div>

    <script src="{{ asset('assets/js/auth/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/auth/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/auth/app.js') }}"></script>
    <script>
        $('.nav-link').each(function(index, element) {
            if (localStorage.getItem('tab_active') != undefined) {
                if (localStorage.getItem('tab_active') == $(element).data('id')) {
                    $(element).addClass('active');
                    $($('.tab-content').find('#' + $(element).data('id'))).addClass('show active');
                } else {
                    $(element).removeClass('active');
                    $($('.tab-content').find('#' + $(element).data('id'))).removeClass('show active');
                }
            }
            $(element).click(function(e) {
                e.preventDefault();
                window.localStorage.setItem('tab_active', $(this).data('id'))
            });
        });
    </script>
    <script src="{{ asset('assets/js/auth/plugins/forms/wizards/steps.min.js') }}"></script>
    <script src="{{ asset('assets/js/auth/plugins/forms/inputs/inputmask.js') }}"></script>
    <script src="{{ asset('assets/js/auth/plugins/forms/validation/validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/auth/plugins/extensions/cookie.js') }}"></script>
    <script src="{{ asset('assets/js/auth/form_wizard.js') }}"></script>
    <script src="{{ asset('assets/extensions/filepond/filepond.js') }}"></script>
    <script src="{{ asset('assets/extensions/filepond/filepond.jquery.js') }}"></script>
    <script src="{{ asset('assets/extensions/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}">
    </script>
    <script
        src="{{ asset('assets/extensions/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.js') }}">
    </script>
    <script
        src="{{ asset('assets/extensions/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.js') }}">
    </script>
    <script src="{{ asset('assets/extensions/toastify-js/src/toastify.js') }}"></script>

    <script>
        $(function() {
            $.fn.filepond.registerPlugin(FilePondPluginImagePreview);
            $.fn.filepond.registerPlugin(FilePondPluginFileValidateType);
            $.fn.filepond.registerPlugin(FilePondPluginFileValidateSize);
            FilePond.create(document.querySelector('input[name="file_sk"]'), {
                chunkUploads: true,
                acceptedFileTypes: [
                    'application/doc',
                    'application/pdf',
                    '.docx'
                ]
            });
            FilePond.create(document.querySelector('input[name="file_permohonan"]'), {
                chunkUploads: true,
                acceptedFileTypes: [
                    'application/doc',
                    'application/pdf'
                ]
            });
            FilePond.setOptions({
                server: {
                    process: '/register/file',
                    revert: '/register/revert',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                },
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

            $('select[name="jenis_aparatur"]').change(function(e) {
                e.preventDefault();
                window.localStorage.setItem('jenis_aparatur', e.target.value)
                if ($('.wrapper-select').css('display') == 'none') {
                    $('.wrapper-select').show();
                }
                if (e.target.value == 'struktural') {
                    $('.struktural').show();
                    $('.select-struktural').show();
                    $('.select-fungsional').hide();
                }
                if (e.target.value == 'fungsional') {
                    $('.struktural').hide();
                    $('.select-struktural').hide();
                    $('.select-fungsional').show();
                }

            });

            $('.jenis-jabatan-kabkota').change(function(e) {
                e.preventDefault();
                if (e.target.value == 'provinsi') {
                    $('.kabkota-kabkota').hide();
                }
                if (e.target.value == 'kab_kota') {
                    $('.kabkota-kabkota').show();
                }
            });

            if (localStorage.getItem('jenis_aparatur') !== '') {
                console.log(localStorage.getItem('jenis_aparatur'));
                $('select[name="jenis_aparatur"]').val(localStorage.getItem('jenis_aparatur'));
                if ($('.wrapper-select').css('display') == 'none') {
                    $('.wrapper-select').show();
                }
                if (localStorage.getItem('jenis_aparatur') == 'struktural') {
                    $('.struktural').show();
                    $('.select-struktural').show();
                    $('.select-fungsional').hide();
                }
                if (localStorage.getItem('jenis_aparatur') == 'fungsional') {
                    $('.struktural').hide();
                    $('.select-struktural').hide();
                    $('.select-fungsional').show();
                }
                $('select[name="jenis_jabatan"]').each(function(index, element) {
                    element.value = "{{ old('jenis_jabatan') }}"
                });
            }
        });
    </script>
    @if (old('provinsi_id') === null)
        <script>
            localStorage.removeItem('provinsi');
        </script>
    @endif
    @if (old('jenis_jabatan') !== null)
        <script>
            if ("{{ old('jenis_jabatan') }}" == 'provinsi') {
                $('.kabkota-kabkota').hide();
            }
            if ("{{ old('jenis_jabatan') }}" == 'kab_kota') {
                $('.kabkota-kabkota').show();
            }
        </script>
    @endif
    @if (old('provinsi_id'))
        <script>
            $(document).ready(function() {
                function loadKabKota(val, kabupaten, kabupaten_id = null) {
                    return new Promise(resolve => {
                        $(kabupaten).html('<option value="">Memuat...</option>');
                        fetch('/api/kab-kota/' + val)
                            .then(res => res.json())
                            .then(res => {
                                $(kabupaten).html(
                                    '<option selected disabled>- Pilih Kabupaten / Kota -</option>');
                                res.forEach(model => {
                                    var selected = kabupaten_id == model.id ? 'selected' : '';
                                    $(kabupaten).append('<option value="' + model.id + '" ' +
                                        selected + '>' +
                                        model.nama + '</option>');
                                })
                                resolve()
                            })
                    })
                }
                loadKabKota("{{ old('provinsi_id') }}", $(localStorage.getItem('provinsi')).parent().parent().parent()
                    .find(
                        '#kab_kota_id'),
                    "{{ old('kab_kota_id') }}")
            });
        </script>
    @endif
</body>

</html>
