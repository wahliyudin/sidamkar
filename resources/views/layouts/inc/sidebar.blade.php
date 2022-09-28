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
                {{-- <li class="sidebar-title">Menu</li> --}}

                <li class="sidebar-item active ">
                    <a href="index.html" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="index.html" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>My Data</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="index.html" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Tabel Kegiatan</span>
                        <span style="padding: 2px 6px; background-color: #EBFF02; color: black; border-radius: 4px;">
                            50</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="index.html" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Laporan Kegiatan</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="index.html" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Riwayat Tugas</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="index.html" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Revisi Laporan</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
