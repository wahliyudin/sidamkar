@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="row badge-container">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body py-3" style="height: 100px;">
                        <div class="d-flex align-items-center h-100">
                            <div class="circle circle-green-light">
                                <i class="fa-solid fa-bullseye"></i>
                            </div>
                            <div class="d-flex flex-column ms-2">
                                <p style="margin: 0 !important; color: #809FB8; font-family: 'Roboto';">Target Angka Kredit
                                </p>
                                <h2 style="font-family: 'Roboto';color: #06152B;" class="target">100</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body py-3" style="height: 100px;">
                        <div class="d-flex align-items-center h-100">
                            <div class="circle circle-purple">
                                <i class="fa-solid fa-clipboard-check"></i>
                            </div>
                            <div class="d-flex flex-column ms-2">
                                <p style="margin: 0 !important; color: #809FB8; font-family: 'Roboto';">
                                    Kredit Yang Sudah Dipilih
                                </p>
                                <h2 style="font-family: 'Roboto';color: #06152B;" class="kredit">0</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body py-3" style="height: 100px;">
                        <div class="d-flex align-items-center h-100">
                            <div class="circle circle-green">
                                <i class="fa-regular fa-clock"></i>
                            </div>
                            <div class="d-flex flex-column ms-2">
                                <p style="margin: 0 !important; color: #809FB8; font-family: 'Roboto';">
                                    Periode Kegiatan (Hari)
                                </p>
                                <p
                                    style="margin: 0 !important;font-family: 'Roboto';color:  #06152B ;font-weight: 700; font-size: 20px;">
                                    Januari 2023 - Juni
                                    2023</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="text-center" style="font-family: 'Roboto'; color: #17181A;">Kegiatan</h4>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Search</label>
                                <input type="text" placeholder="Search..." class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body accordion-container">
                    <div style="max-height: calc(70vh); overflow-y: auto;">
                        <div class="accordion mt-4" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item">
                                <div class="d-flex justify-content-between accordion-header py-3 px-4" id="headSatu">
                                    <div class="d-flex align-items-center" style="color: #000000;">
                                        <div style="width: 20px; height: 20px;">
                                            <input type="checkbox" name="kegiatan" id="checkbox1" value="50"
                                                class="form-check-input">
                                        </div>
                                        <p>Kesiapsiagaan petugas pemadam kebakaran dan penyelamatan;</p>
                                    </div>
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#contentSatu" aria-expanded="false" aria-controls="contentSatu">
                                    </button>
                                </div>
                                <div id="contentSatu" class="accordion-collapse collapse" aria-labelledby="headSatu"
                                    style="">
                                    <div class="accordion-body">
                                        <ul class="ms-4">
                                            <li class="py-1">
                                                <h6>Apel pagi sebagai peserta dan serah terima tugas jaga;</h6>
                                            </li>
                                            <li class="py-1">
                                                <h6>Tugas piket jaga;</h6>
                                            </li>
                                            <li class="py-1">
                                                <h6>Apel malam sebagai peserta;</h6>
                                            </li>
                                            <li class="py-1">
                                                <h6>kegiatan rutin latihan ketrampilan;</h6>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <div class="d-flex justify-content-between accordion-header py-3 px-4" id="headDua">
                                    <div class="d-flex align-items-center" style="color: #000000;">
                                        <div style="width: 20px; height: 20px;">
                                            <input type="checkbox" name="kegiatan" id="checkbox1" value="50"
                                                class="form-check-input">
                                        </div>
                                        <p>Pelaksanaan operasional pemadaman kebakaran;</p>
                                    </div>
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#contentDua" aria-expanded="false" aria-controls="contentDua">
                                    </button>
                                </div>
                                <div id="contentDua" class="accordion-collapse collapse" aria-labelledby="headDua"
                                    style="">
                                    <div class="accordion-body">
                                        <ul class="ms-4">
                                            <li class="py-1">
                                                <h6>Informasi kejadian kebakaran; dan</h6>
                                            </li>
                                            <li class="py-1">
                                                <h6>koordinasi dengan Kepala Regu terkait informasi kejadian kebakaran;</h6>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <div class="d-flex justify-content-between accordion-header py-3 px-4" id="headTiga">
                                    <div class="d-flex align-items-center" style="color: #000000;">
                                        <div style="width: 20px; height: 20px;">
                                            <input type="checkbox" name="kegiatan" id="checkbox1" value="50"
                                                class="form-check-input">
                                        </div>
                                        <p>Pelaksanaan operasional pemadaman kebakaran;</p>
                                    </div>
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#contentTiga" aria-expanded="false" aria-controls="contentTiga">
                                    </button>
                                </div>
                                <div id="contentTiga" class="accordion-collapse collapse" aria-labelledby="headTiga"
                                    style="">
                                    <div class="accordion-body">
                                        <ul class="ms-4">
                                            <li class="py-1">
                                                <h6>Informasi kejadian kebakaran; dan</h6>
                                            </li>
                                            <li class="py-1">
                                                <h6>koordinasi dengan Kepala Regu terkait informasi kejadian kebakaran;</h6>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end pt-4">
                        <button class="btn btn-red px-5 me-2">Batal</button>
                        <button class="btn btn-blue px-5">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/extensions/toastify-js/src/toastify.css') }}">
    <style>
        li::marker {
            font-size: 25px !important;
            color: black;
        }

        .accordion .accordion-item:not(:last-child) {
            margin-bottom: 1rem;
        }

        .accordion .accordion-item {
            border-radius: 10px !important;
            overflow: hidden;
        }

        .accordion .accordion-header div>p {
            font-family: 'Roboto';
            font-weight: 600;
            margin: 0 0 0 1rem !important;
            padding: 0 !important;
        }

        .accordion-button {
            align-items: center;
            background-color: transparent !important;
            border: none;
            border-radius: 0;
            color: var(--bs-accordion-btn-color);
            display: flex;
            font-size: 1rem;
            overflow-anchor: none;
            /* padding: var(--bs-accordion-btn-padding-y) var(--bs-accordion-btn-padding-x); */
            position: relative;
            text-align: left;
            transition: var(--bs-accordion-transition);
        }

        @media (prefers-reduced-motion:reduce) {
            .accordion-button {
                transition: none
            }
        }

        .accordion-button:not(.collapsed) {
            background-color: var(--bs-accordion-active-bg);
            box-shadow: inset 0 calc(var(--bs-accordion-border-width)*-1) 0 var(--bs-accordion-border-color);
            color: var(--bs-accordion-active-color)
        }

        .accordion-button:not(.collapsed):after {
            background-image: var(--bs-accordion-btn-active-icon);
            transform: var(--bs-accordion-btn-icon-transform)
        }

        .accordion-button:after {
            background-image: var(--bs-accordion-btn-icon);
            background-repeat: no-repeat;
            background-size: var(--bs-accordion-btn-icon-width);
            content: "";
            flex-shrink: 0;
            height: var(--bs-accordion-btn-icon-width);
            margin-left: auto;
            transition: var(--bs-accordion-btn-icon-transition);
            width: var(--bs-accordion-btn-icon-width)
        }

        @media (prefers-reduced-motion:reduce) {
            .accordion-button:after {
                transition: none
            }
        }

        .accordion-button:hover {
            z-index: 2
        }
    </style>

    <style>
        @media screen and (max-width:750px) {
            .accordion-container {
                padding: 1rem 0 !important;
            }
        }

        @media screen and (min-width:992px) {
            .badge-container .col-md-4:first-child {
                padding-left: 0 !important;
            }

            .badge-container .col-md-4:last-child {
                padding-right: 0 !important;
            }
        }
    </style>
@endsection
@section('js')
    <script src="{{ asset('assets/js/auth/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/toastify-js/src/toastify.js') }}"></script>
    <script>
        $('input[name="kegiatan"]').each(function(index, element) {
            $(element).change(function(e) {
                e.preventDefault();
                target = parseInt($('.target').text());
                kredit = parseInt($('.kredit').text());
                if ($(element).is(':checked')) {
                    if (target < parseInt($(this).val()) + kredit) {
                        Toastify({
                            text: "Kredit yang dipilih tidak boleh lebih dari Target",
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#EDE40C",
                        }).showToast();
                        $(element).prop("checked", false);
                    } else {
                        $('.kredit').text(parseInt($(this).val()) + kredit)
                    }
                } else {
                    $('.kredit').text(kredit - parseInt($(this).val()))
                }
            });
        });
    </script>
@endsection
