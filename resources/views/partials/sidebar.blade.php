<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <h2 class="text-white mt-3">SIM Penilaian</h2>

            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                    <a href="/dashboard">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Data Master</h4>
                </li>

                <li class="nav-item {{ Request::is('user') ? 'active' : '' }}">
                    <a href="/user">
                        <i class="fas fa-user"></i>
                        <p>User</p>
                    </a>
                </li>

                <li class="nav-item {{ Request::is('karyawan') ? 'active' : '' }}">
                    <a href="/karyawan">
                        <i class="fas fa-user"></i>
                        <p>Karyawan</p>
                    </a>
                </li>

                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Penilaian</h4>
                </li>


                <li class="nav-item {{ Request::is('penilaian') ? 'active' : '' }}">
                    <a href="/penilaian">
                        <i class="fas fa-clipboard-list"></i>
                        <p>Penilaian</p>
                    </a>
                </li>

                <li class="nav-item {{ Request::is('laporan') ? 'active' : '' }}">
                    <a href="/laporan">
                        <i class="fas fa-clipboard-list"></i>
                        <p>Laporan Penilaian</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
