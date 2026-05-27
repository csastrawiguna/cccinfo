<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>

        <?php
        $allowedAccess = ['1', '9'];

        function shareToString($string)
        {
            if ($string == 'private') {
                return '<span class="text-danger"><span class="badge badge-warning px-2">Limited</span> Terbatas, ijin dulu kalau mau pakai</span>';
            } else {
                return '<span class="badge badge-info px-2">SHARED</span> semua bisa pakai';
            }
        }

        function shareToSymbol($string)
        {
            if ($string == 'private') {
                return '<span class="badge badge-warning px-2">Limited</span>';
            } else {
                return '<span class="badge badge-info px-2">SHARED</span>';
            }
        }

        function shareToStyle($string)
        {
            if ($string == 'private') {
                return 'text-light';
            } else {
                return 'text-dark';
            }
        }
        //var_dump($this->session->userdata())
        ?>

        <div class="container-fluid pt-3">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <span class="text-primary">Daftar user SAP CCC</span>
                    <?php if (in_array($this->session->userdata('useraccess'), $allowedAccess)) : ?>
                        <div class="card-tools">
                            <a href="#" class="mr-3" data-toggle="modal" data-target="#formEditPasswordSapModal"><button class="btn btn-info btn-sm px-3" id="buttonAddSapData">Add data</button></a>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Access</th>
                                <th>Penggunaan </th>
                                <th>...</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($sapUsers as $row) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $row['name']  ?></td>
                                    <td><?= strtoupper($row['username'])  ?></td>
                                    <td class="<?= shareToStyle($row['share']) ?>"><?= $row['password']  ?></td>
                                    <td><?= $row['access'] ?></td>
                                    <td><?= shareToSymbol($row['share']) ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <i class="fas fa-bars" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;"></i>
                                            <div class="dropdown-menu dropdown-menu-right p-2" style="min-width: 480px;">
                                                <table class="table table-sm table-borderless table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td>Penggunaan</td>
                                                            <td class="">: <?= shareToString($row['share']); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Keterangan</td>
                                                            <td class="">: <?= $row['remark']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Update oleh</td>
                                                            <td class="">: <?= $row['updated_by']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Update pada</td>
                                                            <td>: <?= date("d M Y h:i", strtotime($row['updated_at'])); ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <?php if (in_array($this->session->userdata('useraccess'), $allowedAccess)) : ?>
                                                    <table class="table table-sm table-borderless">
                                                        <tbody>
                                                            <tr class="border-top">
                                                                <td class="py-2">
                                                                    <a href="#" class="text-primary buttonEditPasswordSap" title="Edit data" data-id="<?= $row['id']; ?>" data-toggle="modal" data-target="#formEditPasswordSapModal">
                                                                        <i class="fas fa-pen"></i></span> &nbspEdit data
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                <?php endif; ?>
                                            </div>
                                        </div>
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

<div class="modal fade" id="formEditPasswordSapModal" tabindex="-1" role="dialog" aria-labelledby="formEditPasswordSapModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formEditPasswordSapModalLabel">Update Password User SAP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="" id="formEditPasswordSap">
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="formEditPasswordSapId" name="formEditPasswordSapId" readonly>
                    <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <label for="formEditPasswordSapUsername" class="col-sm col-form-label">Username</label>
                                <div class="col-sm">
                                    <input type="text" class="form-control" id="formEditPasswordSapUsername" name="formEditPasswordSapUsername">
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="formEditPasswordSapAccess" class="col-sm col-form-label">Akses</label>
                                <div class="col-sm">
                                    <select class="form-control custom-select" id="formEditPasswordSapAccess" name="formEditPasswordSapAccess">
                                        <option value="Display">Display</option>
                                        <option value="Full">Full</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <label for="formEditPasswordSapName" class="col-sm col-form-label">Nama</label>
                                <div class="col-sm">
                                    <input type="text" class="form-control" id="formEditPasswordSapName" name="formEditPasswordSapName">
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="formEditPasswordSapRemark" class="col-sm col-form-label">Share</label>
                                <div class="col-sm">
                                    <select class="form-control custom-select" id="formEditPasswordSapShare" name="formEditPasswordSapShare">
                                        <option value="shared">Shared</option>
                                        <option value="private">Limited</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="formEditPasswordSapRemark" class="col-sm col-form-label">Keterangan</label>
                        <div class="col-sm">
                            <input type="" class="form-control" id="formEditPasswordSapRemark" name="formEditPasswordSapRemark">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="formEditPasswordSapPassword1" class="col-sm col-form-label">Password baru</label>
                        <div class="col-sm">
                            <input type="password" class="form-control" id="formEditPasswordSapPassword1" name="formEditPasswordSapPassword1">
                            <small class="text-danger" id="errorPassword1" style="display: none;">Password belum diisi</small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="formEditPasswordSapPassword2" class="col-sm col-form-label">Konfirmasi password baru</label>
                        <div class="col-sm">
                            <input type="password" class="form-control" id="formEditPasswordSapPassword2" name="formEditPasswordSapPassword2">
                            <small class="text-danger" id="errorPassword2" style="display: none;">Konfirmasi Password tidak sesuai</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="formEditPasswordSapSubmit" id="formEditPasswordSapSubmit" disabled>Update</button>
                </div>
            </form>
        </div>
    </div>
</div>