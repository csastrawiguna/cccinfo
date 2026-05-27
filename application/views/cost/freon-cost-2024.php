<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>

        <div class="container-fluid pt-3">
            <style type="text/css">
                .bg-azure {background-color: #F0FFFF;}
                .bg-light-yellow {background-color: #FFFFF0;}
            </style>
            <div class="row">
                <div class="col">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h6 class="h5 text-primary">Service Cost (general) - per 5 November 2024</h6>
                        </div>
                        <div class="card-body">
                            <p class="h6 mb-4 text-bold">
                                Service cost per 5 November 2024 :
                                <a href="<?= base_url('files/service_cost_20241105.pdf') ?>" class="btn btn-sm btn-outline-info" target="_blank"><i class="fas fa-file-pdf"></i> File Service Cost</a>
                                <a href="<?= base_url('files/form_daftar_biaya_tambahan_instalasi_ac_(2024).pdf') ?>" class="btn btn-sm btn-outline-info"  target="_blank"><i class="fas fa-file-pdf"></i> Biaya Tambahan Instalasi AC</a>
                            </p>    
                             Tabel refrigerant
                            <table border="1" cellpadding="5" cellspacing="5" id="refrigerant">
                                <thead>
                                    <tr>
                                        <th>Refrigerant</th>
                                        <th>Ukuran</th>
                                        <th>Satuan</th>
                                        <th>Maks. Refrigerant (gr/pc)</th>
                                        <th>Harga per gram (Rp)</th>
                                        <th>Maks. Biaya Refrigerant (Rp)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="warna-1"><td rowspan="2">Refrigerator<br>R134</td><td>~ 500 LITER</td><td>gram</td><td>140</td><td>770</td><td>107,800</td></tr>
                                    <tr class="warna-1"><td>> 500 LITER</td><td>gram</td><td>350</td><td>770</td><td>269,500</td></tr>
                                    <tr class="warna-2"><td rowspan="2">Refrigerator<br>R600</td><td>~ 500 LITER</td><td>pc</td><td>1</td><td>242,000</td><td>242,000</td></tr>
                                    <tr class="warna-2"><td>> 500 LITER</td><td>pc</td><td>1</td><td>242,000</td><td>242,000</td></tr>
                                    <tr class="warna-3"><td rowspan="3">AC split<br>R-22</td><td>~ 0.75 PK</td><td>gram</td><td>570</td><td>220</td><td>125,400</td></tr>
                                    <tr class="warna-3"><td>1 PK ~ 1.5 PK</td><td>gram</td><td>630</td><td>220</td><td>138,600</td></tr>
                                    <tr class="warna-3"><td>1.6 PK ~ 2.5 PK</td><td>gram</td><td>1,430</td><td>220</td><td>314,600</td></tr>
                                    <tr class="warna-4"><td rowspan="3">AC cassette<br>R22</td><td>2 PK ~ 2.5 PK</td><td>gram</td><td>2,620</td><td>220</td><td>576,400</td></tr>
                                    <tr class="warna-4"><td>2.6 PK ~ 3.5 PK</td><td>gram</td><td>4,130</td><td>220</td><td>908,600</td></tr>
                                    <tr class="warna-4"><td>3.6 PK ~ 5 PK</td><td>gram</td><td>5,250</td><td>220</td><td>1,155,000</td></tr>
                                    <tr class="warna-5"><td rowspan="4">AC split<br>R32</td><td>~0.75 PK</td><td>gram</td><td>570</td><td>440</td><td>250,800</td></tr>
                                    <tr class="warna-5"><td>1 PK ~ 1.5 PK</td><td>gram</td><td>890</td><td>440</td><td>391,600</td></tr>
                                    <tr class="warna-5"><td>1.6 PK ~ 3 PK</td><td>gram</td><td>1,610</td><td>440</td><td>708,400</td></tr>
                                    <tr class="warna-5"><td>> 3 PK</td><td>gram</td><td>2,750</td><td>440</td><td>,210,000</td></tr>
                                    <tr class="warna-6"><td rowspan="3">AC split<br>R410A</td><td>~0.75 PK</td><td>gram</td><td>650</td><td>440</td><td>286,000</td></tr>
                                    <tr class="warna-6"><td>1 PK ~ 1.5 PK</td><td>gram</td><td>860</td><td>440</td><td>378,400</td></tr>
                                    <tr class="warna-6"><td>1.6 PK ~ 2.5 PK</td><td>gram</td><td>1,050</td><td>440</td><td>462,000</td></tr>
                                    <tr class="warna-7"><td rowspan="3">AC standing/cassette<br>R410A</td><td>2 PK</td><td>gram</td><td>1,490</td><td>440</td><td>655,600</td></tr>
                                    <tr class="warna-7"><td>2.5 PK ~ 4 PK</td><td>gram</td><td>2,200</td><td>440</td><td>968,000</td></tr>
                                    <tr class="warna-7"><td>> 4 PK</td><td>gram</td><td>4,200</td><td>440</td><td>1,848,000</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>                    
            </div>
        </div>
    </section>
</div>