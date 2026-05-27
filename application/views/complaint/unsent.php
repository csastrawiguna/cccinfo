<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-fluid pt-2">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
        <?php
        require 'view-function.php';
        ?>

        <div class="card card-outline card-info">
            <div class="card-header">
                <span class="h6">Daftar keluhan belum dikirim <span class="text-danger text-bold">(kondisi jika email complaint (5a/5b/5c/5d/5e) error)</span></span>
                <div class="card-tools">
                    <a href="<?= base_url('complaint/insertmanual') ?>" class="pr-3"><i class="fas fa-plus-circle"></i> Insert Data Baru</a>
                </div>
            </div>
            
            <div class="card-body">                
                <table class="table table-sm" id="tableComplaintManualUnsent">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tgl</th>
                            <th>Jam</th>
                            <th>Kategori</th>
                            <th>Customer</th>
                            <th>Keluhan</th>
                            <th>Agent</th>
                            <th>Status</th>
                            <?php if (in_array($this->session->userdata('useraccess'), $allowedAccess)) : ?>
                                <th>...</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach($allUnsentManual as $row) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= date("d-M-Y", strtotime($row['claim_date'])) ?></td>
                                <td><?= date("H:i", strtotime($row['saved_at'])) ?></td>
                                <td><?= $row['claim_category'] ?></td>
                                <td><?= $row['customer_name'] ?><br><?= $row['customer_phone'] ?><br><?= $row['model'] ?><br><?= substr($row['notification'], 0, 10) ?></td>
                                <td><?= $row['claim_detail'] ?></td>
                                <td><?= $row['saved_by'] ?></td>
                                <td>
                                    <?= integerToSentStatus($row['is_sent']) ?><?= noteUnsent($row['remark_internal']) ?>
                                </td>
                                <?php if (in_array($this->session->userdata('useraccess'), $allowedAccess)) : ?>
                                    <td>
                                        <div class="btn-group">
                                            <i class="fas fa-bars" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;"></i>
                                            <div class="dropdown-menu dropdown-menu-right p-2" style="min-width: 220px;">
                                                <table class="table table-sm table-borderless">
                                                    <tbody>
                                                        <tr class="border-top">
                                                            <td class="py-2">
                                                                <a href="<?= base_url() . 'complaint/delete/' . $row['id']; ?>" class="text-danger buttonComplaintDelete" title="Delete data">
                                                                    <i class="fas fa-trash"></i> Delete data
                                                                </a>
                                                                
                                                            </td>
                                                        </tr>
                                                        <tr class="border-top">
                                                            <td class="py-2">
                                                                <a href="#" class="text-dark btnAddNoteUnsent" data-toggle="modal" data-target="#addUnsentNote" data-id="<?= $row['id'] ?>" data-note="<?= $row['remark_internal'] ?>" title="Tambah note">
                                                                    <i class="fas fa-list-alt"></i> Add/edit/view note
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr class="border-top">
                                                            <td class="py-2">
                                                                <a href="<?= base_url() . 'complaint/manualedit/' . $row['id']; ?>" class="" title="Delete data">
                                                                    <i class="fas fa-edit"></i> Process data
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addUnsentNote" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addUnsentNoteLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="<?= base_url('complaint/addNoteUnsent') ?>" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUnsentNoteLabel">Tambah Note untuk Keluhan Unsent</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="addNoteUnsentComplaintId" id="addNoteUnsentComplaintId" value="">
                    <div class="form-group">
                        <label for="addNoteUnsentRemarkInternal">Catatan</label>
                        <textarea class="form-control" id="addNoteUnsentRemarkInternal" name="addNoteUnsentRemarkInternal" rows="5" <?= in_array($this->session->userdata('useraccess'), $allowedAccess) ? '' : 'readonly' ?>></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="addNoteUnsentSubmit" name="addNoteUnsentSubmit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>