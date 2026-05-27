<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="container-fluid pt-2">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
        <?php require 'view-function.php'; ?>
        <div class="card card-outline card-info">
            <div class="card-header">
                <span class="h6 text-info">Rasio Forward Keluhan & Summary Update Per Hari</span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <form class="mb-4" method="post" action="">
                            <div class="form-row">
                                <label class="col-sm-auto mr-3 form-check-label" for="autoSizingCheck">
                                    Pilih bulan
                                </label>
                                <div class="col-auto col-sm-auto">
                                    <input type="date" class="form-control px-4" id="complaintCountRatioSelectPeriod" name="complaintCountRatioSelectPeriod" value="<?= $period ?>">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-outline-primary" id="complaintCountRatioSubmit" name="complaintCountRatioSubmit">Go</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <?php if(in_array($this->session->userdata('useraccess'), $allowedAccess)) : ?>
                    <div class="row">
                        <div class="col-8">
                            <table class="table table-sm">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Hari</th>
                                        <th>Tanggal</th>
                                        <th>TTL keluhan</th>
                                        <th>Forward hari yg sama</th>
                                        <th>Rasio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($dailyRatio as $row) : ?>
                                        <tr class="text-center">
                                            <td><?= $i++; ?></td>
                                            <td><?= $dayList[date("D", strtotime($row['claim_date']))]; ?></td>
                                            <td><?= date("d M Y", strtotime($row['claim_date'])); ?></td>
                                            <td><?= $row['claim_qty']; ?></td>
                                            <td><?= $row['forward_sameday']; ?></td>
                                            <td><?= number_format($row['daily_ratio'] * 100, 1); ?>%</td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <tr class="text-center text-bold border-bottom bg-light">
                                        <td></td>
                                        <td colspan="2">Total</td>
                                        <td><?= $dailyRatioOneMonth['claim_qty'] ?></td>
                                        <td><?= $dailyRatioOneMonth['forward_sameday'] ?></td>
                                        <td><?= number_format($dailyRatioOneMonth['daily_ratio'] * 100, 1) ?>%</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="row mt-3">
                    <div class="col-6">
                        <?php for ($x = 0; $x < count($listUpdater); $x++) : ?>
                            <h6 class="badge badge-info badge-pill px-3 py-1 mb-1">Update Keluhan - <span style="color:yellow;"><?= $listUpdater[$x]['updated_by'] ?></span></h6>
                            <table class="table table-sm mb-4">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Hari</th>
                                        <th>Tanggal</th>
                                        <th>TTL update</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($dailyUpdate as $row) : ?>
                                        <?php if ($row['updated_by'] == $listUpdater[$x]['updated_by']) : ?>
                                            <tr class="text-center">
                                                <td><?= $i++ ?></td>
                                                <td><?= $row['updated_by'] ?></td>
                                                <td><?= $dayList[date("D", strtotime($row['update_date']))] ?></td>
                                                <td><?= date("d M Y", strtotime($row['update_date'])) ?></td>
                                                <td><?= $row['update_qty'] ?></td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

