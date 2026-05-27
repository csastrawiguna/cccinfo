<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
        <?php 
            function toStringDatetime($date){
                if (strtotime($date) < 0 || $date == '-' || $date == '') {
                    return '-';
                } else {
                    return date("d M Y h:i", strtotime($date));
                }
            }

            function toStringUser($data){
                if (strtotime($data) == null || $data == '0' || $data == '') {
                    return '-';
                } else {
                    return $data;
                }
            }
        ?>

        <div class="container-fluid pt-3">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <span class="text-indigo">Kelola data nomor seri</span>
                    <div class="card-tools">
                        <a href="#" class="mr-3" data-toggle="modal" data-target="#modalAddSingleSerial" id="buttonAddSerial"><i class="fas fa-plus-circle"></i> Tambah</a>
                        <a href="#" class="mr-3" data-toggle="modal" data-target="#modalUploadSerial" id="buttonUploadSerial"><i class="fas fa-upload"></i> Upload Excel</a>
                        <a href="<?= base_url('files/format_upload/Format_Upload_Serial_Number.xlsx') ?>" class="mr-3"><i class="fas fa-file-excel"></i> Format Upload</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-10">
                            <table class="table table-bordered" id="tableOthersManageSerialNumber">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category</th>
                                        <th>Model</th>
                                        <th>Kode di nomor seri</th>
                                        <th>...</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach($allSerials as $row) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $row['category'] ?></td>
                                            <td><?= $row['model'] ?></td>
                                            <td><?= $row['first_code'] ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <i class="fas fa-bars" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;"></i>
                                                    <div class="dropdown-menu dropdown-menu-left p-2" style="min-width: 320px;">
                                                        <table class="table table-sm table-borderless table-hover">
                                                            <tbody>
                                                                <tr>
                                                                    <td>Diunggah oleh</td>
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
                                                                        <a href="" class="text-primary buttonSerialEdit" title="Edit data" data-id="<?= $row['id']; ?>" data-toggle="modal" data-target="#modalAddSingleSerial">
                                                                            <i class="fas fa-edit"></i></span> &nbspEdit data
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                <tr class="border-top">
                                                                    <td class="py-2">
                                                                        <a class="text-danger buttonSerialDelete"  data-id="<?= $row['id']; ?>" title="Delete data" style="cursor: pointer; text-decoration: none;">
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
    </section>
</div>
<div class="modal fade" id="modalAddSingleSerial">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Kode No.Seri</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="addSerialId" id="addSerialId" value="">                    
                    <div class="form-group row">
                        <label for="addSerialCategory" class="col-sm-3 col-form-label">Category</label>
                        <div class="col-sm-9">
                            <select class="custom-select" id="addSerialCategory" name="addSerialCategory">
                                <option value="">- pilih kategori -</option>
                                <option value="AIR CONDITIONER">AIR CONDITIONER</option>
                                <option value="CHEST FREEZER FUJISEI">CHEST FREEZER FUJISEI</option>
                                <option value="REFF LOKAL">REFF LOKAL</option>
                                <option value="SHOWCASE">SHOWCASE</option>
                                <option value="TV LOKAL">TV LOKAL</option>
                                <option value="WASHING MACHINE LOKAL">WASHING MACHINE LOKAL</option>
                                <option value="WASHING MACHINE PENSONIC">WASHING MACHINE PENSONIC</option>
                                <option value="WASHING MACHINE WHIRPOOL">WASHING MACHINE WHIRPOOL</option>
                                <option value="WATER DISPENSER">WATER DISPENSER</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="addSerialModel" class="col-sm-3 col-form-label">Model</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="addSerialModel" name="addSerialModel">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="addSerialFirstcode" class="col-sm-3 col-form-label">Kode No. Seri</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="addSerialFirstcode" name="addSerialFirstcode">
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary" id="addSerialSubmit" name="addSerialSubmit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalUploadSerial">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <?= form_open_multipart('others/uploadSerialExcel'); ?>
                <div class="modal-header">
                    <h5 class="modal-title">Upload Data Kode No.Seri</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="uploadSerialFile" class="col-sm-2 col-form-label">File</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="uploadSerialFile" name="uploadSerialFile">
                        </div>
                    </div>                  
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary" id="uploadSerialSubmit" name="uploadSerialSubmit">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

