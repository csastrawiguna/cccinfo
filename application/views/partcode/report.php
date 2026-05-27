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

			function row2style($a, $b) {
				if ($a == $b) {
					return 'text-bold border-bottom';
				} else {
					return '';
				}
			}

			if (!$this->input->post('partcodeReportDateStart')) {
			    $partcodeReportStartPeriod = date("Y-m-01", strtotime("-3 months"));
			    $partcodeReportEndPeriod = date("Y-m-d");
			} else {
			    $partcodeReportStartPeriod = date("Y-m-01", strtotime($this->input->post('partcodeReportDateStart')));
			    $partcodeReportEndPeriod = date("Y-m-d", strtotime($this->input->post('partcodeReportDateEnd')));
			}

		 ?>
		<div class="container-fluid pt-2 px-1">
			<div class="card card-outline card-info">
				<div class="card-header">
					<span class="h6 text-info">Rangkuman Aktivitas Tambah/Update Kode Part</span>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col">
							<form action="" class="form-row" method="post" style="width: 520px;">
	                            <label for="partcodeReportDateStart" class="col-sm-2">Period</label>
	                            <div class="col-sm-4">
	                                <input type="date" id="partcodeReportDateStart" name="partcodeReportDateStart" class="form-control" value="<?= $partcodeReportStartPeriod ?>">
	                            </div>
	                            <div class="col-sm-4">
	                                <input type="date" id="partcodeReportDateEnd" name="partcodeReportDateEnd" class="form-control" value="<?= $partcodeReportEndPeriod ?>">
	                            </div>                                
	                            <div class="row ml-1">
	                                <button type="submit" class="btn btn-outline-primary" id="partcodeReportSubmit" name="partcodeReportSubmit">Go</button>
	                            </div>
	                        </form>
						</div>
					</div>
					<div class="row mt-4">
						<div class="col">
							<p class="lead text-indigo">Entry New Part Code period : <?= date("M Y", strtotime($partcodeReportStartPeriod)) ?> - <?= date("M Y", strtotime($partcodeReportEndPeriod)) ?> </p>
							<p class="badge badge-primary badge-pill px-3 py-1">By User</p>
							<table class="table table-sm table-hover table-responsive ml-3">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Agent</th>
                                        <?php
                                        $keys = array_keys($newer[0]);
                                        for ($col = 1; $col < count($newer[0]); $col++) :
                                            $nama_kolom = date("M-y", strtotime($keys[$col]));
                                        ?>
                                        	<th class="text-center px-4"><?= str_replace('_', ' ', $nama_kolom); ?></th>
                                        <?php endfor; ?>
                                        <th class="text-center px-4">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php $i = 1; ?>
                                    <?php for ($a = 0; $a < count($newer); $a++) : ?>
                                        <tr class="<?= row2style($a, count($newer)-1) ?>">
	                                        <?php
	                                        for ($x = 0; $x < count($newer[0]); $x++) :
	                                            $baris_data = $keys[$x];
	                                            $cell_value = $newer[$a][$baris_data];
	                                            is_numeric($cell_value) ? $cell = '<td  align="center" class="px-3">' . $cell_value . '</td>' : $cell = '<td class="pr-4">' . str_replace(',', '.', $cell_value) . '</td>';
	                                            echo $cell;
	                                        endfor; ?>
	                                        <td class="text-center"><?= array_sum($newer[$a]) ?></td>
                                        </tr>
                                    <?php endfor; ?>
                                </tbody>
                            </table>
                            <p class="mt-3 badge badge-primary badge-pill px-3 py-1">By Product Category</p>
                            <table class="table table-sm table-hover table-responsive ml-3">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Category</th>
                                        <?php
                                        $keys = array_keys($newerCategory[0]);
                                        for ($col = 1; $col < count($newerCategory[0]); $col++) :
                                            $nama_kolom = date("M-y", strtotime($keys[$col]));
                                        ?>
                                        	<th class="text-center px-4"><?= str_replace('_', ' ', $nama_kolom); ?></th>
                                        <?php endfor; ?>
                                        <th class="text-center px-4">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php $i = 1; ?>
                                    <?php for ($a = 0; $a < count($newerCategory); $a++) : ?>
                                        <tr class="<?= row2style($a, count($newerCategory)-1) ?>">
	                                        <?php
	                                        for ($x = 0; $x < count($newerCategory[0]); $x++) :
	                                            $baris_data = $keys[$x];
	                                            $cell_value = $newerCategory[$a][$baris_data];
	                                            is_numeric($cell_value) ? $cell = '<td  align="center" class="px-3">' . $cell_value . '</td>' : $cell = '<td class="pr-4">' . str_replace(',', '.', $cell_value) . '</td>';
	                                            echo $cell;
	                                        endfor; ?>
	                                        <td class="text-center"><?= array_sum($newerCategory[$a]) ?></td>
                                        </tr>
                                    <?php endfor; ?>
                                </tbody>
                            </table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
