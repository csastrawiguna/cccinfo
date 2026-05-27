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
                            <span class="h6 text-primary">Tambah data Keluhan Konsumen (dari Mendawai)</span>
                            <!-- <div class="card-tools">                                
                                <a href="" class="mr-2 text-info"><i class="fas fa-plus"></i> Tambah Data Keluhan</a>
                            </div> -->
                        </div>
                        <div class="card-body">
                            <form method="post" action="<?= base_url('complaint/inputfromMedawai') ?>">
                                <textarea id="complaintAddTextarea" name="complaintAddTextarea"></textarea>
                                <button type="submit" class="btn btn-info btn-block mt-2">Proses data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
