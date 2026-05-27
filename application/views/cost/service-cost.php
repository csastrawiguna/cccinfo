<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>

        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h6 class="h5 text-primary">Service Cost (general) - per 1 Maret 2022</h6>
                        </div>
                        <div class="card-body">
                            <p class="h6 mb-4 text-bold">
                                Service cost per 1 Maret 2022 :
                                <a href="<?= base_url('files/service_cost_20220401.pdf') ?>" target="_blank">Link</a>
                            </p>    
                            <!-- Service cost (general) -->
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
                                    <tr><td rowspan="3">TV WARNA</td><td>S/D 19 INCH</td><td>REPARASI</td><td>94,000</td><td>57,000</td><td>134,000</td><td>149,000</td></tr>
                                    <tr><td>20 ~ 24 INCH</td><td>REPARASI</td><td>111,000</td><td>67,000</td><td>151,000</td><td>166,000</td></tr>
                                    <tr><td>25 INCH KE ATAS</td><td>REPARASI</td><td>135,000</td><td>81,000</td><td>175,000</td><td>190,000</td></tr>
                                    <tr><td rowspan="12">LCD TV</td><td>S/D 29 INCH</td><td>REPARASI</td><td>182,000</td><td>54,000</td><td>222,000</td><td>237,000</td></tr>
                                    <tr><td>30 ~ 39 INCH</td><td>REPARASI</td><td>294,000</td><td>177,000</td><td>334,000</td><td>349,000</td></tr>
                                    <tr><td>40 ~ 60 INCH</td><td>REPARASI</td><td>312,000</td><td>187,000</td><td>352,000</td><td>367,000</td></tr>
                                    <tr><td>DIATAS 60 INCH</td><td>REPARASI</td><td>412,000</td><td>248,000</td><td>452,000</td><td>467,000</td></tr>
                                    <tr style="background-color: rgba(255, 255, 240, 1);"><td rowspan="2">INSTALL SAMPAI 29 INCH</td><td>STANDAR (TABLE)</td><td>-</td><td>-</td><td>65,000</td><td>-</td></tr>
                                    <tr style="background-color: rgba(255, 255, 240, 1);"><td>WALL BRACKET</td><td>-</td><td>-</td><td>129,000</td><td>-</td></tr>
                                    <tr style="background-color: rgba(255, 255, 240, 1);"><td rowspan="2">INSTALL 30 ~ 39 INCH</td><td>STANBDAR (TABLE)</td><td>-</td><td>-</td><td>75,000</td><td>-</td></tr>
                                    <tr style="background-color: rgba(255, 255, 240, 1);"><td>WALL BRACKET</td><td>-</td><td>-</td><td>150,000</td><td>-</td></tr>
                                    <tr style="background-color: rgba(255, 255, 240, 1);"><td rowspan="2">INSTALL 40 ~ 60 INCH</td><td>STANDAR (TABLE)</td><td>-</td><td>-</td><td>75,000</td><td>-</td></tr>
                                    <tr style="background-color: rgba(255, 255, 240, 1);"><td>WALL BRACKET</td><td>-</td><td>-</td><td>150,000</td><td>-</td></tr>
                                    <tr style="background-color: rgba(255, 255, 240, 1);"><td rowspan="2">INSTALL DIATAS 60 INCH</td><td>STANDAR (TABLE)</td><td>-</td><td>-</td><td>139,000</td><td>-</td></tr>
                                    <tr style="background-color: rgba(255, 255, 240, 1);"><td>WALL BRACKET</td><td>-</td><td>-</td><td>214,000</td><td>-</td></tr>
                                    <tr><td rowspan="2">LCD Monitor</td><td>LCD MONITOR</td><td>REPARASI</td><td>135,000</td><td>81,000</td><td>175,000</td><td>190,000</td></tr>
                                    <tr><td>IDP/IWB (LEBIH DARI 46 INCH)</td><td>REPARASI</td><td>353,000</td><td>212,000</td><td>373,000</td><td>388,000</td></tr>
                                    <tr><td colspan="2">VCR / TV-VCR</td><td>REPARASI</td><td>94,000</td><td>57,000</td><td>-</td><td>-</td></tr>
                                    <tr><td colspan="2">PROJECTOR</td><td>REPARASI</td><td>265,000</td><td>159,000</td><td>-</td><td>-</td></tr>
                                    <tr><td colspan="2">VIDEO CD</td><td>REPARASI</td><td>100,000</td><td>60,000</td><td>-</td><td>-</td></tr>
                                    <tr><td colspan="2">LASER DISK / DVD</td><td>REPARASI</td><td>130,000</td><td>78,000</td><td>-</td><td>-</td></tr>
                                    <tr><td colspan="2">BLU-RAY PLAYER</td><td>REPARASI</td><td>118,000</td><td>71,000</td><td>-</td><td>-</td></tr>
                                    <tr><td colspan="2">CAMERA / VIEW CAM</td><td>REPARASI</td><td>200,000</td><td>120,000</td><td>-</td><td>-</td></tr>
                                    <tr><td colspan="2">COMPUTER / NOTEBOOK</td><td>REPARASI</td><td>158,000</td><td>95,000</td><td>-</td><td>-</td></tr>
                                    <tr><td colspan="2">ORGANIZER</td><td>REPARASI</td><td>65,000</td><td>39,000</td><td>-</td><td>-</td></tr>
                                    <tr><td colspan="2">CALCULATOR</td><td>REPARASI</td><td>41,000</td><td>25,000</td><td>-</td><td>-</td></tr>
                                    <tr><td colspan="2">AIR COOLER</td><td>REPARASI</td><td>118,000</td><td>71,000</td><td>158,000</td><td>167,000</td></tr>
                                    <tr><td colspan="2" rowspan="2">AIR PURIFIER</td><td>REPARASI</td><td>118,000</td><td>71,000</td><td>158,000</td><td>167,000</td></tr>
                                    <tr style="background-color: rgba(255, 255, 240, 1);"><td>CLEANING</td><td>100,000</td><td>-</td><td>100,000</td><td>100,000</td></tr>
                                    <tr><td rowspan="2">FACSIMILE</td><td>COMMON FACS</td><td>REPARASI</td><td>111,000</td><td>67,000</td><td>-</td><td>-</td></tr>
                                    <tr><td>LASER FACS</td><td>REPARASI</td><td>135,000</td><td>81,000</td><td>-</td><td>-</td></tr>
                                    <tr><td rowspan="4">AUDIO</td><td>DENGAN CD</td><td>REPARASI</td><td>111,000</td><td>67,000</td><td>-</td><td>-</td></tr>
                                    <tr><td>TANPA CD</td><td>REPARASI</td><td>76,000</td><td>46,000</td><td>-</td><td>-</td></tr>
                                    <tr><td>ACTIVE SPEAKER<sup><code>*1</code></sup></td><td>REPARASI</td><td>76,000</td><td>46,000</td><td>116,000</td><td>131,000</td></tr>
                                    <tr><td>HOME THEATER<sup><code>*2</code></sup>, MD PLAYER, I POD</td><td>REPARASI</td><td>158,000</td><td>95,000</td><td>198,000</td><td>213,000</td></tr>
                                    <tr><td rowspan="7">LEMARI ES</td><td rowspan="2">DIRECT COOLING</td><td>DENGAN ISI GAS (JASA)</td><td>158,000</td><td>102,000</td><td>198,000</td><td>213,000</td></tr>
                                    <tr style="background-color: rgba(255, 255, 240, 1);"><td>CLEANING<sup><code>*3</code></sup></td><td>-</td><td>-</td><td>100,000</td><td>-</td></tr>
                                    <tr><td rowspan="2">NO FROST/FREEZER/SHOWCASE (~500 LITER)</td><td>DENGAN ISI GAS (JASA)</td><td>170,000</td><td>109,000</td><td>210,000</td><td>225,000</td></tr>
                                    <tr style="background-color: rgba(255, 255, 240, 1);"><td>CLEANING<sup><code>*3</code></sup></td><td>-</td><td>-</td><td>125,000</td><td>-</td></tr>
                                    <tr><td rowspan="2">NO FROST/FREEZER/SHOWCAS E (>500 LITER)</td><td>DENGAN ISI GAS (JASA)</td><td>182,000</td><td>118,000</td><td>222,000</td><td>237,000</td></tr>
                                    <tr style="background-color: rgba(255, 255, 240, 1);"><td>CLEANING<sup><code>*3</code></sup></td><td>-</td><td>-</td><td>150,000</td><td>-</td></tr>
                                    <tr><td>INSTALASI</td><td></td><td>129,000</td><td>77,000</td><td>169,000</td><td>184,000</td></tr>
                                    <tr><td rowspan="8">MESIN CUCI</td><td rowspan="2">SEMI AUTOMATIC (2-TUB)</td><td>REPARASI</td><td>118,000</td><td>71,000</td><td>158,000</td><td>173,000</td></tr>
                                    <tr style="background-color: rgba(255, 255, 240, 1);"><td>CLEANING</td><td>-</td><td>-</td><td>175,000</td><td>-</td></tr>
                                    <tr><td rowspan="3">AUTOMATIC TOP LOADING</td><td>REPARASI</td><td>147,000</td><td>88,000</td><td>187,000</td><td>202,000</td></tr>
                                    <tr style="background-color: rgba(255, 255, 240, 1);"><td>DEMO INSTALL</td><td>-</td><td>-</td><td>81,000</td><td>-</td></tr>
                                    <tr style="background-color: rgba(255, 255, 240, 1);"><td>CLEANING</td><td>-</td><td>-</td><td>200,000</td><td>-</td></tr>
                                    <tr><td rowspan="3">FRONT LOADING</td><td>REPARASI</td><td>235,000</td><td>141,000</td><td>275,000</td><td>290,000</td></tr>
                                    <tr style="background-color: rgba(255, 255, 240, 1);"><td>DEMO INSTALL</td><td>-</td><td>-</td><td>118,000</td><td>-</td></tr>
                                    <tr style="background-color: rgba(255, 255, 240, 1);"><td>CLEANING</td><td>-</td><td>-</td><td>250,000</td><td>-</td></tr>
                                    <tr><td rowspan="15">AIR CONDITIONER</td><td>MAINTENANCE ~1.5 PK</td><td>CUCI STANDAR</td><td>-</td><td>-</td><td>135,000</td><td>-</td></tr>
                                    <tr><td>MAINTENANCE 2 PK KE ATAS</td><td>CUCI STANDAR</td><td>-</td><td>-</td><td>160,000</td><td>-</td></tr>
                                    <tr><td rowspan="2">SEMUA UKURAN TYPE SPLIT</td><td>CUCI SPECIAL (DG CHEMICAL)</td><td>-</td><td>-</td><td>300,000</td><td>-</td></tr>
                                    <tr><td>CUCI TURUN (BESAR)</td><td>-</td><td>-</td><td>600,000</td><td>-</td></tr>
                                    <tr><td>MAINTENANCE AC PORTABLE</td><td>CUCI STANDAR</td><td>-</td><td>-</td><td>183,000</td><td>-</td></tr>
                                    <tr><td>WINDOW</td><td>REPARASI</td><td>229,000</td><td>138,000</td><td>269,000</td><td>284,000</td></tr>
                                    <tr><td>SPLIT ~1.5 PK</td><td>REPARASI</td><td>229,500</td><td>138,000</td><td>269,000</td><td>284,000</td></tr>
                                    <tr><td>SPLIT 2 PK KE ATAS</td><td>REPARASI</td><td>259,000</td><td>155,000</td><td>299,000</td><td>314,000</td></tr>
                                    <tr><td>PORTABLE</td><td>REPARASI</td><td>235,000</td><td>141,000</td><td>275,000</td><td>290,000</td></tr>
                                    <tr><td>INVERTER ~1.5 PK</td><td>REPARASI</td><td>235,000</td><td>141,000</td><td>275,000</td><td>290,000</td></tr>
                                    <tr><td>INVERTER 2 PK KE ATAS</td><td>REPARASI</td><td>270,000</td><td>162,000</td><td>310,000</td><td>325,000</td></tr>
                                    <tr><td>CASSETTE/CEILING/STANDING FLOOR</td><td>REPARASI</td><td>471,000</td><td>283,000</td><td>511,000</td><td>526,000</td></tr>
                                    <tr><td>DUCTING TYPE</td><td>REPARASI</td><td>801,000</td><td>401,000</td><td>841,000</td><td>856,000</td></tr>
                                    <tr><td>INSTALL TYPE SPLIT 0.5 - 1 PK</td><td></td><td>-</td><td>-</td><td>350,000</td><td>-</td></tr>
                                    <tr><td>INSTALL TYPE SPLIT 1.5 - 2.5 PK</td><td></td><td>-</td><td>-</td><td>450,000</td><td>-</td></tr>
                                    <tr><td>ICE MAKER</td><td>DENGAN KOMPRESOR</td><td>DENGAN ISI GAS (JASA)</td><td>165,000</td><td>99,000</td><td>205,000</td><td>220,000</td></tr>
                                    <tr><td rowspan="2">DISPENSER</td><td rowspan="2">DENGAN KOMPRESOR</td><td>DENGAN ISI GAS (JASA)</td><td>165,000</td><td>99,000</td><td>205,000</td><td>220,000</td></tr>
                                    <tr style="background-color: rgba(255, 255, 240, 1);"><td>CLEANING</td><td>135,000</td><td>-</td><td>135,000</td><td>135,000</td></tr>
                                    <tr><td colspan="2">MICROWAVE OVEN</td><td>REPARASI</td><td>88,000</td><td>53,000</td><td>128,000</td><td>141,000</td></tr>
                                    <tr><td rowspan="9">ALAT-ALAT RUMAH TANGGA KECIL</td><td>KOMPOR GAS</td><td>REPARASI</td><td>65,000</td><td>65,000</td><td>-</td><td>-</td></tr>
                                    <tr><td>ELECTRIC OVEN/COFFEE MAKER/SANDWICH TOASTER</td><td>REPARASI</td><td>59,000</td><td>59,000</td><td>-</td><td>-</td></tr>
                                    <tr><td>BLENDER/JUICER/MIXER/DISPENSER MEJA</td><td>REPARASI</td><td>59,000</td><td>59,000</td><td>-</td><td>-</td></tr>
                                    <tr><td>RICE COOKER/ELECTRIC OVEN</td><td>REPARASI</td><td>59,000</td><td>59,000</td><td>-</td><td>-</td></tr>
                                    <tr><td>WATER PURIFIER</td><td>REPARASI</td><td>65,000</td><td>65,000</td><td>-</td><td>-</td></tr>
                                    <tr><td>ION GENERATOR CAR/HELMET PURIFIER</td><td>REPARASI</td><td>65,000</td><td>65,000</td><td>-</td><td>-</td></tr>
                                    <tr><td>WATER HEATER</td><td>REPARASI</td><td>76,500</td><td>76,000</td><td>116,000</td><td>-</td></tr>
                                    <tr><td>HAIR DRYER</td><td>REPARASI</td><td>65,000</td><td>65,000</td><td>-</td><td>-</td></tr>
                                    <tr><td>ELECTRIC FAN</td><td>REPARASI</td><td>41,000</td><td>41,000</td><td>-</td><td>-</td></tr>
                                    <tr><td rowspan="2">VACUUM CLEANER</td><td rowspan="2">SEMUA MODEL</td><td>MANUAL</td><td>59,000</td><td>59,000</td><td>-</td><td>-</td></tr>
                                    <tr><td>OTOMATIS</td><td>141,000</td><td>85,000</td><td>-</td><td>-</td></tr>
                                    <tr><td rowspan="3">MOBILE PHONE</td><td rowspan="3">SEMUA MODEL</td><td>REPARASI</td><td>235,000</td><td>139,000</td><td>-</td><td>-</td></tr>
                                    <tr><td>UPDATE SOFTWARE, MECHANIC</td><td>107,000</td><td>54,000</td><td>-</td><td>-</td></tr>
                                    <tr><td>ACCESSORIS</td><td>41,000</td><td>-</td><td>-</td><td>-</td></tr>
                                    <tr><td colspan="2">WIRELESS / TELEPHONE</td><td>REPARASI</td><td>103,800</td><td>62,000</td><td>-</td><td>-</td></tr>
                                    <tr><td colspan="2">PHOTOVOLTAIC</td><td>REPARASI</td><td>130,000</td><td>78,000</td><td>170,000</td><td>185,000</td></tr>
                                    <tr><td rowspan="3">WATER PUMP</td><td>WATER PUMP</td><td>REPARASI</td><td>47,000</td><td>47,000</td><td>87,000</td><td>102,000</td></tr>
                                    <tr><td>JET PUMP</td><td>REPARASI</td><td>94,000</td><td>57,000</td><td>130,000</td><td>145,000</td></tr>
                                    <tr><td>SELAM/SUBMERSIBLE</td><td>REPARASI</td><td>141,000</td><td>85,000</td><td>181,000</td><td>196,000</td></tr>
                                </tbody>
                            </table>
                            <div class="bg-light mt-2 px-3 py-2 rounded h6">
                                <code>
                                    <p><strong>Catatan:</strong></p>
                                    <p>*1 : Beberapa model speaker aktif bisa Z2</p>
                                    <p>*2 : Beberapa home theater bisa Z2</p>
                                    <p>*3 : Cleaning hanya berlaku untuk lemari es saja (freezer/showcase tidak termasuk)</p>
                                </code>
                            </div>
                            d
                            <br>
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
    </section>
</div>