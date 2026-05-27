<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
            <?php
            require 'view-function.php';
            //var_dump($detailComplaint)
            ?>
            <form method="post" action="">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <span class="h6 text-primary">Proses tambah data Keluhan Konsumen</span>
                        <div class="card-tools">
                        </div>
                    </div>
                    <div class="card-body">
                        <input type="hidden" class="form-control" name="complaintInputId" id="complaintInputId" value="<?= $detailComplaint['id'] ?>" readonly>
                        <div class="row">
                            <div class="col">
                                <div class="form-group row">
                                    <label for="complaintInputCategory" class="col-sm-4 col-form-label">Jenis keluhan</label>
                                    <div class="col-sm-8">
                                        <input type="" class="form-control" id="complaintInputCategory" name="complaintInputCategory" value="<?= $detailComplaint['claim_category'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label for="complaintInputClaimSource" class="col-sm-4 col-form-label text-right">Claim source</label>
                                    <div class="col-sm-8">
                                        <select type="" class="js-example-basic-single custom-select" id="complaintInputClaimSource" name="complaintInputClaimSource" required>
                                            <option value="<?= $detailComplaint['claim_source'] ?>" selected><?= $detailComplaint['claim_source'] ?></option>
                                            <option value=""> - pilih claim source- </option>
                                            <option value="Call">Call</option>
                                            <option value="Email">Email</option>
                                            <option value="Whatsapp">Whatsapp</option>
                                            <option value="SharpID">SharpID</option>
                                            <option value="SMS">SMS</option>
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
                                        <input type="" class="form-control" id="complaintInputCustomerName" name="complaintInputCustomerName" value="<?= $detailComplaint['customer_name'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label for="complaintInputCustomerPhone" class="col-sm-4 col-form-label text-right">Telepon</label>
                                    <div class="col-sm-8">
                                        <input type="" class="form-control" id="complaintInputCustomerPhone" name="complaintInputCustomerPhone" value="<?= $detailComplaint['customer_phone'] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="complaintInputCustomerAddress" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="" class="form-control" id="complaintInputCustomerAddress" name="complaintInputCustomerAddress" value="<?= $detailComplaint['customer_address'] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group row">
                                    <label for="complaintInputModel" class="col-sm-6 col-form-label">Model</label>
                                    <div class="col-sm-6">
                                        <input type="" class="form-control" id="complaintInputModel" name="complaintInputModel" value="<?= $detailComplaint['model'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label for="complaintInputSerialnumber" class="col-sm-4 col-form-label text-right">No. seri</label>
                                    <div class="col-sm-6">
                                        <input type="" class="form-control" id="complaintInputSerialnumber" name="complaintInputSerialnumber" value="<?= $detailComplaint['serial_number'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label for="complaintInputNotif" class="col-sm-4 col-form-label text-right">Notif</label>
                                    <div class="col-sm-6">
                                        <input type="" class="form-control" id="complaintInputNotif" name="complaintInputNotif" value="<?= $detailComplaint['notification'] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group row">
                                    <label for="complaintInputClaimDate" class="col-sm-6 col-form-label">Tanggal keluhan</label>
                                    <div class="col-sm-6">
                                        <input type="date" class="form-control" id="complaintInputClaimDate" name="complaintInputClaimDate" value="<?= $detailComplaint['claim_date'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label for="complaintInputNotifDate" class="col-sm-4 col-form-label text-right">Tgl notif</label>
                                    <div class="col-sm-6">
                                        <input type="date" class="form-control" id="complaintInputNotifDate" name="complaintInputNotifDate" value="<?= $detailComplaint['notif_date'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label for="complaintInputForwardedDate" class="col-sm-4 col-form-label text-right">Tgl forward</label>
                                    <div class="col-sm-6">
                                        <input type="date" class="form-control" id="complaintInputForwardedDate" name="complaintInputForwardedDate" value="<?= $detailComplaint['forwarded_date'] ?>" required>
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
                                            <option value="<?= $detailComplaint['product_category']; ?>" selected><?= $detailComplaint['product_category']; ?></option>
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
                                <div class="form-group row">
                                    <label for="complaintInputAgent" class="col-sm-4 col-form-label text-right">Agent</label>
                                    <div class="col-sm-6">
                                        <input type="" class="form-control" id="complaintInputAgent" name="complaintInputAgent" value="<?= $detailComplaint['agent'] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="complaintInputClaimDescription" class="col-sm-2 col-form-label">Kategori keluhan</label>
                            <div class="col-sm-6">
                                <select class="js-example-tags form-control custom-select" id="complaintInputClaimDescription" name="complaintInputClaimDescription" required>
                                    <option value="<?= $detailComplaint['claim_description']; ?>" selected><?= $detailComplaint['claim_description']; ?></option>
                                    <?php foreach($claimDescriptions as $row) : ?>
                                        <option value="<?= $row['claim_description'] ?>"><?= $row['claim_description'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <input type="checkbox" name="complaintInputIsUrgent" id="complaintInputIsUrgentFake" style="display: none;" value="0" checked="">
                                <div class="pretty p-svg p-curve">
                                    <input type="checkbox" name="complaintInputIsUrgent" id="complaintInputIsUrgent" value="1" <?= isurgentToCheckbox($detailComplaint['is_urgent']); ?>>
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
                                <input type="" class="form-control" id="complaintInputClaimDescription" name="complaintInputClaimDescription" value="<?= $detailComplaint['agent'] ?>" required>
                            </div>
                        </div> -->
                        
                        <div class="form-group row">
                            <label for="complaintInputClaimDetail" class="col-sm-2 col-form-label">Detail keluhan</label>
                            <div class="col-sm-10">
                                <textarea rows="2" type="" class="form-control" id="complaintInputClaimDetail" name="complaintInputClaimDetail"><?= $detailComplaint['claim_detail']; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="complaintInputAgentAction" class="col-sm-2 col-form-label">Agent action</label>
                            <div class="col-sm-10">
                                <textarea rows="2" type="" class="form-control" id="complaintInputAgentAction" name="complaintInputAgentAction"><?= $detailComplaint['agent_action']; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="complaintInputPartReservation" class="col-sm-2 col-form-label">No.Reservasi Part/PO</label>
                            <div class="col-sm-6">
                                <input type="" class="form-control" id="complaintInputPartReservation" name="complaintInputPartReservation" value="<?= $detailComplaint['part_reservation'] ?>">
                            </div>
                        </div>
                        <div class="form-group row" id="rowsAddPart1">
                            <div class="col-sm-2">
                                <label for="complaintInputPartType1" class="col-form-label">Spare Part #1</label>
                            </div>
                            <div class="col-sm-3">
                                <!-- <input type="" class="form-control" id="complaintInputPartType1" name="complaintInputPartType1" value="<?= $detailComplaint['part1_type']; ?>"> -->
                                <select type="" class="form-control custom-select js-example-tags" id="complaintInputPartType1" name="complaintInputPartType1">
                                    <option value="<?= $detailComplaint['part1_type']; ?>" selected><?= $detailComplaint['part1_type']; ?></option>
                                    <?php foreach($claimPartsNeed as $row) : ?>
                                        <option value="<?= $row['part_type'] ?>"><?= $row['part_type'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <input type="" class="form-control" id="complaintInputPartCode1" name="complaintInputPartCode1" value="<?= $detailComplaint['part1_code']; ?>">
                            </div>
                            <div class="col-sm-2">
                                <div class="pretty p-svg p-curve">
                                    <input type="hidden" id="" name="complaintInputPartIsready1" value="0">
                                    <input type="checkbox" id="complaintInputPartIsready1" name="complaintInputPartIsready1" value="1" <?= partReadytoCheckbox($detailComplaint['part1_isready']) ?>>
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
                        <div class="form-group row" id="rowsAddPart2" style="<?= isreadyToIcon($detailComplaint['part2_type'], $detailComplaint['part2_isready'])['display'] ?>">
                            <div class="col-sm-2">
                                <label for="complaintInputPartType2" class="col-form-label">Spare Part #2</label>
                            </div>
                            <div class="col-sm-3">
                                <!-- <input type="" class="form-control" id="complaintInputPartType2" name="complaintInputPartType2" value="<?= $detailComplaint['part2_type']; ?>"> -->
                                <select type="" class="form-control custom-select js-example-tags" id="complaintInputPartType2" name="complaintInputPartType2">
                                    <option value="<?= $detailComplaint['part2_type']; ?>" selected><?= $detailComplaint['part2_type']; ?></option>
                                    <?php foreach($claimPartsNeed as $row) : ?>
                                        <option value="<?= $row['part_type'] ?>"><?= $row['part_type'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <input type="" class="form-control" id="complaintInputPartCode2" name="complaintInputPartCode2" value="<?= $detailComplaint['part2_code']; ?>">
                            </div>
                            <div class="col-sm-2">
                                <div class="pretty p-svg p-curve">
                                    <input type="hidden" id="" name="complaintInputPartIsready2" value="0">
                                    <input type="checkbox" id="complaintInputPartIsready2" name="complaintInputPartIsready2" value="1" <?= partReadytoCheckbox($detailComplaint['part2_isready']) ?>>
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
                        <div class="form-group row" id="rowsAddPart3" style="<?= isreadyToIcon($detailComplaint['part3_type'], $detailComplaint['part3_isready'])['display'] ?>">
                            <div class="col-sm-2">
                                <label for="complaintInputPartType3" class="col-form-label">Spare Part #3</label>
                            </div>
                            <div class="col-sm-3">
                                <!-- <input type="" class="form-control" id="complaintInputPartType3" name="complaintInputPartType3" value="<?= $detailComplaint['part3_type']; ?>"> -->
                                <select type="" class="form-control custom-select js-example-tags" id="complaintInputPartType3" name="complaintInputPartType3">
                                    <option value="<?= $detailComplaint['part3_type']; ?>" selected><?= $detailComplaint['part3_type']; ?></option>
                                    <?php foreach($claimPartsNeed as $row) : ?>
                                        <option value="<?= $row['part_type'] ?>"><?= $row['part_type'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <input type="" class="form-control" id="complaintInputPartCode3" name="complaintInputPartCode3" value="<?= $detailComplaint['part3_code']; ?>">
                            </div>
                            <div class="col-sm-2">
                                <div class="pretty p-svg p-curve">
                                    <input type="hidden" id="" name="complaintInputPartIsready3" value="0">
                                    <input type="checkbox" id="complaintInputPartIsready3" name="complaintInputPartIsready3" value="1" <?= partReadytoCheckbox($detailComplaint['part3_isready']) ?>>
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
                                <button type="button" id="btnAddPart3" class="btnAddRowsPart btn btn-xs text-info"><i class="fas fa-plus"></i> Tambah</button>
                            </div>
                        </div>
                        <div class="form-group row" id="rowsAddPart4" style="<?= isreadyToIcon($detailComplaint['part4_type'], $detailComplaint['part4_isready'])['display'] ?>">
                            <div class="col-sm-2">
                                <label for="complaintInputPartType4" class="col-form-label">Spare Part #4</label>
                            </div>
                            <div class="col-sm-3">
                                <!-- <input type="" class="form-control" id="complaintInputPartType4" name="complaintInputPartType4" value="<?= $detailComplaint['part4_type']; ?>"> -->
                                <select type="" class="form-control custom-select js-example-tags" id="complaintInputPartType4" name="complaintInputPartType4">
                                    <option value="<?= $detailComplaint['part4_type']; ?>" selected><?= $detailComplaint['part4_type']; ?></option>
                                    <?php foreach($claimPartsNeed as $row) : ?>
                                        <option value="<?= $row['part_type'] ?>"><?= $row['part_type'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <input type="" class="form-control" id="complaintInputPartCode4" name="complaintInputPartCode4" value="<?= $detailComplaint['part4_code']; ?>">
                            </div>
                            <div class="col-sm-2">
                                <div class="pretty p-svg p-curve">
                                    <input type="hidden" id="" name="complaintInputPartIsready4" value="0">
                                    <input type="checkbox" id="complaintInputPartIsready4" name="complaintInputPartIsready4" value="1" <?= partReadytoCheckbox($detailComplaint['part4_isready']) ?>>
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
                                <button type="button" id="btnAddPart4" class="btnAddRowsPart btn btn-xs text-info"><i class="fas fa-plus"></i> Tambah</button>
                            </div>
                        </div>
                        <div class="form-group row" id="rowsAddPart5" style="<?= isreadyToIcon($detailComplaint['part5_type'], $detailComplaint['part5_isready'])['display'] ?>">
                            <div class="col-sm-2">
                                <label for="complaintInputPartType5" class="col-form-label">Spare Part #5</label>
                            </div>
                            <div class="col-sm-3">
                                <!-- <input type="" class="form-control" id="complaintInputPartType5" name="complaintInputPartType5" value="<?= $detailComplaint['part5_type']; ?>"> -->
                                <select type="" class="form-control custom-select js-example-tags" id="complaintInputPartType5" name="complaintInputPartType5">
                                    <option value="<?= $detailComplaint['part5_type']; ?>" selected><?= $detailComplaint['part5_type']; ?></option>
                                    <?php foreach($claimPartsNeed as $row) : ?>
                                        <option value="<?= $row['part_type'] ?>"><?= $row['part_type'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <input type="" class="form-control" id="complaintInputPartCode5" name="complaintInputPartCode5" value="<?= $detailComplaint['part5_code']; ?>">
                            </div>
                            <div class="col-sm-2">
                                <div class="pretty p-svg p-curve">
                                    <input type="hidden" id="" name="complaintInputPartIsready5" value="0">
                                    <input type="checkbox" id="complaintInputPartIsready5" name="complaintInputPartIsready5" value="1" <?= partReadytoCheckbox($detailComplaint['part5_isready']) ?>>
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
                                <button type="button" id="btnAddPart5" class="btnAddRowsPart btn btn-xs text-info"><i class="fas fa-plus"></i> Tambah</button>
                            </div>
                        </div>
                        <div class="form-group row" id="rowsAddPart6" style="<?= isreadyToIcon($detailComplaint['part6_type'], $detailComplaint['part6_isready'])['display'] ?>">
                            <div class="col-sm-2">
                                <label for="complaintInputPartType6" class="col-form-label">Spare Part #6</label>
                            </div>
                            <div class="col-sm-3">
                                <!-- <input type="" class="form-control" id="complaintInputPartType6" name="complaintInputPartType6" value="<?= $detailComplaint['part6_type']; ?>"> -->
                                <select type="" class="form-control custom-select js-example-tags" id="complaintInputPartType6" name="complaintInputPartType6">
                                    <option value="<?= $detailComplaint['part6_type']; ?>" selected><?= $detailComplaint['part6_type']; ?></option>
                                    <?php foreach($claimPartsNeed as $row) : ?>
                                        <option value="<?= $row['part_type'] ?>"><?= $row['part_type'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <input type="" class="form-control" id="complaintInputPartCode6" name="complaintInputPartCode6" value="<?= $detailComplaint['part6_code']; ?>">
                            </div>
                            <div class="col-sm-2">
                                <div class="pretty p-svg p-curve">
                                    <input type="hidden" id="" name="complaintInputPartIsready6" value="0">
                                    <input type="checkbox" id="complaintInputPartIsready6" name="complaintInputPartIsready6" value="1" <?= partReadytoCheckbox($detailComplaint['part6_isready']) ?>>
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
                                        <select type="" class="js-example-basic-single custom-select" id="complaintInputPicReport1Type" name="complaintInputPicReport1Type">
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
                                        <select type="" class="js-example-basic-single custom-select" id="complaintInputPicReport1" name="complaintInputPicReport1" required>
                                            <option value="<?= $detailComplaint['pic_report_1']; ?>" selected><?= $detailComplaint['pic_report_1']; ?></option>
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
                                        <select type="" class="js-example-basic-single custom-select" id="complaintInputPicReport2Type" name="complaintInputPicReport2Type">
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
                                            <option value="<?= $detailComplaint['pic_report_2']; ?>" selected><?= $detailComplaint['pic_report_2']; ?></option>
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
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label for="complaintInputPartRegionalArea" class="col-sm-4 col-form-label text-right">Regional</label>
                                    <div class="col-sm-8">
                                        <select class="js-example-basic-single custom-select" id="complaintInputPartRegionalArea" name="complaintInputPartRegionalArea">
                                            <option value=""> - pilih - </option>
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
                            <label for="complaintInputRemark" class="col-sm-2 col-form-label">Remark/ket.</label>
                            <div class="col-sm-10">
                                <input type="" class="form-control" id="complaintInputRemark" name="complaintInputRemark" value="<?= $detailComplaint['remark']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="complaintInputRemarkInternal" class="col-sm-2 col-form-label">Remark Internal</label>
                            <div class="col-sm-10">
                                <input type="" class="form-control" id="complaintInputRemarkInternal" name="complaintInputRemarkInternal" value="<?= $detailComplaint['remark_internal']; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group row ml-2">
                                    <label for="complaintInputPartType" class="col-sm-4 col-form-label"></label>
                                    <input type="checkbox" name="complaintInputIsReplied" id="complaintInputIsRepliedFake" style="display: none;" value="0" checked="">
                                    <div class="pretty p-svg p-curve">
                                        <input type="checkbox" name="complaintInputIsReplied" id="complaintInputIsReplied" value="1" <?= isurgentToCheckbox($detailComplaint['is_sent']); ?>>
                                        <div class="state p-success">
                                            <!-- svg path -->
                                            <svg class="svg svg-icon" viewBox="0 0 20 20">
                                                <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                                            </svg>
                                            <label class="text-info">Sent?</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label for="complaintInputClaimStatus" class="col-sm-4 col-form-label text-right text-danger">Status keluhan</label>
                                    <div class="col-sm-8">
                                        <select type="" class="form-control" id="complaintInputClaimStatus" name="complaintInputClaimStatus">
                                            <option value="<?= $detailComplaint['claim_status'] ?>" selected><?= $detailComplaint['claim_status'] ?></option>
                                            <option value="">- pilih status keluhan -</option>
                                            <?php foreach ($complaintStatus as $row) : ?>
                                                <option value="<?= $row['status'] ?>"><?= $row['status'] . ' - ' . $row['description'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm">
                                <button type="submit" class="btn px-3 btn-info">Update data keluhan</button>                                
                                <a href="#" class="btn btn-outline-secondary mr-3" id="buttonCloseComplaintEdit"><i class="fas fa-times"></i> Cancel, tutup Laman</a>
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