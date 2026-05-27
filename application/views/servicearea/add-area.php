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
                    <span class="h6 text-primary">Tambah data Service Area</span>
                    <div class="card-tools">
                        <a href="<?= base_url('servicearea/index') ?>" class="mr-3 text-info"><i class="fas fa-arrow-circle-left"></i> Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="col-sm-10 px-4" style="min-width: 810px;">
                            <div class="form-group row">
                                <label for="addServiceareaAddress" class="col-sm-3 col-form-label text-right">Alamat</label>
                                <div class="col-sm-8">
                                    <textarea type="" class="form-control" id="addServiceareaAddress" name="addServiceareaAddress"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="addServiceareaSubdistrict" class="col-sm-3 col-form-label text-right">Desa / Kelurahan</label>
                                <div class="col-sm-8">
                                    <input type="" class="form-control" id="addServiceareaSubdistrict" name="addServiceareaSubdistrict" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="addServiceareaDistrict" class="col-sm-3 col-form-label text-right">Kecamatan</label>
                                <div class="col-sm-8">
                                    <input type="" class="form-control" id="addServiceareaDistrict" name="addServiceareaDistrict" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="addServiceareaCity" class="col-sm-3 col-form-label text-right">Kota / Kabupaten</label>
                                <div class="col-sm-8">
                                    <input type="" class="form-control" id="addServiceareaCity" name="addServiceareaCity" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="addServiceareaProvince" class="col-sm-3 col-form-label text-right">Provinsi</label>
                                <div class="col-sm-8">
                                    <select class="custom-select" id="addServiceareaProvince" name="addServiceareaProvince">
                                        <option value="">- pilih provinsi -</option>
                                        <option value="DKI Jakarta">DKI Jakarta</option>
                                        <option value="Banten">Banten</option>
                                        <option value="Jawa Barat">Jawa Barat</option>
                                        <option value="Jawa Tengah">Jawa Tengah</option>
                                        <option value="Jawa Timur">Jawa Timur</option>
                                        <option value="DI Yogyakarta">DI Yogyakarta</option>
                                        <option value="Bali">Bali</option>
                                        <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                                        <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                                        <option value="Bangka Belitung">Bangka Belitung</option>
                                        <option value="Bengkulu">Bengkulu</option>
                                        <option value="Jambi">Jambi</option>
                                        <option value="Kep. Riau">Kep. Riau</option>
                                        <option value="Lampung">Lampung</option>
                                        <option value="NAD">Nangroe Aceh Darussalam</option>
                                        <option value="Riau">Riau</option>
                                        <option value="Sumatera Selatan">Sumatera Selatan</option>
                                        <option value="Sumatera Barat">Sumatera Barat</option>
                                        <option value="Sumatera Utara">Sumatera Utara</option>
                                        <option value="Kalimantan Barat">Kalimantan Barat</option>
                                        <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                                        <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                                        <option value="Kalimantan Timur">Kalimantan Timur</option>
                                        <option value="Kalimantan Utara">Kalimantan Utara</option>
                                        <option value="Sulawesi Barat">Sulawesi Barat</option>
                                        <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                                        <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                                        <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                                        <option value="Sulawesi Utara">Sulawesi Utara</option>
                                        <option value="Gorontalo">Gorontalo</option>
                                        <option value="Maluku">Maluku</option>
                                        <option value="Maluku Utara">Maluku Utara</option>
                                        <option value="Papua">Papua</option>
                                        <option value="Papua Barat">Papua Barat</option>
                                        <option value="Papua Barat Daya">Papua Barat Daya</option>
                                        <option value="Papua Pegunungan">Papua Pegunungan</option>
                                        <option value="Papua Selatan">Papua Selatan</option>
                                        <option value="Papua Tengah">Papua Tengah</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="addServiceareaPostalcode" class="col-sm-3 col-form-label text-right">Kode Pos</label>
                                <div class="col-sm-2">
                                    <input type="" class="form-control" id="addServiceareaPostalcode" name="addServiceareaPostalcode" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="addServiceareaUnderservice" class="col-sm-3 col-form-label text-right">Service Center</label>
                                <div class="col-sm-8">
                                    <select class="js-example-basic-single custom-select" id="addServiceareaUnderservice" name="addServiceareaUnderservice">
                                        <option value=""><em class="text-secondary">- pilih service center -</em></option>
                                        <?php foreach($allSvccenter as $row) : ?>
                                            <option value="<?= $row['svc_name'] ?>"><?= $row['svc_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="addServiceareaNotiftype" class="col-sm-3 col-form-label text-right">Laporan</label>
                                <div class="col-sm-3">
                                    <select class="custom-select" name="addServiceareaNotiftype" id="addServiceareaNotiftype">
                                        <option value="">- pilih type notif -</option>
                                        <option value="SAP">SAP</option>
                                        <option value="Web">Web</option>
                                    </select>
                                </div>
                                <label for="addServiceareaSapcode" class="col-sm-3 col-form-label text-right">Kode SAP</label>
                                <div class="col-sm-2">
                                    <input class="form-control" name="addServiceareaSapcode" id="addServiceareaSapcode" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="addServiceareaRemark" class="col-sm-3 col-form-label text-right">Catatan</label>
                                <div class="col-sm-8">
                                    <input type="" class="form-control" id="addServiceareaRemark" name="addServiceareaRemark" value="">
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