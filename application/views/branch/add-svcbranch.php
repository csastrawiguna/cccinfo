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
                        <span class="h6 text-primary">Edit data Service Center Cabang, SDSS, SSR, SASS</span>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="col-sm-10 px-4" style="min-width: 810px;">
                                <div class="form-group row">
                                    <label for="addServiceType" class="col-sm-2 col-form-label text-right">Type :</label>
                                    <div class="col-sm-8">
                                        <select class="js-example-basic-single custom-select" id="addServiceType" name="addServiceType">
                                            <option value="">- pilih type -</option>
                                            <option value="BRANCH">Cabang/Branch</option>
                                            <option value="SDSS">SDSS</option>
                                            <option value="SSR">SSR</option>
                                            <option value="SASS">SASS</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="addServiceName" class="col-sm-2 col-form-label text-right">Cabang service :</label>
                                    <div class="col-sm-8">
                                        <input type="" class="form-control" id="addServiceName" name="addServiceName" placeholder="Contoh: Medan, atau SDSS Bekasi, atau SASS Berkat Service (Cideng)">
                                        <small class="ml-2 text-muted"><em>SDSS, SSR, SASS ditambah di depan nama</em></small>
                                    </div>
                                </div>
                                <div class="form-group row" style="display: none;">
                                    <label for="addServiceNameGroup" class="col-sm-2 col-form-label text-right">Service Group :</label>
                                    <div class="col-sm-8">
                                        <input type="" class="form-control" id="addServiceNameGroup" name="addServiceNameGroup" placeholder="Khusus SASS, contoh: SASS Berkat Service">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="addServiceAddress" class="col-sm-2 col-form-label text-right">Alamat :</label>
                                    <div class="col-sm-8">
                                        <input type="" class="form-control" id="addServiceAddress" name="addServiceAddress">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="addServicePhone1" class="col-sm-2 col-form-label text-right">Telepon 1 :</label>
                                    <div class="col-sm-4">
                                        <input type="" class="form-control" id="addServicePhone1" name="addServicePhone1">
                                    </div>
                                    <label for="addServicePhone1" class="col-sm-2 col-form-label text-right">Extention :</label>
                                    <div class="col-sm-2">
                                        <input type="" class="form-control" id="addServiceExtention" name="addServiceExtention">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="addServicePhone2" class="col-sm-2 col-form-label text-right">Telepon 2 :</label>
                                    <div class="col-sm-4">
                                        <input type="" class="form-control" id="addServicePhone2" name="addServicePhone2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="addServicePhone3" class="col-sm-2 col-form-label text-right">Telepon 3 :</label>
                                    <div class="col-sm-4">
                                        <input type="" class="form-control" id="addServicePhone3" name="addServicePhone3">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="addServicePhone4" class="col-sm-2 col-form-label text-right">Telepon 4 :</label>
                                    <div class="col-sm-4">
                                        <input type="" class="form-control" id="addServicePhone4" name="addServicePhone4">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="addServiceEmail" class="col-sm-2 col-form-label text-right">Email :</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" id="addServiceEmail" name="addServiceEmail" rows="2"></textarea>
                                        <small class="ml-2 text-muted"><em>Jika lebih dari 1 email, gunakan separator semicolon (';')</em></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="addServiceUnderbranch" class="col-sm-2 col-form-label text-right">Under Branch :</label>
                                    <div class="col-sm-3">
                                        <select class="js-example-basic-single custom-select" name="addServiceUnderbranch">
                                            <option value="">- pilih Cabang -</option>
                                            <?php foreach($allUnderBranch as $row) : ?>
                                                <option value="<?= $row['under_branch'] ?>"><?= $row['under_branch'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <label for="addServiceRegion" class="col-sm-2 col-form-label text-right">Region :</label>
                                        <div class="col-sm-3">
                                            <select class="js-example-basic-single custom-select" name="addServiceRegion">
                                                <option value="">- pilih Region -</option>
                                                <?php foreach($allRegion as $row) : ?>
                                                    <option value="<?= $row['region'] ?>"><?= $row['region'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="addServiceSapcode" class="col-sm-2 col-form-label text-right">Kode SAP :</label>
                                    <div class="col-sm-3">
                                        <input type="" class="form-control" id="addServiceSapcode" name="addServiceSapcode">
                                    </div>
                                    <label for="addServiceTimezone" class="col-sm-2 col-form-label text-right">Zona waktu :</label>
                                    <div class="col-sm-3">
                                        <select class="custom-select" id="addServiceTimezone" name="addServiceTimezone">
                                            <option value="">- pilih Zona waktu -</option>
                                            <option value="WIB">WIB</option>
                                            <option value="WITA">WITA</option>
                                            <option value="WIT">WIT</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="addServiceRemark" class="col-sm-2 col-form-label text-right">Remark :</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" id="addServiceRemark" name="addServiceRemark">
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
    </div>
</div>
