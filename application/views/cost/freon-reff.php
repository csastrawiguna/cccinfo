<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>

        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col">
                    <div class="card card-outline card-info">                        
                        <div class="card-header">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Ganti Kompresor</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Ganti Evaporator</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Ganti Kompresor + Evap (evap tertusuk)</a>
                                </li>   
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="h6">Komponen biaya perbaikan ganti kompresor lemari es:</h6>
                                            <ul type="square">
                                                <li>Jasa servis + transportasi <span class="text-danger">(lihat service cost)</span></li>
                                                <li>Refrigerant (Freon) <span class="text-danger">(lihat service cost)</span></li>
                                                <li>Part kompresor  <span class="text-danger">(lihat di SAP)</span></li>
                                                <li>Pipa support <span class="text-danger">(kode part: PPIPVQ004VRE0 --> lihat harga di SAP)</span></li>
                                                <li>Dryer <span class="text-danger">(kode part: PDRY-D004VRE00 --> lihat harga di SAP)</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div id="accordion" class="col">
                                            <div class="card">
                                                <div class="card-header" id="headingOne">
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
                                                                    <td class="text-right">257,000</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Refrigerant</td>
                                                                    <td class="text-right">107,800</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Kompresor (FCMPLA025VDKZ)</td>
                                                                    <td class="text-right">401,500</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Pipa support</td>
                                                                    <td class="text-right">19,500</td>
                                                                </tr>
                                                                <tr class="border-bottom">
                                                                    <td>Dryer</td>
                                                                    <td class="text-right">68,500</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Total</td>
                                                                    <td class="text-right">854,300</td>
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
                                                            Simulasi Hitung Biaya Ganti Kompresor <span class="text-info">(klik untuk melihat)</span>
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                                    <div class="card-body">
                                                        <div class="row my-2">
                                                            <div class="col-4">
                                                                <input type="radio" name="pilihReff" id="gantiKompresorPilihReffDirectCooling">
                                                                <label for="gantiKompresorPilihReffDirectCooling">Direct cooling</label>
                                                            </div>
                                                            <div class="col-4">
                                                                <input type="radio" name="pilihReff" id="gantiKompresorPilihReffNoFrostBelow500">
                                                                <label for="gantiKompresorPilihReffNoFrostBelow500">No frost/freezer <500 liter</label>
                                                            </div>
                                                            <div class="col-4">
                                                                <input type="radio" name="pilihReff" id="gantiKompresorPilihReffNoFrostMore500">
                                                                <label for="gantiKompresorPilihReffNoFrostMore500">No frost/freezer >500 liter</label>
                                                            </div>
                                                        </div>
                                                        <table class="table table-borderless table-sm col-sm-8 ml-5" id="tableHitungGantiKompresor">
                                                            <tbody>
                                                                <tr>
                                                                    <td>Jasa servis + transportasi</td>
                                                                    <td><input type="" name="" id="inputGantiKompresorJasa" value="0" class=" form-control text-right"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Refrigerant (Freon)</td>
                                                                    <td><input type="" name="" id="inputGantiKompresorFreon" value="0" class=" form-control text-right"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Part kompresor</td>
                                                                    <td><input type="" name="" id="inputGantiKompresorKompresor" value="0" class=" form-control text-right"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Part pipa support</td>
                                                                    <td><input type="" name="" id="inputGantiKompresorPipaIsi" value="33500" class=" form-control text-right"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Part dryer</td>
                                                                    <td><input type="" name="" id="inputGantiKompresorDryer" value="68500" class=" form-control text-right"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Total</td>
                                                                    <td><input type="" name="" id="inputGantiKompresorTotal" value="0" class=" form-control text-right"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>                                  
                                        </div>                              
                                    </div>
                                </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="h6">Komponen biaya perbaikan ganti kompresor lemari es:</h6>
                                            <ul type="square">
                                                <li>Jasa servis + transportasi <span class="text-danger">(lihat service cost)</span></li>
                                                <li>Refrigerant (Freon) <span class="text-danger">(lihat service cost)</span></li>
                                                <li>Part evaporator  <span class="text-danger">(lihat di SAP)</span></li>                                           
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div id="accordion" class="col">
                                            <div class="card">
                                                <div class="card-header" id="headingOne">
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
                                                                    <td class="text-right">257,000</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Refrigerant</td>
                                                                    <td class="text-right">107,800</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Evaporator (PEVA-A008VDZZ)</td>
                                                                    <td class="text-right">108,000</td>
                                                                </tr>                                                           
                                                                <tr>
                                                                    <td>Total</td>
                                                                    <td class="text-right">560,800</td>
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
                                                                <input type="radio" name="pilihReff" id="gantiEvaporatorPilihReffDirectCooling">
                                                                <label for="gantiEvaporatorPilihReffDirectCooling">Direct cooling</label>
                                                            </div>
                                                            <div class="col-4">
                                                                <input type="radio" name="pilihReff" id="gantiEvaporatorPilihReffNoFrostBelow500">
                                                                <label for="gantiEvaporatorPilihReffNoFrostBelow500">No frost/freezer <500 liter</label>
                                                            </div>
                                                            <div class="col-4">
                                                                <input type="radio" name="pilihReff" id="gantiEvaporatorPilihReffNoFrostMore500">
                                                                <label for="gantiEvaporatorPilihReffNoFrostMore500">No frost/freezer >500 liter</label>
                                                            </div>
                                                        </div>
                                                        <table class="table table-borderless table-sm col-sm-8 ml-5" id="tableHitungGantiEvaporator">
                                                            <tbody>
                                                                <tr>
                                                                    <td>Jasa servis + transportasi</td>
                                                                    <td><input type="" name="" id="inputGantiEvaporatorJasa" value="0" class=" form-control text-right"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Refrigerant (Freon)</td>
                                                                    <td><input type="" name="" id="inputGantiEvaporatorFreon" value="0" class=" form-control text-right"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Part evaporator</td>
                                                                    <td><input type="" name="" id="inputGantiEvaporatorEvaporator" value="0" class=" form-control text-right"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Total</td>
                                                                    <td><input type="" name="" id="inputGantiEvaporatorTotal" value="0" class=" form-control text-right"></td>
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
                                                <li>Pipa support <span class="text-danger">(kode part: PPIPVQ004VRE0 --> lihat harga di SAP)</span></li>
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
                                                                    <td class="text-right">257,000</td>
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
                                                                    <td>Kompresor (FCMPLA040VDKZ)</td>
                                                                    <td class="text-right">401,500</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Pipa support</td>
                                                                    <td class="text-right">19,500</td>
                                                                </tr>
                                                                <tr class="border-bottom">
                                                                    <td>Dryer</td>
                                                                    <td class="text-right">68,500</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Total</td>
                                                                    <td class="text-right">962,300</td>
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

