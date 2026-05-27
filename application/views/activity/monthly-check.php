<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="container-fluid pt-2">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
        <?php
        require 'activity-function.php';
        ?>
        <div class="card card-outline card-info">
            <div class="card-header">
                <span class="h6 text-primary">Cek Aktivitas CCC</span>                    
            </div>
            
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <form action="" class="form-row mb-5" method="post" style="width: 520px;">
                            <label for="activityDailyDateStart" class="col-sm-2">Period</label>
                            <div class="col-sm-4">
                                <input type="date" id="activityDailyDateStart" name="activityDailyDateStart" class="form-control" value="<?= $summaryStartPeriod ?>">
                            </div>
                            <div class="col-sm-4">
                                <input type="date" id="activityDailyDateEnd" name="activityDailyDateEnd" class="form-control" value="<?= $summaryEndPeriod ?>">
                            </div>                                
                            <div class="row ml-1">
                                <button type="submit" class="btn btn-outline-primary" id="activityDailySubmit" name="activityDailySubmit">Go</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h6 class="badge badge-secondary badge-pill">Transisi berdasarkan aktivitas</h6>
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Month</th>
                                    <th>Call</th>
                                    <th>Whatsapp</th>
                                    <th>Email</th>
                                    <th>Callback</th>
                                    <th>Conf.call</th>
                                    <th>Follow up</th>
                                    <th>Socmed</th>
                                    <th>Total</th>
                                    <th class="text-center">Work hours</th>
                                    <th class="text-center">Ave/hour</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($monthlyTransitionData as $row) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= date("M-Y", strtotime($row['month'])) ?></td>
                                        <td><?= number_format($row['icall'], 0) ?></td>
                                        <td><?= number_format($row['whatsapp'], 0) ?></td>
                                        <td><?= number_format($row['email'], 0) ?></td>
                                        <td><?= number_format($row['callback'], 0) ?></td>
                                        <td><?= number_format($row['confirmation_call'], 0) ?></td>
                                        <td><?= number_format($row['followup'], 0) ?></td>
                                        <td><?= number_format($row['socmed_inquiry'], 0) ?></td>
                                        <td><?= number_format($row['total'], 0) ?></td>
                                        <td class="text-center"><?= number_format($row['work_hour'], 0) ?></td>
                                        <td class="text-center"><?= number_format($row['total']/$row['work_hour'], 0) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <canvas id="chartActivityAllMonth" width="800" height="500"></canvas>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col">
                        <span class="badge badge-secondary badge-pill">Perbandingan jumlah hari yang sama : <span class="text-warning">tanggal 01 - <?= date("d", strtotime($endDate)) ?></span></span>
                        <table class="table table-sm mt-2">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Month</th>
                                    <th>Call</th>
                                    <th>Whatsapp</th>
                                    <th>Email</th>
                                    <th>Callback</th>
                                    <th>Conf.call</th>
                                    <th>Follow up</th>
                                    <th>Socmed</th>
                                    <th>Total</th>
                                    <th class="text-center">Work hours</th>
                                    <th class="text-center">Ave/hour</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($samedayTransition as $row) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= date("M-Y", strtotime($row['month'])) ?></td>
                                        <td><?= number_format($row['icall'], 0) ?></td>
                                        <td><?= number_format($row['whatsapp'], 0) ?></td>
                                        <td><?= number_format($row['email'], 0) ?></td>
                                        <td><?= number_format($row['callback'], 0) ?></td>
                                        <td><?= number_format($row['confirmation_call'], 0) ?></td>
                                        <td><?= number_format($row['followup'], 0) ?></td>
                                        <td><?= number_format($row['socmed_inquiry'], 0) ?></td>
                                        <td><?= number_format($row['total'], 0) ?></td>
                                        <td class="text-center"><?= number_format($row['work_hour'], 0) ?></td>
                                        <td class="text-center"><?= number_format($row['total']/$row['work_hour'], 0) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>                    
                <div class="row">
                    <div class="col-8">
                        <canvas id="chartActivitySameday" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
