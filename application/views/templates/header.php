<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title; ?></title>
    <style type="text/css">
        html {
            font-size: 14px;
        }

        #judul {
            height: 36px;
            line-height: 36px;
        }

        .sembunyi {
            visibility: hidden;
            transition: 0.5s;
            display: none;

        }

        .muncul {
            visibility: visible;
            transition: 0.5s;
            display: all;
        }

        #kolomHitung table tr {
            height: 24px;
            line-height: 24px;
        }

        #kolomHitung table tr:last-child {
            height: 32px;
            font-weight: bold;
            letter-spacing: 1px;
            font-size: 1.03em;
            width: 400px;
        }

        #kolomHitung table tr input {
            height: 23px;
            line-height: 23px;
        }

        #kolomHitung table tr td:last-child,
        #kolomHitung table tr td:last-child input {
            text-align: right;
        }

        #info {
            border: 1px solid #28a745;
            border-radius: 5px;
            margin-left: 30px;
        }

        #info ul li {
            height: 46px;
            line-height: auto;
        }

        #tabelSpecAC table tbody tr td,
        #tabelSpecAC table thead tr th {
            border: 1px solid #999;
            font-size: 13px;
        }
        .preloader {
          position: fixed;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          z-index: 9999;
          background-color: rgba(255, 255, 255, 0.99);
        }
        .preloader .loading {
          position: absolute;
          left: 50%;
          top: 50%;
          transform: translate(-50%,-50%);
        }

        #textLoading{
          position: absolute;
          left: 50%;
          top: 64%;
          transform: translate(-50%,-50%);
        }
        
        .tooltips {
          position: relative;
          display: inline-block;
        }

        .tooltips .tooltiptext {
          visibility: hidden;
          width: 160px;
          background-color: #555;
          color: #fff;
          text-align: center;
          border-radius: 6px;
          padding: 5px;
          position: absolute;
          z-index: 1;
          bottom: 150%;
          right: 5%;
          margin-left: -75px;
          opacity: 0;
          transition: opacity 0.3s;
        }

        .tooltips .tooltiptext::after {
          content: "";
          position: absolute;
          top: 100%;
          left: 50%;
          margin-left: -5px;
          border-width: 5px;
          border-style: solid;
          border-color: #555 transparent transparent transparent;
        }

        .tooltips:hover .tooltiptext {
          visibility: visible;
          opacity: 1;
        }
    </style>

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
    <!-- Datetime Picker -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/jquery.datetimepicker.min.css">
    <!-- Pretty checkbox -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/pretty-checkbox.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/responsive.bootstrap4.min.css">
    <!-- Chart.js -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/Chart.min.css">
    <!-- Summernote -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/summernote.css">
    <!-- <link rel="stylesheet" href="<?= base_url(); ?>assets/css/part-price.css"> -->
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/toastr.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/select2-bootstrap4.min.css">
    <style type="text/css">
        
    </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div class="preloader">
            <div class="loading">
                <img src="<?= base_url('assets/img/preloader/5balls.gif') ?>" width="">
                <p class="text-center lead" id="textLoading">Memuat halaman...</p>
                <p class="text-center text-light" style="color: salmon;"><em><small>biar mirip dengan aplikasi chat..</small></em></p>
            </div>
        </div>