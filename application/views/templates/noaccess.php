<link rel="stylesheet" href="<?= base_url(); ?>assets/css/adminlte.min.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/fontawesome-free/css/all.css">
<section class="content" style="padding-top: 25vh;">
    <div class="error-page row">
        <div class="col text-center">
            <h2 class="headline text-warning"><span class="display-1"><i class="fas fa-exclamation-triangle"></i></span> <span class="display-2">Oops!</span></h2>
            <!-- <?php $cekLink = $_SERVER['HTTP_REFERER']; ?> -->
            <?php if (is_null($_SERVER['HTTP_REFERER'])) {
                $link = 'http://192.168.188.254/cccinfo/dashboard';
            } else {
                $link = $_SERVER['HTTP_REFERER'];
            } ?>
            <div class="error-content">              
                <p class="lead">
                    Halaman tidak ditemukan atau Anda tidak memiliki akses.
                </p>
                <p class="mt-3">
                    <a href="<?= $link ?>" class="">Kembali ke halaman sebelumnya</a>
                </p>                
            </div>
        </div>
    </div>
</section>