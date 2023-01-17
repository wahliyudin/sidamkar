@extends('layouts.master')

@section('content')
    <div class="section">
        <input type="hidden" name="secret" value="{{ $user->roles()->first()->id }}">
        <input type="hidden" name="user" value="{{ $user->id }}">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <a href="javascript:history.back()" class="icon-back mb-2">
                            <i class="fa-solid fa-arrow-left-long"></i>
                        </a>
                        <div class="ms-2">
                            <h4>Kegiatan Penunjang {{ $user->userAparatur->nama }}</h4>
                        </div>
                    </div>
                    <hr>
                    <div class="row align-items-center justify-content-end">
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
                    url: url('/atasan-langsung/verifikasi-kegiatan/penunjang/' + $(
                        'input[name="secret"]').val() + '/load-unsurs'),
                    data: {
                        search: search,
                        user_id: $('input[name="user"]').val()
                        
                    },
                    dataType: "json",
                    success: function(response) {
                        $('.unsur-container').html(unsurs(response.unsurs));
                    }
                });
            }

            function unsurs(unsurs) {
                if (unsurs.length > 0) {
                    return $.map(unsurs, function(unsur, indexOrKey) {
                        return `
                            <div class="accordion-item overflow-item">
                                <div class="d-flex justify-content-between align-items-center accordion-header py-3 px-2" id="unsur${unsur.id}">
                                    <div class="ps-2 pt-2">
                                        <h6 class="accordian-title" style="color: #000000;">${unsur.nama}</h6>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#contentUnsur${unsur.id}" aria-expanded="false"
                                            aria-controls="contentUnsur${unsur.id}">
                                        </button>
                                    </div>
                                </div>
                                <div id="contentUnsur${unsur.id}" class="accordion-collapse collapse"
                                    aria-labelledby="unsur${unsur.id}"
                                    style="">
                                    <div class="accordion-body overflow-auto pt-0">
                                        <div class="accordion" id="accordion-child">
                                            ${subUnsurs(unsur.sub_unsurs)}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                    }).join('')
                } else {
                    return `<div class="d-flex py-4 justify-content-center">Belum Ada Data Untuk Ditampilkan</div>`;
                }
            }

            function subUnsurs(subUnsurs) {
                return $.map(subUnsurs, function(subUnsur, indexOrKey) {
                    return `
                    <div class="accordion-item overflow-item">
                        <div class="d-flex justify-content-between accordion-header py-1 px-1 overflow-auto"
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
                            <div class="accordion-body overflow-auto">
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
                    if (butirKegiatan.sub_butir_kegiatans.length != 0) {
                        return `
                            <div class="accordion-item overflow-item">
                                <div class="d-flex justify-content-between accordion-header py-1 px-2"
                                    id="butirKegiatan${butirKegiatan.id}">
                                    <div class="d-flex align-items-center"
                                        style="color: #000000;">
                                        <h6 class="accordian-title">
                                            ${butirKegiatan.nama}
                                        </h6>
                                    </div>
                                    <button class="accordion-button collapsed"
                                        type="button" data-bs-toggle="collapse"
                                        data-bs-target="#contentchildButirKegiatan${butirKegiatan.id}"
                                        aria-expanded="false"
                                        aria-controls="contentchildButirKegiatan${butirKegiatan.id}">
                                    </button>
                                </div>
                                <div id="contentchildButirKegiatan${butirKegiatan.id}"
                                    class="accordion-collapse collapse"
                                    aria-labelledby="butirKegiatan${butirKegiatan.id}"
                                    style="">
                                    <div class="accordion-body overflow-auto">
                                        <ul class="ms-0">
                                            ${subButirKegiatans(butirKegiatan.sub_butir_kegiatans)}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            `;
                    } else {
                        return `
                                <li class="accordian-list ">
                                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                                        <a href="${url('/atasan-langsung/verifikasi-kegiatan/penunjang/'+$('input[name="user"]').val()+'/'+butirKegiatan.id+'/butir-kegiatan/show')}" class="link-butir">
                                            <h6 class="accordian-title">
                                                ${butirKegiatan.nama}
                                            </h6>
                                        </a>
                                        <div class="d-flex align-items-center">
                                            <span class="bg-green text-sm text-center text-white font-bold py-1 px-2 rounded-md label-role" style="white-space: nowrap;">
                                                ${butirKegiatan.role?.display_name ?? 'Semua Jenjang'}
                                            </span>
                                        </div>
                                    </div>
                                </li>
                            `;
                    }
                }).join('')
            }

            function subButirKegiatans(sub_butir_kegiatans) {
                return $.map(sub_butir_kegiatans, function(subButirKegiatan, indexOrKey) {
                    return `
                        <li class="accordian-list overflow-auto">
                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <a href="${url('/atasan-langsung/verifikasi-kegiatan/penunjang/'+$('input[name="user"]').val()+'/'+subButirKegiatan.id+'/sub-butir-kegiatan/show')}" class="link-butir">
                                    <h6 class="accordian-title">
                                        ${subButirKegiatan.nama}
                                    </h6>
                                </a>
                                <div class="d-flex align-items-center">
                                    <span class="bg-green text-sm text-center text-white font-bold py-1 px-2 rounded-md label-role" style="white-space: nowrap;">
                                        ${subButirKegiatan.role?.display_name ?? 'Semua Jenjang'}
                                    </span>
                                </div>
                            </div>
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
