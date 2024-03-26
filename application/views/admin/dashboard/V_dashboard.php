<!-- Begin Page Content -->
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Dashboard</h1>
    <p class="mb-4">Overview Data Admin</p>

    <div class="alert alert-primary" role="alert">
        Selamat Datang <a href="#" class="alert-link"><?= $this->session->userdata('nama'); ?></a>.
    </div>

    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card bg-primary border-bottom-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                Total Barang Masuk</div>
                            <div class="h5 mb-0 font-weight-bold text-white">4 Barang</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-plus fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card bg-danger border-bottom-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                Total Barang Keluar</div>
                            <div class="h5 mb-0 font-weight-bold text-white">4 Barang</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-minus fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card bg-success border-bottom-dark shadow h-100 py-2 ">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                Total Barang Digudang</div>
                            <div class="h5 mb-0 font-weight-bold text-white">4 Barang</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-building fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->