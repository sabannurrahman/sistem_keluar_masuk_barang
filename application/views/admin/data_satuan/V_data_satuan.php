<div class="container-fluid">

<h1 class="h3 mb-2 text-gray-800">Data Satuan</h1>
    <p class="mb-4">Tambah Data Satuan Yang di Perlukan</p>

    <!-- DataTales Example -->
    <div class="card shadow-sm mb-4">
    <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between ">
                <h5 class="m-0 font-weight-bold ">Data Satuan</h5>
                <a href="#" class="btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus fa-sm text-white-50"  ></i> Tambah Satuan</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Satuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php $no = 1; ?>
                        <?php foreach ($satuan as $st) : ?>  
                    <tr>
                      
                            <td><?= $no++ ?></td>
                            <td><?= $st->nama_satuan ?></td>
                            <td class="text-center">
                                    <a class="btn btn-danger mr-3 " href="#modal-hapus" onclick="$('#modal-hapus #form_delete').attr('action', 
                                         '<?= site_url('Admin/C_data_satuan/hapus/' . $st->id_satuan); ?>')" data-toggle="modal">
                                        <i class="fas fa-trash fa-sm text-white-50"></i>
                                    </a>
                                    <a href="<?= base_url('Admin/C_data_satuan/edit_satuan/') . $st->id_satuan ?>" class="btn btn-primary "><i class="fas fa-edit fa-sm text-white-50"></i></a>
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
                <h5 class="modal-title" id="exampleModalLabel" >Tambah Satuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('admin/C_data_satuan/Tambah_satuan'); ?>" method="POST">
                <div class="mb-3">
                        <label for="basic-url">Satuan</label>
                        <div class="input-group">
                            <input type="text" class="form-control <?= (form_error('satuan')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan Satuan" name="satuan">
                        </div>
                        <?= form_error('satuan', '<small class="text-danger">', '</small> '); ?>
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

