@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="border-bottom d-flex justify-content-end pb-4">
                            {{-- <button class="px-4 py-2 btn-laporan">
                                <svg width="23" height="18" viewBox="0 0 23 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20.5 0.0100098H2.5C1.4 0.0100098 0.5 0.91001 0.5 2.01001V6.00001H2.5V1.99001H20.5V16.02H2.5V12H0.5V16.01C0.5 17.11 1.4 17.99 2.5 17.99H20.5C21.6 17.99 22.5 17.11 22.5 16.01V2.01001C22.5 0.90001 21.6 0.0100098 20.5 0.0100098ZM10.5 13L14.5 9.00001L10.5 5.00001V8.00001H0.5V10H10.5V13ZM20.5 0.0100098H2.5C1.4 0.0100098 0.5 0.91001 0.5 2.01001V6.00001H2.5V1.99001H20.5V16.02H2.5V12H0.5V16.01C0.5 17.11 1.4 17.99 2.5 17.99H20.5C21.6 17.99 22.5 17.11 22.5 16.01V2.01001C22.5 0.90001 21.6 0.0100098 20.5 0.0100098ZM10.5 13L14.5 9.00001L10.5 5.00001V8.00001H0.5V10H10.5V13Z"
                                        fill="white" />
                                </svg>
                                <p>Buat laporan</p>
                            </button> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div class="timeline">
                                <div class="title-timeline">
                                    <label class="title-wrapper">
                                        <input type="checkbox" id="checkbox1" class="form-check-input">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                    </label>
                                </div>
                                <div class="area-timeline">
                                    <div class="area-wrapper">
                                        <label style="max-width: 85%; cursor: pointer;">
                                            <input type="checkbox" checked id="checkbox1" class="form-check-input">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor
                                                sit
                                                amet, consectetur adipisicing elit.sfasfasf Lorem ipsum dolor, sit amet
                                                consectetur adipisicing elit. Iste quo omnis nesciunt ex perspiciatis?
                                                Dolorum
                                                at fugiat veritatis dignissimos voluptas! Explicabo molestias quibusdam
                                                neque,
                                                blanditiis ea reprehenderit cupiditate pariatur temporibus.</p>
                                        </label>
                                        <button class="btn btn-yellow-light ms-3">view</button>
                                    </div>
                                    <div class="area-wrapper">
                                        <label style="max-width: 85%; cursor: pointer;">
                                            <input type="checkbox" id="checkbox1" class="form-check-input">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor
                                                sit
                                                amet, consectetur adipisicing elit.sfasfasf</p>
                                        </label>
                                        <button class="btn btn-yellow-light ms-3">view</button>
                                    </div>
                                    <div class="area-wrapper">
                                        <label style="max-width: 85%; cursor: pointer;">
                                            <input type="checkbox" id="checkbox1" class="form-check-input">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor
                                                sit
                                                amet, consectetur adipisicing elit.sfasfasf</p>
                                        </label>
                                        <button class="btn btn-yellow-light ms-3">view</button>
                                    </div>
                                    <div class="area-wrapper">
                                        <label style="max-width: 85%; cursor: pointer;">
                                            <input type="checkbox" id="checkbox1" class="form-check-input">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor
                                                sit
                                                amet, consectetur adipisicing elit.sfasfasf</p>
                                        </label>
                                        <button class="btn btn-yellow-light ms-3">view</button>
                                    </div>
                                    <div class="area-wrapper">
                                        <label style="max-width: 85%; cursor: pointer;">
                                            <input type="checkbox" id="checkbox1" class="form-check-input">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor
                                                sit
                                                amet, consectetur adipisicing elit.sfasfasf</p>
                                        </label>
                                        <button class="btn btn-yellow-light ms-3">view</button>
                                    </div>
                                </div>

                                <div class="title-timeline">
                                    <label class="title-wrapper">
                                        <input type="checkbox" id="checkbox1" class="form-check-input">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                    </label>
                                </div>
                                <div class="area-timeline">
                                    <div class="area-wrapper">
                                        <label style="max-width: 85%; cursor: pointer;">
                                            <input type="checkbox" id="checkbox1" class="form-check-input">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor
                                                sit
                                                amet, consectetur adipisicing elit.sfasfasf Lorem ipsum dolor, sit amet
                                                consectetur adipisicing elit. Iste quo omnis nesciunt ex perspiciatis?
                                                Dolorum
                                                at fugiat veritatis dignissimos voluptas! Explicabo molestias quibusdam
                                                neque,
                                                blanditiis ea reprehenderit cupiditate pariatur temporibus.</p>
                                        </label>
                                        <button class="btn btn-yellow-light ms-3">view</button>
                                    </div>
                                    <div class="area-wrapper">
                                        <label style="max-width: 85%; cursor: pointer;">
                                            <input type="checkbox" id="checkbox1" class="form-check-input">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor
                                                sit
                                                amet, consectetur adipisicing elit.sfasfasf</p>
                                        </label>
                                        <button class="btn btn-yellow-light ms-3">view</button>
                                    </div>
                                    <div class="area-wrapper">
                                        <label style="max-width: 85%; cursor: pointer;">
                                            <input type="checkbox" id="checkbox1" class="form-check-input">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor
                                                sit
                                                amet, consectetur adipisicing elit.sfasfasf</p>
                                        </label>
                                        <button class="btn btn-yellow-light ms-3">view</button>
                                    </div>
                                    <div class="area-wrapper">
                                        <label style="max-width: 85%; cursor: pointer;">
                                            <input type="checkbox" id="checkbox1" class="form-check-input">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor
                                                sit
                                                amet, consectetur adipisicing elit.sfasfasf</p>
                                        </label>
                                        <button class="btn btn-yellow-light ms-3">view</button>
                                    </div>
                                    <div class="area-wrapper">
                                        <label style="max-width: 85%; cursor: pointer;">
                                            <input type="checkbox" id="checkbox1" class="form-check-input">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor
                                                sit
                                                amet, consectetur adipisicing elit.sfasfasf</p>
                                        </label>
                                        <button class="btn btn-yellow-light ms-3">view</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/pages/timeline.css') }}">
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>
@endsection
