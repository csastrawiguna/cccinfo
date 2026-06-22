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
    $.widget.bridge('uibutton', $.ui.button);
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
<!-- CK Editor -->
<script src="<?= base_url(); ?>assets/js/summernote.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url(); ?>assets/js/toastr.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url(); ?>assets/js/select2.min.js"></script>
<!-- VueJS -->
<script src="<?= base_url(); ?>assets/js/vue.global.js"></script>
<!-- <script src="<?= base_url(); ?>assets/js/vue.global.prod.js"></script> -->
<script src="<?= base_url(); ?>assets/js/axios.min.js"></script>
<!-- Script sendiri -->
<!-- JS Variabel -->
<script>
    const jsVar = {
        baseUrl : '<?= base_url() ?>',
        CSRF_NAME : '<?= $this->security->get_csrf_token_name() ?>',
        CSRF_HASH : '<?= $this->security->get_csrf_hash() ?>'
    };

    const baseUrl = '<?= base_url(); ?>';

    // copy to clipboard at Service Area Table
    function copyToClipboard(teks) {

        // 1. Coba cara modern heula (HTTPS/Localhost)
        if (navigator.clipboard && window.isSecureContext) {
            navigator.clipboard.writeText(teks).then(() => {
                console.log("Berhasil nyalin (Modern API)");
                toastr["info"](teks, "Copied");
            }).catch(err => {
                console.error("Gagal nyalin: ", err);
            });
        } 
        
        // 2. Cara darurat pikeun Firefox di HTTP biasa
        else {
            const textArea = document.createElement("textarea");
            textArea.value = teks;

            // Sangkan teu ngaganggu tampilan
            textArea.style.position = "fixed";
            textArea.style.left = "-9999px";
            textArea.style.top = "0";
            document.body.appendChild(textArea);
            textArea.focus();
            textArea.select();

            try {
                const sukses = document.execCommand('copy');
                    if (sukses) {
                        // alert("Teks geus disalin (via Fallback)!");
                        toastr["info"](teks, "Copied");
                        toastr.options = { "closeButton": false, "debug": false, "newestOnTop": false, "progressBar": false, "positionClass": "toast-top-right", "preventDuplicates": false, "onclick": null, "showDuration": "300", "hideDuration": "1000", "timeOut": "5000", "extendedTimeOut": "1000", "showEasing": "swing", "hideEasing": "linear", "showMethod": "fadeIn", "hideMethod": "fadeOut"}
                    } else {
                        alert("Duh, teu bisa nyalin euy!");
                }
            } catch (err) {
                console.error("Gagal pisan: ", err);
            }
        
            document.body.removeChild(textArea);
        }
    }
</script>
<script src="<?= base_url('assets/js/functions.js?v=' . filemtime(FCPATH . 'assets/js/functions.js')) ?>"></script>

<?php if (isset($vuescript) && !empty($vuescript)): ?>
    <?php 
        // Gabungkeun path jeung ekstensi .js
        $js_file = $vuescript . '.js'; 
        $full_path = FCPATH . 'assets/js/vue3/' . $js_file;
    ?>
    
    <?php if (file_exists($full_path)): ?>
        <script src="<?= base_url('assets/js/vue3/' . $js_file . '?v=' . filemtime($full_path)) ?>"></script>
    <?php else: ?>
    <?php endif; ?>
<?php endif; ?>

</body>
</html>