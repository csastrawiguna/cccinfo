<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
        <?php 
            function setStatus($data) {
                if ($data == 1) {
                    return '<span class="badge badge-success">Active</span>';
                } else {
                    return '<span class="badge badge-secondary">Inactive</span>';
                }
            }

            function redirectLink($link_note, $link) {
                if ($link_note == "other_site") {
                    return $link;
                } else {
                    return base_url($link);
                }
            }

            function dateEndToString($date, $dateEnd) {
                if (is_null($dateEnd) && is_null($date)) {
                    return '';
                } else if (is_null($dateEnd) && !is_null($date)) {
                    return '(' . date("d M Y", strtotime($date)) . ')';
                } else {
                    return '(' . date("d M", strtotime($date)) . ' - ' . date("d M Y", strtotime($dateEnd))  . ')';
                }
            }

            $allowedAccess = ['1', '9'];

        ?>

        <div class="container-fluid pt-3">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <span class="h5 text-info">Info lain</span>
                    <div class="card-tools">
                        <?php if (in_array($this->session->userdata('useraccess'), $allowedAccess)) : ?>
                            <a href="<?= base_url('promo/addothers') ?>" class="mr-3 text-info">
                                <i class="fas fa-plus-circle"></i> Tambah
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <p class="lead">Otewe</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>