<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-center align-items-center">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <img style="width: 5rem; height: 6rem;" src="{{ asset('assets/images/template/logo.png') }}"
                            alt="Logo" srcset="">
                    </a>
                </div>
                <div class="sidebar-toggler  x">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-item {{ request()->routeIs('home') ? 'active' : '' }}">
                    <a href="index.html" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->routeIs('my-data') ? 'active' : '' }}">
                    <a href="{{ route('my-data') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>My Data</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->routeIs('tabel-kegiatan') ? 'active' : '' }}">
                    <a href="{{ route('tabel-kegiatan') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Tabel Kegiatan</span>
                        <span style="padding: 2px 6px; background-color: #EBFF02; color: black; border-radius: 4px;">
                            50</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->routeIs('laporan-kegiatan') ? 'active' : '' }}">
                    <a href="{{ route('laporan-kegiatan') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Laporan Kegiatan</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->routeIs('riwayat-kegiatan') ? 'active' : '' }}">
                    <a href="{{ route('riwayat-kegiatan') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Riwayat Tugas</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->routeIs('revisi-laporan-kegiatan') ? 'active' : '' }}">
                    <a href="{{ route('revisi-laporan-kegiatan') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Revisi Laporan</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->routeIs('verifikasi-data') ? 'active' : '' }}">
                    <a href="{{ route('verifikasi-data') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Verifikasi Data</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->routeIs('data-aparatur') ? 'active' : '' }}">
                    <a href="{{ route('data-aparatur') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Data Aparatur</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
