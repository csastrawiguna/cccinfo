<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-fluid pt-2">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
        <?php
        require 'view-function.php';
        ?>

        <div class="card card-outline card-info">
            <div class="card-header">
                <span class="h6">Keluhan <span class="text-bold"><?= $params['category'] ?></span> : <span class="text-primary"><?= date("F Y", strtotime($params['startPeriod']));?> - <?= date("F Y", strtotime($params['endPeriod']));?> [<?= count($detaillists) ?> keluhan]</span></span>
                <div class="card-tools">
                </div>
            </div>

            <div class="card-body">
                <!-- For Waiting Part by Part List -->
                <?php if (!is_null($partlists)) : ?>
                    <div class="row mb-5">
                        <div class="col">
                            <p class="text-indigo lead">Berdasarkan Spare Part</p>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- By Branch List -->
                <div class="row mb-5">
                    <div class="col-md-8">
                        <p class="text-indigo lead">Berdasarkan PIC Report</p>

                        <!-- <table class="table table-sm table-responsive tableDatatableFullOption">
                            <thead>
                                <tr class="bg-light">
                                    <th>No</th>
                                    <th>PIC Report</th>
                                    <?php for ($a = 1; $a < count($tableHeader); $a++ ) : ?>
                                        <th class="text-right"><?= date("M-Y", strtotime($tableHeader[$a])) ?></th>
                                    <?php endfor; ?>
                                    <th class="text-center">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php for ($x = 0; $x < count($convertData) - 1; $x++) : ?>
                                    <?php if(count($convertData[$x]) > 1) : ?>
                                        <tr>
                                            <?php $subtotalByCategory = 0; ?>
                                            <td><?= $no++ ?></td>
                                            <td>
                                                <span class="linktoDetail" data-category="<?= $convertData[$x]['claim_description']?>" data-start="<?= $complaintSummaryStartPeriod ?>" data-end="<?= $complaintSummaryEndPeriod ?>">
                                                    <?= $convertData[$x]['pic_report_1'] ?>
                                                </span>
                                            </td>
                                            <?php for ($y = 1; $y < count($tableHeader); $y++) : ?>
                                                <td class="text-right">
                                                    <span class="linktoDetail" data-category="<?= $convertData[$x]['pic_report_1']?>" data-start="<?= $tableHeader[$y] ?>" data-end="<?= $tableHeader[$y] ?>">
                                                        <?= number_format($convertData[$x][$tableHeader[$y]], 0) ?>
                                                        <span class="text-info">
                                                            (<?= number_format($convertData[$x][$tableHeader[$y]] / $totalByMonth[$tableHeader[$y]], 2) *100 ?>%)
                                                        </span>
                                                    </span>
                                                </td>
                                            <?php endfor; ?>
                                            <td class="text-right">
                                                <span class="linktoDetail" data-category="<?= $convertData[$x]['pic_report_1']?>" data-start="<?= $complaintSummaryStartPeriod ?>" data-end="<?= $complaintSummaryEndPeriod ?>">
                                                    <span class=""><?= $convertData[$x]['ttl_bycategory'] ?></span>
                                                    <span class="text-info">(<?= number_format($convertData[$x]['ttl_bycategory'] / array_sum($totalByMonth), 2) *100 ?>%)</span>
                                                </span>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endfor; ?>
                                <tr class="font-weight-bold border-bottom bg-light">
                                    <td colspan="2" class="text-center">Total</td>
                                    <?php for ($y = 1; $y < count($tableHeader); $y++) : ?>
                                        <td class="text-right">
                                            <?= $totalByMonth[$tableHeader[$y]] ?>
                                            <span class="text-info font-weight-normal">(100%)</span>
                                        </td>
                                    <?php endfor; ?>    
                                    <?php for ($y = 0; $y < count($totalByMonth); $y++) : ?>
                                    <?php endfor; ?>
                                    <td class="text-right"><?= number_format(array_sum($totalByMonth), 0) ?> <span class="text-info font-weight-normal">(<?= number_format(array_sum($totalByMonth) / array_sum($totalByMonth), 3) * 100 ?>%)</span></td>
                                </tr>
                            </tbody>
                        </table> -->

                        <table class="table table-sm mt-1" id="tableComplaintByCategoryBranchlist">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>PIC Report</th>
                                    <th class="text-right">In Progress</th>
                                    <th class="text-right">Closed</th>
                                    <th class="text-right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $y = 1; ?>
                                <?php foreach($branchlists as $row) : ?>
                                    <tr>
                                        <td><?= $y++ ?></td>
                                        <td><?= $row['pic_report'] ?></td>
                                        <td class="text-right">
                                            <?= $row['in_progress'] ?>
                                            <span class="text-info">(<?= number_format($row['in_progress'] / ($row['case_closed'] + $row['in_progress']) * 100, 1) ?>%)</span>
                                        </td>
                                        <td class="text-right">
                                            <?= $row['case_closed'] ?>
                                            <span class="text-info">(<?= number_format($row['case_closed'] / ($row['case_closed'] + $row['in_progress']) * 100, 1) ?>%)</span>
                                        </td>
                                        <td class="text-right">
                                            <?= $row['in_progress'] + $row['case_closed'] ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Detail List -->
                <div class="row">
                    <div class="col">
                        <p class="text-indigo lead mb-1">Detail List Keluhan <?= $params['category'] ?></p>
                        <table class="table" id="tableComplaintList">
                            <thead class="">
                                <tr>
                                    <th class="align-middle">#</th>
                                    <th class="align-middle">Tgl</th>
                                    <th class="align-middle">TAT<br><small>(claim/notif)</small></th>
                                    <th class="align-middle">Jenis keluhan</th>
                                    <th class="align-middle">Customer</th>
                                    <th class="align-middle">Notif / unit</th>
                                    <th class="align-middle">Keluhan</th>
                                    <th class="align-middle">Action report</th>
                                    <th class="align-middle">PIC report</th>
                                    <th class="align-middle">Status</th>
                                    <th class="align-middle">...</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($detaillists as $row) : ?>
                                    <tr class="<?= isurgentToStyle($row['is_urgent'], $row['claim_status'], $row['claim_description']) ?>">
                                        <td>
                                            <small><?= $i++ ?></small>
                                        </td>
                                        <td>
                                            <small><?= date("d-M", strtotime($row['claim_date'])) ?></small>
                                            <br>
                                            <small class="text-muted">[<?= $row['claim_source'] ?>]</small>
                                        </td>
                                        <td>
                                            <?= stringTat($row['claim_tatclosed'], $row['claim_tat']);  ?> / 
                                            <?= stringTat($row['notif_tatclosed'], $row['notif_tat']);  ?>
                                        </td>
                                        <td>
                                            <!-- <?= $row['claim_category'] ?>
                                            <br>/ -->
                                            <?= stringLimiter20($row['claim_description']) ?>
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
                                            <p><?= isresponsedBranch($row['isresponsed_branch']) ?> <?= isresponsedSass($row['isresponsed_sass']) ?> <?= isresponsedSasshq($row['isresponsed_sasshq']) ?> <?= isresponsedPart($row['isresponsed_part']) ?></p>
                                        </td>
                                        <td>
                                            <?= statusToBadge($row['claim_status']) ?><br>
                                            <span class="badge badge-info font-weight-normal" title="<?= $row['status_desc'] ?>"><?= $row['claim_status'] ?></span>
                                        </td>
                                        <td>
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
                                                                    <?php if (in_array($this->session->userdata('useraccess'), $allowedAccess = [1, 9])) : ?>
                                                                        <p>
                                                                            <a href="<?= base_url() . 'complaint/edit/' . $row['id']; ?>" class="text-primary buttonComplaintEdit" target="_blank" title="Edit data">
                                                                                <i class="far fa-edit"></i> Edit data
                                                                            </a>
                                                                        </p>
                                                                    <?php endif; ?>
                                                                </td>
                                                            </tr>
                                                            <?php if (in_array($this->session->userdata('useraccess'), $allowedAccess = [1, 9])) : ?>
                                                                <tr class="border-top">
                                                                    <td class="py-2">
                                                                        <p>
                                                                            <a href="<?= base_url() . 'complaint/delete/' . $row['id']; ?>" class="text-danger buttonComplaintDelete" title="Delete data">
                                                                                <i class="fas fa-trash"></i> Delete data
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>