 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
    
    <?php 
        if (!$this->input->post('accessMenuSelectLevel')){
            $selectUserAccessId = $roleAccess;
            $selectUserAccessName = $role;
        } else {
            $selectUserAccessId = $this->input->post('accessMenuSelectLevel');
            $selectUserAccessName = $this->db->get_where('user_role', ['id' => $this->input->post('accessMenuSelectLevel')])->row_array()['role_name'];
        }
    ?>
    
    <div class="container-fluid pt-2">
        <div class="card card-outline card-info">
            <div class="card-header">                    
                <span class="h6 text-primary">Alokasi Akses - Menu</span>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <a href="#" class="text-info mr-3" data-toggle="modal" data-target="#modalAddUser" id="buttonAddUser"><i class="fas fa-plus-circle"></i> Add user</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6" style="min-width: 395px; max-width: 415px;">
                        <form action="" method="post" class="">
                            <div class="form-group row">
                                <label for="accessMenuSelectLevel" class="col-sm-3 col-form-label">Access level</label>
                                <div class="col-sm-8">
                                    <select class="form-control custom-select" id="accessMenuSelectLevel" name="accessMenuSelectLevel">
                                        <option value="<?= $selectUserAccessId ?>" selected><?= $role ?></option>
                                        <option value="">- pilih akses -</option>
                                        <?php foreach ($allAccessLevel as $row) : ?>
                                            <option value="<?= $row['id'] ?>"><?= $row['role_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-sm-1">
                                    <button type="submit" class="btn btn-outline-info">Go</button>
                                </div> 
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-auto" style="max-width: 200px; min-width: 195px; margin-left: 10px;">
                        <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modalAddMenuAccess">Add menu access</button>
                    </div>
                </div>
                <div class="row mt-3">
                    <table class="table table col-6" id="tableMenuaccessByAccesslevel" style="max-width: 400px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Menu</th>
                                <th class="text-center">...</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach($allMenuAccess as $row): ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><i class="<?= $row['icon'] ?>"></i> <?= $row['menu_name'] ?></td>
                                    <td class="text-center"><button class="btn badge badge-danger buttonDismissMenuAccess" data-menuid="<?= $row['id'] ?>" data-roleaccess="<?= $selectUserAccessId ?>">Dismiss</button></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>                   
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="modalAddMenuAccess" tabindex="-1" role="dialog" aria-labelledby="modalAddMenuAccess" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAddMenuAccess">Add Menu Access</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body px-2">
        <table id="tableUnassignedMenu" class="table table-sm ">
          <thead>
            <tr class="border-bottom">
              <th>Menu</th>
              <th>...</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($unassignedMenu as $umenu) : ?>
              <tr>
                <td><span class="<?= $umenu['menu_icon'] ?>"></span> <?= $umenu['menu_name'] ?></td>
                <td>
                  <div class="pretty p-switch p-fill">
                    <input type="checkbox" class="unassignedMenuAcces" data-menuid="<?= $umenu['menu_id'] ?>">
                    <div class="state p-info">
                      <label></label>
                    </div>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" name="menuAccessAdd" id="menuAccessAdd">Save</button>
      </div>
    </div>
  </div>
</div>

