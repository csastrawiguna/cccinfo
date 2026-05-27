<div class="content-wrapper">
    <div class="container-fluid pt-2">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
        <?php require 'view-function.php'; ?>
            <div id="app" class="container-fluid">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">Skeleton Summary Keluhan (Vue Style)</h3>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <label>Start Period</label>
                                <input type="date" v-model="filter.start" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label>End Period</label>
                                <input type="date" v-model="filter.end" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <label>&nbsp;</label>
                                <button @click="fetchData" class="btn btn-primary btn-block">Go (Refresh Data)</button>
                            </div>
                        </div>
                        <h6><span class="badge badge-info mb-2">Transisi per Bulan</span></h6>
                        <table class="table table-sm table-bordered mb-4">
                            <thead class="thead-light">
                                <tr>
                                    <th>Bulan</th>
                                    <th>In Progress</th>
                                    <th>Case Closed</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="row in summaryData" :key="row.month">
                                    <td>{{ row.month }}</td>
                                    <td>
                                        {{ row.in_progress }} 
                                        <span class="text-info-detail">({{ calculatePercent(row.in_progress, row.total) }}%)</span>
                                    </td>
                                    <td>
                                        {{ row.case_closed }}
                                        <span class="text-info-detail">({{ calculatePercent(row.case_closed, row.total) }}%)</span>
                                    </td>
                                    <td class="font-weight-bold">{{ row.total }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <h6><span class="badge badge-info mb-2">Detail Status Transition</span></h6>
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered">
                                <thead class="text-center bg-light">
                                    <tr>
                                        <th rowspan="2" class="align-middle">Bulan</th>
                                        <th colspan="3">Under Branch (20-22)</th>
                                        <th rowspan="2" class="align-middle">TTL</th>
                                    </tr>
                                    <tr>
                                        <th>20</th><th>21</th><th>22</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="row in summaryData" :key="row.month">
                                        <td class="text-center">{{ row.month }}</td>
                                        
                                        <td v-for="st in [20, 21, 22]" class="text-center">
                                            {{ row.details['status_'+st] || 0 }}
                                        </td>

                                        <td class="text-center bg-subtotal">
                                            {{ sumStatus(row.details, [20, 21, 22]) }}
                                            <div class="text-info-detail">({{ calculatePercent(sumStatus(row.details, [20, 21, 22]), row.total) }}%)</div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>