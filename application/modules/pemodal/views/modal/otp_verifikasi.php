<div class="modal fade" id="modal-verifikasi-otp" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body p-5">
                <form id="FrmVerifikasiOTP" class="form-horizontal" role="form" method="POST" action="/pemodal/ajax_pemodal">
                    <center>
                        <img style="max-width: 100%;" src="<?php echo base_url("assets/images/xxx_xxx_xxx/verifikasi_signin.png") ?>">
                    </center>
                    <h3 style="font-size: 18px;" class="text-center text-primary mt-3 mb-3">Masukkan Kode OTP</h3>
                    <div class="form-group">
                        <input type="text" required class="form-control text-center" target-form="form-user-verify-daftar-penerbit" placeholder="0 0 0 0 0 0" maxlength="11" name="form[otp]" style="font-size: 30px;">
                    </div>
                    <h3 style="font-size: 18px;" class="text-center mb-3">Kode dikirim melalui email</h3>
                    <button type="submit" class="btn btn-primary btn-lg btn-block ladda-button ladda-button-submit btn-submit bold" data-style="slide-up">Verifikasi</button>
                </form>
            </div>
        </div>
    </div>
</div>