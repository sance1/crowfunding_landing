<?php
    $penghasilan_per_tahun = 0;
    $saldo_saat_ini = 0;
    $nomor_rekening_bank = "";
    $nama_pemilik_rekening_bank = "";
    $nama_bank = "";
    $nama_cabang_bank = "";
    if($this->session->userdata("user")){
        $penghasilan_per_tahun = $this->session->userdata("user")->penghasilan_per_tahun;
        $dana_saat_ini = $this->session->userdata("user")->saldo;
        $saldo_saat_ini = $this->session->userdata("user")->saldo+$this->session->userdata("user")->total_investasi;
        $nomor_rekening_bank = $this->session->userdata("user")->nomor_rekening_bank;
        $nama_pemilik_rekening_bank = $this->session->userdata("user")->nama_pemilik_rekening_bank;
        $nama_bank = $this->session->userdata("user")->nama_bank;
        $nama_cabang_bank = $this->session->userdata("user")->nama_cabang_bank;
    }
?>
<nav class="navbar navbar-expand-md navbar-light bg-light fixed-top" style="box-shadow: 0 2px 3px 0 rgb(96 96 96 / 10%);">
    <div class="container container-s container-custom">
        <a class="navbar-brand" href="<?php echo base_url() ?>" style="position: absolute;">
            <img src="<?php echo base_url("assets/images/logo.png"); ?>" style="max-height: 60px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto navbar-right">
                <?php 
                    if($this->session->userdata("user")){
                ?>
                    <?php if(($this->session->userdata("user")->status_verify == 0 || $this->session->userdata("user")->status_verify == 2) && $this->session->userdata("user")->status_verify_send == 0) { ?>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger bold text-white" style="border: 2px solid #0084FF; border-radius: 8px; background: #0084FF;" href="<?php echo base_url("user/verifikasi.html") ?>">Verifikasi</a></li>
                    <?php } ?>
                <li class="nav-item"><a class="nav-link js-scroll-trigger bold text-primary btn-custom-padding" href="<?php echo base_url("daftar_penerbit.html") ?>">Penerbit</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger bold text-primary btn-custom-padding" href="<?php echo base_url("faq.html") ?>">FAQs</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger bold text-primary btn-custom-padding" href="<?php echo base_url("hubungi_kami.html") ?>">Hubungi Kami</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle js-scroll-trigger bold text-primary" style="border: 2px solid #0084FF; border-radius: 8px;" href="#" data-toggle="dropdown">Tentang Kami</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item text-primary" href="<?php echo base_url("syarat_dan_ketentuan.html") ?>"> Syarat dan Ketentuan</a></li>
                        <li><a class="dropdown-item text-primary" href="<?php echo base_url("kebijakan_dan_privasi.html") ?>"> Kebijakan dan Privasi</a></li>
                        <li><a class="dropdown-item text-primary" href="<?php echo base_url("tim_obsido.html") ?>"> Tim Obsido</a></li>
                        <li><a class="dropdown-item text-primary" href="<?php echo base_url("risiko.html") ?>"> Risiko</a></li>
                    </ul>
                </li>
                <?php if($this->session->userdata("user")->status_verify == 1) { ?>
                <li class="nav-item"><a class="nav-link js-scroll-trigger bold text-primary btn-custom-padding pb-0 btn-topup" href="#"><i class="las la-wallet" style="font-size: 32px; line-height: 12px;"></i></a></li>
                <?php } ?>
                <li class="nav-item"><a class="nav-link js-scroll-trigger bold text-primary btn-custom-padding pb-0" href="#"><i class="las la-bell" style="font-size: 32px; line-height: 12px;"></i></a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle js-scroll-trigger bold text-primary" style="border: 2px solid #0084FF; border-radius: 8px;" href="#" data-toggle="dropdown"><?php echo $this->session->userdata("user")->nama; ?></a>
                    <ul class="dropdown-menu" style="left: auto; right: 0px;">
                        <li><a class="dropdown-item text-primary" href="<?php echo base_url("portofolio.html") ?>"> Portofolio</a></li>
                        <li><a class="dropdown-item text-primary" href="<?php echo base_url("daftar_keinginan.html") ?>"> Daftar Keinginan</a></li>
                        <li><a class="dropdown-item text-primary" href="<?php echo base_url("histori_saldo.html") ?>"> Histori Saldo</a></li>
                        <li><a class="dropdown-item text-primary" href="<?php echo base_url("profil_pengguna.html") ?>"> Profil Pengguna</a></li>
                        <li><a class="dropdown-item text-danger" href="<?php echo base_url("login/logout.html") ?>"> Keluar</a></li>
                    </ul>
                </li>
                <?php } else { ?>
                <li class="nav-item"><a class="nav-link js-scroll-trigger bold text-primary btn-custom-padding" href="<?php echo base_url("daftar_penerbit.html") ?>">Penerbit</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger bold text-primary btn-custom-padding" href="<?php echo base_url("faq.html") ?>">FAQs</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger bold text-primary btn-custom-padding" href="<?php echo base_url("hubungi_kami.html") ?>">Hubungi Kami</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle js-scroll-trigger bold text-primary" style="border: 2px solid #0084FF; border-radius: 8px;" href="#" data-toggle="dropdown">Tentang Kami</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item text-primary" href="<?php echo base_url("syarat_dan_ketentuan.html") ?>"> Syarat dan Ketentuan</a></li>
                        <li><a class="dropdown-item text-primary" href="<?php echo base_url("kebijakan_dan_privasi.html") ?>"> Kebijakan dan Privasi</a></li>
                        <li><a class="dropdown-item text-primary" href="<?php echo base_url("tim_obsido.html") ?>"> Tim Obsido</a></li>
                        <li><a class="dropdown-item text-primary" href="<?php echo base_url("risiko.html") ?>"> Risiko</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger bold text-primary btn-login" style="border: 2px solid #0084FF; border-radius: 8px;" href="#">Masuk</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger bold text-white btn-signup" style="border: 2px solid #0084FF; border-radius: 8px; background: #0084FF;" href="#">Daftar</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
<div class="modal no-scroll fade" id="modal-sign" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <ul class="nav nav-tabs font-default bold text-center" role="tablist">
                    <li class="nav-item nav-login" style="width: 50%;">
                        <a class="nav-link p-3 active" href="#tab-login" role="tab" data-toggle="tab">Masuk</a>
                    </li>
                    <li class="nav-item nav-sign-up" style="width: 50%;">
                        <a class="nav-link p-3" href="#tab-sign-up" role="tab" data-toggle="tab">Daftar</a>
                    </li>
                </ul>
                <div class="tab-content" style="border-left: 4px solid #0084ff; border-right: 4px solid #0084ff; border-bottom: 4px solid #0084ff;">
                    <div role="tabpanel" class="tab-pane fade active show form pt-5 pl-5 pr-5 pb-5 mt-0" id="tab-login">
                        <div class="row">
                            <div class="col-12">
                                <h1 class="bold mb-2 text-primary" style="text-align: left; font-size: 20px; margin-left: -6px;">&nbsp;Laman Pemodal</h1>
                                <label class="mb-3 float-left" style="text-align: left;">Selamat datang! Silahkan masuk sebagai pemodal</label>
                            </div>
                        </div>
                        <form class="subscribe-form form-user-login" action="/user/auth_email" method="post" accept-charset="UTF-8" autocomplete="off" style="visibility: visible;">
                            <div class="form-group">
                                <div class="input-email">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="la la-envelope"></i></span>
                                        </div>
                                        <input type="email" required class="form-control form-control-input-group-prepend" target-form="form-user-login" placeholder="Email address" maxlength="30" name="form[email]" style="min-width: 100px;">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-password">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="la la-lock"></i></span>
                                        </div>
                                        <input type="password" required class="form-control form-control-input-group-prepend" target-form="form-user-login" placeholder="Password" maxlength="30" name="form[password]" style="min-width: 100px;">
                                    </div>
                                </div>
                                <a href="<?php echo base_url("user/lupa_password.html"); ?>" class="float-right font-default text-primary mt-1 mb-3">Lupa Password?</a>
                            </div>
                            <button type="button" class="btn btn-primary btn-lg btn-block ladda-button ladda-button-submit btn-submit bold" data-style="slide-up">Masuk</button>
                        </form>
                    </div>
                    <div role="tabpanel" class="tab-pane fade form pt-5 pl-5 pr-5 pb-5 mt-0" id="tab-sign-up">
                        <div class="row">
                            <div class="col-12">
                                <h1 class="bold mb-2 text-primary" style="text-align: left; font-size: 20px; margin-left: -6px;">&nbsp;Laman Pemodal</h1>
                                <label class="mb-3 float-left" style="text-align: left;">Selamat datang! Silahkan daftar sebagai pemodal</label>
                            </div>
                        </div>
                        <form class="subscribe-form form-user-sign-up" action="/user/auth_email" method="post" accept-charset="UTF-8" autocomplete="off" style="visibility: visible;">
                            <!-- <div class="form-group">
                                <a href="<?php echo base_url("user/google.html") ?>" type="button" class="btn btn-outline-dark btn-lg btn-block text-dark bg-white"><i class="fab fa-google"></i> Connect with Google</a>
                            </div>
                            <div class="form-group">
                                <a href="<?php echo base_url("user/facebook.html") ?>" type="button" class="btn btn-outline-dark btn-lg btn-block text-dark bg-white"><i class="fab fa-facebook"></i> Connect with Facebook</a>
                            </div>
                            <div class="text-center">
                                <label class="font-default bold mt-1 mb-3">Or</label>
                            </div> --><!-- 
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="la la-user"></i></span>
                                    </div>
                                    <input type="text" required class="form-control form-control-input-group-prepend" target-form="form-user-sign-up" placeholder="Nama Lengkap" maxlength="100" name="form[nama]">
                                </div>
                            </div> -->
                            <div class="form-group">
                                <div class="input-email">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="la la-envelope"></i></span>
                                        </div>
                                        <input type="email" required class="form-control form-control-input-group-prepend email" target-form="form-user-sign-up" placeholder="Alamat Email" maxlength="50" name="form[email]" style="min-width: 100px;">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="la la-tty"></i></span>
                                    </div>
                                    <input type="text" required class="form-control form-control-input-group-prepend" target-form="form-user-sign-up" placeholder="Nomor Telepon" maxlength="15" name="form[no_hp]" onkeypress="return validatedata(event);">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-password">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="la la-lock"></i></span>
                                        </div>
                                        <input type="password" required class="form-control form-control-input-group-prepend" target-form="form-user-sign-up" placeholder="Kata Sandi" maxlength="30" name="form[password]" style="min-width: 100px;">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-password">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="la la-lock"></i></span>
                                        </div>
                                        <input type="password" required class="form-control form-control-input-group-prepend" target-form="form-user-sign-up" placeholder="Konfirmasi Kata Sandi" maxlength="30" name="form[password2]" style="min-width: 100px;">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-checkbox">
                                <label class="container font-default pt-1" style="font-size: 14px;">Saya mengerti dan membaca syarat & ketentuan
                                    <input type="checkbox" class="checkbox-terms">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <button type="button" class="btn btn-primary btn-lg btn-block ladda-button ladda-button-submit btn-submit disabled bold" disabled data-style="slide-up">Daftar</button>
                        </form>
                        <form class="subscribe-form form-user-verify d-none" action="/user/auth_email" method="post" accept-charset="UTF-8" autocomplete="off" style="visibility: visible;">
                            <center>
                                <img style="max-width: 100%;" src="<?php echo base_url("assets/images/xxx_xxx_xxx/verifikasi_signin.png") ?>">
                            </center>
                            <h3 style="font-size: 18px;" class="text-center text-primary mt-3 mb-3">Masukkan Kode OTP</h3>
                            <div class="form-group">
                                <input type="text" required class="form-control text-center" target-form="form-user-verify" placeholder="0 0 0 0 0 0" maxlength="11" name="form[otp]" style="font-size: 30px;">
                            </div>
                            <h3 style="font-size: 18px;" class="text-center mb-3">Kode dikirim melalui email</h3>
                            <button type="button" class="btn btn-primary btn-lg btn-block ladda-button ladda-button-submit btn-submit bold" data-style="slide-up">Verifikasi</button>
                            <input type="hidden" class="email" name="form[email]">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-topup" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Isi Saldo</h5>
                <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="FrmTambahTopUp" class="form-horizontal" role="form" method="POST" action="/topup/ajax_topup" penghasilan-per-tahun="<?php echo $penghasilan_per_tahun; ?>" saldo-saat-ini="<?php echo $saldo_saat_ini; ?>">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-control-label text-dark">Metode Pembayaran</label>
                                <select required style="width: 100%;" class="form-control select2 dropdown-bank" name="form[metode_pembayaran]">
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label text-dark">Pilih Nominal</label>
                                <div class="row pl-2 pr-2">
                                    <div class="col-4 pl-2 pr-2 pb-2"><a style="width: 100%; font-size: 15px;" class="btn btn-outline-dark bg-white text-dark bold btn-nominal" value="500.000">Rp 500.000</a></div>
                                    <div class="col-4 pl-2 pr-2 pb-2"><a style="width: 100%; font-size: 15px;" class="btn btn-outline-dark bg-white text-dark bold btn-nominal" value="1.000.000">Rp 1.000.000</a></div>
                                    <div class="col-4 pl-2 pr-2 pb-2"><a style="width: 100%; font-size: 15px;" class="btn btn-outline-dark bg-white text-dark bold btn-nominal" value="5.000.000">Rp 5.000.000</a></div>
                                    <div class="col-4 pl-2 pr-2 pb-2"><a style="width: 100%; font-size: 15px;" class="btn btn-outline-dark bg-white text-dark bold btn-nominal" value="10.000.000">Rp 10.000.000</a></div>
                                    <div class="col-4 pl-2 pr-2 pb-2"><a style="width: 100%; font-size: 15px;" class="btn btn-outline-dark bg-white text-dark bold btn-nominal" value="50.000.000">Rp 50.000.000</a></div>
                                    <div class="col-4 pl-2 pr-2 pb-2"><a style="width: 100%; font-size: 15px;" class="btn btn-outline-dark bg-white text-dark bold btn-nominal" value="100.000.000">Rp 100.000.000</a></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label text-dark">Atau masukkan nominal di sini</label>
                                <input required type="text" class="form-control nominal text-right" placeholder="Nominal" maxlength="19" name="form[nominal]" onkeypress="return validatedata(event);" style="height: 38px;">
                            </div>
                            <!-- <div class="list-group">
                                <a href="#" class="list-group-item list-group-item-action topup-bank topup-bank-1">
                                    <div class="row">
                                        <div class="col" style="min-width: 100px; max-width: 100px;">
                                            <center>
                                                <img src="<?php echo base_url("assets/images/icon/bca.png"); ?>" style="height: 20px;">
                                            </center>
                                        </div>
                                        <div class="col bold">BCA</div>
                                    </div>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action topup-bank topup-bank-2 pt-2 pb-1">
                                    <div class="row">
                                        <div class="col" style="min-width: 100px; max-width: 100px;">
                                            <center>
                                                <img src="<?php echo base_url("assets/images/icon/bri.png"); ?>" style="height: 30px;">
                                            </center>
                                        </div>
                                        <div class="col bold pt-1">BRI</div>
                                    </div>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action topup-bank topup-bank-3">
                                    <div class="row">
                                        <div class="col" style="min-width: 100px; max-width: 100px;">
                                            <center>
                                                <img src="<?php echo base_url("assets/images/icon/mandiri.png"); ?>" style="height: 20px;">
                                            </center>
                                        </div>
                                        <div class="col bold">Mandiri</div>
                                    </div>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action topup-bank topup-bank-4">
                                    <div class="row">
                                        <div class="col" style="min-width: 100px; max-width: 100px;">
                                            <center>
                                                <img src="<?php echo base_url("assets/images/icon/bni.png"); ?>" style="height: 20px;">
                                            </center>
                                        </div>
                                        <div class="col bold">BNI</div>
                                    </div>
                                </a>
                            </div> -->
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-light" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary ladda-button ladda-button-submit" onclick="SimpanTambahTopUp();" data-style="slide-up">Konfirmasi</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-topup-bank" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cara Bayar</h5>
                <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label class="form-control-label text-dark metode-pembayaran">BCA Virtual Account</label><br>
                                    <input readonly class="form-control bold" style="height: 38px; border: none; background-color: white; padding-left: 0px !important; height: 16px;" type="text" id="va-bank-topup" value="25829999999999999999">
                                </div>
                                <div class="col" style="min-width: 100px; max-width: 100px;">
                                    <a class="copy-clipboard bold"><i class="las la-copy" style="font-size: 20px;"></i> Salin</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label text-dark">Klik dibawah untuk petunjuk yang lebih lengkap</label>
                        </div>
                        <div class="card mb-2">
                            <div class="card-header" role="tab" id="faq-1-1">
                                <a data-toggle="collapse" data-parent="#accordionEx" href="#collapse-faq-1-1" aria-expanded="true" aria-controls="collapse-faq-1-1">
                                    <h5 class="mb-0 bold text-dark">ATM BCA<i class="fas fa-angle-down rotate-icon"></i></h5>
                                </a>
                            </div>
                            <div id="collapse-faq-1-1" class="collapse" role="tabpanel" aria-labelledby="faq-1-1" data-parent="#accordionEx">
                                <div class="card-body">
                                    - Test 123<br>
                                    - Test 123<br>
                                    - Test 123<br>
                                    - Test 123<br>
                                    - Test 123<br>
                                    - Test 123
                                </div>
                            </div>
                        </div>
                        <div class="card mb-2">
                            <div class="card-header" role="tab" id="faq-1-2">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapse-faq-1-2" aria-expanded="false" aria-controls="collapse-faq-1-2">
                                    <h5 class="mb-0 bold text-dark">m-BCA (BCA mobile) <i class="fas fa-angle-down rotate-icon"></i></h5>
                                </a>
                            </div>
                            <div id="collapse-faq-1-2" class="collapse" role="tabpanel" aria-labelledby="faq-1-2" data-parent="#accordionEx">
                                <div class="card-body">
                                    - Test 123<br>
                                    - Test 123<br>
                                    - Test 123<br>
                                    - Test 123<br>
                                    - Test 123<br>
                                    - Test 123
                                </div>
                            </div>
                        </div>
                        <div class="card mb-2">
                            <div class="card-header" role="tab" id="faq-1-3">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapse-faq-1-3" aria-expanded="false" aria-controls="collapse-faq-1-3">
                                    <h5 class="mb-0 bold text-dark">KlikBCA <i class="fas fa-angle-down rotate-icon"></i></h5>
                                </a>
                            </div>
                            <div id="collapse-faq-1-3" class="collapse" role="tabpanel" aria-labelledby="faq-1-3" data-parent="#accordionEx">
                                <div class="card-body">
                                    - Test 123<br>
                                    - Test 123<br>
                                    - Test 123<br>
                                    - Test 123<br>
                                    - Test 123<br>
                                    - Test 123
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="modal-footer">
                <button class="btn btn-light" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary ladda-button ladda-button-submit" onclick="SimpanTambahTopUp();" data-style="slide-up">Konfirmasi</button>
            </div> -->
        </div>
    </div>
</div>
<div class="modal fade" id="modal-after-topup" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Selesaikan Pembayaran</h5>
                <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label class="form-control-label text-dark metode-pembayaran"></label><br>
                                    <input readonly class="form-control bold" style="height: 38px; border: none; background-color: white;" type="text" id="va-topup">
                                </div>
                                <div class="col" style="min-width: 100px; max-width: 100px;">
                                    <a class="copy-clipboard bold"><i class="las la-copy" style="font-size: 20px;"></i> Salin</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label text-dark">Total Pembayaran</label><br>
                            <label class="form-control-label text-dark total-pembayaran bold"></label>
                        </div>
                        <div class="form-group">
                            <hr>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label text-dark">Batas Akhir Pembayaran</label><br>
                            <label class="form-control-label text-danger tgl-expired bold"></label>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label text-dark">No Transaksi</label><br>
                            <label class="form-control-label text-dark no-transaksi bold"></label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-light" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-tarik-saldo" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tarik Saldo</h5>
                <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="FrmTambahTarikSaldo" class="form-horizontal" role="form" method="POST" action="/topup/ajax_topup" saldo-saat-ini="<?php echo $dana_saat_ini; ?>">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-control-label text-dark">Masukkan nominal di sini</label>
                                <input required type="text" class="form-control nominal text-right" placeholder="Nominal" maxlength="19" name="form[nominal]" onkeypress="return validatedata(event);" style="height: 38px;">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-light" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary ladda-button ladda-button-submit" onclick="SimpanTambahTarikSaldo();" data-style="slide-up">Konfirmasi</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-after-tarik-saldo" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tarik Saldo</h5>
                <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="FrmSubmitTarikSaldo" class="form-horizontal" role="form" method="POST" action="/topup/ajax_topup">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group text-center">
                                <label>Penarikan saldo Anda sebesar</label><br>
                                <label class="bold saldo-ditarik">Rp 0</label>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label text-dark">Dikirim ke Nomor Rekening</label><br>
                                <label class="form-control-label no-rek bold"><?php echo $nomor_rekening_bank; ?></label>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label text-dark">Atas Nama</label><br>
                                <label class="form-control-label no-rek bold"><?php echo $nama_pemilik_rekening_bank; ?></label>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label text-dark">Bank</label><br>
                                <label class="form-control-label bank bold"><?php echo $nama_bank; ?></label>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label text-dark">Cabang Bank</label><br>
                                <label class="form-control-label cabang-bank bold"><?php echo $nama_cabang_bank; ?></label>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label text-dark">Masukkan Kata Sandi</label>
                                <input required type="password" class="form-control" placeholder="Masukkan Kata Sandi" name="form[password]">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label text-dark">Kode Verifikasi</label>
                                <a class="btn btn-outline-primary btn-block text-primary btn-kirim-kode" style="background: none;">Kirim Kode <i class="las la-envelope"></i></a>
                                <div class="div-kirim-kode">
                                    <input required type="text" class="form-control mb-1" placeholder="Kode Verifikasi" name="form[kode_verifikasi]">
                                    <a class="btn-kirim-ulang text-primary">Kirim Ulang Kode</a><label id="time-tarik" class="float-right">00:30</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="form[nominal]">
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-light" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary ladda-button ladda-button-submit" onclick="SimpanSubmitTarikSaldo();" data-style="slide-up">Konfirmasi</button>
            </div>
        </div>
    </div>
</div>
<div class="modal no-scroll fade" id="modal-daftar-penerbit" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <ul class="nav nav-tabs font-default bold text-center" role="tablist">
                    <li class="nav-item nav-daftar-penerbit" style="width: 100%;">
                        <a class="nav-link p-3 active" href="#tab-daftar-penerbit" role="tab" data-toggle="tab" style="color: #0084ff; border: 4px solid #0084ff; background-color: #fff; border-color: #0084ff #0084ff #fff; font-weight: bold;">Daftar Penerbit</a>
                    </li>
                </ul>
                <div class="tab-content" style="border-left: 4px solid #0084ff; border-right: 4px solid #0084ff; border-bottom: 4px solid #0084ff;">
                    <div role="tabpanel" class="tab-pane fade active show form pt-2 pl-5 pr-5 pb-5 mt-0" id="tab-daftar-penerbit">
                        <form class="subscribe-form form-user-daftar-penerbit" action="/user/auth_email" method="post" accept-charset="UTF-8" autocomplete="off" style="visibility: visible;">
                            <div class="form-group">
                                <div class="input-email">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="la la-envelope"></i></span>
                                        </div>
                                        <input type="email" required class="form-control form-control-input-group-prepend email" target-form="form-user-daftar-penerbit" placeholder="Alamat Email" maxlength="50" name="form[email]" style="min-width: 100px;">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-password">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="la la-lock"></i></span>
                                        </div>
                                        <input type="password" required class="form-control form-control-input-group-prepend" target-form="form-user-daftar-penerbit" placeholder="Kata Sandi" maxlength="30" name="form[password]" style="min-width: 100px;">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-password">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="la la-lock"></i></span>
                                        </div>
                                        <input type="password" required class="form-control form-control-input-group-prepend" target-form="form-user-daftar-penerbit" placeholder="Konfirmasi Kata Sandi" maxlength="30" name="form[password2]" style="min-width: 100px;">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-checkbox">
                                <label class="container font-default pt-1" style="font-size: 14px;">Saya mengerti dan membaca syarat & ketentuan
                                    <input type="checkbox" class="checkbox-terms-daftar-penerbit">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <button type="button" class="btn btn-primary btn-lg btn-block ladda-button ladda-button-submit btn-submit disabled bold" disabled data-style="slide-up">Daftar</button>
                        </form>
                        <form class="subscribe-form form-user-verify-daftar-penerbit d-none" action="/user/auth_email" method="post" accept-charset="UTF-8" autocomplete="off" style="visibility: visible;">
                            <center>
                                <img style="max-width: 100%;" src="<?php echo base_url("assets/images/xxx_xxx_xxx/verifikasi_signin.png") ?>">
                            </center>
                            <h3 style="font-size: 18px;" class="text-center text-primary mt-3 mb-3">Masukkan Kode OTP</h3>
                            <div class="form-group">
                                <input type="text" required class="form-control text-center" target-form="form-user-verify-daftar-penerbit" placeholder="0 0 0 0 0 0" maxlength="11" name="form[otp]" style="font-size: 30px;">
                            </div>
                            <h3 style="font-size: 18px;" class="text-center mb-3">Kode dikirim melalui email</h3>
                            <button type="button" class="btn btn-primary btn-lg btn-block ladda-button ladda-button-submit btn-submit bold" data-style="slide-up">Verifikasi</button>
                            <input type="hidden" class="email" name="form[email]">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
<div class="modal fade" id="modal-edit-pin" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content pin">
            <div class="modal-header">
                <h5 class="modal-title lead bold text-pin">Masukkan PIN Anda</h5>
                <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="verifikasi-2-pinpad" class="modal-body">
                <form >
                    <input type="text" id="verifikasi-2-password-show" class="mt-1" placeholder="_ _ _ _ _ _" autocomplete="off" aria-required="true" maxlength="11"></br>
                    <input type="text" id="verifikasi-2-password" class="d-none" placeholder="_ _ _ _ _ _" autocomplete="off" aria-required="true" maxlength="6"></br>
                    <input type="button" value="1" id="verifikasi-2-1" class="pinButton calc"/>
                    <input type="button" value="2" id="verifikasi-2-2" class="pinButton calc"/>
                    <input type="button" value="3" id="verifikasi-2-3" class="pinButton calc"/><br>
                    <input type="button" value="4" id="verifikasi-2-4" class="pinButton calc"/>
                    <input type="button" value="5" id="verifikasi-2-5" class="pinButton calc"/>
                    <input type="button" value="6" id="verifikasi-2-6" class="pinButton calc"/><br>
                    <input type="button" value="7" id="verifikasi-2-7" class="pinButton calc"/>
                    <input type="button" value="8" id="verifikasi-2-8" class="pinButton calc"/>
                    <input type="button" value="9" id="verifikasi-2-9" class="pinButton calc"/><br>
                    <input type="button" value="Hapus" id="verifikasi-2-clear" class="pinButton clear"/>
                    <input type="button" value="0" id="verifikasi-2-0 " class="pinButton calc"/>
                    <input type="button" value="OK" id="verifikasi-2-enter" class="pinButton enter"/>
                    <br>
                    <a class="btn-ulang-pin bold text-primary d-none">Ulangi</a>
                </form>
            </div>
        </div>
    </div>
</div>