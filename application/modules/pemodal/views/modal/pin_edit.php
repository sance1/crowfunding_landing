<div class="modal fade" id="modal-edit-data-pin" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content pin">
            <div class="modal-header">
                <h5 class="modal-title lead bold text-pin">Masukkan PIN Anda</h5>
                <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="pinpad" class="modal-body">
                <form >
                    <input type="text" id="password-show" class="mt-1" placeholder="_ _ _ _ _ _" autocomplete="off" aria-required="true" maxlength="11"></br>
                    <input type="text" id="password" class="d-none" placeholder="_ _ _ _ _ _" autocomplete="off" aria-required="true" maxlength="6"></br>
                    <input type="button" value="1" id="1" class="pinButton calc"/>
                    <input type="button" value="2" id="2" class="pinButton calc"/>
                    <input type="button" value="3" id="3" class="pinButton calc"/><br>
                    <input type="button" value="4" id="4" class="pinButton calc"/>
                    <input type="button" value="5" id="5" class="pinButton calc"/>
                    <input type="button" value="6" id="6" class="pinButton calc"/><br>
                    <input type="button" value="7" id="7" class="pinButton calc"/>
                    <input type="button" value="8" id="8" class="pinButton calc"/>
                    <input type="button" value="9" id="9" class="pinButton calc"/><br>
                    <input type="button" value="Hapus" id="clear" class="pinButton clear"/>
                    <input type="button" value="0" id="0 " class="pinButton calc"/>
                    <input type="button" value="OK" id="enter" class="pinButton enter"/>
                    <br>
                    <a class="btn-ulang-pin bold text-primary d-none">Ulangi</a>
                </form>
            </div>
        </div>
    </div>
</div>