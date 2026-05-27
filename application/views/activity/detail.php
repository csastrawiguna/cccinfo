<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="container-fluid pt-2">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
        <?php
            require 'activity-function.php';

            function stringToList($str) {
                $arr = explode(';', $str);
                if (count($arr) < 2) {
                    return '<ul><li>' . $arr[0] . '</li></ul>';
                } else {
                    $out = '<ul>';
                    foreach ($arr as $row) {
                        $out = $out . '<li>' . $row . '</li>';
                    }
                    return $out . '</ul>';
                }
            }
        ?>
        <div class="card card-outline card-info">
            <div class="card-header">
                <span class="h6 text-primary">Cek Aktivitas CCC</span>
                <div class="card-tools">
                    <?php if (in_array($this->session->userdata('useraccess'), $allowedAccess)) : ?>
                        <a href="#" data-toggle="modal" data-target="#modalAddCCCActivity" id="buttonAddDailyActivity" class="mr-2 text-info"><i class="fas fa-plus"></i> Tambah Data Aktivitas</a>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <form action="" class="form-row mb-5" method="post" style="width: 520px;">
                            <label for="detailDailySelectMonth" class="col-sm-2">Month</label>
                            <div class="col-sm-4">
                                <input type="date" id="detailDailySelectMonth" name="detailDailySelectMonth" class="form-control" value="<?= $detailSelectMonth ?>">
                            </div>                               
                            <div class="row ml-1">
                                <button type="submit" class="btn btn-outline-primary" id="detailDailySubmit" name="detailDailySubmit">Go</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <table class="table table-sm">
                            <thead>
                                <tr class="small">
                                    <th>#</th>
                                    <th>Month</th>
                                    <th>Call</th>
                                    <th>Whatsapp</th>
                                    <th>Email</th>
                                    <th>Callback</th>
                                    <th>Conf.call</th>
                                    <th>Follow up</th>
                                    <th>Socmed</th>
                                    <th>Total</th>
                                    <th class="text-center">Work hour</th>
                                    <th>...</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($detailByMonth as $row) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= date("d-M", strtotime($row['date'])) ?></td>
                                        <td><?= number_format($row['icall'], 0) ?></td>
                                        <td><?= number_format($row['whatsapp'], 0) ?></td>
                                        <td><?= number_format($row['email'], 0) ?></td>
                                        <td><?= number_format($row['callback'], 0) ?></td>
                                        <td><?= number_format($row['confirmation_call'], 0) ?></td>
                                        <td><?= number_format($row['followup'], 0) ?></td>
                                        <td><?= number_format($row['socmed_inquiry'], 0) ?></td>
                                        <td><?= number_format($row['total'], 0) ?></td>
                                        <td class="text-center"><?= number_format($row['work_hour'], 0) ?></td>
                                        <td>
                                            <button class="btn btn-xs text-primary btnEditDailyActivity" data-xdate="<?= $row['date'] ?>" data-toggle="modal" data-target="#modalAddCCCActivity">
                                                <i class="fas fa-pen"></i>
                                            </button>
                                            <button class="btn btn-xs text-info btnShowRemarkDailyActivity" data-textinfo="<?= $row['remark'] ?>" data-dateinfo="<?= date("d M 'y", strtotime($row['date'])) ?>">
                                                <i class="fas fa-info"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-10">
                        <span class="badge badge-pill badge-danger py-2 px-3">Remarks/Error Lists</span>
                        <div class="timeline mt-3">
                            <?php foreach ($detailByMonth as $row) : ?>
                                <?php if ($row['remark'] != null || $row['remark'] != '') : ?>
                                    <div>
                                        <i class="fas fa-clock bg-secondary"></i>
                                        <div class="timeline-item">
                                            <h3 class="timeline-header text-danger text-bold" style="background-color: rgba(155, 0, 0, 0.1);">
                                                <?= date("j F Y", strtotime($row['date'])) ?>
                                            </h3>
                                            <div class="timeline-body">
                                                <?= stringToList($row['remark']) ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <div>
                                <i class="fas fa-clock bg-gray"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalAddCCCActivity">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="POST" action="">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Aktivitas CCC</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="addCCCActivityDate" class="col-sm-4 col-form-label">Tanggal</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="addCCCActivityDate" name="addCCCActivityDate">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="addCCCActivityCall" class="col-sm-4 col-form-label">Call (ACD on CMS)</label>
                    <div class="col-sm-8">
                        <input type="" class="form-control" id="addCCCActivityCall" name="addCCCActivityCall">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="addCCCActivityWhatsapp" class="col-sm-4 col-form-label">Whatsapp</label>
                    <div class="col-sm-8">
                        <input type="" class="form-control" id="addCCCActivityWhatsapp" name="addCCCActivityWhatsapp">
                    </div>
                </div>
                <!-- <div class="form-group row">
                    <label for="addCCCActivitySMS" class="col-sm-4 col-form-label">SMS</label>
                    <div class="col-sm-8">
                        <input type="" class="form-control" id="addCCCActivitySMS" name="addCCCActivitySMS">
                    </div>
                </div> -->
                <div class="form-group row">
                    <label for="addCCCActivityEmail" class="col-sm-4 col-form-label">Email</label>
                    <div class="col-sm-8">
                        <input type="" class="form-control" id="addCCCActivityEmail" name="addCCCActivityEmail">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="addCCCActivityCallback" class="col-sm-4 col-form-label">Callback</label>
                    <div class="col-sm-8">
                        <input type="" class="form-control" id="addCCCActivityCallback" name="addCCCActivityCallback">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="addCCCActivityConfirmationcall" class="col-sm-4 col-form-label">Confirmation call</label>
                    <div class="col-sm-8">
                        <input type="" class="form-control" id="addCCCActivityConfirmationcall" name="addCCCActivityConfirmationcall">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="addCCCActivityFollowup" class="col-sm-4 col-form-label">Follow up</label>
                    <div class="col-sm-8">
                        <input type="" class="form-control" id="addCCCActivityFollowup" name="addCCCActivityFollowup">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="addCCCActivitySocmedInquiry" class="col-sm-4 col-form-label">Social Media</label>
                    <div class="col-sm-8">
                        <input type="" class="form-control" id="addCCCActivitySocmedInquiry" name="addCCCActivitySocmedInquiry">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="addCCCActivityWorkhour" class="col-sm-4 col-form-label">Work Hours</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="addCCCActivityWorkhour" name="addCCCActivityWorkhour" value="0">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="addCCCActivityRemark" class="col-sm-4 col-form-label">Remark</label>
                    <div class="col-sm-8">
                        <!-- <input type="number" class="form-control" id="addCCCActivityRemark" name="addCCCActivityRemark" value=""> -->
                        <textarea type="number" class="form-control" id="addCCCActivityRemark" name="addCCCActivityRemark"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-primary" id="addCCCActivitySubmit"><i class="fas fa-save"></i> Save</button>
            </div>
            </form>
        </div>
    </div>
</div>