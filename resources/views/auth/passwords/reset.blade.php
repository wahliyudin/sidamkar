@extends('layouts.auth')

@section('content')
    <div class="card col-md-4 mb-0" style="box-shadow: unset;">
        <div class="card-body py-4 px-4" style="border-radius: 10px;">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <div class="text-center mb-3">
                    <img class="logo" src="{{ asset('assets/images/template/logo.png') }}" alt="">
                    <h5 class="header-login mb-0">SISTEM INFORMASI DAMKAR</h5>
                </div>

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group">
                    <label for="email" style="color: black !important;" class="">{{ __('Email Address') }}</label>

                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ $email ?? old('email') }}"
                        style="padding-bottom: 1.5rem; padding-top: 1.5rem;" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" style="color: black !important;" class="">{{ __('Password') }}</label>

                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password"
                        style="padding-bottom: 1.5rem; padding-top: 1.5rem;">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password-confirm" style="color: black !important;"
                        class="">{{ __('Confirm Password') }}</label>

                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                        autocomplete="new-password" style="padding-bottom: 1.5rem; padding-top: 1.5rem;">
                </div>


                <div class="row mb-0">
                    <div class="col-md-12 text-end">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
