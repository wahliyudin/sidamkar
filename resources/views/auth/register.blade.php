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
                            <div class="card mb-0 overflow-hidden" style="border-radius: 10px">
                                <ul class="nav nav-tabs nav-justified bg-light rounded-top mb-0">
                                    <li class="nav-item">
                                        <a href="#login-tab1"
                                            class="h-100 nav-link border-y-0 border-left-0 active d-flex justify-content-center align-items-center"
                                            data-toggle="tab">
                                            <h6 class="my-1">Register Pejabat Fungsional</h6>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#login-tab2"
                                            class="h-100 nav-link border-y-0 border-right-0 d-flex justify-content-center align-items-center"
                                            data-toggle="tab">
                                            <h6 class="my-1">Register Pejabat Struktural</h6>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#login-tab3"
                                            class="h-100 nav-link border-y-0 border-right-0 d-flex justify-content-center align-items-center"
                                            data-toggle="tab">
                                            <h6 class="my-1">Register Admin Prov & Kab/kota</h6>
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
                                                                <label>Jabatan<span class="text-danger">*</span></label>
                                                                <select name="jabatan" class="custom-select">
                                                                    <option selected disabled>- Pilih Jabatan -</option>
                                                                    <option value="damkar">Damkar</option>
                                                                    <option value="analis_kebakaran">Analis Kebakaran
                                                                    </option>
                                                                </select>
                                                                @error('jabatan')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
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
                                                                <input type="date" name="tanggal_lahir"
                                                                    class="form-control" placeholder="Tanggal Lahir">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Jenis Kelamin<span
                                                                        class="text-danger">*</span></label>
                                                                <select name="jenis_kelamin" class="custom-select">
                                                                    <option selected disabled>- Pilih Jenis Kelamin -
                                                                    </option>
                                                                    <option value="L">Laki - Laki</option>
                                                                    <option value="P">Perempuan</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>NIP / Nomor Register<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="number" name="nip"
                                                                    class="form-control"
                                                                    placeholder="NIP / Nomor Register">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Pangkat / Golongan / TMT<span
                                                                        class="text-danger">*</span></label>
                                                                <select name="pangkat_golongan_tmt"
                                                                    class="custom-select">
                                                                    <option selected disabled>- Pilih Jabatan -</option>
                                                                    <option value="IIIA">IIIA</option>
                                                                    <option value="IIIB">IIIB</option>
                                                                    <option value="IIIC">IIIC</option>
                                                                    <option value="IIID">IIID</option>
                                                                    <option value="IVA">IVA</option>
                                                                    <option value="IVB">IVB</option>
                                                                    <option value="IVC">IVC</option>
                                                                    <option value="IVD">IVD</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>No KarPeg<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="number" name="nomor_karpeg"
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Pendidikan Terakhir<span
                                                                        class="text-danger">*</span></label>
                                                                <select name="pendidikan_terakhir"
                                                                    class="custom-select">
                                                                    <option selected disabled>- Pilih Pendidikan
                                                                        Terakhir -</option>
                                                                    <option value="1">SMA/Sederajat</option>
                                                                    <option value="2">D3</option>
                                                                    <option value="3">S1/D4</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Jenjang<span
                                                                        class="text-danger">*</span></label>
                                                                <select name="jenjang" class="custom-select">
                                                                    <option selected disabled>- Pilih Jenjang -
                                                                    </option>
                                                                    <option value="senior">Senior</option>
                                                                    <option value="junior">Junior</option>
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
                                            <form class="wizard-form steps-validation" method="POST"
                                                action="{{ route('register') }}" enctype="multipart/form-data"
                                                data-fouc>
                                                @csrf
                                                <h6>Admin Level</h6>
                                                <fieldset>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Tingkat Admin<span
                                                                        class="text-danger">*</span></label>
                                                                <select name="jabatan" class="custom-select">
                                                                    <option selected disabled>- Pilih Tingkat -</option>
                                                                    <option value="atasan_langsung">Atasan Langsung
                                                                    </option>
                                                                    <option value="penilai_ak">Pejabat Penilai AK
                                                                    </option>
                                                                    <option value="penetap_ak">Pejabat Penetap AK
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
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

                                                    </div>

                                                    <div class="row justify-content-center">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">Tanda Tangan</label>
                                                                <label class="input-file">
                                                                    <div class="icon">
                                                                        <i class="fa-solid fa-cloud-arrow-up"></i>
                                                                        <p style="margin: 0 !important;">Pilih file
                                                                            tanda
                                                                            tangan</p>
                                                                    </div>
                                                                    <input style="display: none;" type="file"
                                                                        name="file_ttd" id="">
                                                                    <input style="display: none;" type="text"
                                                                        name="value_ttd">
                                                                    <img
                                                                        class="file_ttd-preview img-fluid mb-3 rounded">
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>

                                                <h6>Personal data</h6>
                                                <fieldset>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Nama Lengkap <span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" name="nama"
                                                                    class="form-control" placeholder="Nama Lengkap">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Tempat Lahir<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" name="tempat_lahir"
                                                                    class="form-control" placeholder="Tempat Lahir">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Tanggal Lahir<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="date" name="tanggal_lahir"
                                                                    class="form-control" placeholder="Tanggal Lahir">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Jenis Kelamin<span
                                                                        class="text-danger">*</span></label>
                                                                <select name="jenis_kelamin" class="custom-select">
                                                                    <option selected disabled>- Pilih Jenis Kelamin -
                                                                    </option>
                                                                    <option value="L">Laki - Laki</option>
                                                                    <option value="P">Perempuan</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Pendidikan Terakhir<span
                                                                        class="text-danger">*</span></label>
                                                                <select name="pendidikan_terakhir"
                                                                    class="custom-select">
                                                                    <option selected disabled>- Pilih Pendidikan
                                                                        Terakhir -</option>
                                                                    <option value="1">SMA/Sederajat</option>
                                                                    <option value="2">D3</option>
                                                                    <option value="3">S1/D4</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>NIP / Nomor Register<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="number" name="nip"
                                                                    class="form-control"
                                                                    placeholder="NIP / Nomor Register">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Pangkat / Golongan / TMT<span
                                                                        class="text-danger">*</span></label>
                                                                <select name="pangkat_golongan_tmt"
                                                                    class="custom-select">
                                                                    <option selected disabled>- Pilih Jabatan -</option>
                                                                    <option value="IIIA">IIIA</option>
                                                                    <option value="IIIB">IIIB</option>
                                                                    <option value="IIIC">IIIC</option>
                                                                    <option value="IIID">IIID</option>
                                                                    <option value="IVA">IVA</option>
                                                                    <option value="IVB">IVB</option>
                                                                    <option value="IVC">IVC</option>
                                                                    <option value="IVD">IVD</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Nomenklatur Perangkat Daerah<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="number" class="form-control"
                                                                    name="nomenklatur_jabatan" id="">
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
                                            <form class="wizard-form steps-validation" method="POST"
                                                action="{{ route('register') }}" enctype="multipart/form-data"
                                                data-fouc>
                                                @csrf
                                                <h6>Admin Level</h6>
                                                <fieldset>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Tingkat Admin<span
                                                                        class="text-danger">*</span></label>
                                                                <select name="jabatan" class="custom-select">
                                                                    <option selected disabled>- Pilih Tingkat -</option>
                                                                    <option value="kab_kota">kab_kota
                                                                    </option>
                                                                    <option value="provinsi">provinsi
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
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
                                                        <div class="col-md-3">
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
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Nomenklatur Perangkat Daerah<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="number" class="form-control"
                                                                    name="nomenklatur_perangkat_daerah"
                                                                    id="">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row justify-content-center">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">Surat Permohonan</label>
                                                                <label class="input-file">
                                                                    <div class="icon">
                                                                        <i class="fa-solid fa-cloud-arrow-up"></i>
                                                                        <p style="margin: 0 !important;">Pilih file
                                                                            surat</p>
                                                                    </div>
                                                                    <input style="display: none;" type="file"
                                                                        name="file_permohonan" id="">
                                                                    <input style="display: none;" type="text"
                                                                        name="value_permohonan">
                                                                    <img
                                                                        class="file_permohonan-preview img-fluid mb-3 rounded">
                                                                </label>
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
    <script src="{{ asset('assets/extensions/fontawesome/all.min.js') }}"></script>
    <script>
        $(function() {

            // First register any plugins
            $.fn.filepond.registerPlugin(FilePondPluginImagePreview);

            // Turn input element into a pond
            // $('.with-validation-images').filepond();
            FilePond.registerPlugin(
                FilePondPluginImagePreview
            );

            // Select the file input and use
            // create() to turn it into a pond
            pond = FilePond.create(
                document.querySelector('.with-validation-images')
            );


            // document.addEventListener('FilePond:addFile', (e) => {
            //     console.log(e.getFile());
            // });
            document.addEventListener('FilePond:addfile', (e) => {
                console.log('File added', e.detail.file);
            });

            $('input[name="file_ttd"]').change(function(e) {
                e.preventDefault();
                const imgPreview = document.querySelector('.file_ttd-preview');
                previewImage(this, imgPreview);
                $('input[name="value_ttd"]').val('ada');
            });
            $('input[name="file_permohonan"]').change(function(e) {
                e.preventDefault();
                const imgPreview = document.querySelector('.file_permohonan-preview');
                previewImage(this, imgPreview);
                $('input[name="value_permohonan"]').val('ada');
            });

            function previewImage(image, imgPreview) {
                imgPreview.style.display = 'block';

                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);

                oFReader.onload = function(oFREvent) {
                    imgPreview.src = oFREvent.target.result;
                }
                $('.input-file .icon').css('display', 'none');
            }
            // document.addEventListener('FilePond:loaded', (e) => {
            //     console.log('FilePond ready for use', e.detail);
            //     // console.log(e.getFile());
            // });
            // // Listen for addfile event

            // Manually add a file using the addfile method
            // $('.my-pond').first().filepond('addFile', 'index.html').then(function(file) {
            //     console.log('file added', file);
            // });
            $('select[name="provinsi_id"]').each(function(index, element) {
                $(element).change(function(e) {
                    e.preventDefault();
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
        });
    </script>

</body>

</html>
