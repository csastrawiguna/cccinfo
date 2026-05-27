<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>

        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h6 class="h5 text-primary">Daftar user SAP CCC</h6>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Access</th>
                                        <th>Remark </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach($sapUsers as $row): ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $row['name']  ?></td>
                                            <td><?= strtoupper($row['username'])  ?></td>
                                            <td><?= $row['password']  ?></td>
                                            <td><?= $row['access']  ?></td>
                                            <td><?= $row['remark']  ?></td>
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
