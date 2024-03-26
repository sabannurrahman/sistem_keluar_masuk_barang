<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Edit Kasbon Pribadi</h1>
    <p class="mb-4">Edit Data Barang Dengan Benar</p>
    <!-- DataTales Example -->

    <div class="alert alert-primary" role="alert">
        <div class="d-sm-flex align-items-center justify-content-between ">
            # :
            <?php foreach ($detail as $det2) :
                echo $det2->id_kp_detail;
            endforeach; ?>

            <a href="<?php echo base_url('admin/C_data_barang') ?>" class=" btn btn-sm btn-light rounded-circle "><i class="fas fa-arrow-left text-primary"></i></a>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-12 col-sm-12">
            <div class="card shadow mb-4">
                <div class="card-header ">
                    Edit Isi Kasbon Pribadi
                </div>
                <?php foreach ($detail as $det) : ?>
                    <div class="card-body">
                        <form action="<?php echo base_url('admin/C_isi_kasbon_pribadi/edit'); ?>" method="POST">
                            <input type="hidden" name="id_kp_detail" value="<?= $det->id_kp_detail; ?>">
                            <div class="mb-3">
                                <label for="basic-url">Keterangan</label>
                                <div class="input-group">
                                    <input type="text" name="keterangan" class="form-control <?= (form_error('keterangan')) ? 'is-invalid' : ''; ?>" name="keterangan" value="<?= $det->keterangan; ?>">
                                </div>
                                <?= form_error('keterangan', '<small class="text-danger">', '</small> '); ?>
                            </div>

                            <div class="mb-3">
                                <label for="basic-url">Harga</label>
                                <div class="input-group">
                                    <input type="number" name="harga" class="form-control <?= (form_error('harga')) ? 'is-invalid' : ''; ?>" name="harga" value="<?= $det->jumlah; ?>">
                                </div>
                                <?= form_error('harga', '<small class="text-danger">', '</small> '); ?>
                            </div>

                            <button type="submit" class="btn btn-sm btn-primary">Simpan Data</button>
                        <?php endforeach; ?>
                    </div>

            </div>
        </div>

    </div>
</div>
<!-- /.container-fluid -->