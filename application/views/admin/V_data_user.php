<link rel="stylesheet" href="<?php echo base_url('assets/') ?>sweetalert/sweetalert2.min.css">
<script src="<?php echo base_url('assets/') ?>sweetalert/sweetalert2.min.js"></script>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data User</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data User</a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Sebagai</th>
                            <th>Studio Kelola</th>
                            <th class="text-center">Aksi</th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($user as $us) : ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $us->nama_user ?></td>

                                <?php if ($us->level_user == 1) : ?>
                                    <td>Pengelola</td>
                                <?php elseif ($us->level_user == 2) : ?>
                                    <td>Admin</td>
                                <?php endif ?>

                                <td><?php echo $us->id_studio ?></td>
                                <td class="text-center"> 
                                    <a href="" class="btn btn-primary "><i class="fas fa-link fa-sm text-white-50"></i> Detail</a>

                                    <a href="" class="btn btn-danger  mx-2"> <i class="fas fa-trash fa-sm text-white-50"></i> Hapus</a>

                                    <a href="" class="btn btn-success"> <i class="fas fa-edit fa-sm text-white-50"></i> Update</a>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('admin/C_data_user/Tambah_user'); ?>" method="POST">
                    <div class="mb-3">
                        <label for="basic-url">Nama</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control <?= (form_error('nama')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan Nama Lengkap" name="nama">
                        </div>
                        <?= form_error('nama', '<small class="text-danger">', '</small> '); ?>
                    </div>

                    <div class="mb-3">
                        <label for="basic-url">Sebagai</label>
                        <select class="form-control mb-3 <?= (form_error('level')) ? 'is-invalid' : ''; ?>" name="level" id="">
                            <option value="0">Pilih</option>
                            <option value="1">Pengelola Studio</option>
                            <option value="2">Admin</option>
                        </select>
                        <?= form_error('level', '<small class="text-danger">', '</small> '); ?>
                    </div>

                    <div class="mb-3">
                        <label for="basic-url">Studio Yang Dikelola</label>
                        <select class="form-control mb-1 <?= (form_error('studio')) ? 'is-invalid' : ''; ?>" name="studio" id="">
                            <option value="0">Pilih</option>
                            <option value="2">Studio 1</option>
                            <option value="3">Studio 2</option>
                        </select>
                        <?= form_error('studio', '<small class="text-danger">', '</small> '); ?>
                    </div>
                    <div class="mb-3">
                        <label for="basic-url">username</label>
                        <div class="input-group mb-1">
                            <input type="text" class="form-control <?= (form_error('username')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan username" name="username">
                        </div>
                        <?= form_error('username', '<small class="text-danger">', '</small> '); ?>
                    </div>
                    <div class="mb-3">
                        <label for="basic-url">password</label>
                        <div class="input-group mb-1">
                            <input type="password" class="form-control <?= (form_error('password')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan password" name="password">

                        </div>
                        <?= form_error('password', '<small class="text-danger">', '</small> '); ?>
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


<?php if (validation_errors()) : ?>
    <script type="text/javascript">
        Swal.fire({
            type: 'error',
            title: 'Gagal',
            text: 'Data User Gagal Ditambahkan!'
        })
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('berhasil_tambah_user')) : ?>
    <script type="text/javascript">
        Swal.fire({
            type: 'success',
            title: 'Berhasil',
            text: 'Berhasil Tambah User Baru'
        })
    </script>
<?php endif;  ?>