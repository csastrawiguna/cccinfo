<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>

        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col">
                    <div class="card card-outline card-info">
                        <div class="card-header">                            
                            <span class="h5 text-primary">Survey Air Purifier</span>
                            <div class="card-tools">                               
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="px-5">Nama Customer</th>
                                        <th class="px-5">Telepon</th>
                                        <th class="px-5">Status</th>
                                        <th class="text-center">...</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($allSurveyData as $row) : ?>
                                        <?php if ($row['status'] == 'answered') { ?>
                                            <tr class="bg-light">
                                                <td class="text-info"><?= $i++ ?></td>
                                                <td class="px-5 text-info"><?= $row['name'] ?></td>
                                                <td class="px-5 text-info"><?= $row['phone'] ?></td>                                            
                                                <td class="px-5 text-info"><?= $row['status'] ?></td>
                                                <td>
                                                    <button class="btn btn-xs btn-warning btnPerformSurveyAp" data-id="<?= $row['id'] ?>" data-target="#modalPerformSurveyAp" data-toggle="modal">View</button>
                                                    <!-- <button class="btn btn-xs btn-warning">Edit</button> -->
                                                </td>
                                            </tr>
                                        <?php } else if ($row['status'] == 'new') { ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td class="px-5"><?= $row['name'] ?></td>
                                                <td class="px-5"><?= $row['phone'] ?></td>                                            
                                                <td class="px-5"><?= $row['status'] ?></td>
                                                <td>
                                                    <button class="btn btn-xs btn-info btnPerformSurveyAp" data-id="<?= $row['id'] ?>" data-target="#modalPerformSurveyAp" data-toggle="modal">Survey</button>
                                                    <!-- <button class="btn btn-xs btn-warning">Edit</button> -->
                                                </td>
                                            </tr>
                                        <?php } else { ?>
                                            <tr>
                                                <td class="text-secondary"><?= $i++ ?></td>
                                                <td class="px-5 text-secondary"><?= $row['name'] ?></td>
                                                <td class="px-5 text-secondary"><?= $row['phone'] ?></td>                                            
                                                <td class="px-5 text-secondary"><?= $row['status'] ?></td>
                                                <td>
                                                    <button class="btn btn-xs btn-info btnPerformSurveyAp" data-id="<?= $row['id'] ?>" data-target="#modalPerformSurveyAp" data-toggle="modal">Survey</button>
                                                    <!-- <button class="btn btn-xs btn-warning">Edit</button> -->
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- <?php var_dump($this->session->userdata()); ?> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="modalPerformSurveyAp" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalPerformSurveyApLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form action="<?= base_url('Fumanual/updateapsurvey') ?>" method="POST">                   
                <div class="modal-header">
                    <h6 class="modal-title text-info h5" id="modalPerformSurveyApTitle">
                        Survey Air Purifier
                    </h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"> 
                    <p class="mb-3">Selamat siang Bapak/Ibu, saya ... mohon waktunya untuk konfirmasi mengenai registrasi unit air purifier di Google Form beberapa waktu lalu</p>                      
                    <input type="hidden" class="form-control" id="modalPerformSurveyApId" name="modalPerformSurveyApId" readonly>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group row">
                                <label for="categoryPeriod" class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="" class="form-control" id="modalPerformSurveyApName" name="modalPerformSurveyApName" readonly="">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group row">
                                <label for="categoryPeriod" class="col-sm-3 col-form-label">Telepon</label>
                                <div class="col-sm-9">
                                    <input type="" class="form-control" id="modalPerformSurveyApPhone" name="modalPerformSurveyApPhone" readonly="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="modalPerformSurveyApQ1" class=" col-form-label">Bagaimana kondisi unit air purifier Bapak/Ibu?</label>
                        <div class="col-sm">
                            <input type="" class="form-control" id="modalPerformSurveyApQ1" name="modalPerformSurveyApQ1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="modalPerformSurveyApQ2" class="form-label">Apakah ada kendala dalam pengoperasian/penggunaan</label>
                        <div class="col-sm">
                            <input type="" class="form-control" id="modalPerformSurveyApQ2" name="modalPerformSurveyApQ2">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="modalPerformSurveyApQ3" class="form-label">Apakah Bapak/Ibu puas dengan unit air purifier tersebut?</label>
                        <div class="col-sm">
                            <input type="" class="form-control" id="modalPerformSurveyApQ3" name="modalPerformSurveyApQ3">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="modalPerformSurveyApQ4" class="form-label">Jika berkenan, mohon informasi darimana Bapak/Ibu mendapatkan informasi tentang air purifier Sharp?</label>
                        <div class="col-sm">
                            <input type="" class="form-control" id="modalPerformSurveyApQ4" name="modalPerformSurveyApQ4">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="modalPerformSurveyApQ5" class="form-label">Apakah Bapak/Ibu adalah karyawan Sharp? Jika ya, di bagian mana?</label>
                        <div class="col-sm">
                            <input type="" class="form-control" id="modalPerformSurveyApQ5" name="modalPerformSurveyApQ5">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="modalPerformSurveyApRemark" class="form-label">Saran/masukan</label>
                        <div class="col-sm">
                            <input type="" class="form-control" id="modalPerformSurveyApRemark" name="modalPerformSurveyApRemark">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="modalPerformSurveyApStatus" class="form-label">Status</label>
                        <div class="col-sm">
                            <select type="" class="form-control custom-select" id="modalPerformSurveyApStatus" name="modalPerformSurveyApStatus">
                                <option value="new">New</option>
                                <option value="answered">Answered</option>
                                <option value="not picked up">Not picked up</option>
                                <option value="out of service area">Out of service area</option>
                                <option value="busy">Busy</option>
                                <option value="invalid phone number">Invalid phone number</option>
                                <option value="not willing to be surveyed">Not willing to be surveyed</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="modalPerformSurveyApSave" name="modalPerformSurveyApSave">Save</button>
                    <!--     -->
                </div>
            </form>
        </div>
    </div>
</div>