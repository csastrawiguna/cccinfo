<!-- <div class="content-wrapper">
    <div class="container-fluid pt-2">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
        <div class="card card-outline card-info">
            <div class="card-body" style="min-height: 81vh;">
                <div class="row">
                    <div class="col">
                        <p class="text-center lead" style="font-size: 40px; margin-top: 18%;">
                            Welcome to CCC Info
                        </p>
                        <p class="text-center lead text-info">Supporting site for Customer Care Center daily operation</p>
                        <?php if(!$this->session->userdata('userid')): ?>
                            <p class="text-center mt-4 lead">
                                <a href="#" data-toggle="modal" data-target="#modal-login" class="btn btn-outline-info px-3">Login</a>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title; ?></title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <!-- <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url(); ?>assets/img/favicon/favicon-32x32.png"> -->
    <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/favicon/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/favicon/favicon-16x16.png" sizes="16x16" />
    <!-- <link rel="icon" href="<?= base_url(); ?>assets/img/favicon.ico"> -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/fontawesome-free/css/all.css">
    <!-- Linear icon -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/linearicons-free/linearicons-free.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/overlayScrollbars/css/OverlayScrollbars.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

<div class="bg-light" style="min-height: 100vh;height: 100%; width: 100%; background:url(<?= base_url('assets/img/bg/r_domenico-loia-310197-unsplash.jpg');?>) no-repeat center center; background-size: cover; position: fixed;z-index: -1; overflow: hidden;">
</div>
<span style="position: fixed; bottom: 10px; right: 20px; color: #fff; z-index: 10">image: <a href="https://unsplash.com/photos/hGV2TfOh0ns" target="_blank" style="color: #fff">www.unsplash.com</a></span>
<div class="" style="min-height: 100vh;height: 100%; width: 100%; background-color: rgba(210,210,210,0.6); background-size: cover; position: relative; z-index: 9; overflow: hidden;" >
    <div class="row">
        <div class="col-4 mx-auto" style="margin-top: 26vh; max-width: 360px; min-width: 350px;">
            <div class="card">
                <div class="card-header text-center bg-light" style="font-size: 40px; height: 80px;">
                    <!-- <span class="lnr lnr-layers"></span><span style="font-size: 32px;"> LOGSHEET</span> -->
                    <img src="<?= base_url('assets/img/logo/logsheet.png') ?>" class="img" height="32">
                </div>
                <div class="card-body login-card-body">
                    <form action="" class="text-center mt-4 mb-3" method="post">
                        <div class="input-group mb-3">
                            <input type="" class="form-control" name="username" id="username" placeholder="Username or CTI ID" autofocus="" value="<?= set_value('username') ?>">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="lnr lnr-user"></span>
                                </div>
                            </div>
                        </div>
                        <di class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="lnr lnr-lock"></span>
                                </div>
                            </div>
                        </di px-3v>
                        <div class="row">
                            <!-- /.col -->
                            <!-- <div class="col-8"></div> -->
                            <div class="col text-right">
                                <button type="submit" name="submit" class="mb-2 btn btn-primary btn-block">Login</button>
                                <a href="<?= base_url('auth/formResetPassword'); ?>" type="button" name="submit" class="text-secondary text-right">Forgot password</a>
                            </div>

                            <!-- /.col -->
                        </div>
                    </form>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
    </div>
</div>

<div class="container">
<div class="card card-outline card-info">
    <div class="card-body" style="min-height: 81vh;">
        <div class="row">
            <div class="col">
                <p class="text-center lead" style="font-size: 40px; margin-top: 18%;">
                    Welcome to CCC Info
                </p>
                <p class="text-center lead text-info">Supporting site for Customer Care Center daily operation</p>
                <div class="card-body login-card-body">
                    <!-- <form action="" class="text-center mt-4 mb-3" method="post">
                        <div class="input-group mb-3">
                            <input type="" class="form-control" name="username" id="username" placeholder="Username or CTI ID" autofocus="" value="<?= set_value('username') ?>">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="lnr lnr-user"></span>
                                </div>
                            </div>
                        </div>
                        <di class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="lnr lnr-lock"></span>
                                </div>
                            </div>
                        </di px-3v>
                        <div class="row">
                            <!-- /.col -->
                            <!-- <div class="col-8"></div> -->
                            <div class="col text-right">
                                <button type="submit" name="submit" class="mb-2 btn btn-primary btn-block">Login</button>
                            </div>
                        </div>
                    </form> -->
                    <form action="<?= base_url('auth') ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title text-info">Login CCC Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="loginUsername">Username</label>
                        <input type="" class="form-control" id="loginUsername" name="loginUsername" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="loginPassword">Password</label>
                        <input type="password" class="form-control" id="loginPassword" name="loginPassword">
                    </div>
                    <button type="submit" class="btn btn-info btn-block my-3" name="loginSubmit" id="loginSubmit">Login</button>
                </div>
            </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-login">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 300px;">
        <div class="modal-content">
            <form action="<?= base_url('auth') ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title text-info">Login CCC Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="loginUsername">Username</label>
                        <input type="" class="form-control" id="loginUsername" name="loginUsername" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="loginPassword">Password</label>
                        <input type="password" class="form-control" id="loginPassword" name="loginPassword">
                    </div>
                    <button type="submit" class="btn btn-info btn-block my-3" name="loginSubmit" id="loginSubmit">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url(); ?>assets/js/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url(); ?>assets/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets/js/adminlte.min.js"></script>
<!-- Demo -->
<!-- <script src="<?= base_url(); ?>assets/js/demo.js"></script> -->
<!-- Sweetalert -->
<script src="<?= base_url(); ?>assets/js/sweetalert2.all.min.js"></script>
<!-- Chart -->
<script src="<?= base_url(); ?>assets/js/Chart380.js"></script>
<!-- <script src="<?= base_url(); ?>assets/js/chartjs-plugin-label.js"></script> -->
<!-- CKEditor -->
<!-- <script src="<?= base_url(); ?>assets/js/ckeditor5-classic/ckeditor.js"></script> -->
<!-- DataTable   -->
<script src="<?= base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>assets/js/responsive.bootstrap4.min.js"></script>
<!-- CK Editor -->
<script src="<?= base_url(); ?>assets/js/summernote.js"></script>
<!-- Toastr -->
<script src="<?= base_url(); ?>assets/js/toastr.min.js"></script>
<!-- Script sendiri -->
<script src="<?= base_url(); ?>assets/js/functions.js"></script>

</body>

</html>