<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Tim Obsido</title>
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
        </style>
    </head>
    <body>
        <div class="wrapper">
            <?php $this->load->view("other/header_landing"); ?>
            <div id="main" class="main">
                <div class="home mt-3">
                    <div class="container">
                        <div class="row row-resize-item">
                            <div class="col-12">
                                <div class="card m-b-30">
                                    <div class="col-12 p-5 shadow text-center">
                                        <h1 class="bold">Tim Obsido</h1>
                                    </div>
                                    <div class="row col-12 p-5" style="padding-top: 0px !important;">
                                        <div class="col-lg-3 p-3">
                                            <img src="<?php echo base_url("assets/images/tim_obsido/1.png"); ?>" style="width: 100%;">
                                            <div class="text-center p-2" style="background: #f3f3f3; margin-top: -3px;">
                                                <span class="bold">Nama</span><br>
                                                <span>Jabatan</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 p-3">
                                            <img src="<?php echo base_url("assets/images/tim_obsido/2.png"); ?>" style="width: 100%;">
                                            <div class="text-center p-2" style="background: #f3f3f3; margin-top: -3px;">
                                                <span class="bold">Nama</span><br>
                                                <span>Jabatan</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 p-3">
                                            <img src="<?php echo base_url("assets/images/tim_obsido/3.png"); ?>" style="width: 100%;">
                                            <div class="text-center p-2" style="background: #f3f3f3; margin-top: -3px;">
                                                <span class="bold">Nama</span><br>
                                                <span>Jabatan</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 p-3">
                                            <img src="<?php echo base_url("assets/images/tim_obsido/4.png"); ?>" style="width: 100%;">
                                            <div class="text-center p-2" style="background: #f3f3f3; margin-top: -3px;">
                                                <span class="bold">Nama</span><br>
                                                <span>Jabatan</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 pl-5 pr-5 pb-5" style="line-height: 25px;">
Kami adalah sebuah platform yang menghubungkan investor dan pemilik usaha. Di platform ini, investor dapat investasi ke proyek bisnis 
yang ditawarkan dengan modal yang rendah. Investor akan dapat kepemilikan dalam bentuk saham yang bisa diperjual belikan di 
platform. Kami mempermudah investor dengan investasi menguntungkan, modal investasi kecil, likuiditas, dan biaya transaksi yang rendah 
                                    </div>
                                    <div class="col-12 p-5 shadow text-center">
                                        <h1 class="bold">Visi Misi Kami</h1>
                                    </div>
                                    <div class="col-12 pl-5 pr-5 pb-5 text-center" style="line-height: 25px;">
                                        <span class="bold">Visi</span><br>
                                        <span>Meningkatkan perekonomian Indonesia dengan meningkatkan industri bisnis di Indonesia.<br>Meningkatkan peluang investasi bagi investor.</span>
                                    </div>
                                    <div class="col-12 pl-5 pr-5 pb-5 text-center" style="line-height: 25px;">
                                        <span class="bold">Misi</span><br>
                                        <span>Mengadakan layanan urun dana bagi pelaku industri bisnis di Indonesia. Membuka kesempatan kepada semua masyarakat Indonesia untuk berinvestasi melalui platform kami, yang menghubungkan pemilik bisnis dan investor.</span>
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

        </script>
    </body>
</html>
