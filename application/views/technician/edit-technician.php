<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
            <?php
                function phoneToBreakline($data) {
                    if ($data == '') {
                        echo "";
                    } else {
                        echo "<br>" . $data;
                    }
                }

                function checkData() {
                    if (is_null($technicianData)) {
                        return '';
                    } else {
                        return $technicianData['id'];
                    }
                }

                function valToState($val) {
                    if(strtolower($val) == 'active') {
                        return 'checked';
                    } else {
                        return '';
                    }   
                }
            ?>
            <div class="row">
                <div class="col-8">
                    <div class="card card-outline card-info" id="cardEditTechnician">
                        <div class="card-header">
                            <span class="h5 text-primary">Edit Data PIC Service Center (Teknisi/Admin)</span>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="" id="formEditTechnician">
                            <!-- <form method="POST" action="<?= base_url('technician/tes') ?>" id="formEditTechnician"> -->
                                <div class="modal-body">
                                    <input type="hidden" class="form-control" name="formEditTechnicianId" id="formEditTechnicianid" readonly value="<?= $technicianDetail['id'] ?>">
                                    <div class="form-group row">
                                        <label for="formEditTechnicianSvctype" class="col-sm-3 col-form-label col-form-label-sm">SVC Network</label>
                                        <div class="col-sm-9">
                                            <select type="" class="form-control form-control custom-select" id="formEditTechnicianSvctype" name="formEditTechnicianSvctype">
                                                <option value="<?= $technicianDetail['svc_type'] ?>" selected><?= $technicianDetail['svc_type'] ?></option>
                                                <option value="">- pilih -</option>
                                                <option value="BRANCH">BRANCH</option>
                                                <option value="SDSS">SDSS</option>
                                                <option value="SSR">SSR</option>
                                                <option value="SASS">SASS</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="formEditTechnicianSvcbranch" class="col-sm-3 col-form-label col-form-label-sm">Nama Cabang</label>
                                        <div class="col-sm-9">
                                            <select type="" class="js-example-basic-single form-control custom-select" id="formEditTechnicianSvcbranch" name="formEditTechnicianSvcbranch">
                                                <option value="<?= $technicianDetail['svc_group'] ?>" selected><?= $technicianDetail['svc_group'] ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="formEditTechnicianName" class="col-sm-3 col-form-label col-form-label-sm">Nama Teknisi</label>
                                        <div class="col-sm-9">
                                            <input type="" class="form-control form-control" id="formEditTechnicianName" name="formEditTechnicianName" value="<?= $technicianDetail['name'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="formEditTechnicianPhone1" class="col-sm-3 col-form-label col-form-label-sm">Telepon 1</label>
                                        <div class="col-sm-4">
                                            <input type="" class="form-control form-control" id="formEditTechnicianPhone1" name="formEditTechnicianPhone1" value="<?= $technicianDetail['phone1'] ?>">
                                        </div>
                                        <div class="col-sm-4">
                                            <select class="custom-select" name="formEditTechnicianPhone1Remark" id="formEditTechnicianPhone1Remark">
                                                <option value="<?= $technicianDetail['phone1_remark'] ?>" selected><?= $technicianDetail['phone1_remark'] ?></option>
                                                <option value="">-</option>
                                                <option value="Call & Whatsapp">Call & Whatsapp</option>
                                                <option value="Call only">Call only</option>
                                                <option value="Whatsapp only">Whatsapp only</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="formEditTechnicianPhone2" class="col-sm-3 col-form-label col-form-label-sm">Telepon 2</label>
                                        <div class="col-sm-4">
                                            <input type="" class="form-control form-control" id="formEditTechnicianPhone2" name="formEditTechnicianPhone2" value="<?= $technicianDetail['phone2'] ?>">
                                        </div>
                                        <div class="col-sm-4">
                                            <select class="custom-select" name="formEditTechnicianPhone2Remark" id="formEditTechnicianPhone2Remark">
                                                <option value="<?= $technicianDetail['phone2_remark'] ?>" selected><?= $technicianDetail['phone2_remark'] ?></option>
                                                <option value="">-</option>
                                                <option value="Call & Whatsapp">Call & Whatsapp</option>
                                                <option value="Call only">Call only</option>
                                                <option value="Whatsapp only">Whatsapp only</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="formEditTechnicianPhone3" class="col-sm-3 col-form-label col-form-label-sm">Telepon 3</label>
                                        <div class="col-sm-4">
                                            <input type="" class="form-control form-control" id="formEditTechnicianPhone3" name="formEditTechnicianPhone3" value="<?= $technicianDetail['phone3'] ?>">
                                        </div>
                                        <div class="col-sm-4">
                                            <select class="custom-select" name="formEditTechnicianPhone3Remark" id="formEditTechnicianPhone3Remark">
                                                <option value="<?= $technicianDetail['phone3_remark'] ?>" selected><?= $technicianDetail['phone3_remark'] ?></option>
                                                <option value="">-</option>
                                                <option value="Call & Whatsapp">Call & Whatsapp</option>
                                                <option value="Call only">Call only</option>
                                                <option value="Whatsapp only">Whatsapp only</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="formEditTechnicianPhone4" class="col-sm-3 col-form-label col-form-label-sm">Telepon 4</label>
                                        <div class="col-sm-4">
                                            <input type="" class="form-control form-control" id="formEditTechnicianPhone4" name="formEditTechnicianPhone4" value="<?= $technicianDetail['phone4'] ?>">
                                        </div>
                                        <div class="col-sm-4">
                                            <select class="custom-select" name="formEditTechnicianPhone4Remark" id="formEditTechnicianPhone4Remark">
                                                <option value="<?= $technicianDetail['phone4_remark'] ?>" selected><?= $technicianDetail['phone4_remark'] ?></option>
                                                <option value="">-</option>
                                                <option value="Call & Whatsapp">Call & Whatsapp</option>
                                                <option value="Call only">Call only</option>
                                                <option value="Whatsapp only">Whatsapp only</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="formEditTechnicianRemark" class="col-sm-3 col-form-label col-form-label-sm">Remark</label>
                                        <div class="col-sm-9">
                                            <input type="" class="form-control form-control" id="formEditTechnicianRemark" name="formEditTechnicianRemark" value="<?= $technicianDetail['remark'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="formEditTechnicianStatus" class="col-sm-3 col-form-label col-form-label-sm">Status</label>
                                        <div class="col-sm-3">
                                            <div class="pretty p-svg p-curve">
                                                <input type="hidden" name="formEditTechnicianStatus" value="0" checked>
                                                <div class="pretty p-svg p-curve p-toggle">
                                                    <input type="checkbox" name="formEditTechnicianStatus" id="formEditTechnicianStatus" value="1" <?= valToState($technicianDetail['status']) ?>>
                                                    <div class="state p-success p-on">
                                                        <svg class="svg svg-icon" viewBox="0 0 20 20">
                                                            <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                                                        </svg>
                                                        <label>Active</label>
                                                    </div>
                                                    <div class="state p-danger p-danger-o p-off">
                                                        <svg class="svg svg-icon" viewBox="0 0 20 20">
                                                            <path fill="none" d="M15.898,4.045c-0.271-0.272-0.713-0.272-0.986,0l-4.71,4.711L5.493,4.045c-0.272-0.272-0.714-0.272-0.986,0s-0.272,0.714,0,0.986l4.709,4.711l-4.71,4.711c-0.272,0.271-0.272,0.713,0,0.986c0.136,0.136,0.314,0.203,0.492,0.203c0.179,0,0.357-0.067,0.493-0.203l4.711-4.711l4.71,4.711c0.137,0.136,0.314,0.203,0.494,0.203c0.178,0,0.355-0.067,0.492-0.203c0.273-0.273,0.273-0.715,0-0.986l-4.711-4.711l4.711-4.711C16.172,4.759,16.172,4.317,15.898,4.045z" style="stroke: white;fill:white;"></path>
                                                        </svg>
                                                        <i class="icon mdi mdi-close"></i>
                                                        <label>Not active</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="<?= base_url('technician/index') ?>"><button type="button" class="btn btn-secondary" id="formEditTechnicianCancel">Cancel</button></a>
                                    <button type="reset" class="btn btn-warning">Reset</button>
                                    <button type="submit" class="btn btn-primary" name="formEditTechnicianSubmit" id="formEditTechnicianSubmit">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

