<div class="content-wrapper">
    <section class="content">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
        <div class="container-fluid pt-3">
            <div class="card card-outline card-info">
                <div class="card-body" style="min-height: 81vh;">
                    <div class="row" style="margin-top: 100px">
                        <div class="col text-center">
                            <div style="">
                                <!-- <img class="img img-fluid rounded" src="<?= base_url(); ?>assets/img/profile/CCC.png" style="height: 180px"> -->
                                <p class="text-center lead text-info" style="font-size: 28px; background-color: rgba(255, 255, 255, 0.5);">
                                    Welcome to CCCInfo
                                </p>
                                <p class="text-center lead text-purple" style="font-size: 18px"><i class="fas fa-bookmark"></i> A Supporting Site for Customer Care Center and Related Team's Daily Operation</p>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4 text-center">
                            <div class="card">
                                <div class="card-header bg-info">
                                    <div class="lead" style=";">
                                        <?= $this->session->userdata('userfullname') ?><br>
                                    </div>
                                </div>
                                <div class="card-body" >
                                    <p><i class="<?= $this->session->userdata('icon') ?>"  style="font-size: 120px"></i></p>
                                    <p class="text-info">
                                        <em>- <?= $this->session->userdata('useraccessname') ?> -</em>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4"></div>
                    </div>
                </div>
            </div>
        </div>                              
    </section>
</div>
