@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="card">
            <div class="d-flex px-4 container-control justify-content-between align-items-center">
                <div class="d-flex mt-4">

                    <div class="icon-back mb-2"><a
                            href=" {{ $user->userPejabatStruktural->tingkat_aparatur == 'provinsi' ? route('provinsi.manajemen-user.struktural') : route('kab-kota.manajemen-user.struktural') }}">
                            <i class="fa-solid fa-arrow-left-long" style="cursor: pointer"></i></a>
                    </div>
                    <div class="ms-2">
                        <h5>Data {{ old('nama', $user->userPejabatStruktural->nama) }}</h5>

                    </div>
                </div>
            </div>
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
                                        <input disabled type="text" class="form-control" name="nama"
                                            value="{{ old('nama', $user->userPejabatStruktural?->nama) }}">
                                        @error('nama')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Tempat Tanggal Lahir</label>
                                        <div class="row">
                                            <div class="col-md-6" style="padding-right: .3rem !important;">
                                                <input disabled type="text" class="form-control w-100"
                                                    name="tempat_lahir"
                                                    value="{{ old('tempat_lahir', $user->userPejabatStruktural?->tempat_lahir) }}"
                                                    placeholder="" style="width: 50%">
                                                @error('tempat_lahir')
                                                    <span class="text-danger text-sm">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6" style="padding-left: .3rem !important;">
                                                <input disabled type="date" class="form-control w-100"
                                                    name="tanggal_lahir"
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
                                        <select disabled class="pen_terakhir form-select" name="pendidikan_terakhir">
                                            <option disabled selected>- Pilih Pendidikan Terakhir -</option>
                                            <option @selected(old('pendidikan_terakhir', $user?->userPejabatStruktural?->pendidikan_terakhir) == '1') value="1">SMA/SMK/Sederajat</option>
                                            <option @selected(old('pendidikan_terakhir', $user?->userPejabatStruktural?->pendidikan_terakhir) == '2') value="2">D3</option>
                                            <option @selected(old('pendidikan_terakhir', $user?->userPejabatStruktural?->pendidikan_terakhir) == '3') value="3">S1/D4</option>
                                            <option @selected(old('pendidikan_terakhir', $user?->userPejabatStruktural?->pendidikan_terakhir) == '4') value="4">S2</option>
                                            <option @selected(old('pendidikan_terakhir', $user?->userPejabatStruktural?->pendidikan_terakhir) == '5') value="5">S3</option>
                                        </select>
                                        @error('pendidikan_terakhir')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="basicInput">Jenis Kelamin</label>
                                        <select disabled class="jenis_kelamin form-select" name="jenis_kelamin">
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
                                                    {{-- <input id="ttd" type="file" accept="image/png, image/jpeg"
                                                        style="display: none;" name="ttd" id=""> --}}
                                                    <label for="ttd">
                                                        <img src="{{ isset($user->userPejabatStruktural?->file_ttd) ? $user->userPejabatStruktural?->file_ttd : asset('assets/images/faces/3.jpg') }}"
                                                            alt="ttd" class="image preview-ttd"
                                                            style="min-width:290px; min-height: 145px; max-width:290px; max-height: 145px; object-fit: cover; border-radius: 10px;">

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
                                        <input type="number" disabled class="form-control" name="nip"
                                            value="{{ old('nip', $user->userPejabatStruktural?->nip) }}">
                                        @error('nip')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="basicInput">Nomor Karpeg</label>
                                        <input disabled type="number" name="nomor_karpeg" class="form-control"
                                            value="{{ old('nomor_karpeg', $user->userPejabatStruktural?->nomor_karpeg) }}">
                                        @error('nomor_karpeg')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="basicInput">Pangkat / Golongan </label>
                                        <select disabled class="pangkat_golongan form-select"
                                            name="pangkat_golongan_tmt_id" name="pangkat">
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="basicInput">GOLONGAN TMT</label>
                                        <input type="date" disabled name="golongan_tmt" class="form-control"
                                            value="{{ old('golongan_tmt', $user->userPejabatStruktural?->golongan_tmt) }}">
                                        @error('golongan_tmt')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="basicInput">Jabatan</label>
                                        <ul>
                                            @forelse ($user->roles as $role)
                                                <li>{{ $role->display_name }}</li>
                                            @empty
                                                <p style="font-style:italic;">Belum Diverifikasi</p>
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="basicInput">Jabatan TMT</label>
                                        <input type="date" disabled name="jabatan_tmt" class="form-control"
                                            value="{{ old('jabatan_tmt', $user->userPejabatStruktural?->jabatan_tmt) }}">
                                        @error('jabatan_tmt')
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
                    </div>
                </div>
            </div>
        </div>
    </section>
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
