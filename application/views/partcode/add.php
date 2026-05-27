<div class="content-wrapper">    
	<!-- Main content -->
	<section class="content">
		<div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
		<div class="container-fluid pt-3">
			<div class="card card-outline card-info" style="height: 80vh;">
				<div class="card-header">
					<span class="card-title text-info">Tambah Kode Part Baru</span>
				</div>
				<div class="card-body">
					<form action="" method="POST">
	                    <div class="col-sm-10 px-4" style="min-width: 810px;;">
	                    	<div class="form-group row">
	                            <label for="addPartcodeCode" class="col-sm-2 col-form-label text-right">Kode Part :</label>
	                            <div class="col-sm-8">
	                                <input type="" class="form-control" id="addPartcodeCode" name="addPartcodeCode" value="">
	                                <div class="pretty p-svg p-curve mt-2">
	                                    <input type="hidden" name="addPartcodeIsnla" value="0" checked>
	                                    <div class="pretty p-svg p-curve p-toggle">
	                                        <input type="checkbox" name="addPartcodeIsnla" id="addPartcodeIsnla" value="1">
	                                        <div class="state p-success p-danger-o p-off">
	                                            <svg class="svg svg-icon" viewBox="0 0 20 20">
	                                                <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
	                                            </svg>
	                                            <label>Available</label>
	                                        </div>
	                                        <div class="state p-danger p-danger-o p-on">
	                                            <svg class="svg svg-icon" viewBox="0 0 20 20">
	                                                <path fill="none" d="M15.898,4.045c-0.271-0.272-0.713-0.272-0.986,0l-4.71,4.711L5.493,4.045c-0.272-0.272-0.714-0.272-0.986,0s-0.272,0.714,0,0.986l4.709,4.711l-4.71,4.711c-0.272,0.271-0.272,0.713,0,0.986c0.136,0.136,0.314,0.203,0.492,0.203c0.179,0,0.357-0.067,0.493-0.203l4.711-4.711l4.71,4.711c0.137,0.136,0.314,0.203,0.494,0.203c0.178,0,0.355-0.067,0.492-0.203c0.273-0.273,0.273-0.715,0-0.986l-4.711-4.711l4.711-4.711C16.172,4.759,16.172,4.317,15.898,4.045z" style="stroke: white;fill:white;"></path>
	                                            </svg>
	                                            <i class="icon mdi mdi-close"></i>
	                                            <label>NLA</label>
	                                        </div>
	                                    </div>
	                                	<small class="text-secondary"><em>(klik untuk mengganti Available/NLA)</em></small>
	                                </div>
	                                <div class="row mt-2">
	                                	<div class="col-sm-4">
	                                        <input type="checkbox" name="addPartcodeIsbht" id="addPartcodeIsbhtFake" style="display: none;" value="0" checked="">
	                                        <div class="pretty p-svg p-curve">
	                                            <input type="checkbox" name="addPartcodeIsbht" id="addPartcodeIsbht" value="1">
	                                            <div class="state p-warning">
	                                                <!-- svg path -->
	                                                <svg class="svg svg-icon" viewBox="0 0 20 20">
	                                                    <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
	                                                </svg>
	                                                <label class="text-dark">Part BHT</label>
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="form-group row">
	                            <label for="addPartcodeDescSource" class="col-sm-2 col-form-label text-right">Jenis Part :</label>
	                            <div class="col-sm-8">
	                                <select class="js-example-basic-single custom-select" id="addPartcodeDescSource" name="addPartcodeDescSource">
	                                	<option value="">- pilih Jenis Part-</option>
                                        <option value=""><em>- Part baru -</em></option>
                                        <?php foreach($allPartDesc as $row) : ?>
                                            <option value="<?= $row['part_desc'] ?>"><?= $row['part_desc'] ?></option>
                                        <?php endforeach; ?>
	                                </select>
	                            </div>
	                        </div>
	                        <div class="form-group row" style="display: none;">
	                            <label for="addPartcodeDesc" class="col-sm-2 col-form-label text-right"></label>
	                            <div class="col-sm-8">
	                                <input type="" class="form-control" id="addPartcodeDesc" name="addPartcodeDesc" value="">
	                            </div>
	                        </div>
	                        <div class="form-group row">
	                            <label for="addPartcodeModel" class="col-sm-2 col-form-label text-right">Model :</label>
	                            <div class="col-sm-8">
	                                <textarea class="form-control" id="addPartcodeModel" name="addPartcodeModel"></textarea>
	                                <small class="ml-2 text-muted"><em>Contoh jika lebih dari 1 model: <b>AH-A5BEY, AH-A7BEY</b> atau <b>SJ-236MG, SJ-316MG</b></em></small>
	                            </div>
	                        </div>
	                        <div class="form-group row">
	                            <label for="addPartcodeRemark" class="col-sm-2 col-form-label text-right">Remark :</label>
	                            <div class="col-sm-8">
	                                <!-- <input type="" class="form-control" id="addPartcodeRemark" name="addPartcodeRemark" value=""> -->
	                                <textarea class="form-control" id="addPartcodeRemark" name="addPartcodeRemark" value=""></textarea>
	                            </div>
	                        </div>
	                        <div class="form-group row">
	                            <label for="addPartcodeCategory" class="col-sm-2 col-form-label text-right">Kategori produk :</label>
	                            <div class="col-sm-8">
	                                <select class="js-example-basic-single custom-select" id="addPartcodeCategory" name="addPartcodeCategory">
	                                    <option value=""> - pilih - </option>
                                        <option value="Air Conditioner">Air Conditioner</option>
                                        <option value="Air Cooler">Air Cooler</option>
                                        <option value="Air Purifier">Air Purifier</option>
                                        <option value="Audio">Audio</option>
                                        <option value="Hair Dryer/Straightener">Hair Dryer/Straightener</option>
                                        <option value="LCD/LED TV">LCD/LED TV</option>
                                        <option value="Microwave Oven">Microwave Oven</option>
                                        <option value="Notebook">Notebook/Laptop</option>
                                        <option value="Refrigerator">Refrigerator</option>
                                        <option value="Smartphone">Smartphone/Handphone</option>
                                        <option value="Small Home Appliances">Small Home Appliances</option>
                                        <option value="Washing Machine">Washing Machine</option>
                                        <option value="Water Dispenser">Water Dispenser</option>
                                        <option value="Water Pump">Water Pump</option>
	                                </select>
	                            </div>
	                        </div>
	                        <div class="row">
	                        	<div class="col-sm-2"></div>
	                        	<div class="col-sm-8">
	                        		<button type="submit" class="btn btn-info">Save Part Code</button>
	                        		<button type="reset" class="btn btn-outline-secondary">Reset Form</button>
	                        	</div>	
	                        </div>
	                    </div>
	                </form>	
				</div>
			</div>
		</div>
	</section>
</div>