<div class="content-wrapper">    
	<!-- Main content -->
	<section class="content">
		<div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
		<div class="container-fluid p-4">
			<div class="row">
				<div class="col">
                    <h5 class="lead">Cabang/SDSS : <span class="text-info text-bold"><?= $branchInfo ;?> </h5>
                    <button class="float-right btn btn-sm" data-toggle="modal" data-target="#modalUploadScheduleRepair"> <i class="fas fa-upload"></i> Upload from Excel </button>
				</div>
			</div>
            <div class="row">
                <div class="col">
                    da
                </div>
            </div>
		</div>
	</section>
</div>

<!-- modal upload from Excel -->
<div class="modal fade" id="modalUploadScheduleRepair">
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