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
                /*background-color: #ffffff38;*/
                max-width: 900px;
                margin: 200px 50px;
            }
            .contect-header-text h1{
                font-size: 45px;
                /*text-shadow: 1px 1px 7px black;*/
            }
            .contect-header-text p{
                max-width: 100%;
                font-size: 27px;
                line-height: 30px;
                /*text-shadow: 1px 1px 7px black;*/
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
        </style>
    </head>
    <body>

        <div class="wrapper">
            <?php $this->load->view("other/header_landing"); ?>
            <div id="main" class="main">
                <div class="home">
                    <div class="container container-custom">
                        <div class="row mb-5 ml-0 mr-0">
                            <div class="col-lg-12 contect-header p-0">
                                <div class="wow fadeIn">
                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <?php 
                                                foreach ($banner as $index=>$item) {
                                                    if($index == 0){
                                                    ?>
                                                        <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo ($index+1);?>" class="active"></li>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo ($index+1);?>"></li>
                                                    <?php
                                                    }
                                                }
                                            ?>
                                        </ol>
                                        <div class="carousel-inner" role="listbox">
                                            <?php 
                                                foreach ($banner as $index=>$item) {
                                                    if($item->teks_tombol == "" && $item->url_tombol == ""){
                                                        $btn_detail = "";
                                                    } else {
                                                        $btn_detail = "<a class='btn btn-primary mt-4 bold' href='".$item->url_tombol."'>".$item->teks_tombol."</a>";
                                                    }
                                                    if($index == 0){
                                                    ?>
                                                        <div class="carousel-item active" style="background-image: url('<?php echo $this->config->item("cdn_url")."/".$item->foto; ?>');">
                                                            <div class="carousel-caption">
                                                                <div class="contect-header-text p-3 text-left">
                                                                    <h1 class="mt-1 bold" style="color: black;"><?php echo $item->judul; ?></h1>
                                                                    <p class="mt-4" style="color: black;"><?php echo $item->deskripsi; ?></p>
                                                                    <?php echo $btn_detail; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <div class="carousel-item" style="background-image: url('<?php echo $this->config->item("cdn_url")."/".$item->foto; ?>');">
                                                            <div class="carousel-caption">
                                                                <!-- <div class="contect-header-text p-3 text-right"> -->
                                                                <div class="contect-header-text p-3 text-left">
                                                                    <h1 class="mt-1 bold" style="color: black;"><?php echo $item->judul; ?></h1>
                                                                    <p class="mt-4" style="color: black;"><?php echo $item->deskripsi; ?></p>
                                                                    <?php echo $btn_detail; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                }
                                            ?>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                            <div style="background: #0084ff; padding: 15px; border-radius: 10px;">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            </div>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                            <div style="background: #0084ff; padding: 15px; border-radius: 10px;">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            </div>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>

                                    <!-- <div class="contect-header-text p-3">
                                        <h1 class="mt-1 text-white bold">Build wealth through real estate</h1>
                                        <p class="mt-4 text-white">Obsido makes investing in single-family properties radically simple.</p>
                                        <a class="btn btn-primary mt-4 bold" href="<?php echo base_url("properti.html"); ?>">View Properties</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container container-custom">
                        <div class="row ml-0 mr-0 text-center row-resize-item" style="padding: 0px 8vh;">
                            <div class="col-md-12">
                                <div class="features-intro">
                                    <h2>Featured Properties</h2>
                                    <!-- <p>Meeton makes it meeting simple for collaboration teams a video conference.</p> -->
                                </div>
                            </div>
                            <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
                                <div class="MultiCarousel-inner">

                                    <?php
                                        foreach ($properti as $index => $item) {
                                            $persen_terkumpul = round($item->total_saham_terkumpul/$item->total_per_lembar*100);
                                            $foto = json_decode($item->foto);
                                            
                                            if(empty($foto)){
                                                $foto = base_url("/assets/images/default-placeholder.png");
                                            } else {
                                                $foto = $this->config->item("cdn_url")."/".$foto[0];
                                            }

                                    ?>
                                        <a href="<?php echo base_url("properti/detail.html?id=").$item->id; ?>">
                                            <div class="item">
                                                <div class="pad15">
                                                    <div class="bg-image" style="background-image: url('<?php echo $foto; ?>');"></div>
                                                    <div class="content">
                                                        <p class="lead text-primary bold mt-1"><?php echo $item->nama ?></p>
                                                        <div class="bg-primary border-primary"></div>
                                                        <div class="row mt-3 mb-2">
                                                            <div class="col-12 mb-4 text-left bold text-primary font-default font-custom-14">
                                                                Terkumpul <?php echo $persen_terkumpul; ?>% dari <?php echo $item->total_investor; ?>
                                                                <div class="progress mt-1">
                                                                    <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $persen_terkumpul; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $persen_terkumpul; ?>%">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6 pr-0 text-left bold text-primary font-default font-custom-14">
                                                                Jumlah Dana<br><?php echo $this->foglobal->rupiah($item->jumlah_dana, true) ?><br><br>
                                                                Harga Saham<br><?php echo $this->foglobal->rupiah($item->harga_per_lembar, true) ?><br><br>
                                                                Periode Dividen<br><?php echo $item->dividen_period ?>
                                                            </div>
                                                            <div class="col-6 pl-0 text-left bold text-primary font-default font-custom-14">
                                                                Persentase Saham<br><?php echo $this->foglobal->persen($item->lepas_saham) ?>%<br><br>
                                                                Total Saham<br><?php echo $this->foglobal->rupiah($item->total_per_lembar) ?><br><br>
                                                                Tipe Aset<br><?php echo $item->tipe_aset ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    <?php
                                        }
                                    ?>
                                </div>
                                <a class="btn leftLst ml-3 shadow bg-white text-dark" style="border: none;"><i class="fa fa-chevron-left" style="margin-left: -5px;"></i></a>
                                <a class="btn rightLst mr-3 shadow bg-white text-dark" style="border: none;"><i class="fa fa-chevron-right" style="margin-right: -5px;"></i></a>
                            </div>
                            <div class="col-12">
                                <a href="<?php echo base_url("properti.html"); ?>" class="btn btn-primary mt-4 bold">Lihat Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="products" class="features wow fadeInDown">
                    <div class="container-m">
                        <div class="row ml-0 mr-0 text-center">
                            <div class="col-md-12">
                                <div class="features-intro">
                                    <h2>Our Invesment buying process is<br>simple, efficient, and transparent.</h2>
                                    <!-- <p>Meeton makes it meeting simple for collaboration teams a video conference.</p> -->
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="feature-list">
                                    <div class="card-icon">
                                        <div class="card-img">
                                            <i class="las la-search-location"></i>
                                        </div>
                                    </div>
                                    <div class="card-text">
                                        <h3>Find Your Properties</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="feature-list">
                                    <div class="card-icon">
                                        <div class="card-img">
                                            <i class="las la-file-invoice-dollar"></i>
                                        </div>
                                    </div>
                                    <div class="card-text">
                                        <h3>Start Invest</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="feature-list">
                                    <div class="card-icon">
                                        <div class="card-img">
                                            <i class="las la-coins"></i>
                                        </div>
                                    </div>
                                    <div class="card-text">
                                        <h3>Low Cost</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <a class="btn btn-outline-primary mt-4 bold" href="">Learn More</a>
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
            $(document).ready(function () {
                var itemsMainDiv = ('.MultiCarousel');
                var itemsDiv = ('.MultiCarousel-inner');
                var itemWidth = "";

                $('.leftLst, .rightLst').click(function () {
                    var condition = $(this).hasClass("leftLst");
                    if (condition)
                        click(0, this);
                    else
                        click(1, this)
                });
                ResCarouselSize();
                $(window).resize(function () {
                    ResCarouselSize();
                });
                setTimeout(function(){
                    ResCarouselSize();
                }, 1000);
                function ResCarouselSize() {
                    var incno = 0;
                    var dataItems = ("data-items");
                    var itemClass = ('.item');
                    var id = 0;
                    var btnParentSb = '';
                    var itemsSplit = '';
                    var sampwidth = $(itemsMainDiv).width();
                    var bodyWidth = $('body').width();
                    $(itemsDiv).each(function () {
                        id = id + 1;
                        var itemNumbers = $(this).find(itemClass).length;
                        btnParentSb = $(this).parent().attr(dataItems);
                        itemsSplit = btnParentSb.split(',');
                        $(this).parent().attr("id", "MultiCarousel" + id);

                        console.log(bodyWidth);
                        if (bodyWidth >= 1750) {
                            incno = itemsSplit[3];
                            itemWidth = (sampwidth+350) / incno;
                        }
                        else if (bodyWidth >= 1600) {
                            incno = itemsSplit[3];
                            itemWidth = (sampwidth+500) / incno;
                        }
                        else if (bodyWidth >= 1400) {
                            incno = itemsSplit[3];
                            itemWidth = (sampwidth+700) / incno;
                        }
                        else if (bodyWidth >= 1200) {
                            incno = itemsSplit[2];
                            itemWidth = (sampwidth+600) / incno;
                        }
                        else if (bodyWidth >= 992) {
                            incno = itemsSplit[2];
                            itemWidth = (sampwidth+750) / incno;
                        }
                        else if (bodyWidth >= 768) {
                            incno = itemsSplit[1];
                            itemWidth = (sampwidth+400) / incno;
                        }
                        else if (bodyWidth >= 650) {
                            incno = itemsSplit[1];
                            itemWidth = (sampwidth+550) / incno;
                        }
                        else if (bodyWidth >= 500) {
                            incno = itemsSplit[1];
                            itemWidth = (sampwidth+700) / incno;
                        }
                        else {
                            incno = itemsSplit[0];
                            itemWidth = sampwidth / incno;
                        }
                        if (bodyWidth <= 500) {
                            $(".row-resize-item").css({'padding' : '0px 0px'});
                        } else {
                            $(".row-resize-item").css({'padding' : '0px 8vh'});
                        }
                        $(this).css({ 'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers });
                        $(this).find(itemClass).each(function () {
                            $(this).outerWidth(itemWidth);
                        });

                        $(".leftLst").addClass("over");
                        $(".rightLst").removeClass("over");

                    });
                }
                function ResCarousel(e, el, s) {
                    var leftBtn = ('.leftLst');
                    var rightBtn = ('.rightLst');
                    var translateXval = '';
                    var divStyle = $(el + ' ' + itemsDiv).css('transform');
                    var values = divStyle.match(/-?[\d\.]+/g);
                    var xds = Math.abs(values[4]);
                    if (e == 0) {
                        translateXval = parseInt(xds) - parseInt(itemWidth * s);
                        $(el + ' ' + rightBtn).removeClass("over");

                        if (translateXval <= itemWidth / 2) {
                            translateXval = 0;
                            $(el + ' ' + leftBtn).addClass("over");
                        }
                    }
                    else if (e == 1) {
                        var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
                        translateXval = parseInt(xds) + parseInt(itemWidth * s);
                        $(el + ' ' + leftBtn).removeClass("over");

                        if (translateXval >= itemsCondition - itemWidth / 2) {
                            translateXval = itemsCondition;
                            $(el + ' ' + rightBtn).addClass("over");
                        }
                    }
                    $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
                }
                function click(ell, ee) {
                    var Parent = "#" + $(ee).parent().attr("id");
                    var slide = $(Parent).attr("data-slide");
                    ResCarousel(ell, Parent, slide);
                }
            });
        </script>
    </body>
</html>
