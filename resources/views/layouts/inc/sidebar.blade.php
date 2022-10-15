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
                @role(['damkar', 'analis_kebakaran'])
                    <li class="sidebar-item {{ request()->routeIs('overview') ? 'active' : '' }}">
                        <a href="{{ route('overview') }}" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="bi bi-grid-fill"></i>
                            </div>
                            <span>Overview</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('daftar-kegiatan') ? 'active' : '' }}">
                        <a href="{{ route('daftar-kegiatan') }}" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="fa-solid fa-list"></i>
                            </div>
                            <span>Daftar Kegiatan</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ request()->routeIs('tabel-kegiatan') ? 'active' : '' }}">
                        <a href="{{ route('tabel-kegiatan') }}" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="fa-solid fa-person-walking"></i>
                            </div>
                            <span>Tabel Kegiatan</span>
                            <span style="padding: 2px 6px; background-color: #EBFF02; color: white; border-radius: 4px;">
                                50</span>
                        </a>
                    </li>
                    <li
                        class="sidebar-item {{ request()->routeIs('laporan-kegiatan') || request()->routeIs('laporan-kegiatan') ? 'active' : '' }}">
                        <a href="{{ route('laporan-kegiatan') }}" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="fa-regular fa-rectangle-list"></i>
                            </div>
                            <span>Laporan Kegiatan</span>
                        </a>
                    </li>
                @endrole

                @role('kab_kota')
                    <li class="sidebar-item {{ request()->routeIs('kab-kota.overview') ? 'active' : '' }}">
                        <a href="{{ route('kab-kota.overview') }}" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="bi bi-grid-fill"></i>
                            </div>
                            <span>Overview</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('kab-kota.verifikasi-aparatur') ? 'active' : '' }}">
                        <a href="{{ route('kab-kota.verifikasi-aparatur') }}" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="bi bi-grid-fill"></i>
                            </div>
                            <span>Verifikasi Aparatur</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('kab-kota.data-aparatur') ? 'active' : '' }}">
                        <a href="{{ route('kab-kota.data-aparatur') }}" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="bi bi-grid-fill"></i>
                            </div>
                            <span>Data Aparatur</span>
                        </a>
                    </li>
                @endrole

                {{-- <li class="sidebar-item {{ request()->routeIs('butir-kegiatan') ? 'active' : '' }}">
                    <a data-bs-toggle="modal" data-bs-target="#riwayat" class='sidebar-link'>
                        <i class="fa-regular fa-file"></i>
                        <span>Riwayat Tugas</span>
                    </a>
                </li> --}}
                {{-- <li class="sidebar-item {{ request()->routeIs('revisi-laporan-kegiatan') ? 'active' : '' }}">
                    <a href="{{ route('revisi-laporan-kegiatan') }}" class='sidebar-link'>
                        <i class="fa-solid fa-screwdriver-wrench"></i>
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
                <li class="sidebar-item {{ request()->routeIs('data-pejabat-struktural') ? 'active' : '' }}">
                    <a href="{{ route('data-pejabat-struktural') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Data Pejabat Struktural</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->routeIs('lampiran-kegiatan') ? 'active' : '' }}">
                    <a href="{{ route('lampiran-kegiatan') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Lampiran Kegiatan</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->routeIs('data-pengajuan-laporan-kegiatan') ? 'active' : '' }}">
                    <a href="{{ route('data-pengajuan-laporan-kegiatan') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Data Pengajuan Laporan Kegiatan</span>
                    </a>
                </li> --}}
            </ul>
        </div>
    </div>
</div>
