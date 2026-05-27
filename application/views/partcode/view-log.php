<div class="content-wrapper">    
	<!-- Main content -->
	<section class="content">
		<div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
		<?php 
			function nlaToLogStyle($status) {
				if ($status == 1) {
					return '<span class="badge badge-danger badge-pill">NLA</span>';
				} else {
					return '<span class="badge badge-primary badge-pill">Existing</span>';
				}
			}

			function changeToRow($prev, $new) {
				if ($prev == $new) {
					return '<td colspan="2"><em class="text-secondary">no change</em></td>';
				} else {
					return '<td>' . $prev . '</td><td><span class="text-primary text-bold">*</span> ' . $new . '</td>';
				}
			}

			function nlaToText($st) {
				if ($st == 1) {
					return 'NLA';
				} else {
					return 'Avail';
				}
			}
		 ?>
		<div class="container-fluid pt-3">
			<div class="row">
				<div class="col">
					<div class="card card-outline card-info">
						<div class="card-header">
							<div class="card-title">
								<span class="h5 text-info">Log History Perubahan Data Kode Part</span>
							</div>
							<div class="card-tools">
								<a href="<?= base_url('partcode/index') ?>" class="mr-3"><i class="fas fa-arrow-circle-left"></i> Kembali ke daftar kode part</a>
							</div>
						</div>
						<div class="card-body">
							<div class="row mb-2">
								<div class="col">
									<span class="float-left">Kode part : <span class="text-bold"><?= $partdata['part_code'] ?></span></span>
									<a href="<?= base_url('partcode/delete/') . $this->uri->segment(3) ?>" class="float-right" id="buttonDeleteParCode"><button class="btn btn-outline-danger"><i class="fas fa-times"></i> Hapus kode part</button></a>
									<a href="<?= base_url('partcode/edit/') . $this->uri->segment(3) ?>" class="float-right mr-1"><button class="btn btn-warning"><i class="fas fa-edit"></i> Edit kode part</button></a>
								</div>
							</div>
							<table class="table table-bordered" id="partcodeViewPartLog">
								<thead class="bg-light">
									<tr>
										<th rowspan="2" class="align-middle">#</th>
										<th rowspan="2" class="align-middle">Tanggal</th>
										<th rowspan="2" class="align-middle">User</th>
										<th colspan="2" class="text-center">Deskripsi</th>
										<th colspan="2" class="text-center">NLA?</th>
										<th colspan="2" class="text-center">Model</th>
										<th colspan="2" class="text-center">Keterangan</th>
									</tr>
									<tr>
										<th class="text-center"><small>Before</small></th>
										<th class="text-center"><small>After</small></th>
										<th class="text-center"><small>Before</small></th>
										<th class="text-center"><small>After</small></th>
										<th class="text-center"><small>Before</small></th>
										<th class="text-center"><small>After</small></th>
										<th class="text-center"><small>Before</small></th>
										<th class="text-center"><small>After</small></th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; ?>
									<?php foreach ($logdata as $row) : ?>
										<tr>
											<td><?= $i++ ?></td>
											<td><?= date("d M Y H:i", strtotime($row['updated_at'])) ?></td>
											<td><?= $row['updated_by'] ?></td>
											<?= changeToRow($row['prev_part_desc'], $row['new_part_desc']) ?>
											<?= changeToRow(nlaToText($row['prev_is_nla']), nlaToText($row['new_is_nla'])) ?>
											<?= changeToRow($row['prev_model'], $row['new_model']) ?>
											<?= changeToRow($row['prev_remark'], $row['new_remark']) ?>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>