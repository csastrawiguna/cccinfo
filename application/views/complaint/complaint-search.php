<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-fluid pt-2 px-2">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
        <?php
        require 'view-function.php';
        ?>

        <div class="card card-outline card-info">
            <div class="card-header">
                <span class="h6">Data Keluhan (notif / no. telepon) : <span class="text-primary text-bold"><?= $this->input->post('complaintSearchClue') ?></span></span>
                <div class="card-tools pr-3">
                    <a href="#" class="mr-2 text-info" data-toggle="modal" data-target="#modalComplaintSearch"><i class="fas fa-search"></i> Cari Lagi</a>
                    <?php if (in_array($this->session->userdata('useraccess'), $allowedAccess)) : ?>
                        <a href="<?= base_url('complaint/add') ?>" class="mr-3 text-info" ><i class="fas fa-plus-circle"></i> Tambah</a>
                    <?php endif; ?>
                    <a href="<?= base_url('complaint/list') ?>" class="text-info"><i class="fas fa-arrow-circle-left"></i> Back to list</a>
                </div>
            </div>
            
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <table class="table" id="tableComplaintList">
                            <thead class="">
                                <tr>
                                    <th class="align-middle">#</th>
                                    <th class="align-middle">Tggl</th>
                                    <th class="align-middle">Notif</th>
                                    <th class="align-middle">Kategori / Desc.</th>
                                    <th class="align-middle">Customer</th>
                                    <th class="align-middle">Notif / unit</th>
                                    <th class="align-middle">Keluhan</th>
                                    <th class="align-middle">PIC report</th>
                                    <th class="align-middle">Status</th>
                                    <th class="align-middle">...</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($searchResults as $row) : ?>
                                    <tr class="<?= isurgentToStyle($row['is_urgent'], $row['claim_status'], $row['claim_description']) ?>">
                                        <td>
                                            <small><?= $i++ ?></small>
                                        </td>
                                        <td>
                                            <small><?= date("d-M", strtotime($row['claim_date'])) ?></small>
                                            <br>
                                            <small class="text-muted">[<?= $row['claim_source'] ?>]</small>
                                        </td>
                                        <td>
                                            <?= $row['notification']?> 
                                        </td>
                                        <td>
                                            <?= $row['claim_category'] ?>
                                            <br>/
                                            <?= stringLimiter12($row['claim_description']) ?>
                                            <br>
                                            <small class="text-muted"><?= $row['part1_code'] ?></small>
                                        </td>
                                        <td>
                                            <?= $row['customer_name'] ?>
                                            <br>
                                            <small class="text-muted"><?= substr($row['customer_phone'], 0, 13) ?> ...</small>
                                        </td>
                                        <td>
                                            <?= $row['notification'] ?>
                                            <br>
                                            <small><?= $row['model'] ?></small>
                                            <br>
                                            <small><?= $row['product_category'] ?></small>
                                            <?php if(strtolower($row['claim_status']) != 'case closed') :  ?>
                                                <span class="requestInfoSign" data-by="<?= $row['responsed_by'] . ' - ' . date("d-M", strtotime($row['responsed_at'])) ?>" data-message="<?= $row['response_request'] ?>"><?= responseRequest($row['response_request']) ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?= substr($row['claim_detail'], 0, 80) ?> ...</td>
                                        <td>
                                            <?= cekNullPicReport($row['pic_report_1'], $row['pic_report_2']) ?>
                                            <p><?= isresponsedBranch($row['isresponsed_branch']) ?> <?= isresponsedSass($row['isresponsed_sass']) ?> <?= isresponsedSasshq($row['isresponsed_sasshq']) ?> <?= isresponsedPart($row['isresponsed_part']) ?></p>
                                        </td>
                                        <td><?= statusToBadge($row['claim_status']) ?></td>
                                        <td>
                                            <div>
                                                <a href="<?= base_url() . 'complaint/view/' . $row['id']; ?>" class="buttonComplaintEdit" target="_blank" title="View detail">
                                                    <i class="fas fa-search"></i>
                                                </a>
                                            </div>
                                            <div class="btn-group">
                                                <i class="fas fa-bars" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;"></i>
                                                <div class="dropdown-menu dropdown-menu-right p-2" style="min-width: 420px;">
                                                    <table class="table table-sm table-borderless table-hover">
                                                        <tbody>
                                                            <tr>
                                                                <td>Reservasi part</td>
                                                                <td class="">: <?= $row['part_reservation']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Under cabang</td>
                                                                <td class="">: <?= $row['under_branch']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Regional area</td>
                                                                <td class="">: <?= $row['regional_area']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Agent penerima keluhan</td>
                                                                <td class="">: <?= $row['agent']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2" class="border-bottom"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Disimpan oleh</td>
                                                                <td class="">: <?= $row['saved_by']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Disimpan pada</td>
                                                                <td class="">: <?= toStringDatetime($row['saved_at']); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Update oleh</td>
                                                                <td>: <?= $row['updated_by']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Update pada</td>
                                                                <td>: <?= toStringDatetime($row['updated_at']); ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table class="table table-sm table-borderless">
                                                        <tbody>
                                                            <tr class="border-top">
                                                                <td class="py-2">
                                                                    <p>
                                                                        <a href="<?= base_url() . 'complaint/view/' . $row['id']; ?>" class="text-primary buttonComplaintEdit" target="_blank" title="View detail">
                                                                            <i class="fas fa-search"></i> View detail / <i class="fas fa-plus-circle"></i> Update progress
                                                                        </a>
                                                                    </p>
                                                                    <?php if (in_array($this->session->userdata('useraccess'), $allowedAccess = [1, 9])) : ?>
                                                                        <p>
                                                                            <a href="<?= base_url() . 'complaint/edit/' . $row['id']; ?>" class="text-primary buttonComplaintEdit" target="_blank" title="Edit data">
                                                                                <i class="far fa-edit"></i> Edit data
                                                                            </a>
                                                                        </p>
                                                                    <?php endif; ?>
                                                                </td>
                                                            </tr>
                                                            <?php if (in_array($this->session->userdata('useraccess'), $allowedAccess = [1, 9])) : ?>
                                                                <tr class="border-top">
                                                                    <td class="py-2">
                                                                        <p>
                                                                            <a href="<?= base_url() . 'complaint/delete/' . $row['id']; ?>" class="text-danger buttonComplaintDelete" title="Delete data">
                                                                                <i class="fas fa-trash"></i> Delete data
                                                                            </a>
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                            <?php endif; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
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
</div>

<div class="modal fade" id="modalComplaintSearch">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="POST" action="<?= base_url('complaint/search') ?>">
                <div class="modal-header">
                    <h4 class="modal-title">Cari Keluhan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="complaintSearchClue" class="form-label">Notif atau nomor telepon</label>
                        <input type="" class="form-control" id="complaintSearchClue" name="complaintSearchClue" placeholder="Masukkan nomor notif atau nomor telepon">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
            </form>
        </div>
    </div>
</div>
