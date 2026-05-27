<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
        <?php        
        function toStringDate($date)
        {
            if (strtotime($date) < 0 || $date == '-' || $date == '') {
                return '-';
            } else {
                return date("M Y", strtotime($date));
            }
        }

        function toStringDatetime($date)
        {
            if (strtotime($date) < 0 || $date == '-' || $date == '') {
                return '-';
            } else {
                return date("d M Y h:i", strtotime($date));
            }
        }

        function toStringUser($data)
        {
            if (strtotime($data) == null || $data == '0' || $data == '') {
                return '-';
            } else {
                return $data;
            }
        }

        function isnlaToString($state)
        {
            if ($state == 1) {
                return '<br><small class="text-danger text-bold" style="background-color: #ffe; border: 1px 0 #ddd; border-radius: 3px;">(Discontinue)</small>';
            } else {
                return '';
            }
        }

        if (!$this->input->post()) {
            $selectedPeriod = date('F Y', strtotime($periodList[0]['period']));
        } else {
            $selectedPeriod = date('F Y', strtotime($this->input->post('pricelistSelectPeriod')));
        }

        $allowedAccess = [1, 9];

        ?>
        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <div class="card-title">
                                <h6 class="h5 text-primary">Price List Unit</h6>
                            </div>
                            <div class="card-tools">
                                <?php if (in_array($this->session->userdata('useraccess'), $allowedAccess)) : ?>
                                    <a href="#" class="mr-3" data-toggle="modal" data-target="#modalAddSinglePricelist" id="buttonAddSinglePricelist"> <i class="fas fa-plus-circle"></i> Add single </a>
                                    <a href="#" class="mr-3" data-toggle="modal" data-target="#modalUploadPricelist"> <i class="fas fa-upload"></i> Upload from Excel </a>
                                    <a href="<?= base_url('files/format_upload/Format_Upload_Pricelist.xlsx') ?>" class="mr-3"><i class="fas fa-file-excel"></i> Format upload</a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <form method="post">
                                    <div class="form-row">
                                        <div class="col-sm-4">Periode/bulan</div>
                                        <div class="col-sm-4" style="min-width: 170px;">
                                            <select class="custom-select" name="pricelistSelectPeriod" id="pricelistSelectPeriod">
                                                <option><?= $selectedPeriod ?></option>
                                                <?php foreach($periodList as $period): ?>
                                                    <option><?= date('F Y', strtotime($period['period'])) ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>                                        
                                        <div class="col-sm-1">
                                            <button type="submit" class="btn btn-outline-info">Go</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <table class="table" id="pricelistTablePricelist">
                                        <thead>
                                            <tr>
                                                <th class="col-sm-2">Kategori</th>
                                                <th class="col-sm-1">Model</th>
                                                <th class="col-sm-3">Spesifikasi</th>
                                                <th class="col-sm-2">Debut</th>
                                                <th class="col-sm-2">Harga</th>
                                                <th class="col-sm-1">Keterangan</th>
                                                <?php if (in_array($this->session->userdata('useraccess'), $allowedAccess)) : ?>
                                                    <th class="col-sm-1">...</th>
                                                <?php endif; ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($pricelistByPeriod as $row) : ?>
                                                <tr>
                                                    <!-- <td><?= $i++; ?></td> -->
                                                    <td><?= $row['category']; ?></td>
                                                    <td><?= $row['model']; ?></td>
                                                    <td><?= $row['specification']; ?></td>
                                                    <td><?= toStringDate($row['debut']) . isnlaToString($row['is_nla']); ?></td>
                                                    <td><?= number_format($row['price'], 0); ?></td>
                                                    <td><?= $row['remark']; ?></td>
                                                    <?php if (in_array($this->session->userdata('useraccess'), $allowedAccess)) : ?>
                                                        <td>
                                                            <div class="btn-group">
                                                                <i class="fas fa-bars" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;"></i>
                                                                <div class="dropdown-menu dropdown-menu-right p-2" style="min-width: 420px;">
                                                                    <table class="table table-sm table-borderless table-hover">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Diunggah oleh</td>
                                                                                <td class="">: <?= $row['upload_by']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Diunggah pada</td>
                                                                                <td class="">: <?= toStringDatetime($row['upload_at']); ?></td>
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
                                                                                    <a href="" class="text-primary buttonPricelistEdit" title="Edit data" data-id="<?= $row['id']; ?>" data-period="<?= $row['period']; ?>" data-model="<?= $row['model']; ?>" data-toggle="modal" data-target="#modalAddSinglePricelist">
                                                                                        <i class="fas fa-pen"></i></span> &nbspEdit data
                                                                                    </a>
                                                                                </td>
                                                                            </tr>
                                                                            <tr class="border-top">
                                                                                <td class="py-2">
                                                                                    <a class="text-danger buttonPricelistDelete"  data-id="<?= $row['id']; ?>" data-period="<?= $row['period']; ?>" data-model="<?= $row['model']; ?>"  title="Delete data" style="cursor: pointer; text-decoration: none;">
                                                                                        <i class="fas fa-trash"></i> &nbspDelete data
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
                </div>
            </div>
        </div>
    </section>
</div>

<!-- modal upload from Excel -->
<div class="modal fade" id="modalUploadPricelist">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <?= form_open_multipart('pricelist/uploadPricelistExcel'); ?>
            <div class="modal-header">
                <h4 class="modal-title">Upload price list (Excel)</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="uploadPricelistType" class="col-sm-4 col-form-label">New/Update</label>
                    <div class="col-sm-8">
                        <select class="form-control custom-select" id="uploadPricelistType" name="uploadPricelistType">
                            <option value="">- select -</option>
                            <option value="new">Pricelist Baru</option>
                            <option value="update">Update existing (W2/W3)</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="uploadPricelistPeriod" class="col-sm-4 col-form-label">Periode</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="uploadPricelistPeriod" name="uploadPricelistPeriod">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="uploadPricelistFile" class="col-sm-4 col-form-label">File</label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control" id="uploadPricelistFile" name="uploadPricelistFile">
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
<div class="modal fade" id="modalAddSinglePricelist">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">Update Data Pricelist</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="editPricelistId" id="editPricelistId">                    
                    <div class="form-group row">
                        <label for="editPricelistPeriod" class="col-sm-3 col-form-label">Periode</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="editPricelistPeriod" name="editPricelistPeriod">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="editPricelistCategory" class="col-sm-3 col-form-label">Category</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="editPricelistCategory" name="editPricelistCategory">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="editPricelistModel" class="col-sm-3 col-form-label">Model</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="editPricelistModel" name="editPricelistModel">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="editPricelistSpecification" class="col-sm-3 col-form-label">Spesifikasi</label>
                        <div class="col-sm-9">
                            <textarea type="text" class="form-control" id="editPricelistSpecification" name="editPricelistSpecification"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="editPricelistDebut" class="col-sm-3 col-form-label">Debut</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="editPricelistDebut" name="editPricelistDebut">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="editPricelistPrice" class="col-sm-3 col-form-label">Harga</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="editPricelistPrice" name="editPricelistPrice" step="100">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="editPricelistIsnla" class="col-sm-3 col-form-label">Discontinue?</label>
                        <div class="col-sm-9">
                            <select class="form-control custom-select" id="editPricelistIsnla" name="editPricelistIsnla">
                                <option value="1">Discontinue</option>
                                <option value="0">No</option>
                            </select>                            
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="editPricelistRemark" class="col-sm-3 col-form-label">Keterangan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="editPricelistRemark" name="editPricelistRemark">
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary" id="editPricelistSubmit" name="editPricelistSubmit">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
