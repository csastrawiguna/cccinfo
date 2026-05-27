 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>

    <?php 
        if (!$this->input->post('accessSubmenuSelectLevel')){
            $selectUserAccessId = $this->session->userdata('useraccess');
            $selectUserAccessName = $this->session->userdata('useraccessname');
        } else {
            $selectUserAccessId = $this->input->post('accessSubmenuSelectLevel');
            $selectUserAccessName = $this->db->get_where('user_role', ['id' => $this->input->post('accessSubmenuSelectLevel')])->row_array()['role_name'];
        }
    ?>

    <div class="container-fluid pt-2">
        <div class="card card-outline card-info">
            <div class="card-header">                    
                <span class="text-primary">Alokasi Akses - Submenu</span>
                <div class="card-tools">
                    <div class="input-group input-group-sm">                        
                    </div>
                </div>
            </div>
            
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6" style="min-width: 395px; max-width: 415px;">
                        <form action="" method="post" class="">
                            <div class="form-group row">
                                <label for="accessSubmenuSelectLevel" class="col-sm-3 col-form-label">Access level</label>
                                <div class="col-sm-8">
                                    <select class="form-control custom-select" id="accessSubmenuSelectLevel" name="accessSubmenuSelectLevel">
                                        <option value="<?= $selectUserAccessId ?>" selected><?= $selectUserAccessName ?></option>
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
                </div> 
                <div class="row mt-3">
                    <div class="col-sm-6">
                        <?php foreach ($allMenus as $menu) : ?>
                            <div class="card collapsed-card">
                                <div class="card-header bg-info">
                                    <h3 class="card-title"><span class="<?= $menu['icon'] ?>"></span> &nbsp <?= $menu['menu_name'] ?></h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <?php
                                        $submenus = $this->db->get_where('submenu', ['menu_id' => $menu['menu_id']])->result_array();
                                    ?>
                                    <?php foreach ($submenus as $sm) : ?>
                                        <table class="table table-sm table-borderless col-8">
                                            <tbody>
                                                <tr>
                                                    <td class="col"><?= $sm['name'] ?></td>
                                                    <td>
                                                        <div class="pretty p-switch p-fill">
                                                            <input type="checkbox" name="userAssigned" class="submenuAccessCheckbox" <?= check_submenu_access($sm['id'], $roleAccess); ?> data-submenuid = "<?= $sm['id']; ?>" data-roleaccess = "<?= $roleAccess ?>">
                                                            <div class="state p-success">
                                                                <label></label>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>                   
            </div>
        </div>
    </div>
</div>

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
                        <label for="addUserAccess">User ID</label>
                        <select class="form-control custom-select" name="addUserAccess" id="addUserAccess">
                            <option value="">- select access -</option>
                            <option value="1">Admin CCC</option>
                            <option value="2">User CCC</option>
                            <option value="3">Admin Branch</option>
                            <option value="9">Superadmin</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>