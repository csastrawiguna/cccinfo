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
                    <span class="h5 text-info">Daftar Memo Perusahaan</span>
                    <div class="card-tools">
                        
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <table class="table" id="tableMemoList">
                            <thead>
                                <tr class="bg-light">
                                    <th>#</th>
                                    <th>Produk</th>
                                    <th>Tanggal</th>
                                    <th>Memo</th>
                                    <th>Deskripsi Memo</th>
                                    <th>Dokumen</th>
                                    <th>...</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach($allMemos as $row) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $row['memo_category'] ?></td>
                                        <td><?= date("d-M-y", strtotime($row['memo_date'])) ?></td>
                                        <td><?= $row['memo_title'] ?></td>
                                        <td><?= $row['memo_description'] ?></td>
                                        <td>
                                            <a href="<?= base_url($row['memo_docs']) ?>" target="_blank"><i class="<?= fileToIcon($row['memo_docs']) ?>"></i> Link</a>
                                        </td>
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
    </section>
</div>


