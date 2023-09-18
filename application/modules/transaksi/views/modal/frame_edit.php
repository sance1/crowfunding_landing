<div class="modal fade" id="modal-edit-frame" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h5 class="modal-title text-white">Edit Frame : Frame</h5>
                <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="FrmEditFrame" class="form-horizontal form-frame-edit" role="form" method="POST" action="/frame/ajax_frame">
                    <center>
                        <img class="loading-gif-image" src="<?php echo base_url("assets/images/loading-data.gif") ?>" alt="Loading ...">
                    </center>
                    <div class="row after-loading d-none">
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
                    <input type="hidden" class="id_hidden" name="form[id]" value="" placeholder="id_data">
                </form>
            </div>
            <div class="modal-footer after-loading d-none">
                <button class="btn btn-light" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary ladda-button ladda-button-submit" onclick="SimpanEditFrame();" data-style="slide-up">Save</button>
            </div>
        </div>
    </div>
</div>