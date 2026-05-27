<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
        <?php
            if ($this->input->post('dealerSelectDealerByCity') == false) {
                $selectedCity =  "";
            } else {
                $selectedCity = $this->input->post('dealerSelectDealerByCity');
            }

            if ($this->input->post('dealerSelectDealerByCategory') == false) {
                $selectedCategory =  "";
            } else {
                $selectedCategory = $this->input->post('dealerSelectDealerByCategory');
            }

            function ststag($label) {
                if (is_int(strpos(strtolower($label), 'sts')) == false ) {
                    return '';
                } else {
                    return ' <i class="text-primary fas fa-medal"></i>';
                }
            }

        ?>
        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <div class="card-title">
                                <h6 class="h5 text-primary">Daftar Dealer</h6>
                            </div>                            
                            <div class="card-tools">
                                <span class="mr-3">Last update: <?= date("d M Y h:i", strtotime($allDealers[0]['updated_at'])) ?></span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <form method="post" class="form-row">
                                        <label for="dealerSelectDealerByCity" class="col-sm-2" style="max-width: 100px;">Pilih kota</label>
                                        <div class="col-sm-4" style="max-width: 240px;">
                                            <select class="custom-select" name="dealerSelectDealerByCity" id="dealerSelectDealerByCity">
                                                <option value="<?= $selectedCity ?>" selected><?= $selectedCity ?></option>
                                                <option value=""> - semua kota - </option>
                                                <?php foreach ($allCities as $row) : ?>
                                                    <option value="<?= $row['city'] ?>"><?= $row['city'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <label for="dealerSelectDealerByCategory" class="col-sm-2 ml-5" style="max-width: 80px;">Kategori</label>
                                        <div class="col-sm-4" style="max-width: 240px;">
                                            <select class="custom-select" name="dealerSelectDealerByCategory" id="dealerSelectDealerByCategory">
                                                <option value="<?= $selectedCategory ?>"><?= $selectedCategory ?></option>
                                                <option value=""> - semua kategori - </option>
                                                <?php foreach ($allCategories as $row) : ?>
                                                    <option value="<?= $row['category'] ?>" ><?= $row['category'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <button class="btn btn-info">Go</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col">
                                    <table class="table table-sm table-hover" id="pricelistTableDealer">
                                        <thead>
                                            <tr class="bg-light">
                                                <th>#</th>
                                                <th>Kota</th>
                                                <th>Dealer/Toko</th>
                                                <th>Telepon</th>
                                                <th>Alamat</th>
                                                <th style="min-width: 140px;">Produk</th>
                                                <!-- <th>Cabang Sales</th> -->
                                                <th style="max-width: 180px;">Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($allDealers as $row): ?>
                                                <tr>
                                                    <td><?= $i++; ?></td>
                                                    <td><?= $row['city'] ?></td>
                                                    <td class="mr-3"><?= $row['dealer_name'] . ststag($row['category'])?></td>
                                                    <td><?= $row['dealer_phone'] ?></td>
                                                    <td><?= $row['dealer_address'] ?></td>
                                                    <td><?= $row['category'] ?></td>
                                                    <!-- <td><?= $row['sales_branch'] ?></td> -->
                                                    <td><?= $row['remark'] ?></td>
                                                    <!-- <td></td> -->
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
