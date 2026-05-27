<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
        <?php
            if (!$this->input->post()) {
                $startDate = date("Y-m-d", strtotime("-7 days"));
                $endDate = date("Y-m-d");
                $branch = $branchInfo;
            } else {
                $startDate = $this->input->post('scheduleStartDate');
                $endDate = $this->input->post('scheduleEndDate');
                $branch = strtoupper($this->input->post('scheduleSelectBranch'));
            }

            function toStringDate($date)
            {
                if (strtotime($date) < 0) {
                    return '-';
                } else {
                    return date("d-M-Y h:i", strtotime($date));
                }
            }

            $allowedAccess = [1, 9];
        ?>

        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <div class="card-title">
                                Cabang/SDSS : <span class="text-info text-bold"><?= $branchInfo; ?>
                            </div>
                            <div class="card-tools">
                                <?php if (in_array($this->session->userdata('useraccess'), $allowedAccess)) : ?>
                                    <button class="btn btn-sm" data-toggle="modal" data-target="#modalAddSingleSchedule" id="buttonAddSingleSchedule"> <i class="fas fa-plus-circle"></i> Add schedule </button>
                                    <button class="btn btn-sm" data-toggle="modal" data-target="#modalUploadScheduleRepair"> <i class="fas fa-upload"></i> Upload from Excel </button>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <form method="post">
                                        <div class="form-row">
                                            <div class="col-1">
                                                <label for="scheduleSelectBranch">Cabang</label>
                                            </div>
                                            <div class="col-3" style="max-width: 150px;">
                                                <select type="date" class="form-control custom-select" name="scheduleSelectBranch" id="scheduleSelectBranch">
                                                    <option value=""><?= $branchInfo ?></option>
                                                    <option value="">- pilih Cabang-</option>
                                                    <?php foreach ($branchesLit as $row) : ?>
                                                        <option value="<?= $row['branch'] ?>"><?= $row['branch'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-1 ml-5">
                                                <label for="scheduleStartDate">Tanggal</label>
                                            </div>
                                            <div class="col-3" style="max-width: 160px;">
                                                <input type="date" class="form-control" name="scheduleStartDate" id="scheduleStartDate" value="<?= $startDate; ?>">
                                            </div>
                                            <div class="col-3" style="max-width: 160px;">
                                                <input type="date" class="form-control" name="scheduleEndDate" id="scheduleEndDate" value="<?= $endDate; ?>">
                                            </div>
                                            <div class="col-1">
                                                <button type="submit" class="btn btn-outline-info">Go</button>
                                            </div>
                                            <small class="text-muted"><em>*Maks. 6 bulan terakhir</em></small>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <table class="table table-hover" id="tableScheduleRepair">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Notif</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>Model</th>
                                                <th>Stts</th>
                                                <th>Jadwal</th>
                                                <th>Teknisi</th>
                                                <th>...</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($scheduleRepair as $data) : ?>
                                                <tr>
                                                    <td><?= $i++; ?></td>
                                                    <td><?= $data['notif']; ?></td>
                                                    <td><?= $data['customer_name']; ?></td>
                                                    <td><?= $data['customer_address']; ?></td>
                                                    <td><?= $data['model']; ?></td>
                                                    <td><?= $data['notif_status']; ?></td>
                                                    <td><?= date("d-M", strtotime($data['visit_schedule'])); ?></td>
                                                    <td><?= $data['technician']; ?></td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <i class="fas fa-bars" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;"></i>
                                                            <div class="dropdown-menu dropdown-menu-right p-2" style="min-width: 300px;">
                                                                <table class="table table-sm table-borderless table-hover">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>Keterangan</td>
                                                                            <td class="">: <?= $data['remark']; ?></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <table class="table table-sm table-borderless">
                                                                    <tbody>
                                                                        <tr class="border-top">
                                                                            <td class="py-2">
                                                                                <a href="" class="text-primary buttonScheduleRepairEdit" title="Edit data" data-id="<?= $data['id']; ?>" data-toggle="modal" data-target="#modalAddSingleSchedule">
                                                                                    <i class="fas fa-pen"></i></span> &nbspEdit data
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="border-top">
                                                                            <td class="py-2">
                                                                                <a class="text-danger buttonScheduleRepairDelete" href="<?= base_url() ?>schedule/deleterepair/<?= $data['id'] ?>" title="Delete data" style="cursor: pointer; text-decoration: none;">
                                                                                    <i class="fas fa-trash"></i> &nbspDelete data
                                                                                </a>
                                                                            </td>
                                                                        </tr>
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
        </div>
    </section>
</div>

<!-- modal upload from Excel -->
<div class="modal fade" id="modalUploadScheduleRepair">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <?= form_open_multipart('schedule/uploadScheduleRepair'); ?>
            <div class="modal-header">
                <h4 class="modal-title">Upload jadwal dari Excel</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="uploadScheduleCabang" class="col-sm-2 col-form-label">Cabang</label>
                    <div class="col-sm-10">
                        <input type="" class="form-control" id="uploadScheduleCabang" name="uploadScheduleCabang" value="<?= $branchInfo; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="uploadScheduleFile" class="col-sm-2 col-form-label">File</label>
                    <div class="col-sm-10">
                        <input type="file" class="" id="uploadScheduleFile" name="uploadScheduleFile">
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- modal add single data -->
<div class="modal fade" id="modalAddSingleSchedule">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah data manual</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="addSingleScheduleId" id="addSingleScheduleId">
                    <div class="form-group row">
                        <label for="addSingleScheduleBranch" class="col-sm-2 col-form-label">Cabang</label>
                        <div class="col-sm-10">
                            <select class="custom-select" name="addSingleScheduleBranch" id="addSingleScheduleBranch">
                                <option value="<?= $branchInfo; ?>"><?= $branchInfo; ?></option>
                                <?php foreach ($branches as $row) : ?>
                                    <option value="<?= $row['branch']; ?>"><?= $row['branch']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group row">
                                <label for="addSingleScheduleNotif" class="col-sm-4 col-form-label">Notif</label>
                                <div class="col-sm-8">
                                    <input type="" class="form-control" id="addSingleScheduleNotif" name="addSingleScheduleNotif">
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                <label for="addSingleScheduleStatus" class="col-sm-4 col-form-label">Status</label>
                                <div class="col-sm-8">
                                    <input type="" class="form-control" id="addSingleScheduleStatus" name="addSingleScheduleStatus">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="addSingleScheduleName" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="" class="form-control" id="addSingleScheduleName" name="addSingleScheduleName">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="addSingleScheduleAddress" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="" class="form-control" id="addSingleScheduleAddress" name="addSingleScheduleAddress">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="addSingleSchedulePhone" class="col-sm-2 col-form-label">Telepon</label>
                        <div class="col-sm-10">
                            <input type="" class="form-control" id="addSingleSchedulePhone" name="addSingleSchedulePhone">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="addSingleScheduleModel" class="col-sm-2 col-form-label">Model</label>
                        <div class="col-sm-10">
                            <input type="" class="form-control" id="addSingleScheduleModel" name="addSingleScheduleModel">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="addSingleScheduleDescription" class="col-sm-2 col-form-label">Kerusakan</label>
                        <div class="col-sm-10">
                            <input type="" class="form-control" id="addSingleScheduleDescription" name="addSingleScheduleDescription">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="addSingleScheduleTechnician" class="col-sm-2 col-form-label">Teknisi</label>
                        <div class="col-sm-10">
                            <input type="" class="form-control" id="addSingleScheduleTechnician" name="addSingleScheduleTechnician">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="addSingleScheduleSchedule" class="col-sm-2 col-form-label">Jadwal</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="addSingleScheduleSchedule" name="addSingleScheduleSchedule" value="<?= date("Y-m-d"); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="addSingleScheduleRemark" class="col-sm-2 col-form-label">Keterangan</label>
                        <div class="col-sm-10">
                            <input type="" class="form-control" id="addSingleScheduleRemark" name="addSingleScheduleRemark">
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary" id="addSingleScheduleSubmit" name="addSingleScheduleSubmit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>