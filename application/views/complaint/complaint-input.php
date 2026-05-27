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
                            <div class="card-tools">
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="<?= base_url('complaint/processInput') ?>">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="complaintInputCategory" class="col-sm-4 col-form-label">Jenis keluhan</label>
                                            <div class="col-sm-8">
                                                <input type="" class="form-control" id="complaintInputCategory" name="complaintInputCategory" value="<?= $complaintData['system_code'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="complaintInputClaimSource" class="col-sm-4 col-form-label text-right">Claim source</label>
                                            <div class="col-sm-8">
                                                <select type="" class="js-example-basic-single custom-select" id="complaintInputClaimSource" name="complaintInputClaimSource" required>
                                                    <option value=""> - pilih claim source- </option>
                                                    <option value="Call">Call</option>
                                                    <option value="Email">Email</option>
                                                    <option value="Whatsapp">Whatsapp</option>
                                                    <option value="SharpID">SharpID</option>
                                                    <option value="SMS">SMS</option>
                                                    <option value="Instagram">Instagram</option>
                                                    <option value="Twitter">Twitter</option>
                                                    <option value="Facebook">Facebook</option>
                                                    <option value="TikTok">TikTok</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="complaintInputCustomerName" class="col-sm-4 col-form-label">Nama konsumen</label>
                                            <div class="col-sm-8">
                                                <input type="" class="form-control" id="complaintInputCustomerName" name="complaintInputCustomerName" value="<?= $complaintData['customer_name'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="complaintInputCustomerPhone" class="col-sm-4 col-form-label text-right">Telepon</label>
                                            <div class="col-sm-8">
                                                <input type="" class="form-control" id="complaintInputCustomerPhone" name="complaintInputCustomerPhone" value="<?= $complaintData['customer_phone'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="complaintInputCustomerAddress" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <input type="" class="form-control" id="complaintInputCustomerAddress" name="complaintInputCustomerAddress" value="<?= $complaintData['customer_address'] ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="complaintInputModel" class="col-sm-6 col-form-label">Model</label>
                                            <div class="col-sm-6">
                                                <input type="" class="form-control" id="complaintInputModel" name="complaintInputModel" value="<?= $complaintData['model'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="complaintInputSerialnumber" class="col-sm-4 col-form-label text-right">No. seri</label>
                                            <div class="col-sm-6">
                                                <input type="" class="form-control" id="complaintInputSerialnumber" name="complaintInputSerialnumber" value="<?= $complaintData['serial_number'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="complaintInputNotif" class="col-sm-4 col-form-label text-right">Notif</label>
                                            <div class="col-sm-6">
                                                <input type="" class="form-control" id="complaintInputNotif" name="complaintInputNotif" value="<?= $complaintData['remark'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="complaintInputClaimDate" class="col-sm-6 col-form-label">Tanggal keluhan</label>
                                            <div class="col-sm-6">
                                                <input type="date" class="form-control" id="complaintInputClaimDate" name="complaintInputClaimDate" value="<?= $complaintData['datetime'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="complaintInputNotifDate" class="col-sm-4 col-form-label text-right">Tgl notif</label>
                                            <div class="col-sm-6">
                                                <input type="date" class="form-control" id="complaintInputNotifDate" name="complaintInputNotifDate" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="complaintInputForwardedDate" class="col-sm-4 col-form-label text-right">Tgl forward</label>
                                            <div class="col-sm-6">
                                                <input type="date" class="form-control" id="complaintInputForwardedDate" name="complaintInputForwardedDate" value="<?= date("Y-m-d") ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-group row">
                                            <label for="complaintInputProductCategory" class="col-sm-3 col-form-label">Product Category</label>
                                            <div class="col-sm-8">
                                                <select class="js-example-basic-single custom-select" id="complaintInputProductCategory" name="complaintInputProductCategory" required>
                                                    <option value=""> - pilih - </option>
                                                    <option value="Air Conditioner">Air Conditioner</option>
                                                    <option value="Air Cooler">Air Cooler</option>
                                                    <option value="Air Purifier">Air Purifier</option>
                                                    <option value="Audio">Audio</option>
                                                    <option value="Hair Dryer/Straightener">Hair Dryer/Straightener</option>
                                                    <option value="LCD/LED TV">LCD/LED TV</option>
                                                    <option value="Microwave Oven">Microwave Oven</option>
                                                    <option value="Notebook">Notebook/Laptop</option>
                                                    <option value="Refrigerator">Refrigerator</option>
                                                    <option value="Smartphone">Smartphone/Handphone</option>
                                                    <option value="Small Home Appliances">Small Home Appliances</option>
                                                    <option value="Washing Machine">Washing Machine</option>
                                                    <option value="Water Dispenser">Water Dispenser</option>
                                                    <option value="Water Pump">Water Pump</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="row">
                                            <label for="complaintInputAgent" class="col-sm-4 col-form-label text-right">Agent</label>
                                            <div class="col-sm-6">
                                                <input type="" class="form-control" id="complaintInputAgent" name="complaintInputAgent" value="<?= $complaintData['agent'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="complaintInputClaimDescription" class="col-sm-2 col-form-label">Kategori keluhan</label>
                                    <div class="col-sm-6">
                                        <select class="js-example-tags form-control custom-select" id="complaintInputClaimDescription" name="complaintInputClaimDescription" required>
                                            <option value="">- pilih -</option>
                                            <?php foreach($claimDescriptions as $row) : ?>
                                                <option value="<?= $row['claim_description'] ?>"><?= $row['claim_description'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="checkbox" name="complaintInputIsUrgent" id="complaintInputIsUrgentFake" style="display: none;" value="0" checked="">
                                        <div class="pretty p-svg p-curve">
                                            <input type="checkbox" name="complaintInputIsUrgent" id="complaintInputIsUrgent" value="1">
                                            <div class="state p-danger">
                                                <!-- svg path -->
                                                <svg class="svg svg-icon" viewBox="0 0 20 20">
                                                    <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                                                </svg>
                                                <label class="text-danger">Urgent</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="form-group row" style="display: none;">
                                    <label for="complaintInputClaimDescription" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-6">
                                        <input type="" class="form-control" id="complaintInputClaimDescription" name="complaintInputClaimDescription" required>
                                    </div>
                                </div> -->
                                <div class="form-group row">
                                    <label for="complaintInputClaimDetail" class="col-sm-2 col-form-label">Detail keluhan</label>
                                    <div class="col-sm-10">
                                        <textarea rows="2" type="" class="form-control" id="complaintInputClaimDetail" name="complaintInputClaimDetail"><?= $complaintData['detail'] ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="complaintInputAgentAction" class="col-sm-2 col-form-label">Agent action detail</label>
                                    <div class="col-sm-10">
                                        <textarea rows="2" type="" class="form-control" id="complaintInputAgentAction" name="complaintInputAgentAction"><?= $complaintData['action_detail'] ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="complaintInputPartReservation" class="col-sm-2 col-form-label">No.Reservasi Part/PO</label>
                                    <div class="col-sm-6">
                                        <input type="" class="form-control" id="complaintInputPartReservation" name="complaintInputPartReservation">
                                    </div>
                                </div>
                                <div class="form-group row" id="rowsAddPart1">
                                    <div class="col-sm-2">
                                        <label for="complaintInputPartType1" class="col-form-label">Spare Part #1</label>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- <input type="" class="form-control" id="complaintInputPartType1" name="complaintInputPartType1" placeholder="Jenis spare part #1"> -->
                                        <select type="" class="form-control custom-select js-example-tags" id="complaintInputPartType1" name="complaintInputPartType1">
                                            <?php foreach($claimPartsNeed as $row) : ?>
                                                <option value="<?= $row['part_type'] ?>"><?= $row['part_type'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="" class="form-control" id="complaintInputPartCode1" name="complaintInputPartCode1" placeholder="Kode spare part #1">
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="pretty p-svg p-curve">
                                            <input type="hidden" id="" name="complaintInputPartIsready1" value="0">
                                            <input type="checkbox" id="complaintInputPartIsready1" name="complaintInputPartIsready1" value="1">
                                            <div class="state p-info">
                                                <!-- svg path -->
                                                <svg class="svg svg-icon" viewBox="0 0 20 20">
                                                    <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                                                </svg>
                                                <label>Ready di HQ</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <button type="button" id="btnAddPart1" class="btnAddRowsPart btn btn-xs text-info"><i class="fas fa-plus"></i> Tambah</button>
                                    </div>
                                </div>
                                <div class="form-group row rowsAddPart" id="rowsAddPart2" style="display:none;">
                                    <div class="col-sm-2">
                                        <label for="complaintInputPartType2" class="col-form-label">Spare Part #2</label>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- <input type="" class="form-control" id="complaintInputPartType2" name="complaintInputPartType2" placeholder="Jenis spare part #2"> -->
                                        <select type="" class="form-control custom-select js-example-tags" id="complaintInputPartType2" name="complaintInputPartType2">
                                            <?php foreach($claimPartsNeed as $row) : ?>
                                                <option value="<?= $row['part_type'] ?>"><?= $row['part_type'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="" class="form-control" id="complaintInputPartCode2" name="complaintInputPartCode2" placeholder="Kode spare part #2">
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="pretty p-svg p-curve">
                                            <input type="hidden" id="" name="complaintInputPartIsready2" value="0">
                                            <input type="checkbox" id="complaintInputPartIsready2" name="complaintInputPartIsready2" value="1">
                                            <div class="state p-info">
                                                <!-- svg path -->
                                                <svg class="svg svg-icon" viewBox="0 0 20 20">
                                                    <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                                                </svg>
                                                <label>Ready di HQ</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <button type="button" id="btnAddPart2" class="btnAddRowsPart btn btn-xs text-info"><i class="fas fa-plus"></i> Tambah</button>
                                    </div>
                                </div>
                                <div class="form-group row rowsAddPart" id="rowsAddPart3" style="display:none;">
                                    <div class="col-sm-2">
                                        <label for="complaintInputPartType3" class="col-form-label">Spare Part #3</label>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- <input type="" class="form-control" id="complaintInputPartType3" name="complaintInputPartType3" placeholder="Jenis spare part #3"> -->
                                        <select type="" class="form-control custom-select js-example-tags" id="complaintInputPartType3" name="complaintInputPartType3">
                                            <?php foreach($claimPartsNeed as $row) : ?>
                                                <option value="<?= $row['part_type'] ?>"><?= $row['part_type'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="" class="form-control" id="complaintInputPartCode3" name="complaintInputPartCode3" placeholder="Kode spare part #3">
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="pretty p-svg p-curve">
                                            <input type="hidden" id="" name="complaintInputPartIsready3" value="0">
                                            <input type="checkbox" id="complaintInputPartIsready3" name="complaintInputPartIsready3" value="1">
                                            <div class="state p-info">
                                                <!-- svg path -->
                                                <svg class="svg svg-icon" viewBox="0 0 20 20">
                                                    <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                                                </svg>
                                                <label>Ready di HQ</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <button type="button" id="btnAddPart2" class="btnAddRowsPart btn btn-xs text-info"><i class="fas fa-plus"></i> Tambah</button>
                                    </div>
                                </div>
                                <div class="form-group row rowsAddPart" id="rowsAddPart4" style="display:none;">
                                    <div class="col-sm-2">
                                        <label for="complaintInputPartType4" class="col-form-label">Spare Part #4</label>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- <input type="" class="form-control" id="complaintInputPartType4" name="complaintInputPartType4" placeholder="Jenis spare part #4"> -->
                                        <select type="" class="form-control custom-select js-example-tags" id="complaintInputPartType4" name="complaintInputPartType4">
                                            <?php foreach($claimPartsNeed as $row) : ?>
                                                <option value="<?= $row['part_type'] ?>"><?= $row['part_type'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="" class="form-control" id="complaintInputPartCode4" name="complaintInputPartCode4" placeholder="Kode spare part #4">
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="pretty p-svg p-curve">
                                            <input type="hidden" id="" name="complaintInputPartIsready4" value="0">
                                            <input type="checkbox" id="complaintInputPartIsready4" name="complaintInputPartIsready4" value="1">
                                            <div class="state p-info">
                                                <!-- svg path -->
                                                <svg class="svg svg-icon" viewBox="0 0 20 20">
                                                    <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                                                </svg>
                                                <label>Ready di HQ</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <button type="button" id="btnAddPart2" class="btnAddRowsPart btn btn-xs text-info"><i class="fas fa-plus"></i> Tambah</button>
                                    </div>
                                </div>
                                <div class="form-group row rowsAddPart" id="rowsAddPart5" style="display:none;">
                                    <div class="col-sm-2">
                                        <label for="complaintInputPartType5" class="col-form-label">Spare Part #5</label>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- <input type="" class="form-control" id="complaintInputPartType5" name="complaintInputPartType5" placeholder="Jenis spare part #5"> -->
                                        <select type="" class="form-control custom-select js-example-tags" id="complaintInputPartType5" name="complaintInputPartType5">
                                            <?php foreach($claimPartsNeed as $row) : ?>
                                                <option value="<?= $row['part_type'] ?>"><?= $row['part_type'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="" class="form-control" id="complaintInputPartCode5" name="complaintInputPartCode5" placeholder="Kode spare part #5">
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="pretty p-svg p-curve">
                                            <input type="hidden" id="" name="complaintInputPartIsready5" value="0">
                                            <input type="checkbox" id="complaintInputPartIsready5" name="complaintInputPartIsready5" value="1">
                                            <div class="state p-info">
                                                <!-- svg path -->
                                                <svg class="svg svg-icon" viewBox="0 0 20 20">
                                                    <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                                                </svg>
                                                <label>Ready di HQ</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <button type="button" id="btnAddPart2" class="btnAddRowsPart btn btn-xs text-info"><i class="fas fa-plus"></i> Tambah</button>
                                    </div>
                                </div>
                                <div class="form-group row rowsAddPart" id="rowsAddPart6" style="display:none;">
                                    <div class="col-sm-2">
                                        <label for="complaintInputPartType6" class="col-form-label">Spare Part #6</label>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- <input type="" class="form-control" id="complaintInputPartType6" name="complaintInputPartType6" placeholder="Jenis spare part #6"> -->
                                        <select type="" class="form-control custom-select js-example-tags" id="complaintInputPartType6" name="complaintInputPartType6">
                                            <?php foreach($claimPartsNeed as $row) : ?>
                                                <option value="<?= $row['part_type'] ?>"><?= $row['part_type'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="" class="form-control" id="complaintInputPartCode6" name="complaintInputPartCode6" placeholder="Kode spare part #6">
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="pretty p-svg p-curve">
                                            <input type="hidden" id="" name="complaintInputPartIsready6" value="0">
                                            <input type="checkbox" id="complaintInputPartIsready6" name="complaintInputPartIsready6" value="1">
                                            <div class="state p-info">
                                                <!-- svg path -->
                                                <svg class="svg svg-icon" viewBox="0 0 20 20">
                                                    <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                                                </svg>
                                                <label>Ready di HQ</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="complaintInputPicReport1Type" class="col-sm-4 col-form-label">SVC PIC 1</label>
                                            <div class="col-sm-8">
                                                <select type="" class="js-example-basic-single custom-select" id="complaintInputPicReport1Type" name="complaintInputPicReport1Type" required>
                                                    <option value=""> - pilih - </option>
                                                    <option value="BRANCH">Cabang</option>
                                                    <option value="SDSS">SDSS</option>
                                                    <option value="SSR">SSR</option>
                                                    <option value="SASS">SASS</option>
                                                    <option value="Part Center">Part Center</option>
                                                    <option value="Sales Marketing">Sales Marketing</option>
                                                    <option value="Others">Lainnya</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="complaintInputPicReport1" class="col-sm-4 col-form-label text-right">PIC report 1</label>
                                            <div class="col-sm-8">
                                                <select class="js-example-basic-single custom-select" id="complaintInputPicReport1" name="complaintInputPicReport1" required>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="complaintInputPicReport2Type" class="col-sm-4 col-form-label">SVC PIC 2</label>
                                            <div class="col-sm-8">
                                                <select class="js-example-basic-single custom-select" id="complaintInputPicReport2Type" name="complaintInputPicReport2Type">
                                                    <option value=""> - pilih - </option>
                                                    <option value="BRANCH">Cabang</option>
                                                    <option value="SDSS">SDSS</option>
                                                    <option value="SSR">SSR</option>
                                                    <option value="SASS">SASS</option>
                                                    <option value="Part Center">Part Center</option>
                                                    <option value="Sales Marketing">Sales Marketing</option>
                                                    <option value="Others">Lainnya</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="complaintInputPicReport2" class="col-sm-4 col-form-label text-right">PIC report 2</label>
                                            <div class="col-sm-8">
                                                <select class="js-example-basic-single custom-select" id="complaintInputPicReport2" name="complaintInputPicReport2">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="complaintInputPartUnderBranch" class="col-sm-4 col-form-label">Under cabang</label>
                                            <div class="col-sm-8">
                                                <select class="js-example-basic-single custom-select" id="complaintInputPartUnderBranch" name="complaintInputPartUnderBranch">
                                                    <option value="">- pilih cabang induk -</option>
                                                    <?php foreach ($underBranch as $row) : ?>
                                                        <option value="<?= $row['under_branch'] ?>"><?= $row['under_branch'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="complaintInputPartRegionalArea" class="col-sm-4 col-form-label text-right">Regional</label>
                                            <div class="col-sm-8">
                                                <select class="js-example-basic-single custom-select" id="complaintInputPartRegionalArea" name="complaintInputPartRegionalArea">
                                                    <option value=""> - pilih region - </option>
                                                    <option value="Jakarta">Jakarta</option>
                                                    <option value="Jawa Bali">Jawa & Bali</option>
                                                    <option value="Jakarta">Sumatera</option>
                                                    <option value="Jakarta">Kalimantan</option>
                                                    <option value="Jakarta">Sulawesi</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                </div>
                                <div class="form-group row">
                                    <label for="complaintInputRemark" class="col-sm-2 col-form-label">Remark/ket.</label>
                                    <div class="col-sm-10">
                                        <input type="" class="form-control" id="complaintInputRemark" name="complaintInputRemark">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="complaintInputRemarkInternal" class="col-sm-2 col-form-label">Remark Internal</label>
                                    <div class="col-sm-10">
                                        <input type="" class="form-control" id="complaintInputRemarkInternal" name="complaintInputRemarkInternal" placeholder="Catatan untuk internal CCC diisi jika complaint tidak di-forward di hari yang sama">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="complaintInputClaimStatus" class="col-sm-2 col-form-label">Complaint Status</label>
                                    <div class="col-sm-4">
                                        <select class="js-example-basic-single custom-select" name="complaintInputClaimStatus" id="complaintInputClaimStatus">
                                            <option value="21" selected>21 - Unit dalam perbaikan</option>
                                            <?php foreach($complaintStatus as $row) :  ?>
                                                <option value="<?= $row['status'] ?>"><?= $row['status'] . ' - ' . $row['description'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn px-5 btn-outline-danger mt-3">Proses data</button>
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