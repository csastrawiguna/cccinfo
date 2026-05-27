<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
        <?php 
            $adminaccess = ['1', '9'];
        ?>

        <div class="container-fluid pt-3">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <span class="h6 text-primary">Hitung Biaya Isi Freon AC</span>
                    <?php if(in_array($this->session->userdata('useraccess'), $adminaccess)) : ?>
                        <div class="card-tools">
                            <div class="btn-group mr-3">
                                <a type="button" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-bars"></i> Kelola data</a>
                                <div class="dropdown-menu right">
                                    <a class="dropdown-item" href="<?= base_url('cost/freonacaddmodel') ?>"><i class="fas fa-plus-circle"></i> Tambah model</a>
                                    <a class="dropdown-item" href="<?= base_url('cost/freonacamanage') ?>"><i class="fas fa-edit"></i> Edit/update</a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col" style="max-width: 40vw; min-width: 480px;">
                            <table id="" class="table table-sm table-borderless">
                                <tr>
                                    <td>Model AC (harus diinput lengkap)</td>
                                    <td><input type="" class="form-control row" name="modelAC" id="modelAC"></td>
                                </tr>
                                <tr>
                                    <td>Type/jenis AC</td>
                                    <td><input type="" class="form-control row" name="typeAC" id="typeAC" readonly=""></td>
                                </tr>
                                <tr>
                                    <td>Kapasitas (PK)</td>
                                    <td><input type="" class="form-control row" name="capacityAC"  id="capacityAC" readonly=""></td>
                                </tr>
                                <tr>
                                    <td>Jenis refrigerant</td>
                                    <td><input type="" class="form-control row" name="refrigerantAC" id="refrigerantAC" readonly=""></td>
                                </tr>
                                <tr>
                                    <td>Minimal refrigerant (gram)</td>
                                    <td><input type="" class="form-control row" name="maxVolumeReff" id="maxVolumeReff" readonly=""></td>
                                </tr>
                                <tr>
                                    <td>Harga refrigerant per gram (Rp)</td>
                                    <td><input type="" class="form-control row" name="pricePerGram" id="pricePerGram" readonly=""></td>
                                </tr>
                                <tr>
                                    <td>Jasa perbaikan termasuk transport <span class="text-danger">(dalam kota)</span></td>
                                    <td><input type="" class="form-control row" name="serviceFee" id="serviceFee" readonly=""></td>
                                </tr>
                                <tr>
                                    <td>Minimal harga refrigerant (Rp)</td>
                                    <td><input type="" class="form-control row" name="maxRefrigerantPrice" id="maxRefrigerantPrice" readonly=""></td>
                                </tr>
                                <tr>
                                    <td>Harga spare part 1</td>
                                    <td><input type="" class="form-control row" name="hargaPart1" id="hargaPart1" value="0"></td>
                                </tr>
                                <tr>
                                    <td>Harga spare part 2</td>
                                    <td><input type="" class="form-control row" name="hargaPart2" id="hargaPart2" value="0"></td>
                                </tr>
                                <tr>
                                    <td>Harga spare part 3</td>
                                    <td><input type="" class="form-control row" name="hargaPart3" id="hargaPart3" value="0"></td>
                                </tr>
                                <tr>
                                    <td>Biaya total</td>
                                    <td><input type="" class="form-control row" name="totalCost" id="totalCost" readonly=""  class="font-weight-bold"></td>
                                </tr>
                            </table>
                        </div>
                        <div id="" class="col pb-3"><br>
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
                            <button type="button" id="tombolHitung" class="btn btn-outline-info">Hitung biaya servis</button>
                            <button type="reset" id="tombolReset" class="btn btn-outline-info">Reset/Refresh</button>
                            <br><br>
                            <!-- <button id="tombolSembunyiHIlang" class="btn btn-outline-info">Lihat/tutup tabel spec AC</button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>                              
    </section>
</div>
