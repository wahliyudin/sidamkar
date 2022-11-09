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
                        <div class="timeline-vertical">
                            <div class="timeline-item timeline-item-start">
                                <div class="timeline-icon icon-item icon-item-lg text-primary border-300"><span
                                        class="fs-1 fas fa-mobile"></span></div>
                                <div class="row">
                                    <div class="col-lg-6 timeline-item-time">
                                        <div>
                                            <p class="fs--1 mb-0 fw-semi-bold">2021</p>
                                            <p class="fs--2 text-600">24 September</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="timeline-item-content">
                                            <div class="timeline-item-card">
                                                <h5 class="mb-2">iPhone 13 released</h5>
                                                <p class="fs--1 mb-0">Most advanced dual‑camera system ever. Durability
                                                    that’s front and center. And edge to edge. A lightning-fast chip
                                                    that leaves the competition behind.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="timeline-item timeline-item-end">
                                <div class="timeline-icon icon-item icon-item-lg text-primary border-300"><span
                                        class="fs-1 fas fa-fire"></span></div>
                                <div class="row">
                                    <div class="col-lg-6 timeline-item-time">
                                        <div>
                                            <p class="fs--1 mb-0 fw-semi-bold">2010-2014</p>
                                            <p class="fs--2 text-600">03 April</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="timeline-item-content">
                                            <div class="timeline-item-card">
                                                <h5 class="mb-2">iPad launched</h5>
                                                <p class="fs--1 mb-0">Following on from the success of their iPhone
                                                    launches and the popularity of lighter, more portable laptops, the
                                                    iPad was born in 2010, combining the best features of both products.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="timeline-item timeline-item-start">
                                <div class="timeline-icon icon-item icon-item-lg text-primary border-300"><span
                                        class="fs-1 fas fa-book-open"></span></div>
                                <div class="row">
                                    <div class="col-lg-6 timeline-item-time">
                                        <div>
                                            <p class="fs--1 mb-0 fw-semi-bold">2008</p>
                                            <p class="fs--2 text-600">15 January</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="timeline-item-content">
                                            <div class="timeline-item-card">
                                                <h5 class="mb-2">MacBook Air released</h5>
                                                <p class="fs--1 mb-0">Along with releasing the next generation of the
                                                    iPhone, the iPhone 3G, Apple also released the MacBook Air which
                                                    would set the precedent across the industry for thinner, lighter
                                                    laptops. </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="timeline-item timeline-item-end">
                                <div class="timeline-icon icon-item icon-item-lg text-primary border-300"><span
                                        class="fs-1 fas fa-rocket"></span></div>
                                <div class="row">
                                    <div class="col-lg-6 timeline-item-time">
                                        <div>
                                            <p class="fs--1 mb-0 fw-semi-bold">2007</p>
                                            <p class="fs--2 text-600">01 January</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="timeline-item-content">
                                            <div class="timeline-item-card">
                                                <h5 class="mb-2">First generation iphone</h5>
                                                <p class="fs--1 mb-0">The first-generation iPhone was released with a
                                                    mere 4GB storage and would launch the company into a new portable
                                                    internet age of smartphones.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="timeline-item timeline-item-start">
                                <div class="timeline-icon icon-item icon-item-lg text-primary border-300"><span
                                        class="fs-1 fas fa-tint"></span></div>
                                <div class="row">
                                    <div class="col-lg-6 timeline-item-time">
                                        <div>
                                            <p class="fs--1 mb-0 fw-semi-bold">1984</p>
                                            <p class="fs--2 text-600">24 April</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="timeline-item-content">
                                            <div class="timeline-item-card">
                                                <h5 class="mb-2">Apple IIc &amp; The Mac</h5>
                                                <p class="fs--1 mb-0">1984 saw the rise of the Apple IIc, the first
                                                    portable computer which was intended to be carried around but had no
                                                    battery, this meant that a power socket would need to be nearby for
                                                    you to use it.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="timeline-item timeline-item-end">
                                <div class="timeline-icon icon-item icon-item-lg text-primary border-300"><span
                                        class="fs-1 fas fa-flag"></span></div>
                                <div class="row">
                                    <div class="col-lg-6 timeline-item-time">
                                        <div>
                                            <p class="fs--1 mb-0 fw-semi-bold">1976</p>
                                            <p class="fs--2 text-600">01 July</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="timeline-item-content">
                                            <div class="timeline-item-card">
                                                <h5 class="mb-2">Apple I was launched</h5>
                                                <p class="fs--1 mb-0">July 1st, 1976 was when the Apple I was launched,
                                                    designed and built by Steve Wozniak, the co-founder of Apple.
                                                    However, it was Steve Jobs who had the idea to sell the computer and
                                                    it was there that the Apple empire was born.</p>
                                            </div>
                                        </div>
                                    </div>
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
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/pages/timeline.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/component.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/aparatur/timeline.css') }}">
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>
@endsection
