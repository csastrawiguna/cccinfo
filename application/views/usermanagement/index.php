 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
         <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
         <div class="container-fluid">
             <div class="row">
                 <div class="col-10">
                     <!-- Header baru -->

                     <div class="card card-outline card-info">
                        <div class="card-header">
                             <h3 class="card-title">User list</h3>

                             <div class="card-tools">
                                 <div class="input-group input-group-sm">
                                     <a href="#" class="text-info buttonAdd mx-3" data-toggle="modal" data-target="#modalAddUser" id="buttonAddUser"><span class="fas fa-plus-circle"></span> Add user</a>
                                 </div>
                             </div>
                         </div>
                         <div class="card-body">
                             <div class="row">
                                 <div class="col">
                                     <table class="table" id="tableUsermanagementUserlist">
                                         <thead>
                                             <tr>
                                                 <th>#</th>
                                                 <th>Name</th>
                                                 <th>Username</th>
                                                 <th>Access</th>
                                                 <th>Action</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach($users as $data): ?>
                                                <tr>
                                                    <td><?= $i++ ;?></td>
                                                    <td><?= $data['name'] ?></td>
                                                    <td><?= $data['id'] ?></td>
                                                    <td><?= $data['role_name'] ;?></td>
                                                    <td>
                                                        <a href="#" class="btn badge btn-info font-weight-normal"><i class="fas fa-info-circle" onclick="alert('No available yet')"> </i></a>
                                                        <a href="#" class="btn badge btn-info font-weight-normal" onclick="alert('No available yet')"><i class="fas fa-pen"></i></a>
                                                        <a href="" class="btn badge btn-danger  font-weight-normal btn-delete-user" data-id="<?= $data['id'] ;?>"><i class="fas fa-trash-alt"></i></a>
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
     </div><!-- /.container-fluid -->
 </div>
 <!-- /.content-header -->
 </div>
 <!-- /.content-wrapper -->

<div class="modal fade" id="modalAddUser">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                <h4 class="modal-title">Add new user</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="addUserUserid">User ID</label>
                        <input type="" class="form-control" id="addUserUserid" name="addUserUserid">
                    </div>
                    <div class="form-group">
                        <label for="addUserName">Fullname</label>
                        <input type="" class="form-control" id="addUserName" name="addUserName">
                    </div>
                    <div class="form-group">
                        <label for="addUserAccess">Access Level</label>
                        <select class="form-control custom-select" name="addUserAccess" id="addUserAccess">
                            <option value="">- select access -</option>
                            <?php foreach($accessLevels as $row) : ?>
                                <option value="<?= $row['id'] ?>"><?= $row['role_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="addUserScope">Scope area</label>
                        <input type="" class="form-control" id="addUserScope" name="addUserScope">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>