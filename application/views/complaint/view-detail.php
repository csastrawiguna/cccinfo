<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
            <?php
                require 'view-function.php';
            ?>            

            <div class="row">
                <div class="col">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <span class="h5 text-info">Detail Keluhan Konsumen</span>
                            <?= isurgentToText($detailComplaint['is_urgent']) ?>
                            <?= claimDetailStatusToBadge($detailComplaint['status_code'], $detailComplaint['status_desc'], $detailComplaint['status_group']) ?>                            
                            <div class="card-tools">
                                <!-- <a href="<?= base_url('complaint/list') ?>" class="btn btn-outline-secondary mr-3"><i class="fas fa-arrow-circle-left"></i> Kembali</a> -->
                                <button id="buttonCloseViewDetail" class="btn btn-outline-secondary mr-3"><i class="fas fa-times"></i> Tutup Laman</button>
                            </div>
                        </div>
                        <div class="card-body">                            
                            <div class="row">
                                <div class="col-sm-6">
                                    <table class="table table-sm table-borderless">
                                        <tbody>
                                            <tr>
                                                <td colspan="3" class="text-bold" style="text-decoration: underline;">CUSTOMER & UNIT</td>
                                            </tr>
                                            <tr>
                                                <td style="min-width: 108px">Nama</td>
                                                <td>:</td>
                                                <td><?= $detailComplaint['customer_name'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Telepon</td>
                                                <td>:</td>
                                                <td><?= $detailComplaint['customer_phone'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td>:</td>
                                                <td><span class="flex-wrap" style="word-wrap: break-word; width: 304px"><?= ucwords($detailComplaint['customer_address']) ?></span></td>
                                            </tr>
                                            <tr>
                                                <td>Produk</td>
                                                <td>:</td>
                                                <td><?= $detailComplaint['product_category'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>PIC report 1</td>
                                                <td>:</td>
                                                <td><?= $detailComplaint['pic_report_1'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>PIC report 2</td>
                                                <td>:</td>
                                                <td><?= $detailComplaint['pic_report_2'] ?></td>
                                            </tr>
                                            <tr>
                                                <td style="min-width: 118px">Cabang/Regional</td>
                                                <td>:</td>
                                                <td><?= $detailComplaint['under_branch'] . ' - ' . $detailComplaint['regional_area'] ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-6">
                                    <table class="table table-sm table-borderless">
                                        <tbody>
                                            <tr>
                                                <!-- <td colspan="3" class="text-bold"><span style="text-decoration: underline;">KELUHAN - [TAT :  <?= stringTat($detailComplaint['claim_tatclosed'], $detailComplaint['claim_tat']) . ' hari' ?>]</span></td> -->
                                                <td colspan="3" class="text-bold"><span style="text-decoration: underline;">KELUHAN - <?= strtoupper($detailComplaint['claim_category']) ?></span></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 100px;">Jenis keluhan</td>
                                                <td>:</td>
                                                <td>
                                                    <?= $detailComplaint['claim_description'] ?>
                                                    <span class="text-info">
                                                        (TAT : <?= stringTat($detailComplaint['claim_tatclosed'], $detailComplaint['claim_tat']) ?> hari)
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tgl keluhan</td>
                                                <td>:</td>
                                                <td><?= date("d-M-Y", strtotime($detailComplaint['claim_date'])) . '<span class="text-info"> (forward: ' . date("d-M-Y", strtotime($detailComplaint['forwarded_date'])) . ')</span>' ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 100px;">Tgl notif</td>
                                                <td>:</td>
                                                <td><?= date("d-M-Y", strtotime($detailComplaint['notif_date'])) . '<span class="text-info"> (TAT notif: ' . stringTat($detailComplaint['notif_tatclosed'], $detailComplaint['notif_tat']) . ')</span>' ?></td>
                                            </tr>
                                            <tr>
                                                <td>Model/SN</td>
                                                <td>:</td>
                                                <td><?= $detailComplaint['model'] . ' - ' . $detailComplaint['serial_number'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Notif</td>
                                                <td>:</td>
                                                <td><?= $detailComplaint['notification'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>No. reservasi</td>
                                                <td>:</td>
                                                <td><?= $detailComplaint['part_reservation'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Spare part
                                                    <?php if(in_array($this->session->userdata('useraccess'), $allowedAccess)) : ?>
                                                        <br>
                                                        <button type="button" class="btn btn-sm btn-outline-info mt-2" data-toggle="modal" data-target="#modalAddPart">
                                                            <i class="fas fa-plus"></i> Add
                                                        </button>
                                                    <?php endif; ?>
                                                </td>
                                                <td>:</td>
                                                <td>
                                                    <table class="table table-sm">
                                                        <tbody>
                                                            <tr style="<?= isreadyToIcon($detailComplaint['part1_type'], $detailComplaint['part1_isready'])['display']?>">
                                                                <td>1. <?= $detailComplaint['part1_type'] ?></td>
                                                                <td><?= $detailComplaint['part1_code'] ?></td>
                                                                <td><?= isreadyToIcon($detailComplaint['part1_type'], $detailComplaint['part1_isready'])['status'] ?></td>
                                                            </tr>
                                                            <tr style="<?= isreadyToIcon($detailComplaint['part2_type'], $detailComplaint['part2_isready'])['display']?>">
                                                                <td>2. <?= $detailComplaint['part2_type'] ?></td>
                                                                <td><?= $detailComplaint['part2_code'] ?></td>
                                                                <td><?= isreadyToIcon($detailComplaint['part2_type'], $detailComplaint['part2_isready'])['status'] ?></td>
                                                            </tr>
                                                            <tr style="<?= isreadyToIcon($detailComplaint['part3_type'], $detailComplaint['part3_isready'])['display']?>">
                                                                <td>3. <?= $detailComplaint['part3_type'] ?></td>
                                                                <td><?= $detailComplaint['part3_code'] ?></td>
                                                                <td><?= isreadyToIcon($detailComplaint['part3_type'], $detailComplaint['part3_isready'])['status'] ?></td>
                                                            </tr>
                                                            <tr style="<?= isreadyToIcon($detailComplaint['part4_type'], $detailComplaint['part4_isready'])['display']?>">
                                                                <td>4. <?= $detailComplaint['part4_type'] ?></td>
                                                                <td><?= $detailComplaint['part4_code'] ?></td>
                                                                <td><?= isreadyToIcon($detailComplaint['part4_type'], $detailComplaint['part4_isready'])['status'] ?></td>
                                                            </tr>
                                                            <tr style="<?= isreadyToIcon($detailComplaint['part5_type'], $detailComplaint['part5_isready'])['display']?>">
                                                                <td>5. <?= $detailComplaint['part5_type'] ?></td>
                                                                <td><?= $detailComplaint['part5_code'] ?></td>
                                                                <td><?= isreadyToIcon($detailComplaint['part5_type'], $detailComplaint['part5_isready'])['status'] ?></td>
                                                            </tr>
                                                            <tr style="<?= isreadyToIcon($detailComplaint['part6_type'], $detailComplaint['part6_isready'])['display']?>">
                                                                <td>6. <?= $detailComplaint['part6_type'] ?></td>
                                                                <td><?= $detailComplaint['part6_code'] ?></td>
                                                                <td><?= isreadyToIcon($detailComplaint['part6_type'], $detailComplaint['part6_isready'])['status'] ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="viewComplaintDetailClaimDetail" class="text-danger">Detail keluhan</label>
                                    <textarea type="" class="form-control" id="viewComplaintDetailClaimDetail" name="viewComplaintDetailClaimDetail" readonly rows="3"><?= $detailComplaint['claim_detail'] ?></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="complaintInputAgentAction" class="">Agent action (<?= $detailComplaint['agent'] ?>)</label>
                                    <textarea type="" class="form-control" id="complaintInputAgentAction" name="complaintInputAgentAction" readonly rows="3"><?= $detailComplaint['agent_action'] ?></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 mb-4">
                                    <label class="text-bold">Root cause</label>
                                    <div type="" class="border p-2 rounded" style="background-color: #e9ecef;">
                                        <div class="row">
                                            <div class="col-sm-11">
                                                <?= $detailComplaint['rootcause'] ?>
                                            </div>
                                            <div class="col-sm-1 text-right">
                                                <a href="#" class="" data-toggle="modal" data-target="#updateRootcauseCountermeasure">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 mb-4">
                                    <label class="text-bold">Countermeasure</label>
                                    <div type="" class="border p-2 rounded" style="background-color: #e9ecef;">
                                        <div class="row">
                                            <div class="col-sm-11">
                                                 <?= $detailComplaint['countermeasure'] ?>
                                            </div>
                                            <div class="col-sm-1 text-right">
                                                <a href="#" class="" data-toggle="modal" data-target="#updateRootcauseCountermeasure">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12 mb-4">
                                    <label for="viewComplaintDetailProgress" class="text-bold">Progress keluhan</label>
                                    <div type="" class="border p-2 rounded" id="viewComplaintDetailProgress" name="viewComplaintDetailProgress" style="background-color: #e9ecef;"><?= progressToArrayFullText($this->session->userdata('useraccess'), $detailComplaint['progress'], $detailComplaint['progress_id']) ?></div>
                                </div>
                            </div>
                            <?php if ($detailComplaint['claim_status'] != 50) : ?>
                                <?php if ($detailComplaint['response_request'] != NULL): ?>
                                    <div class="form-row">
                                    <div class="form-group col-md-12 mb-4">
                                        <label for="viewComplaintDetailResponseRequest" class="text-bold text-danger">Respon/Catatan Request Close <i class="fas fa-tag"></i></label>
                                        <div type="" class="border p-2 rounded" id="viewComplaintDetailResponseRequest" name="viewComplaintDetailResponseRequest" style="background-color: #f9ecef;">
                                            <small class="text-secondary"><?= $detailComplaint['responsed_by'] . ' [' . date("d-M-Y H:i", strtotime($detailComplaint['responsed_at'])) . ']' ?>:</small><br>
                                            <?= $detailComplaint['response_request'] ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                            <?php endif; ?>

                            <!-- response request close -->
                            <div class="form-row">
                                <div class="form-group col-md" style="max-width: 300px">
                                    <?php if (in_array($this->session->userdata('useraccess'), $allowedAccess)) : ?>
                                        <a href="<?= base_url('complaint/edit/') . $detailComplaint['id'] ?>" class="btn btn-warning px-3"><i class="fas fa-edit"></i> Edit</a>
                                        <?php if($detailComplaint['propose_close'] == 1) : ?>
                                            <a href="#" class="btn btn-info px-2" title="Untuk respon/catatn Request Close" data-toggle="modal" data-target="#viewComplaintDetailResponseRequestModal"><i class="fas fa-bookmark"></i> Respon</a>
                                        <?php endif ?>
                                    <?php endif; ?>
                                    <?php if (in_array($this->session->userdata('useraccess'), $allowedAccessWithBranch)) : ?>
                                        <a href="#" data-toggle="modal" data-target="#viewComplaintDetailUpdateForm" class="btn btn-info px-1"><i class="fas fa-plus"></i> Progress</a>
                                    <?php endif; ?>
                                    <a href="#" class="btn btn-outline-secondary mr-3" id="buttonCloseViewDetailBottom"><i class="fas fa-times"></i></a>
                                </div>
                                
                                <!-- form button request close -->
                                <div class="col-md" style="max-width: 190px; display: <?= proposeCloseStyle($this->session->userdata('useraccess'), $allowedAccessSvchead) ?>;">
                                    <?php if (strtolower($detailComplaint['claim_status']) !== 'case closed' && strlen($detailComplaint['progress']) > 30) : ?>
                                        <div class="col-sm">
                                            <div class="pretty p-svg p-curve">
                                                <input type="checkbox" class="form-control" id="complaintProposeCloseStatus" <?= proposeCloseToCheckbox($detailComplaint['propose_close'])['status'] ?> data-complaintid="<?= $detailComplaint['id'] ?>" title="Requested by : <?= $detailComplaint['propose_close_by'] . ' - ' . date('d M Y h:i', strtotime($detailComplaint['propose_close_at']))?>">
                                                <div class="state p-success">
                                                <!-- svg path -->
                                                    <svg class="svg svg-icon" viewBox="0 0 20 20">
                                                        <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                                                    </svg>
                                                    <label class="text-info"><?= proposeCloseToCheckbox($detailComplaint['propose_close'])['text'] ?></label>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <!-- form status complaint update -->
                                <?php if (in_array($this->session->userdata('useraccess'), $allowedAccess)) : ?>
                                    <form action="<?= base_url('complaint/updateStatus') ?>" method="post" class="col-md">
                                        <div class="form-group ">
                                            <div class="form-group row">
                                                <input type="hidden" id="viewComplaintDetailId" name="viewComplaintDetailId" value="<?= $detailComplaint['id'] ?>">
                                                <div class="col-sm-auto" style="max-width: 227px;">
                                                    <fieldset class="form-group row">
                                                        <legend class="col-form-label col-sm-4 float-sm-right pt-0 text-info" style="max-width: 90px;">Responsed:</legend>
                                                        <div class="col-sm pl-0">
                                                            <div class="form-check">
                                                                <div class="pretty p-svg p-curve">
                                                                    <input type="hidden" name="viewComplaintDetailIsresponseBranch" value="0" checked>
                                                                    <input type="checkbox" name="viewComplaintDetailIsresponseBranch" id="viewComplaintDetailIsresponseBranch" value="1" <?= isresponsedToCheckbox($detailComplaint['isresponsed_branch']) ?> <?= disableChekbox($this->session->userdata('useraccess'), $allowedAccess) ?>>
                                                                    <div class="state p-success">
                                                                        <svg class="svg svg-icon" viewBox="0 0 20 20">
                                                                            <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                                                                        </svg>
                                                                        <label>Branch</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-check">
                                                                <div class="pretty p-svg p-curve">
                                                                    <input type="hidden" name="viewComplaintDetailIsresponseSass" value="0" checked>
                                                                    <input type="checkbox" name="viewComplaintDetailIsresponseSass" id="viewComplaintDetailIsresponseSass" value="1" <?= isresponsedToCheckbox($detailComplaint['isresponsed_sass']) ?> <?= disableChekbox($this->session->userdata('useraccess'), $allowedAccess) ?>>
                                                                    <div class="state p-success">
                                                                        <svg class="svg svg-icon" viewBox="0 0 20 20">
                                                                            <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                                                                        </svg>
                                                                        <label>SASS</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-check">
                                                                <div class="pretty p-svg p-curve">
                                                                    <input type="hidden" name="viewComplaintDetailIsresponseHqsass" value="0" checked>
                                                                    <input type="checkbox" name="viewComplaintDetailIsresponseHqsass" id="viewComplaintDetailIsresponseHqsass" value="1" <?= isresponsedToCheckbox($detailComplaint['isresponsed_sasshq']) ?> <?= disableChekbox($this->session->userdata('useraccess'), $allowedAccess) ?>>
                                                                    <div class="state p-success">
                                                                        <svg class="svg svg-icon" viewBox="0 0 20 20">
                                                                            <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                                                                        </svg>
                                                                        <label>SASS HQ</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-check">
                                                                <div class="pretty p-svg p-curve">
                                                                    <input type="hidden" name="viewComplaintDetailIsresponsePartcenter" value="0" checked>
                                                                    <input type="checkbox" name="viewComplaintDetailIsresponsePartcenter" id="viewComplaintDetailIsresponsePartcenter" value="1" <?= isresponsedToCheckbox($detailComplaint['isresponsed_part']) ?> <?= disableChekbox($this->session->userdata('useraccess'), $allowedAccess) ?>>
                                                                    <div class="state p-success">
                                                                        <svg class="svg svg-icon" viewBox="0 0 20 20">
                                                                            <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                                                                        </svg>
                                                                        <label>Part Center</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="col-sm" style="min-width: 270px; max-width: 270px">
                                                    <div class="row">
                                                        <input type="hidden" name="viewComplaintDetailProposeClose" value="<?= $detailComplaint['propose_close'] ?>">
                                                        <label for="viewComplaintDetailStatus" class="col-sm-1 col-form-label text-right text-info font-weight-normal" style="max-width: 70px; min-width: 60px;">Status</label>
                                                        <div class="col-sm">
                                                            <select class="custom-select" name="viewComplaintDetailStatus" id="viewComplaintDetailStatus">
                                                                <option value="<?= $detailComplaint['claim_status'] ?>" selected><?= $detailComplaint['claim_status'] ?></option>
                                                                <?php foreach ($complaintStatus as $row) : ?>
                                                                    <option value="<?= $row['status'] ?>"><?= $row['status'] . ' - ' . $row['description'] ?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-1">
                                                        <label for="viewComplaintDetailClosedDate" id="viewComplaintDetailClosedDateLabel" class="col-sm-1 col-form-label text-right text-info font-weight-normal" style="max-width: 70px; min-width: 60px;">Tgl</label>
                                                        <div class="col-sm" id="viewComplaintDetailClosedDateContainer">
                                                            <input type="date" class="form-control" id="viewComplaintDetailClosedDate" name="viewComplaintDetailClosedDate" value="<?= $detailComplaint['closed_on'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm" style="min-width: 95px; max-width: 100px">
                                                    <button type="submit" class="btn btn-info float-left">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal update keluhan -->
<div class="modal fade" id="viewComplaintDetailUpdateForm" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="viewComplaintDetailUpdateFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- <form action="<?= base_url('complaint/updateProgress') ?>" method="POST"> -->
            <?= form_open_multipart('complaint/updateProgress'); ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="viewComplaintDetailUpdateFormLabel">Update progress keluhan konsumen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="viewComplaintUpdateId" id="viewComplaintUpdateId" value="<?= $detailComplaint['id'] ?>">
                    <input type="hidden" name="viewComplaintUpdateClaimDescription" id="viewComplaintUpdateClaimDescription" value="<?= $detailComplaint['claim_description'] ?>">
                    <input type="hidden" name="viewComplaintUpdateClaimDate" id="viewComplaintUpdateClaimDate" value="<?= $detailComplaint['claim_date'] ?>">
                    <div class="form-group">
                        <label for="viewComplaintUpdateProgress">Progress Keluhan</label>
                        <small class="text-danger">(Tidak boleh ada karakter <b>'#'</b>)</small>
                        <textarea class="form-control" id="viewComplaintUpdateProgress" name="viewComplaintUpdateProgress" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="viewComplaintUpdateProgressStatus" class="">Status</label>
                        <select type="file" class="custom-select js-example-basic-single" id="viewComplaintUpdateProgressStatus" name="viewComplaintUpdateProgressStatus" <?= allowedDropdown($useraccess, $allowedAccess); ?>>
                            <option value="<?= $detailComplaint['claim_status'] ?>" selected><?= $detailComplaint['claim_status'] . ' - ' . $detailComplaint['claim_description'] ?></option>
                            <?php foreach ($complaintStatus as $row) : ?>
                                <option value="<?= $row['status'] ?>"><?= $row['status'] . ' - ' . $row['description'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="viewComplaintUpdateProgressEvidence" class="font-weight-normal">Evidence jika dibutuhkan <small class="text-danger">(PNG / JPG / PDF - maks. 1 MB)</small></label>
                        <input type="file" class="form-control" id="viewComplaintUpdateProgressEvidence" name="viewComplaintUpdateProgressEvidence">
                    </div>
                </div>
                <div class="modal-footer float-left">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal edit progress keluhan - CCC admin only -->
<div class="modal fade" id="editComplaintDetailUpdateForm" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="editComplaintDetailUpdateFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="<?= base_url('complaint/editProgress') ?>" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="editComplaintDetailUpdateFormLabel">Edit progress keluhan konsumen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="editComplaintUpdateId" id="editComplaintUpdateId" readonly value="<?= $detailComplaint['progress_id'] ?>">
                    <input type="hidden" class="form-control" name="editComplaintUpdateComplaintId" id="editComplaintUpdateComplaintId" readonly value="<?= $detailComplaint['id'] ?>">
                    <div class="form-group">
                        <label for="editComplaintUpdateProgress">Progress Keluhan</label>
                        <textarea class="form-control" id="editComplaintUpdateProgress" name="editComplaintUpdateProgress" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="editComplaintUpdateProgressStatus" class="">Status</label>
                        <select type="file" class="custom-select js-example-basic-single" id="editComplaintUpdateProgressStatus" name="editComplaintUpdateProgressStatus" <?= allowedDropdown($useraccess, $allowedAccess); ?>>
                            <option value="<?= $detailComplaint['claim_status'] ?>" selected><?= $detailComplaint['claim_status'] . ' - ' . $detailComplaint['claim_description'] ?></option>
                            <?php foreach ($complaintStatus as $row) : ?>
                                <option value="<?= $row['status'] ?>"><?= $row['status'] . ' - ' . $row['description'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer float-left">
                    <button type="submit" class="btn btn-primary" id="editComplaintUpdateSubmit" name="editComplaintUpdateSubmit">Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal respon request close -->
<div class="modal fade" id="viewComplaintDetailResponseRequestModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="viewComplaintDetailResponseRequestLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="<?= base_url('complaint/responserRequestClose') ?>" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewComplaintDetailUpdateFormLabel">Response/catatan Request Close</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="viewComplaintResponseRequestId" id="viewComplaintResponseRequestId" value="<?= $detailComplaint['id'] ?>">
                    <div class="form-group">
                        <label for="viewComplaintResponserRequestReason">Alasan complaint belum di-close</label>
                        <textarea class="form-control" id="viewComplaintResponserRequestReason" name="viewComplaintResponserRequestReason" rows="3"><?= $detailComplaint['response_request'] ?></textarea>
                    </div>
                </div>
                <div class="modal-footer float-left">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal update rootcause & countermeasure (NEW) -->
<div class="modal fade" id="updateRootcauseCountermeasure" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="updateRootcauseCountermeasureLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateRootcauseCountermeasureLabel">Update Root Cause & Countermeasure Keluhan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="complaintRootcauseId" id="complaintRootcauseId" readonly value="<?= $detailComplaint['id'] ?>">
                    <div class="form-group">
                        <label for="complaintRootcause">Root Cause</label>
                        <select class="js-example-tags form-control custom-select" id="complaintRootcause" name="complaintRootcause" required>
                            <option value="<?= $detailComplaint['rootcause'] ?>" selected><?= $detailComplaint['rootcause'] ?></option>
                            <?php foreach($complaintRootcause as $row) : ?>
                                <option value="<?= $row['rootcause'] ?>"><?= $row['rootcause'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="complaintCountermeasure">Countermeasure</label>
                        <select class="js-example-tags form-control custom-select" id="complaintCountermeasure" name="complaintCountermeasure" required>
                            <option value="<?= $detailComplaint['countermeasure'] ?>" selected><?= $detailComplaint['countermeasure'] ?></option>
                            <?php foreach($complaintCountermeasure as $row) : ?>
                                <option value="<?= $row['countermeasure'] ?>"><?= $row['countermeasure'] ?></option>
                            <?php endforeach; ?>
                        </select>                        
                    </div>
                </div>
                <div class="modal-footer float-left">
                    <button type="button" class="btn btn-primary" id="complaintRootcauseSubmit" name="complaintRootcauseSubmit">Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal tambah part -->
<div class="modal fade" id="modalAddPart" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document"> <div class="modal-content">
            <div class="modal-header text-info">
                <h5 class="modal-title">Tambah Kode Part</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formAddPart">
                <div class="modal-body">
                    <input type="hidden" name="complaint_id" value="<?= $detailComplaint['id'] ?>">
                    
                    <div id="part-container" class="border-bottom pb-3">
                        <div class="part-row mb-3 border-bottom pb-3">
                            <div class="form-row align-items-center">
                                <div class="form-group col-md-5 mb-0">
                                    <label class="small font-weight-bold">Reservasi/PO (jika belum ada)</label>
                                    <input type="text" name="complaintDetailAddPartReservation" id="complaintDetailAddPartReservation" class="form-control" placeholder="Contoh: 30737807 / 3703B2600041" required>
                                </div>
                            </div>
                        </div>
                        <div class="part-row mb-3">
                            <div class="form-row align-items-center">
                                <div class="form-group col-md-5 mb-0">
                                    <label class="small font-weight-bold">Tipe Part</label>
                                    <input type="text" name="part_type[]" class="form-control" placeholder="Contoh: Kompresor" required>
                                </div>
                                
                                <div class="form-group col-md-5 mb-0">
                                    <label class="small font-weight-bold">Kode Part</label>
                                    <input type="text" name="part_code[]" class="form-control" placeholder="Contoh: FCMPLA-xxx" required>
                                </div>
                                
                                <div class="form-group col-md-2 mb-0 pt-4"> <div class="pretty p-icon p-curve p-smooth p-bigger">
                                        <input type="hidden" name="part_isready[]" class="isready-value" value="0">
                                        <input type="checkbox" class="isready-check" checked />
                                        <div class="state p-info">
                                            <i class="icon fas fa-check"></i>
                                            <label class="text-dark">Ready di HQ</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <button type="button" class="btn btn-sm btn-outline-secondary mt-2" id="add-more-part">
                        <i class="fas fa-plus-circle"></i> Add Part
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link text-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-info" id="btnSavePart"><i class="fas fa-save"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>