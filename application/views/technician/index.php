<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
            <?php
                require 'function-technician.php';
            ?>
            
            <div class="card card-outline card-info">
                <div class="card-header">
                    <span class="h5 text-primary">Nomor telepon PIC Cabang, SDSS, SSR, dan SASS</span>
                    <?php if (in_array($this->session->userdata('useraccess'), $allowedAccess)) : ?>
                        <div class="card-tools">
                            <a href="<?= base_url('technician/inactive') ?>" class="text-info mr-2"><i class="fas fa-user-alt-slash"></i> Inactive Technician</a>
                            <a href="#" data-toggle="modal" data-target="#formAddTechnicianModal" class="text-info mr-2" id="buttonAddTechnician"><i class="fas fa-plus-circle"></i> Tambah data</a>
                        </div>
                    <?php endif; ?>
                </div>
                
                <div class="card-body">
                    <div class="row mb-5">
                        <div class="col">
                            <form action="" method="post" class="form-row">
                                <label for="technicianSelectServiceType" class="col-sm-auto">Servis</label>
                                <div class="col-sm-2">
                                    <select class="custom-select" id="technicianSelectServiceType" name="technicianSelectServiceType">
                                        <option value="<?= $selectedType ?>" selected><?= $selectedType ?></option>
                                        <option value="Branch">Cabang</option>
                                        <option value="SDSS">SDSS</option>
                                        <option value="SASS">SASS</option>
                                        <option value="SSR">SSR</option>
                                    </select>
                                </div>
                                <label for="technicianSelectTechnicianByBranch" class="col-sm-2 text-right">Pilih cabang</label>
                                <div class="col-sm-4">
                                    <select class="custom-select" name="technicianSelectTechnicianByBranch" id="technicianSelectTechnicianByBranch">
                                        <option value="<?= $selectedBranch ?>" selected><?= $selectedBranch ?></option>
                                        <?php foreach ($allSvcBranch as $row) : ?>
                                            <option value="<?= $row['svc_name_group'] ?>"><?= $row['svc_name_group'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-sm-1">
                                    <button class="btn btn-info">Go</button>
                                </div>
                                <div class="col"></div>
                            </form>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col">
                            <table class="table table-sm table-hover" id="technicianTableAllTechnician">
                                <thead>
                                    <tr>
                                        <th>Cabang</th>
                                        <th>Nama PIC</th>
                                        <th>Telepon</th>
                                        <th>Keterangan</th>
                                        <?php if (in_array($this->session->userdata('useraccess'), $allowedAccess)) : ?>
                                            <th>...</th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($allTechnician as $row) : ?>
                                        <tr>
                                            <td><?= $row['svc_name_group'] ?></td>
                                            <td><?= $row['name'] ?></td>
                                            <td>
                                                <?= $row['phone1'] ?> <small><?= remark2icon($row['phone1_remark']) ?></small>
                                                <?= phoneToBreakline($row['phone2'], remark2icon($row['phone2_remark'])); ?>
                                                <?= phoneToBreakline($row['phone3'], remark2icon($row['phone3_remark'])); ?>
                                                <?= phoneToBreakline($row['phone4'], remark2icon($row['phone4_remark'])); ?>
                                            </td>
                                            <td><?= $row['remark'] ?></td>
                                            <?php if (in_array($this->session->userdata('useraccess'), $allowedAccess)) : ?>
                                                <td>
                                                    <div class="btn-group">                              
                                                      <i class="fas fa-bars" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;"></i>
                                                      <div class="dropdown-menu dropdown-menu-right bg-light p-2" style="min-width: 300px;">
                                                        <table  class="table table-sm table-borderless table-hover">
                                                          <tbody>
                                                            <tr>
                                                              <td>Saved by</td>
                                                              <td class="">: <?= $row['saved_by']; ?></td>
                                                            </tr>
                                                            <tr>
                                                              <td>Saved at</td>
                                                              <td class="">: <?= toStringDate($row['saved_at']); ?></td>
                                                            </tr>
                                                            <tr>
                                                              <td>Last modified</td>
                                                              <td class="">: <?= $row['updated_by']; ?></td>
                                                            </tr>
                                                            <tr>
                                                              <td>Datetime</td>
                                                              <td class="">: <?= toStringDate($row['updated_at']); ?></td>
                                                            </tr>
                                                          </tbody>
                                                        </table>
                                                        <table class="table table-sm table-borderless">
                                                          <tbody>
                                                            <tr class="border-top">
                                                              <td class="py-2">                                        
                                                                <a href="#" class="text-dark buttonTechnicianEdit" title="Edit data" data-toggle="modal" data-target="#formAddTechnicianModal" data-id="<?= $row['id']; ?>" style="display: none;">
                                                                    <i class="fas fa-pen"></i> &nbspEdit data
                                                                </a>
                                                                <a href="<?= base_url('technician/edit/'). $row['id'] ?>" class="text-dark buttonTechnicianEdit2" title="Edit data">
                                                                    <i class="fas fa-pen"></i> &nbspEdit data
                                                                </a>
                                                              </td>
                                                            </tr>
                                                            <tr class="border-top">
                                                              <td class="py-2">
                                                                <a class="text-danger buttonTechnicianDelete" data-id="<?=$row['id']?>" title="Delete data" style="cursor: pointer; text-decoration: none;">
                                                                    <i class="fas fa-trash"></i> &nbspDelete data
                                                                </a>
                                                              </td>
                                                            </tr>  
                                                          </tbody>
                                                        </table> 
                                                      </div>
                                                    </div>
                                                </td>
                                            <?php endif ?>
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

<div class="modal fade" id="formAddTechnicianModal" tabindex="-1" role="dialog" aria-labelledby="formAddTechnicianModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="min-width: 540px;">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="formAddTechnicianModalLabel">Tambah data Teknisi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="POST" action="" id="formAddTechnician">
            <div class="modal-body">
                <input type="hidden" class="form-control" name="formAddTechnicianId" id="formAddTechnicianId" readonly>
                <div class="form-group row">
                    <label for="formAddTechnicianSvctype" class="col-sm-3 col-form-label col-form-label-sm">SVC Network</label>
                    <div class="col-sm-4">
                        <select type="" class="form-control custom-select" id="formAddTechnicianSvctype" name="formAddTechnicianSvctype">
                            <option value="">- pilih -</option>
                            <option value="BRANCH">BRANCH</option>
                            <option value="SDSS">SDSS</option>
                            <option value="SSR">SSR</option>
                            <option value="SASS">SASS</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="formAddTechnicianSvcbranch" class="col-sm-3 col-form-label col-form-label-sm">Nama Cabang</label>
                    <div class="col-sm-9">
                        <select type="" class="js-example-basic-single custom-select" id="formAddTechnicianSvcbranch" name="formAddTechnicianSvcbranch">
                            <option>- pilih SVC center -</option>
                        </select>
                        <!-- <input type="text" class="form-control custom-select" id="formAddTechnicianSvcbranch" name="formAddTechnicianSvcbranch"> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label for="formAddTechnicianName" class="col-sm-3 col-form-label col-form-label-sm">Nama Teknisi</label>
                    <div class="col-sm-9">
                        <input type="" class="form-control" id="formAddTechnicianName" name="formAddTechnicianName">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="formAddTechnicianPhone1" class="col-sm-3 col-form-label col-form-label-sm">Telepon 1</label>
                    <div class="col-sm-4">
                        <input type="" class="form-control" id="formAddTechnicianPhone1" name="formAddTechnicianPhone1" placeholder="No. telepon 1">
                    </div>
                    <div class="col-sm-5">
                        <select class="custom-select" name="formAddTechnicianPhone1Remark" id="formAddTechnicianPhone1Remark">
                            <option value="">- pilih remark -</option>
                            <option value="Call & Whatsapp">Call & Whatsapp</option>
                            <option value="Call only">Call only</option>
                            <option value="Whatsapp only">Whatsapp only</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="formAddTechnicianPhone2" class="col-sm-3 col-form-label col-form-label-sm">Telepon 2</label>
                    <div class="col-sm-4">
                        <input type="" class="form-control" id="formAddTechnicianPhone2" name="formAddTechnicianPhone2" placeholder="No. telepon 2">
                    </div>
                    <div class="col-sm-5">
                        <select class="custom-select" name="formAddTechnicianPhone2Remark" id="formAddTechnicianPhone2Remark">
                            <option value="">- pilih remark -</option>
                            <option value="callwa">Call & Whatsapp</option>
                            <option value="call">Call only</option>
                            <option value="WA">Whatsapp only</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="formAddTechnicianPhone3" class="col-sm-3 col-form-label col-form-label-sm">Telepon 3</label>
                    <div class="col-sm-4">
                        <input type="" class="form-control" id="formAddTechnicianPhone3" name="formAddTechnicianPhone3" placeholder="No. telepon 3">
                    </div>
                    <div class="col-sm-5">
                        <select class="custom-select" name="formAddTechnicianPhone3Remark" id="formAddTechnicianPhone3Remark">
                            <option value="">- pilih remark -</option>
                            <option value="callwa">Call & Whatsapp</option>
                            <option value="call">Call only</option>
                            <option value="WA">Whatsapp only</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="formAddTechnicianPhone4" class="col-sm-3 col-form-label col-form-label-sm">Telepon 4</label>
                    <div class="col-sm-4">
                        <input type="" class="form-control" id="formAddTechnicianPhone4" name="formAddTechnicianPhone4" placeholder="No. telepon 4">
                    </div>
                    <div class="col-sm-5">
                        <select class="custom-select" name="formAddTechnicianPhone4Remark" id="formAddTechnicianPhone4Remark">
                            <option value="">- pilih remark -</option>
                            <option value="callwa">Call & Whatsapp</option>
                            <option value="call">Call only</option>
                            <option value="WA">Whatsapp only</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="formAddTechnicianRemark" class="col-sm-3 col-form-label col-form-label-sm">Remark</label>
                    <div class="col-sm-9">
                        <input type="" class="form-control" id="formAddTechnicianRemark" name="formAddTechnicianRemark">
                    </div>
                </div>
                <div class="form-group row" style="display: none;">
                    <label for="" class="col-sm-3 col-form-label col-form-label-sm">Status :</label>
                    <div class="col-sm-2">
                        <div class="pretty p-svg p-curve">
                            <input type="hidden" name="formAddTechnicianIsactive" value="0" checked>
                            <div class="pretty p-svg p-curve p-toggle">
                                <input type="checkbox" name="formAddTechnicianIsactive" id="formAddTechnicianIsactive" value="1">
                                <div class="state p-success p-on">
                                    <svg class="svg svg-icon" viewBox="0 0 20 20">
                                        <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                                    </svg>
                                    <label>Active</label>
                                </div>
                                <div class="state p-danger p-danger-o p-off">
                                    <svg class="svg svg-icon" viewBox="0 0 20 20">
                                        <path fill="none" d="M15.898,4.045c-0.271-0.272-0.713-0.272-0.986,0l-4.71,4.711L5.493,4.045c-0.272-0.272-0.714-0.272-0.986,0s-0.272,0.714,0,0.986l4.709,4.711l-4.71,4.711c-0.272,0.271-0.272,0.713,0,0.986c0.136,0.136,0.314,0.203,0.492,0.203c0.179,0,0.357-0.067,0.493-0.203l4.711-4.711l4.71,4.711c0.137,0.136,0.314,0.203,0.494,0.203c0.178,0,0.355-0.067,0.492-0.203c0.273-0.273,0.273-0.715,0-0.986l-4.711-4.711l4.711-4.711C16.172,4.759,16.172,4.317,15.898,4.045z" style="stroke: white;fill:white;"></path>
                                    </svg>
                                    <i class="icon mdi mdi-close"></i>
                                    <label>Not active</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="reset" class="btn btn-warning">Reset</button>
                <button type="submit" class="btn btn-primary" name="formAddTechnicianSubmit" id="formAddTechnicianSubmit">Save</button>
                <button type="submit" class="btn btn-primary" name="formAddTechnicianUpdate" id="formAddTechnicianUpdate">Update</button>
            </div>
        </form>
      </div>
    </div>
</div>