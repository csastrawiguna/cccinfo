<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>        
        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col-auto col-md-6" style="min-width:570px; max-width: 600px;">
                    <!-- Profile Image -->
                    <div class="card card-info card-outline">
                        <div class="card-body box-profile px-3">
                            <h4 class="h4 text-center mb-3 text-info"><?= $userDetail['name']; ?></h4>                                  
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Login as</b> <a class="float-right"><i class="text-info <?= $userDetail['icon']; ?>"></i> <?= $userDetail['role_name']; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Author of</b> <a class="float-right"><?= $userDetail['area_scope']; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Last login</b> <a class="float-right"><i class="fas fa-desktop text-info"></i> <?= $userDetail['latest_login_on']; ?> &nbsp; <i class="far fa-clock text-info"></i> <?= date("d-M-Y H:i", strtotime($userDetail['latest_login_at'])); ?></a>
                                </li>                                
                            </ul>
                            <!-- <a href="#" onclick="" class="btn btn-sm btn-outline-primary float-right ml-1" title="Edit profile" id="buttonEditProfile"><i class="fas fa-pen"></i></a> -->
                            <button class="btn btn-outline-info float-right ml-1" title="Update password" id="buttonUpdatePassword"><i class="fas fa-lock"></i> Change password</button>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-auto" id="formUpdatePassword" style="display: none; min-width:570px; max-width: 600px;">
                    <!-- Profile Image -->
                    <div class="card card-info card-outline">
                        <div class="card-header bg-light">
                            <h3 class="card-title text-info">Change Password</h3>
                        </div>
                        <!-- /.card-header -->
                        <form action="" class="form-horizontal" id="formUpdatePassword" method="post">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="oldPassword" class="col-sm-5 col-form-label font-small">Old password</label>
                                    <div class="col-sm-7">
                                        <input type="password" class="form-control" id="oldPassword" name="oldPassword">
                                        <?= form_error('oldPassword', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="newPassword" class="col-sm-5 col-form-label">New password</label>
                                    <div class="col-sm-7">
                                        <input type="password" class="form-control" id="newPassword" name="newPassword">
                                        <?= form_error('newPassword', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="confirmNewPassword" class="col-sm-5 col-form-label">Confirm New password</label>
                                    <div class="col-sm-7">
                                        <input type="password" class="form-control" id="confirmNewPassword" name="confirmNewPassword">
                                        <?= form_error('confirmNewPassword', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" id="buttonSubmitUpdatePassword" class="btn btn-outline-info float-right"> Submit </button>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <div class="col-md-6 col-auto" id="formUpdateProfile" style="display: none;">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline" style="min-width:570px; max-width: 600px;">
                        <div class="card-header bg-light">
                            <h3 class="card-title text-primary">Edit Profile</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <h5 class="text-center text-muted">
                                <p>We are sorry</p>
                                <p>Update profile will be available soon</p>
                            </h5>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>                    
    </section>
</div>
