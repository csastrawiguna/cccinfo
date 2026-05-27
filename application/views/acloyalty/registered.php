<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>

        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <span class="h5 text-primary">Daftar Teknisi Installer Yang Telah Registrasi</span>
                            <div class="card-tools">
                                <a href="#"><button class="btn btn-xs btn-outline-info"><i class="fas fa-plus-circle"></i> Tambah data&nbsp</button></a>
                                <a href="#"><button class="btn btn-xs btn-outline-info"><i class="fas fa-file-excel"></i> Upload Excel&nbsp</button></a>
                            </div>
                        </div>
                        <div class="card-body">
                             <table class="table table-hover" id="tableAcLoyaltyRegistration">
                                 <thead>
                                     <tr>
                                         <th>#</th>
                                         <th>Nama teknisi/installer</th>
                                         <th>Telepon</th>
                                         <th>Kode teknisi</th>
                                         <th>ID Membership</th>
                                         <th>Username</th>
                                         <th>Join date</th>
                                         <th>Remark</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach($allRegistration as $row): ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $row['technician_name'] ?></td>
                                            <td><?= $row['technician_phone'] ?></td>
                                            <td><?= $row['technician_code'] ?></td>
                                            <td><?= $row['membership_id'] ?></td>
                                            <td><?= $row['app_username'] ?></td>
                                            <td><?= date("d M Y", strtotime($row['joindate'])) ?></td>
                                            <td><?= $row['alp_remark'] ?></td>
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
