<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-box-open"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SI BARANG </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= ($menu == 0) ? 'active' : ''; ?>">
                <a class="nav-link" href="<?php echo base_url('admin/C_dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item <?= ($menu == 9) ? 'active' : ''; ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Data Master</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item <?= ($menu_atas == 01) ? 'active' : ''; ?>" href="<?php echo base_url('admin/C_data_barang') ?>">Data Barang</a>
                        <a class="collapse-item <?= ($menu_atas == 07) ? 'active' : ''; ?>" href="<?php echo base_url('admin/C_paket_barang') ?>">Paket Barang</a>
                        <a class="collapse-item <?= ($menu_atas == 02) ? 'active' : ''; ?>" href="<?php echo base_url('admin/C_data_satuan') ?>">Data Satuan</a>
                        <a class="collapse-item <?= ($menu_atas == 03) ? 'active' : ''; ?>" href="<?php echo base_url('admin/C_data_gudang') ?>">Data Gudang</a>
                        <a class="collapse-item <?= ($menu_atas == 04) ? 'active' : ''; ?>" href="<?php echo base_url('admin/C_data_perusahaan') ?>">Data Perusahaan</a>
                        <a class="collapse-item <?= ($menu_atas == 05) ? 'active' : ''; ?>" href="<?php echo base_url('admin/C_data_buyer') ?>">Data Buyer</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Semua Data
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item <?= ($menu == 1) ? 'active' : ''; ?>">
                <a class="nav-link " href="<?php echo base_url('admin/C_aktifitas') ?>">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Barang Masuk & Keluar</span></a>
            </li>


            <li class="nav-item <?= ($menu == 3) ? 'active' : ''; ?>">
                <a class="nav-link " href="<?php echo base_url('admin/C_rab') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data RAB</span></a>
            </li>

            <li class="nav-item <?= ($menu == 4) ? 'active' : ''; ?>">
                <a class="nav-link " href="<?php echo base_url('admin/C_laporan') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Laporan</span></a>
            </li>

            <li class="nav-item <?= ($menu == 5) ? 'active' : ''; ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#kasbon" aria-expanded="true" aria-controls="kasbon">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Data Kasbon</span>
                </a>
                <div id="kasbon" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item <?= ($menu_atas == 11) ? 'active' : ''; ?>" href="<?php echo base_url('admin/C_kasbon_pribadi') ?>">Kasbon Pribadi</a>
                        <a class="collapse-item <?= ($menu_atas == 12) ? 'active' : ''; ?>" href="<?php echo base_url('admin/C_kasbon_operasional') ?>">Kasbon Operasional</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-transparent topbar mb-4 static-top ">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto" <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->userdata('nama'); ?></span>
                                <img class="img-profile rounded-circle" src="<?php echo base_url('assets/dashboardTemp/'); ?>img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Beranda
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->