<div id="sidebar" class="active">
    <div class="sidebar-wrapper position-fixed active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-center align-items-center">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <img style="width: 6rem; height: 7rem;" src="{{ asset('assets/images/template/logo.png') }}"
                            alt="Logo" srcse t="">
                    </a>
                </div>
                <div class="sidebar-toggler  x">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
            @if (count(Auth::user()->roles) == 1)
                @foreach (Auth::user()->roles as $role)
                    <p style="font-size: 14px; color: white;" class="d-flex justify-content-center align-items-center">
                        {{ $role->display_name }}
                    </p>
                @endforeach
            @else
                <p style="font-size: 14px; color: white;" class="d-flex justify-content-center align-items-center">
                    <marquee width="80%" direction="left" scrollamount="5">
                        @foreach (Auth::user()->roles as $role)
                            {{ $role->display_name }},
                        @endforeach
                    </marquee>
                </p>
            @endif
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                @role(getAllRoleFungsional())
                    <li class="sidebar-item {{ request()->routeIs('overview') ? 'active' : '' }}">
                        <a href="{{ route('overview') }}" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="bi bi-grid-fill"></i>
                            </div>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('kegiatan.jabatan') ? 'active' : '' }}">
                        <a href="{{ route('kegiatan.jabatan') }}" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="fa-solid fa-square-poll-vertical"></i>
                            </div>
                            <span>Rencana Kinerja</span>
                        </a>
                    </li>

                    <li
                        class="sidebar-item has-sub {{ request()->routeIs('laporan-kegiatan.jabatan*') || request()->is('laporan-kegiatan*') ? 'active' : '' }}">
                        <a href="javascript(0)" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="fa-regular fa-rectangle-list"></i>
                            </div>
                            <span>Laporan Kegiatan</span>
                        </a>
                        <ul class="submenu {{ request()->is('laporan-kegiatan*') ? 'active' : '' }}">
                            <li class="submenu-item {{ request()->is('laporan-kegiatan/jabatan*') ? 'active' : '' }}">
                                <a href="{{ route('laporan-kegiatan.jabatan') }}">Jabatan</a>
                            </li>
                            <li class="submenu-item {{ request()->is('laporan-kegiatan/profesi*') ? 'active' : '' }}">
                                <a href="{{ route('laporan-kegiatan.profesi') }}">Profesi</a>
                            </li>
                            <li class="submenu-item {{ request()->is('laporan-kegiatan/penunjang*') ? 'active' : '' }}">
                                <a href="{{ route('laporan-kegiatan.penunjang') }}">Penunjang</a>
                            </li>
                        </ul>
                    </li>
                @endrole

                @role('kab_kota')
                    <li class="sidebar-item {{ request()->routeIs('kab-kota.overview') ? 'active' : '' }}">
                        <a href="{{ route('kab-kota.overview') }}" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="bi bi-grid-fill"></i>
                            </div>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li
                        class="sidebar-item has-sub {{ request()->is('kab-kota/manajemen-user/struktural*') || request()->is('kab-kota/manajemen-user/umum*') || request()->is('kab-kota/manajemen-user/fungsional*') || request()->is('kab-kota/verifikasi-aparatur/pejabat-struktural*') ? 'active' : '' }}">
                        <a href="javascript(0)" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="fa-solid fa-copy"></i>
                            </div>
                            <span>Manajemen User</span>
                        </a>
                        <ul
                            class="submenu {{ request()->is('kab-kota/manajemen-user/struktural*') || request()->is('kab-kota/manajemen-user/umum*') || request()->is('kab-kota/manajemen-user/fungsional*') || request()->is('kab-kota/verifikasi-aparatur/pejabat-struktural*') ? 'active' : '' }}">
                            <li
                                class="submenu-item {{ request()->is('kab-kota/manajemen-user/struktural*') ? 'active' : '' }}">
                                <a href="{{ route('kab-kota.manajemen-user.struktural') }}">Struktural</a>
                            </li>
                            <li
                                class="submenu-item {{ request()->is('kab-kota/manajemen-user/fungsional*') ? 'active' : '' }}">
                                <a href="{{ route('kab-kota.manajemen-user.fungsional') }}">Fungsional</a>
                            </li>
                            <li class="submenu-item {{ request()->is('kab-kota/manajemen-user/umum*') ? 'active' : '' }}">
                                <a href="{{ route('kab-kota.manajemen-user.fungsional-umum') }}">Umum</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item {{ request()->is('kab-kota/data-mente*') ? 'active' : '' }}">
                        <a href="{{ route('kab-kota.data-mente') }}" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="fa-solid fa-clipboard-user"></i>
                            </div>
                            <span>Data Mentee</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('kab-kota.histori-penetapan') ? 'active' : '' }}">
                        <a href="{{ route('kab-kota.histori-penetapan') }}" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="fa-solid fa-table"></i>
                            </div>
                            <span>Histori Penetapan</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('kab-kota.pengangkatan') ? 'active' : '' }}">
                        <a href="{{ route('kab-kota.pengangkatan') }}" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="fa-solid fa-user-plus"></i>
                            </div>
                            <span>Pengangkatan</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ request()->routeIs('kab-kota.chatbox') ? 'active' : '' }}">
                        <a href="{{ route('kab-kota.chatbox') }}" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="fa-solid fa-message"></i>
                            </div>
                            <span>Chatbox</span>
                        </a>
                    </li>
                @endrole
                @role(['penilai_ak_damkar', 'penilai_ak_analis', 'atasan_langsung', 'penetap_ak_damkar',
                    'penetap_ak_analis'])
                    <li class="sidebar-item {{ request()->routeIs('struktural.dashboard') ? 'active' : '' }}">
                        <a href="{{ route('struktural.dashboard') }}" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="bi bi-grid-fill"></i>
                            </div>
                            <span>Dashboard</span>
                        </a>
                    </li>
                @endrole
                @role(['atasan_langsung'])
                    <li class="sidebar-item has-sub ">
                        <a href="javascript(0)" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="fa-solid fa-copy"></i>
                            </div>
                            <span>Atasan Langsung</span>
                        </a>
                        <ul
                            class="submenu {{ request()->is('atasan-langsung/verifikasi-kegiatan*') || request()->is('atasan-langsung/kegiatan-selesai*') ? 'active' : '' }}">
                            <li
                                class="submenu-item {{ request()->is('atasan-langsung/verifikasi-kegiatan*') ? 'active' : '' }}">
                                <a href="{{ route('atasan-langsung.verifikasi-kegiatan') }}">Verifikasi Kegiatan</a>
                            </li>
                            <li
                                class="submenu-item {{ request()->is('atasan-langsung/kegiatan-selesai*') ? 'active' : '' }}">
                                <a href="{{ route('atasan-langsung.kegiatan-selesai') }}">Kegiatan Selesai</a>
                            </li>
                        </ul>
                    </li>
                @endrole

                @role(['penilai_ak_damkar', 'penilai_ak_analis'])
                    <li class="sidebar-item has-sub ">
                        <a href="javascript(0)" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <span>Penilai AK</span>
                        </a>
                        <ul
                            class="submenu {{ request()->is('penilai-ak/data-pengajuan/external*') || request()->is('penilai-ak/data-pengajuan/internal*') ? 'active' : '' }}">
                            <li
                                class="sidebar-item has-sub {{ request()->is('penilai-ak/data-pengajuan/external*') || request()->is('penilai-ak/data-pengajuan/internal*') ? 'active' : '' }}">
                                <a href="javascript(0)" class='sidebar-link'>
                                    <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                        <i class="fa-solid fa-square-poll-vertical"></i>
                                    </div>
                                    <span>Data Pengajuan</span>
                                </a>
                                <ul
                                    class="submenu {{ request()->is('penilai-ak/data-pengajuan/external*') || request()->is('penilai-ak/data-pengajuan/internal*') ? 'active' : '' }}">
                                    <li
                                        class="submenu-item {{ request()->is('penilai-ak/data-pengajuan/internal*') ? 'active' : '' }}">
                                        <a href="{{ route('penilai-ak.data-pengajuan.internal') }}">
                                            Internal</a>
                                    </li>
                                    <li
                                        class="submenu-item {{ request()->is('penilai-ak/data-pengajuan/external*') ? 'active' : '' }}">
                                        <a href="{{ route('penilai-ak.data-pengajuan.external') }}">
                                            Pejabat Daerah Lain</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                @endrole


                @role(['penetap_ak_damkar', 'penetap_ak_analis'])
                    <li class="sidebar-item has-sub ">
                        <a href="javascript(0)" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <span>Penetap AK</span>
                        </a>
                        <ul
                            class="submenu {{ request()->is('penetap-ak/data-pengajuan/external*') || request()->is('penetap-ak/data-pengajuan/internal*') ? 'active' : '' }}">
                            <li
                                class="sidebar-item has-sub {{ request()->is('penetap-ak/data-pengajuan/external*') || request()->is('penetap-ak/data-pengajuan/internal*') ? 'active' : '' }}">
                                <a href="javascript(0)" class='sidebar-link'>
                                    <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                        <i class="fa-solid fa-square-poll-vertical"></i>
                                    </div>
                                    <span>Data Pengajuan</span>
                                </a>
                                <ul
                                    class="submenu {{ request()->is('penetap-ak/data-pengajuan/external*') || request()->is('penetap-ak/data-pengajuan/internal*') ? 'active' : '' }}">
                                    <li
                                        class="submenu-item {{ request()->is('penetap-ak/data-pengajuan/internal*') ? 'active' : '' }}">
                                        <a href="{{ route('penetap-ak.data-pengajuan.internal') }}">
                                            Internal</a>
                                    </li>
                                    <li
                                        class="submenu-item {{ request()->is('penetap-ak/data-pengajuan/external*') ? 'active' : '' }}">
                                        <a href="{{ route('penetap-ak.data-pengajuan.external') }}">
                                            Pejabat Daerah Lain</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                @endrole

                @role('provinsi')
                    <li class="sidebar-item {{ request()->routeIs('provinsi.overview.index') ? 'active' : '' }}">
                        <a href="{{ route('provinsi.overview.index') }}" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="bi bi-grid-fill"></i>
                            </div>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li
                        class="sidebar-item has-sub {{ request()->is('provinsi/manajemen-user/user-kab-kota*') || request()->is('provinsi/manajemen-user/struktural*') || request()->is('provinsi/manajemen-user/fungsional*') || request()->is('provinsi/manajemen-user/umum*') ? 'active' : '' }}">
                        <a href="javascript(0)" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="fa-solid fa-copy"></i>
                            </div>
                            <span>Manajemen User</span>
                        </a>
                        <ul
                            class="submenu {{ request()->is('provinsi/manajemen-user/user-kab-kota*') || request()->is('provinsi/manajemen-user/struktural*') || request()->is('provinsi/manajemen-user/fungsional*') || request()->is('provinsi/manajemen-user/umum*') ? 'active' : '' }}">
                            <li
                                class="submenu-item {{ request()->is('provinsi/manajemen-user/user-kab-kota*') ? 'active' : '' }}">
                                <a href="{{ route('provinsi.manajemen-user.user-kab-kota') }}">Kabupaten/Kota</a>
                            </li>
                            <li
                                class="submenu-item {{ request()->is('provinsi/manajemen-user/struktural*') ? 'active' : '' }}">
                                <a href="{{ route('provinsi.manajemen-user.struktural') }}">Struktural</a>
                            </li>
                            <li
                                class="submenu-item {{ request()->is('provinsi/manajemen-user/fungsional*') ? 'active' : '' }}">
                                <a href="{{ route('provinsi.manajemen-user.fungsional') }}">Fungsional</a>
                            </li>
                            <li class="submenu-item {{ request()->is('provinsi/manajemen-user/umum*') ? 'active' : '' }}">
                                <a href="{{ route('provinsi.manajemen-user.fungsional-umum') }}">Umum</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item {{ request()->is('provinsi/data-mente*') ? 'active' : '' }}">
                        <a href="{{ route('provinsi.data-mente') }}" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="fa-solid fa-clipboard-user"></i>
                            </div>
                            <span>Data Mentee</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('provinsi.histori-penetapan') ? 'active' : '' }}">
                        <a href="{{ route('provinsi.histori-penetapan') }}" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="fa-solid fa-table"></i>
                            </div>
                            <span>Histori Penetapan</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('provinsi.pengangkatan') ? 'active' : '' }}">
                        <a href="{{ route('provinsi.pengangkatan') }}" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="fa-solid fa-user-plus"></i>
                            </div>
                            <span>Pengangkatan</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('provinsi.chatbox') ? 'active' : '' }}">
                        <a href="{{ route('provinsi.chatbox') }}" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="bi bi-grid-fill"></i>
                            </div>
                            <span>Chatbox</span>
                        </a>
                    </li>
                @endrole

                @role('kemendagri')
                    <li class="sidebar-item {{ request()->routeIs('kemendagri.overview.index') ? 'active' : '' }}">
                        <a href="{{ route('kemendagri.overview.index') }}" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="fa-solid fa-table-columns"></i>
                            </div>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li
                        class="sidebar-item has-sub {{ request()->is('kemendagri/verifikasi-data/admin-kabkota*') || request()->is('kemendagri/verifikasi-data/admin-provinsi*') || request()->is('kemendagri/verifikasi-data/aparatur*') ? 'active' : '' }}">
                        <a href="javascript(0)" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="fa-solid fa-square-poll-vertical"></i>
                            </div>
                            <span>Manajemen User</span>
                        </a>
                        <ul
                            class="submenu {{ request()->is('kemendagri/verifikasi-data/admin-kabkota*') || request()->is('kemendagri/verifikasi-data/admin-provinsi*') || request()->is('kemendagri/verifikasi-data/aparatur*') ? 'active' : '' }}">
                            <li
                                class="submenu-item {{ request()->is('kemendagri/verifikasi-data/aparatur*') ? 'active' : '' }}">
                                <a href="{{ route('kemendagri.verifikasi-data.aparatur.aparatur') }}">Aparatur</a>
                            </li>
                            <li
                                class="submenu-item {{ request()->is('kemendagri/verifikasi-data/admin-kabkota*') ? 'active' : '' }}">
                                <a href="{{ route('kemendagri.verifikasi-data.admin-kabkota.index') }}">Admin Kabupaten
                                    Kota</a>
                            </li>
                            <li
                                class="submenu-item {{ request()->is('kemendagri/verifikasi-data/admin-provinsi*') ? 'active' : '' }}">
                                <a href="{{ route('kemendagri.verifikasi-data.admin-provinsi.index') }}">Admin
                                    Provinsi</a>
                            </li>
                        </ul>
                    </li>
                    {{--  <li class="sidebar-item {{ request()->is('kemendagri/pejabat-struktural*') ? 'active' : '' }}">
                        <a href="{{ route('kemendagri.pejabat-struktural.index') }}" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="fa-solid fa-user-tie"></i>
                            </div>
                            <span>Pejabat Struktural</span>
                        </a>
                    </li>
                    <li
                        class="sidebar-item {{ request()->routeIs('kemendagri.data-prov-kab-kota.index') ? 'active' : '' }}">
                        <a href="{{ route('kemendagri.data-prov-kab-kota.index') }}" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="fa-solid fa-table"></i>
                            </div>
                            <span>Data Prov/Kabupaten / Kota</span>
                        </a>
                    </li>
                    <li
                        class="sidebar-item has-sub {{ request()->is('kemendagri/data-admin-daerah/admin-kabkota*') || request()->is('kemendagri/data-admin-daerah/admin-provinsi*') ? 'active' : '' }}">
                        <a href="javascript(0)" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="fa-solid fa-user-group"></i>
                            </div>
                            <span>Data Admin Daerah</span>
                        </a>
                        <ul
                            class="submenu {{ request()->is('kemendagri/data-admin-daerah/admin-kabkota*') || request()->is('kemendagri/data-admin-daerah/admin-provinsi*') ? 'active' : '' }}">
                            <li
                                class="submenu-item {{ request()->is('kemendagri/data-admin-daerah/admin-kabkota*') ? 'active' : '' }}">
                                <a href="{{ route('kemendagri.data-admin-daerah.admin-kabkota.index') }}">Admin
                                    KabKota</a>
                            </li>
                            <li
                                class="submenu-item {{ request()->is('kemendagri/data-admin-daerah/admin-provinsi*') ? 'active' : '' }}">
                                <a href="{{ route('kemendagri.data-admin-daerah.admin-provinsi.index') }}">Admin
                                    Provinsi</a>
                            </li>
                        </ul>
                    </li>  --}}
                    <li
                        class="sidebar-item has-sub {{ request()->is('kemendagri/cms/kegiatan-profesi*') || request()->is('kemendagri/cms/informasi*') || request()->is('kemendagri/cms/kegiatan-jabatan*') || request()->is('kemendagri/cms/kegiatan-penunjang*') || request()->is('kemendagri/cms/periode*') ? 'active' : '' }}">
                        <a href="javascript(0)" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="fa-solid fa-laptop"></i>
                            </div>
                            <span>CMS</span>
                        </a>
                        <ul
                            class="submenu {{ request()->is('kemendagri/cms/kegiatan-penunjang*') || request()->is('kemendagri/cms/kegiatan-profesi*') || request()->is('kemendagri/cms/informasi*') || request()->is('kemendagri/cms/kegiatan-jabatan*') || request()->is('kemendagri/cms/periode*') ? 'active' : '' }}">
                            <li class="submenu-item {{ request()->is('kemendagri/cms/periode*') ? 'active' : '' }}">
                                <a href="{{ route('kemendagri.cms.periode.index') }}">Periode</a>
                            </li>
                            <li
                                class="submenu-item {{ request()->is('kemendagri/cms/kegiatan-jabatan*') ? 'active' : '' }}">
                                <a href="{{ route('kemendagri.cms.kegiatan-jabatan.index') }}">Kegiatan Jabatan</a>
                            </li>
                            <li
                                class="submenu-item {{ request()->is('kemendagri/cms/kegiatan-profesi*') ? 'active' : '' }}">
                                <a href="{{ route('kemendagri.cms.kegiatan-profesi.index') }}">Kegiatan Profesi</a>
                            </li>
                            <li
                                class="submenu-item {{ request()->is('kemendagri/cms/kegiatan-penunjang*') ? 'active' : '' }}">
                                <a href="{{ route('kemendagri.cms.kegiatan-penunjang.index') }}">Kegiatan Penunjang
                                </a>
                            </li>
                            <li class="submenu-item {{ request()->is('kemendagri/cms/informasi*') ? 'active' : '' }}">
                                <a href="{{ route('kemendagri.cms.informasi.index') }}">Informasi</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="fa-regular fa-comments"></i>
                            </div>
                            <span>Chatbox</span>
                        </a>
                    </li>
                @endrole
            </ul>
        </div>
    </div>
</div>
