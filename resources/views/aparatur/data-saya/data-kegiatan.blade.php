@extends('layouts.master')
@section('content')
    <div class="section">
        <div class="row">
            <div class="col">
                <ul class="nav nav-pills d-flex justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('data-saya') }}">Detail</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('data-saya.data-kegiatan') }}">KEGIATAN</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
