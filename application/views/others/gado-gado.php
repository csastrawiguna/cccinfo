<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>

        <div class="container-fluid pt-3">            
            <div class="card card-outline card-info">
                <div class="card-header">
                    <span class="text-primary">Info Gado-Gado</span>
                </div>
                <div class="card-body">
                    <table class="table col-6 table-borderless table-responsive">
                        <tbody>
                            <tr>
                                <td>Daftar Kode Warna</td>
                                <td>
                                    <div class="row">
                                        <div class="col" style="height: 12px; background-color: red">&nbsp;</div>
                                        <div class="col" style="height: 12px; background-color: blue">&nbsp;</div>
                                    </div>
                                    <div class="row">
                                        <div class="col" style="height: 12px; background-color: green">&nbsp;</div>
                                        <div class="col" style="height: 12px; background-color: yellow">&nbsp;</div>
                                    </div>
                                </td>
                                <td>
                                    <a href="<?= base_url('others/showgado/kodewarna') ?>"><i class="fas fa-play"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Kode Warna Favorit</td>
                                <td>
                                    <div class="row">
                                        <div class="col" style="height: 12px; background-color: rgb(210, 20, 65)">&nbsp;</div>
                                        <div class="col" style="height: 12px; background-color: #6610F2">&nbsp;</div>
                                    </div>
                                    <div class="row">
                                        <div class="col" style="height: 12px; background-color: #01FF70">&nbsp;</div>
                                        <div class="col" style="height: 12px; background-color: #F012BE;">&nbsp;</div>
                                    </div>
                                </td>
                                <td>
                                    <a href="<?= base_url('others/showgado/flat-color') ?>"><i class="fas fa-play"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>                              
    </section>
</div>
