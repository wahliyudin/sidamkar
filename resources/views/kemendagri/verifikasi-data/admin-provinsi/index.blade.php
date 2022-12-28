@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="card py-2 overflow-auto">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8 col-12">
                        <h5 style="color: #06152B; font-size: 'Roboto';">Data Admin Provinsi</h5>
                    </div>
                </div>
                <form method="POST" action="{{ route('kemendagri.verifikasi-data.aparatur.export') }}"
                    class="d-flex flex-column form-export"
                    style="border: 1px solid #809FB8; padding: 10px; border-radius: 10px;">
                    @csrf
                    <div class="row gap-4">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Provinsi</label>
                                <select name="provinsi_id" required class="form-select text-sm">
                                    <option value=""> All </option>
                                    @foreach ($provinsis as $provinsi)
                                        <option value="{{ $provinsi->id }}">
                                            {{ $provinsi->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Kabupaten / Kota</label>
                                <select required disabled name="kab_kota_id" class="form-select text-sm">
                                    <option value="">- Pilih Provinsi Terlebih
                                        Dahulu -</option>
                                    <option value=""> All </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row gap-4">
                        <div class="col-md-2 d-flex align-items-center">
                            <button class="btn btn-green ps-3"><i class="fa-solid fa-file-excel me-2"></i>
                                Export</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body overflow-auto">
                <table id="admin-provinsi" class="table dataTable no-footer dtr-inline">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Provinsi</th>
                            <th>File Permohonan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
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
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
@endsection

@section('js')
    <script src="{{ asset('assets/js/auth/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <script type="text/javascript">
        $('#admin-provinsi').dataTable().fnDestroy();
        table = $('#admin-provinsi').DataTable({
            responsive: true,
            serverSide: true,
            processing: true,
            ajax: {
                url: url('/kemendagri/verifikasi-data/admin-provinsi/datatable'),
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}"
                }
            },
            columns: [{
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'provinsi',
                    name: 'provinsi'
                },
                {
                    data: 'file_permohonan',
                    name: 'file_permohonan'
                },
                {
                    data: 'status',
                    name: 'status',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ],
            pageLength: 10,
            lengthMenu: [
                [10, 20, 50, -1],
                [10, 20, 50, 'All']
            ]
        });

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
                reverseButtons: true,
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
                        url: "{{ url('kemendagri/verifikasi-data/admin-provinsi') }}/" + id +
                            "/reject",
                        data: {
                            _token: CSRF_TOKEN,
                            catatan: value
                        },
                        dataType: 'JSON'
                    });
                },
            }).then(function(e) {
                if (e.value.success == true) {
                    swal({
                        type: 'success',
                        title: 'Berhasil',
                        html: 'Akun Dinyatakan <b style="font-weight: bold; color:red;">DITOLAK</b>'
                    }).then(() => {
                        $('#admin-provinsi').DataTable().ajax
                            .reload()
                    });
                } else {
                    swal("Error!", e.value.message, "error");
                }
            })
        }

        function verifikasi(id) {
            swal({
                title: "Verifikasi?",
                text: "Harap Pastikan Dan Kemudian Verifikasi!",
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
                        url: "{{ url('kemendagri/verifikasi-data/admin-provinsi') }}/" + id +
                            "/verified",
                        data: {
                            _token: CSRF_TOKEN
                        },
                        dataType: 'JSON'
                    });
                },
            }).then(function(e) {
                if (e.value.success == true) {
                    swal({
                        type: 'success',
                        title: 'Berhasil',
                        html: 'Akun Berhasil <b style="font-weight: bold; color:green;">DIVERIFIKASI</b>'
                    }).then(() => {
                        $('#admin-provinsi').DataTable().ajax
                            .reload()
                    });
                } else {
                    swal("Error!", e.value.message, "error");
                }
            }, function(dismiss) {
                return false;
            })
        }

        function hapus(id) {
            swal({
                title: "Hapus?",
                text: "Harap Pastikan Dan Kemudian Hapus!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal",
                reverseButtons: !0,
                showLoaderOnConfirm: true,
                preConfirm: async () => {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    return await $.ajax({
                        type: 'POST',
                        url: "{{ url('kemendagri/verifikasi-data/admin-provinsi') }}/" + id +
                            "/hapus",
                        data: {
                            _token: CSRF_TOKEN
                        },
                        dataType: 'JSON'
                    });
                },
            }).then(function(e) {
                if (e.value.success == true) {
                    swal("Selesai!", e.value.message, "success").then(() => {
                        $('#admin-provinsi').DataTable().ajax
                            .reload()
                    });
                } else {
                    swal("Error!", e.value.message, "error");
                }
            }, function(dismiss) {
                return false;
            })
        }

        $('select[name="provinsi_id"]').each(function(index, element) {
            $(element).change(function(e) {
                e.preventDefault();
                loadKabKota(this.value, $(element.parentElement.parentElement.parentElement)
                    .find('select[name="kab_kota_id"]'))
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
    </script>
@endsection
