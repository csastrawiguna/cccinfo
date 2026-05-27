<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
        <?php 
        $allowedAccess = ['1', '9']; 

        function amount2color($num){
            if($num < 500000 && $num > 100000){
              return 'text-danger';
            } else if ($num <= 100000) {
              return 'text-danger text-bold';
            } else {
                return '';
            }
        }

        function status2color($stts){
            if($stts == 'OK'){
              return '';
            } else {
              return 'text-danger';
            }
        }

        function fileToIcon($file) {
            $text = explode('.', $file);
            $images = ['jpg', 'jpeg', 'png', 'gif'];
            $general = ['doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx'];
            
            if (in_array(strtolower($text[1]), $images)) {
                $ext = 'fas fa-file-image';
            } else if (strtolower($text[1]) == 'pdf') {
                $ext = 'fas fa-file-pdf';
            } else {
                $ext = 'fas fa-file';
            }
            return $ext;
        }
        ?>

        <div class="container-fluid pt-3">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <span class="h6 text-info"><i class="fas fa-info-circle"></i> Info SASS AR (overdue/overlimit) - per tanggal: <span class="text-primary"><?= date("d M Y", strtotime($sassar[0]['date'])) ?></span></span>
                    <div class="card-tools">
                        <a href="#" data-toggle="modal" data-target="#modalUploadSassAr" class="mr-3">
                            <i class="fas fa-upload"></i> Upload/Add AR Data
                        </a>
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="mb-4">
                        <small class="text-secondary">
                            Uploaded by : <?= $sassar[0]['saved_by'] ?> | <?= date("d M Y H:i", strtotime($sassar[0]['saved_at'])) ?>
                        </small>
                    </div>
                    <div class="row mb-5">
                        <div class="col">
                            <table class="table table-sm tableDatatableFullOption" id="tableInfoList1">
                                <thead>
                                    <tr class="bg-light">
                                        <th>#</th>
                                        <th class="text-center">CSMS</th>
                                        <th class="">SAP</th>
                                        <th>Nama SASS</th>
                                        <th>Cabang</th>
                                        <th>TAT</th>
                                        <th>Sisa Limit</th>
                                        <th>Status</th>
                                        <th>Remark</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach($sassar as $row) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td class="text-center"><?= $row['sass_csmsid'] ?></td>
                                            <td class=""><?= $row['sass_sapid'] ?></td>
                                            <td><?= $row['sass_name'] ?></td>
                                            <td><?= $row['under_branch'] ?></td>
                                            <td class="text-center"><?= $row['tat'] ?></td>
                                            <td class="text-right <?= amount2color($row['remain_limit']) ?>"><?= number_format($row['remain_limit'], 0) ?></td>
                                            <td class="<?= status2color($row['status']) ?>"><?= $row['status'] ?></td>
                                            <td><?= $row['remark'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="modalUploadSassAr">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <?= form_open_multipart('promo/uploadExcelSassAr'); ?>
            <div class="modal-header">
                <h4 class="modal-title">Upload data AR SASS (Excel)</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="uploadSassArDate" class="col-sm-2 col-form-label">Date</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="uploadSassArDate" name="uploadSassArDate" value="<?= date("Y-m-d") ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="uploadSassArFile" class="col-sm-2 col-form-label">File</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="uploadSassArFile" name="uploadSassArFile">
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-primary"><i class="fas fa-upload"></i> Upload</button>
            </div>
            </form>
        </div>
    </div>
</div>