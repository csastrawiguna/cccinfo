<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-fluid pt-2">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
        <?php
            require 'view-function.php'; 
        ?>
        <div class="card card-outline card-info">
            <div class="card-header">
                <span class="h6 text-info">Summary Keluhan Konsumen</span>
            </div>
            <div class="card-body">
                <div style="display: none;" id="dailyComplaintContainer"><?= $dailyComplaint ?></div>
                <div class="row">
                    <div class="col">
                        <form class="mb-4" method="post" action="">
                            <div class="form-row">
                                <div class="form-group col-md-5" style="min-width: 350px; max-width: 370px;">
                                    <label for="complaintSummaryStartPeriod">Periode</label>
                                    <div class="row">
                                        <div class="col-auto">
                                            <input type="date" class="form-control" id="complaintSummaryStartPeriod" name="complaintSummaryStartPeriod" value="<?= $complaintSummaryStartPeriod ?>" style="max-width: 150px;">
                                        </div>
                                        <div class="col-auto text-center">-</div>
                                        <div class="col-auto">
                                            <input type="date" class="form-control" id="complaintSummaryEndPeriod" name="complaintSummaryEndPeriod" value="<?= $complaintSummaryEndPeriod ?>" style="max-width: 150px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="complaintSummarySelectRegion">Region</label>
                                    <select type="date" class="custom-select" id="complaintSummarySelectRegion" name="complaintSummarySelectRegion" value="<?php  ?>">
                                        <option value="<?= $params['summary_regional'] ?>" selected><?= $params['summary_regional'] ?></option>
                                        <?php if (in_array($this->session->userdata('useraccess'), $allowedAccessAll)) : ?>
                                            <!-- <option value="<?= $filterRegionalSummary ?>"><?= $filterRegionalSummary ?></option> -->
                                            <option value="Jakarta">Jakarta</option>
                                            <option value="Jawa Bali">Jawa Bali</option>
                                            <option value="Sumatera">Sumatera</option>
                                            <option value="Kalimantan Sulawesi">Kalimantan & Sulawesi</option>
                                        <?php else : ?>
                                            <option value="<?= $params['summary_regional'] ?>"><?= $params['summary_regional'] ?></option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-2 ml-3">
                                    <label for="complaintSummarySelectBranch">Cabang</label>
                                    <select type="date" class="custom-select" id="complaintSummarySelectBranch" name="complaintSummarySelectBranch">
                                        <option value="<?= $underBranch ?>" selected><?= $underBranch ?></option>
                                        <?php if ($this->session->userdata('useraccess') == '5') { ?>
                                            <?php foreach ($params['under_branch_list'] as $row) : ?>
                                                <option value="<?= $row['under_branch'] ?>"><?= $row['under_branch'] ?></option>
                                            <?php endforeach; ?>
                                        <?php } else if ($this->session->userdata('useraccess') == '3' || $this->session->userdata('useraccess') == '4') { ?>
                                            <option value="<?= $underBranch ?>" selected><?= $underBranch ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="complaintSummaryBranchOrder">Order List</label>
                                    <select type="date" class="custom-select" id="complaintSummaryBranchOrder" name="complaintSummaryBranchOrder">
                                        <option value="<?= $params['orderByShow'] ?>" selected><?= $params['orderByShow'] ?></option>
                                        <option value="Complaint Qty">Complaint Qty</option>
                                        <option value="% Closed">% Closed</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-1" style="max-width: 40px;">
                                    <label for="complaintSummarySubmit" style="color: rgba(255,255,255,0)">xxx</label>
                                    <button type="submit" class="btn btn-outline-primary px-3" name="complaintSummarySubmit">Go</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Transition by all -->
                <div class="row">
                    <div class="col">
                        <h6 class="badge badge-info badge-pill px-2">Transisi per bulan - <span style="color: yellow">all data</span></h6>
                        <table class="table table-sm col-6">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Bulan</th>
                                    <!-- <th>Keluhan Baru</th> -->
                                    <th>In progress</th>
                                    <th>Case close</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($complaintSummary as $row) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= date("M Y", strtotime($row['month'])) ?></td>
                                        <!-- <td>
                                            <?= number_format($row['new'], 0) ?>
                                            <span class="text-info">(<?= number_format($row['new'] / ($row['case_close'] + $row['in_progress'] + $row['new']) * 100, 1) ?>%)</span>
                                        </td> -->
                                        <td>
                                            <?= number_format($row['in_progress'], 0) ?>
                                            <span class="text-info">(<?= number_format($row['in_progress'] / ($row['case_close'] + $row['in_progress'] + $row['new']) * 100, 1) ?>%)</span>
                                        </td>
                                        <td>
                                            <?= number_format($row['case_close'], 0) ?>
                                            <span class="text-info">(<?= number_format($row['case_close'] / ($row['case_close'] + $row['in_progress'] + $row['new']) * 100, 1) ?>%)</span>
                                        </td>
                                        <td>
                                            <?= number_format($row['case_close'] + $row['in_progress'] + $row['new'], 0) ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <tr class="text-bold border-bottom">
                                    <td colspan="2" class="text-center">Total</td>
                                    <!-- <td>
                                        <?= number_format($complaintSummarySubtotal['new'], 0) ?>
                                        <span class="text-info">(<?= number_format($complaintSummarySubtotal['new'] / ($complaintSummarySubtotal['case_close'] + $complaintSummarySubtotal['in_progress'] + $complaintSummarySubtotal['new']) * 100, 1) ?>%)</span>
                                    </td> -->
                                    <td>
                                        <?= number_format($complaintSummarySubtotal['in_progress'], 0) ?>
                                        <span class="text-info">(<?= number_format($complaintSummarySubtotal['in_progress'] / ($complaintSummarySubtotal['case_close'] + $complaintSummarySubtotal['in_progress'] + $complaintSummarySubtotal['new']) * 100, 1) ?>%)</span>
                                    </td>
                                    <td>
                                        <?= number_format($complaintSummarySubtotal['case_close'], 0) ?>
                                        <span class="text-info">(<?= number_format($complaintSummarySubtotal['case_close'] / ($complaintSummarySubtotal['case_close'] + $complaintSummarySubtotal['in_progress'] + $complaintSummarySubtotal['new']) * 100, 1) ?>%)</span>
                                    </td>
                                    <td>
                                        <?= number_format(($complaintSummarySubtotal['case_close'] + $complaintSummarySubtotal['in_progress'] + $complaintSummarySubtotal['new']), 0) ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Transition by all by Status Detail -->
                <div class="row">
                    <div class="col">
                        <h6 class="badge badge-info badge-pill px-2">Transisi per bulan - <span style="color: yellow">Detail Status all data</span></h6>
                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th rowspan="3" class="align-middle text-center">#</th>
                                    <th rowspan="3" class="align-middle">Bulan</th>
                                    <!-- <th>Keluhan Baru</th> -->
                                    <th colspan="22" class="align-middle text-center">In progress</th>
                                    <th rowspan="3" class="align-middle text-center">In<br>progress<br>TTL</th>
                                    <th rowspan="3" class="align-middle text-center text-wrap">Case<br>closed</th>
                                    <th rowspan="3" class="align-middle text-center">Total</th>
                                </tr>
                                <tr>
                                    <th colspan="10" class="align-middle text-center">Under Branch</th>
                                    <th colspan="5" class="align-middle text-center">Wait Complt.</th>
                                    <th colspan="6" class="align-middle text-center">Wait Part Delivery</th>
                                    <th rowspan="2" class="align-middle text-center">Wait<br>Part<br>30</th>
                                </tr>
                                <tr class="text-center">
                                    <th>20</th>
                                    <th>21</th>
                                    <th>22</th>
                                    <th>23</th>
                                    <th>24</th>
                                    <th>25</th>
                                    <th>27</th>
                                    <th>28</th>
                                    <th>29</th>
                                    <th>TTL</th>
                                    <th>40</th>
                                    <th>41</th>
                                    <th>42</th>
                                    <th>43</th>
                                    <th>TTL</th>
                                    <th>31</th>
                                    <th>32</th>
                                    <th>33</th>
                                    <th>34</th>
                                    <th>35</th>
                                    <th>TTL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($complaintSummaryByStatusDetail as $row) : ?>
                                    <tr>
                                        <td class="text-center"><?= $i++ ?></td>
                                        <td><?= date("M Y", strtotime($row['month'])) ?></td>
                                        <td class="text-center"><?= $row['status_20'] ?></td>
                                        <td class="text-center"><?= $row['status_21'] ?></td>
                                        <td class="text-center"><?= $row['status_22'] ?></td>
                                        <td class="text-center"><?= $row['status_23'] ?></td>
                                        <td class="text-center"><?= $row['status_24'] ?></td>
                                        <td class="text-center"><?= $row['status_25'] ?></td>
                                        <td class="text-center"><?= $row['status_27'] ?></td>
                                        <td class="text-center"><?= $row['status_28'] ?></td>
                                        <td class="text-center"><?= $row['status_29'] ?></td>
                                        <td class="text-center">
                                            <?= $row['status_20'] + $row['status_21'] + $row['status_22'] + $row['status_23'] + $row['status_24'] + $row['status_25'] + $row['status_27'] + $row['status_28'] + $row['status_29'] ?>
                                            <span class="text-info">(<?= number_format(($row['status_20'] + $row['status_21'] + $row['status_22'] + $row['status_23'] + $row['status_24'] + $row['status_25'] + $row['status_27'] + $row['status_28'] + $row['status_29']) / $row['by_month'] * 100, 1) ?>%)</span>
                                        </td>
                                        <td class="text-center"><?= $row['status_40'] ?></td>
                                        <td class="text-center"><?= $row['status_41'] ?></td>
                                        <td class="text-center"><?= $row['status_42'] ?></td>
                                        <td class="text-center"><?= $row['status_43'] ?></td>
                                        <td class="text-center">
                                            <?= $row['status_40'] + $row['status_41'] + $row['status_42'] + $row['status_43'] ?>
                                            <span class="text-info">(<?= number_format(($row['status_40'] + $row['status_41'] + $row['status_42'] + $row['status_43']) / $row['by_month'] * 100, 1) ?>%)</span>
                                        </td>
                                        <td class="text-center"><?= $row['status_31'] ?></td>
                                        <td class="text-center"><?= $row['status_32'] ?></td>
                                        <td class="text-center"><?= $row['status_33'] ?></td>
                                        <td class="text-center"><?= $row['status_34'] ?></td>
                                        <td class="text-center"><?= $row['status_35'] ?></td>
                                        <td class="text-center">
                                            <?= $row['status_31'] + $row['status_32'] + $row['status_33'] + $row['status_34'] + $row['status_35'] ?>
                                            <span class="text-info">(<?= number_format(($row['status_31'] + $row['status_32'] + $row['status_33'] + $row['status_34'] + $row['status_35']) / $row['by_month'] * 100, 1) ?>%)</span>
                                        </td>
                                        <td class="text-center">
                                            <?= $row['status_30'] ?>
                                            <span class="text-info">(<?= number_format($row['status_30'] / $row['by_month'] * 100, 1) ?>%)</span>
                                        </td>
                                        <td class="text-center">
                                            <?= $row['status_20'] + $row['status_21'] + $row['status_22'] + $row['status_23'] + $row['status_24'] + $row['status_25'] + $row['status_27'] + $row['status_28'] + $row['status_29'] + $row['status_30'] + $row['status_31'] + $row['status_32'] + $row['status_33'] + $row['status_34'] + $row['status_35'] + $row['status_40'] + $row['status_41'] + $row['status_42'] ?>
                                            <span class="text-info">(<?= number_format(($row['status_20'] + $row['status_21'] + $row['status_22'] + $row['status_23'] + $row['status_24'] + $row['status_25'] + $row['status_27'] + $row['status_28'] + $row['status_29'] + $row['status_30'] + $row['status_31'] + $row['status_32'] + $row['status_33'] + $row['status_34'] + $row['status_35'] + $row['status_40'] + $row['status_41'] + $row['status_42']) / $row['by_month'] * 100, 1) ?>%)</span>
                                        </td>
                                        <td class="text-center">
                                            <?= $row['status_50'] ?>
                                            <span class="text-info">(<?= number_format($row['status_50'] / $row['by_month'] * 100, 1) ?>%)</span>
                                        </td>
                                        <td class="text-center"><?= $row['by_month'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                <tr class="text-bold">
                                    <td colspan="2" class="text-center">Total</td>
                                    <td class="text-center"><?= $complaintSummaryByStatusDetailSubtotal['status_20'] ?></td>
                                        <td class="text-center"><?= $complaintSummaryByStatusDetailSubtotal['status_21'] ?></td>
                                        <td class="text-center"><?= $complaintSummaryByStatusDetailSubtotal['status_22'] ?></td>
                                        <td class="text-center"><?= $complaintSummaryByStatusDetailSubtotal['status_23'] ?></td>
                                        <td class="text-center"><?= $complaintSummaryByStatusDetailSubtotal['status_24'] ?></td>
                                        <td class="text-center"><?= $complaintSummaryByStatusDetailSubtotal['status_25'] ?></td>
                                        <td class="text-center"><?= $complaintSummaryByStatusDetailSubtotal['status_27'] ?></td>
                                        <td class="text-center"><?= $complaintSummaryByStatusDetailSubtotal['status_28'] ?></td>
                                        <td class="text-center"><?= $complaintSummaryByStatusDetailSubtotal['status_29'] ?></td>
                                        <td class="text-center">
                                            <?= $complaintSummaryByStatusDetailSubtotal['status_20'] + $complaintSummaryByStatusDetailSubtotal['status_21'] + $complaintSummaryByStatusDetailSubtotal['status_22'] + $complaintSummaryByStatusDetailSubtotal['status_23'] + $complaintSummaryByStatusDetailSubtotal['status_24'] + $complaintSummaryByStatusDetailSubtotal['status_25'] + $complaintSummaryByStatusDetailSubtotal['status_27'] + $complaintSummaryByStatusDetailSubtotal['status_28'] + $complaintSummaryByStatusDetailSubtotal['status_29'] ?>
                                            <span class="text-info">(<?= number_format(($complaintSummaryByStatusDetailSubtotal['status_20'] + $complaintSummaryByStatusDetailSubtotal['status_21'] + $complaintSummaryByStatusDetailSubtotal['status_22'] + $complaintSummaryByStatusDetailSubtotal['status_23'] + $complaintSummaryByStatusDetailSubtotal['status_24'] + $complaintSummaryByStatusDetailSubtotal['status_25'] + $complaintSummaryByStatusDetailSubtotal['status_27'] + $complaintSummaryByStatusDetailSubtotal['status_28'] + $complaintSummaryByStatusDetailSubtotal['status_29']) / $complaintSummaryByStatusDetailSubtotal['by_month'] * 100, 1) ?>%)</span>
                                        </td>
                                        <td class="text-center"><?= $complaintSummaryByStatusDetailSubtotal['status_40'] ?></td>
                                        <td class="text-center"><?= $complaintSummaryByStatusDetailSubtotal['status_41'] ?></td>
                                        <td class="text-center"><?= $complaintSummaryByStatusDetailSubtotal['status_42'] ?></td>
                                        <td class="text-center"><?= $complaintSummaryByStatusDetailSubtotal['status_43'] ?></td>
                                        <td class="text-center">
                                            <?= $complaintSummaryByStatusDetailSubtotal['status_40'] + $complaintSummaryByStatusDetailSubtotal['status_41'] + $complaintSummaryByStatusDetailSubtotal['status_42'] + $complaintSummaryByStatusDetailSubtotal['status_43'] ?>
                                            <span class="text-info">(<?= number_format(($complaintSummaryByStatusDetailSubtotal['status_40'] + $complaintSummaryByStatusDetailSubtotal['status_41'] + $complaintSummaryByStatusDetailSubtotal['status_42'] + $complaintSummaryByStatusDetailSubtotal['status_43']) / $complaintSummaryByStatusDetailSubtotal['by_month'] * 100, 1) ?>%)</span>
                                        </td>
                                        <td class="text-center"><?= $complaintSummaryByStatusDetailSubtotal['status_31'] ?></td>
                                        <td class="text-center"><?= $complaintSummaryByStatusDetailSubtotal['status_32'] ?></td>
                                        <td class="text-center"><?= $complaintSummaryByStatusDetailSubtotal['status_33'] ?></td>
                                        <td class="text-center"><?= $complaintSummaryByStatusDetailSubtotal['status_34'] ?></td>
                                        <td class="text-center"><?= $complaintSummaryByStatusDetailSubtotal['status_35'] ?></td>
                                        <td class="text-center">
                                            <?= $complaintSummaryByStatusDetailSubtotal['status_31'] + $complaintSummaryByStatusDetailSubtotal['status_32'] + $complaintSummaryByStatusDetailSubtotal['status_33'] + $complaintSummaryByStatusDetailSubtotal['status_34'] + $complaintSummaryByStatusDetailSubtotal['status_35'] ?>
                                            <span class="text-info">(<?= number_format(($complaintSummaryByStatusDetailSubtotal['status_31'] + $complaintSummaryByStatusDetailSubtotal['status_32'] + $complaintSummaryByStatusDetailSubtotal['status_33'] + $complaintSummaryByStatusDetailSubtotal['status_34'] + $complaintSummaryByStatusDetailSubtotal['status_35']) / $complaintSummaryByStatusDetailSubtotal['by_month'] * 100, 1) ?>%)</span>
                                        </td>
                                        <td class="text-center">
                                            <?= $complaintSummaryByStatusDetailSubtotal['status_30'] ?>
                                            <span class="text-info">(<?= number_format($complaintSummaryByStatusDetailSubtotal['status_30'] / $complaintSummaryByStatusDetailSubtotal['by_month'] * 100, 1) ?>%)</span>
                                        </td>                                        
                                        <td class="text-center">
                                            <?= $complaintSummaryByStatusDetailSubtotal['status_20'] + $complaintSummaryByStatusDetailSubtotal['status_21'] + $complaintSummaryByStatusDetailSubtotal['status_22'] + $complaintSummaryByStatusDetailSubtotal['status_23'] + $complaintSummaryByStatusDetailSubtotal['status_24'] + $complaintSummaryByStatusDetailSubtotal['status_25'] + $complaintSummaryByStatusDetailSubtotal['status_27'] + $complaintSummaryByStatusDetailSubtotal['status_28'] + $complaintSummaryByStatusDetailSubtotal['status_29'] + $complaintSummaryByStatusDetailSubtotal['status_30'] + $complaintSummaryByStatusDetailSubtotal['status_31'] + $complaintSummaryByStatusDetailSubtotal['status_32'] + $complaintSummaryByStatusDetailSubtotal['status_33'] + $complaintSummaryByStatusDetailSubtotal['status_34'] + $complaintSummaryByStatusDetailSubtotal['status_35'] + $complaintSummaryByStatusDetailSubtotal['status_40'] + $complaintSummaryByStatusDetailSubtotal['status_41'] + $complaintSummaryByStatusDetailSubtotal['status_42'] ?>
                                            <span class="text-info">(<?= number_format(($complaintSummaryByStatusDetailSubtotal['status_20'] + $complaintSummaryByStatusDetailSubtotal['status_21'] + $complaintSummaryByStatusDetailSubtotal['status_22'] + $complaintSummaryByStatusDetailSubtotal['status_23'] + $complaintSummaryByStatusDetailSubtotal['status_24'] + $complaintSummaryByStatusDetailSubtotal['status_25'] + $complaintSummaryByStatusDetailSubtotal['status_27'] + $complaintSummaryByStatusDetailSubtotal['status_28'] + $complaintSummaryByStatusDetailSubtotal['status_29'] + $complaintSummaryByStatusDetailSubtotal['status_30'] + $complaintSummaryByStatusDetailSubtotal['status_31'] + $complaintSummaryByStatusDetailSubtotal['status_32'] + $complaintSummaryByStatusDetailSubtotal['status_33'] + $complaintSummaryByStatusDetailSubtotal['status_34'] + $complaintSummaryByStatusDetailSubtotal['status_35'] + $complaintSummaryByStatusDetailSubtotal['status_40'] + $complaintSummaryByStatusDetailSubtotal['status_41'] + $complaintSummaryByStatusDetailSubtotal['status_42']) / $complaintSummaryByStatusDetailSubtotal['by_month'] * 100, 1) ?>%)</span>
                                        </td>
                                        <td class="text-center">
                                            <?= $complaintSummaryByStatusDetailSubtotal['status_50'] ?>
                                            <span class="text-info">(<?= number_format($complaintSummaryByStatusDetailSubtotal['status_50'] / $complaintSummaryByStatusDetailSubtotal['by_month'] * 100, 1) ?>%)</span>
                                        </td>
                                        <td class="text-center"><?= $complaintSummaryByStatusDetailSubtotal['by_month'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Chart Daily Transition -->
                <div class="row">
                    <div class="col">
                        <canvas id="complaintDailyTransitionChart" style="max-height: 240px;"></canvas>
                    </div>
                </div>

                <!-- summary forward same day - monthly -->
                <?php if (in_array($this->session->userdata('useraccess'), $allowedAccessAll)) : ?>
                    <div class="row mt-3">
                        <div class="col-6 pr-5">
                            <h6 class="badge badge-info badge-pill px-2">Rasio Forward Keluha di Hari Yang Sama</h6> 
                            <table class="table table-sm table-hover">
                                <thead class="text-center">
                                    <th>#</th>
                                    <th>Bulan</th>
                                    <th>Total Keluhan</th>
                                    <th>Sameday Forward</th>
                                    <th>% Ratio</th>
                                </thead>
                                <tbody>
                                    <?php $num = 1; ?>
                                    <?php foreach ($complaintSummarySamedayForward as $row) : ?>
                                        <tr>
                                            <td class="text-center"><?= $num++ ?></td>
                                            <td class="text-center"><?= date("M Y", strtotime($row['month'])) ?></td>
                                            <td class="text-center"><?= number_format($row['claim_qty']) ?></td>
                                            <td class="text-center"><?= number_format($row['forward_sameday']) ?></td>
                                            <td class="text-center"><span class="text-info"><?= number_format($row['forward_sameday'] / $row['claim_qty'] * 100, 1) ?>%</span></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <tr class="text-bold text-center border-bottom">
                                        <td colspan="2">Average</td>
                                        <td>
                                            <?= number_format($complaintSummarySamedayForwardSubtotal['claim_qty'] / count($complaintSummarySamedayForward), 0) ?>
                                        </td>
                                        <td>
                                            <?= number_format($complaintSummarySamedayForwardSubtotal['forward_sameday'] / count($complaintSummarySamedayForward), 0) ?>
                                        </td>
                                        <td>
                                            <?= number_format($complaintSummarySamedayForwardSubtotal['forward_sameday'] / $complaintSummarySamedayForwardSubtotal['claim_qty'] * 100, 0) ?>%
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Breakdown by complaint category -->
                <div class="row mt-3">
                    <div class="col-12 pr-5">
                        <h6 class="badge badge-info badge-pill px-2">Keluhan berdasarkan kategori - <span style="color: yellow">Top 10</span></h6> 
                        <table class="table table-sm table-responsive">
                            <thead>
                                <tr class="bg-light">
                                    <th>No</th>
                                    <th>Claim Description</th>
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
                                                    <?= $convertData[$x]['claim_description'] ?>
                                                </span>
                                            </td>
                                            <?php for ($y = 1; $y < count($tableHeader); $y++) : ?>
                                                <td class="text-right">
                                                    <span class="linktoDetail" data-category="<?= $convertData[$x]['claim_description']?>" data-start="<?= $tableHeader[$y] ?>" data-end="<?= $tableHeader[$y] ?>">
                                                        <?= number_format($convertData[$x][$tableHeader[$y]], 0) ?>
                                                        <span class="text-info">
                                                            (<?= number_format($convertData[$x][$tableHeader[$y]] / $totalByMonth[$tableHeader[$y]], 2) *100 ?>%)
                                                        </span>
                                                    </span>
                                                </td>
                                            <?php endfor; ?>
                                            <td class="text-right">
                                                <span class="linktoDetail" data-category="<?= $convertData[$x]['claim_description']?>" data-start="<?= $complaintSummaryStartPeriod ?>" data-end="<?= $complaintSummaryEndPeriod ?>">
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
                        </table>
                        <form method="post" action="<?= base_url('complaint/bycategory') ?>" style="display: none;" id="formToLink" target="_blank">
                            <input type="" name="linktoDetailCategory" id="linktoDetailCategory" value="">
                            <input type="" name="linktoDetailStartperiod" id="linktoDetailStartperiod" value="">
                            <input type="" name="linktoDetailEndperiod" id="linktoDetailEndperiod" value="">
                        </form>
                    </div>
                </div>

                <!-- Transition Complaint Category by Status Detail -->
                <div class="row">
                    <div class="col">
                        <h6 class="badge badge-info badge-pill px-2">Keluhan berdasarkan kategori - <span style="color: yellow">Top 10 by Detail Status</span></h6>
                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th rowspan="3" class="align-middle text-center">#</th>
                                    <th rowspan="3" class="align-middle">Claim Description</th>
                                    <!-- <th>Keluhan Baru</th> -->
                                    <th colspan="21" class="align-middle text-center">In progress</th>
                                    <th rowspan="3" class="align-middle text-center">In<br>progress<br>TTL</th>
                                    <th rowspan="3" class="align-middle text-center text-wrap">Case<br>closed</th>
                                    <th rowspan="3" class="align-middle text-center">Total</th>
                                </tr>
                                <tr>
                                    <th colspan="10" class="align-middle text-center">Under Branch</th>
                                    <th colspan="6" class="align-middle text-center">Wait Part Delivery</th>
                                    <th rowspan="2" class="align-middle text-center">Wait<br>Part<br>30</th>
                                    <th colspan="4" class="align-middle text-center">Wait Comp.</th>
                                </tr>
                                <tr class="text-center">
                                    <th>20</th>
                                    <th>21</th>
                                    <th>22</th>
                                    <th>23</th>
                                    <th>24</th>
                                    <th>25</th>
                                    <th>27</th>
                                    <th>28</th>
                                    <th>29</th>
                                    <th>TTL</th>
                                    <th>31</th>
                                    <th>32</th>
                                    <th>33</th>
                                    <th>34</th>
                                    <th>35</th>
                                    <th>TTL</th>
                                    <th>40</th>
                                    <th>41</th>
                                    <th>42</th>
                                    <th>TTL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($complaintSummaryCategoryByStatusDetail as $row) : ?>
                                    <tr>
                                        <td class="text-center"><?= $i++ ?></td>
                                        <td><?= $row['claim_description'] ?></td>
                                        <td class="text-center"><?= $row['status_20'] ?></td>
                                        <td class="text-center"><?= $row['status_21'] ?></td>
                                        <td class="text-center"><?= $row['status_22'] ?></td>
                                        <td class="text-center"><?= $row['status_23'] ?></td>
                                        <td class="text-center"><?= $row['status_24'] ?></td>
                                        <td class="text-center"><?= $row['status_25'] ?></td>
                                        <td class="text-center"><?= $row['status_27'] ?></td>
                                        <td class="text-center"><?= $row['status_28'] ?></td>
                                        <td class="text-center"><?= $row['status_29'] ?></td>
                                        <td class="text-center">
                                            <?= $row['status_20'] + $row['status_21'] + $row['status_22'] + $row['status_23'] + $row['status_24'] + $row['status_25'] + $row['status_27'] + $row['status_28'] + $row['status_29'] ?>
                                            <span class="text-info">(<?= number_format(($row['status_20'] + $row['status_21'] + $row['status_22'] + $row['status_23'] + $row['status_24'] + $row['status_25'] + $row['status_27'] + $row['status_28'] + $row['status_29']) / $row['by_month'] * 100, 0) ?>%)</span>
                                        </td>
                                        <td class="text-center"><?= $row['status_31'] ?></td>
                                        <td class="text-center"><?= $row['status_32'] ?></td>
                                        <td class="text-center"><?= $row['status_33'] ?></td>
                                        <td class="text-center"><?= $row['status_34'] ?></td>
                                        <td class="text-center"><?= $row['status_35'] ?></td>
                                        <td class="text-center">
                                            <?= $row['status_31'] + $row['status_32'] + $row['status_33'] + $row['status_34'] + $row['status_35'] ?>
                                            <span class="text-info">(<?= number_format(($row['status_31'] + $row['status_32'] + $row['status_33'] + $row['status_34'] + $row['status_35']) / $row['by_month'] * 100, 0) ?>%)</span>
                                        </td>
                                        <td class="text-center">
                                            <?= $row['status_30'] ?>
                                            <span class="text-info">(<?= number_format($row['status_30'] / $row['by_month'] * 100, 0) ?>%)</span>
                                        </td>
                                        <td class="text-center"><?= $row['status_40'] ?></td>
                                        <td class="text-center"><?= $row['status_41'] ?></td>
                                        <td class="text-center"><?= $row['status_42'] ?></td>
                                        <td class="text-center">
                                            <?= $row['status_40'] + $row['status_41'] + $row['status_42'] ?>
                                            <span class="text-info">(<?= number_format(($row['status_40'] + $row['status_41'] + $row['status_42']) / $row['by_month'] * 100, 0) ?>%)</span>
                                        </td>
                                        <td class="text-center">
                                            <?= $row['status_20'] + $row['status_21'] + $row['status_22'] + $row['status_23'] + $row['status_24'] + $row['status_25'] + $row['status_27'] + $row['status_28'] + $row['status_29'] + $row['status_30'] + $row['status_31'] + $row['status_32'] + $row['status_33'] + $row['status_34'] + $row['status_35'] + $row['status_40'] + $row['status_41'] + $row['status_42'] ?>
                                            <span class="text-info">(<?= number_format(($row['status_20'] + $row['status_21'] + $row['status_22'] + $row['status_23'] + $row['status_24'] + $row['status_25'] + $row['status_27'] + $row['status_28'] + $row['status_29'] + $row['status_30'] + $row['status_31'] + $row['status_32'] + $row['status_33'] + $row['status_34'] + $row['status_35'] + $row['status_40'] + $row['status_41'] + $row['status_42']) / $row['by_month'] * 100, 0) ?>%)</span>
                                        </td>
                                        <td class="text-center">
                                            <?= $row['status_50'] ?>
                                            <span class="text-info">(<?= number_format($row['status_50'] / $row['by_month'] * 100, 0) ?>%)</span>
                                        </td>
                                        <td class="text-center">
                                            <?= $row['by_month'] ?>
                                            <span class="text-info">(<?= number_format($row['by_month'] / $complaintSummaryByStatusDetailSubtotal['by_month'] * 100, 0) ?>%)</span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <tr class="text-bold">
                                    <td colspan="2" class="text-center">Total</td>
                                    <td class="text-center"><?= $complaintSummaryByStatusDetailSubtotal['status_20'] ?></td>
                                        <td class="text-center"><?= $complaintSummaryByStatusDetailSubtotal['status_21'] ?></td>
                                        <td class="text-center"><?= $complaintSummaryByStatusDetailSubtotal['status_22'] ?></td>
                                        <td class="text-center"><?= $complaintSummaryByStatusDetailSubtotal['status_23'] ?></td>
                                        <td class="text-center"><?= $complaintSummaryByStatusDetailSubtotal['status_24'] ?></td>
                                        <td class="text-center"><?= $complaintSummaryByStatusDetailSubtotal['status_25'] ?></td>
                                        <td class="text-center"><?= $complaintSummaryByStatusDetailSubtotal['status_27'] ?></td>
                                        <td class="text-center"><?= $complaintSummaryByStatusDetailSubtotal['status_28'] ?></td>
                                        <td class="text-center"><?= $complaintSummaryByStatusDetailSubtotal['status_29'] ?></td>
                                        <td class="text-center">
                                            <?= $complaintSummaryByStatusDetailSubtotal['status_20'] + $complaintSummaryByStatusDetailSubtotal['status_21'] + $complaintSummaryByStatusDetailSubtotal['status_22'] + $complaintSummaryByStatusDetailSubtotal['status_23'] + $complaintSummaryByStatusDetailSubtotal['status_24'] + $complaintSummaryByStatusDetailSubtotal['status_25'] + $complaintSummaryByStatusDetailSubtotal['status_27'] + $complaintSummaryByStatusDetailSubtotal['status_28'] + $complaintSummaryByStatusDetailSubtotal['status_29'] ?>
                                            <span class="text-info">(<?= number_format(($complaintSummaryByStatusDetailSubtotal['status_20'] + $complaintSummaryByStatusDetailSubtotal['status_21'] + $complaintSummaryByStatusDetailSubtotal['status_22'] + $complaintSummaryByStatusDetailSubtotal['status_23'] + $complaintSummaryByStatusDetailSubtotal['status_24'] + $complaintSummaryByStatusDetailSubtotal['status_25'] + $complaintSummaryByStatusDetailSubtotal['status_27'] + $complaintSummaryByStatusDetailSubtotal['status_28'] + $complaintSummaryByStatusDetailSubtotal['status_29']) / $complaintSummaryByStatusDetailSubtotal['by_month'] * 100, 1) ?>%)</span>
                                        </td>
                                        <td class="text-center"><?= $complaintSummaryByStatusDetailSubtotal['status_31'] ?></td>
                                        <td class="text-center"><?= $complaintSummaryByStatusDetailSubtotal['status_32'] ?></td>
                                        <td class="text-center"><?= $complaintSummaryByStatusDetailSubtotal['status_33'] ?></td>
                                        <td class="text-center"><?= $complaintSummaryByStatusDetailSubtotal['status_34'] ?></td>
                                        <td class="text-center"><?= $complaintSummaryByStatusDetailSubtotal['status_35'] ?></td>
                                        <td class="text-center">
                                            <?= $complaintSummaryByStatusDetailSubtotal['status_31'] + $complaintSummaryByStatusDetailSubtotal['status_32'] + $complaintSummaryByStatusDetailSubtotal['status_33'] + $complaintSummaryByStatusDetailSubtotal['status_34'] + $complaintSummaryByStatusDetailSubtotal['status_35'] ?>
                                            <span class="text-info">(<?= number_format(($complaintSummaryByStatusDetailSubtotal['status_31'] + $complaintSummaryByStatusDetailSubtotal['status_32'] + $complaintSummaryByStatusDetailSubtotal['status_33'] + $complaintSummaryByStatusDetailSubtotal['status_34'] + $complaintSummaryByStatusDetailSubtotal['status_35']) / $complaintSummaryByStatusDetailSubtotal['by_month'] * 100, 1) ?>%)</span>
                                        </td>
                                        <td class="text-center">
                                            <?= $complaintSummaryByStatusDetailSubtotal['status_30'] ?>
                                            <span class="text-info">(<?= number_format($complaintSummaryByStatusDetailSubtotal['status_30'] / $complaintSummaryByStatusDetailSubtotal['by_month'] * 100, 1) ?>%)</span>
                                        </td>
                                        <td class="text-center"><?= $complaintSummaryByStatusDetailSubtotal['status_40'] ?></td>
                                        <td class="text-center"><?= $complaintSummaryByStatusDetailSubtotal['status_41'] ?></td>
                                        <td class="text-center"><?= $complaintSummaryByStatusDetailSubtotal['status_42'] ?></td>
                                        <td class="text-center">
                                            <?= $complaintSummaryByStatusDetailSubtotal['status_40'] + $complaintSummaryByStatusDetailSubtotal['status_41'] + $complaintSummaryByStatusDetailSubtotal['status_42'] ?>
                                            <span class="text-info">(<?= number_format(($complaintSummaryByStatusDetailSubtotal['status_40'] + $complaintSummaryByStatusDetailSubtotal['status_41'] + $complaintSummaryByStatusDetailSubtotal['status_42']) / $complaintSummaryByStatusDetailSubtotal['by_month'] * 100, 1) ?>%)</span>
                                        </td>
                                        <td class="text-center">
                                            <?= $complaintSummaryByStatusDetailSubtotal['status_20'] + $complaintSummaryByStatusDetailSubtotal['status_21'] + $complaintSummaryByStatusDetailSubtotal['status_22'] + $complaintSummaryByStatusDetailSubtotal['status_23'] + $complaintSummaryByStatusDetailSubtotal['status_24'] + $complaintSummaryByStatusDetailSubtotal['status_25'] + $complaintSummaryByStatusDetailSubtotal['status_27'] + $complaintSummaryByStatusDetailSubtotal['status_28'] + $complaintSummaryByStatusDetailSubtotal['status_29'] + $complaintSummaryByStatusDetailSubtotal['status_30'] + $complaintSummaryByStatusDetailSubtotal['status_31'] + $complaintSummaryByStatusDetailSubtotal['status_32'] + $complaintSummaryByStatusDetailSubtotal['status_33'] + $complaintSummaryByStatusDetailSubtotal['status_34'] + $complaintSummaryByStatusDetailSubtotal['status_35'] + $complaintSummaryByStatusDetailSubtotal['status_40'] + $complaintSummaryByStatusDetailSubtotal['status_41'] + $complaintSummaryByStatusDetailSubtotal['status_42'] ?>
                                            <span class="text-info">(<?= number_format(($complaintSummaryByStatusDetailSubtotal['status_20'] + $complaintSummaryByStatusDetailSubtotal['status_21'] + $complaintSummaryByStatusDetailSubtotal['status_22'] + $complaintSummaryByStatusDetailSubtotal['status_23'] + $complaintSummaryByStatusDetailSubtotal['status_24'] + $complaintSummaryByStatusDetailSubtotal['status_25'] + $complaintSummaryByStatusDetailSubtotal['status_27'] + $complaintSummaryByStatusDetailSubtotal['status_28'] + $complaintSummaryByStatusDetailSubtotal['status_29'] + $complaintSummaryByStatusDetailSubtotal['status_30'] + $complaintSummaryByStatusDetailSubtotal['status_31'] + $complaintSummaryByStatusDetailSubtotal['status_32'] + $complaintSummaryByStatusDetailSubtotal['status_33'] + $complaintSummaryByStatusDetailSubtotal['status_34'] + $complaintSummaryByStatusDetailSubtotal['status_35'] + $complaintSummaryByStatusDetailSubtotal['status_40'] + $complaintSummaryByStatusDetailSubtotal['status_41'] + $complaintSummaryByStatusDetailSubtotal['status_42']) / $complaintSummaryByStatusDetailSubtotal['by_month'] * 100, 1) ?>%)</span>
                                        </td>
                                        <td class="text-center">
                                            <?= $complaintSummaryByStatusDetailSubtotal['status_50'] ?>
                                            <span class="text-info">(<?= number_format($complaintSummaryByStatusDetailSubtotal['status_50'] / $complaintSummaryByStatusDetailSubtotal['by_month'] * 100, 1) ?>%)</span>
                                        </td>
                                        <td class="text-center"><?= $complaintSummaryByStatusDetailSubtotal['by_month'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Transition by service regional -->
                <div class="row mt-3">
                    <div class="col">
                        <h6 class="badge badge-info badge-pill px-3">By Region - <span style="color: yellow"><?= $params['summary_regional'] ?></span></h6>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <table class="table table-sm col-6">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Bulan</th>
                                    <!-- <th>Keluhan Baru</th> -->
                                    <th>In progress</th>
                                    <th>Case close</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($complaintSummaryByRegion as $row) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= date("M Y", strtotime($row['month'])) ?></td>
                                        <!-- <td>
                                            <?= number_format($row['new'], 0) ?>
                                            <span class="text-info">(<?= number_format($row['new'] / ($row['case_close'] + $row['in_progress'] + $row['new']) * 100, 1) ?>%)</span>
                                        </td> -->
                                        <td>
                                            <?= number_format($row['in_progress'], 0) ?>
                                            <span class="text-info">(<?= number_format($row['in_progress'] / ($row['case_close'] + $row['in_progress'] + $row['new']) * 100, 1) ?>%)</span>
                                        </td>
                                        <td>
                                            <?= number_format($row['case_close'], 0) ?>
                                            <span class="text-info">(<?= number_format($row['case_close'] / ($row['case_close'] + $row['in_progress'] + $row['new']) * 100, 1) ?>%)</span>
                                        </td>
                                        <td>
                                            <?= number_format($row['case_close'] + $row['in_progress'] + $row['new'], 0) ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Transition by service branch -->
                <div class="row mt-3">
                    <div class="col">
                        <h6 class="badge badge-info badge-pill px-3">By Branch - <span style="color: yellow"><?= $params['summary_under_branch'] ?></span></h6>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <table class="table table-sm col-6">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Bulan</th>
                                    <!-- <th>Keluhan Baru</th> -->
                                    <th>In progress</th>
                                    <th>Case close</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($complaintSummaryByBranchTransition as $row) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= date("M Y", strtotime($row['month'])) ?></td>
                                        <!-- <td>
                                            <?= number_format($row['new'], 0) ?>
                                            <span class="text-info">(<?= number_format($row['new'] / ($row['case_close'] + $row['in_progress'] + $row['new']) * 100, 1) ?>%)</span>
                                        </td> -->
                                        <td>
                                            <?= number_format($row['in_progress'], 0) ?>
                                            <span class="text-info">(<?= number_format($row['in_progress'] / ($row['case_close'] + $row['in_progress'] + $row['new']) * 100, 1) ?>%)</span>
                                        </td>
                                        <td>
                                            <?= number_format($row['case_close'], 0) ?>
                                            <span class="text-info">(<?= number_format($row['case_close'] / ($row['case_close'] + $row['in_progress'] + $row['new']) * 100, 1) ?>%)</span>
                                        </td>
                                        <td>
                                            <?= number_format($row['case_close'] + $row['in_progress'] + $row['new'], 0) ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- by service branch -->
                <div class="row mt-3">
                    <div class="col">
                        <h6 class="badge badge-info badge-pill px-3 mb-3">By Service Center</h6>
                        <table class="table table-sm col-8">
                            <thead>
                                <tr class="bg-light">
                                    <th>#</th>
                                    <th>Cabang</th>
                                    <!-- <th>New</th> -->
                                    <th>In progress</th>
                                    <th>Case closed</th>
                                    <th>Total</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $num = 1; ?>

                                <?php for ($a = 0; $a < count($complaintSummaryByBranchGroup); $a++) : ?>
                                    <tr class="text-bold" style="background-color: rgba(230,230,235,1);">
                                        <td><button class="btn btn-sm btnCollapse" data-id="subrow<?= $a ?>">+</button></td>
                                        <td><?= $complaintSummaryByBranchGroup[$a]['under_branch'] ?></td>
                                        <td>
                                            <?= number_format($complaintSummaryByBranchGroup[$a]['in_progress'], 0) ?>
                                            <span class="text-info">(<?= ratioFormater($complaintSummaryByBranchGroup[$a]['in_progress'], ($complaintSummaryByBranchGroup[$a]['case_close'] + $complaintSummaryByBranchGroup[$a]['in_progress'] + $complaintSummaryByBranchGroup[$a]['new'])) ?>%)</span>
                                        </td>
                                        <td>
                                            <?= number_format($complaintSummaryByBranchGroup[$a]['case_close'], 0) ?>
                                            <span class="text-info">(<?= ratioFormater($complaintSummaryByBranchGroup[$a]['case_close'], ($complaintSummaryByBranchGroup[$a]['case_close'] + $complaintSummaryByBranchGroup[$a]['in_progress'] + $complaintSummaryByBranchGroup[$a]['new'])) ?>%)</span>
                                        </td>
                                        <td>
                                            <?= number_format($complaintSummaryByBranchGroup[$a]['case_close'] + $complaintSummaryByBranchGroup[$a]['in_progress'] + $complaintSummaryByBranchGroup[$a]['new'], 0) ?>
                                        </td>
                                    </tr>
                                    <?php foreach ($complaintSummaryByBranchName as $subrow) : ?>
                                        <?php if ($subrow['under_branch'] == $complaintSummaryByBranchGroup[$a]['under_branch']) : ?>
                                            <tr class="collapse subrow<?= $a ?>">
                                                <td></td>
                                                <td><?= $subrow['pic_report'] ?></td>
                                                <td>
                                                    <?= number_format($subrow['in_progress'], 0) ?>
                                                    <span class="text-info">(<?= ratioFormater($subrow['in_progress'], ($subrow['case_close'] + $subrow['in_progress'] + $subrow['new'])) ?>%)</span>
                                                </td>
                                                <td>
                                                    <?= number_format($subrow['case_close'], 0) ?>
                                                    <span class="text-info">(<?= ratioFormater($subrow['case_close'], ($subrow['case_close'] + $subrow['in_progress'] + $subrow['new'])) ?>%)</span>
                                                </td>
                                                <td>
                                                    <?= number_format($subrow['case_close'] + $subrow['in_progress'] + $subrow['new'], 0) ?>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endfor; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>