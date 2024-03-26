<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Edit Perusahaan</h1>
    <p class="mb-4">Edit Data Perusahaan Dengan Benar</p>
    <!-- DataTales Example -->

    <div class="alert alert-primary" role="alert">
        <div class="d-sm-flex align-items-center justify-content-between ">
            # :
            <?php foreach ($detail as $det2) :
                echo $det2->nama_perusahaan;
            endforeach; ?>

            <a href="<?php echo base_url('admin/C_data_perusahaan') ?>" class=" btn btn-sm btn-light rounded-circle "><i class="fas fa-arrow-left text-primary"></i></a>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-12 col-sm-12">
            <div class="card shadow mb-4">
                <div class="card-header ">
                    Edit Perusahaan
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url('admin/C_data_perusahaan/edit'); ?>" method="POST">
                        <?php foreach ($detail as $det3) : ?>
                            <input type="hidden" name="id_perusahaan" value="<?= $det3->id_perusahaan; ?>">
                            <div class="mb-3">
                                <label for="basic-url">Nama Perusahaan</label>
                                <div class="input-group">
                                    <input type="text" name="nama_perusahaan" class="form-control <?= (form_error('nama_perusahaan')) ? 'is-invalid' : ''; ?>" name="nama_perusahaan" value="<?= $det3->nama_perusahaan; ?>">
                                </div>
                                <?= form_error('nama_perusahaan', '<small class="text-danger">', '</small> '); ?>
                            </div>

                            <div class="mb-3">
                                <label for="basic-url">Alamat Perusahaan</label>
                                <div class="input-group">
                                    <input type="text" name="alamat_perusahaan" class="form-control <?= (form_error('alamat_perusahaan')) ? 'is-invalid' : ''; ?>" name="alamat_perusahaan" value="<?= $det3->alamat_perusahaan; ?>">
                                </div>
                                <?= form_error('alamat_perusahaan', '<small class="text-danger">', '</small> '); ?>
                            </div>

                            <div class="mb-3">
                                <label for="basic-url">email Perusahaan</label>
                                <div class="input-group">
                                    <input type="text" name="email_perusahaan" class="form-control <?= (form_error('email_perusahaan')) ? 'is-invalid' : ''; ?>" name="email_perusahaan" value="<?= $det3->email_perusahaan; ?>">
                                </div>
                                <?= form_error('email_perusahaan', '<small class="text-danger">', '</small> '); ?>
                            </div>

                            <div class="mb-3">
                                <label for="basic-url">no hp Perusahaan</label>
                                <div class="input-group">
                                    <input type="text" name="no_hp_perusahaan" class="form-control <?= (form_error('no_hp_perusahaan')) ? 'is-invalid' : ''; ?>" name="no_hp_perusahaan" value="<?= $det3->no_hp_perusahaan; ?>">
                                </div>
                                <?= form_error('no_hp_perusahaan', '<small class="text-danger">', '</small> '); ?>
                            </div>


                            <button type="submit" class="btn btn-sm btn-primary">Simpan Data</button>
                        <?php endforeach; ?>
                </div>

            </div>
        </div>

    </div>
</div>
<!-- /.container-fluid -->