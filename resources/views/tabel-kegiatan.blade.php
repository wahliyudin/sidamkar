@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="border-bottom d-flex justify-content-end pb-4">
                            <button class="px-4 py-2 btn-laporan">
                                <svg width="23" height="18" viewBox="0 0 23 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20.5 0.0100098H2.5C1.4 0.0100098 0.5 0.91001 0.5 2.01001V6.00001H2.5V1.99001H20.5V16.02H2.5V12H0.5V16.01C0.5 17.11 1.4 17.99 2.5 17.99H20.5C21.6 17.99 22.5 17.11 22.5 16.01V2.01001C22.5 0.90001 21.6 0.0100098 20.5 0.0100098ZM10.5 13L14.5 9.00001L10.5 5.00001V8.00001H0.5V10H10.5V13ZM20.5 0.0100098H2.5C1.4 0.0100098 0.5 0.91001 0.5 2.01001V6.00001H2.5V1.99001H20.5V16.02H2.5V12H0.5V16.01C0.5 17.11 1.4 17.99 2.5 17.99H20.5C21.6 17.99 22.5 17.11 22.5 16.01V2.01001C22.5 0.90001 21.6 0.0100098 20.5 0.0100098ZM10.5 13L14.5 9.00001L10.5 5.00001V8.00001H0.5V10H10.5V13Z"
                                        fill="white" />
                                </svg>
                                <p>Buat laporan</p>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-column">
                            <div class="">
                                <div role="button" data-bs-toggle="collapse" data-bs-target="#one" aria-expanded="true"
                                    aria-controls="one" style="display: flex; align-content: center; align-items: start;"
                                    class="">
                                    <p class="badge-collapse">
                                        <i class="fa-solid fa-chevron-down text-sm"></i>
                                        <!-- <i class="fa-solid fa-chevron-down text-sm"></i> Font Awesome fontawesome.com -->
                                    </p>
                                    <h5 class="ms-4">
                                        Kesiapsiagaan petugas pemadam kebakaran dan penyelamatan;
                                    </h5>
                                </div>
                                <div class="collapse show" id="one" style="">
                                    <ul class="py-1 ms-5">
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
                            <div class="">
                                <div role="button" data-bs-toggle="collapse" data-bs-target="#two" aria-expanded="true"
                                    aria-controls="two" style="display: flex; align-content: center; align-items: start;"
                                    class="">
                                    <p class="badge-collapse">
                                        <i class="fa-solid fa-chevron-down text-sm"></i>
                                        <!-- <i class="fa-solid fa-chevron-down text-sm"></i> Font Awesome fontawesome.com -->
                                    </p>
                                    <h5 class="ms-4">
                                        Pelaksanaan prosedur pelaporan informasi kejadian kebakaran;
                                    </h5>
                                </div>
                                <div class="collapse show" id="two" style="">
                                    <ul class="py-1 ms-5">
                                        <li class="py-1">
                                            <h6>Informasi kejadian kebakaran; dan</h6>
                                        </li>
                                        <li class="py-1">
                                            <h6>koordinasi dengan Kepala Regu terkait informasi kejadian kebakaran;</h6>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="">
                                <div role="button" data-bs-toggle="collapse" data-bs-target="#three" aria-expanded="true"
                                    aria-controls="three" style="display: flex; align-content: center; align-items: start;"
                                    class="">
                                    <p class="badge-collapse">
                                        <i class="fa-solid fa-chevron-down text-sm"></i>
                                    </p>
                                    <h5 class="ms-4">
                                        Pelaksanaan operasional pemadaman kebakaran;
                                    </h5>
                                </div>
                                <div class="collapse show" id="three" style="">
                                    <ul class="py-1 ms-5">
                                        <li class="py-1">
                                            <h6>Keberangkatan menuju tempat kejadian kebakaran;</h6>
                                        </li>
                                        <li class="py-1">
                                            <h6>Pemadaman kebakaran;</h6>
                                        </li>
                                        <li class="py-1">
                                            <h6>Proses pendinginan;</h6>
                                        </li>
                                        <li class="py-1">
                                            <h6>persiapan kembali ke pos pemadam kebakaran dan penyelamatan;</h6>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <style>
        li::marker {
            font-size: 25px !important;
            color: black;
        }

        h5 {
            font-family: 'Roboto';
            font-weight: 600;
        }

        h6 {
            font-family: 'Roboto';
            color: #809FB8;
        }

        button.btn-laporan {
            background-color: #219653;
            border: none;
            border-radius: 50px;
            padding: .5rem 1.7rem;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        button.btn-laporan p {
            margin: 0 0 0 .6rem;
            font-family: 'Roboto';
            font-weight: 600;
        }

        .badge-collapse {
            background-color: #1AD598;
            padding: 0 6px;
            border-radius: 8px;
            color: #F2F2F2;
        }
    </style>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>
@endsection
