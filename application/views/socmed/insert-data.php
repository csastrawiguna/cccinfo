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
            <div class="card card-info card-outline">
                <div class="card-header">
                    <span class="text-info">Tambah data pertanyaan dari social media SHARP (<i class="fab fa-instagram"></i> Instagram, <i class="fab fa-facebook"></i> Facebook, <i class="fab fa-twitter"></i> Twitter, Shopee)</span>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group row">
                            <label for="socmedInsertDate" class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control" name="socmedInsertDate" id="socmedInsertDate" value=""  style="min-width: 180px; max-width:200px;">
                            </div>
                            <!-- <label for="socmedInsertType" class="col-sm-2 col-form-label text-right">Channel</label> -->
                            <div class="col-sm"  style="min-width: 220px;">
                                 <div class="pretty p-default p-curve">
                                    <input type="radio" name="socmedInsertType" id="socmedInsertTypeInstagram" value="Instagram" />
                                    <div class="state p-danger-o">
                                        <label>Instagram</label>
                                    </div>
                                </div>
                                <div class="pretty p-default p-curve">
                                    <input type="radio" name="socmedInsertType" id="socmedInsertTypeTwitter" value="Twitter" />
                                    <div class="state p-info-o">
                                        <label>Twitter</label>
                                    </div>
                                </div>
                                <div class="pretty p-default p-curve">
                                    <input type="radio" name="socmedInsertType" id="socmedInsertTypeFacebook" value="Facebook" />
                                    <div class="state p-primary-o">
                                        <label>Facebook</i></label>
                                    </div>
                                </div>
                                <div class="pretty p-default p-curve">
                                    <input type="radio" name="socmedInsertType" id="socmedInsertTypeShopee" value="Shopee" />
                                    <div class="state p-warning-o">
                                        <label>Shopee</i></label>
                                    </div>
                                </div>
                                <div class="pretty p-default p-curve">
                                    <input type="radio" name="socmedInsertType" id="socmedInsertTypeOthers" value="Others" />
                                    <div class="state p-dark-o">
                                        <label>Others</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="socmedInsertCustomerName" class="col-sm-2 col-form-label">Konsumen</label>
                            <div class="col-sm-4">
                                <input type="" class="form-control" name="socmedInsertCustomerName" id="socmedInsertCustomerName" placeholder="Nama Konsumen">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="socmedInsertCustomerAccount" class="col-sm-2 col-form-label">&nbsp;</label>
                            <div class="col-sm-4">
                                <input type="" class="form-control" name="socmedInsertCustomerAccount" id="socmedInsertCustomerAccount" placeholder="Nama akun social media">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="socmedInsertCustomerPhone" class="col-sm-2 col-form-label">&nbsp;</label>
                            <div class="col-sm-4">
                                <input type="" class="form-control" name="socmedInsertCustomerPhone" id="socmedInsertCustomerPhone" placeholder="Nomor telepon">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="socmedInsertProductCategory" class="col-sm-2 col-form-label">Kategori produk</label>
                            <div class="col-sm-3">
                                <select type="text" class="custom-select form-control" name="socmedInsertProductCategory" id="socmedInsertProductCategory"  style="min-width: 220px; max-width:240px;">
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
                            <label for="socmedInsertModel" class="col-sm-2 col-form-label text-right">Model</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="socmedInsertModel" id="socmedInsertModel" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="socmedInsertSystemCode" class="col-sm-2 col-form-label">System code</label>
                            <div class="col-sm-3">
                                <select type="text" class="custom-select form-control" name="socmedInsertSystemCode" id="socmedInsertSystemCode"  style="min-width: 220px; max-width:240px;">
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
                            <label for="socmedInsertInquiryGroup" class="col-sm-2 col-form-label text-right">Inquiry</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="socmedInsertInquiryGroup" id="socmedInsertInquiryGroup" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="socmedInsertIdetail" class="col-sm-2 col-form-label">Pertanyaan</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="socmedInsertIdetail" id="socmedInsertIdetail" placeholder="Detail pertanyaan"></textarea>
                            </div>
                        </div><div class="form-group row">
                            <label for="socmedInsertActiondetail" class="col-sm-2 col-form-label">Action</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="socmedInsertActiondetail" id="socmedInsertActiondetail" placeholder="Action detail"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="socmedInsertRemark" class="col-sm-2 col-form-label">Remark</label>
                            <div class="col-sm-8">
                                <input type="" class="form-control" name="socmedInsertRemark" id="socmedInsertRemark" placeholder="Remark">
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
            </div>
        </div>                    
    </section>
</div>
