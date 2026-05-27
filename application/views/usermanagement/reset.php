 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
    <div class="container-fluid pt-3 px-3">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title text-primary">Reset password User</h3>
                <div class="card-tools">
                </div>
            </div>
            <div class="card-body" style="min-height: 70vh;">
                <p class="mb-3">Pilih user yang akan di-reset</p>
                <form action="<?= base_url('usermanagement/directReset') ?>" method="POST">
                    <div class="form-row align-items-center">
                        <div class="col-sm-4">
                            <label class="sr-only" for="inlineFormInputGroup">Username</label>
                            <div class="input-group mb-2">
                                <select class="js-example-basic-single custom-select" id="resetPasswordSelectUserid" name="resetPasswordSelectUserid">
                                    <option></option>
                                    <?php foreach ($allUsers as $row) : ?>
                                        <option value="<?= $row['id'] ?>"><?= $row['id'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-outline-info mb-2">Go</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>            
    </div>
</div>
