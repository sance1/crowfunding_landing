<div class="modal fade" id="modal-tambah-upload-file" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h5 class="modal-title text-white">Upload File</h5>
                <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="FrmTambahUploadFile" class="form-horizontal form-upload-file-baru" role="form" method="POST" action="/tool/ajax_tool">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input type="file" name="file" class="form-control file-tool" placeholder="File">
                                <i style="font-style: italic; font-size: 13px;">Maksimum 25 MB</i>
                                <input class="foto_hidden" type="hidden" value="">
                                <input class="foto_file_name" type="hidden" value="">
                                <div class="progress mt-2" style="height: 17px;">
                                    <div class="progress-bar"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-light" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary ladda-button ladda-button-submit" onclick="SimpanTambahUploadFile();" data-style="slide-up"><i class="fa fa-file-upload"></i> Upload</button>
            </div>
        </div>
    </div>
</div>