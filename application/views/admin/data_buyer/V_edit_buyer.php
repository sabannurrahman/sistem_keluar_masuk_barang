<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Edit Buyer</h1>
    <p class="mb-4">Edit Data Buyer Dengan Benar</p>
    <!-- DataTales Example -->

    <div class="alert alert-primary" role="alert">
        <div class="d-sm-flex align-items-center justify-content-between ">
            # :
            <?php foreach ($detail as $det2) :
                echo $det2->nama_buyer;
            endforeach; ?>

            <a href="<?php echo base_url('admin/C_data_buyer') ?>" class=" btn btn-sm btn-light rounded-circle "><i class="fas fa-arrow-left text-primary"></i></a>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-12 col-sm-12">
            <div class="card shadow mb-4">
                <div class="card-header ">
                    Edit buyer
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url('admin/C_data_buyer/edit'); ?>" method="POST">
                        <?php foreach ($detail as $det3) : ?>
                            <input type="hidden" name="id_buyer" value="<?= $det3->id_buyer; ?>">
                            <div class="mb-3">
                                <label for="basic-url">Nama buyer</label>
                                <div class="input-group">
                                    <input type="text" name="nama_buyer" class="form-control <?= (form_error('nama_buyer')) ? 'is-invalid' : ''; ?>" name="nama_buyer" value="<?= $det3->nama_buyer; ?>">
                                </div>
                                <?= form_error('nama_buyer', '<small class="text-danger">', '</small> '); ?>
                            </div>

                            <div class="mb-3">
                                <label for="basic-url">no hp buyer</label>
                                <div class="input-group">
                                    <input type="text" name="no_hp_buyer" class="form-control <?= (form_error('no_hp_buyer')) ? 'is-invalid' : ''; ?>" name="no_hp_buyer" value="<?= $det3->no_hp_buyer; ?>">
                                </div>
                                <?= form_error('no_hp_buyer', '<small class="text-danger">', '</small> '); ?>
                            </div>

                            <div class="mb-3">
                                <label for="basic-url">email buyer</label>
                                <div class="input-group">
                                    <input type="text" name="email_buyer" class="form-control <?= (form_error('email_buyer')) ? 'is-invalid' : ''; ?>" name="email_buyer" value="<?= $det3->email_buyer; ?>">
                                </div>
                                <?= form_error('email_buyer', '<small class="text-danger">', '</small> '); ?>
                            </div>




                            <button type="submit" class="btn btn-sm btn-primary">Simpan Data</button>
                        <?php endforeach; ?>
                </div>

            </div>
        </div>

    </div>
</div>
<!-- /.container-fluid -->