<?php
    $userlogin = $this->session->userdata("user");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Obsido - Verifikasi</title>
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
            .file-upload {
              background-color: #ffffff;
              width: 300px;
              margin: 0 auto;
              padding: 20px;
            }

            .file-upload-btn {
              width: 100%;
              margin: 0;
              color: #fff;
              background: #2B8FED;
              border: none;
              padding: 10px;
              border-radius: 4px;
              border-bottom: 4px solid #0084FF;
              transition: all .2s ease;
              outline: none;
              text-transform: uppercase;
              font-weight: 700;
            }

            .file-upload-btn:hover {
              background: #0084FF;
              color: #ffffff;
              transition: all .2s ease;
              cursor: pointer;
            }

            .file-upload-btn:active {
              border: 0;
              transition: all .2s ease;
            }

            .file-upload-content {
              display: none;
              text-align: center;
            }

            .file-upload-input {
              position: absolute;
              margin: 0;
              padding: 0;
              width: 100%;
              height: 100%;
              outline: none;
              opacity: 0;
              cursor: pointer;
            }

            .image-upload-wrap {
              margin-top: 20px;
              border: 4px dashed #2B8FED;
              position: relative;
            }

            .image-dropping,
            .image-upload-wrap:hover {
              background-color: #c4e2ff;
              border: 4px dashed #ffffff;
            }

            .image-title-wrap {
              padding: 0 15px 15px 15px;
              color: #222;
            }

            .drag-text {
              text-align: center;
            }

            .drag-text h3 {
              font-weight: 100;
              text-transform: uppercase;
              color: #0084FF;
              padding: 60px 0;
            }

            .file-upload-image {
              max-height: 200px;
              max-width: 200px;
              margin: auto;
              padding: 20px;
            }

            .remove-image {
              width: 200px;
              margin: 0;
              color: #fff;
              background: #cd4535;
              border: none;
              padding: 10px;
              border-radius: 4px;
              border-bottom: 4px solid #b02818;
              transition: all .2s ease;
              outline: none;
              text-transform: uppercase;
              font-weight: 700;
            }

            .remove-image:hover {
              background: #c13b2a;
              color: #ffffff;
              transition: all .2s ease;
              cursor: pointer;
            }

            .remove-image:active {
              border: 0;
              transition: all .2s ease;
            }

            #grad1 {
                background-color: : #9C27B0;
                background-image: none;
            }

            #msform {
                text-align: center;
                position: relative;
                margin-top: 20px
            }

            #msform fieldset .form-card {
                background: white;
                border: 0 none;
                border-radius: 0px;
                padding: 20px 40px 30px 40px;
                box-sizing: border-box;
                width: 94%;
                margin: 0 3% 20px 3%;
                position: relative
            }

            #msform fieldset {
                background: white;
                border: 0 none;
                border-radius: 0.5rem;
                box-sizing: border-box;
                width: 100%;
                margin: 0;
                padding-bottom: 20px;
                position: relative
            }

            #msform fieldset:not(:first-of-type) {
                display: none
            }

            #msform fieldset .form-card {
                text-align: left;
                color: #9E9E9E
            }
            .card {
                z-index: 0;
                border: none;
                border-radius: 0.5rem;
                position: relative
            }

            .fs-title {
                font-size: 25px;
                color: #2C3E50;
                margin-bottom: 10px;
                font-weight: bold;
                text-align: left
            }

            #progressbar {
                margin-bottom: 30px;
                overflow: hidden;
                color: lightgrey
            }

            #progressbar .active {
                color: #000000
            }

            #progressbar li {
                list-style-type: none;
                font-size: 12px;
                width: 14.28%;
                float: left;
                position: relative
            }

            #progressbar #personal_information:before {
                font-family: "Font Awesome 5 Free";
                content: "\f007"
            }

            #progressbar #data_bank:before {
                font-family: "Font Awesome 5 Free";
                content: "\f007"
            }

            #progressbar #foto_ktp:before {
                font-family: "Font Awesome 5 Free";
                content: "\f007"
            }

            #progressbar #selfie_ktp:before {
                font-family: "Font Awesome 5 Free";
                content: "\f007"
            }

            #progressbar #foto_npwp:before {
                font-family: "Font Awesome 5 Free";
                content: "\f007"
            }

            #progressbar #selfie_npwp:before {
                font-family: "Font Awesome 5 Free";
                content: "\f007"
            }

            #progressbar #upload_data:before {
                font-family: "Font Awesome 5 Free";
                content: "\f09d"
            }

            #progressbar li:before {
                width: 50px;
                height: 50px;
                line-height: 45px;
                display: block;
                font-size: 18px;
                color: #ffffff;
                background: lightgray;
                border-radius: 50%;
                margin: 0 auto 10px auto;
                padding: 2px
            }

            #progressbar li:after {
                content: '';
                width: 100%;
                height: 2px;
                background: lightgray;
                position: absolute;
                left: 0;
                top: 25px;
                z-index: -1
            }

            #progressbar li.active:before,
            #progressbar li.active:after {
                background: skyblue
            }

            .radio-group {
                position: relative;
                margin-bottom: 25px
            }

            .radio {
                display: inline-block;
                width: 204;
                height: 104;
                border-radius: 0;
                background: lightblue;
                box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
                box-sizing: border-box;
                cursor: pointer;
                margin: 8px 2px
            }

            .radio:hover {
                box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3)
            }

            .radio.selected {
                box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1)
            }

            .fit-image {
                width: 100%;
                object-fit: cover
            }
            .shadow{
                -webkit-box-shadow: 0px 0px 15px -2px #000000; 
                box-shadow: 0px 0px 15px -2px #000000;
            }
            input.form-control{
                height: 38px;
            }

            .btn-switch-camera{
                display: none;
            }
            @media only screen and (max-width: 550px) {
                #capture_foto_ktp, #capture_foto_ktp_selfie, #results_foto_ktp, #results_foto_ktp_selfie, #capture_foto_npwp, #capture_foto_npwp_selfie, #results_foto_npwp, #results_foto_npwp_selfie{
                    transform: scale(0.5);
                    height: 140vw !important;
                    width: 105vw !important;
                    margin-left: -18vw;
                    margin-top: -30vw;
                    margin-bottom: -30vw;
                }
                #capture_foto_ktp video, #capture_foto_ktp_selfie video, #capture_foto_npwp video, #capture_foto_npwp_selfie video{
                    height: 140vw !important;
                    width: 105vw !important;
                }
                .form-card{
                    padding-left: 10px !important;
                    padding-right: 10px !important;
                }
                .btn-switch-camera{
                    width: 42px;
                    display: block;
                }
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
                            <!-- MultiStep Form -->
                            <div class="container-fluid" id="grad1">
                                <div class="row justify-content-center mt-0">
                                    <div class="col-12 text-center p-3 mt-3 mb-2">
                                        <div class="card px-0 pt-4 pb-0 mt-3 mb-3 shadow">
                                            <h1 class="bold">Verifikasi Identitas</h1>
                                            <p style="max-width: 735px; margin: 0px auto; padding: 0px 10px;">Sesuai dengan peraturan & ketentuan OJK, kami membutuhkan identitas pribadi Anda<br>Kami menjamin data dan identitas anda tidak akan kami sebarluaskan</p>
                                            <div class="row ml-0 mr-0">
                                                <div class="col-md-12 mx-0">
                                                    <form id="msform" class="font-default form-pemodal" method="POST" action="/pemodal/ajax_pemodal">
                                                        <ul id="progressbar" class="d-none d-md-block">
                                                            <li class="active" id="personal_information"><strong>Personal Information</strong></li>
                                                            <li id="data_bank"><strong>Data Bank</strong></li>
                                                            <li id="foto_ktp"><strong>Foto KTP</strong></li>
                                                            <li id="selfie_ktp"><strong>Foto Selfie KTP</strong></li>
                                                            <li id="foto_npwp"><strong>Foto NPWP</strong></li>
                                                            <li id="selfie_npwp"><strong>Foto Selfie NPWP</strong></li>
                                                            <li id="upload_data"><strong>Upload Data</strong></li>
                                                        </ul>
                                                        <fieldset>
                                                            <div class="form-card fieldset-1">
                                                                <h2 class="fs-title mb-3">Personal Information</h2>
                                                                <div class="row">
                                                                    <div class="col-xl-4 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label class="form-control-label <?php if($userlogin->status_verify == 2 && isset($pemodal[0]->nama_lengkap) && $pemodal[0]->nama_lengkap == 0){ echo 'text-danger'; } else { echo 'text-dark'; } ?>">Nama Lengkap</label>
                                                                            <input type="text" class="form-control input-uppercase" placeholder="Nama Lengkap (Sesuai KTP)" maxlength="100" name="form[nama]" value="<?php echo $userlogin->nama ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="form-control-label <?php if($userlogin->status_verify == 2 && isset($pemodal[0]->data_nik) && $pemodal[0]->data_nik == 0){ echo 'text-danger'; } else { echo 'text-dark'; } ?>">NIK</label>
                                                                            <input type="text" class="form-control" placeholder="NIK (Nomor Induk KTP)" maxlength="16" name="form[nik]" onkeypress="return validatedata(event);" value="<?php echo $userlogin->nik ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="form-control-label <?php if($userlogin->status_verify == 2 && isset($pemodal[0]->data_npwp) && $pemodal[0]->data_npwp == 0){ echo 'text-danger'; } else { echo 'text-dark'; } ?>">NPWP</label>
                                                                            <input type="text" class="form-control" placeholder="NPWP (Nomor Pokok Wajib Pajak)" maxlength="30" name="form[npwp]" value="<?php echo $userlogin->npwp ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="form-control-label <?php if($userlogin->status_verify == 2 && isset($pemodal[0]->tgl_lahir) && $pemodal[0]->tgl_lahir == 0){ echo 'text-danger'; } else { echo 'text-dark'; } ?>">Tanggal Lahir</label>
                                                                            <input type="text" class="form-control datepicker-tgl-lahir" placeholder="Tanggal Lahir" name="form[tgl_lahir]" value="<?php echo date("d M Y", strtotime($userlogin->tgl_lahir)) ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="form-control-label <?php if($userlogin->status_verify == 2 && isset($pemodal[0]->jenis_kelamin) && $pemodal[0]->jenis_kelamin == 0){ echo 'text-danger'; } else { echo 'text-dark'; } ?>">Jenis Kelamin</label>
                                                                            <select style="width: 100%;" class="form-control select" name="form[jenis_kelamin]">
                                                                                <option value="PRIA">PRIA</option>
                                                                                <option value="WANITA">WANITA</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-4 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label class="form-control-label <?php if($userlogin->status_verify == 2 && isset($pemodal[0]->status_pernikahan) && $pemodal[0]->status_pernikahan == 0){ echo 'text-danger'; } else { echo 'text-dark'; } ?>">Status Perkawinan</label>
                                                                            <select style="width: 100%;" class="form-control select" name="form[status_perkawinan]">
                                                                                <option value="BELUM KAWIN">BELUM KAWIN</option>
                                                                                <option value="KAWIN">KAWIN</option>
                                                                                <option value="CERAI HIDUP">CERAI HIDUP</option>
                                                                                <option value="CERAI MATI">CERAI MATI</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="form-control-label <?php if($userlogin->status_verify == 2 && isset($pemodal[0]->pekerjaan) && $pemodal[0]->pekerjaan == 0){ echo 'text-danger'; } else { echo 'text-dark'; } ?>">Pekerjaan</label>
                                                                            <select style="width: 100%;" class="form-control select" name="form[pekerjaan]">
                                                                                <option value="PELAJAR">PELAJAR</option> 
                                                                                <option value="PENGUSAHA">PENGUSAHA</option> 
                                                                                <option value="PEGAWAI SWASTA">PEGAWAI SWASTA</option> 
                                                                                <option value="PEGAWAI NEGERI SIPIL (PNS)">PEGAWAI NEGERI SIPIL (PNS)</option> 
                                                                                <option value="IBU RUMAH TANGGA">IBU RUMAH TANGGA</option> 
                                                                                <option value="LAINNYA">LAINNYA</option> 
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="form-control-label <?php if($userlogin->status_verify == 2 && isset($pemodal[0]->pendapatan_pertahun) && $pemodal[0]->pendapatan_pertahun == 0){ echo 'text-danger'; } else { echo 'text-dark'; } ?>">Penghasilan Per Tahun</label>
                                                                            <input type="text" class="form-control penghasilan-per-tahun" placeholder="Penghasilan Per Tahun" maxlength="19" name="form[penghasilan_per_tahun]" onkeypress="return validatedata(event);" value="<?php echo $this->foglobal->rupiah($userlogin->penghasilan_per_tahun) ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="form-control-label <?php if($userlogin->status_verify == 2 && isset($pemodal[0]->sumber_penghasilan) && $pemodal[0]->sumber_penghasilan == 0){ echo 'text-danger'; } else { echo 'text-dark'; } ?>">Sumber Penghasilan</label>
                                                                            <select style="width: 100%;" class="form-control select" name="form[sumber_penghasilan]">
                                                                                <option value="GAJI">GAJI</option>
                                                                                <option value="HASIL USAHA">HASIL USAHA</option>
                                                                                <option value="HASIL INVESTASI">HASIL INVESTASI</option>
                                                                                <option value="DARI SUAMI/ISTRI">DARI SUAMI/ISTRI</option>
                                                                                <option value="DARI ORANG TUA/ANAK">DARI ORANG TUA/ANAK</option>
                                                                                <option value="LAINNYA">LAINNYA</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="form-control-label <?php if($userlogin->status_verify == 2 && isset($pemodal[0]->alamat_lengkap) && $pemodal[0]->alamat_lengkap == 0){ echo 'text-danger'; } else { echo 'text-dark'; } ?>">Alamat Lengkap</label>
                                                                            <textarea type="text" class="form-control input-uppercase" placeholder="Alamat Lengkap" maxlength="255" name="form[alamat_lengkap]" style="padding-top: 5px !important;"><?php echo $userlogin->alamat_lengkap ?></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-4 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label class="form-control-label <?php if($userlogin->status_verify == 2 && isset($pemodal[0]->provinsi) && $pemodal[0]->provinsi == 0){ echo 'text-danger'; } else { echo 'text-dark'; } ?>">Provinsi</label>
                                                                            <select style="width: 100%;" class="form-control select2 dropdown-provinsi" name="form[id_provinsi]">
                                                                                <option value="">Pilih Provinsi</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="form-control-label <?php if($userlogin->status_verify == 2 && isset($pemodal[0]->kota) && $pemodal[0]->kota == 0){ echo 'text-danger'; } else { echo 'text-dark'; } ?>">Kota/Kabupaten</label>
                                                                            <select style="width: 100%;" class="form-control select2 dropdown-kota" name="form[id_kota]">
                                                                                <option value="">Pilih Kota</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="form-control-label <?php if($userlogin->status_verify == 2 && isset($pemodal[0]->kecamatan) && $pemodal[0]->kecamatan == 0){ echo 'text-danger'; } else { echo 'text-dark'; } ?>">Kecamatan</label>
                                                                            <select style="width: 100%;" class="form-control select2 dropdown-kecamatan" name="form[id_kecamatan]">
                                                                                <option value="">Pilih Kecamatan</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="form-control-label <?php if($userlogin->status_verify == 2 && isset($pemodal[0]->kelurahan) && $pemodal[0]->kelurahan == 0){ echo 'text-danger'; } else { echo 'text-dark'; } ?>">Kelurahan</label>
                                                                            <input type="text" class="form-control input-uppercase" placeholder="Kelurahan" maxlength="30" name="form[kelurahan]" value="<?php echo $userlogin->kelurahan ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a class="btn btn-primary bold next action-button text-white disabled" disabled>Lanjut</a>
                                                        </fieldset>
                                                        <fieldset>
                                                            <div class="form-card fieldset-2">
                                                                <h2 class="fs-title mb-3">Data Bank</h2>
                                                                <div class="row">
                                                                    <div class="col-xl-4 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label class="form-control-label text-dark">Nomor Rekening</label>
                                                                            <input type="text" class="form-control input-uppercase" placeholder="Nomor Rekening" maxlength="100" name="form[nomor_rekening_bank]" onkeypress="return validatedata(event);" value="<?php echo $userlogin->nomor_rekening_bank ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="form-control-label <?php if($userlogin->status_verify == 2 && isset($pemodal[0]->nama_pemilik_rekening) && $pemodal[0]->nama_pemilik_rekening == 0){ echo 'text-danger'; } else { echo 'text-dark'; } ?>">Nama Pemilik Rekening Bank</label>
                                                                            <input type="text" class="form-control input-uppercase" placeholder="Nama Pemilik Rekening Bank" maxlength="100" name="form[nama_pemilik_rekening_bank]" value="<?php echo $userlogin->nama_pemilik_rekening_bank ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="form-control-label <?php if($userlogin->status_verify == 2 && isset($pemodal[0]->nama_bank) && $pemodal[0]->nama_bank == 0){ echo 'text-danger'; } else { echo 'text-dark'; } ?>">Nama Bank</label>
                                                                            <select style="width: 100%;" class="form-control select" name="form[nama_bank]">
                                                                                <option value="BRI">BRI</option>
                                                                                <option value="MANDIRI">MANDIRI</option>
                                                                                <option value="BCA">BCA</option>
                                                                                <option value="BNI">BNI</option>
                                                                                <option value="BTN">BTN</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="form-control-label <?php if($userlogin->status_verify == 2 && isset($pemodal[0]->nama_cabang_bank) && $pemodal[0]->nama_cabang_bank == 0){ echo 'text-danger'; } else { echo 'text-dark'; } ?>">Nama Cabang Bank</label>
                                                                            <input type="text" class="form-control input-uppercase" placeholder="Nama Cabang Bank" maxlength="100" name="form[nama_cabang_bank]" value="<?php echo $userlogin->nama_cabang_bank ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 d-none d-xl-block offset-xl-2">
                                                                        <center>
                                                                            <img src="<?php echo base_url("assets/images/email_kyc_bank.png"); ?>" style="max-width: 320px;">
                                                                        </center>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a class="btn btn-default bold previous action-button-previous">Kembali</a>
                                                            <a class="btn btn-primary bold next action-button text-white disabled" disabled>Lanjut</a>
                                                        </fieldset>
                                                        <fieldset>
                                                            <div class="form-card fieldset-3">
                                                                <h2 class="fs-title mb-3 <?php if($userlogin->status_verify == 2 && isset($pemodal[0]->ktp) && $pemodal[0]->ktp == 0){ echo 'text-danger'; } else { echo 'text-dark'; } ?>">Foto KTP</h2>
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <center>
                                                                            <?php if($userlogin->status_verify == 2){ ?>
                                                                                <?php if($userlogin->foto_ktp == "" || $userlogin->foto_ktp == null){ ?>
                                                                                    <div id="capture_foto_ktp"></div>
                                                                                    <div id="results_foto_ktp" class="d-none"></div>
                                                                                    <a class="btn btn-secondary text-white m-1 btn-switch-camera" onClick="switch_camera_1()"><i class="fa fa-exchange-alt"></i></a>
                                                                                    <a class="btn btn-secondary text-white m-1 btn-capture-ktp" onClick="take_snapshot_ktp()">Ambil Foto</a>
                                                                                    <a class="btn btn-secondary text-white m-1 btn-recapture-ktp d-none">Ulangi</a>
                                                                                <?php } else { ?>
                                                                                    <div id="capture_foto_ktp" class="d-none"></div>
                                                                                    <div id="results_foto_ktp"><img style="width: 100%;" src="<?php echo $this->config->item("cdn_url")."/".$userlogin->foto_ktp; ?>"></div>
                                                                                    <a class="btn btn-secondary text-white m-1 btn-switch-camera d-none" onClick="switch_camera_1()"><i class="fa fa-exchange-alt"></i></a>
                                                                                    <a class="btn btn-secondary text-white m-1 btn-capture-ktp d-none" onClick="take_snapshot_ktp()">Ambil Foto</a>
                                                                                    <a class="btn btn-secondary text-white m-1 btn-recapture-ktp">Ulangi</a>
                                                                                <?php } ?>
                                                                            <?php } else { ?>
                                                                                <div id="capture_foto_ktp"></div>
                                                                                <div id="results_foto_ktp" class="d-none"></div>
                                                                                <a class="btn btn-secondary text-white m-1 btn-switch-camera" onClick="switch_camera_1()"><i class="fa fa-exchange-alt"></i></a>
                                                                                <a class="btn btn-secondary text-white m-1 btn-capture-ktp" onClick="take_snapshot_ktp()">Ambil Foto</a>
                                                                                <a class="btn btn-secondary text-white m-1 btn-recapture-ktp d-none">Ulangi</a>
                                                                            <?php } ?>
                                                                        </center>
                                                                    </div>
                                                                    <div class="col-lg-6 d-none d-xl-block">
                                                                        <center>
                                                                            <img src="<?php echo base_url("assets/images/ktp.png"); ?>" style="max-width: 320px;">
                                                                        </center>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a class="btn btn-default bold previous action-button-previous">Kembali</a>
                                                            <a class="btn btn-primary bold next action-button text-white disabled" disabled>Lanjut</a>
                                                        </fieldset>
                                                        <fieldset>
                                                            <div class="form-card fieldset-4">
                                                                <h2 class="fs-title mb-3 <?php if($userlogin->status_verify == 2 && isset($pemodal[0]->selfie_ktp) && $pemodal[0]->selfie_ktp == 0){ echo 'text-danger'; } else { echo 'text-dark'; } ?>">Foto Selfie KTP</h2>
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <center>
                                                                            <?php if($userlogin->status_verify == 2){ ?>
                                                                                <?php if($userlogin->foto_selfie_ktp == "" || $userlogin->foto_selfie_ktp == null){ ?>
                                                                                    <div id="capture_foto_ktp_selfie"></div>
                                                                                    <div id="results_foto_ktp_selfie" class="d-none"></div>
                                                                                    <a class="btn btn-secondary text-white m-1 btn-switch-camera" onClick="switch_camera_2()"><i class="fa fa-exchange-alt"></i></a>
                                                                                    <a class="btn btn-secondary text-white m-1 btn-capture-ktp-selfie" onClick="take_snapshot_ktp_selfie()">Ambil Foto</a>
                                                                                    <a class="btn btn-secondary text-white m-1 btn-recapture-ktp-selfie d-none">Ulangi</a>
                                                                                <?php } else { ?>
                                                                                    <div id="capture_foto_ktp_selfie" class="d-none"></div>
                                                                                    <div id="results_foto_ktp_selfie"><img style="width: 100%;" src="<?php echo $this->config->item("cdn_url")."/".$userlogin->foto_selfie_ktp; ?>"></div>
                                                                                    <a class="btn btn-secondary text-white m-1 btn-switch-camera d-none" onClick="switch_camera_2()"><i class="fa fa-exchange-alt"></i></a>
                                                                                    <a class="btn btn-secondary text-white m-1 btn-capture-ktp-selfie d-none" onClick="take_snapshot_ktp_selfie()">Ambil Foto</a>
                                                                                    <a class="btn btn-secondary text-white m-1 btn-recapture-ktp-selfie">Ulangi</a>
                                                                                <?php } ?>
                                                                            <?php } else { ?>
                                                                                <div id="capture_foto_ktp_selfie"></div>
                                                                                <div id="results_foto_ktp_selfie" class="d-none"></div>
                                                                                <a class="btn btn-secondary text-white m-1 btn-switch-camera" onClick="switch_camera_2()"><i class="fa fa-exchange-alt"></i></a>
                                                                                <a class="btn btn-secondary text-white m-1 btn-capture-ktp-selfie" onClick="take_snapshot_ktp_selfie()">Ambil Foto</a>
                                                                                <a class="btn btn-secondary text-white m-1 btn-recapture-ktp-selfie d-none">Ulangi</a>
                                                                            <?php } ?>
                                                                        </center>
                                                                    </div>
                                                                    <div class="col-lg-6 d-none d-xl-block">
                                                                        <center>
                                                                            <img src="<?php echo base_url("assets/images/selfie.png"); ?>" style="max-width: 320px;">
                                                                        </center>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a class="btn btn-default bold previous action-button-previous">Kembali</a>
                                                            <a class="btn btn-primary bold next action-button text-white disabled" disabled>Lanjut</a>
                                                        </fieldset>
                                                        <fieldset>
                                                            <div class="form-card fieldset-5">
                                                                <h2 class="fs-title mb-3 <?php if($userlogin->status_verify == 2 && isset($pemodal[0]->npwp) && $pemodal[0]->npwp == 0){ echo 'text-danger'; } else { echo 'text-dark'; } ?>">Foto NPWP</h2>
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <center>
                                                                            <?php if($userlogin->status_verify == 2){ ?>
                                                                                <?php if($userlogin->foto_npwp == "" || $userlogin->foto_npwp == null){ ?>
                                                                                    <div id="capture_foto_npwp"></div>
                                                                                    <div id="results_foto_npwp" class="d-none"></div>
                                                                                    <a class="btn btn-secondary text-white m-1 btn-switch-camera" onClick="switch_camera_3()"><i class="fa fa-exchange-alt"></i></a>
                                                                                    <a class="btn btn-secondary text-white m-1 btn-capture-npwp" onClick="take_snapshot_npwp()">Ambil Foto</a>
                                                                                    <a class="btn btn-secondary text-white m-1 btn-recapture-npwp d-none">Ulangi</a>
                                                                                <?php } else { ?>
                                                                                    <div id="capture_foto_npwp" class="d-none"></div>
                                                                                    <div id="results_foto_npwp"><img style="width: 100%;" src="<?php echo $this->config->item("cdn_url")."/".$userlogin->foto_npwp; ?>"></div>
                                                                                    <a class="btn btn-secondary text-white m-1 btn-switch-camera d-none" onClick="switch_camera_3()"><i class="fa fa-exchange-alt"></i></a>
                                                                                    <a class="btn btn-secondary text-white m-1 btn-capture-npwp d-none" onClick="take_snapshot_npwp()">Ambil Foto</a>
                                                                                    <a class="btn btn-secondary text-white m-1 btn-recapture-npwp">Ulangi</a>
                                                                                <?php } ?>
                                                                            <?php } else { ?>
                                                                                <div id="capture_foto_npwp"></div>
                                                                                <div id="results_foto_npwp" class="d-none"></div>
                                                                                <a class="btn btn-secondary text-white m-1 btn-switch-camera" onClick="switch_camera_3()"><i class="fa fa-exchange-alt"></i></a>
                                                                                <a class="btn btn-secondary text-white m-1 btn-capture-npwp" onClick="take_snapshot_npwp()">Ambil Foto</a>
                                                                                <a class="btn btn-secondary text-white m-1 btn-recapture-npwp d-none">Ulangi</a>
                                                                            <?php } ?>
                                                                        </center>
                                                                    </div>
                                                                    <div class="col-lg-6 d-none d-xl-block">
                                                                        <center>
                                                                            <img src="<?php echo base_url("assets/images/npwp.png"); ?>" style="max-width: 320px;">
                                                                        </center>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a class="btn btn-default bold previous action-button-previous">Kembali</a>
                                                            <a class="btn btn-primary bold next action-button text-white disabled" disabled>Lanjut</a>
                                                        </fieldset>
                                                        <fieldset>
                                                            <div class="form-card fieldset-6">
                                                                <h2 class="fs-title mb-3 <?php if($userlogin->status_verify == 2 && isset($pemodal[0]->selfie_npwp) && $pemodal[0]->selfie_npwp == 0){ echo 'text-danger'; } else { echo 'text-dark'; } ?>">Foto Selfie NPWP</h2>
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <center>
                                                                            <?php if($userlogin->status_verify == 2){ ?>
                                                                                <?php if($userlogin->foto_selfie_npwp == "" || $userlogin->foto_selfie_npwp == null){ ?>
                                                                                    <div id="capture_foto_npwp_selfie"></div>
                                                                                    <div id="results_foto_npwp_selfie" class="d-none"></div>
                                                                                    <a class="btn btn-secondary text-white m-1 btn-switch-camera" onClick="switch_camera_4()"><i class="fa fa-exchange-alt"></i></a>
                                                                                    <a class="btn btn-secondary text-white m-1 btn-capture-npwp-selfie" onClick="take_snapshot_npwp_selfie()">Ambil Foto</a>
                                                                                    <a class="btn btn-secondary text-white m-1 btn-recapture-npwp-selfie d-none">Ulangi</a>
                                                                                <?php } else { ?>
                                                                                    <div id="capture_foto_npwp_selfie" class="d-none"></div>
                                                                                    <div id="results_foto_npwp_selfie"><img style="width: 100%;" src="<?php echo $this->config->item("cdn_url")."/".$userlogin->foto_selfie_npwp; ?>"></div>
                                                                                    <a class="btn btn-secondary text-white m-1 btn-switch-camera d-none" onClick="switch_camera_4()"><i class="fa fa-exchange-alt"></i></a>
                                                                                    <a class="btn btn-secondary text-white m-1 btn-capture-npwp-selfie d-none" onClick="take_snapshot_npwp_selfie()">Ambil Foto</a>
                                                                                    <a class="btn btn-secondary text-white m-1 btn-recapture-npwp-selfie">Ulangi</a>
                                                                                <?php } ?>
                                                                            <?php } else { ?>
                                                                                <div id="capture_foto_npwp_selfie"></div>
                                                                                <div id="results_foto_npwp_selfie" class="d-none"></div>
                                                                                <a class="btn btn-secondary text-white m-1 btn-switch-camera" onClick="switch_camera_4()"><i class="fa fa-exchange-alt"></i></a>
                                                                                <a class="btn btn-secondary text-white m-1 btn-capture-npwp-selfie" onClick="take_snapshot_npwp_selfie()">Ambil Foto</a>
                                                                                <a class="btn btn-secondary text-white m-1 btn-recapture-npwp-selfie d-none">Ulangi</a>
                                                                            <?php } ?>
                                                                        </center>
                                                                    </div>
                                                                    <div class="col-lg-6 d-none d-xl-block">
                                                                        <center>
                                                                            <img src="<?php echo base_url("assets/images/selfie.png"); ?>" style="max-width: 320px;">
                                                                        </center>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a class="btn btn-default bold previous action-button-previous">Kembali</a>
                                                            <a class="btn btn-primary bold next action-button text-white disabled" disabled>Lanjut</a>
                                                        </fieldset>
                                                        <fieldset>
                                                            <div class="form-card fieldset-7">
                                                                <h2 class="fs-title mb-3">Unggah Buku Tabungan/Rekening Koran<br>Pastikan nama dan nomor rekening anda terlihat dalam foto</h2>
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <table class="table table-striped table-dokumen">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th class="bold text-primary">Nama File</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php if($userlogin->status_verify == 2){ ?>
                                                                                    <?php if($userlogin->foto_buku_tabungan == "" || $userlogin->foto_buku_tabungan == null){ ?>

                                                                                    <?php } else { 
                                                                                        $array_buku_tabungan = json_decode($userlogin->foto_buku_tabungan, true);

                                                                                        foreach ($array_buku_tabungan as $item) {
                                                                                            ?>
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        <a class="bold text-primary" onclick="window.open('<?php echo $this->config->item("cdn_url")."/file_upload/".$item["file"]; ?>', '', 'width=800,height=400')"><?php echo $item["nama"]; ?></a>&nbsp;&nbsp;&nbsp;<a class="bold text-danger btn-delete-dokumen"><i class="fa fa-times"></i></a><input type="hidden" class="dokumen-nama" value="<?php echo $item["nama"]; ?>"><input type="hidden" class="dokumen-file" value="<?php echo $item["file"]; ?>">
                                                                                                    </td>
                                                                                                </tr>
                                                                                        <?php }
                                                                                    } ?>
                                                                                <?php } else { ?>

                                                                                <?php } ?>
                                                                            </tbody>
                                                                        </table>
                                                                        <a class="btn btn-primary text-white btn-tambah-berkas"><i class="fa fa-plus"></i> Tambah Berkas</a>
                                                                    </div>
                                                                    <div class="col-lg-6 d-none d-xl-block">
                                                                        <center>
                                                                            <img src="<?php echo base_url("assets/images/upload.png"); ?>" style="max-width: 320px;">
                                                                        </center>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a class="btn btn-default bold previous action-button-previous">Kembali</a>
                                                            <a class="btn btn-primary bold btn-finish text-white ladda-button ladda-button-submit disabled" disabled data-style="slide-up">Kirim Verifikasi</a>
                                                        </fieldset>
                                                        <input type="hidden" name="form[id]" value="<?php echo $this->session->userdata("user")->id; ?>">
                                                        <input type="hidden" name="form[foto_ktp]" value="<?php echo $userlogin->foto_ktp; ?>">
                                                        <input type="hidden" name="form[foto_selfie_ktp]" value="<?php echo $userlogin->foto_selfie_ktp; ?>">
                                                        <input type="hidden" name="form[foto_npwp]" value="<?php echo $userlogin->foto_npwp; ?>">
                                                        <input type="hidden" name="form[foto_selfie_npwp]" value="<?php echo $userlogin->foto_selfie_npwp; ?>">
                                                        <input type="hidden" name="form[foto_buku_tabungan]" value="<?php echo $userlogin->foto_buku_tabungan; ?>">
                                                    </form>
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
        <?php $this->load->view("tool/modal/konfirmasi_hapus_html"); ?>
        <?php $this->load->view("tool/modal/upload_file_tambah"); ?>
        <?php if($userlogin->status_verify == 2 && isset($pemodal[0]->alasan_penolakan)){ ?>
        <div class="modal" id="modal-ditolak">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title bold">Alasan Penolakan</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <label><?php echo $pemodal[0]->alasan_penolakan; ?></label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
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
            <?php if($userlogin->status_verify == 2 && isset($pemodal[0]->alasan_penolakan)){ ?>
                $("#modal-ditolak").modal("show");
            <?php } ?>
            var post_gambar  = {"form": {"Base64": ""}};

            var html_tag_delete = "";
            var konfirmasi_hapus_html = $("#modal-konfirmasi-hapus-html");
            var upload_file_tambah = $("#modal-tambah-upload-file");
            $(".btn-tambah-berkas").click(function(){
                $("#modal-tambah-upload-file").modal("show");
                upload_file_tambah.find(".progress-bar").width('0%');
                upload_file_tambah.find(".progress-bar").html('');
                upload_file_tambah.find("input[name='form[file]'], input[name='file']").val("");
            });
            $(".table-dokumen").on("click", ".btn-delete-dokumen", function() {
                html_tag_delete = $(this).parent().parent();
                $("#modal-konfirmasi-hapus-html").modal("show");
            });

            function SimpanTambahUploadFile(){
                $("#FrmTambahUploadFile").submit();
            }
            var check_status_file = false;
            $("#FrmTambahUploadFile").on('submit', function(e){
                $("#modal-tambah-upload-file").find(".ladda-button-submit").ladda("start");
                if(upload_file_tambah.find(".file-tool").val() == ""){
                    check_status_file = false;
                } else {
                    check_status_file = true;
                    $.ajax({
                        xhr: function() {
                            var xhr = new window.XMLHttpRequest();
                            xhr.upload.addEventListener("progress", function(evt) {
                                if (evt.lengthComputable) {
                                    var percentComplete = ((evt.loaded / evt.total) * 100);
                                    upload_file_tambah.find(".progress-bar").width(percentComplete.toFixed(2) + '%');
                                    upload_file_tambah.find(".progress-bar").html(percentComplete.toFixed(2)+'%');
                                }
                            }, false);
                            return xhr;
                        },
                        type: 'POST',
                        url: base_url + "/tool/ajax_upload_file",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData:false,
                        beforeSend: function(){
                            upload_file_tambah.find(".progress-bar").width('0%');
                        },
                        error:function(){
                            $("#modal-tambah-upload-file").find(".ladda-button-submit").ladda("stop");
                            upload_file_tambah.find(".progress-bar").width('0%');
                            toastrshow("warning", "Upload gagal, harap hubungi administrator", "Peringatan");
                            check_status_file = false;
                        },
                        success: function(resp){
                            $("#modal-tambah-upload-file").find(".ladda-button-submit").ladda("stop");
                            if(resp == "err"){
                                toastrshow("warning", "Upload gagal, harap hubungi administrator", "Peringatan");
                            } else {
                                var file_name = upload_file_tambah.find(".file-tool")[0].files[0].name;
                                var tipefile_array = file_name.split(".");
                                var tipefile_data = "."+tipefile_array[tipefile_array.length-1];
                                var real_filename = file_name.replace(tipefile_data, "", file_name);
                                upload_file_tambah.find(".foto_file_name").val(real_filename);
                                upload_file_tambah.find(".foto_hidden").val(resp);
                                $("#modal-tambah-upload-file").modal("hide");

                                var is_add_dokumen = true;
                                $(".table-dokumen tbody tr").each(function(index) {
                                    if($(this).find(".dokumen-nama").val() == upload_file_tambah.find(".foto_file_name").val()){
                                        is_add_dokumen = false;
                                    }
                                });
                                if(is_add_dokumen == true){
                                    $(".table-dokumen tbody").append("<tr><td><a class='bold text-primary' onclick='window.open("+'"'+cdn_url+"/file_upload/"+upload_file_tambah.find(".foto_hidden").val()+'"'+", \"\", \"width=800,height=400\");'>"+upload_file_tambah.find(".foto_file_name").val()+"</a>&nbsp;&nbsp;&nbsp;<a class='bold text-danger btn-delete-dokumen'><i class='fa fa-times'></i></a><input type='hidden' class='dokumen-nama' value='"+upload_file_tambah.find(".foto_file_name").val()+"'><input type='hidden' class='dokumen-file' value='"+upload_file_tambah.find(".foto_hidden").val()+"'></td></tr>");
                                } else {
                                    toastrshow("warning", "Tidak bisa upload file yang sama", "Warning");
                                }
                            }
                            check_status_file = false;
                            CheckFieldset7();
                        }
                    });
                }
            });
            var FrmTambahUploadFile = $("#FrmTambahUploadFile").validate({
                submitHandler: function(form) {
                    laddasubmit = $("#modal-tambah-upload-file").find(".ladda-button-submit");
                    setTimeout(function(){
                        if(upload_file_tambah.find(".file-tool").val() == ""){
                            $("#modal-tambah-upload-file").find(".ladda-button-submit").ladda("stop");
                        } else {
                            // StartSaveFile(form);
                        }
                    }, 1000);
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
            $(".btn-hapus-html").click(function(){
                $("#modal-konfirmasi-hapus-html").modal("hide");
                html_tag_delete.remove();
                CheckFieldset7();
            });





            $(".select2.dropdown-kota").select2({
                disabled: true,
                placeholder: "Pilih Provinsi terlebih dahulu",
            }).val("").trigger("change");
            $(".select2.dropdown-kecamatan").select2({
                disabled: true,
                placeholder: "Pilih Kota/Kabupaten terlebih dahulu",
            }).val("").trigger("change");
            GetDropdownProvinsi("<?php echo $userlogin->id_provinsi ?>");
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

            $(".mt-repeater-buku-tabungan").each(function(){
                $(this).repeater({
                    show: function () {
                        $(this).slideDown();
                    },
                    hide: function (deleteElement) {
                        $(this).slideUp(deleteElement);
                        setTimeout(function(){
                            var tot_frm = $(".mt-repeater-buku-tabungan").length;
                            // $(".btnTambahDeskripsi").click();
                        }, 500);
                    },

                    ready: function (setIndexes) {

                    }

                });
            });

            var data_camera_1 = 2;
            var data_camera_2 = 1;
            var data_camera_3 = 2;
            var data_camera_4 = 1;
            $("[name='form[npwp]']").inputmask({"mask": "99.999.999.9-999.999"});
            $(".datepicker-tgl-lahir").datepicker({
                    autoclose: true,
                    format: 'dd M yyyy'
                });
            $(document).ready(function(){
                var current_fs, next_fs, previous_fs; //fieldsets
                var opacity;

                $(".next").click(function(){

                current_fs = $(this).parent();
                next_fs = $(this).parent().next();

                //Add Class Active
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                //show the next fieldset
                next_fs.show();
                //hide the current fieldset with style
                current_fs.animate({opacity: 0}, {
                step: function(now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                'display': 'none',
                'position': 'relative'
                });
                next_fs.css({'opacity': opacity});
                },
                duration: 600
                });
                });

                $(".previous").click(function(){

                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();

                //Remove class active
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

                //show the previous fieldset
                previous_fs.show();

                //hide the current fieldset with style
                current_fs.animate({opacity: 0}, {
                step: function(now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                'display': 'none',
                'position': 'relative'
                });
                previous_fs.css({'opacity': opacity});
                },
                duration: 600
                });
                });

                $('.radio-group .radio').click(function(){
                $(this).parent().find('.radio').removeClass('selected');
                $(this).addClass('selected');
                });

                $(".submit").click(function(){
                return false;
                })

            });

            function disable_camera_1(){
                $(".fieldset-3").find("#capture_foto_ktp").remove();
                $(".fieldset-3").find("center").prepend("<div id='capture_foto_ktp'></div>");
                $("#capture_foto_ktp").addClass("d-none");
            }
            function disable_camera_2(){
                $(".fieldset-4").find("#capture_foto_ktp_selfie").remove();
                $(".fieldset-4").find("center").prepend("<div id='capture_foto_ktp_selfie'></div>");
                $("#capture_foto_ktp_selfie").addClass("d-none");
            }
            function disable_camera_3(){
                $(".fieldset-5").find("#capture_foto_npwp").remove();
                $(".fieldset-5").find("center").prepend("<div id='capture_foto_npwp'></div>");
                $("#capture_foto_npwp").addClass("d-none");
            }

            function switch_camera_1(){
                $(".fieldset-3").find("#capture_foto_ktp").remove();
                $(".fieldset-3").find("center").prepend("<div id='capture_foto_ktp'></div>");
                Webcam.reset();
                if(data_camera_1 == 1){
                    data_camera_1 = 2;
                    Webcam.set({
                        width: 400,
                        height: 300,
                        image_format: 'jpeg',
                        jpeg_quality: 100,
                        constraints: {
                            video: true,
                            facingMode: "user"
                        }
                    });
                } else {
                    data_camera_1 = 1;
                    Webcam.set({
                        width: 400,
                        height: 300,
                        image_format: 'jpeg',
                        jpeg_quality: 100,
                        constraints: {
                            video: true,
                            facingMode: "environment"
                        }
                    });
                }
                Webcam.attach("#capture_foto_ktp");
            }
            function switch_camera_2(){
                $(".fieldset-4").find("#capture_foto_ktp_selfie").remove();
                $(".fieldset-4").find("center").prepend("<div id='capture_foto_ktp_selfie'></div>");
                Webcam.reset();
                if(data_camera_2 == 1){
                    data_camera_2 = 2;
                    Webcam.set({
                        width: 400,
                        height: 300,
                        image_format: 'jpeg',
                        jpeg_quality: 100,
                        constraints: {
                            video: true,
                            facingMode: "user"
                        }
                    });
                } else {
                    data_camera_2 = 1;
                    Webcam.set({
                        width: 400,
                        height: 300,
                        image_format: 'jpeg',
                        jpeg_quality: 100,
                        constraints: {
                            video: true,
                            facingMode: "environment"
                        }
                    });
                }
                Webcam.attach("#capture_foto_ktp_selfie");
            }
            function switch_camera_3(){
                $(".fieldset-5").find("#capture_foto_npwp").remove();
                $(".fieldset-5").find("center").prepend("<div id='capture_foto_npwp'></div>");
                Webcam.reset();
                if(data_camera_3 == 1){
                    data_camera_3 = 2;
                    Webcam.set({
                        width: 400,
                        height: 300,
                        image_format: 'jpeg',
                        jpeg_quality: 100,
                        constraints: {
                            video: true,
                            facingMode: "user"
                        }
                    });
                } else {
                    data_camera_3 = 1;
                    Webcam.set({
                        width: 400,
                        height: 300,
                        image_format: 'jpeg',
                        jpeg_quality: 100,
                        constraints: {
                            video: true,
                            facingMode: "environment"
                        }
                    });
                }
                Webcam.attach("#capture_foto_npwp");
            }
            function switch_camera_4(){
                $(".fieldset-6").find("#capture_foto_npwp_selfie").remove();
                $(".fieldset-6").find("center").prepend("<div id='capture_foto_npwp_selfie'></div>");
                Webcam.reset();
                if(data_camera_4 == 1){
                    data_camera_4 = 2;
                    Webcam.set({
                        width: 400,
                        height: 300,
                        image_format: 'jpeg',
                        jpeg_quality: 100,
                        constraints: {
                            video: true,
                            facingMode: "user"
                        }
                    });
                } else {
                    data_camera_4 = 1;
                    Webcam.set({
                        width: 400,
                        height: 300,
                        image_format: 'jpeg',
                        jpeg_quality: 100,
                        constraints: {
                            video: true,
                            facingMode: "environment"
                        }
                    });
                }
                Webcam.attach("#capture_foto_npwp_selfie");
            }

            <?php if($userlogin->status_verify == 2){ ?>
                <?php if($userlogin->foto_ktp == "" || $userlogin->foto_ktp == null){ ?>
                    switch_camera_1();
                <?php } else { ?>
                    $(".fieldset-3").parent().find(".action-button").removeAttr("disabled").removeClass("disabled");
                <?php } ?>
            <?php } else { ?>
                switch_camera_1();
            <?php } ?>

            <?php if($userlogin->status_verify == 2){ ?>
                <?php if($userlogin->foto_selfie_ktp == "" || $userlogin->foto_selfie_ktp == null){ ?>
                <?php } else { ?>
                    $(".fieldset-4").parent().find(".action-button").removeAttr("disabled").removeClass("disabled");
                <?php } ?>
            <?php } else { ?>
            <?php } ?>
            
            <?php if($userlogin->status_verify == 2){ ?>
                <?php if($userlogin->foto_npwp == "" || $userlogin->foto_npwp == null){ ?>
                <?php } else { ?>
                    $(".fieldset-5").parent().find(".action-button").removeAttr("disabled").removeClass("disabled");
                <?php } ?>
            <?php } else { ?>
            <?php } ?>
            
            <?php if($userlogin->status_verify == 2){ ?>
                <?php if($userlogin->foto_selfie_npwp == "" || $userlogin->foto_selfie_npwp == null){ ?>
                <?php } else { ?>
                    $(".fieldset-6").parent().find(".action-button").removeAttr("disabled").removeClass("disabled");
                <?php } ?>
            <?php } else { ?>
            <?php } ?>
            
            <?php if($userlogin->status_verify == 2){ ?>
                <?php if($userlogin->foto_buku_tabungan == "" || $userlogin->foto_buku_tabungan == null){ ?>
                <?php } else { ?>
                    $(".fieldset-7").parent().find(".action-button").removeAttr("disabled").removeClass("disabled");
                <?php } ?>
            <?php } else { ?>
            <?php } ?>
            
            function take_snapshot_ktp() {
                $(".fieldset-3").find(".btn-switch-camera").addClass("d-none");
                $(".fieldset-3").find("#capture_foto_ktp").remove();

                $("#capture_foto_ktp, .btn-capture-ktp").addClass("d-none");
                $("#results_foto_ktp, .btn-recapture-ktp").removeClass("d-none");
                Webcam.snap( function(data_uri) {
                    if($( window ).width() <= 550){
                        document.getElementById("results_foto_ktp").innerHTML = "<img style='width: 105vw; height: 140vw;' src='"+data_uri+"'/>";
                    } else {
                        document.getElementById("results_foto_ktp").innerHTML = "<img src='"+data_uri+"'/>";
                    }
                });
                $(".fieldset-3").parent().find(".action-button").removeAttr("disabled").removeClass("disabled");
            }
            $(".btn-recapture-ktp").click(function(){
                $(".fieldset-3").find(".btn-switch-camera").removeClass("d-none");
                data_camera_1 = 2;
                switch_camera_1();

                $("#capture_foto_ktp, .btn-capture-ktp").removeClass("d-none");
                $("#results_foto_ktp, .btn-recapture-ktp").addClass("d-none");
                $(".fieldset-3").parent().find(".action-button").attr("disabled", "disabled").addClass("disabled");
            });

            
            function take_snapshot_ktp_selfie() {
                $(".fieldset-4").find(".btn-switch-camera").addClass("d-none");
                $(".fieldset-4").find("#capture_foto_ktp_selfie").remove();

                $("#capture_foto_ktp_selfie, .btn-capture-ktp-selfie").addClass("d-none");
                $("#results_foto_ktp_selfie, .btn-recapture-ktp-selfie").removeClass("d-none");
                Webcam.snap( function(data_uri) {
                    if($( window ).width() <= 550){
                        document.getElementById("results_foto_ktp_selfie").innerHTML = "<img style='width: 105vw; height: 140vw;' src='"+data_uri+"'/>";
                    } else {
                        document.getElementById("results_foto_ktp_selfie").innerHTML = "<img src='"+data_uri+"'/>";
                    }
                });
                $(".fieldset-4").parent().find(".action-button").removeAttr("disabled").removeClass("disabled");
            }
            $(".btn-recapture-ktp-selfie").click(function(){
                $(".fieldset-4").find(".btn-switch-camera").removeClass("d-none");
                data_camera_2 = 1;
                switch_camera_2();

                $("#capture_foto_ktp_selfie, .btn-capture-ktp-selfie").removeClass("d-none");
                $("#results_foto_ktp_selfie, .btn-recapture-ktp-selfie").addClass("d-none");
                $(".fieldset-4").parent().find(".action-button").attr("disabled", "disabled").addClass("disabled");
            });

            
            function take_snapshot_npwp() {
                $(".fieldset-5").find(".btn-switch-camera").addClass("d-none");
                $(".fieldset-5").find("#capture_foto_npwp").remove();

                $("#capture_foto_npwp, .btn-capture-npwp").addClass("d-none");
                $("#results_foto_npwp, .btn-recapture-npwp").removeClass("d-none");
                Webcam.snap( function(data_uri) {
                    if($( window ).width() <= 550){
                        document.getElementById("results_foto_npwp").innerHTML = "<img style='width: 105vw; height: 140vw;' src='"+data_uri+"'/>";
                    } else {
                        document.getElementById("results_foto_npwp").innerHTML = "<img src='"+data_uri+"'/>";
                    }
                });
                $(".fieldset-5").parent().find(".action-button").removeAttr("disabled").removeClass("disabled");
            }
            $(".btn-recapture-npwp").click(function(){
                $(".fieldset-5").find(".btn-switch-camera").removeClass("d-none");
                data_camera_3 = 1;
                switch_camera_3();

                $("#capture_foto_npwp, .btn-capture-npwp").removeClass("d-none");
                $("#results_foto_npwp, .btn-recapture-npwp").addClass("d-none");
                $(".fieldset-5").parent().find(".action-button").attr("disabled", "disabled").addClass("disabled");
            });

            
            function take_snapshot_npwp_selfie() {
                $(".fieldset-6").find(".btn-switch-camera").addClass("d-none");
                $(".fieldset-6").find("#capture_foto_npwp_selfie").remove();

                $("#capture_foto_npwp_selfie, .btn-capture-npwp-selfie").addClass("d-none");
                $("#results_foto_npwp_selfie, .btn-recapture-npwp-selfie").removeClass("d-none");
                Webcam.snap( function(data_uri) {
                    if($( window ).width() <= 550){
                        document.getElementById("results_foto_npwp_selfie").innerHTML = "<img style='width: 105vw; height: 140vw;' src='"+data_uri+"'/>";
                    } else {
                        document.getElementById("results_foto_npwp_selfie").innerHTML = "<img src='"+data_uri+"'/>";
                    }
                });
                $(".fieldset-6").parent().find(".action-button").removeAttr("disabled").removeClass("disabled");
            }
            $(".btn-recapture-npwp-selfie").click(function(){
                $(".fieldset-6").find(".btn-switch-camera").removeClass("d-none");
                data_camera_4 = 2;
                switch_camera_4();

                $("#capture_foto_npwp_selfie, .btn-capture-npwp-selfie").removeClass("d-none");
                $("#results_foto_npwp_selfie, .btn-recapture-npwp-selfie").addClass("d-none");
                $(".fieldset-6").parent().find(".action-button").attr("disabled", "disabled").addClass("disabled");
            });


            
            $('.image-upload-wrap').bind('dragover', function () {
                $('.image-upload-wrap').addClass('image-dropping');
            });
            $('.image-upload-wrap').bind('dragleave', function () {
                $('.image-upload-wrap').removeClass('image-dropping');
            });


            $(".btn-finish").click(function(){
                laddasubmit = $("html").find(".ladda-button-submit");
                laddasubmit.ladda("start");

                var foto_buku_tabungan = [];
                $(".table-dokumen tbody tr").each(function(index) {
                    foto_buku_tabungan.push({
                        nama : $(this).find(".dokumen-nama").val(), 
                        file : $(this).find(".dokumen-file").val()
                    });
                });
                $("input[name='form[foto_buku_tabungan]']").val(JSON.stringify(foto_buku_tabungan));

                
                var foto_ktp = $("#results_foto_ktp").find("img").attr("src");
                var foto_selfie_ktp = $("#results_foto_ktp_selfie").find("img").attr("src");
                var foto_npwp = $("#results_foto_npwp").find("img").attr("src");
                var foto_selfie_npwp = $("#results_foto_npwp_selfie").find("img").attr("src");

                var base64 = foto_ktp.replace("data:image/jpeg;base64,", '');
                var ext = "jpg";
                post_gambar["form"]["Base64"] = base64;
                post_gambar["form"]["Ext"] = ext;
                $.ajax({
                    type: "POST",
                    url: base_url + "/tool/ajax_tool",
                    data: {act:"upload_file", form:post_gambar},
                    dataType: "JSON",
                    tryCount: 0,
                    retryLimit: 3,
                    success: function(respon_foto_ktp){
                        if (post_gambar["form"]["Base64"].indexOf("http") !== -1) {
                            
                        } else {
                            $("input[name='form[foto_ktp]']").val(respon_foto_ktp.Output);
                        }
                        var base64 = foto_selfie_ktp.replace("data:image/jpeg;base64,", '');
                        var ext = "jpg";
                        post_gambar["form"]["Base64"] = base64;
                        post_gambar["form"]["Ext"] = ext;
                        $.ajax({
                            type: "POST",
                            url: base_url + "/tool/ajax_tool",
                            data: {act:"upload_file", form:post_gambar},
                            dataType: "JSON",
                            tryCount: 0,
                            retryLimit: 3,
                            success: function(respon_foto_selfie_ktp){
                                if (post_gambar["form"]["Base64"].indexOf("http") !== -1) {
                                    
                                } else {
                                    $("input[name='form[foto_selfie_ktp]']").val(respon_foto_selfie_ktp.Output);
                                }
                                var base64 = foto_npwp.replace("data:image/jpeg;base64,", '');
                                var ext = "jpg";
                                post_gambar["form"]["Base64"] = base64;
                                post_gambar["form"]["Ext"] = ext;
                                $.ajax({
                                    type: "POST",
                                    url: base_url + "/tool/ajax_tool",
                                    data: {act:"upload_file", form:post_gambar},
                                    dataType: "JSON",
                                    tryCount: 0,
                                    retryLimit: 3,
                                    success: function(respon_foto_npwp){
                                        if (post_gambar["form"]["Base64"].indexOf("http") !== -1) {
                                            
                                        } else {
                                            $("input[name='form[foto_npwp]']").val(respon_foto_npwp.Output);
                                        }
                                        var base64 = foto_selfie_npwp.replace("data:image/jpeg;base64,", '');
                                        var ext = "jpg";
                                        post_gambar["form"]["Base64"] = base64;
                                        post_gambar["form"]["Ext"] = ext;
                                        $.ajax({
                                            type: "POST",
                                            url: base_url + "/tool/ajax_tool",
                                            data: {act:"upload_file", form:post_gambar},
                                            dataType: "JSON",
                                            tryCount: 0,
                                            retryLimit: 3,
                                            success: function(respon_foto_selfie_npwp){
                                                if (post_gambar["form"]["Base64"].indexOf("http") !== -1) {
                                                    
                                                } else {
                                                    $("input[name='form[foto_selfie_npwp]']").val(respon_foto_selfie_npwp.Output);
                                                }
                                                $(".form-pemodal").submit()
                                            },
                                            error: function(xhr, textstatus, errorthrown) {
                                                laddasubmit.ladda("stop");
                                                toastrshow("warning", "Upload Foto Selfie NPWP gagal, Periksa koneksi internet anda kembali", "Warning");
                                            }
                                        });
                                    },
                                    error: function(xhr, textstatus, errorthrown) {
                                        laddasubmit.ladda("stop");
                                        toastrshow("warning", "Upload Foto NPWP, Periksa koneksi internet anda kembali", "Warning");
                                    }
                                });
                            },
                            error: function(xhr, textstatus, errorthrown) {
                                laddasubmit.ladda("stop");
                                toastrshow("warning", "Upload Selfie Foto KTP gagal, Periksa koneksi internet anda kembali", "Warning");
                            }
                        });
                    },
                    error: function(xhr, textstatus, errorthrown) {
                        laddasubmit.ladda("stop");
                        toastrshow("warning", "Upload Foto KTP gagal, Periksa koneksi internet anda kembali", "Warning");
                    }
                });
            })
            var FrmPemodal = $(".form-pemodal").validate({
                submitHandler: function(form) {
                    laddasubmit = $("html").find(".ladda-button-submit");
                    UpdateData(form, function(resp) {
                        window.location.href = base_url;
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


            $(".fieldset-1").on("change", "input, select, textarea", function() {
                // admin_password.find("input[name='form[password]']").val("");
                if($("[name='form[nama]']").val() == "" || $("[name='form[nik]']").val() == "" || $("[name='form[npwp]']").val() == "" || $("[name='form[tgl_lahir]']").val() == "" || $("[name='form[jenis_kelamin]']").val() == "" || $("[name='form[status_perkawinan]']").val() == "" || $("[name='form[pekerjaan]']").val() == "" || $("[name='form[penghasilan_per_tahun]']").val() == "" || $("[name='form[jenis_kelamin]']").val() == "" || $("[name='form[alamat_lengkap]']").val() == "" || $("[name='form[id_provinsi]']").val() == "" || $("[name='form[id_kota]']").val() == "" || $("[name='form[id_kecamatan]']").val() == "" || $("[name='form[kelurahan]']").val() == ""){
                    $(".fieldset-1").parent().find(".action-button").attr("disabled", "disabled").addClass("disabled");
                } else {
                    var request_by_nik  = {"filter": {"kywd": ""}};
                    request_by_nik["filter"]["nik"] = $("[name='form[nik]']").val();
                    $.ajax({
                        type: "POST",
                        url: base_url + "/pemodal/ajax_pemodal",
                        data: {act:"getdata", req:request_by_nik},
                        dataType: "JSON",
                        tryCount: 0,
                        retryLimit : 3,
                        beforeSend: function() {
                            $(".fieldset-1").parent().find(".action-button").attr("disabled", "disabled").addClass("disabled");
                        },
                        success: function(resp){
                            if(resp.data == ""){
                                if(parseInt($("[name='form[penghasilan_per_tahun]']").val().replace(/\./g,"")) < 10000000){
                                    toastrshow("warning", "Penghasilan pertahahun tidak boleh kurang dari 10.000.000", "Peringatan");
                                } else if($("[name='form[nik]']").val().length < 16){
                                    toastrshow("warning", "Mohon periksa NIK kembali", "Peringatan");
                                } else if($("[name='form[npwp]']").val().replace(/\./g,"").replace(/\-/g,"").replace(/\_/g,"").length < 15){
                                    toastrshow("warning", "Mohon periksa NPWP kembali", "Peringatan");
                                } else {
                                    $(".fieldset-1").parent().find(".action-button").removeAttr("disabled").removeClass("disabled");
                                }
                            } else {
                                if(resp.data[0].id == <?php echo $userlogin->id; ?>){
                                    $(".fieldset-1").parent().find(".action-button").removeAttr("disabled").removeClass("disabled");
                                } else {
                                    toastrshow("warning", "NIK telah tedaftar", "Peringatan");
                                    $(".fieldset-1").parent().find(".action-button").attr("disabled", "disabled").addClass("disabled");
                                }
                            }
                        },
                        error: function(xhr, textstatus, errorthrown) {
                            toastrshow("warning", "Periksa koneksi internet anda kembali", "Peringatan");
                        }
                    });
                }
            });
            $(".fieldset-2").on("change", "input, select", function() {
                if($("[name='form[nomor_rekening_bank]']").val() == "" || $("[name='form[nama_pemilik_rekening_bank]']").val() == "" || $("[name='form[nama_cabang_bank]']").val() == "" || $("[name='form[nama_bank]']").val() == ""){
                    $(".fieldset-2").parent().find(".action-button").attr("disabled", "disabled").addClass("disabled");
                } else {
                    $(".fieldset-2").parent().find(".action-button").removeAttr("disabled").removeClass("disabled");
                }
            });

            /*$(".fieldset-7").on("change", ".file-upload-input", function() {
                if($(".file-upload-input").val() == ""){
                    $(".fieldset-7").parent().find(".btn-finish").attr("disabled", "disabled").addClass("disabled");
                } else {
                    $(".fieldset-7").parent().find(".btn-finish").removeAttr("disabled").removeClass("disabled");
                }
            });*/
            function CheckFieldset7(){
                console.log($(".fieldset-7").find("tr").length);
                if($(".fieldset-7").find("tr").length >= 2){
                    $(".fieldset-7").parent().find(".btn-finish").removeAttr("disabled").removeClass("disabled");
                } else {
                    $(".fieldset-7").parent().find(".btn-finish").attr("disabled", "disabled").addClass("disabled");
                }
            }
            $(".action-button").click(function(){
                $("html").scrollTop(0);
            });
            $(".action-button-previous").click(function(){
                $("html").scrollTop(0);
            });
            $(".fieldset-3").parent().find(".action-button").click(function(){
                disable_camera_1();
                if($(".fieldset-4").parent().find(".action-button").hasClass("disabled")) {
                    data_camera_2 = 1;
                    switch_camera_2();
                }
            });
            $(".fieldset-4").parent().find(".action-button").click(function(){
                disable_camera_2();
                if($(".fieldset-5").parent().find(".action-button").hasClass("disabled")) {
                    data_camera_3 = 2;
                    switch_camera_3();
                }
            });
            $(".fieldset-5").parent().find(".action-button").click(function(){
                disable_camera_3();
                if($(".fieldset-6").parent().find(".action-button").hasClass("disabled")) {
                    data_camera_4 = 1;
                    switch_camera_4();
                }
            });
        </script>
        <?php if($userlogin->status_verify == 2){ ?>
            <script>
                GetDropdownKota("<?php echo $userlogin->id_kota ?>", "<?php echo $userlogin->id_provinsi ?>","");
                GetDropdownKecamatan("<?php echo $userlogin->id_kecamatan ?>", "<?php echo $userlogin->id_kota ?>","");
                $("select[name='form[jenis_kelamin]']").val("<?php echo $userlogin->jenis_kelamin; ?>").trigger("change");
                $("select[name='form[status_perkawinan]']").val("<?php echo $userlogin->status_perkawinan; ?>").trigger("change");
                $("select[name='form[pekerjaan]']").val("<?php echo $userlogin->pekerjaan; ?>").trigger("change");
                $("select[name='form[sumber_penghasilan]']").val("<?php echo $userlogin->sumber_penghasilan; ?>").trigger("change");
                $("select[name='form[nama_bank]']").val("<?php echo $userlogin->nama_bank; ?>").trigger("change");
                CheckFieldset7();
            </script>
        <?php } ?>
    </body>
</html>