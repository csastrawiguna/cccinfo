<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>

        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <span class="h6 text-primary">Info Layanan Cleaning Mesin Cuci & Lemari Es</span>
                            <div class="card-tools">
                                <a class="mr-3" href="<?= base_url('promo') ?>"><i class="fas fa-arrow-alt-circle-left"></i> Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <p class="lead text-info">Cakupan pekerjaan cleaning mesin cuci:</p>
                                    <div class="pl-2">
                                        <p><span class="text-info"><i class="fas fa-check"></i></span> Melepas AC cord</p>
                                        <p><span class="text-info"><i class="fas fa-check"></i></span> Pembersihan tabung (wash & spin)</p>
                                        <p><span class="text-info"><i class="fas fa-check"></i></span> Pembersihan filter air dan <em>Flush stopper</em></p>
                                        <p><span class="text-info"><i class="fas fa-check"></i></span> Pembersihan selang pembuangan</p>
                                        <p><span class="text-info"><i class="fas fa-check"></i></span> Pembersihan seal tabung (tipe front-loading)</p>
                                        <p><span class="text-info"><i class="fas fa-check"></i></span> Pemasangan cord</p>
                                        <p><span class="text-info"><i class="fas fa-check"></i></span> Penjelasan cara pakai + fitur + perawatan units</p>
                                    </div>
                                </div>                              
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <p class="lead text-info">Cakupan pekerjaan cleaning lemari es:</p>
                                    <div class="pl-2">
                                        <p><span class="text-info"><i class="fas fa-check"></i></span> Melepas AC cord</p>
                                        <p><span class="text-info"><i class="fas fa-check"></i></span> Pembersihan ruangan freezer & pendingin</p>
                                        <p><span class="text-info"><i class="fas fa-check"></i></span> Pembersihan rak lemari es</p>
                                        <p><span class="text-info"><i class="fas fa-check"></i></span> Pembersihan karet/gasket pintu</p>                                        
                                        <p><span class="text-info"><i class="fas fa-check"></i></span> Pemasangan AC cord</p>
                                        <p><span class="text-info"><i class="fas fa-check"></i></span> Penjelasan cara pakai + fitur + perawatan unit</p>
                                    </div>
                                </div>                              
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <code><i class="fas fa-info-circle"></i></code> Info biaya jasa cleaning lihat di <a href="<?= base_url('cost/index') ?>">Service cost</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>