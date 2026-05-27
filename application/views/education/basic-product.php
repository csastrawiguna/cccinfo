<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>

        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <span class="h6 text-primary">Materi Basic Product</span>
                        </div>
                        
                        <div class="card-body">
                            <p class="mb-5"><i class="fas fa-info-circle text-danger"></i> <em class="text-info">Education Material will be moved to Logsheet->Elearning starting on Oct 1st 2023</em></p>
                            <table class="table mt-3" id="tableMaterialEducationProduct">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kategori</th>
                                        <th>Judul Materi</th>
                                        <th>Keterangan</th>
                                        <th>Link Materi</th>
                                        <th>...</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach($basicProducts as $row) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $row['category'] ?></td>
                                            <td><?= $row['material_title'] ?></td>
                                            <td><?= $row['description'] ?></td>
                                            <td>
                                                <a href="<?= base_url() . $row['material_link'] ?>" target="_blank">
                                                    <i class="fas fa-file-pdf"></i> Link
                                                </a>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                <i class="fas fa-bars" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;"></i>
                                                <div class="dropdown-menu dropdown-menu-right p-2" style="min-width: 420px;">
                                                    <table class="table table-sm table-borderless table-hover">
                                                        <tbody>
                                                            <tr>
                                                                <td>Disimpan oleh</td>
                                                                <td class="">: <?= $row['saved_by']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Disimpan pada</td>
                                                                <td class="">: <?= $row['saved_at']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Diperbaharui oleh</td>
                                                                <td class="">: <?= $row['updated_by']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Diperbaharui pada</td>
                                                                <td class="">: <?= $row['updated_at']; ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
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
            </div>
        </div>                              
    </section>
</div>
