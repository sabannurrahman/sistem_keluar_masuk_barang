<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail RAB</h1>
    <p class="mb-4">Tambahkan Barang Lalu Cetak RAB </p>


    <div class="alert alert-primary" role="alert">
        <div class="d-sm-flex align-items-center justify-content-between ">
            Nomor Pesanan
            <?php foreach ($detail as $det2) :
                echo $det2->no_po;
            endforeach; ?>

            <a href="<?php echo base_url('admin/C_rab') ?>" class=" btn btn-sm btn-light rounded-circle "><i class="fas fa-arrow-left text-primary"></i></a>
        </div>

    </div>




    <div class="row">


        <?php foreach ($uraian as $ur) : ?>

            <div class="col-12 col-lg-12 col-sm-12">
                <div class="card shadow-sm mb-4 ">
                    <div class="card-header py-3 d-sm-flex align-items-center justify-content-between ">

                        <b class=""><a href="" class=" btn btn-sm btn-light rounded-circle mr-3"><i class="fas fa-arrow-left text-primary "></i></a><?= $ur->uraian_rd; ?></b>

                        <a href="#" class="btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#barang"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Barang</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Kebutuhan</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($detail as $ms) :
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $ms->nama_barang; ?></td>
                                            <td><?= $ms->nama_barang; ?></td>
                                            <td><?= $ms->jumlah_rab_brg; ?> <?= $ms->satuan; ?></td>

                                            <td class="text-center">
                                                <a class="btn btn-danger mr-3 " href="#modal-hapus" onclick="$('#modal-hapus #form_delete').attr('action', 
                                         '<?= site_url('Admin/C_barang_masuk/hapus/' . $ms->id_rab_barang); ?>')" data-toggle="modal">
                                                    <i class="fas fa-trash fa-sm text-white-50"></i>
                                                </a>
                                                <a href="<?= base_url('Admin/C_barang_masuk/edit_brg/') . $ms->id_rab_barang ?>" class="btn btn-success "><i class="fas fa-edit fa-sm text-white-50"></i></a>

                                            </td>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>


    <div class="text-center">
        <hr><button type="submit" class="btn btn-info  btn-circle  " data-toggle="modal" data-target="#uraian"><i class="fas fa-plus "></i></button>
        <hr>
    </div>

    <?php foreach ($rab as $r) : ?>
        <div class="text-center">
            <a href="<?php echo base_url('admin/C_isi_rab/print/' . $r->id_rab) ?>" class="btn btn-success"><i class="fas fa-print"></i> Print</a>
            <button type="submit" class="btn btn-warning"><i class="fas fa-download"></i> Download</button>
            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Reset</button>
        </div>
    <?php endforeach; ?>

</div>


<!-- Modal -->
<div class="modal  fade" id="uraian" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('admin/C_isi_rab/Tambah_uraian'); ?>" method="POST">
                    <?php foreach ($rab as $rb) : ?>
                        <input type="hidden" class="form-control" name="id_rab" value="<?php echo $rb->id_rab; ?>">
                    <?php endforeach; ?>
                    <div class="mb-3">
                        <label for="basic-url">Uraian</label>
                        <div class="input-group">
                            <input type="text" id="basic-url" class="form-control <?= (form_error('uraian')) ? 'is-invalid' : ''; ?>" name="uraian">
                        </div>
                        <?= form_error('uraian', '<small class="text-danger">', '</small> '); ?>
                    </div>


                    <div class="mb-3">
                        <label for="basic-url">Tanggal Kebutuhan</label>
                        <div class="input-group">
                            <input type="date" id="basic-url" class="form-control <?= (form_error('tgl')) ? 'is-invalid' : ''; ?>" name="tgl">
                        </div>
                        <?= form_error('tgl', '<small class="text-danger">', '</small> '); ?>
                    </div>

                    <div class="mb-3">
                        <label for="basic-url">Jumlah</label>
                        <div class="input-group">
                            <input type="text" id="basic-url" class="form-control <?= (form_error('jumlah')) ? 'is-invalid' : ''; ?>" name="jumlah">
                        </div>
                        <?= form_error('jumlah', '<small class="text-danger">', '</small> '); ?>
                    </div>

                    <div class="mb-3">
                        <label for="basic-url">Satuan</label>
                        <div class="input-group">

                            <select name="satuan" class="selectpicker form-control <?= (form_error('satuan')) ? 'is-invalid' : ''; ?>" data-live-search="true">
                                <option value="Kosong">Kosong</option>
                                <?php foreach ($satuan as $st) : ?>
                                    <option value="<?= $st->nama_satuan ?>"><?= $st->nama_satuan ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?= form_error('id_buyer', '<small class="text-danger">', '</small> '); ?>
                    </div>



                    <div class="mb-3">
                        <label for="basic-url">Periode</label>
                        <div class="input-group">
                            <input type="text" id="basic-url" class="form-control <?= (form_error('periode')) ? 'is-invalid' : ''; ?>" name="periode">
                        </div>
                        <?= form_error('periode', '<small class="text-danger">', '</small> '); ?>
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

<!-- Modal -->
<div class="modal  fade" id="barang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('admin/C_isi_rab/Tambah_uraian'); ?>" method="POST">
                    <?php foreach ($rab as $rb) : ?>
                        <input type="hidden" class="form-control" name="id_rab" value="<?php echo $rb->id_rab; ?>">
                    <?php endforeach; ?>
                    <div class="mb-3">
                        <label for="basic-url">Uraian</label>
                        <div class="input-group">
                            <input type="text" id="basic-url" class="form-control <?= (form_error('uraian')) ? 'is-invalid' : ''; ?>" name="uraian">
                        </div>
                        <?= form_error('uraian', '<small class="text-danger">', '</small> '); ?>
                    </div>


                    <div class="mb-3">
                        <label for="basic-url">Tanggal Kebutuhan</label>
                        <div class="input-group">
                            <input type="date" id="basic-url" class="form-control <?= (form_error('tgl')) ? 'is-invalid' : ''; ?>" name="tgl">
                        </div>
                        <?= form_error('tgl', '<small class="text-danger">', '</small> '); ?>
                    </div>

                    <div class="mb-3">
                        <label for="basic-url">Jumlah</label>
                        <div class="input-group">
                            <input type="text" id="basic-url" class="form-control <?= (form_error('jumlah')) ? 'is-invalid' : ''; ?>" name="jumlah">
                        </div>
                        <?= form_error('jumlah', '<small class="text-danger">', '</small> '); ?>
                    </div>

                    <div class="mb-3">
                        <label for="basic-url">Satuan</label>
                        <div class="input-group">

                            <select name="satuan" class="selectpicker form-control <?= (form_error('satuan')) ? 'is-invalid' : ''; ?>" data-live-search="true">
                                <option value="Kosong">Kosong</option>
                                <?php foreach ($satuan as $st) : ?>
                                    <option value="<?= $st->nama_satuan ?>"><?= $st->nama_satuan ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?= form_error('id_buyer', '<small class="text-danger">', '</small> '); ?>
                    </div>



                    <div class="mb-3">
                        <label for="basic-url">Periode</label>
                        <div class="input-group">
                            <input type="text" id="basic-url" class="form-control <?= (form_error('periode')) ? 'is-invalid' : ''; ?>" name="periode">
                        </div>
                        <?= form_error('periode', '<small class="text-danger">', '</small> '); ?>
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



<!-- <div class="col-12 col-lg-5 col-sm-12">
             <div class="card shadow mb-4">
                <div class="card-header ">
                    Tambah Barang
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url('admin/C_isi_rab/Tambah_barang'); ?>" method="POST">

                    <?php foreach ($rab as $rb) : ?>
                            <input type="hidden" class="form-control" name="id_rab" value="<?php echo $rb->id_rab; ?>">
                        <?php endforeach; ?>

                        <div class="mb-3">
                            <label for="basic-url">Nama Barang</label>
                            <select name="id_brg" class="selectpicker form-control <?= (form_error('id_brg')) ? 'is-invalid' : ''; ?>" data-live-search="true">
                                <option value="Pilih">Pilih Barang</option>
                                <?php foreach ($barang as $br) : ?>
                                    <option value="<?= $br->id_barang ?>"><?= $br->nama_barang ?> (<?= $br->jumlah ?> <?= $br->satuan ?>)</option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('id_brg', '<small class="text-danger">', '</small> '); ?>
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
    </form> -->