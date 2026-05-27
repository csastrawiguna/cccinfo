<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
		<div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
		<?php
		if (!$this->input->post()) {
			$acinstallStartDate = date("Y-m-d", strtotime("-4 days"));
			$acinstallEndDate = date("Y-m-d");
		} else {
			$acinstallStartDate = $this->input->post('scheduleAcinstallStartDate');
			$acinstallEndDate = $this->input->post('scheduleAcinstallEndDate');
		}

		function toStringDate($date)
		{
			if (strtotime($date) < 0) {
				return '-';
			} else {
				return date("d-M-Y h:i", strtotime($date));
			}
		}

		$allowedAccess = ['1', '9'];
		?>
		<div class="container-fluid pt-3">
			<div class="row">
				<div class="col">
					<div class="card card-outline card-info">
						<div class="card-header">
							<div class="card-title">Jadwal Install AC</div>
							<?php if (in_array($this->session->userdata('useraccess'), $allowedAccess)) : ?>
								<div class="card-tools">
									<a href="#" data-toggle="modal" data-target="#modalAddSingleScheduleAcinstall" id="buttonAddSingleScheduleAcinstall" class="text-info mr-2"> <i class="fas fa-plus-circle"></i> Add schedule </a>
									<a href="#" data-toggle="modal" data-target="#modalUploadScheduleAcinstall" class="text-info mr-3"> <i class="fas fa-upload"></i> Upload from Excel </a>
								</div>
							<?php endif; ?>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col">
									<form method="post">
										<div class="form-row">
											<div class="col-1">
												<label for="scheduleAcinstallStartDate">Tanggal</label>
											</div>
											<div class="col-3" style="max-width: 160px;">
												<input type="date" class="form-control" name="scheduleAcinstallStartDate" id="scheduleAcinstallStartDate" value="<?= $acinstallStartDate; ?>">
											</div>
											<div class="col text-center" style="max-width: 5px">-</div>
											<div class="col-3" style="max-width: 160px;">
												<input type="date" class="form-control" name="scheduleAcinstallEndDate" id="scheduleAcinstallEndDate" value="<?= $acinstallEndDate; ?>">
											</div>
											<div class="col-1">
												<button type="submit" class="btn btn-outline-info">Go</button>
											</div>
											<div class="col">
												<small class="text-muted"><em>*Maks. 6 bulan terakhir</em></small>
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="row mt-4">
								<div class="col">
									<div class="jumbotron text-center" style="min-height: 50vh;">
										<p class="lead text-dark mt-5">
											Jadwal install AC <strong>format EXCEL,</strong> download klik link dibawah<br>
											<a href="<?= base_url() ?>/files/upload/source/<?= date("Y") ?>/Jadwal_Install_AC.xlsx" class=""><i class="fas fa-file-excel"></i>  Jadwal Install AC</a>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<!-- modal upload from Excel -->
<div class="modal fade" id="modalUploadScheduleAcinstall">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<?= form_open_multipart('schedule/uploadExcelAcinstall'); ?>
				<div class="modal-header">
					<h5 class="modal-title text-primary">Upload jadwal AC install dari Excel</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label class="form-label">Date</label>
						<input type="date" class="form-control" id="uploadScheduleAcinstallDate" name="uploadScheduleAcinstallDate" value="<?= date("Y-m-d") ?>">
					</div>
					<div class="form-group">
						<label class="form-label">Date</label>
						<input type="file" class="form-control" id="uploadScheduleAcinstallFile" name="uploadScheduleAcinstallFile" accept=".xls, .xlsx, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="submit" class="btn btn-primary">Upload</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- modal add single data -->
<div class="modal fade" id="modalAddSingleScheduleAcinstall">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<form action="" method="POST">
				<div class="modal-header">
					<h4 class="modal-title">Tambah data manual</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" name="addSingleScheduleAcinstallId" id="addSingleScheduleAcinstallId">
					<div class="form-group row">
						<label for="addSingleScheduleAcinstallDate" class="col-sm-2 col-form-label">Jadwal</label>
						<div class="col-sm-10">
							<input type="date" class="form-control" id="addSingleScheduleAcinstallDate" name="addSingleScheduleAcinstallDate" value="<?= date("Y-m-d"); ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="addSingleScheduleAcinstallContractor" class="col-sm-2 col-form-label">Kontraktor</label>
						<div class="col-sm-10">
							<select class="custom-select" name="addSingleScheduleAcinstallContractor" id="addSingleScheduleAcinstallContractor">
								<?php foreach ($contractors as $row) : ?>
									<option value="<?= $row['id']; ?>"><?= $row['name']; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="addSingleScheduleAcinstallSpk" class="col-sm-2 col-form-label">SPK</label>
						<div class="col-sm-10">
							<input type="" class="form-control" id="addSingleScheduleAcinstallSpk" name="addSingleScheduleAcinstallSpk">
						</div>
					</div>
					<div class="form-group row">
						<label for="addSingleScheduleAcinstallName" class="col-sm-2 col-form-label">Nama</label>
						<div class="col-sm-10">
							<input type="" class="form-control" id="addSingleScheduleAcinstallName" name="addSingleScheduleAcinstallName">
						</div>
					</div>
					<div class="form-group row">
						<label for="addSingleScheduleAcinstallAddress" class="col-sm-2 col-form-label">Alamat</label>
						<div class="col-sm-10">
							<input type="" class="form-control" id="addSingleScheduleAcinstallAddress" name="addSingleScheduleAcinstallAddress">
						</div>
					</div>
					<div class="form-group row">
						<label for="addSingleScheduleAcinstallPhone" class="col-sm-2 col-form-label">Telepon</label>
						<div class="col-sm-10">
							<input type="" class="form-control" id="addSingleScheduleAcinstallPhone" name="addSingleScheduleAcinstallPhone">
						</div>
					</div>
					<div class="form-group row">
						<label for="addSingleScheduleAcinstallModel" class="col-sm-2 col-form-label">Model</label>
						<div class="col-sm-10">
							<input type="" class="form-control" id="addSingleScheduleAcinstallModel" name="addSingleScheduleAcinstallModel">
						</div>
					</div>
					<div class="form-group row">
						<label for="addSingleScheduleAcinstallPurchasement" class="col-sm-2 col-form-label">Pembelian</label>
						<div class="col-sm-10">
							<input type="" class="form-control" id="addSingleScheduleAcinstallPurchasement" name="addSingleScheduleAcinstallPurchasement">
						</div>
					</div>
					<div class="form-group row">
						<label for="addSingleScheduleAcinstallRemark" class="col-sm-2 col-form-label">Keterangan</label>
						<div class="col-sm-10">
							<input type="" class="form-control" id="addSingleScheduleAcinstallRemark" name="addSingleScheduleAcinstallRemark">
						</div>
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="submit" class="btn btn-primary" id="addSingleScheduleAcinstallSubmit" name="addSingleScheduleAcinstallSubmit">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>