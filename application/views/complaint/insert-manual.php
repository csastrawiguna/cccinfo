<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
            <div class="row">
                <div class="col">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <span class="h6 text-primary">Proses tambah data Keluhan Konsumen</span>
                            <div class="card-tools">
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="<?= base_url('complaint/processmanual') ?>">
                                <textarea id="manualAddTextarea" name="manualAddTextarea"></textarea>
                                <button type="submit" class="btn btn-info btn-block mt-2">Proses data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>