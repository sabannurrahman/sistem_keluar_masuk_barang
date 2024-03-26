<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Data Perusahaan</h1>
    <p class="mb-4">Tambah Data Perusahaan Yang di Perlukan</p>

    <!-- DataTales Example -->
    <div class="card shadow-sm mb-4">
        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between ">
                <h5 class="m-0 font-weight-bold ">Data Perusahaan</h5>
                <a href="#" class="btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Perusahaan</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Perusahaan</th>
                            <th>Alamat Perusahaan</th>
                            <th>No hp</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($perusahaan as $ps) : ?>
                            <tr>

                                <td><?= $no++ ?></td>
                                <td><?= $ps->nama_perusahaan ?></td>
                                <td><?= $ps->alamat_perusahaan ?></td>
                                <td><?= $ps->no_hp_perusahaan ?></td>
                                <td><?= $ps->email_perusahaan ?></td>

                                <td class="text-center">
                                    <div class="row justify-content-center">
                                        <a class="btn btn-danger mb-2 " href="#modal-hapus" onclick="$('#modal-hapus #form_delete').attr('action', 
                                         '<?= site_url('Admin/C_data_perusahaan/hapus/' . $ps->id_perusahaan); ?>')" data-toggle="modal">
                                            <i class="fas fa-trash fa-sm text-white-50"></i>
                                        </a>
                                        <a href="<?= base_url('Admin/C_data_perusahaan/edit_perusahaan/') . $ps->id_perusahaan ?>" class="btn btn-primary "><i class="fas fa-edit fa-sm text-white-50"></i></a>
                                    </div>

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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Perusahaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('admin/C_data_perusahaan/Tambah_perusahaan'); ?>" method="POST">
                    <div class="mb-3">
                        <label for="basic-url">Nama Perusahaan</label>
                        <div class="input-group">
                            <input type="text" class="form-control <?= (form_error('namaPR')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan Nama Perusahaan" name="namaPR">
                        </div>
                        <?= form_error('namaPR', '<small class="text-danger">', '</small> '); ?>
                    </div>

                    <div class="mb-3">
                        <label for="basic-url">Alamat Perusahaan</label>
                        <div class="input-group">
                            <input type="text" class="form-control <?= (form_error('alamatPR')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan Alamat Perusahaan" name="alamatPR">
                        </div>
                        <?= form_error('alamatPR', '<small class="text-danger">', '</small> '); ?>
                    </div>

                    <div class="mb-3">
                        <label for="basic-url">No HP </label>
                        <div class="input-group">
                            <input type="text" class="form-control <?= (form_error('nohpPR')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan nohp" name="nohpPR">
                        </div>
                        <?= form_error('nohpPR', '<small class="text-danger">', '</small> '); ?>
                    </div>

                    <div class="mb-3">
                        <label for="basic-url">Email</label>
                        <div class="input-group">
                            <input type="email" class="form-control <?= (form_error('emailPR')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan email" name="emailPR">
                        </div>
                        <?= form_error('emailPR', '<small class="text-danger">', '</small> '); ?>
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