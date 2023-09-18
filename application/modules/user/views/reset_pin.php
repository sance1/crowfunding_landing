<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>New Pin</title>
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
            .pin form {
                width: 390px;
                margin: 50px auto;
                background: #fff;
                padding: 35px 25px;
                text-align: center;
                box-shadow: 2px 5px 8px 2px rgb(0 0 0 / 30%);
                border-radius: 5px;
            }
            .pin input[type="text"]#password, .pin input[type="text"]#password-show {
                padding: 0 40px;
                border-radius: 5px;
                width: 350px;
                margin: auto;
                border: 1px solid rgb(228, 220, 220);
                outline: none;
                font-size: 50px;
                color: transparent;
                text-shadow: 0 0 0 rgb(71, 71, 71);
                text-align: center;
            }
            .pin input:focus {
                outline: none;
            }
            .pin .pinButton {
                border: none;
                background: none;
                font-size: 1.5em;
                border-radius: 50%;
                height: 65px;
                font-weight: 550;
                width: 65px;
                color: transparent;
                text-shadow: 0 0 0 rgb(102, 101, 101);
                margin: 7px 20px;
            }
            .pin .clear, .pin .enter {
                font-size: 1em !important;
            }
            .pin .pinButton:hover {
                box-shadow: #22a7f0 0 0 1px 1px;
            }
            .pin .pinButton:active {
                background: #22a7f0;
                color: #fff;
            }
            .pin .clear:hover {
                box-shadow: #ff3c41 0 0 1px 1px;
            }
            .pin .clear:active {
                background: #ff3c41;
                color: #fff;
            }
            .pin .enter:hover {
                box-shadow: #47cf73 0 0 1px 1px;
            }
            .pin .enter:active {
                background: #47cf73;
                color: #fff;
            }
        </style>
    </head>
    <body>
        <div class="wrapper">
            <?php // $this->load->view("other/header_landing"); ?>
            <div id="main" class="main">
                <div class="home mt-3">
                    <div class="container">
                        <div class="row row-resize-item">
                            <div class="col-lg-12 pt-5 pin">
                                <center>
                                    <img src="<?php echo base_url("assets/images/logo.png"); ?>" style="max-width: 140px;">
                                    <p class="lead bold text-pin">Masukkan PIN Baru</p>
                                    <div id="pinpad">
                                        <form >
                                            <span class="mb-1">PIN harus 6 digit</span>
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
                                </center>
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

            var verifikasi_pin_1 = "";
            var verifikasi_pin_2 = "";
            $(".pin #enter").addClass("d-none");
            $(document).ready(function() {
                const input_value = $(".pin #password");
                $(".pin #password, .pin #password-show").focus(function() {
                    $(this).blur();
                });
                $(".pin .calc").click(function() {
                    let value = $(this).val();
                    field(value);
                });
                function field(value) {
                    console.log((input_value.val() + value).length);
                    if((input_value.val() + value).length >= 6){
                        $(".pin #enter").removeClass("d-none");
                    } else {
                        $(".pin #enter").addClass("d-none");
                    }
                    if((input_value.val() + value).length <= 6){
                        input_value.val(input_value.val() + value);
                    }
                    console.log(input_value.val().length);
                    var total_input = "";
                    for(var x_data = 1; x_data <= input_value.val().length; x_data++){
                        total_input += "x ";
                    }
                    for(var x2_data = 1; x2_data <= (6-input_value.val().length); x2_data++){
                        total_input += "_ ";
                    }
                    console.log("-"+total_input.substr(total_input.length - 1)+"-");
                    if(total_input.substr(total_input.length - 1) == " "){
                        total_input = total_input.slice(0,-1);
                    }
                    $("#password-show").val(total_input);
                }
                $(".pin #clear").click(function() {
                    if(verifikasi_pin_1 == ""){
                        input_value.val("");
                        $(".pin #enter").addClass("d-none");
                        verifikasi_pin_1 = "";
                    } else {
                        input_value.val("");
                        $(".pin #enter").addClass("d-none");
                        verifikasi_pin_2 = "";
                    }
                    $("#password-show").val("");
                });
                $(".pin #enter").click(function() {
                    if(verifikasi_pin_1 == ""){
                        $("#password-show").val("");
                        verifikasi_pin_1 = input_value.val();
                        input_value.val("");
                        $(".pin .text-pin").text("Masukkan Ulang PIN Baru");
                        $(".pin #enter").addClass("d-none");
                        $(".btn-ulang-pin").removeClass("d-none");
                    } else {
                        verifikasi_pin_2 = input_value.val();
                        if(verifikasi_pin_1 != verifikasi_pin_2){
                            toastrshow("warning", "Masukkan PIN Verifikasi dengan benar!", "Warning");
                        } else {
                            var request_verifikasi_pin = {"form": {"pin": ""}};
                            request_verifikasi_pin["form"]["pin"] = verifikasi_pin_1;
                            request_verifikasi_pin["form"]["code"] = "<?php echo $_GET['code']; ?>";
                            $.ajax({
                                type: "POST",
                                url: base_url + "/user/ajax_user",
                                data: {act:"reset_pin", req:request_verifikasi_pin},
                                dataType: "JSON",
                                tryCount: 0,
                                retryLimit : 3,
                                success: function(resp){
                                    if(resp.IsError != undefined) {
                                        if(resp.ErrorMessage[0].error != undefined) {
                                            toastrshow("warning", resp.ErrorMessage[0].error, "Warning");
                                        } else {
                                            toastrshow("warning", resp.ErrorMessage, "Warning");
                                        }
                                    } else {
                                        if(resp == 1 || resp == "1") {
                                            toastrshow("success", "Data berhasil disimpan", "Success");
                                            window.location.href = base_url;
                                        } else {
                                            toastrshow("warning", "Data gagal disimpan", "Warning");
                                        }
                                    }
                                },
                                error: function(xhr, textstatus, errorthrown) {
                                    toastrshow("warning", "Periksa koneksi internet anda kembali", "Warning");
                                }
                            });
                        }
                        console.log(verifikasi_pin_1);
                        console.log(verifikasi_pin_2);
                    }
                });
                $(".btn-ulang-pin").click(function(){
                    $("#password-show").val("");
                    $(".btn-ulang-pin").addClass("d-none");
                    input_value.val("");
                    $(".pin .text-pin").text("Masukkan PIN Baru");
                    $(".pin #enter").addClass("d-none");
                    verifikasi_pin_1 = "";
                    verifikasi_pin_2 = "";
                });
            });



            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-36251023-1']);
            _gaq.push(['_setDomainName', 'jqueryscript.net']);
            _gaq.push(['_trackPageview']);
            (function() {
                var ga = document.createElement('script');
                ga.type = 'text/javascript';
                ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(ga, s);
            })();
            try {
                fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", {
                    method: 'HEAD',
                    mode: 'no-cors'
                })).then(function(response) {
                    return true;
                }).catch(function(e) {
                    var carbonScript = document.createElement("script");
                    carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
                    carbonScript.id = "_carbonads_js";
                    document.getElementById("carbon-block").appendChild(carbonScript);
                });
            } catch (error) {
                console.log(error);
            }
        </script>
    </body>
</html>
