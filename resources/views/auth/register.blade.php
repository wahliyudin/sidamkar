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
    <link rel="stylesheet" href="{{ asset('assets/css/pages/register.css') }}">

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
                                                    <div class="row justify-content-center">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Tingkat Aparatur<span
                                                                        class="text-danger">*</span></label>
                                                                <select name="tingkat_aparatur" required
                                                                    class="custom-select">
                                                                    <option selected disabled value="">- Pilih
                                                                        Tingkat Aparatur -</option>
                                                                    <option @selected(old('tingkat_aparatur') == 'provinsi')
                                                                        value="provinsi">Provinsi
                                                                    </option>
                                                                    <option @selected(old('tingkat_aparatur') == 'kab_kota')
                                                                        value="kab_kota">Kabupaten/Kota
                                                                    </option>
                                                                </select>
                                                                @error('tingkat_aparatur')
                                                                    <strong
                                                                        style="color: red;">{{ $message }}</strong>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
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
                                                        <div class="col-md-3 kab-kota-aparatur">
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
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Jenis Aparatur<span
                                                                        class="text-danger">*</span></label>
                                                                <select name="jenis_aparatur" required
                                                                    class="custom-select">
                                                                    <option selected disabled value="">- Pilih
                                                                        Jabatan -</option>
                                                                    <option value="fungsional">JF Damkar/Analis
                                                                    </option>
                                                                    <option value="struktural">Pejabat Struktural
                                                                    </option>
                                                                    <option value="fungsional_umum">Pejabat Fungsional
                                                                        Umum
                                                                    </option>
                                                                </select>
                                                                @error('jenis_aparatur')
                                                                    <strong
                                                                        style="color: red;">{{ $message }}</strong>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>

                                                <h6>Personal Data</h6>
                                                <fieldset>
                                                    <div class="row justify-content-center">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>No HP<span class="text-danger">*</span></label>
                                                                <input type="number" required
                                                                    value="{{ old('no_hp') }}" class="form-control"
                                                                    name="no_hp">
                                                                @error('no_hp')
                                                                    <strong
                                                                        style="color: red;">{{ $message }}</strong>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
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
                                                        <div class="col-md-3 wrapper-select jenis-jabatan"
                                                            style="display: none;">
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
                                                                    <strong
                                                                        style="color: red;">{{ $message }}</strong>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 jenis-eselon" style="display: none;">
                                                            <div class="form-group">
                                                                <label>Jenis Eselon<span
                                                                        class="text-danger">*</span></label>
                                                                <select name="jenis_eselon" required
                                                                    class="custom-select">
                                                                    <option selected disabled value="">- Pilih
                                                                        Eselon -</option>
                                                                    <option @selected(old('jenis_eselon') == '1')
                                                                        value="1">Eselon 1</option>
                                                                    <option @selected(old('jenis_eselon') == '2')
                                                                        value="2">Eselon 2</option>
                                                                    <option @selected(old('jenis_eselon') == '3')
                                                                        value="3">Eselon 3</option>
                                                                    <option @selected(old('jenis_eselon') == '4')
                                                                        value="4">Eselon 4</option>
                                                                </select>
                                                                @error('jenis_eselon')
                                                                    <strong
                                                                        style="color: red;">{{ $message }}</strong>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 jenis-jabatan-umum"
                                                            style="display: none;">
                                                            <div class="form-group">
                                                                <label>Jenis Jabatan<span
                                                                        class="text-danger">*</span></label>
                                                                <select name="jenis_jabatan_umum" required
                                                                    class="custom-select">
                                                                    <option selected disabled value="">- Pilih
                                                                        Jabatan -</option>
                                                                    @foreach ($rolesUmum as $role)
                                                                        <option @selected(old('jenis_jabatan_umum') == $role->name)
                                                                            value="{{ $role->name }}">
                                                                            {{ $role->display_name }}</option>
                                                                    @endforeach
                                                                    <option @selected(old('jenis_jabatan_umum') == 'lainnya')
                                                                        value="lainnya">Lainnya</option>
                                                                </select>
                                                                @error('jenis_jabatan_umum')
                                                                    <strong
                                                                        style="color: red;">{{ $message }}</strong>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 jenis-jabatan-text"
                                                            style="display: none;">
                                                            <div class="form-group">
                                                                <label>Jenis Jabatan Baru<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text"
                                                                    value="{{ old('jenis_jabatan_text') }}" required
                                                                    class="form-control" name="jenis_jabatan_text">
                                                                @error('jenis_jabatan_text')
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
                                                                    <option value="kab_kota">Kabupaten / Kota
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
                                                                <select required name="kab_kota_id" id="kab_kota_id"
                                                                    name="kab_kota_id" class="custom-select">
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
                                                                        <option
                                                                            class="{{ in_array($nomenklatur->id, [4, 5]) ? 'is_kab_kota' : '' }}"
                                                                            @selected(old('nomenklatur_perangkat_daerah_id') == $nomenklatur->id)
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
    <script src="{{ asset('assets/js/pages/register.js') }}"></script>
    <script>
        if (localStorage.getItem('jenis_aparatur') !== '') {
            $('select[name="jenis_jabatan"]').each(function(index, element) {
                element.value = "{{ old('jenis_jabatan') }}"
            });
        }
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
    @if (old('tingkat_aparatur') !== null)
        <script>
            if ("{{ old('tingkat_aparatur') }}" == 'provinsi') {
                $('.kab-kota-aparatur').hide();
            } else {
                $('.kab-kota-aparatur').show();
            }
        </script>
    @endif
    @if (old('jenis_jabatan_umum') !== null)
        <script>
            if ("{{ old('jenis_jabatan_umum') }}" == 'lainnya') {
                $('.jenis-jabatan-text').show();
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
