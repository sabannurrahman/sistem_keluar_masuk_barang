<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Paket Barang</h1>
    <p class="mb-4">Tambah Data Barang Menjadi Satu Paket</p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between ">
                <h5 class="m-0 font-weight-bold ">Data Paket</h5>
                <a href="#" class=" btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Paket</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table  table-bordered " id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama Paket</th>
                            <th>Satuan</th>
                            <th>Harga Sewa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($barang as $brg) : ?>
                            <tr>

                                <td><?= $no++ ?></td>
                                <td style="text-align: center;"> <img src="<?= base_url('assets/'); ?>barang/<?php echo $brg->gambar_brg ?>" alt="barang" width="100px" height="100px"></td>
                                <td><?= $brg->nama_barang ?></td>
                                <td><?= $brg->satuan ?></td>
                                <td>Rp. <?= number_format($brg->harga_sewa, 0, ',', '.'); ?></td>

                                <td class="text-center">
                                    <a href="<?= base_url('admin/C_isi_barang/isi_barang/') . $brg->id_barang ?>" class="btn btn-primary "><i class="fas fa-link fa-sm text-white-50"></i></a>
                                    <a class="btn btn-danger mx-2 " href="#modal-hapus" onclick="$('#modal-hapus #form_delete').attr('action', 
                                         '<?= site_url('Admin/C_paket_barang/hapus/' . $brg->id_barang); ?>')" data-toggle="modal">
                                        <i class="fas fa-trash fa-sm text-white-50"></i>
                                    </a>

                                    <a href="<?= base_url('Admin/C_paket_barang/edit_brg/') . $brg->id_barang ?>" class="btn btn-success "><i class="fas fa-edit fa-sm text-white-50"></i></a>

                                </td>
                                </td>
                            </tr>
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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Paket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('admin/C_paket_barang/Tambah_barang'); ?>
                <form action="<?php echo base_url('admin/C_paket_barang/Tambah_barang'); ?>" method="POST">
                    <div class="mb-3">
                        <label for="basic-url">Nama Paket</label>
                        <div class="input-group">
                            <input type="text" class="form-control <?= (form_error('nama')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan Nama Paket" name="nama_brg">
                        </div>
                        <?= form_error('nama_brg', '<small class="text-danger">', '</small> '); ?>
                    </div>
                    <div class="mb-3">
                        <label for="satuan">Satuan</label>
                        <div class="input-group">
                            <select class="form-control" name="satuan" id="satuan">
                                <option value="pilih">Pilih Satuan</option>
                                <?php foreach ($satuan as $st) : ?>
                                    <option value="<?= $st->nama_satuan; ?>"><?= $st->nama_satuan; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?= form_error('harga_brg', '<small class="text-danger">', '</small> '); ?>
                    </div>

                    <div class="mb-3">
                        <label for="basic-url">Harga Sewa</label>
                        <div class="input-group">
                            <input type="number" class="form-control <?= (form_error('harga_brg')) ? 'is-invalid' : ''; ?>" placeholder="cth : 2000" name="harga_brg">
                        </div>
                        <?= form_error('harga_brg', '<small class="text-danger">', '</small> '); ?>
                    </div>
                    <div class="custom-file">
                        <input type="file" name="gambar" class="custom-file-input <?= (form_error('gambar')) ? 'is-invalid' : ''; ?>" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Pilih Foto Paket Barang</label>
                        <?= form_error('gambar', '<small class="text-danger">', '</small> '); ?>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </div>
            </form>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>