<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Barang Masuk</h1>
    <p class="mb-4">Tambahkan Barang Masuk </p>


    <div class="alert alert-primary" role="alert">
        <div class="d-sm-flex align-items-center justify-content-between ">
            Tanggal Masuk :
            <?php foreach ($detail as $det2) :
                echo $det2->tanggal;
            endforeach; ?>

            <a href="<?php echo base_url('admin/C_aktifitas') ?>" class=" btn btn-sm btn-light rounded-circle "><i class="fas fa-arrow-left text-primary"></i></a>
        </div>

    </div>

    <div class="row">
        <div class="col-12 col-lg-5 col-sm-12">
            <div class="card shadow mb-4">
                <div class="card-header ">
                    Tambah Barang
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url('admin/C_barang_masuk/Tambah_barang'); ?>" method="POST">

                        <?php foreach ($detail as $det) : ?>
                            <input type="hidden" class="form-control" name="id_aktifitas" value="<?php echo $det->id_aktifitas; ?>">
                        <?php endforeach; ?>

                        <div class="mb-3">
                            <label for="basic-url">Nama Barang</label>
                            <select name="nama_brg" class="selectpicker form-control <?= (form_error('nama_brg')) ? 'is-invalid' : ''; ?>" data-live-search="true">
                                <option value="Pilih">Pilih Barang</option>
                                <?php foreach ($barang as $br) : ?>
                                    <option value="<?= $br->id_barang ?>"><?= $br->nama_barang ?> (<?= $br->satuan ?>)</option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('nama_brg', '<small class="text-danger">', '</small> '); ?>
                        </div>

                        <div class="mb-3">
                            <label for="basic-url">Jumlah</label>
                            <div class="input-group">
                                <input type="number" name="jml_brg" class="form-control <?= (form_error('jml_brg')) ? 'is-invalid' : ''; ?>" name="tgl">
                            </div>
                            <?= form_error('jml_brg', '<small class="text-danger">', '</small> '); ?>
                        </div>

                        <button type="submit" class="btn btn-sm btn-primary">Tambah Barang</button>
                </div>
            </div>
        </div>
        </form>

        <div class="col-12 col-lg-7 col-sm-12">
            <div class="card shadow-sm mb-4">
                <div class="card-header py-3">

                    Data Barang Masuk

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
                                <?php foreach ($masuk as $ms) :
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $ms->nama_barang; ?></td>
                                        <td><?= $ms->jumlah_BM; ?> <?= $ms->satuan; ?></td>

                                        <td class="text-center">
                                            <a class="btn btn-danger mr-3 " href="#modal-hapus" onclick="$('#modal-hapus #form_delete').attr('action', 
                                         '<?= site_url('Admin/C_barang_masuk/hapus/' . $ms->id_BM); ?>')" data-toggle="modal">
                                                <i class="fas fa-trash fa-sm text-white-50"></i>
                                            </a>
                                            <a href="<?= base_url('Admin/C_barang_masuk/edit_brg/') . $ms->id_BM ?>" class="btn btn-success "><i class="fas fa-edit fa-sm text-white-50"></i></a>

                                        </td>
                                        </td>
                                    </tr>
                                <?php endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>