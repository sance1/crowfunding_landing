<div class="modal fade" id="modal-upload-foto" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Unggah Foto</h5>
                <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <input type="file" class="foto" id="upload-foto" placeholder="Pas Foto">
                            <br class="strip-foto d-none">
                            <label class="loading-foto d-none"><i class="fa fa-spin fa-sync-alt"></i> </label><button style="margin:2px;" type="button" class="btn btn-sm btn-info detail-foto d-none"><i class="fa fa-external-link-alt"></i> Lihat File</button><button style="margin:2px;" type="button" class="btn btn-sm btn-danger hapus-foto d-none"><i class="fa fa-trash"></i> Hapus File</button>
                            <input class="foto_hidden" type="hidden" value="">
                            <input class="foto_file_name" type="hidden" value="">
                            <i style="font-style: italic; font-size: 13px;">Maksimum 5 MB</i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-light" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-info btn-unggah-foto">Unggah</button>
            </div>
        </div>
    </div>
</div>