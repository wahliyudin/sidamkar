@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-body" style="padding-top: 3rem;">
                <div class="row">
                    <div class="col-md-4 d-flex justify-content-center">
                        <div class="avatar avatar-xl me-3">
                            <img style="width: 180px; height: 180px;" src="{{ asset('assets/images/faces/3.jpg') }}"
                                alt="" srcset="">
                        </div>
                    </div>
                    <div class="row col-md-8 justify-content-center">
                        <div class="row col-md-12" style="border: 2px solid #E5E5E5;border-radius: 6px;padding: 4px;">
                            <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="basicInput">Nama Lengkap</label>
                                    <input type="text" disabled class="form-control" name="nama"
                                        value="{{ old('nama', $user->userAparatur?->nama) }}">
                                    @error('nama')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Tempat Tanggal Lahir</label>
                                    <div class="row">
                                        <div class="col-md-6" style="padding-right: .3rem !important;">
                                            <input type="text" disabled class="form-control w-100" name="tempat_lahir"
                                                value="{{ old('tempat_lahir', $user->userAparatur?->tempat_lahir) }}"
                                                placeholder="" style="width: 50%">
                                            @error('tempat_lahir')
                                                <span class="text-danger text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6" style="padding-left: .3rem !important;">
                                            <input type="date" disabled class="form-control w-100" name="tanggal_lahir"
                                                value="{{ old('tanggal_lahir', $user->userAparatur?->tanggal_lahir) }}"
                                                placeholder="" style="width: 50%">
                                            @error('tanggal_lahir')
                                                <span class="text-danger text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="basicInput">Jenis Kelamin</label>
                                    <select disabled class="jenis_kelamin form-select" name="jenis_kelamin">
                                        <option disabled selected>- Pilih Jenis Kelamin -</option>
                                        <option @selected(old('jenis_kelamin', $user->userAparatur?->jenis_kelamin) == 'L') value="L">Laki - Laki</option>
                                        <option @selected(old('jenis_kelamin', $user->userAparatur?->jenis_kelamin) == 'P') value="P">Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label for="basicInput">Pendidikan Terakhir</label>
                                    <select disabled class="pen_terakhir form-select" name="pendidikan_terakhir">
                                        <option disabled selected>- Pilih Pendidikan Terakhir -</option>
                                        <option @selected(old('pendidikan_terakhir', $user->userAparatur?->pendidikan_terakhir) == '1') value="1">SMA/SMK/Sederajat</option>
                                        <option @selected(old('pendidikan_terakhir', $user->userAparatur?->pendidikan_terakhir) == '2') value="2">D3</option>
                                        <option @selected(old('pendidikan_terakhir', $user->userAparatur?->pendidikan_terakhir) == '3') value="3">S1/D4</option>
                                        <option @selected(old('pendidikan_terakhir', $user->userAparatur?->pendidikan_terakhir) == '4') value="4">S2</option>
                                    </select>
                                    @error('pendidikan_terakhir')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="basicInput">Privinsi</label>
                                    <select disabled class="provinsi_id form-select" name="provinsi_id">
                                        <option selected>- Pilih Privinsi -</option>
                                        @foreach ($provinsis as $prov)
                                            <option value="{{ $prov->id }}" @selected(old('provinsi_id', $user->userAparatur?->provinsi_id) == $prov->id)>
                                                {{ $prov->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="basicInput">Kabupaten / Kota</label>
                                    <select disabled class="kab_kota_id form-select" name="kab_kota_id">
                                        <option disabled selected>- Pilih Kabupaten / Kota -</option>
                                        @foreach ($kab_kota as $kabkota)
                                            <option value="{{ $kabkota->id }}" @selected(old('kab_kota_id', $user->userAparatur?->kab_kota_id) == $kabkota->id)>
                                                {{ $kabkota->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row col-md-12" style="border: 2px solid #E5E5E5;border-radius: 6px;padding: 4px;">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="basicInput">NIP</label>
                                    <input type="number" disabled class="form-control" name="nip"
                                        value="{{ old('nip', $user->userAparatur?->nip) }}">
                                    @error('nip')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="basicInput">Jabatan</label>
                                    <input type="text" name="jabatan" disabled class="form-control" placeholder="" value="{{ Auth::user()->roles()->first()->display_name }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="basicInput">Nomor Karpeg</label>
                                        <input disabled type="number" name="nomor_karpeg" class="form-control"
                                            value="{{ old('nomor_karpeg', $user->userAparatur?->nomor_karpeg) }}">
                                        @error('nomor_karpeg')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="basicInput">Pangkat / Golongan / TMT</label>
                                        <select disabled class="pangkat_golongan form-select" name="pangkat_golongan_tmt_id"
                                            name="pangkat">
                                            <option disabled selected>- Pilih Pangkat / Golongan / TMT -</option>
                                            @foreach ($pangkats as $pangkat)
                                                <option @selected(old('pangkat_golongan_tmt_id', $user->userAparatur?->pangkat_golongan_tmt_id) == $pangkat->id) value="{{ $pangkat->id }}">
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
                            <li class="doc-item">
                                <a href="" class="d-flex align-items-center">
                                    <img src="{{ asset('assets/images/template/icon-dokumen-png-0 1.png') }}"
                                        alt="">
                                    <p>File dokumen ABCD.pdf</p>
                                </a>
                            </li>
                            <li class="doc-item">
                                <a href="" class="d-flex align-items-center">
                                    <img src="{{ asset('assets/images/template/icon-dokumen-png-0 1.png') }}"
                                        alt="">
                                    <p>File dokumen ABCD.pdf</p>
                                </a>
                            </li>
                            <li class="doc-item">
                                <a href="" class="d-flex align-items-center">
                                    <img src="{{ asset('assets/images/template/icon-dokumen-png-0 1.png') }}"
                                        alt="">
                                    <p>File dokumen ABCD.pdf</p>
                                </a>
                            </li>
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
                            <li class="doc-item">
                                <div class="d-flex align-items-center">
                                    <span class="custom-badge-sm custom-badge-blue-light">01</span>
                                    <p>Pelatihan pembinaan dan pengawasan</p>
                                </div>
                            </li>
                            <li class="doc-item">
                                <div class="d-flex align-items-center">
                                    <span class="custom-badge-sm custom-badge-yellow-light">02</span>
                                    <p>Pelatihan pembinaan dan pengawasan</p>
                                </div>
                            </li>
                            <li class="doc-item">
                                <div class="d-flex align-items-center">
                                    <span class="custom-badge-sm custom-badge-purple-light">03</span>
                                    <p>Pelatihan pembinaan dan pengawasan</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @if (in_array($user->status_akun, [0, 2]))
            <div class="row">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-red" onclick="tolak({{ $user->id }})">TOLAK</button>
                    <button class="btn btn-blue ms-2" onclick="verifikasi({{ $user->id }})">VERIFIKASI</button>
                </div>
            </div>
        @endif
    </section>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/pages/my-data.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <style>
        .custom-badge {
            border-radius: 5px;
            padding: .5rem .8rem;
        }

        .custom-badge-sm {
            border-radius: 5px;
            padding: .3rem .6rem;
        }

        .custom-badge>img {
            width: 1.3rem;
        }

        .custom-badge.custom-badge-purple-light,
        .custom-badge-sm.custom-badge-purple-light {
            background-color: rgba(219, 90, 238, 0.4);
            color: #DB5AEE;
        }

        .custom-badge.custom-badge-green {
            background-color: #1AD598;
        }

        .custom-badge.custom-badge-yellow-light,
        .custom-badge-sm.custom-badge-yellow-light {
            background-color: rgba(255, 181, 54, 0.298039);
            color: #FFB536;
        }

        .custom-badge.custom-badge-blue-light,
        .custom-badge-sm.custom-badge-blue-light {
            background-color: rgba(33, 126, 253, 0.298039);
            color: #217EFD;
        }

        .doc-wrapper {
            list-style: none;
            padding: 0 !important;
        }

        .doc-wrapper .doc-item:not(:first-child) {
            margin-top: .8rem;
        }

        .doc-wrapper .doc-item p {
            margin: 0 0 0 1rem;
        }

        .choices__inner {
            background-color: white !important;
        }

        .choices.is-disabled .choices__inner,
        .choices.is-disabled .choices__list.choices__list--single {
            background-color: #e9ecef !important;
        }

        .form-control:disabled {
            cursor: not-allowed;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <link rel="stylesheet" href="{{ asset('assets/extensions/choices.js/public/assets/styles/choices.css') }}">
@endsection
@section('js')
    <script src="{{ asset('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-element-select.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>
    <script>
        function tolak(id) {
            swal({
                title: "Tolak?",
                text: "Masukan alasan kenapa ditolak!",
                type: "warning",
                input: 'text',
                inputPlaceholder: 'Catatan',
                showCancelButton: true,
                confirmButtonText: 'Ya, tolak!',
                cancelButtonText: "Batal",
                showLoaderOnConfirm: true,
                inputValidator: (value) => {
                    if (!value) {
                        return 'Catatan tidak boleh kosong!'
                    }
                },
                preConfirm: async (value) => {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    return await $.ajax({
                        type: 'POST',
                        url: url('/kab-kota/verifikasi-aparatur/' + id + '/reject'),
                        data: {
                            _token: CSRF_TOKEN,
                            catatan: value
                        },
                        dataType: 'JSON'
                    });
                },
            }).then(function(e) {
                if (e.value.success == true) {
                    swal("Selesai!", e.value.message, "success").then(() => {
                        location.reload();
                    });
                } else {
                    swal("Error!", e.value.message, "error");
                }
            })
        }

        function verifikasi(id) {
            swal({
                title: "Perifikasi?",
                text: "Please ensure and then confirm!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Ya, verfikasi!",
                cancelButtonText: "Batal",
                reverseButtons: !0,
                showLoaderOnConfirm: true,
                preConfirm: async () => {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    return await $.ajax({
                        type: 'POST',
                        url: url('/kab-kota/verifikasi-aparatur/' + id + '/verified'),
                        data: {
                            _token: CSRF_TOKEN
                        },
                        dataType: 'JSON'
                    });
                },
            }).then(function(e) {
                if (e.value.success == true) {
                    swal("Selesai!", e.value.message, "success").then(() => {
                        location.reload();
                    });
                } else {
                    swal("Error!", e.value.message, "error");
                }
            }, function(dismiss) {
                return false;
            })
        }
    </script>
@endsection
