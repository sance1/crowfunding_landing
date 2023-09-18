<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Obsido - Daftar Keinginan</title>
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
    </head>
    <body>
        <div class="wrapper">
            <?php $this->load->view("other/header_landing"); ?>
            <div id="main" class="main">
                <div class="home mt-3">
                    <div class="container">
                        <div class="row row-resize-item">
                            <h1 class="col-12 bold text-center mt-2">Daftar Keinginan</h1>
                            <div class="col-12">
                                <div class="card m-b-30">
                                    <div class="card-body filter collapse show font-default">
                                        <form id="FrmFilter" role="form">
                                            <div class="row">
                                                <div class="col" style="max-width: 500px;">
                                                    <div class="form-group">
                                                        <div class="input-group input-search">
                                                            <input type="text" class="form-control kywd" style="height: 38px;" placeholder="Cari (Nama, Alamat)" title="Cari (Nama, Alamat)" aria-describedby="basic-addon2">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-icon" type="submit"><i class="fa fa-search"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <a class="btn btn-outline-dark bold btn-more-filter">Filter <i class="las la-sliders-h"></i></a>
                                                </div>
                                            </div>
                                            <div class="row div-more-filter d-none">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <select style="width: 100%;" class="form-control select2 dropdown-lokasi">
                                                            <option value="">Lokasi</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <select style="width: 100%;" class="form-control select select-tipe-aset">
                                                            <option value="">Tipe Aset</option>
                                                            <option value="Hotel">Hotel</option>
                                                            <option value="Cafe/Restoran">Cafe/Restoran</option>
                                                            <option value="Tempat Usaha Komersil">Tempat Usaha Komersil</option>
                                                            <option value="Ruko">Ruko</option>
                                                            <option value="Vila/Pondok">Vila/Pondok</option>
                                                            <option value="Gedung Perkantoran">Gedung Perkantoran</option>
                                                            <option value="Apartemen">Apartemen</option>
                                                            <option value="Lainnya">Lainnya</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <select style="width: 100%;" class="form-control select select-nilai-investasi">
                                                            <option value="">Nilai Investasi</option>
                                                            <option value="< 3M">< 3M</option>
                                                            <option value="3M - 6M">3M - 6M</option>
                                                            <option value="> 6M">> 6M</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <select style="width: 100%;" class="form-control select select-status-projek">
                                                            <option value="">Status Projek</option>
                                                            <option value="Tersedia">Tersedia</option>
                                                            <option value="Selesai">Selesai</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <select style="width: 100%;" class="form-control select select-dividen-period">
                                                            <option value="">Periode Dividen</option>
                                                            <option value="Kuartal">Kuartal</option>
                                                            <option value="Semester">Semester</option>
                                                            <option value="Tahunan">Tahunan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="table-responsive font-default">
                                        <table class="table datatable-properti table-striped">
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
                                                    <td colspan="5" style="padding: 10px !important;">
                                                        <center>
                                                            <img class="loading-gif-image" src="<?php echo base_url("assets/images/loading-data.gif") ?>" alt="Loading ...">
                                                        </center>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <center>
                                            <a class="btn btn-primary text-white bold mt-3 mb-3 btn-lihat-lebih-banyak d-none">Lihat lebih banyak</a>
                                        </center>
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
            GetDropdownLokasi();
            var array_id = [];
            var request_properti  = {"filter": {"kywd": ""}};
            request_properti["Sort"] = "id desc";
            request_properti["filter"]["kywd"] = "";
            request_properti["filter"]["id_lokasi"] = $("#FrmFilter").find(".dropdown-lokasi").val();
            request_properti["filter"]["tipe_aset"] = $("#FrmFilter").find(".select-tipe-aset").val();
            request_properti["filter"]["nilai_investasi"] = $("#FrmFilter").find(".select-nilai-investasi").val();
            request_properti["filter"]["status_projek"] = $("#FrmFilter").find(".select-status-projek").val();
            request_properti["filter"]["dividen_period"] = $("#FrmFilter").find(".select-dividen-period").val();
            $.ajax({
                type: "POST",
                url: base_url + "/daftar_keinginan/ajax_daftar_keinginan",
                data: {act:"listdatahtml", req:request_properti},
                dataType: "JSON",
                tryCount: 0,
                retryLimit: 3,
                success: function(resp){
                    array_id = resp.array_id;
                    if(resp.paging.IsNext == true){
                        $(".btn-lihat-lebih-banyak").removeClass("d-none");
                    } else {
                        $(".btn-lihat-lebih-banyak").addClass("d-none");
                    }
                    $(".datatable-properti tbody").html(resp.lsdt);
                },
                error: function(xhr, textstatus, errorthrown) {
                    $(".datatable-properti tbody").html("<tr><td style='padding: 20px !important;' colspan='4' class='text-center'><span class='badge badge-pill badge-warning'>Check your internet connection again</span></td></tr>");
                }
            });

            $(".btn-lihat-lebih-banyak").click(function(){
                $(".btn-lihat-lebih-banyak").addClass("disabled")
                var request_properti  = {"filter": {"kywd": ""}};
                request_properti["Sort"] = "id desc";
                request_properti["filter"]["kywd"] = "";
                request_properti["filter"]["id_lokasi"] = $("#FrmFilter").find(".dropdown-lokasi").val();
                request_properti["filter"]["tipe_aset"] = $("#FrmFilter").find(".select-tipe-aset").val();
                request_properti["filter"]["nilai_investasi"] = $("#FrmFilter").find(".select-nilai-investasi").val();
                request_properti["filter"]["status_projek"] = $("#FrmFilter").find(".select-status-projek").val();
                request_properti["filter"]["dividen_period"] = $("#FrmFilter").find(".select-dividen-period").val();
                request_properti["filter"]["array_id"] = array_id;
                $.ajax({
                    type: "POST",
                    url: base_url + "/daftar_keinginan/ajax_daftar_keinginan",
                    data: {act:"listdatahtml", req:request_properti},
                    dataType: "JSON",
                    tryCount: 0,
                    retryLimit: 3,
                    success: function(resp){
                        array_id = resp.array_id;
                        if(resp.paging.IsNext == true){
                            $(".btn-lihat-lebih-banyak").removeClass("d-none");
                        } else {
                            $(".btn-lihat-lebih-banyak").addClass("d-none");
                        }
                        $(".datatable-properti tbody").append(resp.lsdt);
                        $(".btn-lihat-lebih-banyak").removeClass("disabled");
                    },
                    error: function(xhr, textstatus, errorthrown) {
                        $(".btn-lihat-lebih-banyak").removeClass("disabled");
                    }
                });
            });

            function GetDataTable(){
                $(".datatable-properti tbody").html("<tr><td colspan='4' style='padding: 20px !important;' class='text-center'><center><img class='loading-gif-image' src='<?php echo base_url("assets/images/loading-data.gif") ?>' alt='Loading ...'></center></td></tr>");
                array_id = [];
                request_properti  = {"filter": {"kywd": ""}};
                request_properti["Sort"] = "id desc";
                request_properti["Search"] = $("#FrmFilter").find(".kywd").val();
                request_properti["filter"]["id_lokasi"] = $("#FrmFilter").find(".dropdown-lokasi").val();
                request_properti["filter"]["tipe_aset"] = $("#FrmFilter").find(".select-tipe-aset").val();
                request_properti["filter"]["nilai_investasi"] = $("#FrmFilter").find(".select-nilai-investasi").val();
                request_properti["filter"]["status_projek"] = $("#FrmFilter").find(".select-status-projek").val();
                request_properti["filter"]["dividen_period"] = $("#FrmFilter").find(".select-dividen-period").val();
                $.ajax({
                    type: "POST",
                    url: base_url + "/daftar_keinginan/ajax_daftar_keinginan",
                    data: {act:"listdatahtml", req:request_properti},
                    dataType: "JSON",
                    tryCount: 0,
                    retryLimit: 3,
                    success: function(resp){
                        array_id = resp.array_id;
                        if(resp.paging.IsNext == true){
                            $(".btn-lihat-lebih-banyak").removeClass("d-none");
                        } else {
                            $(".btn-lihat-lebih-banyak").addClass("d-none");
                        }
                        $(".datatable-properti tbody").html(resp.lsdt);
                    },
                    error: function(xhr, textstatus, errorthrown) {
                        $(".datatable-properti tbody").html("<tr><td style='padding: 20px !important;' colspan='4' class='text-center'><span class='badge badge-pill badge-warning'>Check your internet connection again</span></td></tr>");
                    }
                });
            }

            $("#FrmFilter").find("select").change(function(){
                GetDataTable();
            });

            /*$(window).scroll(function(){
                console.log($(document).scrollTop());
            });*/

            $(".btn-more-filter").click(function(){
                $(".btn-more-filter").addClass("d-none");
                $(".div-more-filter").removeClass("d-none");
            });

            $("#FrmFilter").submit(function() {
                GetDataTable();
                return false;
            });



            $(".datatable-properti").on("click", ".delete-bookmark", function() {
                var data_id = $(this).attr("data-id");
                var data_element = $(this);
                $.ajax({
                    type: "POST",
                    url: base_url + "/pemodal/ajax_pemodal",
                    data: {act:"insert_bookmark", req:data_id},
                    dataType: "JSON",
                    tryCount: 0,
                    retryLimit: 3,
                    beforeSend: function() {
                        data_element.html("<i class='fa fa-spin fa-sync-alt'></i>");
                    },
                    success: function(resp){
                        data_element.parent().parent().remove();
                    },
                    error: function(xhr, textstatus, errorthrown) {
                        toastrshow("warning", "Periksa koneksi internet anda kembali", "Warning");
                    }
                });
            });
        </script>
    </body>
</html>