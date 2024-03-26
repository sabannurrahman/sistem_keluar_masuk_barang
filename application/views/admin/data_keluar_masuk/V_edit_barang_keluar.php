<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Edit Barang Keluar</h1>
    <p class="mb-4">Edit Data Barang Keluar Dengan Benar</p>
    <!-- DataTales Example -->

    <div class="alert alert-danger" role="alert">
        <div class="d-sm-flex align-items-center justify-content-between ">
            # : 
            <?php foreach ($detail as $det2) :
                echo $det2->nama_barang;
            endforeach; ?>

            <a href="<?php echo base_url('admin/C_barang_keluar/detail_BK/'. $det2->id_aktifitas); ?>" class=" btn btn-sm btn-light rounded-circle "><i class="fas fa-arrow-left text-danger"></i></a>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-12 col-sm-12">
            <div class="card shadow mb-4">
                <div class="card-header ">
                    Form Edit Barang Keluar
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url('admin/C_barang_keluar/edit'); ?>" method="POST">
                    <?php foreach ($detail as $det3) :?>
                        <input type="hidden" name="id_BK" value="<?= $det3->id_BK; ?>">
                        <input type="hidden" name="id_aktifitas" value="<?= $det3->id_aktifitas; ?>">
                       
                        <div class="mb-3">
                            <label for="basic-url">Nama Barang</label>
                            <select name="id_brg" class="selectpicker form-control <?= (form_error('id_brg')) ? 'is-invalid' : ''; ?>" data-live-search="true">
                                <option value="Pilih">Pilih Barang</option>
                                <?php foreach ($barang as $br) : ?>
                                    <option <?= ($br->id_barang == $det3->id_barang) ? 'selected' : ''; ?> value="<?= $br->id_barang ?>"><?= $br->nama_barang ?> (<?= $br->satuan ?>)</option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('id_brg', '<small class="text-danger">', '</small> '); ?>
                        </div>

                        <div class="mb-3">
                            <label for="basic-url">jumlah</label>
                            <div class="input-group">
                                <input type="number" name="jml" class="form-control <?= (form_error('jml')) ? 'is-invalid' : ''; ?>" name="jml" value="<?= $det3->jumlah_BK; ?>">
                            </div>
                            <?= form_error('jml', '<small class="text-danger">', '</small> '); ?>
                        </div>

                        <button type="suBKit" class="btn btn-sm btn-primary">Simpan Data</button>
                        <?php endforeach;?>
                    </div>

            </div>
        </div>

    </div>
</div>
<!-- /.container-fluid -->

