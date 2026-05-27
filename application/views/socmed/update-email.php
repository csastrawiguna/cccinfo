<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
        <?php
            if (!$this->input->post()) {
                $startPeriod = date("Y-m-01", strtotime("-1 months"));
                $endPeriod = date("Y-m-d");
            } else {
                $startPeriod = date('Y-m-01', strtotime($this->input->post('socmedInquiryStartPeriod')));
                $endPeriod = date('Y-m-d', strtotime($this->input->post('socmedInquiryEndPeriod')));
            }

            function channeltoIcon($channel) {
                if (strtolower($channel) == 'twitter') {
                    $icon = '<i class="fab fa-twitter text-info"></i>';
                } else if (strtolower($channel) == 'facebook') {
                    $icon = '<i class="fab fa-facebook text-primary"></i>';
                } else if (strtolower($channel) == 'instagram') {
                    $icon = '<i class="fab fa-instagram text-danger"></i>';
                } else {
                    $icon = '<i class="fas fa-file"></i>';
                }
                return $icon;
            }

            $allowedAccess = [1, 9];
        ?>

        <div class="container-fluid pt-3">       
            <p class="lead text-center">On Progress ...</p>
            <!-- <div class="card card-info card-outline">
                <div class="card-header">
                    <span class="text-info">Tambah data pertanyaan dari Email SHARP</span>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group row">
                            <label for="emailInsertDatetime" class="col-sm-2 col-form-label">Tanggal & jam</label>
                            <div class="col-sm-auto">
                                <input type="datetime-local" class="form-control" name="emailInsertDatetime" id="emailInsertDatetime" value=""  style="min-width: 220px; max-width:230px;">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="emailInsertCustomerEmail" class="col-sm-2 col-form-label">Konsumen</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" name="emailInsertCustomerEmail" id="emailInsertCustomerEmail" placeholder="Alamat email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="emailInsertCustomerData" class="col-sm-2 col-form-label">&nbsp;</label>
                            <div class="col-sm-8">
                                <input type="" class="form-control" name="emailInsertCustomerData" id="emailInsertCustomerData" placeholder="Nama, telepon dan data lain. Pisahkan dengan tanda garis miring'/'">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="emailInsertSubjectmail" class="col-sm-2 col-form-label">Subject Email</label>
                            <div class="col-sm-8">
                                <input type="" class="form-control" name="emailInsertSubjectmail" id="emailInsertSubjectmail" placeholder="Subjek email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="emailInsertRepliedDate" class="col-sm-2 col-form-label">Tanggal Balas</label>
                            <div class="col-sm-auto">
                                <input type="date" class="form-control" name="emailInsertRepliedDate" id="emailInsertRepliedDate" value=""  style="min-width: 180px; max-width:200px;">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="emailInsertProductCategory" class="col-sm-2 col-form-label">Kategori produk</label>
                            <div class="col-sm-3">
                                <select type="text" class="custom-select form-control" name="emailInsertProductCategory" id="emailInsertProductCategory"  style="min-width: 220px; max-width:240px;">
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
                            <label for="emailInsertModel" class="col-sm-2 col-form-label text-right">Model</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="emailInsertModel" id="emailInsertModel" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="emailInsertSystemCode" class="col-sm-2 col-form-label">System code</label>
                            <div class="col-sm-3">
                                <select type="text" class="custom-select form-control" name="emailInsertSystemCode" id="emailInsertSystemCode"  style="min-width: 220px; max-width:240px;">
                                    <option value=""> - pilih - </option>
                                    <option value="1a">1a - Presales</option>
                                    <option value="1b">1b - Advertisement info</option>
                                    <option value="1c">1c - Warranty</option>
                                    <option value="2a">2a/2b - Usage explanation</option>
                                    <option value="3a">3a/3m/3q - Repair request</option>
                                    <option value="3b">3b - Visit schedule</option>
                                    <option value="3c">3c - Service location</option>
                                    <option value="3d">3d - Service cost</option>
                                    <option value="3e">3e - Cancel repair</option>
                                    <option value="3f">3f - WM installation</option>
                                    <option value="3h">3h - AP cleaning</option>
                                    <option value="3i">3i - AC cleaning</option>
                                    <option value="3j">3j - Prerepair</option>
                                    <option value="3k">3k - Unit status</option>
                                    <option value="4a">4a/4b - Spare part info</option>
                                    <option value="5a">5a - Product claim</option>
                                    <option value="5b">5b - Advertisement claim</option>
                                    <option value="5c">5c - Sales claim</option>
                                    <option value="5d">5d - Service claim</option>
                                    <option value="5e">5e - Claim progress</option>
                                    <option value="6a">6a - Comments</option>
                                    <option value="7a">7a - Others</option>
                                </select>
                            </div>
                            <label for="emailInsertInquiryGroup" class="col-sm-2 col-form-label text-right">Inquiry</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="emailInsertInquiryGroup" id="emailInsertInquiryGroup" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="emailInsertIdetail" class="col-sm-2 col-form-label">Pertanyaan</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="emailInsertIdetail" id="emailInsertIdetail" placeholder="Detail pertanyaan"></textarea>
                            </div>
                        </div><div class="form-group row">
                            <label for="emailInsertActiondetail" class="col-sm-2 col-form-label">Action</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="emailInsertActiondetail" id="emailInsertActiondetail" placeholder="Action detail"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="emailInsertRemark" class="col-sm-2 col-form-label">Remark</label>
                            <div class="col-sm-8">
                                <input type="" class="form-control" name="emailInsertRemark" id="emailInsertRemark" placeholder="Remark">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm">
                                <button trpe="submit" class="btn btn-info px-3">Save</button>
                                <button trpe="reset" class="btn btn-secondary px-3">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> -->
        </div>                    
    </section>
</div>
