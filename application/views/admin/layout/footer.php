<div class="modal fade " id="modal-hapus">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title">Yakin akan menghapus data ini?</h5>
            </div>

            <div class="modal-footer justify-content-left">
                <form id="form_delete" action="" method="post">
                    <button type="submit" class="btn  btn-success">Yakin</button>
                    <button type="button" class="btn  btn-danger" data-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Sistem Informasi Barang 2023</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                <a class="btn btn-danger" href="<?php echo base_url('C_login/logout') ?>">Keluar</a>
            </div>
        </div>
    </div>
</div>


<?php if (validation_errors()) : ?>
    <script type="text/javascript">
        Swal.fire({
            type: 'error',
            text: 'Gagal Ditambahkan!',
            showConfirmButton: false,
            timer: 1000
        })
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('berhasil')) : ?>
    <script type="text/javascript">
        Swal.fire({
            type: 'success',
            text: 'Berhasil',
            showConfirmButton: false,
            timer: 1000
        })
    </script>
<?php endif;  ?>







<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('assets/dashboardTemp/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url('assets/dashboardTemp/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- datatables -->
<script src="<?php echo base_url('assets/dashboardTemp/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/dashboardTemp/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="<?php echo base_url('assets/dashboardTemp/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url('assets/dashboardTemp/'); ?>js/sb-admin-2.min.js"></script>
<script src="<?php echo base_url('assets/dashboardTemp/'); ?>js/demo/datatables-demo.js"></script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);

    });
</script>

</body>

</html>