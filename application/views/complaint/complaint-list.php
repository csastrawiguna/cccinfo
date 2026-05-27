<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-fluid pt-2">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
        <?php
            require 'view-function.php';
        ?>

        <div class="card card-outline card-info">
            <div class="card-header">
                <span class="h6">Daftar Keluhan Konsumen : <span class="text-primary"><span id="complaintListTitleStartDate"><?= date("d M Y", strtotime($filterStartPeriod)) ?> - <?= date("d M Y", strtotime($filterEndPeriod)) ?></span> </span> <span id="containerInfoRecordTotal" class="ml-2 badge badge-info py-1"></span></span>
                <div class="card-tools">
                    <div class="btn-group mr-3 text-right">
                        <a type="button" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="text-info"><i class="fas fa-download"></i> Download</span></a>
                        <div class="dropdown-menu dropdown-menu-right p-2" style="min-width: 180px;">
                            <div class="pb-2 pt-1 ml-2 border-bottom"><span id="complaintListExportExcelFilter" style="cursor: pointer;"><i class="fas fa-list"></i> - Data Setelah  Filter</span></div>
                            <div class="pb-2 pt-1 ml-2 border-bottom"><span id="complaintListExportExcelOutstanding" style="cursor: pointer;"><i class="fas fa-archive"></i> - Semua Outstanding</span></div>
                        </div>
                    </div>
                    <a href="#" class="mr-3 text-info" id="buttonShowAllOutstanding"><i class="fas fa-hourglass-half"></i> Outstanding</a>
                    <a href="#" class="mr-3 text-info" id="buttonToggleFilterRow"><i class="fas fa-filter"></i> Filter</a>
                    <a href="#" class="mr-2 text-info" data-toggle="modal" data-target="#modalComplaintSearch"><i class="fas fa-search"></i> Cari</a>
                    <?php if (in_array($this->session->userdata('useraccess'), $allowedAccess)) : ?>
                        <a href="<?= base_url('complaint/add') ?>" class="mr-3 text-info" ><i class="fas fa-plus-circle"></i> Tambah</a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="card-body">
                <div class="row rounded mb-3 px-1 pt-2 bg-light" id="complaintFilterRow" style="display: none;">
                    <div class="col">
                        <form action="" method="POST" id="complaintListFilterForm">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group row">
                                        <label for="complaintListFilterStartPeriod" class="col-sm-4 col-form-label" style="max-width: 80px;">Periode</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control" id="complaintListFilterStartPeriod" name="complaintListFilterStartPeriod" style="max-width: 180px;" value="<?= $filterStartPeriod ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="complaintListFilterEndPeriod" class="col-sm-4 col-form-label" style="color: rgba(0,0,0,0); max-width: 80px;">Periode</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control" id="complaintListFilterEndPeriod" name="complaintListFilterEndPeriod" style="max-width: 180px;" value="<?= $filterEndPeriod ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="complaintListFilterStatus" class="col-sm-4 col-form-label" style="max-width: 80px;">Status</label>
                                        <div class="col-sm-8">
                                            <select type="" class="custom-select" id="complaintListFilterStatus" name="complaintListFilterStatus" style="max-width: 180px;">
                                                <option value="<?= $filterStatus ?>"><?= filterRegional($filterStatus) ?></option>
                                                <option value="">- all data -</option>
                                                <option value="50">Case closed</option>
                                                <option value="In progress & new">In progress & new</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group row">
                                        <label for="complaintListFilterRegional" class="col-sm-4 col-form-label" style="max-width: 100px;">Regional</label>
                                        <div class="col-sm-8">
                                            <select type="" class="custom-select" id="complaintListFilterRegional" name="complaintListFilterRegional" style="max-width: 180px;">
                                                <?php if (in_array($this->session->userdata('useraccess'), $allowedAccessAll)) : ?>
                                                    <option value="<?= $filterRegional ?>" selected><?= filterRegional($filterRegional) ?></option>
                                                    <option value="">- all data -</option>
                                                    <option value="Jakarta">Jakarta</option>
                                                    <option value="Jawa Bali">Jawa Bali</option>
                                                    <option value="Sumatera">Sumatera</option>
                                                    <option value="Kalimantan Sulawesi">Kalimantan Sulawesi</option>
                                                <?php else : ?>
                                                    <option value="<?= $filterRegional ?>"><?= $filterRegional ?></option>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="complaintListFilterUnderBranch" class="col-sm-4 col-form-label" style="max-width: 100px;">Cabang</label>
                                        <div class="col-sm-8">
                                            <select type="" class="custom-select" id="complaintListFilterUnderBranch" name="complaintListFilterUnderBranch" style="max-width: 180px;">
                                                <option value="">-</option>
                                                <option value="<?= $underBranch ?>" selected><?= $underBranch ?></option>
                                                <?php if ($this->session->userdata('useraccess') == 5) { ?>
                                                    <?php foreach ($params['under_branch_list'] as $row) : ?>
                                                        <option value="<?= $row['under_branch'] ?>"><?= $row['under_branch'] ?></option>
                                                    <?php endforeach; ?>
                                                <?php } else if ($this->session->userdata('useraccess') == 3 || $this->session->userdata('useraccess') == 4) { ?>
                                                    <option value="<?= $underBranch ?>" selected><?= $underBranch ?></option>
                                                <?php } else { ?>
                                                    <option value="">-</option>
                                                <?php } ?>                                                
                                            </select>
                                        </div>
                                    </div>
                                    <?php if ($this->session->userdata('useraccess') == 6) : ?>
                                        <div class="form-group row">
                                            <label for="complaintListFilterPicReport1" class="col-sm-4 col-form-label" style="max-width: 100px;">PIC report</label>
                                            <div class="col-sm-8">
                                                <select type="" class="custom-select" id="complaintListFilterPicReport1" name="complaintListFilterPicReport1" style="max-width: 180px;">
                                                    <option value="Part Center" selected>Part Center</option>
                                                </select>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="form-group row">
                                        <label for="complaintListFilterOrderby" class="col-sm-4 col-form-label" style="max-width: 100px;">Order by</label>
                                        <div class="col-sm-5">
                                            <select type="" class="custom-select" id="complaintListFilterOrderby" name="complaintListFilterOrderby" style="max-width: 180px;">
                                                <option value="<?= $this->input->post('complaintListFilterOrderby') ?>" selected><?= $this->input->post('complaintListFilterOrderby') ?></option>
                                                <option value="is_urgent">Urgensi</option>
                                                <option value="claim_description">Jenis keluhan</option>
                                                <option value="claim_date">Tanggal</option>
                                                <option value="claim_status">Status</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-auto">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="complaintListFilterOrdertype" id="complaintListFilterOrdertypeAsc" value="ASC" <?= orderlistchecking($this->input->post('complaintListFilterOrdertype'), 'ASC') ?>>
                                                <label class="form-check-label" for="complaintListFilterOrdertypeAsc">A-Z</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="complaintListFilterOrdertype" id="complaintListFilterOrdertypeDesc" value="DESC" <?= orderlistchecking($this->input->post('complaintListFilterOrdertype'), 'DESC') ?>>
                                                <label class="form-check-label" for="complaintListFilterOrdertypeDesc">Z-A</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="row">
                                        <div class="col">
                                            <button type="button" class="btn btn-info px-3" id="complaintListFilterSubmit" name="complaintListFilterSubmit" style="width: 130px;"><i class="fas fa-filter"></i> Filter data</button>
                                        </div>
                                    </div>
                                    <div class="row mt-1">
                                        <div class="col">
                                            <button type="button" class="btn btn-success px-3" id="complaintListExportExcel" name="complaintListExportExcel" style="width: 130px;"><i class="fas fa-file-excel"></i> Export Excel</button>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col text-right">
                                            <a href="#" id="buttonCloseComplaintFilterPanel" class="text-secondary mr-2" style="width: 20px;"><small>Close filter</small> <i class="fas fa-times"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <table class="table" id="tableComplaintListServerside">
                            <thead class="">
                                <tr>
                                    <th class="align-middle">#</th>
                                    <th class="align-middle">Tgl</th>
                                    <th class="align-middle">TAT<br>(claim/notif)</th>
                                    <th class="align-middle">Kategori / Desc.</th>
                                    <th class="align-middle">Customer</th>
                                    <th class="align-middle">Notif / unit</th>
                                    <th class="align-middle">Keluhan</th>
                                    <th class="align-middle">Action report</th>
                                    <th class="align-middle">PIC report</th>
                                    <th class="align-middle">Status</th>
                                    <th class="align-middle">...</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal search keluhan -->
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