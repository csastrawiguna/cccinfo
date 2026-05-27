<div class="content-wrapper">
    <div class="container-fluid pt-2 px-3">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
        <?php 
            function ifsass($row) {
                if($row['svc_type'] == 'SASS') {
                    return 'SASS ' . $row['svc_name'];
                } else {
                    return $row['svc_name'];
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
        
        <div class="card card-info card-outline">
            <div class="card-header">
                <span class="h6 text-primary">Edit data Service Center Cabang, SDSS, SSR, SASS</span>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="col-sm-10 px-4" style="min-width: 810px;">
                        <input type="hidden" class="form-control" id="editServiceId" name="editServiceId" value="<?= $detailServiceCenter['id'] ?>">
                        <div class="form-group row">
                            <label for="editServiceType" class="col-sm-2 col-form-label text-right">Type :</label>
                            <div class="col-sm-8">
                                <select class="js-example-basic-single custom-select" id="editServiceType" name="editServiceType">
                                    <option value="<?= $detailServiceCenter['svc_type'] ?>" selected><?= $detailServiceCenter['svc_type'] ?></option>
                                    <option value="">- pilih type -</option>
                                    <option value="BRANCH">Cabang/Branch</option>
                                    <option value="SDSS">SDSS</option>
                                    <option value="SSR">SSR</option>
                                    <option value="SASS">SASS</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="editServiceName" class="col-sm-2 col-form-label text-right">Cabang service :</label>
                            <div class="col-sm-8">
                                <input type="" class="form-control" id="editServiceName" name="editServiceName" value="<?= $detailServiceCenter['svc_name'] ?>">
                                <small class="ml-2 text-muted"><em>SDSS, SSR, SASS ditambah di depan nama</em></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="editServiceNameGroup" class="col-sm-2 col-form-label text-right">Service Group :</label>
                            <div class="col-sm-8">
                                <input type="" class="form-control" id="editServiceNameGroup" name="editServiceNameGroup" value="<?= $detailServiceCenter['svc_name_group'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="editServiceAddress" class="col-sm-2 col-form-label text-right">Alamat :</label>
                            <div class="col-sm-8">
                                <input type="" class="form-control" id="editServiceAddress" name="editServiceAddress" value="<?= $detailServiceCenter['address'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="editServicePhone1" class="col-sm-2 col-form-label text-right">Telepon 1 :</label>
                            <div class="col-sm-4">
                                <input type="" class="form-control" id="editServicePhone1" name="editServicePhone1" value="<?= $detailServiceCenter['phone1'] ?>">
                            </div>
                            <label for="editServicePhone1" class="col-sm-2 col-form-label text-right">Extention :</label>
                            <div class="col-sm-2">
                                <input type="" class="form-control" id="editServiceExtention" name="editServiceExtention" value="<?= $detailServiceCenter['phone_ext'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="editServicePhone2" class="col-sm-2 col-form-label text-right">Telepon 2 :</label>
                            <div class="col-sm-4">
                                <input type="" class="form-control" id="editServicePhone2" name="editServicePhone2" value="<?= $detailServiceCenter['phone2'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="editServicePhone3" class="col-sm-2 col-form-label text-right">Telepon 3 :</label>
                            <div class="col-sm-4">
                                <input type="" class="form-control" id="editServicePhone3" name="editServicePhone3" value=<?= $detailServiceCenter['phone3'] ?>>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="editServicePhone4" class="col-sm-2 col-form-label text-right">Telepon 4 :</label>
                            <div class="col-sm-4">
                                <input type="" class="form-control" id="editServicePhone4" name="editServicePhone4" value="<?= $detailServiceCenter['phone4'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="editServiceEmail" class="col-sm-2 col-form-label text-right">Email :</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" id="editServiceEmail" name="editServiceEmail" rows="2"><?= $detailServiceCenter['email'] ?></textarea>
                                <small class="ml-2 text-muted"><em>Jika lebih dari 1 email, gunakan separator semicolon (';')</em></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="editServiceUnderbranch" class="col-sm-2 col-form-label text-right">Under Branch :</label>
                            <div class="col-sm-3">
                                <select class="js-example-basic-single custom-select" name="editServiceUnderbranch">
                                    <option value="<?= $detailServiceCenter['under_branch'] ?>" selected><?= $detailServiceCenter['under_branch'] ?></option>
                                    <option value="">- pilih Cabang -</option>
                                    <?php foreach($allUnderBranch as $row) : ?>
                                        <option value="<?= $row['under_branch'] ?>"><?= $row['under_branch'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <label for="editServiceRegion" class="col-sm-2 col-form-label text-right">Region :</label>
                            <div class="col-sm-3">
                                <select class="custom-select" name="editServiceRegion">
                                    <option value="<?= $detailServiceCenter['region'] ?>" selected><?= $detailServiceCenter['region'] ?></option>
                                    <option value="">- pilih Region -</option>
                                    <?php foreach($allRegion as $row) : ?>
                                        <option value="<?= $row['region'] ?>"><?= $row['region'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="editServiceSapcode" class="col-sm-2 col-form-label text-right">Kode SAP :</label>
                            <div class="col-sm-3">
                                <input type="" class="form-control" id="editServiceSapcode" name="editServiceSapcode" value="<?= $detailServiceCenter['sap_code'] ?>">
                            </div>
                            <label for="" class="col-sm-2 col-form-label text-right">Status :</label>
                            <div class="col-sm-2">
                                <div class="pretty p-svg p-curve">
                                    <input type="hidden" name="editServiceStatus" value="inactive" checked>
                                    <div class="pretty p-svg p-curve p-toggle">
                                        <input type="checkbox" name="editServiceStatus" id="editServiceStatus" value="active" <?= valToState($detailServiceCenter['status']) ?>>
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
                        <div class="form-group row">
                            <label for="editServiceTimezone" class="col-sm-2 col-form-label text-right">Zona waktu :</label>
                            <div class="col-sm-2">
                                <select class="custom-select" id="editServiceTimezone" name="editServiceTimezone">
                                    <option value="<?= $detailServiceCenter['timezone'] ?>" selected><?= $detailServiceCenter['timezone'] ?></option>
                                    <option value="">- pilih -</option>
                                    <option value="WIB">WIB</option>
                                    <option value="WITA">WITA</option>
                                    <option value="WIT">WIT</option>
                                </select>
                            </div>
                            <label for="editServiceSvchead" class="col-sm-2 col-form-label text-right">SVC head :</label>
                            <div class="col-sm-4">
                                <select class="js-example-basic-single custom-select" id="editServiceSvchead" name="editServiceSvchead">
                                    <option value="<?= $detailServiceCenter['head_id'] ?>" selected><?= $detailServiceCenter['head_name'] ?></option>
                                    <?php foreach($allTechnician as $row) : ?>
                                        <option value="<?= $row['technician_id'] ?>"><?= $row['svc_group'] . ' - ' . $row['technician_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="editServiceRemark" class="col-sm-2 col-form-label text-right">Remark :</label>
                            <div class="col-sm-8">
                                <input class="form-control" id="editServiceRemark" name="editServiceRemark" value="<?= $detailServiceCenter['remark'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label text-right"></label>
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-info px-4">Save</button>
                                <button type="reset" class="btn btn-outline-warning">Reset form</button>
                                <a href="<?= base_url('branch/index') ?>"><button type="button" class="btn btn-outline-secondary">Cancel</button></a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
