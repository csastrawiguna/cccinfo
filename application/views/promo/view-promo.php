<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
        <?php 
            $allowedAccess = ['1', '9'];
        ?>

        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col">
                    <!-- <?php var_dump($promoDetail) ?> -->
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <span class="h6 text-primary">
                                <?= $promoDetail['title'] ?> 
                            </span> - 
                            <small class="text-secondary"><span class="badge badge-secondary font-weight-normal px-2">posted by</span> <?= $promoDetail['saved_by'] ?> |  <?= date("d M Y", strtotime($promoDetail['saved_at'])) ?></small>
                            <div class="card-tools">
                                <a class="mr-3" href="<?= base_url('promo/index') ?>"><i class="fas fa-arrow-alt-circle-left"></i> Back</a>
                                <?php if (in_array($this->session->userdata('useraccess'), $allowedAccess)) : ?>
                                    <a href="<?= base_url('promo/edit/') . $promoDetail['id'] ?>" class=""><i class="fas fa-edit"   ></i> Edit promo ini</a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="card-body" >
                            <div class="row" >
                                <div class="col">
                                    <div  class="" style="min-height: 71vh;">
                                        <?= $promoDetail['description'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>