<div class="modal fade" id="modal-password-user" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h5 class="modal-title text-white">Edit User : User</h5>
                <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="FrmPasswordUser" class="form-horizontal form-user-password" role="form" method="POST" action="/user/ajax_user">
                    <center>
                        <img class="loading-gif-image" src="<?php echo base_url("assets/images/loading-data.gif") ?>" alt="Loading ...">
                    </center>
                    <div class="form-group after-loading d-none">
                        <label class="form-control-label">Password <span class="text-danger">*</span></label>
                        <input required type="password" class="form-control form-control-alternative" placeholder="Password" name="form[password]" maxlength="50">
                    </div>
                    <input type="hidden" class="id_hidden" name="form[id]" value="" placeholder="id_data">
                </form>
            </div>
            <div class="modal-footer after-loading d-none">
                <button class="btn btn-light" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary ladda-button ladda-button-submit" onclick="SimpanPasswordUser();" data-style="slide-up">Save</button>
            </div>
        </div>
    </div>
</div>