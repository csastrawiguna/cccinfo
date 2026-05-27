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
                        <a href="#" class="mr-4" onclick="alert('Belum ada menunya, wle wle wle...')"><i class="fas fa-plus-circle"></i> Tambah</a>
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


