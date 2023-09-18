<div class="modal fade" id="modal-reset-pin" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body pb-4">
                <form id="FrmResetPIN" class="form-horizontal" role="form" method="POST" action="/pemodal/ajax_pemodal">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group text-center">
                                <img src="<?php echo base_url("assets/images/lupa_pin.png"); ?>" class="mt-3" style="max-width: 100px;"><br>
                                <label class="text-primary mt-3">Masukkan Kata Sandi</label>
                            </div>
                            <div class="form-group">
                                <input required type="password" class="form-control" placeholder="Kata Sandi" name="form[password]" maxlength="30">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-light" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary ladda-button ladda-button-submit" data-style="slide-up">Konfirmasi</button>
                </form>
            </div>
        </div>
    </div>
</div>
