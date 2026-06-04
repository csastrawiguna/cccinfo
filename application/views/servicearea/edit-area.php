<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
            <?php
                $allowedAccess = [1, 9];
            ?>

            <div class="card card-outline card-info">
                <div class="card-header">
                    <span class="h6 text-primary">Edit data Service Area</span>
                    <div class="card-tools">
                        <a href="<?= base_url('servicearea/index') ?>" class="mr-3 text-info"><i class="fas fa-arrow-circle-left"></i> Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="col-sm-10 px-4" style="min-width: 810px;">
                            <input type="hidden" class="form-control" id="editServiceareaId" name="editServiceareaId" value="<?= $area['id'] ?>">
                            <div class="form-group row">
                                <label for="editServiceareaAddress" class="col-sm-3 col-form-label text-right">Alamat</label>
                                <div class="col-sm-8">
                                    <textarea type="" class="form-control" id="editServiceareaAddress" name="editServiceareaAddress"><?= $area['address'] ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="editServiceareaSubdistrict" class="col-sm-3 col-form-label text-right">Desa / Kelurahan</label>
                                <div class="col-sm-8">
                                    <input type="" class="form-control" id="editServiceareaSubdistrict" name="editServiceareaSubdistrict" value="<?= $area['subdistrict'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="editServiceareaDistrict" class="col-sm-3 col-form-label text-right">Kecamatan</label>
                                <div class="col-sm-8">
                                    <input type="" class="form-control" id="editServiceareaDistrict" name="editServiceareaDistrict" value="<?= $area['district'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="editServiceareaCity" class="col-sm-3 col-form-label text-right">Kota / Kabupaten</label>
                                <div class="col-sm-8">
                                    <input type="" class="form-control" id="editServiceareaCity" name="editServiceareaCity" value="<?= $area['city'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="editServiceareaProvince" class="col-sm-3 col-form-label text-right">Provinsi</label>
                                <div class="col-sm-8">
                                    <select class="custom-select js-example-basic-single" id="editServiceareaProvince" name="editServiceareaProvince">
                                        <option value="<?= $area['province'] ?>" selected><?= $area['province'] ?></option>
                                        <option value="">- pilih provinsi -</option>
                                        <option value="DKI JAKARTA">DKI JAKARTA</option>
                                        <option value="BANTEN">BANTEN</option>
                                        <option value="JAWA BARAT">JAWA BARAT</option>
                                        <option value="JAWA TENGAH">JAWA TENGAH</option>
                                        <option value="JAWA TIMUR">JAWA TIMUR</option>
                                        <option value="DI YOGYAKARTA">DI YOGYAKARTA</option>
                                        <option value="BALI">BALI</option>
                                        <option value="NUSA TENGGARA BARAT">NUSA TENGGARA BARAT</option>
                                        <option value="NUSA TENGGARA TIMUR">NUSA TENGGARA TIMUR</option>
                                        <option value="BANGKA BELITUNG">BANGKA BELITUNG</option>
                                        <option value="BENGKULU">BENGKULU</option>
                                        <option value="JAMBI">JAMBI</option>
                                        <option value="KEPULAUAN RIAU">KEPULAUAN RIAU</option>
                                        <option value="LAMPUNG">LAMPUNG</option>
                                        <option value="NAGROE ACEH DARUSSALAM">NAGROE ACEH DARUSSALAM</option>
                                        <option value="RIAU">RIAU</option>
                                        <option value="SUMATERA SELATAN">SUMATERA SELATAN</option>
                                        <option value="SUMATERA BARAT">SUMATERA BARAT</option>
                                        <option value="SUMATERA UTARA">SUMATERA UTARA</option>
                                        <option value="KALIMANTAN BARAT">KALIMANTAN BARAT</option>
                                        <option value="KALIMANTAN SELATAN">KALIMANTAN SELATAN</option>
                                        <option value="KALIMANTAN TENGAH">KALIMANTAN TENGAH</option>
                                        <option value="KALIMANTAN TIMUR">KALIMANTAN TIMUR</option>
                                        <option value="KALIMANTAN UTARA">KALIMANTAN UTARA</option>
                                        <option value="SULAWESI BARAT">SULAWESI BARAT</option>
                                        <option value="SULAWESI SELATAN">SULAWESI SELATAN</option>
                                        <option value="SULAWESI TENGAH">SULAWESI TENGAH</option>
                                        <option value="SULAWESI TENGGARA">SULAWESI TENGGARA</option>
                                        <option value="SULAWESI UTARA">SULAWESI UTARA</option>
                                        <option value="GORONTALO">GORONTALO</option>
                                        <option value="MALUKU">MALUKU</option>
                                        <option value="MALUKU UTARA">MALUKU UTARA</option>
                                        <option value="PAPUA">PAPUA</option>
                                        <option value="PAPUA BARAT">PAPUA BARAT</option>
                                        <option value="PAPUA BARAT DAYA">PAPUA BARAT DAYA</option>
                                        <option value="PAPUA PEGUNUNGAN">PAPUA PEGUNUNGAN</option>
                                        <option value="PAPUA SELATAN">PAPUA SELATAN</option>
                                        <option value="PAPUA TENGAH">PAPUA TENGAH</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="editServiceareaPostalcode" class="col-sm-3 col-form-label text-right">Kode Pos</label>
                                <div class="col-sm-2">
                                    <input type="" class="form-control" id="editServiceareaPostalcode" name="editServiceareaPostalcode" value="<?= $area['postal_code'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="editServiceareaUnderservice" class="col-sm-3 col-form-label text-right">Service Center</label>
                                <div class="col-sm-8">
                                    <select class="js-example-basic-single custom-select" id="editServiceareaUnderservice" name="editServiceareaUnderservice">
                                        <option value="<?= $area['under_svc'] ?>" selected><?= $area['under_svc'] ?></option>
                                        <option value=""><em class="text-secondary">- pilih service center -</em></option>
                                        <?php foreach($allSvccenter as $row) : ?>
                                            <option value="<?= $row['svc_name'] ?>"><?= $row['svc_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="editServiceareaNotiftype" class="col-sm-3 col-form-label text-right">Laporan</label>
                                <div class="col-sm-3">
                                    <select class="custom-select" name="editServiceareaNotiftype" id="editServiceareaNotiftype">
                                        <option value="<?= $area['notif_type'] ?>" selected><?= $area['notif_type'] ?></option>
                                        <option value="SAP">SAP</option>
                                        <option value="Web">Web</option>
                                    </select>
                                </div>
                                <label for="editServiceareaSapcode" class="col-sm-3 col-form-label text-right">Kode SAP</label>
                                <div class="col-sm-2">
                                    <input class="form-control" name="editServiceareaSapcode" id="editServiceareaSapcode" value="<?= $area['sap_code'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="editServiceareaRemark" class="col-sm-3 col-form-label text-right">Catatan</label>
                                <div class="col-sm-8">
                                    <input type="" class="form-control" id="editServiceareaRemark" name="editServiceareaRemark" value="<?= $area['remark'] ?>">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label text-right"></label>
                                <div class="col-sm-8">
                                    <button type="submit" class="btn btn-info px-4">Save</button>
                                    <button type="reset" class="btn btn-outline-warning">Reset form</button>
                                    <a href="<?= base_url('servicearea/index') ?>"><button type="button" class="btn btn-outline-secondary">Cancel</button></a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>