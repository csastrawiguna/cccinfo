 <div class="content-wrapper">
     <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
     <div class="container-fluid pt-2">
         <div class="row">
             <div class="col">
                 <!-- Header baru -->

                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">Daftar access level</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm">
                                <button type="button" class="btn btn-sm btn-outline-info buttonAdd mx-1" data-toggle="modal" data-target="#modalAddUser" id="buttonAddUser"><span class="fas fa-plus-circle"></span> Add new</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-10">
                                <table class="table table-borderless table-hover">
                                    <thead class="border-bottom">
                                        <tr>
                                            <th>#</th>
                                            <th>Access level</th>
                                            <th>Keterangan</th>
                                            <th>...</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($allAccessLevel as $row) : ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><i class="<?= $row['icon'] ?>"></i> (<?= $row['id'] ?>) <?= $row['role_name'] ?></td>
                                                <td><?= $row['remark'] ?></td>
                                                <td>
                                                    ...
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
 <!-- /.content-header -->
 </div>
 <!-- /.content-wrapper -->

<div class="modal fade" id="modalAddUser">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                <h4 class="modal-title">Add new Access Level</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <!-- <div class="form-group">
                        <label for="addAccesslevelId">ID</label>
                        <input type="" class="form-control" id="addAccesslevelId" name="addAccesslevelId">
                    </div> -->
                    <div class="form-group">
                        <label for="addAccesslevelRolename">Role name</label>
                        <input type="" class="form-control" id="addAccesslevelRolename" name="addAccesslevelRolename">
                    </div>
                    <div class="form-group">
                        <label for="addAccessleveIcon">Icon (Font Awesome 5)</label>
                        <input type="" class="form-control" id="addAccessleveIcon" name="addAccessleveIcon">
                    </div>
                    <div class="form-group">
                        <label for="addAccessleveRemark">Remark</label>
                        <input type="" class="form-control" id="addAccessleveRemark" name="addAccessleveRemark">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>