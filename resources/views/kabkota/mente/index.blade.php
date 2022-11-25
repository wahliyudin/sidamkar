@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-md-4 px-2">
                <div class="card">
                    <div class="card-body py-3 px-3" style="height: 80px;">
                        <div class="d-flex align-items-center h-100">
                            <div class="circle circle-green">
                                <i class="fa-solid
                                fa-stopwatch"></i>
                            </div>
                            <div class="d-flex flex-column ms-2">
                                <p style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                    Periode
                                </p>
                                <h2 style="font-family: 'Roboto'; font-size: 16px; color: #06152B;" class="target">
                                    {{ Carbon\Carbon::make($periode->awal)->translatedFormat('F Y') . ' - ' . Carbon\Carbon::make($periode->akhir)->translatedFormat('F Y') }}
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 px-2">
                <div class="card">
                    <div class="card-body py-3 px-3" style="height: 80px;">
                        <div class="d-flex align-items-center h-100">
                            <div class="circle circle-blue">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="d-flex flex-column ms-2" style="flex-grow: 1;">
                                <p style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                    Penilai AK
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <h2 style="font-family: 'Roboto';color: #06152B; font-size: 16px" class="target">
                                        {{ $penilaiAndPenetap?->penilaiAngkaKredit?->userPejabatStruktural?->nama ?? '-' }}
                                    </h2>
                                    <button class="tambah-penilai" data-bs-toggle="modal" data-bs-target="#tambahPenilai">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 px-2">
                <div class="card">
                    <div class="card-body py-3 px-3" style="height: 80px;">
                        <div class="d-flex align-items-center h-100">
                            <div class="circle circle-purple">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="d-flex flex-column ms-2" style="flex-grow: 1;">
                                <p style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                    Penetap AK
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <h2 style="font-family: 'Roboto';color: #06152B; font-size: 16px" class="target">
                                        {{ $penilaiAndPenetap?->penetapAngkaKredit?->userPejabatStruktural?->nama ?? '-' }}
                                    </h2>
                                    <button class="tambah-penetap" data-bs-toggle="modal" data-bs-target="#tambahPenetap">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-md-7">
                                <h5>Tabel Data Aparatur</h5>
                            </div>
                            <div class="col-md-3 d-flex justify-content-end">
                                <a href="" class="btn-tambah-mente btn-sm" style="right: 0;" data-bs-toggle="modal"
                                    data-bs-target="#tambahMentee"><i class="fa-solid fa-user-group"></i> Tambah Mentee</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {{ $dataTable->table() }}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="tambahMentee" tabindex="-1" role="dialog" aria-labelledby="tambahMenteeTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="color: #06152B;" class="modal-title" id="tambahMenteeTitle">
                        Tambah Mentee
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" class="mente-fungsional">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Atasan Langsung</label>
                                    <select class="choices form-select" name="atasan_langsung">
                                        <option disabled selected>Pilih Atasan</option>
                                        @foreach ($atasanLangsungs as $atasanLangsung)
                                            <option value="{{ $atasanLangsung->id }}">
                                                {{ $atasanLangsung->userPejabatStruktural->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="card mt-3 mb-0"
                                    style="border: var(--bs-modal-header-border-width) solid var(--bs-modal-header-border-color); overflow: hidden;">
                                    <div class="card-header py-3">
                                        <div class="row justify-content-between">
                                            <div class="col-md-3">
                                                <h5 style="color: #06152B;">Data Pejabat Fungsional</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-striped w-100" id="table-fungsional">
                                            <thead style="position: sticky; top: 0; color: black; background-color: white;">
                                                <tr>
                                                    <th>Pilih</th>
                                                    <th>Nama</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($fungsionals as $fungsional)
                                                    <tr>
                                                        <td>
                                                            <input class="form-check-input" name="fungsionals[]"
                                                                type="checkbox" value="{{ $fungsional->id }}">
                                                        </td>
                                                        <td>{{ $fungsional->userAparatur?->nama }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        <span>Batal</span>
                    </button>
                    <button type="button" class="btn btn-green ml-1 simpan-mente">
                        <img class="spin" src="{{ asset('assets/images/template/spinner.gif') }}"
                            style="height: 25px; object-fit: cover;display: none;" alt="" srcset="">
                        <span>Simpan</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editMentee" tabindex="-1" role="dialog" aria-labelledby="editMenteeTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="color: #06152B;" class="modal-title" id="editMenteeTitle">
                        Edit Mentee
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" class="mente-fungsional-edit">
                        <div class="form-group">
                            <label>Atasan Langsung</label>
                            <select class="choices form-select" name="atasan_langsung">
                                <option disabled selected>Pilih Atasan</option>
                                @foreach ($atasanLangsungs as $atasanLangsung)
                                    <option value="{{ $atasanLangsung->id }}">
                                        {{ $atasanLangsung->userPejabatStruktural?->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        <span>Batal</span>
                    </button>
                    <button type="button" class="btn btn-green ml-1 simpan-edit-mente">
                        <img class="spin" src="{{ asset('assets/images/template/spinner.gif') }}"
                            style="height: 25px; object-fit: cover;display: none;" alt="" srcset="">
                        <span>Simpan</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahPenilai" tabindex="-1" role="dialog" aria-labelledby="tambahPenilaiTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahPenilaiTitle">
                        Penilai AK
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" class="container-unsur">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tingkat Penilai</label>
                                    <select class="form-select" name="tingkat">
                                        <option disabled selected>- Pilih Tingkat -</option>
                                        <option value="provinsi">Tingkat Provinsi</option>
                                        <option value="kab_kota">Tingkat Kabupaten/Kota</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Provinsi<span class="text-danger">*</span></label>
                                    <select name="provinsi_id" required class="form-select">
                                        <option selected disabled>- Pilih Provinsi -
                                        </option>
                                        @foreach ($provinsis as $provinsi)
                                            <option value="{{ $provinsi->id }}">
                                                {{ $provinsi->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 kabkota" style="display: none;">
                                <div class="form-group">
                                    <label>Kabupaten / Kota<span class="text-danger">*</span></label>
                                    <select required name="kab_kota_id" class="form-select">
                                        <option value="">- Pilih Provinsi Terlebih
                                            Dahulu -</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Penilai Angka Kredit</label>
                                    <input type="hidden" name="penilai">
                                    <input type="text" name="penilai_ak" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Penetap Angka Kredit</label>
                                    <input type="hidden" name="penetap">
                                    <input type="text" name="penetap_ak" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        <span>Batal</span>
                    </button>
                    <button type="button" class="btn btn-green ml-1 simpan-penilai-penetap">
                        <img class="spin" src="{{ asset('assets/images/template/spinner.gif') }}"
                            style="height: 25px; object-fit: cover;display: none;" alt="" srcset="">
                        <span>Simpan</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="tambahPenetap" tabindex="-1" role="dialog" aria-labelledby="tambahPenetapTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahPenetapTitle">
                        Penetap AK
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" class="container-unsur">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Penetap AK</label>
                                    {{-- <select class="form-select" name="role_id">
                                        <option disabled selected>- Pilih Penetap -</option>
                                        @foreach ($penetaps as $penetap)
                                            <option>{{ $penetap->userPejabatStruktural?->nama }}</option>
                                        @endforeach
                                    </select> --}}
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        <span>Batal</span>
                    </button>
                    <button class="btn btn-green ml-1 simpan-penetap">
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
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <style>
        .dataTable>thead>tr>th {
            border: 0 !important;
        }

        .dataTable th {
            color: #809FB8 !important;
        }

        .table-striped-columns>:not(caption)>tr>:nth-child(2n),
        .table-striped>tbody>tr:nth-of-type(odd)>* {
            border-color: #F1F4F9 !important;
        }

        .table-striped>tbody>tr,
        .table-striped>tbody>tr:nth-of-type(odd)>* {
            color: #06152B !important;
        }

        @media screen and (max-width:780px) {
            .card {
                padding: 0 !important;
            }
        }

        .btn-tambah-mente {
            background-color: #0D6EF8;
            padding: .5rem 1.5rem;
            border-radius: 50px;
            color: white;
        }

        .btn-tambah-mente:hover {
            color: white;
        }

        #editMentee .modal-content .bg-spin {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 99;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #00000075;
        }

        .tambah-penetap,
        .tambah-penilai {
            padding: .06rem .32rem;
            border-radius: 50%;
            font-size: 14px;
        }

        .tambah-penilai {
            border: 2px solid #28d5e0;
            color: #28d5e0;
        }

        .tambah-penetap {
            border: 2px solid #0D6EF8;
            color: #0D6EF8;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('assets/css/shared/sweetalert2.min.css') }}">
@endsection

@section('js')
    <script src="{{ asset('assets/js/auth/jquery.min.js') }}"></script>
    {{ $dataTable->scripts() }}
    <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/kabkota/mente.js') }}"></script>
    <script src="{{ asset('assets/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('select[name="tingkat"]').change(function(e) {
                e.preventDefault();
                if ($(this).val() == 'kab_kota') {
                    $('.kabkota').show();
                } else {
                    $('.kabkota').hide();
                }
                $('select[name="provinsi_id"]').prop('selectedIndex', 0);
                $('select[name="kab_kota_id"]').prop('selectedIndex', 0);
            });
            $('select[name="provinsi_id"]').each(function(index, element) {
                $(element).change(function(e) {
                    e.preventDefault();
                    if ($('select[name="tingkat"]').val() == 'provinsi') {
                        $.ajax({
                            type: "POST",
                            url: url('/kab-kota/data-mente/' + $(element).val() +
                                '/tingkat-provinsi'),
                            dataType: "JSON",
                            success: function(response) {
                                $('input[name="penilai_ak"]').val(response
                                    .penilaiAndPenetap.penilai.nama);
                                $('input[name="penetap_ak"]').val(response
                                    .penilaiAndPenetap.penetap.nama);
                                $('input[name="penilai"]').val(response
                                    .penilaiAndPenetap.penilai.id);
                                $('input[name="penetap"]').val(response
                                    .penilaiAndPenetap.penetap.id);
                            },
                            error: ajaxError
                        });
                    }
                    loadKabKota(this.value, $(element.parentElement.parentElement.parentElement)
                        .find('select[name="kab_kota_id"]'))
                });
            });

            $('select[name="kab_kota_id"]').each(function(index, element) {
                $(element).change(function(e) {
                    e.preventDefault();
                    if ($('select[name="tingkat"]').val() == 'kab_kota') {
                        $.ajax({
                            type: "POST",
                            url: url('/kab-kota/data-mente/' + $(element).val() +
                                '/tingkat-kabkota'),
                            dataType: "JSON",
                            success: function(response) {
                                $('input[name="penilai_ak"]').val(response
                                    .penilaiAndPenetap.penilai.nama);
                                $('input[name="penetap_ak"]').val(response
                                    .penilaiAndPenetap.penetap.nama);
                                $('input[name="penilai"]').val(response
                                    .penilaiAndPenetap.penilai.id);
                                $('input[name="penetap"]').val(response
                                    .penilaiAndPenetap.penetap.id);
                            },
                            error: ajaxError
                        });
                    }
                });
            });

            $('.simpan-penilai-penetap').click(function(e) {
                e.preventDefault();
                swal({
                    title: "Simpan?",
                    text: "Pastikan Data Yang Dipilih Sudah Benar!",
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Ya, simpan!",
                    cancelButtonText: "Batal",
                    reverseButtons: !0,
                    showLoaderOnConfirm: true,
                    preConfirm: async () => {
                        kab_kota_id = null;
                        if ($('select[name="tingkat"]').val() == 'kab_kota') {
                            kab_kota_id = $('select[name="kab_kota_id"]').val();
                        }
                        data = null;
                        await $.ajax({
                            type: 'POST',
                            url: url("/kab-kota/data-mente/store-penilai-penetap"),
                            data: {
                                "penilai": $('input[name="penilai"]').val(),
                                "penetap": $('input[name="penetap"]').val(),
                                "tingkat": $('select[name="tingkat"]').val(),
                                "kab_kota_id": kab_kota_id,
                                "provinsi_id": $('select[name="provinsi_id"]').val(),
                            },
                            dataType: 'JSON',
                            success: function(res) {
                                data = res;
                            },
                            error: function(jqXHR, xhr, textStatus, errorThrow,
                                exception) {
                                data = jqXHR;
                            }
                        });
                        return data
                    },
                }).then(function(e) {
                    if (e?.value?.status == 200) {
                        swal({
                            type: 'success',
                            title: 'Berhasil',
                            html: e.value.message
                        }).then(() => {
                            location.reload()
                        });
                    }
                })
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

            var ajaxError = function(jqXHR, xhr, textStatus, errorThrow, exception) {
                if (jqXHR.status === 0) {
                    swal("Error!", 'Not connect.\n Verify Network.', "error");
                } else if (jqXHR.status == 400) {
                    swal("Peringatan!", jqXHR['responseJSON'].message, "warning");
                } else if (jqXHR.status == 404) {
                    swal('Error!', 'Requested page not found. [404]', "error");
                } else if (jqXHR.status == 500) {
                    swal('Error!', 'Internal Server Error [500].' + jqXHR['responseJSON'].message, "error");
                } else if (exception === 'parsererror') {
                    swal('Error!', 'Requested JSON parse failed.', "error");
                } else if (exception === 'timeout') {
                    swal('Error!', 'Time out error.', "error");
                } else if (exception === 'abort') {
                    swal('Error!', 'Ajax request aborted.', "error");
                } else if (jqXHR.status == 422) {
                    swal('Warning!', JSON.parse(jqXHR.responseText).message, "warning");
                    $('input[name="penilai_ak"]').val('');
                    $('input[name="penetap_ak"]').val('');
                } else {
                    swal('Error!', jqXHR.responseText, "error");
                }
            };
        });
    </script>
@endsection
