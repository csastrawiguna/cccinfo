<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>
        <?php 
        $allowedAccess = ['1', '9']; 

        function toStringDate($date){
            if(strtotime($date) < 0 || $date == NULL){
              return '-';
            } else {
              return $date;
            }
          }

        function fileToIcon($file) {
            $text = explode('.', $file);
            $images = ['jpg', 'jpeg', 'png', 'gif'];
            $general = ['doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx'];
            
            if (in_array(strtolower($text[1]), $images)) {
                $ext = 'fas fa-file-image';
            } else if (strtolower($text[1]) == 'pdf') {
                $ext = 'fas fa-file-pdf';
            } else {
                $ext = 'fas fa-file';
            }
            return $ext;
        }
        ?>

        <div class="container-fluid pt-3">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <span class="h5 text-info"><i class="fas fa-bookmark"></i> Estimasi Kedatangan Part <em>(BO Part)</em></span>
                    <div class="card-tools">
                        <a href="#" class="mr-4" data-toggle="modal" data-target="#modalUploadBopart" ><i class="fas fa-plus-circle"></i> Tambah</a>
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="row mb-5">
                        <div class="col">
                            <div class="h5 text-primary mb-3"></div>
                            <table class="table table-sm" id="tableInfoList1">
                                <thead>
                                    <tr class="bg-light">
                                        <th>#</th>
                                        <th>Tanggal</th>
                                        <th>Judul</th>
                                        <th>Deskripsi</th>   
                                        <th>...</th>                                     
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach($allInfos as $row) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= date("d-M-y", strtotime($row['date'])) ?></td>
                                            <td><?= $row['title'] ?></td>
                                            <td><?= $row['description'] ?></td>
                                            <td>
                                                <div class="btn-group">                            
                                                  <i class="fas fa-bars text-info" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;"></i>
                                                  <div class="dropdown-menu dropdown-menu-right p-2" style="min-width: 300px;">
                                                    <table  class="table table-sm table-borderless table-hover">
                                                      <tbody>
                                                        <tr>
                                                          <td>Saved by</td>
                                                          <td class="">: <?= $row['saved_by']; ?></td>
                                                        </tr>
                                                        <tr>
                                                          <td>Saved at</td>
                                                          <td class="">: <?= toStringDate($row['saved_at']); ?></td>
                                                        </tr>
                                                        <tr>
                                                          <td>Last modified</td>
                                                          <td class="">: <?= toStringDate($row['updated_by']); ?></td>
                                                        </tr>
                                                        <tr>
                                                          <td>Datetime</td>
                                                          <td class="">: <?= toStringDate($row['updated_at']); ?></td>
                                                        </tr>
                                                        <?php if (in_array($this->session->userdata('useraccess'), $allowedAccess)) : ?>
                                                            <tr>
                                                                <td colspan="2">
                                                                    <a href="<?= base_url('promo/deleteBopartData/') . $row['id'] ?>" class="text-danger buttonDeleteBopart" data-id="<?= $row['id'] ?>" data-date="<?= date("Ymd", strtotime($row['date'])) ?>" data-yrs="<?= date("Y", strtotime($row['date'])) ?>">
                                                                        <i class="fas fa-times"></i> Delete row
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        <?php endif; ?>
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

<div class="modal fade" id="modalUploadBopart">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <?= form_open_multipart('promo/uploadBopart'); ?>
            <div class="modal-header">
                <h4 class="modal-title">Upload data BO part</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="uploadBopartDate" class="col-sm-2 col-form-label">Date</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="uploadBopartDate" name="uploadBopartDate" value="<?= date("Y-m-d", strtotime("-3 days")) ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="uploadBopartFile" class="col-sm-2 col-form-label">File</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="uploadBopartFile" name="uploadBopartFile" accept=".pdf">
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-primary"><i class="fas fa-upload"></i> Upload</button>
            </div>
            </form>
        </div>
    </div>
</div>