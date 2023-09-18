<div class="modal fade" id="modal-tambah-frame" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h5 class="modal-title text-white">Create Frame</h5>
                <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="FrmTambahFrame" class="form-horizontal form-frame-baru" role="form" method="POST" action="/frame/ajax_frame">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Photo <span class="text-danger">*</span></label>
                                <input type="file" class="photo" placeholder="Pas Photo">
                                <br class="strip-photo d-none">
                                <label class="loading-photo d-none"><i class="fa fa-spin fa-sync-alt"></i> </label><button style="margin:2px;" type="button" class="btn btn-sm btn-primary detail-photo d-none"><i class="fa fa-external-link-alt"></i>&nbsp;&nbsp;Show File</button><button style="margin:2px;" type="button" class="btn btn-sm btn-danger hapus-photo d-none"><i class="fa fa-trash"></i>&nbsp;&nbsp;Delete File</button>
                                <input class="photo_hidden" type="hidden" name="form[photo]" value="">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Event <span class="text-danger">*</span></label>
                                <select style="width: 100%;" class="form-control select2 dropdown-event" name="form[id_event]">
                                    <option value="">Select Event</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-light" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary ladda-button ladda-button-submit" onclick="SimpanTambahFrame();" data-style="slide-up">Save</button>
            </div>
        </div>
    </div>
</div>