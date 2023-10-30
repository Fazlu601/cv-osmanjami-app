<ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: #023047" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            CV
        </div>
        <div class="sidebar-brand-text mx-3">OSMAN JAYA MINERAL</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-table"></i>
            <span>Data Master</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">List</h6>
                <a class="collapse-item {{ request()->is('data/barang') ? 'active' : '' }}" href="/data/barang">Data Barang</a>
                <a class="collapse-item {{ request()->is('data/pelanggan') ? 'active' : '' }}" href="/data/pelanggan">Data Pelanggan</a>
                <a class="collapse-item {{ request()->is('data/penjualan') ? 'active' : '' }}" href="/data/penjualan">Data Penjualan</a>
                <a class="collapse-item {{ request()->is('data/delivery') ? 'active' : '' }}" href="/data/delivery">Data Pengiriman</a>
                <a class="collapse-item {{ request()->is('data/pembayaran') ? 'active' : '' }}" href="/data/pembayaran">Data Pembayaran</a>
            </div>
        </div>
    </li>
    
     <!-- Heading -->
     <div class="sidebar-heading">
        Laporan
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-file"></i>
            <span>Laporan</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">List</h6>
                <a class="collapse-item {{ request()->is('laporan/pembayaran') ? 'active' : '' }}" href="/laporan/pembayaran">laporan Pembayaran</a>
                <a class="collapse-item {{ request()->is('laporan/pengiriman') ? 'active' : '' }}" href="/laporan/pengiriman">laporan Pengiriman</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
     <!-- Nav Item - Dashboard -->
     <li class="nav-item {{ request()->is('/pengguna-sistem') ? 'active' : '' }}">
        <a class="nav-link" href="/pengguna-sistem">
            <i class="fas fa-fw fa-user"></i>
            <span>Pengguna Sistem</span></a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>