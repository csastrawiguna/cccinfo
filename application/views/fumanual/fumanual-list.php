<div class="content-wrapper">
<!-- Main content -->
    <section class="content pt-2">
        <div class="container-fluid">
            <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
            <?php 
                $allowedChangeAgent = ['1', '5', '6', '9'];
                if(!$this->input->post()) {
                    $period = date("Y-m-01", strtotime("-1 month"));
                    $agent = $this->session->userdata('user_id');
                } else {
                    $period = $this->input->post('fumanualSelectPeriod');          
                    $agent = $this->input->post('fumanualSelectAgent');
                }

                function setTextColor($q3Result) {
                    if (strtolower($q3Result) == 'data sesuai') {
                        return 'text-secondary font-italic';
                    } else if (strtolower($q3Result) == 'beda dengan sap/claim') {
                        return 'text-danger';
                    } else {
                        return '';
                    }
                }

                function setBadgeColor($fuResult) {
                    if (strtolower($fuResult) == 'answered') {
                        return '<span class="badge badge-success">Answered</span>';
                    } else if (strtolower($fuResult) == 'not picked up' || strtolower($fuResult) == 'out of service area' || strtolower($fuResult) == 'inactive') {
                        return '<span class="badge badge-primary py-1 px-1">' . $fuResult . '</span>';
                    } else if (strtolower($fuResult) == 'invalid phone' || strtolower($fuResult) == 'wrong number') {
                        return '<span class="badge badge-danger py-1 px-1">' . $fuResult . '</span>';
                    } else {
                        return '<span class="badge badge-secondary px-2 py-1" style="font-weight: normal">New</span>';
                    }
                }

            ?>
            <span class="badge"></span>
            <div class="card card-outline card-info">
                <div class="card-header">
                    Follow Up Manual SASS
                </div>
                <div class="card-body">                
                    <form action="" class="form-row mb-5" method="post" style="width: 820px;">
                        <label for="fumanualSelectAgent" class="col-sm-1">Agent</label>
                        <div class="col-sm-2">
                            <select id="fumanualSelectAgent" name="fumanualSelectAgent" class="custom-select">
                                <option selected><?= $agent ?></option>
                                <?php if(in_array($this->session->userdata('role_access'), $allowedChangeAgent)): ?>
                                    <?php foreach ($allAgents as $ag): ?>
                                        <option value="<?= $ag['user_id']; ?>"><?= $ag['user_id']; ?></option>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <option><?= $this->session->userdata('user_id'); ?></option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <label for="fumanualSelectPeriod" class="col-sm-1 ml-5">Period</label>
                        <div class="col-sm-2">
                            <input type="date" id="fumanualSelectPeriod" name="fumanualSelectPeriod" class="form-control" value="<?= $period?>">
                        </div>
                        <div class="row ml-1">
                            <button type="submit" class="btn btn-outline-primary" id="fumanualSelectPeriodSubmit" name="fumanualSelectPeriodSubmit">Go</button>      
                        </div>
                    </form>
                    <p>Total data : <?= count($allSurveyData) ?></p>
                    <table id="tableFumanualSurveylist" class="table table-sm">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>SASS</th>                                
                                <th>No Claim</th>
                                <th>Konsumen</th>
                                <th>Telepon</th>
                                <th>Model & No seri</th>
                                <th>Status</th>
                                <th class="text-center">...</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach($allSurveyData as $row): ?>
                                <tr class="<?= setTextColor($row['q3']) ?>">
                                    <td><?= $i++ ?></td>
                                    <td><?= $row['sass_name'] ?><br><small class="text-muted">(<?= $row['under_branch'] ?>)</small></td>
                                    <td><?= $row['notif_number'] ?></td>
                                    <td><?= $row['customer_name'] ?></td>
                                    <td><?= $row['customer_phone'] ?></td>
                                    <td><?= $row['model'] ?><br><?= $row['serial_number'] ?></td>
                                    <td class="align-middle"><?= setBadgeColor($row['followup_status']) ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('fumanual/fillsurvey/') . $row['id'] ?>" target="_blank"><button class="btn btn-xs btn-outline-info"><i class="far fa-paper-plane"></i> Survey</button></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>                        
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
