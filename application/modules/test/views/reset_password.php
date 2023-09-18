<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Reset Password</title>
        <link rel="icon" href="<?php echo base_url("assets/icons/favicon.png"); ?>" type="image/png" sizes="16x16" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="description" content="Obsido" />
        <meta name="keywords" content="Obsido Keywords">
        <meta name="author" content="Web-Izul" />
        <link href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" rel="stylesheet" type="text/css" media="all" />
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo base_url("assets/css/animate.css"); ?>" />
        <link rel="stylesheet" href="<?php echo base_url("assets/css/owl.carousel.css"); ?>" />
        <link rel="stylesheet" href="<?php echo base_url("assets/css/owl.theme.css"); ?>" />
        <link rel="stylesheet" href="<?php echo base_url("assets/css/ionicons.min.css"); ?>" />
        <link rel="stylesheet" href="<?php echo base_url("assets/plugins/@fortawesome/fontawesome-free/css/all.min.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("assets/plugins/@line-awesome/css/line-awesome.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("assets/plugins/select2/select2.min.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("assets/plugins/select2/select2-bootstrap.min.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("assets/plugins/ladda/ladda-themeless.min.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("assets/plugins/toastr/toastr.min.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap-datepicker.min.css"); ?>">
        <link href="<?php echo base_url("assets/css/style.css"); ?>" rel="stylesheet" type="text/css" media="all" />
        <link rel="stylesheet" href="<?php echo base_url("assets/css/custom.css?n=").$this->config->item("tahun_assets"); ?>">
        <style>
            .home p{
                max-width: 100% !important;
            }
            .form-reset-password .input-group-text {
                font-family: 'Montserrat';
                background: none;
                border: 1px solid #ced4da;
                font-size: 16px;
                color: #6c757d;
                padding-top: 8px;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <div class="wrapper">
            <?php $this->load->view("other/header_landing"); ?>
            <div id="main" class="main">
                <div class="home mt-3">
                    <div class="container">
                        <div class="row row-resize-item">
                            <div class="col-lg-6 pt-5">
                                <center>
                                    <img src="<?php echo base_url("assets/images/lupa_pass.svg"); ?>" style="max-width: 430px; width: 100%;">
                                </center>
                            </div>
                            <div class="col-lg-6">
                                <div class="card m-b-30" style="border: none;">
                                    <div class="col-12 p-5 shadow">
                                        <h1 class="bold">Reset Password</h1><br>
                                        Masukkan alamat email yang Anda gunakan saat bergabung dan kami akan mengirimkan instruksi untuk mereset kata sandi Anda.<br><br>
                                        Untuk alasan keamanan, kami TIDAK menyimpan kata sandi Anda. Jadi yakinlah bahwa kami tidak akan pernah mengirim kata sandi Anda melalui email.
                                    </div>
                                    <div class="col-12 pl-5 pr-5 pb-5">
                                        <form id="FrmPassword" class="subscribe-form form-reset-password" role="form" method="POST" action="/pemodal/ajax_pemodal" style="visibility: visible;" autocomplete="off">
                                            <div class="form-group">
                                                <div class="input-email">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="la la-lock"></i></span>
                                                        </div>
                                                        <input required type="password" class="form-control form-control-input-group-prepend" target-form="form-reset-password" placeholder="Kata Sandi Baru" maxlength="30" name="form[kata_sandi_baru]" style="min-width: 100px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-email">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="la la-lock"></i></span>
                                                        </div>
                                                        <input required type="password" class="form-control form-control-input-group-prepend" target-form="form-reset-password" placeholder="Konfrimasi Kata Sandi Baru" maxlength="30" name="form[kata_sandi_baru2]" style="min-width: 100px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-primary btn-lg btn-block ladda-button ladda-button-submit btn-submit bold" onclick="SimpanPassword();" data-style="slide-up">Simpan</button>
                                            <input type="hidden" name="form[code]" value="<?php echo $_GET['code']; ?>">
                                            <input type="hidden" name="form[id_user]" value="<?php echo $id_user; ?>">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $this->load->view("other/footer"); ?>
            </div>
        </div>
        <script type="text/javascript" src="<?php echo base_url("assets/js/moment.min.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/jquery-2.1.1.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/popper.min.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/jquery.validate.min.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/plugins.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/custom.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap-datepicker.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/plugins/validate/jquery.validate.min.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/plugins/select2/select2.full.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/plugins/toastr/toastr.min.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/plugins/ladda/spin.min.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/plugins/ladda/ladda.min.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/plugins/ladda/ladda.jquery.min.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/plugins/Inputmask-5.x/dist/jquery.inputmask.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/proses.js?n=").$this->config->item("tahun_assets"); ?>"></script>
        <script>
            function SimpanPassword(){
                $("#FrmPassword").submit();
            }
            var FrmPassword = $("#FrmPassword").validate({
                submitHandler: function(form) {
                    laddasubmit = $("html").find(".ladda-button-submit");
                    InsertData(form, function(resp) {
                        setTimeout(function(){
                            window.location.href = base_url;
                        }, 2000);
                    }, "", "simpan_reset_password");
                },
                errorPlacement: function (error, element) {
                    if (element.parent(".input-group").length) { 
                        error.insertAfter(element.parent());      // radio/checkbox?
                    } else if (element.hasClass("select2") || element.hasClass("select")) {
                        error.insertAfter(element.next("span"));  // select2
                    } else {                                      
                        error.insertAfter(element);               // default
                    }
                }
            });
        </script>
    </body>
</html>
