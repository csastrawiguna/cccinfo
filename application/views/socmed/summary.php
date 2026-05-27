<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
        <?php
            if (!$this->input->post()) {
                $startPeriod = date("Y-m-01", strtotime("-6 months"));
                $endPeriod = date("Y-m-d");
            } else {
                $startPeriod = date('Y-m-01', strtotime($this->input->post('socmedSummaryStartPeriod')));
                $endPeriod = date('Y-m-d', strtotime($this->input->post('socmedSummaryEndPeriod')));
            }

            function channeltoIcon($channel) {
                if (strtolower($channel) == 'twitter') {
                    $icon = '<i class="fab fa-twitter text-info"></i>';
                } else if (strtolower($channel) == 'facebook') {
                    $icon = '<i class="fab fa-facebook text-primary"></i>';
                } else if (strtolower($channel) == 'instagram') {
                    $icon = '<i class="fab fa-instagram text-danger"></i>';
                } else {
                    $icon = '<i class="fas fa-file"></i>';
                }
                return $icon;
            }

            function convertZeroDivider($num, $divider) {
                $out = '';
                if ($divider == 0) {
                    $out = '-';
                } else {
                    $out = number_format($num / $divider * 100, 1) . '%';
                }
                return $out; 
            }

            $allowedAccess = [1, 9];
        ?>

        <div class="container-fluid pt-3">       
            <div class="card card-info card-outline">
                <div class="card-header">
                    <span class="text-info">Pertanyaan dari social media SHARP (<i class="fab fa-instagram"></i> Instagram, <i class="fab fa-facebook"></i> Facebook, <i class="fab fa-twitter"></i> Twitter)</span>
                    <div class="card-tools">
                        <a href="<?= base_url('Socmedinquiry/insert') ?>" class="pr-3 text-info"><i class="fas fa-plus-circle"></i> Insert data baru</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form method="post">
                            <div class="form-row"  style="min-width: 480px;">
                                <div class="col-sm-2">Periode</div>
                                <div class="col-sm-4 text-center">
                                    <input type="date" class="custom-select" name="socmedSummaryStartPeriod" id="socmedSummaryStartPeriod" value="<?= $startPeriod ?>">
                                </div>
                                <div class="col-sm-1 text-center">s/d</div>
                                <div class="col-sm-4 text-center">
                                    <input type="date" class="custom-select" name="socmedSummaryEndPeriod" id="socmedSummaryEndPeriod" value="<?= $endPeriod ?>">
                                </div>
                                <div class="col-sm-1 text-center">
                                    <button type="submit" class="btn btn-outline-info">Go</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <p class="h5 text-primary text-center">Pertanyaan dari Socmed period : <?= date("F Y", strtotime($startPeriod)) ?> - <?= date("F Y", strtotime($endPeriod)) ?></p>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-12">
                            <span class="bg-purple px-3">Berdasarkan channel socmed</span>
                            <table class="table table-sm table-responsive mt-2">
                                <thead>
                                    <tr class="bg-light">
                                        <th>No</th>
                                        <th>Social Media</th>
                                        <?php for ($a = 1; $a < count($tableHeader)-1; $a++ ) : ?>
                                            <th class="text-right"><?= date("M 'y", strtotime($tableHeader[$a])) ?></th>
                                        <?php endfor; ?>
                                        <th class="text-right">TTL by Channel</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; $subtotalByCategory = 0; $grandTotal = 0; ?>
                                    <?php for ($x = 0; $x < count($transitionDataBySocmed); $x++) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= channeltoIcon($transitionDataBySocmed[$x]['socmed_type']) . ' &nbsp;' . $transitionDataBySocmed[$x]['socmed_type'] ?></td>
                                            <?php for ($y = 1; $y < count($tableHeader)-1; $y++) : ?>
                                                <td class="text-right">
                                                    <?= number_format($transitionDataBySocmed[$x][$tableHeader[$y]], 0) ?>
                                                    <span class="text-info">(<?= number_format($transitionDataBySocmed[$x][$tableHeader[$y]] / $transitionSubtotal[$tableHeader[$y]] * 100, 1) ?>%)</span>
                                                </td>
                                            <?php endfor; ?>
                                            <?php $grandTotal += $transitionDataBySocmed[$x]['type_qty']; ?>
                                            <td class="text-right">
                                                <span class=""><?= $transitionDataBySocmed[$x]['type_qty'] ?></span>
                                                <span class="text-info">(<?= number_format(($transitionDataBySocmed[$x][$tableHeader[$y]] / $transitionSubtotal['type_qty']) * 100, 1) ?>%)</span>
                                            </td>
                                        </tr>
                                    <?php endfor; ?>
                                    <tr class="border-bottom">
                                        <td colspan="2" class="text-center text-bold">Total</td>
                                        <?php for ($y = 1; $y < count($tableHeader); $y++) : ?>
                                            <td class="text-right">
                                                <?= number_format($transitionSubtotal[$tableHeader[$y]], 0) ?>
                                                <span class="text-info">(<?= number_format(($transitionSubtotal[$tableHeader[$y]] / $transitionSubtotal[$tableHeader[$y]]) * 100, 1) ?>%)</span>
                                            </td>
                                        <?php endfor; ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="row mt-4">
                        <div class="col-sm-12">
                            <span class="bg-purple px-3">Transition by Inquiry</span>
                            <table class="table table-sm table-responsive mt-2">
                                <thead>
                                    <tr class="bg-light">
                                        <th>No</th>
                                        <th>Inquiry</th>
                                        <?php for ($a = 1; $a < count($tableHeader)-1; $a++ ) : ?>
                                            <th class="text-right"><?= date("M 'y", strtotime($tableHeader[$a])) ?></th>
                                        <?php endfor; ?>
                                        <th class="text-right">TTL Inquiry</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; $subtotalByCategory = 0; $grandTotal = 0; ?>
                                    <?php for ($x = 0; $x < count($transitionDataByInquiry); $x++) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $transitionDataByInquiry[$x]['inquiry_group'] ?></td>
                                            <?php for ($y = 1; $y < count($tableHeader)-1; $y++) : ?>
                                                <td class="text-right">
                                                    <?= number_format($transitionDataByInquiry[$x][$tableHeader[$y]], 0) ?>
                                                    <span class="text-info">(<?= number_format($transitionDataByInquiry[$x][$tableHeader[$y]] / $transitionSubtotal[$tableHeader[$y]] * 100, 1) ?>%)</span>
                                                </td>
                                            <?php endfor; ?>
                                            <?php $grandTotal += $transitionDataByInquiry[$x]['inquiry_qty']; ?>
                                            <td class="text-right">
                                                <span class=""><?= $transitionDataByInquiry[$x]['inquiry_qty'] ?></span>
                                                <span class="text-info">(<?= number_format(($transitionDataByInquiry[$x]['inquiry_qty'] / $transitionSubtotal['type_qty']) * 100, 1) ?>%)</span>
                                            </td>
                                        </tr>
                                    <?php endfor; ?>
                                    <tr class="border-bottom">
                                        <td colspan="2" class="text-center text-bold">Total</td>
                                        <?php for ($y = 1; $y < count($tableHeader); $y++) : ?>
                                            <td class="text-right">
                                                <?= number_format($transitionSubtotal[$tableHeader[$y]], 0) ?>
                                                <span class="text-info">(<?= number_format(($transitionSubtotal[$tableHeader[$y]] / $transitionSubtotal[$tableHeader[$y]]) * 100, 1) ?>%)</span>
                                            </td>
                                        <?php endfor; ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="row mt-4">
                        <div class="col-sm-12">
                            <span class="bg-purple px-3">Inquiry by Channel</span>
                            <table class="table table-sm table-responsive mt-2">
                                <thead>
                                    <tr class="bg-light">
                                        <th>No</th>
                                        <th>Inquiry</th>
                                        <th class="text-right"><i class="fab fa-instagram text-danger"></i> Instagram</th>
                                        <th class="text-right"><i class="fab fa-twitter text-info"></i> Twitter</th>
                                        <th class="text-right"><i class="fab fa-facebook text-primary"></i> Facebook</th>
                                        <th class="text-right"><i class="fas fa-file"></i> Others</th>
                                        <th class="text-right">TTL Inquiry</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach($inquiryBySocmedtype as $row) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $row['inquiry_group'] ?></td>
                                            <td class="text-right">
                                                <?= number_format($row['instagram'], 0) ?>
                                                <span class="text-info">(<?= number_format($row['instagram'] / $socmedtypeSubtotal['instagram'] * 100, 1) ?>%)</span>
                                            </td>
                                            <td class="text-right">
                                                <?= number_format($row['twitter'], 0) ?>
                                                <span class="text-info">(<?= number_format($row['twitter'] / $socmedtypeSubtotal['twitter'] * 100, 1) ?>%)</span>
                                            </td>
                                            <td class="text-right">
                                                <?= number_format($row['facebook'], 0) ?>
                                                <span class="text-info">(<?= number_format($row['facebook'] / $socmedtypeSubtotal['facebook'] * 100, 1) ?>%)</span>
                                            </td>
                                            <td class="text-right">
                                                <?= number_format($row['others'], 0) ?>
                                                <span class="text-info">(<?= convertZeroDivider($row['others'], $socmedtypeSubtotal['others']) ?>)</span>
                                            </td>
                                            <td class="text-right">
                                                <?= number_format($row['total_inquiry'], 0) ?>
                                                <span class="text-info">(<?= number_format($row['total_inquiry'] / $socmedtypeSubtotal['total'] * 100, 1) ?>%)</span>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <tr class="border-bottom">
                                        <td colspan="2" class="text-bold text-center">Total</td>
                                        <td class="text-right">
                                            <?= number_format($socmedtypeSubtotal['instagram'], 0) ?>
                                            <span class="text-info">(<?= number_format($socmedtypeSubtotal['instagram'] / $socmedtypeSubtotal['instagram'] * 100, 1) ?>%)</span>
                                        </td>
                                        <td class="text-right">
                                            <?= number_format($socmedtypeSubtotal['twitter'], 0) ?>
                                            <span class="text-info">(<?= number_format($socmedtypeSubtotal['twitter'] / $socmedtypeSubtotal['twitter'] * 100, 1) ?>%)</span>
                                        </td>
                                        <td class="text-right">
                                            <?= number_format($socmedtypeSubtotal['facebook'], 0) ?>
                                            <span class="text-info">(<?= number_format($socmedtypeSubtotal['facebook'] / $socmedtypeSubtotal['facebook'] * 100, 1) ?>%)</span>
                                        </td>
                                        <td class="text-right">
                                            <?= number_format($socmedtypeSubtotal['others'], 0) ?>
                                            <span class="text-info"> (<?= convertZeroDivider($socmedtypeSubtotal['others'], $socmedtypeSubtotal['others']) ?>)</span>
                                        </td>
                                        <td class="text-right">
                                            <?= number_format($socmedtypeSubtotal['total'], 0) ?>
                                            <span class="text-info">(<?= number_format($socmedtypeSubtotal['total'] / $socmedtypeSubtotal['total'] * 100, 1) ?>%)</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-sm-12">
                            <span class="bg-purple px-3">Transition By Agent</span>

                            <?php foreach ($agents as $agent) : ?>
                                <p class="lead mt-3 text-primary"><i class="fas fa-user"></i> <?= $agent['saved_by'] ?></p>
                                <table class="table table-sm table-responsive mt-2 mb-4">
                                    <thead>
                                        <tr class="bg-light">
                                            <th>No</th>
                                            <th>Social Media</th>
                                            <?php for ($a = 1; $a < count($tableHeader)-1; $a++ ) : ?>
                                                <th class="text-right"><?= date("M 'y", strtotime($tableHeader[$a])) ?></th>
                                            <?php endfor; ?>
                                            <th class="text-right">TTL by Channel</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; $subtotalByCategory = 0; $grandTotal = 0; ?>
                                        <?php for ($x = 0; $x < count($transitionByAgent); $x++) : ?>
                                            <?php if ($transitionByAgent[$x]['saved_by'] == $agent['saved_by']) : ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td class="col-sm-auto"><?= channeltoIcon($transitionByAgent[$x]['socmed_type']) . ' &nbsp;' . $transitionByAgent[$x]['socmed_type'] ?></td>
                                                    <?php for ($y = 1; $y < count($tableHeader)-1; $y++) : ?>
                                                        <td class="col-sm-auto text-right">
                                                            <?= number_format($transitionByAgent[$x][$tableHeader[$y]], 0) ?>
                                                            <span class="text-info">(<?= number_format($transitionByAgent[$x][$tableHeader[$y]] / $transitionSubtotal[$tableHeader[$y]] * 100, 1) ?>%)</span>
                                                        </td>
                                                    <?php endfor; ?>
                                                    <?php $grandTotal += $transitionByAgent[$x]['type_qty']; ?>
                                                    <td class="col-sm-auto text-right">
                                                        <span class=""><?= $transitionByAgent[$x]['type_qty'] ?></span>
                                                        <span class="text-info">(<?= number_format(($transitionByAgent[$x][$tableHeader[$y]] / $transitionSubtotal['type_qty']) * 100, 1) ?>%)</span>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endfor; ?>
                                    </tbody>
                                </table>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-sm">
                            <span class="bg-purple px-3">Daily Response</span>
                            <p class="text-primary mt-3">*) Same day = Responsed on same day</p>
                            <table class="table table-sm table-responsive mt-2 ">
                                <thead>
                                    <tr class="">
                                        <th rowspan="2" class="align-middle">Month</th>
                                        <th colspan="2"><i class="fab fa-instagram text-danger"></i> Instagram</th>
                                        <th colspan="2"><i class="fab fa-twitter text-info"></i> Twitter</th>
                                        <th colspan="2"><i class="fab fa-facebook text-primary"></i> Facebook</th>
                                        <th colspan="2"><i class="fas fa-file"></i> Others</th>
                                        <th colspan="2">Total</th>
                                    </tr>
                                    <tr class="">
                                        <td>In</td>
                                        <td>Same day</td>
                                        <td>In</td>
                                        <td>Same day</td>
                                        <td>In</td>
                                        <td>Same day</td>
                                        <td>In</td>
                                        <td>Same day</td>
                                        <td>In</td>
                                        <td>Same day</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($responseSameDay as $row) : ?>
                                        <tr>
                                            <td><?= date("M Y", strtotime($row['month'])) ?></td>
                                            <td class=""><?= number_format($row['instagram'], 0) ?></td>
                                            <td class="">
                                                <?= number_format($row['instagram_same'],0) ?>
                                                <span class="text-info"><small>(<?= convertZeroDivider($row['instagram_same'], $row['instagram']) ?></small>)</span>
                                            </td>
                                            <td class=""><?= number_format($row['twitter'], 0) ?></td>
                                            <td class="">
                                                <?= number_format($row['twitter_same'],0) ?>
                                                <span class="text-info"><small>(<?= convertZeroDivider($row['twitter_same'], $row['twitter']) ?>)</small></span>
                                            </td>
                                            <td class=""><?= number_format($row['facebook'], 0) ?></td>
                                            <td class="">
                                                <?= number_format($row['facebook_same'],0) ?>
                                                <span class="text-info"><small>(<?= convertZeroDivider($row['facebook_same'], $row['facebook']) ?>)</small></span>
                                            </td>
                                            <td class=""><?= number_format($row['others'], 0) ?></td>
                                            <td class="">
                                                <?= number_format($row['others_same'],0) ?>
                                                <span class="text-info"><small>(<?= convertZeroDivider($row['others_same'], $row['others']) ?>)</small></span>
                                            </td>
                                            <td class=""><?= number_format($row['total'], 0) ?></td>
                                            <td class="">
                                                <?= number_format($row['total_same'],0) ?>
                                                <span class="text-info"><small>(<?= convertZeroDivider($row['total_same'], $row['total']) ?>)</small></span>
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
    </section>
</div>