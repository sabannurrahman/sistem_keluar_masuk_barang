<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Proses Barang</h1>
    <p class="mb-4">Tambah Proses Barang Untuk Keperluan Barang Masuk Dan Keluar</p>



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between ">
                <h5 class="m-0 font-weight-bold ">Data Proses Barang</h5>
                <a href="#" class=" btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Baru</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Aktivitas</th>
                            <th>Jumlah</th>
                            <th>Ket</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($aktifitas as $akt) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= tgl_indo($akt->tanggal); ?></td>
                                <td class="text-center">
                                    <?php
                                    if ($akt->aktifitas == "Masuk") : ?>
                                        <span class="badge badge-pill badge-large badge-success p-2">Barang <?= $akt->aktifitas ?></span>
                                    <?php endif; ?>
                                    <?php if ($akt->aktifitas == "Keluar") : ?>
                                        <span class="badge badge-pill badge-large badge-danger p-2">Barang <?= $akt->aktifitas ?></span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php
                                    if ($akt->aktifitas == "Masuk") : ?>
                                        <?php
                                        $hasil = 0;

                                        foreach ($jumlah as $jm) :

                                            if ($akt->id_aktifitas == $jm->id_aktifitas) {

                                                $hasil = $hasil + $jm->jumlah_BM;
                                            }
                                        ?>
                                    <?php

                                        endforeach;
                                        echo $hasil;
                                    endif; ?>

                                    <?php if ($akt->aktifitas == "Keluar") : ?>
                                        <?php
                                        $hasil = 0;

                                        foreach ($jumlah2 as $jm2) :

                                            if ($akt->id_aktifitas == $jm2->id_aktifitas) {

                                                $hasil = $hasil + $jm2->jumlah_BK;
                                            }
                                        ?>
                                    <?php

                                        endforeach;
                                        echo $hasil;
                                    endif; ?>
                                </td>
                                <td><?= $akt->ket ?></td>
                                <td class="text-center">
                                    <?php
                                    if ($akt->aktifitas == "Masuk") : ?>
                                        <a href="<?= base_url('admin/C_barang_masuk/detail_BM/') . $akt->id_aktifitas ?>" class="btn btn-primary "><i class="fas fa-link fa-sm text-white-50"></i></a>
                                        <a href="" class="btn btn-danger "><i class="fas fa-trash fa-sm text-white-50"></i></a>
                                    <?php endif; ?>
                                    <?php if ($akt->aktifitas == "Keluar") : ?>
                                        <a href="<?= base_url('admin/C_barang_keluar/detail_KL/') . $akt->id_aktifitas ?>" class="btn btn-primary "><i class="fas fa-link fa-sm text-white-50"></i></a>
                                        <a href="" class="btn btn-danger "><i class="fas fa-trash fa-sm text-white-50"></i></a>
                                    <?php endif; ?>

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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Aktifitas Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('admin/C_aktifitas/Tambah_aktifitas'); ?>" method="POST">
                    <div class="mb-3">
                        <label for="basic-url">Tanggal</label>
                        <div class="input-group mb-3">
                            <input type="date" class="form-control <?= (form_error('tgl')) ? 'is-invalid' : ''; ?>" name="tgl">
                        </div>
                        <?= form_error('tgl', '<small class="text-danger">', '</small> '); ?>
                    </div>

                    <div class="mb-3">
                        <label for="basic-url">Aktifitas</label>
                        <div class="input-group mb-3">
                            <select name="aktifitas" class="form-control" id="">
                                <option value="Masuk">Barang Masuk</option>
                                <option value="Keluar">Barang Keluar</option>
                            </select>
                        </div>
                        <?= form_error('nama', '<small class="text-danger">', '</small> '); ?>
                    </div>

                    <div class="mb-3">
                        <label for="ket">Ket</label>
                        <textarea name="ket" id="ket" cols="6" rows="4" class="form-control"></textarea>
                        <?= form_error('ket', '<small class="text-danger">', '</small> '); ?>
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