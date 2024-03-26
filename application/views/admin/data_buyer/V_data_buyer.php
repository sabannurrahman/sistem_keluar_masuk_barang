<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Data Buyer</h1>
    <p class="mb-4">Tambah Data Buyer Yang di Perlukan</p>

    <!-- DataTales Example -->
    <div class="card shadow-sm mb-4">
        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between ">
                <h5 class="m-0 font-weight-bold ">Data Buyer</h5>
                <a href="#" class="btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Buyer</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Buyer</th>
                            <th>No HP</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($buyer as $by) : ?>
                            <tr>

                                <td><?= $no++ ?></td>
                                <td><?= $by->nama_buyer ?></td>
                                <td><?= $by->no_hp_buyer ?></td>
                                <td><?= $by->email_buyer ?></td>

                                <td class="text-center">

                                    <a class="btn btn-danger mr-2 " href="#modal-hapus" onclick="$('#modal-hapus #form_delete').attr('action', 
                                         '<?= site_url('Admin/C_data_buyer/hapus/' . $by->id_buyer); ?>')" data-toggle="modal">
                                        <i class="fas fa-trash fa-sm text-white-50"></i>
                                    </a>
                                    <a href="<?= base_url('Admin/C_data_buyer/edit_buyer/') . $by->id_buyer ?>" class="btn btn-primary "><i class="fas fa-edit fa-sm text-white-50"></i></a>


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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Buyer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('admin/C_data_buyer/Tambah_buyer'); ?>" method="POST">
                    <div class="mb-3">
                        <label for="basic-url">Nama Buyer</label>
                        <div class="input-group">
                            <input type="text" class="form-control <?= (form_error('namaBY')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan Nama Buyer" name="namaBY">
                        </div>
                        <?= form_error('namaBY', '<small class="text-danger">', '</small> '); ?>
                    </div>


                    <div class="mb-3">
                        <label for="basic-url">No HP </label>
                        <div class="input-group">
                            <input type="text" class="form-control <?= (form_error('nohpBY')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan nohp" name="nohpBY">
                        </div>
                        <?= form_error('nohpBY', '<small class="text-danger">', '</small> '); ?>
                    </div>

                    <div class="mb-3">
                        <label for="basic-url">Email</label>
                        <div class="input-group">
                            <input type="email" class="form-control <?= (form_error('emailBY')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan email" name="emailBY">
                        </div>
                        <?= form_error('emailBY', '<small class="text-danger">', '</small> '); ?>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </div>
            </form>
        </div>
    </div>
</div>