@extends('layouts.auth')

@section('content')
    <div class="card col-md-4 mb-0" style="box-shadow: unset;">
        <div class="card-body py-4 px-4" style="border-radius: 10px;">
            <form class="" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="text-center mb-3">
                    <img class="logo" src="{{ asset('assets/images/template/logo.png') }}" alt="">
                    <h5 class="header-login mb-0">SISTEM INFORMASI DAMKAR</h5>
                    <span class="bot-login d-block text-muted">Silahkan Masuk, Menggunakan Akun
                        Damkar</span>
                </div>

                <div class="form-group mt-4 form-group-feedback form-group-feedback-left">
                    <input type="text" class="form-control @error('username') is-invalid @enderror"
                        placeholder="Username" name="username" value="{{ old('username') }}" required autocomplete="none"
                        style="padding-bottom: 1.5rem; padding-top: 1.5rem;">
                    <div class="form-control-feedback">
                        <i class="icon-user text-muted"></i>
                    </div>
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="Password" name="password" required
                        style="padding-bottom: 1.5rem; padding-top: 1.5rem;">
                    <div class="form-control-feedback">
                        <i class="icon-lock2 text-muted"></i>
                    </div>
                    <div class="show-hide">
                        <i class="fa-solid fa-eye"></i>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                </div>

                <div class="d-flex flex-column">
                    <p style="margin: 0 !important;">Belum memiliki akun?<a href="{{ route('register') }}"> Daftar </a></p>
                    <p style="margin: 0 !important;">Lupa Password?<a href="{{ route('password.request') }}">
                            Reset </a></p>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    @if (session('success'))
        <script>
            Toastify({
                text: "{{ session('success') }}",
                duration: 5000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "#EDE40C",
            }).showToast();
        </script>
    @endif
@endsection
