<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('assets/css/pages/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/template/logo.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/template/logo.png') }}" type="image/png">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/extensions/toastify-js/src/toastify.css') }}">
</head>

<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-6 d-none d-lg-block">
                <div id="auth-right">
                    <h1 data-aos="fade-right" data-aos-duration="2000" class="text-white login-title">Sistem Informasi
                        Jabatan Fungsional DAMKAR
                    </h1>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="">
                            <img src="{{ asset('assets/images/template/logo.png') }}" alt="Logo">
                        </a>
                    </div>
                    <div class="form">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group position-relative has-icon-left mb-4">
                                <input type="text"
                                    class="form-control form-control-xl @error('username') is-invalid @enderror"
                                    placeholder="Username" value="{{ old('username') }}" name="username" required
                                    autocomplete="none">
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group position-relative has-icon-left mb-4">
                                <input type="password"
                                    class="form-control form-control-xl @error('password') is-invalid @enderror"
                                    placeholder="Password" name="password" required>
                                <div class="form-control-icon">
                                    <i class="bi bi-shield-lock"></i>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-check form-check-lg d-flex align-items-end">
                                <input class="form-check-input me-2" type="checkbox"
                                    {{ old('remember') ? 'checked' : '' }} name="remember" value=""
                                    id="flexCheckDefault">
                                <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                    Remamber Me
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block btn-lg mt-3">Log in</button>
                            {{-- <div class="d-flex flex-column mt-2">
                                <a style="font-size: 14px;" href="">Register Admin Provinsi, Kab/Kota</a>
                                <a style="font-size: 14px;" href="">Register Aparatur</a>
                            </div> --}}
                        </form>
                    </div>
                    {{-- <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Don't have an account? <a href="auth-register.html"
                                class="font-bold">Sign
                                up</a>.</p>
                        <p><a class="font-bold" href="auth-forgot-password.html">Forgot password?</a>.</p>
                    </div> --}}
                </div>
            </div>

            <img style="position: absolute; bottom: 0;"
                src="{{ asset('assets/images/template/glombang-2.png') }}"alt="">
            <img style="position: absolute; bottom: 0;" src="{{ asset('assets/images/template/glombang-1.png') }}"
                alt="">
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="{{ asset('assets/js/auth/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/toastify-js/src/toastify.js') }}"></script>
    @if (session('message'))
        <script>
            Toastify({
                text: "{{ session('message') }}",
                duration: 5000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "#EDE40C",
            }).showToast();
        </script>
    @endif
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
</body>

</html>
