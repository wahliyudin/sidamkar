@extends('layouts.master')

@section('content')
    <div class="section">
        <input type="hidden" name="secret" value="{{ $user->roles()->first()->id }}">
        <input type="hidden" name="user" value="{{ $user->id }}">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h4>Kegiatan Jabatan {{ $user->userAparatur->nama }}</h4>
                    </div>
                    <hr>
                    <div class="row align-items-center justify-content-between">
                        <div class="form-group col-md-2">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" value="{{ now()->format('Y-m-d') }}"
                                max="{{ Carbon\Carbon::make($periode->akhir)->format('Y-m-d') }}"
                                min="{{ Carbon\Carbon::make($periode->awal)->format('Y-m-d') }}" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Search</label>
                            <input type="text" name="search" placeholder="Search..." class="form-control">
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 accordion-container">
                    <div class="accordion unsur-container" id="accordion-parent">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('css')
    <link rel="stylesheet" href="{{ asset('assets/extensions/toastify-js/src/toastify.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/shared/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/kemendagri.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/aparatur/timeline.css') }}">
    <style>
        .link-butir:hover {
            text-decoration: underline;
        }
    </style>
@endsection

@section('js')
    <script src="{{ asset('assets/js/auth/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/toastify-js/src/toastify.js') }}"></script>
    <script src="{{ asset('assets/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            loadData();

            $('input[name="search"]').keyup(function(e) {
                loadData(e.target.value);
            });

            function loadData(search = null) {
                $.ajax({
                    type: "POST",
                    url: url('/atasan-langsung/verifikasi-kegiatan/kegiatan-jabatan/' + $(
                        'input[name="secret"]').val() + '/load-unsurs'),
                    data: {
                        search: search
                    },
                    dataType: "json",
                    success: function(response) {
                        $('.unsur-container').html(unsurs(response.unsurs));
                    }
                });
            }

            function unsurs(unsurs) {
                return $.map(unsurs, function(unsur, indexOrKey) {
                    if (unsur.role) {
                        return `
                        <div class="accordion-item">
                            <div class="d-flex flex-column accordion-header py-3 px-2" id="unsur${unsur.id}">
                                <div class="d-flex justify-content-between align-items-center ps-2 mb-1">
                                    <span class="bg-green text-sm text-white font-bold py-1 px-2 rounded-md label-role">
                                        ${unsur.role?.display_name}
                                    </span>
                                    <div class="d-flex align-items-center">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#contentUnsur${unsur.id}" aria-expanded="false"
                                            aria-controls="contentUnsur${unsur.id}">
                                        </button>
                                    </div>
                                </div>
                                <div class="ps-2 pt-2">
                                    <h6 class="accordian-title" style="color: #000000;">${unsur.nama}</h6>
                                </div>
                            </div>
                            <div id="contentUnsur${unsur.id}" class="accordion-collapse collapse"
                                aria-labelledby="unsur${unsur.id}"
                                style="">
                                <div class="accordion-body pt-0">
                                    <div class="accordion" id="accordion-child">
                                        ${subUnsurs(unsur.sub_unsurs)}
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    }
                }).join('')
            }

            function subUnsurs(subUnsurs) {
                return $.map(subUnsurs, function(subUnsur, indexOrKey) {
                    return `
                    <div class="accordion-item">
                        <div class="d-flex justify-content-between accordion-header py-1 px-1"
                            id="subUnsur${subUnsur.id}">
                            <div class="d-flex align-items-center"
                                style="color: #000000;">
                                <h6 class="accordian-title">
                                    ${subUnsur.nama}
                                </h6>
                            </div>
                            <button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#contentchildSubUnsur${subUnsur.id}"
                                aria-expanded="false"
                                aria-controls="contentchildSubUnsur${subUnsur.id}">
                            </button>
                        </div>
                        <div id="contentchildSubUnsur${subUnsur.id}"
                            class="accordion-collapse collapse"
                            aria-labelledby="subUnsur${subUnsur.id}"
                            style="">
                            <div class="accordion-body">
                                <ul class="ms-0">
                                    ${butirKegiatans(subUnsur.butir_kegiatans)}
                                </ul>
                            </div>
                        </div>
                    </div>
                `;
                }).join('')
            }

            function butirKegiatans(butirKegiatans) {
                return $.map(butirKegiatans, function(butirKegiatan, indexOrKey) {
                    return `
                    <li class="accordian-list">
                        <a href="${url('/atasan-langsung/verifikasi-kegiatan/'+$('input[name="user"]').val()+'/kegiatan-jabatan/'+butirKegiatan.id+'/show')}" class="d-flex align-items-center justify-content-between link-butir">
                            <h6 class="accordian-title">
                                ${butirKegiatan.nama}
                            </h6>
                            <div class="d-flex align-items-center">

                            </div>
                        </a>
                    </li>
                `;
                }).join('')
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
                } else {
                    swal('Error!', jqXHR.responseText, "error");
                }
            };
        });
    </script>
@endsection