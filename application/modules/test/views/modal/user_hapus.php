<div class="modal fade" id="modal-hapus-user" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h5 class="modal-title text-white">Delete User : User</h5>
                <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="FrmHapusUser" class="form-horizontal form-user-hapus" role="form" method="POST" action="/user/ajax_user">
                <div class="modal-body">
                    <center>
                        <img class="loading-gif-image" src="<?php echo base_url("assets/images/loading-data.gif") ?>" alt="Loading ...">
                    </center>
                    <input type="hidden" class="id_hidden" name="form[id]" value="" placeholder="id_data">
                    <button class="btn btn-light after-loading d-none" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger ladda-button ladda-button-submit after-loading d-none" data-style="slide-up">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>