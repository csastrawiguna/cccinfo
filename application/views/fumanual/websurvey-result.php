<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>

        <!-- <?php var_dump($result[0]) ?> -->
        <div class="container-fluid pt-2 px-1">
            <div class="card card-outline card-info">
                <div class="card-header">                            
                    <span class="h6 text-info">Hasil Isian Web Survey (FU by Web) oleh Konsumen</span>
                    <?php if (in_array($this->session->userdata('useraccess'), [1, 9])) : ?>
                        <div class="card-tools">
                            <div class="btn-group mr-3">
                                <a href="#" class="text-info" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;"><i class="fas fa-bars"></i> Format Upload</a>
                                <div class="dropdown-menu dropdown-menu-left pl-3" style="min-width: 180px;">
                                    <p class="mt-2">
                                        <a href="<?= base_url() ?>files/format_upload/Format_Upload_Web_Survey_Result.xlsx" class="mr-3 "title="Format isian dari Web Survey"><i class="fab fa-accessible-icon"></i> &nbsp;Web Survey</a>
                                    </p>
                                    <hr>
                                    <p>
                                        <a href="<?= base_url() ?>files/format_upload/Format_Upload_Web_Survey_Result.xlsx" class="mr-3 "title="Format isian hasil dowanload Data Coster"><i class="fas fa-magic"></i> &nbsp;WA Flow</a>
                                    </p>
                                </div>
                            </div>
                            <!-- <a href="<?= base_url() ?>files/format_upload/Format_Upload_Web_Survey_Result.xlsx" class="mr-3 text-info"><i class="fas fa-file"></i> Format upload</a> -->
                            <a href="#" data-toggle="modal" data-target="#modalUploadWebsurveyResult" class="mr-2 text-info"><i class="fas fa-upload"></i> Upload hasil web survey</a>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="card-body" style="min-height: 72vh">
                    <!-- <p class="lead">
                        Rangkuman hasil isian web survey konsumen sampai tanggal : <span class="text-bold"><?= date("j F Y", strtotime("-1 days")) ?></span><br>
                    </p> -->
                    <div class="jumbotron jumbotron-fluid" style="max-height: 120px; padding-top: 15px;">
                        <div class="container">
                            <h3 class="display-4 text-info">CS Survey by Web</h3>
                            <p class="lead">Rangkuman hasil isian web survey dari konsumen tanggal : <span class="text-info"><?= date("j F Y", strtotime($minmaxDate['date_min'])) ?> - <?= date("j F Y", strtotime($minmaxDate['date_max'])) ?></span><small style="font-size: 10px; float: right; position: relative; bottom: -10px; color: #666;">Last uploaded: <?= date("d-M-Y H:i", strtotime($minmaxDate['data_upload_at'])) ?></small></p>
                        </div>
                    </div>
                    
                    <div class="row mt-4" id="searchForm">
                        <div class="col-sm">
                            <form class="form-inline" method="post">
                                <div class="form-group mx-2">
                                    <label for="websurveySearchNotif" class="col-form-label mr-3">Cari notif</label>
                                    <input type="" class="form-control" id="websurveySearchNotif" name="websurveySearchNotif" value="<?= $this->input->post('websurveySearchNotif') ?>" placeholder="Masukkan notif disini" style="width: 240px;" autofocus>
                                </div>
                                <button type="submit" class="btn btn-info"><i class="fas fa-search"></i> Cari</button>
                                <a href="<?= base_url('fumanual/toExcelAllResult') ?>" class="btn btn-outline-success ml-2"><i class="fas fa-download"></i> All data (Excel)</a>
                            </form>
                        </div>
                    </div>
                    <div class="row mt-3" id="searchResultContainer">
                        <div class="col">
                            <?php if (count($result) < 1) : ?>
                                <div class="callout callout-warning mt-4">
                                    <p class="lead">
                                        <i class="fas fa-info-circle text-warning"></i> Data dengan notif : <span class="text-info"><?= $this->input->post('websurveySearchNotif') ?></span> tidak ditemukan.
                                    </p>
                                    <p>
                                        <ul><b>Kemungkinan:</b>
                                            <li>Nomor notif yang dimasukkan salah</li>
                                            <li>Konsumen belum isi survey.</li>
                                        </ul>
                                    </p>
                                </div>
                            <?php else : ?>
                                <p class="h5 mt-3 text-info">Result of:</p>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="list-group text-center">
                                            <div class="list-group-item list-group-item-action bg-info">
                                                <div class="d-flex w-100 justify-content-center">
                                                    <h5 class="text-bold mx-2"><?= $row['notification'] ?></h5>
                                                </div>
                                                <p class="">
                                                    <span class="badge badge-light badge-pill px-2 py-1"><?= $result[0]['fu_type'] ?></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="list-group">
                                            <div class="list-group-item list-group-item-action">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1">Q1</h5>
                                                </div>
                                                <p class="mb-1 text-bold"><?= $result[0]['q1_point'] ?></p>
                                                <p class="mb-1 text-danger"><?= $result[0]['q1_remark'] ?></p>
                                            </div>
                                        </div>
                                        <div class="list-group">
                                            <div class="list-group-item list-group-item-action">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1">Q2</h5>
                                                </div>
                                                <p class="mb-1 text-bold"><?= $result[0]['q2_point'] ?></p>
                                                <p class="mb-1 text-danger"><?= $result[0]['q2_remark'] ?></p>
                                            </div>
                                        </div>
                                        <div class="list-group">
                                            <div class="list-group-item list-group-item-action">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1">Q3</h5>
                                                </div>
                                                <p class="mb-1 text-bold"><?= $result[0]['q3_point'] ?></p>
                                                <p class="mb-1 text-danger"><?= $result[0]['q3_remark'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="modalUploadWebsurveyResult" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalUploadWebsurveyResultLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <?= form_open_multipart('Fumanual/uploadWebsurveyResult') ?>
            <!-- <form action="<?= base_url('Fumanual/uploadWebsurveyResult') ?>" method="POST"> -->
                <div class="modal-header">
                    <span class="modal-title text-primary h5" id="modalUploadWebsurveyResultTitle">
                        Upload Hasil Web Survey
                    </span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="uploadWebsurveyResultFile">Excel file Hasil web survey</label>
                        <input type="file" class="form-control" id="uploadWebsurveyResultFile" name="uploadWebsurveyResultFile" placeholder="Upload Excel format">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary" id="modalUploadWebsurveyResultSubmit" name="modalUploadWebsurveyResultSubmit"><i class="fas fa-upload"></i> Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>