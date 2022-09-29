@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column">
                            <div class="">
                                <div role="button" data-bs-toggle="collapse" data-bs-target="#one" aria-expanded="false"
                                    aria-controls="one" style="display: flex; align-content: center;">
                                    <p
                                        style="padding: 2px 8px; border-radius: 5px; background-color: rgba(26, 213, 152, 0.298039);">
                                        <i class="fa-solid fa-chevron-down text-sm"></i>
                                    </p>
                                    <h5 class="ms-4">
                                        Kesiapsiagaan petugas pemadam kebakaran dan penyelamatan;
                                    </h5>
                                </div>
                                <div class="collapse" id="one">
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
                                <div role="button" data-bs-toggle="collapse" data-bs-target="#two" aria-expanded="false"
                                    aria-controls="two" style="display: flex; align-content: center;">
                                    <p
                                        style="padding: 2px 8px; border-radius: 5px; background-color: rgba(26, 213, 152, 0.298039);">
                                        <i class="fa-solid fa-chevron-down text-sm"></i>
                                    </p>
                                    <h5 class="ms-4">
                                        Pelaksanaan prosedur pelaporan informasi kejadian kebakaran;
                                    </h5>
                                </div>
                                <div class="collapse" id="two">
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
                                <div role="button" data-bs-toggle="collapse" data-bs-target="#three" aria-expanded="false"
                                    aria-controls="three" style="display: flex; align-content: center;">
                                    <p
                                        style="padding: 2px 8px; border-radius: 5px; background-color: rgba(26, 213, 152, 0.298039);">
                                        <i class="fa-solid fa-chevron-down text-sm"></i>
                                    </p>
                                    <h5 class="ms-4">
                                        Pelaksanaan operasional pemadaman kebakaran;
                                    </h5>
                                </div>
                                <div class="collapse" id="three">
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
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>
@endsection
