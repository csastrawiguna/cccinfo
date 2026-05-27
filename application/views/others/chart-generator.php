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
                            <div class="card shadow-sm sticky-top">
                                <div class="card-body">
                                    <h5 class="text-primary font-weight-bold mb-3">Chart Configurator</h5>
                                    
                                    <div class="form-group">
                                        <label class="small font-weight-bold">Main Chart Type</label>
                                        <select id="chartType" class="form-control border-primary">
                                            <option value="bar">Bar Chart (Normal)</option>
                                            <option value="bar-stacked">Bar Chart (Stacked)</option>
                                            <option value="line-smooth">Line Chart (Smoothed)</option>
                                            <option value="area">Area Chart (Smoothed)</option>
                                            <option value="combo">Combo Chart (Bar + Line)</option>
                                            <option value="dual-axis">Dual Y-Axis (Compare Scales)</option>
                                            <option value="pie">Pie Chart</option>
                                            <option value="radar">Radar Chart</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="small font-weight-bold">X-Axis Labels</label>
                                        <input type="text" id="labels" class="form-control" value="24L ave, 25F ave, Oct '25, Nov '25, Dec '25">
                                    </div>

                                    <hr>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <b class="small">Datasets</b>
                                        <button id="btnAddDataset" class="btn btn-sm btn-outline-primary">+ Add Dataset</button>
                                    </div>
                                    
                                    <div id="container-datasets">
                                        <div class="dataset-item border p-3 mb-3 bg-white shadow-sm">
                                            <label class="small font-weight-bold text-muted">Dataset 1</label>
                                            <select class="form-control form-control-sm ds-type mb-2 d-none">
                                                <option value="bar">Display as Bar</option>
                                                <option value="line">Display as Line</option>
                                            </select>
                                            <input type="text" class="form-control ds-value mb-2" placeholder="Value (e.g. 10,20,30)" value="25,36, 39, 248, 678">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <input type="color" class="ds-color" value="#4e73df">
                                                <span class="small text-muted">Pick Color</span>
                                                <input type="number" class="form-control ds-color-opacity" min="0.1" max="1" step="0.1" value="0.3" style="max-width: 80px">
                                                <span class="small text-muted">Opacity</span>
                                            </div>
                                        </div>
                                    </div>

                                    <button id="btnCreate" class="btn btn-info btn-block btn-lg shadow-sm mt-3">Generate Chart</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8 col-md-7">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <h5 class="mb-0 font-weight-bold text-secondary">Preview Result</h5>
                                        <div id="chartStatus" class="badge badge-info p-2">Ready</div>
                                    </div>
                                    <div style="margin-bottom: 20px; font-family: sans-serif;">
                                        <label>Choose Background: </label>
                                        <select class="custom-select" id="themeSelect" style="display: inline; width: 150px;">
                                            <option value="light">Light Mode</option>
                                            <option value="dark">Dark Mode</option>
                                            <option value="custom">Custom Color</option>
                                        </select>

                                        <input type="color" id="colorPicker" value="#ffffff" style="display:none;">

                                        <div style="margin: 10px 0; font-family: sans-serif; font-size: 14px;">
                                            <span>Set Y-scale:</span>
                                            <input class="form-control" type="number" id="yMin" placeholder="Min" style="width: 80px; padding: 5px; display: inline;">
                                            <input class="form-control" type="number" id="yMax" placeholder="Max" style="width: 80px; padding: 5px; display: inline;">
                                            <button class="btn btn-sm btn-outline-info" id="btnApplyAxis" style="padding: 5px 10px; cursor: pointer;">Apply</button>
                                            <button class="btn btn-sm btn-outline-secondary" id="btnToggleLabels" style="padding: 5px 10px; cursor: pointer;">
                                                <i class="fa fa-eye"></i> Labels
                                            </button>
                                            <button class="btn btn-sm btn-info" id="btnToggleYaxis" style="padding: 5px 10px; cursor: pointer;">
                                                <i class="fa fa-eye"></i> Y-axis
                                            </button>
                                            <button class="btn btn-sm btn-info" id="btnToggleXaxis" style="padding: 5px 10px; cursor: pointer;">
                                                <i class="fa fa-eye"></i> X-axis
                                            </button>
                                        </div>
                                    </div>
                                    <!-- prev code <div style="position: relative; height:70vh; width:100%">
                                        <canvas id="myChart"></canvas>
                                    </div> -->
                                    <div id="chartContainer" style="padding: 20px; border-radius: 8px; position: relative; height:70vh; width:100%">
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
