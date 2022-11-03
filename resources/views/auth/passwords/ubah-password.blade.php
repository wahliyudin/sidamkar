@extends('layouts.master')

@section('content')
    <section class="section d-flex justify-content-center">
        <div class="card" style="height: 65vh; width: 50vw;">
            <div class="card-header">
                <h4>Ubah Password</h4>
            </div>
            <div class="card-body">
                <div class="row justify-content-center align-items-center h-100">
                    <form class="col-md-8" action="{{ route('ubah-password.update') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Password Lama</label>
                            <input class="form-control" required type="password" name="old_password">
                            @error('old_password')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" required type="password" name="password">
                            @error('password')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password Konfirmasi</label>
                            <input class="form-control" required type="password" name="password_confirmation">
                            @error('password_confirmation')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-green">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/extensions/toastify-js/src/toastify.css') }}">
    <style>
        @media screen and (max-width:780px) {
            .card {
                padding: 0 !important;
                width: 100vw !important;
            }

            #main-content {
                padding: 0 !important;
            }
        }
    </style>
@endsection
@section('js')
    <script src="{{ asset('assets/extensions/toastify-js/src/toastify.js') }}"></script>
    @if (session('success'))
        <script>
            Toastify({
                text: "{{ session('success') }}",
                duration: 5000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "#1AD598",
            }).showToast();
        </script>
    @endif
@endsection
