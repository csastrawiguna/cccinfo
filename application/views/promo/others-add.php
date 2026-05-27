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
                                <span class="h5 text-info">Form tambah info blast Whatsapp/SMS</span>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-4" style="max-width: 200px;">
                                        <label for="promoAddformAddBlastCategory">Kategori blast</label>
                                        <select class="form-control custom-select" id="promoAddformAddBlastCategory" name="promoAddformAddBlastCategory" >
                                            <option value="Sales">Sales</option>
                                            <option value="Service">Service</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4" style="max-width: 200px;">
                                        <label for="promoAddformAddBlastDate">Tanggal blast</label>
                                        <input type="date" class="form-control" id="promoAddformAddBlastDate" name="promoAddformAddBlastDate">
                                    </div>
                                    <div class="form-group col-md-4" style="max-width: 200px;">
                                        <label for="promoAddformAddBlastTime">Jam bast</label>
                                        <input type="time" class="form-control" id="promoAddformAddBlastTime" name="promoAddformAddBlastTime">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="promoAddformAddBlastTitle">Nama atau judul Whatsapp/SMS blast</label>
                                    <input type="" class="form-control" id="promoAddformAddBlastTitle" name="promoAddformAddBlastTitle">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="promoAddformAddBlastTextarea">Konten Whatsapp/SMS blast</label>
                                    <textarea id="promoAddformAddBlastTextarea" name="promoAddformAddBlastTextarea"></textarea>
                                </div>
                                <div class="form-group" style="max-width: 500px">
                                    <label for="promoAddformAddBlastPicture">Gambar atau key visual (KV) blast</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="promoAddformAddBlastPicture" name="promoAddformAddBlastPicture">
                                        <label class="custom-file-label" for="customFile">Pilih gambar</label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-10">
                                        <label for="promoAddformAddBlastRemark">Remark/keterangan</label>
                                        <input type="" class="form-control" id="promoAddformAddBlastRemark" name="promoAddformAddBlastRemark" >
                                    </div>
                                    <div class="form-group col-sm-2" style="max-width: 160px;">
                                        <label for="promoAddformAddPromoStatus">Status</label>
                                        <select class="form-control custom-select" id="promoAddformAddPromoStatus" name="promoAddformAddPromoStatus">
                                            <option value="1">Sent</option>
                                            <option value="0">Not send</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-4" style="max-width: 200px;">
                                        <label for="promoAddformAddBlastRequestDate">Qty recipient blast</label>
                                        <input type="number" class="form-control" id="promoAddformAddBlastRequestDate" name="promoAddformAddBlastRequestDate" placeholder="Jumlah total target">
                                    </div>
                                    <div class="form-group col-sm-4" style="max-width: 200px;">
                                        <label for="promoAddformAddBlastRequestDate">Tanggal terima request</label>
                                        <input type="date" class="form-control" id="promoAddformAddBlastRequestDate" name="promoAddformAddBlastRequestDate">
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="promoAddformAddBlastRequestedBy">Requested by</label>
                                        <input type="" class="form-control" id="promoAddformAddBlastRequestedBy" name="promoAddformAddBlastRequestedBy" placeholder="Nama dan departemen/divisi">
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
    CKEDITOR.replace('promoAddformAddBlastTextarea', {       
        // Responsive Filemanager
        removePlugins : 'exportpdf',
        extraPlugins : 'filetools, ckeditorfa',
        allowedContent : true,
        contentsCss : 'http://192.168.188.254/cccinfo/assets/ckeditor/plugins/ckeditorfa/css/ckeditorfa.css',
        filebrowserBrowseUrl : 'http://192.168.188.254/cccinfo/assets/responsive_filemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',        
        filebrowserUploadUrl : 'http://192.168.188.254/cccinfo/assets/responsive_filemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl : 'http://192.168.188.254/cccinfo/assets/responsive_filemanager/filemanager/dialog.php?type=1&editor=ckeditor&fldr=',
        filebrowserUploadMethod : 'form',        
    });
</script>