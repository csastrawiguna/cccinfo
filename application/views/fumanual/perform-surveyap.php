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
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td class="px-5"><?= $row['name'] ?></td>
                                            <td class="px-5"><?= $row['phone'] ?></td>                                            
                                            <td class="px-5"><?= $row['status'] ?></td>
                                            <td>
                                                <button class="btn btn-xs btn-info">Survey</button>
                                                <button class="btn btn-xs btn-warning">Edit</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>