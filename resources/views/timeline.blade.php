@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <button class="btn btn-green-light">green</button>
                        <button class="btn btn-red-light">red</button>
                        <button class="btn btn-purple-light">purple</button>
                        <button class="btn btn-yellow-light">yellow</button>
                        <button class="btn btn-green">green</button>
                        <button class="btn btn-blue">blue</button>
                    </div>
                    <div class="card-body">
                        <div class="timeline">
                            <div class="title-timeline">
                                <label class="title-wrapper">
                                    <input type="checkbox" id="checkbox1" class="form-check-input">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                </label>
                            </div>
                            <div class="area-timeline">
                                <label class="area-wrapper">
                                    <input type="checkbox" id="checkbox1" class="form-check-input">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                </label>
                                <label class="area-wrapper">
                                    <input type="checkbox" id="checkbox1" class="form-check-input">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                </label>
                                <label class="area-wrapper">
                                    <input type="checkbox" id="checkbox1" class="form-check-input">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                </label>
                                <label class="area-wrapper">
                                    <input type="checkbox" id="checkbox1" class="form-check-input">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                </label>
                                <label class="area-wrapper">
                                    <input type="checkbox" id="checkbox1" class="form-check-input">
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, ut quos! Animi et
                                        assumenda odio veniam est delectus
                                    </p>
                                </label>
                            </div>

                            <div class="title-timeline">
                                <label class="title-wrapper">
                                    <input type="checkbox" id="checkbox1" class="form-check-input">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                </label>
                            </div>
                            <div class="area-timeline">
                                <label class="area-wrapper">
                                    <input type="checkbox" id="checkbox1" class="form-check-input">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                </label>
                                <label class="area-wrapper">
                                    <input type="checkbox" id="checkbox1" class="form-check-input">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                </label>
                                <label class="area-wrapper">
                                    <input type="checkbox" id="checkbox1" class="form-check-input">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                </label>
                                <label class="area-wrapper">
                                    <input type="checkbox" id="checkbox1" class="form-check-input">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                </label>
                                <label class="area-wrapper">
                                    <input type="checkbox" id="checkbox1" class="form-check-input">
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, ut quos! Animi et
                                        assumenda odio veniam est delectus
                                    </p>
                                </label>
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
    <link rel="stylesheet" href="{{ asset('assets/css/pages/timeline.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/component.css') }}">
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>
@endsection
