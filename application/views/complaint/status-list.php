<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-fluid pt-2">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
        <?php
            require 'view-function.php';
        ?>

        <div class="card card-outline card-info">
            <div class="card-header">
                <span class="h6 text-primary">Daftar Status Keluhan</span>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-sm-9">
                        <table class="table table-hover tableDatatableFullOption">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Status</th>
                                    <th>Deskripsi</th>
                                    <th>Group</th>
                                    <th>Remark</th>
                                    <th class="text-center">...</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($statusList as $row): ?>
                                    <tr>
                                        <td class="text-center"><?= $i++ ?> </td>
                                        <td class="text-center"><span class="badge badge-info"><?= $row['status'] ?></span></td>
                                        <td><?= $row['description'] ?></td>
                                        <td class=""><?= $row['group_status'] ?></td>
                                        <td><?= $row['remark'] ?></td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <i class="fas fa-bars" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;"></i>
                                                <div class="dropdown-menu dropdown-menu-right" style="min-width: 320px;">
                                                    <table class="table table-borderless">
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="3"><strong>[<?= $row['status'] ?>] - <?= $row['description'] ?></strong></td>
                                                            </tr>
                                                            <tr class="border-top">
                                                                <td>Update oleh</td>
                                                                <td>:</td>
                                                                <td><?= $row['updated_by'] ?></td>
                                                            </tr>
                                                            <tr class="border-top">
                                                                <td>Update pada</td>
                                                                <td>:</td>
                                                                <td><?= date("d-M-Y H:i", strtotime($row['updated_at'])) ?></td>
                                                            </tr>
                                                            <?php if (in_array($this->session->userdata('useraccess'), $allowedAccess = [1, 9])) : ?>
                                                                <tr class="border-top">
                                                                    <td class="" colspan="3">
                                                                        <p>
                                                                            <a href="<?= base_url() . 'complaint/statusedit/' . $row['id']; ?>" class="text-info buttonComplaintStatusEdit" title="Edi data">
                                                                                <i class="fas fa-edit"></i> Edit data
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
