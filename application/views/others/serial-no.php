<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
        
        <div class="container-fluid pt-3">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <span class="text-info">Identifikasi no seri unit, pilih sesuai kategori produk</span>
                    <div class="card-tools">
                        <?php if($this->session->userdata('useraccess') == '9' || $this->session->userdata('useraccess') == '5' ) : ?>
                            <a href="<?= base_url('others/manageserial') ?>" class="mr-3"><i class="fas fa-layer-group"></i> Manage data</a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="btn btn-outline-primary mr-1" id="v-pills-aircon-tab" data-toggle="pill" href="#pills-aircon" type="button" role="tab" aria-controls="pills-aircon" aria-selected="false">Air<br>Conditioner</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="btn btn-outline-primary mr-1" id="v-pills-tvLocal-tab" data-toggle="pill" href="#pills-tvLocal" type="button" role="tab" aria-controls="pills-tvLocal" aria-selected="false">TV & LCD<br>Lokal & Impor</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="btn btn-outline-primary mr-1" id="v-pills-reffLocal-tab" data-toggle="pill" href="#pills-reffLocal" type="button" role="tab" aria-controls="pills-reffLocal" aria-selected="false">Reff<br>Lokal & Impor</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="btn btn-outline-primary mr-1" id="v-pills-showcase-tab" data-toggle="pill" href="#pills-showcase" type="button" role="tab" aria-controls="pills-showcase" aria-selected="false">Showcase/<br>Chest freezer</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="btn btn-outline-primary mr-1" id="v-pills-dispenser-tab" data-toggle="pill" href="#pills-dispenser" type="button" role="tab" aria-controls="pills-dispenser" aria-selected="false">Water<br>Dispenser</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="btn btn-outline-primary mr-1" id="v-pills-wmLocal-tab" data-toggle="pill" href="#pills-wmLocal" type="button" role="tab" aria-controls="pills-wmLocal" aria-selected="false">WM<br>lokal (SEID)</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="btn btn-outline-primary mr-1" id="v-pills-wmImportSatl-tab" data-toggle="pill" href="#pills-wmImportSatl" type="button" role="tab" aria-controls="pills-wmImportSatl" aria-selected="false">WM SATL/<br>Pensonic/Whirpool</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="btn btn-outline-primary mr-1" id="v-pills-wmImportVestel-tab" data-toggle="pill" href="#pills-wmImportVestel" role="tab" aria-controls="v-pills-wmImportVestel" aria-selected="false">WM FL<br>Vestel (Turki)</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-aircon" role="tabpanel" aria-labelledby="pills-aircon-tab">
                            <div class="row mt-5">
                                <div class="col">
                                    <p class="h5 text-indigo mb-3">Nomor seri AC Split (SATL & Gree) - 7/8/9 digit</p>
                                    <img src="<?= base_url('files/sn/sn_aircon.png') ?>" class="img img-fluid w-100">
                                </div>
                                <div class="col">
                                    <p class="h5 text-indigo mb-3">Nomor seri AC lokal - 14 digit</p>
                                    <img src="<?= base_url('files/sn/sn_aircon_local.png') ?>" class="img img-fluid w-100">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="h5 text-indigo mt-5 mb-2">Daftar kode model pada no. seri AC lokal</p>
                                    <table class="table table-sm table-bordered table-hover" id="tableSerialAircon">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th class="text-center">5 digit pertama SN</th>
                                                <th>Model</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $a = 1; ?>
                                            <?php foreach ($allSerialNumberCode as $row) : ?>      
                                                <?php if ($row['category'] == 'AIR CONDITIONER') : ?>
                                                    <tr>
                                                        <td><?= $a++ ?></td>
                                                        <td class="text-center"><?= $row['first_code'] ?></td>
                                                        <td><?= $row['model'] ?></td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-tvLocal" role="tabpanel" aria-labelledby="pills-tvLocal-tab">
                            <div class="row mt-5">
                                <div class="col-7">
                                    <p class="h5 text-indigo mb-3">Nomor seri TV lokal (CTV & LCD/LED TV) - 13/14 digit</p>
                                    <img src="<?= base_url('files/sn/sn_tv_local.png') ?>" class="img img-fluid w-100">
                                </div>
                                <div class="col-1"></div>
                                <div class="col-4">
                                    <p class="h5 text-indigo mb-3">Nomor seri TV impor (LCD/LED TV) - 9 digit angka</p>
                                    <img src="<?= base_url('files/sn/sn_tv_import.png') ?>" class="img img-fluid w-100">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <p class="h5 text-indigo mt-5 mb-2">Daftar kode model pada no. seri TV lokal</p>
                                    <table class="table table-sm table-bordered table-hover" id="tableSerialTvLocal">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th class="text-center">5 digit pertama S/N</th>
                                                <th>Model</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $a = 1; ?>
                                            <?php foreach ($allSerialNumberCode as $row) : ?>
                                                <?php if ($row['category'] == 'TV LOKAL') : ?>
                                                    <tr>
                                                        <td><?= $a++ ?></td>
                                                        <td class="text-center px-5"><?= $row['first_code'] ?></td>
                                                        <td class=""><?= $row['model'] ?></td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-reffLocal" role="tabpanel" aria-labelledby="pills-reffLocal-tab">
                            <div class="row mt-5">
                                <div class="col-sm-7">
                                    <p class="h5 text-indigo mb-3">Nomor seri Lemari Es lokal - 13/14 digit</p>
                                    <img src="<?= base_url('files/sn/sn_reff_local.png') ?>" class="img img-fluid w-100">
                                </div>
                                <div class="col-sm-1"></div>
                                <div class="col-sm-4">
                                    <p class="h5 text-indigo mb-3">Nomor seri Lemari es impor (SATL)</p>
                                    <img src="<?= base_url('files/sn/sn_reff_import.png') ?>" class="img img-fluid w-100">
                                    <div class="bg-light rounded mt-5">
                                        <code>
                                            <ul type="square">
                                                <strong>Catatan:</strong>
                                                <li>Nomor seri yang diinput ke equipment ada 10 digit: huruf "Y" + 9 angka</li>
                                                <li>Unit produksi 2006 dan sebelumnya, nomor seri hanya ada 6 digit: huruf "Y" atau "D/R/N/V" jika unit build-up + 5 angka</li>
                                            </ul>
                                        </code>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="h5 text-indigo mt-5 mb-2">Daftar kode model pada no. seri Lemari Es lokal</p>
                                    <table class="table table-sm table-bordered table-hover" id="tableSerialReffLocal">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th class="text-center">5 digit pertama S/N</th>
                                                <th>Model</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $a = 1; ?>
                                            <?php foreach ($allSerialNumberCode as $row) : ?>
                                                <?php if ($row['category'] == 'REFF LOKAL') : ?>
                                                    <tr>
                                                        <td><?= $a++ ?></td>
                                                        <td class="text-center px-5"><?= $row['first_code'] ?></td>
                                                        <td class=""><?= $row['model'] ?></td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-showcase" role="tabpanel" aria-labelledby="pills-showcase-tab">
                            <div class="row mt-5">
                                <div class="col-sm-6">
                                    <p class="h5 text-indigo mb-3">Nomor seri Showcase - 11/12 digit</p>
                                    <img src="<?= base_url('files/sn/sn_showcase.png') ?>" class="img img-fluid w-75">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <p class="h5 text-indigo mt-5 mb-2">Daftar kode model pada no. seri showcase</p>
                                    <table class="table table-sm table-bordered table-hover" id="tableSerialShowcase">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th class="text-center">5 digit pertama S/N</th>
                                                <th>Model</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $a = 1; ?>
                                            <?php foreach ($allSerialNumberCode as $row) : ?>
                                                <?php if ($row['category'] == 'SHOWCASE') : ?>
                                                    <tr>
                                                        <td><?= $a++ ?></td>
                                                        <td class="text-center px-5"><?= $row['first_code'] ?></td>
                                                        <td class=""><?= $row['model'] ?></td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-dispenser" role="tabpanel" aria-labelledby="pills-dispenser-tab">
                            <div class="row mt-5">
                                <div class="col-sm-7">
                                    <p class="h5 text-indigo mb-3">Nomor seri Water Dispenser - 12 digit</p>
                                    <img src="<?= base_url('files/sn/sn_water_dispenser.png') ?>" class="img img-fluid w-75">
                                    <div class="bg-light rounded mt-5">
                                        <code>
                                            <ul type="square">
                                                <strong>Catatan:</strong>
                                                <li>Nomor seri yang diinput ke equipment ada 12 digit</li>
                                            </ul>
                                        </code>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="h5 text-indigo mt-5 mb-2">Daftar kode model pada no. seri Water Dispenser</p>
                                    <table class="table table-sm table-bordered table-hover" id="tableSerialDispenser">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th class="text-center">5 digit pertama S/N</th>
                                                <th>Model</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $a = 1; ?>
                                            <?php foreach ($allSerialNumberCode as $row) : ?>
                                                <?php if ($row['category'] == 'WATER DISPENSER') : ?>
                                                    <tr>
                                                        <td><?= $a++ ?></td>
                                                        <td class="text-center px-5"><?= $row['first_code'] ?></td>
                                                        <td class=""><?= $row['model'] ?></td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-wmLocal" role="tabpanel" aria-labelledby="pills-wmLocal-tab">
                            <div class="row mt-5">
                                <div class="col-sm-auto">
                                    <p class="h5 text-indigo mb-3">Nomor seri Mesin Cuci lokal (2 tabung & top-loading) - 9/13/14 digit</p>
                                    <img src="<?= base_url('files/sn/sn_wm_local.png') ?>" class="img img-fluid w-75">
                                    <div class="bg-light rounded mt-5">
                                        <code>
                                            <ul type="square">
                                                <strong>Catatan:</strong>
                                                <li>Nomor seri lama 9 digit (sama seperti WM SATL) sampai Desember 2011</li>
                                                <li>Nomor seri 13 digit mulai Januari 2012 sampai Juni 2019 (nomor seri: xxxxx12Axxxxx ~ xxxxx19Fxxxxx)</li>
                                                <li>Nomor seri 14 digit mulai Juli 2019 sampai sekarang (nomor seri xxxxx19Gxxxxxx)</li>
                                            </ul>
                                        </code>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="h5 text-indigo mt-5 mb-2">Daftar kode model pada no. seri mesin cuci lokal</p>
                                    <table class="table table-sm table-bordered table-hover" id="tableSerialWmLocal">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th class="text-center">5 digit pertama S/N</th>
                                                <th>Model</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $a = 1; ?>
                                            <?php foreach ($allSerialNumberCode as $row) : ?>
                                                <?php if ($row['category'] == 'WASHING MACHINE LOKAL') : ?>
                                                    <tr>
                                                        <td><?= $a++ ?></td>
                                                        <td class="text-center px-5"><?= $row['first_code'] ?></td>
                                                        <td class=""><?= $row['model'] ?></td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-wmImportSatl" role="tabpanel" aria-labelledby="pills-wmImportSatl-tab">
                            <div class="row mt-5">
                                <div class="col-sm-6">
                                    <p class="h5 text-indigo mb-3">Nomor seri Mesin Cuci SATL - 9 digit</p>
                                    <img src="<?= base_url('files/sn/sn_wm_satl.png') ?>" class="img img-fluid w-75">
                                    <div class="bg-light rounded mt-5">
                                        <code>
                                            <ul type="square">
                                                <strong>Catatan:</strong>
                                                <li>Tidak ada kode model di no.seri unit</li>           
                                                <li>Nomor seri hanya berupa angka sebanyak 9 digit</li>
                                            </ul>
                                        </code>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <p class="h5 text-indigo mb-3">Nomor seri Mesin Cuci Pensonic - 10 digit</p>
                                    <img src="<?= base_url('files/sn/sn_wm_pensonic.png') ?>" class="img img-fluid w-100">
                                    <div class="bg-light rounded mt-5">
                                        <code>
                                            <ul type="square">
                                                <strong>Catatan:</strong>
                                                <li>Nomor seri hanya berupa angka sebanyak 10 digit</li>
                                                <li>Contoh WM Pensonic: ES-F650PY, ES-F800T-BL, ES-F800P, ES-F865S, dst.</li>
                                            </ul>
                                        </code>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6"></div>
                                <div class="col-sm-6">
                                    <p class="h5 text-indigo mt-5 mb-2">Daftar kode model pada no. seri WM Pensonic</p>
                                    <table class="table table-sm table-bordered table-hover" id="tableSerialWmPensonic">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th class="text-center">2 digit pertama S/N</th>
                                                <th>Model</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $a = 1; ?>
                                            <?php foreach ($allSerialNumberCode as $row) : ?>
                                                <?php if ($row['category'] == 'WASHING MACHINE PENSONIC') : ?>
                                                    <tr>
                                                        <td><?= $a++ ?></td>
                                                        <td class="text-center px-5"><?= $row['first_code'] ?></td>
                                                        <td class=""><?= $row['model'] ?></td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-wmImportVestel" role="tabpanel" aria-labelledby="pills-wmImportVestel-tab">
                            <div class="row mt-5">
                                <div class="col-sm-auto">
                                    <p class="h5 text-indigo mb-3">Nomor seri Mesin Cuci Pensonic - 10 digit</p>
                                    <img src="<?= base_url('files/sn/sn_wm_fl_vestel.png') ?>" class="img img-fluid w-75">
                                    <div class="bg-light rounded mt-5">
                                        <code>
                                            <ul type="square">
                                                <strong>Catatan:</strong>
                                                <li>Nomor seri yang diambil hanya 12 digit dari belakang</li>
                                                <li>Tidak ada kode model atau periode produksi di nomor seri, tanggal produksi ada pada label terpisah</li>
                                            </ul>
                                        </code>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                    
            </div>
        </div>                              
    </section>
</div>
