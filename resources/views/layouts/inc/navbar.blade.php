<style>
    .navbar-diam {
        position: fixed;
        z-index: 9;
        width: 100%;
        width: -moz-available;
        /* WebKit-based browsers will ignore this. */
        width: -webkit-fill-available;
        /* Mozilla-based browsers will ignore this. */
        width: fill-available;
    }
</style>
<header class='mb-3 bg-dark shadow-sm navbar-diam'>
    <nav class="navbar navbar-expand navbar-light navbar-top">
        <div class="container-fluid">
            <a href="#" class="burger-btn d-block">
                <i class="bi bi-justify fs-3"></i>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <h5 class=" ms-3" style="margin-top:12px">
                {{--  @isset($judul)
                    {{ $judul }}
                @endisset  --}}
            </h5>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-lg-0">
                    {{--  <li class="nav-item dropdown me-1">
                        <a class="nav-link active dropdown-toggle text-gray-600" href="#"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class='bi bi-envelope bi-sub fs-4'></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li>
                                <h6 class="dropdown-header">Mail</h6>
                            </li>
                            <li><a class="dropdown-item pesan" href="#" style="">No new maillllllll</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown me-3">
                        <a class="nav-link active dropdown-toggle text-gray-600" href="#"
                            data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                            <i class='bi bi-bell bi-sub fs-4'></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end notification-dropdown"
                            aria-labelledby="dropdownMenuButton">
                            <li class="dropdown-header">
                                <h6>Notifications</h6>
                            </li>
                            <li class="dropdown-item notification-item">
                                <a class="d-flex align-items-center" href="#">
                                    <div class="notification-icon bg-primary">
                                        <i class="bi bi-cart-check"></i>
                                    </div>
                                    <div class="notification-text ms-4">
                                        <p class="notification-title font-bold">Successfully check out</p>
                                        <p class="notification-subtitle font-thin text-sm">Order ID #256
                                        </p>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-item notification-item">
                                <a class="d-flex align-items-center" href="#">
                                    <div class="notification-icon bg-success">
                                        <i class="bi bi-file-earmark-check"></i>
                                    </div>
                                    <div class="notification-text ms-4">
                                        <p class="notification-title font-bold">Homework submitted</p>
                                        <p class="notification-subtitle font-thin text-sm">Algebra math
                                            homework</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <p class="text-center py-2 mb-0"><a href="#">See all
                                        notification</a></p>
                            </li>
                        </ul>
                    </li>  --}}
                </ul>
                <div class="dropdown">
                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-menu d-flex align-items-center">
                            {{--  <div class="user-name text-end me-3">
                                <h6 class="mb-0 text-gray-600">{{ Auth::user()->username }}</h6>
                            </div>  --}}
                            @role(getAllRoleFungsional())
                                <div class="user-img d-flex align-items-center">
                                    <div class="avatar avatar-md">
                                        <img
                                            src="{{ isset($user->userAparatur?->foto_pegawai) ? $user->userAparatur?->foto_pegawai : asset('assets/images/faces/3.jpg') }}">
                                    </div>
                                </div>
                            @endrole
                            @role(['atasan_langsung', 'penilai_ak_damkar', 'penilai_ak_analis', 'penetap_ak_damkar',
                                'penetap_ak_analis'])
                                <div class="user-img d-flex align-items-center">
                                    <div class="avatar avatar-md">
                                        <img
                                            src="{{ isset($user->userPejabatStruktural?->foto_pegawai) ? $user->userPejabatStruktural?->foto_pegawai : asset('assets/images/faces/3.jpg') }}">
                                    </div>
                                </div>
                            @endrole
                            @role('kab_kota')
                                <div class="user-img d-flex align-items-center">
                                    <div class="avatar avatar-md">
                                        <img
                                            src="{{ isset($user->userPejabatStruktural?->foto_pegawai) ? $user->userPejabatStruktural?->foto_pegawai : asset('assets/images/faces/3.jpg') }}">
                                    </div>
                                </div>
                            @endrole
                            @role('provinsi')
                                <div class="user-img d-flex align-items-center">
                                    <div class="avatar avatar-md">
                                        <img
                                            src="{{ isset($user->userPejabatStruktural?->foto_pegawai) ? $user->userPejabatStruktural?->foto_pegawai : asset('assets/images/faces/3.jpg') }}">
                                    </div>
                                </div>
                            @endrole
                            @role('kemendagri')
                                <div class="user-img d-flex align-items-center">
                                    <div class="avatar avatar-md">
                                        <img
                                            src="{{ isset($user->userPejabatStruktural?->foto_pegawai) ? $user->userPejabatStruktural?->foto_pegawai : asset('assets/images/faces/3.jpg') }}">
                                    </div>
                                </div>
                            @endrole
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                        style="min-width: 11rem;">
                        <li>
                            <h6 class="dropdown-header">Hello, {{ Auth::user()->username }}</h6>
                        </li>
                        @role(getAllRoleFungsional())
                            <li>
                                <a class="dropdown-item" href="{{ route('data-saya') }}">
                                    <i class="icon-mid bi bi-person me-2"></i>
                                    Data Saya
                                </a>
                            </li>
                        @endrole
                        @role(getAllRoleFungsional())
                            <li>
                                <a class="dropdown-item" href="{{ route('ubah-password') }}">
                                    <i class="fa-solid fa-lock me-2"></i>
                                    Ubah Password
                                </a>
                            </li>
                        @endrole
                        @role(['atasan_langsung', 'penilai_ak', 'penetap_ak'])
                            <li>
                                <a class="dropdown-item" href="{{ route('data-struktural') }}">
                                    <i class="icon-mid bi bi-person me-2"></i>
                                    Data Saya
                                </a>
                            </li>
                        @endrole
                        @role(['atasan_langsung', 'penilai_ak', 'penetap_ak'])
                            <li>
                                <a class="dropdown-item" href="{{ route('ubah-password') }}">
                                    <i class="fa-solid fa-lock me-2"></i>
                                    Ubah Password
                                </a>
                            </li>
                        @endrole
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                    class="icon-mid bi bi-box-arrow-left me-2"></i>
                                Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>

<script></script>
