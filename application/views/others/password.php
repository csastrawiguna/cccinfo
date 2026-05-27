<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>

        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col-8">
                    <?php if (!$this->session->userdata('userid')) : ?> 
                        <p class="lead text-muted">Belum login, masa mau ganti password <i class="fas fa-grin-tongue"></i></p>
                    <?php else : ?>
                        <div class="card card-outline card-info">
                            <form method="post" action="">
                                <div class="card-header">
                                    <h6 class="h5 text-info">Ganti Password</h6>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="oldPassword" class="col-sm-4 col-form-label">Password lama</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" id="oldPassword" name="oldPassword">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="newPassword" class="col-sm-4 col-form-label">Password baru</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" id="newPassword" name="newPassword">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="confirmNewPassword" class="col-sm-4 col-form-label">Confirm password baru</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" id="confirmNewPassword" name="confirmNewPassword">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-outline-info">Save</button>
                                </div>
                            </form>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>                              
    </section>
</div>
