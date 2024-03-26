<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assets/dashboardTemp/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assets/dashboardTemp/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>sweetalert/sweetalert2.min.css">
    <script src="<?php echo base_url('assets/') ?>sweetalert/sweetalert2.min.js"></script>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->

                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Manajemen Barang</h1>
                                    <img src="<?php echo base_url('assets/gambar/'); ?>room.png" class="w-75" alt="">


                                </div>
                                <form class="user" action="<?php echo base_url('C_login/cek_login'); ?>" method="post">

                                <div class="form-floating mb-3 rounded">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="username">
                                    <label for="floatingInput">Username</label>
                                </div>

                                <div class="form-floating">
                                    <input type="password" class="form-control mb-3" id="floatingPassword" placeholder="Password"  name="password">
                                    <label for="floatingPassword">Password</label>
                                </div>


                                    <button class="btn btn-primary btn-user btn-block" type="submit"> Masuk</button>
                                    <hr>
                                </form>
                                <hr>

                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('assets/dashboardTemp/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/dashboardTemp/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assets/dashboardTemp/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets/dashboardTemp/'); ?>js/sb-admin-2.min.js"></script>


    <?php if ($this->session->flashdata('salah')) : ?>
        <script type="text/javascript">
            Swal.fire({
                type: 'warning',
                title: 'Gagal',
                text: 'Cek Kembali Username Dan Password Anda!'
            })
        </script>
    <?php endif;  ?>

    <?php if (validation_errors()) : ?>
        <script type="text/javascript">
            Swal.fire({
                type: 'error',
                title: 'Gagal',
                text: 'Form Anda Ada Yang Kosong!'
            })
        </script>
    <?php endif; ?>

</body>

</html>