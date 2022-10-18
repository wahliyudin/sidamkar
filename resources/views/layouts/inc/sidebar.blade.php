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
                @role(getAllRoleFungsional())
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
                    <li
                        class="sidebar-item has-sub {{ request()->routeIs('kab-kota.verifikasi-aparatur') ? 'active' : '' }}">
                        <a href="javascript(0)" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="bi bi-grid-fill"></i>
                            </div>
                            <span>Verifikasi Aparatur</span>
                        </a>
                        <ul
                            class="submenu {{ request()->is('kab-kota/verifikasi-aparatur/pejabat-fungsional*') || request()->is('kab-kota/verifikasi-aparatur/pejabat-struktural*') ? 'active' : '' }}">
                            <li
                                class="submenu-item {{ request()->is('kab-kota/verifikasi-aparatur/pejabat-fungsional*') ? 'active' : '' }}">
                                <a href="{{ route('kab-kota.verifikasi-aparatur.pejabat-fungsional.index') }}">Pejabat
                                    Fungsional</a>
                            </li>
                            <li
                                class="submenu-item {{ request()->is('kab-kota/verifikasi-aparatur/pejabat-struktural*') ? 'active' : '' }}">
                                <a href="{{ route('kab-kota.verifikasi-aparatur.pejabat-struktural.index') }}">Pejabat
                                    Struktural</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item {{ request()->is('kab-kota/data-aparatur*') ? 'active' : '' }}">
                        <a href="{{ route('kab-kota.data-aparatur.index') }}" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="bi bi-grid-fill"></i>
                            </div>
                            <span>Data Aparatur</span>
                        </a>
                    </li>
                @endrole

                @role('atasan_langsung')
                    <li class="sidebar-item {{ request()->routeIs('atasan-langsung.overview.index') ? 'active' : '' }}">
                        <a href="{{ route('atasan-langsung.overview.index') }}" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="bi bi-grid-fill"></i>
                            </div>
                            <span>Overview</span>
                        </a>
                    </li>
                @endrole

                @role('provinsi')
                    <li class="sidebar-item {{ request()->routeIs('provinsi.overview.index') ? 'active' : '' }}">
                        <a href="{{ route('provinsi.overview.index') }}" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="bi bi-grid-fill"></i>
                            </div>
                            <span>Overview</span>
                        </a>
                    </li>
                @endrole
            </ul>
        </div>
    </div>
</div>
