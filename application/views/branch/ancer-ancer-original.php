<div class="content-wrapper">
    <div class="container-fluid pt-2">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
        <?php 
            function ifsass($row) {
                if($row['svc_type'] == 'SASS') {
                    return 'SASS ' . $row['svc_name'];
                } else {
                    return $row['svc_name'];
                }
            }
        ?>
        <div class="row">
            <div class="col">
                <div class="card card-info card-outline">
                  <div class="card-header">
                    <h6 class="h6 text-primary">Ancer-ancer Service Center</h6>
                  </div>
                  <div class="card-body">
                    <h5 class="lead text-center">On progress</h5>                        
                  </div>
                  <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalDetailServiceCenter" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalDetailServiceCenterLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form action="" method="POST">
                <div class="modal-header">
                    <h6 class="modal-title text-info h6" id="modalDetailServiceCenterTitle"></h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!-- <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/profile/noicon_branch.png') ?>" class="img" width="160">
                        </div> -->
                        <div class="col-sm px-4">                            
                            <form>
                                <input type="hidden" class="form-control" id="categoryId" name="categoryId" readonly>
                                <div class="form-group row">
                                    <label for="categoryPeriod" class="col-sm-3 col-form-label">Cabang service</label>
                                    <div class="col-sm-9">
                                        <input type="" class="form-control text-info text-bold" id="modalDetailServiceCenterBranch" name="modalDetailServiceCenterBranch" readonly="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="categoryPeriod" class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <textarea type="" class="form-control" id="modalDetailServiceCenterAddress" name="modalDetailServiceCenterAddress" readonly=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="categoryPeriod" class="col-sm-3 col-form-label">Telepon</label>
                                    <div class="col-sm-9">
                                        <input type="" class="form-control" id="modalDetailServiceCenterPhone" name="modalDetailServiceCenterPhone" readonly="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="categoryPeriod" class="col-sm-3 col-form-label">Extention</label>
                                    <div class="col-sm-9">
                                        <input type="" class="form-control" id="modalDetailServiceCenterPhoneext" name="modalDetailServiceCenterPhoneext" readonly="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="categoryPeriod" class="col-sm-3 col-form-label">Service head</label>
                                    <div class="col-sm-9">
                                        <input type="" class="form-control" id="modalDetailServiceCenterHeadname" name="modalDetailServiceCenterHeadname" readonly="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="categoryPeriod" class="col-sm-3 col-form-label">Telp SVC head</label>
                                    <div class="col-sm-9">
                                        <input type="" class="form-control" id="modalDetailServiceCenterHeadphone" name="modalDetailServiceCenterHeadphone" readonly="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="categoryPeriod" class="col-sm-3 col-form-label">Kode SAP</label>
                                    <div class="col-sm-9">
                                        <input type="" class="form-control" id="modalDetailServiceCenterSapcode" name="modalDetailServiceCenterSapcode" readonly="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="categoryPeriod" class="col-sm-3 col-form-label">Under Branch</label>
                                    <div class="col-sm-9">
                                        <input type="" class="form-control" id="modalDetailServiceCenterUnderbranch" name="modalDetailServiceCenterUnderbranch" readonly="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="categoryPeriod" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <textarea type="" class="form-control" id="modalDetailServiceCenterEmail" name="modalDetailServiceCenterEmail" readonly="" rows="4"><code></code></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <!-- <button type="submit" class="btn btn-primary" id="addSingleScheduleAcinstallSubmit" name="addSingleScheduleAcinstallSubmit">Save</button> -->
                </div>
            </form>
        </div>
    </div>
</div>