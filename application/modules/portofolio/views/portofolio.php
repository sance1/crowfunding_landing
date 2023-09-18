<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Obsido - Portofolio</title>
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
            .shadow{
                -webkit-box-shadow: 0px 0px 15px -2px #000000; 
                box-shadow: 0px 0px 15px -2px #000000;
            }
            input.form-control{
                height: 38px;
            }
            .switch.active{
                color: #0084ff;
            }
        </style>
        <style>
            .verifikasi-pin form {
                width: 390px;
                margin: 20px auto 37px;
                background: #fff;
                padding: 35px 25px;
                text-align: center;
                box-shadow: 2px 5px 8px 2px rgb(0 0 0 / 30%);
                border-radius: 5px;
            }
            .verifikasi-pin input[type="text"]#verifikasi-password, .verifikasi-pin input[type="text"]#verifikasi-password-show {
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
            .verifikasi-pin input:focus {
                outline: none;
            }
            .verifikasi-pin .pinButton {
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
            .verifikasi-pin .clear, .verifikasi-pin .enter {
                font-size: 1em !important;
            }
            .verifikasi-pin .pinButton:hover {
                box-shadow: #22a7f0 0 0 1px 1px;
            }
            .verifikasi-pin .pinButton:active {
                background: #22a7f0;
                color: #fff;
            }
            .verifikasi-pin .clear:hover {
                box-shadow: #ff3c41 0 0 1px 1px;
            }
            .verifikasi-pin .clear:active {
                background: #ff3c41;
                color: #fff;
            }
            .verifikasi-pin .enter:hover {
                box-shadow: #47cf73 0 0 1px 1px;
            }
            .verifikasi-pin .enter:active {
                background: #47cf73;
                color: #fff;
            }
        </style>
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
            .pin input[type="text"]#verifikasi-2-password, .pin input[type="text"]#verifikasi-2-password-show {
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
            <?php $this->load->view("other/header_landing"); ?>
            <div id="main" class="main">
                <div class="home mt-3">
                    <div class="container">
                        <div class="row row-resize-item">
                            <h1 class="col-12 bold text-center mt-2">Portofolio</h1>
                            <div class="container-fluid" id="grad1">
                                <div class="row justify-content-center mt-0">
                                    <div class="col-12 p-3 mt-3 mb-2">
                                        <div class="card px-0 p-4 pb-0 mt-3 mb-3 shadow" style="background-image: url('<?php echo base_url("assets/images/portofolio_dana.png"); ?>'); background-size: 100%;">
                                            <div class="row">
                                                <h1 class="col-md-6 bold">Total Investasi<br><span>Rp <?php echo $this->foglobal->rupiah($this->session->userdata("user")->total_investasi); ?></span></h1>
                                                <div class="col-md-6">
                                                    <h1 class="text-right bold">Total Sisa Dana<br><span class="text-primary">Rp <?php echo $this->foglobal->rupiah($this->session->userdata("user")->saldo); ?></span></h1>
                                                </div>
                                                <div class="col-12">
                                                    <?php if($this->session->userdata("user")->status_verify == 1) { ?>
                                                        <a class="btn-topup float-right mt-3">Isi dana <i class="fa fa-chevron-right"></i></a><br><br><br>
                                                        <a class="btn-tarik-saldo btn btn-outline-primary bold float-right text-primary mt-1" style="background: none;">Tarik Saldo</a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="col-6 text-center"><h1 class="bold switch btn-investasi active">Investasi</h1></a>
                            <a class="col-6 text-center"><h1 class="bold switch btn-transaksi">Mutasi</h1></a>
                            <div class="col-12 div-investasi">
                                <div class="table-responsive font-default">
                                    <table class="table datatable-investasi table-striped">
                                        <thead>
                                            <tr>
                                                <th style="min-width: 200px; border: none; width: 200px;" class="text-center bold"></th>
                                                <th style="min-width: 280px; border: none;" class="bold"></th>
                                                <th style="min-width: 200px; border: none;" class="bold"></th>
                                                <th style="min-width: 120px; border: none;" class="bold"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="4" style="padding: 10px !important;">
                                                    <center>
                                                        <img class="loading-gif-image" src="<?php echo base_url("assets/images/loading-data.gif") ?>" alt="Loading ...">
                                                    </center>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <center>
                                        <a class="btn btn-primary text-white bold mt-3 mb-3 btn-lihat-lebih-banyak-investasi d-none">Lihat lebih banyak</a>
                                    </center>
                                </div>
                            </div>
                            <div class="col-12 div-transaksi d-none">
                                <div class="table-responsive font-default">
                                    <table class="table datatable-transaksi table-striped">
                                        <thead>
                                            <tr>
                                                <th style="min-width: 200px; border: none; width: 200px;" class="text-center bold"></th>
                                                <th style="min-width: 280px; border: none;" class="bold"></th>
                                                <th style="min-width: 172px; border: none;" class="bold"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="4" style="padding: 10px !important;">
                                                    <center>
                                                        <img class="loading-gif-image" src="<?php echo base_url("assets/images/loading-data.gif") ?>" alt="Loading ...">
                                                    </center>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <center>
                                        <a class="btn btn-primary text-white bold mt-3 mb-3 btn-lihat-lebih-banyak-transaksi d-none">Lihat lebih banyak</a>
                                    </center>
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
            var array_id_investasi = [];
            var request_investasi  = {"filter": {"kywd": ""}};
            request_investasi["filter"]["kywd"] = "";
            request_investasi["filter"]["id_pemodal"] = "<?php echo $this->session->userdata("user")->id; ?>";
            request_investasi["filter"]["jenis"] = "Pembelian";
            $.ajax({
                type: "POST",
                url: base_url + "/transaksi/ajax_transaksi",
                data: {act:"listdatahtml", req:request_investasi},
                dataType: "JSON",
                tryCount: 0,
                retryLimit: 3,
                success: function(resp){
                    array_id_investasi = resp.array_id;
                    if(resp.paging.IsNext == true){
                        $(".btn-lihat-lebih-banyak-investasi").removeClass("d-none");
                    } else {
                        $(".btn-lihat-lebih-banyak-investasi").addClass("d-none");
                    }
                    $(".datatable-investasi tbody").html(resp.lsdt);
                },
                error: function(xhr, textstatus, errorthrown) {
                    $(".datatable-investasi tbody").html("<tr><td style='padding: 20px !important;' colspan='4' class='text-center'><span class='badge badge-pill badge-warning'>Check your internet connection again</span></td></tr>");
                }
            });

            $(".btn-lihat-lebih-banyak-investasi").click(function(){
                $(".btn-lihat-lebih-banyak-investasi").addClass("disabled")
                var request_investasi  = {"filter": {"kywd": ""}};
                request_investasi["filter"]["kywd"] = "";
                request_investasi["filter"]["id_pemodal"] = "<?php echo $this->session->userdata("user")->id; ?>";
                request_investasi["filter"]["jenis"] = "Pembelian";
                request_investasi["filter"]["array_id"] = array_id_investasi;
                $.ajax({
                    type: "POST",
                    url: base_url + "/transaksi/ajax_transaksi",
                    data: {act:"listdatahtml", req:request_investasi},
                    dataType: "JSON",
                    tryCount: 0,
                    retryLimit: 3,
                    success: function(resp){
                        array_id_investasi = resp.array_id;
                        if(resp.paging.IsNext == true){
                            $(".btn-lihat-lebih-banyak-investasi").removeClass("d-none");
                        } else {
                            $(".btn-lihat-lebih-banyak-investasi").addClass("d-none");
                        }
                        $(".datatable-investasi tbody").append(resp.lsdt);
                        $(".btn-lihat-lebih-banyak-investasi").removeClass("disabled");
                    },
                    error: function(xhr, textstatus, errorthrown) {
                        $(".btn-lihat-lebih-banyak-investasi").removeClass("disabled");
                    }
                });
            });

            var array_id_transaksi = [];
            var request_transaksi  = {"filter": {"kywd": ""}};
            request_transaksi["Sort"] = "tgl desc";
            request_transaksi["filter"]["kywd"] = "";
            request_transaksi["filter"]["id_pemodal"] = "<?php echo $this->session->userdata("user")->id; ?>";
            $.ajax({
                type: "POST",
                url: base_url + "/transaksi/ajax_transaksi",
                data: {act:"listdatahtml", req:request_transaksi},
                dataType: "JSON",
                tryCount: 0,
                retryLimit: 3,
                success: function(resp){
                    array_id_transaksi = resp.array_id;
                    if(resp.paging.IsNext == true){
                        $(".btn-lihat-lebih-banyak-transaksi").removeClass("d-none");
                    } else {
                        $(".btn-lihat-lebih-banyak-transaksi").addClass("d-none");
                    }
                    $(".datatable-transaksi tbody").html(resp.lsdt);
                },
                error: function(xhr, textstatus, errorthrown) {
                    $(".datatable-transaksi tbody").html("<tr><td style='padding: 20px !important;' colspan='3' class='text-center'><span class='badge badge-pill badge-warning'>Check your internet connection again</span></td></tr>");
                }
            });

            $(".btn-lihat-lebih-banyak-transaksi").click(function(){
                $(".btn-lihat-lebih-banyak-transaksi").addClass("disabled")
                var request_transaksi  = {"filter": {"kywd": ""}};
                request_transaksi["filter"]["kywd"] = "";
                request_transaksi["filter"]["id_pemodal"] = "<?php echo $this->session->userdata("user")->id; ?>";
                request_transaksi["filter"]["array_id"] = array_id_transaksi;
                $.ajax({
                    type: "POST",
                    url: base_url + "/transaksi/ajax_transaksi",
                    data: {act:"listdatahtml", req:request_transaksi},
                    dataType: "JSON",
                    tryCount: 0,
                    retryLimit: 3,
                    success: function(resp){
                        array_id_transaksi = resp.array_id;
                        if(resp.paging.IsNext == true){
                            $(".btn-lihat-lebih-banyak-transaksi").removeClass("d-none");
                        } else {
                            $(".btn-lihat-lebih-banyak-transaksi").addClass("d-none");
                        }
                        $(".datatable-transaksi tbody").append(resp.lsdt);
                        $(".btn-lihat-lebih-banyak-transaksi").removeClass("disabled");
                    },
                    error: function(xhr, textstatus, errorthrown) {
                        $(".btn-lihat-lebih-banyak-transaksi").removeClass("disabled");
                    }
                });
            });

            $(".btn-transaksi").click(function(){
                $(".div-transaksi").removeClass("d-none");
                $(".div-investasi").addClass("d-none");
                $(".switch").removeClass("active");
                $(this).addClass("active");
            });
            $(".btn-investasi").click(function(){
                $(".div-transaksi").addClass("d-none");
                $(".div-investasi").removeClass("d-none");
                $(".switch").removeClass("active");
                $(this).addClass("active");
            });

            $(".verifikasi-pin #verifikasi-enter").click(function() {
                if(verifikasi_pin_user == ""){
                    if(verifikasi_input_value.val() != "<?php echo $this->session->userdata("user")->pin; ?>"){
                        toastrshow("warning", "Masukkan PIN dengan benar!", "Warning");
                    } else {
                        $("#modal-verifikasi-pin").modal("hide");
                        modal_tarik_saldo.find("input").val("");
                        $("#modal-tarik-saldo").modal("show");
                    }
                }
            });
        </script>
    </body>
</html>