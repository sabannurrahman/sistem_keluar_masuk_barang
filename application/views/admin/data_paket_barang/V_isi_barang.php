<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Isi Paket Barang</h1>
    <p class="mb-4">Tambahkan isi Paket Barang Sesuai Barang Yang Sudah Ditambahkan</p>


    <div class="alert alert-primary" role="alert">
        <div class="d-sm-flex align-items-center justify-content-between ">
            Nama Paket :
            <?php foreach ($detail as $det) :
                echo $det->nama_barang;
            endforeach; ?>

            <a href="<?php echo base_url('admin/C_paket_barang') ?>" class=" btn btn-sm btn-light rounded-circle "><i class="fas fa-arrow-left text-primary"></i></a>
        </div>

    </div>

    <div class="row">
        <div class="col-12 col-lg-5 col-sm-12">
            <div class="card shadow mb-4">
                <div class="card-header ">
                    Tambah Barang
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url('admin/C_isi_barang/Tambah_barang'); ?>" method="POST">


                        <input type="hidden" name="id_br" value="<?= $id; ?>">


                        <div class="mb-3">
                            <label for="basic-url">Nama Barang</label>
                            <select name="nama_isi" class="selectpicker form-control <?= (form_error('nama_isi')) ? 'is-invalid' : ''; ?>" data-live-search="true">
                                <option value="Pilih">Pilih Barang</option>
                                <?php foreach ($barang as $br) : ?>
                                    <option value="<?= $br->id_barang ?>"><?= $br->nama_barang ?> </option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('nama_isi', '<small class="text-danger">', '</small> '); ?>
                        </div>

                        <button type="submit" class="btn btn-sm btn-primary">Tambah Isi Barang</button>
                </div>
            </div>
        </div>
        </form>

        <div class="col-12 col-lg-7 col-sm-12">
            <div class="card shadow-sm mb-4">
                <div class="card-header py-3">

                    Data Isi Barang

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($isi as $is) :
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $is->nama_barang; ?></td>
                                        <td class="text-center">
                                            <a class="btn btn-danger mr-3 " href="#modal-hapus" onclick="$('#modal-hapus #form_delete').attr('action', 
                                         '<?= site_url('Admin/C_isi_barang/hapus/' . $is->id_isi); ?>')" data-toggle="modal">
                                                <i class="fas fa-trash fa-sm text-white-50"></i>
                                            </a>


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