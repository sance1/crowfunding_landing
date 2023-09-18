<?php
    $latitude_longitude = explode(", ", $properti->latitude_longitude, 2);
    $persen_terkumpul = round($properti->total_saham_terkumpul/$properti->total_per_lembar*100);
    if(!empty($this->session->userdata("user"))) {
        if(empty($bookmark)){
            $btn_bookmark = "<a class='add-bookmark' data-id='".$properti->id."'><i class='far fa-star' style='font-size: 14px;'></i> Tandai</a>";
        } else {
            if($bookmark[0]->status_delete == 0){
                $btn_bookmark = "<a class='add-bookmark' data-id='".$properti->id."'><i class='fas fa-star' style='font-size: 14px;'></i> Tandai</a>";
            } else {
                $btn_bookmark = "<a class='add-bookmark' data-id='".$properti->id."'><i class='far fa-star' style='font-size: 14px;'></i> Tandai</a>";
            }
        }
    } else {
        $btn_bookmark = "<a class='btn-login'><i class='far fa-star' style='font-size: 14px;'></i> Tandai</a>";
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Obsido</title>
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
            .table-grafik-progress .progress-bar{
                white-space: nowrap; 
                overflow: hidden;
                text-overflow: ellipsis;
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
        <?php $this->load->view("properti/modal/properti_pembelian"); ?>
        <?php $this->load->view("properti/modal/properti_tag_gambar_html"); ?>
        <div class="wrapper">
            <?php $this->load->view("other/header_landing"); ?>
            <div id="main" class="main">
                <div class="home">
                    <div class="container">
                        <div class="row row-resize-item pt-4 font-default text-primary">
                            <div class="col-12">
                            </div>
                        </div>
                        <div class="row font-default text-primary">
                            <div class="col-lg-7">
                                <label class="bold mb-2" style="font-size: 24px;"><?php echo $properti->nama ?></label><br>
                                <label><?php echo $properti->alamat ?></label>
                                <div id="foto-slider" class="carousel slide mt-2" data-ride="carousel">
                                    <ul class="carousel-indicators">
                                        <?php
                                            foreach(json_decode($properti->foto) as $key => $item) {
                                                if($key == 0){
                                                    echo "<li data-target='#foto-slider' data-slide-to='".$key."' class='active'></li>";
                                                } else {
                                                    echo "<li data-target='#foto-slider' data-slide-to='".$key."'></li>";
                                                }
                                            }
                                        ?>
                                    </ul>
                                    <div class="carousel-inner">
                                        <?php
                                            foreach(json_decode($properti->foto) as $key => $item) {
                                                if($key == 0){
                                                    echo "<div class='carousel-item active'>
                                                                <img src='".$this->config->item("cdn_url")."/".$item."' style='width: 100%;'/>
                                                            </div>";
                                                } else {
                                                    echo "<div class='carousel-item'>
                                                                <img src='".$this->config->item("cdn_url")."/".$item."' style='width: 100%;'/>
                                                            </div>";
                                                }
                                            }
                                        ?>
                                    </div>
                                    <a class="carousel-control-prev" href="#foto-slider" data-slide="prev">
                                        <span class="carousel-control-prev-icon"></span>
                                    </a>
                                    <a class="carousel-control-next" href="#foto-slider" data-slide="next">
                                        <span class="carousel-control-next-icon"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-5 div-detail-properti">
                                <a onclick="window.print();"><i class="las la-print" style="font-size: 20px;"></i> Cetak</a>&nbsp;
                                <a><i class="las la-share" style="font-size: 20px;"></i> Bagikan</a>&nbsp;
                                <?php echo $btn_bookmark; ?>&nbsp;
                                <label><i class="las la-eye" style="font-size: 20px;"></i> <?php echo $properti->total_view ?> dilihat</label><br><br>
                                <label class="bold mb-2" style="font-size: 24px;">Peluang Investasi</label><br>
                                <div class="row">
                                    <div class="col-12 mb-4 text-left bold text-primary font-default font-custom-14">
                                        Terkumpul <?php echo $persen_terkumpul; ?>% dari <?php echo $properti->total_investor; ?> investor
                                        <div class="progress mt-1">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $persen_terkumpul; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $persen_terkumpul; ?>%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <label class="bold mb-2">Durasi Project</label><br>
                                <label><i class="las la-calendar" style="font-size: 20px;"></i> Mulai <?php echo date("d M Y", strtotime($properti->tgl_mulai)) ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
                                <label><i class="las la-calendar-check" style="font-size: 20px;"></i> Selesai <?php echo date("d M Y", strtotime($properti->tgl_selesai)) ?></label><br><br>
                                <table style="width: 100%;">
                                    <tr>
                                        <td style="width: 50%;">Jumlah Dana</td>
                                        <td style="width: 50%;" class="text-right bold"><?php echo $this->foglobal->rupiah($properti->jumlah_dana, true) ?></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 50%;">Harga Saham</td>
                                        <td style="width: 50%;" class="text-right bold"><?php echo $this->foglobal->rupiah($properti->harga_per_lembar, true) ?></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 50%;">Total Saham</td>
                                        <td style="width: 50%;" class="text-right bold"><?php echo $this->foglobal->rupiah($properti->total_per_lembar) ?></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 50%;">Persentase Saham</td>
                                        <td style="width: 50%;" class="text-right bold"><?php echo $this->foglobal->persen($properti->lepas_saham) ?>%</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 50%;">Periode Dividen</td>
                                        <td style="width: 50%;" class="text-right bold"><?php echo $properti->dividen_period; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 50%;">ROI</td>
                                        <td style="width: 50%;" class="text-right bold"><a data-toggle="tooltip" title="Ekspetasi ROI"><?php echo $this->foglobal->persen($properti->roi) ?>%</a></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 50%;">Tipe Aset</td>
                                        <td style="width: 50%;" class="text-right bold"><?php echo $properti->tipe_aset; ?></td>
                                    </tr>
                                </table>
                                <a class="btn btn-block btn-primary text-white bold mt-3 <?php if($this->session->userdata("user")){ echo "btn-investasi"; } ?>">Investasi</a>
                            </div>
                            <div class="col-lg-12 mt-2">
                                <ul class="nav nav-tabs font-default bold text-center" role="tablist">
                                    <li class="nav-item nav-login">
                                        <a class="nav-link p-3 active" href="#tab-deskripsi" role="tab" data-toggle="tab">Deskripsi</a>
                                    </li>
                                    <li class="nav-item nav-laporan-dokumen">
                                        <a class="nav-link p-3" href="#tab-laporan-dokumen" role="tab" data-toggle="tab">Laporan Dokumen</a>
                                    </li>
                                    <li class="nav-item nav-laporan-dokumen">
                                        <a class="nav-link p-3" href="#tab-laporan-penggunaan-dana" role="tab" data-toggle="tab">Laporan Penggunaan Dana</a>
                                    </li>
                                    <li class="nav-item nav-laporan-dokumen">
                                        <a class="nav-link p-3" href="#tab-progres" role="tab" data-toggle="tab">Progres</a>
                                    </li>
                                    <li class="nav-item nav-laporan-dokumen">
                                        <a class="nav-link p-3" href="#tab-lihat-peta" role="tab" data-toggle="tab">Lihat Peta</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade active show pt-3" id="tab-deskripsi">
                                        <label class="text-primary bold" style="font-size: 22px;">Deskripsi - <?php echo $properti->nama ?></label>
                                        <br>
                                        <ul class="mt-3">
                                            <?php
                                                foreach(json_decode($properti->overview) as $key => $item) {
                                                    echo "<li class='mt-2'><i class='fa fa-circle' style='font-size: 13px;'></i> ".$item."</li>";
                                                }
                                            ?>
                                        </ul>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade pt-3" id="tab-laporan-dokumen">
                                        <label class="text-primary bold" style="font-size: 22px;">Laporan Dokumen - <?php echo $properti->nama ?></label>
                                        <br>
                                        <div class="card shadow mt-3">
                                            <div class="row ml-0 mr-0">
                                                <div class="col-lg-12">
                                                    <ul class="mt-3">
                                                        <table style="width: 100%;">
                                                            <tr>
                                                                <th class="bold text-primary" style="padding-bottom: 10px;">Nama Berkas</th>
                                                                <th class="bold text-primary" style="padding-bottom: 10px;">Keterangan</th>
                                                                <th class="bold text-primary text-center" style="width: 200px;padding-bottom: 10px;">Tanggal Unggah</th>
                                                                <th class="bold text-primary text-center" style="width: 200px;padding-bottom: 10px;">Unduh Berkas</th>
                                                            </tr>
                                                            <?php
                                                                foreach($dokumen as $key => $item) {
                                                                    echo "<tr><td style='padding: 5px 10px !important;'><i class='fa fa-circle' style='font-size: 13px;'></i> ".$item->nama."</td><td style='padding: 5px 10px !important;'>".$item->keterangan."</td><td style='padding: 5px 10px !important;' class='text-center'>".date("d M Y", strtotime($item->created_at))."</td><td style='padding: 5px 10px !important;' class='text-center'><a download href='".$this->config->item("cdn_url")."/file_upload/".$item->file."' class='text-primary bold'><i class='fa fa-download'></i></a></td></tr>";
                                                                }
                                                            ?>
                                                        </table>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade pt-3" id="tab-laporan-penggunaan-dana">
                                        <label class="text-primary bold" style="font-size: 22px;">Laporan Penggunaan Dana - <?php echo $properti->nama ?></label>
                                        <br>
                                        <div class="card shadow mt-3">
                                            <div class="row ml-0 mr-0">
                                                <div class="col-lg-12 pt-3 pb-3 div-laporan-penggunaan-dana">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade pt-3" id="tab-progres">
                                        <label class="text-primary bold" style="font-size: 22px;">Progres - <?php echo $properti->nama ?></label>
                                        <br>
                                        <div class="card shadow mt-3">
                                            <div class="row ml-0 mr-0">
                                                <div class="col-lg-12">
                                                    <ul class="mt-3">
                                                        <table class="table-grafik-progress" style="width: 100%;">
                                                            <tr>
                                                                <th class="bold text-primary">Keterangan</th>
                                                                <th class="bold text-primary text-center" style="width: 160px;">Mulai</th>
                                                                <th class="bold text-primary text-center" style="width: 160px;">Selesai</th>
                                                                <th class="bold text-primary text-center" style="width: 100px;">Durasi</th>
                                                                <th class="bold text-primary text-center" style="width: 200px;">Progres</th>
                                                            </tr>
                                                            <?php
                                                                foreach($progress as $key => $item) {
                                                                    $foto_data_url = "";
                                                                    if($item->foto != ""){
                                                                        $foto_data_url = "<a class='bold text-primary' onclick='OpenImage(".'"'.$this->config->item("cdn_url")."/file_upload/".$item->foto.'"'.");'><i style='font-size: 26px;' class='fa fa-image'></i></a>";
                                                                    }
                                                                    $now = strtotime($item->tgl_selesai);
                                                                    $your_date = strtotime($item->tgl_mulai);
                                                                    $datediff = $now - $your_date;
                                                                    $durasi = (round($datediff / (60 * 60 * 24))+1);
                                                                    echo "<tr>
                                                                            <td style='padding: 5px 10px !important;'><i class='fa fa-circle' style='font-size: 13px;'></i> ".$foto_data_url." ".$item->keterangan."</td>
                                                                            <td style='padding: 5px 10px !important;' class='text-center'>".date("d M Y", strtotime($item->tgl_mulai))."</td>
                                                                            <td style='padding: 5px 10px !important;' class='text-center'>".date("d M Y", strtotime($item->tgl_selesai))."</td>
                                                                            <td style='padding: 5px 10px !important;' class='text-center'>".$durasi." hari</td>
                                                                            <td style='padding: 5px 10px !important;' class='text-center'>
                                                                                <div class='progress' style='height: 17px;'>
                                                                                    <div class='progress-bar' style='width: ".$item->progress."%;'>".$item->progress."%</div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>";
                                                                }
                                                            ?>
                                                        </table>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade pt-3" id="tab-lihat-peta">
                                        <div id="maps_properti" class="col-12" style="height: 80vh;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $this->load->view("other/footer"); ?>
            </div>
        </div>
        <?php //$this->load->view("pemodal/modal/pin_verifikasi"); ?>
        <?php //$this->load->view("pemodal/modal/pin_reset"); ?>
        <?php //$this->load->view("pemodal/modal/otp_verifikasi"); ?>
        <?php //$this->load->view("pemodal/modal/pin_edit"); ?>
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
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRBgpvLaa_dw83y-Q06dklBhL0UOPD6_o"></script>
        <script>
            $('[data-toggle="tooltip"]').tooltip();
            ProsesHistoriDana();
            initMap("<?php echo $latitude_longitude[0]; ?>", "<?php echo $latitude_longitude[1]; ?>");
            function initMap(location_latitude, location_longitude) {
                var map;
                var myLatLng = {lat: Number(location_latitude), lng: Number(location_longitude)};
                map = new google.maps.Map(document.getElementById("maps_properti"), {
                    center: myLatLng,
                    zoom: 16
                });
                var marker = new google.maps.Marker({
                    position: myLatLng,
                    icon: "<?php echo base_url("assets/images/icon_mapss.png"); ?>",
                    map: map
                });
            }

            function SimpanPropertiPembelian(){
                $("#FrmPropertiPembelian").submit();
            }

            var properti_pembelian = $("#modal-properti-pembelian");
            var properti_tag_ganbar_html = $("#modal-properti-tag-gambar-html");
            $(".btn-investasi").click(function(){
                $("#modal-properti-pembelian").modal("show");
                properti_pembelian.find("input[name='form[id_properti]']").val("<?php echo $_GET["id"]; ?>");
                properti_pembelian.find("input[name='form[total_saham]']").val("0").attr("max", "<?php echo $properti->total_per_lembar; ?>").trigger("change");
                properti_pembelian.find(".total-pembayaran").val("0");
                var sisa_saldo = properti_pembelian.find(".sisa-saldo").val();
                sisa_saldo = parseInt(sisa_saldo.replace(/\./g, "", sisa_saldo))-parseInt("<?php echo $this->session->userdata("biaya_admin"); ?>");
                var limit_pembelian_saham = Math.floor(sisa_saldo/parseInt("<?php echo $properti->harga_per_lembar; ?>"));
                if(limit_pembelian_saham < parseInt("<?php echo $properti->total_per_lembar; ?>")){
                    properti_pembelian.find("input[name='form[total_saham]']").val("0").attr("max", limit_pembelian_saham).trigger("change");
                }
            });
            properti_pembelian.find("input[name='form[total_saham]']").change(function(){
                if($(this).val() == ""){

                } else {
                    properti_pembelian.find("input[name='form[nominal]']").val(rupiah(parseInt(properti_pembelian.find("input[name='form[total_saham]']").val())*parseInt("<?php echo $properti->harga_per_lembar; ?>")));
                    properti_pembelian.find(".total-pembayaran").val(rupiah(parseInt(properti_pembelian.find("input[name='form[total_saham]']").val())*parseInt("<?php echo $properti->harga_per_lembar; ?>")+parseInt("<?php echo $this->session->userdata("biaya_admin"); ?>")));
                }
            });
            var FrmPropertiPembelian = $("#FrmPropertiPembelian").validate({
                submitHandler: function(form) {
                    form_pembelian = form;

                    verifikasi_input_value.val("");
                    $(".verifikasi-pin .text-pin").text("Masukkan PIN Anda");
                    $(".verifikasi-pin #verifikasi-enter").addClass("d-none");
                    verifikasi_pin_user = "";
                    verifikasi_pin_1 = "";
                    $("#verifikasi-password-show").val("");
                    $("#modal-verifikasi-pin").modal("show");
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

            $(".div-detail-properti").on("click", ".add-bookmark", function() {
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
                        data_element.html("<i class='fa fa-spin fa-sync-alt' style='font-size: 14px;'></i> Tandai");
                    },
                    success: function(resp){
                        if(resp == 1){
                            data_element.html("<i class='fas fa-star' style='font-size: 14px;'></i> Tandai");
                        } else {
                            data_element.html("<i class='far fa-star' style='font-size: 14px;'></i> Tandai");
                        }
                    },
                    error: function(xhr, textstatus, errorthrown) {
                        toastrshow("warning", "Periksa koneksi internet anda kembali", "Warning");
                    }
                });
            });

            function OpenImage(data_image){
                console.log(data_image);
                html_tag_gambar = "<img src='"+data_image+"' style='width: 100%; height: auto;'>";
                properti_tag_ganbar_html.find(".div-detail-gambar").html(html_tag_gambar);
                $("#modal-properti-tag-gambar-html").modal("show");
            }


            $(".verifikasi-pin #verifikasi-enter").click(function() {
                if(verifikasi_pin_user == ""){
                    if(verifikasi_input_value.val() != "<?php if(isset($this->session->userdata("user")->pin)){ echo $this->session->userdata("user")->pin; } else { echo ""; } ?>"){
                        toastrshow("warning", "Masukkan PIN dengan benar!", "Warning");
                    } else {
                        $("#modal-verifikasi-pin").modal("hide");

                        laddasubmit = properti_pembelian.find(".ladda-button-submit");
                        UpdateData(form_pembelian, function(resp) {
                            window.location.href = base_url + "/portofolio.html";
                        }, "", "insert_transaksi");
                    }
                }
            });

            function ProsesHistoriDana(){
                var history_dana = <?php echo json_encode($kelola_dana); ?>;
                var html_data_item = "";
                var total_keseluruhan = 0;
                $.each(history_dana, function(index, item) {
                    total_keseluruhan += parseInt(item.total);
                    var html_data = "";
                    var total_data = 0;
                    $.each($.parseJSON(item.uraian), function(index_uraian, item_uraian) {
                        var dokumen = "";
                        total_data += parseInt(item_uraian.jumlah.replace(/\./g,""));
                        if(item_uraian.dokumen == "" || item_uraian.dokumen == null){
                            
                        } else {
                            dokumen = "<a target='_blank' href='"+cdn_url+"/file_upload/"+item_uraian.dokumen+"' class='btn btn-sm btn-primary'>Lihat</a>";
                        }
                        html_data += "<tr style='color: #495057;'><td>"+item_uraian.keterangan+"</td><td class='text-center'>"+dokumen+"</td><td class='text-right'>Rp"+item_uraian.jumlah+"</td></tr>";
                    });
                    html_data_item = "<table style='width: 100%;'><tr><th style='width: 50%; color: #495057;'>Deskripsi : "+item.deskripsi+"</th><th class='text-right' style='width: 50%; color: #495057;'>Tanggal : "+moment(item.created_at).format("DD MMM YYYY")+"</th></tr></table><table class='table table-striped table-bordered mb-2 mt-2'><thead class='thead-light'><tr><th class='bold'>Keterangan</th><th style='width: 100px;' class='bold'>Dokumen</th><th style='width: 200px;' class='bold text-right'>Jumlah</th></tr></thead><tbody>"+html_data+"</tbody><tfoot><tr><th colspan='3' style='background: whitesmoke; color: #495057;' class='bold total text-right'>Total : "+rupiah(item.total)+"</th></tr></tfoot></table><hr style='border-top: 4px solid rgba(0,0,0,.1);'>"+html_data_item;
                });
                if(html_data_item == ""){
                    html_data_item = "<center><span class='badge badge-pill badge-warning text-white p-3'>Tidak ada data</span></center>";
                }
                $(".div-laporan-penggunaan-dana").html(html_data_item+"<table style='width: 100%;'><tr><th class='text-right bold' style='width: 100%;'>Total Keselurahan : "+rupiah(total_keseluruhan)+"</th></tr></table>");
            }
        </script>
    </body>
</html>
