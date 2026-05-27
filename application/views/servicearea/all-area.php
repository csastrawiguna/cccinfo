<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
            <style>
                /* Nyumputkeun tombol sacara default */
                .table td button {
                    opacity: 0;
                    transition: opacity 0.2s ease-in-out;
                }

                /* Munculkeun tombol pas cell atanapi baris di-hover */
                .table tr:hover td button {
                    opacity: 1;
                }
            </style>
            
            <?php
                $allowedAccess = ['1', '9'];
            ?>
            
            <div class="row">
                <div class="col">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <span class="h6 text-primary">Cakupan area servis seluruh wilayah NKRI</span>
                            <div class="card-tools">
                                <button type="button" id="btnResetFilter" class="btn btn-sm btn-outline-warning mr-3">
                                    <i class="fas fa-sync"></i> Reset Filter
                                </button>
                                <?php if (in_array($this->session->userdata('useraccess'), $allowedAccess)) : ?>
                                    <a href="<?= base_url('servicearea/add') ?>" class="mr-4 text-info"><i class="fas fa-plus-circle"></i> Tambah area <i class="fas fa-map-marked"></i></a>
                                    <a href="<?= base_url('servicearea/editarea') ?>" class="mr-4 text-info"><i class="fas fa-edit"></i> Edit Multiple <i class="fas fa-layer-group"></i></a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tableServiceAreaServerside" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Alamat</th>
                                            <th>Kelurahan</th>
                                            <th>Kecamatan</th>
                                            <th>Kota/Kab</th>
                                            <th>Provinsi</th>
                                            <th>Kode Pos</th>
                                            <th>Remark</th>
                                            <th>Area Servis</th>
                                            <th>...</th>
                                        </tr>
                                        <tr class="search-row">
                                            <th></th>
                                            <th>Alamat</th>
                                            <th>Kelurahan</th>
                                            <th>Kecamatan</th>
                                            <th>Kota/Kab</th>
                                            <th>Provinsi</th>
                                            <th>Kode P</th>
                                            <th>Remark</th>
                                            <th>Area Servis</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal add service area -->
<div class="modal fade" id="modalAddServicearea">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah data manual</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="addServiceareaId" id="addServiceareaId">
                    <div class="form-group row">
                        <label for="addServiceareaAddress" class="col-sm-2 col-form-label-sm-sm">Alamat</label>
                        <div class="col-sm-10">
                            <input type="" class="form-control" id="addServicearea" name="addServicearea">
                        </div>
                    </div>                    
                    <div class="form-group row">
                        <label for="addServiceareaSubdistrict" class="col-sm-2 col-form-label-sm">Kelurahan</label>
                        <div class="col-sm-10">
                            <input type="" class="form-control" id="addServiceareaSubdistrict" name="addServiceareaSubdistrict">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="addServiceareaDistrict" class="col-sm-2 col-form-label-sm">Kecamatan</label>
                        <div class="col-sm-10">
                            <input type="" class="form-control" id="addServiceareaDistrict" name="addServiceareaDistrict">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="addServiceareaCity" class="col-sm-2 col-form-label-sm">Kota/Kab</label>
                        <div class="col-sm-10">
                            <input type="" class="form-control" id="addServiceareaCity" name="addServiceareaCity">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="addServiceareaProvince" class="col-sm-2 col-form-label-sm">Provinsi</label>
                        <div class="col-sm-10">
                            <input type="" class="form-control" id="addServiceareaProvince" name="addServiceareaProvince">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="addServiceareaUnderservice" class="col-sm-2 col-form-label-sm">SVC center</label>
                        <div class="col-sm-10">
                            <select class="form-control custom-select" id="addServiceareaUnderservice" name="addServiceareaUnderservice">
                                <option value="">- pilih SVC center -</option>
                                <?php foreach($allSvccenter as $row) : ?>
                                    <option value="<?= $row['svc_name'] ?>"><?= $row['svc_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group row">
                                <label for="addServiceareaNotiftype" class="col-sm-4 col-form-label-sm">Notif</label>
                                <div class="col-sm-8">
                                    <select class="form-control custom-select" id="addServiceareaNotiftype" name="addServiceareaNotiftype">
                                        <option value="">- pilih -</option>
                                        <option value="SAP">SAP</option>
                                        <option value="Web">Web (CSMS)</option>
                                    </select>                                    
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                <label for="addServiceareaSapcode" class="col-sm-5 col-form-label-sm">Kode SAP</label>
                                <div class="col-sm-7">
                                    <input type="" class="form-control" id="addServiceareaSapcode" name="addServiceareaSapcode">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="addServiceareaRemark" class="col-sm-2 col-form-label-sm">Keterangan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="addServiceareaRemark" name="addServiceareaRemark">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary px-4" id="addServiceareaReset">Reset</button>
                    <button type="submit" class="btn btn-primary px-4" id="addServiceareaSubmit" name="addServiceareaSubmit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>