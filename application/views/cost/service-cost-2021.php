<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>

        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h6 class="h5 text-primary">Service Cost (general)</h6>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-four-tabContent">
                                <!-- Service cost (general) -->
                                <div class="tab-pane fade show active" id="custom-tabs-four-svccost" role="tabpanel" aria-labelledby="custom-tabs-four-svccost-tab">
                                    <table class="table table-sm table-bordered" cellspacing="5" cellpadding="5" id="tableServiceCost">
                                        <thead class="text-center">
                                            <tr>
                                                <th rowspan="2" class="align-middle">Jenis Produk</th>
                                                <th rowspan="2" class="align-middle">Ukuran/Type</th>
                                                <th rowspan="2" class="align-middle">Jenis Pekerjaan</th>
                                                <th colspan="2" class="align-middle">Ongkos Kerja (Rp)</th>
                                                <th colspan="2" class="align-middle">Ongkos Kerja (major) + Transport</th>
                                            </tr>
                                            <tr>
                                                <th class="align-middle">Major</th>
                                                <th class="align-middle">Minor</th>
                                                <th class="align-middle dalamKota">Dalam Kota</th>
                                                <th class="align-middle">Luar Kota</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr><td rowspan="3">TV WARNA</td><td>S/D 19 INCH</td><td>REPARASI</td><td>88,000</td><td>45,000</td><td>128,000</td><td>143,000</td></tr>
                                            <tr><td>20 ~ 24 INCH</td><td>REPARASI</td><td>110,000</td><td>55,000</td><td>150,000</td><td>165,000</td></tr>
                                            <tr><td>25 INCH KE ATAS</td><td>REPARASI</td><td>148,500</td><td>70,000</td><td>188,500</td><td>203,500</td></tr>
                                            <tr><td rowspan="10">LCD TV</td><td>S/D 29 INCH</td><td>REPARASI</td><td>187,000</td><td>90,000</td><td>227,000</td><td>242,000</td></tr>
                                            <tr><td>30 ~ 39 INCH</td><td>REPARASI</td><td>275,000</td><td>150,000</td><td>315,000</td><td>330,000</td></tr>
                                            <tr><td>40 ~ 59 INCH</td><td>REPARASI</td><td>291,500</td><td>160,000</td><td>331,500</td><td>346,500</td></tr>
                                            <tr><td>60 INCH KE ATAS</td><td>REPARASI</td><td>385,000</td><td>210,000</td><td>425,000</td><td>440,000</td></tr>
                                            <tr style="background-color: rgba(255, 255, 240, 1);"><td rowspan="2">INSTALL 24 ~ 32 INCH</td><td>STANDAR (TABLE)</td><td>-</td><td>-</td><td>50,000</td><td>-</td></tr>
                                            <tr style="background-color: rgba(255, 255, 240, 1);"><td>WALL BRACKET</td><td>-</td><td>-</td><td>112,500</td><td>-</td></tr>
                                            <tr style="background-color: rgba(255, 255, 240, 1);"><td rowspan="2">INSTALL 40 ~ 50 INCH</td><td>STANBDAR (TABLE)</td><td>-</td><td>-</td><td>75,000</td><td>-</td></tr>
                                            <tr style="background-color: rgba(255, 255, 240, 1);"><td>WALL BRACKET</td><td>-</td><td>-</td><td>150,000</td><td>-</td></tr>
                                            <tr style="background-color: rgba(255, 255, 240, 1);"><td rowspan="2">INSTALL 60 INCH KE ATAS</td><td>STANDAR (TABLE)</td><td>-</td><td>-</td><td>137,500</td><td>-</td></tr>
                                            <tr style="background-color: rgba(255, 255, 240, 1);"><td>WALL BRACKET</td><td>-</td><td>-</td><td>200,000</td><td>-</td></tr>
                                            <!-- <tr><td>40 ~ 50 INCH</td><td>-</td><td>-</td><td>150,0000</td><td>-</td></tr>
                                            <tr><td>60 INCH KE ATAS</td><td>-</td><td>-</td><td>275,0000</td><td>-</td></tr>             -->
                                            <tr><td rowspan="2">LCD Monitor</td><td>LCD MONITOR</td><td>REPARASI</td><td>126,500</td><td>70,000</td><td>166,500</td><td>181,500</td></tr>
                                            <tr><td>IDP/IWB (LEBIH DARI 46 INCH)</td><td>REPARASI</td><td>330,000</td><td>180,000</td><td>370,000</td><td>385,000</td></tr>
                                            <tr><td colspan="2">VCR / TV-VCR</td><td>REPARASI</td><td>88,000</td><td>50,000</td><td>-</td><td>-</td></tr>
                                            <tr><td colspan="2">PROJECTOR</td><td>REPARASI</td><td>247,500</td><td>135,000</td><td>-</td><td>-</td></tr>
                                            <tr><td colspan="2">VIDEO CD</td><td>REPARASI</td><td>93,500</td><td>50,000</td><td>-</td><td>-</td></tr>
                                            <tr><td colspan="2">LASER DISK / DVD</td><td>REPARASI</td><td>121,000</td><td>70,000</td><td>-</td><td>-</td></tr>
                                            <tr><td colspan="2">BLU-RAY PLAYER</td><td>REPARASI</td><td>110,000</td><td>60,000</td><td>-</td><td>-</td></tr>
                                            <tr><td colspan="2">CAMERA / VIEW CAM</td><td>REPARASI</td><td>187,000</td><td>105,000</td><td>-</td><td>-</td></tr>
                                            <tr><td colspan="2">COMPUTER / NOTEBOOK</td><td>REPARASI</td><td>148,500</td><td>90,000</td><td>-</td><td>-</td></tr>
                                            <tr><td colspan="2">ORGANIZER</td><td>REPARASI</td><td>60,500</td><td>35,000</td><td>-</td><td>-</td></tr>
                                            <tr><td colspan="2">CALCULATOR</td><td>REPARASI</td><td>38,500</td><td>25,000</td><td>-</td><td>-</td></tr>
                                            <tr><td colspan="2">AIR COOLER</td><td>REPARASI</td><td>110,000</td><td>60,000</td><td>150,000</td><td>165,000</td></tr>
                                            <tr><td colspan="2" rowspan="2">AIR PURIFIER</td><td>REPARASI</td><td>110,000</td><td>60,000</td><td>150,000</td><td>165,000</td></tr>
                                            <tr style="background-color: rgba(255, 255, 240, 1);"><td>CLEANING</td><td>100,000</td><td>-</td><td>140,000</td><td>155,000</td></tr>
                                            <tr><td rowspan="2">FACSIMILE</td><td>COMMON FACS</td><td>REPARASI</td><td>104,500</td><td>60,000</td><td>-</td><td>-</td></tr>
                                            <tr><td>LASER FACS</td><td>REPARASI</td><td>126,500</td><td>70,000</td><td>-</td><td>-</td></tr>
                                            <tr><td rowspan="4">AUDIO</td><td>DENGAN CD</td><td>REPARASI</td><td>104,500</td><td>64,000</td><td>-</td><td>-</td></tr>
                                            <tr><td>TANPA CD</td><td>REPARASI</td><td>71,500</td><td>45,000</td><td>-</td><td>-</td></tr>
                                            <tr><td>ACTIVE SPEAKER</td><td>REPARASI</td><td>71,500</td><td>45,000</td><td>-</td><td>-</td></tr>
                                            <tr><td>HOME THEATER, MD PLAYER, I POD</td><td>REPARASI</td><td>148,500</td><td>85,000</td><td>-</td><td>-</td></tr>
                                            <tr><td rowspan="3">LEMARI ES</td><td>DIRECT COOLING</td><td>DENGAN ISI GAS (JASA)</td><td>148,500</td><td>100,000</td><td>188,500</td><td>203,500</td></tr>
                                            <tr><td>NO FROST/FREEZER/SHOWCASE (~500 LITER)</td><td>DENGAN ISI GAS (JASA)</td><td>159,500</td><td>90,000</td><td>199,500</td><td>214,500</td></tr>
                                            <tr><td>NO FROST/FREEZER/SHOWCASE (>500 LITER)</td><td>DENGAN ISI GAS (JASA)</td><td>170,500</td><td>95,000</td><td>210,500</td><td>225,500</td></tr>
                                            <tr><td rowspan="5">MESIN CUCI</td><td>SEMI AUTOMATIC (2-TUB)</td><td>REPARASI</td><td>110,000</td><td>60,000</td><td>150,000</td><td>165,000</td></tr>
                                            <tr><td rowspan="2">AUTOMATIC TOP LOADING</td><td>REPARASI</td><td>137,500</td><td>75,000</td><td>177,500</td><td>192,500</td></tr>
                                            <tr style="background-color: rgba(255, 255, 240, 1);"><td>DEMO INSTALL</td><td>-</td><td>-</td><td>75,000</td><td>-</td></tr>
                                            <tr><td rowspan="2">FRONT LOADING</td><td>REPARASI</td><td>220,000</td><td>120,000</td><td>260,000</td><td>275,000</td></tr>
                                            <tr style="background-color: rgba(255, 255, 240, 1);"><td>DEMO INSTALL</td><td>-</td><td>-</td><td>100,000</td><td>-</td></tr>
                                            <tr><td rowspan="16">AIR CONDITIONER</td><td rowspan="2">MAINTENANCE ~1.5 PK</td><td>CUCI STANDAR</td><td>-</td><td>-</td><td>135,000</td><td>150,000</td></tr>
                                            <tr><td>CUCI TURUN (BESAR)</td><td>-</td><td>-</td><td>600,000</td><td>615,000</td></tr>
                                            <tr><td rowspan="2">MAINTENANCE 2 PK KE ATAS</td><td>CUCI STANDAR</td><td>-</td><td>-</td><td>160,000</td><td>175,000</td></tr>
                                            <tr><td>CUCI TURUN (BESAR)</td><td>-</td><td>-</td><td>600,000</td><td>615,000</td></tr>
                                            <tr><td>MAINTENANCE AC PORTABLE</td><td>CUCI STANDAR</td><td>-</td><td>-</td><td>183,000</td><td>198,000</td></tr>
                                            <tr><td>INSTALL TYPE SPLIT 0.5 - 1 PK</td><td></td><td>-</td><td>-</td><td>350,000</td><td>-</td></tr>
                                            <tr><td>INSTALL TYPE SPLIT 1.5 - 2.5 PK</td><td></td><td>-</td><td>-</td><td>450,000</td><td>-</td></tr>
                                            <tr><td>MAINTENANCE AC PORTABLE</td><td>CUCI STANDAR</td><td>-</td><td>-</td><td>183,000</td><td>198,000</td></tr>
                                            <tr><td>WINDOW</td><td>REPARASI</td><td>214,500</td><td>120,000</td><td>254,500</td><td>269,500</td></tr>
                                            <tr><td>SPLIT ~1.5 PK</td><td>REPARASI</td><td>214,500</td><td>120,000</td><td>254,500</td><td>269,500</td></tr>
                                            <tr><td>SPLIT 2 PK KE ATAS</td><td>REPARASI</td><td>242,000</td><td>135,000</td><td>282,000</td><td>297,000</td></tr>
                                            <tr><td>PORTABLE</td><td>REPARASI</td><td>220,000</td><td>120,000</td><td>260,000</td><td>275,000</td></tr>
                                            <tr><td>INVERTER ~1.5 PK</td><td>REPARASI</td><td>220,000</td><td>120,000</td><td>260,000</td><td>275,000</td></tr>
                                            <tr><td>INVERTER 2 PK KE ATAS</td><td>REPARASI</td><td>253,000</td><td>138,000</td><td>293,000</td><td>308,000</td></tr>
                                            <tr><td>CASSETTE/CEILING/STANDING FLOOR</td><td>REPARASI</td><td>440,000</td><td>240,000</td><td>480,000</td><td>495,000</td></tr>
                                            <tr><td>DUCTING TYPE</td><td>REPARASI</td><td>770,000</td><td>420,000</td><td>810,000</td><td>825,000</td></tr>
                                            <tr><td>ICE MAKER</td><td>DENGAN KOMPRESOR</td><td>DENGAN ISI GAS (JASA)</td><td>154,000</td><td>85,000</td><td>194,000</td><td>209,000</td></tr>
                                            <tr><td rowspan="2">DISPENSER</td><td rowspan="2">DENGAN KOMPRESOR</td><td>DENGAN ISI GAS (JASA)</td><td>154,000</td><td>85,000</td><td>194,000</td><td>209,000</td></tr>
                                            <tr style="background-color: rgba(255, 255, 240, 1);"><td>CLEANING</td><td>135,000</td><td>-</td><td>175,000</td><td>190,000</td></tr>
                                            <tr><td colspan="2">MICROWAVE OVEN</td><td>REPARASI</td><td>82,500</td><td>45,000</td><td>122,500</td><td>137,500</td></tr>
                                            <tr><td rowspan="9">ALAT-ALAT RUMAH TANGGA KECIL</td><td>KOMPOR GAS</td><td>REPARASI</td><td>60,500</td><td>55,000</td><td>-</td><td>-</td></tr>
                                            <tr><td>ELECTRIC OVEN/COFFEE MAKER/SANDWICH TOASTER</td><td>REPARASI</td><td>55,000</td><td>50,000</td><td>-</td><td>-</td></tr>
                                            <tr><td>BLENDER/JUICER/MIXER/DISPENSER</td><td>REPARASI</td><td>55,000</td><td>50,000</td><td>-</td><td>-</td></tr>
                                            <tr><td>RICE COOKER/ELECTRIC OVEN</td><td>REPARASI</td><td>55,000</td><td>50,000</td><td>-</td><td>-</td></tr>
                                            <tr><td>WATER PURIFIER</td><td>REPARASI</td><td>60,500</td><td>55,000</td><td>-</td><td>-</td></tr>
                                            <tr><td>ION GENERATOR CAR/HELMET PURIFIER</td><td>REPARASI</td><td>60,500</td><td>55,000</td><td>-</td><td>-</td></tr>
                                            <tr><td>WATER HEATER</td><td>REPARASI</td><td>71,500</td><td>65,000</td><td>-</td><td>-</td></tr>
                                            <tr><td>HAIR DRYER</td><td>REPARASI</td><td>60,500</td><td>55,000</td><td>-</td><td>-</td></tr>
                                            <tr><td>ELECTRIC FAN</td><td>REPARASI</td><td>38,500</td><td>35,000</td><td>-</td><td>-</td></tr>
                                            <tr><td rowspan="2">VACUUM CLEANER</td><td rowspan="2">SEMUA MODEL</td><td>MANUAL</td><td>55,000</td><td>50,000</td><td>-</td><td>-</td></tr>
                                            <tr><td>OTOMATIS</td><td>132,000</td><td>75,000</td><td>-</td><td>-</td></tr>
                                            <tr><td rowspan="3">MOBILE PHONE</td><td rowspan="3">SEMUA MODEL</td><td>REPARASI</td><td>77,000</td><td>50,000</td><td>-</td><td>-</td></tr>
                                            <tr><td>UPDATE SOFTWARE</td><td>44,000</td><td>-</td><td>-</td><td>-</td></tr>
                                            <tr><td>ACCESSORIS</td><td>38,500</td><td>-</td><td>-</td><td>-</td></tr>
                                            <tr><td colspan="2">WIRELESS / TELEPHONE</td><td>REPARASI</td><td>96,800</td><td>55,000</td><td>-</td><td>-</td></tr>
                                            <tr><td colspan="2">PHOTOVOLTAIC</td><td>REPARASI</td><td>121,000</td><td>70,000</td><td>161,000</td><td>176,000</td></tr>
                                            <tr><td rowspan="3">WATER PUMP</td><td>WATER PUMP</td><td>REPARASI</td><td>44,000</td><td>40,000</td><td>84,000</td><td>99,000</td></tr>
                                            <tr><td>JET PUMP</td><td>REPARASI</td><td>88,000</td><td>50,000</td><td>128,000</td><td>143,000</td></tr>
                                            <tr><td>SELAM/SUBMERSIBLE</td><td>REPARASI</td><td>132,000</td><td>80,000</td><td>172,000</td><td>187,000</td></tr>

                                        </tbody>
                                    </table>
                                    <br>
                                    <!-- tabel refrigerant -->
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
                                            <tr class="warna-5"><td rowspan="4">AC split<br>R32</td><td>~0.75 PK</td><td>gram</td><td>570</td><td>330</td><td>188,100</td></tr>
                                            <tr class="warna-5"><td>1 PK ~ 1.5 PK</td><td>gram</td><td>890</td><td>330</td><td>293,700</td></tr>
                                            <tr class="warna-5"><td>1.6 PK ~ 3 PK</td><td>gram</td><td>1,610</td><td>330</td><td>531,300</td></tr>
                                            <tr class="warna-5"><td>> 3 PK</td><td>gram</td><td>2,750</td><td>330</td><td>907,500</td></tr>
                                            <tr class="warna-6"><td rowspan="3">AC split<br>R410A</td><td>~0.75 PK</td><td>gram</td><td>650</td><td>440</td><td>286,000</td></tr>
                                            <tr class="warna-6"><td>1 PK ~ 1.5 PK</td><td>gram</td><td>860</td><td>440</td><td>378,400</td></tr>
                                            <tr class="warna-6"><td>1.6 PK ~ 2.5 PK</td><td>gram</td><td>1,050</td><td>440</td><td>462,000</td></tr>
                                            <tr class="warna-7"><td rowspan="3">AC standing/cassette<br>R410A</td><td>2 PK</td><td>gram</td><td>1,490</td><td>440</td><td>655,600</td></tr>
                                            <tr class="warna-7"><td>2.5 PK ~ 4 PK</td><td>gram</td><td>2,200</td><td>440</td><td>968,000</td></tr>
                                            <tr class="warna-7"><td>> 4 PK</td><td>gram</td><td>4,200</td><td>440</td><td>1,848,000</td></tr>
                                        </tbody>
                                    </table>
                                    <br>

                                    <table border="1" cellspacing="5" cellpadding="5" id="transport">
                                        <tbody>
                                            <tr><td colspan="2"><b>ONGKOS TRANSPORTASI</b></td></tr>
                                            <tr><td>Dalam kota</td><td>40,000</td></tr>
                                            <tr><td>Luar kota</td><td>55,000</td></tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    <h5 class="h5 text-indigo">Pembatalan reparasi oleh konsumen akan dikenakan biaya pengecekan sebesar Rp. 40,000</h5>
                                    <table  class="table table-bordered" cellpadding="5" cellspacing="5" id="pembatalan">
                                        <thead>
                                            <tr>
                                                <th>Type order</th>
                                                <th>Biaya Pembatalan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Pebaikan kunjunngan Z2/ZY</td>
                                                <td>Transportasi & pengecekan unit (Rp. 80,000)</td>
                                            </tr>
                                            <tr>
                                                <td>Perbaikan Z1</td>
                                                <td>Pengecekan unit (Rp. 40,000)</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    <table class="table table-bordered" cellspacing="5" cellpadding="5" id="keterangan">
                                        <thead>
                                            <tr>
                                                <th>Kategori</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Mayor</td>
                                                <td>Penggantian kompresor, panel, motor, penggantian part lain yang membutuhkan solder dan las</td>
                                            </tr>
                                            <tr>
                                                <td>Minor</td>
                                                <td>Penambahan refrigerant, penggantian fuse, penggantian AC cord, install aksesoris, adjust/setting</td>
                                            </tr>
                                        </tbody>
                                    </table> 
                                </div>                               
                            </div>
                        </div>
                    </div>
                </div>                    
            </div>
        </div>
    </section>
</div>

<script>
    //var untuk output
    var kotakType = document.querySelectorAll('input[name=type]');
    var kotakKapasitas = document.querySelectorAll('input[name=kapasitas]');
    var kotakRefrigerant = document.querySelectorAll('input[name=refrigerant]');
    var kotakMaksVolume = document.querySelectorAll('input[name=maksVolume]');
    var kotakHargaPerGram = document.querySelectorAll('input[name=hargaPerGram]');
    var kotakMaksHarga = document.querySelectorAll('input[name=maksHarga]');
    var kotakJasaPerbaikan = document.querySelectorAll('input[name=jasaPerbaikan]');
    var kotakBiayaTotal = document.querySelectorAll('input[name=biayaTotal]');

    //var untuk input
    var caseModels = document.querySelectorAll('#tabelSpecAC table tbody td:nth-child(1)');
    var caseTypes = document.querySelectorAll('#tabelSpecAC table tbody td:nth-child(2)');
    var caseKapasitas = document.querySelectorAll('#tabelSpecAC table tbody td:nth-child(3)');
    var caseRefrigerants = document.querySelectorAll('#tabelSpecAC table tbody td:nth-child(4)');   
    var caseMaksRefrigerant = document.querySelectorAll('#tabelSpecAC table tbody td:nth-child(5)');
    var caseHargaPerGram = document.querySelectorAll('#tabelSpecAC table tbody td:nth-child(6)');
    var caseMaksHarga = document.querySelectorAll('#tabelSpecAC table tbody td:nth-child(7)');
    var caseJasaPerbaikan = document.querySelectorAll('#tabelSpecAC table tbody td:nth-child(8)');
    var casePart1 = document.querySelector('input[name=hargaPart1]');
    var casePart2 = document.querySelector('input[name=hargaPart2]');
    var casePart3 = document.querySelector('input[name=hargaPart3]');
    var inputModel = document.querySelector('table input[name=model]');

    //tabel dan tombol
    var tabelSpecAC = document.getElementById('tabelSpecAC');
    var hitungBiaya = document.getElementById('tombolHitung');
    var tombolSembunyiHIlang = document.getElementById('tombolSembunyiHIlang');
    var tombolReset = document.getElementById('tombolReset');
    var tombolReload = document.getElementById('tombolReload');

    //membuat array baru dari nilai tabel
    var models = [];
    var types = [];
    var kapasitas = [];
    var refrigerants = [];
    var maksRefrigerants = [];
    var hargaPerGram = [];
    var maksHarga = [];
    var jasaPerbaikan = [];

    for(let i = 0; i< caseModels.length; i++){
        models.push(caseModels[i].innerHTML);
        types.push(caseTypes[i].innerHTML);
        kapasitas.push(caseKapasitas[i].innerHTML);
        refrigerants.push(caseRefrigerants[i].innerHTML);
        maksRefrigerants.push(caseMaksRefrigerant[i].innerHTML);
        hargaPerGram.push(caseHargaPerGram[i].innerHTML);
        maksHarga.push(caseMaksHarga[i].innerHTML);
        jasaPerbaikan.push(caseJasaPerbaikan[i].innerHTML);
    }

    //menghitung index array
    // var x = models.indexOf(inputModel.value.toUpperCase());
    // console.log(x);

    //fungsi tombol
    hitungBiaya.addEventListener('click',function(){
        hitungTotalBiaya();
    });

    function hitungTotalBiaya() {
        var x = models.indexOf(inputModel.value.toUpperCase());
        if(x < 0){
            return alert('Model salah atau tidak sesuai\nCek kode model yang diinput');
        }
        else{
        kotakType[0].value = types[x];
        kotakKapasitas[0].value = kapasitas[x] + ' PK';
        kotakRefrigerant[0].value = refrigerants[x];
        kotakMaksVolume[0].value = maksRefrigerants[x];
        kotakHargaPerGram[0].value = hargaPerGram[x];       
        kotakJasaPerbaikan[0].value = jasaPerbaikan[x];
        kotakMaksHarga[0].value = maksHarga[x];
        kotakBiayaTotal[0].value = 
            parseInt(jasaPerbaikan[x]) + 
            parseInt(maksHarga[x]) + 
            parseInt(casePart1.value) + 
            parseInt(casePart2.value) + 
            parseInt(casePart3.value); 
        }
    }

    tombolReset.addEventListener('click',function(){
        location.reload();
    });

    function segarkanHalaman(){
        location.reload(false);
    }

    tombolReload.addEventListener('click',function(){
        location.reload(true);
    });

    tombolSembunyiHIlang.addEventListener('click',function(){
        tabelSpecAC.classList.toggle('muncul');
        tabelSpecAC.classList.toggle('sembunyi');
    });
</script>