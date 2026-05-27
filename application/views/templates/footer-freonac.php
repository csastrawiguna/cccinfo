<footer class="main-footer">
    <div class="text-center">JnB | AdminLTE.io</div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-light">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url(); ?>assets/js/jquery-ui.min.js"></script>
<!-- Popper JS-->
<script src="<?= base_url(); ?>assets/js/popper.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
<!-- <script src="<?= base_url(); ?>assets/js/bootstrap.bundle.min.js.map"></script> -->
<!-- overlayScrollbars -->
<script src="<?= base_url(); ?>assets/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets/js/adminlte.min.js"></script>
<!-- Datetime Picker -->
<script src="<?= base_url(); ?>assets/js/jquery.datetimepicker.full.min.js"></script>
<!-- Demo -->
<!-- <script src="<?= base_url(); ?>assets/js/demo.js"></script> -->
<!-- Sweetalert -->
<script src="<?= base_url(); ?>assets/js/sweetalert2.all.min.js"></script>
<!-- Chart -->
<script src="<?= base_url(); ?>assets/js/Chart380.js"></script>
<script src="<?= base_url(); ?>assets/js/chartjs-plugin-datalabels-2.0.0.js"></script>
<!-- CKEditor -->
<!-- <script src="<?= base_url(); ?>assets/js/ckeditor5-classic/ckeditor.js"></script> -->
<!-- DataTable   -->
<script src="<?= base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>assets/js/responsive.bootstrap4.min.js"></script>
<!-- VueJS -->
<!-- <script src="<?= base_url(); ?>assets/js/vue.global.js"></script> -->
<!-- <script src="<?= base_url(); ?>assets/js/vue.global.prod.js"></script> -->
<!-- CK Editor -->
<script src="<?= base_url(); ?>assets/js/summernote.min.js"></script>
<!-- Script sendiri -->
<script>
    const jsVar = {
        baseUrl: '<?= base_url() ?>'
    }
</script>
<script src="<?= base_url(); ?>assets/js/functions.js"></script>
<!-- <script src="<?= base_url(); ?>assets/js/functions.freonac.js"></script> -->
<script src="<?= base_url('assets/js/functions.freonac.js?v=' . filemtime(FCPATH . 'assets/js/functions.freonac.js')) ?>"></script>

</body>

</html>