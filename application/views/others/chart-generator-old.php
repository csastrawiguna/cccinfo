<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
        <style>
            body { background-color: #f8f9fa; }
            /*.card { border-radius: 15px; border: none; }*/
            .dataset-item { border-radius: 8px; background: #fff; position: relative; }
            #container-datasets { max-height: 400px; overflow-y: auto; padding-right: 5px; }
            .btn-remove { position: absolute; top: 5px; right: 10px; cursor: pointer; }
            /* Custom Scrollbar */
            #container-datasets::-webkit-scrollbar { width: 5px; }
            #container-datasets::-webkit-scrollbar-thumb { background: #ccc; border-radius: 10px; }
        </style>

        <div class="container-fluid pt-2 px-1">
            <div class="card card-outline card-info" id="cardChartGeneratorContainer">
                <div class="card-header">
                    <span class="h5 text-info">Simple Chart Generator by ChartJS&reg;</span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="card shadow-sm mb-4">
                                <div class="card-body">
                                    <h5 class="font-weight-bold text-primary mb-3">Chart Configurator</h5>
                                    
                                    <div class="form-group">
                                        <label>Chart Type</label>
                                        <select id="chartType" class="form-control border-primary">
                                            <option value="bar">Bar Chart</option>
                                            <option value="bar-stacked">Bar Chart (Stacked)</option>
                                            <option value="line">Line Chart (Straight)</option>
                                            <option value="line-smooth">Line Chart (Smoothed)</option>
                                            <option value="area">Area Chart (Smoothed)</option>
                                            <option value="radar">Radar Chart</option>
                                            <option value="pie">Pie Chart</option>
                                            <option value="combo">Combo (Bar + Line)</option>
                                            <option value="dual-axis">Dual Y-Axis Chart</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>X-Axis Labels (Pisahkan dengan koma)</label>
                                        <input type="text" id="labels" class="form-control" value="Senin, Selasa, Rabu, Kamis, Jumat">
                                    </div>

                                    <hr>
                                    <label class="d-flex justify-content-between align-items-center">
                                        <b>Datasets</b>
                                        <button id="btnAddDataset" class="btn btn-sm btn-outline-primary">+ Add New</button>
                                    </label>
                                    
                                    <div id="container-datasets" class="mt-2">
                                        <div class="dataset-item border p-3 mb-3 shadow-sm">
                                            <label class="small font-weight-bold text-secondary">Dataset 1</label>
                                            <input type="text" class="form-control ds-value mb-2" placeholder="Values (e.g. 10,20,30)" value="12, 19, 3, 5, 2">
                                            <div class="d-flex align-items-center">
                                                <span class="small mr-2">Color:</span>
                                                <input type="color" class="ds-color" value="#4e73df">
                                            </div>
                                        </div>
                                    </div>

                                    <button id="btnCreate" class="btn btn-primary btn-block btn-lg shadow mt-3">🚀 Create Chart</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8 col-md-7">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h5 class="card-title mb-0">Live Preview</h5>
                                        <button class="btn btn-sm btn-light border" onclick="window.print()">Print Report</button>
                                    </div>
                                    <div style="position: relative; height:65vh; width:100%">
                                        <canvas id="myChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>                              
    </section>
</div>
