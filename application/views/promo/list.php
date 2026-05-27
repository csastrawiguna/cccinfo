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
            <div class="row">
                <div class="col">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <span class="h5 text-info">Daftar Iklan dan Promo </span>
                            <div class="card-tools">                                
                                <?php if (in_array($this->session->userdata('useraccess'), $allowedAccess)) : ?>
                                    <a href="<?= base_url('promo/add') ?>" class="mr-3 text-info">
                                        <i class="fas fa-plus-circle"></i> Tambah
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm">                                    
                                    <table class="table" id="tablePromoList">
                                        <thead>
                                            <tr class="">
                                                <th>#</th>
                                                <th>Promo / iklan</th>
                                                <th>Status</th>
                                                <th>...</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($promoList as $row): ?>
                                                <tr>
                                                    <td><?= $i++ ?></td>
                                                    <td><?= $row['title'] ?> <code><?= dateEndToString($row['date'], $row['date_end']) ?></code></td>
                                                    <td><?= setStatus($row['is_active']) ?> </td>
                                                    <td>
                                                        <a href="<?= base_url('promo/view/') . $row['id'] ?>">
                                                            <button class="btn btn-xs btn-info">
                                                                <li class="fas fa-play"></li>
                                                            </button>
                                                        </a>
                                                        <?php if(in_array($this->session->userdata('useraccess'), $allowedAccess)) : ?>
                                                            <a href="<?= base_url('promo/edit/') . $row['id'] ?>">
                                                                <button class="btn btn-xs btn-warning">
                                                                    <li class="fas fa-edit"></li>
                                                                </button>
                                                            </a>
                                                        <?php endif; ?>                                                        
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2 py-2">
                                    <a href="http://192.168.188.124/info_blast"><button class="btn btn-outline-primary"><i class="fas fa-paper-plane"></i> Info Blast</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>