<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>

        <?php                
            if (!$this->input->post()) {
                $selectedPeriod = date('d F Y', strtotime($partpricePeriod[0]['period']));
            } else {
                $selectedPeriod = date('d F Y', strtotime($this->input->post('partpriceSelectPeriod')));
            }
        ?>

        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <span class="h5 text-primary">Kode Harga Spare Part</span>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-6">
                                    <form method="post">
                                        <div class="form-row">
                                            <div class="col-sm-3">
                                                <label for="partpriceSelectPeriod">
                                                    Periode: 
                                                </label>
                                            </div>
                                            <div class="col-sm-4" style="min-width: 170px;">
                                                <select class="custom-select" name="partpriceSelectPeriod" id="partpriceSelectPeriod">
                                                    <option><?= $selectedPeriod ?></option>
                                                    <?php foreach($periodList as $period): ?>
                                                        <option><?= date('d F Y', strtotime($period['period'])) ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>                                        
                                            <div class="col-sm-1">
                                                <button type="submit" class="btn btn-outline-info">Go</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">

                                    <table class="table table-sm table-hover table-bordered" cellpadding="5" cellspacing="5" id="tablePartPrice">
                                        <thead class="bg-info">
                                            <tr>
                                                <th rowspan="2" class="align-middle text-center">No</th>
                                                <th rowspan="2" class="align-middle text-center">Kode harga</th>
                                                <th colspan="3" class="text-center">Harga (termasuk Pajak)</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center">Dealer</th>
                                                <th class="text-center">Customer</th>
                                                <th class="text-center">Blackmarket</th>
                                            </tr>
                                        </thead>

                                        <tbody class="text-center">
                                            <?php $i = 1; ?>
                                            <?php foreach($partPriceByPeriod as $row) : ?>
                                                <tr>
                                                    <td><?= $i++; ?></td>
                                                    <td class="text-bold"><?= $row['price_code']; ?></td>
                                                    <td><?= number_format($row['price_dealer'], 0); ?></td>
                                                    <td class="text-primary"><?= number_format($row['price_customer'], 0); ?></td>
                                                    <td><?= number_format($row['price_blackmarket'], 0); ?></td>
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
        </div>
    </section>
</div>