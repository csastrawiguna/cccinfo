<!-- SERVICE COST PER 5 NOVEMBER 2024 -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>

        <div class="container-fluid pt-3">
            <style type="text/css">
                .bg-azure {background-color: #F0FFFF;}
                .bg-light-yellow {background-color: #FFFFF0;}
                .bg-light-orange {background-color: #FFF4F0;}
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
                            <!-- Service cost (general) -->
                            <table class="table table-sm table-bordered" cellspacing="7" cellpadding="7" id="tableServiceCost">
                                <thead class="text-center">
                                    <tr>
                                        <th rowspan="2" class="align-middle">Jenis Produk</th>
                                        <th rowspan="2" class="align-middle">Jenis Pekerjaan</th>
                                        <th rowspan="2" class="align-middle">Ukuran/Type</th>
                                        <th colspan="2" class="align-middle">Ongkos Kerja (Rp)</th>
                                        <th colspan="2" class="align-middle">Ongkos Kerja (major) + Transport</th>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Minor</th>
                                        <th class="align-middle">Major</th>
                                        <th class="align-middle dalamKota">Dalam Kota</th>
                                        <th class="align-middle">Luar Kota</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr><td rowspan="15">AIR CONDITIONER</td><td>REPAIR</td><td>AC SPLIT 0.5 ~ 1.5 PK</td><td class="text-right">164,000</td><td class="text-right">257,000</td><td class="text-right text-indigo">317,000</td><td class="text-right">332,000</td></tr>
                                    <tr><td>REPAIR</td><td>AC SPLIT 2 PK KE ATAS</td><td class="text-right">181,000</td><td class="text-right">288,000</td><td class="text-right text-indigo">348,000</td><td class="text-right">363,000</td></tr>
                                    <tr><td>REPAIR</td><td>AC SPLIT INVERTER 0.5 ~ 1.5 PK</td><td class="text-right">167,000</td><td class="text-right">264,000</td><td class="text-right text-indigo">324,000</td><td class="text-right">339,000</td></tr>
                                    <tr><td>REPAIR</td><td>AC SPLIT INVERTER 2 PK KE ATAS</td><td class="text-right">189,000</td><td class="text-right">300,000</td><td class="text-right text-indigo">360,000</td><td class="text-right">375,000</td></tr>
                                    <tr><td>REPAIR</td><td>CASSETE/CEILING/STANDING FLOOR</td><td class="text-right">313,000</td><td class="text-right">506,000</td><td class="text-right text-indigo">566,000</td><td class="text-right">581,000</td></tr>
                                    <tr><td>REPAIR</td><td>DEHUMIDIFIER</td><td class="text-right">167,000</td><td class="text-right">264,000</td><td class="text-right text-indigo">324,000</td><td class="text-right">339,000</td></tr>
                                    <tr><td>REPAIR</td><td>DUCTING TYPE</td><td class="text-right">434,000</td><td class="text-right">846,000</td><td class="text-right text-indigo">906,000</td><td class="text-right">921,000</td></tr>
                                    <tr><td>REPAIR</td><td>PORTABLE</td><td class="text-right">167,000</td><td class="text-right">264,000</td><td class="text-right text-indigo">324,000</td><td class="text-right">339,000</td></tr>
                                    <tr class="bg-light-yellow"><td>MAINTENANCE</td><td>AC SPLIT 0.5 ~ 1.5 PK</td><td class="text-right">-</td><td class="text-right">-</td><td class="text-right text-indigo">135,000</td><td class="text-right">-</td></tr>
                                    <tr class="bg-light-yellow"><td>MAINTENANCE</td><td>AC SPLIT 2 PK KE ATAS</td><td class="text-right">-</td><td class="text-right">-</td><td class="text-right text-indigo">160,000</td><td class="text-right">-</td></tr>
                                    <tr class="bg-light-yellow"><td>MAINTENANCE</td><td>PORTABLE / DEHUMIDIFIER</td><td class="text-right">-</td><td class="text-right">-</td><td class="text-right text-indigo">183,000</td><td class="text-right">-</td></tr>
                                    <tr class="bg-light-yellow"><td>MAINTENANCE</td><td>AC SPLIT SPECIAL</td><td class="text-right">-</td><td class="text-right">-</td><td class="text-right text-indigo">300,000</td><td class="text-right">-</td></tr>
                                    <tr class="bg-light-yellow"><td>MAINTENANCE</td><td>AC SPLIT PERFECT (BESAR/TURUN)</td><td class="text-right">-</td><td class="text-right">-</td><td class="text-right text-indigo">600,000</td><td class="text-right">-</td></tr>
                                    <tr class="bg-azure"><td>INSTALLATION</td><td>AC SPLIT 0.5 ~ 1.5 PK</td><td class="text-right">-</td><td class="text-right">-</td><td class="text-right text-indigo">350,000</td><td class="text-right">-</td></tr>
                                    <tr class="bg-azure"><td>INSTALLATION</td><td>AC SPLIT 2 PK KE ATAS</td><td class="text-right">-</td><td class="text-right">-</td><td class="text-right text-indigo">450,000</td><td class="text-right">-</td></tr>
                                    <tr><td rowspan="2">AIR PURIFIER / AIR COOLER</td><td>REPAIR</td><td>ALL MODEL</td><td class="text-right">95,000</td><td class="text-right">143,000</td><td class="text-right text-indigo">203,000</td><td class="text-right">218,000</td></tr>
                                    <tr class="bg-light-yellow"><td>MAINTENANCE</td><td>ALL MODEL</td><td class="text-right">-</td><td class="text-right">-</td><td class="text-right text-indigo">100,000</td><td class="text-right">-</td></tr>
                                    <tr><td rowspan="4">AUDIO </td><td>REPAIR</td><td>ACTIVE SPEAKER</td><td class="text-right">69,000</td><td class="text-right">100,000</td><td class="text-right text-indigo">160,000</td><td class="text-right">175,000</td></tr>
                                    <tr><td>REPAIR</td><td>HOME THEATER, MD PLAYER, I POD</td><td class="text-right">120,000</td><td class="text-right">184,000</td><td class="text-right text-indigo">244,000</td><td class="text-right">259,000</td></tr>
                                    <tr><td>REPAIR</td><td>WITHOUT CD</td><td class="text-right">69,000</td><td class="text-right">100,000</td><td class="text-right text-indigo">-</td><td class="text-right">-</td></tr>
                                    <tr><td>REPAIR</td><td>WITH CD</td><td class="text-right">91,000</td><td class="text-right">136,000</td><td class="text-right text-indigo">-</td><td class="text-right">-</td></tr>
                                    <tr><td rowspan="3">COLOUR TV (TV WARNA)</td><td>REPAIR</td><td>~ 19 INCH</td><td class="text-right">81,000</td><td class="text-right">119,000</td><td class="text-right text-indigo">179,000</td><td class="text-right">194,000</td></tr>
                                    <tr><td>REPAIR</td><td>20 ~ 24 INCH</td><td class="text-right">91,000</td><td class="text-right">136,000</td><td class="text-right text-indigo">196,000</td><td class="text-right">211,000</td></tr>
                                    <tr><td>REPAIR</td><td>25 INCH ABOVE</td><td class="text-right">105,000</td><td class="text-right">161,000</td><td class="text-right text-indigo">221,000</td><td class="text-right">236,000</td></tr>
                                    <tr><td rowspan="2">FACSIMILE</td><td>REPAIR</td><td>COMMON FACS</td><td class="text-right">91,000</td><td class="text-right">136,000</td><td class="text-right text-indigo">-</td><td class="text-right">-</td></tr>
                                    <tr><td>REPAIR</td><td>LASER FACS</td><td class="text-right">105,000</td><td class="text-right">161,000</td><td class="text-right text-indigo">-</td><td class="text-right">-</td></tr>
                                    <tr><td rowspan="6">LCD MONITOR</td><td>REPAIR</td><td>IDP/IWB (46 INCH ABOVE)</td><td class="text-right">240,000</td><td class="text-right">385,000</td><td class="text-right text-indigo">445,000</td><td class="text-right">460,000</td></tr>
                                    <tr><td>REPAIR</td><td>LCD MONITOR</td><td class="text-right">105,000</td><td class="text-right">161,000</td><td class="text-right text-indigo">221,000</td><td class="text-right">236,000</td></tr>
                                    <tr class="bg-azure"><td>INSTALLATION</td><td>STANDING BRACKET : 40 ~ 50 INCH</td><td class="text-right">-</td><td class="text-right">-</td><td class="text-right text-indigo">300,000</td><td class="text-right">-</td></tr>
                                    <tr class="bg-azure"><td>INSTALLATION</td><td>STANDING BRACKET : 60 INCH ABOVE</td><td class="text-right">-</td><td class="text-right">-</td><td class="text-right text-indigo">450,000</td><td class="text-right">-</td></tr>
                                    <tr class="bg-azure"><td>INSTALLATION</td><td>WALL BRACKET : 40 ~ 50 INCH</td><td class="text-right">-</td><td class="text-right">-</td><td class="text-right text-indigo">400,000</td><td class="text-right">-</td></tr>
                                    <tr class="bg-azure"><td>INSTALLATION</td><td>WALL BRACKET : 60 INCH ABOVE</td><td class="text-right">-</td><td class="text-right">-</td><td class="text-right text-indigo">600,000</td><td class="text-right">-</td></tr>
                                    <tr><td rowspan="10">LCD TV / LED TV</td><td>REPAIR</td><td>UP TO 29 INCH</td><td class="text-right">77,000</td><td class="text-right">209,000</td><td class="text-right text-indigo">269,000</td><td class="text-right">284,000</td></tr>
                                    <tr><td>REPAIR</td><td>30 TO 39 INCH </td><td class="text-right">204,000</td><td class="text-right">324,000</td><td class="text-right text-indigo">384,000</td><td class="text-right">399,000</td></tr>
                                    <tr><td>REPAIR</td><td>40 TO 60 INCH</td><td class="text-right">214,000</td><td class="text-right">343,000</td><td class="text-right text-indigo">403,000</td><td class="text-right">418,000</td></tr>
                                    <tr><td>REPAIR</td><td>MORE THAN 60 INCH</td><td class="text-right">277,000</td><td class="text-right">446,000</td><td class="text-right text-indigo">506,000</td><td class="text-right">521,000</td></tr>
                                    <!-- <tr><td>REPAIR</td><td>UP TO 29 INCH</td><td class="text-right">77,000</td><td class="text-right">209,000</td><td class="text-right text-indigo">269,000</td><td class="text-right">284,000</td></tr> -->
                                    <tr class="bg-azure"><td>INSTALLATION</td><td>TABLE INSTALL : 24 ~ 32 INCH</td><td class="text-right">-</td><td class="text-right">-</td><td class="text-right text-indigo">100,000</td><td class="text-right">-</td></tr>
                                    <tr class="bg-azure"><td>INSTALLATION</td><td>TABLE INSTALL : 40 ~ 55 INCH</td><td class="text-right">-</td><td class="text-right">-</td><td class="text-right text-indigo">150,000</td><td class="text-right">-</td></tr>
                                    <tr class="bg-azure"><td>INSTALLATION</td><td>TABLE INSTALL : 60 INCH ABOVE</td><td class="text-right">-</td><td class="text-right">-</td><td class="text-right text-indigo">275,000</td><td class="text-right">-</td></tr>
                                    <tr class="bg-azure"><td>INSTALLATION</td><td>WALL INSTALL : 24 ~ 32 INCH</td><td class="text-right">-</td><td class="text-right">-</td><td class="text-right text-indigo">225,000</td><td class="text-right">-</td></tr>
                                    <tr class="bg-azure"><td>INSTALLATION</td><td>WALL INSTALL : 40 ~ 55 INCH</td><td class="text-right">-</td><td class="text-right">-</td><td class="text-right text-indigo">300,000</td><td class="text-right">-</td></tr>
                                    <tr class="bg-azure"><td>INSTALLATION</td><td>WALL INSTALL : 60 INCH ABOVE</td><td class="text-right">-</td><td class="text-right">-</td><td class="text-right text-indigo">400,000</td><td class="text-right">-</td></tr>
                                    <tr><td rowspan="1">MICROWAVE OVEN </td><td>REPAIR</td><td>ALL MODEL</td><td class="text-right">76,000</td><td class="text-right">112,000</td><td class="text-right text-indigo">172,000</td><td class="text-right">187,000</td></tr>
                                    <tr><td rowspan="2">MOBILE PHONE </td><td>REPAIR</td><td>ALL MODEL</td><td class="text-right">165,000</td><td class="text-right">264,000</td><td class="text-right text-indigo">-</td><td class="text-right">-</td></tr>
                                    <tr><td>UPDATE SOFTWARE</td><td>ALL MODEL</td><td class="text-right">77,000</td><td class="text-right">132,000</td><td class="text-right text-indigo">-</td><td class="text-right">-</td></tr>
                                    <tr><td rowspan="8">REFRIGERATOR / LEMARI ES</td><td>REPAIR</td><td>DIRECT COOLING</td><td class="text-right">127,000</td><td class="text-right">184,000</td><td class="text-right text-indigo">244,000</td><td class="text-right">259,000</td></tr>
                                    <tr><td>REPAIR</td><td>NO FROOST / FREZER / SHOWCASE (&le; 500 L)</td><td class="text-right">134,000</td><td class="text-right">197,000</td><td class="text-right text-indigo">257,000</td><td class="text-right">272,000</td></tr>
                                    <tr><td>REPAIR</td><td>NO FROOST / FREZER / SHOWCASE (> 500 L)</td><td class="text-right">143,000</td><td class="text-right">209,000</td><td class="text-right text-indigo">269,000</td><td class="text-right">284,000</td></tr>
                                    <tr class="bg-light-yellow"><td>MAINTENANCE</td><td>DIRECT COOLING</td><td class="text-right">-</td><td class="text-right">-</td><td class="text-right text-indigo">100,000</td><td class="text-right">-</td></tr>
                                    <tr class="bg-light-yellow"><td>MAINTENANCE</td><td>NO FROOST / FREZER / SHOWCASE (&le; 500 L)</td><td class="text-right">-</td><td class="text-right">-</td><td class="text-right text-indigo">125,000</td><td class="text-right">-</td></tr>
                                    <tr class="bg-light-yellow"><td>MAINTENANCE</td><td>NO FROOST / FREZER / SHOWCASE (> 500 L)</td><td class="text-right">-</td><td class="text-right">-</td><td class="text-right text-indigo">150,000</td><td class="text-right">-</td></tr>
                                    <tr class="bg-azure"><td>INSTALLATION</td><td>SIDE BY SIDE</td><td class="text-right">-</td><td class="text-right">-</td><td class="text-right text-indigo">200,000</td><td class="text-right">-</td></tr>
                                    <tr class="bg-azure"><td>INSTALLATION</td><td>2 DOOR</td><td class="text-right">-</td><td class="text-right">-</td><td class="text-right text-indigo">150,000</td><td class="text-right">-</td></tr>
                                    <tr><td rowspan="7">SMALL HOME APPLIANCE</td><td>REPAIR</td><td>AIR FRYER</td><td class="text-right">90,000</td><td class="text-right">90,000</td><td class="text-right text-indigo">-</td><td class="text-right">-</td></tr>
                                    <tr><td>REPAIR</td><td>BLENDER/JUICER/MIXER/DISPENSER</td><td class="text-right">83,000</td><td class="text-right">83,000</td><td class="text-right text-indigo">-</td><td class="text-right">-</td></tr>
                                    <tr><td>REPAIR</td><td>CAR ION GENERATOR/CAR/HELMET PURIFIER</td><td class="text-right">89,000</td><td class="text-right">89,000</td><td class="text-right text-indigo">-</td><td class="text-right">-</td></tr>
                                    <tr><td>REPAIR</td><td>ELECTRIC FAN</td><td class="text-right">64,000</td><td class="text-right">64,000</td><td class="text-right text-indigo">-</td><td class="text-right">-</td></tr>
                                    <tr><td>REPAIR</td><td>ELECTRIC OVEN/COFFE MAKER/SANDWICH TOASTER</td><td class="text-right">83,000</td><td class="text-right">83,000</td><td class="text-right text-indigo">-</td><td class="text-right">-</td></tr>
                                    <tr><td>REPAIR</td><td>HAIR DRYER / HAIR STAIGHTENER</td><td class="text-right">89,000</td><td class="text-right">89,000</td><td class="text-right text-indigo">-</td><td class="text-right">-</td></tr>
                                    <tr><td>REPAIR</td><td>RICE COOKER/ ELECTRONICS OVEN</td><td class="text-right">83,000</td><td class="text-right">83,000</td><td class="text-right text-indigo">-</td><td class="text-right">-</td></tr>
                                    <tr><td rowspan="1">STB (SET TOP BOX)</td><td>REPAIR</td><td>STB (SET TOP BOX)</td><td class="text-right">75,000</td><td class="text-right">75,000</td><td class="text-right text-indigo">-</td><td class="text-right">-</td></tr>
                                    <tr><td rowspan="2">VACUUM CLEANER</td><td>REPAIR</td><td>AUTOMATIC</td><td class="text-right">109,000</td><td class="text-right">109,000</td><td class="text-right text-indigo">-</td><td class="text-right">-</td></tr>
                                    <tr><td>REPAIR</td><td>MANUAL</td><td class="text-right">83,000</td><td class="text-right">83,000</td><td class="text-right text-indigo">-</td><td class="text-right">-</td></tr>
                                    <tr><td rowspan="10">WASHING MACHINE</td><td>REPAIR</td><td>AUTOMATIC TOP LOADING</td><td class="text-right">112,000</td><td class="text-right">173,000</td><td class="text-right text-indigo">233,000</td><td class="text-right">248,000</td></tr>
                                    <tr><td>REPAIR</td><td>FRONT LOADING </td><td class="text-right">167,000</td><td class="text-right">264,000</td><td class="text-right text-indigo">324,000</td><td class="text-right">339,000</td></tr>
                                    <tr><td>REPAIR</td><td>SEMI AUTOMATIC (2 TUB)</td><td class="text-right">95,000</td><td class="text-right">143,000</td><td class="text-right text-indigo">203,000</td><td class="text-right">218,000</td></tr>
                                    <tr><td>REPAIR</td><td>TUMBLER DRYER</td><td class="text-right">167,000</td><td class="text-right">264,000</td><td class="text-right text-indigo">324,000</td><td class="text-right">339,000</td></tr>
                                    <tr class="bg-light-yellow"><td>MAINTENANCE</td><td>AUTOMATIC TOP LOADING</td><td class="text-right">-</td><td class="text-right">-</td><td class="text-right text-indigo">200,000</td><td class="text-right">-</td></tr>
                                    <tr class="bg-light-yellow"><td>MAINTENANCE</td><td>FRONT LOADING </td><td class="text-right">-</td><td class="text-right">-</td><td class="text-right text-indigo">250,000</td><td class="text-right">-</td></tr>
                                    <tr class="bg-light-yellow"><td>MAINTENANCE</td><td>SEMI AUTOMATIC (2 TUB)</td><td class="text-right">-</td><td class="text-right">-</td><td class="text-right text-indigo">175,000</td><td class="text-right">-</td></tr>
                                    <tr class="bg-light-yellow"><td>MAINTENANCE</td><td>TUMBLER DRYER</td><td class="text-right">-</td><td class="text-right">-</td><td class="text-right text-indigo">250,000</td><td class="text-right">-</td></tr>
                                    <tr class="bg-azure"><td>INSTALLATION</td><td>AUTOMATIC TOP LOADING</td><td class="text-right">-</td><td class="text-right">-</td><td class="text-right text-indigo">150,000</td><td class="text-right">-</td></tr>
                                    <tr class="bg-azure"><td>INSTALLATION</td><td>FRONT LOADING</td><td class="text-right">-</td><td class="text-right">-</td><td class="text-right text-indigo">200,000</td><td class="text-right">-</td></tr>
                                    <tr><td rowspan="2">WATER DISPENSER</td><td>REPAIR</td><td>WITH COMPRESSOR</td><td class="text-right">124,000</td><td class="text-right">192,000</td><td class="text-right text-indigo">252,000</td><td class="text-right">267,000</td></tr>
                                    <tr class="bg-light-yellow"><td>MAINTENANCE</td><td>WITH COMPRESSOR</td><td class="text-right">-</td><td class="text-right">-</td><td class="text-right text-indigo">135,000</td><td class="text-right">-</td></tr>
                                    <tr><td rowspan="3">WATER PUMP </td><td>REPAIR</td><td>JET PUMP</td><td class="text-right">81,000</td><td class="text-right">119,000</td><td class="text-right text-indigo">179,000</td><td class="text-right">194,000</td></tr>
                                    <tr><td>REPAIR</td><td>SELAM/SUBMERSIBLE</td><td class="text-right">109,000</td><td class="text-right">167,000</td><td class="text-right text-indigo">227,000</td><td class="text-right">242,000</td></tr>
                                    <tr><td>REPAIR</td><td>WATER PUMP</td><td class="text-right">70,000</td><td class="text-right">70,000</td><td class="text-right text-indigo">130,000</td><td class="text-right">145,000</td></tr>
                                    <tr><td colspan="2">BIAYA/JASA PENGECEKAN</td><td></td><td class="text-right">-</td><td class="text-right">60,000</td><td class="text-right text-indigo">-</td><td class="text-right">-</td></tr>
                                    <tr><td rowspan="2" colspan="2">ONGKOS TRANSPORTASI</td><td>DALAM KOTA</td><td class="text-right">-</td><td class="text-right">60,000</td><td class="text-right text-indigo">-</td><td class="text-right">-</td></tr>
                                    <tr><td>LUAR KOTA</td><td class="text-right">-</td><td class="text-right">75,000</td><td class="text-right text-indigo">-</td><td class="text-right">-</td>
                                </tbody>
                            </table>
                            <div class="bg-light-orange px-3 py-2 mt-2 mb-3 rounded">
                                <h5 class="text-danger"><strong><i class="fas fa-info-circle"></i> Catatan</strong></h5>
                                <ul>
                                    <li class="mb-2">Reparasi produk yang sudah diperbaiki teknisi luar atau bukan oleh teknisi resmi Service Center SHARP (ex-montir), akan dikenakan biaya <strong>2X lipat untuk jasa & spare part</strong></li>
                                    <li class="mb-2">Reparasi produk yang tidak diproduksi atau dipasarkan secara resmi oleh PT. SEID,  akan dikenakan biaya <strong>2X lipat untuk jasa & spare part</strong></li>
                                    <li class="mb-2">Beberapa model speaker aktif dan home theater bisa Z2</li>
                                    <li>Cleaning Refrigerator hanya untuk lemari es saja. Tidak berlaku untuk freezer/showcase</li>
                                </ul>
                                <!-- <code>
                                    <p><strong>Catatan:</strong></p>
                                    <p>*1 : Beberapa model speaker aktif bisa Z2</p>
                                    <p>*2 : Beberapa home theater bisa Z2</p>
                                    <p>*3 : Cleaning hanya berlaku untuk lemari es saja (freezer/showcase tidak termasuk)</p>
                                </code> -->
                            </div>
                            <span class="h6 text-indigo">Pembatalan reparasi oleh konsumen akan dikenakan biaya pengecekan sebesar Rp. 60,000</span>
                            <table  class="table table-bordered" cellpadding="5" cellspacing="5" id="pembatalan" style="max-width: 830px;">
                                <thead>
                                    <tr style="background-color: #ECECEC;">
                                        <th>Type order</th>
                                        <th>Biaya Pembatalan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><b>Kunjunngan teknisi Z2/ZY</b></td>
                                        <td>Transportasi & pengecekan unit (Rp. 120,000 atau Rp. 135,000 jika luar kota)</td>
                                    </tr>
                                    <tr>
                                        <td><b>Perbaikan Z1</b></td>
                                        <td>Pengecekan unit (Rp. 60,000)</td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <span class="h6 text-indigo">Kategori jenis perbaikan</span>
                            <table class="table table-bordered" cellspacing="5" cellpadding="5" id="keterangan" style="max-width: 830px;">
                                <thead>
                                    <tr style="background-color: #ECECEC;">
                                        <th>Perbaikan</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="">
                                        <td><b>Perbaikan Mayor</b></td>
                                        <td>
                                            <p>Memerlukan penggantian komponen penting atau memperbaiki masalah yang membuat produk tidak berfungsi dengan baik. Pekerjaan ini membutuhkan lebih banyak waktu dan membutuhkan keahlian tingkat lanjut.</p>
                                            <p>Contoh: Ganti Kompresor, Ganti Motor, Ganti Panel, dll.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Perbaikan Minor</b></td>
                                        <td>
                                            <p>Tidak memerlukan penggantian suku cadang utama dan dapat dilakukan dengan cepat. Biasanya merupakan masalah kecil yang tidak mempengaruhi fungsi utama produk.</p>
                                            <p>Contoh: Menyesuaikan/menyetel Produk, Memeriksa Kabel yang Longgar dll.</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                             Tabel refrigerant
                            <table class="table table-sm table-bordered table-stripped" border="1" cellpadding="5" cellspacing="5" id="refrigerant">
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
                                    <tr class="warna-5"><td>> 3 PK</td><td>gram</td><td>2,750</td><td>440</td><td>1,210,000</td></tr>
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