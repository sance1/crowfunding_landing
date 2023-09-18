<div class="modal fade" id="modal-verifikasi-pin" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content verifikasi-pin">
            <div class="modal-header">
                <h5 class="modal-title lead bold text-pin">Masukkan PIN Anda</h5>
                <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="verifikasi-pinpad" class="modal-body">
                <form >
                    <input type="text" id="verifikasi-password-show" class="mt-1" placeholder="_ _ _ _ _ _" autocomplete="off" aria-required="true" maxlength="11"></br>
                    <input type="text" id="verifikasi-password" class="d-none" placeholder="_ _ _ _ _ _" autocomplete="off" aria-required="true" maxlength="6"></br>
                    <a class="btn-lupa-pin bold text-primary">Lupa PIN?</a><br>
                    <input type="button" value="1" id="verifikasi-1" class="pinButton calc"/>
                    <input type="button" value="2" id="verifikasi-2" class="pinButton calc"/>
                    <input type="button" value="3" id="verifikasi-3" class="pinButton calc"/><br>
                    <input type="button" value="4" id="verifikasi-4" class="pinButton calc"/>
                    <input type="button" value="5" id="verifikasi-5" class="pinButton calc"/>
                    <input type="button" value="6" id="verifikasi-6" class="pinButton calc"/><br>
                    <input type="button" value="7" id="verifikasi-7" class="pinButton calc"/>
                    <input type="button" value="8" id="verifikasi-8" class="pinButton calc"/>
                    <input type="button" value="9" id="verifikasi-9" class="pinButton calc"/><br>
                    <input type="button" value="Hapus" id="verifikasi-clear" class="pinButton clear"/>
                    <input type="button" value="0" id="verifikasi-0 " class="pinButton calc"/>
                    <input type="button" value="OK" id="verifikasi-enter" class="pinButton enter"/>
                </form>
            </div>
        </div>
    </div>
</div>