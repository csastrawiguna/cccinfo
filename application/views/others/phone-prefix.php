<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>

        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col">
                    <div class="card card-outline card-info">
                        <div class="card-body">                      
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-jabodetabek-tab" data-toggle="pill" href="#pills-jabodetabek" role="tab" aria-controls="pills-jabodetabek" aria-selected="true">JABODETABEK Area</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-othersarea-tab" data-toggle="pill" href="#pills-othersarea" role="tab" aria-controls="pills-othersarea" aria-selected="false">Area lain</a>
                                </li>                                
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-jabodetabek" role="tabpanel" aria-labelledby="pills-jabodetabek-tab">
                                    <div class="row mt-5">
                                        <div class="col-8">
                                            <table class="table table-sm table-hover" id="othersPhoneprefixTableJabodetabek">
                                                <thead>
                                                    <tr>
                                                        <th>Digit awal no telp</th>
                                                        <th>Area</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr><td>021-100</td><td>National Opr.</td></tr>
                                                    <tr><td>021-101</td><td>Intl.Opr.Indosat</td></tr>
                                                    <tr><td>021-103</td><td>Info. Waktu</td></tr>
                                                    <tr><td>021-104</td><td>Intl.Opr.Indosat</td></tr>
                                                    <tr><td>021-105</td><td>National Opr.</td></tr>
                                                    <tr><td>021-108</td><td>108 Info</td></tr>
                                                    <tr><td>021-109</td><td>109 Info billing telp</td></tr>
                                                    <tr><td>021-121</td><td>Info KA.</td></tr>
                                                    <tr><td>021-123</td><td>PLN - Call center</td></tr>
                                                    <tr><td>021-147</td><td>Telkom Call Center 147</td></tr>
                                                    <tr><td>021-181</td><td>Intl.Opr.Satelindo</td></tr>
                                                    <tr><td>021-187</td><td>Intl.Opr.Satelindo</td></tr>
                                                    <tr><td>021-21...</td><td>Jakarta Selatan - Kebayoran</td></tr>
                                                    <tr><td>021-2125...</td><td>Jakarta Barat - Slipi</td></tr>
                                                    <tr><td>021-2139...</td><td>Jakarta Pusat - Gambir</td></tr>
                                                    <tr><td>021-2149...</td><td>Jakarta Pusat - Cempaka Putih</td></tr>
                                                    <tr><td>021-23...</td><td>Jakarta Pusat - Gambir 2</td></tr>
                                                    <tr><td>021-230...</td><td>Jakarta Pusat - Gambir</td></tr>
                                                    <tr><td>021-2309...</td><td>Jakarta Pusta - Cikini</td></tr>
                                                    <tr><td>021-231...</td><td>Jakarta Pusat - Gambir</td></tr>
                                                    <tr><td>021-2350...</td><td>Jakarta Pusat - Gambir</td></tr>
                                                    <tr><td>021-2355...</td><td>Jakarta Pusat - Gambir</td></tr>
                                                    <tr><td>021-2390...</td><td>Jakarta Pusat - Gambir</td></tr>
                                                    <tr><td>021-2391...</td><td>Jakarta Pusat - Gambir</td></tr>
                                                    <tr><td>021-2392...</td><td>Jakarta Pusat - Gambir</td></tr>
                                                    <tr><td>021-2393...</td><td>Jakarta Pusat - Gambir</td></tr>
                                                    <tr><td>021-2394...</td><td>Jakarta Pusat - Gambir</td></tr>
                                                    <tr><td>021-2396...</td><td>Jakarta Pusta - Cikini</td></tr>
                                                    <tr><td>021-2397...</td><td>Jakarta Pusta - Cikini</td></tr>
                                                    <tr><td>021-2453...</td><td>Jakarta Utara - Kelapa Gading</td></tr>
                                                    <tr><td>021-2455...</td><td>Jakarta Timur - Rawamangun</td></tr>
                                                    <tr><td>021-2457...</td><td>Jakarta Timur - Penggilingan</td></tr>
                                                    <tr><td>021-25...</td><td>Jakarta Selatan - Gatot Subroto</td></tr>
                                                    <tr><td>021-250...</td><td>Jakarta Selatan - Gatot Subroto</td></tr>
                                                    <tr><td>021-251...</td><td>Jakarta Selatan - Gatot Subroto</td></tr>
                                                    <tr><td>021-252...</td><td>Jakarta Selatan - Gatot Subroto</td></tr>
                                                    <tr><td>021-2529...</td><td>Jakarta Selatan - Gatot Subroto</td></tr>
                                                    <tr><td>021-2550...</td><td>Jakarta Selatan - Gatot Subroto</td></tr>
                                                    <tr><td>021-2556...</td><td>Jakarta Barat - Slipi</td></tr>
                                                    <tr><td>021-2560...</td><td>Jakarta Barat - Buish</td></tr>
                                                    <tr><td>021-2561...</td><td>Jakarta Barat - Cengkareng</td></tr>
                                                    <tr><td>021-2568...</td><td>Jakarta Barat - Meruya</td></tr>
                                                    <tr><td>021-2569...</td><td>Jakarta Barat - Kedoya</td></tr>
                                                    <tr><td>021-2590...</td><td>Jakarta Selatan - Gatot Subroto</td></tr>
                                                    <tr><td>021-2592...</td><td>Jakarta Selatan - Gatot Subroto</td></tr>
                                                    <tr><td>021-2596...</td><td>Jakarta Selatan - Gatot Subroto</td></tr>
                                                    <tr><td>021-2656...</td><td>Jakarta Barat - Kota</td></tr>
                                                    <tr><td>021-2693...</td><td>Jakarta Pusat - Gambir</td></tr>
                                                    <tr><td>021-270...</td><td>Jakarta Selatan - Kebayoran Baru</td></tr>
                                                    <tr><td>021-2750...</td><td>Jakarta Selatan - Kebayoran Baru</td></tr>
                                                    <tr><td>021-2752...</td><td>Jakarta Selatan - Kemang</td></tr>
                                                    <tr><td>021-2753...</td><td>Jakarta Selatan - Kalibata</td></tr>
                                                    <tr><td>021-2754...</td><td>Jakarta Selatan - Pasar Minggu</td></tr>
                                                    <tr><td>021-2755...</td><td>Tangerang - Bintaro</td></tr>
                                                    <tr><td>021-2756...</td><td>Tangerang - Ciledug</td></tr>
                                                    <tr><td>021-2757...</td><td>Depok - Cinere</td></tr>
                                                    <tr><td>021-2758...</td><td>Jakarta Selatan - Cipete</td></tr>
                                                    <tr><td>021-2759...</td><td>Tangerang Selatan - Ciputat</td></tr>
                                                    <tr><td>021-2762...</td><td>Tangerang Selatan - Pondok Aren</td></tr>
                                                    <tr><td>021-2785...</td><td>Jakarta Selatan - Kemang</td></tr>
                                                    <tr><td>021-279...</td><td>Jakarta Selatan - Kebayoran Baru</td></tr>
                                                    <tr><td>021-280...</td><td>Jakarta Timur - Jatinegara</td></tr>
                                                    <tr><td>021-2850...</td><td>Jakarta Timur - Jatinegara</td></tr>
                                                    <tr><td>021-2852...</td><td>Jakarta Timur - Cawang</td></tr>
                                                    <tr><td>021-2854...</td><td>Jakarta Selatan - Tebet</td></tr>
                                                    <tr><td>021-2856...</td><td>Jakarta Selatan - Gandaria</td></tr>
                                                    <tr><td>021-2865...</td><td>Jakarta Timur - Pondok Kelapa</td></tr>
                                                    <tr><td>021-2866...</td><td>Bekasi - Pondokgede</td></tr>
                                                    <tr><td>021-2867...</td><td>Bekasi - Kranggan</td></tr>
                                                    <tr><td>021-31...</td><td>Jakarta Pusta - Cikini</td></tr>
                                                    <tr><td>021-310...</td><td>Jakarta Pusta - Cikini</td></tr>
                                                    <tr><td>021-314...</td><td>Jakarta Pusta - Cikini</td></tr>
                                                    <tr><td>021-315...</td><td>Jakarta Pusta - Cikini</td></tr>
                                                    <tr><td>021-316...</td><td>Jakarta Pusta - Cikini</td></tr>
                                                    <tr><td>021-318...</td><td>Jakarta Pusta - Cikini</td></tr>
                                                    <tr><td>021-32...</td><td>Jakarta Pusta - Cikini</td></tr>
                                                    <tr><td>021-344...</td><td>Jakarta Pusat - Gambir</td></tr>
                                                    <tr><td>021-345...</td><td>Jakarta Pusat - Gambir</td></tr>
                                                    <tr><td>021-346...</td><td>Jakarta Pusat - Gambir</td></tr>
                                                    <tr><td>021-3483...</td><td>Jakarta Pusat - Gambir</td></tr>
                                                    <tr><td>021-350...</td><td>Jakarta Pusat - Gambir</td></tr>
                                                    <tr><td>021-351...</td><td>Jakarta Pusat - Gambir</td></tr>
                                                    <tr><td>021-352...</td><td>Jakarta Pusat - Gambir</td></tr>
                                                    <tr><td>021-36...</td><td>Jakarta Pusat - Gambir</td></tr>
                                                    <tr><td>021-37...</td><td>Jakarta Pusat - Gambir</td></tr>
                                                    <tr><td>021-38...</td><td>Jakarta Pusat - Gambir</td></tr>
                                                    <tr><td>021-380...</td><td>Jakarta Pusat - Gambir</td></tr>
                                                    <tr><td>021-381...</td><td>Jakarta Pusat - Gambir</td></tr>
                                                    <tr><td>021-382...</td><td>Jakarta Pusat - Gambir</td></tr>
                                                    <tr><td>021-383...</td><td>Jakarta Pusat - Gambir</td></tr>
                                                    <tr><td>021-384...</td><td>Jakarta Pusat - Gambir</td></tr>
                                                    <tr><td>021-385...</td><td>Jakarta Pusat - Gambir</td></tr>
                                                    <tr><td>021-386...</td><td>Jakarta Pusat - Gambir</td></tr>
                                                    <tr><td>021-390...</td><td>Jakarta Pusta - Cikini</td></tr>
                                                    <tr><td>021-391...</td><td>Jakarta Pusta - Cikini</td></tr>
                                                    <tr><td>021-392...</td><td>Jakarta Pusta - Cikini</td></tr>
                                                    <tr><td>021-393...</td><td>Jakarta Pusta - Cikini</td></tr>
                                                    <tr><td>021-3983...</td><td>Jakarta Pusta - Cikini</td></tr>
                                                    <tr><td>021-3989...</td><td>Jakarta Pusta - Cikini</td></tr>
                                                    <tr><td>021-420...</td><td>Jakarta Pusat - Cempaka Putih</td></tr>
                                                    <tr><td>021-421...</td><td>Jakarta Pusat - Cempaka Putih</td></tr>
                                                    <tr><td>021-422...</td><td>Jakarta Pusat - Cempaka Putih</td></tr>
                                                    <tr><td>021-4237...</td><td>Jakarta Pusat - Cempaka Putih</td></tr>
                                                    <tr><td>021-424...</td><td>Jakarta Pusat - Cempaka Putih</td></tr>
                                                    <tr><td>021-425...</td><td>Jakarta Pusat - Cempaka Putih</td></tr>
                                                    <tr><td>021-426...</td><td>Jakarta Pusat - Cempaka Putih</td></tr>
                                                    <tr><td>021-4289...</td><td>Jakarta Pusat - Cempaka Putih</td></tr>
                                                    <tr><td>021-429...</td><td>Jakarta Pusat - Cempaka Putih</td></tr>
                                                    <tr><td>021-430...</td><td>Jakarta Utara - Tanjung Priok</td></tr>
                                                    <tr><td>021-431...</td><td>Jakarta Utara - Tanjung Priok</td></tr>
                                                    <tr><td>021-435...</td><td>Jakarta Utara - Tanjung Priok</td></tr>
                                                    <tr><td>021-436...</td><td>Jakarta Utara - Tanjung Priok</td></tr>
                                                    <tr><td>021-437...</td><td>Jakarta Utara - Tanjung Priok</td></tr>
                                                    <tr><td>021-4384...</td><td>Jakarta Utara - Tanjung Priok</td></tr>
                                                    <tr><td>021-4389...</td><td>Jakarta Utara - Tanjung Priok</td></tr>
                                                    <tr><td>021-4390...</td><td>Jakarta Utara - Tanjung Priok</td></tr>
                                                    <tr><td>021-4391...</td><td>Jakarta Utara - Tanjung Priok</td></tr>
                                                    <tr><td>021-4392...</td><td>Jakarta Utara - Tanjung Priok</td></tr>
                                                    <tr><td>021-440...</td><td>Jakarta Utara - Cilincing</td></tr>
                                                    <tr><td>021-441...</td><td>Jakarta Utara - Cilincing</td></tr>
                                                    <tr><td>021-4482...</td><td>Jakarta Utara - Cilincing</td></tr>
                                                    <tr><td>021-4483...</td><td>Jakarta Utara - Cilincing</td></tr>
                                                    <tr><td>021-4485...</td><td>Jakarta Utara - Marunda</td></tr>
                                                    <tr><td>021-45...</td><td>Jakarta Timur - Penggilingan</td></tr>
                                                    <tr><td>021-450...</td><td>Jakarta Utara - Kelapa Gading</td></tr>
                                                    <tr><td>021-451...</td><td>Jakarta Utara - Kelapa Gading</td></tr>
                                                    <tr><td>021-452...</td><td>Jakarta Utara - Kelapa Gading</td></tr>
                                                    <tr><td>021-453...</td><td>Jakarta Utara - Kelapa Gading</td></tr>
                                                    <tr><td>021-4584...</td><td>Jakarta Utara - Kelapa Gading</td></tr>
                                                    <tr><td>021-4585...</td><td>Jakarta Utara - Kelapa Gading</td></tr>
                                                    <tr><td>021-460...</td><td>Jakarta Timur - Penggilingan</td></tr>
                                                    <tr><td>021-461...</td><td>Jakarta Timur - Penggilingan</td></tr>
                                                    <tr><td>021-4682...</td><td>Jakarta Timur - Penggilingan</td></tr>
                                                    <tr><td>021-4683...</td><td>Jakarta Timur - Penggilingan</td></tr>
                                                    <tr><td>021-470...</td><td>Jakarta Timur - Rawamangun</td></tr>
                                                    <tr><td>021-471...</td><td>Jakarta Timur - Rawamangun</td></tr>
                                                    <tr><td>021-472...</td><td>Jakarta Timur - Rawamangun</td></tr>
                                                    <tr><td>021-475...</td><td>Jakarta Timur - Rawamangun</td></tr>
                                                    <tr><td>021-476...</td><td>Jakarta Timur - Rawamangun</td></tr>
                                                    <tr><td>021-4786...</td><td>Jakarta Timur - Rawamangun</td></tr>
                                                    <tr><td>021-480...</td><td>Jakarta Timur - Pulogebang</td></tr>
                                                    <tr><td>021-4870...</td><td>Jakarta Timur - Pulogebang</td></tr>
                                                    <tr><td>021-488...</td><td>Jakarta Timur - Rawamangun</td></tr>
                                                    <tr><td>021-489...</td><td>Jakarta Timur - Rawamangun</td></tr>
                                                    <tr><td>021-49...</td><td>Jakarta Utara - Tanjung Priok</td></tr>
                                                    <tr><td>021-5140...</td><td>Jakarta Selatan - Gatot Subroto</td></tr>
                                                    <tr><td>021-515...</td><td>Jakarta Selatan - Gatot Subroto</td></tr>
                                                    <tr><td>021-520...</td><td>Jakarta Selatan - Gatot Subroto</td></tr>
                                                    <tr><td>021-522...</td><td>Jakarta Selatan - Gatot Subroto</td></tr>
                                                    <tr><td>021-524...</td><td>Jakarta Selatan - Gatot Subroto</td></tr>
                                                    <tr><td>021-525...</td><td>Jakarta Selatan - Gatot Subroto</td></tr>
                                                    <tr><td>021-526...</td><td>Jakarta Selatan - Gatot Subroto</td></tr>
                                                    <tr><td>021-527...</td><td>Jakarta Selatan - Gatot Subroto</td></tr>
                                                    <tr><td>021-5290...</td><td>Jakarta Selatan - Gatot Subroto</td></tr>
                                                    <tr><td>021-5291...</td><td>Jakarta Selatan - Gatot Subroto</td></tr>
                                                    <tr><td>021-5296...</td><td>Jakarta Selatan - Gatot Subroto</td></tr>
                                                    <tr><td>021-530...</td><td>Jakarta Barat - Palmerah</td></tr>
                                                    <tr><td>021-5310...</td><td>Jakarta Barat - Palmerah</td></tr>
                                                    <tr><td>021-5311...</td><td>Jakarta Barat - Palmerah</td></tr>
                                                    <tr><td>021-5312...</td><td>Tangerang - Serpong</td></tr>
                                                    <tr><td>021-5313...</td><td>Jakarta Barat - Lengkong</td></tr>
                                                    <tr><td>021-532...</td><td>Jakarta Barat - Palmerah</td></tr>
                                                    <tr><td>021-533...</td><td>Jakarta Barat - Palmerah</td></tr>
                                                    <tr><td>021-534...</td><td>Jakarta Barat - Palmerah</td></tr>
                                                    <tr><td>021-535...</td><td>Jakarta Barat - Palmerah</td></tr>
                                                    <tr><td>021-536...</td><td>Jakarta Barat - Palmerah</td></tr>
                                                    <tr><td>021-537...</td><td>Jakarta Barat - Lengkong</td></tr>
                                                    <tr><td>021-538...</td><td>Jakarta Barat - Lengkong</td></tr>
                                                    <tr><td>021-539...</td><td>Jakarta Barat - Cengkareng</td></tr>
                                                    <tr><td>021-54...</td><td>Bekasi - Lippo Karawaci</td></tr>
                                                    <tr><td>021-540...</td><td>Jakarta Barat - Cengkareng</td></tr>
                                                    <tr><td>021-541...</td><td>Jakarta Barat - Cengkareng</td></tr>
                                                    <tr><td>021-5436...</td><td>Jakarta Barat - Cengkareng</td></tr>
                                                    <tr><td>021-5437...</td><td>Duta Garden</td></tr>
                                                    <tr><td>021-5438...</td><td>Jakarta Barat - Cengkareng</td></tr>
                                                    <tr><td>021-5439...</td><td>Jakarta Barat - Cengkareng</td></tr>
                                                    <tr><td>021-544...</td><td>Jakarta Barat - Cengkareng</td></tr>
                                                    <tr><td>021-545...</td><td>Jakarta Barat - Palmerah</td></tr>
                                                    <tr><td>021-548...</td><td>Jakarta Barat - Palmerah</td></tr>
                                                    <tr><td>021-549...</td><td>Jakarta Barat - Palmerah</td></tr>
                                                    <tr><td>021-55...</td><td>Tangerang - Airport</td></tr>
                                                    <tr><td>021-550...</td><td>Jakarta Barat - Buish</td></tr>
                                                    <tr><td>021-552...</td><td>Jakarta Barat - Tegal Alur</td></tr>
                                                    <tr><td>021-555...</td><td>Jakarta Barat - Tegal Alur</td></tr>
                                                    <tr><td>021-556...</td><td>Jakarta Barat - Tegal Alur</td></tr>
                                                    <tr><td>021-5590...</td><td>Jakarta Barat - Buish</td></tr>
                                                    <tr><td>021-5591...</td><td>Jakarta Barat - Buish</td></tr>
                                                    <tr><td>021-5592...</td><td>Jakarta Barat - Buish</td></tr>
                                                    <tr><td>021-5593...</td><td>Tangerang - Kosambi</td></tr>
                                                    <tr><td>021-5594...</td><td>Jakarta Barat - Buish</td></tr>
                                                    <tr><td>021-5595...</td><td>Jakarta Barat - Tegal Alur</td></tr>
                                                    <tr><td>021-5596...</td><td>Jakarta Barat - Tegal Alur</td></tr>
                                                    <tr><td>021-5597...</td><td>Jakarta Barat - Buish</td></tr>
                                                    <tr><td>021-5598...</td><td>Jakarta Barat - Buish</td></tr>
                                                    <tr><td>021-560...</td><td>Jakarta Barat - Slipi</td></tr>
                                                    <tr><td>021-561...</td><td>Jakarta Barat - Slipi</td></tr>
                                                    <tr><td>021-562...</td><td>Jakarta Barat - Slipi</td></tr>
                                                    <tr><td>021-563...</td><td>Jakarta Barat - Slipi</td></tr>
                                                    <tr><td>021-564...</td><td>Jakarta Barat - Slipi</td></tr>
                                                    <tr><td>021-565...</td><td>Jakarta Barat - Slipi</td></tr>
                                                    <tr><td>021-566...</td><td>Jakarta Barat - Slipi</td></tr>
                                                    <tr><td>021-567...</td><td>Jakarta Barat - Slipi</td></tr>
                                                    <tr><td>021-568...</td><td>Jakarta Barat - Slipi</td></tr>
                                                    <tr><td>021-5694...</td><td>Jakarta Barat - Slipi</td></tr>
                                                    <tr><td>021-5695...</td><td>Jakarta Barat - Slipi</td></tr>
                                                    <tr><td>021-5696...</td><td>Jakarta Barat - Slipi</td></tr>
                                                    <tr><td>021-5697...</td><td>Jakarta Barat - Slipi</td></tr>
                                                    <tr><td>021-570...</td><td>Jakarta Selatan - Semanggi</td></tr>
                                                    <tr><td>021-571...</td><td>Jakarta Selatan - Semanggi</td></tr>
                                                    <tr><td>021-572...</td><td>Jakarta Selatan - Semanggi</td></tr>
                                                    <tr><td>021-573...</td><td>Jakarta Selatan - Semanggi</td></tr>
                                                    <tr><td>021-574...</td><td>Jakarta Selatan - Semanggi</td></tr>
                                                    <tr><td>021-575...</td><td>Jakarta Selatan - Semanggi</td></tr>
                                                    <tr><td>021-576...</td><td>Jakarta Selatan - Semanggi</td></tr>
                                                    <tr><td>021-577...</td><td>Jakarta Selatan - Semanggi</td></tr>
                                                    <tr><td>021-5790...</td><td>Jakarta Selatan - Semanggi</td></tr>
                                                    <tr><td>021-5793...</td><td>Jakarta Selatan - Semanggi</td></tr>
                                                    <tr><td>021-5795...</td><td>Jakarta Selatan - Semanggi</td></tr>
                                                    <tr><td>021-580...</td><td>Jakarta Barat - Kedoya</td></tr>
                                                    <tr><td>021-581...</td><td>Jakarta Barat - Kedoya</td></tr>
                                                    <tr><td>021-582...</td><td>Jakarta Barat - Kedoya</td></tr>
                                                    <tr><td>021-5830...</td><td>Jakarta Barat - Kedoya</td></tr>
                                                    <tr><td>021-5835...</td><td>Jakarta Barat - Kedoya</td></tr>
                                                    <tr><td>021-5838...</td><td>Jakarta Barat - Kedoya</td></tr>
                                                    <tr><td>021-5839...</td><td>Jakarta Barat - Kedoya</td></tr>
                                                    <tr><td>021-584...</td><td>Jakarta Barat - Meruya</td></tr>
                                                    <tr><td>021-585...</td><td>Jakarta Barat - Meruya</td></tr>
                                                    <tr><td>021-586...</td><td>Jakarta Barat - Meruya</td></tr>
                                                    <tr><td>021-587...</td><td>Jakarta Barat - Meruya</td></tr>
                                                    <tr><td>021-588...</td><td>Jakarta Barat - Kapuk</td></tr>
                                                    <tr><td>021-5890...</td><td>Jakarta Barat - Meruya</td></tr>
                                                    <tr><td>021-59...</td><td>Tangerang - Gandasari</td></tr>
                                                    <tr><td>021-591...</td><td>Tangerang - Cikupa</td></tr>
                                                    <tr><td>021-596...</td><td>Tangerang - Cikupa</td></tr>
                                                    <tr><td>021-60...</td><td>Jakarta Barat - Mangga Dua</td></tr>
                                                    <tr><td>021-600...</td><td>Jakarta Barat - Mangga Besar</td></tr>
                                                    <tr><td>021-601...</td><td>Jakarta Barat - Mangga Besar</td></tr>
                                                    <tr><td>021-612...</td><td>Jakarta Barat - Mangga Besar</td></tr>
                                                    <tr><td>021-613...</td><td>Jakarta Barat - Mangga Besar</td></tr>
                                                    <tr><td>021-619...</td><td>Jakarta Barat - Cengkareng</td></tr>
                                                    <tr><td>021-6230...</td><td>Jakarta Barat - Mangga Besar</td></tr>
                                                    <tr><td>021-624...</td><td>Jakarta Barat - Mangga Besar</td></tr>
                                                    <tr><td>021-625...</td><td>Jakarta Barat - Mangga Besar</td></tr>
                                                    <tr><td>021-626...</td><td>Jakarta Barat - Mangga Besar</td></tr>
                                                    <tr><td>021-627...</td><td>Jakarta Barat - Mangga Besar</td></tr>
                                                    <tr><td>021-628...</td><td>Jakarta Barat - Mangga Besar</td></tr>
                                                    <tr><td>021-629...</td><td>Jakarta Barat - Mangga Besar</td></tr>
                                                    <tr><td>021-63...</td><td>Jakarta Pusat - Cideng</td></tr>
                                                    <tr><td>021-630...</td><td>Jakarta Pusat - Cideng</td></tr>
                                                    <tr><td>021-631...</td><td>Jakarta Pusat - Cideng</td></tr>
                                                    <tr><td>021-632...</td><td>Jakarta Pusat - Cideng</td></tr>
                                                    <tr><td>021-633...</td><td>Jakarta Pusat - Cideng</td></tr>
                                                    <tr><td>021-634...</td><td>Jakarta Pusat - Cideng</td></tr>
                                                    <tr><td>021-6385...</td><td>Jakarta Pusat - Cideng</td></tr>
                                                    <tr><td>021-6386...</td><td>Jakarta Pusat - Cideng</td></tr>
                                                    <tr><td>021-6387...</td><td>Jakarta Pusat - Cideng</td></tr>
                                                    <tr><td>021-639...</td><td>Jakarta Barat - Mangga Besar</td></tr>
                                                    <tr><td>021-64...</td><td>Jakarta Utara - Ancol</td></tr>
                                                    <tr><td>021-640...</td><td>Jakarta Utara - Pademangan</td></tr>
                                                    <tr><td>021-641...</td><td>Jakarta Utara - Pademangan</td></tr>
                                                    <tr><td>021-645...</td><td>Jakarta Utara - Pademangan</td></tr>
                                                    <tr><td>021-6470...</td><td>Jakarta Utara - Pademangan</td></tr>
                                                    <tr><td>021-648...</td><td>Jakarta Barat - Mangga Besar</td></tr>
                                                    <tr><td>021-649...</td><td>Jakarta Barat - Mangga Besar</td></tr>
                                                    <tr><td>021-65...</td><td>Jakarta Utara - Sunter</td></tr>
                                                    <tr><td>021-650...</td><td>Jakarta Utara - Sunter</td></tr>
                                                    <tr><td>021-651...</td><td>Jakarta Utara - Sunter</td></tr>
                                                    <tr><td>021-652...</td><td>Jakarta Utara - Sunter</td></tr>
                                                    <tr><td>021-6530...</td><td>Jakarta Utara - Sunter</td></tr>
                                                    <tr><td>021-6531...</td><td>Jakarta Utara - Sunter</td></tr>
                                                    <tr><td>021-654...</td><td>Jakarta Pusat - Kemayoran</td></tr>
                                                    <tr><td>021-655...</td><td>Jakarta Pusat - Kemayoran</td></tr>
                                                    <tr><td>021-656...</td><td>Jakarta Pusat - Kemayoran</td></tr>
                                                    <tr><td>021-658...</td><td>Jakarta Barat - Mangga Besar</td></tr>
                                                    <tr><td>021-6583...</td><td>Jakarta Utara - Sunter</td></tr>
                                                    <tr><td>021-6585...</td><td>Jakarta Pusat - Kemayoran</td></tr>
                                                    <tr><td>021-6586...</td><td>Jakarta Pusat - Kemayoran</td></tr>
                                                    <tr><td>021-659...</td><td>Jakarta Barat - Mangga Besar</td></tr>
                                                    <tr><td>021-66...</td><td>Jakarta Utara - Ancol</td></tr>
                                                    <tr><td>021-660...</td><td>Jakarta Utara - Muara Karang</td></tr>
                                                    <tr><td>021-661...</td><td>Jakarta Utara - Muara Karang</td></tr>
                                                    <tr><td>021-662...</td><td>Jakarta Utara - Muara Karang</td></tr>
                                                    <tr><td>021-663...</td><td>Jakarta Utara - Muara Karang</td></tr>
                                                    <tr><td>021-6660...</td><td>Jakarta Utara - Muara Karang</td></tr>
                                                    <tr><td>021-6667...</td><td>Jakarta Utara - Muara Karang</td></tr>
                                                    <tr><td>021-6669...</td><td>Jakarta Utara - Muara Karang</td></tr>
                                                    <tr><td>021-667...</td><td>Jakarta Utara - Muara Karang</td></tr>
                                                    <tr><td>021-668...</td><td>Jakarta Utara - Muara Karang</td></tr>
                                                    <tr><td>021-669...</td><td>Jakarta Utara - Muara Karang</td></tr>
                                                    <tr><td>021-68...</td><td>Jakarta Utara - Pademangan</td></tr>
                                                    <tr><td>021-690...</td><td>Jakarta Barat - Kota</td></tr>
                                                    <tr><td>021-691...</td><td>Jakarta Barat - Kota</td></tr>
                                                    <tr><td>021-692...</td><td>Jakarta Barat - Kota</td></tr>
                                                    <tr><td>021-693...</td><td>Jakarta Barat - Kota</td></tr>
                                                    <tr><td>021-707</td><td>Flexi</td></tr>
                                                    <tr><td>021-7179...</td><td>Jakarta Selatan - Kemang</td></tr>
                                                    <tr><td>021-718...</td><td>Jakarta Selatan - Kemang</td></tr>
                                                    <tr><td>021-719...</td><td>Jakarta Selatan - Kemang</td></tr>
                                                    <tr><td>021-72...</td><td>Jakarta Selatan - Kebayoran</td></tr>
                                                    <tr><td>021-720...</td><td>Jakarta Selatan - Kebayoran Baru</td></tr>
                                                    <tr><td>021-721...</td><td>Jakarta Selatan - Kebayoran Baru</td></tr>
                                                    <tr><td>021-722...</td><td>Jakarta Selatan - Kebayoran Baru</td></tr>
                                                    <tr><td>021-723...</td><td>Jakarta Selatan - Kebayoran Baru</td></tr>
                                                    <tr><td>021-7238...</td><td>Jakarta Selatan - Tanah Kusir</td></tr>
                                                    <tr><td>021-7239...</td><td>Jakarta Selatan - Tanah Kusir</td></tr>
                                                    <tr><td>021-724...</td><td>Jakarta Selatan - Kebayoran Baru</td></tr>
                                                    <tr><td>021-725...</td><td>Jakarta Selatan - Kebayoran Baru</td></tr>
                                                    <tr><td>021-7260...</td><td>Jakarta Selatan - Kebayoran Baru</td></tr>
                                                    <tr><td>021-7265...</td><td>Jakarta Selatan - Kebayoran Baru</td></tr>
                                                    <tr><td>021-727...</td><td>Jakarta Selatan - Jagakarsa</td></tr>
                                                    <tr><td>021-7278...</td><td>Jakarta Selatan - Kebayoran Baru</td></tr>
                                                    <tr><td>021-7279...</td><td>Jakarta Selatan - Kebayoran Baru</td></tr>
                                                    <tr><td>021-7289...</td><td>Jakarta Selatan - Tanah Kusir</td></tr>
                                                    <tr><td>021-729...</td><td>Jakarta Selatan - Tanah Kusir</td></tr>
                                                    <tr><td>021-73...</td><td>Tangerang - Ciledug</td></tr>
                                                    <tr><td>021-730...</td><td>Tangerang - Ciledug</td></tr>
                                                    <tr><td>021-731...</td><td>Tangerang - Ciledug</td></tr>
                                                    <tr><td>021-732...</td><td>Tangerang - Ciledug</td></tr>
                                                    <tr><td>021-733...</td><td>Tangerang - Ciledug</td></tr>
                                                    <tr><td>021-734...</td><td>Tangerang - Bintaro</td></tr>
                                                    <tr><td>021-7344...</td><td>Tangerang - Ciledug</td></tr>
                                                    <tr><td>021-7345...</td><td>Tangerang - Ciledug</td></tr>
                                                    <tr><td>021-735...</td><td>Tangerang - Bintaro</td></tr>
                                                    <tr><td>021-736...</td><td>Tangerang - Bintaro</td></tr>
                                                    <tr><td>021-7369...</td><td>Tangerang - Bintaro</td></tr>
                                                    <tr><td>021-737...</td><td>Tangerang - Bintaro</td></tr>
                                                    <tr><td>021-7388...</td><td>Tangerang - Bintaro</td></tr>
                                                    <tr><td>021-739...</td><td>Tangerang Selatan - Ciputat</td></tr>
                                                    <tr><td>021-74...</td><td>Tangerang Selatan - Ciputat</td></tr>
                                                    <tr><td>021-740...</td><td>Tangerang Selatan - Ciputat</td></tr>
                                                    <tr><td>021-741...</td><td>Tangerang Selatan - Ciputat</td></tr>
                                                    <tr><td>021-742...</td><td>Tangerang Selatan - Ciputat</td></tr>
                                                    <tr><td>021-743...</td><td>Tangerang Selatan - Ciputat</td></tr>
                                                    <tr><td>021-744...</td><td>Tangerang Selatan - Ciputat</td></tr>
                                                    <tr><td>021-745...</td><td>Tangerang Selatan - Pondok Aren</td></tr>
                                                    <tr><td>021-7463...</td><td>Tangerang - Serua Indah</td></tr>
                                                    <tr><td>021-7464...</td><td>Tangerang - Serua Indah</td></tr>
                                                    <tr><td>021-7470...</td><td>Tangerang Selatan - Ciputat</td></tr>
                                                    <tr><td>021-7471...</td><td>Tangerang Selatan - Ciputat</td></tr>
                                                    <tr><td>021-7486...</td><td>Tangerang Selatan - Pondok Aren</td></tr>
                                                    <tr><td>021-749...</td><td>Tangerang Selatan - Ciputat</td></tr>
                                                    <tr><td>021-750...</td><td>Jakarta Selatan - Cipete</td></tr>
                                                    <tr><td>021-751...</td><td>Jakarta Selatan - Cipete</td></tr>
                                                    <tr><td>021-752...</td><td>Depok - Cinere</td></tr>
                                                    <tr><td>021-753...</td><td>Depok - Cinere</td></tr>
                                                    <tr><td>021-754...</td><td>Depok - Cinere</td></tr>
                                                    <tr><td>021-755...</td><td>Depok - Cinere</td></tr>
                                                    <tr><td>021-756...</td><td>Tangerang - Serpong</td></tr>
                                                    <tr><td>021-7581...</td><td>Jakarta Selatan - Cipete</td></tr>
                                                    <tr><td>021-7590...</td><td>Jakarta Selatan - Cipete</td></tr>
                                                    <tr><td>021-7591...</td><td>Jakarta Selatan - Cipete</td></tr>
                                                    <tr><td>021-765...</td><td>Jakarta Selatan - Cipete</td></tr>
                                                    <tr><td>021-766...</td><td>Jakarta Selatan - Cipete</td></tr>
                                                    <tr><td>021-769...</td><td>Jakarta Selatan - Cipete</td></tr>
                                                    <tr><td>021-77...</td><td>Jakarta Selatan - Pasar Minggu</td></tr>
                                                    <tr><td>021-78...</td><td>Jakarta Selatan - Jagakarsa</td></tr>
                                                    <tr><td>021-780...</td><td>Jakarta Selatan - Pasar Minggu</td></tr>
                                                    <tr><td>021-781...</td><td>Jakarta Selatan - Pasar Minggu</td></tr>
                                                    <tr><td>021-782...</td><td>Jakarta Selatan - Pasar Minggu</td></tr>
                                                    <tr><td>021-786...</td><td>Jakarta Selatan - Jagakarsa</td></tr>
                                                    <tr><td>021-787...</td><td>Jakarta Selatan - Jagakarsa</td></tr>
                                                    <tr><td>021-7883...</td><td>Jakarta Selatan - Pasar Minggu</td></tr>
                                                    <tr><td>021-7888...</td><td>Jakarta Selatan - Jagakarsa</td></tr>
                                                    <tr><td>021-7889...</td><td>Jakarta Selatan - Jagakarsa</td></tr>
                                                    <tr><td>021-790...</td><td>Jakarta Selatan - Kalibata</td></tr>
                                                    <tr><td>021-7918...</td><td>Jakarta Selatan - Kalibata</td></tr>
                                                    <tr><td>021-7919...</td><td>Jakarta Selatan - Kalibata</td></tr>
                                                    <tr><td>021-794...</td><td>Jakarta Selatan - Kalibata</td></tr>
                                                    <tr><td>021-797...</td><td>Jakarta Selatan - Kalibata</td></tr>
                                                    <tr><td>021-798...</td><td>Jakarta Selatan - Kalibata</td></tr>
                                                    <tr><td>021-799...</td><td>Jakarta Selatan - Kalibata</td></tr>
                                                    <tr><td>021-800...</td><td>Jakarta Timur - Cawang</td></tr>
                                                    <tr><td>021-801...</td><td>Jakarta Timur - Cawang</td></tr>
                                                    <tr><td>021-8088...</td><td>Jakarta Timur - Cawang</td></tr>
                                                    <tr><td>021-809...</td><td>Jakarta Timur - Cawang</td></tr>
                                                    <tr><td>021-819...</td><td>Jakarta Timur - Jatinegara</td></tr>
                                                    <tr><td>021-82...</td><td>Bogor - Cileungsi</td></tr>
                                                    <tr><td>021-823...</td><td>Bekasi - Bantar Gebang</td></tr>
                                                    <tr><td>021-825...</td><td>Jakarta Selatan - Tebet</td></tr>
                                                    <tr><td>021-828...</td><td>Jakarta Selatan - Tebet</td></tr>
                                                    <tr><td>021-829...</td><td>Jakarta Selatan - Tebet</td></tr>
                                                    <tr><td>021-830...</td><td>Jakarta Selatan - Tebet</td></tr>
                                                    <tr><td>021-831...</td><td>Jakarta Selatan - Tebet</td></tr>
                                                    <tr><td>021-835...</td><td>Jakarta Selatan - Tebet</td></tr>
                                                    <tr><td>021-8370...</td><td>Jakarta Selatan - Tebet</td></tr>
                                                    <tr><td>021-8379...</td><td>Jakarta Selatan - Tebet</td></tr>
                                                    <tr><td>021-838...</td><td>Jakarta Selatan - Tebet</td></tr>
                                                    <tr><td>021-840...</td><td>Jakarta Timur - Pasar Rebo</td></tr>
                                                    <tr><td>021-841...</td><td>Jakarta Timur - Pasar Rebo</td></tr>
                                                    <tr><td>021-843...</td><td>Bekasi - Kranggan</td></tr>
                                                    <tr><td>021-844...</td><td>Bekasi - Kranggan</td></tr>
                                                    <tr><td>021-845...</td><td>Bekasi - Kranggan</td></tr>
                                                    <tr><td>021-8457...</td><td>Bekasi - Kranggan</td></tr>
                                                    <tr><td>021-8459...</td><td>Bekasi - Kranggan</td></tr>
                                                    <tr><td>021-846...</td><td>Bekasi - Pondokgede</td></tr>
                                                    <tr><td>021-847...</td><td>Bekasi - Pondokgede</td></tr>
                                                    <tr><td>021-848...</td><td>Bekasi - Pondokgede</td></tr>
                                                    <tr><td>021-849...</td><td>Bekasi - Pondokgede</td></tr>
                                                    <tr><td>021-8497...</td><td>Bekasi - Pondokgede</td></tr>
                                                    <tr><td>021-8499...</td><td>Bekasi - Pondokgede</td></tr>
                                                    <tr><td>021-850...</td><td>Jakarta Timur - Jatinegara</td></tr>
                                                    <tr><td>021-851...</td><td>Jakarta Timur - Jatinegara</td></tr>
                                                    <tr><td>021-852...</td><td>Jakarta Timur - Jatinegara</td></tr>
                                                    <tr><td>021-856...</td><td>Jakarta Timur - Jatinegara</td></tr>
                                                    <tr><td>021-857...</td><td>Jakarta Timur - Jatinegara</td></tr>
                                                    <tr><td>021-858...</td><td>Jakarta Timur - Jatinegara</td></tr>
                                                    <tr><td>021-8590...</td><td>Jakarta Timur - Jatinegara</td></tr>
                                                    <tr><td>021-8591...</td><td>Jakarta Timur - Jatinegara</td></tr>
                                                    <tr><td>021-860...</td><td>Jakarta Timur - Klender</td></tr>
                                                    <tr><td>021-861...</td><td>Jakarta Timur - Klender</td></tr>
                                                    <tr><td>021-862...</td><td>Jakarta Timur - Klender</td></tr>
                                                    <tr><td>021-863...</td><td>Jakarta Timur - Klender</td></tr>
                                                    <tr><td>021-864...</td><td>Jakarta Timur - Pondok Kelapa</td></tr>
                                                    <tr><td>021-865...</td><td>Jakarta Timur - Pondok Kelapa</td></tr>
                                                    <tr><td>021-8660...</td><td>Jakarta Timur - Klender</td></tr>
                                                    <tr><td>021-8661...</td><td>Jakarta Timur - Klender</td></tr>
                                                    <tr><td>021-867...</td><td>Jakarta Selatan - Gandaria</td></tr>
                                                    <tr><td>021-8690...</td><td>Jakarta Timur - Pondok Kelapa</td></tr>
                                                    <tr><td>021-87...</td><td>Depok - Cibubur</td></tr>
                                                    <tr><td>021-870...</td><td>Jakarta Selatan - Gandaria</td></tr>
                                                    <tr><td>021-871...</td><td>Jakarta Selatan - Gandaria</td></tr>
                                                    <tr><td>021-872...</td><td>Jakarta Selatan - Gandaria</td></tr>
                                                    <tr><td>021-873...</td><td>Depok - Cibubur</td></tr>
                                                    <tr><td>021-874...</td><td>Depok - Cisalak</td></tr>
                                                    <tr><td>021-875...</td><td>Bogor - Cibinong</td></tr>
                                                    <tr><td>021-876...</td><td>Bogor - Cibinong</td></tr>
                                                    <tr><td>021-877...</td><td>Bogor - Cibinong</td></tr>
                                                    <tr><td>021-8770...</td><td>Jakarta Selatan - Gandaria</td></tr>
                                                    <tr><td>021-8771...</td><td>Jakarta Selatan - Gandaria</td></tr>
                                                    <tr><td>021-8774...</td><td>Depok - Cisalak</td></tr>
                                                    <tr><td>021-8775...</td><td>Depok - Cibubur</td></tr>
                                                    <tr><td>021-8779...</td><td>Jakarta Timur - Pasar Rebo</td></tr>
                                                    <tr><td>021-878...</td><td>Bekasi</td></tr>
                                                    <tr><td>021-88...</td><td>Bekasi</td></tr>
                                                    <tr><td>021-881...</td><td>Bekasi - Kranji</td></tr>
                                                    <tr><td>021-884...</td><td>Bekasi - Kranji</td></tr>
                                                    <tr><td>021-885...</td><td>Bekasi - Kaliabang</td></tr>
                                                    <tr><td>021-89...</td><td>Bekasi - Jababeka</td></tr>
                                                    <tr><td>021-893...</td><td>Bekasi - Lippo Cikarang</td></tr>
                                                    <tr><td>021-897...</td><td>Bekasi</td></tr>
                                                    <tr><td>021-898...</td><td>Bekasi</td></tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            <div class="tab-pane fade" id="pills-othersarea" role="tabpanel" aria-labelledby="pills-othersarea-tab">
                                <div class="tab-pane fade show active" id="pills-othersarea" role="tabpanel" aria-labelledby="pills-othersarea-tab">
                                    <div class="row mt-5">
                                        <div class="col-8">
                                            <table class="table table-sm table-hover" id="othersPhoneprefixTableOthersarea">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Digit awal no telp</th>
                                                        <th>Area</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr><td>1</td><td>022</td><td>Bandung</td></tr>
                                                    <tr><td>2</td><td>0221</td><td>Bandung - Sentrum</td></tr>
                                                    <tr><td>3</td><td>02213</td><td>Bandung - Sentrum</td></tr>
                                                    <tr><td>4</td><td>022270</td><td>Bandung - Cisarua</td></tr>
                                                    <tr><td>5</td><td>022250</td><td>Bandung - Dago</td></tr>
                                                    <tr><td>6</td><td>022251</td><td>Bandung - Dago</td></tr>
                                                    <tr><td>7</td><td>022252</td><td>Bandung - Dago</td></tr>
                                                    <tr><td>8</td><td>022253</td><td>Bandung - Dago</td></tr>
                                                    <tr><td>9</td><td>022255</td><td>Bandung - Dago</td></tr>
                                                    <tr><td>10</td><td>02221</td><td>Bandung - Gegerkalong</td></tr>
                                                    <tr><td>11</td><td>022200</td><td>Bandung - Gegerkalong</td></tr>
                                                    <tr><td>12</td><td>022202</td><td>Bandung - Gegerkalong</td></tr>
                                                    <tr><td>13</td><td>022205</td><td>Bandung - Gegerkalong</td></tr>
                                                    <tr><td>14</td><td>02223</td><td>Bandung - Hegarmanah</td></tr>
                                                    <tr><td>15</td><td>022203</td><td>Bandung - Hegarmanah</td></tr>
                                                    <tr><td>16</td><td>022204</td><td>Bandung - Hegarmanah</td></tr>
                                                    <tr><td>17</td><td>022206</td><td>Bandung - Hegarmanah</td></tr>
                                                    <tr><td>18</td><td>022276</td><td>Bandung - Lembang</td></tr>
                                                    <tr><td>19</td><td>022278</td><td>Bandung - Lembang</td></tr>
                                                    <tr><td>20</td><td>022299</td><td>Bandung - Sentrum</td></tr>
                                                    <tr><td>21</td><td>02230</td><td>Bandung - Turangga</td></tr>
                                                    <tr><td>22</td><td>02231</td><td>Bandung - Turangga</td></tr>
                                                    <tr><td>23</td><td>02232</td><td>Bandung - Turangga</td></tr>
                                                    <tr><td>24</td><td>022457</td><td>Bandung - Gegerkalong</td></tr>
                                                    <tr><td>25</td><td>02243</td><td>Bandung - Sentrum</td></tr>
                                                    <tr><td>26</td><td>02244</td><td>Bandung - Sentrum</td></tr>
                                                    <tr><td>27</td><td>022420</td><td>Bandung - Sentrum</td></tr>
                                                    <tr><td>28</td><td>022421</td><td>Bandung - Sentrum</td></tr>
                                                    <tr><td>29</td><td>022422</td><td>Bandung - Sentrum</td></tr>
                                                    <tr><td>30</td><td>022423</td><td>Bandung - Sentrum</td></tr>
                                                    <tr><td>31</td><td>022424</td><td>Bandung - Sentrum</td></tr>
                                                    <tr><td>32</td><td>022425</td><td>Bandung - Sentrum</td></tr>
                                                    <tr><td>33</td><td>022426</td><td>Bandung - Sentrum</td></tr>
                                                    <tr><td>34</td><td>022427</td><td>Bandung - Sentrum</td></tr>
                                                    <tr><td>35</td><td>022445</td><td>Bandung - Sentrum</td></tr>
                                                    <tr><td>36</td><td>022451</td><td>Bandung - Sentrum</td></tr>
                                                    <tr><td>37</td><td>022452</td><td>Bandung - Sentrum</td></tr>
                                                    <tr><td>38</td><td>022453</td><td>Bandung - Sentrum</td></tr>
                                                    <tr><td>39</td><td>022454</td><td>Bandung - Sentrum</td></tr>
                                                    <tr><td>40</td><td>022455</td><td>Bandung - Sentrum</td></tr>
                                                    <tr><td>41</td><td>022456</td><td>Bandung - Sentrum</td></tr>
                                                    <tr><td>42</td><td>0224150</td><td>Bandung - Sentrum</td></tr>
                                                    <tr><td>43</td><td>022540</td><td>Bandung - Kopo</td></tr>
                                                    <tr><td>44</td><td>022541</td><td>Bandung - Kopo</td></tr>
                                                    <tr><td>45</td><td>022542</td><td>Bandung - Kopo</td></tr>
                                                    <tr><td>46</td><td>022543</td><td>Bandung - Kopo</td></tr>
                                                    <tr><td>47</td><td>022544</td><td>Bandung - Kopo</td></tr>
                                                    <tr><td>48</td><td>022520</td><td>Bandung - Tegallega</td></tr>
                                                    <tr><td>49</td><td>022521</td><td>Bandung - Tegallega</td></tr>
                                                    <tr><td>50</td><td>022522</td><td>Bandung - Tegallega</td></tr>
                                                    <tr><td>51</td><td>022523</td><td>Bandung - Tegallega</td></tr>
                                                    <tr><td>52</td><td>022524</td><td>Bandung - Tegallega</td></tr>
                                                    <tr><td>53</td><td>022593</td><td>Banjaran</td></tr>
                                                    <tr><td>54</td><td>022594</td><td>Banjaran</td></tr>
                                                    <tr><td>55</td><td>022592</td><td>Ciwidey</td></tr>
                                                    <tr><td>56</td><td>022595</td><td>Majalaya</td></tr>
                                                    <tr><td>57</td><td>022597</td><td>Pangalengan</td></tr>
                                                    <tr><td>58</td><td>022588</td><td>Soreang</td></tr>
                                                    <tr><td>59</td><td>022589</td><td>Soreang</td></tr>
                                                    <tr><td>60</td><td>022686</td><td>Bandung - Batujajar</td></tr>
                                                    <tr><td>61</td><td>022697</td><td>Bandung - Cikalongwetan</td></tr>
                                                    <tr><td>62</td><td>0226950</td><td>Bandung - Gununghalu</td></tr>
                                                    <tr><td>63</td><td>022694</td><td>Bandung - Hegarmanah</td></tr>
                                                    <tr><td>64</td><td>022667</td><td>Bandung - Nanjung</td></tr>
                                                    <tr><td>65</td><td>022668</td><td>Bandung - Nanjung</td></tr>
                                                    <tr><td>66</td><td>02263</td><td>Bandung - Rajawali</td></tr>
                                                    <tr><td>67</td><td>02264</td><td>Bandung - Rajawali</td></tr>
                                                    <tr><td>68</td><td>02267</td><td>Bandung - Rajawali</td></tr>
                                                    <tr><td>69</td><td>022600</td><td>Bandung - Rajawali</td></tr>
                                                    <tr><td>70</td><td>022601</td><td>Bandung - Rajawali</td></tr>
                                                    <tr><td>71</td><td>022602</td><td>Bandung - Rajawali</td></tr>
                                                    <tr><td>72</td><td>022603</td><td>Bandung - Rajawali</td></tr>
                                                    <tr><td>73</td><td>022604</td><td>Bandung - Rajawali</td></tr>
                                                    <tr><td>74</td><td>022606</td><td>Bandung - Rajawali</td></tr>
                                                    <tr><td>75</td><td>022607</td><td>Bandung - Rajawali</td></tr>
                                                    <tr><td>76</td><td>022608</td><td>Bandung - Rajawali</td></tr>
                                                    <tr><td>77</td><td>022609</td><td>Bandung - Rajawali</td></tr>
                                                    <tr><td>78</td><td>022612</td><td>Bandung - Rajawali</td></tr>
                                                    <tr><td>79</td><td>022625</td><td>Bandung - Sentrum</td></tr>
                                                    <tr><td>80</td><td>022690</td><td>Bandung Barat - Cipatat</td></tr>
                                                    <tr><td>81</td><td>022680</td><td>Bandung Barat - Padalarang</td></tr>
                                                    <tr><td>82</td><td>022661</td><td>Cimahi</td></tr>
                                                    <tr><td>83</td><td>022662</td><td>Cimahi</td></tr>
                                                    <tr><td>84</td><td>022663</td><td>Cimahi</td></tr>
                                                    <tr><td>85</td><td>022664</td><td>Cimahi</td></tr>
                                                    <tr><td>86</td><td>022665</td><td>Cimahi</td></tr>
                                                    <tr><td>87</td><td>02270</td><td>Bandung - Cicadas</td></tr>
                                                    <tr><td>88</td><td>02277</td><td>Bandung - Cicadas</td></tr>
                                                    <tr><td>89</td><td>022710</td><td>Bandung - Cicadas</td></tr>
                                                    <tr><td>90</td><td>022711</td><td>Bandung - Cicadas</td></tr>
                                                    <tr><td>91</td><td>022712</td><td>Bandung - Cicadas</td></tr>
                                                    <tr><td>92</td><td>022713</td><td>Bandung - Cicadas</td></tr>
                                                    <tr><td>93</td><td>022714</td><td>Bandung - Cicadas</td></tr>
                                                    <tr><td>94</td><td>022715</td><td>Bandung - Cicadas</td></tr>
                                                    <tr><td>95</td><td>022721</td><td>Bandung - Cicadas</td></tr>
                                                    <tr><td>96</td><td>022723</td><td>Bandung - Cicadas</td></tr>
                                                    <tr><td>97</td><td>022725</td><td>Bandung - Cicadas</td></tr>
                                                    <tr><td>98</td><td>022727</td><td>Bandung - Cicadas</td></tr>
                                                    <tr><td>99</td><td>022750</td><td>Bandung - Cijaura</td></tr>
                                                    <tr><td>100</td><td>022751</td><td>Bandung - Cijaura</td></tr>
                                                    <tr><td>101</td><td>022753</td><td>Bandung - Cijaura</td></tr>
                                                    <tr><td>102</td><td>022754</td><td>Bandung - Cijaura</td></tr>
                                                    <tr><td>103</td><td>022756</td><td>Bandung - Cijaura</td></tr>
                                                    <tr><td>104</td><td>022730</td><td>Bandung - Turangga</td></tr>
                                                    <tr><td>105</td><td>022731</td><td>Bandung - Turangga</td></tr>
                                                    <tr><td>106</td><td>022732</td><td>Bandung - Turangga</td></tr>
                                                    <tr><td>107</td><td>022733</td><td>Bandung - Turangga</td></tr>
                                                    <tr><td>108</td><td>0227350</td><td>Bandung - Turangga</td></tr>
                                                    <tr><td>109</td><td>022794</td><td>Cicalengka</td></tr>
                                                    <tr><td>110</td><td>022779</td><td>Rancaekek</td></tr>
                                                    <tr><td>111</td><td>022796</td><td>Rancaekek</td></tr>
                                                    <tr><td>112</td><td>022797</td><td>Rancaekek</td></tr>
                                                    <tr><td>113</td><td>022798</td><td>Rancaekek</td></tr>
                                                    <tr><td>114</td><td>022791</td><td>Tanjungsari</td></tr>
                                                    <tr><td>115</td><td>022780</td><td>Ujungberung</td></tr>
                                                    <tr><td>116</td><td>022781</td><td>Ujungberung</td></tr>
                                                    <tr><td>117</td><td>022783</td><td>Ujungberung</td></tr>
                                                    <tr><td>118</td><td>022784</td><td>Ujungberung</td></tr>
                                                    <tr><td>119</td><td>0229110</td><td>Bandung - Sentrum</td></tr>
                                                    <tr><td>120</td><td>023135</td><td>Arjawinangun</td></tr>
                                                    <tr><td>121</td><td>0231</td><td>Cirebon</td></tr>
                                                    <tr><td>122</td><td>02311</td><td>Cirebon</td></tr>
                                                    <tr><td>123</td><td>023113</td><td>Cirebon</td></tr>
                                                    <tr><td>124</td><td>023120</td><td>Cirebon</td></tr>
                                                    <tr><td>125</td><td>023121</td><td>Cirebon</td></tr>
                                                    <tr><td>126</td><td>023122</td><td>Cirebon</td></tr>
                                                    <tr><td>127</td><td>023123</td><td>Cirebon</td></tr>
                                                    <tr><td>128</td><td>023124</td><td>Cirebon</td></tr>
                                                    <tr><td>129</td><td>0231251</td><td>Cirebon</td></tr>
                                                    <tr><td>130</td><td>0231255</td><td>Cirebon</td></tr>
                                                    <tr><td>131</td><td>023151</td><td>Cirebon - Kanci</td></tr>
                                                    <tr><td>132</td><td>023148</td><td>Cirebon - Karyamulya</td></tr>
                                                    <tr><td>133</td><td>023134</td><td>Jamblang</td></tr>
                                                    <tr><td>134</td><td>023183</td><td>Losari</td></tr>
                                                    <tr><td>135</td><td>023166</td><td>Pabuaran</td></tr>
                                                    <tr><td>136</td><td>023132</td><td>Pleredcirebon</td></tr>
                                                    <tr><td>137</td><td>023163</td><td>Sindanglaut</td></tr>
                                                    <tr><td>138</td><td>02326</td><td>Cilimus</td></tr>
                                                    <tr><td>139</td><td>023261</td><td>Cilimus</td></tr>
                                                    <tr><td>140</td><td>0232</td><td>Kuningan</td></tr>
                                                    <tr><td>141</td><td>02321</td><td>Kuningan</td></tr>
                                                    <tr><td>142</td><td>02328</td><td>Kuningan</td></tr>
                                                    <tr><td>143</td><td>023287</td><td>Kuningan</td></tr>
                                                    <tr><td>144</td><td>02333</td><td>Cikijing</td></tr>
                                                    <tr><td>145</td><td>023331</td><td>Cikijing</td></tr>
                                                    <tr><td>146</td><td>02338</td><td>Jatiwangi</td></tr>
                                                    <tr><td>147</td><td>023388</td><td>Jatiwangi</td></tr>
                                                    <tr><td>148</td><td>02336</td><td>Kadipaten</td></tr>
                                                    <tr><td>149</td><td>023366</td><td>Kadipaten</td></tr>
                                                    <tr><td>150</td><td>0233</td><td>Majalengka</td></tr>
                                                    <tr><td>151</td><td>02331</td><td>Majalengka</td></tr>
                                                    <tr><td>152</td><td>02332</td><td>Majalengka</td></tr>
                                                    <tr><td>153</td><td>023328</td><td>Majalengka</td></tr>
                                                    <tr><td>154</td><td>023351</td><td>Rajagaluh</td></tr>
                                                    <tr><td>155</td><td>023442</td><td>Balongan</td></tr>
                                                    <tr><td>156</td><td>02347</td><td>Haurgeulis</td></tr>
                                                    <tr><td>157</td><td>023474</td><td>Haurgeulis</td></tr>
                                                    <tr><td>158</td><td>0234</td><td>Indramayu</td></tr>
                                                    <tr><td>159</td><td>02341</td><td>Indramayu</td></tr>
                                                    <tr><td>160</td><td>023420</td><td>Indramayu</td></tr>
                                                    <tr><td>161</td><td>023421</td><td>Indramayu</td></tr>
                                                    <tr><td>162</td><td>023422</td><td>Indramayu</td></tr>
                                                    <tr><td>163</td><td>023423</td><td>Indramayu</td></tr>
                                                    <tr><td>164</td><td>023424</td><td>Indramayu</td></tr>
                                                    <tr><td>165</td><td>023425</td><td>Indramayu</td></tr>
                                                    <tr><td>166</td><td>023426</td><td>Indramayu</td></tr>
                                                    <tr><td>167</td><td>023427</td><td>Indramayu</td></tr>
                                                    <tr><td>168</td><td>023428</td><td>Indramayu</td></tr>
                                                    <tr><td>169</td><td>023429</td><td>Indramayu</td></tr>
                                                    <tr><td>170</td><td>02343</td><td>Jatibarang</td></tr>
                                                    <tr><td>171</td><td>023435</td><td>Jatibarang</td></tr>
                                                    <tr><td>172</td><td>023448</td><td>Karangampel</td></tr>
                                                    <tr><td>173</td><td>02345</td><td>Losarang</td></tr>
                                                    <tr><td>174</td><td>023450</td><td>Losarang</td></tr>
                                                    <tr><td>175</td><td>023461</td><td>Patrol</td></tr>
                                                    <tr><td>176</td><td>024</td><td>Semarang</td></tr>
                                                    <tr><td>177</td><td>02413005</td><td>Banyumanik</td></tr>
                                                    <tr><td>178</td><td>02413033</td><td>Banyumanik</td></tr>
                                                    <tr><td>179</td><td>0241</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>180</td><td>02413088</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>181</td><td>02413000</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>182</td><td>02413099</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>183</td><td>02413022</td><td>Semarang - Tugu</td></tr>
                                                    <tr><td>184</td><td>02421</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>185</td><td>02422</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>186</td><td>0242990</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>187</td><td>024352</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>188</td><td>024358</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>189</td><td>0243400</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>190</td><td>0243570</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>191</td><td>0243571</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>192</td><td>0243572</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>193</td><td>0243573</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>194</td><td>0243574</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>195</td><td>0243575</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>196</td><td>0243576</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>197</td><td>024301</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>198</td><td>024310</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>199</td><td>024311</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>200</td><td>024312</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>201</td><td>024313</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>202</td><td>024314</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>203</td><td>024315</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>204</td><td>024316</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>205</td><td>024317</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>206</td><td>024318</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>207</td><td>024319</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>208</td><td>024470</td><td>Banyumanik</td></tr>
                                                    <tr><td>209</td><td>024471</td><td>Banyumanik</td></tr>
                                                    <tr><td>210</td><td>024472</td><td>Banyumanik</td></tr>
                                                    <tr><td>211</td><td>024473</td><td>Banyumanik</td></tr>
                                                    <tr><td>212</td><td>024474</td><td>Banyumanik</td></tr>
                                                    <tr><td>213</td><td>024475</td><td>Banyumanik</td></tr>
                                                    <tr><td>214</td><td>024476</td><td>Banyumanik</td></tr>
                                                    <tr><td>215</td><td>024477</td><td>Banyumanik</td></tr>
                                                    <tr><td>216</td><td>024478</td><td>Banyumanik</td></tr>
                                                    <tr><td>217</td><td>024479</td><td>Banyumanik</td></tr>
                                                    <tr><td>218</td><td>02444</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>219</td><td>024410</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>220</td><td>024411</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>221</td><td>024412</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>222</td><td>024413</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>223</td><td>024414</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>224</td><td>024415</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>225</td><td>024416</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>226</td><td>024417</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>227</td><td>024418</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>228</td><td>024419</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>229</td><td>024450</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>230</td><td>024451</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>231</td><td>024452</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>232</td><td>024453</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>233</td><td>024454</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>234</td><td>024456</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>235</td><td>024457</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>236</td><td>024458</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>237</td><td>024459</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>238</td><td>024580</td><td>Semarang - Genuk</td></tr>
                                                    <tr><td>239</td><td>024581</td><td>Semarang - Genuk</td></tr>
                                                    <tr><td>240</td><td>024582</td><td>Semarang - Genuk</td></tr>
                                                    <tr><td>241</td><td>024583</td><td>Semarang - Genuk</td></tr>
                                                    <tr><td>242</td><td>024584</td><td>Semarang - Genuk</td></tr>
                                                    <tr><td>243</td><td>024585</td><td>Semarang - Genuk</td></tr>
                                                    <tr><td>244</td><td>024586</td><td>Semarang - Genuk</td></tr>
                                                    <tr><td>245</td><td>024587</td><td>Semarang - Genuk</td></tr>
                                                    <tr><td>246</td><td>024501</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>247</td><td>024504</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>248</td><td>024510</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>249</td><td>024511</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>250</td><td>024512</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>251</td><td>024513</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>252</td><td>024514</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>253</td><td>024515</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>254</td><td>024516</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>255</td><td>024517</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>256</td><td>024518</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>257</td><td>024519</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>258</td><td>024520</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>259</td><td>024521</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>260</td><td>024522</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>261</td><td>024523</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>262</td><td>024524</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>263</td><td>024525</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>264</td><td>024526</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>265</td><td>024527</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>266</td><td>024528</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>267</td><td>024529</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>268</td><td>024540</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>269</td><td>024541</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>270</td><td>024542</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>271</td><td>024543</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>272</td><td>024544</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>273</td><td>024545</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>274</td><td>024546</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>275</td><td>024547</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>276</td><td>024548</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>277</td><td>024549</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>278</td><td>024550</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>279</td><td>024551</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>280</td><td>024552</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>281</td><td>024553</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>282</td><td>024554</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>283</td><td>024555</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>284</td><td>024556</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>285</td><td>024557</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>286</td><td>024558</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>287</td><td>024559</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>288</td><td>024560</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>289</td><td>024561</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>290</td><td>024562</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>291</td><td>024563</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>292</td><td>024564</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>293</td><td>024565</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>294</td><td>024566</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>295</td><td>024567</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>296</td><td>024568</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>297</td><td>024569</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>298</td><td>024570</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>299</td><td>024571</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>300</td><td>024572</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>301</td><td>024573</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>302</td><td>024574</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>303</td><td>024575</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>304</td><td>024576</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>305</td><td>024577</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>306</td><td>024578</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>307</td><td>024579</td><td>Semarang - Johar</td></tr>
                                                    <tr><td>308</td><td>0246511</td><td>Semarang - Genuk</td></tr>
                                                    <tr><td>309</td><td>0246590</td><td>Semarang - Genuk</td></tr>
                                                    <tr><td>310</td><td>0246591</td><td>Semarang - Genuk</td></tr>
                                                    <tr><td>311</td><td>0246592</td><td>Semarang - Genuk</td></tr>
                                                    <tr><td>312</td><td>0246593</td><td>Semarang - Genuk</td></tr>
                                                    <tr><td>313</td><td>0246594</td><td>Semarang - Genuk</td></tr>
                                                    <tr><td>314</td><td>0246595</td><td>Semarang - Genuk</td></tr>
                                                    <tr><td>315</td><td>0246596</td><td>Semarang - Genuk</td></tr>
                                                    <tr><td>316</td><td>0246700</td><td>Semarang - Majapahit</td></tr>
                                                    <tr><td>317</td><td>0246701</td><td>Semarang - Majapahit</td></tr>
                                                    <tr><td>318</td><td>0246702</td><td>Semarang - Majapahit</td></tr>
                                                    <tr><td>319</td><td>0246703</td><td>Semarang - Majapahit</td></tr>
                                                    <tr><td>320</td><td>0246704</td><td>Semarang - Majapahit</td></tr>
                                                    <tr><td>321</td><td>0246705</td><td>Semarang - Majapahit</td></tr>
                                                    <tr><td>322</td><td>0246706</td><td>Semarang - Majapahit</td></tr>
                                                    <tr><td>323</td><td>0246707</td><td>Semarang - Majapahit</td></tr>
                                                    <tr><td>324</td><td>0246708</td><td>Semarang - Majapahit</td></tr>
                                                    <tr><td>325</td><td>0246709</td><td>Semarang - Majapahit</td></tr>
                                                    <tr><td>326</td><td>0246730</td><td>Semarang - Majapahit</td></tr>
                                                    <tr><td>327</td><td>0246731</td><td>Semarang - Majapahit</td></tr>
                                                    <tr><td>328</td><td>0246732</td><td>Semarang - Majapahit</td></tr>
                                                    <tr><td>329</td><td>0246733</td><td>Semarang - Majapahit</td></tr>
                                                    <tr><td>330</td><td>0246734</td><td>Semarang - Majapahit</td></tr>
                                                    <tr><td>331</td><td>0246735</td><td>Semarang - Majapahit</td></tr>
                                                    <tr><td>332</td><td>0246736</td><td>Semarang - Majapahit</td></tr>
                                                    <tr><td>333</td><td>0246748</td><td>Semarang - Majapahit</td></tr>
                                                    <tr><td>334</td><td>0246749</td><td>Semarang - Majapahit</td></tr>
                                                    <tr><td>335</td><td>0246772</td><td>Semarang - Majapahit</td></tr>
                                                    <tr><td>336</td><td>024660</td><td>Semarang - Mangkang</td></tr>
                                                    <tr><td>337</td><td>024661</td><td>Semarang - Mangkang</td></tr>
                                                    <tr><td>338</td><td>024662</td><td>Semarang - Mangkang</td></tr>
                                                    <tr><td>339</td><td>024663</td><td>Semarang - Mangkang</td></tr>
                                                    <tr><td>340</td><td>024664</td><td>Semarang - Mangkang</td></tr>
                                                    <tr><td>341</td><td>024665</td><td>Semarang - Mangkang</td></tr>
                                                    <tr><td>342</td><td>024666</td><td>Semarang - Mangkang</td></tr>
                                                    <tr><td>343</td><td>024667</td><td>Semarang - Mangkang</td></tr>
                                                    <tr><td>344</td><td>024668</td><td>Semarang - Mangkang</td></tr>
                                                    <tr><td>345</td><td>024669</td><td>Semarang - Mangkang</td></tr>
                                                    <tr><td>346</td><td>024600</td><td>Semarang - Tugu</td></tr>
                                                    <tr><td>347</td><td>024601</td><td>Semarang - Tugu</td></tr>
                                                    <tr><td>348</td><td>024602</td><td>Semarang - Tugu</td></tr>
                                                    <tr><td>349</td><td>024603</td><td>Semarang - Tugu</td></tr>
                                                    <tr><td>350</td><td>024604</td><td>Semarang - Tugu</td></tr>
                                                    <tr><td>351</td><td>024605</td><td>Semarang - Tugu</td></tr>
                                                    <tr><td>352</td><td>024606</td><td>Semarang - Tugu</td></tr>
                                                    <tr><td>353</td><td>024607</td><td>Semarang - Tugu</td></tr>
                                                    <tr><td>354</td><td>024608</td><td>Semarang - Tugu</td></tr>
                                                    <tr><td>355</td><td>024609</td><td>Semarang - Tugu</td></tr>
                                                    <tr><td>356</td><td>024610</td><td>Semarang - Tugu</td></tr>
                                                    <tr><td>357</td><td>024611</td><td>Semarang - Tugu</td></tr>
                                                    <tr><td>358</td><td>024612</td><td>Semarang - Tugu</td></tr>
                                                    <tr><td>359</td><td>024613</td><td>Semarang - Tugu</td></tr>
                                                    <tr><td>360</td><td>024614</td><td>Semarang - Tugu</td></tr>
                                                    <tr><td>361</td><td>024615</td><td>Semarang - Tugu</td></tr>
                                                    <tr><td>362</td><td>024616</td><td>Semarang - Tugu</td></tr>
                                                    <tr><td>363</td><td>024617</td><td>Semarang - Tugu</td></tr>
                                                    <tr><td>364</td><td>024618</td><td>Semarang - Tugu</td></tr>
                                                    <tr><td>365</td><td>024619</td><td>Semarang - Tugu</td></tr>
                                                    <tr><td>366</td><td>0246929</td><td>Ungaran</td></tr>
                                                    <tr><td>367</td><td>0246930</td><td>Wonorejo</td></tr>
                                                    <tr><td>368</td><td>0246932</td><td>Wonorejo</td></tr>
                                                    <tr><td>369</td><td>024749</td><td>Banyumanik</td></tr>
                                                    <tr><td>370</td><td>0247460</td><td>Banyumanik</td></tr>
                                                    <tr><td>371</td><td>0247461</td><td>Banyumanik</td></tr>
                                                    <tr><td>372</td><td>0247462</td><td>Banyumanik</td></tr>
                                                    <tr><td>373</td><td>0247463</td><td>Banyumanik</td></tr>
                                                    <tr><td>374</td><td>0247464</td><td>Banyumanik</td></tr>
                                                    <tr><td>375</td><td>0247465</td><td>Banyumanik</td></tr>
                                                    <tr><td>376</td><td>0247466</td><td>Banyumanik</td></tr>
                                                    <tr><td>377</td><td>0247467</td><td>Banyumanik</td></tr>
                                                    <tr><td>378</td><td>0247468</td><td>Banyumanik</td></tr>
                                                    <tr><td>379</td><td>024710</td><td>Semarang - Majapahit</td></tr>
                                                    <tr><td>380</td><td>024711</td><td>Semarang - Majapahit</td></tr>
                                                    <tr><td>381</td><td>024712</td><td>Semarang - Majapahit</td></tr>
                                                    <tr><td>382</td><td>024713</td><td>Semarang - Majapahit</td></tr>
                                                    <tr><td>383</td><td>024714</td><td>Semarang - Majapahit</td></tr>
                                                    <tr><td>384</td><td>024715</td><td>Semarang - Majapahit</td></tr>
                                                    <tr><td>385</td><td>024716</td><td>Semarang - Majapahit</td></tr>
                                                    <tr><td>386</td><td>024717</td><td>Semarang - Majapahit</td></tr>
                                                    <tr><td>387</td><td>024718</td><td>Semarang - Majapahit</td></tr>
                                                    <tr><td>388</td><td>024719</td><td>Semarang - Majapahit</td></tr>
                                                    <tr><td>389</td><td>024720</td><td>Semarang - Majapahit</td></tr>
                                                    <tr><td>390</td><td>024721</td><td>Semarang - Majapahit</td></tr>
                                                    <tr><td>391</td><td>024722</td><td>Semarang - Majapahit</td></tr>
                                                    <tr><td>392</td><td>024723</td><td>Semarang - Majapahit</td></tr>
                                                    <tr><td>393</td><td>024724</td><td>Semarang - Majapahit</td></tr>
                                                    <tr><td>394</td><td>024725</td><td>Semarang - Majapahit</td></tr>
                                                    <tr><td>395</td><td>024726</td><td>Semarang - Majapahit</td></tr>
                                                    <tr><td>396</td><td>0247610</td><td>Semarang - Tugu</td></tr>
                                                    <tr><td>397</td><td>0247611</td><td>Semarang - Tugu</td></tr>
                                                    <tr><td>398</td><td>0247612</td><td>Semarang - Tugu</td></tr>
                                                    <tr><td>399</td><td>0247613</td><td>Semarang - Tugu</td></tr>
                                                    <tr><td>400</td><td>0247614</td><td>Semarang - Tugu</td></tr>
                                                    <tr><td>401</td><td>0247620</td><td>Semarang - Tugu</td></tr>
                                                    <tr><td>402</td><td>0247621</td><td>Semarang - Tugu</td></tr>
                                                    <tr><td>403</td><td>0247622</td><td>Semarang - Tugu</td></tr>
                                                    <tr><td>404</td><td>0247623</td><td>Semarang - Tugu</td></tr>
                                                    <tr><td>405</td><td>0247624</td><td>Semarang - Tugu</td></tr>
                                                    <tr><td>406</td><td>0247625</td><td>Semarang - Tugu</td></tr>
                                                    <tr><td>407</td><td>0247626</td><td>Semarang - Tugu</td></tr>
                                                    <tr><td>408</td><td>0247627</td><td>Semarang - Tugu</td></tr>
                                                    <tr><td>409</td><td>0247628</td><td>Semarang - Tugu</td></tr>
                                                    <tr><td>410</td><td>0247629</td><td>Semarang - Tugu</td></tr>
                                                    <tr><td>411</td><td>0248500</td><td>Semarang - Candi</td></tr>
                                                    <tr><td>412</td><td>0248501</td><td>Semarang - Candi</td></tr>
                                                    <tr><td>413</td><td>0248502</td><td>Semarang - Candi</td></tr>
                                                    <tr><td>414</td><td>0248503</td><td>Semarang - Candi</td></tr>
                                                    <tr><td>415</td><td>0248504</td><td>Semarang - Candi</td></tr>
                                                    <tr><td>416</td><td>0248505</td><td>Semarang - Candi</td></tr>
                                                    <tr><td>417</td><td>0248506</td><td>Semarang - Candi</td></tr>
                                                    <tr><td>418</td><td>0248507</td><td>Semarang - Candi</td></tr>
                                                    <tr><td>419</td><td>0248508</td><td>Semarang - Candi</td></tr>
                                                    <tr><td>420</td><td>0248509</td><td>Semarang - Candi</td></tr>
                                                    <tr><td>421</td><td>0248660</td><td>Semarang - Mangkang</td></tr>
                                                    <tr><td>422</td><td>0248661</td><td>Semarang - Mangkang</td></tr>
                                                    <tr><td>423</td><td>0248662</td><td>Semarang - Mangkang</td></tr>
                                                    <tr><td>424</td><td>0248663</td><td>Semarang - Mangkang</td></tr>
                                                    <tr><td>425</td><td>0248664</td><td>Semarang - Mangkang</td></tr>
                                                    <tr><td>426</td><td>0248665</td><td>Semarang - Mangkang</td></tr>
                                                    <tr><td>427</td><td>0248666</td><td>Semarang - Mangkang</td></tr>
                                                    <tr><td>428</td><td>0248667</td><td>Semarang - Mangkang</td></tr>
                                                    <tr><td>429</td><td>0248668</td><td>Semarang - Mangkang</td></tr>
                                                    <tr><td>430</td><td>0248669</td><td>Semarang - Mangkang</td></tr>
                                                    <tr><td>431</td><td>0248300</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>432</td><td>0248301</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>433</td><td>0248302</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>434</td><td>0248303</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>435</td><td>0248304</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>436</td><td>0248305</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>437</td><td>0248306</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>438</td><td>0248307</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>439</td><td>0248308</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>440</td><td>0248309</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>441</td><td>0248450</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>442</td><td>0248451</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>443</td><td>0248452</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>444</td><td>0248453</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>445</td><td>0248454</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>446</td><td>02499</td><td>Semarang - Simpanglima</td></tr>
                                                    <tr><td>447</td><td>024921</td><td>Ungaran</td></tr>
                                                    <tr><td>448</td><td>024922</td><td>Ungaran</td></tr>
                                                    <tr><td>449</td><td>024923</td><td>Ungaran</td></tr>
                                                    <tr><td>450</td><td>024924</td><td>Ungaran</td></tr>
                                                    <tr><td>451</td><td>024925</td><td>Ungaran</td></tr>
                                                    <tr><td>452</td><td>0251</td><td>Bogor</td></tr>
                                                    <tr><td>453</td><td>02511</td><td>Bogor</td></tr>
                                                    <tr><td>454</td><td>025131</td><td>Bogor</td></tr>
                                                    <tr><td>455</td><td>025132</td><td>Bogor</td></tr>
                                                    <tr><td>456</td><td>025135</td><td>Bogor</td></tr>
                                                    <tr><td>457</td><td>025137</td><td>Bogor</td></tr>
                                                    <tr><td>458</td><td>025138</td><td>Bogor</td></tr>
                                                    <tr><td>459</td><td>0251330</td><td>Bogor</td></tr>
                                                    <tr><td>460</td><td>0251331</td><td>Bogor</td></tr>
                                                    <tr><td>461</td><td>0251332</td><td>Bogor</td></tr>
                                                    <tr><td>462</td><td>0251333</td><td>Bogor</td></tr>
                                                    <tr><td>463</td><td>0251334</td><td>Bogor</td></tr>
                                                    <tr><td>464</td><td>0251335</td><td>Bogor</td></tr>
                                                    <tr><td>465</td><td>0251336</td><td>Bogor</td></tr>
                                                    <tr><td>466</td><td>0251337</td><td>Bogor</td></tr>
                                                    <tr><td>467</td><td>0251338</td><td>Bogor</td></tr>
                                                    <tr><td>468</td><td>0251339</td><td>Bogor</td></tr>
                                                    <tr><td>469</td><td>0251340</td><td>Bogor</td></tr>
                                                    <tr><td>470</td><td>0251341</td><td>Bogor</td></tr>
                                                    <tr><td>471</td><td>0251342</td><td>Bogor</td></tr>
                                                    <tr><td>472</td><td>0251343</td><td>Bogor</td></tr>
                                                    <tr><td>473</td><td>0251344</td><td>Bogor</td></tr>
                                                    <tr><td>474</td><td>0251345</td><td>Bogor</td></tr>
                                                    <tr><td>475</td><td>0251346</td><td>Bogor</td></tr>
                                                    <tr><td>476</td><td>0251347</td><td>Bogor</td></tr>
                                                    <tr><td>477</td><td>0251348</td><td>Bogor</td></tr>
                                                    <tr><td>478</td><td>0251349</td><td>Bogor</td></tr>
                                                    <tr><td>479</td><td>0251360</td><td>Bogor</td></tr>
                                                    <tr><td>480</td><td>0251361</td><td>Bogor</td></tr>
                                                    <tr><td>481</td><td>0251716</td><td>Bogor</td></tr>
                                                    <tr><td>482</td><td>0251717</td><td>Bogor</td></tr>
                                                    <tr><td>483</td><td>025112078</td><td>Bogor</td></tr>
                                                    <tr><td>484</td><td>025112089</td><td>Bogor</td></tr>
                                                    <tr><td>485</td><td>025113000</td><td>Bogor</td></tr>
                                                    <tr><td>486</td><td>0251220</td><td>Caringin</td></tr>
                                                    <tr><td>487</td><td>0251221</td><td>Caringin</td></tr>
                                                    <tr><td>488</td><td>0251222</td><td>Caringin</td></tr>
                                                    <tr><td>489</td><td>0251223</td><td>Caringin</td></tr>
                                                    <tr><td>490</td><td>0251388</td><td>Ciapus</td></tr>
                                                    <tr><td>491</td><td>0251389</td><td>Ciapus</td></tr>
                                                    <tr><td>492</td><td>0251485</td><td>Ciapus</td></tr>
                                                    <tr><td>493</td><td>0251486</td><td>Ciapus</td></tr>
                                                    <tr><td>494</td><td>0251487</td><td>Ciapus</td></tr>
                                                    <tr><td>495</td><td>0251488</td><td>Ciapus</td></tr>
                                                    <tr><td>496</td><td>0251240</td><td>Ciawi</td></tr>
                                                    <tr><td>497</td><td>0251241</td><td>Ciawi</td></tr>
                                                    <tr><td>498</td><td>0251242</td><td>Ciawi</td></tr>
                                                    <tr><td>499</td><td>0251243</td><td>Ciawi</td></tr>
                                                    <tr><td>500</td><td>0251244</td><td>Ciawi</td></tr>
                                                    <tr><td>501</td><td>0251245</td><td>Ciawi</td></tr>
                                                    <tr><td>502</td><td>0251246</td><td>Ciawi</td></tr>
                                                    <tr><td>503</td><td>0251247</td><td>Ciawi</td></tr>
                                                    <tr><td>504</td><td>0251248</td><td>Ciawi</td></tr>
                                                    <tr><td>505</td><td>0251249</td><td>Ciawi</td></tr>
                                                    <tr><td>506</td><td>0251108</td><td>Cigudeg</td></tr>
                                                    <tr><td>507</td><td>0251681</td><td>Cigudeg</td></tr>
                                                    <tr><td>508</td><td>0251682</td><td>Cigudeg</td></tr>
                                                    <tr><td>509</td><td>0251270</td><td>Cijayanti</td></tr>
                                                    <tr><td>510</td><td>0251271</td><td>Cijayanti</td></tr>
                                                    <tr><td>511</td><td>0251272</td><td>Cijayanti</td></tr>
                                                    <tr><td>512</td><td>0251211</td><td>Cijeruk</td></tr>
                                                    <tr><td>513</td><td>0251212</td><td>Cijeruk</td></tr>
                                                    <tr><td>514</td><td>0251213</td><td>Cijeruk</td></tr>
                                                    <tr><td>515</td><td>0251252</td><td>Cisarua</td></tr>
                                                    <tr><td>516</td><td>0251253</td><td>Cisarua</td></tr>
                                                    <tr><td>517</td><td>0251254</td><td>Cisarua</td></tr>
                                                    <tr><td>518</td><td>0251255</td><td>Cisarua</td></tr>
                                                    <tr><td>519</td><td>0251256</td><td>Cisarua</td></tr>
                                                    <tr><td>520</td><td>0251257</td><td>Cisarua</td></tr>
                                                    <tr><td>521</td><td>0251258</td><td>Cisarua</td></tr>
                                                    <tr><td>522</td><td>0251541</td><td>Ciseeng</td></tr>
                                                    <tr><td>523</td><td>0251542</td><td>Ciseeng</td></tr>
                                                    <tr><td>524</td><td>0251543</td><td>Ciseeng</td></tr>
                                                    <tr><td>525</td><td>0251544</td><td>Ciseeng</td></tr>
                                                    <tr><td>526</td><td>0251620</td><td>Darmaga</td></tr>
                                                    <tr><td>527</td><td>0251621</td><td>Darmaga</td></tr>
                                                    <tr><td>528</td><td>0251622</td><td>Darmaga</td></tr>
                                                    <tr><td>529</td><td>0251623</td><td>Darmaga</td></tr>
                                                    <tr><td>530</td><td>0251624</td><td>Darmaga</td></tr>
                                                    <tr><td>531</td><td>0251625</td><td>Darmaga</td></tr>
                                                    <tr><td>532</td><td>0251626</td><td>Darmaga</td></tr>
                                                    <tr><td>533</td><td>0251627</td><td>Darmaga</td></tr>
                                                    <tr><td>534</td><td>0251628</td><td>Darmaga</td></tr>
                                                    <tr><td>535</td><td>0251629</td><td>Darmaga</td></tr>
                                                    <tr><td>536</td><td>0251686</td><td>Jasinga</td></tr>
                                                    <tr><td>537</td><td>0251687</td><td>Jasinga</td></tr>
                                                    <tr><td>538</td><td>0251688</td><td>Jasinga</td></tr>
                                                    <tr><td>539</td><td>0251650</td><td>Kedung</td></tr>
                                                    <tr><td>540</td><td>0251651</td><td>Kedung</td></tr>
                                                    <tr><td>541</td><td>0251652</td><td>Kedung</td></tr>
                                                    <tr><td>542</td><td>0251653</td><td>Kedung</td></tr>
                                                    <tr><td>543</td><td>0251654</td><td>Kedung</td></tr>
                                                    <tr><td>544</td><td>0251655</td><td>Kedung</td></tr>
                                                    <tr><td>545</td><td>0251660</td><td>Kedung</td></tr>
                                                    <tr><td>546</td><td>0251661</td><td>Kedung</td></tr>
                                                    <tr><td>547</td><td>0251662</td><td>Kedung</td></tr>
                                                    <tr><td>548</td><td>0251663</td><td>Kedung</td></tr>
                                                    <tr><td>549</td><td>0251664</td><td>Kedung</td></tr>
                                                    <tr><td>550</td><td>0251665</td><td>Kedung</td></tr>
                                                    <tr><td>551</td><td>0251666</td><td>Kedung</td></tr>
                                                    <tr><td>552</td><td>0251667</td><td>Kedung</td></tr>
                                                    <tr><td>553</td><td>0251668</td><td>Kedung</td></tr>
                                                    <tr><td>554</td><td>0251669</td><td>Kedung</td></tr>
                                                    <tr><td>555</td><td>0251470</td><td>Lebak Wangi</td></tr>
                                                    <tr><td>556</td><td>0251471</td><td>Lebak Wangi</td></tr>
                                                    <tr><td>557</td><td>0251640</td><td>Leuwili</td></tr>
                                                    <tr><td>558</td><td>0251641</td><td>Leuwili</td></tr>
                                                    <tr><td>559</td><td>0251642</td><td>Leuwili</td></tr>
                                                    <tr><td>560</td><td>0251643</td><td>Leuwili</td></tr>
                                                    <tr><td>561</td><td>0251644</td><td>Leuwili</td></tr>
                                                    <tr><td>562</td><td>0251645</td><td>Leuwili</td></tr>
                                                    <tr><td>563</td><td>0251647</td><td>Leuwili</td></tr>
                                                    <tr><td>564</td><td>0251648</td><td>Leuwili</td></tr>
                                                    <tr><td>565</td><td>0251630</td><td>Pagelaran</td></tr>
                                                    <tr><td>566</td><td>0251631</td><td>Pagelaran</td></tr>
                                                    <tr><td>567</td><td>0251632</td><td>Pagelaran</td></tr>
                                                    <tr><td>568</td><td>0251633</td><td>Pagelaran</td></tr>
                                                    <tr><td>569</td><td>0251634</td><td>Pagelaran</td></tr>
                                                    <tr><td>570</td><td>0251635</td><td>Pagelaran</td></tr>
                                                    <tr><td>571</td><td>0251636</td><td>Pagelaran</td></tr>
                                                    <tr><td>572</td><td>0251637</td><td>Pagelaran</td></tr>
                                                    <tr><td>573</td><td>0251638</td><td>Pagelaran</td></tr>
                                                    <tr><td>574</td><td>0251639</td><td>Pagelaran</td></tr>
                                                    <tr><td>575</td><td>0251611</td><td>Parung</td></tr>
                                                    <tr><td>576</td><td>0251612</td><td>Parung</td></tr>
                                                    <tr><td>577</td><td>0251613</td><td>Parung</td></tr>
                                                    <tr><td>578</td><td>0251614</td><td>Parung</td></tr>
                                                    <tr><td>579</td><td>0251615</td><td>Parung</td></tr>
                                                    <tr><td>580</td><td>0251616</td><td>Parung</td></tr>
                                                    <tr><td>581</td><td>0251617</td><td>Parung</td></tr>
                                                    <tr><td>582</td><td>0251618</td><td>Parung</td></tr>
                                                    <tr><td>583</td><td>0251619</td><td>Parung</td></tr>
                                                    <tr><td>584</td><td>025150</td><td>Semplak</td></tr>
                                                    <tr><td>585</td><td>025151</td><td>Semplak</td></tr>
                                                    <tr><td>586</td><td>0251551</td><td>Tajur H</td></tr>
                                                    <tr><td>587</td><td>0251552</td><td>Tajur H</td></tr>
                                                    <tr><td>588</td><td>0251553</td><td>Tajur H</td></tr>
                                                    <tr><td>589</td><td>0251554</td><td>Tajur H</td></tr>
                                                    <tr><td>590</td><td>0251555</td><td>Tajur H</td></tr>
                                                    <tr><td>591</td><td>0251560</td><td>Tenjo</td></tr>
                                                    <tr><td>592</td><td>0251561</td><td>Tenjo</td></tr>
                                                    <tr><td>593</td><td>0251562</td><td>Tenjo</td></tr>
                                                    <tr><td>594</td><td>0251563</td><td>Tenjo</td></tr>
                                                    <tr><td>595</td><td>0251564</td><td>Tenjo</td></tr>
                                                    <tr><td>596</td><td>02524</td><td>Bayah</td></tr>
                                                    <tr><td>597</td><td>025240</td><td>Bayah</td></tr>
                                                    <tr><td>598</td><td>02523</td><td>Leuwidamar</td></tr>
                                                    <tr><td>599</td><td>025230</td><td>Leuwidamar</td></tr>
                                                    <tr><td>600</td><td>02528</td><td>Malingping</td></tr>
                                                    <tr><td>601</td><td>025250</td><td>Malingping</td></tr>
                                                    <tr><td>602</td><td>0252</td><td>Rangkasbitung</td></tr>
                                                    <tr><td>603</td><td>02521</td><td>Rangkasbitung</td></tr>
                                                    <tr><td>604</td><td>02522</td><td>Rangkasbitung</td></tr>
                                                    <tr><td>605</td><td>025220</td><td>Rangkasbitung</td></tr>
                                                    <tr><td>606</td><td>02538</td><td>Labuan</td></tr>
                                                    <tr><td>607</td><td>025380</td><td>Labuan</td></tr>
                                                    <tr><td>608</td><td>02535</td><td>Menes</td></tr>
                                                    <tr><td>609</td><td>025350</td><td>Menes</td></tr>
                                                    <tr><td>610</td><td>0253</td><td>Pandeglang</td></tr>
                                                    <tr><td>611</td><td>02531</td><td>Pandeglang</td></tr>
                                                    <tr><td>612</td><td>02532</td><td>Pandeglang</td></tr>
                                                    <tr><td>613</td><td>025313</td><td>Pandeglang</td></tr>
                                                    <tr><td>614</td><td>025320</td><td>Pandeglang</td></tr>
                                                    <tr><td>615</td><td>02534</td><td>Saketi</td></tr>
                                                    <tr><td>616</td><td>025340</td><td>Saketi</td></tr>
                                                    <tr><td>617</td><td>0254250</td><td>Baros</td></tr>
                                                    <tr><td>618</td><td>0254251</td><td>Baros</td></tr>
                                                    <tr><td>619</td><td>0254500</td><td>Bojonegara</td></tr>
                                                    <tr><td>620</td><td>0254501</td><td>Bojonegara</td></tr>
                                                    <tr><td>621</td><td>0254502</td><td>Bojonegara</td></tr>
                                                    <tr><td>622</td><td>0254480</td><td>Bojot</td></tr>
                                                    <tr><td>623</td><td>0254481</td><td>Bojot</td></tr>
                                                    <tr><td>624</td><td>0254400</td><td>Cikande</td></tr>
                                                    <tr><td>625</td><td>0254401</td><td>Cikande</td></tr>
                                                    <tr><td>626</td><td>0254402</td><td>Cikande</td></tr>
                                                    <tr><td>627</td><td>0254403</td><td>Cikande</td></tr>
                                                    <tr><td>628</td><td>0254404</td><td>Cikande</td></tr>
                                                    <tr><td>629</td><td>0254405</td><td>Cikande</td></tr>
                                                    <tr><td>630</td><td>0254369</td><td>Cilegon</td></tr>
                                                    <tr><td>631</td><td>0254380</td><td>Cilegon</td></tr>
                                                    <tr><td>632</td><td>0254381</td><td>Cilegon</td></tr>
                                                    <tr><td>633</td><td>0254382</td><td>Cilegon</td></tr>
                                                    <tr><td>634</td><td>0254391</td><td>Cilegon</td></tr>
                                                    <tr><td>635</td><td>0254392</td><td>Cilegon</td></tr>
                                                    <tr><td>636</td><td>0254393</td><td>Cilegon</td></tr>
                                                    <tr><td>637</td><td>0254394</td><td>Cilegon</td></tr>
                                                    <tr><td>638</td><td>0254395</td><td>Cilegon</td></tr>
                                                    <tr><td>639</td><td>0254396</td><td>Cilegon</td></tr>
                                                    <tr><td>640</td><td>0254398</td><td>Cilegon</td></tr>
                                                    <tr><td>641</td><td>0254280</td><td>Ciruas</td></tr>
                                                    <tr><td>642</td><td>0254281</td><td>Ciruas</td></tr>
                                                    <tr><td>643</td><td>0254282</td><td>Ciruas</td></tr>
                                                    <tr><td>644</td><td>0254600</td><td>Ciwandan</td></tr>
                                                    <tr><td>645</td><td>0254601</td><td>Ciwandan</td></tr>
                                                    <tr><td>646</td><td>0254602</td><td>Ciwandan</td></tr>
                                                    <tr><td>647</td><td>0254603</td><td>Ciwandan</td></tr>
                                                    <tr><td>648</td><td>0254604</td><td>Ciwandan</td></tr>
                                                    <tr><td>649</td><td>0254605</td><td>Ciwandan</td></tr>
                                                    <tr><td>650</td><td>0254340</td><td>Gerogol</td></tr>
                                                    <tr><td>651</td><td>0254230</td><td>Kramat Watu</td></tr>
                                                    <tr><td>652</td><td>0254231</td><td>Kramat Watu</td></tr>
                                                    <tr><td>653</td><td>0254232</td><td>Kramat Watu</td></tr>
                                                    <tr><td>654</td><td>0254570</td><td>Merak</td></tr>
                                                    <tr><td>655</td><td>0254571</td><td>Merak</td></tr>
                                                    <tr><td>656</td><td>0254572</td><td>Merak</td></tr>
                                                    <tr><td>657</td><td>0254573</td><td>Merak</td></tr>
                                                    <tr><td>658</td><td>0254330</td><td>Pabean</td></tr>
                                                    <tr><td>659</td><td>0254331</td><td>Pabean</td></tr>
                                                    <tr><td>660</td><td>0254650</td><td>Pasauran</td></tr>
                                                    <tr><td>661</td><td>0254651</td><td>Pasauran</td></tr>
                                                    <tr><td>662</td><td>0254652</td><td>Pasauran</td></tr>
                                                    <tr><td>663</td><td>0254430</td><td>Pematang</td></tr>
                                                    <tr><td>664</td><td>0254431</td><td>Pematang</td></tr>
                                                    <tr><td>665</td><td>0254432</td><td>Pematang</td></tr>
                                                    <tr><td>666</td><td>0254310</td><td>Samangraya</td></tr>
                                                    <tr><td>667</td><td>0254311</td><td>Samangraya</td></tr>
                                                    <tr><td>668</td><td>0254312</td><td>Samangraya</td></tr>
                                                    <tr><td>669</td><td>0254</td><td>Serang</td></tr>
                                                    <tr><td>670</td><td>02541</td><td>Serang</td></tr>
                                                    <tr><td>671</td><td>025421</td><td>Serang</td></tr>
                                                    <tr><td>672</td><td>0254200</td><td>Serang</td></tr>
                                                    <tr><td>673</td><td>0254201</td><td>Serang</td></tr>
                                                    <tr><td>674</td><td>0254202</td><td>Serang</td></tr>
                                                    <tr><td>675</td><td>0254203</td><td>Serang</td></tr>
                                                    <tr><td>676</td><td>0254204</td><td>Serang</td></tr>
                                                    <tr><td>677</td><td>0254205</td><td>Serang</td></tr>
                                                    <tr><td>678</td><td>0254206</td><td>Serang</td></tr>
                                                    <tr><td>679</td><td>0254207</td><td>Serang</td></tr>
                                                    <tr><td>680</td><td>0254208</td><td>Serang</td></tr>
                                                    <tr><td>681</td><td>0254209</td><td>Serang</td></tr>
                                                    <tr><td>682</td><td>0254210</td><td>Serang</td></tr>
                                                    <tr><td>683</td><td>0254211</td><td>Serang</td></tr>
                                                    <tr><td>684</td><td>0254212</td><td>Serang</td></tr>
                                                    <tr><td>685</td><td>0254213</td><td>Serang</td></tr>
                                                    <tr><td>686</td><td>0254269</td><td>Serang</td></tr>
                                                    <tr><td>687</td><td>025412078</td><td>Serang</td></tr>
                                                    <tr><td>688</td><td>025412089</td><td>Serang</td></tr>
                                                    <tr><td>689</td><td>026052</td><td>Ciasem</td></tr>
                                                    <tr><td>690</td><td>026047</td><td>Jalan Cagak</td></tr>
                                                    <tr><td>691</td><td>026046</td><td>Kalijati</td></tr>
                                                    <tr><td>692</td><td>026071</td><td>Pabuaran Subang</td></tr>
                                                    <tr><td>693</td><td>026045</td><td>Pagaden</td></tr>
                                                    <tr><td>694</td><td>026055</td><td>Pamanukan</td></tr>
                                                    <tr><td>695</td><td>0260</td><td>Subang</td></tr>
                                                    <tr><td>696</td><td>02601</td><td>Subang</td></tr>
                                                    <tr><td>697</td><td>026041</td><td>Subang</td></tr>
                                                    <tr><td>698</td><td>026042</td><td>Subang</td></tr>
                                                    <tr><td>699</td><td>0261</td><td>Sumedang</td></tr>
                                                    <tr><td>700</td><td>02611</td><td>Sumedang</td></tr>
                                                    <tr><td>701</td><td>026120</td><td>Sumedang</td></tr>
                                                    <tr><td>702</td><td>026121</td><td>Sumedang</td></tr>
                                                    <tr><td>703</td><td>026122</td><td>Sumedang</td></tr>
                                                    <tr><td>704</td><td>026246</td><td>Cibatu</td></tr>
                                                    <tr><td>705</td><td>026257</td><td>Cikajang</td></tr>
                                                    <tr><td>706</td><td>026251</td><td>Cisompet</td></tr>
                                                    <tr><td>707</td><td>0262</td><td>Garut</td></tr>
                                                    <tr><td>708</td><td>02621</td><td>Garut</td></tr>
                                                    <tr><td>709</td><td>026213</td><td>Garut</td></tr>
                                                    <tr><td>710</td><td>026223</td><td>Garut</td></tr>
                                                    <tr><td>711</td><td>026224</td><td>Garut</td></tr>
                                                    <tr><td>712</td><td>026227</td><td>Garut</td></tr>
                                                    <tr><td>713</td><td>026254</td><td>Garut</td></tr>
                                                    <tr><td>714</td><td>026245</td><td>Kadungora</td></tr>
                                                    <tr><td>715</td><td>026243</td><td>Limbangan</td></tr>
                                                    <tr><td>716</td><td>026242</td><td>Malangbong</td></tr>
                                                    <tr><td>717</td><td>026252</td><td>Pameungpeuk</td></tr>
                                                    <tr><td>718</td><td>026244</td><td>Wanaraja</td></tr>
                                                    <tr><td>719</td><td>0263</td><td>Cianjur</td></tr>
                                                    <tr><td>720</td><td>02631</td><td>Cianjur</td></tr>
                                                    <tr><td>721</td><td>026313</td><td>Cianjur</td></tr>
                                                    <tr><td>722</td><td>026326</td><td>Cianjur</td></tr>
                                                    <tr><td>723</td><td>026327</td><td>Cianjur</td></tr>
                                                    <tr><td>724</td><td>026328</td><td>Cianjur</td></tr>
                                                    <tr><td>725</td><td>026333</td><td>Cibeber</td></tr>
                                                    <tr><td>726</td><td>026331</td><td>Cikalong Kulon</td></tr>
                                                    <tr><td>727</td><td>026332</td><td>Ciranjang</td></tr>
                                                    <tr><td>728</td><td>026351</td><td>Sindanglaya</td></tr>
                                                    <tr><td>729</td><td>026352</td><td>Sindanglaya</td></tr>
                                                    <tr><td>730</td><td>026334</td><td>Sukanegara</td></tr>
                                                    <tr><td>731</td><td>026358</td><td>Sukaresmi</td></tr>
                                                    <tr><td>732</td><td>026336</td><td>Tanggeung</td></tr>
                                                    <tr><td>733</td><td>0264620</td><td>Bojong</td></tr>
                                                    <tr><td>734</td><td>0264621</td><td>Bojong</td></tr>
                                                    <tr><td>735</td><td>0264350</td><td>Cibungur</td></tr>
                                                    <tr><td>736</td><td>0264351</td><td>Cibungur</td></tr>
                                                    <tr><td>737</td><td>026430</td><td>Cikampek</td></tr>
                                                    <tr><td>738</td><td>026431</td><td>Cikampek</td></tr>
                                                    <tr><td>739</td><td>026432</td><td>Cikampek</td></tr>
                                                    <tr><td>740</td><td>026433</td><td>Cikampek</td></tr>
                                                    <tr><td>741</td><td>026434</td><td>Cikampek</td></tr>
                                                    <tr><td>742</td><td>026436</td><td>Jatisar</td></tr>
                                                    <tr><td>743</td><td>0264270</td><td>Plered</td></tr>
                                                    <tr><td>744</td><td>0264271</td><td>Plered</td></tr>
                                                    <tr><td>745</td><td>0264272</td><td>Plered</td></tr>
                                                    <tr><td>746</td><td>0264273</td><td>Plered</td></tr>
                                                    <tr><td>747</td><td>0264</td><td>Purwakarta</td></tr>
                                                    <tr><td>748</td><td>02641</td><td>Purwakarta</td></tr>
                                                    <tr><td>749</td><td>026420</td><td>Purwakarta</td></tr>
                                                    <tr><td>750</td><td>026421</td><td>Purwakarta</td></tr>
                                                    <tr><td>751</td><td>0264239</td><td>Purwakarta</td></tr>
                                                    <tr><td>752</td><td>0264269</td><td>Purwakarta</td></tr>
                                                    <tr><td>753</td><td>026412078</td><td>Purwakarta</td></tr>
                                                    <tr><td>754</td><td>026412089</td><td>Purwakarta</td></tr>
                                                    <tr><td>755</td><td>026574</td><td>Banjar</td></tr>
                                                    <tr><td>756</td><td>026565</td><td>Banjarsari</td></tr>
                                                    <tr><td>757</td><td>026577</td><td>Ciamis</td></tr>
                                                    <tr><td>758</td><td>026545</td><td>Ciawi</td></tr>
                                                    <tr><td>759</td><td>026556</td><td>Cibalong</td></tr>
                                                    <tr><td>760</td><td>026558</td><td>Karangnunggal</td></tr>
                                                    <tr><td>761</td><td>026579</td><td>Kawali</td></tr>
                                                    <tr><td>762</td><td>026538</td><td>Manonjaya</td></tr>
                                                    <tr><td>763</td><td>026563</td><td>Pangandaran</td></tr>
                                                    <tr><td>764</td><td>026542</td><td>Rajapolah</td></tr>
                                                    <tr><td>765</td><td>026554</td><td>Singaparna</td></tr>
                                                    <tr><td>766</td><td>0265</td><td>Tasikmalaya</td></tr>
                                                    <tr><td>767</td><td>02651</td><td>Tasikmalaya</td></tr>
                                                    <tr><td>768</td><td>026513</td><td>Tasikmalaya</td></tr>
                                                    <tr><td>769</td><td>026531</td><td>Tasikmalaya</td></tr>
                                                    <tr><td>770</td><td>026532</td><td>Tasikmalaya</td></tr>
                                                    <tr><td>771</td><td>026533</td><td>Tasikmalaya</td></tr>
                                                    <tr><td>772</td><td>026534</td><td>Tasikmalaya</td></tr>
                                                    <tr><td>773</td><td>026646</td><td>Bojonglopang</td></tr>
                                                    <tr><td>774</td><td>026653</td><td>Cibadak</td></tr>
                                                    <tr><td>775</td><td>026673</td><td>Cicurug</td></tr>
                                                    <tr><td>776</td><td>026632</td><td>Cikembang</td></tr>
                                                    <tr><td>777</td><td>026626</td><td>Cimangkok</td></tr>
                                                    <tr><td>778</td><td>026649</td><td>Jampangkulon</td></tr>
                                                    <tr><td>779</td><td>026662</td><td>Kelapanunggal</td></tr>
                                                    <tr><td>780</td><td>026648</td><td>Nyalindung</td></tr>
                                                    <tr><td>781</td><td>026643</td><td>Pelabuhan Ratu</td></tr>
                                                    <tr><td>782</td><td>026634</td><td>Sagaranten</td></tr>
                                                    <tr><td>783</td><td>0266</td><td>Sukabumi</td></tr>
                                                    <tr><td>784</td><td>02661</td><td>Sukabumi</td></tr>
                                                    <tr><td>785</td><td>026613</td><td>Sukabumi</td></tr>
                                                    <tr><td>786</td><td>026621</td><td>Sukabumi</td></tr>
                                                    <tr><td>787</td><td>026622</td><td>Sukabumi</td></tr>
                                                    <tr><td>788</td><td>026623</td><td>Sukabumi</td></tr>
                                                    <tr><td>789</td><td>026624</td><td>Sukabumi</td></tr>
                                                    <tr><td>790</td><td>0267470</td><td>Batujaya</td></tr>
                                                    <tr><td>791</td><td>0267471</td><td>Batujaya</td></tr>
                                                    <tr><td>792</td><td>0267472</td><td>Batujaya</td></tr>
                                                    <tr><td>793</td><td>0267440</td><td>Ciampel</td></tr>
                                                    <tr><td>794</td><td>026734</td><td>Cilamaya</td></tr>
                                                    <tr><td>795</td><td>026760</td><td>Karangligar</td></tr>
                                                    <tr><td>796</td><td>0267</td><td>Karawang</td></tr>
                                                    <tr><td>797</td><td>02671</td><td>Karawang</td></tr>
                                                    <tr><td>798</td><td>026740</td><td>Karawang</td></tr>
                                                    <tr><td>799</td><td>026741</td><td>Karawang</td></tr>
                                                    <tr><td>800</td><td>026742</td><td>Karawang</td></tr>
                                                    <tr><td>801</td><td>026743</td><td>Karawang</td></tr>
                                                    <tr><td>802</td><td>026744</td><td>Karawang</td></tr>
                                                    <tr><td>803</td><td>0267469</td><td>Karawang</td></tr>
                                                    <tr><td>804</td><td>026712078</td><td>Karawang</td></tr>
                                                    <tr><td>805</td><td>026712089</td><td>Karawang</td></tr>
                                                    <tr><td>806</td><td>0267431</td><td>Klari</td></tr>
                                                    <tr><td>807</td><td>0267432</td><td>Klari</td></tr>
                                                    <tr><td>808</td><td>0267433</td><td>Klari</td></tr>
                                                    <tr><td>809</td><td>0267434</td><td>Klari</td></tr>
                                                    <tr><td>810</td><td>0267480</td><td>Rengasdengklok</td></tr>
                                                    <tr><td>811</td><td>0267481</td><td>Rengasdengklok</td></tr>
                                                    <tr><td>812</td><td>0267482</td><td>Rengasdengklok</td></tr>
                                                    <tr><td>813</td><td>0267483</td><td>Rengasdengklok</td></tr>
                                                    <tr><td>814</td><td>0267640</td><td>Teluk Jambe</td></tr>
                                                    <tr><td>815</td><td>0267510</td><td>Wadas</td></tr>
                                                    <tr><td>816</td><td>0267511</td><td>Wadas</td></tr>
                                                    <tr><td>817</td><td>0267512</td><td>Wadas</td></tr>
                                                    <tr><td>818</td><td>0267513</td><td>Wadas</td></tr>
                                                    <tr><td>819</td><td>0267514</td><td>Wadas</td></tr>
                                                    <tr><td>820</td><td>0267515</td><td>Wadas</td></tr>
                                                    <tr><td>821</td><td>0267516</td><td>Wadas</td></tr>
                                                    <tr><td>822</td><td>0267517</td><td>Wadas</td></tr>
                                                    <tr><td>823</td><td>0267518</td><td>Wadas</td></tr>
                                                    <tr><td>824</td><td>0267519</td><td>Wadas</td></tr>
                                                    <tr><td>825</td><td>0271610</td><td>Bekonang</td></tr>
                                                    <tr><td>826</td><td>0271611</td><td>Bekonang</td></tr>
                                                    <tr><td>827</td><td>0271612</td><td>Bekonang</td></tr>
                                                    <tr><td>828</td><td>0271887</td><td>Gondang</td></tr>
                                                    <tr><td>829</td><td>0271494</td><td>Karanganyar Ska</td></tr>
                                                    <tr><td>830</td><td>0271495</td><td>Karanganyar Ska</td></tr>
                                                    <tr><td>831</td><td>0271780</td><td>Kartosuro</td></tr>
                                                    <tr><td>832</td><td>0271781</td><td>Kartosuro</td></tr>
                                                    <tr><td>833</td><td>0271782</td><td>Kartosuro</td></tr>
                                                    <tr><td>834</td><td>0271783</td><td>Kartosuro</td></tr>
                                                    <tr><td>835</td><td>0271789</td><td>Kartosuro</td></tr>
                                                    <tr><td>836</td><td>0271</td><td>Solo</td></tr>
                                                    <tr><td>837</td><td>027157</td><td>Solo - Beteng</td></tr>
                                                    <tr><td>838</td><td>02711</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>839</td><td>027113</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>840</td><td>027141</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>841</td><td>027142</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>842</td><td>027143</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>843</td><td>027144</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>844</td><td>027145</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>845</td><td>027146</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>846</td><td>027147</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>847</td><td>027148</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>848</td><td>027151</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>849</td><td>027152</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>850</td><td>027153</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>851</td><td>027154</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>852</td><td>027155</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>853</td><td>027156</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>854</td><td>0271490</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>855</td><td>0271630</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>856</td><td>0271631</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>857</td><td>0271632</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>858</td><td>0271633</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>859</td><td>0271634</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>860</td><td>0271635</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>861</td><td>0271636</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>862</td><td>0271637</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>863</td><td>0271639</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>864</td><td>0271640</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>865</td><td>0271641</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>866</td><td>0271642</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>867</td><td>0271643</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>868</td><td>0271644</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>869</td><td>0271645</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>870</td><td>0271646</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>871</td><td>0271647</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>872</td><td>0271648</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>873</td><td>0271649</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>874</td><td>0271658</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>875</td><td>0271660</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>876</td><td>0271661</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>877</td><td>0271662</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>878</td><td>0271663</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>879</td><td>0271664</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>880</td><td>0271665</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>881</td><td>0271666</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>882</td><td>0271667</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>883</td><td>0271668</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>884</td><td>0271669</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>885</td><td>0271678</td><td>Solo - Gladak</td></tr>
                                                    <tr><td>886</td><td>0271710</td><td>Solo - Kerten</td></tr>
                                                    <tr><td>887</td><td>0271711</td><td>Solo - Kerten</td></tr>
                                                    <tr><td>888</td><td>0271712</td><td>Solo - Kerten</td></tr>
                                                    <tr><td>889</td><td>0271713</td><td>Solo - Kerten</td></tr>
                                                    <tr><td>890</td><td>0271714</td><td>Solo - Kerten</td></tr>
                                                    <tr><td>891</td><td>0271715</td><td>Solo - Kerten</td></tr>
                                                    <tr><td>892</td><td>0271716</td><td>Solo - Kerten</td></tr>
                                                    <tr><td>893</td><td>0271717</td><td>Solo - Kerten</td></tr>
                                                    <tr><td>894</td><td>0271718</td><td>Solo - Kerten</td></tr>
                                                    <tr><td>895</td><td>0271719</td><td>Solo - Kerten</td></tr>
                                                    <tr><td>896</td><td>0271720</td><td>Solo - Kerten</td></tr>
                                                    <tr><td>897</td><td>0271721</td><td>Solo - Kerten</td></tr>
                                                    <tr><td>898</td><td>0271722</td><td>Solo - Kerten</td></tr>
                                                    <tr><td>899</td><td>0271723</td><td>Solo - Kerten</td></tr>
                                                    <tr><td>900</td><td>0271724</td><td>Solo - Kerten</td></tr>
                                                    <tr><td>901</td><td>0271725</td><td>Solo - Kerten</td></tr>
                                                    <tr><td>902</td><td>0271726</td><td>Solo - Kerten</td></tr>
                                                    <tr><td>903</td><td>0271727</td><td>Solo - Kerten</td></tr>
                                                    <tr><td>904</td><td>0271728</td><td>Solo - Kerten</td></tr>
                                                    <tr><td>905</td><td>0271729</td><td>Solo - Kerten</td></tr>
                                                    <tr><td>906</td><td>0271730</td><td>Solo - Kerten</td></tr>
                                                    <tr><td>907</td><td>0271731</td><td>Solo - Kerten</td></tr>
                                                    <tr><td>908</td><td>0271732</td><td>Solo - Kerten</td></tr>
                                                    <tr><td>909</td><td>0271733</td><td>Solo - Kerten</td></tr>
                                                    <tr><td>910</td><td>0271734</td><td>Solo - Kerten</td></tr>
                                                    <tr><td>911</td><td>0271735</td><td>Solo - Kerten</td></tr>
                                                    <tr><td>912</td><td>0271736</td><td>Solo - Kerten</td></tr>
                                                    <tr><td>913</td><td>0271737</td><td>Solo - Kerten</td></tr>
                                                    <tr><td>914</td><td>0271738</td><td>Solo - Kerten</td></tr>
                                                    <tr><td>915</td><td>0271739</td><td>Solo - Kerten</td></tr>
                                                    <tr><td>916</td><td>0271740</td><td>Solo - Kerten</td></tr>
                                                    <tr><td>917</td><td>0271741</td><td>Solo - Kerten</td></tr>
                                                    <tr><td>918</td><td>0271742</td><td>Solo - Kerten</td></tr>
                                                    <tr><td>919</td><td>0271743</td><td>Solo - Kerten</td></tr>
                                                    <tr><td>920</td><td>0271851</td><td>Solo - Mojosongo</td></tr>
                                                    <tr><td>921</td><td>0271852</td><td>Solo - Mojosongo</td></tr>
                                                    <tr><td>922</td><td>0271853</td><td>Solo - Mojosongo</td></tr>
                                                    <tr><td>923</td><td>0271854</td><td>Solo - Mojosongo</td></tr>
                                                    <tr><td>924</td><td>0271855</td><td>Solo - Mojosongo</td></tr>
                                                    <tr><td>925</td><td>0271856</td><td>Solo - Mojosongo</td></tr>
                                                    <tr><td>926</td><td>027125</td><td>Solo - Palur</td></tr>
                                                    <tr><td>927</td><td>027126</td><td>Solo - Palur</td></tr>
                                                    <tr><td>928</td><td>027127</td><td>Solo - Palur</td></tr>
                                                    <tr><td>929</td><td>027128</td><td>Solo - Palur</td></tr>
                                                    <tr><td>930</td><td>0271821</td><td>Solo - Palur</td></tr>
                                                    <tr><td>931</td><td>0271822</td><td>Solo - Palur</td></tr>
                                                    <tr><td>932</td><td>0271823</td><td>Solo - Palur</td></tr>
                                                    <tr><td>933</td><td>027120</td><td>Solo - Solo Baru</td></tr>
                                                    <tr><td>934</td><td>027121</td><td>Solo - Solo Baru</td></tr>
                                                    <tr><td>935</td><td>027122</td><td>Solo - Solo Baru</td></tr>
                                                    <tr><td>936</td><td>027123</td><td>Solo - Solo Baru</td></tr>
                                                    <tr><td>937</td><td>027124</td><td>Solo - Solo Baru</td></tr>
                                                    <tr><td>938</td><td>0271624</td><td>Solo - Solo Baru</td></tr>
                                                    <tr><td>939</td><td>0271625</td><td>Solo - Solo Baru</td></tr>
                                                    <tr><td>940</td><td>0271626</td><td>Solo - Solo Baru</td></tr>
                                                    <tr><td>941</td><td>0271638</td><td>Solo-Gladak</td></tr>
                                                    <tr><td>942</td><td>027190</td><td>Sragen</td></tr>
                                                    <tr><td>943</td><td>027191</td><td>Sragen</td></tr>
                                                    <tr><td>944</td><td>027192</td><td>Sragen</td></tr>
                                                    <tr><td>945</td><td>0271893</td><td>Sragen</td></tr>
                                                    <tr><td>946</td><td>0271894</td><td>Sragen</td></tr>
                                                    <tr><td>947</td><td>0271590</td><td>Sukoharjo</td></tr>
                                                    <tr><td>948</td><td>0271591</td><td>Sukoharjo</td></tr>
                                                    <tr><td>949</td><td>0271592</td><td>Sukoharjo</td></tr>
                                                    <tr><td>950</td><td>0271593</td><td>Sukoharjo</td></tr>
                                                    <tr><td>951</td><td>027197</td><td>Tawangmangu</td></tr>
                                                    <tr><td>952</td><td>027250</td><td>Delanggu</td></tr>
                                                    <tr><td>953</td><td>027251</td><td>Delanggu</td></tr>
                                                    <tr><td>954</td><td>027252</td><td>Delanggu</td></tr>
                                                    <tr><td>955</td><td>027253</td><td>Delanggu</td></tr>
                                                    <tr><td>956</td><td>0272554</td><td>Delanggu</td></tr>
                                                    <tr><td>957</td><td>0272555</td><td>Delanggu</td></tr>
                                                    <tr><td>958</td><td>0272556</td><td>Delanggu</td></tr>
                                                    <tr><td>959</td><td>0272557</td><td>Delanggu</td></tr>
                                                    <tr><td>960</td><td>0272558</td><td>Delanggu</td></tr>
                                                    <tr><td>961</td><td>0272337</td><td>Jatinom</td></tr>
                                                    <tr><td>962</td><td>0272</td><td>Klaten</td></tr>
                                                    <tr><td>963</td><td>02721</td><td>Klaten</td></tr>
                                                    <tr><td>964</td><td>027220</td><td>Klaten</td></tr>
                                                    <tr><td>965</td><td>027221</td><td>Klaten</td></tr>
                                                    <tr><td>966</td><td>027222</td><td>Klaten</td></tr>
                                                    <tr><td>967</td><td>027223</td><td>Klaten</td></tr>
                                                    <tr><td>968</td><td>027224</td><td>Klaten</td></tr>
                                                    <tr><td>969</td><td>027225</td><td>Klaten</td></tr>
                                                    <tr><td>970</td><td>027226</td><td>Klaten</td></tr>
                                                    <tr><td>971</td><td>0272320</td><td>Klaten</td></tr>
                                                    <tr><td>972</td><td>0272326</td><td>Klaten</td></tr>
                                                    <tr><td>973</td><td>0272327</td><td>Klaten</td></tr>
                                                    <tr><td>974</td><td>0272328</td><td>Klaten</td></tr>
                                                    <tr><td>975</td><td>0272329</td><td>Klaten</td></tr>
                                                    <tr><td>976</td><td>0272330</td><td>Klaten</td></tr>
                                                    <tr><td>977</td><td>0272881</td><td>Pedan</td></tr>
                                                    <tr><td>978</td><td>0272890</td><td>Pedan</td></tr>
                                                    <tr><td>979</td><td>0272891</td><td>Pedan</td></tr>
                                                    <tr><td>980</td><td>0272892</td><td>Pedan</td></tr>
                                                    <tr><td>981</td><td>0272893</td><td>Pedan</td></tr>
                                                    <tr><td>982</td><td>0272894</td><td>Pedan</td></tr>
                                                    <tr><td>983</td><td>0272895</td><td>Pedan</td></tr>
                                                    <tr><td>984</td><td>0272896</td><td>Pedan</td></tr>
                                                    <tr><td>985</td><td>02728976</td><td>Pedan</td></tr>
                                                    <tr><td>986</td><td>02728977</td><td>Pedan</td></tr>
                                                    <tr><td>987</td><td>02728978</td><td>Pedan</td></tr>
                                                    <tr><td>988</td><td>02728979</td><td>Pedan</td></tr>
                                                    <tr><td>989</td><td>02728980</td><td>Pedan</td></tr>
                                                    <tr><td>990</td><td>027361</td><td>Baturetno</td></tr>
                                                    <tr><td>991</td><td>0273411</td><td>Jatisrono</td></tr>
                                                    <tr><td>992</td><td>0273412</td><td>Jatisrono</td></tr>
                                                    <tr><td>993</td><td>0273415</td><td>Purwantoro</td></tr>
                                                    <tr><td>994</td><td>0273331</td><td>Sidoharjo</td></tr>
                                                    <tr><td>995</td><td>0273</td><td>Wonogiri</td></tr>
                                                    <tr><td>996</td><td>02731</td><td>Wonogiri</td></tr>
                                                    <tr><td>997</td><td>027321</td><td>Wonogiri</td></tr>
                                                    <tr><td>998</td><td>027322</td><td>Wonogiri</td></tr>
                                                    <tr><td>999</td><td>027323</td><td>Wonogiri</td></tr>
                                                    <tr><td>1000</td><td>027324</td><td>Wonogiri</td></tr>
                                                    <tr><td>1001</td><td>0273325</td><td>Wonogiri</td></tr>
                                                    <tr><td>1002</td><td>0274485</td><td>Babarsari</td></tr>
                                                    <tr><td>1003</td><td>0274486</td><td>Babarsari</td></tr>
                                                    <tr><td>1004</td><td>0274487</td><td>Babarsari</td></tr>
                                                    <tr><td>1005</td><td>0274488</td><td>Babarsari</td></tr>
                                                    <tr><td>1006</td><td>0274489</td><td>Babarsari</td></tr>
                                                    <tr><td>1007</td><td>0274367</td><td>Bantul</td></tr>
                                                    <tr><td>1008</td><td>0274368</td><td>Bantul</td></tr>
                                                    <tr><td>1009</td><td>027498</td><td>Godean</td></tr>
                                                    <tr><td>1010</td><td>0274797</td><td>Godean</td></tr>
                                                    <tr><td>1011</td><td>0274798</td><td>Godean</td></tr>
                                                    <tr><td>1012</td><td>0274496</td><td>Kalasan</td></tr>
                                                    <tr><td>1013</td><td>0274497</td><td>Kalasan</td></tr>
                                                    <tr><td>1014</td><td>0274498</td><td>Kalasan</td></tr>
                                                    <tr><td>1015</td><td>0274491</td><td>Kalasan Wll V5.1</td></tr>
                                                    <tr><td>1016</td><td>0274890</td><td>Pakem</td></tr>
                                                    <tr><td>1017</td><td>0274891</td><td>Pakem</td></tr>
                                                    <tr><td>1018</td><td>0274892</td><td>Pakem</td></tr>
                                                    <tr><td>1019</td><td>0274893</td><td>Pakem</td></tr>
                                                    <tr><td>1020</td><td>0274894</td><td>Pakem</td></tr>
                                                    <tr><td>1021</td><td>0274895</td><td>Pakem</td></tr>
                                                    <tr><td>1022</td><td>0274896</td><td>Pakem</td></tr>
                                                    <tr><td>1023</td><td>0274897</td><td>Pakem</td></tr>
                                                    <tr><td>1024</td><td>0274898</td><td>Pakem</td></tr>
                                                    <tr><td>1025</td><td>0274899</td><td>Pakem</td></tr>
                                                    <tr><td>1026</td><td>0274860</td><td>Sleman</td></tr>
                                                    <tr><td>1027</td><td>0274861</td><td>Sleman</td></tr>
                                                    <tr><td>1028</td><td>0274862</td><td>Sleman</td></tr>
                                                    <tr><td>1029</td><td>0274863</td><td>Sleman</td></tr>
                                                    <tr><td>1030</td><td>0274864</td><td>Sleman</td></tr>
                                                    <tr><td>1031</td><td>0274865</td><td>Sleman</td></tr>
                                                    <tr><td>1032</td><td>0274866</td><td>Sleman</td></tr>
                                                    <tr><td>1033</td><td>0274867</td><td>Sleman</td></tr>
                                                    <tr><td>1034</td><td>0274868</td><td>Sleman</td></tr>
                                                    <tr><td>1035</td><td>0274869</td><td>Sleman</td></tr>
                                                    <tr><td>1036</td><td>0274773</td><td>Watesyogya</td></tr>
                                                    <tr><td>1037</td><td>0274774</td><td>Watesyogya</td></tr>
                                                    <tr><td>1038</td><td>0274391</td><td>Wonosariyogya</td></tr>
                                                    <tr><td>1039</td><td>0274392</td><td>Wonosariyogya</td></tr>
                                                    <tr><td>1040</td><td>0274393</td><td>Wonosariyogya</td></tr>
                                                    <tr><td>1041</td><td>0274394</td><td>Wonosariyogya</td></tr>
                                                    <tr><td>1042</td><td>0274</td><td>Yogyakarta</td></tr>
                                                    <tr><td>1043</td><td>027490</td><td>Yogyakarta - Kentungan</td></tr>
                                                    <tr><td>1044</td><td>0274870</td><td>Yogyakarta - Kentungan</td></tr>
                                                    <tr><td>1045</td><td>0274880</td><td>Yogyakarta - Kentungan</td></tr>
                                                    <tr><td>1046</td><td>0274881</td><td>Yogyakarta - Kentungan</td></tr>
                                                    <tr><td>1047</td><td>0274882</td><td>Yogyakarta - Kentungan</td></tr>
                                                    <tr><td>1048</td><td>0274883</td><td>Yogyakarta - Kentungan</td></tr>
                                                    <tr><td>1049</td><td>0274884</td><td>Yogyakarta - Kentungan</td></tr>
                                                    <tr><td>1050</td><td>0274885</td><td>Yogyakarta - Kentungan</td></tr>
                                                    <tr><td>1051</td><td>0274886</td><td>Yogyakarta - Kentungan</td></tr>
                                                    <tr><td>1052</td><td>0274887</td><td>Yogyakarta - Kentungan</td></tr>
                                                    <tr><td>1053</td><td>0274888</td><td>Yogyakarta - Kentungan</td></tr>
                                                    <tr><td>1054</td><td>0274889</td><td>Yogyakarta - Kentungan</td></tr>
                                                    <tr><td>1055</td><td>02741</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1056</td><td>027413</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1057</td><td>027455</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1058</td><td>027461</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1059</td><td>027462</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1060</td><td>0274510</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1061</td><td>0274511</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1062</td><td>0274512</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1063</td><td>0274513</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1064</td><td>0274514</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1065</td><td>0274515</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1066</td><td>0274516</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1067</td><td>0274517</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1068</td><td>0274518</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1069</td><td>0274519</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1070</td><td>0274520</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1071</td><td>0274521</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1072</td><td>0274522</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1073</td><td>0274523</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1074</td><td>0274524</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1075</td><td>0274525</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1076</td><td>0274526</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1077</td><td>0274527</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1078</td><td>0274528</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1079</td><td>0274529</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1080</td><td>0274530</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1081</td><td>0274540</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1082</td><td>0274541</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1083</td><td>0274542</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1084</td><td>0274543</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1085</td><td>0274544</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1086</td><td>0274545</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1087</td><td>0274546</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1088</td><td>0274547</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1089</td><td>0274548</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1090</td><td>0274549</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1091</td><td>0274560</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1092</td><td>0274561</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1093</td><td>0274562</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1094</td><td>0274563</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1095</td><td>0274564</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1096</td><td>0274565</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1097</td><td>0274566</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1098</td><td>0274567</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1099</td><td>0274568</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1100</td><td>0274569</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1101</td><td>0274570</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1102</td><td>0274571</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1103</td><td>0274572</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1104</td><td>0274573</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1105</td><td>0274574</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1106</td><td>0274575</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1107</td><td>0274576</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1108</td><td>0274577</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1109</td><td>0274578</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1110</td><td>0274579</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1111</td><td>0274580</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1112</td><td>0274581</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1113</td><td>0274582</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1114</td><td>0274583</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1115</td><td>0274584</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1116</td><td>0274585</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1117</td><td>0274586</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1118</td><td>0274587</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1119</td><td>0274588</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1120</td><td>0274589</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1121</td><td>0274590</td><td>Yogyakarta - Kotabaru</td></tr>
                                                    <tr><td>1122</td><td>0274451</td><td>Yogyakarta - Kotagede</td></tr>
                                                    <tr><td>1123</td><td>0274452</td><td>Yogyakarta - Kotagede</td></tr>
                                                    <tr><td>1124</td><td>0274453</td><td>Yogyakarta - Kotagede</td></tr>
                                                    <tr><td>1125</td><td>0274454</td><td>Yogyakarta - Kotagede</td></tr>
                                                    <tr><td>1126</td><td>0274455</td><td>Yogyakarta - Kotagede</td></tr>
                                                    <tr><td>1127</td><td>0274456</td><td>Yogyakarta - Kotagede</td></tr>
                                                    <tr><td>1128</td><td>0274457</td><td>Yogyakarta - Kotagede</td></tr>
                                                    <tr><td>1129</td><td>027441</td><td>Yogyakarta - Pugeran</td></tr>
                                                    <tr><td>1130</td><td>0274370</td><td>Yogyakarta - Pugeran</td></tr>
                                                    <tr><td>1131</td><td>0274371</td><td>Yogyakarta - Pugeran</td></tr>
                                                    <tr><td>1132</td><td>0274372</td><td>Yogyakarta - Pugeran</td></tr>
                                                    <tr><td>1133</td><td>0274373</td><td>Yogyakarta - Pugeran</td></tr>
                                                    <tr><td>1134</td><td>0274374</td><td>Yogyakarta - Pugeran</td></tr>
                                                    <tr><td>1135</td><td>0274375</td><td>Yogyakarta - Pugeran</td></tr>
                                                    <tr><td>1136</td><td>0274376</td><td>Yogyakarta - Pugeran</td></tr>
                                                    <tr><td>1137</td><td>0274377</td><td>Yogyakarta - Pugeran</td></tr>
                                                    <tr><td>1138</td><td>0274378</td><td>Yogyakarta - Pugeran</td></tr>
                                                    <tr><td>1139</td><td>0274379</td><td>Yogyakarta - Pugeran</td></tr>
                                                    <tr><td>1140</td><td>0274380</td><td>Yogyakarta - Pugeran</td></tr>
                                                    <tr><td>1141</td><td>0274381</td><td>Yogyakarta - Pugeran</td></tr>
                                                    <tr><td>1142</td><td>0274382</td><td>Yogyakarta - Pugeran</td></tr>
                                                    <tr><td>1143</td><td>0274383</td><td>Yogyakarta - Pugeran</td></tr>
                                                    <tr><td>1144</td><td>0274384</td><td>Yogyakarta - Pugeran</td></tr>
                                                    <tr><td>1145</td><td>0274385</td><td>Yogyakarta - Pugeran</td></tr>
                                                    <tr><td>1146</td><td>0274386</td><td>Yogyakarta - Pugeran</td></tr>
                                                    <tr><td>1147</td><td>0274387</td><td>Yogyakarta - Pugeran</td></tr>
                                                    <tr><td>1148</td><td>0274388</td><td>Yogyakarta - Pugeran</td></tr>
                                                    <tr><td>1149</td><td>0274389</td><td>Yogyakarta - Pugeran</td></tr>
                                                    <tr><td>1150</td><td>0274449</td><td>Yogyakarta - Pugeran</td></tr>
                                                    <tr><td>1151</td><td>027541</td><td>Kutoarjo</td></tr>
                                                    <tr><td>1152</td><td>027542</td><td>Kutoarjo</td></tr>
                                                    <tr><td>1153</td><td>027556</td><td>Purwodadi-Purworejo</td></tr>
                                                    <tr><td>1154</td><td>0275756</td><td>Purwodadi-Purworejo</td></tr>
                                                    <tr><td>1155</td><td>0275</td><td>Purworejo</td></tr>
                                                    <tr><td>1156</td><td>02751</td><td>Purworejo</td></tr>
                                                    <tr><td>1157</td><td>027521</td><td>Purworejo</td></tr>
                                                    <tr><td>1158</td><td>027522</td><td>Purworejo</td></tr>
                                                    <tr><td>1159</td><td>027523</td><td>Purworejo</td></tr>
                                                    <tr><td>1160</td><td>027524</td><td>Purworejo</td></tr>
                                                    <tr><td>1161</td><td>0275324</td><td>Purworejo</td></tr>
                                                    <tr><td>1162</td><td>0275325</td><td>Purworejo</td></tr>
                                                    <tr><td>1163</td><td>0276331</td><td>Ampel</td></tr>
                                                    <tr><td>1164</td><td>0276332</td><td>Banyudono</td></tr>
                                                    <tr><td>1165</td><td>0276</td><td>Boyolali</td></tr>
                                                    <tr><td>1166</td><td>02761</td><td>Boyolali</td></tr>
                                                    <tr><td>1167</td><td>027621</td><td>Boyolali</td></tr>
                                                    <tr><td>1168</td><td>027622</td><td>Boyolali</td></tr>
                                                    <tr><td>1169</td><td>027623</td><td>Boyolali</td></tr>
                                                    <tr><td>1170</td><td>0276324</td><td>Boyolali</td></tr>
                                                    <tr><td>1171</td><td>0276325</td><td>Boyolali</td></tr>
                                                    <tr><td>1172</td><td>0276326</td><td>Boyolali</td></tr>
                                                    <tr><td>1173</td><td>0280</td><td>Majenang</td></tr>
                                                    <tr><td>1174</td><td>02801</td><td>Majenang</td></tr>
                                                    <tr><td>1175</td><td>0280621</td><td>Majenang</td></tr>
                                                    <tr><td>1176</td><td>0280622</td><td>Majenang</td></tr>
                                                    <tr><td>1177</td><td>0280623</td><td>Majenang</td></tr>
                                                    <tr><td>1178</td><td>0280624</td><td>Majenang</td></tr>
                                                    <tr><td>1179</td><td>02803</td><td>Sidareja</td></tr>
                                                    <tr><td>1180</td><td>0280523</td><td>Sidareja</td></tr>
                                                    <tr><td>1181</td><td>0281571</td><td>Ajibarang</td></tr>
                                                    <tr><td>1182</td><td>0281572</td><td>Ajibarang</td></tr>
                                                    <tr><td>1183</td><td>028196</td><td>Banyumas</td></tr>
                                                    <tr><td>1184</td><td>0281681</td><td>Baturaden</td></tr>
                                                    <tr><td>1185</td><td>0281682</td><td>Baturaden</td></tr>
                                                    <tr><td>1186</td><td>028159</td><td>Bobotsari</td></tr>
                                                    <tr><td>1187</td><td>0281758</td><td>Bobotsari</td></tr>
                                                    <tr><td>1188</td><td>0281759</td><td>Bobotsari</td></tr>
                                                    <tr><td>1189</td><td>0281655</td><td>Cilongok</td></tr>
                                                    <tr><td>1190</td><td>0281656</td><td>Cilongok</td></tr>
                                                    <tr><td>1191</td><td>028191</td><td>Purbalingga</td></tr>
                                                    <tr><td>1192</td><td>028192</td><td>Purbalingga</td></tr>
                                                    <tr><td>1193</td><td>028193</td><td>Purbalingga</td></tr>
                                                    <tr><td>1194</td><td>0281893</td><td>Purbalingga</td></tr>
                                                    <tr><td>1195</td><td>0281894</td><td>Purbalingga</td></tr>
                                                    <tr><td>1196</td><td>0281895</td><td>Purbalingga</td></tr>
                                                    <tr><td>1197</td><td>0281896</td><td>Purbalingga</td></tr>
                                                    <tr><td>1198</td><td>0281</td><td>Purwokerto</td></tr>
                                                    <tr><td>1199</td><td>02811</td><td>Purwokerto</td></tr>
                                                    <tr><td>1200</td><td>028130</td><td>Purwokerto</td></tr>
                                                    <tr><td>1201</td><td>028131</td><td>Purwokerto</td></tr>
                                                    <tr><td>1202</td><td>028132</td><td>Purwokerto</td></tr>
                                                    <tr><td>1203</td><td>028133</td><td>Purwokerto</td></tr>
                                                    <tr><td>1204</td><td>028134</td><td>Purwokerto</td></tr>
                                                    <tr><td>1205</td><td>028135</td><td>Purwokerto</td></tr>
                                                    <tr><td>1206</td><td>028136</td><td>Purwokerto</td></tr>
                                                    <tr><td>1207</td><td>028137</td><td>Purwokerto</td></tr>
                                                    <tr><td>1208</td><td>028138</td><td>Purwokerto</td></tr>
                                                    <tr><td>1209</td><td>028139</td><td>Purwokerto</td></tr>
                                                    <tr><td>1210</td><td>028140</td><td>Purwokerto</td></tr>
                                                    <tr><td>1211</td><td>028141</td><td>Purwokerto</td></tr>
                                                    <tr><td>1212</td><td>0281621</td><td>Purwokerto</td></tr>
                                                    <tr><td>1213</td><td>0281622</td><td>Purwokerto</td></tr>
                                                    <tr><td>1214</td><td>0281623</td><td>Purwokerto</td></tr>
                                                    <tr><td>1215</td><td>0281624</td><td>Purwokerto</td></tr>
                                                    <tr><td>1216</td><td>0281625</td><td>Purwokerto</td></tr>
                                                    <tr><td>1217</td><td>0281626</td><td>Purwokerto</td></tr>
                                                    <tr><td>1218</td><td>0281627</td><td>Purwokerto</td></tr>
                                                    <tr><td>1219</td><td>0281628</td><td>Purwokerto</td></tr>
                                                    <tr><td>1220</td><td>0281629</td><td>Purwokerto</td></tr>
                                                    <tr><td>1221</td><td>0281645</td><td>Purwokerto</td></tr>
                                                    <tr><td>1222</td><td>028194</td><td>Sukaraja</td></tr>
                                                    <tr><td>1223</td><td>0281692</td><td>Sukaraja</td></tr>
                                                    <tr><td>1224</td><td>0281511</td><td>Wangon</td></tr>
                                                    <tr><td>1225</td><td>0282</td><td>Cilacap</td></tr>
                                                    <tr><td>1226</td><td>02821</td><td>Cilacap</td></tr>
                                                    <tr><td>1227</td><td>028231</td><td>Cilacap</td></tr>
                                                    <tr><td>1228</td><td>028232</td><td>Cilacap</td></tr>
                                                    <tr><td>1229</td><td>028233</td><td>Cilacap</td></tr>
                                                    <tr><td>1230</td><td>028234</td><td>Cilacap</td></tr>
                                                    <tr><td>1231</td><td>028235</td><td>Cilacap</td></tr>
                                                    <tr><td>1232</td><td>028236</td><td>Cilacap</td></tr>
                                                    <tr><td>1233</td><td>028237</td><td>Cilacap</td></tr>
                                                    <tr><td>1234</td><td>028238</td><td>Cilacap</td></tr>
                                                    <tr><td>1235</td><td>028241</td><td>Cilacap</td></tr>
                                                    <tr><td>1236</td><td>028242</td><td>Cilacap</td></tr>
                                                    <tr><td>1237</td><td>028243</td><td>Cilacap</td></tr>
                                                    <tr><td>1238</td><td>028244</td><td>Cilacap</td></tr>
                                                    <tr><td>1239</td><td>028245</td><td>Cilacap</td></tr>
                                                    <tr><td>1240</td><td>028288</td><td>Cilacap</td></tr>
                                                    <tr><td>1241</td><td>0282520</td><td>Cilacap</td></tr>
                                                    <tr><td>1242</td><td>0282521</td><td>Cilacap</td></tr>
                                                    <tr><td>1243</td><td>0282540</td><td>Cilacap</td></tr>
                                                    <tr><td>1244</td><td>0282545</td><td>Cilacap</td></tr>
                                                    <tr><td>1245</td><td>0282546</td><td>Cilacap</td></tr>
                                                    <tr><td>1246</td><td>0282547</td><td>Cilacap</td></tr>
                                                    <tr><td>1247</td><td>0282548</td><td>Cilacap</td></tr>
                                                    <tr><td>1248</td><td>0282549</td><td>Cilacap</td></tr>
                                                    <tr><td>1249</td><td>028294</td><td>Kroya</td></tr>
                                                    <tr><td>1250</td><td>0282492</td><td>Kroya</td></tr>
                                                    <tr><td>1251</td><td>028295</td><td>Maos</td></tr>
                                                    <tr><td>1252</td><td>028342</td><td>Adiwerna</td></tr>
                                                    <tr><td>1253</td><td>028343</td><td>Adiwerna</td></tr>
                                                    <tr><td>1254</td><td>0283444</td><td>Adiwerna</td></tr>
                                                    <tr><td>1255</td><td>0283445</td><td>Adiwerna</td></tr>
                                                    <tr><td>1256</td><td>0283446</td><td>Adiwerna</td></tr>
                                                    <tr><td>1257</td><td>0283462</td><td>Balapulang</td></tr>
                                                    <tr><td>1258</td><td>0283463</td><td>Balapulang</td></tr>
                                                    <tr><td>1259</td><td>0283464</td><td>Balapulang</td></tr>
                                                    <tr><td>1260</td><td>028371</td><td>Brebes</td></tr>
                                                    <tr><td>1261</td><td>028372</td><td>Brebes</td></tr>
                                                    <tr><td>1262</td><td>028373</td><td>Brebes</td></tr>
                                                    <tr><td>1263</td><td>0283673</td><td>Brebes</td></tr>
                                                    <tr><td>1264</td><td>0283870</td><td>Bulakamba</td></tr>
                                                    <tr><td>1265</td><td>0283871</td><td>Bulakamba</td></tr>
                                                    <tr><td>1266</td><td>028381</td><td>Ketanggungantimur</td></tr>
                                                    <tr><td>1267</td><td>028382</td><td>Ketanggungantimur</td></tr>
                                                    <tr><td>1268</td><td>0283882</td><td>Ketanggungantimur</td></tr>
                                                    <tr><td>1269</td><td>0283310</td><td>Margadana</td></tr>
                                                    <tr><td>1270</td><td>0283311</td><td>Margadana</td></tr>
                                                    <tr><td>1271</td><td>0283312</td><td>Margadana</td></tr>
                                                    <tr><td>1272</td><td>0283316</td><td>Margadana</td></tr>
                                                    <tr><td>1273</td><td>028391</td><td>Slawi</td></tr>
                                                    <tr><td>1274</td><td>028392</td><td>Slawi</td></tr>
                                                    <tr><td>1275</td><td>028394</td><td>Slawi</td></tr>
                                                    <tr><td>1276</td><td>0283493</td><td>Slawi</td></tr>
                                                    <tr><td>1277</td><td>0283877</td><td>Tanjungtegal</td></tr>
                                                    <tr><td>1278</td><td>0283</td><td>Tegal</td></tr>
                                                    <tr><td>1279</td><td>02831</td><td>Tegal</td></tr>
                                                    <tr><td>1280</td><td>028350</td><td>Tegal</td></tr>
                                                    <tr><td>1281</td><td>028351</td><td>Tegal</td></tr>
                                                    <tr><td>1282</td><td>028352</td><td>Tegal</td></tr>
                                                    <tr><td>1283</td><td>028353</td><td>Tegal</td></tr>
                                                    <tr><td>1284</td><td>028354</td><td>Tegal</td></tr>
                                                    <tr><td>1285</td><td>028355</td><td>Tegal</td></tr>
                                                    <tr><td>1286</td><td>028356</td><td>Tegal</td></tr>
                                                    <tr><td>1287</td><td>028357</td><td>Tegal</td></tr>
                                                    <tr><td>1288</td><td>028358</td><td>Tegal</td></tr>
                                                    <tr><td>1289</td><td>028359</td><td>Tegal</td></tr>
                                                    <tr><td>1290</td><td>0283320</td><td>Tegal</td></tr>
                                                    <tr><td>1291</td><td>0283321</td><td>Tegal</td></tr>
                                                    <tr><td>1292</td><td>0283322</td><td>Tegal</td></tr>
                                                    <tr><td>1293</td><td>0283323</td><td>Tegal</td></tr>
                                                    <tr><td>1294</td><td>0283340</td><td>Tegal</td></tr>
                                                    <tr><td>1295</td><td>0283341</td><td>Tegal</td></tr>
                                                    <tr><td>1296</td><td>0283342</td><td>Tegal</td></tr>
                                                    <tr><td>1297</td><td>0283343</td><td>Tegal</td></tr>
                                                    <tr><td>1298</td><td>0284</td><td>Pemalang</td></tr>
                                                    <tr><td>1299</td><td>02841</td><td>Pemalang</td></tr>
                                                    <tr><td>1300</td><td>028421</td><td>Pemalang</td></tr>
                                                    <tr><td>1301</td><td>028422</td><td>Pemalang</td></tr>
                                                    <tr><td>1302</td><td>028423</td><td>Pemalang</td></tr>
                                                    <tr><td>1303</td><td>0284324</td><td>Pemalang</td></tr>
                                                    <tr><td>1304</td><td>0284325</td><td>Pemalang</td></tr>
                                                    <tr><td>1305</td><td>028484</td><td>Randudongkal</td></tr>
                                                    <tr><td>1306</td><td>0284582</td><td>Randudongkal</td></tr>
                                                    <tr><td>1307</td><td>028589</td><td>Bandarsedayu</td></tr>
                                                    <tr><td>1308</td><td>028591</td><td>Batang</td></tr>
                                                    <tr><td>1309</td><td>028592</td><td>Batang</td></tr>
                                                    <tr><td>1310</td><td>0285392</td><td>Batang</td></tr>
                                                    <tr><td>1311</td><td>028577</td><td>Comal</td></tr>
                                                    <tr><td>1312</td><td>0285577</td><td>Comal</td></tr>
                                                    <tr><td>1313</td><td>0285381</td><td>Kajen</td></tr>
                                                    <tr><td>1314</td><td>028585</td><td>Kedungwuni</td></tr>
                                                    <tr><td>1315</td><td>0285</td><td>Pekalongan</td></tr>
                                                    <tr><td>1316</td><td>02851</td><td>Pekalongan</td></tr>
                                                    <tr><td>1317</td><td>02852</td><td>Pekalongan</td></tr>
                                                    <tr><td>1318</td><td>028541</td><td>Pekalongan</td></tr>
                                                    <tr><td>1319</td><td>028543</td><td>Pekalongan</td></tr>
                                                    <tr><td>1320</td><td>028581</td><td>Pekalongan</td></tr>
                                                    <tr><td>1321</td><td>0285451</td><td>Pekalongan</td></tr>
                                                    <tr><td>1322</td><td>0285666</td><td>Subah</td></tr>
                                                    <tr><td>1323</td><td>0286</td><td>Banjarnegara</td></tr>
                                                    <tr><td>1324</td><td>02861</td><td>Banjarnegara</td></tr>
                                                    <tr><td>1325</td><td>028691</td><td>Banjarnegara</td></tr>
                                                    <tr><td>1326</td><td>028692</td><td>Banjarnegara</td></tr>
                                                    <tr><td>1327</td><td>0286593</td><td>Banjarnegara</td></tr>
                                                    <tr><td>1328</td><td>0286594</td><td>Banjarnegara</td></tr>
                                                    <tr><td>1329</td><td>0286595</td><td>Banjarnegara</td></tr>
                                                    <tr><td>1330</td><td>0286597</td><td>Bawang</td></tr>
                                                    <tr><td>1331</td><td>0286641</td><td>Karangkobar</td></tr>
                                                    <tr><td>1332</td><td>0286329</td><td>Kertek</td></tr>
                                                    <tr><td>1333</td><td>028679</td><td>Klampok</td></tr>
                                                    <tr><td>1334</td><td>0286411</td><td>Mandiraja</td></tr>
                                                    <tr><td>1335</td><td>0286611</td><td>Sapuran</td></tr>
                                                    <tr><td>1336</td><td>028621</td><td>Wonosobo</td></tr>
                                                    <tr><td>1337</td><td>028622</td><td>Wonosobo</td></tr>
                                                    <tr><td>1338</td><td>028623</td><td>Wonosobo</td></tr>
                                                    <tr><td>1339</td><td>028624</td><td>Wonosobo</td></tr>
                                                    <tr><td>1340</td><td>028632</td><td>Wonosobo</td></tr>
                                                    <tr><td>1341</td><td>028771</td><td>Gombong</td></tr>
                                                    <tr><td>1342</td><td>028772</td><td>Gombong</td></tr>
                                                    <tr><td>1343</td><td>0287473</td><td>Gombong</td></tr>
                                                    <tr><td>1344</td><td>0287</td><td>Karanganyar Kebumen</td></tr>
                                                    <tr><td>1345</td><td>02871</td><td>Karanganyar Kebumen</td></tr>
                                                    <tr><td>1346</td><td>028751</td><td>Karanganyar Kebumen</td></tr>
                                                    <tr><td>1347</td><td>0287551</td><td>Karanganyar Kebumen</td></tr>
                                                    <tr><td>1348</td><td>028781</td><td>Kebumen</td></tr>
                                                    <tr><td>1349</td><td>028782</td><td>Kebumen</td></tr>
                                                    <tr><td>1350</td><td>028783</td><td>Kebumen</td></tr>
                                                    <tr><td>1351</td><td>0287384</td><td>Kebumen</td></tr>
                                                    <tr><td>1352</td><td>0287385</td><td>Kebumen</td></tr>
                                                    <tr><td>1353</td><td>028761</td><td>Kutowinangun</td></tr>
                                                    <tr><td>1354</td><td>0287361</td><td>Kutowinangun</td></tr>
                                                    <tr><td>1355</td><td>0287661</td><td>Kutowinangun</td></tr>
                                                    <tr><td>1356</td><td>0289</td><td>Bumiayu</td></tr>
                                                    <tr><td>1357</td><td>02891</td><td>Bumiayu</td></tr>
                                                    <tr><td>1358</td><td>028932</td><td>Bumiayu</td></tr>
                                                    <tr><td>1359</td><td>0289430</td><td>Bumiayu</td></tr>
                                                    <tr><td>1360</td><td>0289432</td><td>Bumiayu</td></tr>
                                                    <tr><td>1361</td><td>029171</td><td>Bangsri</td></tr>
                                                    <tr><td>1362</td><td>0291771</td><td>Bangsri</td></tr>
                                                    <tr><td>1363</td><td>0291772</td><td>Bangsri</td></tr>
                                                    <tr><td>1364</td><td>029185</td><td>Demak</td></tr>
                                                    <tr><td>1365</td><td>029186</td><td>Demak</td></tr>
                                                    <tr><td>1366</td><td>0291681</td><td>Demak</td></tr>
                                                    <tr><td>1367</td><td>0291682</td><td>Demak</td></tr>
                                                    <tr><td>1368</td><td>0291687</td><td>Demak</td></tr>
                                                    <tr><td>1369</td><td>0291688</td><td>Demak</td></tr>
                                                    <tr><td>1370</td><td>0291689</td><td>Demak</td></tr>
                                                    <tr><td>1371</td><td>02911300</td><td>Demak</td></tr>
                                                    <tr><td>1372</td><td>029113005</td><td>Demak</td></tr>
                                                    <tr><td>1373</td><td>029113033</td><td>Demak</td></tr>
                                                    <tr><td>1374</td><td>029191</td><td>Jepara</td></tr>
                                                    <tr><td>1375</td><td>029192</td><td>Jepara</td></tr>
                                                    <tr><td>1376</td><td>029193</td><td>Jepara</td></tr>
                                                    <tr><td>1377</td><td>029194</td><td>Jepara</td></tr>
                                                    <tr><td>1378</td><td>0291595</td><td>Jepara</td></tr>
                                                    <tr><td>1379</td><td>0291596</td><td>Jepara</td></tr>
                                                    <tr><td>1380</td><td>029179</td><td>Keling</td></tr>
                                                    <tr><td>1381</td><td>0291579</td><td>Keling</td></tr>
                                                    <tr><td>1382</td><td>0291</td><td>Kudus</td></tr>
                                                    <tr><td>1383</td><td>02911</td><td>Kudus</td></tr>
                                                    <tr><td>1384</td><td>029125</td><td>Kudus</td></tr>
                                                    <tr><td>1385</td><td>029130</td><td>Kudus</td></tr>
                                                    <tr><td>1386</td><td>029131</td><td>Kudus</td></tr>
                                                    <tr><td>1387</td><td>029132</td><td>Kudus</td></tr>
                                                    <tr><td>1388</td><td>029133</td><td>Kudus</td></tr>
                                                    <tr><td>1389</td><td>029134</td><td>Kudus</td></tr>
                                                    <tr><td>1390</td><td>029135</td><td>Kudus</td></tr>
                                                    <tr><td>1391</td><td>029136</td><td>Kudus</td></tr>
                                                    <tr><td>1392</td><td>029137</td><td>Kudus</td></tr>
                                                    <tr><td>1393</td><td>029138</td><td>Kudus</td></tr>
                                                    <tr><td>1394</td><td>029139</td><td>Kudus</td></tr>
                                                    <tr><td>1395</td><td>0291414</td><td>Kudus</td></tr>
                                                    <tr><td>1396</td><td>0291440</td><td>Kudus</td></tr>
                                                    <tr><td>1397</td><td>0291441</td><td>Kudus</td></tr>
                                                    <tr><td>1398</td><td>0291442</td><td>Kudus</td></tr>
                                                    <tr><td>1399</td><td>0291443</td><td>Kudus</td></tr>
                                                    <tr><td>1400</td><td>0291444</td><td>Kudus</td></tr>
                                                    <tr><td>1401</td><td>029155</td><td>Pecangaan</td></tr>
                                                    <tr><td>1402</td><td>0291751</td><td>Pecangaan</td></tr>
                                                    <tr><td>1403</td><td>0291754</td><td>Pecangaan</td></tr>
                                                    <tr><td>1404</td><td>029259</td><td>Godong</td></tr>
                                                    <tr><td>1405</td><td>0292651</td><td>Godong</td></tr>
                                                    <tr><td>1406</td><td>0292658</td><td>Godong</td></tr>
                                                    <tr><td>1407</td><td>0292533</td><td>Gubug</td></tr>
                                                    <tr><td>1408</td><td>0292</td><td>Purwodadigrobogan</td></tr>
                                                    <tr><td>1409</td><td>02921</td><td>Purwodadigrobogan</td></tr>
                                                    <tr><td>1410</td><td>029221</td><td>Purwodadigrobogan</td></tr>
                                                    <tr><td>1411</td><td>029222</td><td>Purwodadigrobogan</td></tr>
                                                    <tr><td>1412</td><td>029223</td><td>Purwodadigrobogan</td></tr>
                                                    <tr><td>1413</td><td>0292423</td><td>Purwodadigrobogan</td></tr>
                                                    <tr><td>1414</td><td>0292424</td><td>Purwodadigrobogan</td></tr>
                                                    <tr><td>1415</td><td>0292425</td><td>Purwodadigrobogan</td></tr>
                                                    <tr><td>1416</td><td>0292426</td><td>Purwodadigrobogan</td></tr>
                                                    <tr><td>1417</td><td>0292551</td><td>Toroh</td></tr>
                                                    <tr><td>1418</td><td>0292552</td><td>Toroh</td></tr>
                                                    <tr><td>1419</td><td>029261</td><td>Wirosari</td></tr>
                                                    <tr><td>1420</td><td>0293332</td><td>Candimulyo</td></tr>
                                                    <tr><td>1421</td><td>0293711</td><td>Grabag</td></tr>
                                                    <tr><td>1422</td><td>0293</td><td>Magelang</td></tr>
                                                    <tr><td>1423</td><td>029313</td><td>Magelang</td></tr>
                                                    <tr><td>1424</td><td>029361</td><td>Magelang</td></tr>
                                                    <tr><td>1425</td><td>029362</td><td>Magelang</td></tr>
                                                    <tr><td>1426</td><td>029363</td><td>Magelang</td></tr>
                                                    <tr><td>1427</td><td>029364</td><td>Magelang</td></tr>
                                                    <tr><td>1428</td><td>029365</td><td>Magelang</td></tr>
                                                    <tr><td>1429</td><td>029366</td><td>Magelang</td></tr>
                                                    <tr><td>1430</td><td>029367</td><td>Magelang</td></tr>
                                                    <tr><td>1431</td><td>029368</td><td>Magelang</td></tr>
                                                    <tr><td>1432</td><td>029369</td><td>Magelang</td></tr>
                                                    <tr><td>1433</td><td>0293108</td><td>Magelang</td></tr>
                                                    <tr><td>1434</td><td>0293122</td><td>Magelang</td></tr>
                                                    <tr><td>1435</td><td>0293125</td><td>Magelang</td></tr>
                                                    <tr><td>1436</td><td>0293310</td><td>Magelang</td></tr>
                                                    <tr><td>1437</td><td>0293311</td><td>Magelang</td></tr>
                                                    <tr><td>1438</td><td>0293312</td><td>Magelang</td></tr>
                                                    <tr><td>1439</td><td>0293313</td><td>Magelang</td></tr>
                                                    <tr><td>1440</td><td>0293314</td><td>Magelang</td></tr>
                                                    <tr><td>1441</td><td>0293315</td><td>Magelang</td></tr>
                                                    <tr><td>1442</td><td>0293360</td><td>Magelang</td></tr>
                                                    <tr><td>1443</td><td>0293325</td><td>Mertoyudan</td></tr>
                                                    <tr><td>1444</td><td>0293326</td><td>Mertoyudan</td></tr>
                                                    <tr><td>1445</td><td>0293327</td><td>Mertoyudan</td></tr>
                                                    <tr><td>1446</td><td>029388</td><td>Mungkid</td></tr>
                                                    <tr><td>1447</td><td>0293782</td><td>Mungkid</td></tr>
                                                    <tr><td>1448</td><td>029386</td><td>Muntilan</td></tr>
                                                    <tr><td>1449</td><td>029387</td><td>Muntilan</td></tr>
                                                    <tr><td>1450</td><td>0293585</td><td>Muntilan</td></tr>
                                                    <tr><td>1451</td><td>029396</td><td>Parakan</td></tr>
                                                    <tr><td>1452</td><td>029397</td><td>Parakan</td></tr>
                                                    <tr><td>1453</td><td>0293598</td><td>Parakan</td></tr>
                                                    <tr><td>1454</td><td>0293588</td><td>Salam</td></tr>
                                                    <tr><td>1455</td><td>0293335</td><td>Salaman</td></tr>
                                                    <tr><td>1456</td><td>0293788</td><td>Sawitan</td></tr>
                                                    <tr><td>1457</td><td>0293789</td><td>Sawitan</td></tr>
                                                    <tr><td>1458</td><td>0293714</td><td>Secang</td></tr>
                                                    <tr><td>1459</td><td>029391</td><td>Temanggung</td></tr>
                                                    <tr><td>1460</td><td>029392</td><td>Temanggung</td></tr>
                                                    <tr><td>1461</td><td>029393</td><td>Temanggung</td></tr>
                                                    <tr><td>1462</td><td>0293494</td><td>Temanggung</td></tr>
                                                    <tr><td>1463</td><td>029471</td><td>Boja</td></tr>
                                                    <tr><td>1464</td><td>0294571</td><td>Boja</td></tr>
                                                    <tr><td>1465</td><td>0294572</td><td>Boja</td></tr>
                                                    <tr><td>1466</td><td>0294741</td><td>Kaliwun</td></tr>
                                                    <tr><td>1467</td><td>0294743</td><td>Kaliwun</td></tr>
                                                    <tr><td>1468</td><td>0294</td><td>Kendal</td></tr>
                                                    <tr><td>1469</td><td>02941</td><td>Kendal</td></tr>
                                                    <tr><td>1470</td><td>029481</td><td>Kendal</td></tr>
                                                    <tr><td>1471</td><td>029482</td><td>Kendal</td></tr>
                                                    <tr><td>1472</td><td>029483</td><td>Kendal</td></tr>
                                                    <tr><td>1473</td><td>0294383</td><td>Kendal</td></tr>
                                                    <tr><td>1474</td><td>0294384</td><td>Kendal</td></tr>
                                                    <tr><td>1475</td><td>029451</td><td>Sukorejo Kendal</td></tr>
                                                    <tr><td>1476</td><td>0294451</td><td>Sukorejo Kendal</td></tr>
                                                    <tr><td>1477</td><td>0294452</td><td>Sukorejo Kendal</td></tr>
                                                    <tr><td>1478</td><td>029441</td><td>Weleri</td></tr>
                                                    <tr><td>1479</td><td>029442</td><td>Weleri</td></tr>
                                                    <tr><td>1480</td><td>0294643</td><td>Weleri</td></tr>
                                                    <tr><td>1481</td><td>0294644</td><td>Weleri</td></tr>
                                                    <tr><td>1482</td><td>029571</td><td>Juwana</td></tr>
                                                    <tr><td>1483</td><td>029572</td><td>Juwana</td></tr>
                                                    <tr><td>1484</td><td>029531</td><td>Lasem</td></tr>
                                                    <tr><td>1485</td><td>0295531</td><td>Lasem</td></tr>
                                                    <tr><td>1486</td><td>0295532</td><td>Lasem</td></tr>
                                                    <tr><td>1487</td><td>0295</td><td>Pati</td></tr>
                                                    <tr><td>1488</td><td>02951</td><td>Pati</td></tr>
                                                    <tr><td>1489</td><td>029581</td><td>Pati</td></tr>
                                                    <tr><td>1490</td><td>029582</td><td>Pati</td></tr>
                                                    <tr><td>1491</td><td>029583</td><td>Pati</td></tr>
                                                    <tr><td>1492</td><td>029584</td><td>Pati</td></tr>
                                                    <tr><td>1493</td><td>0295384</td><td>Pati</td></tr>
                                                    <tr><td>1494</td><td>0295385</td><td>Pati</td></tr>
                                                    <tr><td>1495</td><td>0295386</td><td>Pati</td></tr>
                                                    <tr><td>1496</td><td>0295387</td><td>Pati</td></tr>
                                                    <tr><td>1497</td><td>029591</td><td>Rembang</td></tr>
                                                    <tr><td>1498</td><td>029592</td><td>Rembang</td></tr>
                                                    <tr><td>1499</td><td>029593</td><td>Rembang</td></tr>
                                                    <tr><td>1500</td><td>0295693</td><td>Rembang</td></tr>
                                                    <tr><td>1501</td><td>029552</td><td>Tayu</td></tr>
                                                    <tr><td>1502</td><td>0295452</td><td>Tayu</td></tr>
                                                    <tr><td>1503</td><td>0295454</td><td>Tayu</td></tr>
                                                    <tr><td>1504</td><td>029631</td><td>Blora</td></tr>
                                                    <tr><td>1505</td><td>029632</td><td>Blora</td></tr>
                                                    <tr><td>1506</td><td>029633</td><td>Blora</td></tr>
                                                    <tr><td>1507</td><td>0296531</td><td>Blora</td></tr>
                                                    <tr><td>1508</td><td>0296532</td><td>Blora</td></tr>
                                                    <tr><td>1509</td><td>0296533</td><td>Blora</td></tr>
                                                    <tr><td>1510</td><td>0296</td><td>Cepu</td></tr>
                                                    <tr><td>1511</td><td>02961</td><td>Cepu</td></tr>
                                                    <tr><td>1512</td><td>029621</td><td>Cepu</td></tr>
                                                    <tr><td>1513</td><td>029622</td><td>Cepu</td></tr>
                                                    <tr><td>1514</td><td>029623</td><td>Cepu</td></tr>
                                                    <tr><td>1515</td><td>029624</td><td>Cepu</td></tr>
                                                    <tr><td>1516</td><td>029625</td><td>Cepu</td></tr>
                                                    <tr><td>1517</td><td>029626</td><td>Cepu</td></tr>
                                                    <tr><td>1518</td><td>029627</td><td>Cepu</td></tr>
                                                    <tr><td>1519</td><td>029628</td><td>Cepu</td></tr>
                                                    <tr><td>1520</td><td>029629</td><td>Cepu</td></tr>
                                                    <tr><td>1521</td><td>0296425</td><td>Cepu</td></tr>
                                                    <tr><td>1522</td><td>029652</td><td>Jepon</td></tr>
                                                    <tr><td>1523</td><td>029661</td><td>Ngawen</td></tr>
                                                    <tr><td>1524</td><td>0296362</td><td>Ngawen</td></tr>
                                                    <tr><td>1525</td><td>0296810</td><td>Randublatung</td></tr>
                                                    <tr><td>1526</td><td>0296811</td><td>Randublatung</td></tr>
                                                    <tr><td>1527</td><td>0297</td><td>Karimunjawa</td></tr>
                                                    <tr><td>1528</td><td>02971</td><td>Karimunjawa</td></tr>
                                                    <tr><td>1529</td><td>029721</td><td>Karimunjawa</td></tr>
                                                    <tr><td>1530</td><td>029722</td><td>Karimunjawa</td></tr>
                                                    <tr><td>1531</td><td>0297312</td><td>Karimunjawa</td></tr>
                                                    <tr><td>1532</td><td>029891</td><td>Ambarawa</td></tr>
                                                    <tr><td>1533</td><td>029892</td><td>Ambarawa</td></tr>
                                                    <tr><td>1534</td><td>0298593</td><td>Ambarawa</td></tr>
                                                    <tr><td>1535</td><td>0298594</td><td>Ambarawa</td></tr>
                                                    <tr><td>1536</td><td>0298595</td><td>Ambarawa</td></tr>
                                                    <tr><td>1537</td><td>0298596</td><td>Ambarawa</td></tr>
                                                    <tr><td>1538</td><td>0298597</td><td>Ambarawa</td></tr>
                                                    <tr><td>1539</td><td>0298598</td><td>Ambarawa</td></tr>
                                                    <tr><td>1540</td><td>0298599</td><td>Ambarawa</td></tr>
                                                    <tr><td>1541</td><td>029871</td><td>Bandungan</td></tr>
                                                    <tr><td>1542</td><td>0298521</td><td>Bawen</td></tr>
                                                    <tr><td>1543</td><td>0298522</td><td>Bawen</td></tr>
                                                    <tr><td>1544</td><td>0298523</td><td>Bawen</td></tr>
                                                    <tr><td>1545</td><td>0298</td><td>Salatiga</td></tr>
                                                    <tr><td>1546</td><td>02981</td><td>Salatiga</td></tr>
                                                    <tr><td>1547</td><td>029821</td><td>Salatiga</td></tr>
                                                    <tr><td>1548</td><td>029822</td><td>Salatiga</td></tr>
                                                    <tr><td>1549</td><td>029823</td><td>Salatiga</td></tr>
                                                    <tr><td>1550</td><td>029824</td><td>Salatiga</td></tr>
                                                    <tr><td>1551</td><td>029825</td><td>Salatiga</td></tr>
                                                    <tr><td>1552</td><td>029826</td><td>Salatiga</td></tr>
                                                    <tr><td>1553</td><td>029827</td><td>Salatiga</td></tr>
                                                    <tr><td>1554</td><td>029828</td><td>Salatiga</td></tr>
                                                    <tr><td>1555</td><td>0298311</td><td>Salatiga</td></tr>
                                                    <tr><td>1556</td><td>0298312</td><td>Salatiga</td></tr>
                                                    <tr><td>1557</td><td>0298313</td><td>Salatiga</td></tr>
                                                    <tr><td>1558</td><td>0298314</td><td>Salatiga</td></tr>
                                                    <tr><td>1559</td><td>0298315</td><td>Salatiga</td></tr>
                                                    <tr><td>1560</td><td>0298316</td><td>Salatiga</td></tr>
                                                    <tr><td>1561</td><td>0298328</td><td>Salatiga</td></tr>
                                                    <tr><td>1562</td><td>0298329</td><td>Salatiga</td></tr>
                                                    <tr><td>1563</td><td>0298615</td><td>Susukan</td></tr>
                                                    <tr><td>1564</td><td>0298610</td><td>Tengaran</td></tr>
                                                    <tr><td>1565</td><td>0298340</td><td>Tuntang</td></tr>
                                                    <tr><td>1566</td><td>031</td><td>Surabaya</td></tr>
                                                    <tr><td>1567</td><td>03112078</td><td>Surabaya - Darmo</td></tr>
                                                    <tr><td>1568</td><td>03112089</td><td>Surabaya - Darmo</td></tr>
                                                    <tr><td>1569</td><td>03113011</td><td>Surabaya - Darmo</td></tr>
                                                    <tr><td>1570</td><td>03113022</td><td>Surabaya - Darmo</td></tr>
                                                    <tr><td>1571</td><td>03113000</td><td>Surabaya - Gubeng</td></tr>
                                                    <tr><td>1572</td><td>03113033</td><td>Surabaya - Gubeng</td></tr>
                                                    <tr><td>1573</td><td>0311</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1574</td><td>03112077</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1575</td><td>03112099</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1576</td><td>03113010</td><td>Surabaya - Mergoyoso</td></tr>
                                                    <tr><td>1577</td><td>03113055</td><td>Surabaya - Mergoyoso</td></tr>
                                                    <tr><td>1578</td><td>03113066</td><td>Surabaya - Mergoyoso</td></tr>
                                                    <tr><td>1579</td><td>03113088</td><td>Surabaya - Mergoyoso</td></tr>
                                                    <tr><td>1580</td><td>03113099</td><td>Surabaya - Mergoyoso</td></tr>
                                                    <tr><td>1581</td><td>03113188</td><td>Surabaya - Mergoyoso</td></tr>
                                                    <tr><td>1582</td><td>03112000</td><td>Surabaya - Rungkut</td></tr>
                                                    <tr><td>1583</td><td>03112001</td><td>Surabaya - Rungkut</td></tr>
                                                    <tr><td>1584</td><td>0312988</td><td>Sidoarjo</td></tr>
                                                    <tr><td>1585</td><td>031281</td><td>Surabaya - Darmo</td></tr>
                                                    <tr><td>1586</td><td>031282</td><td>Surabaya - Darmo</td></tr>
                                                    <tr><td>1587</td><td>031285</td><td>Surabaya - Darmo</td></tr>
                                                    <tr><td>1588</td><td>031286</td><td>Surabaya - Darmo</td></tr>
                                                    <tr><td>1589</td><td>031287</td><td>Surabaya - Darmo</td></tr>
                                                    <tr><td>1590</td><td>0312805</td><td>Surabaya - Darmo</td></tr>
                                                    <tr><td>1591</td><td>0312956</td><td>Surabaya - Darmo</td></tr>
                                                    <tr><td>1592</td><td>0312957</td><td>Surabaya - Darmo</td></tr>
                                                    <tr><td>1593</td><td>0312999</td><td>Surabaya - Darmo</td></tr>
                                                    <tr><td>1594</td><td>0312950</td><td>Surabaya - Gubeng</td></tr>
                                                    <tr><td>1595</td><td>0312958</td><td>Surabaya - Gubeng</td></tr>
                                                    <tr><td>1596</td><td>0312959</td><td>Surabaya - Gubeng</td></tr>
                                                    <tr><td>1597</td><td>0312982</td><td>Surabaya - Injoko</td></tr>
                                                    <tr><td>1598</td><td>0312803</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1599</td><td>0312900</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1600</td><td>0312901</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1601</td><td>0312902</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1602</td><td>0312903</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1603</td><td>0312904</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1604</td><td>0312930</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1605</td><td>0312931</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1606</td><td>0312932</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1607</td><td>0312933</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1608</td><td>0312934</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1609</td><td>0312935</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1610</td><td>0312936</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1611</td><td>0312937</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1612</td><td>0312938</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1613</td><td>0312938</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1614</td><td>0312939</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1615</td><td>0312990</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1616</td><td>0312991</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1617</td><td>0312804</td><td>Surabaya - Mergoyoso</td></tr>
                                                    <tr><td>1618</td><td>0312951</td><td>Surabaya - Mergoyoso</td></tr>
                                                    <tr><td>1619</td><td>0312952</td><td>Surabaya - Mergoyoso</td></tr>
                                                    <tr><td>1620</td><td>0312953</td><td>Surabaya - Mergoyoso</td></tr>
                                                    <tr><td>1621</td><td>0312954</td><td>Surabaya - Mergoyoso</td></tr>
                                                    <tr><td>1622</td><td>0312955</td><td>Surabaya - Mergoyoso</td></tr>
                                                    <tr><td>1623</td><td>0312808</td><td>Surabaya - Rungkut</td></tr>
                                                    <tr><td>1624</td><td>0312905</td><td>Surabaya - Rungkut</td></tr>
                                                    <tr><td>1625</td><td>0312906</td><td>Surabaya - Rungkut</td></tr>
                                                    <tr><td>1626</td><td>0312907</td><td>Surabaya - Rungkut</td></tr>
                                                    <tr><td>1627</td><td>0312908</td><td>Surabaya - Rungkut</td></tr>
                                                    <tr><td>1628</td><td>0312909</td><td>Surabaya - Rungkut</td></tr>
                                                    <tr><td>1629</td><td>0312980</td><td>Surabaya - Rungkut</td></tr>
                                                    <tr><td>1630</td><td>0312981</td><td>Surabaya - Rungkut</td></tr>
                                                    <tr><td>1631</td><td>0312983</td><td>Surabaya - Rungkut</td></tr>
                                                    <tr><td>1632</td><td>0312984</td><td>Surabaya - Rungkut</td></tr>
                                                    <tr><td>1633</td><td>0312985</td><td>Surabaya - Rungkut</td></tr>
                                                    <tr><td>1634</td><td>0312986</td><td>Surabaya - Rungkut</td></tr>
                                                    <tr><td>1635</td><td>0312987</td><td>Surabaya - Rungkut</td></tr>
                                                    <tr><td>1636</td><td>031297</td><td>Surabaya - Tandes</td></tr>
                                                    <tr><td>1637</td><td>0312807</td><td>Surabaya - Tandes</td></tr>
                                                    <tr><td>1638</td><td>0313051</td><td>Arosbaya</td></tr>
                                                    <tr><td>1639</td><td>0313052</td><td>Arosbaya</td></tr>
                                                    <tr><td>1640</td><td>0313091</td><td>Bangkalan</td></tr>
                                                    <tr><td>1641</td><td>0313092</td><td>Bangkalan</td></tr>
                                                    <tr><td>1642</td><td>0313093</td><td>Bangkalan</td></tr>
                                                    <tr><td>1643</td><td>0313094</td><td>Bangkalan</td></tr>
                                                    <tr><td>1644</td><td>0313095</td><td>Bangkalan</td></tr>
                                                    <tr><td>1645</td><td>0313096</td><td>Bangkalan</td></tr>
                                                    <tr><td>1646</td><td>0313097</td><td>Bangkalan</td></tr>
                                                    <tr><td>1647</td><td>0313098</td><td>Bangkalan</td></tr>
                                                    <tr><td>1648</td><td>0313099</td><td>Bangkalan</td></tr>
                                                    <tr><td>1649</td><td>0313040</td><td>Blega</td></tr>
                                                    <tr><td>1650</td><td>0313041</td><td>Blega</td></tr>
                                                    <tr><td>1651</td><td>0313903</td><td>Duduksampeyan</td></tr>
                                                    <tr><td>1652</td><td>0313904</td><td>Duduksampeyan</td></tr>
                                                    <tr><td>1653</td><td>0313905</td><td>Duduksampeyan</td></tr>
                                                    <tr><td>1654</td><td>0313906</td><td>Duduksampeyan</td></tr>
                                                    <tr><td>1655</td><td>0313909</td><td>Duduksampeyan</td></tr>
                                                    <tr><td>1656</td><td>0313080</td><td>Galis Bangkalan</td></tr>
                                                    <tr><td>1657</td><td>0313031</td><td>Geger</td></tr>
                                                    <tr><td>1658</td><td>031397</td><td>Gresik</td></tr>
                                                    <tr><td>1659</td><td>031398</td><td>Gresik</td></tr>
                                                    <tr><td>1660</td><td>0313011</td><td>Kamal</td></tr>
                                                    <tr><td>1661</td><td>0313012</td><td>Kamal</td></tr>
                                                    <tr><td>1662</td><td>0313013</td><td>Kamal</td></tr>
                                                    <tr><td>1663</td><td>0313014</td><td>Kamal</td></tr>
                                                    <tr><td>1664</td><td>0313015</td><td>Kamal</td></tr>
                                                    <tr><td>1665</td><td>0313036</td><td>Kokop</td></tr>
                                                    <tr><td>1666</td><td>0313950</td><td>Pongangan</td></tr>
                                                    <tr><td>1667</td><td>0313951</td><td>Pongangan</td></tr>
                                                    <tr><td>1668</td><td>0313952</td><td>Pongangan</td></tr>
                                                    <tr><td>1669</td><td>0313953</td><td>Pongangan</td></tr>
                                                    <tr><td>1670</td><td>0313954</td><td>Pongangan</td></tr>
                                                    <tr><td>1671</td><td>0313955</td><td>Pongangan</td></tr>
                                                    <tr><td>1672</td><td>031394</td><td>Sedayu</td></tr>
                                                    <tr><td>1673</td><td>0313079</td><td>Sepulu</td></tr>
                                                    <tr><td>1674</td><td>031371</td><td>Surabaya - Kapasan</td></tr>
                                                    <tr><td>1675</td><td>031372</td><td>Surabaya - Kapasan</td></tr>
                                                    <tr><td>1676</td><td>031376</td><td>Surabaya - Kapasan</td></tr>
                                                    <tr><td>1677</td><td>031377</td><td>Surabaya - Kapasan</td></tr>
                                                    <tr><td>1678</td><td>031352</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1679</td><td>031353</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1680</td><td>031354</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1681</td><td>031355</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1682</td><td>031357</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1683</td><td>0313500</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1684</td><td>0313502</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1685</td><td>0313503</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1686</td><td>0313506</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1687</td><td>0313509</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1688</td><td>0313510</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1689</td><td>031381</td><td>Surabaya - Kenjeran</td></tr>
                                                    <tr><td>1690</td><td>031382</td><td>Surabaya - Kenjeran</td></tr>
                                                    <tr><td>1691</td><td>031389</td><td>Surabaya - Kenjeran</td></tr>
                                                    <tr><td>1692</td><td>031328</td><td>Surabaya - Perak</td></tr>
                                                    <tr><td>1693</td><td>031329</td><td>Surabaya - Perak</td></tr>
                                                    <tr><td>1694</td><td>0313201</td><td>Surabaya - Perak</td></tr>
                                                    <tr><td>1695</td><td>0313081</td><td>Tanah Merah</td></tr>
                                                    <tr><td>1696</td><td>0313071</td><td>Tanjungbumi</td></tr>
                                                    <tr><td>1697</td><td>0313086</td><td>Tragah</td></tr>
                                                    <tr><td>1698</td><td>031561</td><td>Surabaya - Darmo</td></tr>
                                                    <tr><td>1699</td><td>031562</td><td>Surabaya - Darmo</td></tr>
                                                    <tr><td>1700</td><td>031563</td><td>Surabaya - Darmo</td></tr>
                                                    <tr><td>1701</td><td>031566</td><td>Surabaya - Darmo</td></tr>
                                                    <tr><td>1702</td><td>031567</td><td>Surabaya - Darmo</td></tr>
                                                    <tr><td>1703</td><td>031568</td><td>Surabaya - Darmo</td></tr>
                                                    <tr><td>1704</td><td>0315600</td><td>Surabaya - Darmo</td></tr>
                                                    <tr><td>1705</td><td>0315601</td><td>Surabaya - Darmo</td></tr>
                                                    <tr><td>1706</td><td>0315602</td><td>Surabaya - Darmo</td></tr>
                                                    <tr><td>1707</td><td>0315608</td><td>Surabaya - Darmo</td></tr>
                                                    <tr><td>1708</td><td>0315608</td><td>Surabaya - Darmo</td></tr>
                                                    <tr><td>1709</td><td>031501</td><td>Surabaya - Gubeng</td></tr>
                                                    <tr><td>1710</td><td>031502</td><td>Surabaya - Gubeng</td></tr>
                                                    <tr><td>1711</td><td>031503</td><td>Surabaya - Gubeng</td></tr>
                                                    <tr><td>1712</td><td>0315040</td><td>Surabaya - Gubeng</td></tr>
                                                    <tr><td>1713</td><td>0315501</td><td>Surabaya - Gubeng</td></tr>
                                                    <tr><td>1714</td><td>0315506</td><td>Surabaya - Gubeng</td></tr>
                                                    <tr><td>1715</td><td>031592</td><td>Surabaya - Manyar</td></tr>
                                                    <tr><td>1716</td><td>031593</td><td>Surabaya - Manyar</td></tr>
                                                    <tr><td>1717</td><td>031594</td><td>Surabaya - Manyar</td></tr>
                                                    <tr><td>1718</td><td>031598</td><td>Surabaya - Manyar</td></tr>
                                                    <tr><td>1719</td><td>031599</td><td>Surabaya - Manyar</td></tr>
                                                    <tr><td>1720</td><td>031530</td><td>Surabaya - Mergoyoso</td></tr>
                                                    <tr><td>1721</td><td>031531</td><td>Surabaya - Mergoyoso</td></tr>
                                                    <tr><td>1722</td><td>031532</td><td>Surabaya - Mergoyoso</td></tr>
                                                    <tr><td>1723</td><td>031533</td><td>Surabaya - Mergoyoso</td></tr>
                                                    <tr><td>1724</td><td>031534</td><td>Surabaya - Mergoyoso</td></tr>
                                                    <tr><td>1725</td><td>031535</td><td>Surabaya - Mergoyoso</td></tr>
                                                    <tr><td>1726</td><td>031545</td><td>Surabaya - Mergoyoso</td></tr>
                                                    <tr><td>1727</td><td>031546</td><td>Surabaya - Mergoyoso</td></tr>
                                                    <tr><td>1728</td><td>031547</td><td>Surabaya - Mergoyoso</td></tr>
                                                    <tr><td>1729</td><td>031548</td><td>Surabaya - Mergoyoso</td></tr>
                                                    <tr><td>1730</td><td>031549</td><td>Surabaya - Mergoyoso</td></tr>
                                                    <tr><td>1731</td><td>0315404</td><td>Surabaya - Mergoyoso</td></tr>
                                                    <tr><td>1732</td><td>0315505</td><td>Surabaya - Mergoyoso</td></tr>
                                                    <tr><td>1733</td><td>0315508</td><td>Surabaya - Mergoyoso</td></tr>
                                                    <tr><td>1734</td><td>0315509</td><td>Surabaya - Mergoyoso</td></tr>
                                                    <tr><td>1735</td><td>0315550</td><td>Surabaya - Mergoyoso</td></tr>
                                                    <tr><td>1736</td><td>0315552</td><td>Surabaya - Mergoyoso</td></tr>
                                                    <tr><td>1737</td><td>031660</td><td>Surabaya - Darmo</td></tr>
                                                    <tr><td>1738</td><td>0316509</td><td>Surabaya - Darmo</td></tr>
                                                    <tr><td>1739</td><td>0316665</td><td>Surabaya - Darmo</td></tr>
                                                    <tr><td>1740</td><td>0316666</td><td>Surabaya - Darmo</td></tr>
                                                    <tr><td>1741</td><td>0316632</td><td>Surabaya - Perak</td></tr>
                                                    <tr><td>1742</td><td>0317921</td><td>Balungpanggang</td></tr>
                                                    <tr><td>1743</td><td>0317922</td><td>Balungpanggang</td></tr>
                                                    <tr><td>1744</td><td>0317923</td><td>Balungpanggang</td></tr>
                                                    <tr><td>1745</td><td>0317924</td><td>Balungpanggang</td></tr>
                                                    <tr><td>1746</td><td>0317925</td><td>Balungpanggang</td></tr>
                                                    <tr><td>1747</td><td>031759</td><td>Bambe</td></tr>
                                                    <tr><td>1748</td><td>0317507</td><td>Bambe</td></tr>
                                                    <tr><td>1749</td><td>0317508</td><td>Bambe</td></tr>
                                                    <tr><td>1750</td><td>0317990</td><td>Cerme</td></tr>
                                                    <tr><td>1751</td><td>0317991</td><td>Cerme</td></tr>
                                                    <tr><td>1752</td><td>0317992</td><td>Cerme</td></tr>
                                                    <tr><td>1753</td><td>0317993</td><td>Cerme</td></tr>
                                                    <tr><td>1754</td><td>0317994</td><td>Cerme</td></tr>
                                                    <tr><td>1755</td><td>0317910</td><td>Kedamean</td></tr>
                                                    <tr><td>1756</td><td>0317911</td><td>Kedamean</td></tr>
                                                    <tr><td>1757</td><td>0317912</td><td>Kedamean</td></tr>
                                                    <tr><td>1758</td><td>0317913</td><td>Kedamean</td></tr>
                                                    <tr><td>1759</td><td>0317914</td><td>Kedamean</td></tr>
                                                    <tr><td>1760</td><td>031788</td><td>Sepanjang</td></tr>
                                                    <tr><td>1761</td><td>0317870</td><td>Sepanjang</td></tr>
                                                    <tr><td>1762</td><td>0317871</td><td>Sepanjang</td></tr>
                                                    <tr><td>1763</td><td>0317872</td><td>Sepanjang</td></tr>
                                                    <tr><td>1764</td><td>0317873</td><td>Sepanjang</td></tr>
                                                    <tr><td>1765</td><td>0317874</td><td>Sepanjang</td></tr>
                                                    <tr><td>1766</td><td>0317875</td><td>Sepanjang</td></tr>
                                                    <tr><td>1767</td><td>0317876</td><td>Sepanjang</td></tr>
                                                    <tr><td>1768</td><td>0317877</td><td>Sepanjang</td></tr>
                                                    <tr><td>1769</td><td>0317878</td><td>Sepanjang</td></tr>
                                                    <tr><td>1770</td><td>0317879</td><td>Sepanjang</td></tr>
                                                    <tr><td>1771</td><td>031748</td><td>Surabaya - Kalianak</td></tr>
                                                    <tr><td>1772</td><td>031749</td><td>Surabaya - Kalianak</td></tr>
                                                    <tr><td>1773</td><td>031741</td><td>Surabaya - Kandangan</td></tr>
                                                    <tr><td>1774</td><td>031742</td><td>Surabaya - Kandangan</td></tr>
                                                    <tr><td>1775</td><td>0317400</td><td>Surabaya - Kandangan</td></tr>
                                                    <tr><td>1776</td><td>0317401</td><td>Surabaya - Kandangan</td></tr>
                                                    <tr><td>1777</td><td>0317402</td><td>Surabaya - Kandangan</td></tr>
                                                    <tr><td>1778</td><td>0317403</td><td>Surabaya - Kandangan</td></tr>
                                                    <tr><td>1779</td><td>0317404</td><td>Surabaya - Kandangan</td></tr>
                                                    <tr><td>1780</td><td>0317405</td><td>Surabaya - Kandangan</td></tr>
                                                    <tr><td>1781</td><td>0317406</td><td>Surabaya - Kandangan</td></tr>
                                                    <tr><td>1782</td><td>0317407</td><td>Surabaya - Kandangan</td></tr>
                                                    <tr><td>1783</td><td>0317408</td><td>Surabaya - Kandangan</td></tr>
                                                    <tr><td>1784</td><td>0317409</td><td>Surabaya - Kandangan</td></tr>
                                                    <tr><td>1785</td><td>031766</td><td>Surabaya - Karangpilang</td></tr>
                                                    <tr><td>1786</td><td>031767</td><td>Surabaya - Karangpilang</td></tr>
                                                    <tr><td>1787</td><td>031752</td><td>Surabaya - Lakarsantri</td></tr>
                                                    <tr><td>1788</td><td>031753</td><td>Surabaya - Lakarsantri</td></tr>
                                                    <tr><td>1789</td><td>031731</td><td>Surabaya - Tandes</td></tr>
                                                    <tr><td>1790</td><td>031732</td><td>Surabaya - Tandes</td></tr>
                                                    <tr><td>1791</td><td>031734</td><td>Surabaya - Tandes</td></tr>
                                                    <tr><td>1792</td><td>031891</td><td>Gedangan</td></tr>
                                                    <tr><td>1793</td><td>031870</td><td>Jagir</td></tr>
                                                    <tr><td>1794</td><td>031871</td><td>Jagir</td></tr>
                                                    <tr><td>1795</td><td>031872</td><td>Jagir</td></tr>
                                                    <tr><td>1796</td><td>031897</td><td>Krian</td></tr>
                                                    <tr><td>1797</td><td>0318981</td><td>Krian</td></tr>
                                                    <tr><td>1798</td><td>0318982</td><td>Krian</td></tr>
                                                    <tr><td>1799</td><td>031892</td><td>Sidoarjo</td></tr>
                                                    <tr><td>1800</td><td>031894</td><td>Sidoarjo</td></tr>
                                                    <tr><td>1801</td><td>031895</td><td>Sidoarjo</td></tr>
                                                    <tr><td>1802</td><td>031896</td><td>Sidoarjo</td></tr>
                                                    <tr><td>1803</td><td>0318902</td><td>Sidoarjo</td></tr>
                                                    <tr><td>1804</td><td>031883</td><td>Sukodono</td></tr>
                                                    <tr><td>1805</td><td>031828</td><td>Surabaya - Injoko</td></tr>
                                                    <tr><td>1806</td><td>031829</td><td>Surabaya - Injoko</td></tr>
                                                    <tr><td>1807</td><td>0318201</td><td>Surabaya - Injoko</td></tr>
                                                    <tr><td>1808</td><td>0318202</td><td>Surabaya - Injoko</td></tr>
                                                    <tr><td>1809</td><td>031840</td><td>Surabaya - Rungkut</td></tr>
                                                    <tr><td>1810</td><td>031841</td><td>Surabaya - Rungkut</td></tr>
                                                    <tr><td>1811</td><td>031842</td><td>Surabaya - Rungkut</td></tr>
                                                    <tr><td>1812</td><td>031843</td><td>Surabaya - Rungkut</td></tr>
                                                    <tr><td>1813</td><td>031847</td><td>Surabaya - Rungkut</td></tr>
                                                    <tr><td>1814</td><td>031849</td><td>Surabaya - Rungkut</td></tr>
                                                    <tr><td>1815</td><td>0318450</td><td>Surabaya - Rungkut</td></tr>
                                                    <tr><td>1816</td><td>031866</td><td>Tropodo</td></tr>
                                                    <tr><td>1817</td><td>031867</td><td>Tropodo</td></tr>
                                                    <tr><td>1818</td><td>031868</td><td>Tropodo</td></tr>
                                                    <tr><td>1819</td><td>0318850</td><td>Tulangan</td></tr>
                                                    <tr><td>1820</td><td>0318851</td><td>Tulangan</td></tr>
                                                    <tr><td>1821</td><td>0318852</td><td>Tulangan</td></tr>
                                                    <tr><td>1822</td><td>0318853</td><td>Tulangan</td></tr>
                                                    <tr><td>1823</td><td>0318854</td><td>Tulangan</td></tr>
                                                    <tr><td>1824</td><td>031853</td><td>Waru</td></tr>
                                                    <tr><td>1825</td><td>031854</td><td>Waru</td></tr>
                                                    <tr><td>1826</td><td>031980</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1827</td><td>031981</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1828</td><td>031982</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1829</td><td>031983</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1830</td><td>031984</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1831</td><td>031985</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1832</td><td>031986</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1833</td><td>031987</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1834</td><td>031988</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1835</td><td>031989</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1836</td><td>031990</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1837</td><td>031991</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1838</td><td>031992</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1839</td><td>031993</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1840</td><td>031994</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1841</td><td>031995</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1842</td><td>031996</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1843</td><td>031997</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1844</td><td>031998</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1845</td><td>031999</td><td>Surabaya - Kebalen</td></tr>
                                                    <tr><td>1846</td><td>0321510</td><td>Dlanggu</td></tr>
                                                    <tr><td>1847</td><td>0321511</td><td>Dlanggu</td></tr>
                                                    <tr><td>1848</td><td>0321860</td><td>Jombang</td></tr>
                                                    <tr><td>1849</td><td>0321861</td><td>Jombang</td></tr>
                                                    <tr><td>1850</td><td>0321862</td><td>Jombang</td></tr>
                                                    <tr><td>1851</td><td>0321863</td><td>Jombang</td></tr>
                                                    <tr><td>1852</td><td>0321864</td><td>Jombang</td></tr>
                                                    <tr><td>1853</td><td>0321865</td><td>Jombang</td></tr>
                                                    <tr><td>1854</td><td>0321866</td><td>Jombang</td></tr>
                                                    <tr><td>1855</td><td>0321867</td><td>Jombang</td></tr>
                                                    <tr><td>1856</td><td>0321868</td><td>Jombang</td></tr>
                                                    <tr><td>1857</td><td>0321869</td><td>Jombang</td></tr>
                                                    <tr><td>1858</td><td>0321870</td><td>Jombang</td></tr>
                                                    <tr><td>1859</td><td>0321871</td><td>Jombang</td></tr>
                                                    <tr><td>1860</td><td>0321872</td><td>Jombang</td></tr>
                                                    <tr><td>1861</td><td>032136</td><td>Mlirip</td></tr>
                                                    <tr><td>1862</td><td>032149</td><td>Mojoagung</td></tr>
                                                    <tr><td>1863</td><td>0321</td><td>Mojokerto</td></tr>
                                                    <tr><td>1864</td><td>03211</td><td>Mojokerto</td></tr>
                                                    <tr><td>1865</td><td>032120</td><td>Mojokerto</td></tr>
                                                    <tr><td>1866</td><td>032138</td><td>Mojokerto</td></tr>
                                                    <tr><td>1867</td><td>032139</td><td>Mojokerto</td></tr>
                                                    <tr><td>1868</td><td>0321293</td><td>Mojokerto</td></tr>
                                                    <tr><td>1869</td><td>0321320</td><td>Mojokerto</td></tr>
                                                    <tr><td>1870</td><td>0321321</td><td>Mojokerto</td></tr>
                                                    <tr><td>1871</td><td>0321322</td><td>Mojokerto</td></tr>
                                                    <tr><td>1872</td><td>0321323</td><td>Mojokerto</td></tr>
                                                    <tr><td>1873</td><td>0321324</td><td>Mojokerto</td></tr>
                                                    <tr><td>1874</td><td>0321325</td><td>Mojokerto</td></tr>
                                                    <tr><td>1875</td><td>0321326</td><td>Mojokerto</td></tr>
                                                    <tr><td>1876</td><td>0321327</td><td>Mojokerto</td></tr>
                                                    <tr><td>1877</td><td>0321328</td><td>Mojokerto</td></tr>
                                                    <tr><td>1878</td><td>0321329</td><td>Mojokerto</td></tr>
                                                    <tr><td>1879</td><td>0321591</td><td>Mojosar</td></tr>
                                                    <tr><td>1880</td><td>0321590</td><td>Mojosari</td></tr>
                                                    <tr><td>1881</td><td>0321592</td><td>Mojosari</td></tr>
                                                    <tr><td>1882</td><td>0321593</td><td>Mojosari</td></tr>
                                                    <tr><td>1883</td><td>0321594</td><td>Mojosari</td></tr>
                                                    <tr><td>1884</td><td>0321595</td><td>Mojosari</td></tr>
                                                    <tr><td>1885</td><td>0321596</td><td>Mojosari</td></tr>
                                                    <tr><td>1886</td><td>0321597</td><td>Mojosari</td></tr>
                                                    <tr><td>1887</td><td>0321598</td><td>Mojosari</td></tr>
                                                    <tr><td>1888</td><td>0321599</td><td>Mojosari</td></tr>
                                                    <tr><td>1889</td><td>0321618</td><td>Ngoroindustri</td></tr>
                                                    <tr><td>1890</td><td>0321619</td><td>Ngoroindustri</td></tr>
                                                    <tr><td>1891</td><td>032171</td><td>Ngorojombang</td></tr>
                                                    <tr><td>1892</td><td>0321690</td><td>Pacet</td></tr>
                                                    <tr><td>1893</td><td>0321691</td><td>Pacet</td></tr>
                                                    <tr><td>1894</td><td>0321884</td><td>Ploso</td></tr>
                                                    <tr><td>1895</td><td>0321885</td><td>Ploso</td></tr>
                                                    <tr><td>1896</td><td>0321886</td><td>Ploso</td></tr>
                                                    <tr><td>1897</td><td>0321887</td><td>Ploso</td></tr>
                                                    <tr><td>1898</td><td>0321888</td><td>Ploso</td></tr>
                                                    <tr><td>1899</td><td>0322451</td><td>Babad</td></tr>
                                                    <tr><td>1900</td><td>0322452</td><td>Babad</td></tr>
                                                    <tr><td>1901</td><td>0322453</td><td>Babad</td></tr>
                                                    <tr><td>1902</td><td>0322454</td><td>Babad</td></tr>
                                                    <tr><td>1903</td><td>0322455</td><td>Babad</td></tr>
                                                    <tr><td>1904</td><td>0322456</td><td>Babad</td></tr>
                                                    <tr><td>1905</td><td>0322457</td><td>Babad</td></tr>
                                                    <tr><td>1906</td><td>0322458</td><td>Babad</td></tr>
                                                    <tr><td>1907</td><td>0322459</td><td>Babad</td></tr>
                                                    <tr><td>1908</td><td>0322661</td><td>Brondong</td></tr>
                                                    <tr><td>1909</td><td>0322662</td><td>Brondong</td></tr>
                                                    <tr><td>1910</td><td>0322663</td><td>Brondong</td></tr>
                                                    <tr><td>1911</td><td>0322664</td><td>Brondong</td></tr>
                                                    <tr><td>1912</td><td>0322</td><td>Lamongan</td></tr>
                                                    <tr><td>1913</td><td>03221</td><td>Lamongan</td></tr>
                                                    <tr><td>1914</td><td>0322311</td><td>Lamongan</td></tr>
                                                    <tr><td>1915</td><td>0322312</td><td>Lamongan</td></tr>
                                                    <tr><td>1916</td><td>0322313</td><td>Lamongan</td></tr>
                                                    <tr><td>1917</td><td>0322314</td><td>Lamongan</td></tr>
                                                    <tr><td>1918</td><td>0322315</td><td>Lamongan</td></tr>
                                                    <tr><td>1919</td><td>0322316</td><td>Lamongan</td></tr>
                                                    <tr><td>1920</td><td>0322317</td><td>Lamongan</td></tr>
                                                    <tr><td>1921</td><td>0322321</td><td>Lamongan</td></tr>
                                                    <tr><td>1922</td><td>0322322</td><td>Lamongan</td></tr>
                                                    <tr><td>1923</td><td>0322323</td><td>Lamongan</td></tr>
                                                    <tr><td>1924</td><td>0322324</td><td>Lamongan</td></tr>
                                                    <tr><td>1925</td><td>0322325</td><td>Lamongan</td></tr>
                                                    <tr><td>1926</td><td>0322390</td><td>Sukodadi</td></tr>
                                                    <tr><td>1927</td><td>0322391</td><td>Sukodadi</td></tr>
                                                    <tr><td>1928</td><td>0323821</td><td>Ketapang</td></tr>
                                                    <tr><td>1929</td><td>0323822</td><td>Ketapang</td></tr>
                                                    <tr><td>1930</td><td>0323823</td><td>Ketapang</td></tr>
                                                    <tr><td>1931</td><td>0323781</td><td>Omben</td></tr>
                                                    <tr><td>1932</td><td>0323782</td><td>Omben</td></tr>
                                                    <tr><td>1933</td><td>0323788</td><td>Omben</td></tr>
                                                    <tr><td>1934</td><td>0323</td><td>Sampang</td></tr>
                                                    <tr><td>1935</td><td>03231</td><td>Sampang</td></tr>
                                                    <tr><td>1936</td><td>032331</td><td>Sampang</td></tr>
                                                    <tr><td>1937</td><td>0323320</td><td>Sampang</td></tr>
                                                    <tr><td>1938</td><td>0323321</td><td>Sampang</td></tr>
                                                    <tr><td>1939</td><td>0323322</td><td>Sampang</td></tr>
                                                    <tr><td>1940</td><td>0323323</td><td>Sampang</td></tr>
                                                    <tr><td>1941</td><td>0323324</td><td>Sampang</td></tr>
                                                    <tr><td>1942</td><td>0323325</td><td>Sampang</td></tr>
                                                    <tr><td>1943</td><td>0323326</td><td>Sampang</td></tr>
                                                    <tr><td>1944</td><td>0323327</td><td>Sampang</td></tr>
                                                    <tr><td>1945</td><td>0323328</td><td>Sampang</td></tr>
                                                    <tr><td>1946</td><td>0323329</td><td>Sampang</td></tr>
                                                    <tr><td>1947</td><td>0324</td><td>Pamekasan</td></tr>
                                                    <tr><td>1948</td><td>03241</td><td>Pamekasan</td></tr>
                                                    <tr><td>1949</td><td>032431</td><td>Pamekasan</td></tr>
                                                    <tr><td>1950</td><td>0324320</td><td>Pamekasan</td></tr>
                                                    <tr><td>1951</td><td>0324321</td><td>Pamekasan</td></tr>
                                                    <tr><td>1952</td><td>0324328</td><td>Pamekasan</td></tr>
                                                    <tr><td>1953</td><td>0324329</td><td>Pamekasan</td></tr>
                                                    <tr><td>1954</td><td>0324330</td><td>Pamekasan</td></tr>
                                                    <tr><td>1955</td><td>0324331</td><td>Pamekasan</td></tr>
                                                    <tr><td>1956</td><td>0324332</td><td>Pamekasan</td></tr>
                                                    <tr><td>1957</td><td>0324510</td><td>Waru Pamekasan</td></tr>
                                                    <tr><td>1958</td><td>0324511</td><td>Waru Pamekasan</td></tr>
                                                    <tr><td>1959</td><td>0325</td><td>Sangkapura</td></tr>
                                                    <tr><td>1960</td><td>03251</td><td>Sangkapura</td></tr>
                                                    <tr><td>1961</td><td>0325421</td><td>Sangkapura</td></tr>
                                                    <tr><td>1962</td><td>0325422</td><td>Sangkapura</td></tr>
                                                    <tr><td>1963</td><td>0325411</td><td>Tambak</td></tr>
                                                    <tr><td>1964</td><td>0327311</td><td>Arjasa Kangean</td></tr>
                                                    <tr><td>1965</td><td>0327811</td><td>Gayam</td></tr>
                                                    <tr><td>1966</td><td>0327611</td><td>Masalembu</td></tr>
                                                    <tr><td>1967</td><td>0327511</td><td>Sepekan</td></tr>
                                                    <tr><td>1968</td><td>0328311</td><td>Ambunten</td></tr>
                                                    <tr><td>1969</td><td>0328312</td><td>Ambunten</td></tr>
                                                    <tr><td>1970</td><td>0328511</td><td>Batangbatang</td></tr>
                                                    <tr><td>1971</td><td>0328821</td><td>Peragaan</td></tr>
                                                    <tr><td>1972</td><td>0328822</td><td>Peragaan</td></tr>
                                                    <tr><td>1973</td><td>0328</td><td>Sumenep</td></tr>
                                                    <tr><td>1974</td><td>03281</td><td>Sumenep</td></tr>
                                                    <tr><td>1975</td><td>0328661</td><td>Sumenep</td></tr>
                                                    <tr><td>1976</td><td>0328666</td><td>Sumenep</td></tr>
                                                    <tr><td>1977</td><td>0328667</td><td>Sumenep</td></tr>
                                                    <tr><td>1978</td><td>0328668</td><td>Sumenep</td></tr>
                                                    <tr><td>1979</td><td>0328669</td><td>Sumenep</td></tr>
                                                    <tr><td>1980</td><td>0331540</td><td>Arjasa Jember</td></tr>
                                                    <tr><td>1981</td><td>0331</td><td>Jember</td></tr>
                                                    <tr><td>1982</td><td>03311</td><td>Jember</td></tr>
                                                    <tr><td>1983</td><td>033120</td><td>Jember</td></tr>
                                                    <tr><td>1984</td><td>033148</td><td>Jember</td></tr>
                                                    <tr><td>1985</td><td>0331281</td><td>Jember</td></tr>
                                                    <tr><td>1986</td><td>0331282</td><td>Jember</td></tr>
                                                    <tr><td>1987</td><td>0331285</td><td>Jember</td></tr>
                                                    <tr><td>1988</td><td>0331291</td><td>Jember</td></tr>
                                                    <tr><td>1989</td><td>0331353</td><td>Jember</td></tr>
                                                    <tr><td>1990</td><td>0331400</td><td>Jember</td></tr>
                                                    <tr><td>1991</td><td>0331420</td><td>Jember</td></tr>
                                                    <tr><td>1992</td><td>0331421</td><td>Jember</td></tr>
                                                    <tr><td>1993</td><td>0331422</td><td>Jember</td></tr>
                                                    <tr><td>1994</td><td>0331423</td><td>Jember</td></tr>
                                                    <tr><td>1995</td><td>0331424</td><td>Jember</td></tr>
                                                    <tr><td>1996</td><td>0331425</td><td>Jember</td></tr>
                                                    <tr><td>1997</td><td>0331426</td><td>Jember</td></tr>
                                                    <tr><td>1998</td><td>0331427</td><td>Jember</td></tr>
                                                    <tr><td>1999</td><td>03312990</td><td>Jember</td></tr>
                                                    <tr><td>2000</td><td>03312991</td><td>Jember</td></tr>
                                                    <tr><td>2001</td><td>03312999</td><td>Jember</td></tr>
                                                    <tr><td>2002</td><td>033112078</td><td>Jember</td></tr>
                                                    <tr><td>2003</td><td>033112089</td><td>Jember</td></tr>
                                                    <tr><td>2004</td><td>033133</td><td>Jember - Kebonsari</td></tr>
                                                    <tr><td>2005</td><td>0331321</td><td>Jember - Kebonsari</td></tr>
                                                    <tr><td>2006</td><td>0331793</td><td>Jember - Kebonsari</td></tr>
                                                    <tr><td>2007</td><td>0331757</td><td>Jenggawah</td></tr>
                                                    <tr><td>2008</td><td>0331758</td><td>Jenggawah</td></tr>
                                                    <tr><td>2009</td><td>0331591</td><td>Kalisat</td></tr>
                                                    <tr><td>2010</td><td>0331592</td><td>Kalisat</td></tr>
                                                    <tr><td>2011</td><td>0331593</td><td>Kalisat</td></tr>
                                                    <tr><td>2012</td><td>0331711</td><td>Rambipuji</td></tr>
                                                    <tr><td>2013</td><td>0331712</td><td>Rambipuji</td></tr>
                                                    <tr><td>2014</td><td>0331521</td><td>Sempolan</td></tr>
                                                    <tr><td>2015</td><td>0331566</td><td>Sukowono</td></tr>
                                                    <tr><td>2016</td><td>0331567</td><td>Sukowono</td></tr>
                                                    <tr><td>2017</td><td>0332</td><td>Bondowoso</td></tr>
                                                    <tr><td>2018</td><td>03321</td><td>Bondowoso</td></tr>
                                                    <tr><td>2019</td><td>033242</td><td>Bondowoso</td></tr>
                                                    <tr><td>2020</td><td>0332560</td><td>Prajekan</td></tr>
                                                    <tr><td>2021</td><td>0332561</td><td>Prajekan</td></tr>
                                                    <tr><td>2022</td><td>0332321</td><td>Sukosari</td></tr>
                                                    <tr><td>2023</td><td>0332322</td><td>Sukosari</td></tr>
                                                    <tr><td>2024</td><td>0333</td><td>Banyuwangi</td></tr>
                                                    <tr><td>2025</td><td>03331</td><td>Banyuwangi</td></tr>
                                                    <tr><td>2026</td><td>0333410</td><td>Banyuwangi</td></tr>
                                                    <tr><td>2027</td><td>0333411</td><td>Banyuwangi</td></tr>
                                                    <tr><td>2028</td><td>0333412</td><td>Banyuwangi</td></tr>
                                                    <tr><td>2029</td><td>0333413</td><td>Banyuwangi</td></tr>
                                                    <tr><td>2030</td><td>0333414</td><td>Banyuwangi</td></tr>
                                                    <tr><td>2031</td><td>0333420</td><td>Banyuwangi</td></tr>
                                                    <tr><td>2032</td><td>0333421</td><td>Banyuwangi</td></tr>
                                                    <tr><td>2033</td><td>0333422</td><td>Banyuwangi</td></tr>
                                                    <tr><td>2034</td><td>0333423</td><td>Banyuwangi</td></tr>
                                                    <tr><td>2035</td><td>0333424</td><td>Banyuwangi</td></tr>
                                                    <tr><td>2036</td><td>0333425</td><td>Banyuwangi</td></tr>
                                                    <tr><td>2037</td><td>0333426</td><td>Banyuwangi</td></tr>
                                                    <tr><td>2038</td><td>0333427</td><td>Banyuwangi</td></tr>
                                                    <tr><td>2039</td><td>0333428</td><td>Banyuwangi</td></tr>
                                                    <tr><td>2040</td><td>0333429</td><td>Banyuwangi</td></tr>
                                                    <tr><td>2041</td><td>0333392</td><td>Benculuk</td></tr>
                                                    <tr><td>2042</td><td>0333393</td><td>Benculuk</td></tr>
                                                    <tr><td>2043</td><td>0333394</td><td>Benculuk</td></tr>
                                                    <tr><td>2044</td><td>0333395</td><td>Benculuk</td></tr>
                                                    <tr><td>2045</td><td>0333396</td><td>Benculuk</td></tr>
                                                    <tr><td>2046</td><td>0333397</td><td>Benculuk</td></tr>
                                                    <tr><td>2047</td><td>0333398</td><td>Benculuk</td></tr>
                                                    <tr><td>2048</td><td>0333843</td><td>Genteng</td></tr>
                                                    <tr><td>2049</td><td>0333844</td><td>Genteng</td></tr>
                                                    <tr><td>2050</td><td>0333845</td><td>Genteng</td></tr>
                                                    <tr><td>2051</td><td>0333846</td><td>Genteng</td></tr>
                                                    <tr><td>2052</td><td>0333847</td><td>Genteng</td></tr>
                                                    <tr><td>2053</td><td>0333821</td><td>Glenmore</td></tr>
                                                    <tr><td>2054</td><td>0333822</td><td>Glenmore</td></tr>
                                                    <tr><td>2055</td><td>0333897</td><td>Kalibaru</td></tr>
                                                    <tr><td>2056</td><td>0333898</td><td>Kalibaru</td></tr>
                                                    <tr><td>2057</td><td>0333899</td><td>Kalibaru</td></tr>
                                                    <tr><td>2058</td><td>0333510</td><td>Ketapang Banyuwangi</td></tr>
                                                    <tr><td>2059</td><td>0333511</td><td>Ketapang Banyuwangi</td></tr>
                                                    <tr><td>2060</td><td>0333512</td><td>Ketapang Banyuwangi</td></tr>
                                                    <tr><td>2061</td><td>0333590</td><td>Muncar</td></tr>
                                                    <tr><td>2062</td><td>0333591</td><td>Muncar</td></tr>
                                                    <tr><td>2063</td><td>0333592</td><td>Muncar</td></tr>
                                                    <tr><td>2064</td><td>0333593</td><td>Muncar</td></tr>
                                                    <tr><td>2065</td><td>0333594</td><td>Muncar</td></tr>
                                                    <tr><td>2066</td><td>0333710</td><td>Pesanggaran</td></tr>
                                                    <tr><td>2067</td><td>0333711</td><td>Pesanggaran</td></tr>
                                                    <tr><td>2068</td><td>0333630</td><td>Rogojampi</td></tr>
                                                    <tr><td>2069</td><td>0333631</td><td>Rogojampi</td></tr>
                                                    <tr><td>2070</td><td>0333632</td><td>Rogojampi</td></tr>
                                                    <tr><td>2071</td><td>0333633</td><td>Rogojampi</td></tr>
                                                    <tr><td>2072</td><td>0333634</td><td>Rogojampi</td></tr>
                                                    <tr><td>2073</td><td>0333635</td><td>Rogojampi</td></tr>
                                                    <tr><td>2074</td><td>0333460</td><td>Wongsorejo</td></tr>
                                                    <tr><td>2075</td><td>0333461</td><td>Wongsorejo</td></tr>
                                                    <tr><td>2076</td><td>0333462</td><td>Wongsorejo</td></tr>
                                                    <tr><td>2077</td><td>0334321</td><td>Jatiroto</td></tr>
                                                    <tr><td>2078</td><td>0334322</td><td>Jatiroto</td></tr>
                                                    <tr><td>2079</td><td>0334323</td><td>Jatiroto</td></tr>
                                                    <tr><td>2080</td><td>0334441</td><td>Klakah</td></tr>
                                                    <tr><td>2081</td><td>0334442</td><td>Klakah</td></tr>
                                                    <tr><td>2082</td><td>0334</td><td>Lumajang</td></tr>
                                                    <tr><td>2083</td><td>03341</td><td>Lumajang</td></tr>
                                                    <tr><td>2084</td><td>0334880</td><td>Lumajang</td></tr>
                                                    <tr><td>2085</td><td>0334881</td><td>Lumajang</td></tr>
                                                    <tr><td>2086</td><td>0334882</td><td>Lumajang</td></tr>
                                                    <tr><td>2087</td><td>0334883</td><td>Lumajang</td></tr>
                                                    <tr><td>2088</td><td>0334884</td><td>Lumajang</td></tr>
                                                    <tr><td>2089</td><td>0334885</td><td>Lumajang</td></tr>
                                                    <tr><td>2090</td><td>0334886</td><td>Lumajang</td></tr>
                                                    <tr><td>2091</td><td>0334887</td><td>Lumajang</td></tr>
                                                    <tr><td>2092</td><td>0334888</td><td>Lumajang</td></tr>
                                                    <tr><td>2093</td><td>0334889</td><td>Lumajang</td></tr>
                                                    <tr><td>2094</td><td>0334890</td><td>Lumajang</td></tr>
                                                    <tr><td>2095</td><td>0334571</td><td>Pasirian</td></tr>
                                                    <tr><td>2096</td><td>0334572</td><td>Pasirian</td></tr>
                                                    <tr><td>2097</td><td>0334573</td><td>Pasirian</td></tr>
                                                    <tr><td>2098</td><td>0334590</td><td>Pronojiwo</td></tr>
                                                    <tr><td>2099</td><td>0334610</td><td>Senduro</td></tr>
                                                    <tr><td>2100</td><td>0334611</td><td>Senduro</td></tr>
                                                    <tr><td>2101</td><td>0334520</td><td>Tempeh</td></tr>
                                                    <tr><td>2102</td><td>0334521</td><td>Tempeh</td></tr>
                                                    <tr><td>2103</td><td>0334591</td><td>Tempusari</td></tr>
                                                    <tr><td>2104</td><td>0334390</td><td>Yosowilangun</td></tr>
                                                    <tr><td>2105</td><td>0334391</td><td>Yosowilangun</td></tr>
                                                    <tr><td>2106</td><td>0335611</td><td>Gending</td></tr>
                                                    <tr><td>2107</td><td>0335612</td><td>Gending</td></tr>
                                                    <tr><td>2108</td><td>0335495</td><td>Giliketapang</td></tr>
                                                    <tr><td>2109</td><td>0335841</td><td>Kraksaan</td></tr>
                                                    <tr><td>2110</td><td>0335842</td><td>Kraksaan</td></tr>
                                                    <tr><td>2111</td><td>0335843</td><td>Kraksaan</td></tr>
                                                    <tr><td>2112</td><td>0335844</td><td>Kraksaan</td></tr>
                                                    <tr><td>2113</td><td>0335891</td><td>Krucil</td></tr>
                                                    <tr><td>2114</td><td>0335680</td><td>Leces</td></tr>
                                                    <tr><td>2115</td><td>0335681</td><td>Leces</td></tr>
                                                    <tr><td>2116</td><td>0335541</td><td>Ngadisari</td></tr>
                                                    <tr><td>2117</td><td>0335771</td><td>Paiton</td></tr>
                                                    <tr><td>2118</td><td>0335772</td><td>Paiton</td></tr>
                                                    <tr><td>2119</td><td>0335773</td><td>Paiton</td></tr>
                                                    <tr><td>2120</td><td>0335</td><td>Probolinggo</td></tr>
                                                    <tr><td>2121</td><td>03351</td><td>Probolinggo</td></tr>
                                                    <tr><td>2122</td><td>033520</td><td>Probolinggo</td></tr>
                                                    <tr><td>2123</td><td>0335320</td><td>Probolinggo</td></tr>
                                                    <tr><td>2124</td><td>0335420</td><td>Probolinggo</td></tr>
                                                    <tr><td>2125</td><td>0335421</td><td>Probolinggo</td></tr>
                                                    <tr><td>2126</td><td>0335422</td><td>Probolinggo</td></tr>
                                                    <tr><td>2127</td><td>0335423</td><td>Probolinggo</td></tr>
                                                    <tr><td>2128</td><td>0335424</td><td>Probolinggo</td></tr>
                                                    <tr><td>2129</td><td>0335425</td><td>Probolinggo</td></tr>
                                                    <tr><td>2130</td><td>0335426</td><td>Probolinggo</td></tr>
                                                    <tr><td>2131</td><td>0335427</td><td>Probolinggo</td></tr>
                                                    <tr><td>2132</td><td>0335428</td><td>Probolinggo</td></tr>
                                                    <tr><td>2133</td><td>0335432</td><td>Probolinggo</td></tr>
                                                    <tr><td>2134</td><td>0335433</td><td>Probolinggo</td></tr>
                                                    <tr><td>2135</td><td>0335434</td><td>Probolinggo</td></tr>
                                                    <tr><td>2136</td><td>0335581</td><td>Sukapura</td></tr>
                                                    <tr><td>2137</td><td>0335591</td><td>Sumber</td></tr>
                                                    <tr><td>2138</td><td>0335871</td><td>Tiris</td></tr>
                                                    <tr><td>2139</td><td>0335511</td><td>Tongas</td></tr>
                                                    <tr><td>2140</td><td>0336881</td><td>Ambulu</td></tr>
                                                    <tr><td>2141</td><td>0336882</td><td>Ambulu</td></tr>
                                                    <tr><td>2142</td><td>0336883</td><td>Ambulu</td></tr>
                                                    <tr><td>2143</td><td>0336621</td><td>Balung</td></tr>
                                                    <tr><td>2144</td><td>0336622</td><td>Balung</td></tr>
                                                    <tr><td>2145</td><td>0336623</td><td>Balung</td></tr>
                                                    <tr><td>2146</td><td>0336321</td><td>Kencong</td></tr>
                                                    <tr><td>2147</td><td>0336322</td><td>Kencong</td></tr>
                                                    <tr><td>2148</td><td>0336323</td><td>Kencong</td></tr>
                                                    <tr><td>2149</td><td>0336324</td><td>Kencong</td></tr>
                                                    <tr><td>2150</td><td>0336721</td><td>Puger</td></tr>
                                                    <tr><td>2151</td><td>0336722</td><td>Puger</td></tr>
                                                    <tr><td>2152</td><td>0336</td><td>Tanggul</td></tr>
                                                    <tr><td>2153</td><td>03361</td><td>Tanggul</td></tr>
                                                    <tr><td>2154</td><td>0336441</td><td>Tanggul</td></tr>
                                                    <tr><td>2155</td><td>0336442</td><td>Tanggul</td></tr>
                                                    <tr><td>2156</td><td>0336443</td><td>Tanggul</td></tr>
                                                    <tr><td>2157</td><td>0338285</td><td>Asembagus</td></tr>
                                                    <tr><td>2158</td><td>0338451</td><td>Asembagus</td></tr>
                                                    <tr><td>2159</td><td>0338452</td><td>Asembagus</td></tr>
                                                    <tr><td>2160</td><td>0338891</td><td>Besuki</td></tr>
                                                    <tr><td>2161</td><td>0338892</td><td>Besuki</td></tr>
                                                    <tr><td>2162</td><td>0338390</td><td>Mlandingan</td></tr>
                                                    <tr><td>2163</td><td>0338</td><td>Situbondo</td></tr>
                                                    <tr><td>2164</td><td>03381</td><td>Situbondo</td></tr>
                                                    <tr><td>2165</td><td>0338670</td><td>Situbondo</td></tr>
                                                    <tr><td>2166</td><td>0338671</td><td>Situbondo</td></tr>
                                                    <tr><td>2167</td><td>0338672</td><td>Situbondo</td></tr>
                                                    <tr><td>2168</td><td>0338673</td><td>Situbondo</td></tr>
                                                    <tr><td>2169</td><td>0338674</td><td>Situbondo</td></tr>
                                                    <tr><td>2170</td><td>0338675</td><td>Situbondo</td></tr>
                                                    <tr><td>2171</td><td>0338676</td><td>Situbondo</td></tr>
                                                    <tr><td>2172</td><td>0338677</td><td>Situbondo</td></tr>
                                                    <tr><td>2173</td><td>0338678</td><td>Situbondo</td></tr>
                                                    <tr><td>2174</td><td>0338679</td><td>Situbondo</td></tr>
                                                    <tr><td>2175</td><td>0341851</td><td>Ampelgading</td></tr>
                                                    <tr><td>2176</td><td>0341841</td><td>Bantur</td></tr>
                                                    <tr><td>2177</td><td>034159</td><td>Batu</td></tr>
                                                    <tr><td>2178</td><td>0341833</td><td>Bululawang</td></tr>
                                                    <tr><td>2179</td><td>0341895</td><td>Dampit</td></tr>
                                                    <tr><td>2180</td><td>0341896</td><td>Dampit</td></tr>
                                                    <tr><td>2181</td><td>0341897</td><td>Dampit</td></tr>
                                                    <tr><td>2182</td><td>0341881</td><td>Donomulyo</td></tr>
                                                    <tr><td>2183</td><td>0341877</td><td>Gondanglegi</td></tr>
                                                    <tr><td>2184</td><td>0341878</td><td>Gondanglegi</td></tr>
                                                    <tr><td>2185</td><td>0341879</td><td>Gondanglegi</td></tr>
                                                    <tr><td>2186</td><td>0341370</td><td>Gunungkawi</td></tr>
                                                    <tr><td>2187</td><td>0341379</td><td>Jambuwer</td></tr>
                                                    <tr><td>2188</td><td>0341460</td><td>Karangploso</td></tr>
                                                    <tr><td>2189</td><td>0341461</td><td>Karangploso</td></tr>
                                                    <tr><td>2190</td><td>0341462</td><td>Karangploso</td></tr>
                                                    <tr><td>2191</td><td>0341463</td><td>Karangploso</td></tr>
                                                    <tr><td>2192</td><td>0341464</td><td>Karangploso</td></tr>
                                                    <tr><td>2193</td><td>0341465</td><td>Karangploso</td></tr>
                                                    <tr><td>2194</td><td>0341395</td><td>Kepanjen</td></tr>
                                                    <tr><td>2195</td><td>0341396</td><td>Kepanjen</td></tr>
                                                    <tr><td>2196</td><td>0341397</td><td>Kepanjen</td></tr>
                                                    <tr><td>2197</td><td>0341398</td><td>Kepanjen</td></tr>
                                                    <tr><td>2198</td><td>034142</td><td>Lawang</td></tr>
                                                    <tr><td>2199</td><td>03411308</td><td>Lawang</td></tr>
                                                    <tr><td>2200</td><td>0341</td><td>Malang</td></tr>
                                                    <tr><td>2201</td><td>03411</td><td>Malang</td></tr>
                                                    <tr><td>2202</td><td>034120</td><td>Malang</td></tr>
                                                    <tr><td>2203</td><td>034128</td><td>Malang</td></tr>
                                                    <tr><td>2204</td><td>034132</td><td>Malang</td></tr>
                                                    <tr><td>2205</td><td>034134</td><td>Malang</td></tr>
                                                    <tr><td>2206</td><td>034135</td><td>Malang</td></tr>
                                                    <tr><td>2207</td><td>034136</td><td>Malang</td></tr>
                                                    <tr><td>2208</td><td>0341291</td><td>Malang</td></tr>
                                                    <tr><td>2209</td><td>0341300</td><td>Malang</td></tr>
                                                    <tr><td>2210</td><td>03412990</td><td>Malang</td></tr>
                                                    <tr><td>2211</td><td>03412991</td><td>Malang</td></tr>
                                                    <tr><td>2212</td><td>03412999</td><td>Malang</td></tr>
                                                    <tr><td>2213</td><td>034112078</td><td>Malang</td></tr>
                                                    <tr><td>2214</td><td>034112089</td><td>Malang</td></tr>
                                                    <tr><td>2215</td><td>034113022</td><td>Malang</td></tr>
                                                    <tr><td>2216</td><td>034113066</td><td>Malang</td></tr>
                                                    <tr><td>2217</td><td>034147</td><td>Malang - Blimbing</td></tr>
                                                    <tr><td>2218</td><td>034148</td><td>Malang - Blimbing</td></tr>
                                                    <tr><td>2219</td><td>034149</td><td>Malang - Blimbing</td></tr>
                                                    <tr><td>2220</td><td>03411300</td><td>Malang - Blimbing</td></tr>
                                                    <tr><td>2221</td><td>0341751</td><td>Malang - Buring</td></tr>
                                                    <tr><td>2222</td><td>0341752</td><td>Malang - Buring</td></tr>
                                                    <tr><td>2223</td><td>0341753</td><td>Malang - Buring</td></tr>
                                                    <tr><td>2224</td><td>0341754</td><td>Malang - Buring</td></tr>
                                                    <tr><td>2225</td><td>034180</td><td>Malang - Gadang</td></tr>
                                                    <tr><td>2226</td><td>034155</td><td>Malang - Klojen</td></tr>
                                                    <tr><td>2227</td><td>034156</td><td>Malang - Klojen</td></tr>
                                                    <tr><td>2228</td><td>034157</td><td>Malang - Klojen</td></tr>
                                                    <tr><td>2229</td><td>034158</td><td>Malang - Klojen</td></tr>
                                                    <tr><td>2230</td><td>034171</td><td>Malang - Sawojajar</td></tr>
                                                    <tr><td>2231</td><td>0341521</td><td>Ngantang</td></tr>
                                                    <tr><td>2232</td><td>0341311</td><td>Pagak</td></tr>
                                                    <tr><td>2233</td><td>0341791</td><td>Pakis</td></tr>
                                                    <tr><td>2234</td><td>0341792</td><td>Pakis</td></tr>
                                                    <tr><td>2235</td><td>0341793</td><td>Pakis</td></tr>
                                                    <tr><td>2236</td><td>0341520</td><td>Pujon</td></tr>
                                                    <tr><td>2237</td><td>0341524</td><td>Pujon</td></tr>
                                                    <tr><td>2238</td><td>034145</td><td>Singosari</td></tr>
                                                    <tr><td>2239</td><td>0341871</td><td>Sumbermanjing</td></tr>
                                                    <tr><td>2240</td><td>0341383</td><td>Sumberpucung</td></tr>
                                                    <tr><td>2241</td><td>0341384</td><td>Sumberpucung</td></tr>
                                                    <tr><td>2242</td><td>0341385</td><td>Sumberpucung</td></tr>
                                                    <tr><td>2243</td><td>034178</td><td>Tumpang</td></tr>
                                                    <tr><td>2244</td><td>0341821</td><td>Turen</td></tr>
                                                    <tr><td>2245</td><td>0341822</td><td>Turen</td></tr>
                                                    <tr><td>2246</td><td>0341823</td><td>Turen</td></tr>
                                                    <tr><td>2247</td><td>0341824</td><td>Turen</td></tr>
                                                    <tr><td>2248</td><td>0341825</td><td>Turen</td></tr>
                                                    <tr><td>2249</td><td>0341826</td><td>Turen</td></tr>
                                                    <tr><td>2250</td><td>0341827</td><td>Turen</td></tr>
                                                    <tr><td>2251</td><td>0342351</td><td>Binangun</td></tr>
                                                    <tr><td>2252</td><td>0342</td><td>Blitar</td></tr>
                                                    <tr><td>2253</td><td>03421</td><td>Blitar</td></tr>
                                                    <tr><td>2254</td><td>034280</td><td>Blitar</td></tr>
                                                    <tr><td>2255</td><td>0342810</td><td>Blitar</td></tr>
                                                    <tr><td>2256</td><td>0342331</td><td>Kesamben</td></tr>
                                                    <tr><td>2257</td><td>0342332</td><td>Kesamben</td></tr>
                                                    <tr><td>2258</td><td>0342441</td><td>Lodoyo</td></tr>
                                                    <tr><td>2259</td><td>0342442</td><td>Lodoyo</td></tr>
                                                    <tr><td>2260</td><td>0342561</td><td>Panataran</td></tr>
                                                    <tr><td>2261</td><td>0342562</td><td>Panataran</td></tr>
                                                    <tr><td>2262</td><td>0342551</td><td>Srengat</td></tr>
                                                    <tr><td>2263</td><td>0342552</td><td>Srengat</td></tr>
                                                    <tr><td>2264</td><td>0342553</td><td>Srengat</td></tr>
                                                    <tr><td>2265</td><td>0342691</td><td>Wlingi</td></tr>
                                                    <tr><td>2266</td><td>0342692</td><td>Wlingi</td></tr>
                                                    <tr><td>2267</td><td>0342693</td><td>Wlingi</td></tr>
                                                    <tr><td>2268</td><td>0342694</td><td>Wlingi</td></tr>
                                                    <tr><td>2269</td><td>0343741</td><td>Bangil</td></tr>
                                                    <tr><td>2270</td><td>0343742</td><td>Bangil</td></tr>
                                                    <tr><td>2271</td><td>0343743</td><td>Bangil</td></tr>
                                                    <tr><td>2272</td><td>0343744</td><td>Bangil</td></tr>
                                                    <tr><td>2273</td><td>0343745</td><td>Bangil</td></tr>
                                                    <tr><td>2274</td><td>0343746</td><td>Bangil</td></tr>
                                                    <tr><td>2275</td><td>0343656</td><td>Beji</td></tr>
                                                    <tr><td>2276</td><td>0343657</td><td>Beji</td></tr>
                                                    <tr><td>2277</td><td>0343654</td><td>Bejipasuruan</td></tr>
                                                    <tr><td>2278</td><td>0343655</td><td>Bejipasuruan</td></tr>
                                                    <tr><td>2279</td><td>0343851</td><td>Gempol</td></tr>
                                                    <tr><td>2280</td><td>0343852</td><td>Gempol</td></tr>
                                                    <tr><td>2281</td><td>0343853</td><td>Gempol</td></tr>
                                                    <tr><td>2282</td><td>0343854</td><td>Gempol</td></tr>
                                                    <tr><td>2283</td><td>0343855</td><td>Gempol</td></tr>
                                                    <tr><td>2284</td><td>0343856</td><td>Gempol</td></tr>
                                                    <tr><td>2285</td><td>0343857</td><td>Gempol</td></tr>
                                                    <tr><td>2286</td><td>0343441</td><td>Gondangwetan</td></tr>
                                                    <tr><td>2287</td><td>034348</td><td>Grati</td></tr>
                                                    <tr><td>2288</td><td>0343401</td><td>Grati</td></tr>
                                                    <tr><td>2289</td><td>0343491</td><td>Nongkojajar</td></tr>
                                                    <tr><td>2290</td><td>0343492</td><td>Nongkojajar</td></tr>
                                                    <tr><td>2291</td><td>0343498</td><td>Nongkojajar</td></tr>
                                                    <tr><td>2292</td><td>0343499</td><td>Nongkojajar</td></tr>
                                                    <tr><td>2293</td><td>0343630</td><td>Pandaan</td></tr>
                                                    <tr><td>2294</td><td>0343631</td><td>Pandaan</td></tr>
                                                    <tr><td>2295</td><td>0343632</td><td>Pandaan</td></tr>
                                                    <tr><td>2296</td><td>0343633</td><td>Pandaan</td></tr>
                                                    <tr><td>2297</td><td>0343634</td><td>Pandaan</td></tr>
                                                    <tr><td>2298</td><td>0343635</td><td>Pandaan</td></tr>
                                                    <tr><td>2299</td><td>0343</td><td>Pasuruan</td></tr>
                                                    <tr><td>2300</td><td>03431</td><td>Pasuruan</td></tr>
                                                    <tr><td>2301</td><td>034320</td><td>Pasuruan</td></tr>
                                                    <tr><td>2302</td><td>0343411</td><td>Pasuruan</td></tr>
                                                    <tr><td>2303</td><td>0343412</td><td>Pasuruan</td></tr>
                                                    <tr><td>2304</td><td>0343413</td><td>Pasuruan</td></tr>
                                                    <tr><td>2305</td><td>0343414</td><td>Pasuruan</td></tr>
                                                    <tr><td>2306</td><td>0343415</td><td>Pasuruan</td></tr>
                                                    <tr><td>2307</td><td>0343420</td><td>Pasuruan</td></tr>
                                                    <tr><td>2308</td><td>0343421</td><td>Pasuruan</td></tr>
                                                    <tr><td>2309</td><td>0343422</td><td>Pasuruan</td></tr>
                                                    <tr><td>2310</td><td>0343423</td><td>Pasuruan</td></tr>
                                                    <tr><td>2311</td><td>0343424</td><td>Pasuruan</td></tr>
                                                    <tr><td>2312</td><td>0343425</td><td>Pasuruan</td></tr>
                                                    <tr><td>2313</td><td>0343426</td><td>Pasuruan</td></tr>
                                                    <tr><td>2314</td><td>0343427</td><td>Pasuruan</td></tr>
                                                    <tr><td>2315</td><td>0343428</td><td>Pasuruan</td></tr>
                                                    <tr><td>2316</td><td>0343429</td><td>Pasuruan</td></tr>
                                                    <tr><td>2317</td><td>0343880</td><td>Prigen</td></tr>
                                                    <tr><td>2318</td><td>0343881</td><td>Prigen</td></tr>
                                                    <tr><td>2319</td><td>0343882</td><td>Prigen</td></tr>
                                                    <tr><td>2320</td><td>0343883</td><td>Prigen</td></tr>
                                                    <tr><td>2321</td><td>0343884</td><td>Prigen</td></tr>
                                                    <tr><td>2322</td><td>0343611</td><td>Purwosaripasuruan</td></tr>
                                                    <tr><td>2323</td><td>0343612</td><td>Purwosaripasuruan</td></tr>
                                                    <tr><td>2324</td><td>0343613</td><td>Purwosaripasuruan</td></tr>
                                                    <tr><td>2325</td><td>0343571</td><td>Tosari</td></tr>
                                                    <tr><td>2326</td><td>0351656</td><td>Bringin</td></tr>
                                                    <tr><td>2327</td><td>0351383</td><td>Caruban</td></tr>
                                                    <tr><td>2328</td><td>0351384</td><td>Caruban</td></tr>
                                                    <tr><td>2329</td><td>0351385</td><td>Caruban</td></tr>
                                                    <tr><td>2330</td><td>0351386</td><td>Caruban</td></tr>
                                                    <tr><td>2331</td><td>0351387</td><td>Caruban</td></tr>
                                                    <tr><td>2332</td><td>035131</td><td>Gemarang</td></tr>
                                                    <tr><td>2333</td><td>0351438</td><td>Goranggareng</td></tr>
                                                    <tr><td>2334</td><td>0351439</td><td>Goranggareng</td></tr>
                                                    <tr><td>2335</td><td>035173</td><td>Jogorogo</td></tr>
                                                    <tr><td>2336</td><td>0351661</td><td>Karangjati</td></tr>
                                                    <tr><td>2337</td><td>0351662</td><td>Karangjati</td></tr>
                                                    <tr><td>2338</td><td>0351321</td><td>Kare</td></tr>
                                                    <tr><td>2339</td><td>0351611</td><td>Kwarakan</td></tr>
                                                    <tr><td>2340</td><td>0351</td><td>Madiun</td></tr>
                                                    <tr><td>2341</td><td>03511</td><td>Madiun</td></tr>
                                                    <tr><td>2342</td><td>035120</td><td>Madiun</td></tr>
                                                    <tr><td>2343</td><td>035145</td><td>Madiun</td></tr>
                                                    <tr><td>2344</td><td>0351281</td><td>Madiun</td></tr>
                                                    <tr><td>2345</td><td>0351282</td><td>Madiun</td></tr>
                                                    <tr><td>2346</td><td>0351283</td><td>Madiun</td></tr>
                                                    <tr><td>2347</td><td>0351284</td><td>Madiun</td></tr>
                                                    <tr><td>2348</td><td>0351285</td><td>Madiun</td></tr>
                                                    <tr><td>2349</td><td>0351286</td><td>Madiun</td></tr>
                                                    <tr><td>2350</td><td>0351287</td><td>Madiun</td></tr>
                                                    <tr><td>2351</td><td>0351291</td><td>Madiun</td></tr>
                                                    <tr><td>2352</td><td>0351400</td><td>Madiun</td></tr>
                                                    <tr><td>2353</td><td>0351462</td><td>Madiun</td></tr>
                                                    <tr><td>2354</td><td>0351463</td><td>Madiun</td></tr>
                                                    <tr><td>2355</td><td>0351464</td><td>Madiun</td></tr>
                                                    <tr><td>2356</td><td>0351465</td><td>Madiun</td></tr>
                                                    <tr><td>2357</td><td>0351491</td><td>Madiun</td></tr>
                                                    <tr><td>2358</td><td>0351492</td><td>Madiun</td></tr>
                                                    <tr><td>2359</td><td>0351493</td><td>Madiun</td></tr>
                                                    <tr><td>2360</td><td>0351494</td><td>Madiun</td></tr>
                                                    <tr><td>2361</td><td>0351495</td><td>Madiun</td></tr>
                                                    <tr><td>2362</td><td>0351496</td><td>Madiun</td></tr>
                                                    <tr><td>2363</td><td>0351497</td><td>Madiun</td></tr>
                                                    <tr><td>2364</td><td>03512999</td><td>Madiun</td></tr>
                                                    <tr><td>2365</td><td>035112078</td><td>Madiun</td></tr>
                                                    <tr><td>2366</td><td>035112089</td><td>Madiun</td></tr>
                                                    <tr><td>2367</td><td>0351891</td><td>Magetan</td></tr>
                                                    <tr><td>2368</td><td>0351892</td><td>Magetan</td></tr>
                                                    <tr><td>2369</td><td>0351893</td><td>Magetan</td></tr>
                                                    <tr><td>2370</td><td>0351894</td><td>Magetan</td></tr>
                                                    <tr><td>2371</td><td>0351895</td><td>Magetan</td></tr>
                                                    <tr><td>2372</td><td>0351896</td><td>Magetan</td></tr>
                                                    <tr><td>2373</td><td>0351401</td><td>Maospati</td></tr>
                                                    <tr><td>2374</td><td>0351867</td><td>Maospati</td></tr>
                                                    <tr><td>2375</td><td>0351868</td><td>Maospati</td></tr>
                                                    <tr><td>2376</td><td>0351869</td><td>Maospati</td></tr>
                                                    <tr><td>2377</td><td>0351744</td><td>Ngawi</td></tr>
                                                    <tr><td>2378</td><td>0351745</td><td>Ngawi</td></tr>
                                                    <tr><td>2379</td><td>0351746</td><td>Ngawi</td></tr>
                                                    <tr><td>2380</td><td>0351747</td><td>Ngawi</td></tr>
                                                    <tr><td>2381</td><td>0351748</td><td>Ngawi</td></tr>
                                                    <tr><td>2382</td><td>0351749</td><td>Ngawi</td></tr>
                                                    <tr><td>2383</td><td>0351651</td><td>Pangkur</td></tr>
                                                    <tr><td>2384</td><td>0351871</td><td>Parang Magetan</td></tr>
                                                    <tr><td>2385</td><td>0351888</td><td>Sarangan</td></tr>
                                                    <tr><td>2386</td><td>0351889</td><td>Sarangan</td></tr>
                                                    <tr><td>2387</td><td>0351331</td><td>Sawahan</td></tr>
                                                    <tr><td>2388</td><td>0351367</td><td>Uteran</td></tr>
                                                    <tr><td>2389</td><td>0351368</td><td>Uteran</td></tr>
                                                    <tr><td>2390</td><td>0351369</td><td>Uteran</td></tr>
                                                    <tr><td>2391</td><td>0351671</td><td>Walikukun</td></tr>
                                                    <tr><td>2392</td><td>0351672</td><td>Walikukun</td></tr>
                                                    <tr><td>2393</td><td>0352531</td><td>Jenangan</td></tr>
                                                    <tr><td>2394</td><td>0352591</td><td>Ngebel</td></tr>
                                                    <tr><td>2395</td><td>0352391</td><td>Ngrayon</td></tr>
                                                    <tr><td>2396</td><td>0352</td><td>Ponorogo</td></tr>
                                                    <tr><td>2397</td><td>03521</td><td>Ponorogo</td></tr>
                                                    <tr><td>2398</td><td>0352461</td><td>Ponorogo</td></tr>
                                                    <tr><td>2399</td><td>0352481</td><td>Ponorogo</td></tr>
                                                    <tr><td>2400</td><td>0352482</td><td>Ponorogo</td></tr>
                                                    <tr><td>2401</td><td>0352483</td><td>Ponorogo</td></tr>
                                                    <tr><td>2402</td><td>0352484</td><td>Ponorogo</td></tr>
                                                    <tr><td>2403</td><td>0352485</td><td>Ponorogo</td></tr>
                                                    <tr><td>2404</td><td>0352486</td><td>Ponorogo</td></tr>
                                                    <tr><td>2405</td><td>0352571</td><td>Pulung</td></tr>
                                                    <tr><td>2406</td><td>0352311</td><td>Sambit</td></tr>
                                                    <tr><td>2407</td><td>0352312</td><td>Sambit</td></tr>
                                                    <tr><td>2408</td><td>0352791</td><td>Sampung</td></tr>
                                                    <tr><td>2409</td><td>0352371</td><td>Slahung</td></tr>
                                                    <tr><td>2410</td><td>0352751</td><td>Sumoroto</td></tr>
                                                    <tr><td>2411</td><td>0352752</td><td>Sumoroto</td></tr>
                                                    <tr><td>2412</td><td>0353</td><td>Bojonegoro</td></tr>
                                                    <tr><td>2413</td><td>03531</td><td>Bojonegoro</td></tr>
                                                    <tr><td>2414</td><td>0353881</td><td>Bojonegoro</td></tr>
                                                    <tr><td>2415</td><td>0353882</td><td>Bojonegoro</td></tr>
                                                    <tr><td>2416</td><td>0353883</td><td>Bojonegoro</td></tr>
                                                    <tr><td>2417</td><td>0353884</td><td>Bojonegoro</td></tr>
                                                    <tr><td>2418</td><td>0353885</td><td>Bojonegoro</td></tr>
                                                    <tr><td>2419</td><td>0353886</td><td>Bojonegoro</td></tr>
                                                    <tr><td>2420</td><td>0353887</td><td>Bojonegoro</td></tr>
                                                    <tr><td>2421</td><td>0353888</td><td>Bojonegoro</td></tr>
                                                    <tr><td>2422</td><td>0353889</td><td>Bojonegoro</td></tr>
                                                    <tr><td>2423</td><td>0353451</td><td>Bubulan</td></tr>
                                                    <tr><td>2424</td><td>0353511</td><td>Kalitidu</td></tr>
                                                    <tr><td>2425</td><td>0353531</td><td>Kasiman</td></tr>
                                                    <tr><td>2426</td><td>0353351</td><td>Kedungadem</td></tr>
                                                    <tr><td>2427</td><td>0353311</td><td>Kepuhbaru</td></tr>
                                                    <tr><td>2428</td><td>0353431</td><td>Ngambon</td></tr>
                                                    <tr><td>2429</td><td>0353411</td><td>Ngasem</td></tr>
                                                    <tr><td>2430</td><td>0353591</td><td>Ngraho</td></tr>
                                                    <tr><td>2431</td><td>0353551</td><td>Purwosari Bojonegoro</td></tr>
                                                    <tr><td>2432</td><td>0353391</td><td>Sugihwaras</td></tr>
                                                    <tr><td>2433</td><td>0353331</td><td>Sumberrejo</td></tr>
                                                    <tr><td>2434</td><td>0353332</td><td>Sumberrejo</td></tr>
                                                    <tr><td>2435</td><td>0353571</td><td>Tambakrejo</td></tr>
                                                    <tr><td>2436</td><td>0353371</td><td>Temayang</td></tr>
                                                    <tr><td>2437</td><td>0354545</td><td>Gurah</td></tr>
                                                    <tr><td>2438</td><td>0354546</td><td>Gurah</td></tr>
                                                    <tr><td>2439</td><td>0354547</td><td>Gurah</td></tr>
                                                    <tr><td>2440</td><td>0354326</td><td>Kandanganpare</td></tr>
                                                    <tr><td>2441</td><td>0354327</td><td>Kandanganpare</td></tr>
                                                    <tr><td>2442</td><td>0354</td><td>Kediri</td></tr>
                                                    <tr><td>2443</td><td>03541</td><td>Kediri</td></tr>
                                                    <tr><td>2444</td><td>035420</td><td>Kediri</td></tr>
                                                    <tr><td>2445</td><td>035468</td><td>Kediri</td></tr>
                                                    <tr><td>2446</td><td>0354600</td><td>Kediri</td></tr>
                                                    <tr><td>2447</td><td>0354690</td><td>Kediri</td></tr>
                                                    <tr><td>2448</td><td>0354691</td><td>Kediri</td></tr>
                                                    <tr><td>2449</td><td>0354692</td><td>Kediri</td></tr>
                                                    <tr><td>2450</td><td>0354693</td><td>Kediri</td></tr>
                                                    <tr><td>2451</td><td>035412078</td><td>Kediri</td></tr>
                                                    <tr><td>2452</td><td>035412089</td><td>Kediri</td></tr>
                                                    <tr><td>2453</td><td>0354771</td><td>Mojoroto</td></tr>
                                                    <tr><td>2454</td><td>0354772</td><td>Mojoroto</td></tr>
                                                    <tr><td>2455</td><td>0354773</td><td>Mojoroto</td></tr>
                                                    <tr><td>2456</td><td>0354774</td><td>Mojoroto</td></tr>
                                                    <tr><td>2457</td><td>0354775</td><td>Mojoroto</td></tr>
                                                    <tr><td>2458</td><td>0354776</td><td>Mojoroto</td></tr>
                                                    <tr><td>2459</td><td>0354477</td><td>Ngadiluwih</td></tr>
                                                    <tr><td>2460</td><td>0354478</td><td>Ngadiluwih</td></tr>
                                                    <tr><td>2461</td><td>0354479</td><td>Ngadiluwih</td></tr>
                                                    <tr><td>2462</td><td>0354528</td><td>Papar</td></tr>
                                                    <tr><td>2463</td><td>0354529</td><td>Papar</td></tr>
                                                    <tr><td>2464</td><td>0354391</td><td>Pare</td></tr>
                                                    <tr><td>2465</td><td>0354392</td><td>Pare</td></tr>
                                                    <tr><td>2466</td><td>0354393</td><td>Pare</td></tr>
                                                    <tr><td>2467</td><td>0354394</td><td>Pare</td></tr>
                                                    <tr><td>2468</td><td>0354395</td><td>Pare</td></tr>
                                                    <tr><td>2469</td><td>0354396</td><td>Pare</td></tr>
                                                    <tr><td>2470</td><td>0354411</td><td>Sambi</td></tr>
                                                    <tr><td>2471</td><td>0354412</td><td>Sambi</td></tr>
                                                    <tr><td>2472</td><td>0354442</td><td>Wateskediri</td></tr>
                                                    <tr><td>2473</td><td>0354443</td><td>Wateskediri</td></tr>
                                                    <tr><td>2474</td><td>0354444</td><td>Wateskediri</td></tr>
                                                    <tr><td>2475</td><td>0355531</td><td>Campurdarat</td></tr>
                                                    <tr><td>2476</td><td>0355532</td><td>Campurdarat</td></tr>
                                                    <tr><td>2477</td><td>0355533</td><td>Campurdarat</td></tr>
                                                    <tr><td>2478</td><td>0355611</td><td>Dongko</td></tr>
                                                    <tr><td>2479</td><td>0355878</td><td>Durenan</td></tr>
                                                    <tr><td>2480</td><td>0355879</td><td>Durenan</td></tr>
                                                    <tr><td>2481</td><td>0355811</td><td>Gandusari</td></tr>
                                                    <tr><td>2482</td><td>0355591</td><td>Kalidawir</td></tr>
                                                    <tr><td>2483</td><td>0355631</td><td>Kampak</td></tr>
                                                    <tr><td>2484</td><td>0355691</td><td>Munjungan</td></tr>
                                                    <tr><td>2485</td><td>0355395</td><td>Ngunut</td></tr>
                                                    <tr><td>2486</td><td>0355396</td><td>Ngunut</td></tr>
                                                    <tr><td>2487</td><td>0355397</td><td>Ngunut</td></tr>
                                                    <tr><td>2488</td><td>0355398</td><td>Ngunut</td></tr>
                                                    <tr><td>2489</td><td>0355411</td><td>Pagerwo</td></tr>
                                                    <tr><td>2490</td><td>0355651</td><td>Panggul</td></tr>
                                                    <tr><td>2491</td><td>0355551</td><td>Prigi</td></tr>
                                                    <tr><td>2492</td><td>0355571</td><td>Pucangl</td></tr>
                                                    <tr><td>2493</td><td>0355711</td><td>Pule</td></tr>
                                                    <tr><td>2494</td><td>0355431</td><td>Sendang</td></tr>
                                                    <tr><td>2495</td><td>0355561</td><td>Tanggun</td></tr>
                                                    <tr><td>2496</td><td>0355791</td><td>Trenggalek</td></tr>
                                                    <tr><td>2497</td><td>0355792</td><td>Trenggalek</td></tr>
                                                    <tr><td>2498</td><td>0355793</td><td>Trenggalek</td></tr>
                                                    <tr><td>2499</td><td>0355794</td><td>Trenggalek</td></tr>
                                                    <tr><td>2500</td><td>0355</td><td>Tulungagung</td></tr>
                                                    <tr><td>2501</td><td>03551</td><td>Tulungagung</td></tr>
                                                    <tr><td>2502</td><td>0355320</td><td>Tulungagung</td></tr>
                                                    <tr><td>2503</td><td>0355321</td><td>Tulungagung</td></tr>
                                                    <tr><td>2504</td><td>0355322</td><td>Tulungagung</td></tr>
                                                    <tr><td>2505</td><td>0355323</td><td>Tulungagung</td></tr>
                                                    <tr><td>2506</td><td>0355324</td><td>Tulungagung</td></tr>
                                                    <tr><td>2507</td><td>0355325</td><td>Tulungagung</td></tr>
                                                    <tr><td>2508</td><td>0355326</td><td>Tulungagung</td></tr>
                                                    <tr><td>2509</td><td>0355327</td><td>Tulungagung</td></tr>
                                                    <tr><td>2510</td><td>0355328</td><td>Tulungagung</td></tr>
                                                    <tr><td>2511</td><td>0355329</td><td>Tulungagung</td></tr>
                                                    <tr><td>2512</td><td>0355330</td><td>Tulungagung</td></tr>
                                                    <tr><td>2513</td><td>0355331</td><td>Tulungagung</td></tr>
                                                    <tr><td>2514</td><td>0355332</td><td>Tulungagung</td></tr>
                                                    <tr><td>2515</td><td>0355333</td><td>Tulungagung</td></tr>
                                                    <tr><td>2516</td><td>0356411</td><td>Bancar</td></tr>
                                                    <tr><td>2517</td><td>0356412</td><td>Bancar</td></tr>
                                                    <tr><td>2518</td><td>0356551</td><td>Jatirogo</td></tr>
                                                    <tr><td>2519</td><td>0356552</td><td>Jatirogo</td></tr>
                                                    <tr><td>2520</td><td>0356611</td><td>Kerek</td></tr>
                                                    <tr><td>2521</td><td>0356612</td><td>Kerek</td></tr>
                                                    <tr><td>2522</td><td>0356711</td><td>Merakurak</td></tr>
                                                    <tr><td>2523</td><td>0356712</td><td>Merakurak</td></tr>
                                                    <tr><td>2524</td><td>0356831</td><td>Parengan</td></tr>
                                                    <tr><td>2525</td><td>0356811</td><td>Rengel</td></tr>
                                                    <tr><td>2526</td><td>0356812</td><td>Rengel</td></tr>
                                                    <tr><td>2527</td><td>0356531</td><td>Senori</td></tr>
                                                    <tr><td>2528</td><td>0356631</td><td>Singgahan</td></tr>
                                                    <tr><td>2529</td><td>0356491</td><td>Tanjungawarawar</td></tr>
                                                    <tr><td>2530</td><td>0356</td><td>Tuban</td></tr>
                                                    <tr><td>2531</td><td>03561</td><td>Tuban</td></tr>
                                                    <tr><td>2532</td><td>0356321</td><td>Tuban</td></tr>
                                                    <tr><td>2533</td><td>0356322</td><td>Tuban</td></tr>
                                                    <tr><td>2534</td><td>0356323</td><td>Tuban</td></tr>
                                                    <tr><td>2535</td><td>0356324</td><td>Tuban</td></tr>
                                                    <tr><td>2536</td><td>0356325</td><td>Tuban</td></tr>
                                                    <tr><td>2537</td><td>0356326</td><td>Tuban</td></tr>
                                                    <tr><td>2538</td><td>0356327</td><td>Tuban</td></tr>
                                                    <tr><td>2539</td><td>0356328</td><td>Tuban</td></tr>
                                                    <tr><td>2540</td><td>0357331</td><td>Bandar</td></tr>
                                                    <tr><td>2541</td><td>0357351</td><td>Jeruk</td></tr>
                                                    <tr><td>2542</td><td>0357441</td><td>Lorog</td></tr>
                                                    <tr><td>2543</td><td>0357371</td><td>Nawangan</td></tr>
                                                    <tr><td>2544</td><td>0357461</td><td>Ngadangan</td></tr>
                                                    <tr><td>2545</td><td>0357</td><td>Pacitan</td></tr>
                                                    <tr><td>2546</td><td>03571</td><td>Pacitan</td></tr>
                                                    <tr><td>2547</td><td>0357881</td><td>Pacitan</td></tr>
                                                    <tr><td>2548</td><td>0357882</td><td>Pacitan</td></tr>
                                                    <tr><td>2549</td><td>0357883</td><td>Pacitan</td></tr>
                                                    <tr><td>2550</td><td>0357884</td><td>Pacitan</td></tr>
                                                    <tr><td>2551</td><td>0357885</td><td>Pacitan</td></tr>
                                                    <tr><td>2552</td><td>0357511</td><td>Punung</td></tr>
                                                    <tr><td>2553</td><td>0357421</td><td>Sudimoro</td></tr>
                                                    <tr><td>2554</td><td>0357311</td><td>Tegalombo</td></tr>
                                                    <tr><td>2555</td><td>0357481</td><td>Watugede</td></tr>
                                                    <tr><td>2556</td><td>0358611</td><td>Gondang</td></tr>
                                                    <tr><td>2557</td><td>0358612</td><td>Gondang</td></tr>
                                                    <tr><td>2558</td><td>0358511</td><td>Jatikalen</td></tr>
                                                    <tr><td>2559</td><td>0358551</td><td>Kertosono</td></tr>
                                                    <tr><td>2560</td><td>0358552</td><td>Kertosono</td></tr>
                                                    <tr><td>2561</td><td>0358553</td><td>Kertosono</td></tr>
                                                    <tr><td>2562</td><td>0358554</td><td>Kertosono</td></tr>
                                                    <tr><td>2563</td><td>0358</td><td>Nganjuk</td></tr>
                                                    <tr><td>2564</td><td>03581</td><td>Nganjuk</td></tr>
                                                    <tr><td>2565</td><td>0358321</td><td>Nganjuk</td></tr>
                                                    <tr><td>2566</td><td>0358322</td><td>Nganjuk</td></tr>
                                                    <tr><td>2567</td><td>0358323</td><td>Nganjuk</td></tr>
                                                    <tr><td>2568</td><td>0358324</td><td>Nganjuk</td></tr>
                                                    <tr><td>2569</td><td>0358325</td><td>Nganjuk</td></tr>
                                                    <tr><td>2570</td><td>0358326</td><td>Nganjuk</td></tr>
                                                    <tr><td>2571</td><td>0358791</td><td>Prambon</td></tr>
                                                    <tr><td>2572</td><td>0358792</td><td>Prambon</td></tr>
                                                    <tr><td>2573</td><td>0358773</td><td>Warujay</td></tr>
                                                    <tr><td>2574</td><td>0358771</td><td>Warujayeng</td></tr>
                                                    <tr><td>2575</td><td>0358772</td><td>Warujayeng</td></tr>
                                                    <tr><td>2576</td><td>0361890</td><td>Abian Semal</td></tr>
                                                    <tr><td>2577</td><td>036172</td><td>Benoa</td></tr>
                                                    <tr><td>2578</td><td>0361</td><td>Denpasar</td></tr>
                                                    <tr><td>2579</td><td>036193</td><td>Gianyar</td></tr>
                                                    <tr><td>2580</td><td>036194</td><td>Gianyar</td></tr>
                                                    <tr><td>2581</td><td>036195</td><td>Gianyar</td></tr>
                                                    <tr><td>2582</td><td>0361701</td><td>Jimbaran</td></tr>
                                                    <tr><td>2583</td><td>0361702</td><td>Jimbaran</td></tr>
                                                    <tr><td>2584</td><td>0361703</td><td>Jimbaran</td></tr>
                                                    <tr><td>2585</td><td>0361704</td><td>Jimbaran</td></tr>
                                                    <tr><td>2586</td><td>0361709</td><td>Jimbaran</td></tr>
                                                    <tr><td>2587</td><td>03611</td><td>Kaliasem</td></tr>
                                                    <tr><td>2588</td><td>03612</td><td>Kaliasem</td></tr>
                                                    <tr><td>2589</td><td>036113</td><td>Kaliasem</td></tr>
                                                    <tr><td>2590</td><td>036122</td><td>Kaliasem</td></tr>
                                                    <tr><td>2591</td><td>036123</td><td>Kaliasem</td></tr>
                                                    <tr><td>2592</td><td>036124</td><td>Kaliasem</td></tr>
                                                    <tr><td>2593</td><td>036125</td><td>Kaliasem</td></tr>
                                                    <tr><td>2594</td><td>0361203</td><td>Kaliasem</td></tr>
                                                    <tr><td>2595</td><td>0361260</td><td>Kaliasem</td></tr>
                                                    <tr><td>2596</td><td>0361265</td><td>Kaliasem</td></tr>
                                                    <tr><td>2597</td><td>03612011</td><td>Kaliasem</td></tr>
                                                    <tr><td>2598</td><td>03612012</td><td>Kaliasem</td></tr>
                                                    <tr><td>2599</td><td>03612013</td><td>Kaliasem</td></tr>
                                                    <tr><td>2600</td><td>03612090</td><td>Kaliasem</td></tr>
                                                    <tr><td>2601</td><td>03612091</td><td>Kaliasem</td></tr>
                                                    <tr><td>2602</td><td>036175</td><td>Kuta</td></tr>
                                                    <tr><td>2603</td><td>036176</td><td>Kuta</td></tr>
                                                    <tr><td>2604</td><td>0361880</td><td>Mengwi</td></tr>
                                                    <tr><td>2605</td><td>036148</td><td>Monangmaning</td></tr>
                                                    <tr><td>2606</td><td>0361771</td><td>Nusadua</td></tr>
                                                    <tr><td>2607</td><td>0361772</td><td>Nusadua</td></tr>
                                                    <tr><td>2608</td><td>0361773</td><td>Nusadua</td></tr>
                                                    <tr><td>2609</td><td>0361774</td><td>Nusadua</td></tr>
                                                    <tr><td>2610</td><td>0361775</td><td>Nusadua</td></tr>
                                                    <tr><td>2611</td><td>0361776</td><td>Nusadua</td></tr>
                                                    <tr><td>2612</td><td>0361777</td><td>Nusadua</td></tr>
                                                    <tr><td>2613</td><td>0361778</td><td>Nusadua</td></tr>
                                                    <tr><td>2614</td><td>0361730</td><td>Seminyakkuta</td></tr>
                                                    <tr><td>2615</td><td>0361731</td><td>Seminyakkuta</td></tr>
                                                    <tr><td>2616</td><td>0361732</td><td>Seminyakkuta</td></tr>
                                                    <tr><td>2617</td><td>0361733</td><td>Seminyakkuta</td></tr>
                                                    <tr><td>2618</td><td>0361734</td><td>Seminyakkuta</td></tr>
                                                    <tr><td>2619</td><td>0361735</td><td>Seminyakkuta</td></tr>
                                                    <tr><td>2620</td><td>0361736</td><td>Seminyakkuta</td></tr>
                                                    <tr><td>2621</td><td>0361739</td><td>Seminyakkuta</td></tr>
                                                    <tr><td>2622</td><td>0361290</td><td>Sukawati</td></tr>
                                                    <tr><td>2623</td><td>0361297</td><td>Sukawati</td></tr>
                                                    <tr><td>2624</td><td>0361298</td><td>Sukawati</td></tr>
                                                    <tr><td>2625</td><td>0361299</td><td>Sukawati</td></tr>
                                                    <tr><td>2626</td><td>036181</td><td>Tabanan</td></tr>
                                                    <tr><td>2627</td><td>0361901</td><td>Tampak Siring</td></tr>
                                                    <tr><td>2628</td><td>036146</td><td>Tohpati</td></tr>
                                                    <tr><td>2629</td><td>036197</td><td>Ubud</td></tr>
                                                    <tr><td>2630</td><td>036141</td><td>Ubung</td></tr>
                                                    <tr><td>2631</td><td>036142</td><td>Ubung</td></tr>
                                                    <tr><td>2632</td><td>0361430</td><td>Ubung</td></tr>
                                                    <tr><td>2633</td><td>0361431</td><td>Ubung</td></tr>
                                                    <tr><td>2634</td><td>0361432</td><td>Ubung</td></tr>
                                                    <tr><td>2635</td><td>0361433</td><td>Ubung</td></tr>
                                                    <tr><td>2636</td><td>0361434</td><td>Ubung</td></tr>
                                                    <tr><td>2637</td><td>0361435</td><td>Ubung</td></tr>
                                                    <tr><td>2638</td><td>0361436</td><td>Ubung</td></tr>
                                                    <tr><td>2639</td><td>0361437</td><td>Ubung</td></tr>
                                                    <tr><td>2640</td><td>036241</td><td>Lovina</td></tr>
                                                    <tr><td>2641</td><td>036242</td><td>Lovina</td></tr>
                                                    <tr><td>2642</td><td>036271</td><td>Pupuan</td></tr>
                                                    <tr><td>2643</td><td>036292</td><td>Seririt</td></tr>
                                                    <tr><td>2644</td><td>036293</td><td>Seririt</td></tr>
                                                    <tr><td>2645</td><td>036294</td><td>Seririt</td></tr>
                                                    <tr><td>2646</td><td>036299</td><td>Seririt</td></tr>
                                                    <tr><td>2647</td><td>0362</td><td>Singaraja</td></tr>
                                                    <tr><td>2648</td><td>03621</td><td>Singaraja</td></tr>
                                                    <tr><td>2649</td><td>03622</td><td>Singaraja</td></tr>
                                                    <tr><td>2650</td><td>036230</td><td>Singaraja</td></tr>
                                                    <tr><td>2651</td><td>036231</td><td>Singaraja</td></tr>
                                                    <tr><td>2652</td><td>0363</td><td>Amlapura</td></tr>
                                                    <tr><td>2653</td><td>03631</td><td>Amlapura</td></tr>
                                                    <tr><td>2654</td><td>036321</td><td>Amlapura</td></tr>
                                                    <tr><td>2655</td><td>036322</td><td>Amlapura</td></tr>
                                                    <tr><td>2656</td><td>036323</td><td>Amlapura</td></tr>
                                                    <tr><td>2657</td><td>036341</td><td>Candidasa</td></tr>
                                                    <tr><td>2658</td><td>036561</td><td>Gilimanuk</td></tr>
                                                    <tr><td>2659</td><td>0365</td><td>Negara</td></tr>
                                                    <tr><td>2660</td><td>03651</td><td>Negara</td></tr>
                                                    <tr><td>2661</td><td>036540</td><td>Negara</td></tr>
                                                    <tr><td>2662</td><td>036541</td><td>Negara</td></tr>
                                                    <tr><td>2663</td><td>036542</td><td>Negara</td></tr>
                                                    <tr><td>2664</td><td>036543</td><td>Negara</td></tr>
                                                    <tr><td>2665</td><td>036549</td><td>Negara</td></tr>
                                                    <tr><td>2666</td><td>036691</td><td>Bangli</td></tr>
                                                    <tr><td>2667</td><td>036692</td><td>Bangli</td></tr>
                                                    <tr><td>2668</td><td>036693</td><td>Bangli</td></tr>
                                                    <tr><td>2669</td><td>036651</td><td>Kintamani</td></tr>
                                                    <tr><td>2670</td><td>036652</td><td>Kintamani</td></tr>
                                                    <tr><td>2671</td><td>0366</td><td>Klungkung</td></tr>
                                                    <tr><td>2672</td><td>03661</td><td>Klungkung</td></tr>
                                                    <tr><td>2673</td><td>036621</td><td>Klungkung</td></tr>
                                                    <tr><td>2674</td><td>036622</td><td>Klungkung</td></tr>
                                                    <tr><td>2675</td><td>036623</td><td>Klungkung</td></tr>
                                                    <tr><td>2676</td><td>036624</td><td>Klungkung</td></tr>
                                                    <tr><td>2677</td><td>036625</td><td>Klungkung</td></tr>
                                                    <tr><td>2678</td><td>036821</td><td>Baturiti</td></tr>
                                                    <tr><td>2679</td><td>036829</td><td>Baturiti</td></tr>
                                                    <tr><td>2680</td><td>0370681</td><td>Gerung</td></tr>
                                                    <tr><td>2681</td><td>0370</td><td>Mataram</td></tr>
                                                    <tr><td>2682</td><td>03701</td><td>Mataram</td></tr>
                                                    <tr><td>2683</td><td>037013</td><td>Mataram</td></tr>
                                                    <tr><td>2684</td><td>037061</td><td>Mataram</td></tr>
                                                    <tr><td>2685</td><td>037062</td><td>Mataram</td></tr>
                                                    <tr><td>2686</td><td>037063</td><td>Mataram</td></tr>
                                                    <tr><td>2687</td><td>037064</td><td>Mataram</td></tr>
                                                    <tr><td>2688</td><td>0370653</td><td>Praya</td></tr>
                                                    <tr><td>2689</td><td>0370654</td><td>Praya</td></tr>
                                                    <tr><td>2690</td><td>0370655</td><td>Praya</td></tr>
                                                    <tr><td>2691</td><td>0370693</td><td>Senggigi</td></tr>
                                                    <tr><td>2692</td><td>0370671</td><td>Sweta</td></tr>
                                                    <tr><td>2693</td><td>0370672</td><td>Sweta</td></tr>
                                                    <tr><td>2694</td><td>0370673</td><td>Sweta</td></tr>
                                                    <tr><td>2695</td><td>0370674</td><td>Sweta</td></tr>
                                                    <tr><td>2696</td><td>0371</td><td>Sumbawa</td></tr>
                                                    <tr><td>2697</td><td>03711</td><td>Sumbawa</td></tr>
                                                    <tr><td>2698</td><td>037121</td><td>Sumbawa</td></tr>
                                                    <tr><td>2699</td><td>037122</td><td>Sumbawa</td></tr>
                                                    <tr><td>2700</td><td>037123</td><td>Sumbawa</td></tr>
                                                    <tr><td>2701</td><td>037124</td><td>Sumbawa</td></tr>
                                                    <tr><td>2702</td><td>0371625</td><td>Sumbawa</td></tr>
                                                    <tr><td>2703</td><td>0371626</td><td>Sumbawa</td></tr>
                                                    <tr><td>2704</td><td>0371627</td><td>Sumbawa</td></tr>
                                                    <tr><td>2705</td><td>0372</td><td>Alas</td></tr>
                                                    <tr><td>2706</td><td>03721</td><td>Alas</td></tr>
                                                    <tr><td>2707</td><td>037291</td><td>Alas</td></tr>
                                                    <tr><td>2708</td><td>037281</td><td>Taliwang</td></tr>
                                                    <tr><td>2709</td><td>0373</td><td>Dompu</td></tr>
                                                    <tr><td>2710</td><td>03731</td><td>Dompu</td></tr>
                                                    <tr><td>2711</td><td>037321</td><td>Dompu</td></tr>
                                                    <tr><td>2712</td><td>037322</td><td>Dompu</td></tr>
                                                    <tr><td>2713</td><td>0373623</td><td>Dompu</td></tr>
                                                    <tr><td>2714</td><td>0374</td><td>Bima</td></tr>
                                                    <tr><td>2715</td><td>03741</td><td>Bima</td></tr>
                                                    <tr><td>2716</td><td>037441</td><td>Bima</td></tr>
                                                    <tr><td>2717</td><td>037442</td><td>Bima</td></tr>
                                                    <tr><td>2718</td><td>037443</td><td>Bima</td></tr>
                                                    <tr><td>2719</td><td>037444</td><td>Bima</td></tr>
                                                    <tr><td>2720</td><td>037445</td><td>Bima</td></tr>
                                                    <tr><td>2721</td><td>0374646</td><td>Bima</td></tr>
                                                    <tr><td>2722</td><td>037471</td><td>Sape</td></tr>
                                                    <tr><td>2723</td><td>037451</td><td>Sila</td></tr>
                                                    <tr><td>2724</td><td>037481</td><td>Tente</td></tr>
                                                    <tr><td>2725</td><td>037635</td><td>Newmont</td></tr>
                                                    <tr><td>2726</td><td>0376</td><td>Selong</td></tr>
                                                    <tr><td>2727</td><td>03761</td><td>Selong</td></tr>
                                                    <tr><td>2728</td><td>037621</td><td>Selong</td></tr>
                                                    <tr><td>2729</td><td>037622</td><td>Selong</td></tr>
                                                    <tr><td>2730</td><td>0377242</td><td>Viqueque</td></tr>
                                                    <tr><td>2731</td><td>03782</td><td>Pantemakasar</td></tr>
                                                    <tr><td>2732</td><td>0379222</td><td>Suai</td></tr>
                                                    <tr><td>2733</td><td>0380871</td><td>Baa</td></tr>
                                                    <tr><td>2734</td><td>0380850</td><td>Camplong</td></tr>
                                                    <tr><td>2735</td><td>0380</td><td>Kupang</td></tr>
                                                    <tr><td>2736</td><td>03801</td><td>Kupang</td></tr>
                                                    <tr><td>2737</td><td>038082</td><td>Kupang</td></tr>
                                                    <tr><td>2738</td><td>038083</td><td>Kupang</td></tr>
                                                    <tr><td>2739</td><td>0380840</td><td>Kupang</td></tr>
                                                    <tr><td>2740</td><td>0380841</td><td>Kupang</td></tr>
                                                    <tr><td>2741</td><td>0380842</td><td>Kupang</td></tr>
                                                    <tr><td>2742</td><td>0380861</td><td>Seba</td></tr>
                                                    <tr><td>2743</td><td>0381</td><td>Ende</td></tr>
                                                    <tr><td>2744</td><td>03811</td><td>Ende</td></tr>
                                                    <tr><td>2745</td><td>038121</td><td>Ende</td></tr>
                                                    <tr><td>2746</td><td>038122</td><td>Ende</td></tr>
                                                    <tr><td>2747</td><td>038123</td><td>Ende</td></tr>
                                                    <tr><td>2748</td><td>038124</td><td>Ende</td></tr>
                                                    <tr><td>2749</td><td>038125</td><td>Ende</td></tr>
                                                    <tr><td>2750</td><td>038141</td><td>Wolowaru</td></tr>
                                                    <tr><td>2751</td><td>0382</td><td>Maumere</td></tr>
                                                    <tr><td>2752</td><td>03821</td><td>Maumere</td></tr>
                                                    <tr><td>2753</td><td>038221</td><td>Maumere</td></tr>
                                                    <tr><td>2754</td><td>038222</td><td>Maumere</td></tr>
                                                    <tr><td>2755</td><td>038223</td><td>Maumere</td></tr>
                                                    <tr><td>2756</td><td>0383</td><td>Larantuka</td></tr>
                                                    <tr><td>2757</td><td>03831</td><td>Larantuka</td></tr>
                                                    <tr><td>2758</td><td>038321</td><td>Larantuka</td></tr>
                                                    <tr><td>2759</td><td>038322</td><td>Larantuka</td></tr>
                                                    <tr><td>2760</td><td>038341</td><td>Lewoleba</td></tr>
                                                    <tr><td>2761</td><td>0384</td><td>Bajawa</td></tr>
                                                    <tr><td>2762</td><td>03841</td><td>Bajawa</td></tr>
                                                    <tr><td>2763</td><td>038421</td><td>Bajawa</td></tr>
                                                    <tr><td>2764</td><td>038541</td><td>Labuhanbajo</td></tr>
                                                    <tr><td>2765</td><td>038561</td><td>Reo</td></tr>
                                                    <tr><td>2766</td><td>0385</td><td>Ruteng</td></tr>
                                                    <tr><td>2767</td><td>03851</td><td>Ruteng</td></tr>
                                                    <tr><td>2768</td><td>038521</td><td>Ruteng</td></tr>
                                                    <tr><td>2769</td><td>038522</td><td>Ruteng</td></tr>
                                                    <tr><td>2770</td><td>038523</td><td>Ruteng</td></tr>
                                                    <tr><td>2771</td><td>0386</td><td>Kalabahi</td></tr>
                                                    <tr><td>2772</td><td>03861</td><td>Kalabahi</td></tr>
                                                    <tr><td>2773</td><td>038621</td><td>Kalabahi</td></tr>
                                                    <tr><td>2774</td><td>038720</td><td>Waikabubak</td></tr>
                                                    <tr><td>2775</td><td>038721</td><td>Waikabubak</td></tr>
                                                    <tr><td>2776</td><td>0387</td><td>Waingapu</td></tr>
                                                    <tr><td>2777</td><td>03871</td><td>Waingapu</td></tr>
                                                    <tr><td>2778</td><td>038761</td><td>Waingapu</td></tr>
                                                    <tr><td>2779</td><td>038762</td><td>Waingapu</td></tr>
                                                    <tr><td>2780</td><td>038763</td><td>Waingapu</td></tr>
                                                    <tr><td>2781</td><td>038831</td><td>Kefamenanu</td></tr>
                                                    <tr><td>2782</td><td>038881</td><td>Niki-Niki</td></tr>
                                                    <tr><td>2783</td><td>0388</td><td>Soe</td></tr>
                                                    <tr><td>2784</td><td>03881</td><td>Soe</td></tr>
                                                    <tr><td>2785</td><td>038821</td><td>Soe</td></tr>
                                                    <tr><td>2786</td><td>038822</td><td>Soe</td></tr>
                                                    <tr><td>2787</td><td>0389</td><td>Atambua</td></tr>
                                                    <tr><td>2788</td><td>03891</td><td>Atambua</td></tr>
                                                    <tr><td>2789</td><td>038921</td><td>Atambua</td></tr>
                                                    <tr><td>2790</td><td>038922</td><td>Atambua</td></tr>
                                                    <tr><td>2791</td><td>039091</td><td>Ailiu</td></tr>
                                                    <tr><td>2792</td><td>039094</td><td>Ainaro</td></tr>
                                                    <tr><td>2793</td><td>0390</td><td>Dili</td></tr>
                                                    <tr><td>2794</td><td>03901</td><td>Dili</td></tr>
                                                    <tr><td>2795</td><td>039031</td><td>Dili</td></tr>
                                                    <tr><td>2796</td><td>0390321</td><td>Dili</td></tr>
                                                    <tr><td>2797</td><td>0390322</td><td>Dili</td></tr>
                                                    <tr><td>2798</td><td>0390323</td><td>Dili</td></tr>
                                                    <tr><td>2799</td><td>0390324</td><td>Dili</td></tr>
                                                    <tr><td>2800</td><td>0390325</td><td>Dili</td></tr>
                                                    <tr><td>2801</td><td>03903692</td><td>Liquisa</td></tr>
                                                    <tr><td>2802</td><td>039093</td><td>Same</td></tr>
                                                    <tr><td>2803</td><td>0394</td><td>Maliana</td></tr>
                                                    <tr><td>2804</td><td>03941</td><td>Maliana</td></tr>
                                                    <tr><td>2805</td><td>039491</td><td>Maliana</td></tr>
                                                    <tr><td>2806</td><td>0395</td><td>Manatuto</td></tr>
                                                    <tr><td>2807</td><td>03951</td><td>Manatuto</td></tr>
                                                    <tr><td>2808</td><td>0395272</td><td>Manatuto</td></tr>
                                                    <tr><td>2809</td><td>0396</td><td>Lospalos</td></tr>
                                                    <tr><td>2810</td><td>03961</td><td>Lospalos</td></tr>
                                                    <tr><td>2811</td><td>039621</td><td>Lospalos</td></tr>
                                                    <tr><td>2812</td><td>0398</td><td>Ermera</td></tr>
                                                    <tr><td>2813</td><td>03981</td><td>Ermera</td></tr>
                                                    <tr><td>2814</td><td>039861</td><td>Ermera</td></tr>
                                                    <tr><td>2815</td><td>0399</td><td>Baucau</td></tr>
                                                    <tr><td>2816</td><td>03991</td><td>Baucau</td></tr>
                                                    <tr><td>2817</td><td>039921</td><td>Baucau</td></tr>
                                                    <tr><td>2818</td><td>0401</td><td>Kendari</td></tr>
                                                    <tr><td>2819</td><td>04011</td><td>Kendari Centrum</td></tr>
                                                    <tr><td>2820</td><td>040132</td><td>Kendari Centrum</td></tr>
                                                    <tr><td>2821</td><td>0401331</td><td>Kendari Centrum</td></tr>
                                                    <tr><td>2822</td><td>0401332</td><td>Kendari Centrum</td></tr>
                                                    <tr><td>2823</td><td>040139</td><td>Mandonga</td></tr>
                                                    <tr><td>2824</td><td>0402</td><td>Baubau</td></tr>
                                                    <tr><td>2825</td><td>04021</td><td>Baubau</td></tr>
                                                    <tr><td>2826</td><td>040221</td><td>Baubau</td></tr>
                                                    <tr><td>2827</td><td>040222</td><td>Baubau</td></tr>
                                                    <tr><td>2828</td><td>040223</td><td>Baubau</td></tr>
                                                    <tr><td>2829</td><td>040224</td><td>Baubau</td></tr>
                                                    <tr><td>2830</td><td>040225</td><td>Baubau</td></tr>
                                                    <tr><td>2831</td><td>040226</td><td>Baubau</td></tr>
                                                    <tr><td>2832</td><td>0403</td><td>Raha</td></tr>
                                                    <tr><td>2833</td><td>04031</td><td>Raha</td></tr>
                                                    <tr><td>2834</td><td>040321</td><td>Raha</td></tr>
                                                    <tr><td>2835</td><td>040322</td><td>Raha</td></tr>
                                                    <tr><td>2836</td><td>040323</td><td>Raha</td></tr>
                                                    <tr><td>2837</td><td>040324</td><td>Raha</td></tr>
                                                    <tr><td>2838</td><td>0404</td><td>Wanci</td></tr>
                                                    <tr><td>2839</td><td>04041</td><td>Wanci</td></tr>
                                                    <tr><td>2840</td><td>040421</td><td>Wanci</td></tr>
                                                    <tr><td>2841</td><td>0405</td><td>Kolaka</td></tr>
                                                    <tr><td>2842</td><td>04051</td><td>Kolaka</td></tr>
                                                    <tr><td>2843</td><td>040521</td><td>Kolaka</td></tr>
                                                    <tr><td>2844</td><td>040522</td><td>Kolaka</td></tr>
                                                    <tr><td>2845</td><td>040531</td><td>Pomalaa</td></tr>
                                                    <tr><td>2846</td><td>0408</td><td>Unaaha</td></tr>
                                                    <tr><td>2847</td><td>04081</td><td>Unaaha</td></tr>
                                                    <tr><td>2848</td><td>040821</td><td>Unaaha</td></tr>
                                                    <tr><td>2849</td><td>040822</td><td>Unaaha</td></tr>
                                                    <tr><td>2850</td><td>040823</td><td>Unaaha</td></tr>
                                                    <tr><td>2851</td><td>0410</td><td>Pangkep</td></tr>
                                                    <tr><td>2852</td><td>04101</td><td>Pangkep</td></tr>
                                                    <tr><td>2853</td><td>041021</td><td>Pangkep</td></tr>
                                                    <tr><td>2854</td><td>041022</td><td>Pangkep</td></tr>
                                                    <tr><td>2855</td><td>041031</td><td>Tonasa</td></tr>
                                                    <tr><td>2856</td><td>0411491</td><td>Antang</td></tr>
                                                    <tr><td>2857</td><td>0411492</td><td>Antang</td></tr>
                                                    <tr><td>2858</td><td>0411493</td><td>Antang</td></tr>
                                                    <tr><td>2859</td><td>0411494</td><td>Antang</td></tr>
                                                    <tr><td>2860</td><td>0411495</td><td>Antang</td></tr>
                                                    <tr><td>2861</td><td>0411496</td><td>Antang</td></tr>
                                                    <tr><td>2862</td><td>04111</td><td>Makassar - Balaikota</td></tr>
                                                    <tr><td>2863</td><td>041113</td><td>Makassar - Balaikota</td></tr>
                                                    <tr><td>2864</td><td>041122</td><td>Makassar - Balaikota</td></tr>
                                                    <tr><td>2865</td><td>041131</td><td>Makassar - Balaikota</td></tr>
                                                    <tr><td>2866</td><td>041132</td><td>Makassar - Balaikota</td></tr>
                                                    <tr><td>2867</td><td>041133</td><td>Makassar - Balaikota</td></tr>
                                                    <tr><td>2868</td><td>041134</td><td>Makassar - Balaikota</td></tr>
                                                    <tr><td>2869</td><td>04112011</td><td>Makassar - Balaikota</td></tr>
                                                    <tr><td>2870</td><td>04112012</td><td>Makassar - Balaikota</td></tr>
                                                    <tr><td>2871</td><td>04112727</td><td>Makassar - Balaikota</td></tr>
                                                    <tr><td>2872</td><td>041151</td><td>Makassar - Kima</td></tr>
                                                    <tr><td>2873</td><td>0411370</td><td>Maros</td></tr>
                                                    <tr><td>2874</td><td>0411371</td><td>Maros</td></tr>
                                                    <tr><td>2875</td><td>0411372</td><td>Maros</td></tr>
                                                    <tr><td>2876</td><td>041183</td><td>Matoangin</td></tr>
                                                    <tr><td>2877</td><td>041185</td><td>Matoangin</td></tr>
                                                    <tr><td>2878</td><td>041187</td><td>Matoangin</td></tr>
                                                    <tr><td>2879</td><td>041142</td><td>Panakukang</td></tr>
                                                    <tr><td>2880</td><td>041143</td><td>Panakukang</td></tr>
                                                    <tr><td>2881</td><td>041144</td><td>Panakukang</td></tr>
                                                    <tr><td>2882</td><td>041145</td><td>Panakukang</td></tr>
                                                    <tr><td>2883</td><td>041155</td><td>Sudiang</td></tr>
                                                    <tr><td>2884</td><td>041184</td><td>Sungguminasa</td></tr>
                                                    <tr><td>2885</td><td>041186</td><td>Sungguminasa</td></tr>
                                                    <tr><td>2886</td><td>041188</td><td>Sungguminasa</td></tr>
                                                    <tr><td>2887</td><td>041158</td><td>Tamalanrea</td></tr>
                                                    <tr><td>2888</td><td>0411</td><td>Ujungpandang</td></tr>
                                                    <tr><td>2889</td><td>041321</td><td>Bantaeng</td></tr>
                                                    <tr><td>2890</td><td>041322</td><td>Bantaeng</td></tr>
                                                    <tr><td>2891</td><td>0413</td><td>Bulukumba</td></tr>
                                                    <tr><td>2892</td><td>04131</td><td>Bulukumba</td></tr>
                                                    <tr><td>2893</td><td>041381</td><td>Bulukumba</td></tr>
                                                    <tr><td>2894</td><td>041382</td><td>Bulukumba</td></tr>
                                                    <tr><td>2895</td><td>041383</td><td>Bulukumba</td></tr>
                                                    <tr><td>2896</td><td>0414</td><td>Selayar</td></tr>
                                                    <tr><td>2897</td><td>04141</td><td>Selayar</td></tr>
                                                    <tr><td>2898</td><td>041421</td><td>Selayar</td></tr>
                                                    <tr><td>2899</td><td>0417</td><td>Malino</td></tr>
                                                    <tr><td>2900</td><td>04171</td><td>Malino</td></tr>
                                                    <tr><td>2901</td><td>041721</td><td>Malino</td></tr>
                                                    <tr><td>2902</td><td>0418</td><td>Takalar</td></tr>
                                                    <tr><td>2903</td><td>04181</td><td>Takalar</td></tr>
                                                    <tr><td>2904</td><td>041821</td><td>Takalar</td></tr>
                                                    <tr><td>2905</td><td>041822</td><td>Takalar</td></tr>
                                                    <tr><td>2906</td><td>0419</td><td>Jeneponto</td></tr>
                                                    <tr><td>2907</td><td>04191</td><td>Jeneponto</td></tr>
                                                    <tr><td>2908</td><td>041921</td><td>Jeneponto</td></tr>
                                                    <tr><td>2909</td><td>041922</td><td>Jeneponto</td></tr>
                                                    <tr><td>2910</td><td>041923</td><td>Jeneponto</td></tr>
                                                    <tr><td>2911</td><td>0420</td><td>Enrekang</td></tr>
                                                    <tr><td>2912</td><td>04201</td><td>Enrekang</td></tr>
                                                    <tr><td>2913</td><td>042021</td><td>Enrekang</td></tr>
                                                    <tr><td>2914</td><td>0421</td><td>Parepare</td></tr>
                                                    <tr><td>2915</td><td>04211</td><td>Parepare</td></tr>
                                                    <tr><td>2916</td><td>042121</td><td>Parepare</td></tr>
                                                    <tr><td>2917</td><td>042122</td><td>Parepare</td></tr>
                                                    <tr><td>2918</td><td>042123</td><td>Parepare</td></tr>
                                                    <tr><td>2919</td><td>042124</td><td>Parepare</td></tr>
                                                    <tr><td>2920</td><td>042125</td><td>Parepare</td></tr>
                                                    <tr><td>2921</td><td>042126</td><td>Parepare</td></tr>
                                                    <tr><td>2922</td><td>042127</td><td>Parepare</td></tr>
                                                    <tr><td>2923</td><td>0421921</td><td>Pinrang</td></tr>
                                                    <tr><td>2924</td><td>0421922</td><td>Pinrang</td></tr>
                                                    <tr><td>2925</td><td>0421923</td><td>Pinrang</td></tr>
                                                    <tr><td>2926</td><td>042193</td><td>Rappang</td></tr>
                                                    <tr><td>2927</td><td>042194</td><td>Rappang</td></tr>
                                                    <tr><td>2928</td><td>042195</td><td>Rappang</td></tr>
                                                    <tr><td>2929</td><td>042190</td><td>Sidrap</td></tr>
                                                    <tr><td>2930</td><td>042191</td><td>Sidrap</td></tr>
                                                    <tr><td>2931</td><td>042196</td><td>Sidrap</td></tr>
                                                    <tr><td>2932</td><td>0422</td><td>Majene</td></tr>
                                                    <tr><td>2933</td><td>04221</td><td>Majene</td></tr>
                                                    <tr><td>2934</td><td>042221</td><td>Majene</td></tr>
                                                    <tr><td>2935</td><td>042222</td><td>Majene</td></tr>
                                                    <tr><td>2936</td><td>042322</td><td>Makale</td></tr>
                                                    <tr><td>2937</td><td>042324</td><td>Makale</td></tr>
                                                    <tr><td>2938</td><td>0423</td><td>Rantepao</td></tr>
                                                    <tr><td>2939</td><td>04231</td><td>Rantepao</td></tr>
                                                    <tr><td>2940</td><td>042321</td><td>Rantepao</td></tr>
                                                    <tr><td>2941</td><td>042323</td><td>Rantepao</td></tr>
                                                    <tr><td>2942</td><td>042325</td><td>Rantepao</td></tr>
                                                    <tr><td>2943</td><td>042327</td><td>Rantepao</td></tr>
                                                    <tr><td>2944</td><td>0426</td><td>Mamuju</td></tr>
                                                    <tr><td>2945</td><td>04261</td><td>Mamuju</td></tr>
                                                    <tr><td>2946</td><td>042621</td><td>Mamuju</td></tr>
                                                    <tr><td>2947</td><td>042622</td><td>Mamuju</td></tr>
                                                    <tr><td>2948</td><td>0427</td><td>Barru</td></tr>
                                                    <tr><td>2949</td><td>04271</td><td>Barru</td></tr>
                                                    <tr><td>2950</td><td>042721</td><td>Barru</td></tr>
                                                    <tr><td>2951</td><td>0427321</td><td>Barru</td></tr>
                                                    <tr><td>2952</td><td>0427322</td><td>Barru</td></tr>
                                                    <tr><td>2953</td><td>0427323</td><td>Barru</td></tr>
                                                    <tr><td>2954</td><td>0428</td><td>Polewali</td></tr>
                                                    <tr><td>2955</td><td>04281</td><td>Polewali</td></tr>
                                                    <tr><td>2956</td><td>042821</td><td>Polewali</td></tr>
                                                    <tr><td>2957</td><td>042822</td><td>Polewali</td></tr>
                                                    <tr><td>2958</td><td>042851</td><td>Wonomulyo</td></tr>
                                                    <tr><td>2959</td><td>0430</td><td>Amurang</td></tr>
                                                    <tr><td>2960</td><td>04301</td><td>Amurang</td></tr>
                                                    <tr><td>2961</td><td>043021</td><td>Amurang</td></tr>
                                                    <tr><td>2962</td><td>043022</td><td>Amurang</td></tr>
                                                    <tr><td>2963</td><td>0431891</td><td>Airmadidi</td></tr>
                                                    <tr><td>2964</td><td>0431892</td><td>Airmadidi</td></tr>
                                                    <tr><td>2965</td><td>0431371</td><td>Langoan</td></tr>
                                                    <tr><td>2966</td><td>0431372</td><td>Langoan</td></tr>
                                                    <tr><td>2967</td><td>0431373</td><td>Langoan</td></tr>
                                                    <tr><td>2968</td><td>0431</td><td>Manado</td></tr>
                                                    <tr><td>2969</td><td>04311</td><td>Manado</td></tr>
                                                    <tr><td>2970</td><td>043113</td><td>Manado</td></tr>
                                                    <tr><td>2971</td><td>043184</td><td>Manado</td></tr>
                                                    <tr><td>2972</td><td>043185</td><td>Manado</td></tr>
                                                    <tr><td>2973</td><td>043186</td><td>Manado</td></tr>
                                                    <tr><td>2974</td><td>043187</td><td>Manado</td></tr>
                                                    <tr><td>2975</td><td>0431821</td><td>Mojokerto - Kleak</td></tr>
                                                    <tr><td>2976</td><td>0431822</td><td>Mojokerto - Kleak</td></tr>
                                                    <tr><td>2977</td><td>0431823</td><td>Mojokerto - Kleak</td></tr>
                                                    <tr><td>2978</td><td>0431824</td><td>Mojokerto - Kleak</td></tr>
                                                    <tr><td>2979</td><td>0431825</td><td>Mojokerto - Kleak</td></tr>
                                                    <tr><td>2980</td><td>0431826</td><td>Mojokerto - Kleak</td></tr>
                                                    <tr><td>2981</td><td>0431827</td><td>Mojokerto - Kleak</td></tr>
                                                    <tr><td>2982</td><td>0431811</td><td>Mojokerto - Paniki</td></tr>
                                                    <tr><td>2983</td><td>0431812</td><td>Mojokerto - Paniki</td></tr>
                                                    <tr><td>2984</td><td>0431813</td><td>Mojokerto - Paniki</td></tr>
                                                    <tr><td>2985</td><td>043135</td><td>Tomohon</td></tr>
                                                    <tr><td>2986</td><td>0431321</td><td>Tondano</td></tr>
                                                    <tr><td>2987</td><td>0431322</td><td>Tondano</td></tr>
                                                    <tr><td>2988</td><td>0431323</td><td>Tondano</td></tr>
                                                    <tr><td>2989</td><td>0432</td><td>Tahuna</td></tr>
                                                    <tr><td>2990</td><td>04321</td><td>Tahuna</td></tr>
                                                    <tr><td>2991</td><td>043221</td><td>Tahuna</td></tr>
                                                    <tr><td>2992</td><td>043222</td><td>Tahuna</td></tr>
                                                    <tr><td>2993</td><td>0434</td><td>Kotamobagu</td></tr>
                                                    <tr><td>2994</td><td>04341</td><td>Kotamobagu</td></tr>
                                                    <tr><td>2995</td><td>043421</td><td>Kotamobagu</td></tr>
                                                    <tr><td>2996</td><td>043422</td><td>Kotamobagu</td></tr>
                                                    <tr><td>2997</td><td>043423</td><td>Kotamobagu</td></tr>
                                                    <tr><td>2998</td><td>043424</td><td>Kotamobagu</td></tr>
                                                    <tr><td>2999</td><td>0435</td><td>Gorontalo</td></tr>
                                                    <tr><td>3000</td><td>04351</td><td>Gorontalo</td></tr>
                                                    <tr><td>3001</td><td>043521</td><td>Gorontalo</td></tr>
                                                    <tr><td>3002</td><td>043522</td><td>Gorontalo</td></tr>
                                                    <tr><td>3003</td><td>043523</td><td>Gorontalo</td></tr>
                                                    <tr><td>3004</td><td>043524</td><td>Gorontalo</td></tr>
                                                    <tr><td>3005</td><td>043525</td><td>Gorontalo</td></tr>
                                                    <tr><td>3006</td><td>043526</td><td>Gorontalo</td></tr>
                                                    <tr><td>3007</td><td>043527</td><td>Gorontalo</td></tr>
                                                    <tr><td>3008</td><td>0435821</td><td>Gorontalo</td></tr>
                                                    <tr><td>3009</td><td>0435822</td><td>Gorontalo</td></tr>
                                                    <tr><td>3010</td><td>0435823</td><td>Gorontalo</td></tr>
                                                    <tr><td>3011</td><td>0435824</td><td>Gorontalo</td></tr>
                                                    <tr><td>3012</td><td>0435825</td><td>Gorontalo</td></tr>
                                                    <tr><td>3013</td><td>0435826</td><td>Gorontalo</td></tr>
                                                    <tr><td>3014</td><td>0435827</td><td>Gorontalo</td></tr>
                                                    <tr><td>3015</td><td>0435828</td><td>Gorontalo</td></tr>
                                                    <tr><td>3016</td><td>0435829</td><td>Gorontalo</td></tr>
                                                    <tr><td>3017</td><td>0435830</td><td>Gorontalo</td></tr>
                                                    <tr><td>3018</td><td>0435831</td><td>Gorontalo</td></tr>
                                                    <tr><td>3019</td><td>0435890</td><td>Isimu</td></tr>
                                                    <tr><td>3020</td><td>043580</td><td>Limboto</td></tr>
                                                    <tr><td>3021</td><td>043581</td><td>Limboto</td></tr>
                                                    <tr><td>3022</td><td>0435880</td><td>Limboto</td></tr>
                                                    <tr><td>3023</td><td>0435881</td><td>Limboto</td></tr>
                                                    <tr><td>3024</td><td>0438</td><td>Bitung</td></tr>
                                                    <tr><td>3025</td><td>04381</td><td>Bitung</td></tr>
                                                    <tr><td>3026</td><td>043821</td><td>Bitung</td></tr>
                                                    <tr><td>3027</td><td>043830</td><td>Bitung</td></tr>
                                                    <tr><td>3028</td><td>043831</td><td>Bitung</td></tr>
                                                    <tr><td>3029</td><td>043832</td><td>Bitung</td></tr>
                                                    <tr><td>3030</td><td>043833</td><td>Bitung</td></tr>
                                                    <tr><td>3031</td><td>043834</td><td>Bitung</td></tr>
                                                    <tr><td>3032</td><td>043851</td><td>Kaudita</td></tr>
                                                    <tr><td>3033</td><td>043852</td><td>Kauditan</td></tr>
                                                    <tr><td>3034</td><td>0443</td><td>Marisa</td></tr>
                                                    <tr><td>3035</td><td>04431</td><td>Marisa</td></tr>
                                                    <tr><td>3036</td><td>044321</td><td>Marisa</td></tr>
                                                    <tr><td>3037</td><td>0450</td><td>Parigi</td></tr>
                                                    <tr><td>3038</td><td>04501</td><td>Parigi</td></tr>
                                                    <tr><td>3039</td><td>045021</td><td>Parigi</td></tr>
                                                    <tr><td>3040</td><td>0451481</td><td>Birobuli</td></tr>
                                                    <tr><td>3041</td><td>0451482</td><td>Birobuli</td></tr>
                                                    <tr><td>3042</td><td>0451483</td><td>Birobuli</td></tr>
                                                    <tr><td>3043</td><td>0451484</td><td>Birobuli</td></tr>
                                                    <tr><td>3044</td><td>0451485</td><td>Birobuli</td></tr>
                                                    <tr><td>3045</td><td>0451486</td><td>Birobuli</td></tr>
                                                    <tr><td>3046</td><td>0451487</td><td>Birobuli</td></tr>
                                                    <tr><td>3047</td><td>0451811</td><td>Kulawi</td></tr>
                                                    <tr><td>3048</td><td>0451</td><td>Palu</td></tr>
                                                    <tr><td>3049</td><td>04511</td><td>Palu</td></tr>
                                                    <tr><td>3050</td><td>045113</td><td>Palu</td></tr>
                                                    <tr><td>3051</td><td>045145</td><td>Palu</td></tr>
                                                    <tr><td>3052</td><td>0451411</td><td>Palu</td></tr>
                                                    <tr><td>3053</td><td>0451422</td><td>Palu</td></tr>
                                                    <tr><td>3054</td><td>0451423</td><td>Palu</td></tr>
                                                    <tr><td>3055</td><td>0451424</td><td>Palu</td></tr>
                                                    <tr><td>3056</td><td>0451425</td><td>Palu</td></tr>
                                                    <tr><td>3057</td><td>0451426</td><td>Palu</td></tr>
                                                    <tr><td>3058</td><td>0451427</td><td>Palu</td></tr>
                                                    <tr><td>3059</td><td>0451428</td><td>Palu</td></tr>
                                                    <tr><td>3060</td><td>0451429</td><td>Palu</td></tr>
                                                    <tr><td>3061</td><td>0451491</td><td>Tawaeli</td></tr>
                                                    <tr><td>3062</td><td>0451492</td><td>Tawaeli</td></tr>
                                                    <tr><td>3063</td><td>0452</td><td>Poso</td></tr>
                                                    <tr><td>3064</td><td>04521</td><td>Poso</td></tr>
                                                    <tr><td>3065</td><td>045221</td><td>Poso</td></tr>
                                                    <tr><td>3066</td><td>045222</td><td>Poso</td></tr>
                                                    <tr><td>3067</td><td>045223</td><td>Poso</td></tr>
                                                    <tr><td>3068</td><td>045224</td><td>Poso</td></tr>
                                                    <tr><td>3069</td><td>0452324</td><td>Poso</td></tr>
                                                    <tr><td>3070</td><td>0452325</td><td>Poso</td></tr>
                                                    <tr><td>3071</td><td>0453</td><td>Tolitoli</td></tr>
                                                    <tr><td>3072</td><td>04531</td><td>Tolitoli</td></tr>
                                                    <tr><td>3073</td><td>045321</td><td>Tolitoli</td></tr>
                                                    <tr><td>3074</td><td>045322</td><td>Tolitoli</td></tr>
                                                    <tr><td>3075</td><td>045323</td><td>Tolitoli</td></tr>
                                                    <tr><td>3076</td><td>0457</td><td>Donggala</td></tr>
                                                    <tr><td>3077</td><td>04571</td><td>Donggala</td></tr>
                                                    <tr><td>3078</td><td>045771</td><td>Donggala</td></tr>
                                                    <tr><td>3079</td><td>0458</td><td>Tentena</td></tr>
                                                    <tr><td>3080</td><td>04581</td><td>Tentena</td></tr>
                                                    <tr><td>3081</td><td>045821</td><td>Tentena</td></tr>
                                                    <tr><td>3082</td><td>0461</td><td>Luwuk</td></tr>
                                                    <tr><td>3083</td><td>04611</td><td>Luwuk</td></tr>
                                                    <tr><td>3084</td><td>046121</td><td>Luwuk</td></tr>
                                                    <tr><td>3085</td><td>046122</td><td>Luwuk</td></tr>
                                                    <tr><td>3086</td><td>046123</td><td>Luwuk</td></tr>
                                                    <tr><td>3087</td><td>0461324</td><td>Luwuk</td></tr>
                                                    <tr><td>3088</td><td>0461325</td><td>Luwuk</td></tr>
                                                    <tr><td>3089</td><td>0462</td><td>Banggai</td></tr>
                                                    <tr><td>3090</td><td>04621</td><td>Banggai</td></tr>
                                                    <tr><td>3091</td><td>046221</td><td>Banggai</td></tr>
                                                    <tr><td>3092</td><td>0463</td><td>Bunta</td></tr>
                                                    <tr><td>3093</td><td>04631</td><td>Bunta</td></tr>
                                                    <tr><td>3094</td><td>046321</td><td>Bunta</td></tr>
                                                    <tr><td>3095</td><td>0464</td><td>Ampana</td></tr>
                                                    <tr><td>3096</td><td>04641</td><td>Ampana</td></tr>
                                                    <tr><td>3097</td><td>046421</td><td>Ampana</td></tr>
                                                    <tr><td>3098</td><td>0465</td><td>Kolonedale</td></tr>
                                                    <tr><td>3099</td><td>04651</td><td>Kolonedale</td></tr>
                                                    <tr><td>3100</td><td>046521</td><td>Kolonedale</td></tr>
                                                    <tr><td>3101</td><td>0471</td><td>Palopo</td></tr>
                                                    <tr><td>3102</td><td>04711</td><td>Palopo</td></tr>
                                                    <tr><td>3103</td><td>047121</td><td>Palopo</td></tr>
                                                    <tr><td>3104</td><td>047122</td><td>Palopo</td></tr>
                                                    <tr><td>3105</td><td>047123</td><td>Palopo</td></tr>
                                                    <tr><td>3106</td><td>047124</td><td>Palopo</td></tr>
                                                    <tr><td>3107</td><td>0471325</td><td>Palopo</td></tr>
                                                    <tr><td>3108</td><td>0471326</td><td>Palopo</td></tr>
                                                    <tr><td>3109</td><td>0471327</td><td>Palopo</td></tr>
                                                    <tr><td>3110</td><td>0473</td><td>Masamba</td></tr>
                                                    <tr><td>3111</td><td>04731</td><td>Masamba</td></tr>
                                                    <tr><td>3112</td><td>047321</td><td>Masamba</td></tr>
                                                    <tr><td>3113</td><td>0481</td><td>Watampone</td></tr>
                                                    <tr><td>3114</td><td>04811</td><td>Watampone</td></tr>
                                                    <tr><td>3115</td><td>048121</td><td>Watampone</td></tr>
                                                    <tr><td>3116</td><td>048122</td><td>Watampone</td></tr>
                                                    <tr><td>3117</td><td>048123</td><td>Watampone</td></tr>
                                                    <tr><td>3118</td><td>048124</td><td>Watampone</td></tr>
                                                    <tr><td>3119</td><td>048125</td><td>Watampone</td></tr>
                                                    <tr><td>3120</td><td>048126</td><td>Watampone</td></tr>
                                                    <tr><td>3121</td><td>0482</td><td>Sinjai</td></tr>
                                                    <tr><td>3122</td><td>04821</td><td>Sinjai</td></tr>
                                                    <tr><td>3123</td><td>048221</td><td>Sinjai</td></tr>
                                                    <tr><td>3124</td><td>048222</td><td>Sinjai</td></tr>
                                                    <tr><td>3125</td><td>0484421</td><td>Cangadi</td></tr>
                                                    <tr><td>3126</td><td>0484</td><td>Watansoppeng</td></tr>
                                                    <tr><td>3127</td><td>04841</td><td>Watansoppeng</td></tr>
                                                    <tr><td>3128</td><td>048421</td><td>Watansoppeng</td></tr>
                                                    <tr><td>3129</td><td>048423</td><td>Watansoppeng</td></tr>
                                                    <tr><td>3130</td><td>0485</td><td>Sengkang</td></tr>
                                                    <tr><td>3131</td><td>04851</td><td>Sengkang</td></tr>
                                                    <tr><td>3132</td><td>048521</td><td>Sengkang</td></tr>
                                                    <tr><td>3133</td><td>048522</td><td>Sengkang</td></tr>
                                                    <tr><td>3134</td><td>0485322</td><td>Sengkang</td></tr>
                                                    <tr><td>3135</td><td>0485323</td><td>Sengkang</td></tr>
                                                    <tr><td>3136</td><td>0485324</td><td>Sengkang</td></tr>
                                                    <tr><td>3137</td><td>0511227</td><td>Aluh-Aluh</td></tr>
                                                    <tr><td>3138</td><td>0511229</td><td>Aluh-Aluh</td></tr>
                                                    <tr><td>3139</td><td>051192</td><td>Banjarbaru</td></tr>
                                                    <tr><td>3140</td><td>051193</td><td>Banjarbaru</td></tr>
                                                    <tr><td>3141</td><td>051194</td><td>Banjarbaru</td></tr>
                                                    <tr><td>3142</td><td>051197</td><td>Banjarbaru</td></tr>
                                                    <tr><td>3143</td><td>051198</td><td>Banjarbaru</td></tr>
                                                    <tr><td>3144</td><td>051199</td><td>Banjarbaru</td></tr>
                                                    <tr><td>3145</td><td>0511780</td><td>Banjarbaru</td></tr>
                                                    <tr><td>3146</td><td>0511781</td><td>Banjarbaru</td></tr>
                                                    <tr><td>3147</td><td>0511782</td><td>Banjarbaru</td></tr>
                                                    <tr><td>3148</td><td>0511783</td><td>Banjarbaru</td></tr>
                                                    <tr><td>3149</td><td>0511784</td><td>Banjarbaru</td></tr>
                                                    <tr><td>3150</td><td>0511785</td><td>Banjarbaru</td></tr>
                                                    <tr><td>3151</td><td>0511</td><td>Banjarmasin</td></tr>
                                                    <tr><td>3152</td><td>05111</td><td>Banjarmasin</td></tr>
                                                    <tr><td>3153</td><td>051113</td><td>Banjarmasin</td></tr>
                                                    <tr><td>3154</td><td>051121</td><td>Banjarmasin</td></tr>
                                                    <tr><td>3155</td><td>051136</td><td>Banjarmasin</td></tr>
                                                    <tr><td>3156</td><td>051141</td><td>Banjarmasin</td></tr>
                                                    <tr><td>3157</td><td>051150</td><td>Banjarmasin</td></tr>
                                                    <tr><td>3158</td><td>051151</td><td>Banjarmasin</td></tr>
                                                    <tr><td>3159</td><td>051152</td><td>Banjarmasin</td></tr>
                                                    <tr><td>3160</td><td>051153</td><td>Banjarmasin</td></tr>
                                                    <tr><td>3161</td><td>051154</td><td>Banjarmasin</td></tr>
                                                    <tr><td>3162</td><td>051155</td><td>Banjarmasin</td></tr>
                                                    <tr><td>3163</td><td>051156</td><td>Banjarmasin</td></tr>
                                                    <tr><td>3164</td><td>051157</td><td>Banjarmasin</td></tr>
                                                    <tr><td>3165</td><td>051158</td><td>Banjarmasin</td></tr>
                                                    <tr><td>3166</td><td>051159</td><td>Banjarmasin</td></tr>
                                                    <tr><td>3167</td><td>051163</td><td>Banjarmasin</td></tr>
                                                    <tr><td>3168</td><td>051164</td><td>Banjarmasin</td></tr>
                                                    <tr><td>3169</td><td>051165</td><td>Banjarmasin</td></tr>
                                                    <tr><td>3170</td><td>051166</td><td>Banjarmasin</td></tr>
                                                    <tr><td>3171</td><td>051167</td><td>Banjarmasin</td></tr>
                                                    <tr><td>3172</td><td>051168</td><td>Banjarmasin</td></tr>
                                                    <tr><td>3173</td><td>051169</td><td>Banjarmasin</td></tr>
                                                    <tr><td>3174</td><td>05112990</td><td>Banjarmasin</td></tr>
                                                    <tr><td>3175</td><td>0511220</td><td>Gambut</td></tr>
                                                    <tr><td>3176</td><td>051130</td><td>Kayutan</td></tr>
                                                    <tr><td>3177</td><td>051195</td><td>Landasan Ulin</td></tr>
                                                    <tr><td>3178</td><td>0511706</td><td>Landasan Ulin</td></tr>
                                                    <tr><td>3179</td><td>051179</td><td>Marabahan</td></tr>
                                                    <tr><td>3180</td><td>051190</td><td>Martapura</td></tr>
                                                    <tr><td>3181</td><td>051191</td><td>Martapura</td></tr>
                                                    <tr><td>3182</td><td>0511722</td><td>Martapura</td></tr>
                                                    <tr><td>3183</td><td>051120</td><td>Ulin</td></tr>
                                                    <tr><td>3184</td><td>051125</td><td>Ulin</td></tr>
                                                    <tr><td>3185</td><td>051126</td><td>Ulin</td></tr>
                                                    <tr><td>3186</td><td>051127</td><td>Ulin</td></tr>
                                                    <tr><td>3187</td><td>051221</td><td>Pleihari</td></tr>
                                                    <tr><td>3188</td><td>051222</td><td>Pleihari</td></tr>
                                                    <tr><td>3189</td><td>051261</td><td>Satui</td></tr>
                                                    <tr><td>3190</td><td>051229</td><td>Takisung</td></tr>
                                                    <tr><td>3191</td><td>0513</td><td>Kualakapuas</td></tr>
                                                    <tr><td>3192</td><td>05131</td><td>Kualakapuas</td></tr>
                                                    <tr><td>3193</td><td>051321</td><td>Kualakapuas</td></tr>
                                                    <tr><td>3194</td><td>051322</td><td>Kualakapuas</td></tr>
                                                    <tr><td>3195</td><td>051323</td><td>Kualakapuas</td></tr>
                                                    <tr><td>3196</td><td>051324</td><td>Kualakapuas</td></tr>
                                                    <tr><td>3197</td><td>051361</td><td>Pulangpisau</td></tr>
                                                    <tr><td>3198</td><td>051741</td><td>Barabai</td></tr>
                                                    <tr><td>3199</td><td>051742</td><td>Barabai</td></tr>
                                                    <tr><td>3200</td><td>051743</td><td>Barabai</td></tr>
                                                    <tr><td>3201</td><td>051736</td><td>Binuang</td></tr>
                                                    <tr><td>3202</td><td>0517</td><td>Kandangan</td></tr>
                                                    <tr><td>3203</td><td>05171</td><td>Kandangan</td></tr>
                                                    <tr><td>3204</td><td>051721</td><td>Kandangan</td></tr>
                                                    <tr><td>3205</td><td>051722</td><td>Kandangan</td></tr>
                                                    <tr><td>3206</td><td>051723</td><td>Kandangan</td></tr>
                                                    <tr><td>3207</td><td>051751</td><td>Negara Kalsel</td></tr>
                                                    <tr><td>3208</td><td>051731</td><td>Rantau</td></tr>
                                                    <tr><td>3209</td><td>051732</td><td>Rantau</td></tr>
                                                    <tr><td>3210</td><td>051733</td><td>Rantau</td></tr>
                                                    <tr><td>3211</td><td>051870</td><td>Batulicin</td></tr>
                                                    <tr><td>3212</td><td>051871</td><td>Batulicin</td></tr>
                                                    <tr><td>3213</td><td>0518</td><td>Kotabarupulaulaut</td></tr>
                                                    <tr><td>3214</td><td>05181</td><td>Kotabarupulaulaut</td></tr>
                                                    <tr><td>3215</td><td>051820</td><td>Kotabarupulaulaut</td></tr>
                                                    <tr><td>3216</td><td>051821</td><td>Kotabarupulaulaut</td></tr>
                                                    <tr><td>3217</td><td>051822</td><td>Kotabarupulaulaut</td></tr>
                                                    <tr><td>3218</td><td>051823</td><td>Kotabarupulaulaut</td></tr>
                                                    <tr><td>3219</td><td>051824</td><td>Kotabarupulaulaut</td></tr>
                                                    <tr><td>3220</td><td>051838</td><td>Pagatan</td></tr>
                                                    <tr><td>3221</td><td>051861</td><td>Tarjun</td></tr>
                                                    <tr><td>3222</td><td>051921</td><td>Muarateweh</td></tr>
                                                    <tr><td>3223</td><td>051922</td><td>Muarateweh</td></tr>
                                                    <tr><td>3224</td><td>051923</td><td>Muarateweh</td></tr>
                                                    <tr><td>3225</td><td>052231</td><td>Ampah</td></tr>
                                                    <tr><td>3226</td><td>0525</td><td>Buntok</td></tr>
                                                    <tr><td>3227</td><td>05251</td><td>Buntok</td></tr>
                                                    <tr><td>3228</td><td>052521</td><td>Buntok</td></tr>
                                                    <tr><td>3229</td><td>052522</td><td>Buntok</td></tr>
                                                    <tr><td>3230</td><td>052691</td><td>Tamianglayang</td></tr>
                                                    <tr><td>3231</td><td>0526</td><td>Tanjungtabalong</td></tr>
                                                    <tr><td>3232</td><td>05261</td><td>Tanjungtabalong</td></tr>
                                                    <tr><td>3233</td><td>052621</td><td>Tanjungtabalong</td></tr>
                                                    <tr><td>3234</td><td>052622</td><td>Tanjungtabalong</td></tr>
                                                    <tr><td>3235</td><td>052623</td><td>Tanjungtabalong</td></tr>
                                                    <tr><td>3236</td><td>052761</td><td>Amuntai</td></tr>
                                                    <tr><td>3237</td><td>052762</td><td>Amuntai</td></tr>
                                                    <tr><td>3238</td><td>052763</td><td>Amuntai</td></tr>
                                                    <tr><td>3239</td><td>052831</td><td>Purukcahu</td></tr>
                                                    <tr><td>3240</td><td>0531</td><td>Sampit</td></tr>
                                                    <tr><td>3241</td><td>05311</td><td>Sampit</td></tr>
                                                    <tr><td>3242</td><td>053121</td><td>Sampit</td></tr>
                                                    <tr><td>3243</td><td>053122</td><td>Sampit</td></tr>
                                                    <tr><td>3244</td><td>053123</td><td>Sampit</td></tr>
                                                    <tr><td>3245</td><td>053124</td><td>Sampit</td></tr>
                                                    <tr><td>3246</td><td>053125</td><td>Sampit</td></tr>
                                                    <tr><td>3247</td><td>053126</td><td>Sampit</td></tr>
                                                    <tr><td>3248</td><td>053127</td><td>Sampit</td></tr>
                                                    <tr><td>3249</td><td>053130</td><td>Sampit</td></tr>
                                                    <tr><td>3250</td><td>053131</td><td>Sampit</td></tr>
                                                    <tr><td>3251</td><td>053132</td><td>Sampit</td></tr>
                                                    <tr><td>3252</td><td>053261</td><td>Kumai</td></tr>
                                                    <tr><td>3253</td><td>053221</td><td>Pangkalanbun</td></tr>
                                                    <tr><td>3254</td><td>053222</td><td>Pangkalanbun</td></tr>
                                                    <tr><td>3255</td><td>053223</td><td>Pangkalanbun</td></tr>
                                                    <tr><td>3256</td><td>053224</td><td>Pangkalanbun</td></tr>
                                                    <tr><td>3257</td><td>053225</td><td>Pangkalanbun</td></tr>
                                                    <tr><td>3258</td><td>053470</td><td>Kendawangan</td></tr>
                                                    <tr><td>3259</td><td>053431</td><td>Ketapang</td></tr>
                                                    <tr><td>3260</td><td>053432</td><td>Ketapang</td></tr>
                                                    <tr><td>3261</td><td>053433</td><td>Ketapang</td></tr>
                                                    <tr><td>3262</td><td>053434</td><td>Ketapang</td></tr>
                                                    <tr><td>3263</td><td>053641</td><td>Kasonga</td></tr>
                                                    <tr><td>3264</td><td>0536</td><td>Palangkaraya</td></tr>
                                                    <tr><td>3265</td><td>05361</td><td>Palangkaraya</td></tr>
                                                    <tr><td>3266</td><td>053613</td><td>Palangkaraya</td></tr>
                                                    <tr><td>3267</td><td>053620</td><td>Palangkaraya</td></tr>
                                                    <tr><td>3268</td><td>053621</td><td>Palangkaraya</td></tr>
                                                    <tr><td>3269</td><td>053622</td><td>Palangkaraya</td></tr>
                                                    <tr><td>3270</td><td>053623</td><td>Palangkaraya</td></tr>
                                                    <tr><td>3271</td><td>053624</td><td>Palangkaraya</td></tr>
                                                    <tr><td>3272</td><td>053625</td><td>Palangkaraya</td></tr>
                                                    <tr><td>3273</td><td>053626</td><td>Palangkaraya</td></tr>
                                                    <tr><td>3274</td><td>053627</td><td>Palangkaraya</td></tr>
                                                    <tr><td>3275</td><td>053628</td><td>Palangkaraya</td></tr>
                                                    <tr><td>3276</td><td>053629</td><td>Palangkaraya</td></tr>
                                                    <tr><td>3277</td><td>053630</td><td>Palangkaraya</td></tr>
                                                    <tr><td>3278</td><td>053631</td><td>Palangkaraya</td></tr>
                                                    <tr><td>3279</td><td>053634</td><td>Palangkaraya</td></tr>
                                                    <tr><td>3280</td><td>053635</td><td>Palangkaraya</td></tr>
                                                    <tr><td>3281</td><td>053636</td><td>Palangkaraya</td></tr>
                                                    <tr><td>3282</td><td>053637</td><td>Palangkaraya</td></tr>
                                                    <tr><td>3283</td><td>053638</td><td>Palangkaraya</td></tr>
                                                    <tr><td>3284</td><td>053639</td><td>Palangkaraya</td></tr>
                                                    <tr><td>3285</td><td>053731</td><td>Kualakurun</td></tr>
                                                    <tr><td>3286</td><td>053821</td><td>Kualapembuang</td></tr>
                                                    <tr><td>3287</td><td>053822</td><td>Kualapembuang</td></tr>
                                                    <tr><td>3288</td><td>053931</td><td>Kualakuayan</td></tr>
                                                    <tr><td>3289</td><td>0541280</td><td>Lampake</td></tr>
                                                    <tr><td>3290</td><td>0541281</td><td>Lampake</td></tr>
                                                    <tr><td>3291</td><td>0541270</td><td>Loabakung</td></tr>
                                                    <tr><td>3292</td><td>0541271</td><td>Loabakung</td></tr>
                                                    <tr><td>3293</td><td>0541272</td><td>Loabakung</td></tr>
                                                    <tr><td>3294</td><td>0541273</td><td>Loabakung</td></tr>
                                                    <tr><td>3295</td><td>0541274</td><td>Loabakung</td></tr>
                                                    <tr><td>3296</td><td>0541691</td><td>Muara Jawa</td></tr>
                                                    <tr><td>3297</td><td>0541290</td><td>Pallima</td></tr>
                                                    <tr><td>3298</td><td>0541291</td><td>Pallima</td></tr>
                                                    <tr><td>3299</td><td>0541</td><td>Samarinda</td></tr>
                                                    <tr><td>3300</td><td>05411</td><td>Samarinda - Dahlia</td></tr>
                                                    <tr><td>3301</td><td>054113</td><td>Samarinda - Dahlia</td></tr>
                                                    <tr><td>3302</td><td>054131</td><td>Samarinda - Dahlia</td></tr>
                                                    <tr><td>3303</td><td>054132</td><td>Samarinda - Dahlia</td></tr>
                                                    <tr><td>3304</td><td>054133</td><td>Samarinda - Dahlia</td></tr>
                                                    <tr><td>3305</td><td>054134</td><td>Samarinda - Dahlia</td></tr>
                                                    <tr><td>3306</td><td>054135</td><td>Samarinda - Dahlia</td></tr>
                                                    <tr><td>3307</td><td>054136</td><td>Samarinda - Dahlia</td></tr>
                                                    <tr><td>3308</td><td>054137</td><td>Samarinda - Dahlia</td></tr>
                                                    <tr><td>3309</td><td>054138</td><td>Samarinda - Dahlia</td></tr>
                                                    <tr><td>3310</td><td>054139</td><td>Samarinda - Dahlia</td></tr>
                                                    <tr><td>3311</td><td>054141</td><td>Samarinda - Dahlia</td></tr>
                                                    <tr><td>3312</td><td>054142</td><td>Samarinda - Dahlia</td></tr>
                                                    <tr><td>3313</td><td>054143</td><td>Samarinda - Dahlia</td></tr>
                                                    <tr><td>3314</td><td>054144</td><td>Samarinda - Dahlia</td></tr>
                                                    <tr><td>3315</td><td>054145</td><td>Samarinda - Dahlia</td></tr>
                                                    <tr><td>3316</td><td>054146</td><td>Samarinda - Dahlia</td></tr>
                                                    <tr><td>3317</td><td>054147</td><td>Samarinda - Dahlia</td></tr>
                                                    <tr><td>3318</td><td>054148</td><td>Samarinda - Dahlia</td></tr>
                                                    <tr><td>3319</td><td>054149</td><td>Samarinda - Dahlia</td></tr>
                                                    <tr><td>3320</td><td>054151</td><td>Samarinda - Dahlia</td></tr>
                                                    <tr><td>3321</td><td>054152</td><td>Samarinda - Dahlia</td></tr>
                                                    <tr><td>3322</td><td>054153</td><td>Samarinda - Dahlia</td></tr>
                                                    <tr><td>3323</td><td>054154</td><td>Samarinda - Dahlia</td></tr>
                                                    <tr><td>3324</td><td>054174</td><td>Samarinda - Dahlia</td></tr>
                                                    <tr><td>3325</td><td>054175</td><td>Samarinda - Dahlia</td></tr>
                                                    <tr><td>3326</td><td>054176</td><td>Samarinda - Dahlia</td></tr>
                                                    <tr><td>3327</td><td>0541200</td><td>Samarinda - Dahlia</td></tr>
                                                    <tr><td>3328</td><td>0541201</td><td>Samarinda - Dahlia</td></tr>
                                                    <tr><td>3329</td><td>0541202</td><td>Samarinda - Dahlia</td></tr>
                                                    <tr><td>3330</td><td>0541203</td><td>Samarinda - Dahlia</td></tr>
                                                    <tr><td>3331</td><td>0541204</td><td>Samarinda - Dahlia</td></tr>
                                                    <tr><td>3332</td><td>0541205</td><td>Samarinda - Dahlia</td></tr>
                                                    <tr><td>3333</td><td>0541206</td><td>Samarinda - Dahlia</td></tr>
                                                    <tr><td>3334</td><td>0541207</td><td>Samarinda - Dahlia</td></tr>
                                                    <tr><td>3335</td><td>0541260</td><td>Seberang</td></tr>
                                                    <tr><td>3336</td><td>0541261</td><td>Seberang</td></tr>
                                                    <tr><td>3337</td><td>0541262</td><td>Seberang</td></tr>
                                                    <tr><td>3338</td><td>0541250</td><td>Sempaja</td></tr>
                                                    <tr><td>3339</td><td>0541251</td><td>Sempaja</td></tr>
                                                    <tr><td>3340</td><td>0541240</td><td>Sungaikapih</td></tr>
                                                    <tr><td>3341</td><td>0541241</td><td>Sungaikapih</td></tr>
                                                    <tr><td>3342</td><td>0541220</td><td>Temindung</td></tr>
                                                    <tr><td>3343</td><td>0541221</td><td>Temindung</td></tr>
                                                    <tr><td>3344</td><td>054161</td><td>Tenggarong</td></tr>
                                                    <tr><td>3345</td><td>054162</td><td>Tenggarong</td></tr>
                                                    <tr><td>3346</td><td>054163</td><td>Tenggarong</td></tr>
                                                    <tr><td>3347</td><td>054164</td><td>Tenggarong</td></tr>
                                                    <tr><td>3348</td><td>054165</td><td>Tenggarong</td></tr>
                                                    <tr><td>3349</td><td>0542</td><td>Balikpapan</td></tr>
                                                    <tr><td>3350</td><td>05421</td><td>Balikpapan - Centrum</td></tr>
                                                    <tr><td>3351</td><td>054213</td><td>Balikpapan - Centrum</td></tr>
                                                    <tr><td>3352</td><td>054220</td><td>Balikpapan - Centrum</td></tr>
                                                    <tr><td>3353</td><td>054221</td><td>Balikpapan - Centrum</td></tr>
                                                    <tr><td>3354</td><td>054222</td><td>Balikpapan - Centrum</td></tr>
                                                    <tr><td>3355</td><td>054223</td><td>Balikpapan - Centrum</td></tr>
                                                    <tr><td>3356</td><td>054224</td><td>Balikpapan - Centrum</td></tr>
                                                    <tr><td>3357</td><td>054225</td><td>Balikpapan - Centrum</td></tr>
                                                    <tr><td>3358</td><td>054226</td><td>Balikpapan - Centrum</td></tr>
                                                    <tr><td>3359</td><td>054227</td><td>Balikpapan - Centrum</td></tr>
                                                    <tr><td>3360</td><td>054230</td><td>Balikpapan - Centrum</td></tr>
                                                    <tr><td>3361</td><td>054231</td><td>Balikpapan - Centrum</td></tr>
                                                    <tr><td>3362</td><td>054232</td><td>Balikpapan - Centrum</td></tr>
                                                    <tr><td>3363</td><td>054233</td><td>Balikpapan - Centrum</td></tr>
                                                    <tr><td>3364</td><td>054234</td><td>Balikpapan - Centrum</td></tr>
                                                    <tr><td>3365</td><td>054235</td><td>Balikpapan - Centrum</td></tr>
                                                    <tr><td>3366</td><td>054236</td><td>Balikpapan - Centrum</td></tr>
                                                    <tr><td>3367</td><td>054237</td><td>Balikpapan - Centrum</td></tr>
                                                    <tr><td>3368</td><td>054239</td><td>Balikpapan - Centrum</td></tr>
                                                    <tr><td>3369</td><td>054241</td><td>Balikpapan - Centrum</td></tr>
                                                    <tr><td>3370</td><td>054243</td><td>Balikpapan - Centrum</td></tr>
                                                    <tr><td>3371</td><td>054251</td><td>Balikpapan - Centrum</td></tr>
                                                    <tr><td>3372</td><td>054252</td><td>Balikpapan - Centrum</td></tr>
                                                    <tr><td>3373</td><td>054253</td><td>Balikpapan - Centrum</td></tr>
                                                    <tr><td>3374</td><td>054254</td><td>Balikpapan - Centrum</td></tr>
                                                    <tr><td>3375</td><td>054255</td><td>Balikpapan - Centrum</td></tr>
                                                    <tr><td>3376</td><td>054257</td><td>Balikpapan - Centrum</td></tr>
                                                    <tr><td>3377</td><td>054277</td><td>Balikpapan - Centrum</td></tr>
                                                    <tr><td>3378</td><td>054278</td><td>Balikpapan - Centrum</td></tr>
                                                    <tr><td>3379</td><td>054279</td><td>Balikpapan - Centrum</td></tr>
                                                    <tr><td>3380</td><td>0542440</td><td>Balikpapan - Centrum</td></tr>
                                                    <tr><td>3381</td><td>0542441</td><td>Balikpapan - Centrum</td></tr>
                                                    <tr><td>3382</td><td>0542442</td><td>Balikpapan - Centrum</td></tr>
                                                    <tr><td>3383</td><td>0542443</td><td>Balikpapan - Centrum</td></tr>
                                                    <tr><td>3384</td><td>0542580</td><td>Balikpapan - Centrum</td></tr>
                                                    <tr><td>3385</td><td>0542590</td><td>Balikpapan - Centrum</td></tr>
                                                    <tr><td>3386</td><td>054271</td><td>Balikpapan - Damai</td></tr>
                                                    <tr><td>3387</td><td>054272</td><td>Balikpapan - Damai</td></tr>
                                                    <tr><td>3388</td><td>054273</td><td>Balikpapan - Damai</td></tr>
                                                    <tr><td>3389</td><td>054274</td><td>Balikpapan - Damai</td></tr>
                                                    <tr><td>3390</td><td>054275</td><td>Balikpapan - Damai</td></tr>
                                                    <tr><td>3391</td><td>054276</td><td>Balikpapan - Damai</td></tr>
                                                    <tr><td>3392</td><td>054260</td><td>Balikpapan - Ks Tubun</td></tr>
                                                    <tr><td>3393</td><td>054261</td><td>Balikpapan - Ks Tubun</td></tr>
                                                    <tr><td>3394</td><td>054262</td><td>Balikpapan - Ks Tubun</td></tr>
                                                    <tr><td>3395</td><td>054263</td><td>Balikpapan - Ks Tubun</td></tr>
                                                    <tr><td>3396</td><td>054264</td><td>Balikpapan - Ks Tubun</td></tr>
                                                    <tr><td>3397</td><td>054265</td><td>Balikpapan - Ks Tubun</td></tr>
                                                    <tr><td>3398</td><td>054266</td><td>Balikpapan - Ks Tubun</td></tr>
                                                    <tr><td>3399</td><td>054267</td><td>Balikpapan - Ks Tubun</td></tr>
                                                    <tr><td>3400</td><td>054268</td><td>Balikpapan - Ks Tubun</td></tr>
                                                    <tr><td>3401</td><td>054238</td><td>Balikpapan - Pertamina</td></tr>
                                                    <tr><td>3402</td><td>0542860</td><td>Batuamp</td></tr>
                                                    <tr><td>3403</td><td>054286</td><td>Batuampar</td></tr>
                                                    <tr><td>3404</td><td>0542861</td><td>Batuampar</td></tr>
                                                    <tr><td>3405</td><td>0542862</td><td>Batuampar</td></tr>
                                                    <tr><td>3406</td><td>0542840</td><td>Kenanga</td></tr>
                                                    <tr><td>3407</td><td>054259160</td><td>Malinau</td></tr>
                                                    <tr><td>3408</td><td>054259161</td><td>Malinau</td></tr>
                                                    <tr><td>3409</td><td>054259130</td><td>Melak</td></tr>
                                                    <tr><td>3410</td><td>0542850</td><td>Penajam</td></tr>
                                                    <tr><td>3411</td><td>0542460</td><td>Samboja</td></tr>
                                                    <tr><td>3412</td><td>054259151</td><td>Sampit</td></tr>
                                                    <tr><td>3413</td><td>0543330</td><td>Babuludarat</td></tr>
                                                    <tr><td>3414</td><td>0543320</td><td>Longikis</td></tr>
                                                    <tr><td>3415</td><td>0543321</td><td>Longikis</td></tr>
                                                    <tr><td>3416</td><td>0543310</td><td>Longkal</td></tr>
                                                    <tr><td>3417</td><td>0543350</td><td>Petung</td></tr>
                                                    <tr><td>3418</td><td>054321</td><td>Tanahgrogot</td></tr>
                                                    <tr><td>3419</td><td>054322</td><td>Tanahgrogot</td></tr>
                                                    <tr><td>3420</td><td>054323</td><td>Tanahgrogot</td></tr>
                                                    <tr><td>3421</td><td>0543340</td><td>Waru</td></tr>
                                                    <tr><td>3422</td><td>054541</td><td>Melak</td></tr>
                                                    <tr><td>3423</td><td>054821</td><td>Bontang</td></tr>
                                                    <tr><td>3424</td><td>054822</td><td>Bontang</td></tr>
                                                    <tr><td>3425</td><td>054823</td><td>Bontang</td></tr>
                                                    <tr><td>3426</td><td>054824</td><td>Bontang</td></tr>
                                                    <tr><td>3427</td><td>054825</td><td>Bontang</td></tr>
                                                    <tr><td>3428</td><td>054826</td><td>Bontang</td></tr>
                                                    <tr><td>3429</td><td>054827</td><td>Bontang</td></tr>
                                                    <tr><td>3430</td><td>054855</td><td>Bontang</td></tr>
                                                    <tr><td>3431</td><td>054841</td><td>Lhoktuan</td></tr>
                                                    <tr><td>3432</td><td>054921</td><td>Sangatta</td></tr>
                                                    <tr><td>3433</td><td>054922</td><td>Sangatta</td></tr>
                                                    <tr><td>3434</td><td>054923</td><td>Sangatta</td></tr>
                                                    <tr><td>3435</td><td>0549521</td><td>Sangatta</td></tr>
                                                    <tr><td>3436</td><td>0549523</td><td>Sangatta</td></tr>
                                                    <tr><td>3437</td><td>0549525</td><td>Sangatta</td></tr>
                                                    <tr><td>3438</td><td>0551</td><td>Tarakan</td></tr>
                                                    <tr><td>3439</td><td>05511</td><td>Tarakan</td></tr>
                                                    <tr><td>3440</td><td>055121</td><td>Tarakan</td></tr>
                                                    <tr><td>3441</td><td>055122</td><td>Tarakan</td></tr>
                                                    <tr><td>3442</td><td>055123</td><td>Tarakan</td></tr>
                                                    <tr><td>3443</td><td>055124</td><td>Tarakan</td></tr>
                                                    <tr><td>3444</td><td>055125</td><td>Tarakan</td></tr>
                                                    <tr><td>3445</td><td>055130</td><td>Tarakan</td></tr>
                                                    <tr><td>3446</td><td>055131</td><td>Tarakan</td></tr>
                                                    <tr><td>3447</td><td>055132</td><td>Tarakan</td></tr>
                                                    <tr><td>3448</td><td>055133</td><td>Tarakan</td></tr>
                                                    <tr><td>3449</td><td>055134</td><td>Tarakan</td></tr>
                                                    <tr><td>3450</td><td>055135</td><td>Tarakan</td></tr>
                                                    <tr><td>3451</td><td>055136</td><td>Tarakan</td></tr>
                                                    <tr><td>3452</td><td>055137</td><td>Tarakan</td></tr>
                                                    <tr><td>3453</td><td>055138</td><td>Tarakan</td></tr>
                                                    <tr><td>3454</td><td>055151</td><td>Tarakan</td></tr>
                                                    <tr><td>3455</td><td>0552</td><td>Tanjungselor</td></tr>
                                                    <tr><td>3456</td><td>05521</td><td>Tanjungselor</td></tr>
                                                    <tr><td>3457</td><td>055221</td><td>Tanjungselor</td></tr>
                                                    <tr><td>3458</td><td>055222</td><td>Tanjungselor</td></tr>
                                                    <tr><td>3459</td><td>055321</td><td>Malinau</td></tr>
                                                    <tr><td>3460</td><td>0554</td><td>Tanjungredeb</td></tr>
                                                    <tr><td>3461</td><td>05541</td><td>Tanjungredeb</td></tr>
                                                    <tr><td>3462</td><td>055421</td><td>Tanjungredeb</td></tr>
                                                    <tr><td>3463</td><td>055422</td><td>Tanjungredeb</td></tr>
                                                    <tr><td>3464</td><td>055423</td><td>Tanjungredeb</td></tr>
                                                    <tr><td>3465</td><td>055621</td><td>Nunukan</td></tr>
                                                    <tr><td>3466</td><td>055622</td><td>Nunukan</td></tr>
                                                    <tr><td>3467</td><td>0561770</td><td>Jawi</td></tr>
                                                    <tr><td>3468</td><td>0561771</td><td>Jawi</td></tr>
                                                    <tr><td>3469</td><td>0561772</td><td>Jawi</td></tr>
                                                    <tr><td>3470</td><td>0561773</td><td>Jawi</td></tr>
                                                    <tr><td>3471</td><td>0561774</td><td>Jawi</td></tr>
                                                    <tr><td>3472</td><td>0561775</td><td>Jawi</td></tr>
                                                    <tr><td>3473</td><td>0561776</td><td>Jawi</td></tr>
                                                    <tr><td>3474</td><td>0561777</td><td>Jawi</td></tr>
                                                    <tr><td>3475</td><td>0561778</td><td>Jawi</td></tr>
                                                    <tr><td>3476</td><td>0561779</td><td>Jawi</td></tr>
                                                    <tr><td>3477</td><td>0561780</td><td>Jawi</td></tr>
                                                    <tr><td>3478</td><td>0561781</td><td>Jawi</td></tr>
                                                    <tr><td>3479</td><td>0561782</td><td>Jawi</td></tr>
                                                    <tr><td>3480</td><td>056191</td><td>Mempawah</td></tr>
                                                    <tr><td>3481</td><td>0561</td><td>Pontianak</td></tr>
                                                    <tr><td>3482</td><td>05611</td><td>Pontianak</td></tr>
                                                    <tr><td>3483</td><td>056113</td><td>Pontianak</td></tr>
                                                    <tr><td>3484</td><td>056130</td><td>Pontianak</td></tr>
                                                    <tr><td>3485</td><td>056131</td><td>Pontianak</td></tr>
                                                    <tr><td>3486</td><td>056132</td><td>Pontianak</td></tr>
                                                    <tr><td>3487</td><td>056133</td><td>Pontianak</td></tr>
                                                    <tr><td>3488</td><td>056134</td><td>Pontianak</td></tr>
                                                    <tr><td>3489</td><td>056135</td><td>Pontianak</td></tr>
                                                    <tr><td>3490</td><td>056136</td><td>Pontianak</td></tr>
                                                    <tr><td>3491</td><td>056137</td><td>Pontianak</td></tr>
                                                    <tr><td>3492</td><td>056138</td><td>Pontianak</td></tr>
                                                    <tr><td>3493</td><td>056139</td><td>Pontianak</td></tr>
                                                    <tr><td>3494</td><td>056140</td><td>Pontianak</td></tr>
                                                    <tr><td>3495</td><td>056141</td><td>Pontianak</td></tr>
                                                    <tr><td>3496</td><td>056142</td><td>Pontianak</td></tr>
                                                    <tr><td>3497</td><td>056143</td><td>Pontianak</td></tr>
                                                    <tr><td>3498</td><td>056144</td><td>Pontianak</td></tr>
                                                    <tr><td>3499</td><td>056145</td><td>Pontianak</td></tr>
                                                    <tr><td>3500</td><td>056146</td><td>Pontianak</td></tr>
                                                    <tr><td>3501</td><td>056147</td><td>Pontianak</td></tr>
                                                    <tr><td>3502</td><td>056148</td><td>Pontianak</td></tr>
                                                    <tr><td>3503</td><td>056149</td><td>Pontianak</td></tr>
                                                    <tr><td>3504</td><td>056156</td><td>Pontianak</td></tr>
                                                    <tr><td>3505</td><td>056160</td><td>Pontianak</td></tr>
                                                    <tr><td>3506</td><td>056161</td><td>Pontianak</td></tr>
                                                    <tr><td>3507</td><td>056162</td><td>Pontianak</td></tr>
                                                    <tr><td>3508</td><td>056163</td><td>Pontianak</td></tr>
                                                    <tr><td>3509</td><td>056164</td><td>Pontianak</td></tr>
                                                    <tr><td>3510</td><td>056165</td><td>Pontianak</td></tr>
                                                    <tr><td>3511</td><td>056166</td><td>Pontianak</td></tr>
                                                    <tr><td>3512</td><td>056167</td><td>Pontianak</td></tr>
                                                    <tr><td>3513</td><td>056168</td><td>Pontianak</td></tr>
                                                    <tr><td>3514</td><td>056169</td><td>Pontianak</td></tr>
                                                    <tr><td>3515</td><td>0561570</td><td>Pontianak</td></tr>
                                                    <tr><td>3516</td><td>0561571</td><td>Pontianak</td></tr>
                                                    <tr><td>3517</td><td>0561572</td><td>Pontianak</td></tr>
                                                    <tr><td>3518</td><td>0561573</td><td>Pontianak</td></tr>
                                                    <tr><td>3519</td><td>0561574</td><td>Pontianak</td></tr>
                                                    <tr><td>3520</td><td>0561575</td><td>Pontianak</td></tr>
                                                    <tr><td>3521</td><td>0561576</td><td>Pontianak</td></tr>
                                                    <tr><td>3522</td><td>0561578</td><td>Pontianak</td></tr>
                                                    <tr><td>3523</td><td>0561579</td><td>Pontianak</td></tr>
                                                    <tr><td>3524</td><td>0561580</td><td>Pontianak</td></tr>
                                                    <tr><td>3525</td><td>056181</td><td>Siantan</td></tr>
                                                    <tr><td>3526</td><td>056182</td><td>Siantan</td></tr>
                                                    <tr><td>3527</td><td>056183</td><td>Siantan</td></tr>
                                                    <tr><td>3528</td><td>056184</td><td>Siantan</td></tr>
                                                    <tr><td>3529</td><td>056185</td><td>Siantan</td></tr>
                                                    <tr><td>3530</td><td>056186</td><td>Siantan</td></tr>
                                                    <tr><td>3531</td><td>056187</td><td>Siantan</td></tr>
                                                    <tr><td>3532</td><td>056192</td><td>Sungaipinyuh</td></tr>
                                                    <tr><td>3533</td><td>056193</td><td>Sungaipinyuh</td></tr>
                                                    <tr><td>3534</td><td>056194</td><td>Sungaipinyuh</td></tr>
                                                    <tr><td>3535</td><td>056121</td><td>Sungairaya</td></tr>
                                                    <tr><td>3536</td><td>056122</td><td>Sungairaya</td></tr>
                                                    <tr><td>3537</td><td>056123</td><td>Sungairaya</td></tr>
                                                    <tr><td>3538</td><td>056124</td><td>Sungairaya</td></tr>
                                                    <tr><td>3539</td><td>056125</td><td>Sungairaya</td></tr>
                                                    <tr><td>3540</td><td>0561710</td><td>Sungairaya-Dalam</td></tr>
                                                    <tr><td>3541</td><td>0561711</td><td>Sungairaya-Dalam</td></tr>
                                                    <tr><td>3542</td><td>0561712</td><td>Sungairaya-Dalam</td></tr>
                                                    <tr><td>3543</td><td>056241</td><td>Bengkayang</td></tr>
                                                    <tr><td>3544</td><td>056221</td><td>Pemangkat</td></tr>
                                                    <tr><td>3545</td><td>056222</td><td>Pemangkat</td></tr>
                                                    <tr><td>3546</td><td>056223</td><td>Pemangkat</td></tr>
                                                    <tr><td>3547</td><td>0562640</td><td>Roban</td></tr>
                                                    <tr><td>3548</td><td>056291</td><td>Sambas</td></tr>
                                                    <tr><td>3549</td><td>056292</td><td>Sambas</td></tr>
                                                    <tr><td>3550</td><td>056293</td><td>Sambas</td></tr>
                                                    <tr><td>3551</td><td>056294</td><td>Sambas</td></tr>
                                                    <tr><td>3552</td><td>0562</td><td>Singkawang</td></tr>
                                                    <tr><td>3553</td><td>05621</td><td>Singkawang</td></tr>
                                                    <tr><td>3554</td><td>056230</td><td>Singkawang</td></tr>
                                                    <tr><td>3555</td><td>056231</td><td>Singkawang</td></tr>
                                                    <tr><td>3556</td><td>056232</td><td>Singkawang</td></tr>
                                                    <tr><td>3557</td><td>056233</td><td>Singkawang</td></tr>
                                                    <tr><td>3558</td><td>056234</td><td>Singkawang</td></tr>
                                                    <tr><td>3559</td><td>056235</td><td>Singkawang</td></tr>
                                                    <tr><td>3560</td><td>056236</td><td>Singkawang</td></tr>
                                                    <tr><td>3561</td><td>056237</td><td>Singkawang</td></tr>
                                                    <tr><td>3562</td><td>056238</td><td>Singkawang</td></tr>
                                                    <tr><td>3563</td><td>056239</td><td>Singkawang</td></tr>
                                                    <tr><td>3564</td><td>056265</td><td>Sungaiduri</td></tr>
                                                    <tr><td>3565</td><td>056271</td><td>Tebas</td></tr>
                                                    <tr><td>3566</td><td>056321</td><td>Ngabang</td></tr>
                                                    <tr><td>3567</td><td>056431</td><td>Balaikarangan</td></tr>
                                                    <tr><td>3568</td><td>056421</td><td>Sanggau</td></tr>
                                                    <tr><td>3569</td><td>056422</td><td>Sanggau</td></tr>
                                                    <tr><td>3570</td><td>056423</td><td>Sanggau</td></tr>
                                                    <tr><td>3571</td><td>056441</td><td>Sekadau</td></tr>
                                                    <tr><td>3572</td><td>056521</td><td>Sintang</td></tr>
                                                    <tr><td>3573</td><td>056522</td><td>Sintang</td></tr>
                                                    <tr><td>3574</td><td>056523</td><td>Sintang</td></tr>
                                                    <tr><td>3575</td><td>056524</td><td>Sintang</td></tr>
                                                    <tr><td>3576</td><td>056721</td><td>Putussibau</td></tr>
                                                    <tr><td>3577</td><td>056821</td><td>Nangapinoh</td></tr>
                                                    <tr><td>3578</td><td>056822</td><td>Nangapinoh</td></tr>
                                                    <tr><td>3579</td><td>061</td><td>Medan</td></tr>
                                                    <tr><td>3580</td><td>0611</td><td>Medan</td></tr>
                                                    <tr><td>3581</td><td>061130</td><td>Medan</td></tr>
                                                    <tr><td>3582</td><td>061241</td><td>Medan</td></tr>
                                                    <tr><td>3583</td><td>061244</td><td>Medan</td></tr>
                                                    <tr><td>3584</td><td>061250</td><td>Medan</td></tr>
                                                    <tr><td>3585</td><td>0612567</td><td>Medan</td></tr>
                                                    <tr><td>3586</td><td>061320</td><td>Medan</td></tr>
                                                    <tr><td>3587</td><td>061321</td><td>Medan</td></tr>
                                                    <tr><td>3588</td><td>061322</td><td>Medan</td></tr>
                                                    <tr><td>3589</td><td>061323</td><td>Medan</td></tr>
                                                    <tr><td>3590</td><td>061324</td><td>Medan</td></tr>
                                                    <tr><td>3591</td><td>061325</td><td>Medan</td></tr>
                                                    <tr><td>3592</td><td>061326</td><td>Medan</td></tr>
                                                    <tr><td>3593</td><td>061327</td><td>Medan</td></tr>
                                                    <tr><td>3594</td><td>061328</td><td>Medan</td></tr>
                                                    <tr><td>3595</td><td>061329</td><td>Medan</td></tr>
                                                    <tr><td>3596</td><td>061510</td><td>Medan</td></tr>
                                                    <tr><td>3597</td><td>061511</td><td>Medan</td></tr>
                                                    <tr><td>3598</td><td>061512</td><td>Medan</td></tr>
                                                    <tr><td>3599</td><td>061513</td><td>Medan</td></tr>
                                                    <tr><td>3600</td><td>061514</td><td>Medan</td></tr>
                                                    <tr><td>3601</td><td>061515</td><td>Medan</td></tr>
                                                    <tr><td>3602</td><td>061516</td><td>Medan</td></tr>
                                                    <tr><td>3603</td><td>061517</td><td>Medan</td></tr>
                                                    <tr><td>3604</td><td>061518</td><td>Medan</td></tr>
                                                    <tr><td>3605</td><td>061519</td><td>Medan</td></tr>
                                                    <tr><td>3606</td><td>061520</td><td>Medan</td></tr>
                                                    <tr><td>3607</td><td>061521</td><td>Medan</td></tr>
                                                    <tr><td>3608</td><td>061522</td><td>Medan</td></tr>
                                                    <tr><td>3609</td><td>061523</td><td>Medan</td></tr>
                                                    <tr><td>3610</td><td>061524</td><td>Medan</td></tr>
                                                    <tr><td>3611</td><td>061525</td><td>Medan</td></tr>
                                                    <tr><td>3612</td><td>061526</td><td>Medan</td></tr>
                                                    <tr><td>3613</td><td>061527</td><td>Medan</td></tr>
                                                    <tr><td>3614</td><td>061528</td><td>Medan</td></tr>
                                                    <tr><td>3615</td><td>061529</td><td>Medan</td></tr>
                                                    <tr><td>3616</td><td>061530</td><td>Medan</td></tr>
                                                    <tr><td>3617</td><td>061531</td><td>Medan</td></tr>
                                                    <tr><td>3618</td><td>061532</td><td>Medan</td></tr>
                                                    <tr><td>3619</td><td>061533</td><td>Medan</td></tr>
                                                    <tr><td>3620</td><td>061534</td><td>Medan</td></tr>
                                                    <tr><td>3621</td><td>061535</td><td>Medan</td></tr>
                                                    <tr><td>3622</td><td>061536</td><td>Medan</td></tr>
                                                    <tr><td>3623</td><td>061537</td><td>Medan</td></tr>
                                                    <tr><td>3624</td><td>061538</td><td>Medan</td></tr>
                                                    <tr><td>3625</td><td>061539</td><td>Medan</td></tr>
                                                    <tr><td>3626</td><td>061540</td><td>Medan</td></tr>
                                                    <tr><td>3627</td><td>061541</td><td>Medan</td></tr>
                                                    <tr><td>3628</td><td>061542</td><td>Medan</td></tr>
                                                    <tr><td>3629</td><td>061543</td><td>Medan</td></tr>
                                                    <tr><td>3630</td><td>061544</td><td>Medan</td></tr>
                                                    <tr><td>3631</td><td>061545</td><td>Medan</td></tr>
                                                    <tr><td>3632</td><td>061546</td><td>Medan</td></tr>
                                                    <tr><td>3633</td><td>061547</td><td>Medan</td></tr>
                                                    <tr><td>3634</td><td>061548</td><td>Medan</td></tr>
                                                    <tr><td>3635</td><td>061549</td><td>Medan</td></tr>
                                                    <tr><td>3636</td><td>061550</td><td>Medan</td></tr>
                                                    <tr><td>3637</td><td>061551</td><td>Medan</td></tr>
                                                    <tr><td>3638</td><td>061552</td><td>Medan</td></tr>
                                                    <tr><td>3639</td><td>061553</td><td>Medan</td></tr>
                                                    <tr><td>3640</td><td>061554</td><td>Medan</td></tr>
                                                    <tr><td>3641</td><td>061555</td><td>Medan</td></tr>
                                                    <tr><td>3642</td><td>061556</td><td>Medan</td></tr>
                                                    <tr><td>3643</td><td>061557</td><td>Medan</td></tr>
                                                    <tr><td>3644</td><td>061558</td><td>Medan</td></tr>
                                                    <tr><td>3645</td><td>061559</td><td>Medan</td></tr>
                                                    <tr><td>3646</td><td>061560</td><td>Medan</td></tr>
                                                    <tr><td>3647</td><td>061561</td><td>Medan</td></tr>
                                                    <tr><td>3648</td><td>061562</td><td>Medan</td></tr>
                                                    <tr><td>3649</td><td>061563</td><td>Medan</td></tr>
                                                    <tr><td>3650</td><td>061564</td><td>Medan</td></tr>
                                                    <tr><td>3651</td><td>061565</td><td>Medan</td></tr>
                                                    <tr><td>3652</td><td>061566</td><td>Medan</td></tr>
                                                    <tr><td>3653</td><td>061567</td><td>Medan</td></tr>
                                                    <tr><td>3654</td><td>061568</td><td>Medan</td></tr>
                                                    <tr><td>3655</td><td>061569</td><td>Medan</td></tr>
                                                    <tr><td>3656</td><td>061570</td><td>Medan</td></tr>
                                                    <tr><td>3657</td><td>061571</td><td>Medan</td></tr>
                                                    <tr><td>3658</td><td>061572</td><td>Medan</td></tr>
                                                    <tr><td>3659</td><td>061573</td><td>Medan</td></tr>
                                                    <tr><td>3660</td><td>061574</td><td>Medan</td></tr>
                                                    <tr><td>3661</td><td>061575</td><td>Medan</td></tr>
                                                    <tr><td>3662</td><td>061576</td><td>Medan</td></tr>
                                                    <tr><td>3663</td><td>061577</td><td>Medan</td></tr>
                                                    <tr><td>3664</td><td>061578</td><td>Medan</td></tr>
                                                    <tr><td>3665</td><td>061579</td><td>Medan</td></tr>
                                                    <tr><td>3666</td><td>061580</td><td>Medan</td></tr>
                                                    <tr><td>3667</td><td>061581</td><td>Medan</td></tr>
                                                    <tr><td>3668</td><td>061582</td><td>Medan</td></tr>
                                                    <tr><td>3669</td><td>061583</td><td>Medan</td></tr>
                                                    <tr><td>3670</td><td>061584</td><td>Medan</td></tr>
                                                    <tr><td>3671</td><td>061585</td><td>Medan</td></tr>
                                                    <tr><td>3672</td><td>061586</td><td>Medan</td></tr>
                                                    <tr><td>3673</td><td>061587</td><td>Medan</td></tr>
                                                    <tr><td>3674</td><td>061588</td><td>Medan</td></tr>
                                                    <tr><td>3675</td><td>061589</td><td>Medan</td></tr>
                                                    <tr><td>3676</td><td>061590</td><td>Medan</td></tr>
                                                    <tr><td>3677</td><td>061591</td><td>Medan</td></tr>
                                                    <tr><td>3678</td><td>061640</td><td>Belawan</td></tr>
                                                    <tr><td>3679</td><td>061641</td><td>Belawan</td></tr>
                                                    <tr><td>3680</td><td>061642</td><td>Belawan</td></tr>
                                                    <tr><td>3681</td><td>061643</td><td>Belawan</td></tr>
                                                    <tr><td>3682</td><td>061644</td><td>Belawan</td></tr>
                                                    <tr><td>3683</td><td>061645</td><td>Belawan</td></tr>
                                                    <tr><td>3684</td><td>061610</td><td>Medan - Pulo Brayan</td></tr>
                                                    <tr><td>3685</td><td>061611</td><td>Medan - Pulo Brayan</td></tr>
                                                    <tr><td>3686</td><td>061612</td><td>Medan - Pulo Brayan</td></tr>
                                                    <tr><td>3687</td><td>061613</td><td>Medan - Pulo Brayan</td></tr>
                                                    <tr><td>3688</td><td>061614</td><td>Medan - Pulo Brayan</td></tr>
                                                    <tr><td>3689</td><td>061615</td><td>Medan - Pulo Brayan</td></tr>
                                                    <tr><td>3690</td><td>061616</td><td>Medan - Pulo Brayan</td></tr>
                                                    <tr><td>3691</td><td>061617</td><td>Medan - Pulo Brayan</td></tr>
                                                    <tr><td>3692</td><td>061618</td><td>Medan - Pulo Brayan</td></tr>
                                                    <tr><td>3693</td><td>061619</td><td>Medan - Pulo Brayan</td></tr>
                                                    <tr><td>3694</td><td>061620</td><td>Medan - Pulo Brayan</td></tr>
                                                    <tr><td>3695</td><td>061621</td><td>Medan - Pulo Brayan</td></tr>
                                                    <tr><td>3696</td><td>061622</td><td>Medan - Pulo Brayan</td></tr>
                                                    <tr><td>3697</td><td>061623</td><td>Medan - Pulo Brayan</td></tr>
                                                    <tr><td>3698</td><td>061624</td><td>Medan - Pulo Brayan</td></tr>
                                                    <tr><td>3699</td><td>061625</td><td>Medan - Pulo Brayan</td></tr>
                                                    <tr><td>3700</td><td>061626</td><td>Medan - Pulo Brayan</td></tr>
                                                    <tr><td>3701</td><td>061627</td><td>Medan - Pulo Brayan</td></tr>
                                                    <tr><td>3702</td><td>061628</td><td>Medan - Pulo Brayan</td></tr>
                                                    <tr><td>3703</td><td>061629</td><td>Medan - Pulo Brayan</td></tr>
                                                    <tr><td>3704</td><td>061630</td><td>Medan - Pulo Brayan</td></tr>
                                                    <tr><td>3705</td><td>061631</td><td>Medan - Pulo Brayan</td></tr>
                                                    <tr><td>3706</td><td>061632</td><td>Medan - Pulo Brayan</td></tr>
                                                    <tr><td>3707</td><td>061633</td><td>Medan - Pulo Brayan</td></tr>
                                                    <tr><td>3708</td><td>061634</td><td>Medan - Pulo Brayan</td></tr>
                                                    <tr><td>3709</td><td>061635</td><td>Medan - Pulo Brayan</td></tr>
                                                    <tr><td>3710</td><td>061636</td><td>Medan - Pulo Brayan</td></tr>
                                                    <tr><td>3711</td><td>061637</td><td>Medan - Pulo Brayan</td></tr>
                                                    <tr><td>3712</td><td>061638</td><td>Medan - Pulo Brayan</td></tr>
                                                    <tr><td>3713</td><td>061639</td><td>Medan - Pulo Brayan</td></tr>
                                                    <tr><td>3714</td><td>0616990</td><td>Percut</td></tr>
                                                    <tr><td>3715</td><td>0616691</td><td>Pulau Brayan</td></tr>
                                                    <tr><td>3716</td><td>0616692</td><td>Pulau Brayan</td></tr>
                                                    <tr><td>3717</td><td>0616693</td><td>Pulau Brayan</td></tr>
                                                    <tr><td>3718</td><td>0616694</td><td>Pulau Brayan</td></tr>
                                                    <tr><td>3719</td><td>0616695</td><td>Pulau Brayan</td></tr>
                                                    <tr><td>3720</td><td>0616696</td><td>Pulau Brayan</td></tr>
                                                    <tr><td>3721</td><td>0616697</td><td>Pulau Brayan</td></tr>
                                                    <tr><td>3722</td><td>0616698</td><td>Pulau Brayan</td></tr>
                                                    <tr><td>3723</td><td>0616699</td><td>Pulau Brayan</td></tr>
                                                    <tr><td>3724</td><td>061650</td><td>Tanjung Mulia</td></tr>
                                                    <tr><td>3725</td><td>061651</td><td>Tanjung Mulia</td></tr>
                                                    <tr><td>3726</td><td>061652</td><td>Tanjung Mulia</td></tr>
                                                    <tr><td>3727</td><td>061653</td><td>Tanjung Mulia</td></tr>
                                                    <tr><td>3728</td><td>061654</td><td>Tanjung Mulia</td></tr>
                                                    <tr><td>3729</td><td>061655</td><td>Tanjung Mulia</td></tr>
                                                    <tr><td>3730</td><td>061656</td><td>Tanjung Mulia</td></tr>
                                                    <tr><td>3731</td><td>061657</td><td>Tanjung Mulia</td></tr>
                                                    <tr><td>3732</td><td>061658</td><td>Tanjung Mulia</td></tr>
                                                    <tr><td>3733</td><td>061659</td><td>Tanjung Mulia</td></tr>
                                                    <tr><td>3734</td><td>0617989</td><td>Bangunpurba</td></tr>
                                                    <tr><td>3735</td><td>0617388</td><td>Batangkuis</td></tr>
                                                    <tr><td>3736</td><td>0617389</td><td>Batangkuis</td></tr>
                                                    <tr><td>3737</td><td>061730</td><td>Delitua</td></tr>
                                                    <tr><td>3738</td><td>061731</td><td>Delitua</td></tr>
                                                    <tr><td>3739</td><td>0617030</td><td>Delitua</td></tr>
                                                    <tr><td>3740</td><td>0617031</td><td>Delitua</td></tr>
                                                    <tr><td>3741</td><td>0617032</td><td>Delitua</td></tr>
                                                    <tr><td>3742</td><td>0617980</td><td>Galang</td></tr>
                                                    <tr><td>3743</td><td>0617981</td><td>Galang</td></tr>
                                                    <tr><td>3744</td><td>0617988</td><td>Gunungmeriah</td></tr>
                                                    <tr><td>3745</td><td>0617987</td><td>Kotarih</td></tr>
                                                    <tr><td>3746</td><td>061795</td><td>Lubukpakam</td></tr>
                                                    <tr><td>3747</td><td>0617955</td><td>Lubukpakam</td></tr>
                                                    <tr><td>3748</td><td>0617956</td><td>Lubukpakam</td></tr>
                                                    <tr><td>3749</td><td>0617970</td><td>Medan - Pantai Cermin</td></tr>
                                                    <tr><td>3750</td><td>061760</td><td>Medan - Simpang Limun</td></tr>
                                                    <tr><td>3751</td><td>061761</td><td>Medan - Simpang Limun</td></tr>
                                                    <tr><td>3752</td><td>061762</td><td>Medan - Simpang Limun</td></tr>
                                                    <tr><td>3753</td><td>061763</td><td>Medan - Simpang Limun</td></tr>
                                                    <tr><td>3754</td><td>061764</td><td>Medan - Simpang Limun</td></tr>
                                                    <tr><td>3755</td><td>061765</td><td>Medan - Simpang Limun</td></tr>
                                                    <tr><td>3756</td><td>061766</td><td>Medan - Simpang Limun</td></tr>
                                                    <tr><td>3757</td><td>061767</td><td>Medan - Simpang Limun</td></tr>
                                                    <tr><td>3758</td><td>061768</td><td>Medan - Simpang Limun</td></tr>
                                                    <tr><td>3759</td><td>061769</td><td>Medan - Simpang Limun</td></tr>
                                                    <tr><td>3760</td><td>061770</td><td>Medan - Simpang Limun</td></tr>
                                                    <tr><td>3761</td><td>061771</td><td>Medan - Simpang Limun</td></tr>
                                                    <tr><td>3762</td><td>061772</td><td>Medan - Simpang Limun</td></tr>
                                                    <tr><td>3763</td><td>061773</td><td>Medan - Simpang Limun</td></tr>
                                                    <tr><td>3764</td><td>061774</td><td>Medan - Simpang Limun</td></tr>
                                                    <tr><td>3765</td><td>061775</td><td>Medan - Simpang Limun</td></tr>
                                                    <tr><td>3766</td><td>061776</td><td>Medan - Simpang Limun</td></tr>
                                                    <tr><td>3767</td><td>061777</td><td>Medan - Simpang Limun</td></tr>
                                                    <tr><td>3768</td><td>061778</td><td>Medan - Simpang Limun</td></tr>
                                                    <tr><td>3769</td><td>061779</td><td>Medan - Simpang Limun</td></tr>
                                                    <tr><td>3770</td><td>061786</td><td>Medan - Simpang Limun</td></tr>
                                                    <tr><td>3771</td><td>0617860</td><td>Medan - Simpang Limun</td></tr>
                                                    <tr><td>3772</td><td>0617861</td><td>Medan - Simpang Limun</td></tr>
                                                    <tr><td>3773</td><td>0617862</td><td>Medan - Simpang Limun</td></tr>
                                                    <tr><td>3774</td><td>0617863</td><td>Medan - Simpang Limun</td></tr>
                                                    <tr><td>3775</td><td>0617864</td><td>Medan - Simpang Limun</td></tr>
                                                    <tr><td>3776</td><td>0617870</td><td>Medan - Simpang Limun</td></tr>
                                                    <tr><td>3777</td><td>0617871</td><td>Medan - Simpang Limun</td></tr>
                                                    <tr><td>3778</td><td>0617872</td><td>Medan - Simpang Limun</td></tr>
                                                    <tr><td>3779</td><td>0617873</td><td>Medan - Simpang Limun</td></tr>
                                                    <tr><td>3780</td><td>0617874</td><td>Medan - Simpang Limun</td></tr>
                                                    <tr><td>3781</td><td>0617875</td><td>Medan - Simpang Limun</td></tr>
                                                    <tr><td>3782</td><td>0617876</td><td>Medan - Simpang Limun</td></tr>
                                                    <tr><td>3783</td><td>0617877</td><td>Medan - Simpang Limun</td></tr>
                                                    <tr><td>3784</td><td>0617878</td><td>Medan - Simpang Limun</td></tr>
                                                    <tr><td>3785</td><td>0617879</td><td>Medan - Simpang Limun</td></tr>
                                                    <tr><td>3786</td><td>061710</td><td>Medan - Sukaramai</td></tr>
                                                    <tr><td>3787</td><td>061711</td><td>Medan - Sukaramai</td></tr>
                                                    <tr><td>3788</td><td>061712</td><td>Medan - Sukaramai</td></tr>
                                                    <tr><td>3789</td><td>061713</td><td>Medan - Sukaramai</td></tr>
                                                    <tr><td>3790</td><td>061714</td><td>Medan - Sukaramai</td></tr>
                                                    <tr><td>3791</td><td>061715</td><td>Medan - Sukaramai</td></tr>
                                                    <tr><td>3792</td><td>061716</td><td>Medan - Sukaramai</td></tr>
                                                    <tr><td>3793</td><td>061717</td><td>Medan - Sukaramai</td></tr>
                                                    <tr><td>3794</td><td>061718</td><td>Medan - Sukaramai</td></tr>
                                                    <tr><td>3795</td><td>061719</td><td>Medan - Sukaramai</td></tr>
                                                    <tr><td>3796</td><td>061720</td><td>Medan - Sukaramai</td></tr>
                                                    <tr><td>3797</td><td>061721</td><td>Medan - Sukaramai</td></tr>
                                                    <tr><td>3798</td><td>061722</td><td>Medan - Sukaramai</td></tr>
                                                    <tr><td>3799</td><td>061723</td><td>Medan - Sukaramai</td></tr>
                                                    <tr><td>3800</td><td>061724</td><td>Medan - Sukaramai</td></tr>
                                                    <tr><td>3801</td><td>061725</td><td>Medan - Sukaramai</td></tr>
                                                    <tr><td>3802</td><td>061726</td><td>Medan - Sukaramai</td></tr>
                                                    <tr><td>3803</td><td>061727</td><td>Medan - Sukaramai</td></tr>
                                                    <tr><td>3804</td><td>061728</td><td>Medan - Sukaramai</td></tr>
                                                    <tr><td>3805</td><td>061729</td><td>Medan - Sukaramai</td></tr>
                                                    <tr><td>3806</td><td>061732</td><td>Medan - Sukaramai</td></tr>
                                                    <tr><td>3807</td><td>061734</td><td>Medan - Sukaramai</td></tr>
                                                    <tr><td>3808</td><td>061735</td><td>Medan - Sukaramai</td></tr>
                                                    <tr><td>3809</td><td>061736</td><td>Medan - Sukaramai</td></tr>
                                                    <tr><td>3810</td><td>061740</td><td>Medan - Sukaramai</td></tr>
                                                    <tr><td>3811</td><td>061741</td><td>Medan - Sukaramai</td></tr>
                                                    <tr><td>3812</td><td>061742</td><td>Medan - Sukaramai</td></tr>
                                                    <tr><td>3813</td><td>061743</td><td>Medan - Sukaramai</td></tr>
                                                    <tr><td>3814</td><td>061744</td><td>Medan - Sukaramai</td></tr>
                                                    <tr><td>3815</td><td>061745</td><td>Medan - Sukaramai</td></tr>
                                                    <tr><td>3816</td><td>061746</td><td>Medan - Sukaramai</td></tr>
                                                    <tr><td>3817</td><td>061747</td><td>Medan - Sukaramai</td></tr>
                                                    <tr><td>3818</td><td>061748</td><td>Medan - Sukaramai</td></tr>
                                                    <tr><td>3819</td><td>061749</td><td>Medan - Sukaramai</td></tr>
                                                    <tr><td>3820</td><td>061751</td><td>Medan - Sukaramai</td></tr>
                                                    <tr><td>3821</td><td>061752</td><td>Medan - Sukaramai</td></tr>
                                                    <tr><td>3822</td><td>061753</td><td>Medan - Sukaramai</td></tr>
                                                    <tr><td>3823</td><td>061754</td><td>Medan - Sukaramai</td></tr>
                                                    <tr><td>3824</td><td>061755</td><td>Medan - Sukaramai</td></tr>
                                                    <tr><td>3825</td><td>061756</td><td>Medan - Sukaramai</td></tr>
                                                    <tr><td>3826</td><td>061757</td><td>Medan - Sukaramai</td></tr>
                                                    <tr><td>3827</td><td>061758</td><td>Medan - Sukaramai</td></tr>
                                                    <tr><td>3828</td><td>061759</td><td>Medan - Sukaramai</td></tr>
                                                    <tr><td>3829</td><td>0617380</td><td>Medan - Tembung</td></tr>
                                                    <tr><td>3830</td><td>0617381</td><td>Medan - Tembung</td></tr>
                                                    <tr><td>3831</td><td>0617382</td><td>Medan - Tembung</td></tr>
                                                    <tr><td>3832</td><td>0617383</td><td>Medan - Tembung</td></tr>
                                                    <tr><td>3833</td><td>0617384</td><td>Medan - Tembung</td></tr>
                                                    <tr><td>3834</td><td>0617990</td><td>Perbaungan</td></tr>
                                                    <tr><td>3835</td><td>0617991</td><td>Perbaungan</td></tr>
                                                    <tr><td>3836</td><td>0617998</td><td>Perbaungan</td></tr>
                                                    <tr><td>3837</td><td>0617999</td><td>Perbaungan</td></tr>
                                                    <tr><td>3838</td><td>061794</td><td>Tanjung Morawa</td></tr>
                                                    <tr><td>3839</td><td>061882</td><td>Binjai</td></tr>
                                                    <tr><td>3840</td><td>0618875</td><td>Binjai</td></tr>
                                                    <tr><td>3841</td><td>0618876</td><td>Binjai</td></tr>
                                                    <tr><td>3842</td><td>0618877</td><td>Binjai</td></tr>
                                                    <tr><td>3843</td><td>0618878</td><td>Binjai</td></tr>
                                                    <tr><td>3844</td><td>0618879</td><td>Binjai</td></tr>
                                                    <tr><td>3845</td><td>0618440</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3846</td><td>0618441</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3847</td><td>0618442</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3848</td><td>0618443</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3849</td><td>0618444</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3850</td><td>0618445</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3851</td><td>0618446</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3852</td><td>0618447</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3853</td><td>0618448</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3854</td><td>0618449</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3855</td><td>0618450</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3856</td><td>0618451</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3857</td><td>0618452</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3858</td><td>0618453</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3859</td><td>0618454</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3860</td><td>0618455</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3861</td><td>0618456</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3862</td><td>0618457</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3863</td><td>0618458</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3864</td><td>0618459</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3865</td><td>0618460</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3866</td><td>0618461</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3867</td><td>0618462</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3868</td><td>0618463</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3869</td><td>0618464</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3870</td><td>0618465</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3871</td><td>0618466</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3872</td><td>0618467</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3873</td><td>0618468</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3874</td><td>0618469</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3875</td><td>0618470</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3876</td><td>0618471</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3877</td><td>0618472</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3878</td><td>0618473</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3879</td><td>0618474</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3880</td><td>0618475</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3881</td><td>0618476</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3882</td><td>0618477</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3883</td><td>0618478</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3884</td><td>0618479</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3885</td><td>0618484</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3886</td><td>0618485</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3887</td><td>0618486</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3888</td><td>0618487</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3889</td><td>0618488</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3890</td><td>0618489</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3891</td><td>0618490</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3892</td><td>0618491</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3893</td><td>0618492</td><td>Cinta Damai</td></tr>
                                                    <tr><td>3894</td><td>06184</td><td>Cintadamai</td></tr>
                                                    <tr><td>3895</td><td>06185</td><td>Cintadamai</td></tr>
                                                    <tr><td>3896</td><td>06186</td><td>Cintadamai</td></tr>
                                                    <tr><td>3897</td><td>06187</td><td>Cintadamai</td></tr>
                                                    <tr><td>3898</td><td>06188</td><td>Cintadamai</td></tr>
                                                    <tr><td>3899</td><td>0618930</td><td>Kuala</td></tr>
                                                    <tr><td>3900</td><td>0618210</td><td>Medan - Padang Bulan</td></tr>
                                                    <tr><td>3901</td><td>0618211</td><td>Medan - Padang Bulan</td></tr>
                                                    <tr><td>3902</td><td>0618212</td><td>Medan - Padang Bulan</td></tr>
                                                    <tr><td>3903</td><td>0618213</td><td>Medan - Padang Bulan</td></tr>
                                                    <tr><td>3904</td><td>0618214</td><td>Medan - Padang Bulan</td></tr>
                                                    <tr><td>3905</td><td>0618215</td><td>Medan - Padang Bulan</td></tr>
                                                    <tr><td>3906</td><td>0618216</td><td>Medan - Padang Bulan</td></tr>
                                                    <tr><td>3907</td><td>0618217</td><td>Medan - Padang Bulan</td></tr>
                                                    <tr><td>3908</td><td>0618218</td><td>Medan - Padang Bulan</td></tr>
                                                    <tr><td>3909</td><td>0618219</td><td>Medan - Padang Bulan</td></tr>
                                                    <tr><td>3910</td><td>0618220</td><td>Medan - Padang Bulan</td></tr>
                                                    <tr><td>3911</td><td>0618221</td><td>Medan - Padang Bulan</td></tr>
                                                    <tr><td>3912</td><td>0618222</td><td>Medan - Padang Bulan</td></tr>
                                                    <tr><td>3913</td><td>0618223</td><td>Medan - Padang Bulan</td></tr>
                                                    <tr><td>3914</td><td>0618224</td><td>Medan - Padang Bulan</td></tr>
                                                    <tr><td>3915</td><td>0618225</td><td>Medan - Padang Bulan</td></tr>
                                                    <tr><td>3916</td><td>0618226</td><td>Medan - Padang Bulan</td></tr>
                                                    <tr><td>3917</td><td>0618227</td><td>Medan - Padang Bulan</td></tr>
                                                    <tr><td>3918</td><td>0618228</td><td>Medan - Padang Bulan</td></tr>
                                                    <tr><td>3919</td><td>0618229</td><td>Medan - Padang Bulan</td></tr>
                                                    <tr><td>3920</td><td>0618283</td><td>Medan - Padang Bulan</td></tr>
                                                    <tr><td>3921</td><td>0618285</td><td>Medan - Padang Bulan</td></tr>
                                                    <tr><td>3922</td><td>0618286</td><td>Medan - Padang Bulan</td></tr>
                                                    <tr><td>3923</td><td>0618287</td><td>Medan - Padang Bulan</td></tr>
                                                    <tr><td>3924</td><td>0618288</td><td>Medan - Padang Bulan</td></tr>
                                                    <tr><td>3925</td><td>0618289</td><td>Medan - Padang Bulan</td></tr>
                                                    <tr><td>3926</td><td>061810</td><td>Medan - Padangbulan</td></tr>
                                                    <tr><td>3927</td><td>061811</td><td>Medan - Padangbulan</td></tr>
                                                    <tr><td>3928</td><td>061812</td><td>Medan - Padangbulan</td></tr>
                                                    <tr><td>3929</td><td>061813</td><td>Medan - Padangbulan</td></tr>
                                                    <tr><td>3930</td><td>061814</td><td>Medan - Padangbulan</td></tr>
                                                    <tr><td>3931</td><td>061815</td><td>Medan - Padangbulan</td></tr>
                                                    <tr><td>3932</td><td>061816</td><td>Medan - Padangbulan</td></tr>
                                                    <tr><td>3933</td><td>061817</td><td>Medan - Padangbulan</td></tr>
                                                    <tr><td>3934</td><td>061818</td><td>Medan - Padangbulan</td></tr>
                                                    <tr><td>3935</td><td>061819</td><td>Medan - Padangbulan</td></tr>
                                                    <tr><td>3936</td><td>061820</td><td>Medan - Padangbulan</td></tr>
                                                    <tr><td>3937</td><td>061821</td><td>Medan - Padangbulan</td></tr>
                                                    <tr><td>3938</td><td>061822</td><td>Medan - Padangbulan</td></tr>
                                                    <tr><td>3939</td><td>061823</td><td>Medan - Padangbulan</td></tr>
                                                    <tr><td>3940</td><td>061824</td><td>Medan - Padangbulan</td></tr>
                                                    <tr><td>3941</td><td>061825</td><td>Medan - Padangbulan</td></tr>
                                                    <tr><td>3942</td><td>061826</td><td>Medan - Padangbulan</td></tr>
                                                    <tr><td>3943</td><td>061827</td><td>Medan - Padangbulan</td></tr>
                                                    <tr><td>3944</td><td>061828</td><td>Medan - Padangbulan</td></tr>
                                                    <tr><td>3945</td><td>061829</td><td>Medan - Padangbulan</td></tr>
                                                    <tr><td>3946</td><td>061800</td><td>Medan - Taman Setia Budi</td></tr>
                                                    <tr><td>3947</td><td>061801</td><td>Medan - Taman Setia Budi</td></tr>
                                                    <tr><td>3948</td><td>0618910</td><td>Stabat</td></tr>
                                                    <tr><td>3949</td><td>0618911</td><td>Stabat</td></tr>
                                                    <tr><td>3950</td><td>0618493</td><td>Sunggal</td></tr>
                                                    <tr><td>3951</td><td>0618494</td><td>Sunggal</td></tr>
                                                    <tr><td>3952</td><td>0618495</td><td>Sunggal</td></tr>
                                                    <tr><td>3953</td><td>0618496</td><td>Sunggal</td></tr>
                                                    <tr><td>3954</td><td>0618497</td><td>Sunggal</td></tr>
                                                    <tr><td>3955</td><td>0618498</td><td>Sunggal</td></tr>
                                                    <tr><td>3956</td><td>0618499</td><td>Sunggal</td></tr>
                                                    <tr><td>3957</td><td>061896</td><td>Tanjungpura</td></tr>
                                                    <tr><td>3958</td><td>061830</td><td>Tuntungan</td></tr>
                                                    <tr><td>3959</td><td>061831</td><td>Tuntungan</td></tr>
                                                    <tr><td>3960</td><td>061832</td><td>Tuntungan</td></tr>
                                                    <tr><td>3961</td><td>061833</td><td>Tuntungan</td></tr>
                                                    <tr><td>3962</td><td>061834</td><td>Tuntungan</td></tr>
                                                    <tr><td>3963</td><td>061835</td><td>Tuntungan</td></tr>
                                                    <tr><td>3964</td><td>061836</td><td>Tuntungan</td></tr>
                                                    <tr><td>3965</td><td>0618290</td><td>Tuntungan</td></tr>
                                                    <tr><td>3966</td><td>0618291</td><td>Tuntungan</td></tr>
                                                    <tr><td>3967</td><td>0618292</td><td>Tuntungan</td></tr>
                                                    <tr><td>3968</td><td>0618293</td><td>Tuntungan</td></tr>
                                                    <tr><td>3969</td><td>0618294</td><td>Tuntungan</td></tr>
                                                    <tr><td>3970</td><td>0618295</td><td>Tuntungan</td></tr>
                                                    <tr><td>3971</td><td>0618296</td><td>Tuntungan</td></tr>
                                                    <tr><td>3972</td><td>0618297</td><td>Tuntungan</td></tr>
                                                    <tr><td>3973</td><td>0618298</td><td>Tuntungan</td></tr>
                                                    <tr><td>3974</td><td>0618299</td><td>Tuntungan</td></tr>
                                                    <tr><td>3975</td><td>061920</td><td>Binjai</td></tr>
                                                    <tr><td>3976</td><td>061921</td><td>Binjai</td></tr>
                                                    <tr><td>3977</td><td>061922</td><td>Binjai</td></tr>
                                                    <tr><td>3978</td><td>061923</td><td>Binjai</td></tr>
                                                    <tr><td>3979</td><td>061924</td><td>Binjai</td></tr>
                                                    <tr><td>3980</td><td>061925</td><td>Binjai</td></tr>
                                                    <tr><td>3981</td><td>061926</td><td>Binjai</td></tr>
                                                    <tr><td>3982</td><td>061927</td><td>Binjai</td></tr>
                                                    <tr><td>3983</td><td>061928</td><td>Binjai</td></tr>
                                                    <tr><td>3984</td><td>061929</td><td>Binjai</td></tr>
                                                    <tr><td>3985</td><td>061958</td><td>Galang</td></tr>
                                                    <tr><td>3986</td><td>06193</td><td>Kuala</td></tr>
                                                    <tr><td>3987</td><td>061950</td><td>Lubukpakam</td></tr>
                                                    <tr><td>3988</td><td>061951</td><td>Lubukpakam</td></tr>
                                                    <tr><td>3989</td><td>061952</td><td>Lubukpakam</td></tr>
                                                    <tr><td>3990</td><td>061953</td><td>Lubukpakam</td></tr>
                                                    <tr><td>3991</td><td>061954</td><td>Lubukpakam</td></tr>
                                                    <tr><td>3992</td><td>061955</td><td>Lubukpakam</td></tr>
                                                    <tr><td>3993</td><td>061957</td><td>Medan - Pantai Cermin</td></tr>
                                                    <tr><td>3994</td><td>061959</td><td>Perbaungan</td></tr>
                                                    <tr><td>3995</td><td>061940</td><td>Tanjung Morawa</td></tr>
                                                    <tr><td>3996</td><td>061941</td><td>Tanjung Morawa</td></tr>
                                                    <tr><td>3997</td><td>061942</td><td>Tanjung Morawa</td></tr>
                                                    <tr><td>3998</td><td>061943</td><td>Tanjung Morawa</td></tr>
                                                    <tr><td>3999</td><td>061944</td><td>Tanjung Morawa</td></tr>
                                                    <tr><td>4000</td><td>061945</td><td>Tanjung Morawa</td></tr>
                                                    <tr><td>4001</td><td>061946</td><td>Tanjung Morawa</td></tr>
                                                    <tr><td>4002</td><td>061947</td><td>Tanjung Morawa</td></tr>
                                                    <tr><td>4003</td><td>061960</td><td>Tanjungpura</td></tr>
                                                    <tr><td>4004</td><td>061961</td><td>Tanjungpura</td></tr>
                                                    <tr><td>4005</td><td>0620</td><td>Pangkalanbrandan</td></tr>
                                                    <tr><td>4006</td><td>06201</td><td>Pangkalanbrandan</td></tr>
                                                    <tr><td>4007</td><td>062020</td><td>Pangkalanbrandan</td></tr>
                                                    <tr><td>4008</td><td>062021</td><td>Pangkalanbrandan</td></tr>
                                                    <tr><td>4009</td><td>0620322</td><td>Pangkalanbrandan</td></tr>
                                                    <tr><td>4010</td><td>0620323</td><td>Pangkalanbrandan</td></tr>
                                                    <tr><td>4011</td><td>062051</td><td>Pangkalansusu</td></tr>
                                                    <tr><td>4012</td><td>062052</td><td>Pangkalansusu</td></tr>
                                                    <tr><td>4013</td><td>0620350</td><td>Pekan Besitang</td></tr>
                                                    <tr><td>4014</td><td>0620340</td><td>Tangkahan Durian</td></tr>
                                                    <tr><td>4015</td><td>0621391</td><td>Dolokmasihul</td></tr>
                                                    <tr><td>4016</td><td>062141</td><td>Seirampah</td></tr>
                                                    <tr><td>4017</td><td>0621441</td><td>Seirampah</td></tr>
                                                    <tr><td>4018</td><td>0621</td><td>Tebingtinggi</td></tr>
                                                    <tr><td>4019</td><td>06211</td><td>Tebingtinggi</td></tr>
                                                    <tr><td>4020</td><td>062121</td><td>Tebingtinggi</td></tr>
                                                    <tr><td>4021</td><td>062122</td><td>Tebingtinggi</td></tr>
                                                    <tr><td>4022</td><td>062123</td><td>Tebingtinggi</td></tr>
                                                    <tr><td>4023</td><td>062124</td><td>Tebingtinggi</td></tr>
                                                    <tr><td>4024</td><td>062125</td><td>Tebingtinggi</td></tr>
                                                    <tr><td>4025</td><td>0621325</td><td>Tebingtinggi</td></tr>
                                                    <tr><td>4026</td><td>0621326</td><td>Tebingtinggi</td></tr>
                                                    <tr><td>4027</td><td>0621327</td><td>Tebingtinggi</td></tr>
                                                    <tr><td>4028</td><td>0621328</td><td>Tebingtinggi</td></tr>
                                                    <tr><td>4029</td><td>0621329</td><td>Tebingtinggi</td></tr>
                                                    <tr><td>4030</td><td>0622563</td><td>Bah Jambi</td></tr>
                                                    <tr><td>4031</td><td>0622340</td><td>Bah. Bangun</td></tr>
                                                    <tr><td>4032</td><td>0622307</td><td>Bangun</td></tr>
                                                    <tr><td>4033</td><td>0622773</td><td>Gunung Pamela</td></tr>
                                                    <tr><td>4034</td><td>0622646</td><td>Indrapura</td></tr>
                                                    <tr><td>4035</td><td>0622303</td><td>Kerasaan</td></tr>
                                                    <tr><td>4036</td><td>0622620</td><td>Kuala Tanjung</td></tr>
                                                    <tr><td>4037</td><td>0622613</td><td>Medang Deras</td></tr>
                                                    <tr><td>4038</td><td>062250</td><td>Pamekasan - Rambung Merah</td></tr>
                                                    <tr><td>4039</td><td>062251</td><td>Pamekasan - Rambung Merah</td></tr>
                                                    <tr><td>4040</td><td>062252</td><td>Pamekasan - Rambung Merah</td></tr>
                                                    <tr><td>4041</td><td>0622570</td><td>Pamekasan - Rambung Merah</td></tr>
                                                    <tr><td>4042</td><td>0622300</td><td>Pematang Bandar</td></tr>
                                                    <tr><td>4043</td><td>0622648</td><td>Pematang Panjang</td></tr>
                                                    <tr><td>4044</td><td>0622</td><td>Pematangsiantar</td></tr>
                                                    <tr><td>4045</td><td>06221</td><td>Pematangsiantar</td></tr>
                                                    <tr><td>4046</td><td>062221</td><td>Pematangsiantar</td></tr>
                                                    <tr><td>4047</td><td>062222</td><td>Pematangsiantar</td></tr>
                                                    <tr><td>4048</td><td>062223</td><td>Pematangsiantar</td></tr>
                                                    <tr><td>4049</td><td>062224</td><td>Pematangsiantar</td></tr>
                                                    <tr><td>4050</td><td>062225</td><td>Pematangsiantar</td></tr>
                                                    <tr><td>4051</td><td>062226</td><td>Pematangsiantar</td></tr>
                                                    <tr><td>4052</td><td>062227</td><td>Pematangsiantar</td></tr>
                                                    <tr><td>4053</td><td>062228</td><td>Pematangsiantar</td></tr>
                                                    <tr><td>4054</td><td>062229</td><td>Pematangsiantar</td></tr>
                                                    <tr><td>4055</td><td>062238</td><td>Pematangsiantar</td></tr>
                                                    <tr><td>4056</td><td>0622420</td><td>Pematangsiantar</td></tr>
                                                    <tr><td>4057</td><td>0622430</td><td>Pematangsiantar</td></tr>
                                                    <tr><td>4058</td><td>0622431</td><td>Pematangsiantar</td></tr>
                                                    <tr><td>4059</td><td>0622432</td><td>Pematangsiantar</td></tr>
                                                    <tr><td>4060</td><td>0622460</td><td>Pematangsiantar</td></tr>
                                                    <tr><td>4061</td><td>062296</td><td>Perdagangan</td></tr>
                                                    <tr><td>4062</td><td>062264</td><td>Serbelawan</td></tr>
                                                    <tr><td>4063</td><td>0622764</td><td>Serbelawan</td></tr>
                                                    <tr><td>4064</td><td>0622465</td><td>Sinaksak</td></tr>
                                                    <tr><td>4065</td><td>0622647</td><td>Tanggabesi</td></tr>
                                                    <tr><td>4066</td><td>062231</td><td>Tanjunggading</td></tr>
                                                    <tr><td>4067</td><td>0622632</td><td>Tanjunggading</td></tr>
                                                    <tr><td>4068</td><td>0623</td><td>Kisaran</td></tr>
                                                    <tr><td>4069</td><td>06231</td><td>Kisaran</td></tr>
                                                    <tr><td>4070</td><td>062341</td><td>Kisaran</td></tr>
                                                    <tr><td>4071</td><td>062342</td><td>Kisaran</td></tr>
                                                    <tr><td>4072</td><td>062343</td><td>Kisaran</td></tr>
                                                    <tr><td>4073</td><td>062344</td><td>Kisaran</td></tr>
                                                    <tr><td>4074</td><td>0623345</td><td>Kisaran</td></tr>
                                                    <tr><td>4075</td><td>0623346</td><td>Kisaran</td></tr>
                                                    <tr><td>4076</td><td>0623347</td><td>Kisaran</td></tr>
                                                    <tr><td>4077</td><td>062351</td><td>Labuhanruku</td></tr>
                                                    <tr><td>4078</td><td>0623100</td><td>Pulaurakyat</td></tr>
                                                    <tr><td>4079</td><td>0623355</td><td>Pulaurakyat</td></tr>
                                                    <tr><td>4080</td><td>062392</td><td>Tanjungbalaiasahan</td></tr>
                                                    <tr><td>4081</td><td>062393</td><td>Tanjungbalaiasahan</td></tr>
                                                    <tr><td>4082</td><td>062394</td><td>Tanjungbalaiasahan</td></tr>
                                                    <tr><td>4083</td><td>062395</td><td>Tanjungbalaiasahan</td></tr>
                                                    <tr><td>4084</td><td>0623595</td><td>Tanjungbalaiasahan</td></tr>
                                                    <tr><td>4085</td><td>0623596</td><td>Tanjungbalaiasahan</td></tr>
                                                    <tr><td>4086</td><td>0623597</td><td>Tanjungbalaiasahan</td></tr>
                                                    <tr><td>4087</td><td>0623598</td><td>Tanjungbalaiasahan</td></tr>
                                                    <tr><td>4088</td><td>062371</td><td>Tanjungledong</td></tr>
                                                    <tr><td>4089</td><td>0624371</td><td>Aek Kota Baru</td></tr>
                                                    <tr><td>4090</td><td>0624441</td><td>Aekgoti</td></tr>
                                                    <tr><td>4091</td><td>062492</td><td>Aekkanopan</td></tr>
                                                    <tr><td>4092</td><td>0624692</td><td>Aekkanopan</td></tr>
                                                    <tr><td>4093</td><td>0624693</td><td>Aekkanopan</td></tr>
                                                    <tr><td>4094</td><td>062429</td><td>Aeknabara</td></tr>
                                                    <tr><td>4095</td><td>0624520</td><td>Aeknabara</td></tr>
                                                    <tr><td>4096</td><td>0624361</td><td>Bandardurian</td></tr>
                                                    <tr><td>4097</td><td>0624671</td><td>Bandarlama</td></tr>
                                                    <tr><td>4098</td><td>062495</td><td>Kotapinang</td></tr>
                                                    <tr><td>4099</td><td>0624495</td><td>Kotapinang</td></tr>
                                                    <tr><td>4100</td><td>0624496</td><td>Kotapinang</td></tr>
                                                    <tr><td>4101</td><td>0624445</td><td>Langgapayung</td></tr>
                                                    <tr><td>4102</td><td>0624381</td><td>Merbau</td></tr>
                                                    <tr><td>4103</td><td>0624551</td><td>Negeri Baru</td></tr>
                                                    <tr><td>4104</td><td>0624356</td><td>Pulau Padang</td></tr>
                                                    <tr><td>4105</td><td>0624351</td><td>Rantau Prapat</td></tr>
                                                    <tr><td>4106</td><td>0624</td><td>Rantauprapat</td></tr>
                                                    <tr><td>4107</td><td>06241</td><td>Rantauprapat</td></tr>
                                                    <tr><td>4108</td><td>062421</td><td>Rantauprapat</td></tr>
                                                    <tr><td>4109</td><td>062422</td><td>Rantauprapat</td></tr>
                                                    <tr><td>4110</td><td>062423</td><td>Rantauprapat</td></tr>
                                                    <tr><td>4111</td><td>062424</td><td>Rantauprapat</td></tr>
                                                    <tr><td>4112</td><td>062425</td><td>Rantauprapat</td></tr>
                                                    <tr><td>4113</td><td>0624325</td><td>Rantauprapat</td></tr>
                                                    <tr><td>4114</td><td>0624326</td><td>Rantauprapat</td></tr>
                                                    <tr><td>4115</td><td>0624327</td><td>Rantauprapat</td></tr>
                                                    <tr><td>4116</td><td>0624571</td><td>Sei Brombang</td></tr>
                                                    <tr><td>4117</td><td>0624358</td><td>Sigambal</td></tr>
                                                    <tr><td>4118</td><td>0625451</td><td>Ambarita</td></tr>
                                                    <tr><td>4119</td><td>0625</td><td>Parapat</td></tr>
                                                    <tr><td>4120</td><td>06251</td><td>Parapat</td></tr>
                                                    <tr><td>4121</td><td>062541</td><td>Parapat</td></tr>
                                                    <tr><td>4122</td><td>062542</td><td>Parapat</td></tr>
                                                    <tr><td>4123</td><td>0626</td><td>Pangururan</td></tr>
                                                    <tr><td>4124</td><td>06261</td><td>Pangururan</td></tr>
                                                    <tr><td>4125</td><td>062620</td><td>Pangururan</td></tr>
                                                    <tr><td>4126</td><td>062621</td><td>Pangururan</td></tr>
                                                    <tr><td>4127</td><td>0627439</td><td>Bandar Hutausang</td></tr>
                                                    <tr><td>4128</td><td>0627435</td><td>Buntu Raja</td></tr>
                                                    <tr><td>4129</td><td>0627441</td><td>Dolok Sulu-Sulu</td></tr>
                                                    <tr><td>4130</td><td>0627437</td><td>Jambur Indonesia</td></tr>
                                                    <tr><td>4131</td><td>0627431</td><td>Parbuluhan</td></tr>
                                                    <tr><td>4132</td><td>0627434</td><td>Parongil</td></tr>
                                                    <tr><td>4133</td><td>062743</td><td>Salak</td></tr>
                                                    <tr><td>4134</td><td>0627</td><td>Sidikalang</td></tr>
                                                    <tr><td>4135</td><td>06271</td><td>Sidikalang</td></tr>
                                                    <tr><td>4136</td><td>062721</td><td>Sidikalang</td></tr>
                                                    <tr><td>4137</td><td>062722</td><td>Sidikalang</td></tr>
                                                    <tr><td>4138</td><td>062723</td><td>Sidikalang</td></tr>
                                                    <tr><td>4139</td><td>062724</td><td>Sidikalang</td></tr>
                                                    <tr><td>4140</td><td>0627430</td><td>Silalahi</td></tr>
                                                    <tr><td>4141</td><td>0627438</td><td>Silimboyah</td></tr>
                                                    <tr><td>4142</td><td>062731</td><td>Subussalam</td></tr>
                                                    <tr><td>4143</td><td>0627432</td><td>Sukaramai</td></tr>
                                                    <tr><td>4144</td><td>0627450</td><td>Sumbul</td></tr>
                                                    <tr><td>4145</td><td>0627436</td><td>Tiga Lingga</td></tr>
                                                    <tr><td>4146</td><td>062897</td><td>Bandarbaru</td></tr>
                                                    <tr><td>4147</td><td>062898</td><td>Bandarbaru</td></tr>
                                                    <tr><td>4148</td><td>0628353</td><td>Barusjahe</td></tr>
                                                    <tr><td>4149</td><td>062891</td><td>Brastagi</td></tr>
                                                    <tr><td>4150</td><td>062892</td><td>Brastagi</td></tr>
                                                    <tr><td>4151</td><td>062893</td><td>Brastagi</td></tr>
                                                    <tr><td>4152</td><td>0628</td><td>Kabanjahe</td></tr>
                                                    <tr><td>4153</td><td>06281</td><td>Kabanjahe</td></tr>
                                                    <tr><td>4154</td><td>062820</td><td>Kabanjahe</td></tr>
                                                    <tr><td>4155</td><td>062821</td><td>Kabanjahe</td></tr>
                                                    <tr><td>4156</td><td>062822</td><td>Kabanjahe</td></tr>
                                                    <tr><td>4157</td><td>0628323</td><td>Kabanjahe</td></tr>
                                                    <tr><td>4158</td><td>0628324</td><td>Kabanjahe</td></tr>
                                                    <tr><td>4159</td><td>0628364</td><td>Kutabuluh Berteng</td></tr>
                                                    <tr><td>4160</td><td>0628363</td><td>Kutabuluh Simole</td></tr>
                                                    <tr><td>4161</td><td>0628357</td><td>Merek</td></tr>
                                                    <tr><td>4162</td><td>0628361</td><td>Munthe</td></tr>
                                                    <tr><td>4163</td><td>0628410</td><td>Tiga Binanga</td></tr>
                                                    <tr><td>4164</td><td>0628362</td><td>Tiga Nderket</td></tr>
                                                    <tr><td>4165</td><td>0629</td><td>Kutacane</td></tr>
                                                    <tr><td>4166</td><td>06291</td><td>Kutacane</td></tr>
                                                    <tr><td>4167</td><td>062921</td><td>Kutacane</td></tr>
                                                    <tr><td>4168</td><td>0630</td><td>Telukdalam</td></tr>
                                                    <tr><td>4169</td><td>06301</td><td>Telukdalam</td></tr>
                                                    <tr><td>4170</td><td>063021</td><td>Telukdalam</td></tr>
                                                    <tr><td>4171</td><td>0631</td><td>Sibolga</td></tr>
                                                    <tr><td>4172</td><td>06311</td><td>Sibolga</td></tr>
                                                    <tr><td>4173</td><td>063121</td><td>Sibolga</td></tr>
                                                    <tr><td>4174</td><td>063122</td><td>Sibolga</td></tr>
                                                    <tr><td>4175</td><td>063123</td><td>Sibolga</td></tr>
                                                    <tr><td>4176</td><td>063124</td><td>Sibolga</td></tr>
                                                    <tr><td>4177</td><td>063125</td><td>Sibolga</td></tr>
                                                    <tr><td>4178</td><td>063126</td><td>Sibolga</td></tr>
                                                    <tr><td>4179</td><td>063127</td><td>Sibolga</td></tr>
                                                    <tr><td>4180</td><td>0632</td><td>Balige</td></tr>
                                                    <tr><td>4181</td><td>06321</td><td>Balige</td></tr>
                                                    <tr><td>4182</td><td>063221</td><td>Balige</td></tr>
                                                    <tr><td>4183</td><td>0632322</td><td>Balige</td></tr>
                                                    <tr><td>4184</td><td>063241</td><td>Porsea</td></tr>
                                                    <tr><td>4185</td><td>0632341</td><td>Porsea</td></tr>
                                                    <tr><td>4186</td><td>0632342</td><td>Porsea</td></tr>
                                                    <tr><td>4187</td><td>063331</td><td>Doloksanggul</td></tr>
                                                    <tr><td>4188</td><td>063332</td><td>Doloksanggul</td></tr>
                                                    <tr><td>4189</td><td>063341</td><td>Siborongborong</td></tr>
                                                    <tr><td>4190</td><td>063342</td><td>Siborongborong</td></tr>
                                                    <tr><td>4191</td><td>063343</td><td>Siborongborong</td></tr>
                                                    <tr><td>4192</td><td>0633</td><td>Tarutung</td></tr>
                                                    <tr><td>4193</td><td>06331</td><td>Tarutung</td></tr>
                                                    <tr><td>4194</td><td>063320</td><td>Tarutung</td></tr>
                                                    <tr><td>4195</td><td>063321</td><td>Tarutung</td></tr>
                                                    <tr><td>4196</td><td>0634370</td><td>Batang Toru</td></tr>
                                                    <tr><td>4197</td><td>0634</td><td>Padangsidempuan</td></tr>
                                                    <tr><td>4198</td><td>06341</td><td>Padangsidempuan</td></tr>
                                                    <tr><td>4199</td><td>063421</td><td>Padangsidempuan</td></tr>
                                                    <tr><td>4200</td><td>063422</td><td>Padangsidempuan</td></tr>
                                                    <tr><td>4201</td><td>063423</td><td>Padangsidempuan</td></tr>
                                                    <tr><td>4202</td><td>063424</td><td>Padangsidempuan</td></tr>
                                                    <tr><td>4203</td><td>063425</td><td>Padangsidempuan</td></tr>
                                                    <tr><td>4204</td><td>063426</td><td>Padangsidempuan</td></tr>
                                                    <tr><td>4205</td><td>0634360</td><td>Pargarutan</td></tr>
                                                    <tr><td>4206</td><td>0634353</td><td>Siais</td></tr>
                                                    <tr><td>4207</td><td>063441</td><td>Sipirok</td></tr>
                                                    <tr><td>4208</td><td>0634350</td><td>Sitinjak</td></tr>
                                                    <tr><td>4209</td><td>0634357</td><td>Sosopan</td></tr>
                                                    <tr><td>4210</td><td>0636</td><td>Kotanopan</td></tr>
                                                    <tr><td>4211</td><td>06361</td><td>Kotanopan</td></tr>
                                                    <tr><td>4212</td><td>063641</td><td>Kotanopan</td></tr>
                                                    <tr><td>4213</td><td>063620</td><td>Panyabungan</td></tr>
                                                    <tr><td>4214</td><td>0636421</td><td>Sibuhuan</td></tr>
                                                    <tr><td>4215</td><td>0639323</td><td>Gunung Sitoli</td></tr>
                                                    <tr><td>4216</td><td>0639324</td><td>Gunung Sitoli</td></tr>
                                                    <tr><td>4217</td><td>0639</td><td>Gunungsitoli</td></tr>
                                                    <tr><td>4218</td><td>06391</td><td>Gunungsitoli</td></tr>
                                                    <tr><td>4219</td><td>063921</td><td>Gunungsitoli</td></tr>
                                                    <tr><td>4220</td><td>063922</td><td>Gunungsitoli</td></tr>
                                                    <tr><td>4221</td><td>0641440</td><td>Birem Rayeuk</td></tr>
                                                    <tr><td>4222</td><td>064131</td><td>Kualasimpang</td></tr>
                                                    <tr><td>4223</td><td>064132</td><td>Kualasimpang</td></tr>
                                                    <tr><td>4224</td><td>0641332</td><td>Kualasimpang</td></tr>
                                                    <tr><td>4225</td><td>0641</td><td>Langsa</td></tr>
                                                    <tr><td>4226</td><td>06411</td><td>Langsa</td></tr>
                                                    <tr><td>4227</td><td>064120</td><td>Langsa</td></tr>
                                                    <tr><td>4228</td><td>064121</td><td>Langsa</td></tr>
                                                    <tr><td>4229</td><td>064122</td><td>Langsa</td></tr>
                                                    <tr><td>4230</td><td>064123</td><td>Langsa</td></tr>
                                                    <tr><td>4231</td><td>0641424</td><td>Langsa</td></tr>
                                                    <tr><td>4232</td><td>0641425</td><td>Langsa</td></tr>
                                                    <tr><td>4233</td><td>0641350</td><td>Rantau Pertamina</td></tr>
                                                    <tr><td>4234</td><td>06421</td><td>Blangkejeran</td></tr>
                                                    <tr><td>4235</td><td>064221</td><td>Blangkejeran</td></tr>
                                                    <tr><td>4236</td><td>0642</td><td>Blangkejeren</td></tr>
                                                    <tr><td>4237</td><td>0642431</td><td>Kotapanjang</td></tr>
                                                    <tr><td>4238</td><td>0642433</td><td>Rikitgaib</td></tr>
                                                    <tr><td>4239</td><td>0642435</td><td>Tranggon</td></tr>
                                                    <tr><td>4240</td><td>0643</td><td>Takengon</td></tr>
                                                    <tr><td>4241</td><td>06431</td><td>Takengon</td></tr>
                                                    <tr><td>4242</td><td>064321</td><td>Takengon</td></tr>
                                                    <tr><td>4243</td><td>064322</td><td>Takengon</td></tr>
                                                    <tr><td>4244</td><td>0644</td><td>Bireuen</td></tr>
                                                    <tr><td>4245</td><td>06441</td><td>Bireuen</td></tr>
                                                    <tr><td>4246</td><td>064421</td><td>Bireuen</td></tr>
                                                    <tr><td>4247</td><td>064422</td><td>Bireuen</td></tr>
                                                    <tr><td>4248</td><td>0644323</td><td>Bireuen</td></tr>
                                                    <tr><td>4249</td><td>0644324</td><td>Bireuen</td></tr>
                                                    <tr><td>4250</td><td>0644325</td><td>Bireuen</td></tr>
                                                    <tr><td>4251</td><td>0644451</td><td>Geurogok</td></tr>
                                                    <tr><td>4252</td><td>064441</td><td>Matanglumpangdua</td></tr>
                                                    <tr><td>4253</td><td>0644441</td><td>Matanglumpangdua</td></tr>
                                                    <tr><td>4254</td><td>0644351</td><td>Peudada</td></tr>
                                                    <tr><td>4255</td><td>064431</td><td>Samalanga</td></tr>
                                                    <tr><td>4256</td><td>064598</td><td>Alue Putih</td></tr>
                                                    <tr><td>4257</td><td>0645371</td><td>Blangjreun</td></tr>
                                                    <tr><td>4258</td><td>064583</td><td>Geudong</td></tr>
                                                    <tr><td>4259</td><td>064584</td><td>Geudong</td></tr>
                                                    <tr><td>4260</td><td>0645530</td><td>Keude Amplah</td></tr>
                                                    <tr><td>4261</td><td>0645</td><td>Lhokseumawe</td></tr>
                                                    <tr><td>4262</td><td>06451</td><td>Lhokseumawe</td></tr>
                                                    <tr><td>4263</td><td>064540</td><td>Lhokseumawe</td></tr>
                                                    <tr><td>4264</td><td>064541</td><td>Lhokseumawe</td></tr>
                                                    <tr><td>4265</td><td>064542</td><td>Lhokseumawe</td></tr>
                                                    <tr><td>4266</td><td>064543</td><td>Lhokseumawe</td></tr>
                                                    <tr><td>4267</td><td>064544</td><td>Lhokseumawe</td></tr>
                                                    <tr><td>4268</td><td>064545</td><td>Lhokseumawe</td></tr>
                                                    <tr><td>4269</td><td>064546</td><td>Lhokseumawe</td></tr>
                                                    <tr><td>4270</td><td>064547</td><td>Lhokseumawe</td></tr>
                                                    <tr><td>4271</td><td>064548</td><td>Lhokseumawe</td></tr>
                                                    <tr><td>4272</td><td>064549</td><td>Lhokseumawe</td></tr>
                                                    <tr><td>4273</td><td>0645651</td><td>Lhokseumawe</td></tr>
                                                    <tr><td>4274</td><td>0645652</td><td>Lhokseumawe</td></tr>
                                                    <tr><td>4275</td><td>0645653</td><td>Lhokseumawe</td></tr>
                                                    <tr><td>4276</td><td>0645654</td><td>Lhokseumawe</td></tr>
                                                    <tr><td>4277</td><td>064556</td><td>Lhokseumawe - Arun</td></tr>
                                                    <tr><td>4278</td><td>064557</td><td>Lhokseumawe - Arun</td></tr>
                                                    <tr><td>4279</td><td>064558</td><td>Lhokseumawe - Arun</td></tr>
                                                    <tr><td>4280</td><td>064559</td><td>Lhokseumawe - Arun</td></tr>
                                                    <tr><td>4281</td><td>064531</td><td>Lhokseumawe - Mobil Oil</td></tr>
                                                    <tr><td>4282</td><td>0645393</td><td>Lhoksukon</td></tr>
                                                    <tr><td>4283</td><td>0645394</td><td>Lhoksukon</td></tr>
                                                    <tr><td>4284</td><td>0645395</td><td>Lhoksukon</td></tr>
                                                    <tr><td>4285</td><td>064586</td><td>Matangkuli</td></tr>
                                                    <tr><td>4286</td><td>064591</td><td>Pantonlabu</td></tr>
                                                    <tr><td>4287</td><td>0645520</td><td>Sawang</td></tr>
                                                    <tr><td>4288</td><td>064599</td><td>Senedon</td></tr>
                                                    <tr><td>4289</td><td>0645750</td><td>Simpangmulieng</td></tr>
                                                    <tr><td>4290</td><td>0645510</td><td>Ulegle</td></tr>
                                                    <tr><td>4291</td><td>064621</td><td>Idi</td></tr>
                                                    <tr><td>4292</td><td>064622</td><td>Idi</td></tr>
                                                    <tr><td>4293</td><td>0646522</td><td>Idi</td></tr>
                                                    <tr><td>4294</td><td>0646508</td><td>Kuta Binjai</td></tr>
                                                    <tr><td>4295</td><td>0646</td><td>Peureula</td></tr>
                                                    <tr><td>4296</td><td>06461</td><td>Peureula</td></tr>
                                                    <tr><td>4297</td><td>064631</td><td>Peureula</td></tr>
                                                    <tr><td>4298</td><td>0646531</td><td>Peureula</td></tr>
                                                    <tr><td>4299</td><td>065021</td><td>Sinabang</td></tr>
                                                    <tr><td>4300</td><td>065151</td><td>Banda Aceh - Darussalam</td></tr>
                                                    <tr><td>4301</td><td>065152</td><td>Banda Aceh - Darussalam</td></tr>
                                                    <tr><td>4302</td><td>065153</td><td>Banda Aceh - Darussalam</td></tr>
                                                    <tr><td>4303</td><td>065154</td><td>Banda Aceh - Darussalam</td></tr>
                                                    <tr><td>4304</td><td>065141</td><td>Banda Aceh - Lamteuneun</td></tr>
                                                    <tr><td>4305</td><td>065142</td><td>Banda Aceh - Lamteuneun</td></tr>
                                                    <tr><td>4306</td><td>065143</td><td>Banda Aceh - Lamteuneun</td></tr>
                                                    <tr><td>4307</td><td>065144</td><td>Banda Aceh - Lamteuneun</td></tr>
                                                    <tr><td>4308</td><td>065145</td><td>Banda Aceh - Lamteuneun</td></tr>
                                                    <tr><td>4309</td><td>065146</td><td>Banda Aceh - Lamteuneun</td></tr>
                                                    <tr><td>4310</td><td>065147</td><td>Banda Aceh - Lamteuneun</td></tr>
                                                    <tr><td>4311</td><td>065148</td><td>Banda Aceh - Lamteuneun</td></tr>
                                                    <tr><td>4312</td><td>0651</td><td>Bandaaceh</td></tr>
                                                    <tr><td>4313</td><td>06511</td><td>Bandaaceh</td></tr>
                                                    <tr><td>4314</td><td>065120</td><td>Bandaaceh</td></tr>
                                                    <tr><td>4315</td><td>065121</td><td>Bandaaceh</td></tr>
                                                    <tr><td>4316</td><td>065122</td><td>Bandaaceh</td></tr>
                                                    <tr><td>4317</td><td>065123</td><td>Bandaaceh</td></tr>
                                                    <tr><td>4318</td><td>065124</td><td>Bandaaceh</td></tr>
                                                    <tr><td>4319</td><td>065125</td><td>Bandaaceh</td></tr>
                                                    <tr><td>4320</td><td>065126</td><td>Bandaaceh</td></tr>
                                                    <tr><td>4321</td><td>065127</td><td>Bandaaceh</td></tr>
                                                    <tr><td>4322</td><td>065128</td><td>Bandaaceh</td></tr>
                                                    <tr><td>4323</td><td>065129</td><td>Bandaaceh</td></tr>
                                                    <tr><td>4324</td><td>065131</td><td>Bandaaceh</td></tr>
                                                    <tr><td>4325</td><td>065132</td><td>Bandaaceh</td></tr>
                                                    <tr><td>4326</td><td>065133</td><td>Bandaaceh</td></tr>
                                                    <tr><td>4327</td><td>065134</td><td>Bandaaceh</td></tr>
                                                    <tr><td>4328</td><td>065135</td><td>Bandaaceh</td></tr>
                                                    <tr><td>4329</td><td>065136</td><td>Bandaaceh</td></tr>
                                                    <tr><td>4330</td><td>065192</td><td>Jantho</td></tr>
                                                    <tr><td>4331</td><td>065195</td><td>Lamno</td></tr>
                                                    <tr><td>4332</td><td>065193</td><td>Seulimeum</td></tr>
                                                    <tr><td>4333</td><td>0652</td><td>Sabang</td></tr>
                                                    <tr><td>4334</td><td>06521</td><td>Sabang</td></tr>
                                                    <tr><td>4335</td><td>065221</td><td>Sabang</td></tr>
                                                    <tr><td>4336</td><td>065222</td><td>Sabang</td></tr>
                                                    <tr><td>4337</td><td>0653821</td><td>Beureunun</td></tr>
                                                    <tr><td>4338</td><td>0653822</td><td>Beureunun</td></tr>
                                                    <tr><td>4339</td><td>065351</td><td>Meureudu</td></tr>
                                                    <tr><td>4340</td><td>0653</td><td>Sigli</td></tr>
                                                    <tr><td>4341</td><td>06531</td><td>Sigli</td></tr>
                                                    <tr><td>4342</td><td>065321</td><td>Sigli</td></tr>
                                                    <tr><td>4343</td><td>065322</td><td>Sigli</td></tr>
                                                    <tr><td>4344</td><td>065323</td><td>Sigli</td></tr>
                                                    <tr><td>4345</td><td>065324</td><td>Sigli</td></tr>
                                                    <tr><td>4346</td><td>065325</td><td>Sigli</td></tr>
                                                    <tr><td>4347</td><td>065326</td><td>Sigli</td></tr>
                                                    <tr><td>4348</td><td>065371</td><td>Tangse</td></tr>
                                                    <tr><td>4349</td><td>0654</td><td>Calang</td></tr>
                                                    <tr><td>4350</td><td>06541</td><td>Calang</td></tr>
                                                    <tr><td>4351</td><td>065421</td><td>Calang</td></tr>
                                                    <tr><td>4352</td><td>065541</td><td>Jeuram</td></tr>
                                                    <tr><td>4353</td><td>0655</td><td>Meulaboh</td></tr>
                                                    <tr><td>4354</td><td>06551</td><td>Meulaboh</td></tr>
                                                    <tr><td>4355</td><td>065521</td><td>Meulaboh</td></tr>
                                                    <tr><td>4356</td><td>065522</td><td>Meulaboh</td></tr>
                                                    <tr><td>4357</td><td>065523</td><td>Meulaboh</td></tr>
                                                    <tr><td>4358</td><td>065524</td><td>Meulaboh</td></tr>
                                                    <tr><td>4359</td><td>065525</td><td>Meulaboh</td></tr>
                                                    <tr><td>4360</td><td>065526</td><td>Meulaboh</td></tr>
                                                    <tr><td>4361</td><td>0656</td><td>Tapaktuan</td></tr>
                                                    <tr><td>4362</td><td>06561</td><td>Tapaktuan</td></tr>
                                                    <tr><td>4363</td><td>065621</td><td>Tapaktuan</td></tr>
                                                    <tr><td>4364</td><td>0656321</td><td>Tapaktuan</td></tr>
                                                    <tr><td>4365</td><td>0656322</td><td>Tapaktuan</td></tr>
                                                    <tr><td>4366</td><td>0657</td><td>Bakongan</td></tr>
                                                    <tr><td>4367</td><td>06571</td><td>Bakongan</td></tr>
                                                    <tr><td>4368</td><td>065721</td><td>Bakongan</td></tr>
                                                    <tr><td>4369</td><td>0658</td><td>Singkil</td></tr>
                                                    <tr><td>4370</td><td>06581</td><td>Singkil</td></tr>
                                                    <tr><td>4371</td><td>065821</td><td>Singkil</td></tr>
                                                    <tr><td>4372</td><td>0659</td><td>Blangpidie</td></tr>
                                                    <tr><td>4373</td><td>06591</td><td>Blangpidie</td></tr>
                                                    <tr><td>4374</td><td>065991</td><td>Blangpidie</td></tr>
                                                    <tr><td>4375</td><td>065992</td><td>Blangpidie</td></tr>
                                                    <tr><td>4376</td><td>0702</td><td>Tebingtinggisumsel</td></tr>
                                                    <tr><td>4377</td><td>07021</td><td>Tebingtinggisumsel</td></tr>
                                                    <tr><td>4378</td><td>070221</td><td>Tebingtinggisumsel</td></tr>
                                                    <tr><td>4379</td><td>0711893</td><td>Betung</td></tr>
                                                    <tr><td>4380</td><td>0711440</td><td>Bukitsiguntang</td></tr>
                                                    <tr><td>4381</td><td>0711441</td><td>Bukitsiguntang</td></tr>
                                                    <tr><td>4382</td><td>0711442</td><td>Bukitsiguntang</td></tr>
                                                    <tr><td>4383</td><td>0711443</td><td>Bukitsiguntang</td></tr>
                                                    <tr><td>4384</td><td>0711444</td><td>Bukitsiguntang</td></tr>
                                                    <tr><td>4385</td><td>0711445</td><td>Bukitsiguntang</td></tr>
                                                    <tr><td>4386</td><td>0711580</td><td>Indralaya</td></tr>
                                                    <tr><td>4387</td><td>0711581</td><td>Indralaya</td></tr>
                                                    <tr><td>4388</td><td>0711810</td><td>Kenten Ujung</td></tr>
                                                    <tr><td>4389</td><td>0711811</td><td>Kenten Ujung</td></tr>
                                                    <tr><td>4390</td><td>0711812</td><td>Kenten Ujung</td></tr>
                                                    <tr><td>4391</td><td>0711813</td><td>Kenten Ujung</td></tr>
                                                    <tr><td>4392</td><td>0711814</td><td>Kenten Ujung</td></tr>
                                                    <tr><td>4393</td><td>0711815</td><td>Kenten Ujung</td></tr>
                                                    <tr><td>4394</td><td>0711816</td><td>Kenten Ujung</td></tr>
                                                    <tr><td>4395</td><td>0711817</td><td>Kenten Ujung</td></tr>
                                                    <tr><td>4396</td><td>0711818</td><td>Kenten Ujung</td></tr>
                                                    <tr><td>4397</td><td>0711819</td><td>Kenten Ujung</td></tr>
                                                    <tr><td>4398</td><td>0711820</td><td>Kenten Ujung</td></tr>
                                                    <tr><td>4399</td><td>0711821</td><td>Kenten Ujung</td></tr>
                                                    <tr><td>4400</td><td>0711</td><td>Palembang</td></tr>
                                                    <tr><td>4401</td><td>07111</td><td>Palembang Centrum</td></tr>
                                                    <tr><td>4402</td><td>071113</td><td>Palembang Centrum</td></tr>
                                                    <tr><td>4403</td><td>0711310</td><td>Palembang Centrum</td></tr>
                                                    <tr><td>4404</td><td>0711311</td><td>Palembang Centrum</td></tr>
                                                    <tr><td>4405</td><td>0711312</td><td>Palembang Centrum</td></tr>
                                                    <tr><td>4406</td><td>0711313</td><td>Palembang Centrum</td></tr>
                                                    <tr><td>4407</td><td>0711314</td><td>Palembang Centrum</td></tr>
                                                    <tr><td>4408</td><td>0711315</td><td>Palembang Centrum</td></tr>
                                                    <tr><td>4409</td><td>0711316</td><td>Palembang Centrum</td></tr>
                                                    <tr><td>4410</td><td>0711317</td><td>Palembang Centrum</td></tr>
                                                    <tr><td>4411</td><td>0711318</td><td>Palembang Centrum</td></tr>
                                                    <tr><td>4412</td><td>0711319</td><td>Palembang Centrum</td></tr>
                                                    <tr><td>4413</td><td>0711320</td><td>Palembang Centrum</td></tr>
                                                    <tr><td>4414</td><td>0711321</td><td>Palembang Centrum</td></tr>
                                                    <tr><td>4415</td><td>0711322</td><td>Palembang Centrum</td></tr>
                                                    <tr><td>4416</td><td>0711350</td><td>Palembang Centrum</td></tr>
                                                    <tr><td>4417</td><td>0711351</td><td>Palembang Centrum</td></tr>
                                                    <tr><td>4418</td><td>0711352</td><td>Palembang Centrum</td></tr>
                                                    <tr><td>4419</td><td>0711353</td><td>Palembang Centrum</td></tr>
                                                    <tr><td>4420</td><td>0711354</td><td>Palembang Centrum</td></tr>
                                                    <tr><td>4421</td><td>0711355</td><td>Palembang Centrum</td></tr>
                                                    <tr><td>4422</td><td>0711356</td><td>Palembang Centrum</td></tr>
                                                    <tr><td>4423</td><td>0711357</td><td>Palembang Centrum</td></tr>
                                                    <tr><td>4424</td><td>0711358</td><td>Palembang Centrum</td></tr>
                                                    <tr><td>4425</td><td>0711359</td><td>Palembang Centrum</td></tr>
                                                    <tr><td>4426</td><td>0711360</td><td>Palembang Centrum</td></tr>
                                                    <tr><td>4427</td><td>0711361</td><td>Palembang Centrum</td></tr>
                                                    <tr><td>4428</td><td>0711362</td><td>Palembang Centrum</td></tr>
                                                    <tr><td>4429</td><td>0711363</td><td>Palembang Centrum</td></tr>
                                                    <tr><td>4430</td><td>0711364</td><td>Palembang Centrum</td></tr>
                                                    <tr><td>4431</td><td>0711365</td><td>Palembang Centrum</td></tr>
                                                    <tr><td>4432</td><td>0711366</td><td>Palembang Centrum</td></tr>
                                                    <tr><td>4433</td><td>0711367</td><td>Palembang Centrum</td></tr>
                                                    <tr><td>4434</td><td>0711368</td><td>Palembang Centrum</td></tr>
                                                    <tr><td>4435</td><td>0711369</td><td>Palembang Centrum</td></tr>
                                                    <tr><td>4436</td><td>0711370</td><td>Palembang Centrum</td></tr>
                                                    <tr><td>4437</td><td>0711371</td><td>Palembang Centrum</td></tr>
                                                    <tr><td>4438</td><td>0711372</td><td>Palembang Centrum</td></tr>
                                                    <tr><td>4439</td><td>0711373</td><td>Palembang Centrum</td></tr>
                                                    <tr><td>4440</td><td>0711374</td><td>Palembang Centrum</td></tr>
                                                    <tr><td>4441</td><td>0711375</td><td>Palembang Centrum</td></tr>
                                                    <tr><td>4442</td><td>0711891</td><td>Pangkalanbalai</td></tr>
                                                    <tr><td>4443</td><td>0711540</td><td>Plaju</td></tr>
                                                    <tr><td>4444</td><td>0711541</td><td>Plaju</td></tr>
                                                    <tr><td>4445</td><td>0711542</td><td>Plaju</td></tr>
                                                    <tr><td>4446</td><td>0711510</td><td>Seberang Ulu</td></tr>
                                                    <tr><td>4447</td><td>0711511</td><td>Seberang Ulu</td></tr>
                                                    <tr><td>4448</td><td>0711512</td><td>Seberang Ulu</td></tr>
                                                    <tr><td>4449</td><td>0711513</td><td>Seberang Ulu</td></tr>
                                                    <tr><td>4450</td><td>0711514</td><td>Seberang Ulu</td></tr>
                                                    <tr><td>4451</td><td>0711515</td><td>Seberang Ulu</td></tr>
                                                    <tr><td>4452</td><td>0711516</td><td>Seberang Ulu</td></tr>
                                                    <tr><td>4453</td><td>0711517</td><td>Seberang Ulu</td></tr>
                                                    <tr><td>4454</td><td>0711518</td><td>Seberang Ulu</td></tr>
                                                    <tr><td>4455</td><td>0711519</td><td>Seberang Ulu</td></tr>
                                                    <tr><td>4456</td><td>0711520</td><td>Seberang Ulu</td></tr>
                                                    <tr><td>4457</td><td>0711710</td><td>Sungai Buah</td></tr>
                                                    <tr><td>4458</td><td>0711711</td><td>Sungai Buah</td></tr>
                                                    <tr><td>4459</td><td>0711712</td><td>Sungai Buah</td></tr>
                                                    <tr><td>4460</td><td>0711713</td><td>Sungai Buah</td></tr>
                                                    <tr><td>4461</td><td>0711714</td><td>Sungai Buah</td></tr>
                                                    <tr><td>4462</td><td>0711715</td><td>Sungai Buah</td></tr>
                                                    <tr><td>4463</td><td>0711716</td><td>Sungai Buah</td></tr>
                                                    <tr><td>4464</td><td>0711717</td><td>Sungai Buah</td></tr>
                                                    <tr><td>4465</td><td>0711718</td><td>Sungai Buah</td></tr>
                                                    <tr><td>4466</td><td>0711719</td><td>Sungai Buah</td></tr>
                                                    <tr><td>4467</td><td>0711720</td><td>Sungai Buah</td></tr>
                                                    <tr><td>4468</td><td>0711721</td><td>Sungai Buah</td></tr>
                                                    <tr><td>4469</td><td>0711897</td><td>Sungsang</td></tr>
                                                    <tr><td>4470</td><td>0711410</td><td>Talang Kelapa</td></tr>
                                                    <tr><td>4471</td><td>0711411</td><td>Talang Kelapa</td></tr>
                                                    <tr><td>4472</td><td>0711412</td><td>Talang Kelapa</td></tr>
                                                    <tr><td>4473</td><td>0711413</td><td>Talang Kelapa</td></tr>
                                                    <tr><td>4474</td><td>0711414</td><td>Talang Kelapa</td></tr>
                                                    <tr><td>4475</td><td>0711415</td><td>Talang Kelapa</td></tr>
                                                    <tr><td>4476</td><td>0711416</td><td>Talang Kelapa</td></tr>
                                                    <tr><td>4477</td><td>0711417</td><td>Talang Kelapa</td></tr>
                                                    <tr><td>4478</td><td>0711418</td><td>Talang Kelapa</td></tr>
                                                    <tr><td>4479</td><td>0711419</td><td>Talang Kelapa</td></tr>
                                                    <tr><td>4480</td><td>0711420</td><td>Talang Kelapa</td></tr>
                                                    <tr><td>4481</td><td>0711421</td><td>Talang Kelapa</td></tr>
                                                    <tr><td>4482</td><td>071159</td><td>Tanjungbatu</td></tr>
                                                    <tr><td>4483</td><td>0712</td><td>Kayuagung</td></tr>
                                                    <tr><td>4484</td><td>07121</td><td>Kayuagung</td></tr>
                                                    <tr><td>4485</td><td>0712321</td><td>Kayuagung</td></tr>
                                                    <tr><td>4486</td><td>0712322</td><td>Kayuagung</td></tr>
                                                    <tr><td>4487</td><td>0712323</td><td>Kayuagung</td></tr>
                                                    <tr><td>4488</td><td>0712324</td><td>Kayuagung</td></tr>
                                                    <tr><td>4489</td><td>0712351</td><td>Tanjungraja</td></tr>
                                                    <tr><td>4490</td><td>071390</td><td>Pendopotalangubi</td></tr>
                                                    <tr><td>4491</td><td>071391</td><td>Pendopotalangubi</td></tr>
                                                    <tr><td>4492</td><td>0713</td><td>Prabumulih</td></tr>
                                                    <tr><td>4493</td><td>07131</td><td>Prabumulih</td></tr>
                                                    <tr><td>4494</td><td>071320</td><td>Prabumulih</td></tr>
                                                    <tr><td>4495</td><td>071321</td><td>Prabumulih</td></tr>
                                                    <tr><td>4496</td><td>071322</td><td>Prabumulih</td></tr>
                                                    <tr><td>4497</td><td>071323</td><td>Prabumulih</td></tr>
                                                    <tr><td>4498</td><td>0713323</td><td>Prabumulih</td></tr>
                                                    <tr><td>4499</td><td>0713324</td><td>Prabumulih</td></tr>
                                                    <tr><td>4500</td><td>0713325</td><td>Prabumulih</td></tr>
                                                    <tr><td>4501</td><td>0714</td><td>Sekayu</td></tr>
                                                    <tr><td>4502</td><td>07141</td><td>Sekayu</td></tr>
                                                    <tr><td>4503</td><td>0714321</td><td>Sekayu</td></tr>
                                                    <tr><td>4504</td><td>0714322</td><td>Sekayu</td></tr>
                                                    <tr><td>4505</td><td>0714323</td><td>Sekayu</td></tr>
                                                    <tr><td>4506</td><td>071621</td><td>Muntok</td></tr>
                                                    <tr><td>4507</td><td>0717</td><td>Pangkalpinang</td></tr>
                                                    <tr><td>4508</td><td>07171</td><td>Pangkalpinang</td></tr>
                                                    <tr><td>4509</td><td>0717421</td><td>Pangkalpinang</td></tr>
                                                    <tr><td>4510</td><td>0717422</td><td>Pangkalpinang</td></tr>
                                                    <tr><td>4511</td><td>0717423</td><td>Pangkalpinang</td></tr>
                                                    <tr><td>4512</td><td>0717424</td><td>Pangkalpinang</td></tr>
                                                    <tr><td>4513</td><td>0717425</td><td>Pangkalpinang</td></tr>
                                                    <tr><td>4514</td><td>0717426</td><td>Pangkalpinang</td></tr>
                                                    <tr><td>4515</td><td>0717427</td><td>Pangkalpinang</td></tr>
                                                    <tr><td>4516</td><td>0717428</td><td>Pangkalpinang</td></tr>
                                                    <tr><td>4517</td><td>0717429</td><td>Pangkalpinang</td></tr>
                                                    <tr><td>4518</td><td>0717430</td><td>Pangkalpinang</td></tr>
                                                    <tr><td>4519</td><td>0717431</td><td>Pangkalpinang</td></tr>
                                                    <tr><td>4520</td><td>0717432</td><td>Pangkalpinang</td></tr>
                                                    <tr><td>4521</td><td>0717433</td><td>Pangkalpinang</td></tr>
                                                    <tr><td>4522</td><td>0717434</td><td>Pangkalpinang</td></tr>
                                                    <tr><td>4523</td><td>0717435</td><td>Pangkalpinang</td></tr>
                                                    <tr><td>4524</td><td>0717436</td><td>Pangkalpinang</td></tr>
                                                    <tr><td>4525</td><td>0717437</td><td>Pangkalpinang</td></tr>
                                                    <tr><td>4526</td><td>0717438</td><td>Pangkalpinang</td></tr>
                                                    <tr><td>4527</td><td>0717439</td><td>Pangkalpinang</td></tr>
                                                    <tr><td>4528</td><td>071792</td><td>Sungailiat</td></tr>
                                                    <tr><td>4529</td><td>071793</td><td>Sungailiat</td></tr>
                                                    <tr><td>4530</td><td>071794</td><td>Sungailiat</td></tr>
                                                    <tr><td>4531</td><td>071795</td><td>Sungailiat</td></tr>
                                                    <tr><td>4532</td><td>071861</td><td>Kobapalembang</td></tr>
                                                    <tr><td>4533</td><td>071841</td><td>Taboali</td></tr>
                                                    <tr><td>4534</td><td>071991</td><td>Manggar</td></tr>
                                                    <tr><td>4535</td><td>0719</td><td>Tanjungpandan</td></tr>
                                                    <tr><td>4536</td><td>07191</td><td>Tanjungpandan</td></tr>
                                                    <tr><td>4537</td><td>071921</td><td>Tanjungpandan</td></tr>
                                                    <tr><td>4538</td><td>071922</td><td>Tanjungpandan</td></tr>
                                                    <tr><td>4539</td><td>071923</td><td>Tanjungpandan</td></tr>
                                                    <tr><td>4540</td><td>071924</td><td>Tanjungpandan</td></tr>
                                                    <tr><td>4541</td><td>071925</td><td>Tanjungpandan</td></tr>
                                                    <tr><td>4542</td><td>071926</td><td>Tanjungpandan</td></tr>
                                                    <tr><td>4543</td><td>071927</td><td>Tanjungpandan</td></tr>
                                                    <tr><td>4544</td><td>071928</td><td>Tanjungpandan</td></tr>
                                                    <tr><td>4545</td><td>071929</td><td>Tanjungpandan</td></tr>
                                                    <tr><td>4546</td><td>0721700</td><td>Bandar Lampung - Kedaton</td></tr>
                                                    <tr><td>4547</td><td>0721701</td><td>Bandar Lampung - Kedaton</td></tr>
                                                    <tr><td>4548</td><td>0721702</td><td>Bandar Lampung - Kedaton</td></tr>
                                                    <tr><td>4549</td><td>0721703</td><td>Bandar Lampung - Kedaton</td></tr>
                                                    <tr><td>4550</td><td>0721704</td><td>Bandar Lampung - Kedaton</td></tr>
                                                    <tr><td>4551</td><td>0721705</td><td>Bandar Lampung - Kedaton</td></tr>
                                                    <tr><td>4552</td><td>0721706</td><td>Bandar Lampung - Kedaton</td></tr>
                                                    <tr><td>4553</td><td>0721707</td><td>Bandar Lampung - Kedaton</td></tr>
                                                    <tr><td>4554</td><td>0721708</td><td>Bandar Lampung - Kedaton</td></tr>
                                                    <tr><td>4555</td><td>0721709</td><td>Bandar Lampung - Kedaton</td></tr>
                                                    <tr><td>4556</td><td>0721711</td><td>Bandar Lampung - Kedaton</td></tr>
                                                    <tr><td>4557</td><td>0721712</td><td>Bandar Lampung - Kedaton</td></tr>
                                                    <tr><td>4558</td><td>0721770</td><td>Bandar Lampung - Kedaton</td></tr>
                                                    <tr><td>4559</td><td>0721771</td><td>Bandar Lampung - Kedaton</td></tr>
                                                    <tr><td>4560</td><td>0721772</td><td>Bandar Lampung - Kedaton</td></tr>
                                                    <tr><td>4561</td><td>0721780</td><td>Bandar Lampung - Kedaton</td></tr>
                                                    <tr><td>4562</td><td>0721781</td><td>Bandar Lampung - Kedaton</td></tr>
                                                    <tr><td>4563</td><td>0721782</td><td>Bandar Lampung - Kedaton</td></tr>
                                                    <tr><td>4564</td><td>0721783</td><td>Bandar Lampung - Kedaton</td></tr>
                                                    <tr><td>4565</td><td>0721784</td><td>Bandar Lampung - Kedaton</td></tr>
                                                    <tr><td>4566</td><td>0721785</td><td>Bandar Lampung - Kedaton</td></tr>
                                                    <tr><td>4567</td><td>0721786</td><td>Bandar Lampung - Kedaton</td></tr>
                                                    <tr><td>4568</td><td>0721787</td><td>Bandar Lampung - Kedaton</td></tr>
                                                    <tr><td>4569</td><td>0721788</td><td>Bandar Lampung - Kedaton</td></tr>
                                                    <tr><td>4570</td><td>0721789</td><td>Bandar Lampung - Kedaton</td></tr>
                                                    <tr><td>4571</td><td>0721</td><td>Bandarlampung</td></tr>
                                                    <tr><td>4572</td><td>072194</td><td>Gedongtataan</td></tr>
                                                    <tr><td>4573</td><td>0721270</td><td>Langkapura</td></tr>
                                                    <tr><td>4574</td><td>0721271</td><td>Langkapura</td></tr>
                                                    <tr><td>4575</td><td>0721272</td><td>Langkapura</td></tr>
                                                    <tr><td>4576</td><td>0721550</td><td>Langkapura</td></tr>
                                                    <tr><td>4577</td><td>072191</td><td>Natar</td></tr>
                                                    <tr><td>4578</td><td>072192</td><td>Natar</td></tr>
                                                    <tr><td>4579</td><td>0721790</td><td>Natar</td></tr>
                                                    <tr><td>4580</td><td>072131</td><td>Panjang</td></tr>
                                                    <tr><td>4581</td><td>072132</td><td>Panjang</td></tr>
                                                    <tr><td>4582</td><td>072133</td><td>Panjang</td></tr>
                                                    <tr><td>4583</td><td>0721300</td><td>Panjang</td></tr>
                                                    <tr><td>4584</td><td>0721340</td><td>Panjang</td></tr>
                                                    <tr><td>4585</td><td>0721341</td><td>Panjang</td></tr>
                                                    <tr><td>4586</td><td>0721342</td><td>Panjang</td></tr>
                                                    <tr><td>4587</td><td>0721350</td><td>Sribawono</td></tr>
                                                    <tr><td>4588</td><td>0721351</td><td>Sribawono</td></tr>
                                                    <tr><td>4589</td><td>0721352</td><td>Sribawono</td></tr>
                                                    <tr><td>4590</td><td>0721360</td><td>Sribawono</td></tr>
                                                    <tr><td>4591</td><td>07211</td><td>Tanjungkarang</td></tr>
                                                    <tr><td>4592</td><td>0721240</td><td>Tanjungkarang</td></tr>
                                                    <tr><td>4593</td><td>0721250</td><td>Tanjungkarang</td></tr>
                                                    <tr><td>4594</td><td>0721251</td><td>Tanjungkarang</td></tr>
                                                    <tr><td>4595</td><td>0721252</td><td>Tanjungkarang</td></tr>
                                                    <tr><td>4596</td><td>0721253</td><td>Tanjungkarang</td></tr>
                                                    <tr><td>4597</td><td>0721254</td><td>Tanjungkarang</td></tr>
                                                    <tr><td>4598</td><td>0721255</td><td>Tanjungkarang</td></tr>
                                                    <tr><td>4599</td><td>0721256</td><td>Tanjungkarang</td></tr>
                                                    <tr><td>4600</td><td>0721257</td><td>Tanjungkarang</td></tr>
                                                    <tr><td>4601</td><td>0721258</td><td>Tanjungkarang</td></tr>
                                                    <tr><td>4602</td><td>0721259</td><td>Tanjungkarang</td></tr>
                                                    <tr><td>4603</td><td>0721260</td><td>Tanjungkarang</td></tr>
                                                    <tr><td>4604</td><td>0721261</td><td>Tanjungkarang</td></tr>
                                                    <tr><td>4605</td><td>0721262</td><td>Tanjungkarang</td></tr>
                                                    <tr><td>4606</td><td>0721263</td><td>Tanjungkarang</td></tr>
                                                    <tr><td>4607</td><td>0721264</td><td>Tanjungkarang</td></tr>
                                                    <tr><td>4608</td><td>0721265</td><td>Tanjungkarang</td></tr>
                                                    <tr><td>4609</td><td>0721266</td><td>Tanjungkarang</td></tr>
                                                    <tr><td>4610</td><td>0721267</td><td>Tanjungkarang</td></tr>
                                                    <tr><td>4611</td><td>0721268</td><td>Tanjungkarang</td></tr>
                                                    <tr><td>4612</td><td>0721269</td><td>Tanjungkarang</td></tr>
                                                    <tr><td>4613</td><td>0721600</td><td>Tanjungkarang</td></tr>
                                                    <tr><td>4614</td><td>0721400</td><td>Teluk Betung</td></tr>
                                                    <tr><td>4615</td><td>0721470</td><td>Teluk Betung</td></tr>
                                                    <tr><td>4616</td><td>0721471</td><td>Teluk Betung</td></tr>
                                                    <tr><td>4617</td><td>0721472</td><td>Teluk Betung</td></tr>
                                                    <tr><td>4618</td><td>0721473</td><td>Teluk Betung</td></tr>
                                                    <tr><td>4619</td><td>0721474</td><td>Teluk Betung</td></tr>
                                                    <tr><td>4620</td><td>0721475</td><td>Teluk Betung</td></tr>
                                                    <tr><td>4621</td><td>0721476</td><td>Teluk Betung</td></tr>
                                                    <tr><td>4622</td><td>0721477</td><td>Teluk Betung</td></tr>
                                                    <tr><td>4623</td><td>0721478</td><td>Teluk Betung</td></tr>
                                                    <tr><td>4624</td><td>0721479</td><td>Teluk Betung</td></tr>
                                                    <tr><td>4625</td><td>0721480</td><td>Teluk Betung</td></tr>
                                                    <tr><td>4626</td><td>0721481</td><td>Teluk Betung</td></tr>
                                                    <tr><td>4627</td><td>0721482</td><td>Teluk Betung</td></tr>
                                                    <tr><td>4628</td><td>0721483</td><td>Teluk Betung</td></tr>
                                                    <tr><td>4629</td><td>0721484</td><td>Teluk Betung</td></tr>
                                                    <tr><td>4630</td><td>0721485</td><td>Teluk Betung</td></tr>
                                                    <tr><td>4631</td><td>0721486</td><td>Teluk Betung</td></tr>
                                                    <tr><td>4632</td><td>0721487</td><td>Teluk Betung</td></tr>
                                                    <tr><td>4633</td><td>0721488</td><td>Teluk Betung</td></tr>
                                                    <tr><td>4634</td><td>0721489</td><td>Teluk Betung</td></tr>
                                                    <tr><td>4635</td><td>072221</td><td>Kotaagung</td></tr>
                                                    <tr><td>4636</td><td>072491</td><td>Bukitkemuning</td></tr>
                                                    <tr><td>4637</td><td>0724</td><td>Kotabumi</td></tr>
                                                    <tr><td>4638</td><td>07241</td><td>Kotabumi</td></tr>
                                                    <tr><td>4639</td><td>072421</td><td>Kotabumi</td></tr>
                                                    <tr><td>4640</td><td>072422</td><td>Kotabumi</td></tr>
                                                    <tr><td>4641</td><td>072423</td><td>Kotabumi</td></tr>
                                                    <tr><td>4642</td><td>072424</td><td>Kotabumi</td></tr>
                                                    <tr><td>4643</td><td>072425</td><td>Kotabumi</td></tr>
                                                    <tr><td>4644</td><td>072426</td><td>Kotabumi</td></tr>
                                                    <tr><td>4645</td><td>072525</td><td>Bandarjaya</td></tr>
                                                    <tr><td>4646</td><td>072526</td><td>Bandarjaya</td></tr>
                                                    <tr><td>4647</td><td>072527</td><td>Bandarjaya</td></tr>
                                                    <tr><td>4648</td><td>0725527</td><td>Bandarjaya</td></tr>
                                                    <tr><td>4649</td><td>0725528</td><td>Bandarjaya</td></tr>
                                                    <tr><td>4650</td><td>0725529</td><td>Bandarjaya</td></tr>
                                                    <tr><td>4651</td><td>0725530</td><td>Bandarjaya</td></tr>
                                                    <tr><td>4652</td><td>0725531</td><td>Bandarjaya</td></tr>
                                                    <tr><td>4653</td><td>0725</td><td>Metro</td></tr>
                                                    <tr><td>4654</td><td>07251</td><td>Metro</td></tr>
                                                    <tr><td>4655</td><td>072541</td><td>Metro</td></tr>
                                                    <tr><td>4656</td><td>072542</td><td>Metro</td></tr>
                                                    <tr><td>4657</td><td>072543</td><td>Metro</td></tr>
                                                    <tr><td>4658</td><td>072544</td><td>Metro</td></tr>
                                                    <tr><td>4659</td><td>072545</td><td>Metro</td></tr>
                                                    <tr><td>4660</td><td>072546</td><td>Metro</td></tr>
                                                    <tr><td>4661</td><td>072547</td><td>Metro</td></tr>
                                                    <tr><td>4662</td><td>072548</td><td>Metro</td></tr>
                                                    <tr><td>4663</td><td>072549</td><td>Metro</td></tr>
                                                    <tr><td>4664</td><td>0726</td><td>Menggala</td></tr>
                                                    <tr><td>4665</td><td>07261</td><td>Menggala</td></tr>
                                                    <tr><td>4666</td><td>072621</td><td>Menggala</td></tr>
                                                    <tr><td>4667</td><td>0727</td><td>Kalianda</td></tr>
                                                    <tr><td>4668</td><td>07271</td><td>Kalianda</td></tr>
                                                    <tr><td>4669</td><td>07272</td><td>Kalianda</td></tr>
                                                    <tr><td>4670</td><td>0727321</td><td>Kalianda</td></tr>
                                                    <tr><td>4671</td><td>072851</td><td>Krui</td></tr>
                                                    <tr><td>4672</td><td>072852</td><td>Krui</td></tr>
                                                    <tr><td>4673</td><td>072821</td><td>Liwa</td></tr>
                                                    <tr><td>4674</td><td>0729370</td><td>Kalirejo</td></tr>
                                                    <tr><td>4675</td><td>0729</td><td>Pringsewu</td></tr>
                                                    <tr><td>4676</td><td>07291</td><td>Pringsewu</td></tr>
                                                    <tr><td>4677</td><td>072921</td><td>Pringsewu</td></tr>
                                                    <tr><td>4678</td><td>072922</td><td>Pringsewu</td></tr>
                                                    <tr><td>4679</td><td>072923</td><td>Pringsewu</td></tr>
                                                    <tr><td>4680</td><td>072941</td><td>Talangpadang</td></tr>
                                                    <tr><td>4681</td><td>0730641</td><td>Kota Agung</td></tr>
                                                    <tr><td>4682</td><td>0730</td><td>Pagaralam</td></tr>
                                                    <tr><td>4683</td><td>07301</td><td>Pagaralam</td></tr>
                                                    <tr><td>4684</td><td>073021</td><td>Pagaralam</td></tr>
                                                    <tr><td>4685</td><td>073022</td><td>Pagaralam</td></tr>
                                                    <tr><td>4686</td><td>073023</td><td>Pagaralam</td></tr>
                                                    <tr><td>4687</td><td>073024</td><td>Pagaralam</td></tr>
                                                    <tr><td>4688</td><td>0731363</td><td>Bunga Mas</td></tr>
                                                    <tr><td>4689</td><td>0731</td><td>Lahat</td></tr>
                                                    <tr><td>4690</td><td>07311</td><td>Lahat</td></tr>
                                                    <tr><td>4691</td><td>073121</td><td>Lahat</td></tr>
                                                    <tr><td>4692</td><td>073122</td><td>Lahat</td></tr>
                                                    <tr><td>4693</td><td>073123</td><td>Lahat</td></tr>
                                                    <tr><td>4694</td><td>073124</td><td>Lahat</td></tr>
                                                    <tr><td>4695</td><td>0731323</td><td>Lahat</td></tr>
                                                    <tr><td>4696</td><td>0731324</td><td>Lahat</td></tr>
                                                    <tr><td>4697</td><td>0731325</td><td>Lahat</td></tr>
                                                    <tr><td>4698</td><td>0731326</td><td>Lahat</td></tr>
                                                    <tr><td>4699</td><td>0731327</td><td>Lahat</td></tr>
                                                    <tr><td>4700</td><td>0731328</td><td>Lahat</td></tr>
                                                    <tr><td>4701</td><td>073166</td><td>Pendopo</td></tr>
                                                    <tr><td>4702</td><td>0732</td><td>Curup</td></tr>
                                                    <tr><td>4703</td><td>07321</td><td>Curup</td></tr>
                                                    <tr><td>4704</td><td>073220</td><td>Curup</td></tr>
                                                    <tr><td>4705</td><td>073221</td><td>Curup</td></tr>
                                                    <tr><td>4706</td><td>073222</td><td>Curup</td></tr>
                                                    <tr><td>4707</td><td>073223</td><td>Curup</td></tr>
                                                    <tr><td>4708</td><td>073224</td><td>Curup</td></tr>
                                                    <tr><td>4709</td><td>0732324</td><td>Curup</td></tr>
                                                    <tr><td>4710</td><td>0732325</td><td>Curup</td></tr>
                                                    <tr><td>4711</td><td>0732326</td><td>Curup</td></tr>
                                                    <tr><td>4712</td><td>0732327</td><td>Curup</td></tr>
                                                    <tr><td>4713</td><td>0732328</td><td>Curup</td></tr>
                                                    <tr><td>4714</td><td>073291</td><td>Kapahiyang</td></tr>
                                                    <tr><td>4715</td><td>0732391</td><td>Kapahiyang</td></tr>
                                                    <tr><td>4716</td><td>0732392</td><td>Kapahiyang</td></tr>
                                                    <tr><td>4717</td><td>0733</td><td>Lubuklinggau</td></tr>
                                                    <tr><td>4718</td><td>07331</td><td>Lubuklinggau</td></tr>
                                                    <tr><td>4719</td><td>073321</td><td>Lubuklinggau</td></tr>
                                                    <tr><td>4720</td><td>073322</td><td>Lubuklinggau</td></tr>
                                                    <tr><td>4721</td><td>073323</td><td>Lubuklinggau</td></tr>
                                                    <tr><td>4722</td><td>073324</td><td>Lubuklinggau</td></tr>
                                                    <tr><td>4723</td><td>073325</td><td>Lubuklinggau</td></tr>
                                                    <tr><td>4724</td><td>073326</td><td>Lubuklinggau</td></tr>
                                                    <tr><td>4725</td><td>0733320</td><td>Lubuklinggau</td></tr>
                                                    <tr><td>4726</td><td>0733321</td><td>Lubuklinggau</td></tr>
                                                    <tr><td>4727</td><td>0733322</td><td>Lubuklinggau</td></tr>
                                                    <tr><td>4728</td><td>0733326</td><td>Lubuklinggau</td></tr>
                                                    <tr><td>4729</td><td>0733327</td><td>Lubuklinggau</td></tr>
                                                    <tr><td>4730</td><td>0733328</td><td>Lubuklinggau</td></tr>
                                                    <tr><td>4731</td><td>0733329</td><td>Lubuklinggau</td></tr>
                                                    <tr><td>4732</td><td>073371</td><td>Tugumulyo</td></tr>
                                                    <tr><td>4733</td><td>0734</td><td>Muaraenim</td></tr>
                                                    <tr><td>4734</td><td>07341</td><td>Muaraenim</td></tr>
                                                    <tr><td>4735</td><td>073421</td><td>Muaraenim</td></tr>
                                                    <tr><td>4736</td><td>073422</td><td>Muaraenim</td></tr>
                                                    <tr><td>4737</td><td>073423</td><td>Muaraenim</td></tr>
                                                    <tr><td>4738</td><td>073451</td><td>Tanjungenim</td></tr>
                                                    <tr><td>4739</td><td>073452</td><td>Tanjungenim</td></tr>
                                                    <tr><td>4740</td><td>073453</td><td>Tanjungenim</td></tr>
                                                    <tr><td>4741</td><td>073454</td><td>Tanjungenim</td></tr>
                                                    <tr><td>4742</td><td>0735373</td><td>Batu Marta</td></tr>
                                                    <tr><td>4743</td><td>0735</td><td>Baturaja</td></tr>
                                                    <tr><td>4744</td><td>07351</td><td>Baturaja</td></tr>
                                                    <tr><td>4745</td><td>073520</td><td>Baturaja</td></tr>
                                                    <tr><td>4746</td><td>073521</td><td>Baturaja</td></tr>
                                                    <tr><td>4747</td><td>073522</td><td>Baturaja</td></tr>
                                                    <tr><td>4748</td><td>073523</td><td>Baturaja</td></tr>
                                                    <tr><td>4749</td><td>073524</td><td>Baturaja</td></tr>
                                                    <tr><td>4750</td><td>073550</td><td>Belitang</td></tr>
                                                    <tr><td>4751</td><td>073551</td><td>Belitang</td></tr>
                                                    <tr><td>4752</td><td>073552</td><td>Belitang</td></tr>
                                                    <tr><td>4753</td><td>073581</td><td>Martapurasumsel</td></tr>
                                                    <tr><td>4754</td><td>073582</td><td>Martapurasumsel</td></tr>
                                                    <tr><td>4755</td><td>073583</td><td>Martapurasumsel</td></tr>
                                                    <tr><td>4756</td><td>073590</td><td>Muaradua</td></tr>
                                                    <tr><td>4757</td><td>073591</td><td>Muaradua</td></tr>
                                                    <tr><td>4758</td><td>0736</td><td>Bengkulu</td></tr>
                                                    <tr><td>4759</td><td>07361</td><td>Bengkulu</td></tr>
                                                    <tr><td>4760</td><td>073613</td><td>Bengkulu</td></tr>
                                                    <tr><td>4761</td><td>073620</td><td>Bengkulu</td></tr>
                                                    <tr><td>4762</td><td>073621</td><td>Bengkulu</td></tr>
                                                    <tr><td>4763</td><td>073622</td><td>Bengkulu</td></tr>
                                                    <tr><td>4764</td><td>073623</td><td>Bengkulu</td></tr>
                                                    <tr><td>4765</td><td>073624</td><td>Bengkulu</td></tr>
                                                    <tr><td>4766</td><td>073625</td><td>Bengkulu</td></tr>
                                                    <tr><td>4767</td><td>073626</td><td>Bengkulu</td></tr>
                                                    <tr><td>4768</td><td>073627</td><td>Bengkulu</td></tr>
                                                    <tr><td>4769</td><td>073628</td><td>Bengkulu</td></tr>
                                                    <tr><td>4770</td><td>073629</td><td>Bengkulu</td></tr>
                                                    <tr><td>4771</td><td>0736341</td><td>Bengkulu</td></tr>
                                                    <tr><td>4772</td><td>0736342</td><td>Bengkulu</td></tr>
                                                    <tr><td>4773</td><td>0736343</td><td>Bengkulu</td></tr>
                                                    <tr><td>4774</td><td>0736344</td><td>Bengkulu</td></tr>
                                                    <tr><td>4775</td><td>0736389</td><td>Bengkulu</td></tr>
                                                    <tr><td>4776</td><td>073651</td><td>Pagardewa</td></tr>
                                                    <tr><td>4777</td><td>073652</td><td>Pagardewa</td></tr>
                                                    <tr><td>4778</td><td>073691</td><td>Tais</td></tr>
                                                    <tr><td>4779</td><td>0737</td><td>Argamakmur</td></tr>
                                                    <tr><td>4780</td><td>07371</td><td>Argamakmur</td></tr>
                                                    <tr><td>4781</td><td>073721</td><td>Argamakmur</td></tr>
                                                    <tr><td>4782</td><td>0737521</td><td>Argamakmur</td></tr>
                                                    <tr><td>4783</td><td>0737522</td><td>Argamakmur</td></tr>
                                                    <tr><td>4784</td><td>073761</td><td>Ipuh</td></tr>
                                                    <tr><td>4785</td><td>073771</td><td>Mukomuko</td></tr>
                                                    <tr><td>4786</td><td>0738</td><td>Muara Aman</td></tr>
                                                    <tr><td>4787</td><td>07381</td><td>Muara Aman</td></tr>
                                                    <tr><td>4788</td><td>073821</td><td>Muara Aman</td></tr>
                                                    <tr><td>4789</td><td>073961</td><td>Bintuhan</td></tr>
                                                    <tr><td>4790</td><td>0739</td><td>Manna</td></tr>
                                                    <tr><td>4791</td><td>07391</td><td>Manna</td></tr>
                                                    <tr><td>4792</td><td>073921</td><td>Manna</td></tr>
                                                    <tr><td>4793</td><td>073922</td><td>Manna</td></tr>
                                                    <tr><td>4794</td><td>073923</td><td>Manna</td></tr>
                                                    <tr><td>4795</td><td>0741</td><td>Jambi</td></tr>
                                                    <tr><td>4796</td><td>07411</td><td>Jambi Centrum</td></tr>
                                                    <tr><td>4797</td><td>074120</td><td>Jambi Centrum</td></tr>
                                                    <tr><td>4798</td><td>074121</td><td>Jambi Centrum</td></tr>
                                                    <tr><td>4799</td><td>074122</td><td>Jambi Centrum</td></tr>
                                                    <tr><td>4800</td><td>074123</td><td>Jambi Centrum</td></tr>
                                                    <tr><td>4801</td><td>074124</td><td>Jambi Centrum</td></tr>
                                                    <tr><td>4802</td><td>074125</td><td>Jambi Centrum</td></tr>
                                                    <tr><td>4803</td><td>074126</td><td>Jambi Centrum</td></tr>
                                                    <tr><td>4804</td><td>074127</td><td>Jambi Centrum</td></tr>
                                                    <tr><td>4805</td><td>074131</td><td>Jambi Centrum</td></tr>
                                                    <tr><td>4806</td><td>074132</td><td>Jambi Centrum</td></tr>
                                                    <tr><td>4807</td><td>074133</td><td>Jambi Centrum</td></tr>
                                                    <tr><td>4808</td><td>074134</td><td>Jambi Centrum</td></tr>
                                                    <tr><td>4809</td><td>074135</td><td>Jambi Centrum</td></tr>
                                                    <tr><td>4810</td><td>074150</td><td>Jambi Centrum</td></tr>
                                                    <tr><td>4811</td><td>074151</td><td>Jambi Centrum</td></tr>
                                                    <tr><td>4812</td><td>074152</td><td>Jambi Centrum</td></tr>
                                                    <tr><td>4813</td><td>074153</td><td>Jambi Centrum</td></tr>
                                                    <tr><td>4814</td><td>074154</td><td>Jambi Centrum</td></tr>
                                                    <tr><td>4815</td><td>074155</td><td>Jambi Centrum</td></tr>
                                                    <tr><td>4816</td><td>074140</td><td>Kotabaru</td></tr>
                                                    <tr><td>4817</td><td>074141</td><td>Kotabaru</td></tr>
                                                    <tr><td>4818</td><td>074142</td><td>Kotabaru</td></tr>
                                                    <tr><td>4819</td><td>074143</td><td>Kotabaru</td></tr>
                                                    <tr><td>4820</td><td>0741443</td><td>Kotabaru</td></tr>
                                                    <tr><td>4821</td><td>0741444</td><td>Kotabaru</td></tr>
                                                    <tr><td>4822</td><td>0741445</td><td>Kotabaru</td></tr>
                                                    <tr><td>4823</td><td>0741570</td><td>Pasirputih</td></tr>
                                                    <tr><td>4824</td><td>0741571</td><td>Pasirputih</td></tr>
                                                    <tr><td>4825</td><td>074160</td><td>Telanaipura</td></tr>
                                                    <tr><td>4826</td><td>074161</td><td>Telanaipura</td></tr>
                                                    <tr><td>4827</td><td>074162</td><td>Telanaipura</td></tr>
                                                    <tr><td>4828</td><td>074163</td><td>Telanaipura</td></tr>
                                                    <tr><td>4829</td><td>074164</td><td>Telanaipura</td></tr>
                                                    <tr><td>4830</td><td>074165</td><td>Telanaipura</td></tr>
                                                    <tr><td>4831</td><td>074166</td><td>Telanaipura</td></tr>
                                                    <tr><td>4832</td><td>0741667</td><td>Telanaipura</td></tr>
                                                    <tr><td>4833</td><td>0741668</td><td>Telanaipura</td></tr>
                                                    <tr><td>4834</td><td>0741669</td><td>Telanaipura</td></tr>
                                                    <tr><td>4835</td><td>074221</td><td>Kualatungkal</td></tr>
                                                    <tr><td>4836</td><td>074222</td><td>Kualatungkal</td></tr>
                                                    <tr><td>4837</td><td>0742322</td><td>Kualatungkal</td></tr>
                                                    <tr><td>4838</td><td>0742</td><td>Tebingtinggijambi</td></tr>
                                                    <tr><td>4839</td><td>07421</td><td>Tebingtinggijambi</td></tr>
                                                    <tr><td>4840</td><td>074251</td><td>Tebingtinggijambi</td></tr>
                                                    <tr><td>4841</td><td>0742551</td><td>Tebingtinggijambi</td></tr>
                                                    <tr><td>4842</td><td>0742552</td><td>Tebingtinggijambi</td></tr>
                                                    <tr><td>4843</td><td>0743</td><td>Muarabulian</td></tr>
                                                    <tr><td>4844</td><td>07431</td><td>Muarabulian</td></tr>
                                                    <tr><td>4845</td><td>074321</td><td>Muarabulian</td></tr>
                                                    <tr><td>4846</td><td>0744</td><td>Muaratebo</td></tr>
                                                    <tr><td>4847</td><td>07441</td><td>Muaratebo</td></tr>
                                                    <tr><td>4848</td><td>074421</td><td>Muaratebo</td></tr>
                                                    <tr><td>4849</td><td>0745</td><td>Sarolangun Jambi</td></tr>
                                                    <tr><td>4850</td><td>07451</td><td>Sarolangun Jambi</td></tr>
                                                    <tr><td>4851</td><td>074591</td><td>Sarolangun Jambi</td></tr>
                                                    <tr><td>4852</td><td>0746</td><td>Bangko</td></tr>
                                                    <tr><td>4853</td><td>07461</td><td>Bangko</td></tr>
                                                    <tr><td>4854</td><td>074621</td><td>Bangko</td></tr>
                                                    <tr><td>4855</td><td>074622</td><td>Bangko</td></tr>
                                                    <tr><td>4856</td><td>0746322</td><td>Bangko</td></tr>
                                                    <tr><td>4857</td><td>0746323</td><td>Bangko</td></tr>
                                                    <tr><td>4858</td><td>0746331</td><td>Pamenang</td></tr>
                                                    <tr><td>4859</td><td>0747</td><td>Muarabungo</td></tr>
                                                    <tr><td>4860</td><td>07471</td><td>Muarabungo</td></tr>
                                                    <tr><td>4861</td><td>074721</td><td>Muarabungo</td></tr>
                                                    <tr><td>4862</td><td>074722</td><td>Muarabungo</td></tr>
                                                    <tr><td>4863</td><td>0747321</td><td>Muarabungo</td></tr>
                                                    <tr><td>4864</td><td>0747322</td><td>Muarabungo</td></tr>
                                                    <tr><td>4865</td><td>0747323</td><td>Muarabungo</td></tr>
                                                    <tr><td>4866</td><td>074731</td><td>Rimbobujang</td></tr>
                                                    <tr><td>4867</td><td>0747431</td><td>Rimbobujang</td></tr>
                                                    <tr><td>4868</td><td>0748351</td><td>Bedeng Duo</td></tr>
                                                    <tr><td>4869</td><td>0748357</td><td>Bengkolan Duo</td></tr>
                                                    <tr><td>4870</td><td>0748361</td><td>Koto Rendah</td></tr>
                                                    <tr><td>4871</td><td>0748353</td><td>Pasar Semurup</td></tr>
                                                    <tr><td>4872</td><td>0748367</td><td>Sungai Tutung</td></tr>
                                                    <tr><td>4873</td><td>0748</td><td>Sungaipenuh</td></tr>
                                                    <tr><td>4874</td><td>07481</td><td>Sungaipenuh</td></tr>
                                                    <tr><td>4875</td><td>074821</td><td>Sungaipenuh</td></tr>
                                                    <tr><td>4876</td><td>074822</td><td>Sungaipenuh</td></tr>
                                                    <tr><td>4877</td><td>074823</td><td>Sungaipenuh</td></tr>
                                                    <tr><td>4878</td><td>0748323</td><td>Sungaipenuh</td></tr>
                                                    <tr><td>4879</td><td>0748324</td><td>Sungaipenuh</td></tr>
                                                    <tr><td>4880</td><td>0748325</td><td>Sungaipenuh</td></tr>
                                                    <tr><td>4881</td><td>0748326</td><td>Sungaipenuh</td></tr>
                                                    <tr><td>4882</td><td>0748363</td><td>Tangkit</td></tr>
                                                    <tr><td>4883</td><td>0748365</td><td>Tanjung Pauh</td></tr>
                                                    <tr><td>4884</td><td>075171</td><td>Bandarbuat</td></tr>
                                                    <tr><td>4885</td><td>075172</td><td>Bandarbuat</td></tr>
                                                    <tr><td>4886</td><td>075173</td><td>Bandarbuat</td></tr>
                                                    <tr><td>4887</td><td>075174</td><td>Bandarbuat</td></tr>
                                                    <tr><td>4888</td><td>0751775</td><td>Bandarbuat</td></tr>
                                                    <tr><td>4889</td><td>0751776</td><td>Bandarbuat</td></tr>
                                                    <tr><td>4890</td><td>0751777</td><td>Bandarbuat</td></tr>
                                                    <tr><td>4891</td><td>0751778</td><td>Bandarbuat</td></tr>
                                                    <tr><td>4892</td><td>0751779</td><td>Bandarbuat</td></tr>
                                                    <tr><td>4893</td><td>0751684</td><td>Kayutanam</td></tr>
                                                    <tr><td>4894</td><td>0751496</td><td>Kuranji</td></tr>
                                                    <tr><td>4895</td><td>0751497</td><td>Kuranji</td></tr>
                                                    <tr><td>4896</td><td>0751498</td><td>Kuranji</td></tr>
                                                    <tr><td>4897</td><td>0751499</td><td>Kuranji</td></tr>
                                                    <tr><td>4898</td><td>075196</td><td>Lubukalung</td></tr>
                                                    <tr><td>4899</td><td>0751696</td><td>Lubukalung</td></tr>
                                                    <tr><td>4900</td><td>0751480</td><td>Lubukbuaya</td></tr>
                                                    <tr><td>4901</td><td>0751481</td><td>Lubukbuaya</td></tr>
                                                    <tr><td>4902</td><td>0751</td><td>Padang</td></tr>
                                                    <tr><td>4903</td><td>07511</td><td>Padang Centrum</td></tr>
                                                    <tr><td>4904</td><td>075120</td><td>Padang Centrum</td></tr>
                                                    <tr><td>4905</td><td>075121</td><td>Padang Centrum</td></tr>
                                                    <tr><td>4906</td><td>075122</td><td>Padang Centrum</td></tr>
                                                    <tr><td>4907</td><td>075123</td><td>Padang Centrum</td></tr>
                                                    <tr><td>4908</td><td>075124</td><td>Padang Centrum</td></tr>
                                                    <tr><td>4909</td><td>075125</td><td>Padang Centrum</td></tr>
                                                    <tr><td>4910</td><td>075126</td><td>Padang Centrum</td></tr>
                                                    <tr><td>4911</td><td>075127</td><td>Padang Centrum</td></tr>
                                                    <tr><td>4912</td><td>075128</td><td>Padang Centrum</td></tr>
                                                    <tr><td>4913</td><td>075129</td><td>Padang Centrum</td></tr>
                                                    <tr><td>4914</td><td>075130</td><td>Padang Centrum</td></tr>
                                                    <tr><td>4915</td><td>075131</td><td>Padang Centrum</td></tr>
                                                    <tr><td>4916</td><td>075132</td><td>Padang Centrum</td></tr>
                                                    <tr><td>4917</td><td>075133</td><td>Padang Centrum</td></tr>
                                                    <tr><td>4918</td><td>075134</td><td>Padang Centrum</td></tr>
                                                    <tr><td>4919</td><td>075135</td><td>Padang Centrum</td></tr>
                                                    <tr><td>4920</td><td>075136</td><td>Padang Centrum</td></tr>
                                                    <tr><td>4921</td><td>075137</td><td>Padang Centrum</td></tr>
                                                    <tr><td>4922</td><td>075138</td><td>Padang Centrum</td></tr>
                                                    <tr><td>4923</td><td>075139</td><td>Padang Centrum</td></tr>
                                                    <tr><td>4924</td><td>0751890</td><td>Padang Centrum</td></tr>
                                                    <tr><td>4925</td><td>0751891</td><td>Padang Centrum</td></tr>
                                                    <tr><td>4926</td><td>0751892</td><td>Padang Centrum</td></tr>
                                                    <tr><td>4927</td><td>0751893</td><td>Padang Centrum</td></tr>
                                                    <tr><td>4928</td><td>0751894</td><td>Padang Centrum</td></tr>
                                                    <tr><td>4929</td><td>075191</td><td>Pariaman</td></tr>
                                                    <tr><td>4930</td><td>075192</td><td>Pariaman</td></tr>
                                                    <tr><td>4931</td><td>075193</td><td>Pariaman</td></tr>
                                                    <tr><td>4932</td><td>0751695</td><td>Sei Limau</td></tr>
                                                    <tr><td>4933</td><td>0751675</td><td>Sicincin</td></tr>
                                                    <tr><td>4934</td><td>075162</td><td>Teluk Bayur</td></tr>
                                                    <tr><td>4935</td><td>075161</td><td>Telukbayur</td></tr>
                                                    <tr><td>4936</td><td>075163</td><td>Telukbayur</td></tr>
                                                    <tr><td>4937</td><td>075164</td><td>Telukbayur</td></tr>
                                                    <tr><td>4938</td><td>075176</td><td>Telukbayur</td></tr>
                                                    <tr><td>4939</td><td>0751766</td><td>Telukbayur</td></tr>
                                                    <tr><td>4940</td><td>0751699</td><td>Tiku</td></tr>
                                                    <tr><td>4941</td><td>075140</td><td>Ulakkarang</td></tr>
                                                    <tr><td>4942</td><td>075141</td><td>Ulakkarang</td></tr>
                                                    <tr><td>4943</td><td>075150</td><td>Ulakkarang</td></tr>
                                                    <tr><td>4944</td><td>075151</td><td>Ulakkarang</td></tr>
                                                    <tr><td>4945</td><td>075152</td><td>Ulakkarang</td></tr>
                                                    <tr><td>4946</td><td>075153</td><td>Ulakkarang</td></tr>
                                                    <tr><td>4947</td><td>075154</td><td>Ulakkarang</td></tr>
                                                    <tr><td>4948</td><td>075155</td><td>Ulakkarang</td></tr>
                                                    <tr><td>4949</td><td>075156</td><td>Ulakkarang</td></tr>
                                                    <tr><td>4950</td><td>075157</td><td>Ulakkarang</td></tr>
                                                    <tr><td>4951</td><td>075158</td><td>Ulakkarang</td></tr>
                                                    <tr><td>4952</td><td>075159</td><td>Ulakkarang</td></tr>
                                                    <tr><td>4953</td><td>0751442</td><td>Ulakkarang</td></tr>
                                                    <tr><td>4954</td><td>0751443</td><td>Ulakkarang</td></tr>
                                                    <tr><td>4955</td><td>075228</td><td>Baso</td></tr>
                                                    <tr><td>4956</td><td>0752426</td><td>Baso</td></tr>
                                                    <tr><td>4957</td><td>0752427</td><td>Baso</td></tr>
                                                    <tr><td>4958</td><td>075271</td><td>Batusangkar</td></tr>
                                                    <tr><td>4959</td><td>075272</td><td>Batusangkar</td></tr>
                                                    <tr><td>4960</td><td>075273</td><td>Batusangkar</td></tr>
                                                    <tr><td>4961</td><td>075277</td><td>Batusangkar</td></tr>
                                                    <tr><td>4962</td><td>0752574</td><td>Batusangkar</td></tr>
                                                    <tr><td>4963</td><td>0752575</td><td>Batusangkar</td></tr>
                                                    <tr><td>4964</td><td>0752</td><td>Bukittinggi</td></tr>
                                                    <tr><td>4965</td><td>07521</td><td>Bukittinggi</td></tr>
                                                    <tr><td>4966</td><td>075221</td><td>Bukittinggi</td></tr>
                                                    <tr><td>4967</td><td>075222</td><td>Bukittinggi</td></tr>
                                                    <tr><td>4968</td><td>075223</td><td>Bukittinggi</td></tr>
                                                    <tr><td>4969</td><td>075226</td><td>Bukittinggi</td></tr>
                                                    <tr><td>4970</td><td>075231</td><td>Bukittinggi</td></tr>
                                                    <tr><td>4971</td><td>075232</td><td>Bukittinggi</td></tr>
                                                    <tr><td>4972</td><td>075233</td><td>Bukittinggi</td></tr>
                                                    <tr><td>4973</td><td>075234</td><td>Bukittinggi</td></tr>
                                                    <tr><td>4974</td><td>075235</td><td>Bukittinggi</td></tr>
                                                    <tr><td>4975</td><td>0752624</td><td>Bukittinggi</td></tr>
                                                    <tr><td>4976</td><td>0752625</td><td>Bukittinggi</td></tr>
                                                    <tr><td>4977</td><td>0752640</td><td>Bukittinggi</td></tr>
                                                    <tr><td>4978</td><td>0752641</td><td>Bukittinggi</td></tr>
                                                    <tr><td>4979</td><td>0752642</td><td>Bukittinggi</td></tr>
                                                    <tr><td>4980</td><td>0752643</td><td>Bukittinggi</td></tr>
                                                    <tr><td>4981</td><td>0752644</td><td>Bukittinggi</td></tr>
                                                    <tr><td>4982</td><td>0752645</td><td>Bukittinggi</td></tr>
                                                    <tr><td>4983</td><td>0752646</td><td>Bukittinggi</td></tr>
                                                    <tr><td>4984</td><td>0752647</td><td>Bukittinggi</td></tr>
                                                    <tr><td>4985</td><td>075266</td><td>Lubukbasung</td></tr>
                                                    <tr><td>4986</td><td>075276</td><td>Lubukbasung</td></tr>
                                                    <tr><td>4987</td><td>0752877</td><td>Lubukbasung</td></tr>
                                                    <tr><td>4988</td><td>0752878</td><td>Lubukbasung</td></tr>
                                                    <tr><td>4989</td><td>075261</td><td>Maninjau</td></tr>
                                                    <tr><td>4990</td><td>0752861</td><td>Maninjau</td></tr>
                                                    <tr><td>4991</td><td>075297</td><td>Padangjapang</td></tr>
                                                    <tr><td>4992</td><td>0752746</td><td>Padangjapang</td></tr>
                                                    <tr><td>4993</td><td>075282</td><td>Padangpanjang</td></tr>
                                                    <tr><td>4994</td><td>075283</td><td>Padangpanjang</td></tr>
                                                    <tr><td>4995</td><td>075284</td><td>Padangpanjang</td></tr>
                                                    <tr><td>4996</td><td>0752484</td><td>Padangpanjang</td></tr>
                                                    <tr><td>4997</td><td>0752485</td><td>Padangpanjang</td></tr>
                                                    <tr><td>4998</td><td>0752486</td><td>Padangpanjang</td></tr>
                                                    <tr><td>4999</td><td>075290</td><td>Payakumbuh</td></tr>
                                                    <tr><td>5000</td><td>075291</td><td>Payakumbuh</td></tr>
                                                    <tr><td>5001</td><td>075292</td><td>Payakumbuh</td></tr>
                                                    <tr><td>5002</td><td>075293</td><td>Payakumbuh</td></tr>
                                                    <tr><td>5003</td><td>075294</td><td>Payakumbuh</td></tr>
                                                    <tr><td>5004</td><td>075295</td><td>Payakumbuh</td></tr>
                                                    <tr><td>5005</td><td>075250</td><td>Payakumbuh - Harau</td></tr>
                                                    <tr><td>5006</td><td>075255</td><td>Payakumbuh - Pangkalan</td></tr>
                                                    <tr><td>5007</td><td>0752579</td><td>Sungai Tarab</td></tr>
                                                    <tr><td>5008</td><td>075260</td><td>Talu</td></tr>
                                                    <tr><td>5009</td><td>0753</td><td>Lubuksikaping</td></tr>
                                                    <tr><td>5010</td><td>07531</td><td>Lubuksikaping</td></tr>
                                                    <tr><td>5011</td><td>075320</td><td>Lubuksikaping</td></tr>
                                                    <tr><td>5012</td><td>0753321</td><td>Lubuksikaping</td></tr>
                                                    <tr><td>5013</td><td>075365</td><td>Simpangempat</td></tr>
                                                    <tr><td>5014</td><td>075360</td><td>Talu</td></tr>
                                                    <tr><td>5015</td><td>0754</td><td>Sawahlunto</td></tr>
                                                    <tr><td>5016</td><td>07541</td><td>Sawahlunto</td></tr>
                                                    <tr><td>5017</td><td>075461</td><td>Sawahlunto</td></tr>
                                                    <tr><td>5018</td><td>075462</td><td>Sawahlunto</td></tr>
                                                    <tr><td>5019</td><td>075421</td><td>Sijunjung</td></tr>
                                                    <tr><td>5020</td><td>075471</td><td>Sitiung</td></tr>
                                                    <tr><td>5021</td><td>075440</td><td>Sungaidareh</td></tr>
                                                    <tr><td>5022</td><td>0754410</td><td>Talawi</td></tr>
                                                    <tr><td>5023</td><td>075560</td><td>Alahanpanjang</td></tr>
                                                    <tr><td>5024</td><td>0755365</td><td>Bukitsileh</td></tr>
                                                    <tr><td>5025</td><td>0755583</td><td>Lubukgadang</td></tr>
                                                    <tr><td>5026</td><td>075570</td><td>Muaralabuh</td></tr>
                                                    <tr><td>5027</td><td>0755480</td><td>Padangsibusuk</td></tr>
                                                    <tr><td>5028</td><td>075591</td><td>Silungkang</td></tr>
                                                    <tr><td>5029</td><td>0755</td><td>Solok</td></tr>
                                                    <tr><td>5030</td><td>07551</td><td>Solok</td></tr>
                                                    <tr><td>5031</td><td>075520</td><td>Solok</td></tr>
                                                    <tr><td>5032</td><td>075521</td><td>Solok</td></tr>
                                                    <tr><td>5033</td><td>075522</td><td>Solok</td></tr>
                                                    <tr><td>5034</td><td>075523</td><td>Solok</td></tr>
                                                    <tr><td>5035</td><td>0755324</td><td>Solok</td></tr>
                                                    <tr><td>5036</td><td>0755325</td><td>Solok</td></tr>
                                                    <tr><td>5037</td><td>0755326</td><td>Solok</td></tr>
                                                    <tr><td>5038</td><td>0755390</td><td>Sulitair</td></tr>
                                                    <tr><td>5039</td><td>0755380</td><td>Sumani</td></tr>
                                                    <tr><td>5040</td><td>075531</td><td>Talang</td></tr>
                                                    <tr><td>5041</td><td>0756</td><td>Painan</td></tr>
                                                    <tr><td>5042</td><td>07561</td><td>Painan</td></tr>
                                                    <tr><td>5043</td><td>075620</td><td>Painan</td></tr>
                                                    <tr><td>5044</td><td>075621</td><td>Painan</td></tr>
                                                    <tr><td>5045</td><td>075622</td><td>Painan</td></tr>
                                                    <tr><td>5046</td><td>075623</td><td>Painan</td></tr>
                                                    <tr><td>5047</td><td>0757</td><td>Balaiselasa</td></tr>
                                                    <tr><td>5048</td><td>07571</td><td>Balaiselasa</td></tr>
                                                    <tr><td>5049</td><td>075740</td><td>Balaiselasa</td></tr>
                                                    <tr><td>5050</td><td>0759</td><td>Muarasiberut</td></tr>
                                                    <tr><td>5051</td><td>07591</td><td>Muarasiberut</td></tr>
                                                    <tr><td>5052</td><td>075921</td><td>Muarasiberut</td></tr>
                                                    <tr><td>5053</td><td>0760</td><td>Talukkuantan</td></tr>
                                                    <tr><td>5054</td><td>07601</td><td>Talukkuantan</td></tr>
                                                    <tr><td>5055</td><td>076020</td><td>Talukkuantan</td></tr>
                                                    <tr><td>5056</td><td>076161</td><td>Arengka</td></tr>
                                                    <tr><td>5057</td><td>076162</td><td>Arengka</td></tr>
                                                    <tr><td>5058</td><td>076163</td><td>Arengka</td></tr>
                                                    <tr><td>5059</td><td>076164</td><td>Arengka</td></tr>
                                                    <tr><td>5060</td><td>076165</td><td>Arengka</td></tr>
                                                    <tr><td>5061</td><td>076166</td><td>Arengka</td></tr>
                                                    <tr><td>5062</td><td>0761586</td><td>Arengka</td></tr>
                                                    <tr><td>5063</td><td>0761587</td><td>Arengka</td></tr>
                                                    <tr><td>5064</td><td>0761588</td><td>Arengka</td></tr>
                                                    <tr><td>5065</td><td>0761589</td><td>Arengka</td></tr>
                                                    <tr><td>5066</td><td>0761675</td><td>Bukit Raya</td></tr>
                                                    <tr><td>5067</td><td>0761676</td><td>Bukit Raya</td></tr>
                                                    <tr><td>5068</td><td>0761677</td><td>Bukit Raya</td></tr>
                                                    <tr><td>5069</td><td>0761678</td><td>Bukit Raya</td></tr>
                                                    <tr><td>5070</td><td>0761679</td><td>Bukit Raya</td></tr>
                                                    <tr><td>5071</td><td>076171</td><td>Bukitraya</td></tr>
                                                    <tr><td>5072</td><td>076172</td><td>Bukitraya</td></tr>
                                                    <tr><td>5073</td><td>076173</td><td>Bukitraya</td></tr>
                                                    <tr><td>5074</td><td>0761674</td><td>Bukitraya</td></tr>
                                                    <tr><td>5075</td><td>0761598</td><td>Minas</td></tr>
                                                    <tr><td>5076</td><td>0761</td><td>Pakanbaru</td></tr>
                                                    <tr><td>5077</td><td>07611</td><td>Pakanbaru Centrum</td></tr>
                                                    <tr><td>5078</td><td>076113</td><td>Pakanbaru Centrum</td></tr>
                                                    <tr><td>5079</td><td>076120</td><td>Pakanbaru Centrum</td></tr>
                                                    <tr><td>5080</td><td>076121</td><td>Pakanbaru Centrum</td></tr>
                                                    <tr><td>5081</td><td>076122</td><td>Pakanbaru Centrum</td></tr>
                                                    <tr><td>5082</td><td>076123</td><td>Pakanbaru Centrum</td></tr>
                                                    <tr><td>5083</td><td>076124</td><td>Pakanbaru Centrum</td></tr>
                                                    <tr><td>5084</td><td>076125</td><td>Pakanbaru Centrum</td></tr>
                                                    <tr><td>5085</td><td>076126</td><td>Pakanbaru Centrum</td></tr>
                                                    <tr><td>5086</td><td>076127</td><td>Pakanbaru Centrum</td></tr>
                                                    <tr><td>5087</td><td>076128</td><td>Pakanbaru Centrum</td></tr>
                                                    <tr><td>5088</td><td>076129</td><td>Pakanbaru Centrum</td></tr>
                                                    <tr><td>5089</td><td>076131</td><td>Pakanbaru Centrum</td></tr>
                                                    <tr><td>5090</td><td>076132</td><td>Pakanbaru Centrum</td></tr>
                                                    <tr><td>5091</td><td>076133</td><td>Pakanbaru Centrum</td></tr>
                                                    <tr><td>5092</td><td>076134</td><td>Pakanbaru Centrum</td></tr>
                                                    <tr><td>5093</td><td>076135</td><td>Pakanbaru Centrum</td></tr>
                                                    <tr><td>5094</td><td>076136</td><td>Pakanbaru Centrum</td></tr>
                                                    <tr><td>5095</td><td>076137</td><td>Pakanbaru Centrum</td></tr>
                                                    <tr><td>5096</td><td>076138</td><td>Pakanbaru Centrum</td></tr>
                                                    <tr><td>5097</td><td>076140</td><td>Pakanbaru Centrum</td></tr>
                                                    <tr><td>5098</td><td>076141</td><td>Pakanbaru Centrum</td></tr>
                                                    <tr><td>5099</td><td>076142</td><td>Pakanbaru Centrum</td></tr>
                                                    <tr><td>5100</td><td>076143</td><td>Pakanbaru Centrum</td></tr>
                                                    <tr><td>5101</td><td>076144</td><td>Pakanbaru Centrum</td></tr>
                                                    <tr><td>5102</td><td>076145</td><td>Pakanbaru Centrum</td></tr>
                                                    <tr><td>5103</td><td>076146</td><td>Pakanbaru Centrum</td></tr>
                                                    <tr><td>5104</td><td>076147</td><td>Pakanbaru Centrum</td></tr>
                                                    <tr><td>5105</td><td>0761848</td><td>Pakanbaru Centrum</td></tr>
                                                    <tr><td>5106</td><td>0761885</td><td>Pakanbaru Centrum</td></tr>
                                                    <tr><td>5107</td><td>0761886</td><td>Pakanbaru Centrum</td></tr>
                                                    <tr><td>5108</td><td>0761887</td><td>Pakanbaru Centrum</td></tr>
                                                    <tr><td>5109</td><td>0761888</td><td>Pakanbaru Centrum</td></tr>
                                                    <tr><td>5110</td><td>0761889</td><td>Pakanbaru Centrum</td></tr>
                                                    <tr><td>5111</td><td>076195</td><td>Pangkalankerinci</td></tr>
                                                    <tr><td>5112</td><td>0761493</td><td>Pangkalankerinci</td></tr>
                                                    <tr><td>5113</td><td>0761494</td><td>Pangkalankerinci</td></tr>
                                                    <tr><td>5114</td><td>0761496</td><td>Pangkalankerinci</td></tr>
                                                    <tr><td>5115</td><td>076191</td><td>Perawang</td></tr>
                                                    <tr><td>5116</td><td>076192</td><td>Perawang</td></tr>
                                                    <tr><td>5117</td><td>0761693</td><td>Perawang</td></tr>
                                                    <tr><td>5118</td><td>076151</td><td>Rumbai</td></tr>
                                                    <tr><td>5119</td><td>076152</td><td>Rumbai</td></tr>
                                                    <tr><td>5120</td><td>076153</td><td>Rumbai</td></tr>
                                                    <tr><td>5121</td><td>076154</td><td>Rumbai</td></tr>
                                                    <tr><td>5122</td><td>0761555</td><td>Rumbai</td></tr>
                                                    <tr><td>5123</td><td>0761592</td><td>Rumbai</td></tr>
                                                    <tr><td>5124</td><td>0761593</td><td>Rumbai</td></tr>
                                                    <tr><td>5125</td><td>0761594</td><td>Rumbai</td></tr>
                                                    <tr><td>5126</td><td>0761993</td><td>Rumbai</td></tr>
                                                    <tr><td>5127</td><td>0761994</td><td>Rumbai</td></tr>
                                                    <tr><td>5128</td><td>0762</td><td>Bangkinang</td></tr>
                                                    <tr><td>5129</td><td>07621</td><td>Bangkinang</td></tr>
                                                    <tr><td>5130</td><td>076220</td><td>Bangkinang</td></tr>
                                                    <tr><td>5131</td><td>076221</td><td>Bangkinang</td></tr>
                                                    <tr><td>5132</td><td>0762322</td><td>Bangkinang</td></tr>
                                                    <tr><td>5133</td><td>0762323</td><td>Bangkinang</td></tr>
                                                    <tr><td>5134</td><td>076291</td><td>Pasirpangaraian</td></tr>
                                                    <tr><td>5135</td><td>076261</td><td>Ujungbatu</td></tr>
                                                    <tr><td>5136</td><td>0763</td><td>Selatpanjang</td></tr>
                                                    <tr><td>5137</td><td>07631</td><td>Selatpanjang</td></tr>
                                                    <tr><td>5138</td><td>076331</td><td>Selatpanjang</td></tr>
                                                    <tr><td>5139</td><td>076332</td><td>Selatpanjang</td></tr>
                                                    <tr><td>5140</td><td>076333</td><td>Selatpanjang</td></tr>
                                                    <tr><td>5141</td><td>0764</td><td>Siaksiindrapura</td></tr>
                                                    <tr><td>5142</td><td>07641</td><td>Siaksiindrapura</td></tr>
                                                    <tr><td>5143</td><td>076420</td><td>Siaksiindrapura</td></tr>
                                                    <tr><td>5144</td><td>076551</td><td>Baganbatu</td></tr>
                                                    <tr><td>5145</td><td>0765</td><td>Dumai</td></tr>
                                                    <tr><td>5146</td><td>07651</td><td>Dumai</td></tr>
                                                    <tr><td>5147</td><td>076531</td><td>Dumai</td></tr>
                                                    <tr><td>5148</td><td>076532</td><td>Dumai</td></tr>
                                                    <tr><td>5149</td><td>076533</td><td>Dumai</td></tr>
                                                    <tr><td>5150</td><td>076534</td><td>Dumai</td></tr>
                                                    <tr><td>5151</td><td>076535</td><td>Dumai</td></tr>
                                                    <tr><td>5152</td><td>076536</td><td>Dumai</td></tr>
                                                    <tr><td>5153</td><td>076537</td><td>Dumai</td></tr>
                                                    <tr><td>5154</td><td>076538</td><td>Dumai</td></tr>
                                                    <tr><td>5155</td><td>0765491</td><td>Dumai</td></tr>
                                                    <tr><td>5156</td><td>076591</td><td>Duri</td></tr>
                                                    <tr><td>5157</td><td>076592</td><td>Duri</td></tr>
                                                    <tr><td>5158</td><td>076593</td><td>Duri</td></tr>
                                                    <tr><td>5159</td><td>076594</td><td>Duri</td></tr>
                                                    <tr><td>5160</td><td>0765594</td><td>Duri</td></tr>
                                                    <tr><td>5161</td><td>0765595</td><td>Duri</td></tr>
                                                    <tr><td>5162</td><td>0765596</td><td>Duri</td></tr>
                                                    <tr><td>5163</td><td>0765597</td><td>Duri</td></tr>
                                                    <tr><td>5164</td><td>0765598</td><td>Duri</td></tr>
                                                    <tr><td>5165</td><td>0765992</td><td>Duri - Pt.Caltex</td></tr>
                                                    <tr><td>5166</td><td>0765993</td><td>Duri - Pt.Caltex</td></tr>
                                                    <tr><td>5167</td><td>0765994</td><td>Duri - Pt.Caltex</td></tr>
                                                    <tr><td>5168</td><td>0765995</td><td>Duri - Pt.Caltex</td></tr>
                                                    <tr><td>5169</td><td>0765996</td><td>Duri - Pt.Caltex</td></tr>
                                                    <tr><td>5170</td><td>0766</td><td>Bengkalis</td></tr>
                                                    <tr><td>5171</td><td>07661</td><td>Bengkalis</td></tr>
                                                    <tr><td>5172</td><td>076621</td><td>Bengkalis</td></tr>
                                                    <tr><td>5173</td><td>076622</td><td>Bengkalis</td></tr>
                                                    <tr><td>5174</td><td>076623</td><td>Bengkalis</td></tr>
                                                    <tr><td>5175</td><td>076624</td><td>Bengkalis</td></tr>
                                                    <tr><td>5176</td><td>076625</td><td>Bengkalis</td></tr>
                                                    <tr><td>5177</td><td>076651</td><td>Sungaiapit</td></tr>
                                                    <tr><td>5178</td><td>076691</td><td>Sungaipakning</td></tr>
                                                    <tr><td>5179</td><td>0766391</td><td>Sungaipakning</td></tr>
                                                    <tr><td>5180</td><td>0767</td><td>Bagansiapiapi</td></tr>
                                                    <tr><td>5181</td><td>07671</td><td>Bagansiapiapi</td></tr>
                                                    <tr><td>5182</td><td>076721</td><td>Bagansiapiapi</td></tr>
                                                    <tr><td>5183</td><td>076722</td><td>Bagansiapiapi</td></tr>
                                                    <tr><td>5184</td><td>076723</td><td>Bagansiapiapi</td></tr>
                                                    <tr><td>5185</td><td>076724</td><td>Bagansiapiapi</td></tr>
                                                    <tr><td>5186</td><td>076725</td><td>Bagansiapiapi</td></tr>
                                                    <tr><td>5187</td><td>0768</td><td>Tembilahan</td></tr>
                                                    <tr><td>5188</td><td>07681</td><td>Tembilahan</td></tr>
                                                    <tr><td>5189</td><td>076821</td><td>Tembilahan</td></tr>
                                                    <tr><td>5190</td><td>076822</td><td>Tembilahan</td></tr>
                                                    <tr><td>5191</td><td>076823</td><td>Tembilahan</td></tr>
                                                    <tr><td>5192</td><td>076824</td><td>Tembilahan</td></tr>
                                                    <tr><td>5193</td><td>076941</td><td>Airmolek</td></tr>
                                                    <tr><td>5194</td><td>0769341</td><td>Pematang Rebah</td></tr>
                                                    <tr><td>5195</td><td>0769</td><td>Rengat</td></tr>
                                                    <tr><td>5196</td><td>07691</td><td>Rengat</td></tr>
                                                    <tr><td>5197</td><td>076921</td><td>Rengat</td></tr>
                                                    <tr><td>5198</td><td>076922</td><td>Rengat</td></tr>
                                                    <tr><td>5199</td><td>0769323</td><td>Rengat</td></tr>
                                                    <tr><td>5200</td><td>0769324</td><td>Rengat</td></tr>
                                                    <tr><td>5201</td><td>0770691</td><td>Lagoi</td></tr>
                                                    <tr><td>5202</td><td>0770692</td><td>Lagoi</td></tr>
                                                    <tr><td>5203</td><td>0770693</td><td>Lagoi</td></tr>
                                                    <tr><td>5204</td><td>0770696</td><td>Lobam</td></tr>
                                                    <tr><td>5205</td><td>0770697</td><td>Lobam</td></tr>
                                                    <tr><td>5206</td><td>0770</td><td>Muka Kuning</td></tr>
                                                    <tr><td>5207</td><td>07701</td><td>Muka Kuning</td></tr>
                                                    <tr><td>5208</td><td>077061</td><td>Muka Kuning</td></tr>
                                                    <tr><td>5209</td><td>0770610</td><td>Mukakuning</td></tr>
                                                    <tr><td>5210</td><td>0770611</td><td>Mukakuning</td></tr>
                                                    <tr><td>5211</td><td>0770612</td><td>Mukakuning</td></tr>
                                                    <tr><td>5212</td><td>077191</td><td>Lagoi</td></tr>
                                                    <tr><td>5213</td><td>077192</td><td>Lagoi</td></tr>
                                                    <tr><td>5214</td><td>077193</td><td>Lagoi</td></tr>
                                                    <tr><td>5215</td><td>077194</td><td>Lagoi</td></tr>
                                                    <tr><td>5216</td><td>077195</td><td>Lagoi</td></tr>
                                                    <tr><td>5217</td><td>077196</td><td>Lobam</td></tr>
                                                    <tr><td>5218</td><td>077197</td><td>Lobam</td></tr>
                                                    <tr><td>5219</td><td>077198</td><td>Lobam</td></tr>
                                                    <tr><td>5220</td><td>077199</td><td>Lobam</td></tr>
                                                    <tr><td>5221</td><td>077161</td><td>Tanjung Pinang - Kijang</td></tr>
                                                    <tr><td>5222</td><td>077162</td><td>Tanjung Pinang - Kijang</td></tr>
                                                    <tr><td>5223</td><td>0771462</td><td>Tanjung Pinang - Kijang</td></tr>
                                                    <tr><td>5224</td><td>077141</td><td>Tanjung Pinang - Km10</td></tr>
                                                    <tr><td>5225</td><td>0771</td><td>Tanjungpinang</td></tr>
                                                    <tr><td>5226</td><td>07711</td><td>Tanjungpinang</td></tr>
                                                    <tr><td>5227</td><td>077120</td><td>Tanjungpinang</td></tr>
                                                    <tr><td>5228</td><td>077121</td><td>Tanjungpinang</td></tr>
                                                    <tr><td>5229</td><td>077122</td><td>Tanjungpinang</td></tr>
                                                    <tr><td>5230</td><td>077123</td><td>Tanjungpinang</td></tr>
                                                    <tr><td>5231</td><td>077124</td><td>Tanjungpinang</td></tr>
                                                    <tr><td>5232</td><td>077125</td><td>Tanjungpinang</td></tr>
                                                    <tr><td>5233</td><td>077126</td><td>Tanjungpinang</td></tr>
                                                    <tr><td>5234</td><td>077127</td><td>Tanjungpinang</td></tr>
                                                    <tr><td>5235</td><td>077128</td><td>Tanjungpinang</td></tr>
                                                    <tr><td>5236</td><td>077129</td><td>Tanjungpinang</td></tr>
                                                    <tr><td>5237</td><td>0771311</td><td>Tanjungpinang</td></tr>
                                                    <tr><td>5238</td><td>0771312</td><td>Tanjungpinang</td></tr>
                                                    <tr><td>5239</td><td>0771313</td><td>Tanjungpinang</td></tr>
                                                    <tr><td>5240</td><td>0771314</td><td>Tanjungpinang</td></tr>
                                                    <tr><td>5241</td><td>0771555</td><td>Tanjungpinang</td></tr>
                                                    <tr><td>5242</td><td>077181</td><td>Tanjunguban</td></tr>
                                                    <tr><td>5243</td><td>077182</td><td>Tanjunguban</td></tr>
                                                    <tr><td>5244</td><td>0771482</td><td>Tanjunguban</td></tr>
                                                    <tr><td>5245</td><td>0772</td><td>Terempa</td></tr>
                                                    <tr><td>5246</td><td>07721</td><td>Terempa</td></tr>
                                                    <tr><td>5247</td><td>077231</td><td>Terempa</td></tr>
                                                    <tr><td>5248</td><td>0773</td><td>Ranai</td></tr>
                                                    <tr><td>5249</td><td>07731</td><td>Ranai</td></tr>
                                                    <tr><td>5250</td><td>077331</td><td>Ranai</td></tr>
                                                    <tr><td>5251</td><td>0776</td><td>Dabosingkep</td></tr>
                                                    <tr><td>5252</td><td>07761</td><td>Dabosingkep</td></tr>
                                                    <tr><td>5253</td><td>077621</td><td>Dabosingkep</td></tr>
                                                    <tr><td>5254</td><td>0777</td><td>Tanjungbalaikarimun</td></tr>
                                                    <tr><td>5255</td><td>07771</td><td>Tanjungbalaikarimun</td></tr>
                                                    <tr><td>5256</td><td>077721</td><td>Tanjungbalaikarimun</td></tr>
                                                    <tr><td>5257</td><td>077722</td><td>Tanjungbalaikarimun</td></tr>
                                                    <tr><td>5258</td><td>077723</td><td>Tanjungbalaikarimun</td></tr>
                                                    <tr><td>5259</td><td>077731</td><td>Tanjungbalaikarimun</td></tr>
                                                    <tr><td>5260</td><td>0777323</td><td>Tanjungbalaikarimun</td></tr>
                                                    <tr><td>5261</td><td>0777324</td><td>Tanjungbalaikarimun</td></tr>
                                                    <tr><td>5262</td><td>0777325</td><td>Tanjungbalaikarimun</td></tr>
                                                    <tr><td>5263</td><td>0777326</td><td>Tanuungbalaikarimun</td></tr>
                                                    <tr><td>5264</td><td>0778</td><td>Batam</td></tr>
                                                    <tr><td>5265</td><td>07781</td><td>Batam Centrum</td></tr>
                                                    <tr><td>5266</td><td>0778461</td><td>Batam Centrum</td></tr>
                                                    <tr><td>5267</td><td>0778462</td><td>Batam Centrum</td></tr>
                                                    <tr><td>5268</td><td>0778411</td><td>Batuampar</td></tr>
                                                    <tr><td>5269</td><td>0778412</td><td>Batuampar</td></tr>
                                                    <tr><td>5270</td><td>0778413</td><td>Batuampar</td></tr>
                                                    <tr><td>5271</td><td>0778414</td><td>Batuampar</td></tr>
                                                    <tr><td>5272</td><td>0778312</td><td>Belakang Padang</td></tr>
                                                    <tr><td>5273</td><td>0778310</td><td>Bukitdangas</td></tr>
                                                    <tr><td>5274</td><td>0778311</td><td>Bukitdangas</td></tr>
                                                    <tr><td>5275</td><td>0778405</td><td>Bukitdangas</td></tr>
                                                    <tr><td>5276</td><td>0778711</td><td>Kabil</td></tr>
                                                    <tr><td>5277</td><td>0778712</td><td>Kabil</td></tr>
                                                    <tr><td>5278</td><td>0778420</td><td>Lubukbaja</td></tr>
                                                    <tr><td>5279</td><td>0778421</td><td>Lubukbaja</td></tr>
                                                    <tr><td>5280</td><td>0778422</td><td>Lubukbaja</td></tr>
                                                    <tr><td>5281</td><td>0778423</td><td>Lubukbaja</td></tr>
                                                    <tr><td>5282</td><td>0778424</td><td>Lubukbaja</td></tr>
                                                    <tr><td>5283</td><td>0778425</td><td>Lubukbaja</td></tr>
                                                    <tr><td>5284</td><td>0778426</td><td>Lubukbaja</td></tr>
                                                    <tr><td>5285</td><td>0778427</td><td>Lubukbaja</td></tr>
                                                    <tr><td>5286</td><td>0778428</td><td>Lubukbaja</td></tr>
                                                    <tr><td>5287</td><td>0778429</td><td>Lubukbaja</td></tr>
                                                    <tr><td>5288</td><td>0778450</td><td>Lubukbaja</td></tr>
                                                    <tr><td>5289</td><td>0778451</td><td>Lubukbaja</td></tr>
                                                    <tr><td>5290</td><td>0778452</td><td>Lubukbaja</td></tr>
                                                    <tr><td>5291</td><td>0778453</td><td>Lubukbaja</td></tr>
                                                    <tr><td>5292</td><td>0778454</td><td>Lubukbaja</td></tr>
                                                    <tr><td>5293</td><td>0778455</td><td>Lubukbaja</td></tr>
                                                    <tr><td>5294</td><td>0778456</td><td>Lubukbaja</td></tr>
                                                    <tr><td>5295</td><td>0778457</td><td>Lubukbaja</td></tr>
                                                    <tr><td>5296</td><td>0778458</td><td>Lubukbaja</td></tr>
                                                    <tr><td>5297</td><td>0778459</td><td>Lubukbaja</td></tr>
                                                    <tr><td>5298</td><td>0778610</td><td>Mukakuning</td></tr>
                                                    <tr><td>5299</td><td>0778611</td><td>Mukakuning</td></tr>
                                                    <tr><td>5300</td><td>0778612</td><td>Mukakuning</td></tr>
                                                    <tr><td>5301</td><td>0778761</td><td>Nongsa</td></tr>
                                                    <tr><td>5302</td><td>0778391</td><td>Segulung</td></tr>
                                                    <tr><td>5303</td><td>0778392</td><td>Segulung</td></tr>
                                                    <tr><td>5304</td><td>0778393</td><td>Segulung</td></tr>
                                                    <tr><td>5305</td><td>0778394</td><td>Segulung</td></tr>
                                                    <tr><td>5306</td><td>0778321</td><td>Sekupang</td></tr>
                                                    <tr><td>5307</td><td>0778322</td><td>Sekupang</td></tr>
                                                    <tr><td>5308</td><td>0778323</td><td>Sekupang</td></tr>
                                                    <tr><td>5309</td><td>0778324</td><td>Sekupang</td></tr>
                                                    <tr><td>5310</td><td>0778325</td><td>Sekupang</td></tr>
                                                    <tr><td>5311</td><td>0778326</td><td>Sekupang</td></tr>
                                                    <tr><td>5312</td><td>0778327</td><td>Sekupang</td></tr>
                                                    <tr><td>5313</td><td>0778331</td><td>Sekupang</td></tr>
                                                    <tr><td>5314</td><td>0778332</td><td>Sekupang</td></tr>
                                                    <tr><td>5315</td><td>0778333</td><td>Sekupang</td></tr>
                                                    <tr><td>5316</td><td>0778334</td><td>Sekupang</td></tr>
                                                    <tr><td>5317</td><td>0778381</td><td>Tanjung Uncang</td></tr>
                                                    <tr><td>5318</td><td>077921</td><td>Tanjungbaturiau</td></tr>
                                                    <tr><td>5319</td><td>077922</td><td>Tanjungbaturiau</td></tr>
                                                    <tr><td>5320</td><td>077931</td><td>Tanjungbaturiau</td></tr>
                                                    <tr><td>5321</td><td>0779431</td><td>Tanjungbaturiau</td></tr>
                                                    <tr><td>5322</td><td>0901301</td><td>Kuala Kencana</td></tr>
                                                    <tr><td>5323</td><td>0901302</td><td>Kuala Kencana</td></tr>
                                                    <tr><td>5324</td><td>0901309</td><td>Kuala Kencana</td></tr>
                                                    <tr><td>5325</td><td>090140</td><td>Tembagapura</td></tr>
                                                    <tr><td>5326</td><td>090141</td><td>Tembagapura</td></tr>
                                                    <tr><td>5327</td><td>090142</td><td>Tembagapura</td></tr>
                                                    <tr><td>5328</td><td>090143</td><td>Tembagapura</td></tr>
                                                    <tr><td>5329</td><td>0901351</td><td>Tembagapura</td></tr>
                                                    <tr><td>5330</td><td>0901352</td><td>Tembagapura</td></tr>
                                                    <tr><td>5331</td><td>0901</td><td>Timika</td></tr>
                                                    <tr><td>5332</td><td>09011</td><td>Timika</td></tr>
                                                    <tr><td>5333</td><td>090139</td><td>Timika</td></tr>
                                                    <tr><td>5334</td><td>0901321</td><td>Timika</td></tr>
                                                    <tr><td>5335</td><td>0901322</td><td>Timika</td></tr>
                                                    <tr><td>5336</td><td>0902</td><td>Agats</td></tr>
                                                    <tr><td>5337</td><td>09021</td><td>Agats</td></tr>
                                                    <tr><td>5338</td><td>090231</td><td>Agats</td></tr>
                                                    <tr><td>5339</td><td>0910</td><td>Bandaneira</td></tr>
                                                    <tr><td>5340</td><td>09101</td><td>Bandaneira</td></tr>
                                                    <tr><td>5341</td><td>091021</td><td>Bandaneira</td></tr>
                                                    <tr><td>5342</td><td>0911</td><td>Ambon</td></tr>
                                                    <tr><td>5343</td><td>09111</td><td>Ambon</td></tr>
                                                    <tr><td>5344</td><td>091131</td><td>Ambon</td></tr>
                                                    <tr><td>5345</td><td>091134</td><td>Ambon</td></tr>
                                                    <tr><td>5346</td><td>0911320</td><td>Ambon</td></tr>
                                                    <tr><td>5347</td><td>0911321</td><td>Ambon</td></tr>
                                                    <tr><td>5348</td><td>0911322</td><td>Ambon</td></tr>
                                                    <tr><td>5349</td><td>0911323</td><td>Ambon</td></tr>
                                                    <tr><td>5350</td><td>0911350</td><td>Ambon</td></tr>
                                                    <tr><td>5351</td><td>0911351</td><td>Ambon</td></tr>
                                                    <tr><td>5352</td><td>0911352</td><td>Ambon</td></tr>
                                                    <tr><td>5353</td><td>0911353</td><td>Ambon</td></tr>
                                                    <tr><td>5354</td><td>0911354</td><td>Ambon</td></tr>
                                                    <tr><td>5355</td><td>0911355</td><td>Ambon</td></tr>
                                                    <tr><td>5356</td><td>0911356</td><td>Ambon</td></tr>
                                                    <tr><td>5357</td><td>0911360</td><td>Passo</td></tr>
                                                    <tr><td>5358</td><td>0911361</td><td>Passo</td></tr>
                                                    <tr><td>5359</td><td>0911362</td><td>Passo</td></tr>
                                                    <tr><td>5360</td><td>0911378</td><td>Poka</td></tr>
                                                    <tr><td>5361</td><td>0911379</td><td>Poka</td></tr>
                                                    <tr><td>5362</td><td>0913</td><td>Namlea</td></tr>
                                                    <tr><td>5363</td><td>09131</td><td>Namlea</td></tr>
                                                    <tr><td>5364</td><td>091321</td><td>Namlea</td></tr>
                                                    <tr><td>5365</td><td>0914</td><td>Masohi</td></tr>
                                                    <tr><td>5366</td><td>09141</td><td>Masohi</td></tr>
                                                    <tr><td>5367</td><td>091421</td><td>Masohi</td></tr>
                                                    <tr><td>5368</td><td>091422</td><td>Masohi</td></tr>
                                                    <tr><td>5369</td><td>091481</td><td>Wahai</td></tr>
                                                    <tr><td>5370</td><td>0915</td><td>Bula</td></tr>
                                                    <tr><td>5371</td><td>09151</td><td>Bula</td></tr>
                                                    <tr><td>5372</td><td>091521</td><td>Bula</td></tr>
                                                    <tr><td>5373</td><td>0916</td><td>Tual</td></tr>
                                                    <tr><td>5374</td><td>09161</td><td>Tual</td></tr>
                                                    <tr><td>5375</td><td>091621</td><td>Tual</td></tr>
                                                    <tr><td>5376</td><td>091622</td><td>Tual</td></tr>
                                                    <tr><td>5377</td><td>091623</td><td>Tual</td></tr>
                                                    <tr><td>5378</td><td>0917</td><td>Dobo</td></tr>
                                                    <tr><td>5379</td><td>09171</td><td>Dobo</td></tr>
                                                    <tr><td>5380</td><td>091721</td><td>Dobo</td></tr>
                                                    <tr><td>5381</td><td>091831</td><td>Larat</td></tr>
                                                    <tr><td>5382</td><td>0918</td><td>Saumlaki</td></tr>
                                                    <tr><td>5383</td><td>09181</td><td>Saumlaki</td></tr>
                                                    <tr><td>5384</td><td>091821</td><td>Saumlaki</td></tr>
                                                    <tr><td>5385</td><td>092161</td><td>Soasiu</td></tr>
                                                    <tr><td>5386</td><td>092162</td><td>Soasiu</td></tr>
                                                    <tr><td>5387</td><td>0921</td><td>Ternate</td></tr>
                                                    <tr><td>5388</td><td>09211</td><td>Ternate</td></tr>
                                                    <tr><td>5389</td><td>092121</td><td>Ternate</td></tr>
                                                    <tr><td>5390</td><td>092122</td><td>Ternate</td></tr>
                                                    <tr><td>5391</td><td>092123</td><td>Ternate</td></tr>
                                                    <tr><td>5392</td><td>092124</td><td>Ternate</td></tr>
                                                    <tr><td>5393</td><td>092125</td><td>Ternate</td></tr>
                                                    <tr><td>5394</td><td>092129</td><td>Ternate</td></tr>
                                                    <tr><td>5395</td><td>0921326</td><td>Ternate</td></tr>
                                                    <tr><td>5396</td><td>0921327</td><td>Ternate</td></tr>
                                                    <tr><td>5397</td><td>0921328</td><td>Ternate</td></tr>
                                                    <tr><td>5398</td><td>0922</td><td>Jailolo</td></tr>
                                                    <tr><td>5399</td><td>09221</td><td>Jailolo</td></tr>
                                                    <tr><td>5400</td><td>092221</td><td>Jailolo</td></tr>
                                                    <tr><td>5401</td><td>0923</td><td>Morotai</td></tr>
                                                    <tr><td>5402</td><td>09231</td><td>Morotai</td></tr>
                                                    <tr><td>5403</td><td>092321</td><td>Morotai</td></tr>
                                                    <tr><td>5404</td><td>0924</td><td>Tobelo</td></tr>
                                                    <tr><td>5405</td><td>09241</td><td>Tobelo</td></tr>
                                                    <tr><td>5406</td><td>092421</td><td>Tobelo</td></tr>
                                                    <tr><td>5407</td><td>0927</td><td>Labuha</td></tr>
                                                    <tr><td>5408</td><td>09271</td><td>Labuha</td></tr>
                                                    <tr><td>5409</td><td>092721</td><td>Labuha</td></tr>
                                                    <tr><td>5410</td><td>092722</td><td>Labuha</td></tr>
                                                    <tr><td>5411</td><td>0929</td><td>Mangole</td></tr>
                                                    <tr><td>5412</td><td>09291</td><td>Mangole</td></tr>
                                                    <tr><td>5413</td><td>092961</td><td>Mangole</td></tr>
                                                    <tr><td>5414</td><td>092921</td><td>Sanana</td></tr>
                                                    <tr><td>5415</td><td>0931</td><td>Saparua</td></tr>
                                                    <tr><td>5416</td><td>09311</td><td>Saparua</td></tr>
                                                    <tr><td>5417</td><td>093121</td><td>Saparua</td></tr>
                                                    <tr><td>5418</td><td>0951</td><td>Sorong</td></tr>
                                                    <tr><td>5419</td><td>09511</td><td>Sorong</td></tr>
                                                    <tr><td>5420</td><td>095121</td><td>Sorong</td></tr>
                                                    <tr><td>5421</td><td>095122</td><td>Sorong</td></tr>
                                                    <tr><td>5422</td><td>095123</td><td>Sorong</td></tr>
                                                    <tr><td>5423</td><td>095124</td><td>Sorong</td></tr>
                                                    <tr><td>5424</td><td>095125</td><td>Sorong</td></tr>
                                                    <tr><td>5425</td><td>095126</td><td>Sorong</td></tr>
                                                    <tr><td>5426</td><td>095127</td><td>Sorong</td></tr>
                                                    <tr><td>5427</td><td>095128</td><td>Sorong</td></tr>
                                                    <tr><td>5428</td><td>095129</td><td>Sorong</td></tr>
                                                    <tr><td>5429</td><td>095132</td><td>Sorong</td></tr>
                                                    <tr><td>5430</td><td>095133</td><td>Sorong</td></tr>
                                                    <tr><td>5431</td><td>0952</td><td>Teminabuan</td></tr>
                                                    <tr><td>5432</td><td>09521</td><td>Teminabuan</td></tr>
                                                    <tr><td>5433</td><td>095231</td><td>Teminabuan</td></tr>
                                                    <tr><td>5434</td><td>0955</td><td>Bintuni</td></tr>
                                                    <tr><td>5435</td><td>09551</td><td>Bintuni</td></tr>
                                                    <tr><td>5436</td><td>095531</td><td>Bintuni</td></tr>
                                                    <tr><td>5437</td><td>0956</td><td>Fak Fak</td></tr>
                                                    <tr><td>5438</td><td>09561</td><td>Fak Fak</td></tr>
                                                    <tr><td>5439</td><td>095622</td><td>Fak Fak</td></tr>
                                                    <tr><td>5440</td><td>095623</td><td>Fak Fak</td></tr>
                                                    <tr><td>5441</td><td>095624</td><td>Fak Fak</td></tr>
                                                    <tr><td>5442</td><td>0957</td><td>Kaimana</td></tr>
                                                    <tr><td>5443</td><td>09571</td><td>Kaimana</td></tr>
                                                    <tr><td>5444</td><td>095721</td><td>Kaimana</td></tr>
                                                    <tr><td>5445</td><td>0966</td><td>Sarmi</td></tr>
                                                    <tr><td>5446</td><td>09661</td><td>Sarmi</td></tr>
                                                    <tr><td>5447</td><td>096631</td><td>Sarmi</td></tr>
                                                    <tr><td>5448</td><td>0967581</td><td>Abepura</td></tr>
                                                    <tr><td>5449</td><td>0967582</td><td>Abepura</td></tr>
                                                    <tr><td>5450</td><td>0967583</td><td>Abepura</td></tr>
                                                    <tr><td>5451</td><td>0967584</td><td>Abepura</td></tr>
                                                    <tr><td>5452</td><td>0967585</td><td>Abepura</td></tr>
                                                    <tr><td>5453</td><td>0967587</td><td>Abepura</td></tr>
                                                    <tr><td>5454</td><td>0967588</td><td>Abepura</td></tr>
                                                    <tr><td>5455</td><td>0967589</td><td>Abepura</td></tr>
                                                    <tr><td>5456</td><td>0967571</td><td>Abewaena</td></tr>
                                                    <tr><td>5457</td><td>0967572</td><td>Abewaena</td></tr>
                                                    <tr><td>5458</td><td>0967573</td><td>Abewaena</td></tr>
                                                    <tr><td>5459</td><td>0967</td><td>Jayapura</td></tr>
                                                    <tr><td>5460</td><td>09671</td><td>Jayapura</td></tr>
                                                    <tr><td>5461</td><td>0967521</td><td>Jayapura</td></tr>
                                                    <tr><td>5462</td><td>0967522</td><td>Jayapura</td></tr>
                                                    <tr><td>5463</td><td>0967523</td><td>Jayapura</td></tr>
                                                    <tr><td>5464</td><td>0967524</td><td>Jayapura</td></tr>
                                                    <tr><td>5465</td><td>0967525</td><td>Jayapura</td></tr>
                                                    <tr><td>5466</td><td>0967531</td><td>Jayapura</td></tr>
                                                    <tr><td>5467</td><td>0967532</td><td>Jayapura</td></tr>
                                                    <tr><td>5468</td><td>0967533</td><td>Jayapura</td></tr>
                                                    <tr><td>5469</td><td>0967534</td><td>Jayapura</td></tr>
                                                    <tr><td>5470</td><td>0967535</td><td>Jayapura</td></tr>
                                                    <tr><td>5471</td><td>0967536</td><td>Jayapura</td></tr>
                                                    <tr><td>5472</td><td>0967537</td><td>Jayapura</td></tr>
                                                    <tr><td>5473</td><td>0967538</td><td>Jayapura</td></tr>
                                                    <tr><td>5474</td><td>0967541</td><td>Jayapura</td></tr>
                                                    <tr><td>5475</td><td>0967542</td><td>Jayapura</td></tr>
                                                    <tr><td>5476</td><td>0967543</td><td>Jayapura</td></tr>
                                                    <tr><td>5477</td><td>0967544</td><td>Jayapura</td></tr>
                                                    <tr><td>5478</td><td>0967591</td><td>Sentani</td></tr>
                                                    <tr><td>5479</td><td>0967592</td><td>Sentani</td></tr>
                                                    <tr><td>5480</td><td>0967593</td><td>Sentani</td></tr>
                                                    <tr><td>5481</td><td>0967594</td><td>Sentani</td></tr>
                                                    <tr><td>5482</td><td>0969</td><td>Wamena</td></tr>
                                                    <tr><td>5483</td><td>09691</td><td>Wamena</td></tr>
                                                    <tr><td>5484</td><td>096931</td><td>Wamena</td></tr>
                                                    <tr><td>5485</td><td>096932</td><td>Wamena</td></tr>
                                                    <tr><td>5486</td><td>096933</td><td>Wamena</td></tr>
                                                    <tr><td>5487</td><td>096934</td><td>Wamena</td></tr>
                                                    <tr><td>5488</td><td>0971</td><td>Merauke</td></tr>
                                                    <tr><td>5489</td><td>09711</td><td>Merauke</td></tr>
                                                    <tr><td>5490</td><td>097121</td><td>Merauke</td></tr>
                                                    <tr><td>5491</td><td>097122</td><td>Merauke</td></tr>
                                                    <tr><td>5492</td><td>097123</td><td>Merauke</td></tr>
                                                    <tr><td>5493</td><td>097124</td><td>Merauke</td></tr>
                                                    <tr><td>5494</td><td>0971321</td><td>Merauke</td></tr>
                                                    <tr><td>5495</td><td>0971322</td><td>Merauke</td></tr>
                                                    <tr><td>5496</td><td>0971323</td><td>Merauke</td></tr>
                                                    <tr><td>5497</td><td>0971324</td><td>Merauke</td></tr>
                                                    <tr><td>5498</td><td>0971325</td><td>Merauke</td></tr>
                                                    <tr><td>5499</td><td>0971326</td><td>Merauke</td></tr>
                                                    <tr><td>5500</td><td>0971327</td><td>Merauke</td></tr>
                                                    <tr><td>5501</td><td>097421</td><td>Bade</td></tr>
                                                    <tr><td>5502</td><td>0975</td><td>Tanahmerah</td></tr>
                                                    <tr><td>5503</td><td>09751</td><td>Tanahmerah</td></tr>
                                                    <tr><td>5504</td><td>097531</td><td>Tanahmerah</td></tr>
                                                    <tr><td>5505</td><td>0980</td><td>Ransiki</td></tr>
                                                    <tr><td>5506</td><td>09801</td><td>Ransiki</td></tr>
                                                    <tr><td>5507</td><td>098031</td><td>Ransiki</td></tr>
                                                    <tr><td>5508</td><td>0981</td><td>Biak</td></tr>
                                                    <tr><td>5509</td><td>09811</td><td>Biak</td></tr>
                                                    <tr><td>5510</td><td>098121</td><td>Biak</td></tr>
                                                    <tr><td>5511</td><td>098122</td><td>Biak</td></tr>
                                                    <tr><td>5512</td><td>098123</td><td>Biak</td></tr>
                                                    <tr><td>5513</td><td>098124</td><td>Biak</td></tr>
                                                    <tr><td>5514</td><td>098125</td><td>Biak</td></tr>
                                                    <tr><td>5515</td><td>098126</td><td>Biak</td></tr>
                                                    <tr><td>5516</td><td>098127</td><td>Biak</td></tr>
                                                    <tr><td>5517</td><td>098181</td><td>Marrauw</td></tr>
                                                    <tr><td>5518</td><td>0983</td><td>Serui</td></tr>
                                                    <tr><td>5519</td><td>09831</td><td>Serui</td></tr>
                                                    <tr><td>5520</td><td>098331</td><td>Serui</td></tr>
                                                    <tr><td>5521</td><td>098332</td><td>Serui</td></tr>
                                                    <tr><td>5522</td><td>098333</td><td>Serui</td></tr>
                                                    <tr><td>5523</td><td>098334</td><td>Serui</td></tr>
                                                    <tr><td>5524</td><td>0984</td><td>Nabire</td></tr>
                                                    <tr><td>5525</td><td>09841</td><td>Nabire</td></tr>
                                                    <tr><td>5526</td><td>098421</td><td>Nabire</td></tr>
                                                    <tr><td>5527</td><td>098422</td><td>Nabire</td></tr>
                                                    <tr><td>5528</td><td>098423</td><td>Nabire</td></tr>
                                                    <tr><td>5529</td><td>098424</td><td>Nabire</td></tr>
                                                    <tr><td>5530</td><td>0986</td><td>Manokwari</td></tr>
                                                    <tr><td>5531</td><td>09861</td><td>Manokwari</td></tr>
                                                    <tr><td>5532</td><td>098621</td><td>Manokwari</td></tr>
                                                    <tr><td>5533</td><td>098622</td><td>Manokwari</td></tr>
                                                    <tr><td>5534</td><td>098623</td><td>Manokwari</td></tr>
                                                    <tr><td>5535</td><td>098624</td><td>Manokwari</td></tr>
                                                    <tr><td>5536</td><td>098625</td><td>Manokwari</td></tr>
                                                    <tr><td>5537</td><td>0986211</td><td>Manokwari</td></tr>
                                                    <tr><td>5538</td><td>0986212</td><td>Manokwari</td></tr>
                                                    <tr><td>5539</td><td>0986213</td><td>Manokwari</td></tr>
                                                    <tr><td>5540</td><td>0986214</td><td>Manokwari</td></tr>
                                                    <tr><td>5541</td><td>0986215</td><td>Manokwari</td></tr>
                                                    <tr><td>5542</td><td>098681</td><td>Warmare</td></tr>
                                                    <tr><td>5543</td><td>0986811</td><td>Warmare</td></tr>
                                                    <tr><td>5544</td><td>0986812</td><td>Warmare</td></tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                <div class="tab-pane fade show active" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="h6">Komponen biaya perbaikan ganti kompresor lemari es:</h6>
                                            <ul type="square">
                                                <li>Jasa servis + transportasi <span class="text-danger">(lihat service cost)</span></li>
                                                <li>Refrigerant (Freon) <span class="text-danger">(lihat service cost)</span></li>
                                                <li>Part evaporator  <span class="text-danger">(lihat di SAP)</span></li>
                                                <li>Part kompresor  <span class="text-danger">(lihat di SAP)</span></li>
                                                <li>Pipa support <span class="text-danger">(kode part: PPIPCA003VRE0 --> lihat harga di SAP)</span></li>
                                                <li>Dryer <span class="text-danger">(kode part: PDRY-D004VRE00 --> lihat harga di SAP)</span></li>                                      
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div id="accordion" class="col">
                                            <div class="card">
                                                <div class="card-header" id="headingTwo">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                            Contoh lemari es model SJ-236MG <span class="text-info">(klik untuk melihat)</span>
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                                    <div class="card-body">
                                                        <table class="table table-sm table-borderless col-sm-6 ml-5 text-info">
                                                            <tbody>
                                                                <tr>
                                                                    <td>Jasa + transportasi</td>
                                                                    <td class="text-right">188,500</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Refrigerant</td>
                                                                    <td class="text-right">107,800</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Evaporator (PEVA-A008VDZZ)</td>
                                                                    <td class="text-right">100,500</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Kompresor (FCMPLA025VDKZ)</td>
                                                                    <td class="text-right">730,500</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Pipa support</td>
                                                                    <td class="text-right">34,000</td>
                                                                </tr>
                                                                <tr class="border-bottom">
                                                                    <td>Dryer</td>
                                                                    <td class="text-right">64,000</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Total</td>
                                                                    <td class="text-right">1,223,500</td>
                                                                </tr>
                                                            </tbody>                                                
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingTwo">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                            Simulasi Hitung Biaya Ganti Evaporator <span class="text-info">(klik untuk melihat)</span>
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                                    <div class="card-body">
                                                        <div class="row my-2">
                                                            <div class="col-4">
                                                                <input type="radio" name="pilihReff" id="gantiKompresorEvaporatorPilihReffDirectCooling">
                                                                <label for="gantiKompresorEvaporatorPilihReffDirectCooling">Direct cooling</label>
                                                            </div>
                                                            <div class="col-4">
                                                                <input type="radio" name="pilihReff" id="gantiKompresorEvaporatorPilihReffNoFrostBelow500">
                                                                <label for="gantiKompresorEvaporatorPilihReffNoFrostBelow500">No frost/freezer <500 liter</label>
                                                            </div>
                                                            <div class="col-4">
                                                                <input type="radio" name="pilihReff" id="gantiKompresorEvaporatorPilihReffNoFrostMore500">
                                                                <label for="gantiKompresorEvaporatorPilihReffNoFrostMore500">No frost/freezer >500 liter</label>
                                                            </div>
                                                        </div>
                                                        <table class="table table-borderless table-sm col-sm-8 ml-5" id="tableHitungGantiKompresorEvaporator">
                                                            <tbody>
                                                                <tr>
                                                                    <td>Jasa servis + transportasi</td>
                                                                    <td><input type="" name="" id="inputGantiKompresorEvaporatorJasa" value="0" class=" form-control text-right"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Refrigerant (Freon)</td>
                                                                    <td><input type="" name="" id="inputGantiKompresorEvaporatorFreon" value="0" class=" form-control text-right"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Part evaporator</td>
                                                                    <td><input type="" name="" id="inputGantiKompresorEvaporatorEvaporator" value="0" class=" form-control text-right"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Part kompresor</td>
                                                                    <td><input type="" name="" id="inputGantiKompresorEvaporatorKompresor" value="0" class=" form-control text-right"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Part pipa support</td>
                                                                    <td><input type="" name="" id="inputGantiKompresorEvaporatorPipaIsi" value="33500" class=" form-control text-right"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Part dryer</td>
                                                                    <td><input type="" name="" id="inputGantiKompresorEvaporatorDryer" value="68500" class=" form-control text-right"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Total</td>
                                                                    <td><input type="" name="" id="inputGantiKompresorEvaporatorTotal" value="0" class=" form-control text-right"></td>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>                              
    </section>
</div>
