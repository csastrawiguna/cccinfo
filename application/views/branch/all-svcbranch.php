<div class="content-wrapper">
    <div class="container-fluid pt-2">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
        <?php 
            function ifsass($row) {
                if($row['svc_type'] == 'SASS') {
                    return $row['svc_name_group'];
                } else {
                    return $row['svc_name'];
                }
            }

            function statusToIcon($status){
                if (strtolower($status) == 'active') {
                    return '<span class="text-success ml-1"><i class="far fa-check-circle"></i></span>';
                } else {
                    return '<span class="text-danger ml-1 font-weight-normal"><i class="far fa-times-circle"></i> inactive</span>';
                }
            }

            function networkToBuildingIcon($ntwork) {
                if ($ntwork == 'SASS') {
                    return '<i class="fas fa-home text-secondary"></i>';
                } else if ($ntwork == 'SDSS'){
                    return '<i class="fas fa-building text-dark"></i>';
                } else if ($ntwork == 'SSR') {
                    return '<i class="fas fa-user-tie text-dark"></i>';
                } else {
                    return '<i class="fas fa-building text-dark"></i>';
                }
            }

            $allowedUserEdit = [1, 9];
        ?>
                    
        <div class="card card-info card-outline">
          <div class="card-header">
            <span class="h6 text-primary">Daftar Service Center Cabang, SDSS, SSR, SASS</span>
            <?php if(in_array($this->session->userdata('useraccess'), $allowedUserEdit)): ?>
                <div class="card-tools mr-2">
                    <a href="<?= base_url('branch/addservice') ?>" class="text-info"><i class="fas fa-plus-circle"></i> Tambah data</a>
                </div>
            <?php endif; ?>
          </div>
          
          <div class="card-body">
             <table class="table table-borderless" id="branchesTableAllBranches">
                <thead style="display: none;">
                    <tr>
                        <th>Cabang</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($allBranches as $row) : ?>
                        <?php if ($row['remark'] != 'Tidak Aktif') : ?>
                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="col-10" style="max-width: 600px;">
                                            <div class="card card-outline card-info">
                                                <div class="card-header bg-light">
                                                    <span class="text-bold text-info">
                                                        <?= ifsass($row) ?>
                                                        <span><?= statusToIcon($row['status']) ?></span>
                                                    </span>
                                                    <div class="card-tools">
                                                        
                                                        <button type="button" class="btn btn-sm btn-outline-info float-right buttonDetailServiceCenter" data-id="<?= $row['id'] ?>" data-target="#modalDetailServiceCenter" data-toggle="modal">
                                                            <i class="fas fa-search"></i> Detail
                                                        </button>
                                                        <?php if (in_array($this->session->userdata('useraccess'), $allowedUserEdit)) : ?>
                                                            <a href="<?= base_url() ?>branch/edit/<?= $row['id'] ?>" class="ml-1">
                                                                <button type="button" class="btn btn-sm btn-outline-warning float-right mx-1">
                                                                    <i class="far fa-edit"></i> Edit
                                                                </button>    
                                                            </a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-2">
                                                            <p class="h1 text-center">
                                                                <?= networkToBuildingIcon($row['svc_type']) ?>
                                                                <br>
                                                            </p>
                                                            <p class="text-center text-muted small align-bottom mb-0" style="font-size: 8px;"><?= ucwords($row['svc_type']) ?></p>
                                                        </div>
                                                        <div class="col-10">
                                                            <table class="table table-sm table-borderless">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="col-sm-3">Alamat</td>
                                                                        <td style="width: 5px">:</td>
                                                                        <td class="col-sm-8"><?= $row['address'] ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-sm-3">Telepon</td>
                                                                        <td style="width: 5px">:</td>
                                                                        <td class="col-sm-8">
                                                                            <?= $row['phone1'] ?>, 
                                                                            <?= $row['phone2'] ?>,
                                                                            <?= $row['phone3'] ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="col-sm-3">SVC head</td>
                                                                        <td style="width: 5px">:</td>
                                                                        <td class="col-sm-8"><?= $row['head_name'] ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach ?>
                </tbody>
            </table>
          </div>
          <!-- /.card -->
        </div>
    </div>
</div>

<div class="modal fade" id="modalDetailServiceCenter" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalDetailServiceCenterLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form action="" method="POST">
                <div class="modal-header">
                    <h6 class="modal-title text-info h6" id="modalDetailServiceCenterTitle"></h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm px-4">                            
                            <form>
                                <input type="hidden" class="form-control" id="categoryId" name="categoryId" readonly>
                                <div class="form-group row">
                                    <label for="categoryPeriod" class="col-sm-3 col-form-label">Cabang service</label>
                                    <div class="col-sm-9">
                                        <input type="" class="form-control text-info text-bold" id="modalDetailServiceCenterBranch" name="modalDetailServiceCenterBranch" readonly="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="categoryPeriod" class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <textarea type="" class="form-control" id="modalDetailServiceCenterAddress" name="modalDetailServiceCenterAddress" readonly=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="categoryPeriod" class="col-sm-3 col-form-label">Telepon</label>
                                    <div class="col-sm-9">
                                        <input type="" class="form-control" id="modalDetailServiceCenterPhone" name="modalDetailServiceCenterPhone" readonly="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="categoryPeriod" class="col-sm-3 col-form-label">Extention</label>
                                    <div class="col-sm-9">
                                        <input type="" class="form-control" id="modalDetailServiceCenterPhoneext" name="modalDetailServiceCenterPhoneext" readonly="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="categoryPeriod" class="col-sm-3 col-form-label">Service head</label>
                                    <div class="col-sm-9">
                                        <input type="" class="form-control" id="modalDetailServiceCenterHeadname" name="modalDetailServiceCenterHeadname" readonly="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="categoryPeriod" class="col-sm-3 col-form-label">Telp SVC head</label>
                                    <div class="col-sm-9">
                                        <input type="" class="form-control" id="modalDetailServiceCenterHeadphone" name="modalDetailServiceCenterHeadphone" readonly="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="categoryPeriod" class="col-sm-3 col-form-label">Kode SAP</label>
                                    <div class="col-sm-9">
                                        <input type="" class="form-control" id="modalDetailServiceCenterSapcode" name="modalDetailServiceCenterSapcode" readonly="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="categoryPeriod" class="col-sm-3 col-form-label">Under Branch</label>
                                    <div class="col-sm-9">
                                        <input type="" class="form-control" id="modalDetailServiceCenterUnderbranch" name="modalDetailServiceCenterUnderbranch" readonly="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="categoryPeriod" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <textarea type="" class="form-control" id="modalDetailServiceCenterEmail" name="modalDetailServiceCenterEmail" readonly="" rows="4"><code></code></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <!-- <button type="submit" class="btn btn-primary" id="addSingleScheduleAcinstallSubmit" name="addSingleScheduleAcinstallSubmit">Save</button> -->
                </div>
            </form>
        </div>
    </div>
</div>