<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Edit Satuan</h1>
    <p class="mb-4">Edit Data Satuan Dengan Benar</p>
    <!-- DataTales Example -->

    <div class="alert alert-primary" role="alert">
        <div class="d-sm-flex align-items-center justify-content-between ">
            # : 
            <?php foreach ($detail as $det2) :
                echo $det2->nama_satuan;
            endforeach; ?>

            <a href="<?php echo base_url('admin/C_data_satuan') ?>" class=" btn btn-sm btn-light rounded-circle "><i class="fas fa-arrow-left text-primary"></i></a>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-12 col-sm-12">
            <div class="card shadow mb-4">
                <div class="card-header ">
                    Edit Barang
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url('admin/C_data_satuan/edit'); ?>" method="POST">
                    <?php foreach ($detail as $det3) :?>
                        <input type="hidden" name="id_satuan" value="<?= $det3->id_satuan; ?>">
                        <div class="mb-3">
                            <label for="basic-url">Nama Satuan</label>
                            <div class="input-group">
                                <input type="text" name="nama_satuan" class="form-control <?= (form_error('nama_satuan')) ? 'is-invalid' : ''; ?>" name="nama_satuan" value="<?= $det3->nama_satuan; ?>">
                            </div>
                            <?= form_error('nama_satuan', '<small class="text-danger">', '</small> '); ?>
                        </div>


                        <button type="submit" class="btn btn-sm btn-primary">Simpan Data</button>
                        <?php endforeach;?>
                    </div>

            </div>
        </div>

    </div>
</div>
<!-- /.container-fluid -->

