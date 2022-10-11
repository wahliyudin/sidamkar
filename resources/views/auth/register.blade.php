<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register</title>
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
        }

        .nav-tabs .nav-link {
            background-color: rgba(234, 58, 61, 0.5);
            color: white;
        }

        .nav-tabs .nav-link:hover {
            color: white;
        }
    </style>

    <link rel="stylesheet" href="{{ asset('assets/extensions/filepond/filepond.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/filepond.css') }}">
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
                    </div>
                    <div class="page-content login-cover" style="z-index: 99;">

                        <!-- Content area -->
                        <div class="form-wrapper d-flex justify-content-center align-items-center">

                            <!-- Login form -->

                            <div class="card mb-0 overflow-hidden" style="border-radius: 10px">
                                <ul class="nav nav-tabs nav-justified bg-light rounded-top mb-0">
                                    <li class="nav-item"><a href="#login-tab1"
                                            class="h-100 nav-link border-y-0 border-left-0 active d-flex justify-content-center align-items-center"
                                            data-toggle="tab">
                                            <h6 class="my-1">Register Aparatur</h6>
                                        </a></li>
                                    <li class="nav-item"><a href="#login-tab2"
                                            class="h-100 nav-link border-y-0 border-right-0 d-flex justify-content-center align-items-center"
                                            data-toggle="tab">
                                            <h6 class="my-1">Register Pejabat Struktural</h6>
                                        </a></li>
                                    <li class="nav-item"><a href="#login-tab3"
                                            class="h-100 nav-link border-y-0 border-right-0 d-flex justify-content-center align-items-center"
                                            data-toggle="tab">
                                            <h6 class="my-1">Register Admin Prov & Kab/kota</h6>
                                        </a></li>

                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="login-tab1">
                                        <!-- Wizard with validation -->
                                        <div class="header-wizard-form">

                                            <form class="wizard-form steps-validation" method="POST"
                                                action="{{ route('register') }}" data-fouc>
                                                @csrf
                                                <input type="hidden" name="_register" value="aparatur">
                                                <h6>Admin Level</h6>
                                                <fieldset>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Provinsi<span
                                                                        class="text-danger">*</span></label>
                                                                <select name="provinsi_id" id="provinsi_id"
                                                                    class="custom-select">
                                                                    <option selected disabled>- Pilih Provinsi -
                                                                    </option>
                                                                    @foreach ($provinsis as $provinsi)
                                                                        <option value="{{ $provinsi->id }}">
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
                                                                <select name="kab_kota_id" id="kab_kota_id"
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
                                                                <label>Tingkat Admin<span
                                                                        class="text-danger">*</span></label>
                                                                <select name="tingkat_admin" class="custom-select">
                                                                    <option value="1" selected>1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                </select>
                                                                @error('tingkat_admin')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row justify-content-center">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Nomenklatur Perangkat Daerah<span
                                                                        class="text-danger">*</span></label>
                                                                <select name="nopeda" class="custom-select">
                                                                    <option value="1" selected>1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>

                                                <h6>Personal data</h6>
                                                <fieldset>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Nama Lengkap <span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" name="nama"
                                                                    class="form-control" placeholder="Nama Lengkap">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Tempat Lahir<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" name="tempat_lahir"
                                                                    class="form-control" placeholder="Tempat Lahir">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Tanggal Lahir<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="date" name="Tempat_lahir"
                                                                    class="form-control" placeholder="Tanggal Lahir">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Pendidikan Terakhir<span
                                                                        class="text-danger">*</span></label>
                                                                <select name="birth-month" class="custom-select">
                                                                    <option value="1" selected>SMA</option>
                                                                    <option value="2">D3</option>
                                                                    <option value="3">S1/D4</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>NIP / Nomor Register<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" name="NIP"
                                                                    class="form-control"
                                                                    placeholder="NIP / Nomor Register">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Pangkat / Golongan / TMT<span
                                                                        class="text-danger">*</span></label>
                                                                <select name="birth-month" class="custom-select">
                                                                    <option value="1" selected>SMA</option>
                                                                    <option value="2">D3</option>
                                                                    <option value="3">S1/D4</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row justify-content-center">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Jabatan<span
                                                                        class="text-danger">*</span></label>
                                                                <select name="birth-month" class="custom-select">
                                                                    <option value="1" selected>SMA</option>
                                                                    <option value="2">D3</option>
                                                                    <option value="3">S1/D4</option>
                                                                </select>
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
                                                                    class="form-control">
                                                                @error('email')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Username<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" name="username"
                                                                    class="form-control">
                                                            </div>
                                                            @error('username')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
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
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
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
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
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
                                        <div class="header-wizard-form">
                                            <form class="wizard-form steps-validation" action="#" data-fouc>
                                                <h6>Admin Level</h6>
                                                <fieldset>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Jenis Jabatan Struktural<span
                                                                        class="text-danger">*</span></label>
                                                                <select name="jjs" class="custom-select">
                                                                    <option value="1" selected>Atasan Langsung
                                                                    </option>
                                                                    <option value="2">Ketua Tim Penilai AK
                                                                    </option>
                                                                    <option value="3">Pejabat Penetap AK</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Tingkat Admin<span
                                                                        class="text-danger">*</span></label>
                                                                <select name="birth-month" class="custom-select">
                                                                    <option value="1" selected>1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Kabupaten / Kota<span
                                                                        class="text-danger">*</span></label>
                                                                <select name="KabKot" class="custom-select">
                                                                    <option value="1" selected>1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row justify-content-center">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Provinsi<span
                                                                        class="text-danger">*</span></label>
                                                                <select name="provinsi" class="custom-select">
                                                                    <option value="1" selected>1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Nomenklatur Perangkat Daerah<span
                                                                        class="text-danger">*</span></label>
                                                                <select name="nopeda" class="custom-select">
                                                                    <option value="1" selected>1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">Tanda Tangan</label>
                                                                <input type="file" class="with-validation-images"
                                                                    data-max-file-size="1MB" data-max-files="3">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>


                                                <h6>Personal data</h6>
                                                <fieldset>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Nama Lengkap <span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" name="name"
                                                                    class="form-control" placeholder="Nama Lengkap">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Tempat Lahir<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" name="tempat_lahir"
                                                                    class="form-control" placeholder="Tempat Lahir">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Tanggal Lahir<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="date" name="Tempat_lahir"
                                                                    class="form-control" placeholder="Tanggal Lahir">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Pendidikan Terakhir<span
                                                                        class="text-danger">*</span></label>
                                                                <select name="birth-month" class="custom-select">
                                                                    <option value="1" selected>SMA</option>
                                                                    <option value="2">D3</option>
                                                                    <option value="3">S1/D4</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>NIP / Nomor Register<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" name="NIP"
                                                                    class="form-control"
                                                                    placeholder="NIP / Nomor Register">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Pangkat / Golongan / TMT<span
                                                                        class="text-danger">*</span></label>
                                                                <select name="birth-month" class="custom-select">
                                                                    <option value="1" selected>SMA</option>
                                                                    <option value="2">D3</option>
                                                                    <option value="3">S1/D4</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row justify-content-center">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Jabatan<span
                                                                        class="text-danger">*</span></label>
                                                                <select name="birth-month" class="custom-select">
                                                                    <option value="1" selected>SMA</option>
                                                                    <option value="2">D3</option>
                                                                    <option value="3">S1/D4</option>
                                                                </select>
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
                                                                    class="form-control">
                                                                @error('email')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Username<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" name="username"
                                                                    class="form-control">
                                                            </div>
                                                            @error('username')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
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
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
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
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>
                                        <!-- /remote content source -->
                                    </div>
                                    <div class="tab-pane fade" id="login-tab3">
                                        <!-- Wizard with validation -->
                                        <div class="header-wizard-form">
                                            <form class="wizard-form steps-validation" action="#" data-fouc>
                                                <h6>Admin Level</h6>
                                                <fieldset>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Tingkat Admin<span
                                                                        class="text-danger">*</span></label>
                                                                <select name="birth-month" class="custom-select">
                                                                    <option value="1" selected>1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Kabupaten / Kota<span
                                                                        class="text-danger">*</span></label>
                                                                <select name="KabKot" class="custom-select">
                                                                    <option value="1" selected>1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Nomenklatur Perangkat Daerah<span
                                                                        class="text-danger">*</span></label>
                                                                <select name="nopeda" class="custom-select">
                                                                    <option value="1" selected>1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row justify-content-center">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Provinsi<span
                                                                        class="text-danger">*</span></label>
                                                                <select name="provinsi" class="custom-select">
                                                                    <option value="1" selected>1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                </select>
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
                                                                    class="form-control">
                                                                @error('email')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Username<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" name="username"
                                                                    class="form-control">
                                                            </div>
                                                            @error('username')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
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
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
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
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
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
    <script src="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}">
    </script>
    <script src="{{ asset('assets/extensions/filepond/filepond.jquery.js') }}"></script>
    <script>
        $(function() {

            // First register any plugins
            $.fn.filepond.registerPlugin(FilePondPluginImagePreview);

            // Turn input element into a pond
            $('.with-validation-images').filepond();

            // Listen for addfile event
            $('.with-validation-images').on('FilePond:addfile', function(e) {
                console.log('file added event', e);
            });

            // Manually add a file using the addfile method
            // $('.my-pond').first().filepond('addFile', 'index.html').then(function(file) {
            //     console.log('file added', file);
            // });
            $('select[name="provinsi_id"]').each(function(index, element) {
                $(element).change(function(e) {
                    e.preventDefault();
                    loadKabKota(this.value, $(element.parentElement.parentElement.parentElement)
                        .find(
                            '#kab_kota_id'))
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
                                var selected = kabupaten_id == model.id ? 'selected=""' : ''
                                $(kabupaten).append('<option value="' + model.id + '" ' +
                                    selected +
                                    '>' +
                                    model.nama + '</option>');
                            })
                            resolve()
                        })
                })
            }
        });
    </script>
</body>

</html>
