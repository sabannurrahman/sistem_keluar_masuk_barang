<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Data Gudang</h1>
    <p class="mb-4">Tampilan Semua Data Barang Yang Berada Digudang</p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between ">
                <h5 class="m-0 font-weight-bold ">Data Gudang</h5>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table  table-bordered " id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Satuan</th>
                            <th>Harga Sewa</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($gudang as $gd) : ?>
                            <?php if ($gd->jumlah > 0) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $gd->nama_barang ?></td>
                                <td><?= $gd->jumlah ?></td>
                                <td><?= $gd->satuan ?></td>
                                <td>Rp. <?= number_format($gd->harga_sewa, 0, ',', '.'); ?></td>

                            </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>


                    </tbody>
                </table>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

