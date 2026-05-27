<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>

        <?php 
            function statusToString($status) {
                if ($status == 0) {
                    return "Inactive"; 
                } else {
                    return "Active";
                }
            }
        ?>

        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <span class="h5 text-info">Edit data promo</span>
                                <div class="card-tools">
                                    <a href="<?= base_url('promo/index') ?>" class="mr-3"><button type="button" class="btn btn-sm btn-outline-secondary">Cancel</button></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <input type="hidden" class="form-control" id="promoEditPromoId" name="promoEditPromoId" value="<?= $promoDetail['id'] ?>">
                                <div class="form-group">
                                    <label for="promoEditPromoTitle">Nama promo</label>
                                    <input type="" class="form-control" id="promoEditPromoTitle" name="promoEditPromoTitle" value="<?= $promoDetail['title'] ?>">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="promoEditPromoTextarea">Info promo</label>
                                    <textarea id="promoEditPromoTextarea" name="promoEditPromoTextarea"><?= $promoDetail['description'] ?></textarea>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="promoEditPromoRemark">Remark/keterangan</label>
                                    <input type="text" class="form-control" id="promoEditPromoRemark" name="promoEditPromoRemark" value="<?= $promoDetail['remark'] ?>">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-3" style="max-width: 200px;">
                                        <label for="promoEditPromoDate">Tanggal promo</label>
                                        <input type="date" class="form-control" id="promoEditPromoDate" name="promoEditPromoDate" value="<?= $promoDetail['date'] ?>">
                                    </div>
                                    <div class="form-group col-sm-3" style="max-width: 200px;">
                                        <label for="promoEditPromoDateEnd">&nbsp;</label>
                                        <input type="date" class="form-control" id="promoEditPromoDateEnd" name="promoEditPromoDateEnd" value="<?= $promoDetail['date_end'] ?>">
                                    </div>
                                    <div class="form-group col-sm-3 ml-4" style="max-width: 200px;">                                        
                                        <label for="promoEditPromoStatus">Status</label>
                                        <select class="form-control custom-select" id="promoEditPromoStatus" name="promoEditPromoStatus">
                                            <option value="$promoDetail['is_active']" selected><?= statusToString($promoDetail['is_active']) ?></option>
                                            <option value="1">Active</option>
                                            <option value="0">Incative</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-outline-info" name="promoEditPromoSubmit" id="promoEditPromoSubmit">Update</button>
                                <a href="<?= base_url('promo/index') ?>"><button type="button" class="btn btn-outline-secondary">Cancel</button></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="<?= base_url('assets/ckeditor4.19/ckeditor.js') ?>"></script>
<script type="text/javascript">
    CKEDITOR.replace('promoEditPromoTextarea', {       
        // Responsive Filemanager
        removePlugins : '',
        extraPlugins : 'filetools, ckeditorfa, format, font',
        allowedContent : true,
        contentsCss : 'http://192.168.188.254/cccinfo/assets/ckeditor4.19/plugins/ckeditorfa/css/ckeditorfa.css',
        filebrowserBrowseUrl : 'http://192.168.188.254/cccinfo/assets/responsive_filemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',        
        filebrowserUploadUrl : 'http://192.168.188.254/cccinfo/assets/responsive_filemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl : 'http://192.168.188.254/cccinfo/assets/responsive_filemanager/filemanager/dialog.php?type=1&editor=ckeditor&fldr=',
        filebrowserUploadMethod : 'form',        
    });
</script>