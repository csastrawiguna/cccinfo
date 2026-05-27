<div class="content-wrapper">
    <div class="container-fluid pt-2">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
        
        <div class="card card-info card-outline">
            <div class="card-header">
                <p class="h6 text-info">Ancer-ancer Service Center</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-2" style="max-width: 160px;">
                        <div class="nav flex-column nav-tabs" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-pulogadung-tab" data-toggle="pill" href="#v-pills-pulogadung" role="tab" aria-controls="v-pills-pulogadung" aria-selected="true">Pulogadung</a>
                            <a class="nav-link" id="v-pills-cideng-tab" data-toggle="pill" href="#v-pills-cideng" role="tab" aria-controls="v-pills-cideng" aria-selected="false">Cideng</a>
                            <a class="nav-link" id="v-pills-jaksel-tab" data-toggle="pill" href="#v-pills-jaksel" role="tab" aria-controls="v-pills-jaksel" aria-selected="false">Jaksel</a>
                            <a class="nav-link" id="v-pills-bekasi-tab" data-toggle="pill" href="#v-pills-bekasi" role="tab" aria-controls="v-pills-bekasi" aria-selected="false">SDSS Bekasi</a>
                            <a class="nav-link" id="v-pills-tangerang-tab" data-toggle="pill" href="#v-pills-tangerang" role="tab" aria-controls="v-pills-tangerang" aria-selected="false">SDSS Tangerang</a>
                            <a class="nav-link" id="v-pills-serpong-tab" data-toggle="pill" href="#v-pills-serpong" role="tab" aria-controls="v-pills-serpong" aria-selected="false">SDSS Serpong</a>
                        </div>
                    </div>
                    <div class="col-10 pl-4">
                        <div class="tab-content" id="v-pills-tabContent" class="">
                            <div class="tab-pane fade show active" id="v-pills-pulogadung" role="tabpanel" aria-labelledby="v-pills-pulogadung-tab">
                                <p class="h5 text-info">Pulogadung</p>
                                <table class="table table-sm">
                                    <tbody>
                                        <tr>
                                            <td>Dari arah Sunter, Kemayoran, Klp.Gading</td>
                                            <td>
                                                <ul>
                                                    <li>Menuju PTC (Pulogadung Trade Center), lurus terus Jalan Raya Bekasi</li>
                                                    <li>Di lampu merah ke-2 setelah PTC belok kanan ke arah Kalimalang/Buaran.</li>
                                                    <li>Setelah Pool Damri ada jembatan belok kiri, ikuti jalan</li>
                                                </ul>            
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Dari arah Kalimalang</td>
                                            <td>
                                                <ul>
                                                    <li>Menuju arah Buaran <span style="font-style: oblique;">(bisa lewat Jalan Radin Inten)</span></li>
                                                    <li>Setelah Buaran, lurus terus masuk jalan KRT Radjiman.</li>
                                                    <li>Setelah PT.Yamaha (YIMM) Cakung, lurus hingga sebelum jembatan/Pool Damri belok kanan, ikuti jalan</li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Dari arah Bekasi, Plumpang, Semper</td>
                                            <td>
                                                <ul>
                                                    <li>Menuju arah Pasar Cakung atau United Tractor (UT), lurus terus arah PTC</li>
                                                    <li>Setelah Cakung Bizpark Comercial Estate belok kiri arah Kalimang/Buaran</li>
                                                    <li>Setelah Pool Damri ada jembatan belok kiri, ikuti jalan</li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                    <!-- Summary by Category Tab -->
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-one-pulogadung1-tab" data-toggle="pill" href="#custom-tabs-one-pulogadung1" role="tab" aria-controls="custom-tabs-one-pulogadung1" aria-selected="false">Jakpus, Klp.Gading</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-pulogadung2-tab" data-toggle="pill" href="#custom-tabs-one-pulogadung2" role="tab" aria-controls="custom-tabs-one-pulogadung2" aria-selected="true">Kalimalang</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-pulogadung3-tab" data-toggle="pill" href="#custom-tabs-one-pulogadung3" role="tab" aria-controls="custom-tabs-one-pulogadung3" aria-selected="false">Dari Bekasi 1</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-pulogadung4-tab" data-toggle="pill" href="#custom-tabs-one-pulogadung4" role="tab" aria-controls="custom-tabs-one-pulogadung4" aria-selected="true">Dari Bekasi 2</a>
                                    </li>
                                </ul>

                                <div class="tab-content mt-2" id="custom-tabs-one-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-one-pulogadung1" role="tabpanel" aria-labelledby="custom-tabs-one-pulogadung1-tab">
                                        <img src="<?= base_url('assets/img/ancer/Pulogadung1.gif') ?>" class="img-fluid">
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-pulogadung2" role="tabpanel" aria-labelledby="custom-tabs-one-pulogadung2-tab">
                                        <img src="<?= base_url('assets/img/ancer/Pulogadung2.gif') ?>" class="img-fluid">
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-pulogadung3" role="tabpanel" aria-labelledby="custom-tabs-one-pulogadung3-tab">
                                        <img src="<?= base_url('assets/img/ancer/Pulogadung3.gif') ?>" class="img-fluid">
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-pulogadung4" role="tabpanel" aria-labelledby="custom-tabs-one-pulogadung4-tab">
                                        <img src="<?= base_url('assets/img/ancer/Pulogadung4.gif') ?>" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-cideng" role="tabpanel" aria-labelledby="v-pills-cideng-tab">
                                <p class="h5 text-info">Pulogadung</p>
                                <table class="table table-sm">
                                    <tbody>
                                        <tr>
                                            <td>Dari arah Tanah Abang</td>
                                            <td>
                                                <ul>
                                                    <li>Lewat Jalan KH.Mas Mansyur, setelah Pasar Tanah Abang Blok E masuk Jalan Cideng Barat</li>
                                                    <li>Setelah Maxx Coffee, belok kiri ke Jalan Tanah Abang 2, lurus sekitar 200 meter</li>
                                                    <li>Belok kanan masuk Jalan Musi, lurus sekitar 350 meter. Lokasi Service Center ada di sebelah kanan jalan</li>
                                                </ul>            
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Lewat Jalan Raya Tomang</td>
                                            <td>
                                                <ul>
                                                    <li>Naik flyover Tomang Raya (menyeberang Kali Ciliwung), lurus terus hingga Jalan Kyai Caringin</li>
                                                    <li>Putar balik di Jalan Cideng Timur (Wisma Abadi), lurus sekitar 280 meter</li>
                                                    <li>Belok kiri ke Jalan Musi (sebelum Hotel Royal City / Taman Tomang), lurus sekitar 170 meter, Service ada di sebelah kiri</li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Dari Roxy lewat Jl.KH.Hasyim Asyari</td>
                                            <td>
                                                <ul>
                                                    <li>Lurus terus hingga Jalan Cideng Barat (arah Utara), belok kiri lurus sekitar 200 meter</li>
                                                    <li>Putar balik masuk ke Jalan Cideng Timur (arah Selatan), lurus sekitar 650 meter</li>
                                                    <li>Sebelum Fave Hotel, putar balik masuk Jalan Cideng Barat (arah Utara)</li>
                                                    <li>Lurus sekitar 150 meter, belok kiri ke arah Jalan Siantar, lurus sekitar 230 meter</li>
                                                    <li>Belok kiri ke Jalan Musi, lurus sekitar 50 meter, service center ada di sebelah kiri</li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Dari arah Senen</td>
                                            <td>
                                                <ul>
                                                    <li>Lewat Jalan Medan Merdeka Selatan, belok kiri ke Jalan Tanah Abang 2, lurus sekitar 200 meter.<br>Belok kanan masuk Jalan Musi, lurus sekitar 350 meter. Lokasi Service Center ada di sebelah kanan jalan</li>
                                                    <li>Lewat Jalan Medan Merdeka Utara - terus Jalan Majapahit, belok kiri ke Jalan Suryopranoto, lurus sampai Jalan Kyai Caringin.<br>Belok kiri ke Jalan Musi (sebelum Hotel Royal City / Taman Tomang), lurus sekitar 170 meter, Service ada di sebelah kiri</li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Dari arah Harmoni</td>
                                            <td>
                                                <ul>
                                                    <li>Menuju arah RSUD Tarakan (Jalan Tomang Raya)</li>
                                                    <li>Sebelum Taman Tomang, belok kiri ke arah Jalan Biak/Jalan Musi, lurus sekitar 200 meter/li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                    <!-- Summary by Category Tab -->
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-one-cideng1-tab" data-toggle="pill" href="#custom-tabs-one-cideng1" role="tab" aria-controls="custom-tabs-one-cideng1" aria-selected="false">Dari Tanah Abang</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-cideng2-tab" data-toggle="pill" href="#custom-tabs-one-cideng2" role="tab" aria-controls="custom-tabs-one-cideng2" aria-selected="true">Flyover Tomang</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-cideng3-tab" data-toggle="pill" href="#custom-tabs-one-cideng3" role="tab" aria-controls="custom-tabs-one-cideng3" aria-selected="false">KH.Hasyim Asyari</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-cideng4-tab" data-toggle="pill" href="#custom-tabs-one-cideng4" role="tab" aria-controls="custom-tabs-one-cideng4" aria-selected="true">Dari Senen</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-cideng5-tab" data-toggle="pill" href="#custom-tabs-one-cideng5" role="tab" aria-controls="custom-tabs-one-cideng5" aria-selected="false">Dari Harmoni</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-cideng6-tab" data-toggle="pill" href="#custom-tabs-one-cideng6" role="tab" aria-controls="custom-tabs-one-cideng6" aria-selected="true">Tampak Depan</a>
                                    </li>
                                </ul>

                                <div class="tab-content mt-2" id="custom-tabs-one-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-one-cideng1" role="tabpanel" aria-labelledby="custom-tabs-one-cideng1-tab">
                                        <img src="<?= base_url('assets/img/ancer/Cideng1.gif') ?>" class="img-fluid">
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-cideng2" role="tabpanel" aria-labelledby="custom-tabs-one-cideng2-tab">
                                        <img src="<?= base_url('assets/img/ancer/Cideng2.gif') ?>" class="img-fluid">
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-cideng3" role="tabpanel" aria-labelledby="custom-tabs-one-cideng3-tab">
                                        <img src="<?= base_url('assets/img/ancer/Cideng3.gif') ?>" class="img-fluid">
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-cideng4" role="tabpanel" aria-labelledby="custom-tabs-one-cideng4-tab">
                                        <img src="<?= base_url('assets/img/ancer/Cideng4.gif') ?>" class="img-fluid">
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-cideng5" role="tabpanel" aria-labelledby="custom-tabs-one-cideng5-tab">
                                        <img src="<?= base_url('assets/img/ancer/Cideng5.gif') ?>" class="img-fluid">
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-cideng6" role="tabpanel" aria-labelledby="custom-tabs-one-cideng6-tab">
                                        <img src="<?= base_url('assets/img/ancer/Cideng6.gif') ?>" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-jaksel" role="tabpanel" aria-labelledby="v-pills-jaksel-tab">
                                <p class="h5 text-info">Jaksel (Pondok Pinang)</p>
                                <table class="table table-sm">
                                    <tbody>
                                        <tr>
                                            <td>Dari arah Fedex (Selatan)</td>
                                            <td>
                                                <ul>
                                                    <li>Lurus Jalan Raya Ciputat (arah utara) sekitar 1 kilometer melewati KPP Pratama Jakarta Pesanggarhan & Kantor Imigrasi Unit Layanan Paspor.</li>
                                                    <li>Lokasi service center ada di sebelah kanan, deretan sebelum Honda Mobil Pondok Pinang & Indomaret. Lokasi service center di seberang Jalan Tanah Ara</li>
                                                    <li span style="font-style: oblique;">putar balik setelah Honda Mobil</li>
                                                </ul>            
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Dari arah Kebayoran Lama (Utara)</td>
                                            <td>
                                                <ul>
                                                    <li>Lurus Jalan Raya Ciputat (arah Selatan) melewati Masjid Ni'matul Ittihad.</li>
                                                    <li>Lokasi service center setelah Honda Mobil Pondok Pinang & Indomaret</li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                    <!-- Summary by Category Tab -->
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-one-jaksel1-tab" data-toggle="pill" href="#custom-tabs-one-jaksel1" role="tab" aria-controls="custom-tabs-one-jaksel1" aria-selected="false">Fedex (Selatan)</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-jaksel2-tab" data-toggle="pill" href="#custom-tabs-one-jaksel2" role="tab" aria-controls="custom-tabs-one-jaksel2" aria-selected="true">Kebayoran Lama (Utara)</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-jaksel3-tab" data-toggle="pill" href="#custom-tabs-one-jaksel3" role="tab" aria-controls="custom-tabs-one-jaksel3" aria-selected="false">Tampak Depan</a>
                                    </li>                                        
                                </ul>

                                <div class="tab-content mt-2" id="custom-tabs-one-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-one-jaksel1" role="tabpanel" aria-labelledby="custom-tabs-one-jaksel1-tab">
                                        <img src="<?= base_url('assets/img/ancer/Jaksel1.gif') ?>" class="img-fluid">
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-jaksel2" role="tabpanel" aria-labelledby="custom-tabs-one-jaksel2-tab">
                                        <img src="<?= base_url('assets/img/ancer/Jaksel2.gif') ?>" class="img-fluid">
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-jaksel3" role="tabpanel" aria-labelledby="custom-tabs-one-jaksel3-tab">
                                        <img src="<?= base_url('assets/img/ancer/Jaksel3.gif') ?>" class="img-fluid">
                                    </div>                                        
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-bekasi" role="tabpanel" aria-labelledby="v-pills-bekasi-tab">
                                <p class="h5 text-info">SDSS Bekasi</p>
                                <table class="table table-sm">
                                    <tbody>
                                        <tr>
                                            <td>Dari arah Blu Plaza</td>
                                            <td>
                                                <ul>
                                                    <li>Lurus terus ke arah Perempatan/sebelum Pintu Tol Bekasi Timur</li>
                                                    <li>Posisi Ruko Blok B no.28 ada dekat Tugu Patriot/Tugu Bambu</li>
                                                </ul>            
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Dari arah Tambun (Jalan Kalimalang)</td>
                                            <td>
                                                <ul>
                                                    <li>Ke arah Barat menuju Perempatan/sebelum Pintu Tol Bekasi Timur</li>
                                                    <li>Posisi service center sebelah kanan dekat Tugu Patriot/Tugu Bambu</li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Dari arah Bulak Kapal</td>
                                            <td>
                                                <ul>
                                                    <li>Ke arah Selatan menuju Perempatan/sebelum Pintu Tol Bekasi Timur</li>
                                                    <li>Posisi service center sebelah kanan dekat Tugu Patriot/Tugu Bambu</li>
                                                    <li>Ke arah Utara melewati Perempatan/sebelum Pintu Tol Bekasi Timur</li>
                                                    <li>Belok kiri ke Jalan Kalimalang (Jalan Chairil Anwar), lokasi service center sebelah kanan</li>
                                                </ul>
                                            </td>
                                        </tr>                                            
                                    </tbody>
                                </table>
                                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                    <!-- Summary by Category Tab -->
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-one-bekasi1-tab" data-toggle="pill" href="#custom-tabs-one-bekasi1" role="tab" aria-controls="custom-tabs-one-bekasi1" aria-selected="false">Dari Blu Plaza</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-bekasi2-tab" data-toggle="pill" href="#custom-tabs-one-bekasi2" role="tab" aria-controls="custom-tabs-one-bekasi2" aria-selected="true">Tambun, Kalimalang</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-bekasi3-tab" data-toggle="pill" href="#custom-tabs-one-bekasi3" role="tab" aria-controls="custom-tabs-one-bekasi3" aria-selected="false">Bulak Kapal</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-bekasi4-tab" data-toggle="pill" href="#custom-tabs-one-bekasi4" role="tab" aria-controls="custom-tabs-one-bekasi4" aria-selected="true">Jatimulya</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-bekasi5-tab" data-toggle="pill" href="#custom-tabs-one-bekasi5" role="tab" aria-controls="custom-tabs-one-bekasi5" aria-selected="true">Tampak Depan</a>
                                    </li>
                                </ul>

                                <div class="tab-content mt-2" id="custom-tabs-one-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-one-bekasi1" role="tabpanel" aria-labelledby="custom-tabs-one-bekasi1-tab">
                                        <img src="<?= base_url('assets/img/ancer/Bekasi1.gif') ?>" class="img-fluid">
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-bekasi2" role="tabpanel" aria-labelledby="custom-tabs-one-bekasi2-tab">
                                        <img src="<?= base_url('assets/img/ancer/Bekasi2.gif') ?>" class="img-fluid">
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-bekasi3" role="tabpanel" aria-labelledby="custom-tabs-one-bekasi3-tab">
                                        <img src="<?= base_url('assets/img/ancer/Bekasi3.gif') ?>" class="img-fluid">
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-bekasi4" role="tabpanel" aria-labelledby="custom-tabs-one-bekasi4-tab">
                                        <img src="<?= base_url('assets/img/ancer/Bekasi4.gif') ?>" class="img-fluid">
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-bekasi5" role="tabpanel" aria-labelledby="custom-tabs-one-bekasi5-tab">
                                        <img src="<?= base_url('assets/img/ancer/Bekasi5.gif') ?>" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-tangerang" role="tabpanel" aria-labelledby="v-pills-tangerang-tab">
                                <p class="h5 text-info">SDSS Tangerang</p>
                                <table class="table table-sm">
                                    <tbody>
                                        <tr>
                                            <td>Dari Jalan Merdeka (dari arah timur)</td>
                                            <td>
                                                <ul>
                                                    <li>Jalan Merdeka ke arah Barat, di pertingaan sebelum RS Melati belok kiri ke Jalan Imam Bonjol (arah RS Sari Asih)</li>
                                                    <li>Lurus terus sekitar 600 meter melewati KPP Pratama Tangerang Barat</li>
                                                    <li>Lokasi service center sebelah kanan, sederetan BTN Syariah</li>
                                                </ul>            
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Dari Jalan Merdeka (dari arah barat)</td>
                                            <td>
                                                <ul>
                                                    <li>Jalan Merdeka ke arah timur, di pertingaan setelah RS Melati belok kanan ke Jalan Imam Bonjol (arah RS Sari Asih)</li>
                                                    <li>Lurus terus sekitar 600 meter melewati KPP Pratama Tangerang Barat</li>
                                                    <li>Lokasi service center sebelah kanan, sederetan BTN Syariah</li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jalan Imam Bonjol arah selatan</td>
                                            <td>
                                                <ul>
                                                    <li>Lurus ke utara arah RS Sari Asih.</li>
                                                    <li>Lokasi service center sebelah kiri setelah Pahala Express Delivery, sederetan BTN Syariah</li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Kata kunci di Google Maps</td>
                                            <td>Sharp Service Center Sukajadi</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                    <!-- Summary by Category Tab -->
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-one-tangerang1-tab" data-toggle="pill" href="#custom-tabs-one-tangerang1" role="tab" aria-controls="custom-tabs-one-tangerang1" aria-selected="false">Dari Timur</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-tangerang2-tab" data-toggle="pill" href="#custom-tabs-one-tangerang2" role="tab" aria-controls="custom-tabs-one-tangerang2" aria-selected="true">Dari Barat</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-tangerang3-tab" data-toggle="pill" href="#custom-tabs-one-tangerang3" role="tab" aria-controls="custom-tabs-one-tangerang3" aria-selected="false">Dari Selatan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-tangerang4-tab" data-toggle="pill" href="#custom-tabs-one-tangerang4" role="tab" aria-controls="custom-tabs-one-tangerang4" aria-selected="true">Tampak Depan</a>
                                    </li>
                                </ul>

                                <div class="tab-content mt-2" id="custom-tabs-one-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-one-tangerang1" role="tabpanel" aria-labelledby="custom-tabs-one-tangerang1-tab">
                                        <img src="<?= base_url('assets/img/ancer/Tangerang1.gif') ?>" class="img-fluid">
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-tangerang2" role="tabpanel" aria-labelledby="custom-tabs-one-tangerang2-tab">
                                        <img src="<?= base_url('assets/img/ancer/Tangerang2.gif') ?>" class="img-fluid">
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-tangerang3" role="tabpanel" aria-labelledby="custom-tabs-one-tangerang3-tab">
                                        <img src="<?= base_url('assets/img/ancer/Tangerang3.gif') ?>" class="img-fluid">
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-tangerang4" role="tabpanel" aria-labelledby="custom-tabs-one-tangerang4-tab">
                                        <img src="<?= base_url('assets/img/ancer/Tangerang4.gif') ?>" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-serpong" role="tabpanel" aria-labelledby="v-pills-serpong-tab">
                                <p class="h5 text-info">SDSS Serpong</p>
                                <table class="table table-sm">
                                    <tbody>
                                        <tr>
                                            <td>Dari arah BSD Junction/ITC BSD</td>
                                            <td>
                                                <ul>
                                                    <li>Masuk Jalan Pahlawan Seribu (arah Selatan), hingga lewat German Center & Eka Hospital BSD.</li>
                                                    <li>Setelah permepatan lurus sekitar 200 meter, lalu masuk area Ruko Tol Boulevard</li>
                                                </ul>            
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Dari arah Boulevard BSD Timur</td>
                                            <td>
                                                <ul>
                                                    <li>Ke arah barat menuju lampu merah German Center/Eka Hospital</li>
                                                    <li>Setelah permepatan, belok kiri ke Jalan Pahlawan Seribu sekitar 200 meter.</li>
                                                    <li>Masuk area Ruko Tol Boulevard</li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Dari Jalan BSD Grand Boulevard / Jalan Raya Serpong</td>
                                            <td>
                                                <ul>
                                                    <li>Masuk ke Jalan Boulevard BSD Timur hingga lampu merah German Center/Eka Hospital</li>
                                                    <li>Setelah permepatan, belok kanan ke Jalan Pahlawan Seribusekitar 200 meter.</li>
                                                    <li>Masuk area Ruko Tol Boulevard</li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Dari arah Jalan Tol Jakarta-Serpong</td>
                                            <td>
                                                <ul>
                                                    <li>Masuk Jalan Pelayangan ke arah utara sekitar 1.2 km. </li>
                                                    <li>Masuk area Ruko Tol Boulevard</li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                    <!-- Summary by Category Tab -->
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-one-serpong1-tab" data-toggle="pill" href="#custom-tabs-one-serpong1" role="tab" aria-controls="custom-tabs-one-serpong1" aria-selected="false">Dari Arah Utara</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-serpong2-tab" data-toggle="pill" href="#custom-tabs-one-serpong2" role="tab" aria-controls="custom-tabs-one-serpong2" aria-selected="true">Dari Arah Timur</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-serpong3-tab" data-toggle="pill" href="#custom-tabs-one-serpong3" role="tab" aria-controls="custom-tabs-one-serpong3" aria-selected="false">Dari Arah Barat</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-serpong4-tab" data-toggle="pill" href="#custom-tabs-one-serpong4" role="tab" aria-controls="custom-tabs-one-serpong4" aria-selected="true">Dari Arah Selatan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-serpong5-tab" data-toggle="pill" href="#custom-tabs-one-serpong5" role="tab" aria-controls="custom-tabs-one-serpong5" aria-selected="true">Tampak Depan</a>
                                    </li>
                                </ul>

                                <div class="tab-content mt-2" id="custom-tabs-one-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-one-serpong1" role="tabpanel" aria-labelledby="custom-tabs-one-serpong1-tab">
                                        <img src="<?= base_url('assets/img/ancer/Serpong1.gif') ?>" class="img-fluid">
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-serpong2" role="tabpanel" aria-labelledby="custom-tabs-one-serpong2-tab">
                                        <img src="<?= base_url('assets/img/ancer/Serpong2.gif') ?>" class="img-fluid">
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-serpong3" role="tabpanel" aria-labelledby="custom-tabs-one-serpong3-tab">
                                        <img src="<?= base_url('assets/img/ancer/Serpong3.gif') ?>" class="img-fluid">
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-serpong4" role="tabpanel" aria-labelledby="custom-tabs-one-serpong4-tab">
                                        <img src="<?= base_url('assets/img/ancer/Serpong4.gif') ?>" class="img-fluid">
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-serpong5" role="tabpanel" aria-labelledby="custom-tabs-one-serpong5-tab">
                                        <img src="<?= base_url('assets/img/ancer/Serpong5.gif') ?>" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

