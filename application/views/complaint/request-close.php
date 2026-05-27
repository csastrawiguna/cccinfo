<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="container-fluid pt-2">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
        <?php require 'view-function.php'; ?>
        <div class="card card-outline card-info">
            <div class="card-header">
                <span class="h6 text-info">Daftar Request Close Keluhan : <span class="text-danger"><b><?= count($requestCloseList) ?></b></span> data</span>
            </div>

            <div class="card-body">                
                <div class="row">
                    <div class="col">
                        <table class="table table-sm" id="tableComplaintRequestClose">
                            <thead>
                                <tr>
                                    <th class="align-middle">#</th>
                                    <th class="align-middle">Tgl claim/<br>TAT</th>
                                    <th class="align-middle">Kategori / Desc.</th>
                                    <th class="align-middle">Customer</th>
                                    <th class="align-middle">Notif / unit</th>
                                    <th class="align-middle">Keluhan</th>
                                    <th class="align-middle">Action report</th>
                                    <th class="align-middle">PIC report</th>
                                    <th class="align-middle">Req. by</th>
                                    <th class="align-middle">Status</th>
                                    <th class="align-middle">...</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(count($requestCloseList) < 1) : ?>
                                    <tr>
                                        <td colspan="11" class="text-center py-3 text-muted">No Data</td>
                                    </tr>
                                <?php else : ?>
                                    <?php $i = 1; ?>
                                    <?php foreach ($requestCloseList as $row) : ?>
                                        <tr class="<?= isurgentToStyle($row['is_urgent'], $row['claim_status'], $row['claim_description']) ?>">
                                            <td>
                                                <small><?= $i++ ?></small>
                                            </td>
                                            <td>
                                                <small><?= date("d-M", strtotime($row['claim_date'])) ?></small>
                                                <br>
                                                <small class="text-muted">[<?= $row['claim_source'] ?>]</small>
                                                <br>
                                                <?= stringTat($row['claim_tatclosed'], $row['claim_tat']); ?> / 
                                                <?= stringTat($row['notif_tatclosed'], $row['notif_tat']); ?>
                                            </td>
                                            <td>
                                                <!-- <?= $row['claim_category'] ?>
                                                <br>/ -->
                                                <!-- <?= stringLimiter20($row['claim_description']) ?> -->
                                                <?= $row['claim_description'] ?>
                                                <br>
                                                <small class="text-muted"><?= $row['part1_code'] ?></small><br>
                                                <small class="text-muted"><?= $row['part2_code'] ?></small><br>
                                                <small class="text-muted"><?= $row['part3_code'] ?></small>
                                            </td>
                                            <td>
                                                <?= $row['customer_name'] ?>
                                                <br>
                                                <small class="text-muted"><?= substr($row['customer_phone'], 0, 13) ?> ...</small>
                                            </td>
                                            <td>
                                                <?= $row['notification'] ?>
                                                <br>
                                                <small><?= $row['model'] ?></small>
                                                <br>
                                                <small><?= $row['product_category'] ?></small>
                                            </td>
                                            <td><?= substr($row['claim_detail'], 0, 80) ?> ...</td>
                                            <td><?= progressToArray($row['progress']) ?> </td>
                                            <td>
                                                <?= cekNullPicReport($row['pic_report_1'], $row['pic_report_2']) ?>
                                            </td>
                                            <td>
                                                <?= $row['propose_close_by']; ?><br>
                                                <small>[<?= date("d-M H:i", strtotime($row['propose_close_at'])); ?>]</small>
                                                <span class="requestInfoSign" data-by="<?= $row['responsed_by'] . ' [' . date("d M", strtotime($row['responsed_at'])) . ']' ?>" data-message="<?= $row['response_request'] ?>" data-notif="<?= $row['notification'] ?>">
                                                    <?= responseRequest($row['response_request']) ?>
                                                </span>
                                            </td>
                                            <td class="text-center"><?= statusToBadge($row['claim_status']) ?><br><span class="badge badge-info font-weight-normal" title="<?= $row['status_desc'] ?>"><?= $row['claim_status'] ?></span></td>
                                            <td>
                                                <div>
                                                    <a href="<?= base_url() . 'complaint/view/' . $row['id']; ?>" class="text-primary buttonComplaintEdit" target="_blank" title="View detail">
                                                        <i class="fas fa-search"></i>
                                                    </a>
                                                </div>
                                                <div class="btn-group">
                                                    <i class="fas fa-bars" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;"></i>
                                                    <div class="dropdown-menu dropdown-menu-right p-2" style="min-width: 420px;">
                                                        <table class="table table-sm table-borderless table-hover">
                                                            <tbody>
                                                                <tr>
                                                                    <td>Reservasi part</td>
                                                                    <td class="">: <?= $row['part_reservation']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Under cabang</td>
                                                                    <td class="">: <?= $row['under_branch']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Regional area</td>
                                                                    <td class="">: <?= $row['regional_area']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Agent penerima keluhan</td>
                                                                    <td class="">: <?= $row['agent']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2" class="border-bottom"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Disimpan oleh</td>
                                                                    <td class="">: <?= $row['saved_by']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Disimpan pada</td>
                                                                    <td class="">: <?= toStringDatetime($row['saved_at']); ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Update oleh</td>
                                                                    <td>: <?= $row['updated_by']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Update pada</td>
                                                                    <td>: <?= toStringDatetime($row['updated_at']); ?></td>
                                                                </tr>
                                                                <!-- <tr>
                                                                    <td colspan="2" class="border-bottom"></td>
                                                                </tr>
                                                                <tr class="text-indigo">
                                                                    <td>Diajukan close oleh</td>
                                                                    <td>: <?= $row['propose_close_by']; ?></td>
                                                                </tr>
                                                                <tr class="text-indigo">
                                                                    <td>Diajukan close pada</td>
                                                                    <td>: <?= toStringDatetime($row['propose_close_at']); ?></td>
                                                                </tr> -->
                                                            </tbody>
                                                        </table>
                                                        <table class="table table-sm table-borderless">
                                                            <tbody>
                                                                <tr class="border-top">
                                                                    <td class="py-2">
                                                                        <p>
                                                                            <a href="<?= base_url() . 'complaint/view/' . $row['id']; ?>" class="text-primary buttonComplaintEdit" target="_blank" title="View detail">
                                                                                <i class="fas fa-search"></i> View detail / <i class="fas fa-plus-circle"></i> Update progress
                                                                            </a>
                                                                        </p>                                                                    
                                                                    </td>
                                                                </tr>
                                                                <?php if (in_array($this->session->userdata('useraccess'), $allowedAccess = [1, 9])) : ?>
                                                                    <tr class="border-top">
                                                                        <td class="py-2">
                                                                            <p>
                                                                                <a href="<?= base_url() . 'complaint/rejectProposeClose/' . $row['id']; ?>" class="text-danger buttonRejectRequestClose" title="Dismiss/reject request close">
                                                                                    <i class="fas fa-trash"></i> Reject
                                                                                </a>
                                                                            </p>
                                                                        </td>
                                                                    </tr>
                                                                <?php endif; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>