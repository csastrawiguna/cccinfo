<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>

        <div class="container-fluid pt-3">
            <div class="card card-outline card-info">
                <div class="card-header">                            
                    <span class="text-primary">Summary Follow Up Manual SASS</span>                    
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>Follow Up Result</th>
                                        <th class="text-right">Qty</th>
                                        <th class="text-right">%</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach($resultSummary as $row) : ?>
                                        <tr>
                                            <td class="text-center"><?= $i++ ?></td>
                                            <td><?= ucwords($row['followup_status']) ?></td>
                                            <td class="text-right"><?= number_format($row['qty'], 0) ?></td>
                                            <td class="text-right"><?= number_format($row['qty'] / $totalData[0]['qty'] * 100, 1) ?>%</td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <tr class="text-bold">
                                        <td colspan="2" class="text-center">Total</td>
                                        <td class="text-right"><?= number_format($totalData[0]['qty'], 0) ?></td>
                                        <td class="bg-light"></td>
                                    </tr>
                                </tbody>
                            </table>                            
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <p class="text-indigo text-bold">By SASS</p>
                            <table class="table table-sm table-bordered col-sm-12">
                                <thead>
                                    <tr>
                                        <th rowspan="2" class="align-middle">No</th>
                                        <th rowspan="2" class="align-middle text-center">SASS</th>
                                        <th rowspan="2" class="align-middle text-center">Agent</th>
                                        <th rowspan="2" class="align-middle text-center">Total data</th>
                                        <th colspan="6" class="text-center">Follow Up Result</th>
                                        <th rowspan="2" class="align-middle text-center">Sisa data</th>
                                        <th rowspan="2" class="align-middle text-center">% FU</th>
                                    </tr>
                                    <tr class="text-center">
                                        <th class="align-middle">Answered</th>
                                        <th class="align-middle">Not picked up</th>
                                        <th class="align-middle">Not active</th>
                                        <th class="align-middle">Out of coverage</th>
                                        <th class="align-middle">Wrong number</th>
                                        <th class="align-middle">Invalid Phone</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach($resultBySass as $row) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $row['sass_id'] . ' - ' . ucwords($row['sass_name']) ?></td>
                                            <td class=""><?= $row['agent'] ?></td>
                                            <td class="text-center"><?= number_format($row['sass_qty'],0) ?></td>
                                            <td class="text-center"><?= number_format($row['answered'], 0) ?></td>
                                            <td class="text-center"><?= number_format($row['not_picked_up'], 0) ?></td>
                                            <td class="text-center"><?= number_format($row['inactive'], 0) ?></td>
                                            <td class="text-center"><?= number_format($row['out_of_service_area'], 0) ?></td>
                                            <td class="text-center"><?= number_format($row['wrong_number'], 0) ?></td>
                                            <td class="text-center"><?= number_format($row['invalid_phone'], 0) ?></td>
                                            <td class="text-center"><?= number_format($row['new'], 0) ?></td>
                                            <td class="text-center"><?= number_format(($row['sass_qty'] - $row['new']) / $row['sass_qty'] * 100, 1) ?>%</td>

                                        </tr>
                                    <?php endforeach; ?>
                                    <tr class="text-bold">
                                        <td colspan="3" class="text-center">Total</td>
                                        <td class="text-center"><?= number_format($resultBySassSum['sass_qty'],0) ?></td>
                                        <td class="text-center">
                                            <?= number_format($resultBySassSum['answered'],0) ?><br>
                                            (<?= number_format($resultBySassSum['answered'] / $resultBySassSum['sass_qty'] * 100, 1) ?>%)
                                        </td>
                                        <td class="text-center"><?= number_format($resultBySassSum['not_picked_up'],0) ?><br>
                                            (<?= number_format($resultBySassSum['not_picked_up'] / $resultBySassSum['sass_qty'] * 100, 1) ?>%)</td>
                                            <td class="text-center"><?= number_format($resultBySassSum['inactive'],0) ?><br>
                                            (<?= number_format($resultBySassSum['inactive'] / $resultBySassSum['sass_qty'] * 100, 1) ?>%)</td>
                                        <td class="text-center"><?= number_format($resultBySassSum['out_of_service_area'],0) ?><br>
                                            (<?= number_format($resultBySassSum['out_of_service_area'] / $resultBySassSum['sass_qty'] * 100, 1) ?>%)</td>
                                        <td class="text-center"><?= number_format($resultBySassSum['wrong_number'],0) ?><br>
                                            (<?= number_format($resultBySassSum['wrong_number'] / $resultBySassSum['sass_qty'] * 100, 1) ?>%)</td>
                                        <td class="text-center"><?= number_format($resultBySassSum['invalid_phone'],0) ?><br>
                                            (<?= number_format($resultBySassSum['invalid_phone'] / $resultBySassSum['sass_qty'] * 100, 1) ?>%)</td>
                                        <td class="text-center"><?= number_format($resultBySassSum['new'],0) ?><br>
                                            (<?= number_format($resultBySassSum['new'] / $resultBySassSum['sass_qty'] * 100, 1) ?>%)</td>
                                        <td colspan="2" class="bg-light"></td>
                                    </tr>
                                </tbody>
                            </table>   
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col">
                            <p class="text-indigo text-bold">By Agent</p>
                            <table class="table table-sm table-bordered col-sm-12">
                                <thead>
                                    <tr>
                                        <th rowspan="2" class="align-middle">No</th>
                                        <th rowspan="2" class="align-middle text-center">Agent</th>
                                        <th rowspan="2" class="align-middle text-center">Total data</th>
                                        <th colspan="6" class="text-center">Follow Up Result</th>
                                        <th rowspan="2" class="align-middle text-center">Sisa data</th>
                                        <th rowspan="2" class="align-middle text-center">% FU</th>
                                    </tr>
                                    <tr class="text-center">
                                        <th class="align-middle">Answered</th>
                                        <th class="align-middle">Not picked up</th>
                                        <th class="align-middle">Not active</th>
                                        <th class="align-middle">Out of coverage</th>
                                        <th class="align-middle">Wrong number</th>
                                        <th class="align-middle">Invalid Phone</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach($resultByAgent as $row) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= ucwords($row['agent']) ?></td>
                                            <td class="text-center"><?= number_format($row['agent_qty'],0) ?></td>
                                            <td class="text-center"><?= number_format($row['answered'], 0) ?></td>
                                            <td class="text-center"><?= number_format($row['not_picked_up'], 0) ?></td>
                                            <td class="text-center"><?= number_format($row['inactive'], 0) ?></td>
                                            <td class="text-center"><?= number_format($row['out_of_service_area'], 0) ?></td>
                                            <td class="text-center"><?= number_format($row['wrong_number'], 0) ?></td>
                                            <td class="text-center"><?= number_format($row['invalid_phone'], 0) ?></td>
                                            <td class="text-center"><?= number_format($row['new'], 0) ?></td>
                                            <td class="text-center"><?= number_format(($row['agent_qty'] - $row['new']) / $row['agent_qty'] * 100, 1) ?>%</td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <tr class="text-bold">
                                        <td colspan="2" class="text-center">Total</td>
                                        <td class="text-center"><?= number_format($resultBySassSum['sass_qty'],0) ?></td>
                                        <td class="text-center">
                                            <?= number_format($resultBySassSum['answered'],0) ?><br>
                                            (<?= number_format($resultBySassSum['answered'] / $resultBySassSum['sass_qty'] * 100, 1) ?>%)
                                        </td>
                                        <td class="text-center"><?= number_format($resultBySassSum['not_picked_up'],0) ?><br>
                                            (<?= number_format($resultBySassSum['not_picked_up'] / $resultBySassSum['sass_qty'] * 100, 1) ?>%)</td>
                                            <td class="text-center"><?= number_format($resultBySassSum['inactive'],0) ?><br>
                                            (<?= number_format($resultBySassSum['inactive'] / $resultBySassSum['sass_qty'] * 100, 1) ?>%)</td>
                                        <td class="text-center"><?= number_format($resultBySassSum['out_of_service_area'],0) ?><br>
                                            (<?= number_format($resultBySassSum['out_of_service_area'] / $resultBySassSum['sass_qty'] * 100, 1) ?>%)</td>
                                        <td class="text-center"><?= number_format($resultBySassSum['wrong_number'],0) ?><br>
                                            (<?= number_format($resultBySassSum['wrong_number'] / $resultBySassSum['sass_qty'] * 100, 1) ?>%)</td>
                                        <td class="text-center"><?= number_format($resultBySassSum['invalid_phone'],0) ?><br>
                                            (<?= number_format($resultBySassSum['invalid_phone'] / $resultBySassSum['sass_qty'] * 100, 1) ?>%)</td>
                                        <td class="text-center"><?= number_format($resultBySassSum['new'],0) ?><br>
                                            (<?= number_format($resultBySassSum['new'] / $resultBySassSum['sass_qty'] * 100, 1) ?>%)</td>
                                        <td class="bg-light"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-8">
                            <p class="text-indigo text-bold">By Date (exclude New & Not Picked Up)</p>
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Ayunda</th>
                                        <th>Dina</th>
                                        <th>Dinty</th>
                                        <th>Firas</th>
                                        <th>Okti</th>
                                        <th>Tegar</th>
                                        <th>Zardi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach($resultByDate as $row) : ?>
                                        <tr>
                                            <td class="text-center"><?= $i++ ?></td>
                                            <td class="text-center"><?= date("d M Y", strtotime($row['fudate'])) ?></td>
                                            <td class="text-center"><?= $row['Ayunda'] ?></td>
                                            <td class="text-center"><?= $row['Dina'] ?></td>
                                            <td class="text-center"><?= $row['Dinty'] ?></td>
                                            <td class="text-center"><?= $row['Firas'] ?></td>
                                            <td class="text-center"><?= $row['Okti'] ?></td>
                                            <td class="text-center"><?= $row['Tegar'] ?></td>
                                            <td class="text-center"><?= $row['Zardi'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>                
        </div>
    </section>
</div>