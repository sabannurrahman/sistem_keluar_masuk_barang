<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Edit Barang</h1>
    <p class="mb-4">Edit Data Barang Dengan Benar</p>
    <!-- DataTales Example -->

    <div class="alert alert-primary" role="alert">
        <div class="d-sm-flex align-items-center justify-content-between ">
            # : 
            <?php foreach ($detail as $det2) :
                echo $det2->nama_barang;
            endforeach; ?>

            <a href="<?php echo base_url('admin/C_data_barang') ?>" class=" btn btn-sm btn-light rounded-circle "><i class="fas fa-arrow-left text-primary"></i></a>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-12 col-sm-12">
            <div class="card shadow mb-4">
                <div class="card-header ">
                    Edit Barang
                </div>
                <?php foreach ($detail as $det3) :?>
                <div class="card-body">
                    <form action="<?php echo base_url('admin/C_data_barang/edit'); ?>" method="POST">
                <input type="hidden" name="id_brg" value="<?= $det3->id_barang; ?>">    
                       
                        <div class="mb-3">
                            <label for="basic-url">Nama Barang</label>
                            <div class="input-group">
                                <input type="text" name="nama_brg" class="form-control <?= (form_error('nama_brg')) ? 'is-invalid' : ''; ?>" name="nama_brg" value="<?= $det3->nama_barang; ?>">
                            </div>
                            <?= form_error('nama_brg', '<small class="text-danger">', '</small> '); ?>
                        </div>

                        <div class="mb-3">
                            <label for="basic-url">satuan</label>
                            <div class="input-group">
                               <select name="satuan" class="form-control" id="">
                                <option value="pilih">Pilih Satuan</option>
                                <?php foreach ($satuan as $st) : ?>
                                    <option <?= ($det3->satuan == $st->nama_satuan) ? 'selected' : ''; ?> value="<?= $st->nama_satuan; ?>"><?= $st->nama_satuan; ?></option>
                                <?php endforeach; ?>
                               </select>
                            </div>
                            <?= form_error('satuan', '<small class="text-danger">', '</small> '); ?>
                        </div>

                        <div class="mb-3">
                            <label for="basic-url">Harga Sewa</label>
                            <div class="input-group">
                                <input type="number" name="harga_brg" class="form-control <?= (form_error('harga_brg')) ? 'is-invalid' : ''; ?>" name="harga_brg" value="<?= $det3->harga_sewa; ?>">
                            </div>
                            <?= form_error('harga_brg', '<small class="text-danger">', '</small> '); ?>
                        </div>

                        <button type="submit" class="btn btn-sm btn-primary">Simpan Data</button>
                        <?php endforeach;?>
                    </div>

            </div>
        </div>

    </div>
</div>
<!-- /.container-fluid -->

