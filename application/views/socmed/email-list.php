<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
        <?php
            if (!$this->input->post()) {
                $startPeriod = date("Y-m-01");
                $endPeriod = date("Y-m-d");
            } else {
                $startPeriod = date('Y-m-d', strtotime($this->input->post('emailInquiryStartPeriod')));
                $endPeriod = date('Y-m-d', strtotime($this->input->post('emailInquiryEndPeriod')));
            }

            function channeltoIcon($channel) {
                if (strtolower($channel) == 'twitter') {
                    $icon = '<i class="fab fa-twitter text-info"></i>';
                } else if (strtolower($channel) == 'facebook') {
                    $icon = '<i class="fab fa-facebook text-primary"></i>';
                } else if (strtolower($channel) == 'instagram') {
                    $icon = '<i class="fab fa-instagram text-danger"></i>';
                } else {
                    $icon = '-';
                }
                return $icon;
            }

            function toStringDatetime($date)
            {
                if (strtotime($date) < 0 || $date == '-' || $date == '') {
                    return '-';
                } else {
                    return date("d M Y h:i", strtotime($date));
                }
            }

            $allowedAccess = [1, 9];
        ?>
        
        <div class="container-fluid pt-3">       
            <div class="card card-info card-outline">
                <div class="card-header">
                    <span class="text-info">Daftar Pertanyaan dari Email</span>
                    <div class="card-tools">
                        <a href="<?= base_url('Socmedinquiry/newemailinquiry') ?>" class="pr-3 text-info"><i class="fas fa-plus-circle"></i> Insert data baru</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form method="post">
                            <div class="form-row"  style="min-width: 520px;">
                                <div class="col-sm-2">Periode</div>
                                <div class="text-center" style="width: 150px">
                                    <input type="date" class="custom-select" name="emailInquiryStartPeriod" id="emailInquiryStartPeriod" value="<?= $startPeriod ?>">
                                </div>
                                <div class="text-center mx-1">-</div>
                                <div class="text-center" style="width: 150px">
                                    <input type="date" class="custom-select" name="emailInquiryEndPeriod" id="emailInquiryEndPeriod" value="<?= $endPeriod ?>">
                                </div>
                                <div class="ml-1" style="width: 100px;">
                                    <button type="submit" class="btn btn-outline-info">Go</button>
                                    <?php if(count($emailDataByPeriod) > 0) : ?>
                                        <a href="<?= base_url('socmedinquiry/emaillisttoexcel/') . $startPeriod . '/' . $endPeriod  ?>">
                                            <button type="button" class="btn btn-outline-success"><i class="fas fa-file-excel"></i></button>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <p class="lead text-center text-primary">Pertanyaan dari Email period : <?= date("F Y", strtotime($startPeriod)) ?> - <?= date("F Y", strtotime($endPeriod)) ?></p>
                            
                            <table class="table table-sm table-bordered" id="socmedTableInquryList">
                                <thead>
                                    <tr class="text-center">
                                        <th class="align-middle">#</th>
                                        <th class="align-middle">Tanggal</th>
                                        <th class="align-middle">Nama / Akun / Telep</th>
                                        <th class="align-middle">Kategori<br>Model</th>
                                        <th class="align-middle">SysCod</th>
                                        <th class="align-middle">Pertanyaan</th>
                                        <th class="align-middle">Jawaban/action</th>
                                        <th class="align-middle">Remark</th>
                                        <th class="align-middle">...</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach($emailDataByPeriod as $row) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= date("d-M-y H:m", strtotime($row['datetime'])) ?></td>
                                            <td>
                                                <?= $row['customer_email'] ?>
                                                <br>
                                                <span class="text-muted"><?= $row['customer_data'] ?></span>
                                            </td>
                                            <td>
                                                <?= $row['product_category'] ?>
                                                <br>
                                                <small class="text-muted"><?= $row['model'] ?></small>
                                            </td>
                                            <td class="text-center"><?= $row['system_code'] ?></td>
                                            <td><?= $row['i_detail'] ?></td>
                                            <td><?= $row['action_detail'] ?></td>
                                            <td><?= $row['remark'] ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <i class="fas fa-bars" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;"></i>
                                                    <div class="dropdown-menu dropdown-menu-right p-2" style="min-width: 420px;">
                                                        <table class="table table-sm table-borderless table-hover">
                                                            <tbody>
                                                                <tr>
                                                                    <td>Disimpan oleh</td>
                                                                    <td class="">: <?= $row['saved_by']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Diunggah pada</td>
                                                                    <td class="">: <?= toStringDatetime($row['saved_at']); ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Diperbaharui oleh</td>
                                                                    <td>: <?= $row['updated_by']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Diperbaharui pada</td>
                                                                    <td>: <?= toStringDatetime($row['updated_at']); ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <table class="table table-sm table-borderless">
                                                            <tbody>
                                                                <tr class="border-top">
                                                                    <td class="py-2">
                                                                        <a href="<?= base_url('socmedinquiry/emailedit/') . $row['id'] ?>"><i class="fas fa-edit"></i> Edit data</a>
                                                                    </td>
                                                                </tr>
                                                                <?php if (in_array($this->session->userdata('useraccess'), $allowedAccess)) : ?>
                                                                    <tr class="border-top">
                                                                        <td class="py-2">
                                                                            <a class="text-danger buttonEmaillistDelete"  data-id="<?= $row['id']; ?>" data-period="<?= $row['id']; ?>" title="Delete data" style="cursor: pointer; text-decoration: none;">
                                                                                <i class="fas fa-trash"></i> &nbspDelete data
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                <?php endif; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </td>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>                    
    </section>
</div>
