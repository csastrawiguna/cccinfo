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
<div class="card card-outline card-info">
    <div class="card-body" style="min-height: 97vh;">
        <div class="row">
            <div class="col text-center">
                <div style="position: relative; margin-bottom: 40px;">
                    <img class="img img-fluid rounded" src="<?= base_url(); ?>assets/img/profile/CCC.png" style="position: relative; height: 300px">
                    <p class="text-center lead text-info" style="font-size: 40px; position: absolute; bottom: 24px; padding-left: 44%; padding-right: 40%; background-color: rgba(255, 255, 255, 0.5);">
                        CCC Info
                    </p>
                    <p class="text-center lead text-secondary" style="font-size: 18px"><i class="fas fa-bookmark"></i> A Supporting Site for Customer Care Center and Related Team's Daily Operation</p>
                </div>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div class="px-5">
                    <form action="<?= base_url('auth') ?>" method="post" class="mt-3" style="max-width: 360px;">
                        <p class="h5 text-info text-center">Login here</p>
                        <div class="form-group">
                            <label for="loginUsername" class="font-weight-normal">Username</label>
                            <input type="" class="form-control" id="loginUsername" name="loginUsername" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="loginPassword" class="font-weight-normal">Password</label>
                            <input type="password" class="form-control" id="loginPassword" name="loginPassword">
                        </div>
                        <button type="submit" class="btn btn-info btn-block my-3" name="loginSubmit" id="loginSubmit">Login</button>
                    </form>
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
</div>

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