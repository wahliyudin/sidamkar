@extends('layouts.auth')

@section('content')
    <div class="card col-md-4 mb-0" style="box-shadow: unset;">
        <div class="card-body py-4 px-4" style="border-radius: 10px;">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="text-center mb-3">
                    <img class="logo" src="{{ asset('assets/images/template/logo.png') }}" alt="">
                    <h5 class="header-login mb-0">SISTEM INFORMASI DAMKAR</h5>
                    <span class="bot-login d-block text-muted">Silahkan Masuk, Menggunakan Akun
                        Damkar</span>
                </div>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="row mb-3">
                    <div class="form-group">
                        <label for="email" style="color: #000000"
                            class=" col-form-label ">{{ __('Email Address') }}</label>

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email"
                            placeholder="Masukan Email" autofocus style="padding-bottom: 1.5rem; padding-top: 1.5rem;">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
