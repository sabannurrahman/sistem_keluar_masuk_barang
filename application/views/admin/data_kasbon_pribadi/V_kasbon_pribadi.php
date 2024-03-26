<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kasbon Pribadi</h1>
    <p class="mb-4">Cetak Kasbon Pribadi</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between ">
                <h5 class="m-0 font-weight-bold ">Data Kasbon Pribadi</h5>
                <a href="#" class=" btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus fa-sm text-white-50"></i> Buat Baru</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Penerima</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($kasbon_pribadi as $kp) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= tgl_indo($kp->tanggal); ?></td>
                                <td><?= $kp->penerima ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('admin/C_isi_kasbon_pribadi/isi/') . $kp->id_kp ?>" class="btn btn-primary "><i class="fas fa-link fa-sm text-white-50"></i></a>
                                    <a class="btn btn-danger mx-2 " href="#modal-hapus" onclick="$('#modal-hapus #form_delete').attr('action', 
                                         '<?= site_url('admin/C_kasbon_pribadi/hapus/' . $kp->id_kp); ?>')" data-toggle="modal">
                                        <i class="fas fa-trash fa-sm text-white-50"></i>
                                    </a>

                                    <a href="<?= base_url('admin/C_isi_kasbon_pribadi/edit/') . $kp->id_kp ?>" class="btn btn-success "><i class="fas fa-edit fa-sm text-white-50"></i></a>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah RAB Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('admin/C_kasbon_pribadi/Tambah_kasbon'); ?>" method="POST">
                    <div class="mb-3">
                        <label for="basic-url">Nama Penerima</label>
                        <div class="input-group">
                            <input type="text" id="basic-url" class="form-control <?= (form_error('nama')) ? 'is-invalid' : ''; ?>" name="nama">
                        </div>
                        <?= form_error('nama', '<small class="text-danger">', '</small> '); ?>
                    </div>

                    <div class="mb-3">
                        <label for="basic-url">Tanggal Terima</label>
                        <div class="input-group">
                            <input type="date" id="basic-url" class="form-control <?= (form_error('tgl')) ? 'is-invalid' : ''; ?>" name="tgl">
                        </div>
                        <?= form_error('tgl', '<small class="text-danger">', '</small> '); ?>
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