<div class="content-wrapper" id="app" data-url="<?= base_url() ?>">
    <div class="container-fluid pt-2">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
        <div v-if="loading" class="text-center p-5">
            <div class="spinner-border text-info"></div>
            <p>Keur narik data, sakedap...</p>
        </div>

        <div v-else v-cloak class="card card-outline card-info">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span class="h6 text-info">Summary Keluhan Konsumen (Vue 3)</span>
                <div v-if="loadingData" class="spinner-border spinner-border-sm text-info"></div>
            </div>
            
            <div class="card-body">
                <!-- Form Parameter -->
                <div class="row bg-light">
                    <div class="col-md-2">
                        <label>Periode Awal</label>
                        <input type="date" v-model="filters.start" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <label>Periode Akhir</label>
                        <input type="date" v-model="filters.end" class="form-control">
                    </div>

                    <div class="form-group col-md-2" style="min-width: 200px;">
                        <label>Region</label>
                        <div class="border rounded p-2 bg-white" style="height: 120px; overflow-y: auto;">
                            <div v-for="reg in listRegion" :key="reg" class="custom-control custom-checkbox">
                                <input type="checkbox" 
                                       :id="'reg-'+reg" 
                                       :value="reg" 
                                       v-model="filters.selectedRegion" 
                                       @change="fetchBranch" 
                                       class="custom-control-input">
                                <label class="custom-control-label" :for="'reg-'+reg">{{ reg }}</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-2">
                        <label>Cabang</label>
                        <div class="border rounded p-2 bg-white" style="height: 120px; overflow-y: auto;">
                            <div v-if="loadingBranch" class="text-muted small italic">Loading...</div>
                            <div v-else-if="listBranch.length === 0" class="text-muted">Pilih Region dulu</div>
                            
                            <div v-for="(cb, index) in listBranch" :key="index" class="custom-control custom-checkbox">
                            <input type="checkbox" 
                                   class="custom-control-input" 
                                   :id="'chk-br-' + index" 
                                   :value="cb.under_branch" 
                                   v-model="filters.selectedBranch">
                            
                            <label class="custom-control-label" :for="'chk-br-' + index" 
                                   :class="{'font-weight-bold text-primary': cb.under_branch.includes('All ')}">
                                {{ cb.under_branch }}
                            </label>
                        </div>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <label>Order List</label>
                        <select v-model="filters.orderBy" class="form-control">
                            <option value="Complaint Qty">Complaint Qty</option>
                            <option value="% Closed">% Closed</option>
                        </select>
                    </div>

                    <div class="col-md-1">
                        <label>&nbsp;</label>
                        <button @click="loadData" class="btn btn-primary btn-block" :disabled="loading">
                            <i v-if="loading" class="fas fa-spinner fa-spin"></i>
                            <i v-else class="fas fa-location-arrow"></i> Go
                        </button>
                    </div>
                </div>

                <hr>

                <!-- Table #1. Monthly Transition -->
                <div class="table-responsive">
                    <h6 class="badge badge-info badge-pill px-2">Transition</h6>
                    <table class="table table-sm table-hover table-bordered table-responsive">
                        <thead class="bg-light text-center">
                            <tr>
                                <th style="min-width: 160px;">Status</th>
                                <th v-for="head in reports.tableHeader" :key="head" v-if="reports.tableHeader.length > 0">
                                    {{ formatDateHeader(head) }}
                                </th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(row, index) in monthlyTransition" :key="index">
                                <td>{{ row.status }}</td>
                                <td v-for="head in reports.tableHeader" :key="head" class="text-right px-3">
                                    {{ formatNumber(row[head]) }}
                                    <small class="text-info">
                                        ({{ getPercent(row[head], row.status_total) }}%)
                                    </small>
                                </td>
                                <td class="text-right font-weight-bold">
                                    {{ formatNumber(row.status_total) }}
                                    <small class="text-info">
                                        ({{ getPercent(row.status_total, columnTotals.grandTotal) }}%)
                                    </small>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot v-if="byMonths.length > 0" class="bg-light font-weight-bold">
                            <tr>
                                <td class="text-center">Total</td>
                                <td v-for="head in reports.tableHeader" :key="head" class="text-right text-primary">
                                    {{ byMonths[0][head] }}
                                </td>
                                <td class="text-right text-primary">
                                    {{ formatNumber(byMonths[0].status_total) }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- Table #2. CCC Send on Same Days -->
                <div class="table-responsive">
                    <h6 class="badge badge-info badge-pill px-2">Rasio Same Day Forward </h6>
                    <table class="table table-sm table-hover table-bordered table-responsive">
                        <thead class="bg-light text-center">
                            <tr>
                                <th style="min-width: 160px;">Deskripsi</th>
                                <th v-for="head in reports.tableHeader" :key="head">
                                    {{ formatDateHeader(head) }}
                                </th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(row, index) in monthlyOnSameday.slice(0, 2)" :key="index">
                                <td>{{ row.status }}</td>
                                <td v-for="head in reports.tableHeader" :key="head" class="text-right px-4">
                                    {{ formatNumber(row[head]) }}
                                </td>
                                <td class="text-right font-weight-bold px-4">
                                    {{ formatNumber(row.status_total) }}
                                </td>
                            </tr>
                        </tbody>
                        <tfoot v-if="monthlyOnSameday.length > 0">
                            <tr class="bg-light font-weight-bold">
                                <td>{{ monthlyOnSameday[2].status }}</td>
                                <td v-for="head in reports.tableHeader" :key="head" class="text-right px-4 text-primary">
                                    {{ monthlyOnSameday[2][head] }}
                                </td>
                                <td class="text-right px-4 text-primary">
                                    {{ monthlyOnSameday[2].status_total }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- Table #3. By Category -->
                <div class="table-responsive">
                    <h6 class="badge badge-info badge-pill px-2">Top 10 Keluhan Ku Kategori</h6>
                    <table class="table table-sm table-hover table-bordered">
                        <thead class="bg-light text-center">
                            <tr>
                                <th>No</th>
                                <th>Claim Description</th>
                                <th v-for="head in reports.tableHeader" :key="head" v-if="reports.tableHeader.length > 0">
                                    {{ formatDateHeader(head) }}
                                </th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(row, index) in sortedCategory" :key="index">
                                <td class="text-center">{{ index + 1 }}</td>
                                <td>{{ row.claim_description }}</td>
                                <td v-for="head in reports.tableHeader" :key="head" class="text-right">
                                    {{ formatNumber(row[head]) }}
                                    <small class="text-info">
                                        ({{ getPercent(row[head], row.ttl_bycategory) }}%)
                                    </small>
                                </td>
                                <td class="text-right font-weight-bold">
                                    {{ formatNumber(row.ttl_bycategory) }}
                                    <small class="text-info">
                                        ({{ getPercent(row.ttl_bycategory, columnTotals.grandTotal) }}%)
                                    </small>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot v-if="reports.convertData.length > 0" class="bg-light font-weight-bold">
                            <tr>
                                <td colspan="2" class="text-center">Total</td>
                                <td v-for="head in reports.tableHeader" :key="head" class="text-right text-primary">
                                    {{ formatNumber(byMonths[head]) }}
                                </td>
                                <td class="text-right text-primary">
                                    {{ formatNumber(byMonths[0].status_total) }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- Table #4. By Month - Status Detail -->
                <div class="table-responsive mt-3">
                    <h6 class="badge badge-info badge-pill px-2">Keluhan: Bulan - Status</h6>
                    <table class="table table-bordered table-sm text-center">
                        <thead class="bg-light">
                            <tr>
                                <th rowspan="2">#</th>
                                <th rowspan="2">Bulan</th>
                                <th colspan="11">Under Branch</th> <th colspan="5">Wait Complt.</th>  <th colspan="6">Wait Part Delivery</th> <th rowspan="2">Wait Part 30</th>
                                <th rowspan="2">In Progress TTL</th>
                                <th rowspan="2">Case Closed</th>
                                <th rowspan="2">Total</th>
                            </tr>
                            <tr>
                                <th>20</th><th>21</th><th>22</th><th>23</th><th>24</th>
                                <th>25</th><th>26</th><th>27</th><th>28</th><th>29</th>
                                <th class="bg-light">TTL</th>
                                <th>40</th><th>41</th><th>42</th><th>43</th>
                                <th class="bg-light">TTL</th>
                                <th>31</th><th>32</th><th>33</th><th>34</th><th>35</th>
                                <th class="bg-light">TTL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(row, idx) in statusDetail" :key="idx">
                                <td>{{ idx + 1 }}</td>
                                <td>{{ row.month }}</td>
                                <td v-for="val in row.underBranch.data">{{ val }}</td>
                                <td class="bg-light">
                                    {{ row.underBranch.ttl }} <small class="text-info">({{ row.underBranch.pct }}%)</small>
                                </td>
                                
                                <td v-for="val in row.waitComplt.data">{{ val }}</td>
                                <td class="bg-light">
                                    {{ row.waitComplt.ttl }} <small class="text-info">({{ row.waitComplt.pct }}%)</small>
                                </td>
                                
                                <td v-for="val in row.waitPart.data">{{ val }}</td>
                                <td class="bg-light">
                                    {{ row.waitPart.ttl }} <small class="text-info">({{ row.waitPart.pct }}%)</small>
                                </td>
                                
                                <td>{{ row.waitPart30.val }} <small class="text-info">({{ row.waitPart30.pct }}%)</small></td>
                                
                                <td class="font-weight-bold">
                                    {{ row.inProgress.ttl }} <small class="text-info">({{ row.inProgress.pct }}%)</small>
                                </td>
                                
                                <td>{{ row.caseClosed.ttl }} <small class="text-info">({{ row.caseClosed.pct }}%)</small></td>
                                
                                <td class="bg-light font-weight-bold">{{ row.total_all }}</td>
                            </tr>
                        </tbody>
                        <tfoot v-if="overallTotals" class="bg-light font-weight-bold text-center">
                            <tr>
                                <td colspan="2">Total</td>

                                <td v-for="k in overallTotals.g1.keys">{{ overallTotals.all_status[k] }}</td>
                                <td class="bg-light">
                                    {{ overallTotals.g1.ttl }}
                                    <br><small class="text-info">({{ getPercent(overallTotals.g1.ttl, overallTotals.grandTotal) }}%)</small>
                                </td>

                                <td v-for="k in overallTotals.g2.keys">{{ overallTotals.all_status[k] }}</td>
                                <td class="bg-light">
                                    {{ overallTotals.g2.ttl }}
                                    <br><small class="text-info">({{ getPercent(overallTotals.g2.ttl, overallTotals.grandTotal) }}%)</small>
                                </td>

                                <td v-for="k in overallTotals.g3.keys">{{ overallTotals.all_status[k] }}</td>
                                <td class="bg-light">
                                    {{ overallTotals.g3.ttl }}
                                    <br><small class="text-info">({{ getPercent(overallTotals.g3.ttl, overallTotals.grandTotal) }}%)</small>
                                </td>

                                <td>
                                    {{ overallTotals.s30 }}
                                    <br><small class="text-info">({{ getPercent(overallTotals.s30, overallTotals.grandTotal) }}%)</small>
                                </td>

                                <td class="text-danger">
                                    {{ overallTotals.inProgressTtl }}
                                    <br><small>({{ getPercent(overallTotals.inProgressTtl, overallTotals.grandTotal) }}%)</small>
                                </td>

                                <td class="text-dark">
                                    {{ formatNumber(overallTotals.s50) }}
                                    <br><small class="text-info">({{ getPercent(overallTotals.s50, overallTotals.grandTotal) }}%)</small>
                                </td>

                                <td class="">{{ formatNumber(overallTotals.grandTotal) }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- Table #5. By Claim Description - Status Detail -->
                <div class="table-responsive mt-3">
                    <h6 class="badge badge-info badge-pill px-2">Keluhan: Jenis Keluhan - Status</h6>
                    <table class="table table-bordered table-sm text-center">
                        <thead class="bg-light">
                            <tr>
                                <th rowspan="2">#</th>
                                <th rowspan="2" class="text-left">Jenis Keluhan</th>
                                <th colspan="11">Under Branch</th> <th colspan="5">Wait Complt.</th>  <th colspan="6">Wait Part Delivery</th> <th rowspan="2">Wait Part 30</th>
                                <th rowspan="2">In Progress TTL</th>
                                <th rowspan="2">Case Closed</th>
                                <th rowspan="2">Total</th>
                            </tr>
                            <tr>
                                <th>20</th><th>21</th><th>22</th><th>23</th><th>24</th>
                                <th>25</th><th>26</th><th>27</th><th>28</th><th>29</th>
                                <th class="bg-light">TTL</th>
                                <th>40</th><th>41</th><th>42</th><th>43</th>
                                <th class="bg-light">TTL</th>
                                <th>31</th><th>32</th><th>33</th><th>34</th><th>35</th>
                                <th class="bg-light">TTL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(row, idx) in statusDetailTop10" :key="idx">
                                <td>{{ idx + 1 }}</td>
                                <td class="text-left">{{ row.claim_description }}</td>
                                <td v-for="val in row.underBranch.data">{{ val }}</td>
                                <td class="bg-light">
                                    {{ row.underBranch.ttl }} <small class="text-info">({{ row.underBranch.pct }}%)</small>
                                </td>
                                
                                <td v-for="val in row.waitComplt.data">{{ val }}</td>
                                <td class="bg-light">
                                    {{ row.waitComplt.ttl }} <small class="text-info">({{ row.waitComplt.pct }}%)</small>
                                </td>
                                
                                <td v-for="val in row.waitPart.data">{{ val }}</td>
                                <td class="bg-light">
                                    {{ row.waitPart.ttl }} <small class="text-info">({{ row.waitPart.pct }}%)</small>
                                </td>
                                
                                <td>{{ row.waitPart30.val }} <small class="text-info">({{ row.waitPart30.pct }}%)</small></td>
                                
                                <td class="font-weight-bold">
                                    {{ row.inProgress.ttl }} <small class="text-info">({{ row.inProgress.pct }}%)</small>
                                </td>
                                
                                <td>{{ row.caseClosed.ttl }} <small class="text-info">({{ row.caseClosed.pct }}%)</small></td>
                                
                                <td class="bg-light font-weight-bold">{{ row.total_all }}</td>
                            </tr>
                        </tbody>
                        <tfoot v-if="table4Totals" class="bg-light font-weight-bold text-center">
                            <tr>
                                <td colspan="2">Total (All Categories)</td>
                                <td v-for="k in table4Totals.g1.keys">{{ table4Totals.all_status[k] }}</td>
                                <td class="bg-light">{{ table4Totals.g1.ttl }}</td>
                                <td class="">{{ formatNumber(table4Totals.grandTotal) }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- Table #6. By Region - Under Branch - PIC report -->
                <div class="table-responsive mt-3">
                    <h6 class="badge badge-info badge-pill px-2">By Region - Under Branch - PIC Report</h6>
                    <table class="table table-bordered table-hover">
                        <thead class="bg-light">
                            <tr>
                                <th>#</th>
                                <th>Region</th>
                                <th>Under Branch</th>
                                <th>PIC</th>
                                <th>Case Closed</th>
                                <th>In Progress</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(row, index) in reports.convertData" :key="index">
                                <td>{{ index + 1 }}</td>
                                <td>{{ row.region }}</td>
                                <td>{{ row.branch_name }}</td>
                                <td>{{ row.pic_name }}</td>
                                <td class="text-end">
                                    {{ formatNumber(row.s50) }}
                                    <small class="text-muted d-block">{{ getPercent(row.s50, row.total_all) }}%</small>
                                </td>
                                <td class="text-end">
                                    {{ formatNumber(row.inProgressTtl) }}
                                    <small class="text-muted d-block">{{ getPercent(row.inProgressTtl, row.total_all) }}%</small>
                                </td>
                                <td class="text-end fw-bold">
                                    {{ formatNumber(row.total_all) }}
                                </td>
                            </tr>
                            <tr v-if="reports.convertData.length > 0" class="table-secondary fw-bold">
                                <td colspan="4" class="text-center">GRAND TOTAL</td>
                                <td class="text-end">{{ formatNumber(overallTotals.s50) }}</td>
                                <td class="text-end">{{ formatNumber(overallTotals.inProgressTtl) }}</td>
                                <td class="text-end">{{ formatNumber(overallTotals.grandTotal) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Tambahkeun ieu di CSS ameh teu nembongan {{ }} pas refresh */
    [v-cloak] { display: none; }
</style>