<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Cetak RAB</h1>
    <p class="mb-4">Cetak RAB Barang Sewaaan</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between ">
                <h5 class="m-0 font-weight-bold ">Data RAB</h5>
                <a href="#" class=" btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus fa-sm text-white-50"></i> Buat Baru</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nomor</th>
                            <th>Perusahaan</th>
                            <th>Buyer</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($rab as $rb) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= tgl_indo($rb->tanggal_po); ?></td>
                                <td><?= $rb->no_po ?></td>
                                <td><?= $rb->nama_perusahaan ?></td>
                                <td><?= $rb->nama_buyer ?></td>
                                <td class="text-center">


                                    <a href="<?= base_url('admin/C_isi_rab/isi_rab/') . $rb->id_rab ?>" class="btn btn-primary "><i class="fas fa-link fa-sm text-white-50"></i></a>
                                    <a href="" class="btn btn-danger "><i class="fas fa-trash fa-sm text-white-50"></i></a>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah RAB Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('admin/C_rab/Tambah_rab'); ?>" method="POST">
                    <div class="mb-3">
                        <label for="basic-url">No. PO</label>
                        <div class="input-group">
                            <input type="text" id="basic-url" class="form-control <?= (form_error('no_po')) ? 'is-invalid' : ''; ?>" name="no_po">
                        </div>
                        <?= form_error('no_po', '<small class="text-danger">', '</small> '); ?>
                    </div>

                    <div class="mb-3">
                        <label for="basic-url">Tanggal PO</label>
                        <div class="input-group">
                            <input type="date" id="basic-url" class="form-control <?= (form_error('tgl')) ? 'is-invalid' : ''; ?>" name="tgl">
                        </div>
                        <?= form_error('tgl', '<small class="text-danger">', '</small> '); ?>
                    </div>

                    <div class="mb-3">
                        <label for="basic-url">Nama Buyer</label>
                        <div class="input-group">

                            <select name="id_buyer" class="selectpicker form-control <?= (form_error('id_buyer')) ? 'is-invalid' : ''; ?>" data-live-search="true">
                                <option value="Pilih">Pilih Buyer</option>
                                <?php foreach ($buyer as $by) : ?>
                                    <option value="<?= $by->id_buyer ?>"><?= $by->nama_buyer ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?= form_error('id_buyer', '<small class="text-danger">', '</small> '); ?>
                    </div>

                    <div class="mb-3">
                        <label for="basic-url">Nama Perusahaan</label>
                        <div class="input-group ">

                            <select name="id_perusahaan" class="selectpicker form-control <?= (form_error('id_perusahaan')) ? 'is-invalid' : ''; ?>" data-live-search="true">
                                <option value="Pilih">Pilih Perusahaan</option>
                                <?php foreach ($perusahaan as $ps) : ?>
                                    <option value="<?= $ps->id_perusahaan ?>"><?= $ps->nama_perusahaan ?></option>
                                <?php endforeach; ?>
                            </select>

                        </div>
                        <?= form_error('id_perusahaan', '<small class="text-danger">', '</small> '); ?>
                    </div>


                    <div class="mb-3">
                        <label for="catatan">Catatan</label>
                        <textarea name="catatan" id="catatan" cols="6" rows="4" class="form-control"></textarea>
                        <?= form_error('catatan', '<small class="text-danger">', '</small> '); ?>
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