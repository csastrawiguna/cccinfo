<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>

        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <span class="h5 text-info">Form tambah promo</span>
                            </div>
                            <div class="card-body">                                
                                <div class="form-group">
                                    <label for="promoAddformAddPromoTitle">Nama promo</label>
                                    <input type="" class="form-control" id="promoAddformAddPromoTitle" name="promoAddformAddPromoTitle">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="promoAddformAddPromoTextarea">Info promo</label>
                                    <textarea id="promoAddformAddPromoTextarea" name="promoAddformAddPromoTextarea"></textarea>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="promoAddformAddPromoRemark">Remark/keterangan</label>
                                    <input type="text" class="form-control" id="promoAddformAddPromoRemark" name="promoAddformAddPromoRemark" >
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-3" style="max-width: 200px;">
                                        <label for="promoAddformAddPromoDate">Tanggal promo</label>
                                        <input type="date" class="form-control" id="promoAddformAddPromoDate" name="promoAddformAddPromoDate">
                                    </div>
                                    <div class="form-group col-sm-3" style="max-width: 200px;">
                                        <label for="promoAddformAddPromoDateEnd">&nbsp;</label>
                                        <input type="date" class="form-control" id="promoAddformAddPromoDateEnd" name="promoAddformAddPromoDateEnd">
                                    </div>
                                    <div class="form-group col-sm-3 ml-4" style="max-width: 200px;">                                        
                                        <label for="promoAddformAddPromoStatus">Status</label>
                                        <select class="form-control custom-select" id="promoAddformAddPromoStatus" name="promoAddformAddPromoStatus">
                                            <option value="1">Active</option>
                                            <option value="0">Incative</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-outline-info" name="promoAddformAddPromoSubmit" id="promoAddformAddPromoSubmit">Save</button>
                                <a href="<?= base_url('promo') ?>"><button type="button" class="btn btn-outline-secondary">Cancel</button></a>
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
    CKEDITOR.replace('promoAddformAddPromoTextarea', {       
        // Responsive Filemanager
        removePlugins : '',
        extraPlugins : 'filetools, ckeditorfa, font, format',
        allowedContent : true,
        contentsCss : 'http://192.168.188.254/cccinfo/assets/ckeditor4.19/plugins/ckeditorfa/css/ckeditorfa.css',
        filebrowserBrowseUrl : 'http://192.168.188.254/cccinfo/assets/responsive_filemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',        
        filebrowserUploadUrl : 'http://192.168.188.254/cccinfo/assets/responsive_filemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl : 'http://192.168.188.254/cccinfo/assets/responsive_filemanager/filemanager/dialog.php?type=1&editor=ckeditor&fldr=',
        filebrowserUploadMethod : 'form',        
    });
</script>