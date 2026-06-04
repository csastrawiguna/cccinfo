<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>

            <style type="text/css">
                .itemList {
                    border: 1px rgba(105,205,215,0.5) solid;
                    /*box-shadow: 0px 1px rgba(195, 230, 230, 1);*/
                    height: 40px;
                    margin: 8px 8px;
                    max-width: 270px;
                    min-width: 260px;
                    display: inline-flex;
                    align-items: center;
                    padding: 3px 5px 3px 0px;
                    color: #213344;
                    border-radius: 5px;
                    background-color: rgba(195, 230, 230, 0.2);
                }

                .avatar {
                    height: 20px;
                    line-height: 20px;
                    font-size: 12px;
                    width: 20px;
                    border-radius: 2%;
                    background-color: #17A2B8;
                    color: white;
                    text-align: center;
                }

                .groupContainer {
                    margin: 10px;
                    min-height: 40px;
                    border: 1px rgba(105, 200, 190, 0.3) solid;
                    border-radius: 4px;
                    background-color: rgba(195, 200, 190, 0.1);
                }

                #allunallocated{
                    min-height: 40px;
                }
            </style>

            <?php
                $allowedAccess = [1, 9];
            ?>

            <div class="card card-outline card-info">
                <div class="card-header">
                    <span class="h6 text-primary">Edit data Multiple Service Area</span>
                    <div class="card-tools">
                        <a href="<?= base_url('servicearea/index') ?>" class="mr-3 text-info"><i class="fas fa-arrow-circle-left"></i> Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-sm-7 px-4">
                                <div class="card-header">
                                    <span class="h5">Pilih berdasarkan Kode Pos - Provinsi - Kota/Kab - Kecamatan</span>
                                </div>
                                <div class="card-body">  
                                    <div class="form-group">
                                        <label for="editServiceAreaNewPostalcode">Kode Pos</label>
                                        <div class="row">
                                            <div class="col-sm-2 mr-0">
                                                <input type="" class="form-control" id="editServiceAreaNewPostalcode" name="editServiceAreaNewPostalcode">
                                            </div>
                                            <div class="col-sm-4 px-0 ml-0">
                                                <button type="button" id="buttonSearchByPostalcode" class=" btn btn-outline-info"><i class="fas fa-search"></i></button>
                                                <small class="text-info">Cari dari kode pos</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="editServiceAreaNewProvince">Provinsi</label>
                                        <select class="custom-select js-example-basic-single" id="editServiceAreaNewProvince" name="editServiceAreaNewProvince">
                                            <option value="">- pilih provinsi -</option>
                                            <?php foreach($allProvinces as $prov) : ?>
                                                <option value="<?= $prov['province'] ?>"><?= $prov['province'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="editServiceAreaNewCity">Kota/Kabupaten</label>
                                        <select class="custom-select js-example-basic-multiple" id="editServiceAreaNewCity" name="editServiceAreaNewCity[]" multiple="multiple">
                                            <option value="">- pilih kota/kabupaten -</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="editServiceAreaNewDistrict">Kecamatan</label>
                                        <input type="hidden" name="editServiceAreaNewDistrict[]" id="editServiceAreaNewDistrict" value="" checked>
                                        <button type="button" id="buttonEditServiceareaDistrictSelectAll" class="btn btn-sm float-right text-info"><i class="far fa-check-square"></i> Select all</button>
                                        <button type="button" id="buttonEditServiceareaDistrictSelectNone" class="btn btn-sm float-right text-secondary"><i class="far fa-square"></i> Select none</button>
                                        <div class="border border-radius" id="editServiceAreaNewDistrictContainer" style="min-height: 40px;">
                                            <!-- list kecamatan -->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="editServiceAreaNewSubdistrict">Desa/Kelurahan</label>
                                        <input type="hidden" name="editServiceAreaNewSubdistrict[]" id="editServiceAreaNewSubdistrict" value="" checked>
                                        <button type="button" id="buttonEditServiceareaSubdistrictSelectAll" class="btn btn-sm float-right text-info"><i class="far fa-check-square"></i> Select all</button>
                                        <button type="button" id="buttonEditServiceareaSubdistrictSelectNone" class="btn btn-sm float-right text-secondary"><i class="far fa-square"></i> Select none</button>
                                        <div class="border border-radius" id="editServiceAreaNewSubdistrictContainer" style="min-height: 40px;">
                                            <!-- list desa/kelurahan -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-1"></div>
                            <div class="card card-outline card-warning col-sm-4">
                                <div class="card-header">
                                    <span class="h5">Masuk area servis mana</span>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="editServiceAreaNewUnderservice">Cabang/SDSS/SSR</label>
                                        <select class="custom-select js-example-basic-single" id="editServiceAreaNewUnderservice" name="editServiceAreaNewUnderservice">
                                            <option value="">- pilih Cabang/SDSS/SSR -</option>
                                            <?php foreach($allSvccenter as $svc) : ?>
                                                <option value="<?= $svc['svc_name'] ?>"><?= $svc['svc_name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group mt-4">
                                        <label for="editServiceAreaNewNotiftype">Type Notif</label>
                                        <div class="row">
                                            <div class="col-sm mr-2" style="max-width: 80px;">
                                                <div class="pretty p-default p-curve">
                                                    <input type="radio" name="editServiceAreaNewNotiftype" id="editServiceAreaNewNotiftypeSap" value="SAP" required />
                                                    <div class="state p-danger-o">
                                                        <label>SAP</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-2" style="max-width: 80px;">
                                                <div class="pretty p-default p-curve">
                                                    <input type="radio" name="editServiceAreaNewNotiftype" id="editServiceAreaNewNotiftypeWeb" value="Web" required />
                                                    <div class="state p-info-o">
                                                        <label>Web</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mt-4">
                                        <label for="editServiceAreaNewSapcode">Kode SAP</label>
                                        <div class="row">
                                            <div class="col-sm-4 mr-0">
                                                <input type="" class="form-control" id="editServiceAreaNewSapcode" name="editServiceAreaNewSapcode">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="editServiceAreaNewRemark">Remark</label>
                                        <div class="row">
                                            <div class="col-sm mr-0">
                                                <textarea type="" class="form-control" id="editServiceAreaNewRemark" name="editServiceAreaNewRemark"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm">
                                            <button type="submit" class="btn btn-primary px-3"><i class="fas fa-save"></i> Save</button>
                                            <button type="reset" class="btn btn-outline-warning"><i class="fas fa-undo"></i> Reset</button>
                                            <a href="<?= base_url('servicearea/index') ?>"><button type="button" class="btn btn-outline-secondary"><i class="fas fa-times"></i> Cancel</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>