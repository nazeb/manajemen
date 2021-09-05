<!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url(); ?>/c_pemilik/">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Manajemen Keuangan</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo site_url(); ?>/c_pemilik/">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Transaksi Jual Beli
            </div>

            <!-- Nav Item - Penjualan -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url(); ?>/c_pemilik/viewPenjualan">
                    <i class="fas fa-fw fa-dollar-sign"></i>
                    <span>Penjualan</span></a>
            </li>

            <!-- Nav Item - Pemebelian -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url(); ?>/c_pemilik/viewPembelian">
                    <i class="fas fa-fw fa-dollar-sign"></i>
                    <span>Pembelian</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Bahan Baku & Menu
            </div>

            <!-- Nav Item - Bahan Baku -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-layer-group"></i>
                    <span>Bahan Baku</span></a>
            </li>

            <!-- Nav Item - Menu Makanan -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url(); ?>/c_pemilik/viewMenu">
                    <i class="fas fa-fw fa-hamburger"></i>
                    <span>Menu Makanan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Nav Item -  Manajemen Pegawai -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url(); ?>/c_pemilik/viewPegawai">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Manajemen Pegawai</span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->