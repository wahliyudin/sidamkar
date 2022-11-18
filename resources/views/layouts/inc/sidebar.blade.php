<div id="sidebar" class="active">
    <div class="sidebar-wrapper position-fixed active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-center align-items-center">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <img style="width: 6rem; height: 7rem;" src="{{ asset('assets/images/template/logo.png') }}"
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
                            <li class="submenu-item {{ request()->routeIs('laporan-kegiatan.profesi') ? 'active' : '' }}">
                                <a href="{{ route('laporan-kegiatan.profesi') }}">Profesi</a>
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
                        class="sidebar-item has-sub {{ request()->is('kab-kota/data-aparatur/pejabat-fungsional*') || request()->is('kab-kota/verifikasi-aparatur/pejabat-struktural*') ? 'active' : '' }}">
                        <a href="javascript(0)" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="fa-solid fa-copy"></i>
                            </div>
                            <span>Manajemen User</span>
                        </a>
                        <ul
                            class="submenu {{ request()->is('kab-kota/verifikasi-aparatur/pejabat-fungsional*') || request()->is('kab-kota/verifikasi-aparatur/pejabat-struktural*') ? 'active' : '' }}">
                            <li
                                class="submenu-item {{ request()->is('kab-kota/verifikasi-aparatur/pejabat-fungsional*') ? 'active' : '' }}">
                                <a
                                    href="{{ route('kab-kota.verifikasi-aparatur.pejabat-fungsional.index') }}">Fungsional</a>
                            </li>
                            <li
                                class="submenu-item {{ request()->is('kab-kota/verifikasi-aparatur/pejabat-struktural*') ? 'active' : '' }}">
                                <a
                                    href="{{ route('kab-kota.verifikasi-aparatur.pejabat-struktural.index') }}">Struktural</a>
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
                    <li class="sidebar-item {{ request()->routeIs('kab-kota.chatbox') ? 'active' : '' }}">
                        <a href="{{ route('kab-kota.chatbox') }}" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="fa-solid fa-message"></i>
                            </div>
                            <span>Chatbox</span>
                        </a>
                    </li>
                @endrole

                @role('atasan_langsung')
                    <li class="sidebar-item {{ request()->routeIs('atasan-langsung.overview.index') ? 'active' : '' }}">
                        <a href="{{ route('atasan-langsung.overview.index') }}" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="bi bi-grid-fill"></i>
                            </div>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->is('atasan-langsung/pengajuan-kegiatan*') ? 'active' : '' }}">
                        <a href="{{ route('atasan-langsung.pengajuan-kegiatan.index') }}" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="fa-solid fa-clipboard"></i>
                            </div>
                            <span>Verifikasi Kegiatan</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('atasan-langsung.kegiatan-selesai') ? 'active' : '' }}">
                        <a href="{{ route('atasan-langsung.kegiatan-selesai') }}" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="fa-solid fa-clipboard-check"></i>
                            </div>
                            <span>Kegiatan Selesai</span>
                        </a>
                    </li>
                @endrole

                @role('penilai_ak')
                    <li class="sidebar-item {{ request()->routeIs('penilai-ak.overview') ? 'active' : '' }}">
                        <a href="{{ route('penilai-ak.overview') }}" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="bi bi-grid-fill"></i>
                            </div>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li
                        class="sidebar-item {{ request()->routeIs('penilai-ak.kegiatan-profesi.profesi-penunjang') || request()->routeIs('penilai-ak.kegiatan-profesi.show') ? 'active' : '' }}">
                        <a href="{{ route('penilai-ak.kegiatan-profesi.profesi-penunjang') }}" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="fa-solid fa-square-poll-vertical"></i>
                            </div>
                            <span>Kegiatan Profesi
                                & Penunjang </span>
                        </a>
                    </li>
                    <li
                        class="sidebar-item {{ request()->routeIs('penilai-ak.data-penunjang.data-pengajuan') || request()->routeIs('penilai-ak.kegiatan-profesi.show') ? 'active' : '' }}">
                        <a href="{{ route('penilai-ak.data-penunjang.data-pengajuan') }}" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="fa-solid fa-table"></i>
                            </div>
                            <span>Data Pengajuan</span>
                        </a>
                    </li>
                    <li
                        class="sidebar-item {{ request()->routeIs('penilai-ak.kegiatan-selesai.kegiatan-selesai') ? 'active' : '' }}">
                        <a href="{{ route('penilai-ak.kegiatan-selesai.kegiatan-selesai') }}" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="fa-solid fa-check"></i>
                            </div>
                            <span>Kegiatan Selesai</span>
                        </a>
                    </li>
                @endrole


                @role('penetap_ak')
                    <li class="sidebar-item {{ request()->routeIs('penetap-ak.overview') ? 'active' : '' }}">
                        <a href="{{ route('penetap-ak.overview') }}" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="bi bi-grid-fill"></i>
                            </div>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li
                        class="sidebar-item has-sub {{ request()->is('penetap-ak/data-pengajuan/kabkota-external/kabKota-external') || request()->is('penetap-ak/data-pengajuan/kabkota-internal/kabKota-internal') ? 'active' : '' }}">
                        <a href="javascript(0)" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="fa-solid fa-square-poll-vertical"></i>
                            </div>
                            <span>Data Pengajuan</span>
                        </a>
                        <ul
                            class="submenu {{ request()->is('penetap-ak/data-pengajuan/kabkota-external/kabKota-external') || request()->is('penetap-ak/data-pengajuan/kabkota-internal/kabKota-internal') ? 'active' : '' }}">
                            <li
                                class="submenu-item {{ request()->is('penetap-ak/data-pengajuan/kabkota-internal/kabKota-internal') ? 'active' : '' }}">
                                <a href="{{ route('penetap-ak.data-pengajuan.kabkota-internal.kabKota-internal') }}">Kabupaten
                                    / Kota
                                    Internal</a>
                            </li>
                            <li
                                class="submenu-item {{ request()->is('penetap-ak/data-pengajuan/kabkota-external/kabKota-external') ? 'active' : '' }}">
                                <a href="{{ route('penetap-ak.data-pengajuan.kabkota-external.kabKota-external') }}">Kabupaten
                                    / Kota
                                    External</a>
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
                            <span>Overview</span>
                        </a>
                    </li>
                    <li
                        class="sidebar-item has-sub {{ request()->is('provinsi/aparatur/data-aparatur') || request()->is('provinsi/kabkota') ? 'active' : '' }}">
                        <a href="javascript(0)" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="fa-solid fa-copy"></i>
                            </div>
                            <span>Manajemen User</span>
                        </a>
                        <ul
                            class="submenu {{ request()->is('provinsi/aparatur/data-aparatur') || request()->is('provinsi/kabkota') ? 'active' : '' }}">
                            <li
                                class="submenu-item {{ request()->is('provinsi/aparatur/data-aparatur') ? 'active' : '' }}">
                                <a href="{{ route('provinsi.aparatur.data-aparatur') }}">Aparatur</a>
                            </li>
                            <li class="submenu-item {{ request()->is('provinsi/kabkota') ? 'active' : '' }}">
                                <a href="{{ route('provinsi.kabkota') }}">Kabupaten / Kota</a>
                            </li>
                        </ul>
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
                        class="sidebar-item has-sub {{ request()->is('kemendagri/cms/kegiatan-profesi*') || request()->is('kemendagri/cms/informasi*') || request()->is('kemendagri/cms/kegiatan-jabatan*') || request()->is('kemendagri/cms/periode*') ? 'active' : '' }}">
                        <a href="javascript(0)" class='sidebar-link'>
                            <div style="width: 16px; height: 16px; display: flex; align-items: center;">
                                <i class="fa-solid fa-laptop"></i>
                            </div>
                            <span>CMS</span>
                        </a>
                        <ul
                            class="submenu {{ request()->is('kemendagri/cms/kegiatan-profesi*') || request()->is('kemendagri/cms/informasi*') || request()->is('kemendagri/cms/kegiatan-jabatan*') || request()->is('kemendagri/cms/periode*') ? 'active' : '' }}">
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
