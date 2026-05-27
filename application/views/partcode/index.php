<div class="content-wrapper">    
	<!-- Main content -->
	<section class="content">
		<div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
		<div class="container-fluid pt-3">
			<?php 
				if (!$_POST) {
					$model = '';
					$partDesc = '';
					$partCode = '';
				} else {
					$model = $this->input->post('partcodeSearchModel');
                	$partDesc = $this->input->post('partcodeSearchDesc');
                	$partCode = $this->input->post('partcodeSearchCode');
				}

				function nlaToStyle($status) {
					if ($status == 1) {
						return '<span class="badge badge-danger badge-pill">NLA</span>';
					} else {
						return false;
					}
				}

				function bhtToStyle($bht) {
					if ($bht == 1) {
						return '<span class="badge badge-warning">BHT</span>';
					} else {
						return false;
					}
				}
			 ?>
			<div class="card card-outline card-info">
				<div class="card-header">
					<div class="card-title">
						<span class="h5 text-info">Daftar Kode Part</span>
					</div>							
					<div class="card-tools">
						<a href="<?= base_url('partcode/addcode') ?>" class="mr-3"><i class="fas fa-plus-circle"></i> Tambah Baru</a>
					</div>
				</div>
				<div class="card-body">
					<form class="mb-5" action="" method="POST">
						<p class="badge badge-primary badge-pill py-1 px-3" style="font-size: 12px;">Cari Kode Part</p>
						<div class="form-group row">
							<label for="partcodeSearchModel" class="col-sm-1 col-form-label text-right">Model</label>
							<div class="col-sm-2">
								<input type="" class="form-control" name="partcodeSearchModel" id="partcodeSearchModel" value="<?= $model ?>">
							</div>
							<label for="partcodeSearchDesc" class="col-sm-1 col-form-label text-right">Jenis part</label>
							<div class="col-sm-2">
								<input type="" class="form-control" name="partcodeSearchDesc" id="partcodeSearchDesc" value="<?= $partDesc ?>">
							</div>
							<label for="partcodeSearchCode" class="col-sm-1 col-form-label text-right">Kode part</label>
							<div class="col-sm-2">
								<input type="" class="form-control" name="partcodeSearchCode" id="partcodeSearchCode" value="<?= $partCode ?>">
							</div>
							<div class="col-sm-2">
								<button type="submit" class="btn btn-info">Cari</button>
							</div>
						</div>
					</form>
					<div class="row">
						<div class="col">
							<?php if (count($allPartCode) < 1) : ?>
								<p class="text-center mt-5 text-secondary" style="font-size: 94px;"><i class="fas fa-dizzy"></i> </p>
								<p class="text-center lead text-danger" style="font-size: 20px;">Kode Part yang dicari tidak ada di database</p>
							<?php else : ?>
								<p class="badge badge-primary badge-pill py-1 px-3" style="font-size: 12px;">Kode Part <?= count($allPartCode) ?> teratas (paling sering dicari)</p>
								<table class="table table-stripped table-bordered" id="partcodeTabelAllPart">
									<thead>
										<tr>
											<th>#</th>
											<th>Kode Part</th>
											<th>Deskripsi</th>
											<th>Model</th>
											<th>Keterangan</th>
											<th>...</th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 1; ?>
										<?php foreach ($allPartCode as $row) : ?>
											<tr>
												<td><?= $i++ ?></td>
												<td><?= $row['part_code'] ?></td>
												<td><?= nlaToStyle($row['is_nla']) . bhtToStyle($row['is_bht']) .' ' . $row['part_desc'] ?></td>
												<td><?= $row['model'] ?></td>
												<td><?= $row['remark'] ?></td>
												<td>
													<div class="btn-group">
														<i class="fas fa-bars" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;"></i>
														<div class="dropdown-menu dropdown-menu-right p-2" style="min-width: 280px;">
															<table class="table table-borderless table-hover">
																<tbody>
																	<tr>
																		<td>Produk</td>
																		<td class="">: <?= $row['category'] ?></td>
																	</tr>
																	<tr>
																		<td>Input by</td>
																		<td class="">: <?= $row['input_by'] ?></td>
																	</tr>
																	<tr>
																		<td>Input at</td>
																		<td class="">: <?= date("d M Y h:i", strtotime($row['input_at'])) ?></td>
																	</tr>
																	<tr>
																		<td colspan="2">
																			<a href="<?= base_url('partcode/viewlog/') . $row['id'] ?>"><i class="fas fa-info-circle text-info"></i> View log</a>
																		</td>
																	</tr>
																</tbody>
															</table>
														</div>
													</div>
												</td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>