<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>

        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h6 class="h5 text-primary">Hitung Biaya Isi Freon AC</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <table id="tabelOutput1">
                                        <tr>
                                            <td>Model AC (harus diinput lengkap)</td>
                                            <td><input type="" name="model"></td>
                                        </tr>
                                        <tr>
                                            <td>Type/jenis AC</td>
                                            <td id="type"><input type="" name="type" readonly=""></td>
                                        </tr>
                                        <tr>
                                            <td>Kapasitas (PK)</td>
                                            <td id="kapasitas"><input type="" name="kapasitas" readonly=""></td>
                                        </tr>
                                        <tr>
                                            <td>Jenis refrigerant</td>
                                            <td id="refrigerant"><input type="" name="refrigerant" readonly=""></td>
                                        </tr>
                                        <tr>
                                            <td>Maksimal refrigerant (gram)</td>
                                            <td id="maksVolume"><input type="" name="maksVolume" readonly=""></td>
                                        </tr>
                                        <tr>
                                            <td>Harga refrigerant per gram (Rp)</td>
                                            <td id="hargaPerGram"><input type="" name="hargaPerGram" readonly=""></td>
                                        </tr>
                                        <tr>
                                            <td>Jasa perbaikan termasuk transport <span class="text-danger">(dalam kota)</span></td>
                                            <td id="jasaPerbaikan"><input type="" name="jasaPerbaikan" readonly=""></td>
                                        </tr>
                                        <tr>
                                            <td>Maksimal harga refrigerant (Rp)</td>
                                            <td id="maksHarga"><input type="" name="maksHarga" readonly=""></td>
                                        </tr>
                                        <tr>
                                            <td>Harga spare part 1</td>
                                            <td><input type="" name="hargaPart1" value="0" oninput="hitungTotalBiaya()"></td>
                                        </tr>
                                        <tr>
                                            <td>Harga spare part 2</td>
                                            <td><input type="" name="hargaPart2" value="0" oninput="hitungTotalBiaya()"></td>
                                        </tr>
                                        <tr>
                                            <td>Harga spare part 3</td>
                                            <td><input type="" name="hargaPart3" value="0" oninput="hitungTotalBiaya()"></td>
                                        </tr>
                                        <tr>
                                            <td>Biaya total</td>
                                            <td id="biayaTotal"><input type="" name="biayaTotal" readonly=""  class="font-weight-bold"></td>
                                        </tr>
                                    </table>
                                </div>
                                <div id="info" class="col-5 pb-3">
                                    <br>
                                    <p class="text-info h5">Cara mengisi:</p>
                                    <ul>
                                        <li>Kode model AC harus diinput lengkap</li>
                                        <li>Jika saat klik tombol hitung tidak ada hasil, coba klik lagi atau <span class="text-info">Segarkan</span> dulu</li>
                                        <li>Jika hasil error <span class="text-danger">(NaN atau Undefined)</span>, klik tombol <span class="text-info">Segarkan</span></li>
                                        <li>Harga spare part 1 ~ 3 harus diisi atau dibiarkan <span class="text-info">0</span>, <span class="text-danger">jangan dihapus</span></li>
                                        <li>Harga total belum termasuk spare part</li>
                                        <li>Untuk mengecek detail, klik tombol <span class="text-info">Lihat/tutup tabel spec AC</span> untuk menampilkan/menyembunyikan tabel</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row mt-3">
                                    <div class="col">
                                        <button id="tombolHitung" class="btn btn-info">Hitung biaya servis</button>
                                        <button id="tombolReload" class="btn btn-outline-info">Reset Data</button>
                                        <button id="tombolReset" class="btn btn-outline-info">Segarkan</button>
                                        <br><br>
                                        <button id="tombolSembunyiHIlang" class="btn btn-outline-info">Lihat/tutup tabel spec AC</button>
                                    </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <div id="tabelSpecAC" class="container sembunyi"> 
                                        <table class="table table-sm table-bordered table-hover">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Model</th>
                                                    <th>Type</th>
                                                    <th>Kapasitas</th>
                                                    <th>Refrigerant</th>                    
                                                    <th>Maks.Refrigerant (gram)</th>
                                                    <th>Harga Refrigerant per gram </th>
                                                    <th>Maks.Harga Refrigerant</th>
                                                    <th>Jasa perbaikan (inc. transport)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr><td>AH-A12KCY</td><td>Split</td><td>1.5</td><td>R-22</td><td>630</td><td>220</td><td>138600</td><td>254500</td></tr>
                                                <tr><td>AH-A12KEY</td><td>Split</td><td>1.5</td><td>R-22</td><td>630</td><td>220</td><td>138600</td><td>254500</td></tr>
                                                <tr><td>AH-A12LEY</td><td>Split</td><td>1.5</td><td>R-22</td><td>630</td><td>220</td><td>138600</td><td>254500</td></tr>
                                                <tr><td>AH-A12MEY</td><td>Split</td><td>1.5</td><td>R-22</td><td>630</td><td>220</td><td>138600</td><td>254500</td></tr>
                                                <tr><td>AH-A12NCY</td><td>Split</td><td>1.5</td><td>R-22</td><td>630</td><td>220</td><td>138600</td><td>254500</td></tr>
                                                <tr><td>AH-A12PEY</td><td>Split</td><td>1.5</td><td>R-22</td><td>630</td><td>220</td><td>138600</td><td>254500</td></tr>
                                                <tr><td>AH-A12SAY</td><td>Split</td><td>1.5</td><td>R-32</td><td>890</td><td>330</td><td>293700</td><td>254500</td></tr>
                                                <tr><td>AH-A12SCY</td><td>Split</td><td>1.5</td><td>R-410</td><td>860</td><td>440</td><td>378400</td><td>254500</td></tr>
                                                <tr><td>AH-A12SEY</td><td>Split</td><td>1.5</td><td>R-32</td><td>890</td><td>330</td><td>293700</td><td>254500</td></tr>
                                                <tr><td>AH-A12UCY</td><td>Split</td><td>1.5</td><td>R-32</td><td>890</td><td>330</td><td>293700</td><td>254500</td></tr>
                                                <tr><td>AH-A12VEY</td><td>Split</td><td>1.5</td><td>R-32</td><td>890</td><td>330</td><td>293700</td><td>254500</td></tr>
                                                <tr><td>AH-A18KCY</td><td>Split</td><td>2</td><td>R-22</td><td>1430</td><td>220</td><td>314600</td><td>282000</td></tr>
                                                <tr><td>AH-A18KEY</td><td>Split</td><td>2</td><td>R-22</td><td>1430</td><td>220</td><td>314600</td><td>282000</td></tr>
                                                <tr><td>AH-A18MEY</td><td>Split</td><td>2</td><td>R-22</td><td>1430</td><td>220</td><td>314600</td><td>282000</td></tr>
                                                <tr><td>AH-A18NCY</td><td>Split</td><td>2</td><td>R-22</td><td>1430</td><td>220</td><td>314600</td><td>282000</td></tr>
                                                <tr><td>AH-A18SCY</td><td>Split</td><td>2</td><td>R-410</td><td>1050</td><td>440</td><td>462000</td><td>282000</td></tr>
                                                <tr><td>AH-A18SEY</td><td>Split</td><td>2</td><td>R-32</td><td>1610</td><td>330</td><td>531300</td><td>282000</td></tr>
                                                <tr><td>AH-A18UCY</td><td>Split</td><td>2</td><td>R-32</td><td>1610</td><td>330</td><td>531300</td><td>282000</td></tr>
                                                <tr><td>AH-A24KCY</td><td>Split</td><td>2.5</td><td>R-22</td><td>1430</td><td>220</td><td>314600</td><td>282000</td></tr>
                                                <tr><td>AH-A24MEY</td><td>Split</td><td>2.5</td><td>R-22</td><td>1430</td><td>220</td><td>314600</td><td>282000</td></tr>
                                                <tr><td>AH-A24NCY</td><td>Split</td><td>2.5</td><td>R-22</td><td>1430</td><td>220</td><td>314600</td><td>282000</td></tr>
                                                <tr><td>AH-A24SCY</td><td>Split</td><td>2.5</td><td>R-410</td><td>1050</td><td>440</td><td>462000</td><td>282000</td></tr>
                                                <tr><td>AH-A24SEY</td><td>Split</td><td>2.5</td><td>R-32</td><td>1610</td><td>330</td><td>531300</td><td>282000</td></tr>
                                                <tr><td>AH-A24UCY</td><td>Split</td><td>2.5</td><td>R-32</td><td>1610</td><td>330</td><td>531300</td><td>282000</td></tr>
                                                <tr><td>AH-A5HEY</td><td>Split</td><td>0.5</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-A5KCY</td><td>Split</td><td>0.5</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-A5KEY</td><td>Split</td><td>0.5</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-A5LCL</td><td>Split</td><td>0.5</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-A5LEY</td><td>Split</td><td>0.5</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-A5MEY</td><td>Split</td><td>0.5</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-A5NCY</td><td>Split</td><td>0.5</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-A5PEY</td><td>Split</td><td>0.5</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-A5PEY2</td><td>Split</td><td>0.5</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-A5SAY</td><td>Split</td><td>0.5</td><td>R-32</td><td>570</td><td>330</td><td>188100</td><td>254500</td></tr>
                                                <tr><td>AH-A5SCY</td><td>Split</td><td>0.5</td><td>R-410</td><td>650</td><td>440</td><td>286000</td><td>254500</td></tr>
                                                <tr><td>AH-A5SDL</td><td>Split</td><td>0.5</td><td>R-32</td><td>570</td><td>330</td><td>188100</td><td>254500</td></tr>
                                                <tr><td>AH-A5SEY</td><td>Split</td><td>0.5</td><td>R-32</td><td>570</td><td>330</td><td>188100</td><td>254500</td></tr>
                                                <tr><td>AH-A5TEY</td><td>Split</td><td>0.5</td><td>R-32</td><td>570</td><td>330</td><td>188100</td><td>254500</td></tr>
                                                <tr><td>AH-A5UCY</td><td>Split</td><td>0.5</td><td>R-32</td><td>570</td><td>330</td><td>188100</td><td>254500</td></tr>
                                                <tr><td>AH-A5UCYN</td><td>Split</td><td>0.5</td><td>R-32</td><td>570</td><td>330</td><td>188100</td><td>254500</td></tr>
                                                <tr><td>AH-A5UDL</td><td>Split</td><td>0.5</td><td>R-32</td><td>570</td><td>330</td><td>188100</td><td>254500</td></tr>
                                                <tr><td>AH-A5VEY</td><td>Split</td><td>0.5</td><td>R-32</td><td>570</td><td>330</td><td>188100</td><td>254500</td></tr>
                                                <tr><td>AH-A7HEY</td><td>Split</td><td>0.75</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-A7KCY</td><td>Split</td><td>0.75</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-A7KEY</td><td>Split</td><td>0.75</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-A7LCL</td><td>Split</td><td>0.75</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-A7LEY</td><td>Split</td><td>0.75</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-A7MEY</td><td>Split</td><td>0.75</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-A7NCY</td><td>Split</td><td>0.75</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-A7PEY</td><td>Split</td><td>0.75</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-A7PEY2</td><td>Split</td><td>0.75</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-A7SAY</td><td>Split</td><td>0.75</td><td>R-32</td><td>570</td><td>330</td><td>188100</td><td>254500</td></tr>
                                                <tr><td>AH-A7SCY</td><td>Split</td><td>0.75</td><td>R-410</td><td>650</td><td>440</td><td>286000</td><td>254500</td></tr>
                                                <tr><td>AH-A7SDL</td><td>Split</td><td>0.75</td><td>R-32</td><td>570</td><td>330</td><td>188100</td><td>254500</td></tr>
                                                <tr><td>AH-A7SEY</td><td>Split</td><td>0.75</td><td>R-32</td><td>570</td><td>330</td><td>188100</td><td>254500</td></tr>
                                                <tr><td>AH-A7TEY</td><td>Split</td><td>0.75</td><td>R-32</td><td>570</td><td>330</td><td>188100</td><td>254500</td></tr>
                                                <tr><td>AH-A7UCY</td><td>Split</td><td>0.75</td><td>R-32</td><td>570</td><td>330</td><td>188100</td><td>254500</td></tr>
                                                <tr><td>AH-A7UCYN</td><td>Split</td><td>0.75</td><td>R-32</td><td>570</td><td>330</td><td>188100</td><td>254500</td></tr>
                                                <tr><td>AH-A7UDL</td><td>Split</td><td>0.75</td><td>R-32</td><td>570</td><td>330</td><td>188100</td><td>254500</td></tr>
                                                <tr><td>AH-A7VEY</td><td>Split</td><td>0.75</td><td>R-32</td><td>570</td><td>330</td><td>188100</td><td>254500</td></tr>
                                                <tr><td>AH-A9HEY</td><td>Split</td><td>1</td><td>R-22</td><td>630</td><td>220</td><td>138600</td><td>254500</td></tr>
                                                <tr><td>AH-A9KCY</td><td>Split</td><td>1</td><td>R-22</td><td>630</td><td>220</td><td>138600</td><td>254500</td></tr>
                                                <tr><td>AH-A9KEY</td><td>Split</td><td>1</td><td>R-22</td><td>630</td><td>220</td><td>138600</td><td>254500</td></tr>
                                                <tr><td>AH-A9LCL</td><td>Split</td><td>1</td><td>R-22</td><td>630</td><td>220</td><td>138600</td><td>254500</td></tr>
                                                <tr><td>AH-A9LEY</td><td>Split</td><td>1</td><td>R-22</td><td>630</td><td>220</td><td>138600</td><td>254500</td></tr>
                                                <tr><td>AH-A9MEY</td><td>Split</td><td>1</td><td>R-22</td><td>630</td><td>220</td><td>138600</td><td>254500</td></tr>
                                                <tr><td>AH-A9NCY</td><td>Split</td><td>1</td><td>R-22</td><td>630</td><td>220</td><td>138600</td><td>254500</td></tr>
                                                <tr><td>AH-A9PEY</td><td>Split</td><td>1</td><td>R-22</td><td>630</td><td>220</td><td>138600</td><td>254500</td></tr>
                                                <tr><td>AH-A9PEY2</td><td>Split</td><td>1</td><td>R-22</td><td>630</td><td>220</td><td>138600</td><td>254500</td></tr>
                                                <tr><td>AH-A9SAY</td><td>Split</td><td>1</td><td>R-32</td><td>890</td><td>330</td><td>293700</td><td>254500</td></tr>
                                                <tr><td>AH-A9SCY</td><td>Split</td><td>1</td><td>R-410</td><td>860</td><td>440</td><td>378400</td><td>254500</td></tr>
                                                <tr><td>AH-A9SDL</td><td>Split</td><td>1</td><td>R-32</td><td>890</td><td>330</td><td>293700</td><td>254500</td></tr>
                                                <tr><td>AH-A9SEY</td><td>Split</td><td>1</td><td>R-32</td><td>890</td><td>330</td><td>293700</td><td>254500</td></tr>
                                                <tr><td>AH-A9SEY2</td><td>Split</td><td>1</td><td>R-32</td><td>890</td><td>330</td><td>293700</td><td>254500</td></tr>
                                                <tr><td>AH-A9TEY</td><td>Split</td><td>1</td><td>R-32</td><td>890</td><td>330</td><td>293700</td><td>254500</td></tr>
                                                <tr><td>AH-A9UCY</td><td>Split</td><td>1</td><td>R-32</td><td>890</td><td>330</td><td>293700</td><td>254500</td></tr>
                                                <tr><td>AH-A9UCYN</td><td>Split</td><td>1</td><td>R-32</td><td>890</td><td>330</td><td>293700</td><td>254500</td></tr>
                                                <tr><td>AH-A9UDL</td><td>Split</td><td>1</td><td>R-32</td><td>890</td><td>330</td><td>293700</td><td>254500</td></tr>
                                                <tr><td>AH-A9VEY</td><td>Split</td><td>1</td><td>R-32</td><td>890</td><td>330</td><td>293700</td><td>254500</td></tr>
                                                <tr><td>AH-AP12GMY</td><td>Split</td><td>1.5</td><td>R-22</td><td>630</td><td>220</td><td>138600</td><td>254500</td></tr>
                                                <tr><td>AH-AP12GSY</td><td>Split</td><td>1.5</td><td>R-22</td><td>630</td><td>220</td><td>138600</td><td>254500</td></tr>
                                                <tr><td>AH-AP12HHY</td><td>Split</td><td>1.5</td><td>R-22</td><td>630</td><td>220</td><td>138600</td><td>254500</td></tr>
                                                <tr><td>AH-AP12JHY</td><td>Split</td><td>1.5</td><td>R-22</td><td>630</td><td>220</td><td>138600</td><td>254500</td></tr>
                                                <tr><td>AH-AP12JMY</td><td>Split</td><td>1.5</td><td>R-22</td><td>630</td><td>220</td><td>138600</td><td>254500</td></tr>
                                                <tr><td>AH-AP12KHL</td><td>Split</td><td>1.5</td><td>R-22</td><td>630</td><td>220</td><td>138600</td><td>254500</td></tr>
                                                <tr><td>AH-AP12LSY</td><td>Split</td><td>1.5</td><td>R-22</td><td>630</td><td>220</td><td>138600</td><td>254500</td></tr>
                                                <tr><td>AH-AP12MHL</td><td>Split</td><td>1.5</td><td>R-22</td><td>630</td><td>220</td><td>138600</td><td>254500</td></tr>
                                                <tr><td>AH-AP12MSY</td><td>Split</td><td>1.5</td><td>R-22</td><td>630</td><td>220</td><td>138600</td><td>254500</td></tr>
                                                <tr><td>AH-AP12NHL</td><td>Split</td><td>1.5</td><td>R-22</td><td>630</td><td>220</td><td>138600</td><td>254500</td></tr>
                                                <tr><td>AH-AP12PSY</td><td>Split</td><td>1.5</td><td>R-22</td><td>630</td><td>220</td><td>138600</td><td>254500</td></tr>
                                                <tr><td>AH-AP12RHL</td><td>Split</td><td>1.5</td><td>R-22</td><td>630</td><td>220</td><td>138600</td><td>254500</td></tr>
                                                <tr><td>AH-AP12RSL</td><td>Split</td><td>1.5</td><td>R-22</td><td>630</td><td>220</td><td>138600</td><td>254500</td></tr>
                                                <tr><td>AH-AP12SHL</td><td>Split</td><td>1.5</td><td>R-32</td><td>890</td><td>330</td><td>293700</td><td>254500</td></tr>
                                                <tr><td>AH-AP12SSY</td><td>Split</td><td>1.5</td><td>R-32</td><td>890</td><td>330</td><td>293700</td><td>254500</td></tr>
                                                <tr><td>AH-AP12UHL</td><td>Split</td><td>1.5</td><td>R-32</td><td>890</td><td>330</td><td>293700</td><td>254500</td></tr>
                                                <tr><td>AH-AP18GMY</td><td>Split</td><td>2</td><td>R-22</td><td>1430</td><td>220</td><td>314600</td><td>282000</td></tr>
                                                <tr><td>AH-AP18JMY</td><td>Split</td><td>2</td><td>R-22</td><td>1430</td><td>220</td><td>314600</td><td>282000</td></tr>
                                                <tr><td>AH-AP18KHL</td><td>Split</td><td>2</td><td>R-22</td><td>1430</td><td>220</td><td>314600</td><td>282000</td></tr>
                                                <tr><td>AH-AP18MHL</td><td>Split</td><td>2</td><td>R-22</td><td>1430</td><td>220</td><td>314600</td><td>282000</td></tr>
                                                <tr><td>AH-AP18MSY</td><td>Split</td><td>2</td><td>R-22</td><td>1430</td><td>220</td><td>314600</td><td>282000</td></tr>
                                                <tr><td>AH-AP24GMY</td><td>Split</td><td>2.5</td><td>R-22</td><td>1430</td><td>220</td><td>314600</td><td>282000</td></tr>
                                                <tr><td>AH-AP24MSY</td><td>Split</td><td>2.5</td><td>R-22</td><td>1430</td><td>220</td><td>314600</td><td>282000</td></tr>
                                                <tr><td>AH-AP5GSY</td><td>Split</td><td>0.5</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-AP5HHL</td><td>Split</td><td>0.5</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-AP5HHY</td><td>Split</td><td>0.5</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-AP5JHL</td><td>Split</td><td>0.5</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-AP5JHY</td><td>Split</td><td>0.5</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-AP5JML</td><td>Split</td><td>0.5</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-AP5JMY</td><td>Split</td><td>0.5</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-AP5KHL</td><td>Split</td><td>0.5</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-AP5LSY</td><td>Split</td><td>0.5</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-AP5MHL</td><td>Split</td><td>0.5</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-AP5MSL</td><td>Split</td><td>0.5</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-AP5MSY</td><td>Split</td><td>0.5</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-AP5NHL</td><td>Split</td><td>0.5</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-AP5NSY</td><td>Split</td><td>0.5</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-AP5PSY</td><td>Split</td><td>0.5</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-AP5PSY2</td><td>Split</td><td>0.5</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-AP5RHL</td><td>Split</td><td>0.5</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-AP5RSL</td><td>Split</td><td>0.5</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-AP5SHL</td><td>Split</td><td>0.5</td><td>R-32</td><td>570</td><td>330</td><td>188100</td><td>254500</td></tr>
                                                <tr><td>AH-AP5SSY</td><td>Split</td><td>0.5</td><td>R-32</td><td>570</td><td>330</td><td>188100</td><td>254500</td></tr>
                                                <tr><td>AH-AP5UHL</td><td>Split</td><td>0.5</td><td>R-32</td><td>570</td><td>330</td><td>188100</td><td>254500</td></tr>
                                                <tr><td>AH-AP7GHY</td><td>Split</td><td>0.75</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-AP7GMY</td><td>Split</td><td>0.75</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-AP7GSY</td><td>Split</td><td>0.75</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-AP7HHY</td><td>Split</td><td>0.75</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-AP7JHL</td><td>Split</td><td>0.75</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-AP7JHY</td><td>Split</td><td>0.75</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-AP7JML</td><td>Split</td><td>0.75</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-AP7JMY</td><td>Split</td><td>0.75</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-AP7KHL</td><td>Split</td><td>0.75</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-AP7LSY</td><td>Split</td><td>0.75</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-AP7MHL</td><td>Split</td><td>0.75</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-AP7MSL</td><td>Split</td><td>0.75</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-AP7MSY</td><td>Split</td><td>0.75</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-AP7NHL</td><td>Split</td><td>0.75</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-AP7NSY</td><td>Split</td><td>0.75</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-AP7PSY</td><td>Split</td><td>0.75</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-AP7PSY2</td><td>Split</td><td>0.75</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-AP7RHL</td><td>Split</td><td>0.75</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-AP7RSL</td><td>Split</td><td>0.75</td><td>R-22</td><td>570</td><td>220</td><td>125400</td><td>254500</td></tr>
                                                <tr><td>AH-AP7SHL</td><td>Split</td><td>0.75</td><td>R-32</td><td>570</td><td>330</td><td>188100</td><td>254500</td></tr>
                                                <tr><td>AH-AP7SSY</td><td>Split</td><td>0.75</td><td>R-32</td><td>570</td><td>330</td><td>188100</td><td>254500</td></tr>
                                                <tr><td>AH-AP7UHL</td><td>Split</td><td>0.75</td><td>R-32</td><td>570</td><td>330</td><td>188100</td><td>254500</td></tr>
                                                <tr><td>AH-AP9GHY</td><td>Split</td><td>1</td><td>R-22</td><td>630</td><td>220</td><td>138600</td><td>254500</td></tr>
                                                <tr><td>AH-AP9GMY</td><td>Split</td><td>1</td><td>R-22</td><td>630</td><td>220</td><td>138600</td><td>254500</td></tr>
                                                <tr><td>AH-AP9GSY</td><td>Split</td><td>1</td><td>R-22</td><td>630</td><td>220</td><td>138600</td><td>254500</td></tr>
                                                <tr><td>AH-AP9HHY</td><td>Split</td><td>1</td><td>R-22</td><td>630</td><td>220</td><td>138600</td><td>254500</td></tr>
                                                <tr><td>AH-AP9JHL</td><td>Split</td><td>1</td><td>R-22</td><td>630</td><td>220</td><td>138600</td><td>254500</td></tr>
                                                <tr><td>AH-AP9JHY</td><td>Split</td><td>1</td><td>R-22</td><td>630</td><td>220</td><td>138600</td><td>254500</td></tr>
                                                <tr><td>AH-AP9JML</td><td>Split</td><td>1</td><td>R-22</td><td>630</td><td>220</td><td>138600</td><td>254500</td></tr>
                                                <tr><td>AH-AP9JMY</td><td>Split</td><td>1</td><td>R-22</td><td>630</td><td>220</td><td>138600</td><td>254500</td></tr>
                                                <tr><td>AH-AP9KHL</td><td>Split</td><td>1</td><td>R-22</td><td>630</td><td>220</td><td>138600</td><td>254500</td></tr>
                                                <tr><td>AH-AP9LSY</td><td>Split</td><td>1</td><td>R-22</td><td>630</td><td>220</td><td>138600</td><td>254500</td></tr>
                                                <tr><td>AH-AP9MHL</td><td>Split</td><td>1</td><td>R-22</td><td>630</td><td>220</td><td>138600</td><td>254500</td></tr>
                                                <tr><td>AH-AP9MSL</td><td>Split</td><td>1</td><td>R-22</td><td>630</td><td>220</td><td>138600</td><td>254500</td></tr>
                                                <tr><td>AH-AP9MSY</td><td>Split</td><td>1</td><td>R-22</td><td>630</td><td>220</td><td>138600</td><td>254500</td></tr>
                                                <tr><td>AH-AP9NHL</td><td>Split</td><td>1</td><td>R-22</td><td>630</td><td>220</td><td>138600</td><td>254500</td></tr>
                                                <tr><td>AH-AP9NSY</td><td>Split</td><td>1</td><td>R-22</td><td>630</td><td>220</td><td>138600</td><td>254500</td></tr>
                                                <tr><td>AH-AP9PSY</td><td>Split</td><td>1</td><td>R-22</td><td>630</td><td>220</td><td>138600</td><td>254500</td></tr>
                                                <tr><td>AH-AP9PSY2</td><td>Split</td><td>1</td><td>R-22</td><td>630</td><td>220</td><td>138600</td><td>254500</td></tr>
                                                <tr><td>AH-AP9RHL</td><td>Split</td><td>1</td><td>R-22</td><td>630</td><td>220</td><td>138600</td><td>254500</td></tr>
                                                <tr><td>AH-AP9RSL</td><td>Split</td><td>1</td><td>R-22</td><td>630</td><td>220</td><td>138600</td><td>254500</td></tr>
                                                <tr><td>AH-AP9SHL</td><td>Split</td><td>1</td><td>R-32</td><td>890</td><td>330</td><td>293700</td><td>254500</td></tr>
                                                <tr><td>AH-AP9SSY</td><td>Split</td><td>1</td><td>R-32</td><td>890</td><td>330</td><td>293700</td><td>254500</td></tr>
                                                <tr><td>AH-AP9SSY2</td><td>Split</td><td>1</td><td>R-32</td><td>890</td><td>330</td><td>293700</td><td>254500</td></tr>
                                                <tr><td>AH-AP9UHL</td><td>Split</td><td>1</td><td>R-32</td><td>890</td><td>330</td><td>293700</td><td>254500</td></tr>
                                                <tr><td>AH-X12LEY</td><td>Split</td><td>1.5</td><td>R-410 inverter</td><td>860</td><td>440</td><td>378400</td><td>260000</td></tr>
                                                <tr><td>AH-X12SEY</td><td>Inverter</td><td>1.5</td><td>R-410 inverter</td><td>860</td><td>440</td><td>378400</td><td>260000</td></tr>
                                                <tr><td>AH-X12UEY</td><td>Inverter</td><td>1.5</td><td>R-32 inverter</td><td>890</td><td>330</td><td>293700</td><td>260000</td></tr>
                                                <tr><td>AH-X12VEY</td><td>Inverter</td><td>1.5</td><td>R-32 inverter</td><td>890</td><td>330</td><td>293700</td><td>260000</td></tr>
                                                <tr><td>AH-X18MEY</td><td>Inverter</td><td>2</td><td>R-410 inverter</td><td>1050</td><td>440</td><td>462000</td><td>293000</td></tr>
                                                <tr><td>AH-X18SEY</td><td>Inverter</td><td>2</td><td>R-410 inverter</td><td>1050</td><td>440</td><td>462000</td><td>293000</td></tr>
                                                <tr><td>AH-X18UEY</td><td>Inverter</td><td>2</td><td>R-32 inverter</td><td>1610</td><td>330</td><td>531300</td><td>293000</td></tr>
                                                <tr><td>AH-X18VEY</td><td>Inverter</td><td>2</td><td>R-32 inverter</td><td>1610</td><td>330</td><td>531300</td><td>293000</td></tr>
                                                <tr><td>AH-X24MEY</td><td>Inverter</td><td>2.5</td><td>R-410 inverter</td><td>1050</td><td>440</td><td>462000</td><td>293000</td></tr>
                                                <tr><td>AH-X24SEY</td><td>Inverter</td><td>2.5</td><td>R-410 inverter</td><td>1050</td><td>440</td><td>462000</td><td>293000</td></tr>
                                                <tr><td>AH-X24UEY</td><td>Inverter</td><td>2.5</td><td>R-32 inverter</td><td>1610</td><td>330</td><td>531300</td><td>293000</td></tr>
                                                <tr><td>AH-X5MEY</td><td>Inverter</td><td>0.5</td><td>R-410 inverter</td><td>650</td><td>440</td><td>286000</td><td>260000</td></tr>
                                                <tr><td>AH-X9LEY</td><td>Split</td><td>1</td><td>R-410 inverter</td><td>860</td><td>440</td><td>378400</td><td>260000</td></tr>
                                                <tr><td>AH-X9MEY</td><td>Split</td><td>1</td><td>R-410 inverter</td><td>860</td><td>440</td><td>378400</td><td>260000</td></tr>
                                                <tr><td>AH-X9SEY</td><td>Inverter</td><td>1</td><td>R-410 inverter</td><td>860</td><td>440</td><td>378400</td><td>260000</td></tr>
                                                <tr><td>AH-X9UEY</td><td>Inverter</td><td>1</td><td>R-32 inverter</td><td>890</td><td>330</td><td>293700</td><td>260000</td></tr>
                                                <tr><td>AH-X9VEY</td><td>Inverter</td><td>1</td><td>R-32 inverter</td><td>890</td><td>330</td><td>293700</td><td>260000</td></tr>
                                                <tr><td>AH-XP10MRY</td><td>Inverter</td><td>1</td><td>R-410 inverter</td><td>860</td><td>440</td><td>378400</td><td>260000</td></tr>
                                                <tr><td>AH-XP10MY</td><td>Inverter</td><td>1</td><td>R-410 inverter</td><td>860</td><td>440</td><td>378400</td><td>260000</td></tr>
                                                <tr><td>AH-XP10NRY</td><td>Inverter</td><td>1</td><td>R-410 inverter</td><td>860</td><td>440</td><td>378400</td><td>260000</td></tr>
                                                <tr><td>AH-XP10SHY</td><td>Inverter</td><td>1</td><td>R-410 inverter</td><td>860</td><td>440</td><td>378400</td><td>260000</td></tr>
                                                <tr><td>AH-XP10UHY</td><td>Inverter</td><td>1</td><td>R-32 inverter</td><td>890</td><td>330</td><td>293700</td><td>260000</td></tr>
                                                <tr><td>AH-XP10VXY</td><td>Inverter</td><td>1</td><td>R-32 inverter</td><td>890</td><td>330</td><td>293700</td><td>260000</td></tr>
                                                <tr><td>AH-XP10WHY</td><td>Split</td><td>1</td><td>R-32 inverter</td><td>890</td><td>330</td><td>293700</td><td>260000</td></tr>
                                                <tr><td>AH-XP12MSY</td><td>Split</td><td>1.5</td><td>R-410 inverter</td><td>860</td><td>440</td><td>378400</td><td>260000</td></tr>
                                                <tr><td>AH-XP12NSY</td><td>Inverter</td><td>1.5</td><td>R-410 inverter</td><td>860</td><td>440</td><td>378400</td><td>260000</td></tr>
                                                <tr><td>AH-XP13MRY</td><td>Inverter</td><td>1.5</td><td>R-410 inverter</td><td>860</td><td>440</td><td>378400</td><td>260000</td></tr>
                                                <tr><td>AH-XP13MY</td><td>Inverter</td><td>1.5</td><td>R-410 inverter</td><td>860</td><td>440</td><td>378400</td><td>260000</td></tr>
                                                <tr><td>AH-XP13NRY</td><td>Inverter</td><td>1.5</td><td>R-410 inverter</td><td>860</td><td>440</td><td>378400</td><td>260000</td></tr>
                                                <tr><td>AH-XP13SHY</td><td>Inverter</td><td>1.5</td><td>R-410 inverter</td><td>860</td><td>440</td><td>378400</td><td>260000</td></tr>
                                                <tr><td>AH-XP13UHY</td><td>Inverter</td><td>1.5</td><td>R-32 inverter</td><td>890</td><td>330</td><td>293700</td><td>260000</td></tr>
                                                <tr><td>AH-XP13VXY</td><td>Inverter</td><td>1.5</td><td>R-32 inverter</td><td>890</td><td>330</td><td>293700</td><td>260000</td></tr>
                                                <tr><td>AH-XP13WHY</td><td>Split</td><td>1.5</td><td>R-32 inverter</td><td>890</td><td>330</td><td>293700</td><td>260000</td></tr>
                                                <tr><td>AH-XP18MY</td><td>Inverter</td><td>2</td><td>R-410 inverter</td><td>1050</td><td>440</td><td>462000</td><td>293000</td></tr>
                                                <tr><td>AH-XP18MY</td><td>Inverter</td><td>2</td><td>R-410 inverter</td><td>1050</td><td>440</td><td>462000</td><td>293000</td></tr>
                                                <tr><td>AH-XP24MY</td><td>Inverter</td><td>2.5</td><td>R-410 inverter</td><td>1050</td><td>440</td><td>462000</td><td>293000</td></tr>
                                                <tr><td>AH-XP24MY</td><td>Inverter</td><td>2.5</td><td>R-410 inverter</td><td>1050</td><td>440</td><td>462000</td><td>293000</td></tr>
                                                <tr><td>AH-XP5NSY</td><td>Inverter</td><td>0.5</td><td>R-410 inverter</td><td>650</td><td>440</td><td>286000</td><td>260000</td></tr>
                                                <tr><td>AH-XP6SHY</td><td>Inverter</td><td>0.5</td><td>R-410 inverter</td><td>650</td><td>440</td><td>286000</td><td>260000</td></tr>
                                                <tr><td>AH-XP6UHY</td><td>Inverter</td><td>0.5</td><td>R-32 inverter</td><td>570</td><td>330</td><td>188100</td><td>260000</td></tr>
                                                <tr><td>AH-XP6WHY</td><td>Split</td><td>0.5</td><td>R-32 inverter</td><td>570</td><td>330</td><td>188100</td><td>260000</td></tr>
                                                <tr><td>AH-XP9MSY</td><td>Split</td><td>1</td><td>R-410 inverter</td><td>860</td><td>440</td><td>378400</td><td>260000</td></tr>
                                                <tr><td>AH-XP9NSY</td><td>Inverter</td><td>1</td><td>R-410 inverter</td><td>860</td><td>440</td><td>378400</td><td>260000</td></tr>
                                                <tr><td>CV-P09GRV</td><td>Potable</td><td>1</td><td>R-410 inverter</td><td>860</td><td>440</td><td>378400</td><td>260000</td></tr>
                                                <tr><td>CV-P09GRV-B</td><td>Potable</td><td>1</td><td>R-410 inverter</td><td>860</td><td>440</td><td>378400</td><td>260000</td></tr>
                                                <tr><td>CV-P10TCY</td><td>Potable</td><td>1</td><td>R-410 portable</td><td>860</td><td>440</td><td>378400</td><td>260000</td></tr>
                                                <tr><td>GB-A18XEY</td><td>Duct-split</td><td>2</td><td>R-410 duct-split</td><td>1490</td><td>440</td><td>655600</td><td>810000</td></tr>
                                                <tr><td>GB-A24XEY</td><td>Duct-split</td><td>2.5</td><td>R-410 duct-split</td><td>2200</td><td>440</td><td>968000</td><td>810000</td></tr>
                                                <tr><td>GB-A36XEY</td><td>Duct-split</td><td>4</td><td>R-410 standing/cassette</td><td>2200</td><td>440</td><td>968000</td><td>480000</td></tr>
                                                <tr><td>GB-A42XEY</td><td>Duct-split</td><td>4.5</td><td>R-410 standing/cassette</td><td>4200</td><td>440</td><td>1848000</td><td>480000</td></tr>
                                                <tr><td>GB-A48XEY</td><td>Duct-split</td><td>5</td><td>R-410 standing/cassette</td><td>4200</td><td>440</td><td>1848000</td><td>480000</td></tr>
                                                <tr><td>GS-A18SCY</td><td>Standing</td><td>2</td><td>R-410 standing/cassette</td><td>1490</td><td>440</td><td>655600</td><td>480000</td></tr>
                                                <tr><td>GS-A24SCY</td><td>Standing</td><td>2.5</td><td>R-410 standing/cassette</td><td>2200</td><td>440</td><td>968000</td><td>480000</td></tr>
                                                <tr><td>GS-A48SCY</td><td>Standing</td><td>5</td><td>R-410 standing/cassette</td><td>4200</td><td>440</td><td>1848000</td><td>480000</td></tr>
                                                <tr><td>GX-A18TCY</td><td>Cassette</td><td>2</td><td>R-410 standing/cassette</td><td>1490</td><td>440</td><td>655600</td><td>480000</td></tr>
                                                <tr><td>GX-A18XEY</td><td>Cassette</td><td>2</td><td>R-410 standing/cassette</td><td>1490</td><td>440</td><td>655600</td><td>480000</td></tr>
                                                <tr><td>GX-A24TCY</td><td>Cassette</td><td>2.5</td><td>R-410 standing/cassette</td><td>2200</td><td>440</td><td>968000</td><td>480000</td></tr>
                                                <tr><td>GX-A24XEY</td><td>Cassette</td><td>2.5</td><td>R-410 standing/cassette</td><td>2200</td><td>440</td><td>968000</td><td>480000</td></tr>
                                                <tr><td>GX-A30TCY</td><td>Cassette</td><td>3</td><td>R-410 standing/cassette</td><td>2200</td><td>440</td><td>968000</td><td>480000</td></tr>
                                                <tr><td>GX-A36TCY</td><td>Cassette</td><td>4</td><td>R-410 standing/cassette</td><td>2200</td><td>440</td><td>968000</td><td>480000</td></tr>
                                                <tr><td>GX-A36XEY</td><td>Cassette</td><td>4</td><td>R-410 standing/cassette</td><td>2200</td><td>440</td><td>968000</td><td>480000</td></tr>
                                                <tr><td>GX-A42TCY</td><td>Cassette</td><td>4.5</td><td>R-410 standing/cassette</td><td>4200</td><td>440</td><td>1848000</td><td>480000</td></tr>
                                                <tr><td>GX-A48XEY</td><td>Cassette</td><td>5</td><td>R-410 standing/cassette</td><td>4200</td><td>440</td><td>1848000</td><td>480000</td></tr>
                                                <tr><td>AH-X5LEY</td><td>Inverter</td><td>0.5</td><td>R-410 inverter</td><td>650</td><td>440</td><td>286000</td><td>260000</td></tr>
                                                <tr><td>AH-X6VEY</td><td>Inverter</td><td>0.5</td><td>R-32 inverter</td><td>570</td><td>330</td><td>188100</td><td>260000</td></tr>
                                            </tbody>
                                        </table>
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