<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>

        <div class="container-fluid pt-3">
            <div class="card card-outline card-info">
                <div class="card-header">                            
                    <span class="text-primary">Follow Up Manual SASS</span>
                    <div class="card-tools">                               
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <strong>Data Perbaikan</strong>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr>
                                        <td>No claim (notif)</td>
                                        <td><?= $surveyData['notif_number'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Model & No. seri</td>
                                        <td><?= $surveyData['model'] ?> / <?= $surveyData['serial_number'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal pembelian</td>
                                        <td><?= date("d F Y", strtotime($surveyData['purchase_date'])) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal perbaikan</td>
                                        <td><?= date("d F Y", strtotime($surveyData['receive_date'])) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Selesai perbaikan</td>
                                        <td><?= date("d F Y", strtotime($surveyData['finish_date'])) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Kerusakan</td>
                                        <td><?= $surveyData['damage'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Perbaikan</td>
                                        <td><?= $surveyData['reparation'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jasa servis</td>
                                        <td><span class="float-right"><?= number_format($surveyData['service_cost'],0) ?></span></td>
                                    </tr>
                                    <tr>
                                        <td>Transport</td>
                                        <td><span class="float-right"><?= number_format($surveyData['transport_cost'],0) ?></span></td>
                                    </tr>
                                    <tr>
                                        <td>Jasa + transport</td>
                                        <td><span class="float-right"><?= number_format($surveyData['service_cost'] + $surveyData['transport_cost'],0) ?></span></td>
                                    </tr>
                                    <tr>
                                        <td>Spare part</td>
                                        <td>
                                            <?= $surveyData['part1_code'] ?> <span class="float-right"><?= number_format($surveyData['part1_cost'],0) ?></span><br>
                                            <?= $surveyData['part2_code'] ?> <span class="float-right"><?= number_format($surveyData['part2_cost'],0) ?></span><br>
                                            <?= $surveyData['part3_code'] ?> <span class="float-right"><?= number_format($surveyData['part3_cost'],0) ?></span><br>
                                            <?= $surveyData['part4_code'] ?> <span class="float-right"><?= number_format($surveyData['part4_cost'],0) ?></span><br>
                                            <?= $surveyData['part5_code'] ?> <span class="float-right"><?= number_format($surveyData['part5_cost'],0) ?></span><br>
                                            <?= $surveyData['part6_code'] ?> <span class="float-right"><?= number_format($surveyData['part6_cost'],0) ?></span><br>
                                            <span class="float-right"><?= number_format($surveyData['others'],0) ?></span><br>
                                            <hr>
                                            Total part <span class="float-right"><?= number_format($surveyData['part1_cost']+$surveyData['part2_cost']+$surveyData['part3_cost']+$surveyData['part4_cost']+$surveyData['part5_cost']+$surveyData['part6_cost']+$surveyData['others'],0) ?></span><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Total biaya</td>
                                        <td><span class="float-right"><?= number_format($surveyData['service_cost'] + $surveyData['transport_cost'] + $surveyData['part1_cost'] + $surveyData['part2_cost'] + $surveyData['part3_cost'] + $surveyData['part4_cost'] + $surveyData['part5_cost'] + $surveyData['part6_cost'] + $surveyData['others'],0) ?></span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm-1"></div>
                        <div class="col-sm-5">
                            <strong>General data (customer)</strong>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr>
                                        <td>SASS</td>
                                        <td><?= $surveyData['sass_name'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Under branch</td>
                                        <td><?= $surveyData['under_branch'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama konsumen</td>
                                        <td><?= $surveyData['customer_name'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Telepon</td>
                                        <td><?= $surveyData['customer_phone'] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Questioner -->
                    <div class="row mt-4 mb-4">
                        <div class="col">
                            <p class="text-bold badge badge-pill badge-secondary px-3 py-1">
                                QUESTIONER
                            </p>
                            <form action="" method="POST">
                                <div class="form-group row">
                                    <label for="fumanualQuestioner1" class="col-sm-2 col-form-label">(Q1) Unit Condition</label>
                                    <div class="col-sm-10">
                                        <div>
                                            <div class="pretty p-default p-round my-2">
                                                <input type="radio" name="fumanualQuestioner1" id="fumanualQuestioner1" value="good">
                                                <div class="state p-success-o">
                                                    <label>Good</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="pretty p-default p-round my-2">
                                                <input type="radio" name="fumanualQuestioner1" id="fumanualQuestioner1" value="cancel repair">
                                                <div class="state p-primary-o">
                                                    <label>Batal perbaikan (cancel repair)</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="pretty p-default p-round my-2">
                                                <input type="radio" name="fumanualQuestioner1" id="fumanualQuestioner1" value="not good">
                                                <div class="state p-danger-o">
                                                    <label>Not Good/Belum selesai perbaikan</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="pretty p-default p-round my-2">
                                                <input type="radio" name="fumanualQuestioner1" id="fumanualQuestioner1" value="tidak ada perbaikan">
                                                <div class="state p-danger-o">
                                                    <label>Tidak ada perbaikan unit</label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fumanualQuestioner2" class="col-sm-2 col-form-label">(Q2) Technician manners</label>
                                    <div class="col-sm-10">
                                        <div>
                                            <div class="pretty p-default p-round my-2">
                                                <input type="radio" name="fumanualQuestioner2" id="fumanualQuestioner2" value="very good">
                                                <div class="state p-success-o">
                                                    <label>Sangat baik</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="pretty p-default p-round my-2">
                                                <input type="radio" name="fumanualQuestioner2" id="fumanualQuestioner2" value="good">
                                                <div class="state p-success-o">
                                                    <label>Baik</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="pretty p-default p-round my-2">
                                                <input type="radio" name="fumanualQuestioner2" id="fumanualQuestioner2" value="average">
                                                <div class="state p-primary-o">
                                                    <label>Cukup baik</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="pretty p-default p-round my-2">
                                                <input type="radio" name="fumanualQuestioner2" id="fumanualQuestioner2" value="cancel repair">
                                                <div class="state p-warning-o">
                                                    <label>Kurang baik</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="pretty p-default p-round my-2">
                                                <input type="radio" name="fumanualQuestioner2" id="fumanualQuestioner2" value="cancel repair">
                                                <div class="state p-danger-o">
                                                    <label>Buruk</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fumanualQuestioner3" class="col-sm-2 col-form-label">(Q3) Biaya</label>
                                    <div class="col-sm-10">
                                        <div>
                                            <div class="pretty p-default p-round my-2">
                                                <input type="radio" name="fumanualQuestioner3" id="fumanualQuestioner3" value="data sesuai">
                                                <div class="state p-success-o">
                                                    <label>Sesuai dengan data SAP/claim</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="pretty p-default p-round my-2">
                                                <input type="radio" name="fumanualQuestioner3" id="fumanualQuestioner3" value="beda dengan SAP/claim">
                                                <div class="state p-danger-o">
                                                    <label>Berbeda dengan SAP/claim</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fumanualQuestionerQ3Remark" class="col-sm-2 col-form-label">Q3 Remark</label>
                                    <div class="col-sm-8">
                                        <input type="" class="form-control" id="fumanualQuestionerQ3Remark" name="fumanualQuestionerQ3Remark" placeholder="isi jika ada perbedaan detail perbaikan dengan info dari konsumen">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fumanualQuestionerReceivedBy" class="col-sm-2 col-form-label">FU diterima oleh</label>
                                    <div class="col-sm-8">
                                        <input type="" class="form-control" id="fumanualQuestionerReceivedBy" name="fumanualQuestionerReceivedBy" placeholder="jika penerima telepon beda dengan data">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fumanualResult" class="col-sm-2 col-form-label">Positif/Negatif</label>
                                    <div class="col-sm-10">
                                        <div>
                                            <div class="pretty p-default p-round my-2">
                                                <input type="radio" name="fumanualResult" id="fumanualResult" value="1">
                                                <div class="state p-success-o">
                                                    <label>Positif</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="pretty p-default p-round my-2">
                                                <input type="radio" name="fumanualResult" id="fumanualResult" value="0">
                                                <div class="state p-danger-o">
                                                    <label>Negatif</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fumanualStatus" class="col-sm-2 col-form-label">Follow up result</label>
                                    <div class="col-sm-3" style="min-width: 100px;">
                                        <select class="custom-select" name="fumanualStatus" id="fumanualStatus">
                                            <option value="">None</option>
                                            <option value="answered">Answered</option>
                                            <option value="not picked up">Tidak diangkat</option>
                                            <option value="inactive">Telepon tidak aktif</option>
                                            <option value="wrong number">Wrong Number/salah sambung</option>
                                            <option value="out of service area">Di Luar Service Area/Jangkauan</option>
                                            <option value="invalid phone">Telepon tidak valid</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-top: 25px;">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-info px-4">Submit survey</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <!-- Data lainnya -->
                    <hr>
                    <div class="row mt-4">
                        <div class="col">
                            <p class="text-bold badge badge-pill badge-secondary px-3 py-1">PERBAIKAN UNIT LAIN</p>
                            <?php if(count($relatedData) == 0) : ?>
                                <p class="text-muted">- (Laporan perbaikan hanya 1 unit) -</p>
                            <?php else : ?>
                                <?php $x = 1; ?>
                                <?php foreach ($relatedData as $row) : ?>
                                    <div class="row">
                                        <div class="col-sm-1 text-center"><span class="bg-info px-2"><?= $x++; ?></span></div>
                                        <div class="col-6">                                            
                                            <table class="table table-sm table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td>No claim (notif)</td>
                                                        <td><?= $row['notif_number'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Model & no.seri</td>
                                                        <td><?= $row['model'] ?> & <?= $row['serial_number'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tanggal pembelian</td>
                                                        <td><?= date("d F Y", strtotime($row['purchase_date'])) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tanggal perbaikan</td>
                                                        <td><?= date("d F Y", strtotime($row['receive_date'])) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Selesai perbaikan</td>
                                                        <td><?= date("d F Y", strtotime($row['finish_date'])) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kerusakan</td>
                                                        <td><?= $row['damage'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Perbaikan</td>
                                                        <td><?= $row['reparation'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jasa servis</td>
                                                        <td><span class="float-right"><?= number_format($row['service_cost'],0) ?></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Transport</td>
                                                        <td><span class="float-right"><?= number_format($row['transport_cost'],0) ?></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jasa + transport</td>
                                                        <td><span class="float-right"><?= number_format($row['service_cost'] + $row['transport_cost'],0) ?></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Spare part</td>
                                                        <td>
                                                            <?= $row['part1_code'] ?> <span class="float-right"><?= number_format($row['part1_cost'],0) ?></span><br>
                                                            <?= $row['part2_code'] ?> <span class="float-right"><?= number_format($row['part2_cost'],0) ?></span><br>
                                                            <?= $row['part3_code'] ?> <span class="float-right"><?= number_format($row['part3_cost'],0) ?></span><br>
                                                            <?= $row['part4_code'] ?> <span class="float-right"><?= number_format($row['part4_cost'],0) ?></span><br>
                                                            <?= $row['part5_code'] ?> <span class="float-right"><?= number_format($row['part5_cost'],0) ?></span><br>
                                                            <?= $row['part6_code'] ?> <span class="float-right"><?= number_format($row['part6_cost'],0) ?></span><br>
                                                            <span class="float-right"><?= number_format($row['others'],0) ?></span><br>
                                                            <hr>
                                                            Total part <span class="float-right"><?= number_format($row['part1_cost']+$row['part2_cost']+$row['part3_cost']+$row['part4_cost']+$row['part5_cost']+$row['part6_cost']+$row['others'],0) ?></span><br>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total biaya</td>
                                                        <td><span class="float-right"><?= number_format($row['service_cost'] + $row['transport_cost'] + $row['part1_cost'] + $row['part2_cost'] + $row['part3_cost'] + $row['part4_cost'] + $row['part5_cost'] + $row['part6_cost'] + $row['others'],0) ?></span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-sm-4">
                                            <a href="<?= base_url('fumanual/fillsurvey/') . $row['id'] ?>" target="_blank"><button class="btn btn-outline-info"><i class="far fa-paper-plane"></i> Isi survey notif/claim ini</button></a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>                    
                </div>                              
            </div>
        </div>
    </section>
</div>