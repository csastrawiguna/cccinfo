
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="container-fluid pt-2">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>            
        <div class="row">
            <div class="col">
                <div class="card card-info card-outline">
                  <div class="card-header">
                    <h6 class="h6 text-primary">Daftar Cabang Sales & Marketing</h6>                        
                  </div>
                  <div class="card-body">
                    <table class="table table-borderless" id="branchesTableAllBranchesSales">
                        <thead style="display: none;">
                            <tr>
                                <th>Cabang</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($allBranchesSales as $row) : ?>
                                <tr>
                                    <td>
                                        <div class="row">
                                            <div class="col-10" style="max-width: 600px;">
                                                <div class="card">
                                                    <div class="card-header bg-light">
                                                        <span class="text-success"> Sales cabang : <span class="text-bold"><?= $row['branch'] ?></span> - [Regional <?= $row['region'] ?>]</span>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-2">
                                                                <img class="img img-circle" src="" alt="Sales">
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
                                                                            <td class="col-sm-8"><?= $row['phone'] ?></td>
                                                                        </tr>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="col-sm-3"></td>
                                                                            <td class="col-sm-1"></td>
                                                                            <td class="col-sm-8 text-muted font-italic "><?= $row['remark'] ?></td>
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
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                  </div>                  
              </div>
            </div>
        </div>
    </div>
</div>

