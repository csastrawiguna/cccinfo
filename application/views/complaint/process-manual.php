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
                        </div>
                        <div class="card-body">
                            <form method="post" action="">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="manualInputCategory" class="col-sm-2 col-form-label">Jenis keluhan</label>
                                            <div class="col-sm-4">
                                                <input type="" class="form-control" id="manualInputCategory" name="manualInputCategory" value="<?= ltrim(substr($processed['systemCode'], 6), '&nbsp;') ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="manualInputCustomerName" class="col-sm-4 col-form-label">Nama konsumen</label>
                                            <div class="col-sm-8">
                                                <input type="" class="form-control" id="manualInputCustomerName" name="manualInputCustomerName" value="<?= ltrim($processed['customerName'], ' ') ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="manualInputCustomerPhone" class="col-sm-4 col-form-label text-right">Telepon</label>
                                            <div class="col-sm-8">
                                                <input type="" class="form-control" id="manualInputCustomerPhone" name="manualInputCustomerPhone" value="<?= ltrim($processed['customerPhone'], ' ') ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="manualInputCustomerAddress" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <input type="" class="form-control" id="manualInputCustomerAddress" name="manualInputCustomerAddress" value="-">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="manualInputModel" class="col-sm-6 col-form-label">Model</label>
                                            <div class="col-sm-6">
                                                <input type="" class="form-control" id="manualInputModel" name="manualInputModel" value="<?= trim($processed['model'], ' ') ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="manualInputSerialnumber" class="col-sm-4 col-form-label text-right">No. seri</label>
                                            <div class="col-sm-6">
                                                <input type="" class="form-control" id="manualInputSerialnumber" name="manualInputSerialnumber" value="-">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="manualInputNotif" class="col-sm-4 col-form-label text-right">Notif</label>
                                            <div class="col-sm-6">
                                                <input type="" class="form-control" id="manualInputNotif" name="manualInputNotif" value="<?= trim($processed['notification'], ' ') ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="manualInputClaimDate" class="col-sm-6 col-form-label">Tanggal keluhan</label>
                                            <div class="col-sm-6">
                                                <input type="date" class="form-control" id="manualInputClaimDate" name="manualInputClaimDate" value="<?= date("Y-m-d", strtotime(substr($processed['dateTime'],1,10))) ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="manualInputAgent" class="col-sm-4 col-form-label text-right">Agent</label>
                                            <div class="col-sm-6">
                                                <input type="" class="form-control" id="manualInputAgent" name="manualInputAgent" value="<?= ltrim($processed['agent'], ' ') ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="manualInputClaimDetail" class="col-sm-2 col-form-label">Detail keluhan</label>
                                    <div class="col-sm-10">
                                        <textarea rows="3" type="" class="form-control" id="manualInputClaimDetail" name="manualInputClaimDetail"><?= ltrim($processed['detail'], ' ') ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="manualInputAgentAction" class="col-sm-2 col-form-label">Agent action detail</label>
                                    <div class="col-sm-10">
                                        <textarea rows="3" type="" class="form-control" id="manualInputAgentAction" name="manualInputAgentAction"><?= ltrim($processed['actionAgent'], ' ') ?></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn px-5 btn-danger mt-3">Proses data</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
