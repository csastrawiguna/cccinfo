<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-fluid pt-2">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
        <?php
            require 'view-function.php';
        ?>

        <div class="card card-outline card-info">
            <div class="card-header">
                <span class="h6 text-primary">Daftar Update Semua Keluhan <span class="badge badge-info"> <?= count($updateList) ?> </span> | Keluhan Closed: <span class="badge badge-success"><?= $updateListClosed ?></span></span>
                <div class="card-tools">
                    <a href="#" class="text-info mr-3" data-criteria="" data-qty="" id="btnDismissComplaintUpdateMarked" style="display: none;"><i class="fas fa-check-square"></i> Clear Selected</a>
                    <a href="#" class="text-info mr-3 btnComplaintDismissUpdate" data-criteria="50" data-qty="<?= $updateListClosed ?>" id="btnComplaintDismissClosed"><i class="far fa-eye-slash"></i> Clear Closed</a>
                    <a href="#" class="text-info mr-3 btnComplaintDismissUpdate" data-criteria="" data-qty="<?= count($updateList) ?>" id="btnComplaintDismissAll"><i class="fas fa-trash"></i> Clear All</a>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <table class="table" id="tableComplaintList">
                            <thead class="">
                                <tr>
                                    <th class="align-middle">#</th>
                                    <th class="align-middle" style="max-width: 20px;">
                                        <div class="pretty p-default">
                                            <input type="checkbox" id="buttonSelectComplaintAllUpdateList" value="" data-allqty="<?= count($updateList) ?>" >
                                            <div class="state p-danger">
                                                <label></label>
                                            </div>
                                        </div>
                                    </th>
                                    <th class="align-middle">Tgl Keluhan</th>
                                    <th class="align-middle">Kategori / Desc.</th>
                                    <th class="align-middle">Customer</th>
                                    <th class="align-middle">Notif / unit</th>
                                    <th class="align-middle">PIC report</th>
                                    <th class="align-middle text-center">Status</th>
                                    <th class="align-middle">Detail Progress</th>
                                    <th class="align-middle">Update oleh</th>
                                    <th class="align-middle">Tgl update</th>
                                    <th class="align-middle">...</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($updateList as $row) : ?>
                                    <tr class="<?= isurgentToStyle($row['is_urgent'], $row['status_code'], $row['claim_description']) ?>">
                                        <td>
                                            <small><?= $i++ ?></small>
                                        </td>
                                        <td>
                                            <div class="pretty p-default">
                                                <input type="checkbox" class="buttonSelectDismissComplaintUpdate" value="<?= $row['progress_id'] ?>">
                                                <div class="state p-warning">
                                                    <label></label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <small><?= date("d-M-y", strtotime($row['claim_date'])) ?></small>
                                        </td>
                                        <td>
                                            <!-- <?= $row['claim_category'] ?>
                                            <br>/ -->
                                            <!-- <?= stringLimiter12($row['claim_description']) ?> -->
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
                                        </td>
                                        <td>
                                            <small><?= cekNullPicReport($row['pic_report_1'], $row['pic_report_2']) ?></small>
                                        </td>
                                        <td class="text-center"><?= statusToBadge($row['status_code']) ?><?= proposeCloseToBadge($row['propose_close']) ?></td>
                                        <td class="" style="color: rgb(0, 0, 160); background-color: rgb(250, 250, 245);"><?= $row['progress_update'] ?></td>
                                        <td style="background-color: rgb(250, 250, 245);"><?= $row['updated_by'] ?></td>
                                        <td><small><?= date("d-M-y H:i", strtotime($row['updated_at'])) ?></small></td>
                                        <td>
                                            <div>
                                                <a href="<?= base_url() . 'complaint/view/' . $row['id']; ?>" class="buttonComplaintEdit" target="_blank" title="View detail atau update progress">
                                                    <i class="fas fa-search"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>