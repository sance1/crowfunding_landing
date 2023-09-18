<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Daftar Penerbit</title>
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
            #products i {
                font-size: 40px;
            }
            .MultiCarousel {
                float: left;
                overflow: hidden;
                padding: 15px;
                width: 100%;
                position: relative;
            }
            .MultiCarousel .MultiCarousel-inner {
                transition: 1s ease all;
                float: left;
            }
            .MultiCarousel .MultiCarousel-inner .item {
                float: left;
            }
            .MultiCarousel .MultiCarousel-inner .item>div {
                text-align: center;
                padding: 0px;
                margin: 10px;
                background: #f1f1f1;
                color: #666;
                border-radius: 15px;
            }
            .MultiCarousel .leftLst,
            .MultiCarousel .rightLst {
                position: absolute;
                border-radius: 50%;
                top: calc(50% - 20px);
                font-size: 28px;
                width: 53px;
                height: 53px;
            }
            .MultiCarousel .leftLst {
                left: 0;
            }
            .MultiCarousel .rightLst {
                right: 0;
            }
            .MultiCarousel .leftLst.over,
            .MultiCarousel .rightLst.over {
                pointer-events: none;
                background: #ccc;
                color: #d2d2d2 !important
            }
            .MultiCarousel .lead {
                line-height: 20px !important;
                font-size: 18px !important;
            }
            .MultiCarousel .font-custom-14 {
                font-size: 14px;
            }
            .MultiCarousel .border-primary {
                height: 4px;
                width: 65px;
                margin: 5px auto 30px;
                border-radius: 100px;
            }
            .MultiCarousel .bg-image {
                border-top-left-radius: 15px;
                border-top-right-radius: 15px;
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center center;
                height: 300px;
                width: 100%;
            }
            .MultiCarousel .content {
                padding: 10px;
            }

            /*.contect-header{
                background-image: url('<?php echo base_url("/assets/images/xxx_xxx_xxx/city.jpg") ?>');
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center center;
                min-height: 95vh;
                padding: 0px;
            }*/
            .carousel-item {
                height: 95vh;
                min-height: 350px;
                background: no-repeat center center scroll;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }
            .contect-header-text{
                background-color: #ffffff38;
                max-width: 900px;
                margin: 200px auto;
            }
            .contect-header-text h1{
                font-size: 45px;
                text-shadow: 1px 1px 7px black;
            }
            .contect-header-text p{
                max-width: 100%;
                font-size: 27px;
                line-height: 30px;
                text-shadow: 1px 1px 7px black;
            }

            @media only screen and (min-width: 1400px) {
                .contect-header{
                    min-height: 95vh;
                    height: 95vh;
                    padding: 0px;
                }
                .carousel-item {
                    height: 95vh;
                }
                .contect-header-text{
                    max-width: 60vw;
                    margin: 23vh 60px;
                }
                .contect-header-text h1{
                    font-size: 3vw;
                }
                .contect-header-text p{
                    font-size: 2vw;
                    line-height: 2.1vw;
                }
            }
                            
            @media only screen and (max-width: 700px) {
                .contect-header{
                    min-height: 60vh;
                    height: 60vh;
                    padding: 0px;
                }
                .carousel-item {
                    height: 60vh;
                }
                .contect-header-text{
                    max-width: 900px;
                    margin: 18vh 15px;
                }
                .contect-header-text h1{
                    font-size: 25px;
                }
                .contect-header-text p{
                    font-size: 15px;
                    line-height: 17px;
                }
            }


            .shadow{
                -webkit-box-shadow: 0px 0px 15px -2px #000000; 
                box-shadow: 0px 0px 15px -2px #000000;
            }
            .carousel-caption{
                bottom: auto;
            }

            .carousel-caption{
                left: 10%;
                right: 10%;
            }
            .carousel-control-next, .carousel-control-prev{
                width: 10%;
            }
            .contect-header-text{
                margin: 200px auto;
                max-width: 1200px;
            }

            /*TIMELINE*/
            .div-timeline .container {
                 max-width: 650px;
                 margin: 50px auto;
            }
            .div-timeline p {
                 font-weight: 300;
                 line-height: 1.5;
                 font-size: 14px;
                 opacity: 0.8;
            }
             .timeline {
                 position: relative;
                 padding-left: 4rem;
                 margin: 0 0 0 30px;
                 color: white;
            }
             .timeline:before {
                 content: '';
                 position: absolute;
                 left: 0;
                 top: 0;
                 width: 4px;
                 height: 100%;
                 background: #0084ff;
            }
             .timeline .timeline-container {
                 position: relative;
                 margin-bottom: 2.5rem;
            }
             .timeline .timeline-container .timeline-icon {
                 position: absolute;
                 left: -88px;
                 top: 4px;
                 width: 50px;
                 height: 50px;
                 border-radius: 50%;
                 text-align: center;
                 font-size: 2rem;
                 background: #4f537b;
            }
             .timeline .timeline-container .timeline-icon i {
                 position: absolute;
                 left: 50%;
                 top: 50%;
                 transform: translate(-50%, -50%);
            }
             .timeline .timeline-container .timeline-icon img {
                 width: 100%;
                 height: 100%;
                 border-radius: 50%;
            }
             .timeline .timeline-container .timeline-body {
                 background: #0084ff;
                 border-radius: 3px;
                 padding: 20px 20px 15px;
                 box-shadow: 1px 3px 9px rgba(0, 0, 0, .1);
            }
             .timeline .timeline-container .timeline-body:before {
                 content: '';
                 background: inherit;
                 width: 20px;
                 height: 20px;
                 display: block;
                 position: absolute;
                 left: -10px;
                 transform: rotate(45deg);
                 border-radius: 0 0 0 2px;
            }
             .timeline .timeline-container .timeline-body .timeline-title {
                 margin-bottom: 1.4rem;
            }
             .timeline .timeline-container .timeline-body .timeline-title .badge {
                 background: #4f537b;
                 padding: 4px 8px;
                 border-radius: 3px;
                 font-size: 12px;
                 font-weight: bold;
            }
             .timeline .timeline-container .timeline-body .timeline-subtitle {
                 font-weight: 300;
                 font-style: italic;
                 opacity: 0.4;
                 margin-top: 16px;
                 font-size: 11px;
            }
             .timeline .timeline-container.primary .badge, .timeline .timeline-container.primary .timeline-icon {
                 background: #0084ff !important;
            }
             .timeline .timeline-container.info .badge, .timeline .timeline-container.info .timeline-icon {
                 background: #11cdef !important;
            }
             .timeline .timeline-container.success .badge, .timeline .timeline-container.success .timeline-icon {
                 background: #00bf9a !important;
            }
             .timeline .timeline-container.warning .badge, .timeline .timeline-container.warning .timeline-icon {
                 background: #ff8d72 !important;
            }
             .timeline .timeline-container.danger .badge, .timeline .timeline-container.danger .timeline-icon {
                 background: #fd5d93 !important;
            }
             .author {
                 font-family: inherit;
                 padding: 3em;
                 text-align: center;
                 width: 100%;
                 color: white;
            }
             .author a:link, .author a:visited {
                 color: white;
            }
             .author a:link:hover, .author a:visited:hover {
                 text-decoration: none;
            }
             .author .btn:link, .author .btn:visited {
                 margin-top: 1em;
                 text-decoration: none;
                 display: inline-block;
                 font-family: inherit;
                 font-weight: 100;
                 color: white;
                 text-align: center;
                 vertical-align: middle;
                 user-select: none;
                 background-color: black;
                 padding: 1.5em 2rem;
                 border-radius: 1em;
                 transition: 0.5s all;
            }
             .author .btn:link:hover, .author .btn:visited:hover, .author .btn:link:focus, .author .btn:visited:focus, .author .btn:link:active, .author .btn:visited:active {
                 background-color: #1a1a1a;
            }
             
        </style>
    </head>
    <body>
        <div class="wrapper">
            <?php $this->load->view("other/header_landing"); ?>
            <div id="main" class="main">
                <div class="home" style="padding-bottom: 0px;">
                    <div class="container container-custom">
                        <div class="row ml-0 mr-0">
                            <div class="col-lg-12 contect-header p-0">
                                <div class="wow fadeIn">
                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner" role="listbox">
                                            <div class="carousel-item active" style="background-image: url('<?php echo $this->config->item("cdn_url")."/".$gambar_penerbit_1; ?>');">
                                                <div class="carousel-caption">
                                                    <div class="contect-header-text p-3 text-center">
                                                        <h1 class="mt-1 bold text-white" style="color: black;">Daftarkan Bisnis Anda<br>Dapatkan Modal Bisnis Dari<br>Pemodal Setia Kami</h1>
                                                        <!-- <p class="mt-4" style="color: black;">Kamu dapat berinvestasi dari berbagai aspek aset dengan skema crowdfunding mulai dari ratusan ribu</p> -->
                                                        <a href="https://penerbit.obsido.co.id" class="btn btn-primary mt-4 bold text-white">Masuk</a>
                                                        <a class="btn btn-primary mt-4 bold btn-daftar-penerbit text-white">Daftar</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="products" class="features wow fadeInDown">
                    <div class="container-m div-timeline">
                        <div class="col-md-12">
                            <div class="features-intro text-center">
                                <h2>Langkah Pendaftaran Penerbit</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6" style="padding-top: 150px;">
                                <img src="<?php echo base_url("/assets/images/penerbit_aset.png") ?>" style="width: 100%;">
                            </div>
                            <div class="col-lg-6">
                                <div class="container">
                                    <div class="timeline">
                                        <div class="timeline-container primary">
                                            <div class="timeline-icon">
                                                <img src="<?php echo base_url("/assets/images/step_daftar_penerbit/1.png") ?>" style="width: 50px;">
                                            </div>
                                            <div class="timeline-body">
                                                <h4 class="timeline-title bold mb-1">Buat Akun</h4>
                                                <p>
                                                    Buat akun di Obsido.<br>Cukup dengan klik daftar di tab navigasi lalu isi form pendaftaran
                                                </p>
                                            </div>
                                        </div>
                                        <div class="timeline-container primary">
                                            <div class="timeline-icon">
                                                <img src="<?php echo base_url("/assets/images/step_daftar_penerbit/2.png") ?>" style="width: 50px;">
                                            </div>
                                            <div class="timeline-body">
                                                <h4 class="timeline-title bold mb-1">Input Data Bisnis Anda</h4>
                                                <p>
                                                    Masukkan data bisnis Anda beserta gambar dan Video profil perusahaan untuk menarik Pemodal
                                                </p>
                                            </div>
                                        </div>
                                        <div class="timeline-container primary">
                                            <div class="timeline-icon">
                                                <img src="<?php echo base_url("/assets/images/step_daftar_penerbit/3.png") ?>" style="width: 50px;">
                                            </div>
                                            <div class="timeline-body">
                                                <h4 class="timeline-title bold mb-1">Tunggu Verifikasi</h4>
                                                <p>
                                                    Tunggu Verifikasi<br>Setelah verifikasi bisnis Anda masuk ke pra listing dan Pemodal akan melakukan vote untuk memilih bisnis yang akan listing selanjutnya
                                                </p>
                                            </div>
                                        </div>
                                        <div class="timeline-container primary">
                                            <div class="timeline-icon">
                                                <img src="<?php echo base_url("/assets/images/step_daftar_penerbit/4.png") ?>" style="width: 50px;">
                                            </div>
                                            <div class="timeline-body">
                                                <h4 class="timeline-title bold mb-1">Listing Di Obsido</h4>
                                                <p>
                                                    Bisnis dengan vote yang banyak dan memenuhi syaray listing dan kami akan melakukan pendanaan. Pemodal bisa Investasi di perusahaan Anda
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="container container-custom">
                        <div class="row ml-0 mr-0">
                            <div class="col-lg-12 p-0" style="background-image: url('<?php echo $this->config->item("cdn_url")."/".$gambar_penerbit_2; ?>');
                                -webkit-background-size: cover;
                                -moz-background-size: cover;
                                -o-background-size: cover;
                                background-size: cover;">
                                <div class="wow fadeIn">
                                    <div>
                                        <div class="contect-header-text p-3 text-center" style="margin: 100px auto;">
                                            <h1 class="mt-1 bold text-white" style="color: black;">Ayo Daftarkan Bisnismu Sekarang !</h1>
                                            <!-- <p class="mt-4" style="color: black;">Kamu dapat berinvestasi dari berbagai aspek aset dengan skema crowdfunding mulai dari ratusan ribu</p> -->
                                            <a href="https://penerbit.obsido.co.id" class="btn btn-primary mt-4 bold text-white">Masuk</a>
                                            <a class="btn btn-primary mt-4 bold btn-daftar-penerbit text-white">Daftar</a>
                                        </div>
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
        <script type="text/javascript" src="<?php echo base_url("assets/plugins/Inputmask-5.x/dist/jquery.inputmask.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/proses.js?n=").$this->config->item("tahun_assets"); ?>"></script>
        <script>

        </script>
    </body>
</html>
