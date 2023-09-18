<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Obsido - Profil Pengguna</title>
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
                box-shadow: 0px 0px 10px -6px #000000;
            }
            .card-menu.active {
                background: #e8e8e8;
            }
            .card-menu, .card-menu label{
                cursor: pointer;
            }
            .card-menu, .card-item{
                border: 1px solid #e8e8e8;
            }

            .card-item .form-group, .card-menu{
                font-size: 13px;
            }
            input.form-control{
                height: 38px;
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
            <?php $this->load->view("other/header_landing"); ?>
            <div id="main" class="main">
                <div class="home mt-3">
                    <div class="container">
                        <div class="row row-resize-item">
                            <div class="container-fluid" id="grad1">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <h1 class="bold">Profil Pengguna</h1>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card p-3 mt-3 shadow card-menu active" data-id="1">
                                            <label class="bold mb-2">Data Pribadi</label>
                                            <label>Detil tentang personal informasi kamu</label>
                                        </div>
                                        <div class="card p-3 mt-3 shadow card-menu" data-id="2">
                                            <label class="bold mb-2">Pengaturan</label>
                                            <label>Kamu dapat mengatur data personal dan mengubah nya</label>
                                        </div>
                                        <div class="card p-3 mt-3 shadow card-menu" data-id="3">
                                            <label class="bold mb-2">Bantuan</label>
                                            <label>Kamu dapat mengubungi kami</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 p-4" style="padding-top: 0px !important;">
                                        <div class="p-1 mt-3 shadow card-item row">
                                            <div class="col p-0" style="max-width: 100px;"><img src="<?php echo base_url("assets/images/profile.png"); ?>" style="border-radius: 100px;"></div>
                                            <div class="col pt-3">
                                                <label class="bold" style="font-size: 20px;"><?php echo $this->session->userdata("user")->nama; ?></label><br>
                                                <label class="mt-2" style="font-size: 18px;">Investor</label>
                                            </div>
                                            <?php if($this->session->userdata("user")->status_verify == 1) { ?>
                                                <div class="col pb-3" style="width: 170px; min-width: 170px; max-width: 170px; padding-top: 31px;">
                                                    <a style="cursor: default; border: 2px solid #0084ff; color: #0084ff !important; font-weight: 600;" readlonly class="btn btn-outline-dark bg-white text-dark readlonly"><i class="las la-check-circle"></i> Terverifikasi</a>
                                                </div>
                                            <?php } ?>
                                            <?php if($this->session->userdata("user")->status_verify == 0 && $this->session->userdata("user")->status_verify_send == 0) { ?>
                                                <div class="col pb-3" style="width: 135px; min-width: 135px; max-width: 135px; padding-top: 31px;">
                                                    <a href="<?php echo base_url("user/verifikasi.html") ?>" class="btn btn-primary readlonly text-white" style="border-radius: 8px; padding: 7px 20px; font-weight: 600; font-size: 15px;">Verifikasi</a>
                                                </div>
                                            <?php } ?>
                                            <?php if($this->session->userdata("user")->status_verify == 0 && $this->session->userdata("user")->status_verify_send == 1) { ?>
                                                <div class="col pb-3" style="width: 225px; min-width: 225px; max-width: 225px; padding-top: 31px;">
                                                    <a style="cursor: default; border: 2px solid #ffc107; color: #ffc107 !important; font-weight: 600;" readlonly class="btn btn-outline-warning bg-white text-warning readlonly"><i class="lar la-clock"></i> Belum Diverifikasi</a>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="pt-3 pb-3 mt-3 shadow card-item card-item-content row div-content-id-1">
                                            <div class="col-12">
                                                <label class="bold" style="font-size: 18px;">Data Pribadi</label>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group mt-4">
                                                    <label class="bold mb-2">Nama Lengkap</label><br>
                                                    <label><?php echo $this->session->userdata("user")->nama; ?></label>
                                                </div>
                                                <div class="form-group mt-4">
                                                    <label class="bold mb-2">Email</label><br>
                                                    <label><?php echo $this->session->userdata("user")->email; ?></label>
                                                </div>
                                                <div class="form-group mt-4">
                                                    <label class="bold mb-2">Nomor Telepon</label><br>
                                                    <label><?php echo $this->session->userdata("user")->no_hp; ?></label>
                                                </div>
                                                <div class="form-group mt-4">
                                                    <label class="bold mb-2">Kartu Tanda Penduduk (KTP)</label><br>
                                                    <label><?php echo $this->session->userdata("user")->nik; ?></label>
                                                </div>
                                                <div class="form-group mt-4">
                                                    <label class="bold mb-2">Nomor Pokok Wajib Pajak (NPWP)</label><br>
                                                    <label><?php echo $this->session->userdata("user")->npwp; ?></label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group mt-4">
                                                    <label class="bold mb-2">Tanggal Lahir</label><br>
                                                    <label>
                                                    <?php 
                                                        if($this->session->userdata("user")->tgl_lahir == "" || $this->session->userdata("user")->tgl_lahir == null){

                                                        } else {
                                                            echo date("d M Y", strtotime($this->session->userdata("user")->tgl_lahir));
                                                        }
                                                    ?>    
                                                    </label>
                                                </div>
                                                <div class="form-group mt-4">
                                                    <label class="bold mb-2">Jenis Kelamin</label><br>
                                                    <label><?php echo $this->session->userdata("user")->jenis_kelamin; ?></label>
                                                </div>
                                                <div class="form-group mt-4">
                                                    <label class="bold mb-2">Pekerjaan</label><br>
                                                    <label><?php echo $this->session->userdata("user")->pekerjaan; ?></label>
                                                </div>
                                                <div class="form-group mt-4">
                                                    <label class="bold mb-2">Status Perkawinan</label><br>
                                                    <label><?php echo $this->session->userdata("user")->status_perkawinan; ?></label>
                                                </div>
                                                <div class="form-group mt-4">
                                                    <label class="bold mb-2">Pendapatan Pertahun</label><br>
                                                    <label><?php echo $this->foglobal->rupiah($this->session->userdata("user")->penghasilan_per_tahun); ?></label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group mt-4">
                                                    <label class="bold mb-2">Sumber Penghasilan</label><br>
                                                    <label><?php echo $this->session->userdata("user")->sumber_penghasilan; ?></label>
                                                </div>
                                                <div class="form-group mt-4">
                                                    <label class="bold mb-2">Provinsi</label><br>
                                                    <label><?php echo $this->session->userdata("user")->nama_provinsi; ?></label>
                                                </div>
                                                <div class="form-group mt-4">
                                                    <label class="bold mb-2">Kota/Kabupaten</label><br>
                                                    <label><?php echo $this->session->userdata("user")->nama_kota; ?></label>
                                                </div>
                                                <div class="form-group mt-4">
                                                    <label class="bold mb-2">Kecamatan</label><br>
                                                    <label><?php echo $this->session->userdata("user")->nama_kecamatan; ?></label>
                                                </div>
                                                <div class="form-group mt-4">
                                                    <label class="bold mb-2">Kelurahan</label><br>
                                                    <label><?php echo $this->session->userdata("user")->kelurahan; ?></label>
                                                </div>
                                                <div class="form-group mt-4">
                                                    <label class="bold mb-2">Alamat</label><br>
                                                    <label><?php echo $this->session->userdata("user")->alamat_lengkap; ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pt-3 pb-3 mt-3 shadow card-item card-item-content row div-content-id-2 d-none">
                                            <div class="col-12">
                                                <label class="bold" style="font-size: 18px;">Pengaturan</label>
                                            </div>
                                            <div class="col-12 mt-3">
                                                <div id="accordion">
                                                    <div class="card">
                                                        <div class="card-header p-1" id="heading1">
                                                            <h5 class="mb-0">
                                                                <a class="btn btn-link bold collapsed" data-toggle="collapse" data-target="#collapse_ubah_email" aria-expanded="true" aria-controls="collapse_ubah_email">
                                                                    Ubah Email
                                                                </a>
                                                            </h5>
                                                        </div>
                                                        <div id="collapse_ubah_email" class="collapse" aria-labelledby="heading1" data-parent="#accordion">
                                                            <div class="card-body">
                                                                <form id="FrmUbahEmail" class="form-horizontal" role="form" method="POST" action="/pemodal/ajax_pemodal">
                                                                    <div class="form-group row">
                                                                        <label class="control-label col-sm-3 bold mt-2 mb-2" style="font-size: 16px;">Email Lama</label>
                                                                        <div class="col-sm-9">
                                                                            <input required type="email" class="form-control" placeholder="Email Lama" name="form[email_lama]" maxlength="50">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="control-label col-sm-3 bold mt-2 mb-2" style="font-size: 16px;">Email Baru</label>
                                                                        <div class="col-sm-9">
                                                                            <input required type="email" class="form-control" placeholder="Email Baru" name="form[email_baru]" maxlength="50">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <div class="col-sm-9 offset-sm-3">
                                                                            <button type="submit" class="btn btn-primary ladda-button ladda-button-submit bold" data-style="slide-up">Simpan Perubahan</button>
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" name="form[id]" value="<?php echo $this->session->userdata("user")->id; ?>">
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card mt-2">
                                                        <div class="card-header p-1" id="heading2">
                                                            <h5 class="mb-0">
                                                                <a class="btn btn-link bold collapsed" data-toggle="collapse" data-target="#collapse_ubah_kata_sandi" aria-expanded="false" aria-controls="collapse_ubah_kata_sandi">
                                                                    Ubah Kata Sandi
                                                                </a>
                                                            </h5>
                                                        </div>
                                                        <div id="collapse_ubah_kata_sandi" class="collapse" aria-labelledby="heading2" data-parent="#accordion">
                                                            <div class="card-body">
                                                                <form id="FrmUbahKataSandi" class="form-horizontal" role="form" method="POST" action="/pemodal/ajax_pemodal">
                                                                    <div class="form-group row">
                                                                        <label class="control-label col-sm-3 bold mt-2 mb-2" style="font-size: 16px;">Kata Sandi Lama</label>
                                                                        <div class="col-sm-9">
                                                                            <input required type="password" class="form-control" placeholder="Kata Sandi Lama" name="form[kata_sandi_lama]" maxlength="30">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="control-label col-sm-3 bold mt-2 mb-2" style="font-size: 16px;">Kata Sandi Baru</label>
                                                                        <div class="col-sm-9">
                                                                            <input required type="password" class="form-control" placeholder="Kata Sandi Baru" name="form[kata_sandi_baru]" maxlength="30">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="control-label col-sm-3 bold mt-2 mb-2" style="font-size: 16px;">Konfrimasi Kata Sandi Baru</label>
                                                                        <div class="col-sm-9">
                                                                            <input required type="password" class="form-control" placeholder="Konfrimasi Kata Sandi Baru" name="form[kata_sandi_baru2]" maxlength="30">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <div class="col-sm-9 offset-sm-3">
                                                                            <button type="submit" class="btn btn-primary ladda-button ladda-button-submit bold" data-style="slide-up">Simpan Perubahan</button>
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" name="form[id]" value="<?php echo $this->session->userdata("user")->id; ?>">
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card mt-2">
                                                        <div class="card-header p-1">
                                                            <h5 class="mb-0">
                                                                <a class="btn btn-link bold btn-edit-pin">
                                                                    Ubah PIN
                                                                </a>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                    <div class="card mt-2">
                                                        <div class="card-header p-1" id="heading3">
                                                            <h5 class="mb-0">
                                                                <a class="btn btn-link bold collapsed" data-toggle="collapse" data-target="#collapse_ubah_no_telfon" aria-expanded="false" aria-controls="collapse_ubah_no_telfon">
                                                                    Ubah Nomor Telepon
                                                                </a>
                                                            </h5>
                                                        </div>
                                                        <div id="collapse_ubah_no_telfon" class="collapse" aria-labelledby="heading3" data-parent="#accordion">
                                                            <div class="card-body">
                                                                <form id="FrmUbahNoTelepon" class="form-horizontal" role="form" method="POST" action="/pemodal/ajax_pemodal">
                                                                    <div class="form-group row">
                                                                        <label class="control-label col-sm-3 bold mt-2 mb-2" style="font-size: 16px;">Nomor Telepon Lama</label>
                                                                        <div class="col-sm-9">
                                                                            <input required type="text" class="form-control" placeholder="Nomor Telepon Lama" name="form[no_telfon_lama]" maxlength="15">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="control-label col-sm-3 bold mt-2 mb-2" style="font-size: 16px;">Nomor Telepon Baru</label>
                                                                        <div class="col-sm-9">
                                                                            <input required type="text" class="form-control" placeholder="Nomor Telepon Baru" name="form[no_telfon_baru]" maxlength="15">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <div class="col-sm-9 offset-sm-3">
                                                                            <button type="submit" class="btn btn-primary ladda-button ladda-button-submit bold" data-style="slide-up">Simpan Perubahan</button>
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" name="form[id]" value="<?php echo $this->session->userdata("user")->id; ?>">
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card mt-2">
                                                        <div class="card-header p-1">
                                                            <h5 class="mb-0">
                                                                <a class="btn btn-link bold btn-edit-data-diri">
                                                                    Ubah Data Pribadi
                                                                </a>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pt-3 pb-3 mt-3 shadow card-item card-item-content row div-content-id-3 d-none">
                                            <div class="col-12">
                                                <label class="bold" style="font-size: 18px;">Bantuan</label>
                                            </div>
                                            <div class="col-12 mt-3">
                                                <div>
                                                    <div class="card mt-2">
                                                        <div class="card-header p-1">
                                                            <h5 class="mb-0">
                                                                <div class="row">
                                                                    <a target="_blank" href="https://api.whatsapp.com/send?phone=6281917264211" class="btn btn-link col pl-3 pr-3 ml-2 text-center text-dark" style="min-width: 60px; max-width: 60px;">
                                                                        <i class="fab fa-whatsapp" style="font-size: 40px;"></i>
                                                                    </a>
                                                                    <div class="col" style="margin-top: 13px;">
                                                                        <a class="text-dark" target="_blank" href="https://api.whatsapp.com/send?phone=6281917264211">
                                                                            <label style="cursor: pointer;" class="bold"> Whatsapp</label><br>
                                                                            <label style="cursor: pointer;"> 081917264211</label>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                    <div class="card mt-2">
                                                        <div class="card-header p-1">
                                                            <h5 class="mb-0">
                                                                <div class="row">
                                                                    <a target="_blank" href="mailto:izulluzi@yahoo.com" class="btn btn-link col pl-3 pr-3 ml-2 text-center text-dark" style="min-width: 60px; max-width: 60px;">
                                                                        <i class="las la-envelope" style="font-size: 40px;"></i>
                                                                    </a>
                                                                    <div class="col" style="margin-top: 13px;">
                                                                        <a class="text-dark" target="_blank" href="mailto:izulluzi@yahoo.com">
                                                                            <label style="cursor: pointer;" class="bold"> Email</label><br>
                                                                            <label style="cursor: pointer;"> izulluzi@yahoo.com</label>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </h5>
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
                </div>
                <?php $this->load->view("other/footer"); ?>
            </div>
        </div>
        <?php $this->load->view("pemodal/modal/data_diri_edit"); ?>
        <?php $this->load->view("pemodal/modal/pin_edit"); ?>
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
        <script type="text/javascript" src="<?php echo base_url("assets/plugins/webcamjs/webcam.min.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/proses.js?n=").$this->config->item("tahun_assets"); ?>"></script>
        <script>
            $(".select2.dropdown-kota").select2({
                disabled: true,
                placeholder: "Pilih Provinsi terlebih dahulu",
            }).val("").trigger("change");
            $(".select2.dropdown-kecamatan").select2({
                disabled: true,
                placeholder: "Pilih Kota/Kabupaten terlebih dahulu",
            }).val("").trigger("change");
            $(".dropdown-provinsi").on("select2:select", function(e) {
                if($(this).val()==""){
                    $(".select2.dropdown-kota").select2({
                        disabled: true,
                        placeholder: "Pilih Provinsi terlebih dahulu",
                    }).val("").trigger("change");
                    $(".select2.dropdown-kecamatan").select2({
                        disabled: true,
                        placeholder: "Pilih Kota/Kabupaten terlebih dahulu",
                    }).val("").trigger("change");
                } else {
                    $(".select2.dropdown-kota").select2({
                        disabled: true,
                        placeholder: "Loading...",
                    }).val("").trigger("change");
                    GetDropdownKota("", $(this).val(),"");
                }
                $(".select2.dropdown-kecamatan").select2({
                    disabled: true,
                    placeholder: "Pilih Kota/Kabupaten terlebih dahulu",
                }).val("").trigger("change");
            });
            $(".dropdown-kota").on("select2:select", function(e) {
                if($(this).val()==""){
                    $(".select2.dropdown-kecamatan").select2({
                        disabled: true,
                        placeholder: "Pilih Kota/Kabupaten terlebih dahulu",
                    }).val("").trigger("change");
                } else {
                    $(".select2.dropdown-kecamatan").select2({
                        disabled: true,
                        placeholder: "Loading...",
                    }).val("").trigger("change");
                    GetDropdownKecamatan("", $(this).val(),"");
                }
                $(".select2.dropdown-kecamatan").select2({
                    disabled: true,
                    placeholder: "Pilih Kota/Kabupaten terlebih dahulu",
                }).val("").trigger("change");
            });


            $(".penghasilan-per-tahun").focus(function(){
                var penghasilan_per_tahun = $(this).val().replace(/\./g,"");
                $(this).val(penghasilan_per_tahun);
            }).blur(function(){
                if($(this).val() <= 0){
                    $(this).val("0");
                }
                if($.isNumeric($(this).val()) == false){
                    $(this).val("0");
                } else {
                    $(this).val(rupiah(parseFloat($(this).val())));
                }
            });


            $(".card-menu").click(function(){
                var data_id = $(this).attr("data-id");
                $(".card-item-content").addClass("d-none");
                $(".div-content-id-"+data_id).removeClass("d-none");
                $(".card-menu").removeClass("active");
                $(this).addClass("active");

                if(data_id == 4){
                    window.location.href = base_url + "/daftar_keinginan.html";
                }
            });

            var data_diri_edit = $("#modal-edit-data-diri");
            var pin_edit_data = $("#modal-edit-data-pin");
            // const input_value = $(".pin #password");
            $(".btn-edit-data-diri").click(function(){
                data_diri_edit.find(".loading-gif-image").removeClass("d-none");
                data_diri_edit.find(".after-loading").addClass("d-none");
                $("#modal-edit-data-diri").modal("show");
                id_update = "<?php echo $this->session->userdata("user")->id; ?>";
                data_diri_edit.find(".id_hidden").val(id_update);
                pagename = "/pemodal/ajax_pemodal";
                GetDataById(id_update, function(resp) {
                    var resp = resp.data[0];
                    data_diri_edit.find("input[name='form[kelurahan]']").val(resp.kelurahan);
                    data_diri_edit.find("input[name='form[penghasilan_per_tahun]']").val(rupiah(resp.penghasilan_per_tahun));
                    // data_diri_edit.find("input[name='form[nomor_rekening_bank]']").val(resp.nomor_rekening_bank);
                    // data_diri_edit.find("input[name='form[nama_pemilik_rekening_bank]']").val(resp.nama_pemilik_rekening_bank);
                    // data_diri_edit.find("input[name='form[nama_cabang_bank]']").val(resp.nama_cabang_bank);
                    data_diri_edit.find("textarea[name='form[alamat_lengkap]']").val(resp.alamat_lengkap);
                    data_diri_edit.find("select[name='form[status_perkawinan]']").val(resp.status_perkawinan).trigger("change");
                    data_diri_edit.find("select[name='form[pekerjaan]']").val(resp.pekerjaan).trigger("change");
                    data_diri_edit.find("select[name='form[sumber_penghasilan]']").val(resp.sumber_penghasilan).trigger("change");
                    // data_diri_edit.find("select[name='form[nama_bank]']").val(resp.nama_bank).trigger("change");
                    if(resp.id_provinsi == 0 || resp.id_provinsi == null || resp.id_provinsi == ""){
                        GetDropdownProvinsi();
                    } else {
                        GetDropdownProvinsi(resp.id_provinsi);
                        if(resp.id_kota == 0 || resp.id_kota == null || resp.id_kota == ""){
                            $(".select2.dropdown-kota").select2({
                                disabled: true,
                                placeholder: "Pilih Provinsi terlebih dahulu",
                            }).val("").trigger("change");
                        } else {
                            GetDropdownKota(resp.id_kota, resp.id_provinsi);
                            if(resp.id_kota == 0 || resp.id_kota == null || resp.id_kota == ""){
                                $(".select2.dropdown-kecamatan").select2({
                                    disabled: true,
                                    placeholder: "Pilih Kota/Kabupaten terlebih dahulu",
                                }).val("").trigger("change");
                            } else {
                                GetDropdownKecamatan(resp.id_kecamatan, resp.id_kota);
                            }
                        }
                    }
                    data_diri_edit.find(".loading-gif-image").addClass("d-none");
                    data_diri_edit.find(".after-loading").removeClass("d-none");
                    data_diri_edit.find("select[name='form[status_perkawinan]']").focus();
                });
            });

            $(".btn-edit-pin").click(function(){
                pin_edit_data.find("#password-show").val("");
                pin_edit_data.find(".loading-gif-image").removeClass("d-none");
                pin_edit_data.find(".after-loading").addClass("d-none");
                pin_edit_data.find(".btn-ulang-pin").addClass("d-none");
                input_value.val("");
                pin_edit_data.find(".pin .text-pin").text("Masukkan PIN Anda");
                pin_edit_data.find(".pin #enter").addClass("d-none");
                pin_user = "";
                verifikasi_pin_1 = "";
                verifikasi_pin_2 = "";
                $("#modal-edit-data-pin").modal("show");
            });

            function SimpanEditDataDiri(){
                $("#FrmEditDataDiri").submit();
            }

            var FrmUbahEmail = $("#FrmUbahEmail").validate({
                submitHandler: function(form) {
                    laddasubmit = $("#FrmUbahEmail").find(".ladda-button-submit").ladda();
                    UpdateData(form, function(resp) {
                        setTimeout(function(){
                            location.reload();
                        }, 1000);
                    });
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
            var FrmUbahKataSandi = $("#FrmUbahKataSandi").validate({
                submitHandler: function(form) {
                    laddasubmit = $("#FrmUbahKataSandi").find(".ladda-button-submit").ladda();
                    UpdateData(form, function(resp) {
                        setTimeout(function(){
                            location.reload();
                        }, 1000);
                    });
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
            var FrmUbahNoTelepon = $("#FrmUbahNoTelepon").validate({
                submitHandler: function(form) {
                    laddasubmit = $("#FrmUbahNoTelepon").find(".ladda-button-submit").ladda();
                    UpdateData(form, function(resp) {
                        setTimeout(function(){
                            location.reload();
                        }, 1000);
                    });
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
            var FrmEditDataDiri = $("#FrmEditDataDiri").validate({
                submitHandler: function(form) {
                    laddasubmit = $("#modal-edit-data-diri").find(".ladda-button-submit").ladda();
                    UpdateData(form, function(resp) {
                        setTimeout(function(){
                            location.reload();
                        }, 1000);
                    });
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
        <script>
            var pin_user = "";
            var verifikasi_pin_1 = "";
            var verifikasi_pin_2 = "";
            pin_edit_data.find(".pin #enter").addClass("d-none");
            $(document).ready(function() {
                pin_edit_data.find(".pin #password, .pin #password-show").focus(function() {
                    $(this).blur();
                });
                pin_edit_data.find(".pin .calc").click(function() {
                    let value = $(this).val();
                    field(value);
                });
                function field(value) {
                    console.log((input_value.val() + value).length);
                    if((input_value.val() + value).length >= 6){
                        pin_edit_data.find(".pin #enter").removeClass("d-none");
                    } else {
                        pin_edit_data.find(".pin #enter").addClass("d-none");
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
                    pin_edit_data.find("#password-show").val(total_input);
                }
                pin_edit_data.find(".pin #clear").click(function() {
                    if(verifikasi_pin_1 == ""){
                        input_value.val("");
                        pin_edit_data.find(".pin #enter").addClass("d-none");
                        verifikasi_pin_1 = "";
                    } else {
                        input_value.val("");
                        pin_edit_data.find(".pin #enter").addClass("d-none");
                        verifikasi_pin_2 = "";
                    }
                    pin_edit_data.find("#password-show").val("");
                });
                pin_edit_data.find(".pin #enter").click(function() {
                    if(pin_user == ""){
                        if(input_value.val() != "<?php echo $this->session->userdata("user")->pin; ?>"){
                            toastrshow("warning", "Masukkan PIN dengan benar!", "Warning");
                        } else {
                            pin_user = input_value.val();
                            input_value.val("");
                            pin_edit_data.find("#password-show").val("");
                            pin_edit_data.find(".pin .text-pin").text("Masukkan PIN Baru");
                            pin_edit_data.find(".pin #enter").addClass("d-none");
                            pin_edit_data.find(".btn-ulang-pin").removeClass("d-none");
                        }
                    } else {
                        if(verifikasi_pin_1 == ""){
                            verifikasi_pin_1 = input_value.val();
                            input_value.val("");
                            pin_edit_data.find("#password-show").val("");
                            pin_edit_data.find(".pin .text-pin").text("Masukkan Ulang PIN Baru");
                            pin_edit_data.find(".pin #enter").addClass("d-none");
                            pin_edit_data.find(".btn-ulang-pin").removeClass("d-none");
                        } else {
                            verifikasi_pin_2 = input_value.val();
                            if(verifikasi_pin_1 != verifikasi_pin_2){
                                toastrshow("warning", "Masukkan PIN Verifikasi dengan benar!", "Warning");
                            } else {
                                $.ajax({
                                    type: "POST",
                                    url: base_url + "/user/ajax_user",
                                    data: {act:"new_pin", req:verifikasi_pin_1},
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
                                                location.reload();
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
                    }
                });
                pin_edit_data.find(".btn-ulang-pin").click(function(){
                    pin_edit_data.find(".btn-ulang-pin").addClass("d-none");
                    input_value.val("");
                    pin_edit_data.find("#password-show").val("");
                    pin_edit_data.find(".pin .text-pin").text("Masukkan PIN Anda");
                    pin_edit_data.find("#pas #enter").addClass("d-none");
                    pin_user = "";
                    verifikasi_pin_1 = "";
                    verifikasi_pin_2 = "";
                });
            });



            /*var _gaq = _gaq || [];
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
            }*/
        </script>
    </body>
</html>