<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Barang Keluar</h1>
    <p class="mb-4">Tambahkan Barang Keluar </p>


    <div class="alert alert-danger" role="alert">
        <div class="d-sm-flex align-items-center justify-content-between ">
            Tanggal Keluar :
            <?php foreach ($detail as $det2) :
                echo $det2->tanggal;
            endforeach; ?>

            <a href="<?php echo base_url('admin/C_aktifitas') ?>" class=" btn btn-sm btn-light rounded-circle "><i class="fas fa-arrow-left text-danger"></i></a>
        </div>

    </div>

    <div class="row">
        <div class="col-12 col-lg-4 col-sm-12">
            <div class="card shadow mb-4">
                <div class="card-header ">
                    Tambah Barang Keluar
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url('admin/C_barang_keluar/Tambah_barang'); ?>" method="POST">

                        <?php foreach ($detail as $det) : ?>
                            <input type="hidden" class="form-control" name="id_aktifitas" value="<?php echo $det->id_aktifitas; ?>">
                        <?php endforeach; ?>

                        <div class="mb-3">
                            <label for="basic-url">Nama Barang</label>
                            <select name="nama_brg" class="selectpicker form-control <?= (form_error('nama_brg')) ? 'is-invalid' : ''; ?>" data-live-search="true">
                                <option value="Pilih">Pilih Barang</option>
                                <?php 
                                foreach ($barang as $br) : 
                                    if ($br->jumlah>0):
                                ?>
                                    <option value="<?= $br->id_barang ?>"><?= $br->nama_barang ?> (<?= $br->jumlah ?> <?= $br->satuan ?>)</option>
                                <?php 
                            endif;
                            endforeach; ?>
                            </select>
                            <?= form_error('nama_brg', '<small class="text-danger">', '</small> '); ?>
                        </div>

                        <div class="mb-3">
                            <label for="basic-url">Jumlah Keluar</label>
                            <div class="input-group">
                                <input type="number" name="brg_KL" class="form-control <?= (form_error('brg_KL')) ? 'is-invalid' : ''; ?>">
                            </div>
                            <?= form_error('brg_KL', '<small class="text-danger">', '</small> '); ?>
                        </div>

                        <button type="submit" class="btn  btn-primary rounded"><i class="fas fa-save fa-sm text-white-50"></i> Simpan</button>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-8 col-sm-12">
            <div class="card shadow-sm mb-4">
                <div class="card-header py-3">
                    Data Barang Keluar
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($keluar as $kl) :
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $kl->nama_barang; ?></td>
                                        <td><?= $kl->jumlah_BK; ?> <?= $kl->satuan; ?></td>

                                        <td class="text-center">
                                            <a class="btn btn-danger mr-3 " href="#modal-hapus" onclick="$('#modal-hapus #form_delete').attr('action', 
                                         '<?= site_url('Admin/C_barang_keluar/hapus/' . $kl->id_BK); ?>')" data-toggle="modal">
                                                <i class="fas fa-trash fa-sm text-white-50"></i>
                                            </a>
                                            <a href="<?= base_url('Admin/C_barang_keluar/edit_brg/') . $kl->id_BK ?>" class="btn btn-success "><i class="fas fa-edit fa-sm text-white-50"></i></a>

                                        </td>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>